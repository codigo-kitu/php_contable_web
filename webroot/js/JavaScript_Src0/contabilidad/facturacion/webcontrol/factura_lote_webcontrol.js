//<script type="text/javascript" language="javascript">



//var factura_loteJQueryPaginaWebInteraccion= function (factura_lote_control) {
//this.,this.,this.

class factura_lote_webcontrol extends factura_lote_webcontrol_add {
	
	factura_lote_control=null;
	factura_lote_controlInicial=null;
	factura_lote_controlAuxiliar=null;
		
	//if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(factura_lote_control) {
		super();
		
		this.factura_lote_control=factura_lote_control;
	}
		
	actualizarVariablesPagina(factura_lote_control) {
		
		if(factura_lote_control.action=="index" || factura_lote_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(factura_lote_control);
			
		} else if(factura_lote_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_lote_control);
		
		} else if(factura_lote_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(factura_lote_control);
		
		} else if(factura_lote_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_lote_control);
		
		} else if(factura_lote_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(factura_lote_control);
			
		} else if(factura_lote_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(factura_lote_control);
			
		} else if(factura_lote_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_lote_control);
		
		} else if(factura_lote_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_lote_control);
		
		} else if(factura_lote_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(factura_lote_control);
		
		} else if(factura_lote_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(factura_lote_control);
		
		} else if(factura_lote_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(factura_lote_control);
		
		} else if(factura_lote_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(factura_lote_control);
		
		} else if(factura_lote_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(factura_lote_control);
		
		} else if(factura_lote_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(factura_lote_control);
		
		} else if(factura_lote_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(factura_lote_control);
		
		} else if(factura_lote_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(factura_lote_control);
		
		} else if(factura_lote_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_lote_control);
		
		} else if(factura_lote_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_lote_control);
		
		} else if(factura_lote_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_lote_control);
		
		} else if(factura_lote_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(factura_lote_control);
		
		} else if(factura_lote_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(factura_lote_control);
		
		} else if(factura_lote_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(factura_lote_control);
		
		} else if(factura_lote_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_lote_control);
		
		} else if(factura_lote_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_lote_control);
		
		} else if(factura_lote_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_lote_control);
		
		} else if(factura_lote_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(factura_lote_control);
		
		} else if(factura_lote_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_lote_control);
		
		} else if(factura_lote_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_lote_control);		
		
		} else if(factura_lote_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(factura_lote_control);		
		
		} else if(factura_lote_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_lote_control);		
		
		} else if(factura_lote_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(factura_lote_control);		
		}
		else if(factura_lote_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_lote_control);		
		}
		else if(factura_lote_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_lote_control);		
		}
		else if(factura_lote_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(factura_lote_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(factura_lote_control.action + " Revisar Manejo");
			
			if(factura_lote_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(factura_lote_control);
				
				return;
			}
			
			//if(factura_lote_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(factura_lote_control);
			//}
			
			if(factura_lote_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(factura_lote_control);
			}
			
			if(factura_lote_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_lote_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(factura_lote_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(factura_lote_control, false);			
			}
			
			if(factura_lote_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(factura_lote_control);	
			}
			
			if(factura_lote_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(factura_lote_control);
			}
			
			if(factura_lote_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(factura_lote_control);
			}
			
			if(factura_lote_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(factura_lote_control);
			}
			
			if(factura_lote_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(factura_lote_control);	
			}
			
			if(factura_lote_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(factura_lote_control);
			}
			
			if(factura_lote_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(factura_lote_control);
			}
			
			
			if(factura_lote_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(factura_lote_control);			
			}
			
			if(factura_lote_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(factura_lote_control);
			}
			
			
			if(factura_lote_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(factura_lote_control);
			}
			
			if(factura_lote_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(factura_lote_control);
			}				
			
			if(factura_lote_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_lote_control);
			}
			
			if(factura_lote_control.usuarioActual!=null && factura_lote_control.usuarioActual.field_strUserName!=null &&
			factura_lote_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(factura_lote_control);			
			}
		}
		
		
		if(factura_lote_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(factura_lote_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(factura_lote_control) {
		
		this.actualizarPaginaCargaGeneral(factura_lote_control);
		this.actualizarPaginaTablaDatos(factura_lote_control);
		this.actualizarPaginaCargaGeneralControles(factura_lote_control);
		this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_lote_control);
		this.actualizarPaginaAreaBusquedas(factura_lote_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_lote_control) {
		
		this.actualizarPaginaCargaGeneral(factura_lote_control);
		this.actualizarPaginaTablaDatos(factura_lote_control);
		this.actualizarPaginaCargaGeneralControles(factura_lote_control);
		this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_lote_control);
		this.actualizarPaginaAreaBusquedas(factura_lote_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(factura_lote_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_lote_control);		
		this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(factura_lote_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_lote_control);		
		this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(factura_lote_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_lote_control);		
		this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(factura_lote_control) {
		this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(factura_lote_control) {
		this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_lote_control) {
		this.actualizarPaginaCargaGeneralControles(factura_lote_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_control);
		this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_lote_control) {
		this.actualizarPaginaAbrirLink(factura_lote_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);				
		this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);
		this.actualizarPaginaFormulario(factura_lote_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);
		this.actualizarPaginaFormulario(factura_lote_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(factura_lote_control) {
		this.actualizarPaginaFormulario(factura_lote_control);
		this.onLoadCombosDefectoFK(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);
		this.actualizarPaginaFormulario(factura_lote_control);
		this.onLoadCombosDefectoFK(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_lote_control) {
		this.actualizarPaginaCargaGeneralControles(factura_lote_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_control);
		this.actualizarPaginaFormulario(factura_lote_control);
		this.onLoadCombosDefectoFK(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_lote_control) {
		this.actualizarPaginaAbrirLink(factura_lote_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_lote_control) {
		this.actualizarPaginaImprimir(factura_lote_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_lote_control) {
		this.actualizarPaginaImprimir(factura_lote_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(factura_lote_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_lote_control) {
		//FORMULARIO
		if(factura_lote_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_lote_control);
			this.actualizarPaginaFormularioAdd(factura_lote_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		//COMBOS FK
		if(factura_lote_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_lote_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(factura_lote_control) {
		//FORMULARIO
		if(factura_lote_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_lote_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);	
		//COMBOS FK
		if(factura_lote_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_lote_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);
		this.actualizarPaginaFormulario(factura_lote_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_lote_control) {
		//FORMULARIO
		if(factura_lote_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_lote_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(factura_lote_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);	
		//COMBOS FK
		if(factura_lote_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_lote_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(factura_lote_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_lote_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(factura_lote_control) {
		if(factura_lote_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_lote_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(factura_lote_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(factura_lote_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(factura_lote_control) {
		if(factura_lote_funcion1.esPaginaForm()==true) {
			window.opener.factura_lote_webcontrol1.actualizarPaginaTablaDatos(factura_lote_control);
		} else {
			this.actualizarPaginaTablaDatos(factura_lote_control);
		}
	}
	
	actualizarPaginaAbrirLink(factura_lote_control) {
		factura_lote_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(factura_lote_control.strAuxiliarUrlPagina);
				
		factura_lote_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(factura_lote_control.strAuxiliarTipo,factura_lote_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(factura_lote_control) {
		factura_lote_funcion1.resaltarRestaurarDivMensaje(true,factura_lote_control.strAuxiliarMensajeAlert,factura_lote_control.strAuxiliarCssMensaje);
			
		if(factura_lote_funcion1.esPaginaForm()==true) {
			window.opener.factura_lote_funcion1.resaltarRestaurarDivMensaje(true,factura_lote_control.strAuxiliarMensajeAlert,factura_lote_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(factura_lote_control) {
		eval(factura_lote_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(factura_lote_control, mostrar) {
		
		if(mostrar==true) {
			factura_lote_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				factura_lote_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			factura_lote_funcion1.mostrarDivMensaje(true,factura_lote_control.strAuxiliarMensaje,factura_lote_control.strAuxiliarCssMensaje);
		
		} else {
			factura_lote_funcion1.mostrarDivMensaje(false,factura_lote_control.strAuxiliarMensaje,factura_lote_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(factura_lote_control) {
	
		funcionGeneral.printWebPartPage("factura_lote",factura_lote_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarfactura_lotesAjaxWebPart").html(factura_lote_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("factura_lote",jQuery("#divTablaDatosReporteAuxiliarfactura_lotesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(factura_lote_control) {
		this.factura_lote_controlInicial=factura_lote_control;
			
		if(factura_lote_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(factura_lote_control.strStyleDivArbol,factura_lote_control.strStyleDivContent
																,factura_lote_control.strStyleDivOpcionesBanner,factura_lote_control.strStyleDivExpandirColapsar
																,factura_lote_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=factura_lote_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",factura_lote_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(factura_lote_control) {
		jQuery("#divTablaDatosfactura_lotesAjaxWebPart").html(factura_lote_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosfactura_lotes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(factura_lote_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosfactura_lotes=jQuery("#tblTablaDatosfactura_lotes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("factura_lote",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',factura_lote_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			factura_lote_webcontrol1.registrarControlesTableEdition(factura_lote_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		factura_lote_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(factura_lote_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(factura_lote_control.factura_loteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(factura_lote_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(factura_lote_control) {
		this.actualizarCssBotonesPagina(factura_lote_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(factura_lote_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(factura_lote_control.tiposReportes,factura_lote_control.tiposReporte
															 	,factura_lote_control.tiposPaginacion,factura_lote_control.tiposAcciones
																,factura_lote_control.tiposColumnasSelect,factura_lote_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(factura_lote_control.tiposRelaciones,factura_lote_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(factura_lote_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(factura_lote_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(factura_lote_control);			
	}
	
	actualizarPaginaAreaBusquedas(factura_lote_control) {
		jQuery("#divBusquedafactura_loteAjaxWebPart").css("display",factura_lote_control.strPermisoBusqueda);
		jQuery("#trfactura_loteCabeceraBusquedas").css("display",factura_lote_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura_lote").css("display",factura_lote_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(factura_lote_control.htmlTablaOrderBy!=null
			&& factura_lote_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByfactura_loteAjaxWebPart").html(factura_lote_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//factura_lote_webcontrol1.registrarOrderByActions();
			
		}
			
		if(factura_lote_control.htmlTablaOrderByRel!=null
			&& factura_lote_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelfactura_loteAjaxWebPart").html(factura_lote_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(factura_lote_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedafactura_loteAjaxWebPart").css("display","none");
			jQuery("#trfactura_loteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedafactura_lote").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(factura_lote_control) {
		jQuery("#tdfactura_loteNuevo").css("display",factura_lote_control.strPermisoNuevo);
		jQuery("#trfactura_loteElementos").css("display",factura_lote_control.strVisibleTablaElementos);
		jQuery("#trfactura_loteAcciones").css("display",factura_lote_control.strVisibleTablaAcciones);
		jQuery("#trfactura_loteParametrosAcciones").css("display",factura_lote_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(factura_lote_control) {
	
		this.actualizarCssBotonesMantenimiento(factura_lote_control);
				
		if(factura_lote_control.factura_loteActual!=null) {//form
			
			this.actualizarCamposFormulario(factura_lote_control);			
		}
						
		this.actualizarSpanMensajesCampos(factura_lote_control);
	}
	
	actualizarPaginaUsuarioInvitado(factura_lote_control) {
	
		var indexPosition=factura_lote_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=factura_lote_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(factura_lote_control) {
		jQuery("#divResumenfactura_loteActualAjaxWebPart").html(factura_lote_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_lote_control) {
		jQuery("#divAccionesRelacionesfactura_loteAjaxWebPart").html(factura_lote_control.htmlTablaAccionesRelaciones);
			
		factura_lote_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(factura_lote_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(factura_lote_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(factura_lote_control) {
		
		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",factura_lote_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",factura_lote_control.strVisibleFK_Idasiento);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",factura_lote_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",factura_lote_control.strVisibleFK_Idcliente);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",factura_lote_control.strVisibleFK_Iddocumento_cuenta_cobrar);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",factura_lote_control.strVisibleFK_Iddocumento_cuenta_cobrar);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",factura_lote_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",factura_lote_control.strVisibleFK_Idejercicio);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",factura_lote_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",factura_lote_control.strVisibleFK_Idempresa);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idestado").attr("style",factura_lote_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idestado").attr("style",factura_lote_control.strVisibleFK_Idestado);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",factura_lote_control.strVisibleFK_Idkardex);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",factura_lote_control.strVisibleFK_Idkardex);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",factura_lote_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",factura_lote_control.strVisibleFK_Idperiodo);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",factura_lote_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",factura_lote_control.strVisibleFK_Idsucursal);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",factura_lote_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",factura_lote_control.strVisibleFK_Idtermino_pago);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",factura_lote_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",factura_lote_control.strVisibleFK_Idusuario);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",factura_lote_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",factura_lote_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionfactura_lote();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("factura_lote",id,"facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","empresa","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","sucursal","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","ejercicio","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","periodo","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","usuario","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","cliente","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","vendedor","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","termino_pago_cliente","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","estado","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","asiento","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParadocumento_cuenta_cobrar(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","documento_cuenta_cobrar","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParakardex(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","kardex","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(factura_lote_control) {
	
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id").val(factura_lote_control.factura_loteActual.id);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-version_row").val(factura_lote_control.factura_loteActual.versionRow);
		
		if(factura_lote_control.factura_loteActual.id_empresa!=null && factura_lote_control.factura_loteActual.id_empresa>-1){
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa").val() != factura_lote_control.factura_loteActual.id_empresa) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa").val(factura_lote_control.factura_loteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_sucursal!=null && factura_lote_control.factura_loteActual.id_sucursal>-1){
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal").val() != factura_lote_control.factura_loteActual.id_sucursal) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal").val(factura_lote_control.factura_loteActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_ejercicio!=null && factura_lote_control.factura_loteActual.id_ejercicio>-1){
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio").val() != factura_lote_control.factura_loteActual.id_ejercicio) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio").val(factura_lote_control.factura_loteActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_periodo!=null && factura_lote_control.factura_loteActual.id_periodo>-1){
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo").val() != factura_lote_control.factura_loteActual.id_periodo) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo").val(factura_lote_control.factura_loteActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_usuario!=null && factura_lote_control.factura_loteActual.id_usuario>-1){
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario").val() != factura_lote_control.factura_loteActual.id_usuario) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario").val(factura_lote_control.factura_loteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-numero").val(factura_lote_control.factura_loteActual.numero);
		
		if(factura_lote_control.factura_loteActual.id_cliente!=null && factura_lote_control.factura_loteActual.id_cliente>-1){
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente").val() != factura_lote_control.factura_loteActual.id_cliente) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente").val(factura_lote_control.factura_loteActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-ruc").val(factura_lote_control.factura_loteActual.ruc);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-referencia_cliente").val(factura_lote_control.factura_loteActual.referencia_cliente);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-fecha_emision").val(factura_lote_control.factura_loteActual.fecha_emision);
		
		if(factura_lote_control.factura_loteActual.id_vendedor!=null && factura_lote_control.factura_loteActual.id_vendedor>-1){
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor").val() != factura_lote_control.factura_loteActual.id_vendedor) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor").val(factura_lote_control.factura_loteActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_termino_pago!=null && factura_lote_control.factura_loteActual.id_termino_pago>-1){
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago").val() != factura_lote_control.factura_loteActual.id_termino_pago) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago").val(factura_lote_control.factura_loteActual.id_termino_pago).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago").select2("val", null);
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-fecha_vence").val(factura_lote_control.factura_loteActual.fecha_vence);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-tipo_cambio").val(factura_lote_control.factura_loteActual.tipo_cambio);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-moneda").val(factura_lote_control.factura_loteActual.moneda);
		
		if(factura_lote_control.factura_loteActual.id_estado!=null && factura_lote_control.factura_loteActual.id_estado>-1){
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado").val() != factura_lote_control.factura_loteActual.id_estado) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado").val(factura_lote_control.factura_loteActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-direccion").val(factura_lote_control.factura_loteActual.direccion);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-enviar_a").val(factura_lote_control.factura_loteActual.enviar_a);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-observacion").val(factura_lote_control.factura_loteActual.observacion);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-sub_total").val(factura_lote_control.factura_loteActual.sub_total);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-descuento_monto").val(factura_lote_control.factura_loteActual.descuento_monto);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-descuento_porciento").val(factura_lote_control.factura_loteActual.descuento_porciento);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-iva_monto").val(factura_lote_control.factura_loteActual.iva_monto);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-iva_porciento").val(factura_lote_control.factura_loteActual.iva_porciento);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-retencion_fuente_monto").val(factura_lote_control.factura_loteActual.retencion_fuente_monto);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-retencion_fuente_porciento").val(factura_lote_control.factura_loteActual.retencion_fuente_porciento);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-retencion_iva_monto").val(factura_lote_control.factura_loteActual.retencion_iva_monto);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-retencion_iva_porciento").val(factura_lote_control.factura_loteActual.retencion_iva_porciento);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-total").val(factura_lote_control.factura_loteActual.total);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-otro_monto").val(factura_lote_control.factura_loteActual.otro_monto);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-otro_porciento").val(factura_lote_control.factura_loteActual.otro_porciento);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-comprobante").val(factura_lote_control.factura_loteActual.comprobante);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-impuesto_en_precio").val(factura_lote_control.factura_loteActual.impuesto_en_precio);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-nota").val(factura_lote_control.factura_loteActual.nota);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-hora").val(factura_lote_control.factura_loteActual.hora);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-tipo_envio").val(factura_lote_control.factura_loteActual.tipo_envio);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-actualizado").val(factura_lote_control.factura_loteActual.actualizado);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-computador").val(factura_lote_control.factura_loteActual.computador);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-monto_base").val(factura_lote_control.factura_loteActual.monto_base);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-descuento_parcial_monto").val(factura_lote_control.factura_loteActual.descuento_parcial_monto);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-impuesto2_monto").val(factura_lote_control.factura_loteActual.impuesto2_monto);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-impuesto2_porciento").val(factura_lote_control.factura_loteActual.impuesto2_porciento);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-retencion_ica_monto").val(factura_lote_control.factura_loteActual.retencion_ica_monto);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-retencion_ica_porciento").val(factura_lote_control.factura_loteActual.retencion_ica_porciento);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-nro_estimado").val(factura_lote_control.factura_loteActual.nro_estimado);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-tipo_factura").val(factura_lote_control.factura_loteActual.tipo_factura);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-tipo_doc").val(factura_lote_control.factura_loteActual.tipo_doc);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-enviar").val(factura_lote_control.factura_loteActual.enviar);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-en_anexo").val(factura_lote_control.factura_loteActual.en_anexo);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-pagos").val(factura_lote_control.factura_loteActual.pagos);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-anulada").val(factura_lote_control.factura_loteActual.anulada);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-causa_anulacion").val(factura_lote_control.factura_loteActual.causa_anulacion);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-ncf").val(factura_lote_control.factura_loteActual.ncf);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-campo1").val(factura_lote_control.factura_loteActual.campo1);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-campo2").val(factura_lote_control.factura_loteActual.campo2);
		jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-campo3").val(factura_lote_control.factura_loteActual.campo3);
		
		if(factura_lote_control.factura_loteActual.id_asiento!=null && factura_lote_control.factura_loteActual.id_asiento>-1){
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_asiento").val() != factura_lote_control.factura_loteActual.id_asiento) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_asiento").val(factura_lote_control.factura_loteActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_asiento").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_documento_cuenta_cobrar!=null && factura_lote_control.factura_loteActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != factura_lote_control.factura_loteActual.id_documento_cuenta_cobrar) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(factura_lote_control.factura_loteActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_kardex!=null && factura_lote_control.factura_loteActual.id_kardex>-1){
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_kardex").val() != factura_lote_control.factura_loteActual.id_kardex) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_kardex").val(factura_lote_control.factura_loteActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_kardex").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+factura_lote_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("factura_lote","facturacion","","form_factura_lote",formulario,"","",paraEventoTabla,idFilaTabla,factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}
	
	cargarCombosFK(factura_lote_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosempresasFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombossucursalsFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosejerciciosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosperiodosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosusuariosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosclientesFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosvendedorsFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombostermino_pagosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosestadosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosasientosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarComboskardexsFK(factura_lote_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(factura_lote_control.strRecargarFkTiposNinguno!=null && factura_lote_control.strRecargarFkTiposNinguno!='NINGUNO' && factura_lote_control.strRecargarFkTiposNinguno!='') {
			
				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosempresasFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombossucursalsFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosejerciciosFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosperiodosFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosusuariosFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosclientesFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosvendedorsFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombostermino_pagosFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosestadosFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosasientosFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarComboskardexsFK(factura_lote_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(factura_lote_control) {
		jQuery("#spanstrMensajeid").text(factura_lote_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(factura_lote_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(factura_lote_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(factura_lote_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(factura_lote_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(factura_lote_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(factura_lote_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenumero").text(factura_lote_control.strMensajenumero);		
		jQuery("#spanstrMensajeid_cliente").text(factura_lote_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajeruc").text(factura_lote_control.strMensajeruc);		
		jQuery("#spanstrMensajereferencia_cliente").text(factura_lote_control.strMensajereferencia_cliente);		
		jQuery("#spanstrMensajefecha_emision").text(factura_lote_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajeid_vendedor").text(factura_lote_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajeid_termino_pago").text(factura_lote_control.strMensajeid_termino_pago);		
		jQuery("#spanstrMensajefecha_vence").text(factura_lote_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajetipo_cambio").text(factura_lote_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajemoneda").text(factura_lote_control.strMensajemoneda);		
		jQuery("#spanstrMensajeid_estado").text(factura_lote_control.strMensajeid_estado);		
		jQuery("#spanstrMensajedireccion").text(factura_lote_control.strMensajedireccion);		
		jQuery("#spanstrMensajeenviar_a").text(factura_lote_control.strMensajeenviar_a);		
		jQuery("#spanstrMensajeobservacion").text(factura_lote_control.strMensajeobservacion);		
		jQuery("#spanstrMensajesub_total").text(factura_lote_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_monto").text(factura_lote_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajedescuento_porciento").text(factura_lote_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(factura_lote_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(factura_lote_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeretencion_fuente_monto").text(factura_lote_control.strMensajeretencion_fuente_monto);		
		jQuery("#spanstrMensajeretencion_fuente_porciento").text(factura_lote_control.strMensajeretencion_fuente_porciento);		
		jQuery("#spanstrMensajeretencion_iva_monto").text(factura_lote_control.strMensajeretencion_iva_monto);		
		jQuery("#spanstrMensajeretencion_iva_porciento").text(factura_lote_control.strMensajeretencion_iva_porciento);		
		jQuery("#spanstrMensajetotal").text(factura_lote_control.strMensajetotal);		
		jQuery("#spanstrMensajeotro_monto").text(factura_lote_control.strMensajeotro_monto);		
		jQuery("#spanstrMensajeotro_porciento").text(factura_lote_control.strMensajeotro_porciento);		
		jQuery("#spanstrMensajecomprobante").text(factura_lote_control.strMensajecomprobante);		
		jQuery("#spanstrMensajeimpuesto_en_precio").text(factura_lote_control.strMensajeimpuesto_en_precio);		
		jQuery("#spanstrMensajenota").text(factura_lote_control.strMensajenota);		
		jQuery("#spanstrMensajehora").text(factura_lote_control.strMensajehora);		
		jQuery("#spanstrMensajetipo_envio").text(factura_lote_control.strMensajetipo_envio);		
		jQuery("#spanstrMensajeactualizado").text(factura_lote_control.strMensajeactualizado);		
		jQuery("#spanstrMensajecomputador").text(factura_lote_control.strMensajecomputador);		
		jQuery("#spanstrMensajemonto_base").text(factura_lote_control.strMensajemonto_base);		
		jQuery("#spanstrMensajedescuento_parcial_monto").text(factura_lote_control.strMensajedescuento_parcial_monto);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(factura_lote_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(factura_lote_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeretencion_ica_monto").text(factura_lote_control.strMensajeretencion_ica_monto);		
		jQuery("#spanstrMensajeretencion_ica_porciento").text(factura_lote_control.strMensajeretencion_ica_porciento);		
		jQuery("#spanstrMensajenro_estimado").text(factura_lote_control.strMensajenro_estimado);		
		jQuery("#spanstrMensajetipo_factura").text(factura_lote_control.strMensajetipo_factura);		
		jQuery("#spanstrMensajetipo_doc").text(factura_lote_control.strMensajetipo_doc);		
		jQuery("#spanstrMensajeenviar").text(factura_lote_control.strMensajeenviar);		
		jQuery("#spanstrMensajeen_anexo").text(factura_lote_control.strMensajeen_anexo);		
		jQuery("#spanstrMensajepagos").text(factura_lote_control.strMensajepagos);		
		jQuery("#spanstrMensajeanulada").text(factura_lote_control.strMensajeanulada);		
		jQuery("#spanstrMensajecausa_anulacion").text(factura_lote_control.strMensajecausa_anulacion);		
		jQuery("#spanstrMensajencf").text(factura_lote_control.strMensajencf);		
		jQuery("#spanstrMensajecampo1").text(factura_lote_control.strMensajecampo1);		
		jQuery("#spanstrMensajecampo2").text(factura_lote_control.strMensajecampo2);		
		jQuery("#spanstrMensajecampo3").text(factura_lote_control.strMensajecampo3);		
		jQuery("#spanstrMensajeid_asiento").text(factura_lote_control.strMensajeid_asiento);		
		jQuery("#spanstrMensajeid_documento_cuenta_cobrar").text(factura_lote_control.strMensajeid_documento_cuenta_cobrar);		
		jQuery("#spanstrMensajeid_kardex").text(factura_lote_control.strMensajeid_kardex);		
	}
	
	actualizarCssBotonesMantenimiento(factura_lote_control) {
		jQuery("#tdbtnNuevofactura_lote").css("visibility",factura_lote_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevofactura_lote").css("display",factura_lote_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarfactura_lote").css("visibility",factura_lote_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarfactura_lote").css("display",factura_lote_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarfactura_lote").css("visibility",factura_lote_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarfactura_lote").css("display",factura_lote_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarfactura_lote").css("visibility",factura_lote_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosfactura_lote").css("visibility",factura_lote_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosfactura_lote").css("display",factura_lote_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarfactura_lote").css("visibility",factura_lote_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarfactura_lote").css("visibility",factura_lote_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarfactura_lote").css("visibility",factura_lote_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionfactura_modelo").click(function(){

			var idActual=jQuery(this).attr("idactualfactura_lote");

			factura_lote_webcontrol1.registrarSesionParafactura_modeloes(idActual);
		});
		jQuery("#imgdivrelacionfactura_lote_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualfactura_lote");

			factura_lote_webcontrol1.registrarSesionParafactura_lote_detalles(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_cliente") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.factura_loteActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.factura_loteActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.factura_loteActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.clientesFK);
	}

	cargarComboEditarTablavendedorFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pagoFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.termino_pagosFK);
	}

	cargarComboEditarTablaestadoFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.asientosFK);
	}

	cargarComboEditarTabladocumento_cuenta_cobrarFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.documento_cuenta_cobrarsFK);
	}

	cargarComboEditarTablakardexFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(factura_lote_control) {
		var i=0;
		
		i=factura_lote_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(factura_lote_control.factura_loteActual.id);
		jQuery("#t-version_row_"+i+"").val(factura_lote_control.factura_loteActual.versionRow);
		
		if(factura_lote_control.factura_loteActual.id_empresa!=null && factura_lote_control.factura_loteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != factura_lote_control.factura_loteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(factura_lote_control.factura_loteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_sucursal!=null && factura_lote_control.factura_loteActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != factura_lote_control.factura_loteActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(factura_lote_control.factura_loteActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_ejercicio!=null && factura_lote_control.factura_loteActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != factura_lote_control.factura_loteActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(factura_lote_control.factura_loteActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_periodo!=null && factura_lote_control.factura_loteActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != factura_lote_control.factura_loteActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(factura_lote_control.factura_loteActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_usuario!=null && factura_lote_control.factura_loteActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != factura_lote_control.factura_loteActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(factura_lote_control.factura_loteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(factura_lote_control.factura_loteActual.numero);
		
		if(factura_lote_control.factura_loteActual.id_cliente!=null && factura_lote_control.factura_loteActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != factura_lote_control.factura_loteActual.id_cliente) {
				jQuery("#t-cel_"+i+"_8").val(factura_lote_control.factura_loteActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(factura_lote_control.factura_loteActual.ruc);
		jQuery("#t-cel_"+i+"_10").val(factura_lote_control.factura_loteActual.referencia_cliente);
		jQuery("#t-cel_"+i+"_11").val(factura_lote_control.factura_loteActual.fecha_emision);
		
		if(factura_lote_control.factura_loteActual.id_vendedor!=null && factura_lote_control.factura_loteActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != factura_lote_control.factura_loteActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_12").val(factura_lote_control.factura_loteActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_termino_pago!=null && factura_lote_control.factura_loteActual.id_termino_pago>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != factura_lote_control.factura_loteActual.id_termino_pago) {
				jQuery("#t-cel_"+i+"_13").val(factura_lote_control.factura_loteActual.id_termino_pago).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(factura_lote_control.factura_loteActual.fecha_vence);
		jQuery("#t-cel_"+i+"_15").val(factura_lote_control.factura_loteActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_16").val(factura_lote_control.factura_loteActual.moneda);
		
		if(factura_lote_control.factura_loteActual.id_estado!=null && factura_lote_control.factura_loteActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_17").val() != factura_lote_control.factura_loteActual.id_estado) {
				jQuery("#t-cel_"+i+"_17").val(factura_lote_control.factura_loteActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_17").select2("val", null);
			if(jQuery("#t-cel_"+i+"_17").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_17").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_18").val(factura_lote_control.factura_loteActual.direccion);
		jQuery("#t-cel_"+i+"_19").val(factura_lote_control.factura_loteActual.enviar_a);
		jQuery("#t-cel_"+i+"_20").val(factura_lote_control.factura_loteActual.observacion);
		jQuery("#t-cel_"+i+"_21").val(factura_lote_control.factura_loteActual.sub_total);
		jQuery("#t-cel_"+i+"_22").val(factura_lote_control.factura_loteActual.descuento_monto);
		jQuery("#t-cel_"+i+"_23").val(factura_lote_control.factura_loteActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_24").val(factura_lote_control.factura_loteActual.iva_monto);
		jQuery("#t-cel_"+i+"_25").val(factura_lote_control.factura_loteActual.iva_porciento);
		jQuery("#t-cel_"+i+"_26").val(factura_lote_control.factura_loteActual.retencion_fuente_monto);
		jQuery("#t-cel_"+i+"_27").val(factura_lote_control.factura_loteActual.retencion_fuente_porciento);
		jQuery("#t-cel_"+i+"_28").val(factura_lote_control.factura_loteActual.retencion_iva_monto);
		jQuery("#t-cel_"+i+"_29").val(factura_lote_control.factura_loteActual.retencion_iva_porciento);
		jQuery("#t-cel_"+i+"_30").val(factura_lote_control.factura_loteActual.total);
		jQuery("#t-cel_"+i+"_31").val(factura_lote_control.factura_loteActual.otro_monto);
		jQuery("#t-cel_"+i+"_32").val(factura_lote_control.factura_loteActual.otro_porciento);
		jQuery("#t-cel_"+i+"_33").val(factura_lote_control.factura_loteActual.comprobante);
		jQuery("#t-cel_"+i+"_34").val(factura_lote_control.factura_loteActual.impuesto_en_precio);
		jQuery("#t-cel_"+i+"_35").val(factura_lote_control.factura_loteActual.nota);
		jQuery("#t-cel_"+i+"_36").val(factura_lote_control.factura_loteActual.hora);
		jQuery("#t-cel_"+i+"_37").val(factura_lote_control.factura_loteActual.tipo_envio);
		jQuery("#t-cel_"+i+"_38").val(factura_lote_control.factura_loteActual.actualizado);
		jQuery("#t-cel_"+i+"_39").val(factura_lote_control.factura_loteActual.computador);
		jQuery("#t-cel_"+i+"_40").val(factura_lote_control.factura_loteActual.monto_base);
		jQuery("#t-cel_"+i+"_41").val(factura_lote_control.factura_loteActual.descuento_parcial_monto);
		jQuery("#t-cel_"+i+"_42").val(factura_lote_control.factura_loteActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_43").val(factura_lote_control.factura_loteActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_44").val(factura_lote_control.factura_loteActual.retencion_ica_monto);
		jQuery("#t-cel_"+i+"_45").val(factura_lote_control.factura_loteActual.retencion_ica_porciento);
		jQuery("#t-cel_"+i+"_46").val(factura_lote_control.factura_loteActual.nro_estimado);
		jQuery("#t-cel_"+i+"_47").val(factura_lote_control.factura_loteActual.tipo_factura);
		jQuery("#t-cel_"+i+"_48").val(factura_lote_control.factura_loteActual.tipo_doc);
		jQuery("#t-cel_"+i+"_49").val(factura_lote_control.factura_loteActual.enviar);
		jQuery("#t-cel_"+i+"_50").val(factura_lote_control.factura_loteActual.en_anexo);
		jQuery("#t-cel_"+i+"_51").val(factura_lote_control.factura_loteActual.pagos);
		jQuery("#t-cel_"+i+"_52").val(factura_lote_control.factura_loteActual.anulada);
		jQuery("#t-cel_"+i+"_53").val(factura_lote_control.factura_loteActual.causa_anulacion);
		jQuery("#t-cel_"+i+"_54").val(factura_lote_control.factura_loteActual.ncf);
		jQuery("#t-cel_"+i+"_55").val(factura_lote_control.factura_loteActual.campo1);
		jQuery("#t-cel_"+i+"_56").val(factura_lote_control.factura_loteActual.campo2);
		jQuery("#t-cel_"+i+"_57").val(factura_lote_control.factura_loteActual.campo3);
		
		if(factura_lote_control.factura_loteActual.id_asiento!=null && factura_lote_control.factura_loteActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_58").val() != factura_lote_control.factura_loteActual.id_asiento) {
				jQuery("#t-cel_"+i+"_58").val(factura_lote_control.factura_loteActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_58").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_58").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_documento_cuenta_cobrar!=null && factura_lote_control.factura_loteActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_59").val() != factura_lote_control.factura_loteActual.id_documento_cuenta_cobrar) {
				jQuery("#t-cel_"+i+"_59").val(factura_lote_control.factura_loteActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_59").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_59").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_kardex!=null && factura_lote_control.factura_loteActual.id_kardex>-1){
			if(jQuery("#t-cel_"+i+"_60").val() != factura_lote_control.factura_loteActual.id_kardex) {
				jQuery("#t-cel_"+i+"_60").val(factura_lote_control.factura_loteActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_60").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_60").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(factura_lote_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura_modelo").click(function(){
		jQuery("#tblTablaDatosfactura_lotes").on("click",".imgrelacionfactura_modelo", function () {

			var idActual=jQuery(this).attr("idactualfactura_lote");

			factura_lote_webcontrol1.registrarSesionParafactura_modeloes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura_lote_detalle").click(function(){
		jQuery("#tblTablaDatosfactura_lotes").on("click",".imgrelacionfactura_lote_detalle", function () {

			var idActual=jQuery(this).attr("idactualfactura_lote");

			factura_lote_webcontrol1.registrarSesionParafactura_lote_detalles(idActual);
		});				
	}
		
	

	registrarSesionParafactura_modeloes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"factura_lote","factura_modelo","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,"es","");
	}

	registrarSesionParafactura_lote_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"factura_lote","factura_lote_detalle","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(factura_lote_control) {
		factura_lote_funcion1.registrarControlesTableValidacionEdition(factura_lote_control,factura_lote_webcontrol1,factura_lote_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_loteConstante,strParametros);
		
		//factura_lote_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa",factura_lote_control.empresasFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_2",factura_lote_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal",factura_lote_control.sucursalsFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_3",factura_lote_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio",factura_lote_control.ejerciciosFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_4",factura_lote_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo",factura_lote_control.periodosFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_5",factura_lote_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario",factura_lote_control.usuariosFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_6",factura_lote_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente",factura_lote_control.clientesFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_8",factura_lote_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",factura_lote_control.clientesFK);

	};

	cargarCombosvendedorsFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor",factura_lote_control.vendedorsFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_12",factura_lote_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",factura_lote_control.vendedorsFK);

	};

	cargarCombostermino_pagosFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago",factura_lote_control.termino_pagosFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_13",factura_lote_control.termino_pagosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago",factura_lote_control.termino_pagosFK);

	};

	cargarCombosestadosFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado",factura_lote_control.estadosFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_17",factura_lote_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",factura_lote_control.estadosFK);

	};

	cargarCombosasientosFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_asiento",factura_lote_control.asientosFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_58",factura_lote_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",factura_lote_control.asientosFK);

	};

	cargarCombosdocumento_cuenta_cobrarsFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar",factura_lote_control.documento_cuenta_cobrarsFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_59",factura_lote_control.documento_cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar",factura_lote_control.documento_cuenta_cobrarsFK);

	};

	cargarComboskardexsFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_kardex",factura_lote_control.kardexsFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_60",factura_lote_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",factura_lote_control.kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(factura_lote_control) {

	};

	registrarComboActionChangeCombossucursalsFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosperiodosFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosusuariosFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosclientesFK(factura_lote_control) {
		this.registrarComboActionChangeid_cliente("form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente",false,0);


		this.registrarComboActionChangeid_cliente(""+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(factura_lote_control) {

	};

	registrarComboActionChangeCombostermino_pagosFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosestadosFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosasientosFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(factura_lote_control) {

	};

	registrarComboActionChangeComboskardexsFK(factura_lote_control) {

	};

	
	
	setDefectoValorCombosempresasFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idempresaDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa").val() != factura_lote_control.idempresaDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa").val(factura_lote_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idsucursalDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal").val() != factura_lote_control.idsucursalDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal").val(factura_lote_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idejercicioDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio").val() != factura_lote_control.idejercicioDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio").val(factura_lote_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idperiodoDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo").val() != factura_lote_control.idperiodoDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo").val(factura_lote_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idusuarioDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario").val() != factura_lote_control.idusuarioDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario").val(factura_lote_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idclienteDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente").val() != factura_lote_control.idclienteDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente").val(factura_lote_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(factura_lote_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idvendedorDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor").val() != factura_lote_control.idvendedorDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor").val(factura_lote_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(factura_lote_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pagosFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idtermino_pagoDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago").val() != factura_lote_control.idtermino_pagoDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago").val(factura_lote_control.idtermino_pagoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago").val(factura_lote_control.idtermino_pagoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idestadoDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado").val() != factura_lote_control.idestadoDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado").val(factura_lote_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(factura_lote_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idasientoDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_asiento").val() != factura_lote_control.idasientoDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_asiento").val(factura_lote_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(factura_lote_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_cuenta_cobrarsFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.iddocumento_cuenta_cobrarDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != factura_lote_control.iddocumento_cuenta_cobrarDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(factura_lote_control.iddocumento_cuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(factura_lote_control.iddocumento_cuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idkardexDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_kardex").val() != factura_lote_control.idkardexDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_kardex").val(factura_lote_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(factura_lote_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_cliente(id_cliente,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura_lote","facturacion","","id_cliente",id_cliente,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	












	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(factura_lote_constante1.BIT_ES_PAGINA_FORM==true) {
			
							factura_modelo_webcontrol1.onLoadWindow();
							factura_lote_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(factura_lote_constante1.BIT_ES_PAGINA_FORM==true) {
			
		factura_modelo_webcontrol1.onLoadRecargarRelacionado();
		factura_lote_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//factura_lote_control
		
	
	}
	
	onLoadCombosDefectoFK(factura_lote_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_lote_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosempresasFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombossucursalsFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosejerciciosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosperiodosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosusuariosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosclientesFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosvendedorsFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombostermino_pagosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosestadosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosasientosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosdocumento_cuenta_cobrarsFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorComboskardexsFK(factura_lote_control);
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
	onLoadCombosEventosFK(factura_lote_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_lote_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosempresasFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombossucursalsFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosejerciciosFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosperiodosFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosusuariosFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosclientesFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosvendedorsFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombostermino_pagosFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosestadosFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosasientosFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeComboskardexsFK(factura_lote_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(factura_lote_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_lote_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("factura_lote");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("factura_lote");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(factura_lote_funcion1,factura_lote_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(factura_lote_funcion1,factura_lote_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(factura_lote_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);			
			
			if(factura_lote_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,"factura_lote");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago","cuentascobrar","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago");
				//alert(jQuery('#form-id_termino_pago_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_cobrar","id_documento_cuenta_cobrar","cuentascobrar","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParadocumento_cuenta_cobrar("id_documento_cuenta_cobrar");
				//alert(jQuery('#form-id_documento_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idasiento","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idcliente","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Iddocumento_cuenta_cobrar","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idejercicio","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idempresa","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idestado","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idkardex","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idperiodo","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idsucursal","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idtermino_pago","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idusuario","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idvendedor","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("factura_lote");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			factura_lote_funcion1.validarFormularioJQuery(factura_lote_constante1);
			
			if(factura_lote_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(factura_lote_control) {
		
		jQuery("#divBusquedafactura_loteAjaxWebPart").css("display",factura_lote_control.strPermisoBusqueda);
		jQuery("#trfactura_loteCabeceraBusquedas").css("display",factura_lote_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura_lote").css("display",factura_lote_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportefactura_lote").css("display",factura_lote_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosfactura_lote").attr("style",factura_lote_control.strPermisoMostrarTodos);
		
		if(factura_lote_control.strPermisoNuevo!=null) {
			jQuery("#tdfactura_loteNuevo").css("display",factura_lote_control.strPermisoNuevo);
			jQuery("#tdfactura_loteNuevoToolBar").css("display",factura_lote_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdfactura_loteDuplicar").css("display",factura_lote_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfactura_loteDuplicarToolBar").css("display",factura_lote_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfactura_loteNuevoGuardarCambios").css("display",factura_lote_control.strPermisoNuevo);
			jQuery("#tdfactura_loteNuevoGuardarCambiosToolBar").css("display",factura_lote_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(factura_lote_control.strPermisoActualizar!=null) {
			jQuery("#tdfactura_loteActualizarToolBar").css("display",factura_lote_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_loteCopiar").css("display",factura_lote_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_loteCopiarToolBar").css("display",factura_lote_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_loteConEditar").css("display",factura_lote_control.strPermisoActualizar);
		}
		
		jQuery("#tdfactura_loteEliminarToolBar").css("display",factura_lote_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdfactura_loteGuardarCambios").css("display",factura_lote_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdfactura_loteGuardarCambiosToolBar").css("display",factura_lote_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trfactura_loteElementos").css("display",factura_lote_control.strVisibleTablaElementos);
		
		jQuery("#trfactura_loteAcciones").css("display",factura_lote_control.strVisibleTablaAcciones);
		jQuery("#trfactura_loteParametrosAcciones").css("display",factura_lote_control.strVisibleTablaAcciones);
			
		jQuery("#tdfactura_loteCerrarPagina").css("display",factura_lote_control.strPermisoPopup);		
		jQuery("#tdfactura_loteCerrarPaginaToolBar").css("display",factura_lote_control.strPermisoPopup);
		//jQuery("#trfactura_loteAccionesRelaciones").css("display",factura_lote_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		factura_lote_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		factura_lote_webcontrol1.registrarEventosControles();
		
		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(factura_lote_constante1.STR_ES_RELACIONADO=="false") {
			factura_lote_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(factura_lote_constante1.STR_ES_RELACIONES=="true") {
			if(factura_lote_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_lote_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(factura_lote_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(factura_lote_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				factura_lote_webcontrol1.onLoad();
				
			} else {
				if(factura_lote_constante1.BIT_ES_PAGINA_FORM==true) {
					if(factura_lote_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
						//factura_lote_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(factura_lote_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(factura_lote_constante1.BIG_ID_ACTUAL,"factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
						//factura_lote_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			factura_lote_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var factura_lote_webcontrol1=new factura_lote_webcontrol();

if(factura_lote_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = factura_lote_webcontrol1.onLoadWindow; 
}

//</script>