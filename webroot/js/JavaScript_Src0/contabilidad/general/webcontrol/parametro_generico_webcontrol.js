//<script type="text/javascript" language="javascript">



//var parametro_genericoJQueryPaginaWebInteraccion= function (parametro_generico_control) {
//this.,this.,this.

class parametro_generico_webcontrol extends parametro_generico_webcontrol_add {
	
	parametro_generico_control=null;
	parametro_generico_controlInicial=null;
	parametro_generico_controlAuxiliar=null;
		
	//if(parametro_generico_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_generico_control) {
		super();
		
		this.parametro_generico_control=parametro_generico_control;
	}
		
	actualizarVariablesPagina(parametro_generico_control) {
		
		if(parametro_generico_control.action=="index" || parametro_generico_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_generico_control);
			
		} else if(parametro_generico_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_generico_control);
			
		} else if(parametro_generico_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_generico_control);
			
		} else if(parametro_generico_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_generico_control);		
		
		} else if(parametro_generico_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_generico_control);		
		
		} else if(parametro_generico_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_generico_control);		
		
		} else if(parametro_generico_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_generico_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(parametro_generico_control.action + " Revisar Manejo");
			
			if(parametro_generico_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(parametro_generico_control);
				
				return;
			}
			
			//if(parametro_generico_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(parametro_generico_control);
			//}
			
			if(parametro_generico_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(parametro_generico_control);
			}
			
			if(parametro_generico_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_generico_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(parametro_generico_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(parametro_generico_control, false);			
			}
			
			if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(parametro_generico_control);	
			}
			
			if(parametro_generico_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(parametro_generico_control);
			}
			
			if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(parametro_generico_control);
			}
			
			if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(parametro_generico_control);
			}
			
			if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(parametro_generico_control);	
			}
			
			if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
			}
			
			if(parametro_generico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(parametro_generico_control);
			}
			
			
			if(parametro_generico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(parametro_generico_control);			
			}
			
			if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(parametro_generico_control);
			}
			
			
			if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(parametro_generico_control);
			}
			
			if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(parametro_generico_control);
			}				
			
			if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_generico_control);
			}
			
			if(parametro_generico_control.usuarioActual!=null && parametro_generico_control.usuarioActual.field_strUserName!=null &&
			parametro_generico_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(parametro_generico_control);			
			}
		}
		
		
		if(parametro_generico_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_generico_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(parametro_generico_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_generico_control);
		this.actualizarPaginaTablaDatos(parametro_generico_control);
		this.actualizarPaginaCargaGeneralControles(parametro_generico_control);
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_generico_control);
		this.actualizarPaginaAreaBusquedas(parametro_generico_control);
		this.actualizarPaginaCargaCombosFK(parametro_generico_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_generico_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_generico_control);
		this.actualizarPaginaTablaDatos(parametro_generico_control);
		this.actualizarPaginaCargaGeneralControles(parametro_generico_control);
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_generico_control);
		this.actualizarPaginaAreaBusquedas(parametro_generico_control);
		this.actualizarPaginaCargaCombosFK(parametro_generico_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(parametro_generico_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_generico_control);		
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_generico_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_generico_control);		
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_generico_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_generico_control);		
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_generico_control) {
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_generico_control) {
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_generico_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_generico_control);
		this.actualizarPaginaCargaCombosFK(parametro_generico_control);
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_generico_control) {
		this.actualizarPaginaAbrirLink(parametro_generico_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);				
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);
		this.actualizarPaginaFormulario(parametro_generico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);
		this.actualizarPaginaFormulario(parametro_generico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_generico_control) {
		this.actualizarPaginaFormulario(parametro_generico_control);
		this.onLoadCombosDefectoFK(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);
		this.actualizarPaginaFormulario(parametro_generico_control);
		this.onLoadCombosDefectoFK(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_generico_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_generico_control);
		this.actualizarPaginaCargaCombosFK(parametro_generico_control);
		this.actualizarPaginaFormulario(parametro_generico_control);
		this.onLoadCombosDefectoFK(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_generico_control) {
		this.actualizarPaginaAbrirLink(parametro_generico_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_generico_control) {
		this.actualizarPaginaImprimir(parametro_generico_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_generico_control) {
		this.actualizarPaginaImprimir(parametro_generico_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_generico_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_generico_control) {
		//FORMULARIO
		if(parametro_generico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_generico_control);
			this.actualizarPaginaFormularioAdd(parametro_generico_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		//COMBOS FK
		if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_generico_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_generico_control) {
		//FORMULARIO
		if(parametro_generico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_generico_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);	
		//COMBOS FK
		if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_generico_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control) {
		if(parametro_generico_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_generico_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_generico_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_generico_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_generico_control) {
		if(parametro_generico_funcion1.esPaginaForm()==true) {
			window.opener.parametro_generico_webcontrol1.actualizarPaginaTablaDatos(parametro_generico_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_generico_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_generico_control) {
		parametro_generico_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_generico_control.strAuxiliarUrlPagina);
				
		parametro_generico_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_generico_control.strAuxiliarTipo,parametro_generico_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_generico_control) {
		parametro_generico_funcion1.resaltarRestaurarDivMensaje(true,parametro_generico_control.strAuxiliarMensajeAlert,parametro_generico_control.strAuxiliarCssMensaje);
			
		if(parametro_generico_funcion1.esPaginaForm()==true) {
			window.opener.parametro_generico_funcion1.resaltarRestaurarDivMensaje(true,parametro_generico_control.strAuxiliarMensajeAlert,parametro_generico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(parametro_generico_control) {
		eval(parametro_generico_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(parametro_generico_control, mostrar) {
		
		if(mostrar==true) {
			parametro_generico_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_generico_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			parametro_generico_funcion1.mostrarDivMensaje(true,parametro_generico_control.strAuxiliarMensaje,parametro_generico_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_generico_funcion1.mostrarDivMensaje(false,parametro_generico_control.strAuxiliarMensaje,parametro_generico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(parametro_generico_control) {
	
		funcionGeneral.printWebPartPage("parametro_generico",parametro_generico_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarparametro_genericosAjaxWebPart").html(parametro_generico_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("parametro_generico",jQuery("#divTablaDatosReporteAuxiliarparametro_genericosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(parametro_generico_control) {
		this.parametro_generico_controlInicial=parametro_generico_control;
			
		if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_generico_control.strStyleDivArbol,parametro_generico_control.strStyleDivContent
																,parametro_generico_control.strStyleDivOpcionesBanner,parametro_generico_control.strStyleDivExpandirColapsar
																,parametro_generico_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_generico_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_generico_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(parametro_generico_control) {
		jQuery("#divTablaDatosparametro_genericosAjaxWebPart").html(parametro_generico_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_genericos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_genericos=jQuery("#tblTablaDatosparametro_genericos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_generico",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_generico_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_generico_webcontrol1.registrarControlesTableEdition(parametro_generico_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_generico_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(parametro_generico_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_generico_control.parametro_genericoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_generico_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(parametro_generico_control) {
		this.actualizarCssBotonesPagina(parametro_generico_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_generico_control.tiposReportes,parametro_generico_control.tiposReporte
															 	,parametro_generico_control.tiposPaginacion,parametro_generico_control.tiposAcciones
																,parametro_generico_control.tiposColumnasSelect,parametro_generico_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_generico_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_generico_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_generico_control);			
	}
	
	actualizarPaginaAreaBusquedas(parametro_generico_control) {
		jQuery("#divBusquedaparametro_genericoAjaxWebPart").css("display",parametro_generico_control.strPermisoBusqueda);
		jQuery("#trparametro_genericoCabeceraBusquedas").css("display",parametro_generico_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_generico").css("display",parametro_generico_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_generico_control.htmlTablaOrderBy!=null
			&& parametro_generico_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_genericoAjaxWebPart").html(parametro_generico_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_generico_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_generico_control.htmlTablaOrderByRel!=null
			&& parametro_generico_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_genericoAjaxWebPart").html(parametro_generico_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_generico_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_genericoAjaxWebPart").css("display","none");
			jQuery("#trparametro_genericoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_generico").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(parametro_generico_control) {
		jQuery("#tdparametro_genericoNuevo").css("display",parametro_generico_control.strPermisoNuevo);
		jQuery("#trparametro_genericoElementos").css("display",parametro_generico_control.strVisibleTablaElementos);
		jQuery("#trparametro_genericoAcciones").css("display",parametro_generico_control.strVisibleTablaAcciones);
		jQuery("#trparametro_genericoParametrosAcciones").css("display",parametro_generico_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_generico_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_generico_control);
				
		if(parametro_generico_control.parametro_genericoActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_generico_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_generico_control);
	}
	
	actualizarPaginaUsuarioInvitado(parametro_generico_control) {
	
		var indexPosition=parametro_generico_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_generico_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_generico_control) {
		jQuery("#divResumenparametro_genericoActualAjaxWebPart").html(parametro_generico_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_generico_control) {
		jQuery("#divAccionesRelacionesparametro_genericoAjaxWebPart").html(parametro_generico_control.htmlTablaAccionesRelaciones);
			
		parametro_generico_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_generico_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_generico_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_generico_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_generico();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_generico",id,"general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_generico_control) {
	
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-id").val(parametro_generico_control.parametro_genericoActual.id);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-version_row").val(parametro_generico_control.parametro_genericoActual.versionRow);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-parametro").val(parametro_generico_control.parametro_genericoActual.parametro);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-descripcion_pantalla").val(parametro_generico_control.parametro_genericoActual.descripcion_pantalla);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor_caracteristica").val(parametro_generico_control.parametro_genericoActual.valor_caracteristica);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor2_caracteristica").val(parametro_generico_control.parametro_genericoActual.valor2_caracteristica);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor3_caracteristica").val(parametro_generico_control.parametro_genericoActual.valor3_caracteristica);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor_fecha").val(parametro_generico_control.parametro_genericoActual.valor_fecha);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor_numerico").val(parametro_generico_control.parametro_genericoActual.valor_numerico);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor2_numerico").val(parametro_generico_control.parametro_genericoActual.valor2_numerico);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor_binario").val(parametro_generico_control.parametro_genericoActual.valor_binario);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_generico_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_generico","general","","form_parametro_generico",formulario,"","",paraEventoTabla,idFilaTabla,parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
	}
	
	cargarCombosFK(parametro_generico_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_generico_control.strRecargarFkTiposNinguno!=null && parametro_generico_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_generico_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(parametro_generico_control) {
		jQuery("#spanstrMensajeid").text(parametro_generico_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_generico_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeparametro").text(parametro_generico_control.strMensajeparametro);		
		jQuery("#spanstrMensajedescripcion_pantalla").text(parametro_generico_control.strMensajedescripcion_pantalla);		
		jQuery("#spanstrMensajevalor_caracteristica").text(parametro_generico_control.strMensajevalor_caracteristica);		
		jQuery("#spanstrMensajevalor2_caracteristica").text(parametro_generico_control.strMensajevalor2_caracteristica);		
		jQuery("#spanstrMensajevalor3_caracteristica").text(parametro_generico_control.strMensajevalor3_caracteristica);		
		jQuery("#spanstrMensajevalor_fecha").text(parametro_generico_control.strMensajevalor_fecha);		
		jQuery("#spanstrMensajevalor_numerico").text(parametro_generico_control.strMensajevalor_numerico);		
		jQuery("#spanstrMensajevalor2_numerico").text(parametro_generico_control.strMensajevalor2_numerico);		
		jQuery("#spanstrMensajevalor_binario").text(parametro_generico_control.strMensajevalor_binario);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_generico_control) {
		jQuery("#tdbtnNuevoparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_generico").css("display",parametro_generico_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_generico").css("display",parametro_generico_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_generico").css("display",parametro_generico_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_generico").css("display",parametro_generico_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(parametro_generico_control) {
		var i=0;
		
		i=parametro_generico_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_generico_control.parametro_genericoActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_generico_control.parametro_genericoActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(parametro_generico_control.parametro_genericoActual.parametro);
		jQuery("#t-cel_"+i+"_3").val(parametro_generico_control.parametro_genericoActual.descripcion_pantalla);
		jQuery("#t-cel_"+i+"_4").val(parametro_generico_control.parametro_genericoActual.valor_caracteristica);
		jQuery("#t-cel_"+i+"_5").val(parametro_generico_control.parametro_genericoActual.valor2_caracteristica);
		jQuery("#t-cel_"+i+"_6").val(parametro_generico_control.parametro_genericoActual.valor3_caracteristica);
		jQuery("#t-cel_"+i+"_7").val(parametro_generico_control.parametro_genericoActual.valor_fecha);
		jQuery("#t-cel_"+i+"_8").val(parametro_generico_control.parametro_genericoActual.valor_numerico);
		jQuery("#t-cel_"+i+"_9").val(parametro_generico_control.parametro_genericoActual.valor2_numerico);
		jQuery("#t-cel_"+i+"_10").val(parametro_generico_control.parametro_genericoActual.valor_binario);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_generico_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_generico_control) {
		parametro_generico_funcion1.registrarControlesTableValidacionEdition(parametro_generico_control,parametro_generico_webcontrol1,parametro_generico_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_genericoConstante,strParametros);
		
		//parametro_generico_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_generico_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_generico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_generico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(parametro_generico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_generico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_generico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_generico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_generico_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_generico");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_generico");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_generico_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);			
			
			if(parametro_generico_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,"parametro_generico");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			parametro_generico_funcion1.validarFormularioJQuery(parametro_generico_constante1);
			
			if(parametro_generico_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_generico_control) {
		
		jQuery("#divBusquedaparametro_genericoAjaxWebPart").css("display",parametro_generico_control.strPermisoBusqueda);
		jQuery("#trparametro_genericoCabeceraBusquedas").css("display",parametro_generico_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_generico").css("display",parametro_generico_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_generico").css("display",parametro_generico_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_generico").attr("style",parametro_generico_control.strPermisoMostrarTodos);
		
		if(parametro_generico_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_genericoNuevo").css("display",parametro_generico_control.strPermisoNuevo);
			jQuery("#tdparametro_genericoNuevoToolBar").css("display",parametro_generico_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_genericoDuplicar").css("display",parametro_generico_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_genericoDuplicarToolBar").css("display",parametro_generico_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_genericoNuevoGuardarCambios").css("display",parametro_generico_control.strPermisoNuevo);
			jQuery("#tdparametro_genericoNuevoGuardarCambiosToolBar").css("display",parametro_generico_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_generico_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_genericoActualizarToolBar").css("display",parametro_generico_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_genericoCopiar").css("display",parametro_generico_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_genericoCopiarToolBar").css("display",parametro_generico_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_genericoConEditar").css("display",parametro_generico_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_genericoEliminarToolBar").css("display",parametro_generico_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdparametro_genericoGuardarCambios").css("display",parametro_generico_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_genericoGuardarCambiosToolBar").css("display",parametro_generico_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trparametro_genericoElementos").css("display",parametro_generico_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_genericoAcciones").css("display",parametro_generico_control.strVisibleTablaAcciones);
		jQuery("#trparametro_genericoParametrosAcciones").css("display",parametro_generico_control.strVisibleTablaAcciones);
			
		jQuery("#tdparametro_genericoCerrarPagina").css("display",parametro_generico_control.strPermisoPopup);		
		jQuery("#tdparametro_genericoCerrarPaginaToolBar").css("display",parametro_generico_control.strPermisoPopup);
		//jQuery("#trparametro_genericoAccionesRelaciones").css("display",parametro_generico_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_generico_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_generico_webcontrol1.registrarEventosControles();
		
		if(parametro_generico_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
			parametro_generico_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_generico_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_generico_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_generico_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_generico_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(parametro_generico_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_generico_webcontrol1.onLoad();
				
			} else {
				if(parametro_generico_constante1.BIT_ES_PAGINA_FORM==true) {
					if(parametro_generico_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
						//parametro_generico_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(parametro_generico_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_generico_constante1.BIG_ID_ACTUAL,"parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
						//parametro_generico_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			parametro_generico_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var parametro_generico_webcontrol1=new parametro_generico_webcontrol();

if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_generico_webcontrol1.onLoadWindow; 
}

//</script>