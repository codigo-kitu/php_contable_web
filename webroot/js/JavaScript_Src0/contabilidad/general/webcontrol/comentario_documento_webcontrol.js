//<script type="text/javascript" language="javascript">



//var comentario_documentoJQueryPaginaWebInteraccion= function (comentario_documento_control) {
//this.,this.,this.

class comentario_documento_webcontrol extends comentario_documento_webcontrol_add {
	
	comentario_documento_control=null;
	comentario_documento_controlInicial=null;
	comentario_documento_controlAuxiliar=null;
		
	//if(comentario_documento_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(comentario_documento_control) {
		super();
		
		this.comentario_documento_control=comentario_documento_control;
	}
		
	actualizarVariablesPagina(comentario_documento_control) {
		
		if(comentario_documento_control.action=="index" || comentario_documento_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(comentario_documento_control);
			
		} else if(comentario_documento_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(comentario_documento_control);
			
		} else if(comentario_documento_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(comentario_documento_control);
			
		} else if(comentario_documento_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(comentario_documento_control);		
		
		} else if(comentario_documento_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(comentario_documento_control);		
		
		} else if(comentario_documento_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(comentario_documento_control);		
		
		} else if(comentario_documento_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(comentario_documento_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(comentario_documento_control.action + " Revisar Manejo");
			
			if(comentario_documento_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(comentario_documento_control);
				
				return;
			}
			
			//if(comentario_documento_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(comentario_documento_control);
			//}
			
			if(comentario_documento_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(comentario_documento_control);
			}
			
			if(comentario_documento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && comentario_documento_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(comentario_documento_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(comentario_documento_control, false);			
			}
			
			if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(comentario_documento_control);	
			}
			
			if(comentario_documento_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(comentario_documento_control);
			}
			
			if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(comentario_documento_control);
			}
			
			if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(comentario_documento_control);
			}
			
			if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(comentario_documento_control);	
			}
			
			if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
			}
			
			if(comentario_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(comentario_documento_control);
			}
			
			
			if(comentario_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(comentario_documento_control);			
			}
			
			if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(comentario_documento_control);
			}
			
			
			if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(comentario_documento_control);
			}
			
			if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(comentario_documento_control);
			}				
			
			if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(comentario_documento_control);
			}
			
			if(comentario_documento_control.usuarioActual!=null && comentario_documento_control.usuarioActual.field_strUserName!=null &&
			comentario_documento_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(comentario_documento_control);			
			}
		}
		
		
		if(comentario_documento_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(comentario_documento_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(comentario_documento_control) {
		
		this.actualizarPaginaCargaGeneral(comentario_documento_control);
		this.actualizarPaginaTablaDatos(comentario_documento_control);
		this.actualizarPaginaCargaGeneralControles(comentario_documento_control);
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(comentario_documento_control);
		this.actualizarPaginaAreaBusquedas(comentario_documento_control);
		this.actualizarPaginaCargaCombosFK(comentario_documento_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(comentario_documento_control) {
		
		this.actualizarPaginaCargaGeneral(comentario_documento_control);
		this.actualizarPaginaTablaDatos(comentario_documento_control);
		this.actualizarPaginaCargaGeneralControles(comentario_documento_control);
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(comentario_documento_control);
		this.actualizarPaginaAreaBusquedas(comentario_documento_control);
		this.actualizarPaginaCargaCombosFK(comentario_documento_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(comentario_documento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(comentario_documento_control);		
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(comentario_documento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(comentario_documento_control);		
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(comentario_documento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(comentario_documento_control);		
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(comentario_documento_control) {
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(comentario_documento_control) {
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(comentario_documento_control) {
		this.actualizarPaginaCargaGeneralControles(comentario_documento_control);
		this.actualizarPaginaCargaCombosFK(comentario_documento_control);
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(comentario_documento_control) {
		this.actualizarPaginaAbrirLink(comentario_documento_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);				
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);
		this.actualizarPaginaFormulario(comentario_documento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);
		this.actualizarPaginaFormulario(comentario_documento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(comentario_documento_control) {
		this.actualizarPaginaFormulario(comentario_documento_control);
		this.onLoadCombosDefectoFK(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);
		this.actualizarPaginaFormulario(comentario_documento_control);
		this.onLoadCombosDefectoFK(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(comentario_documento_control) {
		this.actualizarPaginaCargaGeneralControles(comentario_documento_control);
		this.actualizarPaginaCargaCombosFK(comentario_documento_control);
		this.actualizarPaginaFormulario(comentario_documento_control);
		this.onLoadCombosDefectoFK(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(comentario_documento_control) {
		this.actualizarPaginaAbrirLink(comentario_documento_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(comentario_documento_control) {
		this.actualizarPaginaImprimir(comentario_documento_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(comentario_documento_control) {
		this.actualizarPaginaImprimir(comentario_documento_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(comentario_documento_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(comentario_documento_control) {
		//FORMULARIO
		if(comentario_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(comentario_documento_control);
			this.actualizarPaginaFormularioAdd(comentario_documento_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		//COMBOS FK
		if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(comentario_documento_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(comentario_documento_control) {
		//FORMULARIO
		if(comentario_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(comentario_documento_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);	
		//COMBOS FK
		if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(comentario_documento_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control) {
		if(comentario_documento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && comentario_documento_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(comentario_documento_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(comentario_documento_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(comentario_documento_control) {
		if(comentario_documento_funcion1.esPaginaForm()==true) {
			window.opener.comentario_documento_webcontrol1.actualizarPaginaTablaDatos(comentario_documento_control);
		} else {
			this.actualizarPaginaTablaDatos(comentario_documento_control);
		}
	}
	
	actualizarPaginaAbrirLink(comentario_documento_control) {
		comentario_documento_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(comentario_documento_control.strAuxiliarUrlPagina);
				
		comentario_documento_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(comentario_documento_control.strAuxiliarTipo,comentario_documento_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(comentario_documento_control) {
		comentario_documento_funcion1.resaltarRestaurarDivMensaje(true,comentario_documento_control.strAuxiliarMensajeAlert,comentario_documento_control.strAuxiliarCssMensaje);
			
		if(comentario_documento_funcion1.esPaginaForm()==true) {
			window.opener.comentario_documento_funcion1.resaltarRestaurarDivMensaje(true,comentario_documento_control.strAuxiliarMensajeAlert,comentario_documento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(comentario_documento_control) {
		eval(comentario_documento_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(comentario_documento_control, mostrar) {
		
		if(mostrar==true) {
			comentario_documento_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				comentario_documento_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			comentario_documento_funcion1.mostrarDivMensaje(true,comentario_documento_control.strAuxiliarMensaje,comentario_documento_control.strAuxiliarCssMensaje);
		
		} else {
			comentario_documento_funcion1.mostrarDivMensaje(false,comentario_documento_control.strAuxiliarMensaje,comentario_documento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(comentario_documento_control) {
	
		funcionGeneral.printWebPartPage("comentario_documento",comentario_documento_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcomentario_documentosAjaxWebPart").html(comentario_documento_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("comentario_documento",jQuery("#divTablaDatosReporteAuxiliarcomentario_documentosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(comentario_documento_control) {
		this.comentario_documento_controlInicial=comentario_documento_control;
			
		if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(comentario_documento_control.strStyleDivArbol,comentario_documento_control.strStyleDivContent
																,comentario_documento_control.strStyleDivOpcionesBanner,comentario_documento_control.strStyleDivExpandirColapsar
																,comentario_documento_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=comentario_documento_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",comentario_documento_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(comentario_documento_control) {
		jQuery("#divTablaDatoscomentario_documentosAjaxWebPart").html(comentario_documento_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscomentario_documentos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscomentario_documentos=jQuery("#tblTablaDatoscomentario_documentos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("comentario_documento",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',comentario_documento_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			comentario_documento_webcontrol1.registrarControlesTableEdition(comentario_documento_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		comentario_documento_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(comentario_documento_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(comentario_documento_control.comentario_documentoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(comentario_documento_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(comentario_documento_control) {
		this.actualizarCssBotonesPagina(comentario_documento_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(comentario_documento_control.tiposReportes,comentario_documento_control.tiposReporte
															 	,comentario_documento_control.tiposPaginacion,comentario_documento_control.tiposAcciones
																,comentario_documento_control.tiposColumnasSelect,comentario_documento_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(comentario_documento_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(comentario_documento_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(comentario_documento_control);			
	}
	
	actualizarPaginaAreaBusquedas(comentario_documento_control) {
		jQuery("#divBusquedacomentario_documentoAjaxWebPart").css("display",comentario_documento_control.strPermisoBusqueda);
		jQuery("#trcomentario_documentoCabeceraBusquedas").css("display",comentario_documento_control.strPermisoBusqueda);
		jQuery("#trBusquedacomentario_documento").css("display",comentario_documento_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(comentario_documento_control.htmlTablaOrderBy!=null
			&& comentario_documento_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycomentario_documentoAjaxWebPart").html(comentario_documento_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//comentario_documento_webcontrol1.registrarOrderByActions();
			
		}
			
		if(comentario_documento_control.htmlTablaOrderByRel!=null
			&& comentario_documento_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcomentario_documentoAjaxWebPart").html(comentario_documento_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(comentario_documento_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacomentario_documentoAjaxWebPart").css("display","none");
			jQuery("#trcomentario_documentoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacomentario_documento").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(comentario_documento_control) {
		jQuery("#tdcomentario_documentoNuevo").css("display",comentario_documento_control.strPermisoNuevo);
		jQuery("#trcomentario_documentoElementos").css("display",comentario_documento_control.strVisibleTablaElementos);
		jQuery("#trcomentario_documentoAcciones").css("display",comentario_documento_control.strVisibleTablaAcciones);
		jQuery("#trcomentario_documentoParametrosAcciones").css("display",comentario_documento_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(comentario_documento_control) {
	
		this.actualizarCssBotonesMantenimiento(comentario_documento_control);
				
		if(comentario_documento_control.comentario_documentoActual!=null) {//form
			
			this.actualizarCamposFormulario(comentario_documento_control);			
		}
						
		this.actualizarSpanMensajesCampos(comentario_documento_control);
	}
	
	actualizarPaginaUsuarioInvitado(comentario_documento_control) {
	
		var indexPosition=comentario_documento_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=comentario_documento_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(comentario_documento_control) {
		jQuery("#divResumencomentario_documentoActualAjaxWebPart").html(comentario_documento_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(comentario_documento_control) {
		jQuery("#divAccionesRelacionescomentario_documentoAjaxWebPart").html(comentario_documento_control.htmlTablaAccionesRelaciones);
			
		comentario_documento_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(comentario_documento_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(comentario_documento_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(comentario_documento_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncomentario_documento();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("comentario_documento",id,"general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(comentario_documento_control) {
	
		jQuery("#form"+comentario_documento_constante1.STR_SUFIJO+"-id").val(comentario_documento_control.comentario_documentoActual.id);
		jQuery("#form"+comentario_documento_constante1.STR_SUFIJO+"-version_row").val(comentario_documento_control.comentario_documentoActual.versionRow);
		jQuery("#form"+comentario_documento_constante1.STR_SUFIJO+"-tipo_documento").val(comentario_documento_control.comentario_documentoActual.tipo_documento);
		jQuery("#form"+comentario_documento_constante1.STR_SUFIJO+"-comentario").val(comentario_documento_control.comentario_documentoActual.comentario);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+comentario_documento_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("comentario_documento","general","","form_comentario_documento",formulario,"","",paraEventoTabla,idFilaTabla,comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
	}
	
	cargarCombosFK(comentario_documento_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(comentario_documento_control.strRecargarFkTiposNinguno!=null && comentario_documento_control.strRecargarFkTiposNinguno!='NINGUNO' && comentario_documento_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(comentario_documento_control) {
		jQuery("#spanstrMensajeid").text(comentario_documento_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(comentario_documento_control.strMensajeversion_row);		
		jQuery("#spanstrMensajetipo_documento").text(comentario_documento_control.strMensajetipo_documento);		
		jQuery("#spanstrMensajecomentario").text(comentario_documento_control.strMensajecomentario);		
	}
	
	actualizarCssBotonesMantenimiento(comentario_documento_control) {
		jQuery("#tdbtnNuevocomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocomentario_documento").css("display",comentario_documento_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcomentario_documento").css("display",comentario_documento_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcomentario_documento").css("display",comentario_documento_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscomentario_documento").css("display",comentario_documento_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(comentario_documento_control) {
		var i=0;
		
		i=comentario_documento_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(comentario_documento_control.comentario_documentoActual.id);
		jQuery("#t-version_row_"+i+"").val(comentario_documento_control.comentario_documentoActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(comentario_documento_control.comentario_documentoActual.tipo_documento);
		jQuery("#t-cel_"+i+"_3").val(comentario_documento_control.comentario_documentoActual.comentario);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(comentario_documento_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(comentario_documento_control) {
		comentario_documento_funcion1.registrarControlesTableValidacionEdition(comentario_documento_control,comentario_documento_webcontrol1,comentario_documento_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documentoConstante,strParametros);
		
		//comentario_documento_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//comentario_documento_control
		
	
	}
	
	onLoadCombosDefectoFK(comentario_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(comentario_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(comentario_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(comentario_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(comentario_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(comentario_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(comentario_documento_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("comentario_documento");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("comentario_documento");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(comentario_documento_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);			
			
			if(comentario_documento_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,"comentario_documento");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			comentario_documento_funcion1.validarFormularioJQuery(comentario_documento_constante1);
			
			if(comentario_documento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(comentario_documento_control) {
		
		jQuery("#divBusquedacomentario_documentoAjaxWebPart").css("display",comentario_documento_control.strPermisoBusqueda);
		jQuery("#trcomentario_documentoCabeceraBusquedas").css("display",comentario_documento_control.strPermisoBusqueda);
		jQuery("#trBusquedacomentario_documento").css("display",comentario_documento_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecomentario_documento").css("display",comentario_documento_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscomentario_documento").attr("style",comentario_documento_control.strPermisoMostrarTodos);
		
		if(comentario_documento_control.strPermisoNuevo!=null) {
			jQuery("#tdcomentario_documentoNuevo").css("display",comentario_documento_control.strPermisoNuevo);
			jQuery("#tdcomentario_documentoNuevoToolBar").css("display",comentario_documento_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcomentario_documentoDuplicar").css("display",comentario_documento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcomentario_documentoDuplicarToolBar").css("display",comentario_documento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcomentario_documentoNuevoGuardarCambios").css("display",comentario_documento_control.strPermisoNuevo);
			jQuery("#tdcomentario_documentoNuevoGuardarCambiosToolBar").css("display",comentario_documento_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(comentario_documento_control.strPermisoActualizar!=null) {
			jQuery("#tdcomentario_documentoActualizarToolBar").css("display",comentario_documento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcomentario_documentoCopiar").css("display",comentario_documento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcomentario_documentoCopiarToolBar").css("display",comentario_documento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcomentario_documentoConEditar").css("display",comentario_documento_control.strPermisoActualizar);
		}
		
		jQuery("#tdcomentario_documentoEliminarToolBar").css("display",comentario_documento_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcomentario_documentoGuardarCambios").css("display",comentario_documento_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcomentario_documentoGuardarCambiosToolBar").css("display",comentario_documento_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcomentario_documentoElementos").css("display",comentario_documento_control.strVisibleTablaElementos);
		
		jQuery("#trcomentario_documentoAcciones").css("display",comentario_documento_control.strVisibleTablaAcciones);
		jQuery("#trcomentario_documentoParametrosAcciones").css("display",comentario_documento_control.strVisibleTablaAcciones);
			
		jQuery("#tdcomentario_documentoCerrarPagina").css("display",comentario_documento_control.strPermisoPopup);		
		jQuery("#tdcomentario_documentoCerrarPaginaToolBar").css("display",comentario_documento_control.strPermisoPopup);
		//jQuery("#trcomentario_documentoAccionesRelaciones").css("display",comentario_documento_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		comentario_documento_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		comentario_documento_webcontrol1.registrarEventosControles();
		
		if(comentario_documento_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
			comentario_documento_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(comentario_documento_constante1.STR_ES_RELACIONES=="true") {
			if(comentario_documento_constante1.BIT_ES_PAGINA_FORM==true) {
				comentario_documento_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(comentario_documento_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(comentario_documento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				comentario_documento_webcontrol1.onLoad();
				
			} else {
				if(comentario_documento_constante1.BIT_ES_PAGINA_FORM==true) {
					if(comentario_documento_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
						//comentario_documento_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(comentario_documento_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(comentario_documento_constante1.BIG_ID_ACTUAL,"comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
						//comentario_documento_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			comentario_documento_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var comentario_documento_webcontrol1=new comentario_documento_webcontrol();

if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = comentario_documento_webcontrol1.onLoadWindow; 
}

//</script>