//<script type="text/javascript" language="javascript">



//var otro_documentoJQueryPaginaWebInteraccion= function (otro_documento_control) {
//this.,this.,this.

class otro_documento_webcontrol extends otro_documento_webcontrol_add {
	
	otro_documento_control=null;
	otro_documento_controlInicial=null;
	otro_documento_controlAuxiliar=null;
		
	//if(otro_documento_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(otro_documento_control) {
		super();
		
		this.otro_documento_control=otro_documento_control;
	}
		
	actualizarVariablesPagina(otro_documento_control) {
		
		if(otro_documento_control.action=="index" || otro_documento_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(otro_documento_control);
			
		} else if(otro_documento_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_documento_control);
		
		} else if(otro_documento_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(otro_documento_control);
		
		} else if(otro_documento_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_documento_control);
		
		} else if(otro_documento_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(otro_documento_control);
			
		} else if(otro_documento_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(otro_documento_control);
			
		} else if(otro_documento_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_documento_control);
		
		} else if(otro_documento_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_documento_control);
		
		} else if(otro_documento_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(otro_documento_control);
		
		} else if(otro_documento_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(otro_documento_control);
		
		} else if(otro_documento_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(otro_documento_control);
		
		} else if(otro_documento_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(otro_documento_control);
		
		} else if(otro_documento_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(otro_documento_control);
		
		} else if(otro_documento_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(otro_documento_control);
		
		} else if(otro_documento_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(otro_documento_control);
		
		} else if(otro_documento_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(otro_documento_control);
		
		} else if(otro_documento_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_documento_control);
		
		} else if(otro_documento_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_documento_control);
		
		} else if(otro_documento_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(otro_documento_control);
		
		} else if(otro_documento_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(otro_documento_control);
		
		} else if(otro_documento_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(otro_documento_control);
		
		} else if(otro_documento_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(otro_documento_control);
		
		} else if(otro_documento_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_documento_control);
		
		} else if(otro_documento_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_documento_control);
		
		} else if(otro_documento_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_documento_control);
		
		} else if(otro_documento_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(otro_documento_control);
		
		} else if(otro_documento_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_documento_control);
		
		} else if(otro_documento_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_documento_control);		
		
		} else if(otro_documento_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(otro_documento_control);		
		
		} else if(otro_documento_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_documento_control);		
		
		} else if(otro_documento_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(otro_documento_control);		
		}
		else if(otro_documento_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(otro_documento_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(otro_documento_control.action + " Revisar Manejo");
			
			if(otro_documento_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(otro_documento_control);
				
				return;
			}
			
			//if(otro_documento_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(otro_documento_control);
			//}
			
			if(otro_documento_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(otro_documento_control);
			}
			
			if(otro_documento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_documento_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(otro_documento_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(otro_documento_control, false);			
			}
			
			if(otro_documento_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(otro_documento_control);	
			}
			
			if(otro_documento_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(otro_documento_control);
			}
			
			if(otro_documento_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(otro_documento_control);
			}
			
			if(otro_documento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(otro_documento_control);
			}
			
			if(otro_documento_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(otro_documento_control);	
			}
			
			if(otro_documento_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(otro_documento_control);
			}
			
			if(otro_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(otro_documento_control);
			}
			
			
			if(otro_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(otro_documento_control);			
			}
			
			if(otro_documento_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(otro_documento_control);
			}
			
			
			if(otro_documento_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(otro_documento_control);
			}
			
			if(otro_documento_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(otro_documento_control);
			}				
			
			if(otro_documento_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_documento_control);
			}
			
			if(otro_documento_control.usuarioActual!=null && otro_documento_control.usuarioActual.field_strUserName!=null &&
			otro_documento_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(otro_documento_control);			
			}
		}
		
		
		if(otro_documento_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(otro_documento_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(otro_documento_control) {
		
		this.actualizarPaginaCargaGeneral(otro_documento_control);
		this.actualizarPaginaTablaDatos(otro_documento_control);
		this.actualizarPaginaCargaGeneralControles(otro_documento_control);
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_documento_control);
		this.actualizarPaginaAreaBusquedas(otro_documento_control);
		this.actualizarPaginaCargaCombosFK(otro_documento_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_documento_control) {
		
		this.actualizarPaginaCargaGeneral(otro_documento_control);
		this.actualizarPaginaTablaDatos(otro_documento_control);
		this.actualizarPaginaCargaGeneralControles(otro_documento_control);
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_documento_control);
		this.actualizarPaginaAreaBusquedas(otro_documento_control);
		this.actualizarPaginaCargaCombosFK(otro_documento_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(otro_documento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_documento_control);		
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(otro_documento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_documento_control);		
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(otro_documento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_documento_control);		
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(otro_documento_control) {
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(otro_documento_control) {
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_documento_control) {
		this.actualizarPaginaCargaGeneralControles(otro_documento_control);
		this.actualizarPaginaCargaCombosFK(otro_documento_control);
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_documento_control) {
		this.actualizarPaginaAbrirLink(otro_documento_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);				
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);
		this.actualizarPaginaFormulario(otro_documento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);
		this.actualizarPaginaFormulario(otro_documento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(otro_documento_control) {
		this.actualizarPaginaFormulario(otro_documento_control);
		this.onLoadCombosDefectoFK(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);
		this.actualizarPaginaFormulario(otro_documento_control);
		this.onLoadCombosDefectoFK(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_documento_control) {
		this.actualizarPaginaCargaGeneralControles(otro_documento_control);
		this.actualizarPaginaCargaCombosFK(otro_documento_control);
		this.actualizarPaginaFormulario(otro_documento_control);
		this.onLoadCombosDefectoFK(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_documento_control) {
		this.actualizarPaginaAbrirLink(otro_documento_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_documento_control) {
		this.actualizarPaginaImprimir(otro_documento_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_documento_control) {
		this.actualizarPaginaImprimir(otro_documento_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(otro_documento_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_documento_control) {
		//FORMULARIO
		if(otro_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_documento_control);
			this.actualizarPaginaFormularioAdd(otro_documento_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		//COMBOS FK
		if(otro_documento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_documento_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(otro_documento_control) {
		//FORMULARIO
		if(otro_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_documento_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);	
		//COMBOS FK
		if(otro_documento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_documento_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(otro_documento_control) {
		//FORMULARIO
		if(otro_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_documento_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(otro_documento_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);	
		//COMBOS FK
		if(otro_documento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_documento_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(otro_documento_control) {
		if(otro_documento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_documento_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(otro_documento_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(otro_documento_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(otro_documento_control) {
		if(otro_documento_funcion1.esPaginaForm()==true) {
			window.opener.otro_documento_webcontrol1.actualizarPaginaTablaDatos(otro_documento_control);
		} else {
			this.actualizarPaginaTablaDatos(otro_documento_control);
		}
	}
	
	actualizarPaginaAbrirLink(otro_documento_control) {
		otro_documento_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(otro_documento_control.strAuxiliarUrlPagina);
				
		otro_documento_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(otro_documento_control.strAuxiliarTipo,otro_documento_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(otro_documento_control) {
		otro_documento_funcion1.resaltarRestaurarDivMensaje(true,otro_documento_control.strAuxiliarMensajeAlert,otro_documento_control.strAuxiliarCssMensaje);
			
		if(otro_documento_funcion1.esPaginaForm()==true) {
			window.opener.otro_documento_funcion1.resaltarRestaurarDivMensaje(true,otro_documento_control.strAuxiliarMensajeAlert,otro_documento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(otro_documento_control) {
		eval(otro_documento_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(otro_documento_control, mostrar) {
		
		if(mostrar==true) {
			otro_documento_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				otro_documento_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			otro_documento_funcion1.mostrarDivMensaje(true,otro_documento_control.strAuxiliarMensaje,otro_documento_control.strAuxiliarCssMensaje);
		
		} else {
			otro_documento_funcion1.mostrarDivMensaje(false,otro_documento_control.strAuxiliarMensaje,otro_documento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(otro_documento_control) {
	
		funcionGeneral.printWebPartPage("otro_documento",otro_documento_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarotro_documentosAjaxWebPart").html(otro_documento_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("otro_documento",jQuery("#divTablaDatosReporteAuxiliarotro_documentosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(otro_documento_control) {
		this.otro_documento_controlInicial=otro_documento_control;
			
		if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(otro_documento_control.strStyleDivArbol,otro_documento_control.strStyleDivContent
																,otro_documento_control.strStyleDivOpcionesBanner,otro_documento_control.strStyleDivExpandirColapsar
																,otro_documento_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=otro_documento_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",otro_documento_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(otro_documento_control) {
		jQuery("#divTablaDatosotro_documentosAjaxWebPart").html(otro_documento_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosotro_documentos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosotro_documentos=jQuery("#tblTablaDatosotro_documentos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("otro_documento",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',otro_documento_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			otro_documento_webcontrol1.registrarControlesTableEdition(otro_documento_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		otro_documento_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(otro_documento_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(otro_documento_control.otro_documentoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(otro_documento_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(otro_documento_control) {
		this.actualizarCssBotonesPagina(otro_documento_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(otro_documento_control.tiposReportes,otro_documento_control.tiposReporte
															 	,otro_documento_control.tiposPaginacion,otro_documento_control.tiposAcciones
																,otro_documento_control.tiposColumnasSelect,otro_documento_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(otro_documento_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(otro_documento_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(otro_documento_control);			
	}
	
	actualizarPaginaAreaBusquedas(otro_documento_control) {
		jQuery("#divBusquedaotro_documentoAjaxWebPart").css("display",otro_documento_control.strPermisoBusqueda);
		jQuery("#trotro_documentoCabeceraBusquedas").css("display",otro_documento_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_documento").css("display",otro_documento_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(otro_documento_control.htmlTablaOrderBy!=null
			&& otro_documento_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByotro_documentoAjaxWebPart").html(otro_documento_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//otro_documento_webcontrol1.registrarOrderByActions();
			
		}
			
		if(otro_documento_control.htmlTablaOrderByRel!=null
			&& otro_documento_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelotro_documentoAjaxWebPart").html(otro_documento_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(otro_documento_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaotro_documentoAjaxWebPart").css("display","none");
			jQuery("#trotro_documentoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaotro_documento").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(otro_documento_control) {
		jQuery("#tdotro_documentoNuevo").css("display",otro_documento_control.strPermisoNuevo);
		jQuery("#trotro_documentoElementos").css("display",otro_documento_control.strVisibleTablaElementos);
		jQuery("#trotro_documentoAcciones").css("display",otro_documento_control.strVisibleTablaAcciones);
		jQuery("#trotro_documentoParametrosAcciones").css("display",otro_documento_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(otro_documento_control) {
	
		this.actualizarCssBotonesMantenimiento(otro_documento_control);
				
		if(otro_documento_control.otro_documentoActual!=null) {//form
			
			this.actualizarCamposFormulario(otro_documento_control);			
		}
						
		this.actualizarSpanMensajesCampos(otro_documento_control);
	}
	
	actualizarPaginaUsuarioInvitado(otro_documento_control) {
	
		var indexPosition=otro_documento_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=otro_documento_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(otro_documento_control) {
		jQuery("#divResumenotro_documentoActualAjaxWebPart").html(otro_documento_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_documento_control) {
		jQuery("#divAccionesRelacionesotro_documentoAjaxWebPart").html(otro_documento_control.htmlTablaAccionesRelaciones);
			
		otro_documento_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(otro_documento_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(otro_documento_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(otro_documento_control) {
		
		if(otro_documento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo").attr("style",otro_documento_control.strVisibleFK_Idarchivo);
			jQuery("#tblstrVisible"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo").attr("style",otro_documento_control.strVisibleFK_Idarchivo);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionotro_documento();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("otro_documento",id,"general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);		
	}
	
	

	abrirBusquedaParaarchivo(strNombreCampoBusqueda){//idActual
		otro_documento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("otro_documento","archivo","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(otro_documento_control) {
	
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id").val(otro_documento_control.otro_documentoActual.id);
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-version_row").val(otro_documento_control.otro_documentoActual.versionRow);
		
		if(otro_documento_control.otro_documentoActual.id_archivo!=null && otro_documento_control.otro_documentoActual.id_archivo>-1){
			if(jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val() != otro_documento_control.otro_documentoActual.id_archivo) {
				jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val(otro_documento_control.otro_documentoActual.id_archivo).trigger("change");
			}
		} else { 
			//jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").select2("val", null);
			if(jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-nombre").val(otro_documento_control.otro_documentoActual.nombre);
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-data").val(otro_documento_control.otro_documentoActual.data);
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-campo1").val(otro_documento_control.otro_documentoActual.campo1);
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-campo2").val(otro_documento_control.otro_documentoActual.campo2);
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-campo3").val(otro_documento_control.otro_documentoActual.campo3);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+otro_documento_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("otro_documento","general","","form_otro_documento",formulario,"","",paraEventoTabla,idFilaTabla,otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
	}
	
	cargarCombosFK(otro_documento_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(otro_documento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_archivo",otro_documento_control.strRecargarFkTipos,",")) { 
				otro_documento_webcontrol1.cargarCombosarchivosFK(otro_documento_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(otro_documento_control.strRecargarFkTiposNinguno!=null && otro_documento_control.strRecargarFkTiposNinguno!='NINGUNO' && otro_documento_control.strRecargarFkTiposNinguno!='') {
			
				if(otro_documento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_archivo",otro_documento_control.strRecargarFkTiposNinguno,",")) { 
					otro_documento_webcontrol1.cargarCombosarchivosFK(otro_documento_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(otro_documento_control) {
		jQuery("#spanstrMensajeid").text(otro_documento_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(otro_documento_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_archivo").text(otro_documento_control.strMensajeid_archivo);		
		jQuery("#spanstrMensajenombre").text(otro_documento_control.strMensajenombre);		
		jQuery("#spanstrMensajedata").text(otro_documento_control.strMensajedata);		
		jQuery("#spanstrMensajecampo1").text(otro_documento_control.strMensajecampo1);		
		jQuery("#spanstrMensajecampo2").text(otro_documento_control.strMensajecampo2);		
		jQuery("#spanstrMensajecampo3").text(otro_documento_control.strMensajecampo3);		
	}
	
	actualizarCssBotonesMantenimiento(otro_documento_control) {
		jQuery("#tdbtnNuevootro_documento").css("visibility",otro_documento_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevootro_documento").css("display",otro_documento_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarotro_documento").css("visibility",otro_documento_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarotro_documento").css("display",otro_documento_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarotro_documento").css("visibility",otro_documento_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarotro_documento").css("display",otro_documento_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarotro_documento").css("visibility",otro_documento_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosotro_documento").css("visibility",otro_documento_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosotro_documento").css("display",otro_documento_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarotro_documento").css("visibility",otro_documento_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarotro_documento").css("visibility",otro_documento_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarotro_documento").css("visibility",otro_documento_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaarchivoFK(otro_documento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_documento_funcion1,otro_documento_control.archivosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(otro_documento_control) {
		var i=0;
		
		i=otro_documento_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(otro_documento_control.otro_documentoActual.id);
		jQuery("#t-version_row_"+i+"").val(otro_documento_control.otro_documentoActual.versionRow);
		
		if(otro_documento_control.otro_documentoActual.id_archivo!=null && otro_documento_control.otro_documentoActual.id_archivo>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != otro_documento_control.otro_documentoActual.id_archivo) {
				jQuery("#t-cel_"+i+"_2").val(otro_documento_control.otro_documentoActual.id_archivo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(otro_documento_control.otro_documentoActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(otro_documento_control.otro_documentoActual.data);
		jQuery("#t-cel_"+i+"_5").val(otro_documento_control.otro_documentoActual.campo1);
		jQuery("#t-cel_"+i+"_6").val(otro_documento_control.otro_documentoActual.campo2);
		jQuery("#t-cel_"+i+"_7").val(otro_documento_control.otro_documentoActual.campo3);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(otro_documento_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(otro_documento_control) {
		otro_documento_funcion1.registrarControlesTableValidacionEdition(otro_documento_control,otro_documento_webcontrol1,otro_documento_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documentoConstante,strParametros);
		
		//otro_documento_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosarchivosFK(otro_documento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo",otro_documento_control.archivosFK);

		if(otro_documento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_documento_control.idFilaTablaActual+"_2",otro_documento_control.archivosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo-cmbid_archivo",otro_documento_control.archivosFK);

	};

	
	
	registrarComboActionChangeCombosarchivosFK(otro_documento_control) {

	};

	
	
	setDefectoValorCombosarchivosFK(otro_documento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_documento_control.idarchivoDefaultFK>-1 && jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val() != otro_documento_control.idarchivoDefaultFK) {
				jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val(otro_documento_control.idarchivoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo-cmbid_archivo").val(otro_documento_control.idarchivoDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo-cmbid_archivo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo-cmbid_archivo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//otro_documento_control
		
	
	}
	
	onLoadCombosDefectoFK(otro_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(otro_documento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_archivo",otro_documento_control.strRecargarFkTipos,",")) { 
				otro_documento_webcontrol1.setDefectoValorCombosarchivosFK(otro_documento_control);
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
	onLoadCombosEventosFK(otro_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(otro_documento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_archivo",otro_documento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_documento_webcontrol1.registrarComboActionChangeCombosarchivosFK(otro_documento_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(otro_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(otro_documento_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("otro_documento");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("otro_documento");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(otro_documento_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);			
			
			if(otro_documento_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,"otro_documento");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("archivo","id_archivo","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo_img_busqueda").click(function(){
				otro_documento_webcontrol1.abrirBusquedaParaarchivo("id_archivo");
				//alert(jQuery('#form-id_archivo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("otro_documento","FK_Idarchivo","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			otro_documento_funcion1.validarFormularioJQuery(otro_documento_constante1);
			
			if(otro_documento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(otro_documento_control) {
		
		jQuery("#divBusquedaotro_documentoAjaxWebPart").css("display",otro_documento_control.strPermisoBusqueda);
		jQuery("#trotro_documentoCabeceraBusquedas").css("display",otro_documento_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_documento").css("display",otro_documento_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteotro_documento").css("display",otro_documento_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosotro_documento").attr("style",otro_documento_control.strPermisoMostrarTodos);
		
		if(otro_documento_control.strPermisoNuevo!=null) {
			jQuery("#tdotro_documentoNuevo").css("display",otro_documento_control.strPermisoNuevo);
			jQuery("#tdotro_documentoNuevoToolBar").css("display",otro_documento_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdotro_documentoDuplicar").css("display",otro_documento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_documentoDuplicarToolBar").css("display",otro_documento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_documentoNuevoGuardarCambios").css("display",otro_documento_control.strPermisoNuevo);
			jQuery("#tdotro_documentoNuevoGuardarCambiosToolBar").css("display",otro_documento_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(otro_documento_control.strPermisoActualizar!=null) {
			jQuery("#tdotro_documentoActualizarToolBar").css("display",otro_documento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_documentoCopiar").css("display",otro_documento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_documentoCopiarToolBar").css("display",otro_documento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_documentoConEditar").css("display",otro_documento_control.strPermisoActualizar);
		}
		
		jQuery("#tdotro_documentoEliminarToolBar").css("display",otro_documento_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdotro_documentoGuardarCambios").css("display",otro_documento_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdotro_documentoGuardarCambiosToolBar").css("display",otro_documento_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trotro_documentoElementos").css("display",otro_documento_control.strVisibleTablaElementos);
		
		jQuery("#trotro_documentoAcciones").css("display",otro_documento_control.strVisibleTablaAcciones);
		jQuery("#trotro_documentoParametrosAcciones").css("display",otro_documento_control.strVisibleTablaAcciones);
			
		jQuery("#tdotro_documentoCerrarPagina").css("display",otro_documento_control.strPermisoPopup);		
		jQuery("#tdotro_documentoCerrarPaginaToolBar").css("display",otro_documento_control.strPermisoPopup);
		//jQuery("#trotro_documentoAccionesRelaciones").css("display",otro_documento_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		otro_documento_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		otro_documento_webcontrol1.registrarEventosControles();
		
		if(otro_documento_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
			otro_documento_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(otro_documento_constante1.STR_ES_RELACIONES=="true") {
			if(otro_documento_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_documento_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(otro_documento_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(otro_documento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				otro_documento_webcontrol1.onLoad();
				
			} else {
				if(otro_documento_constante1.BIT_ES_PAGINA_FORM==true) {
					if(otro_documento_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
						//otro_documento_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(otro_documento_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(otro_documento_constante1.BIG_ID_ACTUAL,"otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
						//otro_documento_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			otro_documento_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var otro_documento_webcontrol1=new otro_documento_webcontrol();

if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = otro_documento_webcontrol1.onLoadWindow; 
}

//</script>