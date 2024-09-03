//<script type="text/javascript" language="javascript">



//var log_actividadJQueryPaginaWebInteraccion= function (log_actividad_control) {
//this.,this.,this.

class log_actividad_webcontrol extends log_actividad_webcontrol_add {
	
	log_actividad_control=null;
	log_actividad_controlInicial=null;
	log_actividad_controlAuxiliar=null;
		
	//if(log_actividad_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(log_actividad_control) {
		super();
		
		this.log_actividad_control=log_actividad_control;
	}
		
	actualizarVariablesPagina(log_actividad_control) {
		
		if(log_actividad_control.action=="index" || log_actividad_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(log_actividad_control);
			
		} else if(log_actividad_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(log_actividad_control);
		
		} else if(log_actividad_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(log_actividad_control);
		
		} else if(log_actividad_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(log_actividad_control);
		
		} else if(log_actividad_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(log_actividad_control);
			
		} else if(log_actividad_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(log_actividad_control);
			
		} else if(log_actividad_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(log_actividad_control);
		
		} else if(log_actividad_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(log_actividad_control);
		
		} else if(log_actividad_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(log_actividad_control);
		
		} else if(log_actividad_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(log_actividad_control);
		
		} else if(log_actividad_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(log_actividad_control);
		
		} else if(log_actividad_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(log_actividad_control);
		
		} else if(log_actividad_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(log_actividad_control);
		
		} else if(log_actividad_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(log_actividad_control);
		
		} else if(log_actividad_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(log_actividad_control);
		
		} else if(log_actividad_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(log_actividad_control);
		
		} else if(log_actividad_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(log_actividad_control);
		
		} else if(log_actividad_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(log_actividad_control);
		
		} else if(log_actividad_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(log_actividad_control);
		
		} else if(log_actividad_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(log_actividad_control);
		
		} else if(log_actividad_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(log_actividad_control);
		
		} else if(log_actividad_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(log_actividad_control);
		
		} else if(log_actividad_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(log_actividad_control);
		
		} else if(log_actividad_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(log_actividad_control);
		
		} else if(log_actividad_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(log_actividad_control);
		
		} else if(log_actividad_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(log_actividad_control);
		
		} else if(log_actividad_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(log_actividad_control);
		
		} else if(log_actividad_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(log_actividad_control);		
		
		} else if(log_actividad_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(log_actividad_control);		
		
		} else if(log_actividad_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(log_actividad_control);		
		
		} else if(log_actividad_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(log_actividad_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(log_actividad_control.action + " Revisar Manejo");
			
			if(log_actividad_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(log_actividad_control);
				
				return;
			}
			
			//if(log_actividad_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(log_actividad_control);
			//}
			
			if(log_actividad_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(log_actividad_control);
			}
			
			if(log_actividad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && log_actividad_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(log_actividad_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(log_actividad_control, false);			
			}
			
			if(log_actividad_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(log_actividad_control);	
			}
			
			if(log_actividad_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(log_actividad_control);
			}
			
			if(log_actividad_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(log_actividad_control);
			}
			
			if(log_actividad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(log_actividad_control);
			}
			
			if(log_actividad_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(log_actividad_control);	
			}
			
			if(log_actividad_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(log_actividad_control);
			}
			
			if(log_actividad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(log_actividad_control);
			}
			
			
			if(log_actividad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(log_actividad_control);			
			}
			
			if(log_actividad_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(log_actividad_control);
			}
			
			
			if(log_actividad_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(log_actividad_control);
			}
			
			if(log_actividad_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(log_actividad_control);
			}				
			
			if(log_actividad_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(log_actividad_control);
			}
			
			if(log_actividad_control.usuarioActual!=null && log_actividad_control.usuarioActual.field_strUserName!=null &&
			log_actividad_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(log_actividad_control);			
			}
		}
		
		
		if(log_actividad_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(log_actividad_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(log_actividad_control) {
		
		this.actualizarPaginaCargaGeneral(log_actividad_control);
		this.actualizarPaginaTablaDatos(log_actividad_control);
		this.actualizarPaginaCargaGeneralControles(log_actividad_control);
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(log_actividad_control);
		this.actualizarPaginaAreaBusquedas(log_actividad_control);
		this.actualizarPaginaCargaCombosFK(log_actividad_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(log_actividad_control) {
		
		this.actualizarPaginaCargaGeneral(log_actividad_control);
		this.actualizarPaginaTablaDatos(log_actividad_control);
		this.actualizarPaginaCargaGeneralControles(log_actividad_control);
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(log_actividad_control);
		this.actualizarPaginaAreaBusquedas(log_actividad_control);
		this.actualizarPaginaCargaCombosFK(log_actividad_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(log_actividad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(log_actividad_control);		
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(log_actividad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(log_actividad_control);		
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(log_actividad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(log_actividad_control);		
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(log_actividad_control) {
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(log_actividad_control) {
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(log_actividad_control) {
		this.actualizarPaginaCargaGeneralControles(log_actividad_control);
		this.actualizarPaginaCargaCombosFK(log_actividad_control);
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(log_actividad_control) {
		this.actualizarPaginaAbrirLink(log_actividad_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);				
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);
		this.actualizarPaginaFormulario(log_actividad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);
		this.actualizarPaginaFormulario(log_actividad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(log_actividad_control) {
		this.actualizarPaginaFormulario(log_actividad_control);
		this.onLoadCombosDefectoFK(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);
		this.actualizarPaginaFormulario(log_actividad_control);
		this.onLoadCombosDefectoFK(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(log_actividad_control) {
		this.actualizarPaginaCargaGeneralControles(log_actividad_control);
		this.actualizarPaginaCargaCombosFK(log_actividad_control);
		this.actualizarPaginaFormulario(log_actividad_control);
		this.onLoadCombosDefectoFK(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(log_actividad_control) {
		this.actualizarPaginaAbrirLink(log_actividad_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(log_actividad_control) {
		this.actualizarPaginaImprimir(log_actividad_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(log_actividad_control) {
		this.actualizarPaginaImprimir(log_actividad_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(log_actividad_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(log_actividad_control) {
		//FORMULARIO
		if(log_actividad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(log_actividad_control);
			this.actualizarPaginaFormularioAdd(log_actividad_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		//COMBOS FK
		if(log_actividad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(log_actividad_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(log_actividad_control) {
		//FORMULARIO
		if(log_actividad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(log_actividad_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);	
		//COMBOS FK
		if(log_actividad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(log_actividad_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(log_actividad_control) {
		if(log_actividad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && log_actividad_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(log_actividad_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(log_actividad_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(log_actividad_control) {
		if(log_actividad_funcion1.esPaginaForm()==true) {
			window.opener.log_actividad_webcontrol1.actualizarPaginaTablaDatos(log_actividad_control);
		} else {
			this.actualizarPaginaTablaDatos(log_actividad_control);
		}
	}
	
	actualizarPaginaAbrirLink(log_actividad_control) {
		log_actividad_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(log_actividad_control.strAuxiliarUrlPagina);
				
		log_actividad_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(log_actividad_control.strAuxiliarTipo,log_actividad_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(log_actividad_control) {
		log_actividad_funcion1.resaltarRestaurarDivMensaje(true,log_actividad_control.strAuxiliarMensajeAlert,log_actividad_control.strAuxiliarCssMensaje);
			
		if(log_actividad_funcion1.esPaginaForm()==true) {
			window.opener.log_actividad_funcion1.resaltarRestaurarDivMensaje(true,log_actividad_control.strAuxiliarMensajeAlert,log_actividad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(log_actividad_control) {
		eval(log_actividad_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(log_actividad_control, mostrar) {
		
		if(mostrar==true) {
			log_actividad_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				log_actividad_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			log_actividad_funcion1.mostrarDivMensaje(true,log_actividad_control.strAuxiliarMensaje,log_actividad_control.strAuxiliarCssMensaje);
		
		} else {
			log_actividad_funcion1.mostrarDivMensaje(false,log_actividad_control.strAuxiliarMensaje,log_actividad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(log_actividad_control) {
	
		funcionGeneral.printWebPartPage("log_actividad",log_actividad_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarlog_actividadsAjaxWebPart").html(log_actividad_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("log_actividad",jQuery("#divTablaDatosReporteAuxiliarlog_actividadsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(log_actividad_control) {
		this.log_actividad_controlInicial=log_actividad_control;
			
		if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(log_actividad_control.strStyleDivArbol,log_actividad_control.strStyleDivContent
																,log_actividad_control.strStyleDivOpcionesBanner,log_actividad_control.strStyleDivExpandirColapsar
																,log_actividad_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=log_actividad_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",log_actividad_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(log_actividad_control) {
		jQuery("#divTablaDatoslog_actividadsAjaxWebPart").html(log_actividad_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoslog_actividads=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoslog_actividads=jQuery("#tblTablaDatoslog_actividads").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("log_actividad",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',log_actividad_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			log_actividad_webcontrol1.registrarControlesTableEdition(log_actividad_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		log_actividad_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(log_actividad_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(log_actividad_control.log_actividadActual!=null) {//form
			
			this.actualizarCamposFilaTabla(log_actividad_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(log_actividad_control) {
		this.actualizarCssBotonesPagina(log_actividad_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(log_actividad_control.tiposReportes,log_actividad_control.tiposReporte
															 	,log_actividad_control.tiposPaginacion,log_actividad_control.tiposAcciones
																,log_actividad_control.tiposColumnasSelect,log_actividad_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(log_actividad_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(log_actividad_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(log_actividad_control);			
	}
	
	actualizarPaginaAreaBusquedas(log_actividad_control) {
		jQuery("#divBusquedalog_actividadAjaxWebPart").css("display",log_actividad_control.strPermisoBusqueda);
		jQuery("#trlog_actividadCabeceraBusquedas").css("display",log_actividad_control.strPermisoBusqueda);
		jQuery("#trBusquedalog_actividad").css("display",log_actividad_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(log_actividad_control.htmlTablaOrderBy!=null
			&& log_actividad_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBylog_actividadAjaxWebPart").html(log_actividad_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//log_actividad_webcontrol1.registrarOrderByActions();
			
		}
			
		if(log_actividad_control.htmlTablaOrderByRel!=null
			&& log_actividad_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRellog_actividadAjaxWebPart").html(log_actividad_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(log_actividad_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedalog_actividadAjaxWebPart").css("display","none");
			jQuery("#trlog_actividadCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedalog_actividad").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(log_actividad_control) {
		jQuery("#tdlog_actividadNuevo").css("display",log_actividad_control.strPermisoNuevo);
		jQuery("#trlog_actividadElementos").css("display",log_actividad_control.strVisibleTablaElementos);
		jQuery("#trlog_actividadAcciones").css("display",log_actividad_control.strVisibleTablaAcciones);
		jQuery("#trlog_actividadParametrosAcciones").css("display",log_actividad_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(log_actividad_control) {
	
		this.actualizarCssBotonesMantenimiento(log_actividad_control);
				
		if(log_actividad_control.log_actividadActual!=null) {//form
			
			this.actualizarCamposFormulario(log_actividad_control);			
		}
						
		this.actualizarSpanMensajesCampos(log_actividad_control);
	}
	
	actualizarPaginaUsuarioInvitado(log_actividad_control) {
	
		var indexPosition=log_actividad_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=log_actividad_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(log_actividad_control) {
		jQuery("#divResumenlog_actividadActualAjaxWebPart").html(log_actividad_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(log_actividad_control) {
		jQuery("#divAccionesRelacioneslog_actividadAjaxWebPart").html(log_actividad_control.htmlTablaAccionesRelaciones);
			
		log_actividad_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(log_actividad_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(log_actividad_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(log_actividad_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionlog_actividad();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("log_actividad",id,"general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(log_actividad_control) {
	
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-id").val(log_actividad_control.log_actividadActual.id);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-version_row").val(log_actividad_control.log_actividadActual.versionRow);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-log_id").val(log_actividad_control.log_actividadActual.log_id);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-fecha").val(log_actividad_control.log_actividadActual.fecha);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-hora").val(log_actividad_control.log_actividadActual.hora);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-computador").val(log_actividad_control.log_actividadActual.computador);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-usuario").val(log_actividad_control.log_actividadActual.usuario);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-descripcion").val(log_actividad_control.log_actividadActual.descripcion);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-modulo").val(log_actividad_control.log_actividadActual.modulo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+log_actividad_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("log_actividad","general","","form_log_actividad",formulario,"","",paraEventoTabla,idFilaTabla,log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
	}
	
	cargarCombosFK(log_actividad_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(log_actividad_control.strRecargarFkTiposNinguno!=null && log_actividad_control.strRecargarFkTiposNinguno!='NINGUNO' && log_actividad_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(log_actividad_control) {
		jQuery("#spanstrMensajeid").text(log_actividad_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(log_actividad_control.strMensajeversion_row);		
		jQuery("#spanstrMensajelog_id").text(log_actividad_control.strMensajelog_id);		
		jQuery("#spanstrMensajefecha").text(log_actividad_control.strMensajefecha);		
		jQuery("#spanstrMensajehora").text(log_actividad_control.strMensajehora);		
		jQuery("#spanstrMensajecomputador").text(log_actividad_control.strMensajecomputador);		
		jQuery("#spanstrMensajeusuario").text(log_actividad_control.strMensajeusuario);		
		jQuery("#spanstrMensajedescripcion").text(log_actividad_control.strMensajedescripcion);		
		jQuery("#spanstrMensajemodulo").text(log_actividad_control.strMensajemodulo);		
	}
	
	actualizarCssBotonesMantenimiento(log_actividad_control) {
		jQuery("#tdbtnNuevolog_actividad").css("visibility",log_actividad_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevolog_actividad").css("display",log_actividad_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarlog_actividad").css("visibility",log_actividad_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarlog_actividad").css("display",log_actividad_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarlog_actividad").css("visibility",log_actividad_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarlog_actividad").css("display",log_actividad_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarlog_actividad").css("visibility",log_actividad_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioslog_actividad").css("visibility",log_actividad_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioslog_actividad").css("display",log_actividad_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarlog_actividad").css("visibility",log_actividad_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarlog_actividad").css("visibility",log_actividad_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarlog_actividad").css("visibility",log_actividad_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(log_actividad_control) {
		var i=0;
		
		i=log_actividad_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(log_actividad_control.log_actividadActual.id);
		jQuery("#t-version_row_"+i+"").val(log_actividad_control.log_actividadActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(log_actividad_control.log_actividadActual.log_id);
		jQuery("#t-cel_"+i+"_3").val(log_actividad_control.log_actividadActual.fecha);
		jQuery("#t-cel_"+i+"_4").val(log_actividad_control.log_actividadActual.hora);
		jQuery("#t-cel_"+i+"_5").val(log_actividad_control.log_actividadActual.computador);
		jQuery("#t-cel_"+i+"_6").val(log_actividad_control.log_actividadActual.usuario);
		jQuery("#t-cel_"+i+"_7").val(log_actividad_control.log_actividadActual.descripcion);
		jQuery("#t-cel_"+i+"_8").val(log_actividad_control.log_actividadActual.modulo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(log_actividad_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(log_actividad_control) {
		log_actividad_funcion1.registrarControlesTableValidacionEdition(log_actividad_control,log_actividad_webcontrol1,log_actividad_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividadConstante,strParametros);
		
		//log_actividad_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//log_actividad_control
		
	
	}
	
	onLoadCombosDefectoFK(log_actividad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(log_actividad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(log_actividad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(log_actividad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(log_actividad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(log_actividad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(log_actividad_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("log_actividad");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("log_actividad");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(log_actividad_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);			
			
			if(log_actividad_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,"log_actividad");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			log_actividad_funcion1.validarFormularioJQuery(log_actividad_constante1);
			
			if(log_actividad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(log_actividad_control) {
		
		jQuery("#divBusquedalog_actividadAjaxWebPart").css("display",log_actividad_control.strPermisoBusqueda);
		jQuery("#trlog_actividadCabeceraBusquedas").css("display",log_actividad_control.strPermisoBusqueda);
		jQuery("#trBusquedalog_actividad").css("display",log_actividad_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportelog_actividad").css("display",log_actividad_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoslog_actividad").attr("style",log_actividad_control.strPermisoMostrarTodos);
		
		if(log_actividad_control.strPermisoNuevo!=null) {
			jQuery("#tdlog_actividadNuevo").css("display",log_actividad_control.strPermisoNuevo);
			jQuery("#tdlog_actividadNuevoToolBar").css("display",log_actividad_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdlog_actividadDuplicar").css("display",log_actividad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlog_actividadDuplicarToolBar").css("display",log_actividad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlog_actividadNuevoGuardarCambios").css("display",log_actividad_control.strPermisoNuevo);
			jQuery("#tdlog_actividadNuevoGuardarCambiosToolBar").css("display",log_actividad_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(log_actividad_control.strPermisoActualizar!=null) {
			jQuery("#tdlog_actividadActualizarToolBar").css("display",log_actividad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlog_actividadCopiar").css("display",log_actividad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlog_actividadCopiarToolBar").css("display",log_actividad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlog_actividadConEditar").css("display",log_actividad_control.strPermisoActualizar);
		}
		
		jQuery("#tdlog_actividadEliminarToolBar").css("display",log_actividad_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdlog_actividadGuardarCambios").css("display",log_actividad_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdlog_actividadGuardarCambiosToolBar").css("display",log_actividad_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trlog_actividadElementos").css("display",log_actividad_control.strVisibleTablaElementos);
		
		jQuery("#trlog_actividadAcciones").css("display",log_actividad_control.strVisibleTablaAcciones);
		jQuery("#trlog_actividadParametrosAcciones").css("display",log_actividad_control.strVisibleTablaAcciones);
			
		jQuery("#tdlog_actividadCerrarPagina").css("display",log_actividad_control.strPermisoPopup);		
		jQuery("#tdlog_actividadCerrarPaginaToolBar").css("display",log_actividad_control.strPermisoPopup);
		//jQuery("#trlog_actividadAccionesRelaciones").css("display",log_actividad_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		log_actividad_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		log_actividad_webcontrol1.registrarEventosControles();
		
		if(log_actividad_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
			log_actividad_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(log_actividad_constante1.STR_ES_RELACIONES=="true") {
			if(log_actividad_constante1.BIT_ES_PAGINA_FORM==true) {
				log_actividad_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(log_actividad_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(log_actividad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				log_actividad_webcontrol1.onLoad();
				
			} else {
				if(log_actividad_constante1.BIT_ES_PAGINA_FORM==true) {
					if(log_actividad_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
						//log_actividad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(log_actividad_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(log_actividad_constante1.BIG_ID_ACTUAL,"log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
						//log_actividad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			log_actividad_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var log_actividad_webcontrol1=new log_actividad_webcontrol();

if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = log_actividad_webcontrol1.onLoadWindow; 
}

//</script>