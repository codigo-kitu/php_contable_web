//<script type="text/javascript" language="javascript">



//var cuenta_pagar_detalleJQueryPaginaWebInteraccion= function (cuenta_pagar_detalle_control) {
//this.,this.,this.

class cuenta_pagar_detalle_webcontrol extends cuenta_pagar_detalle_webcontrol_add {
	
	cuenta_pagar_detalle_control=null;
	cuenta_pagar_detalle_controlInicial=null;
	cuenta_pagar_detalle_controlAuxiliar=null;
		
	//if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_pagar_detalle_control) {
		super();
		
		this.cuenta_pagar_detalle_control=cuenta_pagar_detalle_control;
	}
		
	actualizarVariablesPagina(cuenta_pagar_detalle_control) {
		
		if(cuenta_pagar_detalle_control.action=="index" || cuenta_pagar_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_pagar_detalle_control);
			
		} else if(cuenta_pagar_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cuenta_pagar_detalle_control);
			
		} else if(cuenta_pagar_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cuenta_pagar_detalle_control);
			
		} else if(cuenta_pagar_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_pagar_detalle_control);		
		
		} else if(cuenta_pagar_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cuenta_pagar_detalle_control);		
		
		} else if(cuenta_pagar_detalle_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_pagar_detalle_control);		
		
		} else if(cuenta_pagar_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_pagar_detalle_control);		
		}
		else if(cuenta_pagar_detalle_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_pagar_detalle_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(cuenta_pagar_detalle_control.action + " Revisar Manejo");
			
			if(cuenta_pagar_detalle_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(cuenta_pagar_detalle_control);
				
				return;
			}
			
			//if(cuenta_pagar_detalle_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(cuenta_pagar_detalle_control);
			//}
			
			if(cuenta_pagar_detalle_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(cuenta_pagar_detalle_control);
			}
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_pagar_detalle_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(cuenta_pagar_detalle_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(cuenta_pagar_detalle_control, false);			
			}
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(cuenta_pagar_detalle_control);	
			}
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
			}
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(cuenta_pagar_detalle_control);
			}
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(cuenta_pagar_detalle_control);
			}
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(cuenta_pagar_detalle_control);	
			}
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
			}
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);
			}
			
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(cuenta_pagar_detalle_control);			
			}
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(cuenta_pagar_detalle_control);
			}
			
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_pagar_detalle_control);
			}
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(cuenta_pagar_detalle_control);
			}				
			
			if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_pagar_detalle_control);
			}
			
			if(cuenta_pagar_detalle_control.usuarioActual!=null && cuenta_pagar_detalle_control.usuarioActual.field_strUserName!=null &&
			cuenta_pagar_detalle_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(cuenta_pagar_detalle_control);			
			}
		}
		
		
		if(cuenta_pagar_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_pagar_detalle_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(cuenta_pagar_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_pagar_detalle_control);
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_detalle_control);
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_pagar_detalle_control);
		this.actualizarPaginaAreaBusquedas(cuenta_pagar_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_pagar_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_pagar_detalle_control);
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_detalle_control);
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_pagar_detalle_control);
		this.actualizarPaginaAreaBusquedas(cuenta_pagar_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_pagar_detalle_control) {
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cuenta_pagar_detalle_control) {
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_pagar_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_detalle_control);
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_pagar_detalle_control) {
		this.actualizarPaginaAbrirLink(cuenta_pagar_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);				
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cuenta_pagar_detalle_control) {
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);
		this.onLoadCombosDefectoFK(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);
		this.onLoadCombosDefectoFK(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_pagar_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_detalle_control);
		this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);
		this.onLoadCombosDefectoFK(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_pagar_detalle_control) {
		this.actualizarPaginaAbrirLink(cuenta_pagar_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_pagar_detalle_control) {
		this.actualizarPaginaImprimir(cuenta_pagar_detalle_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_pagar_detalle_control) {
		this.actualizarPaginaImprimir(cuenta_pagar_detalle_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_pagar_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_pagar_detalle_control) {
		//FORMULARIO
		if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);
			this.actualizarPaginaFormularioAdd(cuenta_pagar_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		//COMBOS FK
		if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_pagar_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(cuenta_pagar_detalle_control) {
		//FORMULARIO
		if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);	
		//COMBOS FK
		if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_pagar_detalle_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_pagar_detalle_control) {
		//FORMULARIO
		if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_pagar_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);	
		//COMBOS FK
		if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_pagar_detalle_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control) {
		if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_pagar_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_pagar_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_pagar_detalle_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_detalle_control) {
		if(cuenta_pagar_detalle_funcion1.esPaginaForm()==true) {
			window.opener.cuenta_pagar_detalle_webcontrol1.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_pagar_detalle_control) {
		cuenta_pagar_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_pagar_detalle_control.strAuxiliarUrlPagina);
				
		cuenta_pagar_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_pagar_detalle_control.strAuxiliarTipo,cuenta_pagar_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_pagar_detalle_control) {
		cuenta_pagar_detalle_funcion1.resaltarRestaurarDivMensaje(true,cuenta_pagar_detalle_control.strAuxiliarMensajeAlert,cuenta_pagar_detalle_control.strAuxiliarCssMensaje);
			
		if(cuenta_pagar_detalle_funcion1.esPaginaForm()==true) {
			window.opener.cuenta_pagar_detalle_funcion1.resaltarRestaurarDivMensaje(true,cuenta_pagar_detalle_control.strAuxiliarMensajeAlert,cuenta_pagar_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(cuenta_pagar_detalle_control) {
		eval(cuenta_pagar_detalle_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(cuenta_pagar_detalle_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_pagar_detalle_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_pagar_detalle_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			cuenta_pagar_detalle_funcion1.mostrarDivMensaje(true,cuenta_pagar_detalle_control.strAuxiliarMensaje,cuenta_pagar_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_pagar_detalle_funcion1.mostrarDivMensaje(false,cuenta_pagar_detalle_control.strAuxiliarMensaje,cuenta_pagar_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(cuenta_pagar_detalle_control) {
	
		funcionGeneral.printWebPartPage("cuenta_pagar_detalle",cuenta_pagar_detalle_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcuenta_pagar_detallesAjaxWebPart").html(cuenta_pagar_detalle_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("cuenta_pagar_detalle",jQuery("#divTablaDatosReporteAuxiliarcuenta_pagar_detallesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(cuenta_pagar_detalle_control) {
		this.cuenta_pagar_detalle_controlInicial=cuenta_pagar_detalle_control;
			
		if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_pagar_detalle_control.strStyleDivArbol,cuenta_pagar_detalle_control.strStyleDivContent
																,cuenta_pagar_detalle_control.strStyleDivOpcionesBanner,cuenta_pagar_detalle_control.strStyleDivExpandirColapsar
																,cuenta_pagar_detalle_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=cuenta_pagar_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cuenta_pagar_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(cuenta_pagar_detalle_control) {
		jQuery("#divTablaDatoscuenta_pagar_detallesAjaxWebPart").html(cuenta_pagar_detalle_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscuenta_pagar_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscuenta_pagar_detalles=jQuery("#tblTablaDatoscuenta_pagar_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cuenta_pagar_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cuenta_pagar_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cuenta_pagar_detalle_webcontrol1.registrarControlesTableEdition(cuenta_pagar_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cuenta_pagar_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(cuenta_pagar_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cuenta_pagar_detalle_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(cuenta_pagar_detalle_control) {
		this.actualizarCssBotonesPagina(cuenta_pagar_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_pagar_detalle_control.tiposReportes,cuenta_pagar_detalle_control.tiposReporte
															 	,cuenta_pagar_detalle_control.tiposPaginacion,cuenta_pagar_detalle_control.tiposAcciones
																,cuenta_pagar_detalle_control.tiposColumnasSelect,cuenta_pagar_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_pagar_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_pagar_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_pagar_detalle_control);			
	}
	
	actualizarPaginaAreaBusquedas(cuenta_pagar_detalle_control) {
		jQuery("#divBusquedacuenta_pagar_detalleAjaxWebPart").css("display",cuenta_pagar_detalle_control.strPermisoBusqueda);
		jQuery("#trcuenta_pagar_detalleCabeceraBusquedas").css("display",cuenta_pagar_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_pagar_detalle").css("display",cuenta_pagar_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cuenta_pagar_detalle_control.htmlTablaOrderBy!=null
			&& cuenta_pagar_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycuenta_pagar_detalleAjaxWebPart").html(cuenta_pagar_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cuenta_pagar_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cuenta_pagar_detalle_control.htmlTablaOrderByRel!=null
			&& cuenta_pagar_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcuenta_pagar_detalleAjaxWebPart").html(cuenta_pagar_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacuenta_pagar_detalleAjaxWebPart").css("display","none");
			jQuery("#trcuenta_pagar_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacuenta_pagar_detalle").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control) {
		jQuery("#tdcuenta_pagar_detalleNuevo").css("display",cuenta_pagar_detalle_control.strPermisoNuevo);
		jQuery("#trcuenta_pagar_detalleElementos").css("display",cuenta_pagar_detalle_control.strVisibleTablaElementos);
		jQuery("#trcuenta_pagar_detalleAcciones").css("display",cuenta_pagar_detalle_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_pagar_detalleParametrosAcciones").css("display",cuenta_pagar_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cuenta_pagar_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(cuenta_pagar_detalle_control);
				
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(cuenta_pagar_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(cuenta_pagar_detalle_control);
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_pagar_detalle_control) {
	
		var indexPosition=cuenta_pagar_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_pagar_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(cuenta_pagar_detalle_control) {
		jQuery("#divResumencuenta_pagar_detalleActualAjaxWebPart").html(cuenta_pagar_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_pagar_detalle_control) {
		jQuery("#divAccionesRelacionescuenta_pagar_detalleAjaxWebPart").html(cuenta_pagar_detalle_control.htmlTablaAccionesRelaciones);
			
		cuenta_pagar_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cuenta_pagar_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cuenta_pagar_detalle_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cuenta_pagar_detalle_control) {
		
		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_pagar").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idcuenta_pagar);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_pagar").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idcuenta_pagar);
		}

		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idejercicio);
		}

		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idempresa);
		}

		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idestado").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idestado").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idestado);
		}

		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idperiodo);
		}

		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idsucursal);
		}

		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncuenta_pagar_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cuenta_pagar_detalle",id,"cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","empresa","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","sucursal","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","ejercicio","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","periodo","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","usuario","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}

	abrirBusquedaParacuenta_pagar(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","cuenta_pagar","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","estado","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cuenta_pagar_detalle_control) {
	
		jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id);
		jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-version_row").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.versionRow);
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_empresa!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_empresa>-1){
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_empresa) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_sucursal!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_sucursal>-1){
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_sucursal) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_ejercicio!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_ejercicio>-1){
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_ejercicio) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_periodo!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_periodo>-1){
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_periodo) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_usuario!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_usuario>-1){
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_usuario) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_cuenta_pagar!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_cuenta_pagar>-1){
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_cuenta_pagar) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_cuenta_pagar).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-numero").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.numero);
		jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-fecha_emision").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.fecha_emision);
		jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-fecha_vence").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.fecha_vence);
		jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-referencia").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.referencia);
		jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-monto").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.monto);
		jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-debito").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.debito);
		jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-credito").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.credito);
		jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-descripcion").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.descripcion);
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_estado!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_estado>-1){
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_estado) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cuenta_pagar_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cuenta_pagar_detalle","cuentaspagar","","form_cuenta_pagar_detalle",formulario,"","",paraEventoTabla,idFilaTabla,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}
	
	cargarCombosFK(cuenta_pagar_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarCombosempresasFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarCombossucursalsFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarCombosejerciciosFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarCombosperiodosFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarCombosusuariosFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarComboscuenta_pagarsFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarCombosestadosFK(cuenta_pagar_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!=null && cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarCombosempresasFK(cuenta_pagar_detalle_control);
				}

				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarCombossucursalsFK(cuenta_pagar_detalle_control);
				}

				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarCombosejerciciosFK(cuenta_pagar_detalle_control);
				}

				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarCombosperiodosFK(cuenta_pagar_detalle_control);
				}

				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarCombosusuariosFK(cuenta_pagar_detalle_control);
				}

				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarComboscuenta_pagarsFK(cuenta_pagar_detalle_control);
				}

				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarCombosestadosFK(cuenta_pagar_detalle_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(cuenta_pagar_detalle_control) {
		jQuery("#spanstrMensajeid").text(cuenta_pagar_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cuenta_pagar_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cuenta_pagar_detalle_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(cuenta_pagar_detalle_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(cuenta_pagar_detalle_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cuenta_pagar_detalle_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(cuenta_pagar_detalle_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_cuenta_pagar").text(cuenta_pagar_detalle_control.strMensajeid_cuenta_pagar);		
		jQuery("#spanstrMensajenumero").text(cuenta_pagar_detalle_control.strMensajenumero);		
		jQuery("#spanstrMensajefecha_emision").text(cuenta_pagar_detalle_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajefecha_vence").text(cuenta_pagar_detalle_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajereferencia").text(cuenta_pagar_detalle_control.strMensajereferencia);		
		jQuery("#spanstrMensajemonto").text(cuenta_pagar_detalle_control.strMensajemonto);		
		jQuery("#spanstrMensajedebito").text(cuenta_pagar_detalle_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(cuenta_pagar_detalle_control.strMensajecredito);		
		jQuery("#spanstrMensajedescripcion").text(cuenta_pagar_detalle_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_estado").text(cuenta_pagar_detalle_control.strMensajeid_estado);		
	}
	
	actualizarCssBotonesMantenimiento(cuenta_pagar_detalle_control) {
		jQuery("#tdbtnNuevocuenta_pagar_detalle").css("visibility",cuenta_pagar_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocuenta_pagar_detalle").css("display",cuenta_pagar_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcuenta_pagar_detalle").css("visibility",cuenta_pagar_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcuenta_pagar_detalle").css("display",cuenta_pagar_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcuenta_pagar_detalle").css("visibility",cuenta_pagar_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcuenta_pagar_detalle").css("display",cuenta_pagar_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcuenta_pagar_detalle").css("visibility",cuenta_pagar_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscuenta_pagar_detalle").css("visibility",cuenta_pagar_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscuenta_pagar_detalle").css("display",cuenta_pagar_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcuenta_pagar_detalle").css("visibility",cuenta_pagar_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcuenta_pagar_detalle").css("visibility",cuenta_pagar_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcuenta_pagar_detalle").css("visibility",cuenta_pagar_detalle_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_pagarFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.cuenta_pagarsFK);
	}

	cargarComboEditarTablaestadoFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(cuenta_pagar_detalle_control) {
		var i=0;
		
		i=cuenta_pagar_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.versionRow);
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_empresa!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_sucursal!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_ejercicio!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_periodo!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_usuario!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_cuenta_pagar!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_cuenta_pagar>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_cuenta_pagar) {
				jQuery("#t-cel_"+i+"_7").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_cuenta_pagar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.numero);
		jQuery("#t-cel_"+i+"_9").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.fecha_emision);
		jQuery("#t-cel_"+i+"_10").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.fecha_vence);
		jQuery("#t-cel_"+i+"_11").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.referencia);
		jQuery("#t-cel_"+i+"_12").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.monto);
		jQuery("#t-cel_"+i+"_13").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.debito);
		jQuery("#t-cel_"+i+"_14").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.credito);
		jQuery("#t-cel_"+i+"_15").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.descripcion);
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_estado!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_16").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_estado) {
				jQuery("#t-cel_"+i+"_16").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_16").select2("val", null);
			if(jQuery("#t-cel_"+i+"_16").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_16").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cuenta_pagar_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(cuenta_pagar_detalle_control) {
		cuenta_pagar_detalle_funcion1.registrarControlesTableValidacionEdition(cuenta_pagar_detalle_control,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalleConstante,strParametros);
		
		//cuenta_pagar_detalle_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa",cuenta_pagar_detalle_control.empresasFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_2",cuenta_pagar_detalle_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal",cuenta_pagar_detalle_control.sucursalsFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_3",cuenta_pagar_detalle_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio",cuenta_pagar_detalle_control.ejerciciosFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_4",cuenta_pagar_detalle_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo",cuenta_pagar_detalle_control.periodosFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_5",cuenta_pagar_detalle_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario",cuenta_pagar_detalle_control.usuariosFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_6",cuenta_pagar_detalle_control.usuariosFK);
		}
	};

	cargarComboscuenta_pagarsFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar",cuenta_pagar_detalle_control.cuenta_pagarsFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_7",cuenta_pagar_detalle_control.cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar",cuenta_pagar_detalle_control.cuenta_pagarsFK);

	};

	cargarCombosestadosFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado",cuenta_pagar_detalle_control.estadosFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_16",cuenta_pagar_detalle_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",cuenta_pagar_detalle_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_pagar_detalle_control) {

	};

	registrarComboActionChangeCombossucursalsFK(cuenta_pagar_detalle_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cuenta_pagar_detalle_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cuenta_pagar_detalle_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cuenta_pagar_detalle_control) {

	};

	registrarComboActionChangeComboscuenta_pagarsFK(cuenta_pagar_detalle_control) {

	};

	registrarComboActionChangeCombosestadosFK(cuenta_pagar_detalle_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_pagar_detalle_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_pagar_detalle_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idsucursalDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != cuenta_pagar_detalle_control.idsucursalDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(cuenta_pagar_detalle_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idejercicioDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_pagar_detalle_control.idejercicioDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_pagar_detalle_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idperiodoDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_pagar_detalle_control.idperiodoDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_pagar_detalle_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idusuarioDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_pagar_detalle_control.idusuarioDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_pagar_detalle_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_pagarsFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idcuenta_pagarDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != cuenta_pagar_detalle_control.idcuenta_pagarDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(cuenta_pagar_detalle_control.idcuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(cuenta_pagar_detalle_control.idcuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idestadoDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado").val() != cuenta_pagar_detalle_control.idestadoDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado").val(cuenta_pagar_detalle_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(cuenta_pagar_detalle_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_pagar_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_pagar_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_pagar_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorCombosempresasFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorCombossucursalsFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorCombosejerciciosFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorCombosperiodosFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorCombosusuariosFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorComboscuenta_pagarsFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorCombosestadosFK(cuenta_pagar_detalle_control);
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
	onLoadCombosEventosFK(cuenta_pagar_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_pagar_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_pagar_detalle_control);
			//}

			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeCombossucursalsFK(cuenta_pagar_detalle_control);
			//}

			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cuenta_pagar_detalle_control);
			//}

			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeCombosperiodosFK(cuenta_pagar_detalle_control);
			//}

			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeCombosusuariosFK(cuenta_pagar_detalle_control);
			//}

			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeComboscuenta_pagarsFK(cuenta_pagar_detalle_control);
			//}

			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeCombosestadosFK(cuenta_pagar_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_pagar_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_pagar_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_pagar_detalle");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_pagar_detalle");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cuenta_pagar_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);			
			
			if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,"cuenta_pagar_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_pagar","id_cuenta_pagar","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParacuenta_pagar("id_cuenta_pagar");
				//alert(jQuery('#form-id_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idcuenta_pagar","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idejercicio","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idempresa","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idestado","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idperiodo","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idsucursal","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idusuario","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			cuenta_pagar_detalle_funcion1.validarFormularioJQuery(cuenta_pagar_detalle_constante1);
			
			if(cuenta_pagar_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_pagar_detalle_control) {
		
		jQuery("#divBusquedacuenta_pagar_detalleAjaxWebPart").css("display",cuenta_pagar_detalle_control.strPermisoBusqueda);
		jQuery("#trcuenta_pagar_detalleCabeceraBusquedas").css("display",cuenta_pagar_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_pagar_detalle").css("display",cuenta_pagar_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecuenta_pagar_detalle").css("display",cuenta_pagar_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscuenta_pagar_detalle").attr("style",cuenta_pagar_detalle_control.strPermisoMostrarTodos);
		
		if(cuenta_pagar_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdcuenta_pagar_detalleNuevo").css("display",cuenta_pagar_detalle_control.strPermisoNuevo);
			jQuery("#tdcuenta_pagar_detalleNuevoToolBar").css("display",cuenta_pagar_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcuenta_pagar_detalleDuplicar").css("display",cuenta_pagar_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_pagar_detalleDuplicarToolBar").css("display",cuenta_pagar_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_pagar_detalleNuevoGuardarCambios").css("display",cuenta_pagar_detalle_control.strPermisoNuevo);
			jQuery("#tdcuenta_pagar_detalleNuevoGuardarCambiosToolBar").css("display",cuenta_pagar_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cuenta_pagar_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_pagar_detalleActualizarToolBar").css("display",cuenta_pagar_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_pagar_detalleCopiar").css("display",cuenta_pagar_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_pagar_detalleCopiarToolBar").css("display",cuenta_pagar_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_pagar_detalleConEditar").css("display",cuenta_pagar_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdcuenta_pagar_detalleEliminarToolBar").css("display",cuenta_pagar_detalle_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcuenta_pagar_detalleGuardarCambios").css("display",cuenta_pagar_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcuenta_pagar_detalleGuardarCambiosToolBar").css("display",cuenta_pagar_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcuenta_pagar_detalleElementos").css("display",cuenta_pagar_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trcuenta_pagar_detalleAcciones").css("display",cuenta_pagar_detalle_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_pagar_detalleParametrosAcciones").css("display",cuenta_pagar_detalle_control.strVisibleTablaAcciones);
			
		jQuery("#tdcuenta_pagar_detalleCerrarPagina").css("display",cuenta_pagar_detalle_control.strPermisoPopup);		
		jQuery("#tdcuenta_pagar_detalleCerrarPaginaToolBar").css("display",cuenta_pagar_detalle_control.strPermisoPopup);
		//jQuery("#trcuenta_pagar_detalleAccionesRelaciones").css("display",cuenta_pagar_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_pagar_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_pagar_detalle_webcontrol1.registrarEventosControles();
		
		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_pagar_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_pagar_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_pagar_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_pagar_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(cuenta_pagar_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cuenta_pagar_detalle_webcontrol1.onLoad();
				
			} else {
				if(cuenta_pagar_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
					if(cuenta_pagar_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
						//cuenta_pagar_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(cuenta_pagar_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cuenta_pagar_detalle_constante1.BIG_ID_ACTUAL,"cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
						//cuenta_pagar_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			cuenta_pagar_detalle_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var cuenta_pagar_detalle_webcontrol1=new cuenta_pagar_detalle_webcontrol();

if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_pagar_detalle_webcontrol1.onLoadWindow; 
}

//</script>