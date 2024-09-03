//<script type="text/javascript" language="javascript">



//var asiento_predefinido_detalleJQueryPaginaWebInteraccion= function (asiento_predefinido_detalle_control) {
//this.,this.,this.

class asiento_predefinido_detalle_webcontrol extends asiento_predefinido_detalle_webcontrol_add {
	
	asiento_predefinido_detalle_control=null;
	asiento_predefinido_detalle_controlInicial=null;
	asiento_predefinido_detalle_controlAuxiliar=null;
		
	//if(asiento_predefinido_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_predefinido_detalle_control) {
		super();
		
		this.asiento_predefinido_detalle_control=asiento_predefinido_detalle_control;
	}
		
	actualizarVariablesPagina(asiento_predefinido_detalle_control) {
		
		if(asiento_predefinido_detalle_control.action=="index" || asiento_predefinido_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_predefinido_detalle_control);
			
		} else if(asiento_predefinido_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(asiento_predefinido_detalle_control);
			
		} else if(asiento_predefinido_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(asiento_predefinido_detalle_control);
			
		} else if(asiento_predefinido_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_predefinido_detalle_control);
		
		} else if(asiento_predefinido_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_predefinido_detalle_control);		
		
		} else if(asiento_predefinido_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(asiento_predefinido_detalle_control);		
		
		} else if(asiento_predefinido_detalle_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_predefinido_detalle_control);		
		
		} else if(asiento_predefinido_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_predefinido_detalle_control);		
		}
		else if(asiento_predefinido_detalle_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_predefinido_detalle_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(asiento_predefinido_detalle_control.action + " Revisar Manejo");
			
			if(asiento_predefinido_detalle_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(asiento_predefinido_detalle_control);
				
				return;
			}
			
			//if(asiento_predefinido_detalle_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(asiento_predefinido_detalle_control);
			//}
			
			if(asiento_predefinido_detalle_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(asiento_predefinido_detalle_control);
			}
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_predefinido_detalle_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(asiento_predefinido_detalle_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(asiento_predefinido_detalle_control, false);			
			}
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(asiento_predefinido_detalle_control);	
			}
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);
			}
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(asiento_predefinido_detalle_control);
			}
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(asiento_predefinido_detalle_control);
			}
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(asiento_predefinido_detalle_control);	
			}
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
			}
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);
			}
			
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(asiento_predefinido_detalle_control);			
			}
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(asiento_predefinido_detalle_control);
			}
			
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(asiento_predefinido_detalle_control);
			}
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(asiento_predefinido_detalle_control);
			}				
			
			if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_predefinido_detalle_control);
			}
			
			if(asiento_predefinido_detalle_control.usuarioActual!=null && asiento_predefinido_detalle_control.usuarioActual.field_strUserName!=null &&
			asiento_predefinido_detalle_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(asiento_predefinido_detalle_control);			
			}
		}
		
		
		if(asiento_predefinido_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_predefinido_detalle_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(asiento_predefinido_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_predefinido_detalle_control);
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_detalle_control);
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_predefinido_detalle_control);
		this.actualizarPaginaAreaBusquedas(asiento_predefinido_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_predefinido_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_predefinido_detalle_control);
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_detalle_control);
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_predefinido_detalle_control);
		this.actualizarPaginaAreaBusquedas(asiento_predefinido_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_predefinido_detalle_control) {
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(asiento_predefinido_detalle_control) {
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_predefinido_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_detalle_control);
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_predefinido_detalle_control) {
		this.actualizarPaginaAbrirLink(asiento_predefinido_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);				
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(asiento_predefinido_detalle_control) {
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);
		this.onLoadCombosDefectoFK(asiento_predefinido_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);
		this.onLoadCombosDefectoFK(asiento_predefinido_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_predefinido_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_detalle_control);
		this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);
		this.onLoadCombosDefectoFK(asiento_predefinido_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_predefinido_detalle_control) {
		this.actualizarPaginaAbrirLink(asiento_predefinido_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(asiento_predefinido_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_predefinido_detalle_control) {
		this.actualizarPaginaImprimir(asiento_predefinido_detalle_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_predefinido_detalle_control) {
		this.actualizarPaginaImprimir(asiento_predefinido_detalle_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_predefinido_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_predefinido_detalle_control) {
		//FORMULARIO
		if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);
			this.actualizarPaginaFormularioAdd(asiento_predefinido_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);		
		//COMBOS FK
		if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_predefinido_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(asiento_predefinido_detalle_control) {
		//FORMULARIO
		if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);	
		//COMBOS FK
		if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_predefinido_detalle_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_predefinido_detalle_control) {
		//FORMULARIO
		if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_predefinido_detalle_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_predefinido_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control);	
		//COMBOS FK
		if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_predefinido_detalle_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_detalle_control) {
		if(asiento_predefinido_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_predefinido_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_predefinido_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_predefinido_detalle_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_detalle_control) {
		if(asiento_predefinido_detalle_funcion1.esPaginaForm()==true) {
			window.opener.asiento_predefinido_detalle_webcontrol1.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_predefinido_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_predefinido_detalle_control) {
		asiento_predefinido_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_predefinido_detalle_control.strAuxiliarUrlPagina);
				
		asiento_predefinido_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_predefinido_detalle_control.strAuxiliarTipo,asiento_predefinido_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_predefinido_detalle_control) {
		asiento_predefinido_detalle_funcion1.resaltarRestaurarDivMensaje(true,asiento_predefinido_detalle_control.strAuxiliarMensajeAlert,asiento_predefinido_detalle_control.strAuxiliarCssMensaje);
			
		if(asiento_predefinido_detalle_funcion1.esPaginaForm()==true) {
			window.opener.asiento_predefinido_detalle_funcion1.resaltarRestaurarDivMensaje(true,asiento_predefinido_detalle_control.strAuxiliarMensajeAlert,asiento_predefinido_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(asiento_predefinido_detalle_control) {
		eval(asiento_predefinido_detalle_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(asiento_predefinido_detalle_control, mostrar) {
		
		if(mostrar==true) {
			asiento_predefinido_detalle_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_predefinido_detalle_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			asiento_predefinido_detalle_funcion1.mostrarDivMensaje(true,asiento_predefinido_detalle_control.strAuxiliarMensaje,asiento_predefinido_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_predefinido_detalle_funcion1.mostrarDivMensaje(false,asiento_predefinido_detalle_control.strAuxiliarMensaje,asiento_predefinido_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(asiento_predefinido_detalle_control) {
	
		funcionGeneral.printWebPartPage("asiento_predefinido_detalle",asiento_predefinido_detalle_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarasiento_predefinido_detallesAjaxWebPart").html(asiento_predefinido_detalle_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("asiento_predefinido_detalle",jQuery("#divTablaDatosReporteAuxiliarasiento_predefinido_detallesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(asiento_predefinido_detalle_control) {
		this.asiento_predefinido_detalle_controlInicial=asiento_predefinido_detalle_control;
			
		if(asiento_predefinido_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_predefinido_detalle_control.strStyleDivArbol,asiento_predefinido_detalle_control.strStyleDivContent
																,asiento_predefinido_detalle_control.strStyleDivOpcionesBanner,asiento_predefinido_detalle_control.strStyleDivExpandirColapsar
																,asiento_predefinido_detalle_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=asiento_predefinido_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",asiento_predefinido_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(asiento_predefinido_detalle_control) {
		jQuery("#divTablaDatosasiento_predefinido_detallesAjaxWebPart").html(asiento_predefinido_detalle_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosasiento_predefinido_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(asiento_predefinido_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosasiento_predefinido_detalles=jQuery("#tblTablaDatosasiento_predefinido_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("asiento_predefinido_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',asiento_predefinido_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			asiento_predefinido_detalle_webcontrol1.registrarControlesTableEdition(asiento_predefinido_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		asiento_predefinido_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(asiento_predefinido_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(asiento_predefinido_detalle_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(asiento_predefinido_detalle_control) {
		this.actualizarCssBotonesPagina(asiento_predefinido_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_predefinido_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_predefinido_detalle_control.tiposReportes,asiento_predefinido_detalle_control.tiposReporte
															 	,asiento_predefinido_detalle_control.tiposPaginacion,asiento_predefinido_detalle_control.tiposAcciones
																,asiento_predefinido_detalle_control.tiposColumnasSelect,asiento_predefinido_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_predefinido_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_predefinido_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_predefinido_detalle_control);			
	}
	
	actualizarPaginaAreaBusquedas(asiento_predefinido_detalle_control) {
		jQuery("#divBusquedaasiento_predefinido_detalleAjaxWebPart").css("display",asiento_predefinido_detalle_control.strPermisoBusqueda);
		jQuery("#trasiento_predefinido_detalleCabeceraBusquedas").css("display",asiento_predefinido_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_predefinido_detalle").css("display",asiento_predefinido_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(asiento_predefinido_detalle_control.htmlTablaOrderBy!=null
			&& asiento_predefinido_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByasiento_predefinido_detalleAjaxWebPart").html(asiento_predefinido_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//asiento_predefinido_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(asiento_predefinido_detalle_control.htmlTablaOrderByRel!=null
			&& asiento_predefinido_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelasiento_predefinido_detalleAjaxWebPart").html(asiento_predefinido_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(asiento_predefinido_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaasiento_predefinido_detalleAjaxWebPart").css("display","none");
			jQuery("#trasiento_predefinido_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaasiento_predefinido_detalle").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(asiento_predefinido_detalle_control) {
		jQuery("#tdasiento_predefinido_detalleNuevo").css("display",asiento_predefinido_detalle_control.strPermisoNuevo);
		jQuery("#trasiento_predefinido_detalleElementos").css("display",asiento_predefinido_detalle_control.strVisibleTablaElementos);
		jQuery("#trasiento_predefinido_detalleAcciones").css("display",asiento_predefinido_detalle_control.strVisibleTablaAcciones);
		jQuery("#trasiento_predefinido_detalleParametrosAcciones").css("display",asiento_predefinido_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(asiento_predefinido_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(asiento_predefinido_detalle_control);
				
		if(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(asiento_predefinido_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(asiento_predefinido_detalle_control);
	}
	
	actualizarPaginaUsuarioInvitado(asiento_predefinido_detalle_control) {
	
		var indexPosition=asiento_predefinido_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_predefinido_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(asiento_predefinido_detalle_control) {
		jQuery("#divResumenasiento_predefinido_detalleActualAjaxWebPart").html(asiento_predefinido_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_predefinido_detalle_control) {
		jQuery("#divAccionesRelacionesasiento_predefinido_detalleAjaxWebPart").html(asiento_predefinido_detalle_control.htmlTablaAccionesRelaciones);
			
		asiento_predefinido_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(asiento_predefinido_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(asiento_predefinido_detalle_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(asiento_predefinido_detalle_control) {
		
		if(asiento_predefinido_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idasiento_predefinido").attr("style",asiento_predefinido_detalle_control.strVisibleFK_Idasiento_predefinido);
			jQuery("#tblstrVisible"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idasiento_predefinido").attr("style",asiento_predefinido_detalle_control.strVisibleFK_Idasiento_predefinido);
		}

		if(asiento_predefinido_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_predefinido_detalle_control.strVisibleFK_Idcentro_costo);
			jQuery("#tblstrVisible"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_predefinido_detalle_control.strVisibleFK_Idcentro_costo);
		}

		if(asiento_predefinido_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",asiento_predefinido_detalle_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",asiento_predefinido_detalle_control.strVisibleFK_Idcuenta);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionasiento_predefinido_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("asiento_predefinido_detalle",id,"contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);		
	}
	
	

	abrirBusquedaParaasiento_predefinido(strNombreCampoBusqueda){//idActual
		asiento_predefinido_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido_detalle","asiento_predefinido","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		asiento_predefinido_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido_detalle","cuenta","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
	}

	abrirBusquedaParacentro_costo(strNombreCampoBusqueda){//idActual
		asiento_predefinido_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido_detalle","centro_costo","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(asiento_predefinido_detalle_control) {
	
		jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id);
		jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-version_row").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.versionRow);
		
		if(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_asiento_predefinido!=null && asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_asiento_predefinido>-1){
			if(jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_asiento_predefinido").val() != asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_asiento_predefinido) {
				jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_asiento_predefinido").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_asiento_predefinido).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_asiento_predefinido").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_asiento_predefinido").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_asiento_predefinido").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_cuenta!=null && asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_cuenta>-1){
			if(jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_cuenta) {
				jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_cuenta").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_centro_costo!=null && asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_centro_costo>-1){
			if(jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_centro_costo) {
				jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_centro_costo").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-orden").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.orden);
		jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-cuenta_contable").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.cuenta_contable);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+asiento_predefinido_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("asiento_predefinido_detalle","contabilidad","","form_asiento_predefinido_detalle",formulario,"","",paraEventoTabla,idFilaTabla,asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
	}
	
	cargarCombosFK(asiento_predefinido_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_predefinido_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_predefinido",asiento_predefinido_detalle_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_detalle_webcontrol1.cargarCombosasiento_predefinidosFK(asiento_predefinido_detalle_control);
			}

			if(asiento_predefinido_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_predefinido_detalle_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_detalle_webcontrol1.cargarComboscuentasFK(asiento_predefinido_detalle_control);
			}

			if(asiento_predefinido_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_detalle_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_detalle_webcontrol1.cargarComboscentro_costosFK(asiento_predefinido_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_predefinido_detalle_control.strRecargarFkTiposNinguno!=null && asiento_predefinido_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_predefinido_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_predefinido_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento_predefinido",asiento_predefinido_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_detalle_webcontrol1.cargarCombosasiento_predefinidosFK(asiento_predefinido_detalle_control);
				}

				if(asiento_predefinido_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",asiento_predefinido_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_detalle_webcontrol1.cargarComboscuentasFK(asiento_predefinido_detalle_control);
				}

				if(asiento_predefinido_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_detalle_webcontrol1.cargarComboscentro_costosFK(asiento_predefinido_detalle_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(asiento_predefinido_detalle_control) {
		jQuery("#spanstrMensajeid").text(asiento_predefinido_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(asiento_predefinido_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_asiento_predefinido").text(asiento_predefinido_detalle_control.strMensajeid_asiento_predefinido);		
		jQuery("#spanstrMensajeid_cuenta").text(asiento_predefinido_detalle_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajeid_centro_costo").text(asiento_predefinido_detalle_control.strMensajeid_centro_costo);		
		jQuery("#spanstrMensajeorden").text(asiento_predefinido_detalle_control.strMensajeorden);		
		jQuery("#spanstrMensajecuenta_contable").text(asiento_predefinido_detalle_control.strMensajecuenta_contable);		
	}
	
	actualizarCssBotonesMantenimiento(asiento_predefinido_detalle_control) {
		jQuery("#tdbtnNuevoasiento_predefinido_detalle").css("visibility",asiento_predefinido_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoasiento_predefinido_detalle").css("display",asiento_predefinido_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarasiento_predefinido_detalle").css("visibility",asiento_predefinido_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarasiento_predefinido_detalle").css("display",asiento_predefinido_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarasiento_predefinido_detalle").css("visibility",asiento_predefinido_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarasiento_predefinido_detalle").css("display",asiento_predefinido_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarasiento_predefinido_detalle").css("visibility",asiento_predefinido_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosasiento_predefinido_detalle").css("visibility",asiento_predefinido_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosasiento_predefinido_detalle").css("display",asiento_predefinido_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarasiento_predefinido_detalle").css("visibility",asiento_predefinido_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarasiento_predefinido_detalle").css("visibility",asiento_predefinido_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarasiento_predefinido_detalle").css("visibility",asiento_predefinido_detalle_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaasiento_predefinidoFK(asiento_predefinido_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_control.asiento_predefinidosFK);
	}

	cargarComboEditarTablacuentaFK(asiento_predefinido_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_control.cuentasFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_predefinido_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_control.centro_costosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(asiento_predefinido_detalle_control) {
		var i=0;
		
		i=asiento_predefinido_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.versionRow);
		
		if(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_asiento_predefinido!=null && asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_asiento_predefinido>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_asiento_predefinido) {
				jQuery("#t-cel_"+i+"_2").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_asiento_predefinido).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_cuenta!=null && asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_3").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_centro_costo!=null && asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_centro_costo>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_centro_costo) {
				jQuery("#t-cel_"+i+"_4").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.orden);
		jQuery("#t-cel_"+i+"_6").val(asiento_predefinido_detalle_control.asiento_predefinido_detalleActual.cuenta_contable);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(asiento_predefinido_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(asiento_predefinido_detalle_control) {
		asiento_predefinido_detalle_funcion1.registrarControlesTableValidacionEdition(asiento_predefinido_detalle_control,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalleConstante,strParametros);
		
		//asiento_predefinido_detalle_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosasiento_predefinidosFK(asiento_predefinido_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_asiento_predefinido",asiento_predefinido_detalle_control.asiento_predefinidosFK);

		if(asiento_predefinido_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_detalle_control.idFilaTablaActual+"_2",asiento_predefinido_detalle_control.asiento_predefinidosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idasiento_predefinido-cmbid_asiento_predefinido",asiento_predefinido_detalle_control.asiento_predefinidosFK);

	};

	cargarComboscuentasFK(asiento_predefinido_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_cuenta",asiento_predefinido_detalle_control.cuentasFK);

		if(asiento_predefinido_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_detalle_control.idFilaTablaActual+"_3",asiento_predefinido_detalle_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",asiento_predefinido_detalle_control.cuentasFK);

	};

	cargarComboscentro_costosFK(asiento_predefinido_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_centro_costo",asiento_predefinido_detalle_control.centro_costosFK);

		if(asiento_predefinido_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_detalle_control.idFilaTablaActual+"_4",asiento_predefinido_detalle_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_predefinido_detalle_control.centro_costosFK);

	};

	
	
	registrarComboActionChangeCombosasiento_predefinidosFK(asiento_predefinido_detalle_control) {

	};

	registrarComboActionChangeComboscuentasFK(asiento_predefinido_detalle_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_predefinido_detalle_control) {

	};

	
	
	setDefectoValorCombosasiento_predefinidosFK(asiento_predefinido_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_detalle_control.idasiento_predefinidoDefaultFK>-1 && jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_asiento_predefinido").val() != asiento_predefinido_detalle_control.idasiento_predefinidoDefaultFK) {
				jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_asiento_predefinido").val(asiento_predefinido_detalle_control.idasiento_predefinidoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idasiento_predefinido-cmbid_asiento_predefinido").val(asiento_predefinido_detalle_control.idasiento_predefinidoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idasiento_predefinido-cmbid_asiento_predefinido").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idasiento_predefinido-cmbid_asiento_predefinido").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(asiento_predefinido_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_detalle_control.idcuentaDefaultFK>-1 && jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != asiento_predefinido_detalle_control.idcuentaDefaultFK) {
				jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(asiento_predefinido_detalle_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(asiento_predefinido_detalle_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_predefinido_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_detalle_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_predefinido_detalle_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_predefinido_detalle_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_predefinido_detalle_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_predefinido_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_predefinido_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_predefinido_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_predefinido_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_predefinido",asiento_predefinido_detalle_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_detalle_webcontrol1.setDefectoValorCombosasiento_predefinidosFK(asiento_predefinido_detalle_control);
			}

			if(asiento_predefinido_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_predefinido_detalle_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_detalle_webcontrol1.setDefectoValorComboscuentasFK(asiento_predefinido_detalle_control);
			}

			if(asiento_predefinido_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_detalle_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_detalle_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_predefinido_detalle_control);
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
	onLoadCombosEventosFK(asiento_predefinido_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_predefinido_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_predefinido_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_predefinido",asiento_predefinido_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_detalle_webcontrol1.registrarComboActionChangeCombosasiento_predefinidosFK(asiento_predefinido_detalle_control);
			//}

			//if(asiento_predefinido_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_predefinido_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_detalle_webcontrol1.registrarComboActionChangeComboscuentasFK(asiento_predefinido_detalle_control);
			//}

			//if(asiento_predefinido_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_detalle_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_predefinido_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_predefinido_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_predefinido_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_predefinido_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento_predefinido_detalle");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento_predefinido_detalle");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(asiento_predefinido_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);			
			
			if(asiento_predefinido_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,"asiento_predefinido_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento_predefinido","id_asiento_predefinido","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_asiento_predefinido_img_busqueda").click(function(){
				asiento_predefinido_detalle_webcontrol1.abrirBusquedaParaasiento_predefinido("id_asiento_predefinido");
				//alert(jQuery('#form-id_asiento_predefinido_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				asiento_predefinido_detalle_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_detalle_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_predefinido_detalle_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido_detalle","FK_Idasiento_predefinido","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido_detalle","FK_Idcentro_costo","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido_detalle","FK_Idcuenta","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			asiento_predefinido_detalle_funcion1.validarFormularioJQuery(asiento_predefinido_detalle_constante1);
			
			if(asiento_predefinido_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_predefinido_detalle_control) {
		
		jQuery("#divBusquedaasiento_predefinido_detalleAjaxWebPart").css("display",asiento_predefinido_detalle_control.strPermisoBusqueda);
		jQuery("#trasiento_predefinido_detalleCabeceraBusquedas").css("display",asiento_predefinido_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_predefinido_detalle").css("display",asiento_predefinido_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteasiento_predefinido_detalle").css("display",asiento_predefinido_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosasiento_predefinido_detalle").attr("style",asiento_predefinido_detalle_control.strPermisoMostrarTodos);
		
		if(asiento_predefinido_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdasiento_predefinido_detalleNuevo").css("display",asiento_predefinido_detalle_control.strPermisoNuevo);
			jQuery("#tdasiento_predefinido_detalleNuevoToolBar").css("display",asiento_predefinido_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdasiento_predefinido_detalleDuplicar").css("display",asiento_predefinido_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_predefinido_detalleDuplicarToolBar").css("display",asiento_predefinido_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_predefinido_detalleNuevoGuardarCambios").css("display",asiento_predefinido_detalle_control.strPermisoNuevo);
			jQuery("#tdasiento_predefinido_detalleNuevoGuardarCambiosToolBar").css("display",asiento_predefinido_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(asiento_predefinido_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdasiento_predefinido_detalleActualizarToolBar").css("display",asiento_predefinido_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_predefinido_detalleCopiar").css("display",asiento_predefinido_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_predefinido_detalleCopiarToolBar").css("display",asiento_predefinido_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_predefinido_detalleConEditar").css("display",asiento_predefinido_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdasiento_predefinido_detalleEliminarToolBar").css("display",asiento_predefinido_detalle_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdasiento_predefinido_detalleGuardarCambios").css("display",asiento_predefinido_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdasiento_predefinido_detalleGuardarCambiosToolBar").css("display",asiento_predefinido_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trasiento_predefinido_detalleElementos").css("display",asiento_predefinido_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trasiento_predefinido_detalleAcciones").css("display",asiento_predefinido_detalle_control.strVisibleTablaAcciones);
		jQuery("#trasiento_predefinido_detalleParametrosAcciones").css("display",asiento_predefinido_detalle_control.strVisibleTablaAcciones);
			
		jQuery("#tdasiento_predefinido_detalleCerrarPagina").css("display",asiento_predefinido_detalle_control.strPermisoPopup);		
		jQuery("#tdasiento_predefinido_detalleCerrarPaginaToolBar").css("display",asiento_predefinido_detalle_control.strPermisoPopup);
		//jQuery("#trasiento_predefinido_detalleAccionesRelaciones").css("display",asiento_predefinido_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_predefinido_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_predefinido_detalle_webcontrol1.registrarEventosControles();
		
		if(asiento_predefinido_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_predefinido_detalle_constante1.STR_ES_RELACIONADO=="false") {
			asiento_predefinido_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_predefinido_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_predefinido_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_predefinido_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_predefinido_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(asiento_predefinido_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				asiento_predefinido_detalle_webcontrol1.onLoad();
				
			} else {
				if(asiento_predefinido_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
					if(asiento_predefinido_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
						//asiento_predefinido_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(asiento_predefinido_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(asiento_predefinido_detalle_constante1.BIG_ID_ACTUAL,"asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);
						//asiento_predefinido_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			asiento_predefinido_detalle_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento_predefinido_detalle","contabilidad","",asiento_predefinido_detalle_funcion1,asiento_predefinido_detalle_webcontrol1,asiento_predefinido_detalle_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var asiento_predefinido_detalle_webcontrol1=new asiento_predefinido_detalle_webcontrol();

if(asiento_predefinido_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_predefinido_detalle_webcontrol1.onLoadWindow; 
}

//</script>