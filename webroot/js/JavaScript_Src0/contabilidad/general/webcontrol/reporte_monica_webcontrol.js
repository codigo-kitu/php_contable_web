//<script type="text/javascript" language="javascript">



//var reporte_monicaJQueryPaginaWebInteraccion= function (reporte_monica_control) {
//this.,this.,this.

class reporte_monica_webcontrol extends reporte_monica_webcontrol_add {
	
	reporte_monica_control=null;
	reporte_monica_controlInicial=null;
	reporte_monica_controlAuxiliar=null;
		
	//if(reporte_monica_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(reporte_monica_control) {
		super();
		
		this.reporte_monica_control=reporte_monica_control;
	}
		
	actualizarVariablesPagina(reporte_monica_control) {
		
		if(reporte_monica_control.action=="index" || reporte_monica_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(reporte_monica_control);
			
		} else if(reporte_monica_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(reporte_monica_control);
			
		} else if(reporte_monica_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(reporte_monica_control);
			
		} else if(reporte_monica_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(reporte_monica_control);		
		
		} else if(reporte_monica_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(reporte_monica_control);		
		
		} else if(reporte_monica_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(reporte_monica_control);		
		
		} else if(reporte_monica_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(reporte_monica_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(reporte_monica_control.action + " Revisar Manejo");
			
			if(reporte_monica_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(reporte_monica_control);
				
				return;
			}
			
			//if(reporte_monica_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(reporte_monica_control);
			//}
			
			if(reporte_monica_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(reporte_monica_control);
			}
			
			if(reporte_monica_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && reporte_monica_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(reporte_monica_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(reporte_monica_control, false);			
			}
			
			if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(reporte_monica_control);	
			}
			
			if(reporte_monica_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(reporte_monica_control);
			}
			
			if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(reporte_monica_control);
			}
			
			if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(reporte_monica_control);
			}
			
			if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(reporte_monica_control);	
			}
			
			if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
			}
			
			if(reporte_monica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(reporte_monica_control);
			}
			
			
			if(reporte_monica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(reporte_monica_control);			
			}
			
			if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(reporte_monica_control);
			}
			
			
			if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(reporte_monica_control);
			}
			
			if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(reporte_monica_control);
			}				
			
			if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(reporte_monica_control);
			}
			
			if(reporte_monica_control.usuarioActual!=null && reporte_monica_control.usuarioActual.field_strUserName!=null &&
			reporte_monica_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(reporte_monica_control);			
			}
		}
		
		
		if(reporte_monica_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(reporte_monica_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(reporte_monica_control) {
		
		this.actualizarPaginaCargaGeneral(reporte_monica_control);
		this.actualizarPaginaTablaDatos(reporte_monica_control);
		this.actualizarPaginaCargaGeneralControles(reporte_monica_control);
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(reporte_monica_control);
		this.actualizarPaginaAreaBusquedas(reporte_monica_control);
		this.actualizarPaginaCargaCombosFK(reporte_monica_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(reporte_monica_control) {
		
		this.actualizarPaginaCargaGeneral(reporte_monica_control);
		this.actualizarPaginaTablaDatos(reporte_monica_control);
		this.actualizarPaginaCargaGeneralControles(reporte_monica_control);
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(reporte_monica_control);
		this.actualizarPaginaAreaBusquedas(reporte_monica_control);
		this.actualizarPaginaCargaCombosFK(reporte_monica_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(reporte_monica_control) {
		this.actualizarPaginaTablaDatosAuxiliar(reporte_monica_control);		
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(reporte_monica_control) {
		this.actualizarPaginaTablaDatosAuxiliar(reporte_monica_control);		
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(reporte_monica_control) {
		this.actualizarPaginaTablaDatosAuxiliar(reporte_monica_control);		
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(reporte_monica_control) {
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(reporte_monica_control) {
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(reporte_monica_control) {
		this.actualizarPaginaCargaGeneralControles(reporte_monica_control);
		this.actualizarPaginaCargaCombosFK(reporte_monica_control);
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(reporte_monica_control) {
		this.actualizarPaginaAbrirLink(reporte_monica_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);				
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);
		this.actualizarPaginaFormulario(reporte_monica_control);
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);
		this.actualizarPaginaFormulario(reporte_monica_control);
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(reporte_monica_control) {
		this.actualizarPaginaFormulario(reporte_monica_control);
		this.onLoadCombosDefectoFK(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);
		this.actualizarPaginaFormulario(reporte_monica_control);
		this.onLoadCombosDefectoFK(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(reporte_monica_control) {
		this.actualizarPaginaCargaGeneralControles(reporte_monica_control);
		this.actualizarPaginaCargaCombosFK(reporte_monica_control);
		this.actualizarPaginaFormulario(reporte_monica_control);
		this.onLoadCombosDefectoFK(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(reporte_monica_control) {
		this.actualizarPaginaAbrirLink(reporte_monica_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(reporte_monica_control) {
		this.actualizarPaginaImprimir(reporte_monica_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(reporte_monica_control) {
		this.actualizarPaginaImprimir(reporte_monica_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(reporte_monica_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(reporte_monica_control) {
		//FORMULARIO
		if(reporte_monica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(reporte_monica_control);
			this.actualizarPaginaFormularioAdd(reporte_monica_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		//COMBOS FK
		if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(reporte_monica_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(reporte_monica_control) {
		//FORMULARIO
		if(reporte_monica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(reporte_monica_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);	
		//COMBOS FK
		if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(reporte_monica_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control) {
		if(reporte_monica_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && reporte_monica_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(reporte_monica_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(reporte_monica_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(reporte_monica_control) {
		if(reporte_monica_funcion1.esPaginaForm()==true) {
			window.opener.reporte_monica_webcontrol1.actualizarPaginaTablaDatos(reporte_monica_control);
		} else {
			this.actualizarPaginaTablaDatos(reporte_monica_control);
		}
	}
	
	actualizarPaginaAbrirLink(reporte_monica_control) {
		reporte_monica_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(reporte_monica_control.strAuxiliarUrlPagina);
				
		reporte_monica_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(reporte_monica_control.strAuxiliarTipo,reporte_monica_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(reporte_monica_control) {
		reporte_monica_funcion1.resaltarRestaurarDivMensaje(true,reporte_monica_control.strAuxiliarMensajeAlert,reporte_monica_control.strAuxiliarCssMensaje);
			
		if(reporte_monica_funcion1.esPaginaForm()==true) {
			window.opener.reporte_monica_funcion1.resaltarRestaurarDivMensaje(true,reporte_monica_control.strAuxiliarMensajeAlert,reporte_monica_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(reporte_monica_control) {
		eval(reporte_monica_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(reporte_monica_control, mostrar) {
		
		if(mostrar==true) {
			reporte_monica_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				reporte_monica_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			reporte_monica_funcion1.mostrarDivMensaje(true,reporte_monica_control.strAuxiliarMensaje,reporte_monica_control.strAuxiliarCssMensaje);
		
		} else {
			reporte_monica_funcion1.mostrarDivMensaje(false,reporte_monica_control.strAuxiliarMensaje,reporte_monica_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(reporte_monica_control) {
	
		funcionGeneral.printWebPartPage("reporte_monica",reporte_monica_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarreporte_monicasAjaxWebPart").html(reporte_monica_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("reporte_monica",jQuery("#divTablaDatosReporteAuxiliarreporte_monicasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(reporte_monica_control) {
		this.reporte_monica_controlInicial=reporte_monica_control;
			
		if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(reporte_monica_control.strStyleDivArbol,reporte_monica_control.strStyleDivContent
																,reporte_monica_control.strStyleDivOpcionesBanner,reporte_monica_control.strStyleDivExpandirColapsar
																,reporte_monica_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=reporte_monica_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",reporte_monica_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(reporte_monica_control) {
		jQuery("#divTablaDatosreporte_monicasAjaxWebPart").html(reporte_monica_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosreporte_monicas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosreporte_monicas=jQuery("#tblTablaDatosreporte_monicas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("reporte_monica",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',reporte_monica_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			reporte_monica_webcontrol1.registrarControlesTableEdition(reporte_monica_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		reporte_monica_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(reporte_monica_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(reporte_monica_control.reporte_monicaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(reporte_monica_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(reporte_monica_control) {
		this.actualizarCssBotonesPagina(reporte_monica_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(reporte_monica_control.tiposReportes,reporte_monica_control.tiposReporte
															 	,reporte_monica_control.tiposPaginacion,reporte_monica_control.tiposAcciones
																,reporte_monica_control.tiposColumnasSelect,reporte_monica_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(reporte_monica_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(reporte_monica_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(reporte_monica_control);			
	}
	
	actualizarPaginaAreaBusquedas(reporte_monica_control) {
		jQuery("#divBusquedareporte_monicaAjaxWebPart").css("display",reporte_monica_control.strPermisoBusqueda);
		jQuery("#trreporte_monicaCabeceraBusquedas").css("display",reporte_monica_control.strPermisoBusqueda);
		jQuery("#trBusquedareporte_monica").css("display",reporte_monica_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(reporte_monica_control.htmlTablaOrderBy!=null
			&& reporte_monica_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByreporte_monicaAjaxWebPart").html(reporte_monica_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//reporte_monica_webcontrol1.registrarOrderByActions();
			
		}
			
		if(reporte_monica_control.htmlTablaOrderByRel!=null
			&& reporte_monica_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelreporte_monicaAjaxWebPart").html(reporte_monica_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(reporte_monica_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedareporte_monicaAjaxWebPart").css("display","none");
			jQuery("#trreporte_monicaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedareporte_monica").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(reporte_monica_control) {
		jQuery("#tdreporte_monicaNuevo").css("display",reporte_monica_control.strPermisoNuevo);
		jQuery("#trreporte_monicaElementos").css("display",reporte_monica_control.strVisibleTablaElementos);
		jQuery("#trreporte_monicaAcciones").css("display",reporte_monica_control.strVisibleTablaAcciones);
		jQuery("#trreporte_monicaParametrosAcciones").css("display",reporte_monica_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(reporte_monica_control) {
	
		this.actualizarCssBotonesMantenimiento(reporte_monica_control);
				
		if(reporte_monica_control.reporte_monicaActual!=null) {//form
			
			this.actualizarCamposFormulario(reporte_monica_control);			
		}
						
		this.actualizarSpanMensajesCampos(reporte_monica_control);
	}
	
	actualizarPaginaUsuarioInvitado(reporte_monica_control) {
	
		var indexPosition=reporte_monica_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=reporte_monica_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(reporte_monica_control) {
		jQuery("#divResumenreporte_monicaActualAjaxWebPart").html(reporte_monica_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(reporte_monica_control) {
		jQuery("#divAccionesRelacionesreporte_monicaAjaxWebPart").html(reporte_monica_control.htmlTablaAccionesRelaciones);
			
		reporte_monica_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(reporte_monica_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(reporte_monica_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(reporte_monica_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionreporte_monica();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("reporte_monica",id,"general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(reporte_monica_control) {
	
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-id").val(reporte_monica_control.reporte_monicaActual.id);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-version_row").val(reporte_monica_control.reporte_monicaActual.versionRow);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-nombre").val(reporte_monica_control.reporte_monicaActual.nombre);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-descripcion").val(reporte_monica_control.reporte_monicaActual.descripcion);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-estado").val(reporte_monica_control.reporte_monicaActual.estado);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-modulo").val(reporte_monica_control.reporte_monicaActual.modulo);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-sub_modulo").val(reporte_monica_control.reporte_monicaActual.sub_modulo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+reporte_monica_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("reporte_monica","general","","form_reporte_monica",formulario,"","",paraEventoTabla,idFilaTabla,reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
	}
	
	cargarCombosFK(reporte_monica_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(reporte_monica_control.strRecargarFkTiposNinguno!=null && reporte_monica_control.strRecargarFkTiposNinguno!='NINGUNO' && reporte_monica_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(reporte_monica_control) {
		jQuery("#spanstrMensajeid").text(reporte_monica_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(reporte_monica_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenombre").text(reporte_monica_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(reporte_monica_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeestado").text(reporte_monica_control.strMensajeestado);		
		jQuery("#spanstrMensajemodulo").text(reporte_monica_control.strMensajemodulo);		
		jQuery("#spanstrMensajesub_modulo").text(reporte_monica_control.strMensajesub_modulo);		
	}
	
	actualizarCssBotonesMantenimiento(reporte_monica_control) {
		jQuery("#tdbtnNuevoreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoreporte_monica").css("display",reporte_monica_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarreporte_monica").css("display",reporte_monica_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarreporte_monica").css("display",reporte_monica_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosreporte_monica").css("display",reporte_monica_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(reporte_monica_control) {
		var i=0;
		
		i=reporte_monica_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(reporte_monica_control.reporte_monicaActual.id);
		jQuery("#t-version_row_"+i+"").val(reporte_monica_control.reporte_monicaActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(reporte_monica_control.reporte_monicaActual.nombre);
		jQuery("#t-cel_"+i+"_3").val(reporte_monica_control.reporte_monicaActual.descripcion);
		jQuery("#t-cel_"+i+"_4").val(reporte_monica_control.reporte_monicaActual.estado);
		jQuery("#t-cel_"+i+"_5").val(reporte_monica_control.reporte_monicaActual.modulo);
		jQuery("#t-cel_"+i+"_6").val(reporte_monica_control.reporte_monicaActual.sub_modulo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(reporte_monica_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(reporte_monica_control) {
		reporte_monica_funcion1.registrarControlesTableValidacionEdition(reporte_monica_control,reporte_monica_webcontrol1,reporte_monica_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monicaConstante,strParametros);
		
		//reporte_monica_funcion1.cancelarOnComplete();
	}	
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//reporte_monica_control
		
	
	}
	
	onLoadCombosDefectoFK(reporte_monica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(reporte_monica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(reporte_monica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(reporte_monica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(reporte_monica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(reporte_monica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(reporte_monica_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("reporte_monica");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("reporte_monica");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(reporte_monica_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);			
			
			if(reporte_monica_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,"reporte_monica");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			reporte_monica_funcion1.validarFormularioJQuery(reporte_monica_constante1);
			
			if(reporte_monica_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(reporte_monica_control) {
		
		jQuery("#divBusquedareporte_monicaAjaxWebPart").css("display",reporte_monica_control.strPermisoBusqueda);
		jQuery("#trreporte_monicaCabeceraBusquedas").css("display",reporte_monica_control.strPermisoBusqueda);
		jQuery("#trBusquedareporte_monica").css("display",reporte_monica_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportereporte_monica").css("display",reporte_monica_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosreporte_monica").attr("style",reporte_monica_control.strPermisoMostrarTodos);
		
		if(reporte_monica_control.strPermisoNuevo!=null) {
			jQuery("#tdreporte_monicaNuevo").css("display",reporte_monica_control.strPermisoNuevo);
			jQuery("#tdreporte_monicaNuevoToolBar").css("display",reporte_monica_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdreporte_monicaDuplicar").css("display",reporte_monica_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdreporte_monicaDuplicarToolBar").css("display",reporte_monica_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdreporte_monicaNuevoGuardarCambios").css("display",reporte_monica_control.strPermisoNuevo);
			jQuery("#tdreporte_monicaNuevoGuardarCambiosToolBar").css("display",reporte_monica_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(reporte_monica_control.strPermisoActualizar!=null) {
			jQuery("#tdreporte_monicaActualizarToolBar").css("display",reporte_monica_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdreporte_monicaCopiar").css("display",reporte_monica_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdreporte_monicaCopiarToolBar").css("display",reporte_monica_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdreporte_monicaConEditar").css("display",reporte_monica_control.strPermisoActualizar);
		}
		
		jQuery("#tdreporte_monicaEliminarToolBar").css("display",reporte_monica_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdreporte_monicaGuardarCambios").css("display",reporte_monica_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdreporte_monicaGuardarCambiosToolBar").css("display",reporte_monica_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trreporte_monicaElementos").css("display",reporte_monica_control.strVisibleTablaElementos);
		
		jQuery("#trreporte_monicaAcciones").css("display",reporte_monica_control.strVisibleTablaAcciones);
		jQuery("#trreporte_monicaParametrosAcciones").css("display",reporte_monica_control.strVisibleTablaAcciones);
			
		jQuery("#tdreporte_monicaCerrarPagina").css("display",reporte_monica_control.strPermisoPopup);		
		jQuery("#tdreporte_monicaCerrarPaginaToolBar").css("display",reporte_monica_control.strPermisoPopup);
		//jQuery("#trreporte_monicaAccionesRelaciones").css("display",reporte_monica_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		reporte_monica_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		reporte_monica_webcontrol1.registrarEventosControles();
		
		if(reporte_monica_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
			reporte_monica_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(reporte_monica_constante1.STR_ES_RELACIONES=="true") {
			if(reporte_monica_constante1.BIT_ES_PAGINA_FORM==true) {
				reporte_monica_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(reporte_monica_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(reporte_monica_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				reporte_monica_webcontrol1.onLoad();
				
			} else {
				if(reporte_monica_constante1.BIT_ES_PAGINA_FORM==true) {
					if(reporte_monica_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
						//reporte_monica_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(reporte_monica_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(reporte_monica_constante1.BIG_ID_ACTUAL,"reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
						//reporte_monica_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			reporte_monica_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var reporte_monica_webcontrol1=new reporte_monica_webcontrol();

if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = reporte_monica_webcontrol1.onLoadWindow; 
}

//</script>