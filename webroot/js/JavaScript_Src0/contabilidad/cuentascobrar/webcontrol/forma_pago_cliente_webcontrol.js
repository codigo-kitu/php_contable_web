//<script type="text/javascript" language="javascript">



//var forma_pago_clienteJQueryPaginaWebInteraccion= function (forma_pago_cliente_control) {
//this.,this.,this.

class forma_pago_cliente_webcontrol extends forma_pago_cliente_webcontrol_add {
	
	forma_pago_cliente_control=null;
	forma_pago_cliente_controlInicial=null;
	forma_pago_cliente_controlAuxiliar=null;
		
	//if(forma_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(forma_pago_cliente_control) {
		super();
		
		this.forma_pago_cliente_control=forma_pago_cliente_control;
	}
		
	actualizarVariablesPagina(forma_pago_cliente_control) {
		
		if(forma_pago_cliente_control.action=="index" || forma_pago_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(forma_pago_cliente_control);
			
		} else if(forma_pago_cliente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(forma_pago_cliente_control);
			
		} else if(forma_pago_cliente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(forma_pago_cliente_control);
			
		} else if(forma_pago_cliente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(forma_pago_cliente_control);		
		
		} else if(forma_pago_cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(forma_pago_cliente_control);		
		
		} else if(forma_pago_cliente_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(forma_pago_cliente_control);		
		
		} else if(forma_pago_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(forma_pago_cliente_control);		
		}
		else if(forma_pago_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(forma_pago_cliente_control);		
		}
		else if(forma_pago_cliente_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(forma_pago_cliente_control);		
		}
		else if(forma_pago_cliente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(forma_pago_cliente_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(forma_pago_cliente_control.action + " Revisar Manejo");
			
			if(forma_pago_cliente_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(forma_pago_cliente_control);
				
				return;
			}
			
			//if(forma_pago_cliente_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(forma_pago_cliente_control);
			//}
			
			if(forma_pago_cliente_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(forma_pago_cliente_control);
			}
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && forma_pago_cliente_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(forma_pago_cliente_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(forma_pago_cliente_control, false);			
			}
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(forma_pago_cliente_control);	
			}
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(forma_pago_cliente_control);
			}
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(forma_pago_cliente_control);
			}
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);
			}
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(forma_pago_cliente_control);	
			}
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
			}
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(forma_pago_cliente_control);
			}
			
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(forma_pago_cliente_control);			
			}
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(forma_pago_cliente_control);
			}
			
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(forma_pago_cliente_control);
			}
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(forma_pago_cliente_control);
			}				
			
			if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(forma_pago_cliente_control);
			}
			
			if(forma_pago_cliente_control.usuarioActual!=null && forma_pago_cliente_control.usuarioActual.field_strUserName!=null &&
			forma_pago_cliente_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(forma_pago_cliente_control);			
			}
		}
		
		
		if(forma_pago_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(forma_pago_cliente_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(forma_pago_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(forma_pago_cliente_control);
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);
		this.actualizarPaginaCargaGeneralControles(forma_pago_cliente_control);
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(forma_pago_cliente_control);
		this.actualizarPaginaAreaBusquedas(forma_pago_cliente_control);
		this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(forma_pago_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(forma_pago_cliente_control);
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);
		this.actualizarPaginaCargaGeneralControles(forma_pago_cliente_control);
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(forma_pago_cliente_control);
		this.actualizarPaginaAreaBusquedas(forma_pago_cliente_control);
		this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);		
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);		
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);		
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(forma_pago_cliente_control) {
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(forma_pago_cliente_control) {
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(forma_pago_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(forma_pago_cliente_control);
		this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(forma_pago_cliente_control) {
		this.actualizarPaginaAbrirLink(forma_pago_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);				
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);
		this.actualizarPaginaFormulario(forma_pago_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);
		this.actualizarPaginaFormulario(forma_pago_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(forma_pago_cliente_control) {
		this.actualizarPaginaFormulario(forma_pago_cliente_control);
		this.onLoadCombosDefectoFK(forma_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);
		this.actualizarPaginaFormulario(forma_pago_cliente_control);
		this.onLoadCombosDefectoFK(forma_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(forma_pago_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(forma_pago_cliente_control);
		this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);
		this.actualizarPaginaFormulario(forma_pago_cliente_control);
		this.onLoadCombosDefectoFK(forma_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(forma_pago_cliente_control) {
		this.actualizarPaginaAbrirLink(forma_pago_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(forma_pago_cliente_control) {
		this.actualizarPaginaImprimir(forma_pago_cliente_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(forma_pago_cliente_control) {
		this.actualizarPaginaImprimir(forma_pago_cliente_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(forma_pago_cliente_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(forma_pago_cliente_control) {
		//FORMULARIO
		if(forma_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(forma_pago_cliente_control);
			this.actualizarPaginaFormularioAdd(forma_pago_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		//COMBOS FK
		if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(forma_pago_cliente_control) {
		//FORMULARIO
		if(forma_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(forma_pago_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);	
		//COMBOS FK
		if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);
		this.actualizarPaginaFormulario(forma_pago_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(forma_pago_cliente_control) {
		//FORMULARIO
		if(forma_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(forma_pago_cliente_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(forma_pago_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);	
		//COMBOS FK
		if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(forma_pago_cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(forma_pago_cliente_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control) {
		if(forma_pago_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && forma_pago_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(forma_pago_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(forma_pago_cliente_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(forma_pago_cliente_control) {
		if(forma_pago_cliente_funcion1.esPaginaForm()==true) {
			window.opener.forma_pago_cliente_webcontrol1.actualizarPaginaTablaDatos(forma_pago_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(forma_pago_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(forma_pago_cliente_control) {
		forma_pago_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(forma_pago_cliente_control.strAuxiliarUrlPagina);
				
		forma_pago_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(forma_pago_cliente_control.strAuxiliarTipo,forma_pago_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(forma_pago_cliente_control) {
		forma_pago_cliente_funcion1.resaltarRestaurarDivMensaje(true,forma_pago_cliente_control.strAuxiliarMensajeAlert,forma_pago_cliente_control.strAuxiliarCssMensaje);
			
		if(forma_pago_cliente_funcion1.esPaginaForm()==true) {
			window.opener.forma_pago_cliente_funcion1.resaltarRestaurarDivMensaje(true,forma_pago_cliente_control.strAuxiliarMensajeAlert,forma_pago_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(forma_pago_cliente_control) {
		eval(forma_pago_cliente_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(forma_pago_cliente_control, mostrar) {
		
		if(mostrar==true) {
			forma_pago_cliente_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				forma_pago_cliente_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			forma_pago_cliente_funcion1.mostrarDivMensaje(true,forma_pago_cliente_control.strAuxiliarMensaje,forma_pago_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			forma_pago_cliente_funcion1.mostrarDivMensaje(false,forma_pago_cliente_control.strAuxiliarMensaje,forma_pago_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(forma_pago_cliente_control) {
	
		funcionGeneral.printWebPartPage("forma_pago_cliente",forma_pago_cliente_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarforma_pago_clientesAjaxWebPart").html(forma_pago_cliente_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("forma_pago_cliente",jQuery("#divTablaDatosReporteAuxiliarforma_pago_clientesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(forma_pago_cliente_control) {
		this.forma_pago_cliente_controlInicial=forma_pago_cliente_control;
			
		if(forma_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(forma_pago_cliente_control.strStyleDivArbol,forma_pago_cliente_control.strStyleDivContent
																,forma_pago_cliente_control.strStyleDivOpcionesBanner,forma_pago_cliente_control.strStyleDivExpandirColapsar
																,forma_pago_cliente_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=forma_pago_cliente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",forma_pago_cliente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(forma_pago_cliente_control) {
		jQuery("#divTablaDatosforma_pago_clientesAjaxWebPart").html(forma_pago_cliente_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosforma_pago_clientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(forma_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosforma_pago_clientes=jQuery("#tblTablaDatosforma_pago_clientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("forma_pago_cliente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',forma_pago_cliente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			forma_pago_cliente_webcontrol1.registrarControlesTableEdition(forma_pago_cliente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		forma_pago_cliente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(forma_pago_cliente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(forma_pago_cliente_control.forma_pago_clienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(forma_pago_cliente_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(forma_pago_cliente_control) {
		this.actualizarCssBotonesPagina(forma_pago_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(forma_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(forma_pago_cliente_control.tiposReportes,forma_pago_cliente_control.tiposReporte
															 	,forma_pago_cliente_control.tiposPaginacion,forma_pago_cliente_control.tiposAcciones
																,forma_pago_cliente_control.tiposColumnasSelect,forma_pago_cliente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(forma_pago_cliente_control.tiposRelaciones,forma_pago_cliente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(forma_pago_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(forma_pago_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(forma_pago_cliente_control);			
	}
	
	actualizarPaginaAreaBusquedas(forma_pago_cliente_control) {
		jQuery("#divBusquedaforma_pago_clienteAjaxWebPart").css("display",forma_pago_cliente_control.strPermisoBusqueda);
		jQuery("#trforma_pago_clienteCabeceraBusquedas").css("display",forma_pago_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedaforma_pago_cliente").css("display",forma_pago_cliente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(forma_pago_cliente_control.htmlTablaOrderBy!=null
			&& forma_pago_cliente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByforma_pago_clienteAjaxWebPart").html(forma_pago_cliente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//forma_pago_cliente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(forma_pago_cliente_control.htmlTablaOrderByRel!=null
			&& forma_pago_cliente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelforma_pago_clienteAjaxWebPart").html(forma_pago_cliente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(forma_pago_cliente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaforma_pago_clienteAjaxWebPart").css("display","none");
			jQuery("#trforma_pago_clienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaforma_pago_cliente").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(forma_pago_cliente_control) {
		jQuery("#tdforma_pago_clienteNuevo").css("display",forma_pago_cliente_control.strPermisoNuevo);
		jQuery("#trforma_pago_clienteElementos").css("display",forma_pago_cliente_control.strVisibleTablaElementos);
		jQuery("#trforma_pago_clienteAcciones").css("display",forma_pago_cliente_control.strVisibleTablaAcciones);
		jQuery("#trforma_pago_clienteParametrosAcciones").css("display",forma_pago_cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(forma_pago_cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(forma_pago_cliente_control);
				
		if(forma_pago_cliente_control.forma_pago_clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(forma_pago_cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(forma_pago_cliente_control);
	}
	
	actualizarPaginaUsuarioInvitado(forma_pago_cliente_control) {
	
		var indexPosition=forma_pago_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=forma_pago_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(forma_pago_cliente_control) {
		jQuery("#divResumenforma_pago_clienteActualAjaxWebPart").html(forma_pago_cliente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(forma_pago_cliente_control) {
		jQuery("#divAccionesRelacionesforma_pago_clienteAjaxWebPart").html(forma_pago_cliente_control.htmlTablaAccionesRelaciones);
			
		forma_pago_cliente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(forma_pago_cliente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(forma_pago_cliente_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(forma_pago_cliente_control) {
		
		if(forma_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",forma_pago_cliente_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",forma_pago_cliente_control.strVisibleFK_Idcuenta);
		}

		if(forma_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",forma_pago_cliente_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",forma_pago_cliente_control.strVisibleFK_Idempresa);
		}

		if(forma_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago").attr("style",forma_pago_cliente_control.strVisibleFK_Idtipo_forma_pago);
			jQuery("#tblstrVisible"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago").attr("style",forma_pago_cliente_control.strVisibleFK_Idtipo_forma_pago);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionforma_pago_cliente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("forma_pago_cliente",id,"cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		forma_pago_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("forma_pago_cliente","empresa","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
	}

	abrirBusquedaParatipo_forma_pago(strNombreCampoBusqueda){//idActual
		forma_pago_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("forma_pago_cliente","tipo_forma_pago","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		forma_pago_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("forma_pago_cliente","cuenta","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(forma_pago_cliente_control) {
	
		jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id").val(forma_pago_cliente_control.forma_pago_clienteActual.id);
		jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-version_row").val(forma_pago_cliente_control.forma_pago_clienteActual.versionRow);
		
		if(forma_pago_cliente_control.forma_pago_clienteActual.id_empresa!=null && forma_pago_cliente_control.forma_pago_clienteActual.id_empresa>-1){
			if(jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val() != forma_pago_cliente_control.forma_pago_clienteActual.id_empresa) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val(forma_pago_cliente_control.forma_pago_clienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(forma_pago_cliente_control.forma_pago_clienteActual.id_tipo_forma_pago!=null && forma_pago_cliente_control.forma_pago_clienteActual.id_tipo_forma_pago>-1){
			if(jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val() != forma_pago_cliente_control.forma_pago_clienteActual.id_tipo_forma_pago) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val(forma_pago_cliente_control.forma_pago_clienteActual.id_tipo_forma_pago).trigger("change");
			}
		} else { 
			//jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").select2("val", null);
			if(jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-codigo").val(forma_pago_cliente_control.forma_pago_clienteActual.codigo);
		jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-nombre").val(forma_pago_cliente_control.forma_pago_clienteActual.nombre);
		jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-predeterminado").prop('checked',forma_pago_cliente_control.forma_pago_clienteActual.predeterminado);
		
		if(forma_pago_cliente_control.forma_pago_clienteActual.id_cuenta!=null && forma_pago_cliente_control.forma_pago_clienteActual.id_cuenta>-1){
			if(jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val() != forma_pago_cliente_control.forma_pago_clienteActual.id_cuenta) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val(forma_pago_cliente_control.forma_pago_clienteActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-cuenta_contable").val(forma_pago_cliente_control.forma_pago_clienteActual.cuenta_contable);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+forma_pago_cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("forma_pago_cliente","cuentascobrar","","form_forma_pago_cliente",formulario,"","",paraEventoTabla,idFilaTabla,forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
	}
	
	cargarCombosFK(forma_pago_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_cliente_control.strRecargarFkTipos,",")) { 
				forma_pago_cliente_webcontrol1.cargarCombosempresasFK(forma_pago_cliente_control);
			}

			if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_cliente_control.strRecargarFkTipos,",")) { 
				forma_pago_cliente_webcontrol1.cargarCombostipo_forma_pagosFK(forma_pago_cliente_control);
			}

			if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_cliente_control.strRecargarFkTipos,",")) { 
				forma_pago_cliente_webcontrol1.cargarComboscuentasFK(forma_pago_cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(forma_pago_cliente_control.strRecargarFkTiposNinguno!=null && forma_pago_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && forma_pago_cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(forma_pago_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_cliente_control.strRecargarFkTiposNinguno,",")) { 
					forma_pago_cliente_webcontrol1.cargarCombosempresasFK(forma_pago_cliente_control);
				}

				if(forma_pago_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_cliente_control.strRecargarFkTiposNinguno,",")) { 
					forma_pago_cliente_webcontrol1.cargarCombostipo_forma_pagosFK(forma_pago_cliente_control);
				}

				if(forma_pago_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_cliente_control.strRecargarFkTiposNinguno,",")) { 
					forma_pago_cliente_webcontrol1.cargarComboscuentasFK(forma_pago_cliente_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(forma_pago_cliente_control) {
		jQuery("#spanstrMensajeid").text(forma_pago_cliente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(forma_pago_cliente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(forma_pago_cliente_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_tipo_forma_pago").text(forma_pago_cliente_control.strMensajeid_tipo_forma_pago);		
		jQuery("#spanstrMensajecodigo").text(forma_pago_cliente_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(forma_pago_cliente_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(forma_pago_cliente_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta").text(forma_pago_cliente_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajecuenta_contable").text(forma_pago_cliente_control.strMensajecuenta_contable);		
	}
	
	actualizarCssBotonesMantenimiento(forma_pago_cliente_control) {
		jQuery("#tdbtnNuevoforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoforma_pago_cliente").css("display",forma_pago_cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarforma_pago_cliente").css("display",forma_pago_cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarforma_pago_cliente").css("display",forma_pago_cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosforma_pago_cliente").css("display",forma_pago_cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciondocumento_cuenta_cobrar").click(function(){

			var idActual=jQuery(this).attr("idactualforma_pago_cliente");

			forma_pago_cliente_webcontrol1.registrarSesionParadocumento_cuenta_cobrares(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(forma_pago_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,forma_pago_cliente_funcion1,forma_pago_cliente_control.empresasFK);
	}

	cargarComboEditarTablatipo_forma_pagoFK(forma_pago_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,forma_pago_cliente_funcion1,forma_pago_cliente_control.tipo_forma_pagosFK);
	}

	cargarComboEditarTablacuentaFK(forma_pago_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,forma_pago_cliente_funcion1,forma_pago_cliente_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(forma_pago_cliente_control) {
		var i=0;
		
		i=forma_pago_cliente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(forma_pago_cliente_control.forma_pago_clienteActual.id);
		jQuery("#t-version_row_"+i+"").val(forma_pago_cliente_control.forma_pago_clienteActual.versionRow);
		
		if(forma_pago_cliente_control.forma_pago_clienteActual.id_empresa!=null && forma_pago_cliente_control.forma_pago_clienteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != forma_pago_cliente_control.forma_pago_clienteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(forma_pago_cliente_control.forma_pago_clienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(forma_pago_cliente_control.forma_pago_clienteActual.id_tipo_forma_pago!=null && forma_pago_cliente_control.forma_pago_clienteActual.id_tipo_forma_pago>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != forma_pago_cliente_control.forma_pago_clienteActual.id_tipo_forma_pago) {
				jQuery("#t-cel_"+i+"_3").val(forma_pago_cliente_control.forma_pago_clienteActual.id_tipo_forma_pago).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(forma_pago_cliente_control.forma_pago_clienteActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(forma_pago_cliente_control.forma_pago_clienteActual.nombre);
		jQuery("#t-cel_"+i+"_6").prop('checked',forma_pago_cliente_control.forma_pago_clienteActual.predeterminado);
		
		if(forma_pago_cliente_control.forma_pago_clienteActual.id_cuenta!=null && forma_pago_cliente_control.forma_pago_clienteActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != forma_pago_cliente_control.forma_pago_clienteActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_7").val(forma_pago_cliente_control.forma_pago_clienteActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_7").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(forma_pago_cliente_control.forma_pago_clienteActual.cuenta_contable);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(forma_pago_cliente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondocumento_cuenta_cobrar").click(function(){
		jQuery("#tblTablaDatosforma_pago_clientes").on("click",".imgrelaciondocumento_cuenta_cobrar", function () {

			var idActual=jQuery(this).attr("idactualforma_pago_cliente");

			forma_pago_cliente_webcontrol1.registrarSesionParadocumento_cuenta_cobrares(idActual);
		});				
	}
		
	

	registrarSesionParadocumento_cuenta_cobrares(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"forma_pago_cliente","documento_cuenta_cobrar","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(forma_pago_cliente_control) {
		forma_pago_cliente_funcion1.registrarControlesTableValidacionEdition(forma_pago_cliente_control,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_clienteConstante,strParametros);
		
		//forma_pago_cliente_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(forma_pago_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa",forma_pago_cliente_control.empresasFK);

		if(forma_pago_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+forma_pago_cliente_control.idFilaTablaActual+"_2",forma_pago_cliente_control.empresasFK);
		}
	};

	cargarCombostipo_forma_pagosFK(forma_pago_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago",forma_pago_cliente_control.tipo_forma_pagosFK);

		if(forma_pago_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+forma_pago_cliente_control.idFilaTablaActual+"_3",forma_pago_cliente_control.tipo_forma_pagosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago",forma_pago_cliente_control.tipo_forma_pagosFK);

	};

	cargarComboscuentasFK(forma_pago_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta",forma_pago_cliente_control.cuentasFK);

		if(forma_pago_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+forma_pago_cliente_control.idFilaTablaActual+"_7",forma_pago_cliente_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",forma_pago_cliente_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(forma_pago_cliente_control) {

	};

	registrarComboActionChangeCombostipo_forma_pagosFK(forma_pago_cliente_control) {

	};

	registrarComboActionChangeComboscuentasFK(forma_pago_cliente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(forma_pago_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(forma_pago_cliente_control.idempresaDefaultFK>-1 && jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val() != forma_pago_cliente_control.idempresaDefaultFK) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val(forma_pago_cliente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_forma_pagosFK(forma_pago_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(forma_pago_cliente_control.idtipo_forma_pagoDefaultFK>-1 && jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val() != forma_pago_cliente_control.idtipo_forma_pagoDefaultFK) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val(forma_pago_cliente_control.idtipo_forma_pagoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago").val(forma_pago_cliente_control.idtipo_forma_pagoDefaultForeignKey).trigger("change");
			if(jQuery("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(forma_pago_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(forma_pago_cliente_control.idcuentaDefaultFK>-1 && jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val() != forma_pago_cliente_control.idcuentaDefaultFK) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val(forma_pago_cliente_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(forma_pago_cliente_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//forma_pago_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(forma_pago_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(forma_pago_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_cliente_control.strRecargarFkTipos,",")) { 
				forma_pago_cliente_webcontrol1.setDefectoValorCombosempresasFK(forma_pago_cliente_control);
			}

			if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_cliente_control.strRecargarFkTipos,",")) { 
				forma_pago_cliente_webcontrol1.setDefectoValorCombostipo_forma_pagosFK(forma_pago_cliente_control);
			}

			if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_cliente_control.strRecargarFkTipos,",")) { 
				forma_pago_cliente_webcontrol1.setDefectoValorComboscuentasFK(forma_pago_cliente_control);
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
	onLoadCombosEventosFK(forma_pago_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(forma_pago_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				forma_pago_cliente_webcontrol1.registrarComboActionChangeCombosempresasFK(forma_pago_cliente_control);
			//}

			//if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				forma_pago_cliente_webcontrol1.registrarComboActionChangeCombostipo_forma_pagosFK(forma_pago_cliente_control);
			//}

			//if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				forma_pago_cliente_webcontrol1.registrarComboActionChangeComboscuentasFK(forma_pago_cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(forma_pago_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(forma_pago_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(forma_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("forma_pago_cliente");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("forma_pago_cliente");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(forma_pago_cliente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);			
			
			if(forma_pago_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,"forma_pago_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				forma_pago_cliente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_forma_pago","id_tipo_forma_pago","general","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago_img_busqueda").click(function(){
				forma_pago_cliente_webcontrol1.abrirBusquedaParatipo_forma_pago("id_tipo_forma_pago");
				//alert(jQuery('#form-id_tipo_forma_pago_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				forma_pago_cliente_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("forma_pago_cliente","FK_Idcuenta","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("forma_pago_cliente","FK_Idempresa","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("forma_pago_cliente","FK_Idtipo_forma_pago","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("forma_pago_cliente");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			forma_pago_cliente_funcion1.validarFormularioJQuery(forma_pago_cliente_constante1);
			
			if(forma_pago_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(forma_pago_cliente_control) {
		
		jQuery("#divBusquedaforma_pago_clienteAjaxWebPart").css("display",forma_pago_cliente_control.strPermisoBusqueda);
		jQuery("#trforma_pago_clienteCabeceraBusquedas").css("display",forma_pago_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedaforma_pago_cliente").css("display",forma_pago_cliente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteforma_pago_cliente").css("display",forma_pago_cliente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosforma_pago_cliente").attr("style",forma_pago_cliente_control.strPermisoMostrarTodos);
		
		if(forma_pago_cliente_control.strPermisoNuevo!=null) {
			jQuery("#tdforma_pago_clienteNuevo").css("display",forma_pago_cliente_control.strPermisoNuevo);
			jQuery("#tdforma_pago_clienteNuevoToolBar").css("display",forma_pago_cliente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdforma_pago_clienteDuplicar").css("display",forma_pago_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdforma_pago_clienteDuplicarToolBar").css("display",forma_pago_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdforma_pago_clienteNuevoGuardarCambios").css("display",forma_pago_cliente_control.strPermisoNuevo);
			jQuery("#tdforma_pago_clienteNuevoGuardarCambiosToolBar").css("display",forma_pago_cliente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(forma_pago_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdforma_pago_clienteActualizarToolBar").css("display",forma_pago_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdforma_pago_clienteCopiar").css("display",forma_pago_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdforma_pago_clienteCopiarToolBar").css("display",forma_pago_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdforma_pago_clienteConEditar").css("display",forma_pago_cliente_control.strPermisoActualizar);
		}
		
		jQuery("#tdforma_pago_clienteEliminarToolBar").css("display",forma_pago_cliente_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdforma_pago_clienteGuardarCambios").css("display",forma_pago_cliente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdforma_pago_clienteGuardarCambiosToolBar").css("display",forma_pago_cliente_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trforma_pago_clienteElementos").css("display",forma_pago_cliente_control.strVisibleTablaElementos);
		
		jQuery("#trforma_pago_clienteAcciones").css("display",forma_pago_cliente_control.strVisibleTablaAcciones);
		jQuery("#trforma_pago_clienteParametrosAcciones").css("display",forma_pago_cliente_control.strVisibleTablaAcciones);
			
		jQuery("#tdforma_pago_clienteCerrarPagina").css("display",forma_pago_cliente_control.strPermisoPopup);		
		jQuery("#tdforma_pago_clienteCerrarPaginaToolBar").css("display",forma_pago_cliente_control.strPermisoPopup);
		//jQuery("#trforma_pago_clienteAccionesRelaciones").css("display",forma_pago_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		forma_pago_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		forma_pago_cliente_webcontrol1.registrarEventosControles();
		
		if(forma_pago_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(forma_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
			forma_pago_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(forma_pago_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(forma_pago_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				forma_pago_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(forma_pago_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(forma_pago_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				forma_pago_cliente_webcontrol1.onLoad();
				
			} else {
				if(forma_pago_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
					if(forma_pago_cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
						//forma_pago_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(forma_pago_cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(forma_pago_cliente_constante1.BIG_ID_ACTUAL,"forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
						//forma_pago_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			forma_pago_cliente_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var forma_pago_cliente_webcontrol1=new forma_pago_cliente_webcontrol();

if(forma_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = forma_pago_cliente_webcontrol1.onLoadWindow; 
}

//</script>