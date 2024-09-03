//<script type="text/javascript" language="javascript">



//var factura_lote_detalleJQueryPaginaWebInteraccion= function (factura_lote_detalle_control) {
//this.,this.,this.

class factura_lote_detalle_webcontrol extends factura_lote_detalle_webcontrol_add {
	
	factura_lote_detalle_control=null;
	factura_lote_detalle_controlInicial=null;
	factura_lote_detalle_controlAuxiliar=null;
		
	//if(factura_lote_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(factura_lote_detalle_control) {
		super();
		
		this.factura_lote_detalle_control=factura_lote_detalle_control;
	}
		
	actualizarVariablesPagina(factura_lote_detalle_control) {
		
		if(factura_lote_detalle_control.action=="index" || factura_lote_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(factura_lote_detalle_control);
			
		} else if(factura_lote_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(factura_lote_detalle_control);
			
		} else if(factura_lote_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(factura_lote_detalle_control);
			
		} else if(factura_lote_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_lote_detalle_control);		
		
		} else if(factura_lote_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(factura_lote_detalle_control);		
		
		} else if(factura_lote_detalle_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_lote_detalle_control);		
		
		} else if(factura_lote_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(factura_lote_detalle_control);		
		}
		else if(factura_lote_detalle_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_lote_detalle_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(factura_lote_detalle_control.action + " Revisar Manejo");
			
			if(factura_lote_detalle_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(factura_lote_detalle_control);
				
				return;
			}
			
			//if(factura_lote_detalle_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(factura_lote_detalle_control);
			//}
			
			if(factura_lote_detalle_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(factura_lote_detalle_control);
			}
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_lote_detalle_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(factura_lote_detalle_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(factura_lote_detalle_control, false);			
			}
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(factura_lote_detalle_control);	
			}
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(factura_lote_detalle_control);
			}
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(factura_lote_detalle_control);
			}
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);
			}
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(factura_lote_detalle_control);	
			}
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
			}
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(factura_lote_detalle_control);
			}
			
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(factura_lote_detalle_control);			
			}
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(factura_lote_detalle_control);
			}
			
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(factura_lote_detalle_control);
			}
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(factura_lote_detalle_control);
			}				
			
			if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_lote_detalle_control);
			}
			
			if(factura_lote_detalle_control.usuarioActual!=null && factura_lote_detalle_control.usuarioActual.field_strUserName!=null &&
			factura_lote_detalle_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(factura_lote_detalle_control);			
			}
		}
		
		
		if(factura_lote_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(factura_lote_detalle_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(factura_lote_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(factura_lote_detalle_control);
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);
		this.actualizarPaginaCargaGeneralControles(factura_lote_detalle_control);
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_lote_detalle_control);
		this.actualizarPaginaAreaBusquedas(factura_lote_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_lote_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(factura_lote_detalle_control);
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);
		this.actualizarPaginaCargaGeneralControles(factura_lote_detalle_control);
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_lote_detalle_control);
		this.actualizarPaginaAreaBusquedas(factura_lote_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);		
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);		
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);		
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(factura_lote_detalle_control) {
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(factura_lote_detalle_control) {
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_lote_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(factura_lote_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_lote_detalle_control) {
		this.actualizarPaginaAbrirLink(factura_lote_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);				
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);
		this.actualizarPaginaFormulario(factura_lote_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);
		this.actualizarPaginaFormulario(factura_lote_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(factura_lote_detalle_control) {
		this.actualizarPaginaFormulario(factura_lote_detalle_control);
		this.onLoadCombosDefectoFK(factura_lote_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);
		this.actualizarPaginaFormulario(factura_lote_detalle_control);
		this.onLoadCombosDefectoFK(factura_lote_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_lote_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(factura_lote_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);
		this.actualizarPaginaFormulario(factura_lote_detalle_control);
		this.onLoadCombosDefectoFK(factura_lote_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_lote_detalle_control) {
		this.actualizarPaginaAbrirLink(factura_lote_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_lote_detalle_control) {
		this.actualizarPaginaImprimir(factura_lote_detalle_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_lote_detalle_control) {
		this.actualizarPaginaImprimir(factura_lote_detalle_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(factura_lote_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_lote_detalle_control) {
		//FORMULARIO
		if(factura_lote_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_lote_detalle_control);
			this.actualizarPaginaFormularioAdd(factura_lote_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		//COMBOS FK
		if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(factura_lote_detalle_control) {
		//FORMULARIO
		if(factura_lote_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_lote_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);	
		//COMBOS FK
		if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_lote_detalle_control) {
		//FORMULARIO
		if(factura_lote_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_lote_detalle_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(factura_lote_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);	
		//COMBOS FK
		if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control) {
		if(factura_lote_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_lote_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(factura_lote_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(factura_lote_detalle_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(factura_lote_detalle_control) {
		if(factura_lote_detalle_funcion1.esPaginaForm()==true) {
			window.opener.factura_lote_detalle_webcontrol1.actualizarPaginaTablaDatos(factura_lote_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(factura_lote_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(factura_lote_detalle_control) {
		factura_lote_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(factura_lote_detalle_control.strAuxiliarUrlPagina);
				
		factura_lote_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(factura_lote_detalle_control.strAuxiliarTipo,factura_lote_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(factura_lote_detalle_control) {
		factura_lote_detalle_funcion1.resaltarRestaurarDivMensaje(true,factura_lote_detalle_control.strAuxiliarMensajeAlert,factura_lote_detalle_control.strAuxiliarCssMensaje);
			
		if(factura_lote_detalle_funcion1.esPaginaForm()==true) {
			window.opener.factura_lote_detalle_funcion1.resaltarRestaurarDivMensaje(true,factura_lote_detalle_control.strAuxiliarMensajeAlert,factura_lote_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(factura_lote_detalle_control) {
		eval(factura_lote_detalle_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(factura_lote_detalle_control, mostrar) {
		
		if(mostrar==true) {
			factura_lote_detalle_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				factura_lote_detalle_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			factura_lote_detalle_funcion1.mostrarDivMensaje(true,factura_lote_detalle_control.strAuxiliarMensaje,factura_lote_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			factura_lote_detalle_funcion1.mostrarDivMensaje(false,factura_lote_detalle_control.strAuxiliarMensaje,factura_lote_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(factura_lote_detalle_control) {
	
		funcionGeneral.printWebPartPage("factura_lote_detalle",factura_lote_detalle_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarfactura_lote_detallesAjaxWebPart").html(factura_lote_detalle_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("factura_lote_detalle",jQuery("#divTablaDatosReporteAuxiliarfactura_lote_detallesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(factura_lote_detalle_control) {
		this.factura_lote_detalle_controlInicial=factura_lote_detalle_control;
			
		if(factura_lote_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(factura_lote_detalle_control.strStyleDivArbol,factura_lote_detalle_control.strStyleDivContent
																,factura_lote_detalle_control.strStyleDivOpcionesBanner,factura_lote_detalle_control.strStyleDivExpandirColapsar
																,factura_lote_detalle_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=factura_lote_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",factura_lote_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(factura_lote_detalle_control) {
		jQuery("#divTablaDatosfactura_lote_detallesAjaxWebPart").html(factura_lote_detalle_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosfactura_lote_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(factura_lote_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosfactura_lote_detalles=jQuery("#tblTablaDatosfactura_lote_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("factura_lote_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',factura_lote_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			factura_lote_detalle_webcontrol1.registrarControlesTableEdition(factura_lote_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		factura_lote_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(factura_lote_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(factura_lote_detalle_control.factura_lote_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(factura_lote_detalle_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(factura_lote_detalle_control) {
		this.actualizarCssBotonesPagina(factura_lote_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(factura_lote_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(factura_lote_detalle_control.tiposReportes,factura_lote_detalle_control.tiposReporte
															 	,factura_lote_detalle_control.tiposPaginacion,factura_lote_detalle_control.tiposAcciones
																,factura_lote_detalle_control.tiposColumnasSelect,factura_lote_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(factura_lote_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(factura_lote_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(factura_lote_detalle_control);			
	}
	
	actualizarPaginaAreaBusquedas(factura_lote_detalle_control) {
		jQuery("#divBusquedafactura_lote_detalleAjaxWebPart").css("display",factura_lote_detalle_control.strPermisoBusqueda);
		jQuery("#trfactura_lote_detalleCabeceraBusquedas").css("display",factura_lote_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura_lote_detalle").css("display",factura_lote_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(factura_lote_detalle_control.htmlTablaOrderBy!=null
			&& factura_lote_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByfactura_lote_detalleAjaxWebPart").html(factura_lote_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//factura_lote_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(factura_lote_detalle_control.htmlTablaOrderByRel!=null
			&& factura_lote_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelfactura_lote_detalleAjaxWebPart").html(factura_lote_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(factura_lote_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedafactura_lote_detalleAjaxWebPart").css("display","none");
			jQuery("#trfactura_lote_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedafactura_lote_detalle").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(factura_lote_detalle_control) {
		jQuery("#tdfactura_lote_detalleNuevo").css("display",factura_lote_detalle_control.strPermisoNuevo);
		jQuery("#trfactura_lote_detalleElementos").css("display",factura_lote_detalle_control.strVisibleTablaElementos);
		jQuery("#trfactura_lote_detalleAcciones").css("display",factura_lote_detalle_control.strVisibleTablaAcciones);
		jQuery("#trfactura_lote_detalleParametrosAcciones").css("display",factura_lote_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(factura_lote_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(factura_lote_detalle_control);
				
		if(factura_lote_detalle_control.factura_lote_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(factura_lote_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(factura_lote_detalle_control);
	}
	
	actualizarPaginaUsuarioInvitado(factura_lote_detalle_control) {
	
		var indexPosition=factura_lote_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=factura_lote_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(factura_lote_detalle_control) {
		jQuery("#divResumenfactura_lote_detalleActualAjaxWebPart").html(factura_lote_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_lote_detalle_control) {
		jQuery("#divAccionesRelacionesfactura_lote_detalleAjaxWebPart").html(factura_lote_detalle_control.htmlTablaAccionesRelaciones);
			
		factura_lote_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(factura_lote_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(factura_lote_detalle_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(factura_lote_detalle_control) {
		
		if(factura_lote_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",factura_lote_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",factura_lote_detalle_control.strVisibleFK_Idbodega);
		}

		if(factura_lote_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idfactura_lote").attr("style",factura_lote_detalle_control.strVisibleFK_Idfactura_lote);
			jQuery("#tblstrVisible"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idfactura_lote").attr("style",factura_lote_detalle_control.strVisibleFK_Idfactura_lote);
		}

		if(factura_lote_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",factura_lote_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",factura_lote_detalle_control.strVisibleFK_Idproducto);
		}

		if(factura_lote_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",factura_lote_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",factura_lote_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionfactura_lote_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("factura_lote_detalle",id,"facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);		
	}
	
	

	abrirBusquedaParafactura_lote(strNombreCampoBusqueda){//idActual
		factura_lote_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote_detalle","factura_lote","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		factura_lote_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote_detalle","bodega","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		factura_lote_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote_detalle","producto","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		factura_lote_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote_detalle","unidad","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(factura_lote_detalle_control) {
	
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id").val(factura_lote_detalle_control.factura_lote_detalleActual.id);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-version_row").val(factura_lote_detalle_control.factura_lote_detalleActual.versionRow);
		
		if(factura_lote_detalle_control.factura_lote_detalleActual.id_factura_lote!=null && factura_lote_detalle_control.factura_lote_detalleActual.id_factura_lote>-1){
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").val() != factura_lote_detalle_control.factura_lote_detalleActual.id_factura_lote) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").val(factura_lote_detalle_control.factura_lote_detalleActual.id_factura_lote).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").select2("val", null);
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_detalle_control.factura_lote_detalleActual.id_bodega!=null && factura_lote_detalle_control.factura_lote_detalleActual.id_bodega>-1){
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != factura_lote_detalle_control.factura_lote_detalleActual.id_bodega) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").val(factura_lote_detalle_control.factura_lote_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_detalle_control.factura_lote_detalleActual.id_producto!=null && factura_lote_detalle_control.factura_lote_detalleActual.id_producto>-1){
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").val() != factura_lote_detalle_control.factura_lote_detalleActual.id_producto) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").val(factura_lote_detalle_control.factura_lote_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_detalle_control.factura_lote_detalleActual.id_unidad!=null && factura_lote_detalle_control.factura_lote_detalleActual.id_unidad>-1){
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != factura_lote_detalle_control.factura_lote_detalleActual.id_unidad) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").val(factura_lote_detalle_control.factura_lote_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-cantidad").val(factura_lote_detalle_control.factura_lote_detalleActual.cantidad);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-precio").val(factura_lote_detalle_control.factura_lote_detalleActual.precio);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-sub_total").val(factura_lote_detalle_control.factura_lote_detalleActual.sub_total);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-descuento_porciento").val(factura_lote_detalle_control.factura_lote_detalleActual.descuento_porciento);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-descuento_monto").val(factura_lote_detalle_control.factura_lote_detalleActual.descuento_monto);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-iva_porciento").val(factura_lote_detalle_control.factura_lote_detalleActual.iva_porciento);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-iva_monto").val(factura_lote_detalle_control.factura_lote_detalleActual.iva_monto);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-total").val(factura_lote_detalle_control.factura_lote_detalleActual.total);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-recibido").val(factura_lote_detalle_control.factura_lote_detalleActual.recibido);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-costo").val(factura_lote_detalle_control.factura_lote_detalleActual.costo);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-impuesto2_porciento").val(factura_lote_detalle_control.factura_lote_detalleActual.impuesto2_porciento);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-impuesto2_monto").val(factura_lote_detalle_control.factura_lote_detalleActual.impuesto2_monto);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-fecha_emision").val(factura_lote_detalle_control.factura_lote_detalleActual.fecha_emision);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-tipo_factura").val(factura_lote_detalle_control.factura_lote_detalleActual.tipo_factura);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-tipo_cambio").val(factura_lote_detalle_control.factura_lote_detalleActual.tipo_cambio);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-moneda").val(factura_lote_detalle_control.factura_lote_detalleActual.moneda);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-anulada").val(factura_lote_detalle_control.factura_lote_detalleActual.anulada);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+factura_lote_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("factura_lote_detalle","facturacion","","form_factura_lote_detalle",formulario,"","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}
	
	cargarCombosFK(factura_lote_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura_lote",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.cargarCombosfactura_lotesFK(factura_lote_detalle_control);
			}

			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.cargarCombosbodegasFK(factura_lote_detalle_control);
			}

			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.cargarCombosproductosFK(factura_lote_detalle_control);
			}

			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.cargarCombosunidadsFK(factura_lote_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(factura_lote_detalle_control.strRecargarFkTiposNinguno!=null && factura_lote_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && factura_lote_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(factura_lote_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_factura_lote",factura_lote_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_detalle_webcontrol1.cargarCombosfactura_lotesFK(factura_lote_detalle_control);
				}

				if(factura_lote_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",factura_lote_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_detalle_webcontrol1.cargarCombosbodegasFK(factura_lote_detalle_control);
				}

				if(factura_lote_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",factura_lote_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_detalle_webcontrol1.cargarCombosproductosFK(factura_lote_detalle_control);
				}

				if(factura_lote_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",factura_lote_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_detalle_webcontrol1.cargarCombosunidadsFK(factura_lote_detalle_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(factura_lote_detalle_control) {
		jQuery("#spanstrMensajeid").text(factura_lote_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(factura_lote_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_factura_lote").text(factura_lote_detalle_control.strMensajeid_factura_lote);		
		jQuery("#spanstrMensajeid_bodega").text(factura_lote_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(factura_lote_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(factura_lote_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajecantidad").text(factura_lote_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajeprecio").text(factura_lote_detalle_control.strMensajeprecio);		
		jQuery("#spanstrMensajesub_total").text(factura_lote_detalle_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_porciento").text(factura_lote_detalle_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajedescuento_monto").text(factura_lote_detalle_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(factura_lote_detalle_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(factura_lote_detalle_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajetotal").text(factura_lote_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajerecibido").text(factura_lote_detalle_control.strMensajerecibido);		
		jQuery("#spanstrMensajecosto").text(factura_lote_detalle_control.strMensajecosto);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(factura_lote_detalle_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(factura_lote_detalle_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajefecha_emision").text(factura_lote_detalle_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajetipo_factura").text(factura_lote_detalle_control.strMensajetipo_factura);		
		jQuery("#spanstrMensajetipo_cambio").text(factura_lote_detalle_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajemoneda").text(factura_lote_detalle_control.strMensajemoneda);		
		jQuery("#spanstrMensajeanulada").text(factura_lote_detalle_control.strMensajeanulada);		
	}
	
	actualizarCssBotonesMantenimiento(factura_lote_detalle_control) {
		jQuery("#tdbtnNuevofactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevofactura_lote_detalle").css("display",factura_lote_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarfactura_lote_detalle").css("display",factura_lote_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarfactura_lote_detalle").css("display",factura_lote_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosfactura_lote_detalle").css("display",factura_lote_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaCancelar);						
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
			if(nombreCombo=="form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.factura_lote_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.factura_lote_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.factura_lote_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.factura_lote_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.factura_lote_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.factura_lote_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablafactura_loteFK(factura_lote_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_detalle_funcion1,factura_lote_detalle_control.factura_lotesFK);
	}

	cargarComboEditarTablabodegaFK(factura_lote_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_detalle_funcion1,factura_lote_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(factura_lote_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_detalle_funcion1,factura_lote_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(factura_lote_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_detalle_funcion1,factura_lote_detalle_control.unidadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(factura_lote_detalle_control) {
		var i=0;
		
		i=factura_lote_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(factura_lote_detalle_control.factura_lote_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(factura_lote_detalle_control.factura_lote_detalleActual.versionRow);
		
		if(factura_lote_detalle_control.factura_lote_detalleActual.id_factura_lote!=null && factura_lote_detalle_control.factura_lote_detalleActual.id_factura_lote>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != factura_lote_detalle_control.factura_lote_detalleActual.id_factura_lote) {
				jQuery("#t-cel_"+i+"_2").val(factura_lote_detalle_control.factura_lote_detalleActual.id_factura_lote).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_detalle_control.factura_lote_detalleActual.id_bodega!=null && factura_lote_detalle_control.factura_lote_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != factura_lote_detalle_control.factura_lote_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_3").val(factura_lote_detalle_control.factura_lote_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_detalle_control.factura_lote_detalleActual.id_producto!=null && factura_lote_detalle_control.factura_lote_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != factura_lote_detalle_control.factura_lote_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_4").val(factura_lote_detalle_control.factura_lote_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_detalle_control.factura_lote_detalleActual.id_unidad!=null && factura_lote_detalle_control.factura_lote_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != factura_lote_detalle_control.factura_lote_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_5").val(factura_lote_detalle_control.factura_lote_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(factura_lote_detalle_control.factura_lote_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_7").val(factura_lote_detalle_control.factura_lote_detalleActual.precio);
		jQuery("#t-cel_"+i+"_8").val(factura_lote_detalle_control.factura_lote_detalleActual.sub_total);
		jQuery("#t-cel_"+i+"_9").val(factura_lote_detalle_control.factura_lote_detalleActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_10").val(factura_lote_detalle_control.factura_lote_detalleActual.descuento_monto);
		jQuery("#t-cel_"+i+"_11").val(factura_lote_detalle_control.factura_lote_detalleActual.iva_porciento);
		jQuery("#t-cel_"+i+"_12").val(factura_lote_detalle_control.factura_lote_detalleActual.iva_monto);
		jQuery("#t-cel_"+i+"_13").val(factura_lote_detalle_control.factura_lote_detalleActual.total);
		jQuery("#t-cel_"+i+"_14").val(factura_lote_detalle_control.factura_lote_detalleActual.recibido);
		jQuery("#t-cel_"+i+"_15").val(factura_lote_detalle_control.factura_lote_detalleActual.costo);
		jQuery("#t-cel_"+i+"_16").val(factura_lote_detalle_control.factura_lote_detalleActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_17").val(factura_lote_detalle_control.factura_lote_detalleActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_18").val(factura_lote_detalle_control.factura_lote_detalleActual.fecha_emision);
		jQuery("#t-cel_"+i+"_19").val(factura_lote_detalle_control.factura_lote_detalleActual.tipo_factura);
		jQuery("#t-cel_"+i+"_20").val(factura_lote_detalle_control.factura_lote_detalleActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_21").val(factura_lote_detalle_control.factura_lote_detalleActual.moneda);
		jQuery("#t-cel_"+i+"_22").val(factura_lote_detalle_control.factura_lote_detalleActual.anulada);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(factura_lote_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(factura_lote_detalle_control) {
		factura_lote_detalle_funcion1.registrarControlesTableValidacionEdition(factura_lote_detalle_control,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalleConstante,strParametros);
		
		//factura_lote_detalle_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosfactura_lotesFK(factura_lote_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote",factura_lote_detalle_control.factura_lotesFK);

		if(factura_lote_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_detalle_control.idFilaTablaActual+"_2",factura_lote_detalle_control.factura_lotesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote",factura_lote_detalle_control.factura_lotesFK);

	};

	cargarCombosbodegasFK(factura_lote_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega",factura_lote_detalle_control.bodegasFK);

		if(factura_lote_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_detalle_control.idFilaTablaActual+"_3",factura_lote_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",factura_lote_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(factura_lote_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto",factura_lote_detalle_control.productosFK);

		if(factura_lote_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_detalle_control.idFilaTablaActual+"_4",factura_lote_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",factura_lote_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(factura_lote_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad",factura_lote_detalle_control.unidadsFK);

		if(factura_lote_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_detalle_control.idFilaTablaActual+"_5",factura_lote_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",factura_lote_detalle_control.unidadsFK);

	};

	
	
	registrarComboActionChangeCombosfactura_lotesFK(factura_lote_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(factura_lote_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(factura_lote_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(factura_lote_detalle_control) {

	};

	
	
	setDefectoValorCombosfactura_lotesFK(factura_lote_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_detalle_control.idfactura_loteDefaultFK>-1 && jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").val() != factura_lote_detalle_control.idfactura_loteDefaultFK) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").val(factura_lote_detalle_control.idfactura_loteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote").val(factura_lote_detalle_control.idfactura_loteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(factura_lote_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != factura_lote_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").val(factura_lote_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(factura_lote_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(factura_lote_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").val() != factura_lote_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").val(factura_lote_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(factura_lote_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(factura_lote_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != factura_lote_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").val(factura_lote_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(factura_lote_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura_lote_detalle","facturacion","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura_lote_detalle","facturacion","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//factura_lote_detalle_control
		
	

		var cantidad="form"+factura_lote_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_lote_detalle","facturacion","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

		var precio="form"+factura_lote_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_lote_detalle","facturacion","","precio",precio,"","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

		var descuento_porciento="form"+factura_lote_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_lote_detalle","facturacion","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

		var iva_porciento="form"+factura_lote_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_lote_detalle","facturacion","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(factura_lote_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_lote_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura_lote",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.setDefectoValorCombosfactura_lotesFK(factura_lote_detalle_control);
			}

			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.setDefectoValorCombosbodegasFK(factura_lote_detalle_control);
			}

			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.setDefectoValorCombosproductosFK(factura_lote_detalle_control);
			}

			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.setDefectoValorCombosunidadsFK(factura_lote_detalle_control);
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
	onLoadCombosEventosFK(factura_lote_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_lote_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura_lote",factura_lote_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_detalle_webcontrol1.registrarComboActionChangeCombosfactura_lotesFK(factura_lote_detalle_control);
			//}

			//if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",factura_lote_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(factura_lote_detalle_control);
			//}

			//if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",factura_lote_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(factura_lote_detalle_control);
			//}

			//if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",factura_lote_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(factura_lote_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(factura_lote_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_lote_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(factura_lote_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("factura_lote_detalle");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("factura_lote_detalle");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(factura_lote_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);			
			
			if(factura_lote_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,"factura_lote_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("factura_lote","id_factura_lote","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote_img_busqueda").click(function(){
				factura_lote_detalle_webcontrol1.abrirBusquedaParafactura_lote("id_factura_lote");
				//alert(jQuery('#form-id_factura_lote_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				factura_lote_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				factura_lote_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				factura_lote_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote_detalle","FK_Idbodega","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote_detalle","FK_Idfactura_lote","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote_detalle","FK_Idproducto","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote_detalle","FK_Idunidad","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			factura_lote_detalle_funcion1.validarFormularioJQuery(factura_lote_detalle_constante1);
			
			if(factura_lote_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(factura_lote_detalle_control) {
		
		jQuery("#divBusquedafactura_lote_detalleAjaxWebPart").css("display",factura_lote_detalle_control.strPermisoBusqueda);
		jQuery("#trfactura_lote_detalleCabeceraBusquedas").css("display",factura_lote_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura_lote_detalle").css("display",factura_lote_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportefactura_lote_detalle").css("display",factura_lote_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosfactura_lote_detalle").attr("style",factura_lote_detalle_control.strPermisoMostrarTodos);
		
		if(factura_lote_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdfactura_lote_detalleNuevo").css("display",factura_lote_detalle_control.strPermisoNuevo);
			jQuery("#tdfactura_lote_detalleNuevoToolBar").css("display",factura_lote_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdfactura_lote_detalleDuplicar").css("display",factura_lote_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfactura_lote_detalleDuplicarToolBar").css("display",factura_lote_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfactura_lote_detalleNuevoGuardarCambios").css("display",factura_lote_detalle_control.strPermisoNuevo);
			jQuery("#tdfactura_lote_detalleNuevoGuardarCambiosToolBar").css("display",factura_lote_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(factura_lote_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdfactura_lote_detalleActualizarToolBar").css("display",factura_lote_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_lote_detalleCopiar").css("display",factura_lote_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_lote_detalleCopiarToolBar").css("display",factura_lote_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_lote_detalleConEditar").css("display",factura_lote_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdfactura_lote_detalleEliminarToolBar").css("display",factura_lote_detalle_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdfactura_lote_detalleGuardarCambios").css("display",factura_lote_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdfactura_lote_detalleGuardarCambiosToolBar").css("display",factura_lote_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trfactura_lote_detalleElementos").css("display",factura_lote_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trfactura_lote_detalleAcciones").css("display",factura_lote_detalle_control.strVisibleTablaAcciones);
		jQuery("#trfactura_lote_detalleParametrosAcciones").css("display",factura_lote_detalle_control.strVisibleTablaAcciones);
			
		jQuery("#tdfactura_lote_detalleCerrarPagina").css("display",factura_lote_detalle_control.strPermisoPopup);		
		jQuery("#tdfactura_lote_detalleCerrarPaginaToolBar").css("display",factura_lote_detalle_control.strPermisoPopup);
		//jQuery("#trfactura_lote_detalleAccionesRelaciones").css("display",factura_lote_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		factura_lote_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		factura_lote_detalle_webcontrol1.registrarEventosControles();
		
		if(factura_lote_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(factura_lote_detalle_constante1.STR_ES_RELACIONADO=="false") {
			factura_lote_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(factura_lote_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(factura_lote_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_lote_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(factura_lote_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(factura_lote_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				factura_lote_detalle_webcontrol1.onLoad();
				
			} else {
				if(factura_lote_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
					if(factura_lote_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
						//factura_lote_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(factura_lote_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(factura_lote_detalle_constante1.BIG_ID_ACTUAL,"factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
						//factura_lote_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			factura_lote_detalle_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var factura_lote_detalle_webcontrol1=new factura_lote_detalle_webcontrol();

if(factura_lote_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = factura_lote_detalle_webcontrol1.onLoadWindow; 
}

//</script>