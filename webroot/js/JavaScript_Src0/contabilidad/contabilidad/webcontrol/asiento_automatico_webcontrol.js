//<script type="text/javascript" language="javascript">



//var asiento_automaticoJQueryPaginaWebInteraccion= function (asiento_automatico_control) {
//this.,this.,this.

class asiento_automatico_webcontrol extends asiento_automatico_webcontrol_add {
	
	asiento_automatico_control=null;
	asiento_automatico_controlInicial=null;
	asiento_automatico_controlAuxiliar=null;
		
	//if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_automatico_control) {
		super();
		
		this.asiento_automatico_control=asiento_automatico_control;
	}
		
	actualizarVariablesPagina(asiento_automatico_control) {
		
		if(asiento_automatico_control.action=="index" || asiento_automatico_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_automatico_control);
			
		} else if(asiento_automatico_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(asiento_automatico_control);
			
		} else if(asiento_automatico_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(asiento_automatico_control);
			
		} else if(asiento_automatico_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_automatico_control);		
		
		} else if(asiento_automatico_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(asiento_automatico_control);		
		
		} else if(asiento_automatico_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_automatico_control);		
		
		} else if(asiento_automatico_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_automatico_control);		
		}
		else if(asiento_automatico_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_control);		
		}
		else if(asiento_automatico_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_automatico_control);		
		}
		else if(asiento_automatico_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_automatico_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(asiento_automatico_control.action + " Revisar Manejo");
			
			if(asiento_automatico_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(asiento_automatico_control);
				
				return;
			}
			
			//if(asiento_automatico_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(asiento_automatico_control);
			//}
			
			if(asiento_automatico_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(asiento_automatico_control);
			}
			
			if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_automatico_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(asiento_automatico_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(asiento_automatico_control, false);			
			}
			
			if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(asiento_automatico_control);	
			}
			
			if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(asiento_automatico_control);
			}
			
			if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(asiento_automatico_control);
			}
			
			if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(asiento_automatico_control);
			}
			
			if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(asiento_automatico_control);	
			}
			
			if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
			}
			
			if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(asiento_automatico_control);
			}
			
			
			if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(asiento_automatico_control);			
			}
			
			if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(asiento_automatico_control);
			}
			
			
			if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_control);
			}
			
			if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(asiento_automatico_control);
			}				
			
			if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_automatico_control);
			}
			
			if(asiento_automatico_control.usuarioActual!=null && asiento_automatico_control.usuarioActual.field_strUserName!=null &&
			asiento_automatico_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(asiento_automatico_control);			
			}
		}
		
		
		if(asiento_automatico_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_automatico_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(asiento_automatico_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_automatico_control);
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_control);
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_control);
		this.actualizarPaginaAreaBusquedas(asiento_automatico_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_automatico_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_automatico_control);
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_control);
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_control);
		this.actualizarPaginaAreaBusquedas(asiento_automatico_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(asiento_automatico_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(asiento_automatico_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(asiento_automatico_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_automatico_control) {
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(asiento_automatico_control) {
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_automatico_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_control);
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_automatico_control) {
		this.actualizarPaginaAbrirLink(asiento_automatico_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);				
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		this.actualizarPaginaFormulario(asiento_automatico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		this.actualizarPaginaFormulario(asiento_automatico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(asiento_automatico_control) {
		this.actualizarPaginaFormulario(asiento_automatico_control);
		this.onLoadCombosDefectoFK(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		this.actualizarPaginaFormulario(asiento_automatico_control);
		this.onLoadCombosDefectoFK(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_automatico_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_control);
		this.actualizarPaginaFormulario(asiento_automatico_control);
		this.onLoadCombosDefectoFK(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_automatico_control) {
		this.actualizarPaginaAbrirLink(asiento_automatico_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_automatico_control) {
		this.actualizarPaginaImprimir(asiento_automatico_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_automatico_control) {
		this.actualizarPaginaImprimir(asiento_automatico_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_automatico_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_automatico_control) {
		//FORMULARIO
		if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_automatico_control);
			this.actualizarPaginaFormularioAdd(asiento_automatico_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		//COMBOS FK
		if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_automatico_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(asiento_automatico_control) {
		//FORMULARIO
		if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_automatico_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);	
		//COMBOS FK
		if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_automatico_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		this.actualizarPaginaFormulario(asiento_automatico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_automatico_control) {
		//FORMULARIO
		if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_automatico_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_automatico_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);	
		//COMBOS FK
		if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_automatico_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_automatico_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_automatico_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control) {
		if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_automatico_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_automatico_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_automatico_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_automatico_control) {
		if(asiento_automatico_funcion1.esPaginaForm()==true) {
			window.opener.asiento_automatico_webcontrol1.actualizarPaginaTablaDatos(asiento_automatico_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_automatico_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_automatico_control) {
		asiento_automatico_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_automatico_control.strAuxiliarUrlPagina);
				
		asiento_automatico_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_automatico_control.strAuxiliarTipo,asiento_automatico_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_automatico_control) {
		asiento_automatico_funcion1.resaltarRestaurarDivMensaje(true,asiento_automatico_control.strAuxiliarMensajeAlert,asiento_automatico_control.strAuxiliarCssMensaje);
			
		if(asiento_automatico_funcion1.esPaginaForm()==true) {
			window.opener.asiento_automatico_funcion1.resaltarRestaurarDivMensaje(true,asiento_automatico_control.strAuxiliarMensajeAlert,asiento_automatico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(asiento_automatico_control) {
		eval(asiento_automatico_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(asiento_automatico_control, mostrar) {
		
		if(mostrar==true) {
			asiento_automatico_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_automatico_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			asiento_automatico_funcion1.mostrarDivMensaje(true,asiento_automatico_control.strAuxiliarMensaje,asiento_automatico_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_automatico_funcion1.mostrarDivMensaje(false,asiento_automatico_control.strAuxiliarMensaje,asiento_automatico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(asiento_automatico_control) {
	
		funcionGeneral.printWebPartPage("asiento_automatico",asiento_automatico_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarasiento_automaticosAjaxWebPart").html(asiento_automatico_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("asiento_automatico",jQuery("#divTablaDatosReporteAuxiliarasiento_automaticosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(asiento_automatico_control) {
		this.asiento_automatico_controlInicial=asiento_automatico_control;
			
		if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_automatico_control.strStyleDivArbol,asiento_automatico_control.strStyleDivContent
																,asiento_automatico_control.strStyleDivOpcionesBanner,asiento_automatico_control.strStyleDivExpandirColapsar
																,asiento_automatico_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=asiento_automatico_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",asiento_automatico_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(asiento_automatico_control) {
		jQuery("#divTablaDatosasiento_automaticosAjaxWebPart").html(asiento_automatico_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosasiento_automaticos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosasiento_automaticos=jQuery("#tblTablaDatosasiento_automaticos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("asiento_automatico",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',asiento_automatico_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			asiento_automatico_webcontrol1.registrarControlesTableEdition(asiento_automatico_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		asiento_automatico_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(asiento_automatico_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(asiento_automatico_control.asiento_automaticoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(asiento_automatico_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(asiento_automatico_control) {
		this.actualizarCssBotonesPagina(asiento_automatico_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_automatico_control.tiposReportes,asiento_automatico_control.tiposReporte
															 	,asiento_automatico_control.tiposPaginacion,asiento_automatico_control.tiposAcciones
																,asiento_automatico_control.tiposColumnasSelect,asiento_automatico_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(asiento_automatico_control.tiposRelaciones,asiento_automatico_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_automatico_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_automatico_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_automatico_control);			
	}
	
	actualizarPaginaAreaBusquedas(asiento_automatico_control) {
		jQuery("#divBusquedaasiento_automaticoAjaxWebPart").css("display",asiento_automatico_control.strPermisoBusqueda);
		jQuery("#trasiento_automaticoCabeceraBusquedas").css("display",asiento_automatico_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_automatico").css("display",asiento_automatico_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(asiento_automatico_control.htmlTablaOrderBy!=null
			&& asiento_automatico_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByasiento_automaticoAjaxWebPart").html(asiento_automatico_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//asiento_automatico_webcontrol1.registrarOrderByActions();
			
		}
			
		if(asiento_automatico_control.htmlTablaOrderByRel!=null
			&& asiento_automatico_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelasiento_automaticoAjaxWebPart").html(asiento_automatico_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(asiento_automatico_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaasiento_automaticoAjaxWebPart").css("display","none");
			jQuery("#trasiento_automaticoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaasiento_automatico").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(asiento_automatico_control) {
		jQuery("#tdasiento_automaticoNuevo").css("display",asiento_automatico_control.strPermisoNuevo);
		jQuery("#trasiento_automaticoElementos").css("display",asiento_automatico_control.strVisibleTablaElementos);
		jQuery("#trasiento_automaticoAcciones").css("display",asiento_automatico_control.strVisibleTablaAcciones);
		jQuery("#trasiento_automaticoParametrosAcciones").css("display",asiento_automatico_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(asiento_automatico_control) {
	
		this.actualizarCssBotonesMantenimiento(asiento_automatico_control);
				
		if(asiento_automatico_control.asiento_automaticoActual!=null) {//form
			
			this.actualizarCamposFormulario(asiento_automatico_control);			
		}
						
		this.actualizarSpanMensajesCampos(asiento_automatico_control);
	}
	
	actualizarPaginaUsuarioInvitado(asiento_automatico_control) {
	
		var indexPosition=asiento_automatico_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_automatico_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(asiento_automatico_control) {
		jQuery("#divResumenasiento_automaticoActualAjaxWebPart").html(asiento_automatico_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_automatico_control) {
		jQuery("#divAccionesRelacionesasiento_automaticoAjaxWebPart").html(asiento_automatico_control.htmlTablaAccionesRelaciones);
			
		asiento_automatico_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(asiento_automatico_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(asiento_automatico_control) {
		
		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_automatico_control.strVisibleFK_Idcentro_costo);
			jQuery("#tblstrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_automatico_control.strVisibleFK_Idcentro_costo);
		}

		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_automatico_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_automatico_control.strVisibleFK_Idempresa);
		}

		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente").attr("style",asiento_automatico_control.strVisibleFK_Idfuente);
			jQuery("#tblstrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente").attr("style",asiento_automatico_control.strVisibleFK_Idfuente);
		}

		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",asiento_automatico_control.strVisibleFK_Idlibro_auxiliar);
			jQuery("#tblstrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",asiento_automatico_control.strVisibleFK_Idlibro_auxiliar);
		}

		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",asiento_automatico_control.strVisibleFK_Idmodulo);
			jQuery("#tblstrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",asiento_automatico_control.strVisibleFK_Idmodulo);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionasiento_automatico();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("asiento_automatico",id,"contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		asiento_automatico_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico","empresa","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}

	abrirBusquedaParamodulo(strNombreCampoBusqueda){//idActual
		asiento_automatico_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico","modulo","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}

	abrirBusquedaParafuente(strNombreCampoBusqueda){//idActual
		asiento_automatico_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico","fuente","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}

	abrirBusquedaParalibro_auxiliar(strNombreCampoBusqueda){//idActual
		asiento_automatico_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico","libro_auxiliar","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}

	abrirBusquedaParacentro_costo(strNombreCampoBusqueda){//idActual
		asiento_automatico_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico","centro_costo","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(asiento_automatico_control) {
	
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id").val(asiento_automatico_control.asiento_automaticoActual.id);
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-version_row").val(asiento_automatico_control.asiento_automaticoActual.versionRow);
		
		if(asiento_automatico_control.asiento_automaticoActual.id_empresa!=null && asiento_automatico_control.asiento_automaticoActual.id_empresa>-1){
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_automatico_control.asiento_automaticoActual.id_empresa) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val(asiento_automatico_control.asiento_automaticoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_control.asiento_automaticoActual.id_modulo!=null && asiento_automatico_control.asiento_automaticoActual.id_modulo>-1){
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val() != asiento_automatico_control.asiento_automaticoActual.id_modulo) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val(asiento_automatico_control.asiento_automaticoActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").select2("val", null);
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-codigo").val(asiento_automatico_control.asiento_automaticoActual.codigo);
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-nombre").val(asiento_automatico_control.asiento_automaticoActual.nombre);
		
		if(asiento_automatico_control.asiento_automaticoActual.id_fuente!=null && asiento_automatico_control.asiento_automaticoActual.id_fuente>-1){
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val() != asiento_automatico_control.asiento_automaticoActual.id_fuente) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val(asiento_automatico_control.asiento_automaticoActual.id_fuente).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").select2("val", null);
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar!=null && asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar>-1){
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").select2("val", null);
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_control.asiento_automaticoActual.id_centro_costo!=null && asiento_automatico_control.asiento_automaticoActual.id_centro_costo>-1){
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_automatico_control.asiento_automaticoActual.id_centro_costo) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_automatico_control.asiento_automaticoActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").select2("val", null);
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-descripcion").val(asiento_automatico_control.asiento_automaticoActual.descripcion);
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-activo").prop('checked',asiento_automatico_control.asiento_automaticoActual.activo);
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-asignada").val(asiento_automatico_control.asiento_automaticoActual.asignada);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+asiento_automatico_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("asiento_automatico","contabilidad","","form_asiento_automatico",formulario,"","",paraEventoTabla,idFilaTabla,asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}
	
	cargarCombosFK(asiento_automatico_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarCombosempresasFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarCombosmodulosFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarCombosfuentesFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarComboscentro_costosFK(asiento_automatico_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_automatico_control.strRecargarFkTiposNinguno!=null && asiento_automatico_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_automatico_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarCombosempresasFK(asiento_automatico_control);
				}

				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarCombosmodulosFK(asiento_automatico_control);
				}

				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_fuente",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarCombosfuentesFK(asiento_automatico_control);
				}

				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_automatico_control);
				}

				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarComboscentro_costosFK(asiento_automatico_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(asiento_automatico_control) {
		jQuery("#spanstrMensajeid").text(asiento_automatico_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(asiento_automatico_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(asiento_automatico_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_modulo").text(asiento_automatico_control.strMensajeid_modulo);		
		jQuery("#spanstrMensajecodigo").text(asiento_automatico_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(asiento_automatico_control.strMensajenombre);		
		jQuery("#spanstrMensajeid_fuente").text(asiento_automatico_control.strMensajeid_fuente);		
		jQuery("#spanstrMensajeid_libro_auxiliar").text(asiento_automatico_control.strMensajeid_libro_auxiliar);		
		jQuery("#spanstrMensajeid_centro_costo").text(asiento_automatico_control.strMensajeid_centro_costo);		
		jQuery("#spanstrMensajedescripcion").text(asiento_automatico_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeactivo").text(asiento_automatico_control.strMensajeactivo);		
		jQuery("#spanstrMensajeasignada").text(asiento_automatico_control.strMensajeasignada);		
	}
	
	actualizarCssBotonesMantenimiento(asiento_automatico_control) {
		jQuery("#tdbtnNuevoasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoasiento_automatico").css("display",asiento_automatico_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarasiento_automatico").css("display",asiento_automatico_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarasiento_automatico").css("display",asiento_automatico_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosasiento_automatico").css("display",asiento_automatico_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionasiento_automatico_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualasiento_automatico");

			asiento_automatico_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.empresasFK);
	}

	cargarComboEditarTablamoduloFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.modulosFK);
	}

	cargarComboEditarTablafuenteFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.fuentesFK);
	}

	cargarComboEditarTablalibro_auxiliarFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.libro_auxiliarsFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.centro_costosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(asiento_automatico_control) {
		var i=0;
		
		i=asiento_automatico_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(asiento_automatico_control.asiento_automaticoActual.id);
		jQuery("#t-version_row_"+i+"").val(asiento_automatico_control.asiento_automaticoActual.versionRow);
		
		if(asiento_automatico_control.asiento_automaticoActual.id_empresa!=null && asiento_automatico_control.asiento_automaticoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != asiento_automatico_control.asiento_automaticoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(asiento_automatico_control.asiento_automaticoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_control.asiento_automaticoActual.id_modulo!=null && asiento_automatico_control.asiento_automaticoActual.id_modulo>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != asiento_automatico_control.asiento_automaticoActual.id_modulo) {
				jQuery("#t-cel_"+i+"_3").val(asiento_automatico_control.asiento_automaticoActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(asiento_automatico_control.asiento_automaticoActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(asiento_automatico_control.asiento_automaticoActual.nombre);
		
		if(asiento_automatico_control.asiento_automaticoActual.id_fuente!=null && asiento_automatico_control.asiento_automaticoActual.id_fuente>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != asiento_automatico_control.asiento_automaticoActual.id_fuente) {
				jQuery("#t-cel_"+i+"_6").val(asiento_automatico_control.asiento_automaticoActual.id_fuente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar!=null && asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar) {
				jQuery("#t-cel_"+i+"_7").val(asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_control.asiento_automaticoActual.id_centro_costo!=null && asiento_automatico_control.asiento_automaticoActual.id_centro_costo>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != asiento_automatico_control.asiento_automaticoActual.id_centro_costo) {
				jQuery("#t-cel_"+i+"_8").val(asiento_automatico_control.asiento_automaticoActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(asiento_automatico_control.asiento_automaticoActual.descripcion);
		jQuery("#t-cel_"+i+"_10").prop('checked',asiento_automatico_control.asiento_automaticoActual.activo);
		jQuery("#t-cel_"+i+"_11").val(asiento_automatico_control.asiento_automaticoActual.asignada);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(asiento_automatico_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_automatico_detalle").click(function(){
		jQuery("#tblTablaDatosasiento_automaticos").on("click",".imgrelacionasiento_automatico_detalle", function () {

			var idActual=jQuery(this).attr("idactualasiento_automatico");

			asiento_automatico_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		});				
	}
		
	

	registrarSesionParaasiento_automatico_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"asiento_automatico","asiento_automatico_detalle","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(asiento_automatico_control) {
		asiento_automatico_funcion1.registrarControlesTableValidacionEdition(asiento_automatico_control,asiento_automatico_webcontrol1,asiento_automatico_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automaticoConstante,strParametros);
		
		//asiento_automatico_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa",asiento_automatico_control.empresasFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_2",asiento_automatico_control.empresasFK);
		}
	};

	cargarCombosmodulosFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo",asiento_automatico_control.modulosFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_3",asiento_automatico_control.modulosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo",asiento_automatico_control.modulosFK);

	};

	cargarCombosfuentesFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente",asiento_automatico_control.fuentesFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_6",asiento_automatico_control.fuentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente",asiento_automatico_control.fuentesFK);

	};

	cargarComboslibro_auxiliarsFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar",asiento_automatico_control.libro_auxiliarsFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_7",asiento_automatico_control.libro_auxiliarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar",asiento_automatico_control.libro_auxiliarsFK);

	};

	cargarComboscentro_costosFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo",asiento_automatico_control.centro_costosFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_8",asiento_automatico_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_automatico_control.centro_costosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(asiento_automatico_control) {

	};

	registrarComboActionChangeCombosmodulosFK(asiento_automatico_control) {

	};

	registrarComboActionChangeCombosfuentesFK(asiento_automatico_control) {

	};

	registrarComboActionChangeComboslibro_auxiliarsFK(asiento_automatico_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_automatico_control) {

	};

	
	
	setDefectoValorCombosempresasFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idempresaDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_automatico_control.idempresaDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val(asiento_automatico_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosmodulosFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idmoduloDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val() != asiento_automatico_control.idmoduloDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val(asiento_automatico_control.idmoduloDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val(asiento_automatico_control.idmoduloDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosfuentesFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idfuenteDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val() != asiento_automatico_control.idfuenteDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val(asiento_automatico_control.idfuenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(asiento_automatico_control.idfuenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboslibro_auxiliarsFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idlibro_auxiliarDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != asiento_automatico_control.idlibro_auxiliarDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(asiento_automatico_control.idlibro_auxiliarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(asiento_automatico_control.idlibro_auxiliarDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_automatico_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_automatico_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_automatico_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_automatico_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_automatico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorCombosempresasFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorCombosmodulosFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorCombosfuentesFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorComboslibro_auxiliarsFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_automatico_control);
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
	onLoadCombosEventosFK(asiento_automatico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeCombosempresasFK(asiento_automatico_control);
			//}

			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeCombosmodulosFK(asiento_automatico_control);
			//}

			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeCombosfuentesFK(asiento_automatico_control);
			//}

			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeComboslibro_auxiliarsFK(asiento_automatico_control);
			//}

			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_automatico_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_automatico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento_automatico");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento_automatico");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(asiento_automatico_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);			
			
			if(asiento_automatico_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,"asiento_automatico");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("fuente","id_fuente","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParafuente("id_fuente");
				//alert(jQuery('#form-id_fuente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("libro_auxiliar","id_libro_auxiliar","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParalibro_auxiliar("id_libro_auxiliar");
				//alert(jQuery('#form-id_libro_auxiliar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico","FK_Idcentro_costo","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico","FK_Idempresa","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico","FK_Idfuente","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico","FK_Idlibro_auxiliar","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico","FK_Idmodulo","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("asiento_automatico");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			asiento_automatico_funcion1.validarFormularioJQuery(asiento_automatico_constante1);
			
			if(asiento_automatico_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_automatico_control) {
		
		jQuery("#divBusquedaasiento_automaticoAjaxWebPart").css("display",asiento_automatico_control.strPermisoBusqueda);
		jQuery("#trasiento_automaticoCabeceraBusquedas").css("display",asiento_automatico_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_automatico").css("display",asiento_automatico_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteasiento_automatico").css("display",asiento_automatico_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosasiento_automatico").attr("style",asiento_automatico_control.strPermisoMostrarTodos);
		
		if(asiento_automatico_control.strPermisoNuevo!=null) {
			jQuery("#tdasiento_automaticoNuevo").css("display",asiento_automatico_control.strPermisoNuevo);
			jQuery("#tdasiento_automaticoNuevoToolBar").css("display",asiento_automatico_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdasiento_automaticoDuplicar").css("display",asiento_automatico_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_automaticoDuplicarToolBar").css("display",asiento_automatico_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_automaticoNuevoGuardarCambios").css("display",asiento_automatico_control.strPermisoNuevo);
			jQuery("#tdasiento_automaticoNuevoGuardarCambiosToolBar").css("display",asiento_automatico_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(asiento_automatico_control.strPermisoActualizar!=null) {
			jQuery("#tdasiento_automaticoActualizarToolBar").css("display",asiento_automatico_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_automaticoCopiar").css("display",asiento_automatico_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_automaticoCopiarToolBar").css("display",asiento_automatico_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_automaticoConEditar").css("display",asiento_automatico_control.strPermisoActualizar);
		}
		
		jQuery("#tdasiento_automaticoEliminarToolBar").css("display",asiento_automatico_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdasiento_automaticoGuardarCambios").css("display",asiento_automatico_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdasiento_automaticoGuardarCambiosToolBar").css("display",asiento_automatico_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trasiento_automaticoElementos").css("display",asiento_automatico_control.strVisibleTablaElementos);
		
		jQuery("#trasiento_automaticoAcciones").css("display",asiento_automatico_control.strVisibleTablaAcciones);
		jQuery("#trasiento_automaticoParametrosAcciones").css("display",asiento_automatico_control.strVisibleTablaAcciones);
			
		jQuery("#tdasiento_automaticoCerrarPagina").css("display",asiento_automatico_control.strPermisoPopup);		
		jQuery("#tdasiento_automaticoCerrarPaginaToolBar").css("display",asiento_automatico_control.strPermisoPopup);
		//jQuery("#trasiento_automaticoAccionesRelaciones").css("display",asiento_automatico_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_automatico_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_automatico_webcontrol1.registrarEventosControles();
		
		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
			asiento_automatico_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_automatico_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_automatico_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_automatico_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_automatico_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(asiento_automatico_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				asiento_automatico_webcontrol1.onLoad();
				
			} else {
				if(asiento_automatico_constante1.BIT_ES_PAGINA_FORM==true) {
					if(asiento_automatico_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
						//asiento_automatico_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(asiento_automatico_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(asiento_automatico_constante1.BIG_ID_ACTUAL,"asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
						//asiento_automatico_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			asiento_automatico_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var asiento_automatico_webcontrol1=new asiento_automatico_webcontrol();

if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_automatico_webcontrol1.onLoadWindow; 
}

//</script>