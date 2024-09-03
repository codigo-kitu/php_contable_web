//<script type="text/javascript" language="javascript">



//var imagen_devolucionJQueryPaginaWebInteraccion= function (imagen_devolucion_control) {
//this.,this.,this.

class imagen_devolucion_webcontrol extends imagen_devolucion_webcontrol_add {
	
	imagen_devolucion_control=null;
	imagen_devolucion_controlInicial=null;
	imagen_devolucion_controlAuxiliar=null;
		
	//if(imagen_devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_devolucion_control) {
		super();
		
		this.imagen_devolucion_control=imagen_devolucion_control;
	}
		
	actualizarVariablesPagina(imagen_devolucion_control) {
		
		if(imagen_devolucion_control.action=="index" || imagen_devolucion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_devolucion_control);
			
		} else if(imagen_devolucion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_devolucion_control);
			
		} else if(imagen_devolucion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_devolucion_control);
			
		} else if(imagen_devolucion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_devolucion_control);		
		
		} else if(imagen_devolucion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_devolucion_control);		
		
		} else if(imagen_devolucion_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_devolucion_control);		
		
		} else if(imagen_devolucion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_devolucion_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(imagen_devolucion_control.action + " Revisar Manejo");
			
			if(imagen_devolucion_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(imagen_devolucion_control);
				
				return;
			}
			
			//if(imagen_devolucion_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(imagen_devolucion_control);
			//}
			
			if(imagen_devolucion_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(imagen_devolucion_control);
			}
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_devolucion_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(imagen_devolucion_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(imagen_devolucion_control, false);			
			}
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(imagen_devolucion_control);	
			}
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(imagen_devolucion_control);
			}
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(imagen_devolucion_control);
			}
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(imagen_devolucion_control);
			}
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(imagen_devolucion_control);	
			}
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
			}
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(imagen_devolucion_control);
			}
			
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(imagen_devolucion_control);			
			}
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(imagen_devolucion_control);
			}
			
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(imagen_devolucion_control);
			}
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(imagen_devolucion_control);
			}				
			
			if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_devolucion_control);
			}
			
			if(imagen_devolucion_control.usuarioActual!=null && imagen_devolucion_control.usuarioActual.field_strUserName!=null &&
			imagen_devolucion_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(imagen_devolucion_control);			
			}
		}
		
		
		if(imagen_devolucion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_devolucion_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(imagen_devolucion_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_devolucion_control);
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_control);
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_devolucion_control);
		this.actualizarPaginaAreaBusquedas(imagen_devolucion_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_devolucion_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_devolucion_control);
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_control);
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_devolucion_control);
		this.actualizarPaginaAreaBusquedas(imagen_devolucion_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_devolucion_control) {
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_devolucion_control) {
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_devolucion_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_control);
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_devolucion_control) {
		this.actualizarPaginaAbrirLink(imagen_devolucion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);				
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);
		this.actualizarPaginaFormulario(imagen_devolucion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);
		this.actualizarPaginaFormulario(imagen_devolucion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_devolucion_control) {
		this.actualizarPaginaFormulario(imagen_devolucion_control);
		this.onLoadCombosDefectoFK(imagen_devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);
		this.actualizarPaginaFormulario(imagen_devolucion_control);
		this.onLoadCombosDefectoFK(imagen_devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_devolucion_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_control);
		this.actualizarPaginaFormulario(imagen_devolucion_control);
		this.onLoadCombosDefectoFK(imagen_devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_devolucion_control) {
		this.actualizarPaginaAbrirLink(imagen_devolucion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_devolucion_control) {
		this.actualizarPaginaImprimir(imagen_devolucion_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_devolucion_control) {
		this.actualizarPaginaImprimir(imagen_devolucion_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_devolucion_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_devolucion_control) {
		//FORMULARIO
		if(imagen_devolucion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_devolucion_control);
			this.actualizarPaginaFormularioAdd(imagen_devolucion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		//COMBOS FK
		if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_devolucion_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_devolucion_control) {
		//FORMULARIO
		if(imagen_devolucion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_devolucion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);	
		//COMBOS FK
		if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_devolucion_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control) {
		if(imagen_devolucion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_devolucion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_devolucion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_devolucion_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_control) {
		if(imagen_devolucion_funcion1.esPaginaForm()==true) {
			window.opener.imagen_devolucion_webcontrol1.actualizarPaginaTablaDatos(imagen_devolucion_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_devolucion_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_devolucion_control) {
		imagen_devolucion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_devolucion_control.strAuxiliarUrlPagina);
				
		imagen_devolucion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_devolucion_control.strAuxiliarTipo,imagen_devolucion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_devolucion_control) {
		imagen_devolucion_funcion1.resaltarRestaurarDivMensaje(true,imagen_devolucion_control.strAuxiliarMensajeAlert,imagen_devolucion_control.strAuxiliarCssMensaje);
			
		if(imagen_devolucion_funcion1.esPaginaForm()==true) {
			window.opener.imagen_devolucion_funcion1.resaltarRestaurarDivMensaje(true,imagen_devolucion_control.strAuxiliarMensajeAlert,imagen_devolucion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(imagen_devolucion_control) {
		eval(imagen_devolucion_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(imagen_devolucion_control, mostrar) {
		
		if(mostrar==true) {
			imagen_devolucion_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_devolucion_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			imagen_devolucion_funcion1.mostrarDivMensaje(true,imagen_devolucion_control.strAuxiliarMensaje,imagen_devolucion_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_devolucion_funcion1.mostrarDivMensaje(false,imagen_devolucion_control.strAuxiliarMensaje,imagen_devolucion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(imagen_devolucion_control) {
	
		funcionGeneral.printWebPartPage("imagen_devolucion",imagen_devolucion_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarimagen_devolucionsAjaxWebPart").html(imagen_devolucion_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("imagen_devolucion",jQuery("#divTablaDatosReporteAuxiliarimagen_devolucionsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(imagen_devolucion_control) {
		this.imagen_devolucion_controlInicial=imagen_devolucion_control;
			
		if(imagen_devolucion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_devolucion_control.strStyleDivArbol,imagen_devolucion_control.strStyleDivContent
																,imagen_devolucion_control.strStyleDivOpcionesBanner,imagen_devolucion_control.strStyleDivExpandirColapsar
																,imagen_devolucion_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_devolucion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_devolucion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(imagen_devolucion_control) {
		jQuery("#divTablaDatosimagen_devolucionsAjaxWebPart").html(imagen_devolucion_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_devolucions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_devolucion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_devolucions=jQuery("#tblTablaDatosimagen_devolucions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_devolucion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_devolucion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_devolucion_webcontrol1.registrarControlesTableEdition(imagen_devolucion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_devolucion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(imagen_devolucion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_devolucion_control.imagen_devolucionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_devolucion_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(imagen_devolucion_control) {
		this.actualizarCssBotonesPagina(imagen_devolucion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_devolucion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_devolucion_control.tiposReportes,imagen_devolucion_control.tiposReporte
															 	,imagen_devolucion_control.tiposPaginacion,imagen_devolucion_control.tiposAcciones
																,imagen_devolucion_control.tiposColumnasSelect,imagen_devolucion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_devolucion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_devolucion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_devolucion_control);			
	}
	
	actualizarPaginaAreaBusquedas(imagen_devolucion_control) {
		jQuery("#divBusquedaimagen_devolucionAjaxWebPart").css("display",imagen_devolucion_control.strPermisoBusqueda);
		jQuery("#trimagen_devolucionCabeceraBusquedas").css("display",imagen_devolucion_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_devolucion").css("display",imagen_devolucion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_devolucion_control.htmlTablaOrderBy!=null
			&& imagen_devolucion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_devolucionAjaxWebPart").html(imagen_devolucion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_devolucion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_devolucion_control.htmlTablaOrderByRel!=null
			&& imagen_devolucion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_devolucionAjaxWebPart").html(imagen_devolucion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_devolucion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_devolucionAjaxWebPart").css("display","none");
			jQuery("#trimagen_devolucionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_devolucion").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(imagen_devolucion_control) {
		jQuery("#tdimagen_devolucionNuevo").css("display",imagen_devolucion_control.strPermisoNuevo);
		jQuery("#trimagen_devolucionElementos").css("display",imagen_devolucion_control.strVisibleTablaElementos);
		jQuery("#trimagen_devolucionAcciones").css("display",imagen_devolucion_control.strVisibleTablaAcciones);
		jQuery("#trimagen_devolucionParametrosAcciones").css("display",imagen_devolucion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_devolucion_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_devolucion_control);
				
		if(imagen_devolucion_control.imagen_devolucionActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_devolucion_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_devolucion_control);
	}
	
	actualizarPaginaUsuarioInvitado(imagen_devolucion_control) {
	
		var indexPosition=imagen_devolucion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_devolucion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_devolucion_control) {
		jQuery("#divResumenimagen_devolucionActualAjaxWebPart").html(imagen_devolucion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_devolucion_control) {
		jQuery("#divAccionesRelacionesimagen_devolucionAjaxWebPart").html(imagen_devolucion_control.htmlTablaAccionesRelaciones);
			
		imagen_devolucion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_devolucion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_devolucion_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_devolucion_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_devolucion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_devolucion",id,"inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_devolucion_control) {
	
		jQuery("#form"+imagen_devolucion_constante1.STR_SUFIJO+"-id").val(imagen_devolucion_control.imagen_devolucionActual.id);
		jQuery("#form"+imagen_devolucion_constante1.STR_SUFIJO+"-version_row").val(imagen_devolucion_control.imagen_devolucionActual.versionRow);
		jQuery("#form"+imagen_devolucion_constante1.STR_SUFIJO+"-imagen").val(imagen_devolucion_control.imagen_devolucionActual.imagen);
		jQuery("#form"+imagen_devolucion_constante1.STR_SUFIJO+"-nro_devolucion").val(imagen_devolucion_control.imagen_devolucionActual.nro_devolucion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_devolucion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_devolucion","inventario","","form_imagen_devolucion",formulario,"","",paraEventoTabla,idFilaTabla,imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
	}
	
	cargarCombosFK(imagen_devolucion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_devolucion_control.strRecargarFkTiposNinguno!=null && imagen_devolucion_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_devolucion_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(imagen_devolucion_control) {
		jQuery("#spanstrMensajeid").text(imagen_devolucion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_devolucion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeimagen").text(imagen_devolucion_control.strMensajeimagen);		
		jQuery("#spanstrMensajenro_devolucion").text(imagen_devolucion_control.strMensajenro_devolucion);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_devolucion_control) {
		jQuery("#tdbtnNuevoimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_devolucion").css("display",imagen_devolucion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_devolucion").css("display",imagen_devolucion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_devolucion").css("display",imagen_devolucion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_devolucion").css("display",imagen_devolucion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(imagen_devolucion_control) {
		var i=0;
		
		i=imagen_devolucion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_devolucion_control.imagen_devolucionActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_devolucion_control.imagen_devolucionActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(imagen_devolucion_control.imagen_devolucionActual.imagen);
		jQuery("#t-cel_"+i+"_3").val(imagen_devolucion_control.imagen_devolucionActual.nro_devolucion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_devolucion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_devolucion_control) {
		imagen_devolucion_funcion1.registrarControlesTableValidacionEdition(imagen_devolucion_control,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucionConstante,strParametros);
		
		//imagen_devolucion_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_devolucion_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_devolucion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_devolucion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(imagen_devolucion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_devolucion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_devolucion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_devolucion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_devolucion");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_devolucion");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_devolucion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);			
			
			if(imagen_devolucion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,"imagen_devolucion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			imagen_devolucion_funcion1.validarFormularioJQuery(imagen_devolucion_constante1);
			
			if(imagen_devolucion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_devolucion_control) {
		
		jQuery("#divBusquedaimagen_devolucionAjaxWebPart").css("display",imagen_devolucion_control.strPermisoBusqueda);
		jQuery("#trimagen_devolucionCabeceraBusquedas").css("display",imagen_devolucion_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_devolucion").css("display",imagen_devolucion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_devolucion").css("display",imagen_devolucion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_devolucion").attr("style",imagen_devolucion_control.strPermisoMostrarTodos);
		
		if(imagen_devolucion_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_devolucionNuevo").css("display",imagen_devolucion_control.strPermisoNuevo);
			jQuery("#tdimagen_devolucionNuevoToolBar").css("display",imagen_devolucion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_devolucionDuplicar").css("display",imagen_devolucion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_devolucionDuplicarToolBar").css("display",imagen_devolucion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_devolucionNuevoGuardarCambios").css("display",imagen_devolucion_control.strPermisoNuevo);
			jQuery("#tdimagen_devolucionNuevoGuardarCambiosToolBar").css("display",imagen_devolucion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_devolucion_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_devolucionActualizarToolBar").css("display",imagen_devolucion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_devolucionCopiar").css("display",imagen_devolucion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_devolucionCopiarToolBar").css("display",imagen_devolucion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_devolucionConEditar").css("display",imagen_devolucion_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_devolucionEliminarToolBar").css("display",imagen_devolucion_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdimagen_devolucionGuardarCambios").css("display",imagen_devolucion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_devolucionGuardarCambiosToolBar").css("display",imagen_devolucion_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trimagen_devolucionElementos").css("display",imagen_devolucion_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_devolucionAcciones").css("display",imagen_devolucion_control.strVisibleTablaAcciones);
		jQuery("#trimagen_devolucionParametrosAcciones").css("display",imagen_devolucion_control.strVisibleTablaAcciones);
			
		jQuery("#tdimagen_devolucionCerrarPagina").css("display",imagen_devolucion_control.strPermisoPopup);		
		jQuery("#tdimagen_devolucionCerrarPaginaToolBar").css("display",imagen_devolucion_control.strPermisoPopup);
		//jQuery("#trimagen_devolucionAccionesRelaciones").css("display",imagen_devolucion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_devolucion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_devolucion_webcontrol1.registrarEventosControles();
		
		if(imagen_devolucion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_devolucion_constante1.STR_ES_RELACIONADO=="false") {
			imagen_devolucion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_devolucion_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_devolucion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_devolucion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(imagen_devolucion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_devolucion_webcontrol1.onLoad();
				
			} else {
				if(imagen_devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
					if(imagen_devolucion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
						//imagen_devolucion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(imagen_devolucion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_devolucion_constante1.BIG_ID_ACTUAL,"imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
						//imagen_devolucion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			imagen_devolucion_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var imagen_devolucion_webcontrol1=new imagen_devolucion_webcontrol();

if(imagen_devolucion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_devolucion_webcontrol1.onLoadWindow; 
}

//</script>