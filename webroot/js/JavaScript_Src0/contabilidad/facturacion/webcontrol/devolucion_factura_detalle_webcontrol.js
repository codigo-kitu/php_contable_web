//<script type="text/javascript" language="javascript">



//var devolucion_factura_detalleJQueryPaginaWebInteraccion= function (devolucion_factura_detalle_control) {
//this.,this.,this.

class devolucion_factura_detalle_webcontrol extends devolucion_factura_detalle_webcontrol_add {
	
	devolucion_factura_detalle_control=null;
	devolucion_factura_detalle_controlInicial=null;
	devolucion_factura_detalle_controlAuxiliar=null;
		
	//if(devolucion_factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(devolucion_factura_detalle_control) {
		super();
		
		this.devolucion_factura_detalle_control=devolucion_factura_detalle_control;
	}
		
	actualizarVariablesPagina(devolucion_factura_detalle_control) {
		
		if(devolucion_factura_detalle_control.action=="index" || devolucion_factura_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(devolucion_factura_detalle_control);
			
		} else if(devolucion_factura_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(devolucion_factura_detalle_control);
			
		} else if(devolucion_factura_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(devolucion_factura_detalle_control);
			
		} else if(devolucion_factura_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(devolucion_factura_detalle_control);
		
		} else if(devolucion_factura_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(devolucion_factura_detalle_control);		
		
		} else if(devolucion_factura_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(devolucion_factura_detalle_control);		
		
		} else if(devolucion_factura_detalle_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(devolucion_factura_detalle_control);		
		
		} else if(devolucion_factura_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_factura_detalle_control);		
		}
		else if(devolucion_factura_detalle_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(devolucion_factura_detalle_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(devolucion_factura_detalle_control.action + " Revisar Manejo");
			
			if(devolucion_factura_detalle_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(devolucion_factura_detalle_control);
				
				return;
			}
			
			//if(devolucion_factura_detalle_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(devolucion_factura_detalle_control);
			//}
			
			if(devolucion_factura_detalle_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(devolucion_factura_detalle_control);
			}
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && devolucion_factura_detalle_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(devolucion_factura_detalle_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(devolucion_factura_detalle_control, false);			
			}
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(devolucion_factura_detalle_control);	
			}
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);
			}
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(devolucion_factura_detalle_control);
			}
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(devolucion_factura_detalle_control);
			}
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(devolucion_factura_detalle_control);	
			}
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
			}
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(devolucion_factura_detalle_control);
			}
			
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(devolucion_factura_detalle_control);			
			}
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(devolucion_factura_detalle_control);
			}
			
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_factura_detalle_control);
			}
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(devolucion_factura_detalle_control);
			}				
			
			if(devolucion_factura_detalle_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(devolucion_factura_detalle_control);
			}
			
			if(devolucion_factura_detalle_control.usuarioActual!=null && devolucion_factura_detalle_control.usuarioActual.field_strUserName!=null &&
			devolucion_factura_detalle_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(devolucion_factura_detalle_control);			
			}
		}
		
		
		if(devolucion_factura_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(devolucion_factura_detalle_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(devolucion_factura_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_factura_detalle_control);
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_factura_detalle_control);
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_factura_detalle_control);
		this.actualizarPaginaAreaBusquedas(devolucion_factura_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_factura_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(devolucion_factura_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_factura_detalle_control);
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_factura_detalle_control);
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_factura_detalle_control);
		this.actualizarPaginaAreaBusquedas(devolucion_factura_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_factura_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(devolucion_factura_detalle_control) {
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(devolucion_factura_detalle_control) {
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(devolucion_factura_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(devolucion_factura_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_factura_detalle_control);
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(devolucion_factura_detalle_control) {
		this.actualizarPaginaAbrirLink(devolucion_factura_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);				
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(devolucion_factura_detalle_control) {
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);
		this.onLoadCombosDefectoFK(devolucion_factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);
		this.onLoadCombosDefectoFK(devolucion_factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(devolucion_factura_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(devolucion_factura_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_factura_detalle_control);
		this.actualizarPaginaFormulario(devolucion_factura_detalle_control);
		this.onLoadCombosDefectoFK(devolucion_factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(devolucion_factura_detalle_control) {
		this.actualizarPaginaAbrirLink(devolucion_factura_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(devolucion_factura_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(devolucion_factura_detalle_control) {
		this.actualizarPaginaImprimir(devolucion_factura_detalle_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(devolucion_factura_detalle_control) {
		this.actualizarPaginaImprimir(devolucion_factura_detalle_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_factura_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(devolucion_factura_detalle_control) {
		//FORMULARIO
		if(devolucion_factura_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_factura_detalle_control);
			this.actualizarPaginaFormularioAdd(devolucion_factura_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);		
		//COMBOS FK
		if(devolucion_factura_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_factura_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(devolucion_factura_detalle_control) {
		//FORMULARIO
		if(devolucion_factura_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_factura_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);	
		//COMBOS FK
		if(devolucion_factura_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_factura_detalle_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(devolucion_factura_detalle_control) {
		//FORMULARIO
		if(devolucion_factura_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_factura_detalle_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(devolucion_factura_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control);	
		//COMBOS FK
		if(devolucion_factura_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_factura_detalle_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_detalle_control) {
		if(devolucion_factura_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && devolucion_factura_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(devolucion_factura_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(devolucion_factura_detalle_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(devolucion_factura_detalle_control) {
		if(devolucion_factura_detalle_funcion1.esPaginaForm()==true) {
			window.opener.devolucion_factura_detalle_webcontrol1.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(devolucion_factura_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(devolucion_factura_detalle_control) {
		devolucion_factura_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(devolucion_factura_detalle_control.strAuxiliarUrlPagina);
				
		devolucion_factura_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(devolucion_factura_detalle_control.strAuxiliarTipo,devolucion_factura_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(devolucion_factura_detalle_control) {
		devolucion_factura_detalle_funcion1.resaltarRestaurarDivMensaje(true,devolucion_factura_detalle_control.strAuxiliarMensajeAlert,devolucion_factura_detalle_control.strAuxiliarCssMensaje);
			
		if(devolucion_factura_detalle_funcion1.esPaginaForm()==true) {
			window.opener.devolucion_factura_detalle_funcion1.resaltarRestaurarDivMensaje(true,devolucion_factura_detalle_control.strAuxiliarMensajeAlert,devolucion_factura_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(devolucion_factura_detalle_control) {
		eval(devolucion_factura_detalle_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(devolucion_factura_detalle_control, mostrar) {
		
		if(mostrar==true) {
			devolucion_factura_detalle_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				devolucion_factura_detalle_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			devolucion_factura_detalle_funcion1.mostrarDivMensaje(true,devolucion_factura_detalle_control.strAuxiliarMensaje,devolucion_factura_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			devolucion_factura_detalle_funcion1.mostrarDivMensaje(false,devolucion_factura_detalle_control.strAuxiliarMensaje,devolucion_factura_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(devolucion_factura_detalle_control) {
	
		funcionGeneral.printWebPartPage("devolucion_factura_detalle",devolucion_factura_detalle_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliardevolucion_factura_detallesAjaxWebPart").html(devolucion_factura_detalle_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("devolucion_factura_detalle",jQuery("#divTablaDatosReporteAuxiliardevolucion_factura_detallesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(devolucion_factura_detalle_control) {
		this.devolucion_factura_detalle_controlInicial=devolucion_factura_detalle_control;
			
		if(devolucion_factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(devolucion_factura_detalle_control.strStyleDivArbol,devolucion_factura_detalle_control.strStyleDivContent
																,devolucion_factura_detalle_control.strStyleDivOpcionesBanner,devolucion_factura_detalle_control.strStyleDivExpandirColapsar
																,devolucion_factura_detalle_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=devolucion_factura_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",devolucion_factura_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(devolucion_factura_detalle_control) {
		jQuery("#divTablaDatosdevolucion_factura_detallesAjaxWebPart").html(devolucion_factura_detalle_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdevolucion_factura_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(devolucion_factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdevolucion_factura_detalles=jQuery("#tblTablaDatosdevolucion_factura_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("devolucion_factura_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',devolucion_factura_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			devolucion_factura_detalle_webcontrol1.registrarControlesTableEdition(devolucion_factura_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		devolucion_factura_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(devolucion_factura_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(devolucion_factura_detalle_control.devolucion_factura_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(devolucion_factura_detalle_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(devolucion_factura_detalle_control) {
		this.actualizarCssBotonesPagina(devolucion_factura_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(devolucion_factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(devolucion_factura_detalle_control.tiposReportes,devolucion_factura_detalle_control.tiposReporte
															 	,devolucion_factura_detalle_control.tiposPaginacion,devolucion_factura_detalle_control.tiposAcciones
																,devolucion_factura_detalle_control.tiposColumnasSelect,devolucion_factura_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(devolucion_factura_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(devolucion_factura_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(devolucion_factura_detalle_control);			
	}
	
	actualizarPaginaAreaBusquedas(devolucion_factura_detalle_control) {
		jQuery("#divBusquedadevolucion_factura_detalleAjaxWebPart").css("display",devolucion_factura_detalle_control.strPermisoBusqueda);
		jQuery("#trdevolucion_factura_detalleCabeceraBusquedas").css("display",devolucion_factura_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedadevolucion_factura_detalle").css("display",devolucion_factura_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(devolucion_factura_detalle_control.htmlTablaOrderBy!=null
			&& devolucion_factura_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydevolucion_factura_detalleAjaxWebPart").html(devolucion_factura_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//devolucion_factura_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(devolucion_factura_detalle_control.htmlTablaOrderByRel!=null
			&& devolucion_factura_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldevolucion_factura_detalleAjaxWebPart").html(devolucion_factura_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(devolucion_factura_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadevolucion_factura_detalleAjaxWebPart").css("display","none");
			jQuery("#trdevolucion_factura_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadevolucion_factura_detalle").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(devolucion_factura_detalle_control) {
		jQuery("#tddevolucion_factura_detalleNuevo").css("display",devolucion_factura_detalle_control.strPermisoNuevo);
		jQuery("#trdevolucion_factura_detalleElementos").css("display",devolucion_factura_detalle_control.strVisibleTablaElementos);
		jQuery("#trdevolucion_factura_detalleAcciones").css("display",devolucion_factura_detalle_control.strVisibleTablaAcciones);
		jQuery("#trdevolucion_factura_detalleParametrosAcciones").css("display",devolucion_factura_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(devolucion_factura_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(devolucion_factura_detalle_control);
				
		if(devolucion_factura_detalle_control.devolucion_factura_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(devolucion_factura_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(devolucion_factura_detalle_control);
	}
	
	actualizarPaginaUsuarioInvitado(devolucion_factura_detalle_control) {
	
		var indexPosition=devolucion_factura_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=devolucion_factura_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(devolucion_factura_detalle_control) {
		jQuery("#divResumendevolucion_factura_detalleActualAjaxWebPart").html(devolucion_factura_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(devolucion_factura_detalle_control) {
		jQuery("#divAccionesRelacionesdevolucion_factura_detalleAjaxWebPart").html(devolucion_factura_detalle_control.htmlTablaAccionesRelaciones);
			
		devolucion_factura_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(devolucion_factura_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(devolucion_factura_detalle_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(devolucion_factura_detalle_control) {
		
		if(devolucion_factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",devolucion_factura_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",devolucion_factura_detalle_control.strVisibleFK_Idbodega);
		}

		if(devolucion_factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",devolucion_factura_detalle_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",devolucion_factura_detalle_control.strVisibleFK_Idcliente);
		}

		if(devolucion_factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion_cliente").attr("style",devolucion_factura_detalle_control.strVisibleFK_Iddevolucion_cliente);
			jQuery("#tblstrVisible"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion_cliente").attr("style",devolucion_factura_detalle_control.strVisibleFK_Iddevolucion_cliente);
		}

		if(devolucion_factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",devolucion_factura_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",devolucion_factura_detalle_control.strVisibleFK_Idproducto);
		}

		if(devolucion_factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",devolucion_factura_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",devolucion_factura_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondevolucion_factura_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("devolucion_factura_detalle",id,"facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);		
	}
	
	

	abrirBusquedaParadevolucion_factura(strNombreCampoBusqueda){//idActual
		devolucion_factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura_detalle","devolucion_factura","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		devolucion_factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura_detalle","bodega","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		devolucion_factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura_detalle","producto","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		devolucion_factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura_detalle","unidad","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		devolucion_factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura_detalle","cliente","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(devolucion_factura_detalle_control) {
	
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-version_row").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.versionRow);
		
		if(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_devolucion_factura!=null && devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_devolucion_factura>-1){
			if(jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_devolucion_factura").val() != devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_devolucion_factura) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_devolucion_factura").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_devolucion_factura).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_devolucion_factura").select2("val", null);
			if(jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_devolucion_factura").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_devolucion_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_bodega!=null && devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_bodega>-1){
			if(jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_bodega) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_producto!=null && devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_producto>-1){
			if(jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_producto").val() != devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_producto) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_producto").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_unidad!=null && devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_unidad>-1){
			if(jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_unidad) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-cantidad").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.cantidad);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-precio").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.precio);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-sub_total").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.sub_total);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-descuento_porciento").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.descuento_porciento);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-descuento_monto").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.descuento_monto);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-iva_porciento").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.iva_porciento);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-iva_monto").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.iva_monto);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-total").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.total);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-recibido").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.recibido);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-costo").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.costo);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-impuesto2_porciento").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.impuesto2_porciento);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-impuesto2_monto").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.impuesto2_monto);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-fecha_emision").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.fecha_emision);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-comentario").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.comentario);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-tipo_cambio").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.tipo_cambio);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-moneda").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.moneda);
		jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-anulada").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.anulada);
		
		if(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_cliente!=null && devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_cliente>-1){
			if(jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_cliente").val() != devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_cliente) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_cliente").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_cliente").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+devolucion_factura_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("devolucion_factura_detalle","facturacion","","form_devolucion_factura_detalle",formulario,"","",paraEventoTabla,idFilaTabla,devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
	}
	
	cargarCombosFK(devolucion_factura_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_devolucion_factura",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_factura_detalle_webcontrol1.cargarCombosdevolucion_facturasFK(devolucion_factura_detalle_control);
			}

			if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_factura_detalle_webcontrol1.cargarCombosbodegasFK(devolucion_factura_detalle_control);
			}

			if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_factura_detalle_webcontrol1.cargarCombosproductosFK(devolucion_factura_detalle_control);
			}

			if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_factura_detalle_webcontrol1.cargarCombosunidadsFK(devolucion_factura_detalle_control);
			}

			if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_factura_detalle_webcontrol1.cargarCombosclientesFK(devolucion_factura_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(devolucion_factura_detalle_control.strRecargarFkTiposNinguno!=null && devolucion_factura_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && devolucion_factura_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(devolucion_factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_devolucion_factura",devolucion_factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_detalle_webcontrol1.cargarCombosdevolucion_facturasFK(devolucion_factura_detalle_control);
				}

				if(devolucion_factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",devolucion_factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_detalle_webcontrol1.cargarCombosbodegasFK(devolucion_factura_detalle_control);
				}

				if(devolucion_factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",devolucion_factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_detalle_webcontrol1.cargarCombosproductosFK(devolucion_factura_detalle_control);
				}

				if(devolucion_factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",devolucion_factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_detalle_webcontrol1.cargarCombosunidadsFK(devolucion_factura_detalle_control);
				}

				if(devolucion_factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",devolucion_factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_detalle_webcontrol1.cargarCombosclientesFK(devolucion_factura_detalle_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(devolucion_factura_detalle_control) {
		jQuery("#spanstrMensajeid").text(devolucion_factura_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(devolucion_factura_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_devolucion_factura").text(devolucion_factura_detalle_control.strMensajeid_devolucion_factura);		
		jQuery("#spanstrMensajeid_bodega").text(devolucion_factura_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(devolucion_factura_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(devolucion_factura_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajecantidad").text(devolucion_factura_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajeprecio").text(devolucion_factura_detalle_control.strMensajeprecio);		
		jQuery("#spanstrMensajesub_total").text(devolucion_factura_detalle_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_porciento").text(devolucion_factura_detalle_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajedescuento_monto").text(devolucion_factura_detalle_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(devolucion_factura_detalle_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(devolucion_factura_detalle_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajetotal").text(devolucion_factura_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajerecibido").text(devolucion_factura_detalle_control.strMensajerecibido);		
		jQuery("#spanstrMensajecosto").text(devolucion_factura_detalle_control.strMensajecosto);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(devolucion_factura_detalle_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(devolucion_factura_detalle_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajefecha_emision").text(devolucion_factura_detalle_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajecomentario").text(devolucion_factura_detalle_control.strMensajecomentario);		
		jQuery("#spanstrMensajetipo_cambio").text(devolucion_factura_detalle_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajemoneda").text(devolucion_factura_detalle_control.strMensajemoneda);		
		jQuery("#spanstrMensajeanulada").text(devolucion_factura_detalle_control.strMensajeanulada);		
		jQuery("#spanstrMensajeid_cliente").text(devolucion_factura_detalle_control.strMensajeid_cliente);		
	}
	
	actualizarCssBotonesMantenimiento(devolucion_factura_detalle_control) {
		jQuery("#tdbtnNuevodevolucion_factura_detalle").css("visibility",devolucion_factura_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodevolucion_factura_detalle").css("display",devolucion_factura_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardevolucion_factura_detalle").css("visibility",devolucion_factura_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardevolucion_factura_detalle").css("display",devolucion_factura_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardevolucion_factura_detalle").css("visibility",devolucion_factura_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardevolucion_factura_detalle").css("display",devolucion_factura_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardevolucion_factura_detalle").css("visibility",devolucion_factura_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdevolucion_factura_detalle").css("visibility",devolucion_factura_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdevolucion_factura_detalle").css("display",devolucion_factura_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardevolucion_factura_detalle").css("visibility",devolucion_factura_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardevolucion_factura_detalle").css("visibility",devolucion_factura_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardevolucion_factura_detalle").css("visibility",devolucion_factura_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.devolucion_factura_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.devolucion_factura_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.devolucion_factura_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.devolucion_factura_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.devolucion_factura_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.devolucion_factura_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTabladevolucion_facturaFK(devolucion_factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_detalle_funcion1,devolucion_factura_detalle_control.devolucion_facturasFK);
	}

	cargarComboEditarTablabodegaFK(devolucion_factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_detalle_funcion1,devolucion_factura_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(devolucion_factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_detalle_funcion1,devolucion_factura_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(devolucion_factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_detalle_funcion1,devolucion_factura_detalle_control.unidadsFK);
	}

	cargarComboEditarTablaclienteFK(devolucion_factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_detalle_funcion1,devolucion_factura_detalle_control.clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(devolucion_factura_detalle_control) {
		var i=0;
		
		i=devolucion_factura_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.versionRow);
		
		if(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_devolucion_factura!=null && devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_devolucion_factura>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_devolucion_factura) {
				jQuery("#t-cel_"+i+"_2").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_devolucion_factura).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_bodega!=null && devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_3").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_producto!=null && devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_4").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_unidad!=null && devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_5").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_7").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.precio);
		jQuery("#t-cel_"+i+"_8").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.sub_total);
		jQuery("#t-cel_"+i+"_9").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_10").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.descuento_monto);
		jQuery("#t-cel_"+i+"_11").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.iva_porciento);
		jQuery("#t-cel_"+i+"_12").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.iva_monto);
		jQuery("#t-cel_"+i+"_13").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.total);
		jQuery("#t-cel_"+i+"_14").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.recibido);
		jQuery("#t-cel_"+i+"_15").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.costo);
		jQuery("#t-cel_"+i+"_16").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_17").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_18").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.fecha_emision);
		jQuery("#t-cel_"+i+"_19").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.comentario);
		jQuery("#t-cel_"+i+"_20").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_21").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.moneda);
		jQuery("#t-cel_"+i+"_22").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.anulada);
		
		if(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_cliente!=null && devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_23").val() != devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_cliente) {
				jQuery("#t-cel_"+i+"_23").val(devolucion_factura_detalle_control.devolucion_factura_detalleActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_23").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_23").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(devolucion_factura_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(devolucion_factura_detalle_control) {
		devolucion_factura_detalle_funcion1.registrarControlesTableValidacionEdition(devolucion_factura_detalle_control,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalleConstante,strParametros);
		
		//devolucion_factura_detalle_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosdevolucion_facturasFK(devolucion_factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_devolucion_factura",devolucion_factura_detalle_control.devolucion_facturasFK);

		if(devolucion_factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_detalle_control.idFilaTablaActual+"_2",devolucion_factura_detalle_control.devolucion_facturasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion_cliente-cmbid_devolucion_factura",devolucion_factura_detalle_control.devolucion_facturasFK);

	};

	cargarCombosbodegasFK(devolucion_factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_bodega",devolucion_factura_detalle_control.bodegasFK);

		if(devolucion_factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_detalle_control.idFilaTablaActual+"_3",devolucion_factura_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",devolucion_factura_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(devolucion_factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_producto",devolucion_factura_detalle_control.productosFK);

		if(devolucion_factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_detalle_control.idFilaTablaActual+"_4",devolucion_factura_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",devolucion_factura_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(devolucion_factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_unidad",devolucion_factura_detalle_control.unidadsFK);

		if(devolucion_factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_detalle_control.idFilaTablaActual+"_5",devolucion_factura_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",devolucion_factura_detalle_control.unidadsFK);

	};

	cargarCombosclientesFK(devolucion_factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_cliente",devolucion_factura_detalle_control.clientesFK);

		if(devolucion_factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_detalle_control.idFilaTablaActual+"_23",devolucion_factura_detalle_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",devolucion_factura_detalle_control.clientesFK);

	};

	
	
	registrarComboActionChangeCombosdevolucion_facturasFK(devolucion_factura_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(devolucion_factura_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(devolucion_factura_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(devolucion_factura_detalle_control) {

	};

	registrarComboActionChangeCombosclientesFK(devolucion_factura_detalle_control) {

	};

	
	
	setDefectoValorCombosdevolucion_facturasFK(devolucion_factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_detalle_control.iddevolucion_facturaDefaultFK>-1 && jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_devolucion_factura").val() != devolucion_factura_detalle_control.iddevolucion_facturaDefaultFK) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_devolucion_factura").val(devolucion_factura_detalle_control.iddevolucion_facturaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion_cliente-cmbid_devolucion_factura").val(devolucion_factura_detalle_control.iddevolucion_facturaDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion_cliente-cmbid_devolucion_factura").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion_cliente-cmbid_devolucion_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(devolucion_factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != devolucion_factura_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val(devolucion_factura_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(devolucion_factura_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(devolucion_factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_producto").val() != devolucion_factura_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_producto").val(devolucion_factura_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(devolucion_factura_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(devolucion_factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != devolucion_factura_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val(devolucion_factura_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(devolucion_factura_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(devolucion_factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_detalle_control.idclienteDefaultFK>-1 && jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_cliente").val() != devolucion_factura_detalle_control.idclienteDefaultFK) {
				jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_cliente").val(devolucion_factura_detalle_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(devolucion_factura_detalle_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("devolucion_factura_detalle","facturacion","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("devolucion_factura_detalle","facturacion","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//devolucion_factura_detalle_control
		
	

		var cantidad="form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_factura_detalle","facturacion","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);

		var precio="form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_factura_detalle","facturacion","","precio",precio,"","",paraEventoTabla,idFilaTabla,devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);

		var descuento_porciento="form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_factura_detalle","facturacion","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);

		var iva_porciento="form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_factura_detalle","facturacion","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(devolucion_factura_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_factura_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_devolucion_factura",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_factura_detalle_webcontrol1.setDefectoValorCombosdevolucion_facturasFK(devolucion_factura_detalle_control);
			}

			if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_factura_detalle_webcontrol1.setDefectoValorCombosbodegasFK(devolucion_factura_detalle_control);
			}

			if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_factura_detalle_webcontrol1.setDefectoValorCombosproductosFK(devolucion_factura_detalle_control);
			}

			if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_factura_detalle_webcontrol1.setDefectoValorCombosunidadsFK(devolucion_factura_detalle_control);
			}

			if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_factura_detalle_webcontrol1.setDefectoValorCombosclientesFK(devolucion_factura_detalle_control);
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
	onLoadCombosEventosFK(devolucion_factura_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_factura_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_devolucion_factura",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_detalle_webcontrol1.registrarComboActionChangeCombosdevolucion_facturasFK(devolucion_factura_detalle_control);
			//}

			//if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(devolucion_factura_detalle_control);
			//}

			//if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(devolucion_factura_detalle_control);
			//}

			//if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(devolucion_factura_detalle_control);
			//}

			//if(devolucion_factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",devolucion_factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_detalle_webcontrol1.registrarComboActionChangeCombosclientesFK(devolucion_factura_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(devolucion_factura_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_factura_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(devolucion_factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("devolucion_factura_detalle");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("devolucion_factura_detalle");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(devolucion_factura_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);			
			
			if(devolucion_factura_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,"devolucion_factura_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("devolucion_factura","id_devolucion_factura","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_devolucion_factura_img_busqueda").click(function(){
				devolucion_factura_detalle_webcontrol1.abrirBusquedaParadevolucion_factura("id_devolucion_factura");
				//alert(jQuery('#form-id_devolucion_factura_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				devolucion_factura_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				devolucion_factura_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				devolucion_factura_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_detalle_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				devolucion_factura_detalle_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura_detalle","FK_Idbodega","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura_detalle","FK_Idcliente","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura_detalle","FK_Iddevolucion_cliente","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura_detalle","FK_Idproducto","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura_detalle","FK_Idunidad","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			devolucion_factura_detalle_funcion1.validarFormularioJQuery(devolucion_factura_detalle_constante1);
			
			if(devolucion_factura_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(devolucion_factura_detalle_control) {
		
		jQuery("#divBusquedadevolucion_factura_detalleAjaxWebPart").css("display",devolucion_factura_detalle_control.strPermisoBusqueda);
		jQuery("#trdevolucion_factura_detalleCabeceraBusquedas").css("display",devolucion_factura_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedadevolucion_factura_detalle").css("display",devolucion_factura_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedevolucion_factura_detalle").css("display",devolucion_factura_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdevolucion_factura_detalle").attr("style",devolucion_factura_detalle_control.strPermisoMostrarTodos);
		
		if(devolucion_factura_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tddevolucion_factura_detalleNuevo").css("display",devolucion_factura_detalle_control.strPermisoNuevo);
			jQuery("#tddevolucion_factura_detalleNuevoToolBar").css("display",devolucion_factura_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddevolucion_factura_detalleDuplicar").css("display",devolucion_factura_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddevolucion_factura_detalleDuplicarToolBar").css("display",devolucion_factura_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddevolucion_factura_detalleNuevoGuardarCambios").css("display",devolucion_factura_detalle_control.strPermisoNuevo);
			jQuery("#tddevolucion_factura_detalleNuevoGuardarCambiosToolBar").css("display",devolucion_factura_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(devolucion_factura_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tddevolucion_factura_detalleActualizarToolBar").css("display",devolucion_factura_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddevolucion_factura_detalleCopiar").css("display",devolucion_factura_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddevolucion_factura_detalleCopiarToolBar").css("display",devolucion_factura_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddevolucion_factura_detalleConEditar").css("display",devolucion_factura_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tddevolucion_factura_detalleEliminarToolBar").css("display",devolucion_factura_detalle_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tddevolucion_factura_detalleGuardarCambios").css("display",devolucion_factura_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddevolucion_factura_detalleGuardarCambiosToolBar").css("display",devolucion_factura_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trdevolucion_factura_detalleElementos").css("display",devolucion_factura_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trdevolucion_factura_detalleAcciones").css("display",devolucion_factura_detalle_control.strVisibleTablaAcciones);
		jQuery("#trdevolucion_factura_detalleParametrosAcciones").css("display",devolucion_factura_detalle_control.strVisibleTablaAcciones);
			
		jQuery("#tddevolucion_factura_detalleCerrarPagina").css("display",devolucion_factura_detalle_control.strPermisoPopup);		
		jQuery("#tddevolucion_factura_detalleCerrarPaginaToolBar").css("display",devolucion_factura_detalle_control.strPermisoPopup);
		//jQuery("#trdevolucion_factura_detalleAccionesRelaciones").css("display",devolucion_factura_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		devolucion_factura_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		devolucion_factura_detalle_webcontrol1.registrarEventosControles();
		
		if(devolucion_factura_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(devolucion_factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
			devolucion_factura_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(devolucion_factura_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(devolucion_factura_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				devolucion_factura_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(devolucion_factura_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(devolucion_factura_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				devolucion_factura_detalle_webcontrol1.onLoad();
				
			} else {
				if(devolucion_factura_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
					if(devolucion_factura_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
						//devolucion_factura_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(devolucion_factura_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(devolucion_factura_detalle_constante1.BIG_ID_ACTUAL,"devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);
						//devolucion_factura_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			devolucion_factura_detalle_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("devolucion_factura_detalle","facturacion","",devolucion_factura_detalle_funcion1,devolucion_factura_detalle_webcontrol1,devolucion_factura_detalle_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var devolucion_factura_detalle_webcontrol1=new devolucion_factura_detalle_webcontrol();

if(devolucion_factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = devolucion_factura_detalle_webcontrol1.onLoadWindow; 
}

//</script>