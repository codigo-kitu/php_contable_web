//<script type="text/javascript" language="javascript">



//var imagen_estimadoJQueryPaginaWebInteraccion= function (imagen_estimado_control) {
//this.,this.,this.

class imagen_estimado_webcontrol extends imagen_estimado_webcontrol_add {
	
	imagen_estimado_control=null;
	imagen_estimado_controlInicial=null;
	imagen_estimado_controlAuxiliar=null;
		
	//if(imagen_estimado_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_estimado_control) {
		super();
		
		this.imagen_estimado_control=imagen_estimado_control;
	}
		
	actualizarVariablesPagina(imagen_estimado_control) {
		
		if(imagen_estimado_control.action=="index" || imagen_estimado_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_estimado_control);
			
		} else if(imagen_estimado_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_estimado_control);
			
		} else if(imagen_estimado_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_estimado_control);
			
		} else if(imagen_estimado_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_estimado_control);		
		
		} else if(imagen_estimado_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_estimado_control);		
		
		} else if(imagen_estimado_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_estimado_control);		
		
		} else if(imagen_estimado_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_estimado_control);		
		}
		else if(imagen_estimado_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_estimado_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(imagen_estimado_control.action + " Revisar Manejo");
			
			if(imagen_estimado_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(imagen_estimado_control);
				
				return;
			}
			
			//if(imagen_estimado_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(imagen_estimado_control);
			//}
			
			if(imagen_estimado_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(imagen_estimado_control);
			}
			
			if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_estimado_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(imagen_estimado_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(imagen_estimado_control, false);			
			}
			
			if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(imagen_estimado_control);	
			}
			
			if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(imagen_estimado_control);
			}
			
			if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(imagen_estimado_control);
			}
			
			if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(imagen_estimado_control);
			}
			
			if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(imagen_estimado_control);	
			}
			
			if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
			}
			
			if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(imagen_estimado_control);
			}
			
			
			if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(imagen_estimado_control);			
			}
			
			if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(imagen_estimado_control);
			}
			
			
			if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(imagen_estimado_control);
			}
			
			if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(imagen_estimado_control);
			}				
			
			if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_estimado_control);
			}
			
			if(imagen_estimado_control.usuarioActual!=null && imagen_estimado_control.usuarioActual.field_strUserName!=null &&
			imagen_estimado_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(imagen_estimado_control);			
			}
		}
		
		
		if(imagen_estimado_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_estimado_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(imagen_estimado_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_estimado_control);
		this.actualizarPaginaTablaDatos(imagen_estimado_control);
		this.actualizarPaginaCargaGeneralControles(imagen_estimado_control);
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_estimado_control);
		this.actualizarPaginaAreaBusquedas(imagen_estimado_control);
		this.actualizarPaginaCargaCombosFK(imagen_estimado_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_estimado_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_estimado_control);
		this.actualizarPaginaTablaDatos(imagen_estimado_control);
		this.actualizarPaginaCargaGeneralControles(imagen_estimado_control);
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_estimado_control);
		this.actualizarPaginaAreaBusquedas(imagen_estimado_control);
		this.actualizarPaginaCargaCombosFK(imagen_estimado_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(imagen_estimado_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_estimado_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_estimado_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_estimado_control) {
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_estimado_control) {
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_estimado_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_estimado_control);
		this.actualizarPaginaCargaCombosFK(imagen_estimado_control);
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_estimado_control) {
		this.actualizarPaginaAbrirLink(imagen_estimado_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);				
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);
		this.actualizarPaginaFormulario(imagen_estimado_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);
		this.actualizarPaginaFormulario(imagen_estimado_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_estimado_control) {
		this.actualizarPaginaFormulario(imagen_estimado_control);
		this.onLoadCombosDefectoFK(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);
		this.actualizarPaginaFormulario(imagen_estimado_control);
		this.onLoadCombosDefectoFK(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_estimado_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_estimado_control);
		this.actualizarPaginaCargaCombosFK(imagen_estimado_control);
		this.actualizarPaginaFormulario(imagen_estimado_control);
		this.onLoadCombosDefectoFK(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_estimado_control) {
		this.actualizarPaginaAbrirLink(imagen_estimado_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_estimado_control) {
		this.actualizarPaginaImprimir(imagen_estimado_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_estimado_control) {
		this.actualizarPaginaImprimir(imagen_estimado_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_estimado_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_estimado_control) {
		//FORMULARIO
		if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_estimado_control);
			this.actualizarPaginaFormularioAdd(imagen_estimado_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		//COMBOS FK
		if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_estimado_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_estimado_control) {
		//FORMULARIO
		if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_estimado_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);	
		//COMBOS FK
		if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_estimado_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_estimado_control) {
		//FORMULARIO
		if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_estimado_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_estimado_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);	
		//COMBOS FK
		if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_estimado_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control) {
		if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_estimado_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_estimado_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_estimado_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_estimado_control) {
		if(imagen_estimado_funcion1.esPaginaForm()==true) {
			window.opener.imagen_estimado_webcontrol1.actualizarPaginaTablaDatos(imagen_estimado_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_estimado_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_estimado_control) {
		imagen_estimado_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_estimado_control.strAuxiliarUrlPagina);
				
		imagen_estimado_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_estimado_control.strAuxiliarTipo,imagen_estimado_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_estimado_control) {
		imagen_estimado_funcion1.resaltarRestaurarDivMensaje(true,imagen_estimado_control.strAuxiliarMensajeAlert,imagen_estimado_control.strAuxiliarCssMensaje);
			
		if(imagen_estimado_funcion1.esPaginaForm()==true) {
			window.opener.imagen_estimado_funcion1.resaltarRestaurarDivMensaje(true,imagen_estimado_control.strAuxiliarMensajeAlert,imagen_estimado_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(imagen_estimado_control) {
		eval(imagen_estimado_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(imagen_estimado_control, mostrar) {
		
		if(mostrar==true) {
			imagen_estimado_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_estimado_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			imagen_estimado_funcion1.mostrarDivMensaje(true,imagen_estimado_control.strAuxiliarMensaje,imagen_estimado_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_estimado_funcion1.mostrarDivMensaje(false,imagen_estimado_control.strAuxiliarMensaje,imagen_estimado_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(imagen_estimado_control) {
	
		funcionGeneral.printWebPartPage("imagen_estimado",imagen_estimado_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarimagen_estimadosAjaxWebPart").html(imagen_estimado_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("imagen_estimado",jQuery("#divTablaDatosReporteAuxiliarimagen_estimadosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(imagen_estimado_control) {
		this.imagen_estimado_controlInicial=imagen_estimado_control;
			
		if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_estimado_control.strStyleDivArbol,imagen_estimado_control.strStyleDivContent
																,imagen_estimado_control.strStyleDivOpcionesBanner,imagen_estimado_control.strStyleDivExpandirColapsar
																,imagen_estimado_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_estimado_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_estimado_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(imagen_estimado_control) {
		jQuery("#divTablaDatosimagen_estimadosAjaxWebPart").html(imagen_estimado_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_estimados=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_estimados=jQuery("#tblTablaDatosimagen_estimados").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_estimado",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_estimado_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_estimado_webcontrol1.registrarControlesTableEdition(imagen_estimado_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_estimado_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(imagen_estimado_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_estimado_control.imagen_estimadoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_estimado_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(imagen_estimado_control) {
		this.actualizarCssBotonesPagina(imagen_estimado_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_estimado_control.tiposReportes,imagen_estimado_control.tiposReporte
															 	,imagen_estimado_control.tiposPaginacion,imagen_estimado_control.tiposAcciones
																,imagen_estimado_control.tiposColumnasSelect,imagen_estimado_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_estimado_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_estimado_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_estimado_control);			
	}
	
	actualizarPaginaAreaBusquedas(imagen_estimado_control) {
		jQuery("#divBusquedaimagen_estimadoAjaxWebPart").css("display",imagen_estimado_control.strPermisoBusqueda);
		jQuery("#trimagen_estimadoCabeceraBusquedas").css("display",imagen_estimado_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_estimado").css("display",imagen_estimado_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_estimado_control.htmlTablaOrderBy!=null
			&& imagen_estimado_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_estimadoAjaxWebPart").html(imagen_estimado_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_estimado_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_estimado_control.htmlTablaOrderByRel!=null
			&& imagen_estimado_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_estimadoAjaxWebPart").html(imagen_estimado_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_estimado_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_estimadoAjaxWebPart").css("display","none");
			jQuery("#trimagen_estimadoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_estimado").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(imagen_estimado_control) {
		jQuery("#tdimagen_estimadoNuevo").css("display",imagen_estimado_control.strPermisoNuevo);
		jQuery("#trimagen_estimadoElementos").css("display",imagen_estimado_control.strVisibleTablaElementos);
		jQuery("#trimagen_estimadoAcciones").css("display",imagen_estimado_control.strVisibleTablaAcciones);
		jQuery("#trimagen_estimadoParametrosAcciones").css("display",imagen_estimado_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_estimado_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_estimado_control);
				
		if(imagen_estimado_control.imagen_estimadoActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_estimado_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_estimado_control);
	}
	
	actualizarPaginaUsuarioInvitado(imagen_estimado_control) {
	
		var indexPosition=imagen_estimado_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_estimado_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_estimado_control) {
		jQuery("#divResumenimagen_estimadoActualAjaxWebPart").html(imagen_estimado_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_estimado_control) {
		jQuery("#divAccionesRelacionesimagen_estimadoAjaxWebPart").html(imagen_estimado_control.htmlTablaAccionesRelaciones);
			
		imagen_estimado_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_estimado_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_estimado_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_estimado_control) {
		
		if(imagen_estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado").attr("style",imagen_estimado_control.strVisibleFK_Idestimado);
			jQuery("#tblstrVisible"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado").attr("style",imagen_estimado_control.strVisibleFK_Idestimado);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_estimado();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_estimado",id,"estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);		
	}
	
	

	abrirBusquedaParaestimado(strNombreCampoBusqueda){//idActual
		imagen_estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_estimado","estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_estimado_control) {
	
		jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id").val(imagen_estimado_control.imagen_estimadoActual.id);
		jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-version_row").val(imagen_estimado_control.imagen_estimadoActual.versionRow);
		
		if(imagen_estimado_control.imagen_estimadoActual.id_estimado!=null && imagen_estimado_control.imagen_estimadoActual.id_estimado>-1){
			if(jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val() != imagen_estimado_control.imagen_estimadoActual.id_estimado) {
				jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val(imagen_estimado_control.imagen_estimadoActual.id_estimado).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").select2("val", null);
			if(jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-imagen").val(imagen_estimado_control.imagen_estimadoActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_estimado_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_estimado","estimados","","form_imagen_estimado",formulario,"","",paraEventoTabla,idFilaTabla,imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
	}
	
	cargarCombosFK(imagen_estimado_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",imagen_estimado_control.strRecargarFkTipos,",")) { 
				imagen_estimado_webcontrol1.cargarCombosestimadosFK(imagen_estimado_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_estimado_control.strRecargarFkTiposNinguno!=null && imagen_estimado_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_estimado_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estimado",imagen_estimado_control.strRecargarFkTiposNinguno,",")) { 
					imagen_estimado_webcontrol1.cargarCombosestimadosFK(imagen_estimado_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(imagen_estimado_control) {
		jQuery("#spanstrMensajeid").text(imagen_estimado_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_estimado_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_estimado").text(imagen_estimado_control.strMensajeid_estimado);		
		jQuery("#spanstrMensajeimagen").text(imagen_estimado_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_estimado_control) {
		jQuery("#tdbtnNuevoimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_estimado").css("display",imagen_estimado_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_estimado").css("display",imagen_estimado_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_estimado").css("display",imagen_estimado_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_estimado").css("display",imagen_estimado_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaestimadoFK(imagen_estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_estimado_funcion1,imagen_estimado_control.estimadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(imagen_estimado_control) {
		var i=0;
		
		i=imagen_estimado_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_estimado_control.imagen_estimadoActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_estimado_control.imagen_estimadoActual.versionRow);
		
		if(imagen_estimado_control.imagen_estimadoActual.id_estimado!=null && imagen_estimado_control.imagen_estimadoActual.id_estimado>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != imagen_estimado_control.imagen_estimadoActual.id_estimado) {
				jQuery("#t-cel_"+i+"_2").val(imagen_estimado_control.imagen_estimadoActual.id_estimado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(imagen_estimado_control.imagen_estimadoActual.imagen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_estimado_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_estimado_control) {
		imagen_estimado_funcion1.registrarControlesTableValidacionEdition(imagen_estimado_control,imagen_estimado_webcontrol1,imagen_estimado_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimadoConstante,strParametros);
		
		//imagen_estimado_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosestimadosFK(imagen_estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado",imagen_estimado_control.estimadosFK);

		if(imagen_estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_estimado_control.idFilaTablaActual+"_2",imagen_estimado_control.estimadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado",imagen_estimado_control.estimadosFK);

	};

	
	
	registrarComboActionChangeCombosestimadosFK(imagen_estimado_control) {

	};

	
	
	setDefectoValorCombosestimadosFK(imagen_estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_estimado_control.idestimadoDefaultFK>-1 && jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val() != imagen_estimado_control.idestimadoDefaultFK) {
				jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val(imagen_estimado_control.idestimadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val(imagen_estimado_control.idestimadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_estimado_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",imagen_estimado_control.strRecargarFkTipos,",")) { 
				imagen_estimado_webcontrol1.setDefectoValorCombosestimadosFK(imagen_estimado_control);
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
	onLoadCombosEventosFK(imagen_estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",imagen_estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_estimado_webcontrol1.registrarComboActionChangeCombosestimadosFK(imagen_estimado_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_estimado_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_estimado");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_estimado");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_estimado_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);			
			
			if(imagen_estimado_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,"imagen_estimado");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estimado","id_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado_img_busqueda").click(function(){
				imagen_estimado_webcontrol1.abrirBusquedaParaestimado("id_estimado");
				//alert(jQuery('#form-id_estimado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_estimado","FK_Idestimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			imagen_estimado_funcion1.validarFormularioJQuery(imagen_estimado_constante1);
			
			if(imagen_estimado_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_estimado_control) {
		
		jQuery("#divBusquedaimagen_estimadoAjaxWebPart").css("display",imagen_estimado_control.strPermisoBusqueda);
		jQuery("#trimagen_estimadoCabeceraBusquedas").css("display",imagen_estimado_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_estimado").css("display",imagen_estimado_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_estimado").css("display",imagen_estimado_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_estimado").attr("style",imagen_estimado_control.strPermisoMostrarTodos);
		
		if(imagen_estimado_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_estimadoNuevo").css("display",imagen_estimado_control.strPermisoNuevo);
			jQuery("#tdimagen_estimadoNuevoToolBar").css("display",imagen_estimado_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_estimadoDuplicar").css("display",imagen_estimado_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_estimadoDuplicarToolBar").css("display",imagen_estimado_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_estimadoNuevoGuardarCambios").css("display",imagen_estimado_control.strPermisoNuevo);
			jQuery("#tdimagen_estimadoNuevoGuardarCambiosToolBar").css("display",imagen_estimado_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_estimado_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_estimadoActualizarToolBar").css("display",imagen_estimado_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_estimadoCopiar").css("display",imagen_estimado_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_estimadoCopiarToolBar").css("display",imagen_estimado_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_estimadoConEditar").css("display",imagen_estimado_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_estimadoEliminarToolBar").css("display",imagen_estimado_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdimagen_estimadoGuardarCambios").css("display",imagen_estimado_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_estimadoGuardarCambiosToolBar").css("display",imagen_estimado_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trimagen_estimadoElementos").css("display",imagen_estimado_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_estimadoAcciones").css("display",imagen_estimado_control.strVisibleTablaAcciones);
		jQuery("#trimagen_estimadoParametrosAcciones").css("display",imagen_estimado_control.strVisibleTablaAcciones);
			
		jQuery("#tdimagen_estimadoCerrarPagina").css("display",imagen_estimado_control.strPermisoPopup);		
		jQuery("#tdimagen_estimadoCerrarPaginaToolBar").css("display",imagen_estimado_control.strPermisoPopup);
		//jQuery("#trimagen_estimadoAccionesRelaciones").css("display",imagen_estimado_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_estimado_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_estimado_webcontrol1.registrarEventosControles();
		
		if(imagen_estimado_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
			imagen_estimado_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_estimado_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_estimado_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_estimado_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_estimado_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(imagen_estimado_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_estimado_webcontrol1.onLoad();
				
			} else {
				if(imagen_estimado_constante1.BIT_ES_PAGINA_FORM==true) {
					if(imagen_estimado_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
						//imagen_estimado_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(imagen_estimado_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_estimado_constante1.BIG_ID_ACTUAL,"imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
						//imagen_estimado_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			imagen_estimado_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var imagen_estimado_webcontrol1=new imagen_estimado_webcontrol();

if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_estimado_webcontrol1.onLoadWindow; 
}

//</script>