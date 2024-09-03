//<script type="text/javascript" language="javascript">



//var historial_cambio_claveJQueryPaginaWebInteraccion= function (historial_cambio_clave_control) {
//this.,this.,this.

class historial_cambio_clave_webcontrol extends historial_cambio_clave_webcontrol_add {
	
	historial_cambio_clave_control=null;
	historial_cambio_clave_controlInicial=null;
	historial_cambio_clave_controlAuxiliar=null;
		
	//if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(historial_cambio_clave_control) {
		super();
		
		this.historial_cambio_clave_control=historial_cambio_clave_control;
	}
		
	actualizarVariablesPagina(historial_cambio_clave_control) {
		
		if(historial_cambio_clave_control.action=="index" || historial_cambio_clave_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(historial_cambio_clave_control);
			
		} else if(historial_cambio_clave_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(historial_cambio_clave_control);
			
		} else if(historial_cambio_clave_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(historial_cambio_clave_control);
			
		} else if(historial_cambio_clave_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(historial_cambio_clave_control);		
		
		} else if(historial_cambio_clave_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(historial_cambio_clave_control);		
		
		} else if(historial_cambio_clave_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(historial_cambio_clave_control);		
		
		} else if(historial_cambio_clave_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(historial_cambio_clave_control);		
		}
		else if(historial_cambio_clave_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(historial_cambio_clave_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(historial_cambio_clave_control.action + " Revisar Manejo");
			
			if(historial_cambio_clave_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(historial_cambio_clave_control);
				
				return;
			}
			
			//if(historial_cambio_clave_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(historial_cambio_clave_control);
			//}
			
			if(historial_cambio_clave_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(historial_cambio_clave_control);
			}
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && historial_cambio_clave_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(historial_cambio_clave_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(historial_cambio_clave_control, false);			
			}
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(historial_cambio_clave_control);	
			}
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
			}
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(historial_cambio_clave_control);
			}
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);
			}
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(historial_cambio_clave_control);	
			}
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
			}
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(historial_cambio_clave_control);
			}
			
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(historial_cambio_clave_control);			
			}
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(historial_cambio_clave_control);
			}
			
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(historial_cambio_clave_control);
			}
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(historial_cambio_clave_control);
			}				
			
			if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(historial_cambio_clave_control);
			}
			
			if(historial_cambio_clave_control.usuarioActual!=null && historial_cambio_clave_control.usuarioActual.field_strUserName!=null &&
			historial_cambio_clave_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(historial_cambio_clave_control);			
			}
		}
		
		
		if(historial_cambio_clave_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(historial_cambio_clave_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(historial_cambio_clave_control) {
		
		this.actualizarPaginaCargaGeneral(historial_cambio_clave_control);
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		this.actualizarPaginaCargaGeneralControles(historial_cambio_clave_control);
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(historial_cambio_clave_control);
		this.actualizarPaginaAreaBusquedas(historial_cambio_clave_control);
		this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(historial_cambio_clave_control) {
		
		this.actualizarPaginaCargaGeneral(historial_cambio_clave_control);
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		this.actualizarPaginaCargaGeneralControles(historial_cambio_clave_control);
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(historial_cambio_clave_control);
		this.actualizarPaginaAreaBusquedas(historial_cambio_clave_control);
		this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatosAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatosAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatosAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(historial_cambio_clave_control) {
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(historial_cambio_clave_control) {
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(historial_cambio_clave_control) {
		this.actualizarPaginaCargaGeneralControles(historial_cambio_clave_control);
		this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(historial_cambio_clave_control) {
		this.actualizarPaginaAbrirLink(historial_cambio_clave_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);				
		this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		this.actualizarPaginaFormulario(historial_cambio_clave_control);
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		this.actualizarPaginaFormulario(historial_cambio_clave_control);
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(historial_cambio_clave_control) {
		this.actualizarPaginaFormulario(historial_cambio_clave_control);
		this.onLoadCombosDefectoFK(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		this.actualizarPaginaFormulario(historial_cambio_clave_control);
		this.onLoadCombosDefectoFK(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(historial_cambio_clave_control) {
		this.actualizarPaginaCargaGeneralControles(historial_cambio_clave_control);
		this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);
		this.actualizarPaginaFormulario(historial_cambio_clave_control);
		this.onLoadCombosDefectoFK(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(historial_cambio_clave_control) {
		this.actualizarPaginaAbrirLink(historial_cambio_clave_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(historial_cambio_clave_control) {
		this.actualizarPaginaImprimir(historial_cambio_clave_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(historial_cambio_clave_control) {
		this.actualizarPaginaImprimir(historial_cambio_clave_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(historial_cambio_clave_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(historial_cambio_clave_control) {
		//FORMULARIO
		if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(historial_cambio_clave_control);
			this.actualizarPaginaFormularioAdd(historial_cambio_clave_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		//COMBOS FK
		if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(historial_cambio_clave_control) {
		//FORMULARIO
		if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(historial_cambio_clave_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);	
		//COMBOS FK
		if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(historial_cambio_clave_control) {
		//FORMULARIO
		if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(historial_cambio_clave_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(historial_cambio_clave_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);	
		//COMBOS FK
		if(historial_cambio_clave_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control) {
		if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && historial_cambio_clave_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(historial_cambio_clave_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(historial_cambio_clave_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(historial_cambio_clave_control) {
		if(historial_cambio_clave_funcion1.esPaginaForm()==true) {
			window.opener.historial_cambio_clave_webcontrol1.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		} else {
			this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		}
	}
	
	actualizarPaginaAbrirLink(historial_cambio_clave_control) {
		historial_cambio_clave_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(historial_cambio_clave_control.strAuxiliarUrlPagina);
				
		historial_cambio_clave_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(historial_cambio_clave_control.strAuxiliarTipo,historial_cambio_clave_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(historial_cambio_clave_control) {
		historial_cambio_clave_funcion1.resaltarRestaurarDivMensaje(true,historial_cambio_clave_control.strAuxiliarMensajeAlert,historial_cambio_clave_control.strAuxiliarCssMensaje);
			
		if(historial_cambio_clave_funcion1.esPaginaForm()==true) {
			window.opener.historial_cambio_clave_funcion1.resaltarRestaurarDivMensaje(true,historial_cambio_clave_control.strAuxiliarMensajeAlert,historial_cambio_clave_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(historial_cambio_clave_control) {
		eval(historial_cambio_clave_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(historial_cambio_clave_control, mostrar) {
		
		if(mostrar==true) {
			historial_cambio_clave_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				historial_cambio_clave_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			historial_cambio_clave_funcion1.mostrarDivMensaje(true,historial_cambio_clave_control.strAuxiliarMensaje,historial_cambio_clave_control.strAuxiliarCssMensaje);
		
		} else {
			historial_cambio_clave_funcion1.mostrarDivMensaje(false,historial_cambio_clave_control.strAuxiliarMensaje,historial_cambio_clave_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(historial_cambio_clave_control) {
	
		funcionGeneral.printWebPartPage("historial_cambio_clave",historial_cambio_clave_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarhistorial_cambio_clavesAjaxWebPart").html(historial_cambio_clave_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("historial_cambio_clave",jQuery("#divTablaDatosReporteAuxiliarhistorial_cambio_clavesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(historial_cambio_clave_control) {
		this.historial_cambio_clave_controlInicial=historial_cambio_clave_control;
			
		if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(historial_cambio_clave_control.strStyleDivArbol,historial_cambio_clave_control.strStyleDivContent
																,historial_cambio_clave_control.strStyleDivOpcionesBanner,historial_cambio_clave_control.strStyleDivExpandirColapsar
																,historial_cambio_clave_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=historial_cambio_clave_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",historial_cambio_clave_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(historial_cambio_clave_control) {
		jQuery("#divTablaDatoshistorial_cambio_clavesAjaxWebPart").html(historial_cambio_clave_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoshistorial_cambio_claves=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoshistorial_cambio_claves=jQuery("#tblTablaDatoshistorial_cambio_claves").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("historial_cambio_clave",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',historial_cambio_clave_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			historial_cambio_clave_webcontrol1.registrarControlesTableEdition(historial_cambio_clave_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		historial_cambio_clave_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(historial_cambio_clave_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(historial_cambio_clave_control.historial_cambio_claveActual!=null) {//form
			
			this.actualizarCamposFilaTabla(historial_cambio_clave_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(historial_cambio_clave_control) {
		this.actualizarCssBotonesPagina(historial_cambio_clave_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(historial_cambio_clave_control.tiposReportes,historial_cambio_clave_control.tiposReporte
															 	,historial_cambio_clave_control.tiposPaginacion,historial_cambio_clave_control.tiposAcciones
																,historial_cambio_clave_control.tiposColumnasSelect,historial_cambio_clave_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(historial_cambio_clave_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(historial_cambio_clave_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(historial_cambio_clave_control);			
	}
	
	actualizarPaginaAreaBusquedas(historial_cambio_clave_control) {
		jQuery("#divBusquedahistorial_cambio_claveAjaxWebPart").css("display",historial_cambio_clave_control.strPermisoBusqueda);
		jQuery("#trhistorial_cambio_claveCabeceraBusquedas").css("display",historial_cambio_clave_control.strPermisoBusqueda);
		jQuery("#trBusquedahistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(historial_cambio_clave_control.htmlTablaOrderBy!=null
			&& historial_cambio_clave_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByhistorial_cambio_claveAjaxWebPart").html(historial_cambio_clave_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//historial_cambio_clave_webcontrol1.registrarOrderByActions();
			
		}
			
		if(historial_cambio_clave_control.htmlTablaOrderByRel!=null
			&& historial_cambio_clave_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelhistorial_cambio_claveAjaxWebPart").html(historial_cambio_clave_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedahistorial_cambio_claveAjaxWebPart").css("display","none");
			jQuery("#trhistorial_cambio_claveCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedahistorial_cambio_clave").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(historial_cambio_clave_control) {
		jQuery("#tdhistorial_cambio_claveNuevo").css("display",historial_cambio_clave_control.strPermisoNuevo);
		jQuery("#trhistorial_cambio_claveElementos").css("display",historial_cambio_clave_control.strVisibleTablaElementos);
		jQuery("#trhistorial_cambio_claveAcciones").css("display",historial_cambio_clave_control.strVisibleTablaAcciones);
		jQuery("#trhistorial_cambio_claveParametrosAcciones").css("display",historial_cambio_clave_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(historial_cambio_clave_control) {
	
		this.actualizarCssBotonesMantenimiento(historial_cambio_clave_control);
				
		if(historial_cambio_clave_control.historial_cambio_claveActual!=null) {//form
			
			this.actualizarCamposFormulario(historial_cambio_clave_control);			
		}
						
		this.actualizarSpanMensajesCampos(historial_cambio_clave_control);
	}
	
	actualizarPaginaUsuarioInvitado(historial_cambio_clave_control) {
	
		var indexPosition=historial_cambio_clave_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=historial_cambio_clave_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(historial_cambio_clave_control) {
		jQuery("#divResumenhistorial_cambio_claveActualAjaxWebPart").html(historial_cambio_clave_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(historial_cambio_clave_control) {
		jQuery("#divAccionesRelacioneshistorial_cambio_claveAjaxWebPart").html(historial_cambio_clave_control.htmlTablaAccionesRelaciones);
			
		historial_cambio_clave_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(historial_cambio_clave_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(historial_cambio_clave_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(historial_cambio_clave_control) {
		
		if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+historial_cambio_clave_constante1.STR_SUFIJO+"BusquedaPorIdUsuarioPorFechaHora").attr("style",historial_cambio_clave_control.strVisibleBusquedaPorIdUsuarioPorFechaHora);
			jQuery("#tblstrVisible"+historial_cambio_clave_constante1.STR_SUFIJO+"BusquedaPorIdUsuarioPorFechaHora").attr("style",historial_cambio_clave_control.strVisibleBusquedaPorIdUsuarioPorFechaHora);
		}

		if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+historial_cambio_clave_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",historial_cambio_clave_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+historial_cambio_clave_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",historial_cambio_clave_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionhistorial_cambio_clave();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("historial_cambio_clave",id,"seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);		
	}
	
	

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		historial_cambio_clave_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("historial_cambio_clave","usuario","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(historial_cambio_clave_control) {
	
		jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id").val(historial_cambio_clave_control.historial_cambio_claveActual.id);
		jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-version_row").val(historial_cambio_clave_control.historial_cambio_claveActual.versionRow);
		
		if(historial_cambio_clave_control.historial_cambio_claveActual.id_usuario!=null && historial_cambio_clave_control.historial_cambio_claveActual.id_usuario>-1){
			if(jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val() != historial_cambio_clave_control.historial_cambio_claveActual.id_usuario) {
				jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val(historial_cambio_clave_control.historial_cambio_claveActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-nombre").val(historial_cambio_clave_control.historial_cambio_claveActual.nombre);
		jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-fecha_hora").val(historial_cambio_clave_control.historial_cambio_claveActual.fecha_hora);
		jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-observacion").val(historial_cambio_clave_control.historial_cambio_claveActual.observacion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+historial_cambio_clave_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("historial_cambio_clave","seguridad","","form_historial_cambio_clave",formulario,"","",paraEventoTabla,idFilaTabla,historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
	}
	
	cargarCombosFK(historial_cambio_clave_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(historial_cambio_clave_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",historial_cambio_clave_control.strRecargarFkTipos,",")) { 
				historial_cambio_clave_webcontrol1.cargarCombosusuariosFK(historial_cambio_clave_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(historial_cambio_clave_control.strRecargarFkTiposNinguno!=null && historial_cambio_clave_control.strRecargarFkTiposNinguno!='NINGUNO' && historial_cambio_clave_control.strRecargarFkTiposNinguno!='') {
			
				if(historial_cambio_clave_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",historial_cambio_clave_control.strRecargarFkTiposNinguno,",")) { 
					historial_cambio_clave_webcontrol1.cargarCombosusuariosFK(historial_cambio_clave_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(historial_cambio_clave_control) {
		jQuery("#spanstrMensajeid").text(historial_cambio_clave_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(historial_cambio_clave_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_usuario").text(historial_cambio_clave_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenombre").text(historial_cambio_clave_control.strMensajenombre);		
		jQuery("#spanstrMensajefecha_hora").text(historial_cambio_clave_control.strMensajefecha_hora);		
		jQuery("#spanstrMensajeobservacion").text(historial_cambio_clave_control.strMensajeobservacion);		
	}
	
	actualizarCssBotonesMantenimiento(historial_cambio_clave_control) {
		jQuery("#tdbtnNuevohistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevohistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarhistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarhistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarhistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarhistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarhistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioshistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioshistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarhistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarhistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarhistorial_cambio_clave").css("visibility",historial_cambio_clave_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablausuarioFK(historial_cambio_clave_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,historial_cambio_clave_funcion1,historial_cambio_clave_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(historial_cambio_clave_control) {
		var i=0;
		
		i=historial_cambio_clave_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(historial_cambio_clave_control.historial_cambio_claveActual.id);
		jQuery("#t-version_row_"+i+"").val(historial_cambio_clave_control.historial_cambio_claveActual.versionRow);
		
		if(historial_cambio_clave_control.historial_cambio_claveActual.id_usuario!=null && historial_cambio_clave_control.historial_cambio_claveActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != historial_cambio_clave_control.historial_cambio_claveActual.id_usuario) {
				jQuery("#t-cel_"+i+"_2").val(historial_cambio_clave_control.historial_cambio_claveActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(historial_cambio_clave_control.historial_cambio_claveActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(historial_cambio_clave_control.historial_cambio_claveActual.fecha_hora);
		jQuery("#t-cel_"+i+"_5").val(historial_cambio_clave_control.historial_cambio_claveActual.observacion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(historial_cambio_clave_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(historial_cambio_clave_control) {
		historial_cambio_clave_funcion1.registrarControlesTableValidacionEdition(historial_cambio_clave_control,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_claveConstante,strParametros);
		
		//historial_cambio_clave_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosusuariosFK(historial_cambio_clave_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario",historial_cambio_clave_control.usuariosFK);

		if(historial_cambio_clave_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+historial_cambio_clave_control.idFilaTablaActual+"_2",historial_cambio_clave_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosusuariosFK(historial_cambio_clave_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(historial_cambio_clave_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(historial_cambio_clave_control.idusuarioDefaultFK>-1 && jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val() != historial_cambio_clave_control.idusuarioDefaultFK) {
				jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val(historial_cambio_clave_control.idusuarioDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//historial_cambio_clave_control
		
	
	}
	
	onLoadCombosDefectoFK(historial_cambio_clave_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(historial_cambio_clave_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(historial_cambio_clave_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",historial_cambio_clave_control.strRecargarFkTipos,",")) { 
				historial_cambio_clave_webcontrol1.setDefectoValorCombosusuariosFK(historial_cambio_clave_control);
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
	onLoadCombosEventosFK(historial_cambio_clave_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(historial_cambio_clave_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(historial_cambio_clave_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",historial_cambio_clave_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				historial_cambio_clave_webcontrol1.registrarComboActionChangeCombosusuariosFK(historial_cambio_clave_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(historial_cambio_clave_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(historial_cambio_clave_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("historial_cambio_clave");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("historial_cambio_clave");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(historial_cambio_clave_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);			
			
			if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,"historial_cambio_clave");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				historial_cambio_clave_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("historial_cambio_clave","BusquedaPorIdUsuarioPorFechaHora","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("historial_cambio_clave","FK_Idusuario","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			historial_cambio_clave_funcion1.validarFormularioJQuery(historial_cambio_clave_constante1);
			
			if(historial_cambio_clave_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(historial_cambio_clave_control) {
		
		jQuery("#divBusquedahistorial_cambio_claveAjaxWebPart").css("display",historial_cambio_clave_control.strPermisoBusqueda);
		jQuery("#trhistorial_cambio_claveCabeceraBusquedas").css("display",historial_cambio_clave_control.strPermisoBusqueda);
		jQuery("#trBusquedahistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportehistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoshistorial_cambio_clave").attr("style",historial_cambio_clave_control.strPermisoMostrarTodos);
		
		if(historial_cambio_clave_control.strPermisoNuevo!=null) {
			jQuery("#tdhistorial_cambio_claveNuevo").css("display",historial_cambio_clave_control.strPermisoNuevo);
			jQuery("#tdhistorial_cambio_claveNuevoToolBar").css("display",historial_cambio_clave_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdhistorial_cambio_claveDuplicar").css("display",historial_cambio_clave_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdhistorial_cambio_claveDuplicarToolBar").css("display",historial_cambio_clave_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdhistorial_cambio_claveNuevoGuardarCambios").css("display",historial_cambio_clave_control.strPermisoNuevo);
			jQuery("#tdhistorial_cambio_claveNuevoGuardarCambiosToolBar").css("display",historial_cambio_clave_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(historial_cambio_clave_control.strPermisoActualizar!=null) {
			jQuery("#tdhistorial_cambio_claveActualizarToolBar").css("display",historial_cambio_clave_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdhistorial_cambio_claveCopiar").css("display",historial_cambio_clave_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdhistorial_cambio_claveCopiarToolBar").css("display",historial_cambio_clave_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdhistorial_cambio_claveConEditar").css("display",historial_cambio_clave_control.strPermisoActualizar);
		}
		
		jQuery("#tdhistorial_cambio_claveEliminarToolBar").css("display",historial_cambio_clave_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdhistorial_cambio_claveGuardarCambios").css("display",historial_cambio_clave_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdhistorial_cambio_claveGuardarCambiosToolBar").css("display",historial_cambio_clave_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trhistorial_cambio_claveElementos").css("display",historial_cambio_clave_control.strVisibleTablaElementos);
		
		jQuery("#trhistorial_cambio_claveAcciones").css("display",historial_cambio_clave_control.strVisibleTablaAcciones);
		jQuery("#trhistorial_cambio_claveParametrosAcciones").css("display",historial_cambio_clave_control.strVisibleTablaAcciones);
			
		jQuery("#tdhistorial_cambio_claveCerrarPagina").css("display",historial_cambio_clave_control.strPermisoPopup);		
		jQuery("#tdhistorial_cambio_claveCerrarPaginaToolBar").css("display",historial_cambio_clave_control.strPermisoPopup);
		//jQuery("#trhistorial_cambio_claveAccionesRelaciones").css("display",historial_cambio_clave_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		historial_cambio_clave_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		historial_cambio_clave_webcontrol1.registrarEventosControles();
		
		if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
			historial_cambio_clave_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(historial_cambio_clave_constante1.STR_ES_RELACIONES=="true") {
			if(historial_cambio_clave_constante1.BIT_ES_PAGINA_FORM==true) {
				historial_cambio_clave_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(historial_cambio_clave_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(historial_cambio_clave_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				historial_cambio_clave_webcontrol1.onLoad();
				
			} else {
				if(historial_cambio_clave_constante1.BIT_ES_PAGINA_FORM==true) {
					if(historial_cambio_clave_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
						//historial_cambio_clave_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(historial_cambio_clave_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(historial_cambio_clave_constante1.BIG_ID_ACTUAL,"historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
						//historial_cambio_clave_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			historial_cambio_clave_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var historial_cambio_clave_webcontrol1=new historial_cambio_clave_webcontrol();

if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = historial_cambio_clave_webcontrol1.onLoadWindow; 
}

//</script>