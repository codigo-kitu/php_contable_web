//<script type="text/javascript" language="javascript">



//var asiento_predefinidoJQueryPaginaWebInteraccion= function (asiento_predefinido_control) {
//this.,this.,this.

class asiento_predefinido_webcontrol extends asiento_predefinido_webcontrol_add {
	
	asiento_predefinido_control=null;
	asiento_predefinido_controlInicial=null;
	asiento_predefinido_controlAuxiliar=null;
		
	//if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_predefinido_control) {
		super();
		
		this.asiento_predefinido_control=asiento_predefinido_control;
	}
		
	actualizarVariablesPagina(asiento_predefinido_control) {
		
		if(asiento_predefinido_control.action=="index" || asiento_predefinido_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_predefinido_control);
			
		} else if(asiento_predefinido_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(asiento_predefinido_control);
			
		} else if(asiento_predefinido_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(asiento_predefinido_control);
			
		} else if(asiento_predefinido_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_predefinido_control);		
		
		} else if(asiento_predefinido_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(asiento_predefinido_control);		
		
		} else if(asiento_predefinido_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_predefinido_control);		
		
		} else if(asiento_predefinido_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_predefinido_control);		
		}
		else if(asiento_predefinido_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_predefinido_control);		
		}
		else if(asiento_predefinido_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_predefinido_control);		
		}
		else if(asiento_predefinido_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_predefinido_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(asiento_predefinido_control.action + " Revisar Manejo");
			
			if(asiento_predefinido_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(asiento_predefinido_control);
				
				return;
			}
			
			//if(asiento_predefinido_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(asiento_predefinido_control);
			//}
			
			if(asiento_predefinido_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(asiento_predefinido_control);
			}
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_predefinido_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(asiento_predefinido_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(asiento_predefinido_control, false);			
			}
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(asiento_predefinido_control);	
			}
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(asiento_predefinido_control);
			}
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(asiento_predefinido_control);
			}
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);
			}
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(asiento_predefinido_control);	
			}
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
			}
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(asiento_predefinido_control);
			}
			
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(asiento_predefinido_control);			
			}
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(asiento_predefinido_control);
			}
			
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(asiento_predefinido_control);
			}
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(asiento_predefinido_control);
			}				
			
			if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_predefinido_control);
			}
			
			if(asiento_predefinido_control.usuarioActual!=null && asiento_predefinido_control.usuarioActual.field_strUserName!=null &&
			asiento_predefinido_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(asiento_predefinido_control);			
			}
		}
		
		
		if(asiento_predefinido_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_predefinido_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(asiento_predefinido_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_predefinido_control);
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_control);
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_predefinido_control);
		this.actualizarPaginaAreaBusquedas(asiento_predefinido_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_predefinido_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_predefinido_control);
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_control);
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_predefinido_control);
		this.actualizarPaginaAreaBusquedas(asiento_predefinido_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_predefinido_control) {
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(asiento_predefinido_control) {
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_predefinido_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_predefinido_control) {
		this.actualizarPaginaAbrirLink(asiento_predefinido_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);				
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		this.actualizarPaginaFormulario(asiento_predefinido_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		this.actualizarPaginaFormulario(asiento_predefinido_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(asiento_predefinido_control) {
		this.actualizarPaginaFormulario(asiento_predefinido_control);
		this.onLoadCombosDefectoFK(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		this.actualizarPaginaFormulario(asiento_predefinido_control);
		this.onLoadCombosDefectoFK(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_predefinido_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);
		this.actualizarPaginaFormulario(asiento_predefinido_control);
		this.onLoadCombosDefectoFK(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_predefinido_control) {
		this.actualizarPaginaAbrirLink(asiento_predefinido_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_predefinido_control) {
		this.actualizarPaginaImprimir(asiento_predefinido_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_predefinido_control) {
		this.actualizarPaginaImprimir(asiento_predefinido_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_predefinido_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_predefinido_control) {
		//FORMULARIO
		if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_predefinido_control);
			this.actualizarPaginaFormularioAdd(asiento_predefinido_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		//COMBOS FK
		if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(asiento_predefinido_control) {
		//FORMULARIO
		if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_predefinido_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);	
		//COMBOS FK
		if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		this.actualizarPaginaFormulario(asiento_predefinido_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_predefinido_control) {
		//FORMULARIO
		if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_predefinido_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_predefinido_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);	
		//COMBOS FK
		if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_predefinido_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_predefinido_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control) {
		if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_predefinido_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_predefinido_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_predefinido_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_control) {
		if(asiento_predefinido_funcion1.esPaginaForm()==true) {
			window.opener.asiento_predefinido_webcontrol1.actualizarPaginaTablaDatos(asiento_predefinido_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_predefinido_control) {
		asiento_predefinido_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_predefinido_control.strAuxiliarUrlPagina);
				
		asiento_predefinido_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_predefinido_control.strAuxiliarTipo,asiento_predefinido_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_predefinido_control) {
		asiento_predefinido_funcion1.resaltarRestaurarDivMensaje(true,asiento_predefinido_control.strAuxiliarMensajeAlert,asiento_predefinido_control.strAuxiliarCssMensaje);
			
		if(asiento_predefinido_funcion1.esPaginaForm()==true) {
			window.opener.asiento_predefinido_funcion1.resaltarRestaurarDivMensaje(true,asiento_predefinido_control.strAuxiliarMensajeAlert,asiento_predefinido_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(asiento_predefinido_control) {
		eval(asiento_predefinido_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(asiento_predefinido_control, mostrar) {
		
		if(mostrar==true) {
			asiento_predefinido_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_predefinido_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			asiento_predefinido_funcion1.mostrarDivMensaje(true,asiento_predefinido_control.strAuxiliarMensaje,asiento_predefinido_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_predefinido_funcion1.mostrarDivMensaje(false,asiento_predefinido_control.strAuxiliarMensaje,asiento_predefinido_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(asiento_predefinido_control) {
	
		funcionGeneral.printWebPartPage("asiento_predefinido",asiento_predefinido_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarasiento_predefinidosAjaxWebPart").html(asiento_predefinido_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("asiento_predefinido",jQuery("#divTablaDatosReporteAuxiliarasiento_predefinidosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(asiento_predefinido_control) {
		this.asiento_predefinido_controlInicial=asiento_predefinido_control;
			
		if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_predefinido_control.strStyleDivArbol,asiento_predefinido_control.strStyleDivContent
																,asiento_predefinido_control.strStyleDivOpcionesBanner,asiento_predefinido_control.strStyleDivExpandirColapsar
																,asiento_predefinido_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=asiento_predefinido_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",asiento_predefinido_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(asiento_predefinido_control) {
		jQuery("#divTablaDatosasiento_predefinidosAjaxWebPart").html(asiento_predefinido_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosasiento_predefinidos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosasiento_predefinidos=jQuery("#tblTablaDatosasiento_predefinidos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("asiento_predefinido",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',asiento_predefinido_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			asiento_predefinido_webcontrol1.registrarControlesTableEdition(asiento_predefinido_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		asiento_predefinido_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(asiento_predefinido_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(asiento_predefinido_control.asiento_predefinidoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(asiento_predefinido_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(asiento_predefinido_control) {
		this.actualizarCssBotonesPagina(asiento_predefinido_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_predefinido_control.tiposReportes,asiento_predefinido_control.tiposReporte
															 	,asiento_predefinido_control.tiposPaginacion,asiento_predefinido_control.tiposAcciones
																,asiento_predefinido_control.tiposColumnasSelect,asiento_predefinido_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(asiento_predefinido_control.tiposRelaciones,asiento_predefinido_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_predefinido_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_predefinido_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_predefinido_control);			
	}
	
	actualizarPaginaAreaBusquedas(asiento_predefinido_control) {
		jQuery("#divBusquedaasiento_predefinidoAjaxWebPart").css("display",asiento_predefinido_control.strPermisoBusqueda);
		jQuery("#trasiento_predefinidoCabeceraBusquedas").css("display",asiento_predefinido_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_predefinido").css("display",asiento_predefinido_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(asiento_predefinido_control.htmlTablaOrderBy!=null
			&& asiento_predefinido_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByasiento_predefinidoAjaxWebPart").html(asiento_predefinido_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//asiento_predefinido_webcontrol1.registrarOrderByActions();
			
		}
			
		if(asiento_predefinido_control.htmlTablaOrderByRel!=null
			&& asiento_predefinido_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelasiento_predefinidoAjaxWebPart").html(asiento_predefinido_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaasiento_predefinidoAjaxWebPart").css("display","none");
			jQuery("#trasiento_predefinidoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaasiento_predefinido").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(asiento_predefinido_control) {
		jQuery("#tdasiento_predefinidoNuevo").css("display",asiento_predefinido_control.strPermisoNuevo);
		jQuery("#trasiento_predefinidoElementos").css("display",asiento_predefinido_control.strVisibleTablaElementos);
		jQuery("#trasiento_predefinidoAcciones").css("display",asiento_predefinido_control.strVisibleTablaAcciones);
		jQuery("#trasiento_predefinidoParametrosAcciones").css("display",asiento_predefinido_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(asiento_predefinido_control) {
	
		this.actualizarCssBotonesMantenimiento(asiento_predefinido_control);
				
		if(asiento_predefinido_control.asiento_predefinidoActual!=null) {//form
			
			this.actualizarCamposFormulario(asiento_predefinido_control);			
		}
						
		this.actualizarSpanMensajesCampos(asiento_predefinido_control);
	}
	
	actualizarPaginaUsuarioInvitado(asiento_predefinido_control) {
	
		var indexPosition=asiento_predefinido_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_predefinido_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(asiento_predefinido_control) {
		jQuery("#divResumenasiento_predefinidoActualAjaxWebPart").html(asiento_predefinido_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_predefinido_control) {
		jQuery("#divAccionesRelacionesasiento_predefinidoAjaxWebPart").html(asiento_predefinido_control.htmlTablaAccionesRelaciones);
			
		asiento_predefinido_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(asiento_predefinido_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(asiento_predefinido_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(asiento_predefinido_control) {
		
		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_predefinido_control.strVisibleFK_Idcentro_costo);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_predefinido_control.strVisibleFK_Idcentro_costo);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable").attr("style",asiento_predefinido_control.strVisibleFK_Iddocumento_contable);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable").attr("style",asiento_predefinido_control.strVisibleFK_Iddocumento_contable);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",asiento_predefinido_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",asiento_predefinido_control.strVisibleFK_Idejercicio);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_predefinido_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_predefinido_control.strVisibleFK_Idempresa);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente").attr("style",asiento_predefinido_control.strVisibleFK_Idfuente);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente").attr("style",asiento_predefinido_control.strVisibleFK_Idfuente);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",asiento_predefinido_control.strVisibleFK_Idlibro_auxiliar);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",asiento_predefinido_control.strVisibleFK_Idlibro_auxiliar);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",asiento_predefinido_control.strVisibleFK_Idmodulo);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",asiento_predefinido_control.strVisibleFK_Idmodulo);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",asiento_predefinido_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",asiento_predefinido_control.strVisibleFK_Idperiodo);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",asiento_predefinido_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",asiento_predefinido_control.strVisibleFK_Idsucursal);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",asiento_predefinido_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",asiento_predefinido_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionasiento_predefinido();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("asiento_predefinido",id,"contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","empresa","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","sucursal","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","ejercicio","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","periodo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","usuario","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParamodulo(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","modulo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParafuente(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","fuente","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParalibro_auxiliar(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","libro_auxiliar","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParacentro_costo(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","centro_costo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParadocumento_contable(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","documento_contable","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(asiento_predefinido_control) {
	
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id").val(asiento_predefinido_control.asiento_predefinidoActual.id);
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-version_row").val(asiento_predefinido_control.asiento_predefinidoActual.versionRow);
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_empresa!=null && asiento_predefinido_control.asiento_predefinidoActual.id_empresa>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_predefinido_control.asiento_predefinidoActual.id_empresa) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val(asiento_predefinido_control.asiento_predefinidoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_sucursal!=null && asiento_predefinido_control.asiento_predefinidoActual.id_sucursal>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val() != asiento_predefinido_control.asiento_predefinidoActual.id_sucursal) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val(asiento_predefinido_control.asiento_predefinidoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio!=null && asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val() != asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val(asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_periodo!=null && asiento_predefinido_control.asiento_predefinidoActual.id_periodo>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val() != asiento_predefinido_control.asiento_predefinidoActual.id_periodo) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val(asiento_predefinido_control.asiento_predefinidoActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_usuario!=null && asiento_predefinido_control.asiento_predefinidoActual.id_usuario>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val() != asiento_predefinido_control.asiento_predefinidoActual.id_usuario) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val(asiento_predefinido_control.asiento_predefinidoActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_modulo!=null && asiento_predefinido_control.asiento_predefinidoActual.id_modulo>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val() != asiento_predefinido_control.asiento_predefinidoActual.id_modulo) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val(asiento_predefinido_control.asiento_predefinidoActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-codigo").val(asiento_predefinido_control.asiento_predefinidoActual.codigo);
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-nombre").val(asiento_predefinido_control.asiento_predefinidoActual.nombre);
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_fuente!=null && asiento_predefinido_control.asiento_predefinidoActual.id_fuente>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val() != asiento_predefinido_control.asiento_predefinidoActual.id_fuente) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val(asiento_predefinido_control.asiento_predefinidoActual.id_fuente).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar!=null && asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo!=null && asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable!=null && asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val() != asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val(asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-descripcion").val(asiento_predefinido_control.asiento_predefinidoActual.descripcion);
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-nro_nit").val(asiento_predefinido_control.asiento_predefinidoActual.nro_nit);
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-referencia").val(asiento_predefinido_control.asiento_predefinidoActual.referencia);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+asiento_predefinido_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("asiento_predefinido","contabilidad","","form_asiento_predefinido",formulario,"","",paraEventoTabla,idFilaTabla,asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}
	
	cargarCombosFK(asiento_predefinido_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosempresasFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombossucursalsFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosejerciciosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosperiodosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosusuariosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosmodulosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosfuentesFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarComboscentro_costosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosdocumento_contablesFK(asiento_predefinido_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_predefinido_control.strRecargarFkTiposNinguno!=null && asiento_predefinido_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_predefinido_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosempresasFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombossucursalsFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosejerciciosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosperiodosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosusuariosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosmodulosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_fuente",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosfuentesFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarComboscentro_costosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosdocumento_contablesFK(asiento_predefinido_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(asiento_predefinido_control) {
		jQuery("#spanstrMensajeid").text(asiento_predefinido_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(asiento_predefinido_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(asiento_predefinido_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(asiento_predefinido_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(asiento_predefinido_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(asiento_predefinido_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(asiento_predefinido_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_modulo").text(asiento_predefinido_control.strMensajeid_modulo);		
		jQuery("#spanstrMensajecodigo").text(asiento_predefinido_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(asiento_predefinido_control.strMensajenombre);		
		jQuery("#spanstrMensajeid_fuente").text(asiento_predefinido_control.strMensajeid_fuente);		
		jQuery("#spanstrMensajeid_libro_auxiliar").text(asiento_predefinido_control.strMensajeid_libro_auxiliar);		
		jQuery("#spanstrMensajeid_centro_costo").text(asiento_predefinido_control.strMensajeid_centro_costo);		
		jQuery("#spanstrMensajeid_documento_contable").text(asiento_predefinido_control.strMensajeid_documento_contable);		
		jQuery("#spanstrMensajedescripcion").text(asiento_predefinido_control.strMensajedescripcion);		
		jQuery("#spanstrMensajenro_nit").text(asiento_predefinido_control.strMensajenro_nit);		
		jQuery("#spanstrMensajereferencia").text(asiento_predefinido_control.strMensajereferencia);		
	}
	
	actualizarCssBotonesMantenimiento(asiento_predefinido_control) {
		jQuery("#tdbtnNuevoasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoasiento_predefinido").css("display",asiento_predefinido_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarasiento_predefinido").css("display",asiento_predefinido_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarasiento_predefinido").css("display",asiento_predefinido_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosasiento_predefinido").css("display",asiento_predefinido_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionasiento").click(function(){

			var idActual=jQuery(this).attr("idactualasiento_predefinido");

			asiento_predefinido_webcontrol1.registrarSesionParaasientos(idActual);
		});
		jQuery("#imgdivrelacionasiento_predefinido_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualasiento_predefinido");

			asiento_predefinido_webcontrol1.registrarSesionParaasiento_predefinido_detalles(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.usuariosFK);
	}

	cargarComboEditarTablamoduloFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.modulosFK);
	}

	cargarComboEditarTablafuenteFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.fuentesFK);
	}

	cargarComboEditarTablalibro_auxiliarFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.libro_auxiliarsFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.centro_costosFK);
	}

	cargarComboEditarTabladocumento_contableFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.documento_contablesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(asiento_predefinido_control) {
		var i=0;
		
		i=asiento_predefinido_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(asiento_predefinido_control.asiento_predefinidoActual.id);
		jQuery("#t-version_row_"+i+"").val(asiento_predefinido_control.asiento_predefinidoActual.versionRow);
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_empresa!=null && asiento_predefinido_control.asiento_predefinidoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != asiento_predefinido_control.asiento_predefinidoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(asiento_predefinido_control.asiento_predefinidoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_sucursal!=null && asiento_predefinido_control.asiento_predefinidoActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != asiento_predefinido_control.asiento_predefinidoActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(asiento_predefinido_control.asiento_predefinidoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio!=null && asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_periodo!=null && asiento_predefinido_control.asiento_predefinidoActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != asiento_predefinido_control.asiento_predefinidoActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(asiento_predefinido_control.asiento_predefinidoActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_usuario!=null && asiento_predefinido_control.asiento_predefinidoActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != asiento_predefinido_control.asiento_predefinidoActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(asiento_predefinido_control.asiento_predefinidoActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_modulo!=null && asiento_predefinido_control.asiento_predefinidoActual.id_modulo>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != asiento_predefinido_control.asiento_predefinidoActual.id_modulo) {
				jQuery("#t-cel_"+i+"_7").val(asiento_predefinido_control.asiento_predefinidoActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(asiento_predefinido_control.asiento_predefinidoActual.codigo);
		jQuery("#t-cel_"+i+"_9").val(asiento_predefinido_control.asiento_predefinidoActual.nombre);
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_fuente!=null && asiento_predefinido_control.asiento_predefinidoActual.id_fuente>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != asiento_predefinido_control.asiento_predefinidoActual.id_fuente) {
				jQuery("#t-cel_"+i+"_10").val(asiento_predefinido_control.asiento_predefinidoActual.id_fuente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_10").select2("val", null);
			if(jQuery("#t-cel_"+i+"_10").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar!=null && asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar>-1){
			if(jQuery("#t-cel_"+i+"_11").val() != asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar) {
				jQuery("#t-cel_"+i+"_11").val(asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_11").select2("val", null);
			if(jQuery("#t-cel_"+i+"_11").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_11").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo!=null && asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo) {
				jQuery("#t-cel_"+i+"_12").val(asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable!=null && asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable) {
				jQuery("#t-cel_"+i+"_13").val(asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(asiento_predefinido_control.asiento_predefinidoActual.descripcion);
		jQuery("#t-cel_"+i+"_15").val(asiento_predefinido_control.asiento_predefinidoActual.nro_nit);
		jQuery("#t-cel_"+i+"_16").val(asiento_predefinido_control.asiento_predefinidoActual.referencia);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(asiento_predefinido_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento").click(function(){
		jQuery("#tblTablaDatosasiento_predefinidos").on("click",".imgrelacionasiento", function () {

			var idActual=jQuery(this).attr("idactualasiento_predefinido");

			asiento_predefinido_webcontrol1.registrarSesionParaasientos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_predefinido_detalle").click(function(){
		jQuery("#tblTablaDatosasiento_predefinidos").on("click",".imgrelacionasiento_predefinido_detalle", function () {

			var idActual=jQuery(this).attr("idactualasiento_predefinido");

			asiento_predefinido_webcontrol1.registrarSesionParaasiento_predefinido_detalles(idActual);
		});				
	}
		
	

	registrarSesionParaasientos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"asiento_predefinido","asiento","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,"s","");
	}

	registrarSesionParaasiento_predefinido_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"asiento_predefinido","asiento_predefinido_detalle","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(asiento_predefinido_control) {
		asiento_predefinido_funcion1.registrarControlesTableValidacionEdition(asiento_predefinido_control,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinidoConstante,strParametros);
		
		//asiento_predefinido_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa",asiento_predefinido_control.empresasFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_2",asiento_predefinido_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal",asiento_predefinido_control.sucursalsFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_3",asiento_predefinido_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio",asiento_predefinido_control.ejerciciosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_4",asiento_predefinido_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo",asiento_predefinido_control.periodosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_5",asiento_predefinido_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario",asiento_predefinido_control.usuariosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_6",asiento_predefinido_control.usuariosFK);
		}
	};

	cargarCombosmodulosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo",asiento_predefinido_control.modulosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_7",asiento_predefinido_control.modulosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo",asiento_predefinido_control.modulosFK);

	};

	cargarCombosfuentesFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente",asiento_predefinido_control.fuentesFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_10",asiento_predefinido_control.fuentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente",asiento_predefinido_control.fuentesFK);

	};

	cargarComboslibro_auxiliarsFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar",asiento_predefinido_control.libro_auxiliarsFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_11",asiento_predefinido_control.libro_auxiliarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar",asiento_predefinido_control.libro_auxiliarsFK);

	};

	cargarComboscentro_costosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo",asiento_predefinido_control.centro_costosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_12",asiento_predefinido_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_predefinido_control.centro_costosFK);

	};

	cargarCombosdocumento_contablesFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable",asiento_predefinido_control.documento_contablesFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_13",asiento_predefinido_control.documento_contablesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable",asiento_predefinido_control.documento_contablesFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombossucursalsFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosperiodosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosusuariosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosmodulosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosfuentesFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeComboslibro_auxiliarsFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosdocumento_contablesFK(asiento_predefinido_control) {

	};

	
	
	setDefectoValorCombosempresasFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idempresaDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_predefinido_control.idempresaDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val(asiento_predefinido_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idsucursalDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val() != asiento_predefinido_control.idsucursalDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val(asiento_predefinido_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idejercicioDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val() != asiento_predefinido_control.idejercicioDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val(asiento_predefinido_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idperiodoDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val() != asiento_predefinido_control.idperiodoDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val(asiento_predefinido_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idusuarioDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val() != asiento_predefinido_control.idusuarioDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val(asiento_predefinido_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosmodulosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idmoduloDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val() != asiento_predefinido_control.idmoduloDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val(asiento_predefinido_control.idmoduloDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val(asiento_predefinido_control.idmoduloDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosfuentesFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idfuenteDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val() != asiento_predefinido_control.idfuenteDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val(asiento_predefinido_control.idfuenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(asiento_predefinido_control.idfuenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboslibro_auxiliarsFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idlibro_auxiliarDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != asiento_predefinido_control.idlibro_auxiliarDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(asiento_predefinido_control.idlibro_auxiliarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(asiento_predefinido_control.idlibro_auxiliarDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_predefinido_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_predefinido_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_predefinido_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_contablesFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.iddocumento_contableDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val() != asiento_predefinido_control.iddocumento_contableDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val(asiento_predefinido_control.iddocumento_contableDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable").val(asiento_predefinido_control.iddocumento_contableDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_predefinido_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_predefinido_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_predefinido_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosempresasFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombossucursalsFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosejerciciosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosperiodosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosusuariosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosmodulosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosfuentesFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorComboslibro_auxiliarsFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosdocumento_contablesFK(asiento_predefinido_control);
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
	onLoadCombosEventosFK(asiento_predefinido_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_predefinido_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosempresasFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombossucursalsFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosejerciciosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosperiodosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosusuariosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosmodulosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosfuentesFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeComboslibro_auxiliarsFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosdocumento_contablesFK(asiento_predefinido_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_predefinido_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_predefinido_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento_predefinido");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento_predefinido");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(asiento_predefinido_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);			
			
			if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,"asiento_predefinido");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("fuente","id_fuente","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParafuente("id_fuente");
				//alert(jQuery('#form-id_fuente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("libro_auxiliar","id_libro_auxiliar","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParalibro_auxiliar("id_libro_auxiliar");
				//alert(jQuery('#form-id_libro_auxiliar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_contable","id_documento_contable","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParadocumento_contable("id_documento_contable");
				//alert(jQuery('#form-id_documento_contable_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idcentro_costo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Iddocumento_contable","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idejercicio","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idempresa","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idfuente","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idlibro_auxiliar","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idmodulo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idperiodo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idsucursal","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idusuario","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("asiento_predefinido");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			asiento_predefinido_funcion1.validarFormularioJQuery(asiento_predefinido_constante1);
			
			if(asiento_predefinido_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_predefinido_control) {
		
		jQuery("#divBusquedaasiento_predefinidoAjaxWebPart").css("display",asiento_predefinido_control.strPermisoBusqueda);
		jQuery("#trasiento_predefinidoCabeceraBusquedas").css("display",asiento_predefinido_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_predefinido").css("display",asiento_predefinido_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteasiento_predefinido").css("display",asiento_predefinido_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosasiento_predefinido").attr("style",asiento_predefinido_control.strPermisoMostrarTodos);
		
		if(asiento_predefinido_control.strPermisoNuevo!=null) {
			jQuery("#tdasiento_predefinidoNuevo").css("display",asiento_predefinido_control.strPermisoNuevo);
			jQuery("#tdasiento_predefinidoNuevoToolBar").css("display",asiento_predefinido_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdasiento_predefinidoDuplicar").css("display",asiento_predefinido_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_predefinidoDuplicarToolBar").css("display",asiento_predefinido_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_predefinidoNuevoGuardarCambios").css("display",asiento_predefinido_control.strPermisoNuevo);
			jQuery("#tdasiento_predefinidoNuevoGuardarCambiosToolBar").css("display",asiento_predefinido_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(asiento_predefinido_control.strPermisoActualizar!=null) {
			jQuery("#tdasiento_predefinidoActualizarToolBar").css("display",asiento_predefinido_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_predefinidoCopiar").css("display",asiento_predefinido_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_predefinidoCopiarToolBar").css("display",asiento_predefinido_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_predefinidoConEditar").css("display",asiento_predefinido_control.strPermisoActualizar);
		}
		
		jQuery("#tdasiento_predefinidoEliminarToolBar").css("display",asiento_predefinido_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdasiento_predefinidoGuardarCambios").css("display",asiento_predefinido_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdasiento_predefinidoGuardarCambiosToolBar").css("display",asiento_predefinido_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trasiento_predefinidoElementos").css("display",asiento_predefinido_control.strVisibleTablaElementos);
		
		jQuery("#trasiento_predefinidoAcciones").css("display",asiento_predefinido_control.strVisibleTablaAcciones);
		jQuery("#trasiento_predefinidoParametrosAcciones").css("display",asiento_predefinido_control.strVisibleTablaAcciones);
			
		jQuery("#tdasiento_predefinidoCerrarPagina").css("display",asiento_predefinido_control.strPermisoPopup);		
		jQuery("#tdasiento_predefinidoCerrarPaginaToolBar").css("display",asiento_predefinido_control.strPermisoPopup);
		//jQuery("#trasiento_predefinidoAccionesRelaciones").css("display",asiento_predefinido_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_predefinido_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_predefinido_webcontrol1.registrarEventosControles();
		
		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
			asiento_predefinido_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_predefinido_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_predefinido_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_predefinido_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_predefinido_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(asiento_predefinido_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				asiento_predefinido_webcontrol1.onLoad();
				
			} else {
				if(asiento_predefinido_constante1.BIT_ES_PAGINA_FORM==true) {
					if(asiento_predefinido_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
						//asiento_predefinido_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(asiento_predefinido_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(asiento_predefinido_constante1.BIG_ID_ACTUAL,"asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
						//asiento_predefinido_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			asiento_predefinido_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var asiento_predefinido_webcontrol1=new asiento_predefinido_webcontrol();

if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_predefinido_webcontrol1.onLoadWindow; 
}

//</script>