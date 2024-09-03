//<script type="text/javascript" language="javascript">



//var termino_pago_clienteJQueryPaginaWebInteraccion= function (termino_pago_cliente_control) {
//this.,this.,this.

class termino_pago_cliente_webcontrol extends termino_pago_cliente_webcontrol_add {
	
	termino_pago_cliente_control=null;
	termino_pago_cliente_controlInicial=null;
	termino_pago_cliente_controlAuxiliar=null;
		
	//if(termino_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(termino_pago_cliente_control) {
		super();
		
		this.termino_pago_cliente_control=termino_pago_cliente_control;
	}
		
	actualizarVariablesPagina(termino_pago_cliente_control) {
		
		if(termino_pago_cliente_control.action=="index" || termino_pago_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(termino_pago_cliente_control);
			
		} else if(termino_pago_cliente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(termino_pago_cliente_control);
			
		} else if(termino_pago_cliente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(termino_pago_cliente_control);
			
		} else if(termino_pago_cliente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(termino_pago_cliente_control);
		
		} else if(termino_pago_cliente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(termino_pago_cliente_control);		
		
		} else if(termino_pago_cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(termino_pago_cliente_control);		
		
		} else if(termino_pago_cliente_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(termino_pago_cliente_control);		
		
		} else if(termino_pago_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(termino_pago_cliente_control);		
		}
		else if(termino_pago_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(termino_pago_cliente_control);		
		}
		else if(termino_pago_cliente_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(termino_pago_cliente_control);		
		}
		else if(termino_pago_cliente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(termino_pago_cliente_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(termino_pago_cliente_control.action + " Revisar Manejo");
			
			if(termino_pago_cliente_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(termino_pago_cliente_control);
				
				return;
			}
			
			//if(termino_pago_cliente_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(termino_pago_cliente_control);
			//}
			
			if(termino_pago_cliente_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(termino_pago_cliente_control);
			}
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && termino_pago_cliente_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(termino_pago_cliente_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(termino_pago_cliente_control, false);			
			}
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(termino_pago_cliente_control);	
			}
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(termino_pago_cliente_control);
			}
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(termino_pago_cliente_control);
			}
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(termino_pago_cliente_control);
			}
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(termino_pago_cliente_control);	
			}
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
			}
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(termino_pago_cliente_control);
			}
			
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(termino_pago_cliente_control);			
			}
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(termino_pago_cliente_control);
			}
			
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(termino_pago_cliente_control);
			}
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(termino_pago_cliente_control);
			}				
			
			if(termino_pago_cliente_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(termino_pago_cliente_control);
			}
			
			if(termino_pago_cliente_control.usuarioActual!=null && termino_pago_cliente_control.usuarioActual.field_strUserName!=null &&
			termino_pago_cliente_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(termino_pago_cliente_control);			
			}
		}
		
		
		if(termino_pago_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(termino_pago_cliente_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(termino_pago_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(termino_pago_cliente_control);
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);
		this.actualizarPaginaCargaGeneralControles(termino_pago_cliente_control);
		this.actualizarPaginaFormulario(termino_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(termino_pago_cliente_control);
		this.actualizarPaginaAreaBusquedas(termino_pago_cliente_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(termino_pago_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(termino_pago_cliente_control);
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);
		this.actualizarPaginaCargaGeneralControles(termino_pago_cliente_control);
		this.actualizarPaginaFormulario(termino_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(termino_pago_cliente_control);
		this.actualizarPaginaAreaBusquedas(termino_pago_cliente_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaFormulario(termino_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaFormulario(termino_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaFormulario(termino_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);		
		this.actualizarPaginaFormulario(termino_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);		
		this.actualizarPaginaFormulario(termino_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);		
		this.actualizarPaginaFormulario(termino_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(termino_pago_cliente_control) {
		this.actualizarPaginaFormulario(termino_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(termino_pago_cliente_control) {
		this.actualizarPaginaFormulario(termino_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(termino_pago_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(termino_pago_cliente_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_cliente_control);
		this.actualizarPaginaFormulario(termino_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(termino_pago_cliente_control) {
		this.actualizarPaginaAbrirLink(termino_pago_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);				
		this.actualizarPaginaFormulario(termino_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);
		this.actualizarPaginaFormulario(termino_pago_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);
		this.actualizarPaginaFormulario(termino_pago_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(termino_pago_cliente_control) {
		this.actualizarPaginaFormulario(termino_pago_cliente_control);
		this.onLoadCombosDefectoFK(termino_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);
		this.actualizarPaginaFormulario(termino_pago_cliente_control);
		this.onLoadCombosDefectoFK(termino_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(termino_pago_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(termino_pago_cliente_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_cliente_control);
		this.actualizarPaginaFormulario(termino_pago_cliente_control);
		this.onLoadCombosDefectoFK(termino_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(termino_pago_cliente_control) {
		this.actualizarPaginaAbrirLink(termino_pago_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(termino_pago_cliente_control) {
		this.actualizarPaginaImprimir(termino_pago_cliente_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(termino_pago_cliente_control) {
		this.actualizarPaginaImprimir(termino_pago_cliente_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(termino_pago_cliente_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(termino_pago_cliente_control) {
		//FORMULARIO
		if(termino_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(termino_pago_cliente_control);
			this.actualizarPaginaFormularioAdd(termino_pago_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		//COMBOS FK
		if(termino_pago_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(termino_pago_cliente_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(termino_pago_cliente_control) {
		//FORMULARIO
		if(termino_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(termino_pago_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);	
		//COMBOS FK
		if(termino_pago_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(termino_pago_cliente_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(termino_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(termino_pago_cliente_control);
		this.actualizarPaginaFormulario(termino_pago_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(termino_pago_cliente_control) {
		//FORMULARIO
		if(termino_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(termino_pago_cliente_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(termino_pago_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);	
		//COMBOS FK
		if(termino_pago_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(termino_pago_cliente_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(termino_pago_cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(termino_pago_cliente_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(termino_pago_cliente_control) {
		if(termino_pago_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && termino_pago_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(termino_pago_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(termino_pago_cliente_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(termino_pago_cliente_control) {
		if(termino_pago_cliente_funcion1.esPaginaForm()==true) {
			window.opener.termino_pago_cliente_webcontrol1.actualizarPaginaTablaDatos(termino_pago_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(termino_pago_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(termino_pago_cliente_control) {
		termino_pago_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(termino_pago_cliente_control.strAuxiliarUrlPagina);
				
		termino_pago_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(termino_pago_cliente_control.strAuxiliarTipo,termino_pago_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(termino_pago_cliente_control) {
		termino_pago_cliente_funcion1.resaltarRestaurarDivMensaje(true,termino_pago_cliente_control.strAuxiliarMensajeAlert,termino_pago_cliente_control.strAuxiliarCssMensaje);
			
		if(termino_pago_cliente_funcion1.esPaginaForm()==true) {
			window.opener.termino_pago_cliente_funcion1.resaltarRestaurarDivMensaje(true,termino_pago_cliente_control.strAuxiliarMensajeAlert,termino_pago_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(termino_pago_cliente_control) {
		eval(termino_pago_cliente_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(termino_pago_cliente_control, mostrar) {
		
		if(mostrar==true) {
			termino_pago_cliente_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				termino_pago_cliente_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			termino_pago_cliente_funcion1.mostrarDivMensaje(true,termino_pago_cliente_control.strAuxiliarMensaje,termino_pago_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			termino_pago_cliente_funcion1.mostrarDivMensaje(false,termino_pago_cliente_control.strAuxiliarMensaje,termino_pago_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(termino_pago_cliente_control) {
	
		funcionGeneral.printWebPartPage("termino_pago_cliente",termino_pago_cliente_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliartermino_pago_clientesAjaxWebPart").html(termino_pago_cliente_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("termino_pago_cliente",jQuery("#divTablaDatosReporteAuxiliartermino_pago_clientesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(termino_pago_cliente_control) {
		this.termino_pago_cliente_controlInicial=termino_pago_cliente_control;
			
		if(termino_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(termino_pago_cliente_control.strStyleDivArbol,termino_pago_cliente_control.strStyleDivContent
																,termino_pago_cliente_control.strStyleDivOpcionesBanner,termino_pago_cliente_control.strStyleDivExpandirColapsar
																,termino_pago_cliente_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=termino_pago_cliente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",termino_pago_cliente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(termino_pago_cliente_control) {
		jQuery("#divTablaDatostermino_pago_clientesAjaxWebPart").html(termino_pago_cliente_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostermino_pago_clientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(termino_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostermino_pago_clientes=jQuery("#tblTablaDatostermino_pago_clientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("termino_pago_cliente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',termino_pago_cliente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			termino_pago_cliente_webcontrol1.registrarControlesTableEdition(termino_pago_cliente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		termino_pago_cliente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(termino_pago_cliente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(termino_pago_cliente_control.termino_pago_clienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(termino_pago_cliente_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(termino_pago_cliente_control) {
		this.actualizarCssBotonesPagina(termino_pago_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(termino_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(termino_pago_cliente_control.tiposReportes,termino_pago_cliente_control.tiposReporte
															 	,termino_pago_cliente_control.tiposPaginacion,termino_pago_cliente_control.tiposAcciones
																,termino_pago_cliente_control.tiposColumnasSelect,termino_pago_cliente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(termino_pago_cliente_control.tiposRelaciones,termino_pago_cliente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(termino_pago_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(termino_pago_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(termino_pago_cliente_control);			
	}
	
	actualizarPaginaAreaBusquedas(termino_pago_cliente_control) {
		jQuery("#divBusquedatermino_pago_clienteAjaxWebPart").css("display",termino_pago_cliente_control.strPermisoBusqueda);
		jQuery("#trtermino_pago_clienteCabeceraBusquedas").css("display",termino_pago_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedatermino_pago_cliente").css("display",termino_pago_cliente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(termino_pago_cliente_control.htmlTablaOrderBy!=null
			&& termino_pago_cliente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytermino_pago_clienteAjaxWebPart").html(termino_pago_cliente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//termino_pago_cliente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(termino_pago_cliente_control.htmlTablaOrderByRel!=null
			&& termino_pago_cliente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltermino_pago_clienteAjaxWebPart").html(termino_pago_cliente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(termino_pago_cliente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatermino_pago_clienteAjaxWebPart").css("display","none");
			jQuery("#trtermino_pago_clienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatermino_pago_cliente").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(termino_pago_cliente_control) {
		jQuery("#tdtermino_pago_clienteNuevo").css("display",termino_pago_cliente_control.strPermisoNuevo);
		jQuery("#trtermino_pago_clienteElementos").css("display",termino_pago_cliente_control.strVisibleTablaElementos);
		jQuery("#trtermino_pago_clienteAcciones").css("display",termino_pago_cliente_control.strVisibleTablaAcciones);
		jQuery("#trtermino_pago_clienteParametrosAcciones").css("display",termino_pago_cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(termino_pago_cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(termino_pago_cliente_control);
				
		if(termino_pago_cliente_control.termino_pago_clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(termino_pago_cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(termino_pago_cliente_control);
	}
	
	actualizarPaginaUsuarioInvitado(termino_pago_cliente_control) {
	
		var indexPosition=termino_pago_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=termino_pago_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(termino_pago_cliente_control) {
		jQuery("#divResumentermino_pago_clienteActualAjaxWebPart").html(termino_pago_cliente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(termino_pago_cliente_control) {
		jQuery("#divAccionesRelacionestermino_pago_clienteAjaxWebPart").html(termino_pago_cliente_control.htmlTablaAccionesRelaciones);
			
		termino_pago_cliente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(termino_pago_cliente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(termino_pago_cliente_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(termino_pago_cliente_control) {
		
		if(termino_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",termino_pago_cliente_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",termino_pago_cliente_control.strVisibleFK_Idcuenta);
		}

		if(termino_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",termino_pago_cliente_control.strVisibleFK_Idcuenta_corriente);
			jQuery("#tblstrVisible"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",termino_pago_cliente_control.strVisibleFK_Idcuenta_corriente);
		}

		if(termino_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",termino_pago_cliente_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",termino_pago_cliente_control.strVisibleFK_Idempresa);
		}

		if(termino_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago").attr("style",termino_pago_cliente_control.strVisibleFK_Idtipo_termino_pago);
			jQuery("#tblstrVisible"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago").attr("style",termino_pago_cliente_control.strVisibleFK_Idtipo_termino_pago);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontermino_pago_cliente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("termino_pago_cliente",id,"cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		termino_pago_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("termino_pago_cliente","empresa","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
	}

	abrirBusquedaParatipo_termino_pago(strNombreCampoBusqueda){//idActual
		termino_pago_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("termino_pago_cliente","tipo_termino_pago","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
	}

	abrirBusquedaParacuenta_corriente(strNombreCampoBusqueda){//idActual
		termino_pago_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("termino_pago_cliente","cuenta_corriente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		termino_pago_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("termino_pago_cliente","cuenta","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(termino_pago_cliente_control) {
	
		jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id").val(termino_pago_cliente_control.termino_pago_clienteActual.id);
		jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-version_row").val(termino_pago_cliente_control.termino_pago_clienteActual.versionRow);
		
		if(termino_pago_cliente_control.termino_pago_clienteActual.id_empresa!=null && termino_pago_cliente_control.termino_pago_clienteActual.id_empresa>-1){
			if(jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val() != termino_pago_cliente_control.termino_pago_clienteActual.id_empresa) {
				jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val(termino_pago_cliente_control.termino_pago_clienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(termino_pago_cliente_control.termino_pago_clienteActual.id_tipo_termino_pago!=null && termino_pago_cliente_control.termino_pago_clienteActual.id_tipo_termino_pago>-1){
			if(jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val() != termino_pago_cliente_control.termino_pago_clienteActual.id_tipo_termino_pago) {
				jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val(termino_pago_cliente_control.termino_pago_clienteActual.id_tipo_termino_pago).trigger("change");
			}
		} else { 
			//jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_termino_pago").select2("val", null);
			if(jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-codigo").val(termino_pago_cliente_control.termino_pago_clienteActual.codigo);
		jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-descripcion").val(termino_pago_cliente_control.termino_pago_clienteActual.descripcion);
		jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-monto").val(termino_pago_cliente_control.termino_pago_clienteActual.monto);
		jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-dias").val(termino_pago_cliente_control.termino_pago_clienteActual.dias);
		jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-inicial").val(termino_pago_cliente_control.termino_pago_clienteActual.inicial);
		jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-cuotas").val(termino_pago_cliente_control.termino_pago_clienteActual.cuotas);
		jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-descuento_pronto_pago").val(termino_pago_cliente_control.termino_pago_clienteActual.descuento_pronto_pago);
		jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-predeterminado").prop('checked',termino_pago_cliente_control.termino_pago_clienteActual.predeterminado);
		
		if(termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta_corriente!=null && termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta_corriente>-1){
			if(jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta_corriente) {
				jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta_corriente").select2("val", null);
			if(jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta!=null && termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta>-1){
			if(jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val() != termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta) {
				jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val(termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").select2("val", null);
			if(jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-cuenta_contable").val(termino_pago_cliente_control.termino_pago_clienteActual.cuenta_contable);
		jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-cuenta_corriente_codigo").val(termino_pago_cliente_control.termino_pago_clienteActual.cuenta_corriente_codigo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+termino_pago_cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("termino_pago_cliente","cuentascobrar","","form_termino_pago_cliente",formulario,"","",paraEventoTabla,idFilaTabla,termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
	}
	
	cargarCombosFK(termino_pago_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(termino_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_cliente_control.strRecargarFkTipos,",")) { 
				termino_pago_cliente_webcontrol1.cargarCombosempresasFK(termino_pago_cliente_control);
			}

			if(termino_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_cliente_control.strRecargarFkTipos,",")) { 
				termino_pago_cliente_webcontrol1.cargarCombostipo_termino_pagosFK(termino_pago_cliente_control);
			}

			if(termino_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",termino_pago_cliente_control.strRecargarFkTipos,",")) { 
				termino_pago_cliente_webcontrol1.cargarComboscuenta_corrientesFK(termino_pago_cliente_control);
			}

			if(termino_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_cliente_control.strRecargarFkTipos,",")) { 
				termino_pago_cliente_webcontrol1.cargarComboscuentasFK(termino_pago_cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(termino_pago_cliente_control.strRecargarFkTiposNinguno!=null && termino_pago_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && termino_pago_cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(termino_pago_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_cliente_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_cliente_webcontrol1.cargarCombosempresasFK(termino_pago_cliente_control);
				}

				if(termino_pago_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_cliente_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_cliente_webcontrol1.cargarCombostipo_termino_pagosFK(termino_pago_cliente_control);
				}

				if(termino_pago_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",termino_pago_cliente_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_cliente_webcontrol1.cargarComboscuenta_corrientesFK(termino_pago_cliente_control);
				}

				if(termino_pago_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_cliente_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_cliente_webcontrol1.cargarComboscuentasFK(termino_pago_cliente_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(termino_pago_cliente_control) {
		jQuery("#spanstrMensajeid").text(termino_pago_cliente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(termino_pago_cliente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(termino_pago_cliente_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_tipo_termino_pago").text(termino_pago_cliente_control.strMensajeid_tipo_termino_pago);		
		jQuery("#spanstrMensajecodigo").text(termino_pago_cliente_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(termino_pago_cliente_control.strMensajedescripcion);		
		jQuery("#spanstrMensajemonto").text(termino_pago_cliente_control.strMensajemonto);		
		jQuery("#spanstrMensajedias").text(termino_pago_cliente_control.strMensajedias);		
		jQuery("#spanstrMensajeinicial").text(termino_pago_cliente_control.strMensajeinicial);		
		jQuery("#spanstrMensajecuotas").text(termino_pago_cliente_control.strMensajecuotas);		
		jQuery("#spanstrMensajedescuento_pronto_pago").text(termino_pago_cliente_control.strMensajedescuento_pronto_pago);		
		jQuery("#spanstrMensajepredeterminado").text(termino_pago_cliente_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta_corriente").text(termino_pago_cliente_control.strMensajeid_cuenta_corriente);		
		jQuery("#spanstrMensajeid_cuenta").text(termino_pago_cliente_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajecuenta_contable").text(termino_pago_cliente_control.strMensajecuenta_contable);		
		jQuery("#spanstrMensajecuenta_corriente_codigo").text(termino_pago_cliente_control.strMensajecuenta_corriente_codigo);		
	}
	
	actualizarCssBotonesMantenimiento(termino_pago_cliente_control) {
		jQuery("#tdbtnNuevotermino_pago_cliente").css("visibility",termino_pago_cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotermino_pago_cliente").css("display",termino_pago_cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartermino_pago_cliente").css("visibility",termino_pago_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartermino_pago_cliente").css("display",termino_pago_cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartermino_pago_cliente").css("visibility",termino_pago_cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartermino_pago_cliente").css("display",termino_pago_cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartermino_pago_cliente").css("visibility",termino_pago_cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostermino_pago_cliente").css("visibility",termino_pago_cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostermino_pago_cliente").css("display",termino_pago_cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartermino_pago_cliente").css("visibility",termino_pago_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartermino_pago_cliente").css("visibility",termino_pago_cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartermino_pago_cliente").css("visibility",termino_pago_cliente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionestimado").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionParaestimados(idActual);
		});
		jQuery("#imgdivrelacionfactura").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionParafacturas(idActual);
		});
		jQuery("#imgdivrelacionconsignacion").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionParaconsignaciones(idActual);
		});
		jQuery("#imgdivrelacionfactura_lote").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionParafactura_lotees(idActual);
		});
		jQuery("#imgdivrelaciondevolucion_factura").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionparametro_facturacion").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionParaparametro_facturacions(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_tipo_termino_pago") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_termino_pago" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.termino_pago_clienteActual.NONE!=null){
					if(jQuery("#form-NONE").val() != objetoController.termino_pago_clienteActual.NONE) {
						jQuery("#form-NONE").val(objetoController.termino_pago_clienteActual.NONE).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(termino_pago_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_cliente_funcion1,termino_pago_cliente_control.empresasFK);
	}

	cargarComboEditarTablatipo_termino_pagoFK(termino_pago_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_cliente_funcion1,termino_pago_cliente_control.tipo_termino_pagosFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(termino_pago_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_cliente_funcion1,termino_pago_cliente_control.cuenta_corrientesFK);
	}

	cargarComboEditarTablacuentaFK(termino_pago_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_cliente_funcion1,termino_pago_cliente_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(termino_pago_cliente_control) {
		var i=0;
		
		i=termino_pago_cliente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(termino_pago_cliente_control.termino_pago_clienteActual.id);
		jQuery("#t-version_row_"+i+"").val(termino_pago_cliente_control.termino_pago_clienteActual.versionRow);
		
		if(termino_pago_cliente_control.termino_pago_clienteActual.id_empresa!=null && termino_pago_cliente_control.termino_pago_clienteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != termino_pago_cliente_control.termino_pago_clienteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(termino_pago_cliente_control.termino_pago_clienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(termino_pago_cliente_control.termino_pago_clienteActual.id_tipo_termino_pago!=null && termino_pago_cliente_control.termino_pago_clienteActual.id_tipo_termino_pago>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != termino_pago_cliente_control.termino_pago_clienteActual.id_tipo_termino_pago) {
				jQuery("#t-cel_"+i+"_3").val(termino_pago_cliente_control.termino_pago_clienteActual.id_tipo_termino_pago).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(termino_pago_cliente_control.termino_pago_clienteActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(termino_pago_cliente_control.termino_pago_clienteActual.descripcion);
		jQuery("#t-cel_"+i+"_6").val(termino_pago_cliente_control.termino_pago_clienteActual.monto);
		jQuery("#t-cel_"+i+"_7").val(termino_pago_cliente_control.termino_pago_clienteActual.dias);
		jQuery("#t-cel_"+i+"_8").val(termino_pago_cliente_control.termino_pago_clienteActual.inicial);
		jQuery("#t-cel_"+i+"_9").val(termino_pago_cliente_control.termino_pago_clienteActual.cuotas);
		jQuery("#t-cel_"+i+"_10").val(termino_pago_cliente_control.termino_pago_clienteActual.descuento_pronto_pago);
		jQuery("#t-cel_"+i+"_11").prop('checked',termino_pago_cliente_control.termino_pago_clienteActual.predeterminado);
		
		if(termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta_corriente!=null && termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta_corriente>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta_corriente) {
				jQuery("#t-cel_"+i+"_12").val(termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta!=null && termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_13").val(termino_pago_cliente_control.termino_pago_clienteActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(termino_pago_cliente_control.termino_pago_clienteActual.cuenta_contable);
		jQuery("#t-cel_"+i+"_15").val(termino_pago_cliente_control.termino_pago_clienteActual.cuenta_corriente_codigo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(termino_pago_cliente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionestimado").click(function(){
		jQuery("#tblTablaDatostermino_pago_clientes").on("click",".imgrelacionestimado", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionParaestimados(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura").click(function(){
		jQuery("#tblTablaDatostermino_pago_clientes").on("click",".imgrelacionfactura", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionParafacturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionconsignacionid_termino_pago").click(function(){
		jQuery("#tblTablaDatostermino_pago_clientes").on("click",".imgrelacionconsignacionid_termino_pago", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionid_termino_pagoParaconsignaciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura_loteid_termino_pago").click(function(){
		jQuery("#tblTablaDatostermino_pago_clientes").on("click",".imgrelacionfactura_loteid_termino_pago", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionid_termino_pagoParafactura_lotees(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion_factura").click(function(){
		jQuery("#tblTablaDatostermino_pago_clientes").on("click",".imgrelaciondevolucion_factura", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatostermino_pago_clientes").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionparametro_facturacion").click(function(){
		jQuery("#tblTablaDatostermino_pago_clientes").on("click",".imgrelacionparametro_facturacion", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_cliente");

			termino_pago_cliente_webcontrol1.registrarSesionParaparametro_facturacions(idActual);
		});				
	}
		
	

	registrarSesionParaestimados(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_cliente","estimado","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,"s","");
	}

	registrarSesionParafacturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_cliente","factura","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,"s","");
	}

	registrarSesionid_termino_pagoParaconsignaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_cliente","consignacion","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,"es","id_termino_pago");
	}

	registrarSesionid_termino_pagoParafactura_lotees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_cliente","factura_lote","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,"es","id_termino_pago");
	}

	registrarSesionParadevolucion_facturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_cliente","devolucion_factura","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,"s","");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_cliente","cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,"s","");
	}

	registrarSesionParaparametro_facturacions(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_cliente","parametro_facturacion","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(termino_pago_cliente_control) {
		termino_pago_cliente_funcion1.registrarControlesTableValidacionEdition(termino_pago_cliente_control,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_clienteConstante,strParametros);
		
		//termino_pago_cliente_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(termino_pago_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_empresa",termino_pago_cliente_control.empresasFK);

		if(termino_pago_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_cliente_control.idFilaTablaActual+"_2",termino_pago_cliente_control.empresasFK);
		}
	};

	cargarCombostipo_termino_pagosFK(termino_pago_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_termino_pago",termino_pago_cliente_control.tipo_termino_pagosFK);

		if(termino_pago_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_cliente_control.idFilaTablaActual+"_3",termino_pago_cliente_control.tipo_termino_pagosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago",termino_pago_cliente_control.tipo_termino_pagosFK);

	};

	cargarComboscuenta_corrientesFK(termino_pago_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta_corriente",termino_pago_cliente_control.cuenta_corrientesFK);

		if(termino_pago_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_cliente_control.idFilaTablaActual+"_12",termino_pago_cliente_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",termino_pago_cliente_control.cuenta_corrientesFK);

	};

	cargarComboscuentasFK(termino_pago_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta",termino_pago_cliente_control.cuentasFK);

		if(termino_pago_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_cliente_control.idFilaTablaActual+"_13",termino_pago_cliente_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",termino_pago_cliente_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(termino_pago_cliente_control) {

	};

	registrarComboActionChangeCombostipo_termino_pagosFK(termino_pago_cliente_control) {
		this.registrarComboActionChangeid_tipo_termino_pago("form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_termino_pago",false,0);


		this.registrarComboActionChangeid_tipo_termino_pago(""+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago",false,0);


	};

	registrarComboActionChangeComboscuenta_corrientesFK(termino_pago_cliente_control) {

	};

	registrarComboActionChangeComboscuentasFK(termino_pago_cliente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(termino_pago_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_cliente_control.idempresaDefaultFK>-1 && jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val() != termino_pago_cliente_control.idempresaDefaultFK) {
				jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val(termino_pago_cliente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_termino_pagosFK(termino_pago_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_cliente_control.idtipo_termino_pagoDefaultFK>-1 && jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val() != termino_pago_cliente_control.idtipo_termino_pagoDefaultFK) {
				jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val(termino_pago_cliente_control.idtipo_termino_pagoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago").val(termino_pago_cliente_control.idtipo_termino_pagoDefaultForeignKey).trigger("change");
			if(jQuery("#"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(termino_pago_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_cliente_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != termino_pago_cliente_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(termino_pago_cliente_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(termino_pago_cliente_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(termino_pago_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_cliente_control.idcuentaDefaultFK>-1 && jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val() != termino_pago_cliente_control.idcuentaDefaultFK) {
				jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val(termino_pago_cliente_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(termino_pago_cliente_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+termino_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_tipo_termino_pago(id_tipo_termino_pago,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("termino_pago_cliente","cuentascobrar","","id_tipo_termino_pago",id_tipo_termino_pago,"","",paraEventoTabla,idFilaTabla,termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//termino_pago_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(termino_pago_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(termino_pago_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(termino_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_cliente_control.strRecargarFkTipos,",")) { 
				termino_pago_cliente_webcontrol1.setDefectoValorCombosempresasFK(termino_pago_cliente_control);
			}

			if(termino_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_cliente_control.strRecargarFkTipos,",")) { 
				termino_pago_cliente_webcontrol1.setDefectoValorCombostipo_termino_pagosFK(termino_pago_cliente_control);
			}

			if(termino_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",termino_pago_cliente_control.strRecargarFkTipos,",")) { 
				termino_pago_cliente_webcontrol1.setDefectoValorComboscuenta_corrientesFK(termino_pago_cliente_control);
			}

			if(termino_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_cliente_control.strRecargarFkTipos,",")) { 
				termino_pago_cliente_webcontrol1.setDefectoValorComboscuentasFK(termino_pago_cliente_control);
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
	onLoadCombosEventosFK(termino_pago_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(termino_pago_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(termino_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_cliente_webcontrol1.registrarComboActionChangeCombosempresasFK(termino_pago_cliente_control);
			//}

			//if(termino_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_cliente_webcontrol1.registrarComboActionChangeCombostipo_termino_pagosFK(termino_pago_cliente_control);
			//}

			//if(termino_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",termino_pago_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_cliente_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(termino_pago_cliente_control);
			//}

			//if(termino_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_cliente_webcontrol1.registrarComboActionChangeComboscuentasFK(termino_pago_cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(termino_pago_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(termino_pago_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(termino_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("termino_pago_cliente");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("termino_pago_cliente");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(termino_pago_cliente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);			
			
			if(termino_pago_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,"termino_pago_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				termino_pago_cliente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_termino_pago","id_tipo_termino_pago","general","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_termino_pago_img_busqueda").click(function(){
				termino_pago_cliente_webcontrol1.abrirBusquedaParatipo_termino_pago("id_tipo_termino_pago");
				//alert(jQuery('#form-id_tipo_termino_pago_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				termino_pago_cliente_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				termino_pago_cliente_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("termino_pago_cliente","FK_Idcuenta","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("termino_pago_cliente","FK_Idcuenta_corriente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("termino_pago_cliente","FK_Idempresa","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("termino_pago_cliente","FK_Idtipo_termino_pago","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("termino_pago_cliente");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			termino_pago_cliente_funcion1.validarFormularioJQuery(termino_pago_cliente_constante1);
			
			if(termino_pago_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(termino_pago_cliente_control) {
		
		jQuery("#divBusquedatermino_pago_clienteAjaxWebPart").css("display",termino_pago_cliente_control.strPermisoBusqueda);
		jQuery("#trtermino_pago_clienteCabeceraBusquedas").css("display",termino_pago_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedatermino_pago_cliente").css("display",termino_pago_cliente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetermino_pago_cliente").css("display",termino_pago_cliente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostermino_pago_cliente").attr("style",termino_pago_cliente_control.strPermisoMostrarTodos);
		
		if(termino_pago_cliente_control.strPermisoNuevo!=null) {
			jQuery("#tdtermino_pago_clienteNuevo").css("display",termino_pago_cliente_control.strPermisoNuevo);
			jQuery("#tdtermino_pago_clienteNuevoToolBar").css("display",termino_pago_cliente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtermino_pago_clienteDuplicar").css("display",termino_pago_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtermino_pago_clienteDuplicarToolBar").css("display",termino_pago_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtermino_pago_clienteNuevoGuardarCambios").css("display",termino_pago_cliente_control.strPermisoNuevo);
			jQuery("#tdtermino_pago_clienteNuevoGuardarCambiosToolBar").css("display",termino_pago_cliente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(termino_pago_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdtermino_pago_clienteActualizarToolBar").css("display",termino_pago_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtermino_pago_clienteCopiar").css("display",termino_pago_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtermino_pago_clienteCopiarToolBar").css("display",termino_pago_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtermino_pago_clienteConEditar").css("display",termino_pago_cliente_control.strPermisoActualizar);
		}
		
		jQuery("#tdtermino_pago_clienteEliminarToolBar").css("display",termino_pago_cliente_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdtermino_pago_clienteGuardarCambios").css("display",termino_pago_cliente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtermino_pago_clienteGuardarCambiosToolBar").css("display",termino_pago_cliente_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trtermino_pago_clienteElementos").css("display",termino_pago_cliente_control.strVisibleTablaElementos);
		
		jQuery("#trtermino_pago_clienteAcciones").css("display",termino_pago_cliente_control.strVisibleTablaAcciones);
		jQuery("#trtermino_pago_clienteParametrosAcciones").css("display",termino_pago_cliente_control.strVisibleTablaAcciones);
			
		jQuery("#tdtermino_pago_clienteCerrarPagina").css("display",termino_pago_cliente_control.strPermisoPopup);		
		jQuery("#tdtermino_pago_clienteCerrarPaginaToolBar").css("display",termino_pago_cliente_control.strPermisoPopup);
		//jQuery("#trtermino_pago_clienteAccionesRelaciones").css("display",termino_pago_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		termino_pago_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		termino_pago_cliente_webcontrol1.registrarEventosControles();
		
		if(termino_pago_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(termino_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
			termino_pago_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(termino_pago_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(termino_pago_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				termino_pago_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(termino_pago_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(termino_pago_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				termino_pago_cliente_webcontrol1.onLoad();
				
			} else {
				if(termino_pago_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
					if(termino_pago_cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
						//termino_pago_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(termino_pago_cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(termino_pago_cliente_constante1.BIG_ID_ACTUAL,"termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);
						//termino_pago_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			termino_pago_cliente_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("termino_pago_cliente","cuentascobrar","",termino_pago_cliente_funcion1,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var termino_pago_cliente_webcontrol1=new termino_pago_cliente_webcontrol();

if(termino_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = termino_pago_cliente_webcontrol1.onLoadWindow; 
}

//</script>