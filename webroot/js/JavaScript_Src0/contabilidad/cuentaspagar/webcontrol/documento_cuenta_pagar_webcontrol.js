//<script type="text/javascript" language="javascript">



//var documento_cuenta_pagarJQueryPaginaWebInteraccion= function (documento_cuenta_pagar_control) {
//this.,this.,this.

class documento_cuenta_pagar_webcontrol extends documento_cuenta_pagar_webcontrol_add {
	
	documento_cuenta_pagar_control=null;
	documento_cuenta_pagar_controlInicial=null;
	documento_cuenta_pagar_controlAuxiliar=null;
		
	//if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(documento_cuenta_pagar_control) {
		super();
		
		this.documento_cuenta_pagar_control=documento_cuenta_pagar_control;
	}
		
	actualizarVariablesPagina(documento_cuenta_pagar_control) {
		
		if(documento_cuenta_pagar_control.action=="index" || documento_cuenta_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(documento_cuenta_pagar_control);
			
		} else if(documento_cuenta_pagar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(documento_cuenta_pagar_control);
			
		} else if(documento_cuenta_pagar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(documento_cuenta_pagar_control);
			
		} else if(documento_cuenta_pagar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_cuenta_pagar_control);		
		
		} else if(documento_cuenta_pagar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(documento_cuenta_pagar_control);		
		
		} else if(documento_cuenta_pagar_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_cuenta_pagar_control);		
		
		} else if(documento_cuenta_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(documento_cuenta_pagar_control);		
		}
		else if(documento_cuenta_pagar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_cuenta_pagar_control);		
		}
		else if(documento_cuenta_pagar_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_cuenta_pagar_control);		
		}
		else if(documento_cuenta_pagar_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_cuenta_pagar_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(documento_cuenta_pagar_control.action + " Revisar Manejo");
			
			if(documento_cuenta_pagar_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(documento_cuenta_pagar_control);
				
				return;
			}
			
			//if(documento_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(documento_cuenta_pagar_control);
			//}
			
			if(documento_cuenta_pagar_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(documento_cuenta_pagar_control);
			}
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_cuenta_pagar_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(documento_cuenta_pagar_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(documento_cuenta_pagar_control, false);			
			}
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(documento_cuenta_pagar_control);	
			}
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
			}
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(documento_cuenta_pagar_control);
			}
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(documento_cuenta_pagar_control);
			}
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(documento_cuenta_pagar_control);	
			}
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
			}
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
			}
			
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(documento_cuenta_pagar_control);			
			}
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(documento_cuenta_pagar_control);
			}
			
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(documento_cuenta_pagar_control);
			}
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(documento_cuenta_pagar_control);
			}				
			
			if(documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_cuenta_pagar_control);
			}
			
			if(documento_cuenta_pagar_control.usuarioActual!=null && documento_cuenta_pagar_control.usuarioActual.field_strUserName!=null &&
			documento_cuenta_pagar_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(documento_cuenta_pagar_control);			
			}
		}
		
		
		if(documento_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(documento_cuenta_pagar_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(documento_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(documento_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(documento_cuenta_pagar_control);
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(documento_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(documento_cuenta_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(documento_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(documento_cuenta_pagar_control);
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(documento_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(documento_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(documento_cuenta_pagar_control) {
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(documento_cuenta_pagar_control) {
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(documento_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(documento_cuenta_pagar_control);
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(documento_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);				
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(documento_cuenta_pagar_control) {
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(documento_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(documento_cuenta_pagar_control);
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(documento_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_cuenta_pagar_control) {
		this.actualizarPaginaImprimir(documento_cuenta_pagar_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_cuenta_pagar_control) {
		this.actualizarPaginaImprimir(documento_cuenta_pagar_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(documento_cuenta_pagar_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_cuenta_pagar_control) {
		//FORMULARIO
		if(documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
			this.actualizarPaginaFormularioAdd(documento_cuenta_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		//COMBOS FK
		if(documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_cuenta_pagar_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(documento_cuenta_pagar_control) {
		//FORMULARIO
		if(documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);	
		//COMBOS FK
		if(documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_cuenta_pagar_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_cuenta_pagar_control) {
		//FORMULARIO
		if(documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_cuenta_pagar_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(documento_cuenta_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);	
		//COMBOS FK
		if(documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_cuenta_pagar_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_cuenta_pagar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_cuenta_pagar_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control) {
		if(documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_cuenta_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(documento_cuenta_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(documento_cuenta_pagar_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(documento_cuenta_pagar_control) {
		if(documento_cuenta_pagar_funcion1.esPaginaForm()==true) {
			window.opener.documento_cuenta_pagar_webcontrol1.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(documento_cuenta_pagar_control) {
		documento_cuenta_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(documento_cuenta_pagar_control.strAuxiliarUrlPagina);
				
		documento_cuenta_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(documento_cuenta_pagar_control.strAuxiliarTipo,documento_cuenta_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(documento_cuenta_pagar_control) {
		documento_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,documento_cuenta_pagar_control.strAuxiliarMensajeAlert,documento_cuenta_pagar_control.strAuxiliarCssMensaje);
			
		if(documento_cuenta_pagar_funcion1.esPaginaForm()==true) {
			window.opener.documento_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,documento_cuenta_pagar_control.strAuxiliarMensajeAlert,documento_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(documento_cuenta_pagar_control) {
		eval(documento_cuenta_pagar_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(documento_cuenta_pagar_control, mostrar) {
		
		if(mostrar==true) {
			documento_cuenta_pagar_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				documento_cuenta_pagar_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			documento_cuenta_pagar_funcion1.mostrarDivMensaje(true,documento_cuenta_pagar_control.strAuxiliarMensaje,documento_cuenta_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			documento_cuenta_pagar_funcion1.mostrarDivMensaje(false,documento_cuenta_pagar_control.strAuxiliarMensaje,documento_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(documento_cuenta_pagar_control) {
	
		funcionGeneral.printWebPartPage("documento_cuenta_pagar",documento_cuenta_pagar_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliardocumento_cuenta_pagarsAjaxWebPart").html(documento_cuenta_pagar_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("documento_cuenta_pagar",jQuery("#divTablaDatosReporteAuxiliardocumento_cuenta_pagarsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(documento_cuenta_pagar_control) {
		this.documento_cuenta_pagar_controlInicial=documento_cuenta_pagar_control;
			
		if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(documento_cuenta_pagar_control.strStyleDivArbol,documento_cuenta_pagar_control.strStyleDivContent
																,documento_cuenta_pagar_control.strStyleDivOpcionesBanner,documento_cuenta_pagar_control.strStyleDivExpandirColapsar
																,documento_cuenta_pagar_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=documento_cuenta_pagar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",documento_cuenta_pagar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(documento_cuenta_pagar_control) {
		jQuery("#divTablaDatosdocumento_cuenta_pagarsAjaxWebPart").html(documento_cuenta_pagar_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdocumento_cuenta_pagars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdocumento_cuenta_pagars=jQuery("#tblTablaDatosdocumento_cuenta_pagars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("documento_cuenta_pagar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',documento_cuenta_pagar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			documento_cuenta_pagar_webcontrol1.registrarControlesTableEdition(documento_cuenta_pagar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		documento_cuenta_pagar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(documento_cuenta_pagar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(documento_cuenta_pagar_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(documento_cuenta_pagar_control) {
		this.actualizarCssBotonesPagina(documento_cuenta_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(documento_cuenta_pagar_control.tiposReportes,documento_cuenta_pagar_control.tiposReporte
															 	,documento_cuenta_pagar_control.tiposPaginacion,documento_cuenta_pagar_control.tiposAcciones
																,documento_cuenta_pagar_control.tiposColumnasSelect,documento_cuenta_pagar_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(documento_cuenta_pagar_control.tiposRelaciones,documento_cuenta_pagar_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(documento_cuenta_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(documento_cuenta_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(documento_cuenta_pagar_control);			
	}
	
	actualizarPaginaAreaBusquedas(documento_cuenta_pagar_control) {
		jQuery("#divBusquedadocumento_cuenta_pagarAjaxWebPart").css("display",documento_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trdocumento_cuenta_pagarCabeceraBusquedas").css("display",documento_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_cuenta_pagar").css("display",documento_cuenta_pagar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(documento_cuenta_pagar_control.htmlTablaOrderBy!=null
			&& documento_cuenta_pagar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydocumento_cuenta_pagarAjaxWebPart").html(documento_cuenta_pagar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//documento_cuenta_pagar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(documento_cuenta_pagar_control.htmlTablaOrderByRel!=null
			&& documento_cuenta_pagar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldocumento_cuenta_pagarAjaxWebPart").html(documento_cuenta_pagar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadocumento_cuenta_pagarAjaxWebPart").css("display","none");
			jQuery("#trdocumento_cuenta_pagarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadocumento_cuenta_pagar").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control) {
		jQuery("#tddocumento_cuenta_pagarNuevo").css("display",documento_cuenta_pagar_control.strPermisoNuevo);
		jQuery("#trdocumento_cuenta_pagarElementos").css("display",documento_cuenta_pagar_control.strVisibleTablaElementos);
		jQuery("#trdocumento_cuenta_pagarAcciones").css("display",documento_cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_cuenta_pagarParametrosAcciones").css("display",documento_cuenta_pagar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(documento_cuenta_pagar_control) {
	
		this.actualizarCssBotonesMantenimiento(documento_cuenta_pagar_control);
				
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFormulario(documento_cuenta_pagar_control);			
		}
						
		this.actualizarSpanMensajesCampos(documento_cuenta_pagar_control);
	}
	
	actualizarPaginaUsuarioInvitado(documento_cuenta_pagar_control) {
	
		var indexPosition=documento_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=documento_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(documento_cuenta_pagar_control) {
		jQuery("#divResumendocumento_cuenta_pagarActualAjaxWebPart").html(documento_cuenta_pagar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_cuenta_pagar_control) {
		jQuery("#divAccionesRelacionesdocumento_cuenta_pagarAjaxWebPart").html(documento_cuenta_pagar_control.htmlTablaAccionesRelaciones);
			
		documento_cuenta_pagar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(documento_cuenta_pagar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(documento_cuenta_pagar_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(documento_cuenta_pagar_control) {
		
		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idcuenta_corriente);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idcuenta_corriente);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idejercicio);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idempresa);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idforma_pago_proveedor);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idforma_pago_proveedor);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idperiodo);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idproveedor);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idsucursal);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondocumento_cuenta_pagar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("documento_cuenta_pagar",id,"cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","empresa","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","sucursal","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","ejercicio","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","periodo","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","usuario","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","proveedor","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParaforma_pago_proveedor(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","forma_pago_proveedor","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParacuenta_corriente(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","cuenta_corriente","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(documento_cuenta_pagar_control) {
	
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-version_row").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.versionRow);
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_empresa!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_empresa) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_sucursal!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_sucursal) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_ejercicio!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_ejercicio) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_periodo!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_periodo) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_usuario!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_usuario) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-numero").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.numero);
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_proveedor!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_proveedor>-1){
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_proveedor) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-tipo").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.tipo);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-fecha_emision").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.fecha_emision);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-descripcion").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.descripcion);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-monto").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.monto);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-monto_parcial").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.monto_parcial);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-moneda").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.moneda);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-fecha_vence").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.fecha_vence);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-numero_de_pagos").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.numero_de_pagos);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-balance").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.balance);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-balance_mon").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.balance_mon);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-numero_pagado").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.numero_pagado);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_pagado").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_pagado);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-modulo_origen").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.modulo_origen);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_origen").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_origen);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-modulo_destino").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.modulo_destino);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_destino").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_destino);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-nombre_pc").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.nombre_pc);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-hora").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.hora);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-monto_mora").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.monto_mora);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-interes_mora").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.interes_mora);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-dias_gracia_mora").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.dias_gracia_mora);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-instrumento_pago").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.instrumento_pago);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-tipo_cambio").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.tipo_cambio);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-nro_documento_proveedor").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.nro_documento_proveedor);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-clase_registro").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.clase_registro);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-estado_registro").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.estado_registro);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-motivo_anulacion").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.motivo_anulacion);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-impuesto_1").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.impuesto_1);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-impuesto_2").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.impuesto_2);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-impuesto_incluido").prop('checked',documento_cuenta_pagar_control.documento_cuenta_pagarActual.impuesto_incluido);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-observaciones").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.observaciones);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-grupo_pago").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.grupo_pago);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-termino_idpv").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.termino_idpv);
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_forma_pago_proveedor!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_forma_pago_proveedor>-1){
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_forma_pago_proveedor) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_forma_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").select2("val", null);
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-nro_pago").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.nro_pago);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-referencia_pago").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.referencia_pago);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-fecha_hora").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.fecha_hora);
		jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_base").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_base);
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_cuenta_corriente!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_cuenta_corriente>-1){
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_cuenta_corriente) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente").select2("val", null);
			if(jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+documento_cuenta_pagar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("documento_cuenta_pagar","cuentaspagar","","form_documento_cuenta_pagar",formulario,"","",paraEventoTabla,idFilaTabla,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}
	
	cargarCombosFK(documento_cuenta_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombosempresasFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombosproveedorsFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarComboscuenta_corrientesFK(documento_cuenta_pagar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!=null && documento_cuenta_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && documento_cuenta_pagar_control.strRecargarFkTiposNinguno!='') {
			
				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombosempresasFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombosproveedorsFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarComboscuenta_corrientesFK(documento_cuenta_pagar_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(documento_cuenta_pagar_control) {
		jQuery("#spanstrMensajeid").text(documento_cuenta_pagar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(documento_cuenta_pagar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(documento_cuenta_pagar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(documento_cuenta_pagar_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(documento_cuenta_pagar_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(documento_cuenta_pagar_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(documento_cuenta_pagar_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenumero").text(documento_cuenta_pagar_control.strMensajenumero);		
		jQuery("#spanstrMensajeid_proveedor").text(documento_cuenta_pagar_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajetipo").text(documento_cuenta_pagar_control.strMensajetipo);		
		jQuery("#spanstrMensajefecha_emision").text(documento_cuenta_pagar_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajedescripcion").text(documento_cuenta_pagar_control.strMensajedescripcion);		
		jQuery("#spanstrMensajemonto").text(documento_cuenta_pagar_control.strMensajemonto);		
		jQuery("#spanstrMensajemonto_parcial").text(documento_cuenta_pagar_control.strMensajemonto_parcial);		
		jQuery("#spanstrMensajemoneda").text(documento_cuenta_pagar_control.strMensajemoneda);		
		jQuery("#spanstrMensajefecha_vence").text(documento_cuenta_pagar_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajenumero_de_pagos").text(documento_cuenta_pagar_control.strMensajenumero_de_pagos);		
		jQuery("#spanstrMensajebalance").text(documento_cuenta_pagar_control.strMensajebalance);		
		jQuery("#spanstrMensajebalance_mon").text(documento_cuenta_pagar_control.strMensajebalance_mon);		
		jQuery("#spanstrMensajenumero_pagado").text(documento_cuenta_pagar_control.strMensajenumero_pagado);		
		jQuery("#spanstrMensajeid_pagado").text(documento_cuenta_pagar_control.strMensajeid_pagado);		
		jQuery("#spanstrMensajemodulo_origen").text(documento_cuenta_pagar_control.strMensajemodulo_origen);		
		jQuery("#spanstrMensajeid_origen").text(documento_cuenta_pagar_control.strMensajeid_origen);		
		jQuery("#spanstrMensajemodulo_destino").text(documento_cuenta_pagar_control.strMensajemodulo_destino);		
		jQuery("#spanstrMensajeid_destino").text(documento_cuenta_pagar_control.strMensajeid_destino);		
		jQuery("#spanstrMensajenombre_pc").text(documento_cuenta_pagar_control.strMensajenombre_pc);		
		jQuery("#spanstrMensajehora").text(documento_cuenta_pagar_control.strMensajehora);		
		jQuery("#spanstrMensajemonto_mora").text(documento_cuenta_pagar_control.strMensajemonto_mora);		
		jQuery("#spanstrMensajeinteres_mora").text(documento_cuenta_pagar_control.strMensajeinteres_mora);		
		jQuery("#spanstrMensajedias_gracia_mora").text(documento_cuenta_pagar_control.strMensajedias_gracia_mora);		
		jQuery("#spanstrMensajeinstrumento_pago").text(documento_cuenta_pagar_control.strMensajeinstrumento_pago);		
		jQuery("#spanstrMensajetipo_cambio").text(documento_cuenta_pagar_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajenro_documento_proveedor").text(documento_cuenta_pagar_control.strMensajenro_documento_proveedor);		
		jQuery("#spanstrMensajeclase_registro").text(documento_cuenta_pagar_control.strMensajeclase_registro);		
		jQuery("#spanstrMensajeestado_registro").text(documento_cuenta_pagar_control.strMensajeestado_registro);		
		jQuery("#spanstrMensajemotivo_anulacion").text(documento_cuenta_pagar_control.strMensajemotivo_anulacion);		
		jQuery("#spanstrMensajeimpuesto_1").text(documento_cuenta_pagar_control.strMensajeimpuesto_1);		
		jQuery("#spanstrMensajeimpuesto_2").text(documento_cuenta_pagar_control.strMensajeimpuesto_2);		
		jQuery("#spanstrMensajeimpuesto_incluido").text(documento_cuenta_pagar_control.strMensajeimpuesto_incluido);		
		jQuery("#spanstrMensajeobservaciones").text(documento_cuenta_pagar_control.strMensajeobservaciones);		
		jQuery("#spanstrMensajegrupo_pago").text(documento_cuenta_pagar_control.strMensajegrupo_pago);		
		jQuery("#spanstrMensajetermino_idpv").text(documento_cuenta_pagar_control.strMensajetermino_idpv);		
		jQuery("#spanstrMensajeid_forma_pago_proveedor").text(documento_cuenta_pagar_control.strMensajeid_forma_pago_proveedor);		
		jQuery("#spanstrMensajenro_pago").text(documento_cuenta_pagar_control.strMensajenro_pago);		
		jQuery("#spanstrMensajereferencia_pago").text(documento_cuenta_pagar_control.strMensajereferencia_pago);		
		jQuery("#spanstrMensajefecha_hora").text(documento_cuenta_pagar_control.strMensajefecha_hora);		
		jQuery("#spanstrMensajeid_base").text(documento_cuenta_pagar_control.strMensajeid_base);		
		jQuery("#spanstrMensajeid_cuenta_corriente").text(documento_cuenta_pagar_control.strMensajeid_cuenta_corriente);		
	}
	
	actualizarCssBotonesMantenimiento(documento_cuenta_pagar_control) {
		jQuery("#tdbtnNuevodocumento_cuenta_pagar").css("visibility",documento_cuenta_pagar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodocumento_cuenta_pagar").css("display",documento_cuenta_pagar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardocumento_cuenta_pagar").css("visibility",documento_cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardocumento_cuenta_pagar").css("display",documento_cuenta_pagar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardocumento_cuenta_pagar").css("visibility",documento_cuenta_pagar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardocumento_cuenta_pagar").css("display",documento_cuenta_pagar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardocumento_cuenta_pagar").css("visibility",documento_cuenta_pagar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdocumento_cuenta_pagar").css("visibility",documento_cuenta_pagar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdocumento_cuenta_pagar").css("display",documento_cuenta_pagar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardocumento_cuenta_pagar").css("visibility",documento_cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardocumento_cuenta_pagar").css("visibility",documento_cuenta_pagar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardocumento_cuenta_pagar").css("visibility",documento_cuenta_pagar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionimagen_documento_cuenta_pagar").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_pagar");

			documento_cuenta_pagar_webcontrol1.registrarSesionParaimagen_documento_cuenta_pagares(idActual);
		});
		jQuery("#imgdivrelacionorden_compra").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_pagar");

			documento_cuenta_pagar_webcontrol1.registrarSesionParaorden_compras(idActual);
		});
		jQuery("#imgdivrelaciondevolucion").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_pagar");

			documento_cuenta_pagar_webcontrol1.registrarSesionParadevoluciones(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.usuariosFK);
	}

	cargarComboEditarTablaproveedorFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.proveedorsFK);
	}

	cargarComboEditarTablaforma_pago_proveedorFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.forma_pago_proveedorsFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.cuenta_corrientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(documento_cuenta_pagar_control) {
		var i=0;
		
		i=documento_cuenta_pagar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id);
		jQuery("#t-version_row_"+i+"").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.versionRow);
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_empresa!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_sucursal!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_ejercicio!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_periodo!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_usuario!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.numero);
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_proveedor!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_8").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.tipo);
		jQuery("#t-cel_"+i+"_10").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_11").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.descripcion);
		jQuery("#t-cel_"+i+"_12").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.monto);
		jQuery("#t-cel_"+i+"_13").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.monto_parcial);
		jQuery("#t-cel_"+i+"_14").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.moneda);
		jQuery("#t-cel_"+i+"_15").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.fecha_vence);
		jQuery("#t-cel_"+i+"_16").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.numero_de_pagos);
		jQuery("#t-cel_"+i+"_17").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.balance);
		jQuery("#t-cel_"+i+"_18").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.balance_mon);
		jQuery("#t-cel_"+i+"_19").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.numero_pagado);
		jQuery("#t-cel_"+i+"_20").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_pagado);
		jQuery("#t-cel_"+i+"_21").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.modulo_origen);
		jQuery("#t-cel_"+i+"_22").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_origen);
		jQuery("#t-cel_"+i+"_23").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.modulo_destino);
		jQuery("#t-cel_"+i+"_24").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_destino);
		jQuery("#t-cel_"+i+"_25").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.nombre_pc);
		jQuery("#t-cel_"+i+"_26").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.hora);
		jQuery("#t-cel_"+i+"_27").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.monto_mora);
		jQuery("#t-cel_"+i+"_28").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.interes_mora);
		jQuery("#t-cel_"+i+"_29").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.dias_gracia_mora);
		jQuery("#t-cel_"+i+"_30").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.instrumento_pago);
		jQuery("#t-cel_"+i+"_31").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_32").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.nro_documento_proveedor);
		jQuery("#t-cel_"+i+"_33").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.clase_registro);
		jQuery("#t-cel_"+i+"_34").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.estado_registro);
		jQuery("#t-cel_"+i+"_35").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.motivo_anulacion);
		jQuery("#t-cel_"+i+"_36").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.impuesto_1);
		jQuery("#t-cel_"+i+"_37").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.impuesto_2);
		jQuery("#t-cel_"+i+"_38").prop('checked',documento_cuenta_pagar_control.documento_cuenta_pagarActual.impuesto_incluido);
		jQuery("#t-cel_"+i+"_39").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.observaciones);
		jQuery("#t-cel_"+i+"_40").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.grupo_pago);
		jQuery("#t-cel_"+i+"_41").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.termino_idpv);
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_forma_pago_proveedor!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_forma_pago_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_42").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_forma_pago_proveedor) {
				jQuery("#t-cel_"+i+"_42").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_forma_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_42").select2("val", null);
			if(jQuery("#t-cel_"+i+"_42").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_42").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_43").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.nro_pago);
		jQuery("#t-cel_"+i+"_44").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.referencia_pago);
		jQuery("#t-cel_"+i+"_45").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.fecha_hora);
		jQuery("#t-cel_"+i+"_46").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_base);
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_cuenta_corriente!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_cuenta_corriente>-1){
			if(jQuery("#t-cel_"+i+"_47").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_cuenta_corriente) {
				jQuery("#t-cel_"+i+"_47").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_47").select2("val", null);
			if(jQuery("#t-cel_"+i+"_47").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_47").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(documento_cuenta_pagar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimagen_documento_cuenta_pagar").click(function(){
		jQuery("#tblTablaDatosdocumento_cuenta_pagars").on("click",".imgrelacionimagen_documento_cuenta_pagar", function () {

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_pagar");

			documento_cuenta_pagar_webcontrol1.registrarSesionParaimagen_documento_cuenta_pagares(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionorden_compra").click(function(){
		jQuery("#tblTablaDatosdocumento_cuenta_pagars").on("click",".imgrelacionorden_compra", function () {

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_pagar");

			documento_cuenta_pagar_webcontrol1.registrarSesionParaorden_compras(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion").click(function(){
		jQuery("#tblTablaDatosdocumento_cuenta_pagars").on("click",".imgrelaciondevolucion", function () {

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_pagar");

			documento_cuenta_pagar_webcontrol1.registrarSesionParadevoluciones(idActual);
		});				
	}
		
	

	registrarSesionParaimagen_documento_cuenta_pagares(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_cuenta_pagar","imagen_documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,"es","");
	}

	registrarSesionParaorden_compras(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_cuenta_pagar","orden_compra","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,"s","");
	}

	registrarSesionParadevoluciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_cuenta_pagar","devolucion","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(documento_cuenta_pagar_control) {
		documento_cuenta_pagar_funcion1.registrarControlesTableValidacionEdition(documento_cuenta_pagar_control,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagarConstante,strParametros);
		
		//documento_cuenta_pagar_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa",documento_cuenta_pagar_control.empresasFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_2",documento_cuenta_pagar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal",documento_cuenta_pagar_control.sucursalsFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_3",documento_cuenta_pagar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio",documento_cuenta_pagar_control.ejerciciosFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_4",documento_cuenta_pagar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo",documento_cuenta_pagar_control.periodosFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_5",documento_cuenta_pagar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario",documento_cuenta_pagar_control.usuariosFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_6",documento_cuenta_pagar_control.usuariosFK);
		}
	};

	cargarCombosproveedorsFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor",documento_cuenta_pagar_control.proveedorsFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_8",documento_cuenta_pagar_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",documento_cuenta_pagar_control.proveedorsFK);

	};

	cargarCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor",documento_cuenta_pagar_control.forma_pago_proveedorsFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_42",documento_cuenta_pagar_control.forma_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor",documento_cuenta_pagar_control.forma_pago_proveedorsFK);

	};

	cargarComboscuenta_corrientesFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente",documento_cuenta_pagar_control.cuenta_corrientesFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_47",documento_cuenta_pagar_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",documento_cuenta_pagar_control.cuenta_corrientesFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(documento_cuenta_pagar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idempresaDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != documento_cuenta_pagar_control.idempresaDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(documento_cuenta_pagar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idsucursalDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != documento_cuenta_pagar_control.idsucursalDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(documento_cuenta_pagar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idejercicioDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != documento_cuenta_pagar_control.idejercicioDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(documento_cuenta_pagar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idperiodoDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != documento_cuenta_pagar_control.idperiodoDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(documento_cuenta_pagar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idusuarioDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != documento_cuenta_pagar_control.idusuarioDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(documento_cuenta_pagar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idproveedorDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val() != documento_cuenta_pagar_control.idproveedorDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val(documento_cuenta_pagar_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(documento_cuenta_pagar_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idforma_pago_proveedorDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val() != documento_cuenta_pagar_control.idforma_pago_proveedorDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val(documento_cuenta_pagar_control.idforma_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val(documento_cuenta_pagar_control.idforma_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != documento_cuenta_pagar_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(documento_cuenta_pagar_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(documento_cuenta_pagar_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//documento_cuenta_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(documento_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombosempresasFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombossucursalsFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombosejerciciosFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombosperiodosFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombosusuariosFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombosproveedorsFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorComboscuenta_corrientesFK(documento_cuenta_pagar_control);
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
	onLoadCombosEventosFK(documento_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosempresasFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombossucursalsFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosperiodosFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosusuariosFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosproveedorsFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(documento_cuenta_pagar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(documento_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("documento_cuenta_pagar");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("documento_cuenta_pagar");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(documento_cuenta_pagar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);			
			
			if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,"documento_cuenta_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("forma_pago_proveedor","id_forma_pago_proveedor","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParaforma_pago_proveedor("id_forma_pago_proveedor");
				//alert(jQuery('#form-id_forma_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idcuenta_corriente","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idejercicio","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idempresa","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idforma_pago_proveedor","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idperiodo","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idproveedor","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idsucursal","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idusuario","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("documento_cuenta_pagar");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			documento_cuenta_pagar_funcion1.validarFormularioJQuery(documento_cuenta_pagar_constante1);
			
			if(documento_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(documento_cuenta_pagar_control) {
		
		jQuery("#divBusquedadocumento_cuenta_pagarAjaxWebPart").css("display",documento_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trdocumento_cuenta_pagarCabeceraBusquedas").css("display",documento_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_cuenta_pagar").css("display",documento_cuenta_pagar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedocumento_cuenta_pagar").css("display",documento_cuenta_pagar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdocumento_cuenta_pagar").attr("style",documento_cuenta_pagar_control.strPermisoMostrarTodos);
		
		if(documento_cuenta_pagar_control.strPermisoNuevo!=null) {
			jQuery("#tddocumento_cuenta_pagarNuevo").css("display",documento_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tddocumento_cuenta_pagarNuevoToolBar").css("display",documento_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddocumento_cuenta_pagarDuplicar").css("display",documento_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_cuenta_pagarDuplicarToolBar").css("display",documento_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_cuenta_pagarNuevoGuardarCambios").css("display",documento_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tddocumento_cuenta_pagarNuevoGuardarCambiosToolBar").css("display",documento_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(documento_cuenta_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tddocumento_cuenta_pagarActualizarToolBar").css("display",documento_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_cuenta_pagarCopiar").css("display",documento_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_cuenta_pagarCopiarToolBar").css("display",documento_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_cuenta_pagarConEditar").css("display",documento_cuenta_pagar_control.strPermisoActualizar);
		}
		
		jQuery("#tddocumento_cuenta_pagarEliminarToolBar").css("display",documento_cuenta_pagar_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tddocumento_cuenta_pagarGuardarCambios").css("display",documento_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddocumento_cuenta_pagarGuardarCambiosToolBar").css("display",documento_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trdocumento_cuenta_pagarElementos").css("display",documento_cuenta_pagar_control.strVisibleTablaElementos);
		
		jQuery("#trdocumento_cuenta_pagarAcciones").css("display",documento_cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_cuenta_pagarParametrosAcciones").css("display",documento_cuenta_pagar_control.strVisibleTablaAcciones);
			
		jQuery("#tddocumento_cuenta_pagarCerrarPagina").css("display",documento_cuenta_pagar_control.strPermisoPopup);		
		jQuery("#tddocumento_cuenta_pagarCerrarPaginaToolBar").css("display",documento_cuenta_pagar_control.strPermisoPopup);
		//jQuery("#trdocumento_cuenta_pagarAccionesRelaciones").css("display",documento_cuenta_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		documento_cuenta_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		documento_cuenta_pagar_webcontrol1.registrarEventosControles();
		
		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			documento_cuenta_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(documento_cuenta_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(documento_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_cuenta_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(documento_cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(documento_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				documento_cuenta_pagar_webcontrol1.onLoad();
				
			} else {
				if(documento_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
					if(documento_cuenta_pagar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
						//documento_cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(documento_cuenta_pagar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(documento_cuenta_pagar_constante1.BIG_ID_ACTUAL,"documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
						//documento_cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			documento_cuenta_pagar_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var documento_cuenta_pagar_webcontrol1=new documento_cuenta_pagar_webcontrol();

if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = documento_cuenta_pagar_webcontrol1.onLoadWindow; 
}

//</script>