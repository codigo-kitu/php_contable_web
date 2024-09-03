<script type="text/javascript" language="javascript">



//var estimados_porfechas_porbodegasJQueryPaginaWebInteraccion= function (estimados_porfechas_porbodegas_control) {
//this.,this.,this.

class estimados_porfechas_porbodegas_webcontrol extends estimados_porfechas_porbodegas_webcontrol_add {
	
	estimados_porfechas_porbodegas_control=null;
	estimados_porfechas_porbodegas_controlInicial=null;
	estimados_porfechas_porbodegas_controlAuxiliar=null;
		
	//if(estimados_porfechas_porbodegas_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(estimados_porfechas_porbodegas_control) {
		super();
		
		this.estimados_porfechas_porbodegas_control=estimados_porfechas_porbodegas_control;
	}
		
	actualizarVariablesPagina(estimados_porfechas_porbodegas_control) {
		
		if(estimados_porfechas_porbodegas_control.action=="index" || estimados_porfechas_porbodegas_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(estimados_porfechas_porbodegas_control);
			
		} 
		
		
		else if(estimados_porfechas_porbodegas_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(estimados_porfechas_porbodegas_control);
			
		} else if(estimados_porfechas_porbodegas_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(estimados_porfechas_porbodegas_control);
			
		} else if(estimados_porfechas_porbodegas_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(estimados_porfechas_porbodegas_control);		
		
		} else if(estimados_porfechas_porbodegas_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(estimados_porfechas_porbodegas_control);
		
		}  else if(estimados_porfechas_porbodegas_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(estimados_porfechas_porbodegas_control);		
		
		} else if(estimados_porfechas_porbodegas_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(estimados_porfechas_porbodegas_control);		
		
		} else if(estimados_porfechas_porbodegas_control.action.includes("Busqueda") ||
				  estimados_porfechas_porbodegas_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(estimados_porfechas_porbodegas_control);
			
		} else if(estimados_porfechas_porbodegas_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(estimados_porfechas_porbodegas_control)
		}
		
		
		
	
		else if(estimados_porfechas_porbodegas_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(estimados_porfechas_porbodegas_control);	
		
		} else if(estimados_porfechas_porbodegas_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(estimados_porfechas_porbodegas_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + estimados_porfechas_porbodegas_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(estimados_porfechas_porbodegas_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaAccionesGenerales(estimados_porfechas_porbodegas_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(estimados_porfechas_porbodegas_control) {
		
		this.actualizarPaginaCargaGeneral(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaOrderBy(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaCargaGeneralControles(estimados_porfechas_porbodegas_control);
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaAreaBusquedas(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaCargaCombosFK(estimados_porfechas_porbodegas_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(estimados_porfechas_porbodegas_control) {
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(estimados_porfechas_porbodegas_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(estimados_porfechas_porbodegas_control) {
		
		this.actualizarPaginaCargaGeneral(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaCargaGeneralControles(estimados_porfechas_porbodegas_control);
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaAreaBusquedas(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaCargaCombosFK(estimados_porfechas_porbodegas_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);		
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		//this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);		
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		//this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);		
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		//this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(estimados_porfechas_porbodegas_control) {
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaAbrirLink(estimados_porfechas_porbodegas_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);				
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		//this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(estimados_porfechas_porbodegas_control) {
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);
		this.onLoadCombosDefectoFK(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);
		this.onLoadCombosDefectoFK(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		//this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaAbrirLink(estimados_porfechas_porbodegas_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(estimados_porfechas_porbodegas_control) {
					//super.actualizarPaginaImprimir(estimados_porfechas_porbodegas_control,"estimados_porfechas_porbodegas");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",estimados_porfechas_porbodegas_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("estimados_porfechas_porbodegas_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(estimados_porfechas_porbodegas_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(estimados_porfechas_porbodegas_control);
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(estimados_porfechas_porbodegas_control) {
		//super.actualizarPaginaImprimir(estimados_porfechas_porbodegas_control,"estimados_porfechas_porbodegas");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("estimados_porfechas_porbodegas_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(estimados_porfechas_porbodegas_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",estimados_porfechas_porbodegas_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(estimados_porfechas_porbodegas_control) {
		//super.actualizarPaginaImprimir(estimados_porfechas_porbodegas_control,"estimados_porfechas_porbodegas");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("estimados_porfechas_porbodegas_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(estimados_porfechas_porbodegas_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",estimados_porfechas_porbodegas_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(estimados_porfechas_porbodegas_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(estimados_porfechas_porbodegas_control);
			
		this.actualizarPaginaAbrirLink(estimados_porfechas_porbodegas_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(estimados_porfechas_porbodegas_control) {
		
		if(estimados_porfechas_porbodegas_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(estimados_porfechas_porbodegas_control);
		}
		
		if(estimados_porfechas_porbodegas_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(estimados_porfechas_porbodegas_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(estimados_porfechas_porbodegas_control) {
		if(estimados_porfechas_porbodegas_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("estimados_porfechas_porbodegasReturnGeneral",JSON.stringify(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control) {
		if(estimados_porfechas_porbodegas_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && estimados_porfechas_porbodegas_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(estimados_porfechas_porbodegas_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(estimados_porfechas_porbodegas_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(estimados_porfechas_porbodegas_control, mostrar) {
		
		if(mostrar==true) {
			estimados_porfechas_porbodegas_funcion1.resaltarRestaurarDivsPagina(false,"estimados_porfechas_porbodegas");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				estimados_porfechas_porbodegas_funcion1.resaltarRestaurarDivMantenimiento(false,"estimados_porfechas_porbodegas");
			}			
			
			estimados_porfechas_porbodegas_funcion1.mostrarDivMensaje(true,estimados_porfechas_porbodegas_control.strAuxiliarMensaje,estimados_porfechas_porbodegas_control.strAuxiliarCssMensaje);
		
		} else {
			estimados_porfechas_porbodegas_funcion1.mostrarDivMensaje(false,estimados_porfechas_porbodegas_control.strAuxiliarMensaje,estimados_porfechas_porbodegas_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(estimados_porfechas_porbodegas_control) {
		if(estimados_porfechas_porbodegas_funcion1.esPaginaForm(estimados_porfechas_porbodegas_constante1)==true) {
			window.opener.estimados_porfechas_porbodegas_webcontrol1.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);
		} else {
			this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);
		}
	}
	
	actualizarPaginaAbrirLink(estimados_porfechas_porbodegas_control) {
		estimados_porfechas_porbodegas_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(estimados_porfechas_porbodegas_control.strAuxiliarUrlPagina);
				
		estimados_porfechas_porbodegas_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(estimados_porfechas_porbodegas_control.strAuxiliarTipo,estimados_porfechas_porbodegas_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(estimados_porfechas_porbodegas_control) {
		estimados_porfechas_porbodegas_funcion1.resaltarRestaurarDivMensaje(true,estimados_porfechas_porbodegas_control.strAuxiliarMensajeAlert,estimados_porfechas_porbodegas_control.strAuxiliarCssMensaje);
			
		if(estimados_porfechas_porbodegas_funcion1.esPaginaForm(estimados_porfechas_porbodegas_constante1)==true) {
			window.opener.estimados_porfechas_porbodegas_funcion1.resaltarRestaurarDivMensaje(true,estimados_porfechas_porbodegas_control.strAuxiliarMensajeAlert,estimados_porfechas_porbodegas_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(estimados_porfechas_porbodegas_control) {
		this.estimados_porfechas_porbodegas_controlInicial=estimados_porfechas_porbodegas_control;
			
		if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(estimados_porfechas_porbodegas_control.strStyleDivArbol,estimados_porfechas_porbodegas_control.strStyleDivContent
																,estimados_porfechas_porbodegas_control.strStyleDivOpcionesBanner,estimados_porfechas_porbodegas_control.strStyleDivExpandirColapsar
																,estimados_porfechas_porbodegas_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=estimados_porfechas_porbodegas_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",estimados_porfechas_porbodegas_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(estimados_porfechas_porbodegas_control) {
		this.actualizarCssBotonesPagina(estimados_porfechas_porbodegas_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(estimados_porfechas_porbodegas_control.tiposReportes,estimados_porfechas_porbodegas_control.tiposReporte
															 	,estimados_porfechas_porbodegas_control.tiposPaginacion,estimados_porfechas_porbodegas_control.tiposAcciones
																,estimados_porfechas_porbodegas_control.tiposColumnasSelect,estimados_porfechas_porbodegas_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(estimados_porfechas_porbodegas_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(estimados_porfechas_porbodegas_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(estimados_porfechas_porbodegas_control);			
	}
	
	actualizarPaginaUsuarioInvitado(estimados_porfechas_porbodegas_control) {
	
		var indexPosition=estimados_porfechas_porbodegas_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=estimados_porfechas_porbodegas_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(estimados_porfechas_porbodegas_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(estimados_porfechas_porbodegas_control.strRecargarFkTiposNinguno!=null && estimados_porfechas_porbodegas_control.strRecargarFkTiposNinguno!='NINGUNO' && estimados_porfechas_porbodegas_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(estimados_porfechas_porbodegas_control) {
		jQuery("#divBusquedaestimados_porfechas_porbodegasAjaxWebPart").css("display",estimados_porfechas_porbodegas_control.strPermisoBusqueda);
		jQuery("#trestimados_porfechas_porbodegasCabeceraBusquedas").css("display",estimados_porfechas_porbodegas_control.strPermisoBusqueda);
		jQuery("#trBusquedaestimados_porfechas_porbodegas").css("display",estimados_porfechas_porbodegas_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(estimados_porfechas_porbodegas_control.htmlTablaOrderBy!=null
			&& estimados_porfechas_porbodegas_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByestimados_porfechas_porbodegasAjaxWebPart").html(estimados_porfechas_porbodegas_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//estimados_porfechas_porbodegas_webcontrol1.registrarOrderByActions();
			
		}
			
		if(estimados_porfechas_porbodegas_control.htmlTablaOrderByRel!=null
			&& estimados_porfechas_porbodegas_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelestimados_porfechas_porbodegasAjaxWebPart").html(estimados_porfechas_porbodegas_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaestimados_porfechas_porbodegasAjaxWebPart").css("display","none");
			jQuery("#trestimados_porfechas_porbodegasCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaestimados_porfechas_porbodegas").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control) {
		
		if(!estimados_porfechas_porbodegas_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(estimados_porfechas_porbodegas_control);
		} else {
			jQuery("#divTablaDatosestimados_porfechas_porbodegassAjaxWebPart").html(estimados_porfechas_porbodegas_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosestimados_porfechas_porbodegass=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosestimados_porfechas_porbodegass=jQuery("#tblTablaDatosestimados_porfechas_porbodegass").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("estimados_porfechas_porbodegas",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',estimados_porfechas_porbodegas_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			estimados_porfechas_porbodegas_webcontrol1.registrarControlesTableEdition(estimados_porfechas_porbodegas_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		estimados_porfechas_porbodegas_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(estimados_porfechas_porbodegas_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("estimados_porfechas_porbodegas_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(estimados_porfechas_porbodegas_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosestimados_porfechas_porbodegassAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(estimados_porfechas_porbodegas_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(estimados_porfechas_porbodegas_control);
		
		const divOrderBy = document.getElementById("divOrderByestimados_porfechas_porbodegasAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(estimados_porfechas_porbodegas_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelestimados_porfechas_porbodegasAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(estimados_porfechas_porbodegas_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual!=null) {//form
			
			this.actualizarCamposFilaTabla(estimados_porfechas_porbodegas_control);			
		}
	}
	
	actualizarCamposFilaTabla(estimados_porfechas_porbodegas_control) {
		var i=0;
		
		i=estimados_porfechas_porbodegas_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.id);
		jQuery("#t-version_row_"+i+"").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.fecha_emision_desde);
		jQuery("#t-cel_"+i+"_3").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.fecha_emision_hasta);
		jQuery("#t-cel_"+i+"_4").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.codigo_desde);
		jQuery("#t-cel_"+i+"_5").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.codigo_hasta);
		jQuery("#t-cel_"+i+"_6").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.numero);
		jQuery("#t-cel_"+i+"_7").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.fecha_emision);
		jQuery("#t-cel_"+i+"_8").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_9").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.moneda);
		jQuery("#t-cel_"+i+"_10").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.precio);
		jQuery("#t-cel_"+i+"_11").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.total_iva_monto);
		jQuery("#t-cel_"+i+"_12").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.codigo_dato);
		jQuery("#t-cel_"+i+"_13").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.nombre);
		jQuery("#t-cel_"+i+"_14").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.nombre_completo);
		jQuery("#t-cel_"+i+"_15").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.codigo_productos);
		jQuery("#t-cel_"+i+"_16").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.subtotal);
		jQuery("#t-cel_"+i+"_17").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.iva_monto);
		jQuery("#t-cel_"+i+"_18").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.otro_monto);
		jQuery("#t-cel_"+i+"_19").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.descuento_monto);
		jQuery("#t-cel_"+i+"_20").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.total);
		jQuery("#t-cel_"+i+"_21").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.costo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(estimados_porfechas_porbodegas_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(estimados_porfechas_porbodegas_control) {
		estimados_porfechas_porbodegas_funcion1.registrarControlesTableValidacionEdition(estimados_porfechas_porbodegas_control,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(estimados_porfechas_porbodegas_control) {
		jQuery("#divResumenestimados_porfechas_porbodegasActualAjaxWebPart").html(estimados_porfechas_porbodegas_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(estimados_porfechas_porbodegas_control) {
		//jQuery("#divAccionesRelacionesestimados_porfechas_porbodegasAjaxWebPart").html(estimados_porfechas_porbodegas_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("estimados_porfechas_porbodegas_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(estimados_porfechas_porbodegas_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesestimados_porfechas_porbodegasAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		estimados_porfechas_porbodegas_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(estimados_porfechas_porbodegas_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(estimados_porfechas_porbodegas_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(estimados_porfechas_porbodegas_control) {
		
		if(estimados_porfechas_porbodegas_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"Busquedaestimados_porfechas_porbodegas").attr("style",estimados_porfechas_porbodegas_control.strVisibleBusquedaestimados_porfechas_porbodegas);
			jQuery("#tblstrVisible"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"Busquedaestimados_porfechas_porbodegas").attr("style",estimados_porfechas_porbodegas_control.strVisibleBusquedaestimados_porfechas_porbodegas);
		}

		if(estimados_porfechas_porbodegas_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"BusquedaPorfechas").attr("style",estimados_porfechas_porbodegas_control.strVisibleBusquedaPorfechas);
			jQuery("#tblstrVisible"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"BusquedaPorfechas").attr("style",estimados_porfechas_porbodegas_control.strVisibleBusquedaPorfechas);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionestimados_porfechas_porbodegas();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("estimados_porfechas_porbodegas",id,"estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegasConstante,strParametros);
		
		//estimados_porfechas_porbodegas_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//estimados_porfechas_porbodegas_control
		
	
	}
	
	onLoadCombosDefectoFK(estimados_porfechas_porbodegas_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimados_porfechas_porbodegas_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(estimados_porfechas_porbodegas_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimados_porfechas_porbodegas_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(estimados_porfechas_porbodegas_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimados_porfechas_porbodegas_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(estimados_porfechas_porbodegas_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(estimados_porfechas_porbodegas_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimados_porfechas_porbodegas","Busquedaestimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimados_porfechas_porbodegas","BusquedaPorfechas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
		
			
			if(estimados_porfechas_porbodegas_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("estimados_porfechas_porbodegas");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("estimados_porfechas_porbodegas");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,"estimados_porfechas_porbodegas");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(estimados_porfechas_porbodegas_control) {
		
		jQuery("#divBusquedaestimados_porfechas_porbodegasAjaxWebPart").css("display",estimados_porfechas_porbodegas_control.strPermisoBusqueda);
		jQuery("#trestimados_porfechas_porbodegasCabeceraBusquedas").css("display",estimados_porfechas_porbodegas_control.strPermisoBusqueda);
		jQuery("#trBusquedaestimados_porfechas_porbodegas").css("display",estimados_porfechas_porbodegas_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteestimados_porfechas_porbodegas").css("display",estimados_porfechas_porbodegas_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosestimados_porfechas_porbodegas").attr("style",estimados_porfechas_porbodegas_control.strPermisoMostrarTodos);		
		
		if(estimados_porfechas_porbodegas_control.strPermisoNuevo!=null) {
			jQuery("#tdestimados_porfechas_porbodegasNuevo").css("display",estimados_porfechas_porbodegas_control.strPermisoNuevo);
			jQuery("#tdestimados_porfechas_porbodegasNuevoToolBar").css("display",estimados_porfechas_porbodegas_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdestimados_porfechas_porbodegasDuplicar").css("display",estimados_porfechas_porbodegas_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdestimados_porfechas_porbodegasDuplicarToolBar").css("display",estimados_porfechas_porbodegas_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdestimados_porfechas_porbodegasNuevoGuardarCambios").css("display",estimados_porfechas_porbodegas_control.strPermisoNuevo);
			jQuery("#tdestimados_porfechas_porbodegasNuevoGuardarCambiosToolBar").css("display",estimados_porfechas_porbodegas_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(estimados_porfechas_porbodegas_control.strPermisoActualizar!=null) {
			jQuery("#tdestimados_porfechas_porbodegasCopiar").css("display",estimados_porfechas_porbodegas_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestimados_porfechas_porbodegasCopiarToolBar").css("display",estimados_porfechas_porbodegas_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestimados_porfechas_porbodegasConEditar").css("display",estimados_porfechas_porbodegas_control.strPermisoActualizar);
		}
		
		jQuery("#tdestimados_porfechas_porbodegasGuardarCambios").css("display",estimados_porfechas_porbodegas_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdestimados_porfechas_porbodegasGuardarCambiosToolBar").css("display",estimados_porfechas_porbodegas_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdestimados_porfechas_porbodegasCerrarPagina").css("display",estimados_porfechas_porbodegas_control.strPermisoPopup);		
		jQuery("#tdestimados_porfechas_porbodegasCerrarPaginaToolBar").css("display",estimados_porfechas_porbodegas_control.strPermisoPopup);
		//jQuery("#trestimados_porfechas_porbodegasAccionesRelaciones").css("display",estimados_porfechas_porbodegas_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=estimados_porfechas_porbodegas_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estimados_porfechas_porbodegas_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + estimados_porfechas_porbodegas_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Estimados Porfechas Porbodegases";
		sTituloBanner+=" - " + estimados_porfechas_porbodegas_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estimados_porfechas_porbodegas_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdestimados_porfechas_porbodegasRelacionesToolBar").css("display",estimados_porfechas_porbodegas_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosestimados_porfechas_porbodegas").css("display",estimados_porfechas_porbodegas_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		estimados_porfechas_porbodegas_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		estimados_porfechas_porbodegas_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		estimados_porfechas_porbodegas_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		estimados_porfechas_porbodegas_webcontrol1.registrarEventosControles();
		
		if(estimados_porfechas_porbodegas_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO=="false") {
			estimados_porfechas_porbodegas_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONES=="true") {
			if(estimados_porfechas_porbodegas_constante1.BIT_ES_PAGINA_FORM==true) {
				estimados_porfechas_porbodegas_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(estimados_porfechas_porbodegas_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(estimados_porfechas_porbodegas_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				estimados_porfechas_porbodegas_webcontrol1.onLoad();
			
			//} else {
				//if(estimados_porfechas_porbodegas_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			estimados_porfechas_porbodegas_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);	
	}
}

var estimados_porfechas_porbodegas_webcontrol1=new estimados_porfechas_porbodegas_webcontrol();

if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = estimados_porfechas_porbodegas_webcontrol1.onLoadWindow; 
}

</script>