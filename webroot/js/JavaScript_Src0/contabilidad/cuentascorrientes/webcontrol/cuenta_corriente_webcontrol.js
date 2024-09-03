//<script type="text/javascript" language="javascript">



//var cuenta_corrienteJQueryPaginaWebInteraccion= function (cuenta_corriente_control) {
//this.,this.,this.

class cuenta_corriente_webcontrol extends cuenta_corriente_webcontrol_add {
	
	cuenta_corriente_control=null;
	cuenta_corriente_controlInicial=null;
	cuenta_corriente_controlAuxiliar=null;
		
	//if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_corriente_control) {
		super();
		
		this.cuenta_corriente_control=cuenta_corriente_control;
	}
		
	actualizarVariablesPagina(cuenta_corriente_control) {
		
		if(cuenta_corriente_control.action=="index" || cuenta_corriente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_corriente_control);
			
		} else if(cuenta_corriente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cuenta_corriente_control);
			
		} else if(cuenta_corriente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cuenta_corriente_control);
			
		} else if(cuenta_corriente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_corriente_control);		
		
		} else if(cuenta_corriente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cuenta_corriente_control);		
		
		} else if(cuenta_corriente_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_corriente_control);		
		
		} else if(cuenta_corriente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_corriente_control);		
		}
		else if(cuenta_corriente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_control);		
		}
		else if(cuenta_corriente_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_corriente_control);		
		}
		else if(cuenta_corriente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_corriente_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(cuenta_corriente_control.action + " Revisar Manejo");
			
			if(cuenta_corriente_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(cuenta_corriente_control);
				
				return;
			}
			
			//if(cuenta_corriente_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(cuenta_corriente_control);
			//}
			
			if(cuenta_corriente_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(cuenta_corriente_control);
			}
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_corriente_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(cuenta_corriente_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(cuenta_corriente_control, false);			
			}
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(cuenta_corriente_control);	
			}
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(cuenta_corriente_control);
			}
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(cuenta_corriente_control);
			}
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);
			}
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(cuenta_corriente_control);	
			}
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
			}
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(cuenta_corriente_control);
			}
			
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(cuenta_corriente_control);			
			}
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(cuenta_corriente_control);
			}
			
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_corriente_control);
			}
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(cuenta_corriente_control);
			}				
			
			if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_corriente_control);
			}
			
			if(cuenta_corriente_control.usuarioActual!=null && cuenta_corriente_control.usuarioActual.field_strUserName!=null &&
			cuenta_corriente_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(cuenta_corriente_control);			
			}
		}
		
		
		if(cuenta_corriente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_corriente_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_control);
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_control);
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_corriente_control) {
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cuenta_corriente_control) {
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_corriente_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_corriente_control) {
		this.actualizarPaginaAbrirLink(cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);				
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		this.actualizarPaginaFormulario(cuenta_corriente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		this.actualizarPaginaFormulario(cuenta_corriente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cuenta_corriente_control) {
		this.actualizarPaginaFormulario(cuenta_corriente_control);
		this.onLoadCombosDefectoFK(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		this.actualizarPaginaFormulario(cuenta_corriente_control);
		this.onLoadCombosDefectoFK(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_corriente_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);
		this.actualizarPaginaFormulario(cuenta_corriente_control);
		this.onLoadCombosDefectoFK(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_corriente_control) {
		this.actualizarPaginaAbrirLink(cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_corriente_control) {
		this.actualizarPaginaImprimir(cuenta_corriente_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_corriente_control) {
		this.actualizarPaginaImprimir(cuenta_corriente_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_corriente_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_corriente_control) {
		//FORMULARIO
		if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_corriente_control);
			this.actualizarPaginaFormularioAdd(cuenta_corriente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		//COMBOS FK
		if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(cuenta_corriente_control) {
		//FORMULARIO
		if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_corriente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);	
		//COMBOS FK
		if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		this.actualizarPaginaFormulario(cuenta_corriente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_corriente_control) {
		//FORMULARIO
		if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_corriente_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_corriente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);	
		//COMBOS FK
		if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_corriente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_corriente_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control) {
		if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_corriente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_corriente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_corriente_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_control) {
		if(cuenta_corriente_funcion1.esPaginaForm()==true) {
			window.opener.cuenta_corriente_webcontrol1.actualizarPaginaTablaDatos(cuenta_corriente_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_corriente_control) {
		cuenta_corriente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_corriente_control.strAuxiliarUrlPagina);
				
		cuenta_corriente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_corriente_control.strAuxiliarTipo,cuenta_corriente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_corriente_control) {
		cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,cuenta_corriente_control.strAuxiliarMensajeAlert,cuenta_corriente_control.strAuxiliarCssMensaje);
			
		if(cuenta_corriente_funcion1.esPaginaForm()==true) {
			window.opener.cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,cuenta_corriente_control.strAuxiliarMensajeAlert,cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(cuenta_corriente_control) {
		eval(cuenta_corriente_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(cuenta_corriente_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_corriente_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_corriente_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			cuenta_corriente_funcion1.mostrarDivMensaje(true,cuenta_corriente_control.strAuxiliarMensaje,cuenta_corriente_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_corriente_funcion1.mostrarDivMensaje(false,cuenta_corriente_control.strAuxiliarMensaje,cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(cuenta_corriente_control) {
	
		funcionGeneral.printWebPartPage("cuenta_corriente",cuenta_corriente_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcuenta_corrientesAjaxWebPart").html(cuenta_corriente_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("cuenta_corriente",jQuery("#divTablaDatosReporteAuxiliarcuenta_corrientesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(cuenta_corriente_control) {
		this.cuenta_corriente_controlInicial=cuenta_corriente_control;
			
		if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_corriente_control.strStyleDivArbol,cuenta_corriente_control.strStyleDivContent
																,cuenta_corriente_control.strStyleDivOpcionesBanner,cuenta_corriente_control.strStyleDivExpandirColapsar
																,cuenta_corriente_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=cuenta_corriente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cuenta_corriente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(cuenta_corriente_control) {
		jQuery("#divTablaDatoscuenta_corrientesAjaxWebPart").html(cuenta_corriente_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscuenta_corrientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscuenta_corrientes=jQuery("#tblTablaDatoscuenta_corrientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cuenta_corriente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cuenta_corriente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cuenta_corriente_webcontrol1.registrarControlesTableEdition(cuenta_corriente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cuenta_corriente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(cuenta_corriente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cuenta_corriente_control.cuenta_corrienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cuenta_corriente_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(cuenta_corriente_control) {
		this.actualizarCssBotonesPagina(cuenta_corriente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_corriente_control.tiposReportes,cuenta_corriente_control.tiposReporte
															 	,cuenta_corriente_control.tiposPaginacion,cuenta_corriente_control.tiposAcciones
																,cuenta_corriente_control.tiposColumnasSelect,cuenta_corriente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cuenta_corriente_control.tiposRelaciones,cuenta_corriente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_corriente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_corriente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_corriente_control);			
	}
	
	actualizarPaginaAreaBusquedas(cuenta_corriente_control) {
		jQuery("#divBusquedacuenta_corrienteAjaxWebPart").css("display",cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trcuenta_corrienteCabeceraBusquedas").css("display",cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_corriente").css("display",cuenta_corriente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cuenta_corriente_control.htmlTablaOrderBy!=null
			&& cuenta_corriente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycuenta_corrienteAjaxWebPart").html(cuenta_corriente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cuenta_corriente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cuenta_corriente_control.htmlTablaOrderByRel!=null
			&& cuenta_corriente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcuenta_corrienteAjaxWebPart").html(cuenta_corriente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacuenta_corrienteAjaxWebPart").css("display","none");
			jQuery("#trcuenta_corrienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacuenta_corriente").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(cuenta_corriente_control) {
		jQuery("#tdcuenta_corrienteNuevo").css("display",cuenta_corriente_control.strPermisoNuevo);
		jQuery("#trcuenta_corrienteElementos").css("display",cuenta_corriente_control.strVisibleTablaElementos);
		jQuery("#trcuenta_corrienteAcciones").css("display",cuenta_corriente_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_corrienteParametrosAcciones").css("display",cuenta_corriente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cuenta_corriente_control) {
	
		this.actualizarCssBotonesMantenimiento(cuenta_corriente_control);
				
		if(cuenta_corriente_control.cuenta_corrienteActual!=null) {//form
			
			this.actualizarCamposFormulario(cuenta_corriente_control);			
		}
						
		this.actualizarSpanMensajesCampos(cuenta_corriente_control);
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_corriente_control) {
	
		var indexPosition=cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(cuenta_corriente_control) {
		jQuery("#divResumencuenta_corrienteActualAjaxWebPart").html(cuenta_corriente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_corriente_control) {
		jQuery("#divAccionesRelacionescuenta_corrienteAjaxWebPart").html(cuenta_corriente_control.htmlTablaAccionesRelaciones);
			
		cuenta_corriente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cuenta_corriente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cuenta_corriente_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cuenta_corriente_control) {
		
		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco").attr("style",cuenta_corriente_control.strVisibleFK_Idbanco);
			jQuery("#tblstrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco").attr("style",cuenta_corriente_control.strVisibleFK_Idbanco);
		}

		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",cuenta_corriente_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",cuenta_corriente_control.strVisibleFK_Idcuenta);
		}

		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cuenta_corriente_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cuenta_corriente_control.strVisibleFK_Idejercicio);
		}

		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_corriente_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_corriente_control.strVisibleFK_Idempresa);
		}

		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes").attr("style",cuenta_corriente_control.strVisibleFK_Idestado_cuentas_corrientes);
			jQuery("#tblstrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes").attr("style",cuenta_corriente_control.strVisibleFK_Idestado_cuentas_corrientes);
		}

		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cuenta_corriente_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cuenta_corriente_control.strVisibleFK_Idperiodo);
		}

		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_corriente_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_corriente_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncuenta_corriente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cuenta_corriente",id,"cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente","empresa","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente","ejercicio","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente","periodo","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente","usuario","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}

	abrirBusquedaParabanco(strNombreCampoBusqueda){//idActual
		cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente","banco","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente","cuenta","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}

	abrirBusquedaParaestado_cuentas_corrientes(strNombreCampoBusqueda){//idActual
		cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente","estado_cuentas_corrientes","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cuenta_corriente_control) {
	
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id").val(cuenta_corriente_control.cuenta_corrienteActual.id);
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-version_row").val(cuenta_corriente_control.cuenta_corrienteActual.versionRow);
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_empresa!=null && cuenta_corriente_control.cuenta_corrienteActual.id_empresa>-1){
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_corriente_control.cuenta_corrienteActual.id_empresa) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_corriente_control.cuenta_corrienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_ejercicio!=null && cuenta_corriente_control.cuenta_corrienteActual.id_ejercicio>-1){
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_corriente_control.cuenta_corrienteActual.id_ejercicio) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_corriente_control.cuenta_corrienteActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_periodo!=null && cuenta_corriente_control.cuenta_corrienteActual.id_periodo>-1){
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_corriente_control.cuenta_corrienteActual.id_periodo) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_corriente_control.cuenta_corrienteActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_usuario!=null && cuenta_corriente_control.cuenta_corrienteActual.id_usuario>-1){
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_corriente_control.cuenta_corrienteActual.id_usuario) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_corriente_control.cuenta_corrienteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_banco!=null && cuenta_corriente_control.cuenta_corrienteActual.id_banco>-1){
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val() != cuenta_corriente_control.cuenta_corrienteActual.id_banco) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val(cuenta_corriente_control.cuenta_corrienteActual.id_banco).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-nro_cuenta").val(cuenta_corriente_control.cuenta_corrienteActual.nro_cuenta);
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-nombre").val(cuenta_corriente_control.cuenta_corrienteActual.nombre);
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-balance_inicial").val(cuenta_corriente_control.cuenta_corrienteActual.balance_inicial);
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-contador_cheque").val(cuenta_corriente_control.cuenta_corrienteActual.contador_cheque);
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_cuenta!=null && cuenta_corriente_control.cuenta_corrienteActual.id_cuenta>-1){
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val() != cuenta_corriente_control.cuenta_corrienteActual.id_cuenta) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val(cuenta_corriente_control.cuenta_corrienteActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-descripcion").val(cuenta_corriente_control.cuenta_corrienteActual.descripcion);
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes!=null && cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes>-1){
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val() != cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val(cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-icono_cuenta").val(cuenta_corriente_control.cuenta_corrienteActual.icono_cuenta);
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-icono_cuenta_ubicacion").val(cuenta_corriente_control.cuenta_corrienteActual.icono_cuenta_ubicacion);
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-cuenta_contable").val(cuenta_corriente_control.cuenta_corrienteActual.cuenta_contable);
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-nombre_banco").val(cuenta_corriente_control.cuenta_corrienteActual.nombre_banco);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cuenta_corriente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cuenta_corriente","cuentascorrientes","","form_cuenta_corriente",formulario,"","",paraEventoTabla,idFilaTabla,cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}
	
	cargarCombosFK(cuenta_corriente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosempresasFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosperiodosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosusuariosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_banco",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosbancosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarComboscuentasFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_corrientes",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosestado_cuentas_corrientessFK(cuenta_corriente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_corriente_control.strRecargarFkTiposNinguno!=null && cuenta_corriente_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_corriente_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosempresasFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosperiodosFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosusuariosFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_banco",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosbancosFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarComboscuentasFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_cuentas_corrientes",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosestado_cuentas_corrientessFK(cuenta_corriente_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(cuenta_corriente_control) {
		jQuery("#spanstrMensajeid").text(cuenta_corriente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cuenta_corriente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cuenta_corriente_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_ejercicio").text(cuenta_corriente_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cuenta_corriente_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(cuenta_corriente_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_banco").text(cuenta_corriente_control.strMensajeid_banco);		
		jQuery("#spanstrMensajenro_cuenta").text(cuenta_corriente_control.strMensajenro_cuenta);		
		jQuery("#spanstrMensajenombre").text(cuenta_corriente_control.strMensajenombre);		
		jQuery("#spanstrMensajebalance_inicial").text(cuenta_corriente_control.strMensajebalance_inicial);		
		jQuery("#spanstrMensajecontador_cheque").text(cuenta_corriente_control.strMensajecontador_cheque);		
		jQuery("#spanstrMensajeid_cuenta").text(cuenta_corriente_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajedescripcion").text(cuenta_corriente_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_estado_cuentas_corrientes").text(cuenta_corriente_control.strMensajeid_estado_cuentas_corrientes);		
		jQuery("#spanstrMensajeicono_cuenta").text(cuenta_corriente_control.strMensajeicono_cuenta);		
		jQuery("#spanstrMensajeicono_cuenta_ubicacion").text(cuenta_corriente_control.strMensajeicono_cuenta_ubicacion);		
		jQuery("#spanstrMensajecuenta_contable").text(cuenta_corriente_control.strMensajecuenta_contable);		
		jQuery("#spanstrMensajenombre_banco").text(cuenta_corriente_control.strMensajenombre_banco);		
	}
	
	actualizarCssBotonesMantenimiento(cuenta_corriente_control) {
		jQuery("#tdbtnNuevocuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocuenta_corriente").css("display",cuenta_corriente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcuenta_corriente").css("display",cuenta_corriente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcuenta_corriente").css("display",cuenta_corriente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscuenta_corriente").css("display",cuenta_corriente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionretiro_cuenta_corriente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionPararetiro_cuenta_corrientes(idActual);
		});
		jQuery("#imgdivrelaciondeposito_cuenta_corriente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionParadeposito_cuenta_corrientes(idActual);
		});
		jQuery("#imgdivrelacioncuenta_corriente_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		});
		jQuery("#imgdivrelacioncheque").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionParacheques(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.empresasFK);
	}

	cargarComboEditarTablaejercicioFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.usuariosFK);
	}

	cargarComboEditarTablabancoFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.bancosFK);
	}

	cargarComboEditarTablacuentaFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.cuentasFK);
	}

	cargarComboEditarTablaestado_cuentas_corrientesFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.estado_cuentas_corrientessFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(cuenta_corriente_control) {
		var i=0;
		
		i=cuenta_corriente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cuenta_corriente_control.cuenta_corrienteActual.id);
		jQuery("#t-version_row_"+i+"").val(cuenta_corriente_control.cuenta_corrienteActual.versionRow);
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_empresa!=null && cuenta_corriente_control.cuenta_corrienteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cuenta_corriente_control.cuenta_corrienteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cuenta_corriente_control.cuenta_corrienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_ejercicio!=null && cuenta_corriente_control.cuenta_corrienteActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cuenta_corriente_control.cuenta_corrienteActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_3").val(cuenta_corriente_control.cuenta_corrienteActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_periodo!=null && cuenta_corriente_control.cuenta_corrienteActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cuenta_corriente_control.cuenta_corrienteActual.id_periodo) {
				jQuery("#t-cel_"+i+"_4").val(cuenta_corriente_control.cuenta_corrienteActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_usuario!=null && cuenta_corriente_control.cuenta_corrienteActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cuenta_corriente_control.cuenta_corrienteActual.id_usuario) {
				jQuery("#t-cel_"+i+"_5").val(cuenta_corriente_control.cuenta_corrienteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_banco!=null && cuenta_corriente_control.cuenta_corrienteActual.id_banco>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != cuenta_corriente_control.cuenta_corrienteActual.id_banco) {
				jQuery("#t-cel_"+i+"_6").val(cuenta_corriente_control.cuenta_corrienteActual.id_banco).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(cuenta_corriente_control.cuenta_corrienteActual.nro_cuenta);
		jQuery("#t-cel_"+i+"_8").val(cuenta_corriente_control.cuenta_corrienteActual.nombre);
		jQuery("#t-cel_"+i+"_9").val(cuenta_corriente_control.cuenta_corrienteActual.balance_inicial);
		jQuery("#t-cel_"+i+"_10").val(cuenta_corriente_control.cuenta_corrienteActual.contador_cheque);
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_cuenta!=null && cuenta_corriente_control.cuenta_corrienteActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_11").val() != cuenta_corriente_control.cuenta_corrienteActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_11").val(cuenta_corriente_control.cuenta_corrienteActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_11").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_11").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_12").val(cuenta_corriente_control.cuenta_corrienteActual.descripcion);
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes!=null && cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes) {
				jQuery("#t-cel_"+i+"_13").val(cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(cuenta_corriente_control.cuenta_corrienteActual.icono_cuenta);
		jQuery("#t-cel_"+i+"_15").val(cuenta_corriente_control.cuenta_corrienteActual.icono_cuenta_ubicacion);
		jQuery("#t-cel_"+i+"_16").val(cuenta_corriente_control.cuenta_corrienteActual.cuenta_contable);
		jQuery("#t-cel_"+i+"_17").val(cuenta_corriente_control.cuenta_corrienteActual.nombre_banco);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cuenta_corriente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionretiro_cuenta_corriente").click(function(){
		jQuery("#tblTablaDatoscuenta_corrientes").on("click",".imgrelacionretiro_cuenta_corriente", function () {

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionPararetiro_cuenta_corrientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondeposito_cuenta_corriente").click(function(){
		jQuery("#tblTablaDatoscuenta_corrientes").on("click",".imgrelaciondeposito_cuenta_corriente", function () {

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionParadeposito_cuenta_corrientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_corriente_detalle").click(function(){
		jQuery("#tblTablaDatoscuenta_corrientes").on("click",".imgrelacioncuenta_corriente_detalle", function () {

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncheque").click(function(){
		jQuery("#tblTablaDatoscuenta_corrientes").on("click",".imgrelacioncheque", function () {

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionParacheques(idActual);
		});				
	}
		
	

	registrarSesionPararetiro_cuenta_corrientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_corriente","retiro_cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,"s","");
	}

	registrarSesionParadeposito_cuenta_corrientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_corriente","deposito_cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,"s","");
	}

	registrarSesionParacuenta_corriente_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_corriente","cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,"s","");
	}

	registrarSesionParacheques(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_corriente","cheque","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(cuenta_corriente_control) {
		cuenta_corriente_funcion1.registrarControlesTableValidacionEdition(cuenta_corriente_control,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corrienteConstante,strParametros);
		
		//cuenta_corriente_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa",cuenta_corriente_control.empresasFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_2",cuenta_corriente_control.empresasFK);
		}
	};

	cargarCombosejerciciosFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio",cuenta_corriente_control.ejerciciosFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_3",cuenta_corriente_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo",cuenta_corriente_control.periodosFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_4",cuenta_corriente_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario",cuenta_corriente_control.usuariosFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_5",cuenta_corriente_control.usuariosFK);
		}
	};

	cargarCombosbancosFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco",cuenta_corriente_control.bancosFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_6",cuenta_corriente_control.bancosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco",cuenta_corriente_control.bancosFK);

	};

	cargarComboscuentasFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta",cuenta_corriente_control.cuentasFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_11",cuenta_corriente_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",cuenta_corriente_control.cuentasFK);

	};

	cargarCombosestado_cuentas_corrientessFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes",cuenta_corriente_control.estado_cuentas_corrientessFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_13",cuenta_corriente_control.estado_cuentas_corrientessFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes-cmbid_estado_cuentas_corrientes",cuenta_corriente_control.estado_cuentas_corrientessFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosbancosFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeComboscuentasFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosestado_cuentas_corrientessFK(cuenta_corriente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_corriente_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_corriente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idejercicioDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_corriente_control.idejercicioDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_corriente_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idperiodoDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_corriente_control.idperiodoDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_corriente_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idusuarioDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_corriente_control.idusuarioDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_corriente_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosbancosFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idbancoDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val() != cuenta_corriente_control.idbancoDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val(cuenta_corriente_control.idbancoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco").val(cuenta_corriente_control.idbancoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idcuentaDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val() != cuenta_corriente_control.idcuentaDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val(cuenta_corriente_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(cuenta_corriente_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_cuentas_corrientessFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idestado_cuentas_corrientesDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val() != cuenta_corriente_control.idestado_cuentas_corrientesDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val(cuenta_corriente_control.idestado_cuentas_corrientesDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes-cmbid_estado_cuentas_corrientes").val(cuenta_corriente_control.idestado_cuentas_corrientesDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes-cmbid_estado_cuentas_corrientes").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes-cmbid_estado_cuentas_corrientes").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_corriente_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosempresasFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosejerciciosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosperiodosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosusuariosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_banco",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosbancosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorComboscuentasFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_corrientes",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosestado_cuentas_corrientessFK(cuenta_corriente_control);
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
	onLoadCombosEventosFK(cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosperiodosFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosusuariosFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_banco",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosbancosFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeComboscuentasFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_corrientes",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosestado_cuentas_corrientessFK(cuenta_corriente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_corriente");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_corriente");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cuenta_corriente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);			
			
			if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,"cuenta_corriente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("banco","id_banco","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParabanco("id_banco");
				//alert(jQuery('#form-id_banco_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_cuentas_corrientes","id_estado_cuentas_corrientes","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParaestado_cuentas_corrientes("id_estado_cuentas_corrientes");
				//alert(jQuery('#form-id_estado_cuentas_corrientes_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente","FK_Idbanco","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente","FK_Idcuenta","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente","FK_Idejercicio","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente","FK_Idempresa","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente","FK_Idestado_cuentas_corrientes","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente","FK_Idperiodo","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente","FK_Idusuario","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cuenta_corriente");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			cuenta_corriente_funcion1.validarFormularioJQuery(cuenta_corriente_constante1);
			
			if(cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_corriente_control) {
		
		jQuery("#divBusquedacuenta_corrienteAjaxWebPart").css("display",cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trcuenta_corrienteCabeceraBusquedas").css("display",cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_corriente").css("display",cuenta_corriente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecuenta_corriente").css("display",cuenta_corriente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscuenta_corriente").attr("style",cuenta_corriente_control.strPermisoMostrarTodos);
		
		if(cuenta_corriente_control.strPermisoNuevo!=null) {
			jQuery("#tdcuenta_corrienteNuevo").css("display",cuenta_corriente_control.strPermisoNuevo);
			jQuery("#tdcuenta_corrienteNuevoToolBar").css("display",cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcuenta_corrienteDuplicar").css("display",cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_corrienteDuplicarToolBar").css("display",cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_corrienteNuevoGuardarCambios").css("display",cuenta_corriente_control.strPermisoNuevo);
			jQuery("#tdcuenta_corrienteNuevoGuardarCambiosToolBar").css("display",cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cuenta_corriente_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_corrienteActualizarToolBar").css("display",cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_corrienteCopiar").css("display",cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_corrienteCopiarToolBar").css("display",cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_corrienteConEditar").css("display",cuenta_corriente_control.strPermisoActualizar);
		}
		
		jQuery("#tdcuenta_corrienteEliminarToolBar").css("display",cuenta_corriente_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcuenta_corrienteGuardarCambios").css("display",cuenta_corriente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcuenta_corrienteGuardarCambiosToolBar").css("display",cuenta_corriente_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcuenta_corrienteElementos").css("display",cuenta_corriente_control.strVisibleTablaElementos);
		
		jQuery("#trcuenta_corrienteAcciones").css("display",cuenta_corriente_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_corrienteParametrosAcciones").css("display",cuenta_corriente_control.strVisibleTablaAcciones);
			
		jQuery("#tdcuenta_corrienteCerrarPagina").css("display",cuenta_corriente_control.strPermisoPopup);		
		jQuery("#tdcuenta_corrienteCerrarPaginaToolBar").css("display",cuenta_corriente_control.strPermisoPopup);
		//jQuery("#trcuenta_corrienteAccionesRelaciones").css("display",cuenta_corriente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_corriente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_corriente_webcontrol1.registrarEventosControles();
		
		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_corriente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_corriente_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_corriente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_corriente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cuenta_corriente_webcontrol1.onLoad();
				
			} else {
				if(cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
					if(cuenta_corriente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
						//cuenta_corriente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(cuenta_corriente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cuenta_corriente_constante1.BIG_ID_ACTUAL,"cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
						//cuenta_corriente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			cuenta_corriente_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var cuenta_corriente_webcontrol1=new cuenta_corriente_webcontrol();

if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_corriente_webcontrol1.onLoadWindow; 
}

//</script>