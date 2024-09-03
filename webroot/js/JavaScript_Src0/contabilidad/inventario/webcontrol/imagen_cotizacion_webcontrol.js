//<script type="text/javascript" language="javascript">



//var imagen_cotizacionJQueryPaginaWebInteraccion= function (imagen_cotizacion_control) {
//this.,this.,this.

class imagen_cotizacion_webcontrol extends imagen_cotizacion_webcontrol_add {
	
	imagen_cotizacion_control=null;
	imagen_cotizacion_controlInicial=null;
	imagen_cotizacion_controlAuxiliar=null;
		
	//if(imagen_cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_cotizacion_control) {
		super();
		
		this.imagen_cotizacion_control=imagen_cotizacion_control;
	}
		
	actualizarVariablesPagina(imagen_cotizacion_control) {
		
		if(imagen_cotizacion_control.action=="index" || imagen_cotizacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_cotizacion_control);
			
		} else if(imagen_cotizacion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_cotizacion_control);
			
		} else if(imagen_cotizacion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_cotizacion_control);
			
		} else if(imagen_cotizacion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_cotizacion_control);		
		
		} else if(imagen_cotizacion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_cotizacion_control);		
		
		} else if(imagen_cotizacion_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_cotizacion_control);		
		
		} else if(imagen_cotizacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_cotizacion_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(imagen_cotizacion_control.action + " Revisar Manejo");
			
			if(imagen_cotizacion_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(imagen_cotizacion_control);
				
				return;
			}
			
			//if(imagen_cotizacion_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(imagen_cotizacion_control);
			//}
			
			if(imagen_cotizacion_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(imagen_cotizacion_control);
			}
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_cotizacion_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(imagen_cotizacion_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(imagen_cotizacion_control, false);			
			}
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(imagen_cotizacion_control);	
			}
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
			}
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(imagen_cotizacion_control);
			}
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);
			}
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(imagen_cotizacion_control);	
			}
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
			}
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(imagen_cotizacion_control);
			}
			
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(imagen_cotizacion_control);			
			}
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(imagen_cotizacion_control);
			}
			
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(imagen_cotizacion_control);
			}
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(imagen_cotizacion_control);
			}				
			
			if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_cotizacion_control);
			}
			
			if(imagen_cotizacion_control.usuarioActual!=null && imagen_cotizacion_control.usuarioActual.field_strUserName!=null &&
			imagen_cotizacion_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(imagen_cotizacion_control);			
			}
		}
		
		
		if(imagen_cotizacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_cotizacion_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(imagen_cotizacion_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_cotizacion_control);
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		this.actualizarPaginaCargaGeneralControles(imagen_cotizacion_control);
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_cotizacion_control);
		this.actualizarPaginaAreaBusquedas(imagen_cotizacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_cotizacion_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_cotizacion_control);
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		this.actualizarPaginaCargaGeneralControles(imagen_cotizacion_control);
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_cotizacion_control);
		this.actualizarPaginaAreaBusquedas(imagen_cotizacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_cotizacion_control) {
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_cotizacion_control) {
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_cotizacion_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_cotizacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_cotizacion_control) {
		this.actualizarPaginaAbrirLink(imagen_cotizacion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);				
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		this.actualizarPaginaFormulario(imagen_cotizacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		this.actualizarPaginaFormulario(imagen_cotizacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_cotizacion_control) {
		this.actualizarPaginaFormulario(imagen_cotizacion_control);
		this.onLoadCombosDefectoFK(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		this.actualizarPaginaFormulario(imagen_cotizacion_control);
		this.onLoadCombosDefectoFK(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_cotizacion_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_cotizacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);
		this.actualizarPaginaFormulario(imagen_cotizacion_control);
		this.onLoadCombosDefectoFK(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_cotizacion_control) {
		this.actualizarPaginaAbrirLink(imagen_cotizacion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_cotizacion_control) {
		this.actualizarPaginaImprimir(imagen_cotizacion_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_cotizacion_control) {
		this.actualizarPaginaImprimir(imagen_cotizacion_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_cotizacion_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_cotizacion_control) {
		//FORMULARIO
		if(imagen_cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_cotizacion_control);
			this.actualizarPaginaFormularioAdd(imagen_cotizacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		//COMBOS FK
		if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_cotizacion_control) {
		//FORMULARIO
		if(imagen_cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_cotizacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);	
		//COMBOS FK
		if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control) {
		if(imagen_cotizacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_cotizacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_cotizacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_cotizacion_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_cotizacion_control) {
		if(imagen_cotizacion_funcion1.esPaginaForm()==true) {
			window.opener.imagen_cotizacion_webcontrol1.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_cotizacion_control) {
		imagen_cotizacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_cotizacion_control.strAuxiliarUrlPagina);
				
		imagen_cotizacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_cotizacion_control.strAuxiliarTipo,imagen_cotizacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_cotizacion_control) {
		imagen_cotizacion_funcion1.resaltarRestaurarDivMensaje(true,imagen_cotizacion_control.strAuxiliarMensajeAlert,imagen_cotizacion_control.strAuxiliarCssMensaje);
			
		if(imagen_cotizacion_funcion1.esPaginaForm()==true) {
			window.opener.imagen_cotizacion_funcion1.resaltarRestaurarDivMensaje(true,imagen_cotizacion_control.strAuxiliarMensajeAlert,imagen_cotizacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(imagen_cotizacion_control) {
		eval(imagen_cotizacion_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(imagen_cotizacion_control, mostrar) {
		
		if(mostrar==true) {
			imagen_cotizacion_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_cotizacion_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			imagen_cotizacion_funcion1.mostrarDivMensaje(true,imagen_cotizacion_control.strAuxiliarMensaje,imagen_cotizacion_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_cotizacion_funcion1.mostrarDivMensaje(false,imagen_cotizacion_control.strAuxiliarMensaje,imagen_cotizacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(imagen_cotizacion_control) {
	
		funcionGeneral.printWebPartPage("imagen_cotizacion",imagen_cotizacion_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarimagen_cotizacionsAjaxWebPart").html(imagen_cotizacion_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("imagen_cotizacion",jQuery("#divTablaDatosReporteAuxiliarimagen_cotizacionsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(imagen_cotizacion_control) {
		this.imagen_cotizacion_controlInicial=imagen_cotizacion_control;
			
		if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_cotizacion_control.strStyleDivArbol,imagen_cotizacion_control.strStyleDivContent
																,imagen_cotizacion_control.strStyleDivOpcionesBanner,imagen_cotizacion_control.strStyleDivExpandirColapsar
																,imagen_cotizacion_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_cotizacion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_cotizacion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(imagen_cotizacion_control) {
		jQuery("#divTablaDatosimagen_cotizacionsAjaxWebPart").html(imagen_cotizacion_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_cotizacions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_cotizacions=jQuery("#tblTablaDatosimagen_cotizacions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_cotizacion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_cotizacion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_cotizacion_webcontrol1.registrarControlesTableEdition(imagen_cotizacion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_cotizacion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(imagen_cotizacion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_cotizacion_control.imagen_cotizacionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_cotizacion_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(imagen_cotizacion_control) {
		this.actualizarCssBotonesPagina(imagen_cotizacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_cotizacion_control.tiposReportes,imagen_cotizacion_control.tiposReporte
															 	,imagen_cotizacion_control.tiposPaginacion,imagen_cotizacion_control.tiposAcciones
																,imagen_cotizacion_control.tiposColumnasSelect,imagen_cotizacion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_cotizacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_cotizacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_cotizacion_control);			
	}
	
	actualizarPaginaAreaBusquedas(imagen_cotizacion_control) {
		jQuery("#divBusquedaimagen_cotizacionAjaxWebPart").css("display",imagen_cotizacion_control.strPermisoBusqueda);
		jQuery("#trimagen_cotizacionCabeceraBusquedas").css("display",imagen_cotizacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_cotizacion_control.htmlTablaOrderBy!=null
			&& imagen_cotizacion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_cotizacionAjaxWebPart").html(imagen_cotizacion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_cotizacion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_cotizacion_control.htmlTablaOrderByRel!=null
			&& imagen_cotizacion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_cotizacionAjaxWebPart").html(imagen_cotizacion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_cotizacionAjaxWebPart").css("display","none");
			jQuery("#trimagen_cotizacionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_cotizacion").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(imagen_cotizacion_control) {
		jQuery("#tdimagen_cotizacionNuevo").css("display",imagen_cotizacion_control.strPermisoNuevo);
		jQuery("#trimagen_cotizacionElementos").css("display",imagen_cotizacion_control.strVisibleTablaElementos);
		jQuery("#trimagen_cotizacionAcciones").css("display",imagen_cotizacion_control.strVisibleTablaAcciones);
		jQuery("#trimagen_cotizacionParametrosAcciones").css("display",imagen_cotizacion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_cotizacion_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_cotizacion_control);
				
		if(imagen_cotizacion_control.imagen_cotizacionActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_cotizacion_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_cotizacion_control);
	}
	
	actualizarPaginaUsuarioInvitado(imagen_cotizacion_control) {
	
		var indexPosition=imagen_cotizacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_cotizacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_cotizacion_control) {
		jQuery("#divResumenimagen_cotizacionActualAjaxWebPart").html(imagen_cotizacion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_cotizacion_control) {
		jQuery("#divAccionesRelacionesimagen_cotizacionAjaxWebPart").html(imagen_cotizacion_control.htmlTablaAccionesRelaciones);
			
		imagen_cotizacion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_cotizacion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_cotizacion_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_cotizacion_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_cotizacion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_cotizacion",id,"inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_cotizacion_control) {
	
		jQuery("#form"+imagen_cotizacion_constante1.STR_SUFIJO+"-id").val(imagen_cotizacion_control.imagen_cotizacionActual.id);
		jQuery("#form"+imagen_cotizacion_constante1.STR_SUFIJO+"-version_row").val(imagen_cotizacion_control.imagen_cotizacionActual.versionRow);
		jQuery("#form"+imagen_cotizacion_constante1.STR_SUFIJO+"-imagen").val(imagen_cotizacion_control.imagen_cotizacionActual.imagen);
		jQuery("#form"+imagen_cotizacion_constante1.STR_SUFIJO+"-nro_cotizacion").val(imagen_cotizacion_control.imagen_cotizacionActual.nro_cotizacion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_cotizacion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_cotizacion","inventario","","form_imagen_cotizacion",formulario,"","",paraEventoTabla,idFilaTabla,imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
	}
	
	cargarCombosFK(imagen_cotizacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_cotizacion_control.strRecargarFkTiposNinguno!=null && imagen_cotizacion_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_cotizacion_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(imagen_cotizacion_control) {
		jQuery("#spanstrMensajeid").text(imagen_cotizacion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_cotizacion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeimagen").text(imagen_cotizacion_control.strMensajeimagen);		
		jQuery("#spanstrMensajenro_cotizacion").text(imagen_cotizacion_control.strMensajenro_cotizacion);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_cotizacion_control) {
		jQuery("#tdbtnNuevoimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(imagen_cotizacion_control) {
		var i=0;
		
		i=imagen_cotizacion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_cotizacion_control.imagen_cotizacionActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_cotizacion_control.imagen_cotizacionActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(imagen_cotizacion_control.imagen_cotizacionActual.imagen);
		jQuery("#t-cel_"+i+"_3").val(imagen_cotizacion_control.imagen_cotizacionActual.nro_cotizacion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_cotizacion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_cotizacion_control) {
		imagen_cotizacion_funcion1.registrarControlesTableValidacionEdition(imagen_cotizacion_control,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacionConstante,strParametros);
		
		//imagen_cotizacion_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_cotizacion_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(imagen_cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_cotizacion");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_cotizacion");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_cotizacion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);			
			
			if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,"imagen_cotizacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			imagen_cotizacion_funcion1.validarFormularioJQuery(imagen_cotizacion_constante1);
			
			if(imagen_cotizacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_cotizacion_control) {
		
		jQuery("#divBusquedaimagen_cotizacionAjaxWebPart").css("display",imagen_cotizacion_control.strPermisoBusqueda);
		jQuery("#trimagen_cotizacionCabeceraBusquedas").css("display",imagen_cotizacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_cotizacion").attr("style",imagen_cotizacion_control.strPermisoMostrarTodos);
		
		if(imagen_cotizacion_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_cotizacionNuevo").css("display",imagen_cotizacion_control.strPermisoNuevo);
			jQuery("#tdimagen_cotizacionNuevoToolBar").css("display",imagen_cotizacion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_cotizacionDuplicar").css("display",imagen_cotizacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_cotizacionDuplicarToolBar").css("display",imagen_cotizacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_cotizacionNuevoGuardarCambios").css("display",imagen_cotizacion_control.strPermisoNuevo);
			jQuery("#tdimagen_cotizacionNuevoGuardarCambiosToolBar").css("display",imagen_cotizacion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_cotizacion_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_cotizacionActualizarToolBar").css("display",imagen_cotizacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_cotizacionCopiar").css("display",imagen_cotizacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_cotizacionCopiarToolBar").css("display",imagen_cotizacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_cotizacionConEditar").css("display",imagen_cotizacion_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_cotizacionEliminarToolBar").css("display",imagen_cotizacion_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdimagen_cotizacionGuardarCambios").css("display",imagen_cotizacion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_cotizacionGuardarCambiosToolBar").css("display",imagen_cotizacion_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trimagen_cotizacionElementos").css("display",imagen_cotizacion_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_cotizacionAcciones").css("display",imagen_cotizacion_control.strVisibleTablaAcciones);
		jQuery("#trimagen_cotizacionParametrosAcciones").css("display",imagen_cotizacion_control.strVisibleTablaAcciones);
			
		jQuery("#tdimagen_cotizacionCerrarPagina").css("display",imagen_cotizacion_control.strPermisoPopup);		
		jQuery("#tdimagen_cotizacionCerrarPaginaToolBar").css("display",imagen_cotizacion_control.strPermisoPopup);
		//jQuery("#trimagen_cotizacionAccionesRelaciones").css("display",imagen_cotizacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_cotizacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_cotizacion_webcontrol1.registrarEventosControles();
		
		if(imagen_cotizacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			imagen_cotizacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_cotizacion_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_cotizacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_cotizacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(imagen_cotizacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_cotizacion_webcontrol1.onLoad();
				
			} else {
				if(imagen_cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
					if(imagen_cotizacion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
						//imagen_cotizacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(imagen_cotizacion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_cotizacion_constante1.BIG_ID_ACTUAL,"imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
						//imagen_cotizacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			imagen_cotizacion_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var imagen_cotizacion_webcontrol1=new imagen_cotizacion_webcontrol();

if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_cotizacion_webcontrol1.onLoadWindow; 
}

//</script>