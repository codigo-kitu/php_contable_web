//<script type="text/javascript" language="javascript">



//var termino_pago_proveedorJQueryPaginaWebInteraccion= function (termino_pago_proveedor_control) {
//this.,this.,this.

class termino_pago_proveedor_webcontrol extends termino_pago_proveedor_webcontrol_add {
	
	termino_pago_proveedor_control=null;
	termino_pago_proveedor_controlInicial=null;
	termino_pago_proveedor_controlAuxiliar=null;
		
	//if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(termino_pago_proveedor_control) {
		super();
		
		this.termino_pago_proveedor_control=termino_pago_proveedor_control;
	}
		
	actualizarVariablesPagina(termino_pago_proveedor_control) {
		
		if(termino_pago_proveedor_control.action=="index" || termino_pago_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(termino_pago_proveedor_control);
			
		} else if(termino_pago_proveedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(termino_pago_proveedor_control);
			
		} else if(termino_pago_proveedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(termino_pago_proveedor_control);
			
		} else if(termino_pago_proveedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(termino_pago_proveedor_control);		
		
		} else if(termino_pago_proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(termino_pago_proveedor_control);		
		
		} else if(termino_pago_proveedor_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(termino_pago_proveedor_control);		
		
		} else if(termino_pago_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(termino_pago_proveedor_control);		
		}
		else if(termino_pago_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(termino_pago_proveedor_control);		
		}
		else if(termino_pago_proveedor_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(termino_pago_proveedor_control);		
		}
		else if(termino_pago_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(termino_pago_proveedor_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(termino_pago_proveedor_control.action + " Revisar Manejo");
			
			if(termino_pago_proveedor_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(termino_pago_proveedor_control);
				
				return;
			}
			
			//if(termino_pago_proveedor_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(termino_pago_proveedor_control);
			//}
			
			if(termino_pago_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(termino_pago_proveedor_control);
			}
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && termino_pago_proveedor_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(termino_pago_proveedor_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(termino_pago_proveedor_control, false);			
			}
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(termino_pago_proveedor_control);	
			}
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
			}
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control);
			}
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);
			}
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(termino_pago_proveedor_control);	
			}
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
			}
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(termino_pago_proveedor_control);
			}
			
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(termino_pago_proveedor_control);			
			}
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(termino_pago_proveedor_control);
			}
			
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(termino_pago_proveedor_control);
			}
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(termino_pago_proveedor_control);
			}				
			
			if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(termino_pago_proveedor_control);
			}
			
			if(termino_pago_proveedor_control.usuarioActual!=null && termino_pago_proveedor_control.usuarioActual.field_strUserName!=null &&
			termino_pago_proveedor_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(termino_pago_proveedor_control);			
			}
		}
		
		
		if(termino_pago_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(termino_pago_proveedor_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(termino_pago_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(termino_pago_proveedor_control);
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control);
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(termino_pago_proveedor_control);
		this.actualizarPaginaAreaBusquedas(termino_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(termino_pago_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(termino_pago_proveedor_control);
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control);
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(termino_pago_proveedor_control);
		this.actualizarPaginaAreaBusquedas(termino_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(termino_pago_proveedor_control) {
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(termino_pago_proveedor_control) {
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(termino_pago_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(termino_pago_proveedor_control) {
		this.actualizarPaginaAbrirLink(termino_pago_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);				
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(termino_pago_proveedor_control) {
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		this.onLoadCombosDefectoFK(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		this.onLoadCombosDefectoFK(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(termino_pago_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		this.onLoadCombosDefectoFK(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(termino_pago_proveedor_control) {
		this.actualizarPaginaAbrirLink(termino_pago_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(termino_pago_proveedor_control) {
		this.actualizarPaginaImprimir(termino_pago_proveedor_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(termino_pago_proveedor_control) {
		this.actualizarPaginaImprimir(termino_pago_proveedor_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(termino_pago_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(termino_pago_proveedor_control) {
		//FORMULARIO
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(termino_pago_proveedor_control);
			this.actualizarPaginaFormularioAdd(termino_pago_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		//COMBOS FK
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(termino_pago_proveedor_control) {
		//FORMULARIO
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);	
		//COMBOS FK
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(termino_pago_proveedor_control) {
		//FORMULARIO
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(termino_pago_proveedor_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(termino_pago_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);	
		//COMBOS FK
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(termino_pago_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(termino_pago_proveedor_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control) {
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && termino_pago_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(termino_pago_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(termino_pago_proveedor_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(termino_pago_proveedor_control) {
		if(termino_pago_proveedor_funcion1.esPaginaForm()==true) {
			window.opener.termino_pago_proveedor_webcontrol1.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(termino_pago_proveedor_control) {
		termino_pago_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(termino_pago_proveedor_control.strAuxiliarUrlPagina);
				
		termino_pago_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(termino_pago_proveedor_control.strAuxiliarTipo,termino_pago_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(termino_pago_proveedor_control) {
		termino_pago_proveedor_funcion1.resaltarRestaurarDivMensaje(true,termino_pago_proveedor_control.strAuxiliarMensajeAlert,termino_pago_proveedor_control.strAuxiliarCssMensaje);
			
		if(termino_pago_proveedor_funcion1.esPaginaForm()==true) {
			window.opener.termino_pago_proveedor_funcion1.resaltarRestaurarDivMensaje(true,termino_pago_proveedor_control.strAuxiliarMensajeAlert,termino_pago_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(termino_pago_proveedor_control) {
		eval(termino_pago_proveedor_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(termino_pago_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			termino_pago_proveedor_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				termino_pago_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			termino_pago_proveedor_funcion1.mostrarDivMensaje(true,termino_pago_proveedor_control.strAuxiliarMensaje,termino_pago_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			termino_pago_proveedor_funcion1.mostrarDivMensaje(false,termino_pago_proveedor_control.strAuxiliarMensaje,termino_pago_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(termino_pago_proveedor_control) {
	
		funcionGeneral.printWebPartPage("termino_pago_proveedor",termino_pago_proveedor_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliartermino_pago_proveedorsAjaxWebPart").html(termino_pago_proveedor_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("termino_pago_proveedor",jQuery("#divTablaDatosReporteAuxiliartermino_pago_proveedorsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(termino_pago_proveedor_control) {
		this.termino_pago_proveedor_controlInicial=termino_pago_proveedor_control;
			
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(termino_pago_proveedor_control.strStyleDivArbol,termino_pago_proveedor_control.strStyleDivContent
																,termino_pago_proveedor_control.strStyleDivOpcionesBanner,termino_pago_proveedor_control.strStyleDivExpandirColapsar
																,termino_pago_proveedor_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=termino_pago_proveedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",termino_pago_proveedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(termino_pago_proveedor_control) {
		jQuery("#divTablaDatostermino_pago_proveedorsAjaxWebPart").html(termino_pago_proveedor_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostermino_pago_proveedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostermino_pago_proveedors=jQuery("#tblTablaDatostermino_pago_proveedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("termino_pago_proveedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',termino_pago_proveedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			termino_pago_proveedor_webcontrol1.registrarControlesTableEdition(termino_pago_proveedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		termino_pago_proveedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(termino_pago_proveedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(termino_pago_proveedor_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control) {
		this.actualizarCssBotonesPagina(termino_pago_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(termino_pago_proveedor_control.tiposReportes,termino_pago_proveedor_control.tiposReporte
															 	,termino_pago_proveedor_control.tiposPaginacion,termino_pago_proveedor_control.tiposAcciones
																,termino_pago_proveedor_control.tiposColumnasSelect,termino_pago_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(termino_pago_proveedor_control.tiposRelaciones,termino_pago_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(termino_pago_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(termino_pago_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(termino_pago_proveedor_control);			
	}
	
	actualizarPaginaAreaBusquedas(termino_pago_proveedor_control) {
		jQuery("#divBusquedatermino_pago_proveedorAjaxWebPart").css("display",termino_pago_proveedor_control.strPermisoBusqueda);
		jQuery("#trtermino_pago_proveedorCabeceraBusquedas").css("display",termino_pago_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedatermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(termino_pago_proveedor_control.htmlTablaOrderBy!=null
			&& termino_pago_proveedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytermino_pago_proveedorAjaxWebPart").html(termino_pago_proveedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//termino_pago_proveedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(termino_pago_proveedor_control.htmlTablaOrderByRel!=null
			&& termino_pago_proveedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltermino_pago_proveedorAjaxWebPart").html(termino_pago_proveedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatermino_pago_proveedorAjaxWebPart").css("display","none");
			jQuery("#trtermino_pago_proveedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatermino_pago_proveedor").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control) {
		jQuery("#tdtermino_pago_proveedorNuevo").css("display",termino_pago_proveedor_control.strPermisoNuevo);
		jQuery("#trtermino_pago_proveedorElementos").css("display",termino_pago_proveedor_control.strVisibleTablaElementos);
		jQuery("#trtermino_pago_proveedorAcciones").css("display",termino_pago_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trtermino_pago_proveedorParametrosAcciones").css("display",termino_pago_proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(termino_pago_proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(termino_pago_proveedor_control);
				
		if(termino_pago_proveedor_control.termino_pago_proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(termino_pago_proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(termino_pago_proveedor_control);
	}
	
	actualizarPaginaUsuarioInvitado(termino_pago_proveedor_control) {
	
		var indexPosition=termino_pago_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=termino_pago_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(termino_pago_proveedor_control) {
		jQuery("#divResumentermino_pago_proveedorActualAjaxWebPart").html(termino_pago_proveedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(termino_pago_proveedor_control) {
		jQuery("#divAccionesRelacionestermino_pago_proveedorAjaxWebPart").html(termino_pago_proveedor_control.htmlTablaAccionesRelaciones);
			
		termino_pago_proveedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(termino_pago_proveedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(termino_pago_proveedor_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(termino_pago_proveedor_control) {
		
		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",termino_pago_proveedor_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",termino_pago_proveedor_control.strVisibleFK_Idcuenta);
		}

		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",termino_pago_proveedor_control.strVisibleFK_Idcuenta_corriente);
			jQuery("#tblstrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",termino_pago_proveedor_control.strVisibleFK_Idcuenta_corriente);
		}

		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",termino_pago_proveedor_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",termino_pago_proveedor_control.strVisibleFK_Idempresa);
		}

		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago").attr("style",termino_pago_proveedor_control.strVisibleFK_Idtipo_termino_pago);
			jQuery("#tblstrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago").attr("style",termino_pago_proveedor_control.strVisibleFK_Idtipo_termino_pago);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontermino_pago_proveedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("termino_pago_proveedor",id,"cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		termino_pago_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("termino_pago_proveedor","empresa","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}

	abrirBusquedaParatipo_termino_pago(strNombreCampoBusqueda){//idActual
		termino_pago_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("termino_pago_proveedor","tipo_termino_pago","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		termino_pago_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("termino_pago_proveedor","cuenta","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}

	abrirBusquedaParacuenta_corriente(strNombreCampoBusqueda){//idActual
		termino_pago_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("termino_pago_proveedor","cuenta_corriente","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(termino_pago_proveedor_control) {
	
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-version_row").val(termino_pago_proveedor_control.termino_pago_proveedorActual.versionRow);
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa>-1){
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago>-1){
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago).trigger("change");
			}
		} else { 
			//jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").select2("val", null);
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-codigo").val(termino_pago_proveedor_control.termino_pago_proveedorActual.codigo);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-descripcion").val(termino_pago_proveedor_control.termino_pago_proveedorActual.descripcion);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-monto").val(termino_pago_proveedor_control.termino_pago_proveedorActual.monto);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-dias").val(termino_pago_proveedor_control.termino_pago_proveedorActual.dias);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-inicial").val(termino_pago_proveedor_control.termino_pago_proveedorActual.inicial);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-cuotas").val(termino_pago_proveedor_control.termino_pago_proveedorActual.cuotas);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-descuento_pronto_pago").val(termino_pago_proveedor_control.termino_pago_proveedorActual.descuento_pronto_pago);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-predeterminado").prop('checked',termino_pago_proveedor_control.termino_pago_proveedorActual.predeterminado);
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta>-1){
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").select2("val", null);
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta_corriente!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta_corriente>-1){
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta_corriente) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_corriente").select2("val", null);
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-cuenta_contable").val(termino_pago_proveedor_control.termino_pago_proveedorActual.cuenta_contable);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-cuenta_corriente_codigo").val(termino_pago_proveedor_control.termino_pago_proveedorActual.cuenta_corriente_codigo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+termino_pago_proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("termino_pago_proveedor","cuentaspagar","","form_termino_pago_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}
	
	cargarCombosFK(termino_pago_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.cargarCombosempresasFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.cargarCombostipo_termino_pagosFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.cargarComboscuentasFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.cargarComboscuenta_corrientesFK(termino_pago_proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!=null && termino_pago_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && termino_pago_proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_proveedor_webcontrol1.cargarCombosempresasFK(termino_pago_proveedor_control);
				}

				if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_proveedor_webcontrol1.cargarCombostipo_termino_pagosFK(termino_pago_proveedor_control);
				}

				if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_proveedor_webcontrol1.cargarComboscuentasFK(termino_pago_proveedor_control);
				}

				if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",termino_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_proveedor_webcontrol1.cargarComboscuenta_corrientesFK(termino_pago_proveedor_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(termino_pago_proveedor_control) {
		jQuery("#spanstrMensajeid").text(termino_pago_proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(termino_pago_proveedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(termino_pago_proveedor_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_tipo_termino_pago").text(termino_pago_proveedor_control.strMensajeid_tipo_termino_pago);		
		jQuery("#spanstrMensajecodigo").text(termino_pago_proveedor_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(termino_pago_proveedor_control.strMensajedescripcion);		
		jQuery("#spanstrMensajemonto").text(termino_pago_proveedor_control.strMensajemonto);		
		jQuery("#spanstrMensajedias").text(termino_pago_proveedor_control.strMensajedias);		
		jQuery("#spanstrMensajeinicial").text(termino_pago_proveedor_control.strMensajeinicial);		
		jQuery("#spanstrMensajecuotas").text(termino_pago_proveedor_control.strMensajecuotas);		
		jQuery("#spanstrMensajedescuento_pronto_pago").text(termino_pago_proveedor_control.strMensajedescuento_pronto_pago);		
		jQuery("#spanstrMensajepredeterminado").text(termino_pago_proveedor_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta").text(termino_pago_proveedor_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajeid_cuenta_corriente").text(termino_pago_proveedor_control.strMensajeid_cuenta_corriente);		
		jQuery("#spanstrMensajecuenta_contable").text(termino_pago_proveedor_control.strMensajecuenta_contable);		
		jQuery("#spanstrMensajecuenta_corriente_codigo").text(termino_pago_proveedor_control.strMensajecuenta_corriente_codigo);		
	}
	
	actualizarCssBotonesMantenimiento(termino_pago_proveedor_control) {
		jQuery("#tdbtnNuevotermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		jQuery("#imgdivrelacionparametro_inventario").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParaparametro_inventarios(idActual);
		});
		jQuery("#imgdivrelacioncotizacion").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParacotizaciones(idActual);
		});
		jQuery("#imgdivrelacionorden_compra").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		});
		jQuery("#imgdivrelaciondevolucion").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParadevoluciones(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(termino_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_proveedor_funcion1,termino_pago_proveedor_control.empresasFK);
	}

	cargarComboEditarTablatipo_termino_pagoFK(termino_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_proveedor_funcion1,termino_pago_proveedor_control.tipo_termino_pagosFK);
	}

	cargarComboEditarTablacuentaFK(termino_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_proveedor_funcion1,termino_pago_proveedor_control.cuentasFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(termino_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_proveedor_funcion1,termino_pago_proveedor_control.cuenta_corrientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(termino_pago_proveedor_control) {
		var i=0;
		
		i=termino_pago_proveedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id);
		jQuery("#t-version_row_"+i+"").val(termino_pago_proveedor_control.termino_pago_proveedorActual.versionRow);
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago) {
				jQuery("#t-cel_"+i+"_3").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(termino_pago_proveedor_control.termino_pago_proveedorActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(termino_pago_proveedor_control.termino_pago_proveedorActual.descripcion);
		jQuery("#t-cel_"+i+"_6").val(termino_pago_proveedor_control.termino_pago_proveedorActual.monto);
		jQuery("#t-cel_"+i+"_7").val(termino_pago_proveedor_control.termino_pago_proveedorActual.dias);
		jQuery("#t-cel_"+i+"_8").val(termino_pago_proveedor_control.termino_pago_proveedorActual.inicial);
		jQuery("#t-cel_"+i+"_9").val(termino_pago_proveedor_control.termino_pago_proveedorActual.cuotas);
		jQuery("#t-cel_"+i+"_10").val(termino_pago_proveedor_control.termino_pago_proveedorActual.descuento_pronto_pago);
		jQuery("#t-cel_"+i+"_11").prop('checked',termino_pago_proveedor_control.termino_pago_proveedorActual.predeterminado);
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_12").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta_corriente!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta_corriente>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta_corriente) {
				jQuery("#t-cel_"+i+"_13").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(termino_pago_proveedor_control.termino_pago_proveedorActual.cuenta_contable);
		jQuery("#t-cel_"+i+"_15").val(termino_pago_proveedor_control.termino_pago_proveedorActual.cuenta_corriente_codigo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(termino_pago_proveedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatostermino_pago_proveedors").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParaproveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionparametro_inventario").click(function(){
		jQuery("#tblTablaDatostermino_pago_proveedors").on("click",".imgrelacionparametro_inventario", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParaparametro_inventarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncotizacion").click(function(){
		jQuery("#tblTablaDatostermino_pago_proveedors").on("click",".imgrelacioncotizacion", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParacotizaciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionorden_compra").click(function(){
		jQuery("#tblTablaDatostermino_pago_proveedors").on("click",".imgrelacionorden_compra", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion").click(function(){
		jQuery("#tblTablaDatostermino_pago_proveedors").on("click",".imgrelaciondevolucion", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParadevoluciones(idActual);
		});				
	}
		
	

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_proveedor","proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,"es","");
	}

	registrarSesionParaparametro_inventarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_proveedor","parametro_inventario","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,"s","");
	}

	registrarSesionParacotizaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_proveedor","cotizacion","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,"es","");
	}

	registrarSesionParaorden_compras(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_proveedor","orden_compra","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,"s","");
	}

	registrarSesionParadevoluciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_proveedor","devolucion","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(termino_pago_proveedor_control) {
		termino_pago_proveedor_funcion1.registrarControlesTableValidacionEdition(termino_pago_proveedor_control,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedorConstante,strParametros);
		
		//termino_pago_proveedor_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(termino_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa",termino_pago_proveedor_control.empresasFK);

		if(termino_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_proveedor_control.idFilaTablaActual+"_2",termino_pago_proveedor_control.empresasFK);
		}
	};

	cargarCombostipo_termino_pagosFK(termino_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago",termino_pago_proveedor_control.tipo_termino_pagosFK);

		if(termino_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_proveedor_control.idFilaTablaActual+"_3",termino_pago_proveedor_control.tipo_termino_pagosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago",termino_pago_proveedor_control.tipo_termino_pagosFK);

	};

	cargarComboscuentasFK(termino_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta",termino_pago_proveedor_control.cuentasFK);

		if(termino_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_proveedor_control.idFilaTablaActual+"_12",termino_pago_proveedor_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",termino_pago_proveedor_control.cuentasFK);

	};

	cargarComboscuenta_corrientesFK(termino_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_corriente",termino_pago_proveedor_control.cuenta_corrientesFK);

		if(termino_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_proveedor_control.idFilaTablaActual+"_13",termino_pago_proveedor_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",termino_pago_proveedor_control.cuenta_corrientesFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(termino_pago_proveedor_control) {

	};

	registrarComboActionChangeCombostipo_termino_pagosFK(termino_pago_proveedor_control) {

	};

	registrarComboActionChangeComboscuentasFK(termino_pago_proveedor_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(termino_pago_proveedor_control) {

	};

	
	
	setDefectoValorCombosempresasFK(termino_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_proveedor_control.idempresaDefaultFK>-1 && jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != termino_pago_proveedor_control.idempresaDefaultFK) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val(termino_pago_proveedor_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_termino_pagosFK(termino_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_proveedor_control.idtipo_termino_pagoDefaultFK>-1 && jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val() != termino_pago_proveedor_control.idtipo_termino_pagoDefaultFK) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val(termino_pago_proveedor_control.idtipo_termino_pagoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago").val(termino_pago_proveedor_control.idtipo_termino_pagoDefaultForeignKey).trigger("change");
			if(jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(termino_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_proveedor_control.idcuentaDefaultFK>-1 && jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != termino_pago_proveedor_control.idcuentaDefaultFK) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(termino_pago_proveedor_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(termino_pago_proveedor_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(termino_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_proveedor_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != termino_pago_proveedor_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(termino_pago_proveedor_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(termino_pago_proveedor_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//termino_pago_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(termino_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(termino_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.setDefectoValorCombosempresasFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.setDefectoValorCombostipo_termino_pagosFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.setDefectoValorComboscuentasFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.setDefectoValorComboscuenta_corrientesFK(termino_pago_proveedor_control);
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
	onLoadCombosEventosFK(termino_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(termino_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_proveedor_webcontrol1.registrarComboActionChangeCombosempresasFK(termino_pago_proveedor_control);
			//}

			//if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_proveedor_webcontrol1.registrarComboActionChangeCombostipo_termino_pagosFK(termino_pago_proveedor_control);
			//}

			//if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_proveedor_webcontrol1.registrarComboActionChangeComboscuentasFK(termino_pago_proveedor_control);
			//}

			//if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_proveedor_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(termino_pago_proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(termino_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(termino_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("termino_pago_proveedor");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("termino_pago_proveedor");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(termino_pago_proveedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);			
			
			if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,"termino_pago_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				termino_pago_proveedor_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_termino_pago","id_tipo_termino_pago","general","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago_img_busqueda").click(function(){
				termino_pago_proveedor_webcontrol1.abrirBusquedaParatipo_termino_pago("id_tipo_termino_pago");
				//alert(jQuery('#form-id_tipo_termino_pago_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				termino_pago_proveedor_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				termino_pago_proveedor_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("termino_pago_proveedor","FK_Idcuenta","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("termino_pago_proveedor","FK_Idcuenta_corriente","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("termino_pago_proveedor","FK_Idempresa","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("termino_pago_proveedor","FK_Idtipo_termino_pago","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("termino_pago_proveedor");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			termino_pago_proveedor_funcion1.validarFormularioJQuery(termino_pago_proveedor_constante1);
			
			if(termino_pago_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(termino_pago_proveedor_control) {
		
		jQuery("#divBusquedatermino_pago_proveedorAjaxWebPart").css("display",termino_pago_proveedor_control.strPermisoBusqueda);
		jQuery("#trtermino_pago_proveedorCabeceraBusquedas").css("display",termino_pago_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedatermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostermino_pago_proveedor").attr("style",termino_pago_proveedor_control.strPermisoMostrarTodos);
		
		if(termino_pago_proveedor_control.strPermisoNuevo!=null) {
			jQuery("#tdtermino_pago_proveedorNuevo").css("display",termino_pago_proveedor_control.strPermisoNuevo);
			jQuery("#tdtermino_pago_proveedorNuevoToolBar").css("display",termino_pago_proveedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtermino_pago_proveedorDuplicar").css("display",termino_pago_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtermino_pago_proveedorDuplicarToolBar").css("display",termino_pago_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtermino_pago_proveedorNuevoGuardarCambios").css("display",termino_pago_proveedor_control.strPermisoNuevo);
			jQuery("#tdtermino_pago_proveedorNuevoGuardarCambiosToolBar").css("display",termino_pago_proveedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(termino_pago_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdtermino_pago_proveedorActualizarToolBar").css("display",termino_pago_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtermino_pago_proveedorCopiar").css("display",termino_pago_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtermino_pago_proveedorCopiarToolBar").css("display",termino_pago_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtermino_pago_proveedorConEditar").css("display",termino_pago_proveedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdtermino_pago_proveedorEliminarToolBar").css("display",termino_pago_proveedor_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdtermino_pago_proveedorGuardarCambios").css("display",termino_pago_proveedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtermino_pago_proveedorGuardarCambiosToolBar").css("display",termino_pago_proveedor_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trtermino_pago_proveedorElementos").css("display",termino_pago_proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trtermino_pago_proveedorAcciones").css("display",termino_pago_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trtermino_pago_proveedorParametrosAcciones").css("display",termino_pago_proveedor_control.strVisibleTablaAcciones);
			
		jQuery("#tdtermino_pago_proveedorCerrarPagina").css("display",termino_pago_proveedor_control.strPermisoPopup);		
		jQuery("#tdtermino_pago_proveedorCerrarPaginaToolBar").css("display",termino_pago_proveedor_control.strPermisoPopup);
		//jQuery("#trtermino_pago_proveedorAccionesRelaciones").css("display",termino_pago_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		termino_pago_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		termino_pago_proveedor_webcontrol1.registrarEventosControles();
		
		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			termino_pago_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(termino_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				termino_pago_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(termino_pago_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(termino_pago_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				termino_pago_proveedor_webcontrol1.onLoad();
				
			} else {
				if(termino_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
					if(termino_pago_proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
						//termino_pago_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(termino_pago_proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(termino_pago_proveedor_constante1.BIG_ID_ACTUAL,"termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
						//termino_pago_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			termino_pago_proveedor_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var termino_pago_proveedor_webcontrol1=new termino_pago_proveedor_webcontrol();

if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = termino_pago_proveedor_webcontrol1.onLoadWindow; 
}

//</script>