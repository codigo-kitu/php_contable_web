//<script type="text/javascript" language="javascript">



//var imagen_asientoJQueryPaginaWebInteraccion= function (imagen_asiento_control) {
//this.,this.,this.

class imagen_asiento_webcontrol extends imagen_asiento_webcontrol_add {
	
	imagen_asiento_control=null;
	imagen_asiento_controlInicial=null;
	imagen_asiento_controlAuxiliar=null;
		
	//if(imagen_asiento_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_asiento_control) {
		super();
		
		this.imagen_asiento_control=imagen_asiento_control;
	}
		
	actualizarVariablesPagina(imagen_asiento_control) {
		
		if(imagen_asiento_control.action=="index" || imagen_asiento_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_asiento_control);
			
		} else if(imagen_asiento_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_asiento_control);
			
		} else if(imagen_asiento_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_asiento_control);
			
		} else if(imagen_asiento_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_asiento_control);		
		
		} else if(imagen_asiento_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_asiento_control);		
		
		} else if(imagen_asiento_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_asiento_control);		
		
		} else if(imagen_asiento_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_asiento_control);		
		}
		else if(imagen_asiento_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_asiento_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(imagen_asiento_control.action + " Revisar Manejo");
			
			if(imagen_asiento_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(imagen_asiento_control);
				
				return;
			}
			
			//if(imagen_asiento_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(imagen_asiento_control);
			//}
			
			if(imagen_asiento_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(imagen_asiento_control);
			}
			
			if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_asiento_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(imagen_asiento_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(imagen_asiento_control, false);			
			}
			
			if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(imagen_asiento_control);	
			}
			
			if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(imagen_asiento_control);
			}
			
			if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(imagen_asiento_control);
			}
			
			if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(imagen_asiento_control);
			}
			
			if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(imagen_asiento_control);	
			}
			
			if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
			}
			
			if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(imagen_asiento_control);
			}
			
			
			if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(imagen_asiento_control);			
			}
			
			if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(imagen_asiento_control);
			}
			
			
			if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(imagen_asiento_control);
			}
			
			if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(imagen_asiento_control);
			}				
			
			if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_asiento_control);
			}
			
			if(imagen_asiento_control.usuarioActual!=null && imagen_asiento_control.usuarioActual.field_strUserName!=null &&
			imagen_asiento_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(imagen_asiento_control);			
			}
		}
		
		
		if(imagen_asiento_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_asiento_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(imagen_asiento_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_asiento_control);
		this.actualizarPaginaTablaDatos(imagen_asiento_control);
		this.actualizarPaginaCargaGeneralControles(imagen_asiento_control);
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_asiento_control);
		this.actualizarPaginaAreaBusquedas(imagen_asiento_control);
		this.actualizarPaginaCargaCombosFK(imagen_asiento_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_asiento_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_asiento_control);
		this.actualizarPaginaTablaDatos(imagen_asiento_control);
		this.actualizarPaginaCargaGeneralControles(imagen_asiento_control);
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_asiento_control);
		this.actualizarPaginaAreaBusquedas(imagen_asiento_control);
		this.actualizarPaginaCargaCombosFK(imagen_asiento_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(imagen_asiento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_asiento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_asiento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_asiento_control) {
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_asiento_control) {
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_asiento_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_asiento_control);
		this.actualizarPaginaCargaCombosFK(imagen_asiento_control);
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_asiento_control) {
		this.actualizarPaginaAbrirLink(imagen_asiento_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);				
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);
		this.actualizarPaginaFormulario(imagen_asiento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);
		this.actualizarPaginaFormulario(imagen_asiento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_asiento_control) {
		this.actualizarPaginaFormulario(imagen_asiento_control);
		this.onLoadCombosDefectoFK(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);
		this.actualizarPaginaFormulario(imagen_asiento_control);
		this.onLoadCombosDefectoFK(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_asiento_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_asiento_control);
		this.actualizarPaginaCargaCombosFK(imagen_asiento_control);
		this.actualizarPaginaFormulario(imagen_asiento_control);
		this.onLoadCombosDefectoFK(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_asiento_control) {
		this.actualizarPaginaAbrirLink(imagen_asiento_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_asiento_control) {
		this.actualizarPaginaImprimir(imagen_asiento_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_asiento_control) {
		this.actualizarPaginaImprimir(imagen_asiento_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_asiento_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_asiento_control) {
		//FORMULARIO
		if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_asiento_control);
			this.actualizarPaginaFormularioAdd(imagen_asiento_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		//COMBOS FK
		if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_asiento_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_asiento_control) {
		//FORMULARIO
		if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_asiento_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);	
		//COMBOS FK
		if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_asiento_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_asiento_control) {
		//FORMULARIO
		if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_asiento_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_asiento_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);	
		//COMBOS FK
		if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_asiento_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control) {
		if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_asiento_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_asiento_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_asiento_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_asiento_control) {
		if(imagen_asiento_funcion1.esPaginaForm()==true) {
			window.opener.imagen_asiento_webcontrol1.actualizarPaginaTablaDatos(imagen_asiento_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_asiento_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_asiento_control) {
		imagen_asiento_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_asiento_control.strAuxiliarUrlPagina);
				
		imagen_asiento_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_asiento_control.strAuxiliarTipo,imagen_asiento_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_asiento_control) {
		imagen_asiento_funcion1.resaltarRestaurarDivMensaje(true,imagen_asiento_control.strAuxiliarMensajeAlert,imagen_asiento_control.strAuxiliarCssMensaje);
			
		if(imagen_asiento_funcion1.esPaginaForm()==true) {
			window.opener.imagen_asiento_funcion1.resaltarRestaurarDivMensaje(true,imagen_asiento_control.strAuxiliarMensajeAlert,imagen_asiento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(imagen_asiento_control) {
		eval(imagen_asiento_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(imagen_asiento_control, mostrar) {
		
		if(mostrar==true) {
			imagen_asiento_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_asiento_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			imagen_asiento_funcion1.mostrarDivMensaje(true,imagen_asiento_control.strAuxiliarMensaje,imagen_asiento_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_asiento_funcion1.mostrarDivMensaje(false,imagen_asiento_control.strAuxiliarMensaje,imagen_asiento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(imagen_asiento_control) {
	
		funcionGeneral.printWebPartPage("imagen_asiento",imagen_asiento_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarimagen_asientosAjaxWebPart").html(imagen_asiento_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("imagen_asiento",jQuery("#divTablaDatosReporteAuxiliarimagen_asientosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(imagen_asiento_control) {
		this.imagen_asiento_controlInicial=imagen_asiento_control;
			
		if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_asiento_control.strStyleDivArbol,imagen_asiento_control.strStyleDivContent
																,imagen_asiento_control.strStyleDivOpcionesBanner,imagen_asiento_control.strStyleDivExpandirColapsar
																,imagen_asiento_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_asiento_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_asiento_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(imagen_asiento_control) {
		jQuery("#divTablaDatosimagen_asientosAjaxWebPart").html(imagen_asiento_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_asientos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_asientos=jQuery("#tblTablaDatosimagen_asientos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_asiento",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_asiento_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_asiento_webcontrol1.registrarControlesTableEdition(imagen_asiento_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_asiento_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(imagen_asiento_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_asiento_control.imagen_asientoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_asiento_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(imagen_asiento_control) {
		this.actualizarCssBotonesPagina(imagen_asiento_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_asiento_control.tiposReportes,imagen_asiento_control.tiposReporte
															 	,imagen_asiento_control.tiposPaginacion,imagen_asiento_control.tiposAcciones
																,imagen_asiento_control.tiposColumnasSelect,imagen_asiento_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_asiento_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_asiento_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_asiento_control);			
	}
	
	actualizarPaginaAreaBusquedas(imagen_asiento_control) {
		jQuery("#divBusquedaimagen_asientoAjaxWebPart").css("display",imagen_asiento_control.strPermisoBusqueda);
		jQuery("#trimagen_asientoCabeceraBusquedas").css("display",imagen_asiento_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_asiento").css("display",imagen_asiento_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_asiento_control.htmlTablaOrderBy!=null
			&& imagen_asiento_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_asientoAjaxWebPart").html(imagen_asiento_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_asiento_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_asiento_control.htmlTablaOrderByRel!=null
			&& imagen_asiento_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_asientoAjaxWebPart").html(imagen_asiento_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_asiento_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_asientoAjaxWebPart").css("display","none");
			jQuery("#trimagen_asientoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_asiento").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(imagen_asiento_control) {
		jQuery("#tdimagen_asientoNuevo").css("display",imagen_asiento_control.strPermisoNuevo);
		jQuery("#trimagen_asientoElementos").css("display",imagen_asiento_control.strVisibleTablaElementos);
		jQuery("#trimagen_asientoAcciones").css("display",imagen_asiento_control.strVisibleTablaAcciones);
		jQuery("#trimagen_asientoParametrosAcciones").css("display",imagen_asiento_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_asiento_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_asiento_control);
				
		if(imagen_asiento_control.imagen_asientoActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_asiento_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_asiento_control);
	}
	
	actualizarPaginaUsuarioInvitado(imagen_asiento_control) {
	
		var indexPosition=imagen_asiento_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_asiento_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_asiento_control) {
		jQuery("#divResumenimagen_asientoActualAjaxWebPart").html(imagen_asiento_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_asiento_control) {
		jQuery("#divAccionesRelacionesimagen_asientoAjaxWebPart").html(imagen_asiento_control.htmlTablaAccionesRelaciones);
			
		imagen_asiento_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_asiento_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_asiento_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_asiento_control) {
		
		if(imagen_asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",imagen_asiento_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",imagen_asiento_control.strVisibleFK_Idasiento);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_asiento();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_asiento",id,"contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);		
	}
	
	

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		imagen_asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_asiento","asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_asiento_control) {
	
		jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id").val(imagen_asiento_control.imagen_asientoActual.id);
		jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-version_row").val(imagen_asiento_control.imagen_asientoActual.versionRow);
		
		if(imagen_asiento_control.imagen_asientoActual.id_asiento!=null && imagen_asiento_control.imagen_asientoActual.id_asiento>-1){
			if(jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val() != imagen_asiento_control.imagen_asientoActual.id_asiento) {
				jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val(imagen_asiento_control.imagen_asientoActual.id_asiento).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").select2("val", null);
			if(jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-imagen").val(imagen_asiento_control.imagen_asientoActual.imagen);
		jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-nro_asiento").val(imagen_asiento_control.imagen_asientoActual.nro_asiento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_asiento_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_asiento","contabilidad","","form_imagen_asiento",formulario,"","",paraEventoTabla,idFilaTabla,imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
	}
	
	cargarCombosFK(imagen_asiento_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",imagen_asiento_control.strRecargarFkTipos,",")) { 
				imagen_asiento_webcontrol1.cargarCombosasientosFK(imagen_asiento_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_asiento_control.strRecargarFkTiposNinguno!=null && imagen_asiento_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_asiento_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",imagen_asiento_control.strRecargarFkTiposNinguno,",")) { 
					imagen_asiento_webcontrol1.cargarCombosasientosFK(imagen_asiento_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(imagen_asiento_control) {
		jQuery("#spanstrMensajeid").text(imagen_asiento_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_asiento_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_asiento").text(imagen_asiento_control.strMensajeid_asiento);		
		jQuery("#spanstrMensajeimagen").text(imagen_asiento_control.strMensajeimagen);		
		jQuery("#spanstrMensajenro_asiento").text(imagen_asiento_control.strMensajenro_asiento);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_asiento_control) {
		jQuery("#tdbtnNuevoimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_asiento").css("display",imagen_asiento_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_asiento").css("display",imagen_asiento_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_asiento").css("display",imagen_asiento_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_asiento").css("display",imagen_asiento_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaasientoFK(imagen_asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_asiento_funcion1,imagen_asiento_control.asientosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(imagen_asiento_control) {
		var i=0;
		
		i=imagen_asiento_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_asiento_control.imagen_asientoActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_asiento_control.imagen_asientoActual.versionRow);
		
		if(imagen_asiento_control.imagen_asientoActual.id_asiento!=null && imagen_asiento_control.imagen_asientoActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != imagen_asiento_control.imagen_asientoActual.id_asiento) {
				jQuery("#t-cel_"+i+"_2").val(imagen_asiento_control.imagen_asientoActual.id_asiento).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(imagen_asiento_control.imagen_asientoActual.imagen);
		jQuery("#t-cel_"+i+"_4").val(imagen_asiento_control.imagen_asientoActual.nro_asiento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_asiento_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_asiento_control) {
		imagen_asiento_funcion1.registrarControlesTableValidacionEdition(imagen_asiento_control,imagen_asiento_webcontrol1,imagen_asiento_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asientoConstante,strParametros);
		
		//imagen_asiento_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosasientosFK(imagen_asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento",imagen_asiento_control.asientosFK);

		if(imagen_asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_asiento_control.idFilaTablaActual+"_2",imagen_asiento_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",imagen_asiento_control.asientosFK);

	};

	
	
	registrarComboActionChangeCombosasientosFK(imagen_asiento_control) {

	};

	
	
	setDefectoValorCombosasientosFK(imagen_asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_asiento_control.idasientoDefaultFK>-1 && jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val() != imagen_asiento_control.idasientoDefaultFK) {
				jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val(imagen_asiento_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(imagen_asiento_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_asiento_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_asiento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_asiento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",imagen_asiento_control.strRecargarFkTipos,",")) { 
				imagen_asiento_webcontrol1.setDefectoValorCombosasientosFK(imagen_asiento_control);
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
	onLoadCombosEventosFK(imagen_asiento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_asiento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",imagen_asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_asiento_webcontrol1.registrarComboActionChangeCombosasientosFK(imagen_asiento_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_asiento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_asiento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_asiento_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_asiento");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_asiento");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_asiento_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);			
			
			if(imagen_asiento_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,"imagen_asiento");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				imagen_asiento_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_asiento","FK_Idasiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			imagen_asiento_funcion1.validarFormularioJQuery(imagen_asiento_constante1);
			
			if(imagen_asiento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_asiento_control) {
		
		jQuery("#divBusquedaimagen_asientoAjaxWebPart").css("display",imagen_asiento_control.strPermisoBusqueda);
		jQuery("#trimagen_asientoCabeceraBusquedas").css("display",imagen_asiento_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_asiento").css("display",imagen_asiento_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_asiento").css("display",imagen_asiento_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_asiento").attr("style",imagen_asiento_control.strPermisoMostrarTodos);
		
		if(imagen_asiento_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_asientoNuevo").css("display",imagen_asiento_control.strPermisoNuevo);
			jQuery("#tdimagen_asientoNuevoToolBar").css("display",imagen_asiento_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_asientoDuplicar").css("display",imagen_asiento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_asientoDuplicarToolBar").css("display",imagen_asiento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_asientoNuevoGuardarCambios").css("display",imagen_asiento_control.strPermisoNuevo);
			jQuery("#tdimagen_asientoNuevoGuardarCambiosToolBar").css("display",imagen_asiento_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_asiento_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_asientoActualizarToolBar").css("display",imagen_asiento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_asientoCopiar").css("display",imagen_asiento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_asientoCopiarToolBar").css("display",imagen_asiento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_asientoConEditar").css("display",imagen_asiento_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_asientoEliminarToolBar").css("display",imagen_asiento_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdimagen_asientoGuardarCambios").css("display",imagen_asiento_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_asientoGuardarCambiosToolBar").css("display",imagen_asiento_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trimagen_asientoElementos").css("display",imagen_asiento_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_asientoAcciones").css("display",imagen_asiento_control.strVisibleTablaAcciones);
		jQuery("#trimagen_asientoParametrosAcciones").css("display",imagen_asiento_control.strVisibleTablaAcciones);
			
		jQuery("#tdimagen_asientoCerrarPagina").css("display",imagen_asiento_control.strPermisoPopup);		
		jQuery("#tdimagen_asientoCerrarPaginaToolBar").css("display",imagen_asiento_control.strPermisoPopup);
		//jQuery("#trimagen_asientoAccionesRelaciones").css("display",imagen_asiento_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_asiento_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_asiento_webcontrol1.registrarEventosControles();
		
		if(imagen_asiento_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
			imagen_asiento_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_asiento_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_asiento_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_asiento_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_asiento_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(imagen_asiento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_asiento_webcontrol1.onLoad();
				
			} else {
				if(imagen_asiento_constante1.BIT_ES_PAGINA_FORM==true) {
					if(imagen_asiento_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
						//imagen_asiento_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(imagen_asiento_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_asiento_constante1.BIG_ID_ACTUAL,"imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
						//imagen_asiento_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			imagen_asiento_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var imagen_asiento_webcontrol1=new imagen_asiento_webcontrol();

if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_asiento_webcontrol1.onLoadWindow; 
}

//</script>