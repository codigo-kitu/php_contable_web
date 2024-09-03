//<script type="text/javascript" language="javascript">



//var asiento_automatico_detalleJQueryPaginaWebInteraccion= function (asiento_automatico_detalle_control) {
//this.,this.,this.

class asiento_automatico_detalle_webcontrol extends asiento_automatico_detalle_webcontrol_add {
	
	asiento_automatico_detalle_control=null;
	asiento_automatico_detalle_controlInicial=null;
	asiento_automatico_detalle_controlAuxiliar=null;
		
	//if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_automatico_detalle_control) {
		super();
		
		this.asiento_automatico_detalle_control=asiento_automatico_detalle_control;
	}
		
	actualizarVariablesPagina(asiento_automatico_detalle_control) {
		
		if(asiento_automatico_detalle_control.action=="index" || asiento_automatico_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_automatico_detalle_control);
			
		} else if(asiento_automatico_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(asiento_automatico_detalle_control);
			
		} else if(asiento_automatico_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(asiento_automatico_detalle_control);
			
		} else if(asiento_automatico_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_automatico_detalle_control);		
		
		} else if(asiento_automatico_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(asiento_automatico_detalle_control);		
		
		} else if(asiento_automatico_detalle_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_automatico_detalle_control);		
		
		} else if(asiento_automatico_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_automatico_detalle_control);		
		}
		else if(asiento_automatico_detalle_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_automatico_detalle_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(asiento_automatico_detalle_control.action + " Revisar Manejo");
			
			if(asiento_automatico_detalle_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(asiento_automatico_detalle_control);
				
				return;
			}
			
			//if(asiento_automatico_detalle_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(asiento_automatico_detalle_control);
			//}
			
			if(asiento_automatico_detalle_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(asiento_automatico_detalle_control);
			}
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_automatico_detalle_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(asiento_automatico_detalle_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(asiento_automatico_detalle_control, false);			
			}
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(asiento_automatico_detalle_control);	
			}
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
			}
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control);
			}
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);
			}
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(asiento_automatico_detalle_control);	
			}
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
			}
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
			}
			
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(asiento_automatico_detalle_control);			
			}
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(asiento_automatico_detalle_control);
			}
			
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_detalle_control);
			}
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(asiento_automatico_detalle_control);
			}				
			
			if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_automatico_detalle_control);
			}
			
			if(asiento_automatico_detalle_control.usuarioActual!=null && asiento_automatico_detalle_control.usuarioActual.field_strUserName!=null &&
			asiento_automatico_detalle_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(asiento_automatico_detalle_control);			
			}
		}
		
		
		if(asiento_automatico_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_automatico_detalle_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(asiento_automatico_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_automatico_detalle_control);
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control);
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_detalle_control);
		this.actualizarPaginaAreaBusquedas(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_automatico_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_automatico_detalle_control);
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control);
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_detalle_control);
		this.actualizarPaginaAreaBusquedas(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_automatico_detalle_control) {
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(asiento_automatico_detalle_control) {
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_automatico_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_automatico_detalle_control) {
		this.actualizarPaginaAbrirLink(asiento_automatico_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);				
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(asiento_automatico_detalle_control) {
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
		this.onLoadCombosDefectoFK(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
		this.onLoadCombosDefectoFK(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_automatico_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
		this.onLoadCombosDefectoFK(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_automatico_detalle_control) {
		this.actualizarPaginaAbrirLink(asiento_automatico_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_automatico_detalle_control) {
		this.actualizarPaginaImprimir(asiento_automatico_detalle_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_automatico_detalle_control) {
		this.actualizarPaginaImprimir(asiento_automatico_detalle_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_automatico_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_automatico_detalle_control) {
		//FORMULARIO
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
			this.actualizarPaginaFormularioAdd(asiento_automatico_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		//COMBOS FK
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(asiento_automatico_detalle_control) {
		//FORMULARIO
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);	
		//COMBOS FK
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_automatico_detalle_control) {
		//FORMULARIO
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_automatico_detalle_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_automatico_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);	
		//COMBOS FK
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control) {
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_automatico_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_automatico_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_automatico_detalle_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_automatico_detalle_control) {
		if(asiento_automatico_detalle_funcion1.esPaginaForm()==true) {
			window.opener.asiento_automatico_detalle_webcontrol1.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_automatico_detalle_control) {
		asiento_automatico_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_automatico_detalle_control.strAuxiliarUrlPagina);
				
		asiento_automatico_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_automatico_detalle_control.strAuxiliarTipo,asiento_automatico_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_automatico_detalle_control) {
		asiento_automatico_detalle_funcion1.resaltarRestaurarDivMensaje(true,asiento_automatico_detalle_control.strAuxiliarMensajeAlert,asiento_automatico_detalle_control.strAuxiliarCssMensaje);
			
		if(asiento_automatico_detalle_funcion1.esPaginaForm()==true) {
			window.opener.asiento_automatico_detalle_funcion1.resaltarRestaurarDivMensaje(true,asiento_automatico_detalle_control.strAuxiliarMensajeAlert,asiento_automatico_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(asiento_automatico_detalle_control) {
		eval(asiento_automatico_detalle_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(asiento_automatico_detalle_control, mostrar) {
		
		if(mostrar==true) {
			asiento_automatico_detalle_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_automatico_detalle_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			asiento_automatico_detalle_funcion1.mostrarDivMensaje(true,asiento_automatico_detalle_control.strAuxiliarMensaje,asiento_automatico_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_automatico_detalle_funcion1.mostrarDivMensaje(false,asiento_automatico_detalle_control.strAuxiliarMensaje,asiento_automatico_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(asiento_automatico_detalle_control) {
	
		funcionGeneral.printWebPartPage("asiento_automatico_detalle",asiento_automatico_detalle_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarasiento_automatico_detallesAjaxWebPart").html(asiento_automatico_detalle_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("asiento_automatico_detalle",jQuery("#divTablaDatosReporteAuxiliarasiento_automatico_detallesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(asiento_automatico_detalle_control) {
		this.asiento_automatico_detalle_controlInicial=asiento_automatico_detalle_control;
			
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_automatico_detalle_control.strStyleDivArbol,asiento_automatico_detalle_control.strStyleDivContent
																,asiento_automatico_detalle_control.strStyleDivOpcionesBanner,asiento_automatico_detalle_control.strStyleDivExpandirColapsar
																,asiento_automatico_detalle_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=asiento_automatico_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",asiento_automatico_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(asiento_automatico_detalle_control) {
		jQuery("#divTablaDatosasiento_automatico_detallesAjaxWebPart").html(asiento_automatico_detalle_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosasiento_automatico_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosasiento_automatico_detalles=jQuery("#tblTablaDatosasiento_automatico_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("asiento_automatico_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',asiento_automatico_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			asiento_automatico_detalle_webcontrol1.registrarControlesTableEdition(asiento_automatico_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		asiento_automatico_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(asiento_automatico_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(asiento_automatico_detalle_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control) {
		this.actualizarCssBotonesPagina(asiento_automatico_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_automatico_detalle_control.tiposReportes,asiento_automatico_detalle_control.tiposReporte
															 	,asiento_automatico_detalle_control.tiposPaginacion,asiento_automatico_detalle_control.tiposAcciones
																,asiento_automatico_detalle_control.tiposColumnasSelect,asiento_automatico_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_automatico_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_automatico_detalle_control);			
	}
	
	actualizarPaginaAreaBusquedas(asiento_automatico_detalle_control) {
		jQuery("#divBusquedaasiento_automatico_detalleAjaxWebPart").css("display",asiento_automatico_detalle_control.strPermisoBusqueda);
		jQuery("#trasiento_automatico_detalleCabeceraBusquedas").css("display",asiento_automatico_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(asiento_automatico_detalle_control.htmlTablaOrderBy!=null
			&& asiento_automatico_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByasiento_automatico_detalleAjaxWebPart").html(asiento_automatico_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//asiento_automatico_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(asiento_automatico_detalle_control.htmlTablaOrderByRel!=null
			&& asiento_automatico_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelasiento_automatico_detalleAjaxWebPart").html(asiento_automatico_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaasiento_automatico_detalleAjaxWebPart").css("display","none");
			jQuery("#trasiento_automatico_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaasiento_automatico_detalle").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control) {
		jQuery("#tdasiento_automatico_detalleNuevo").css("display",asiento_automatico_detalle_control.strPermisoNuevo);
		jQuery("#trasiento_automatico_detalleElementos").css("display",asiento_automatico_detalle_control.strVisibleTablaElementos);
		jQuery("#trasiento_automatico_detalleAcciones").css("display",asiento_automatico_detalle_control.strVisibleTablaAcciones);
		jQuery("#trasiento_automatico_detalleParametrosAcciones").css("display",asiento_automatico_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(asiento_automatico_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(asiento_automatico_detalle_control);
				
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(asiento_automatico_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(asiento_automatico_detalle_control);
	}
	
	actualizarPaginaUsuarioInvitado(asiento_automatico_detalle_control) {
	
		var indexPosition=asiento_automatico_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_automatico_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(asiento_automatico_detalle_control) {
		jQuery("#divResumenasiento_automatico_detalleActualAjaxWebPart").html(asiento_automatico_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_automatico_detalle_control) {
		jQuery("#divAccionesRelacionesasiento_automatico_detalleAjaxWebPart").html(asiento_automatico_detalle_control.htmlTablaAccionesRelaciones);
			
		asiento_automatico_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(asiento_automatico_detalle_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(asiento_automatico_detalle_control) {
		
		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idasiento_automatico);
			jQuery("#tblstrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idasiento_automatico);
		}

		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idcentro_costo);
			jQuery("#tblstrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idcentro_costo);
		}

		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idcuenta);
		}

		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionasiento_automatico_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("asiento_automatico_detalle",id,"contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		asiento_automatico_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico_detalle","empresa","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}

	abrirBusquedaParaasiento_automatico(strNombreCampoBusqueda){//idActual
		asiento_automatico_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico_detalle","asiento_automatico","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		asiento_automatico_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico_detalle","cuenta","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}

	abrirBusquedaParacentro_costo(strNombreCampoBusqueda){//idActual
		asiento_automatico_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico_detalle","centro_costo","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(asiento_automatico_detalle_control) {
	
		jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id);
		jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-version_row").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.versionRow);
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa>-1){
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico>-1){
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").select2("val", null);
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta>-1){
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").select2("val", null);
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo>-1){
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").select2("val", null);
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-es_credito").prop('checked',asiento_automatico_detalle_control.asiento_automatico_detalleActual.es_credito);
		jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-cuenta_contable").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.cuenta_contable);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+asiento_automatico_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("asiento_automatico_detalle","contabilidad","","form_asiento_automatico_detalle",formulario,"","",paraEventoTabla,idFilaTabla,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}
	
	cargarCombosFK(asiento_automatico_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.cargarCombosempresasFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_automatico",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.cargarCombosasiento_automaticosFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.cargarComboscuentasFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.cargarComboscentro_costosFK(asiento_automatico_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!=null && asiento_automatico_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_automatico_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_detalle_webcontrol1.cargarCombosempresasFK(asiento_automatico_detalle_control);
				}

				if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento_automatico",asiento_automatico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_detalle_webcontrol1.cargarCombosasiento_automaticosFK(asiento_automatico_detalle_control);
				}

				if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",asiento_automatico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_detalle_webcontrol1.cargarComboscuentasFK(asiento_automatico_detalle_control);
				}

				if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_detalle_webcontrol1.cargarComboscentro_costosFK(asiento_automatico_detalle_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(asiento_automatico_detalle_control) {
		jQuery("#spanstrMensajeid").text(asiento_automatico_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(asiento_automatico_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(asiento_automatico_detalle_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_asiento_automatico").text(asiento_automatico_detalle_control.strMensajeid_asiento_automatico);		
		jQuery("#spanstrMensajeid_cuenta").text(asiento_automatico_detalle_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajeid_centro_costo").text(asiento_automatico_detalle_control.strMensajeid_centro_costo);		
		jQuery("#spanstrMensajees_credito").text(asiento_automatico_detalle_control.strMensajees_credito);		
		jQuery("#spanstrMensajecuenta_contable").text(asiento_automatico_detalle_control.strMensajecuenta_contable);		
	}
	
	actualizarCssBotonesMantenimiento(asiento_automatico_detalle_control) {
		jQuery("#tdbtnNuevoasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(asiento_automatico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_control.empresasFK);
	}

	cargarComboEditarTablaasiento_automaticoFK(asiento_automatico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_control.asiento_automaticosFK);
	}

	cargarComboEditarTablacuentaFK(asiento_automatico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_control.cuentasFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_automatico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_control.centro_costosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(asiento_automatico_detalle_control) {
		var i=0;
		
		i=asiento_automatico_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.versionRow);
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico) {
				jQuery("#t-cel_"+i+"_3").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_4").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo) {
				jQuery("#t-cel_"+i+"_5").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").prop('checked',asiento_automatico_detalle_control.asiento_automatico_detalleActual.es_credito);
		jQuery("#t-cel_"+i+"_7").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.cuenta_contable);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(asiento_automatico_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(asiento_automatico_detalle_control) {
		asiento_automatico_detalle_funcion1.registrarControlesTableValidacionEdition(asiento_automatico_detalle_control,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalleConstante,strParametros);
		
		//asiento_automatico_detalle_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(asiento_automatico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa",asiento_automatico_detalle_control.empresasFK);

		if(asiento_automatico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_detalle_control.idFilaTablaActual+"_2",asiento_automatico_detalle_control.empresasFK);
		}
	};

	cargarCombosasiento_automaticosFK(asiento_automatico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico",asiento_automatico_detalle_control.asiento_automaticosFK);

		if(asiento_automatico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_detalle_control.idFilaTablaActual+"_3",asiento_automatico_detalle_control.asiento_automaticosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico-cmbid_asiento_automatico",asiento_automatico_detalle_control.asiento_automaticosFK);

	};

	cargarComboscuentasFK(asiento_automatico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta",asiento_automatico_detalle_control.cuentasFK);

		if(asiento_automatico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_detalle_control.idFilaTablaActual+"_4",asiento_automatico_detalle_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",asiento_automatico_detalle_control.cuentasFK);

	};

	cargarComboscentro_costosFK(asiento_automatico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo",asiento_automatico_detalle_control.centro_costosFK);

		if(asiento_automatico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_detalle_control.idFilaTablaActual+"_5",asiento_automatico_detalle_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_automatico_detalle_control.centro_costosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(asiento_automatico_detalle_control) {

	};

	registrarComboActionChangeCombosasiento_automaticosFK(asiento_automatico_detalle_control) {

	};

	registrarComboActionChangeComboscuentasFK(asiento_automatico_detalle_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_automatico_detalle_control) {

	};

	
	
	setDefectoValorCombosempresasFK(asiento_automatico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_detalle_control.idempresaDefaultFK>-1 && jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_automatico_detalle_control.idempresaDefaultFK) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val(asiento_automatico_detalle_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosasiento_automaticosFK(asiento_automatico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_detalle_control.idasiento_automaticoDefaultFK>-1 && jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val() != asiento_automatico_detalle_control.idasiento_automaticoDefaultFK) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val(asiento_automatico_detalle_control.idasiento_automaticoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico-cmbid_asiento_automatico").val(asiento_automatico_detalle_control.idasiento_automaticoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico-cmbid_asiento_automatico").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico-cmbid_asiento_automatico").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(asiento_automatico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_detalle_control.idcuentaDefaultFK>-1 && jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != asiento_automatico_detalle_control.idcuentaDefaultFK) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(asiento_automatico_detalle_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(asiento_automatico_detalle_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_automatico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_detalle_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_automatico_detalle_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_automatico_detalle_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_automatico_detalle_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_automatico_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_automatico_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.setDefectoValorCombosempresasFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_automatico",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.setDefectoValorCombosasiento_automaticosFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.setDefectoValorComboscuentasFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_automatico_detalle_control);
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
	onLoadCombosEventosFK(asiento_automatico_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_detalle_webcontrol1.registrarComboActionChangeCombosempresasFK(asiento_automatico_detalle_control);
			//}

			//if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_automatico",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_detalle_webcontrol1.registrarComboActionChangeCombosasiento_automaticosFK(asiento_automatico_detalle_control);
			//}

			//if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_detalle_webcontrol1.registrarComboActionChangeComboscuentasFK(asiento_automatico_detalle_control);
			//}

			//if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_detalle_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_automatico_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_automatico_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento_automatico_detalle");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento_automatico_detalle");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(asiento_automatico_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);			
			
			if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,"asiento_automatico_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				asiento_automatico_detalle_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento_automatico","id_asiento_automatico","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico_img_busqueda").click(function(){
				asiento_automatico_detalle_webcontrol1.abrirBusquedaParaasiento_automatico("id_asiento_automatico");
				//alert(jQuery('#form-id_asiento_automatico_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				asiento_automatico_detalle_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_automatico_detalle_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico_detalle","FK_Idasiento_automatico","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico_detalle","FK_Idcentro_costo","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico_detalle","FK_Idcuenta","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico_detalle","FK_Idempresa","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			asiento_automatico_detalle_funcion1.validarFormularioJQuery(asiento_automatico_detalle_constante1);
			
			if(asiento_automatico_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_automatico_detalle_control) {
		
		jQuery("#divBusquedaasiento_automatico_detalleAjaxWebPart").css("display",asiento_automatico_detalle_control.strPermisoBusqueda);
		jQuery("#trasiento_automatico_detalleCabeceraBusquedas").css("display",asiento_automatico_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosasiento_automatico_detalle").attr("style",asiento_automatico_detalle_control.strPermisoMostrarTodos);
		
		if(asiento_automatico_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdasiento_automatico_detalleNuevo").css("display",asiento_automatico_detalle_control.strPermisoNuevo);
			jQuery("#tdasiento_automatico_detalleNuevoToolBar").css("display",asiento_automatico_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdasiento_automatico_detalleDuplicar").css("display",asiento_automatico_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_automatico_detalleDuplicarToolBar").css("display",asiento_automatico_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_automatico_detalleNuevoGuardarCambios").css("display",asiento_automatico_detalle_control.strPermisoNuevo);
			jQuery("#tdasiento_automatico_detalleNuevoGuardarCambiosToolBar").css("display",asiento_automatico_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(asiento_automatico_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdasiento_automatico_detalleActualizarToolBar").css("display",asiento_automatico_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_automatico_detalleCopiar").css("display",asiento_automatico_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_automatico_detalleCopiarToolBar").css("display",asiento_automatico_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_automatico_detalleConEditar").css("display",asiento_automatico_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdasiento_automatico_detalleEliminarToolBar").css("display",asiento_automatico_detalle_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdasiento_automatico_detalleGuardarCambios").css("display",asiento_automatico_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdasiento_automatico_detalleGuardarCambiosToolBar").css("display",asiento_automatico_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trasiento_automatico_detalleElementos").css("display",asiento_automatico_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trasiento_automatico_detalleAcciones").css("display",asiento_automatico_detalle_control.strVisibleTablaAcciones);
		jQuery("#trasiento_automatico_detalleParametrosAcciones").css("display",asiento_automatico_detalle_control.strVisibleTablaAcciones);
			
		jQuery("#tdasiento_automatico_detalleCerrarPagina").css("display",asiento_automatico_detalle_control.strPermisoPopup);		
		jQuery("#tdasiento_automatico_detalleCerrarPaginaToolBar").css("display",asiento_automatico_detalle_control.strPermisoPopup);
		//jQuery("#trasiento_automatico_detalleAccionesRelaciones").css("display",asiento_automatico_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_automatico_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_automatico_detalle_webcontrol1.registrarEventosControles();
		
		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
			asiento_automatico_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_automatico_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_automatico_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_automatico_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(asiento_automatico_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				asiento_automatico_detalle_webcontrol1.onLoad();
				
			} else {
				if(asiento_automatico_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
					if(asiento_automatico_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
						//asiento_automatico_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(asiento_automatico_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(asiento_automatico_detalle_constante1.BIG_ID_ACTUAL,"asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
						//asiento_automatico_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			asiento_automatico_detalle_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var asiento_automatico_detalle_webcontrol1=new asiento_automatico_detalle_webcontrol();

if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_automatico_detalle_webcontrol1.onLoadWindow; 
}

//</script>