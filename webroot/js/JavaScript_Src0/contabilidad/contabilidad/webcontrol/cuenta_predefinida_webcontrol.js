//<script type="text/javascript" language="javascript">



//var cuenta_predefinidaJQueryPaginaWebInteraccion= function (cuenta_predefinida_control) {
//this.,this.,this.

class cuenta_predefinida_webcontrol extends cuenta_predefinida_webcontrol_add {
	
	cuenta_predefinida_control=null;
	cuenta_predefinida_controlInicial=null;
	cuenta_predefinida_controlAuxiliar=null;
		
	//if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_predefinida_control) {
		super();
		
		this.cuenta_predefinida_control=cuenta_predefinida_control;
	}
		
	actualizarVariablesPagina(cuenta_predefinida_control) {
		
		if(cuenta_predefinida_control.action=="index" || cuenta_predefinida_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_predefinida_control);
			
		} else if(cuenta_predefinida_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cuenta_predefinida_control);
			
		} else if(cuenta_predefinida_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cuenta_predefinida_control);
			
		} else if(cuenta_predefinida_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_predefinida_control);		
		
		} else if(cuenta_predefinida_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cuenta_predefinida_control);		
		
		} else if(cuenta_predefinida_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_predefinida_control);		
		
		} else if(cuenta_predefinida_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_predefinida_control);		
		}
		else if(cuenta_predefinida_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_predefinida_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(cuenta_predefinida_control.action + " Revisar Manejo");
			
			if(cuenta_predefinida_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(cuenta_predefinida_control);
				
				return;
			}
			
			//if(cuenta_predefinida_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(cuenta_predefinida_control);
			//}
			
			if(cuenta_predefinida_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(cuenta_predefinida_control);
			}
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_predefinida_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(cuenta_predefinida_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(cuenta_predefinida_control, false);			
			}
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(cuenta_predefinida_control);	
			}
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
			}
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(cuenta_predefinida_control);
			}
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);
			}
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(cuenta_predefinida_control);	
			}
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
			}
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(cuenta_predefinida_control);
			}
			
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(cuenta_predefinida_control);			
			}
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(cuenta_predefinida_control);
			}
			
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_predefinida_control);
			}
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(cuenta_predefinida_control);
			}				
			
			if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_predefinida_control);
			}
			
			if(cuenta_predefinida_control.usuarioActual!=null && cuenta_predefinida_control.usuarioActual.field_strUserName!=null &&
			cuenta_predefinida_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(cuenta_predefinida_control);			
			}
		}
		
		
		if(cuenta_predefinida_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_predefinida_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(cuenta_predefinida_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_predefinida_control);
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_predefinida_control);
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_predefinida_control);
		this.actualizarPaginaAreaBusquedas(cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_predefinida_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_predefinida_control);
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_predefinida_control);
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_predefinida_control);
		this.actualizarPaginaAreaBusquedas(cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_predefinida_control) {
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cuenta_predefinida_control) {
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_predefinida_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_predefinida_control) {
		this.actualizarPaginaAbrirLink(cuenta_predefinida_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);				
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		this.actualizarPaginaFormulario(cuenta_predefinida_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		this.actualizarPaginaFormulario(cuenta_predefinida_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cuenta_predefinida_control) {
		this.actualizarPaginaFormulario(cuenta_predefinida_control);
		this.onLoadCombosDefectoFK(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		this.actualizarPaginaFormulario(cuenta_predefinida_control);
		this.onLoadCombosDefectoFK(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_predefinida_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);
		this.actualizarPaginaFormulario(cuenta_predefinida_control);
		this.onLoadCombosDefectoFK(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_predefinida_control) {
		this.actualizarPaginaAbrirLink(cuenta_predefinida_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_predefinida_control) {
		this.actualizarPaginaImprimir(cuenta_predefinida_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_predefinida_control) {
		this.actualizarPaginaImprimir(cuenta_predefinida_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_predefinida_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_predefinida_control) {
		//FORMULARIO
		if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_predefinida_control);
			this.actualizarPaginaFormularioAdd(cuenta_predefinida_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		//COMBOS FK
		if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(cuenta_predefinida_control) {
		//FORMULARIO
		if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_predefinida_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);	
		//COMBOS FK
		if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_predefinida_control) {
		//FORMULARIO
		if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_predefinida_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_predefinida_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);	
		//COMBOS FK
		if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control) {
		if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_predefinida_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_predefinida_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_predefinida_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_predefinida_control) {
		if(cuenta_predefinida_funcion1.esPaginaForm()==true) {
			window.opener.cuenta_predefinida_webcontrol1.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_predefinida_control) {
		cuenta_predefinida_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_predefinida_control.strAuxiliarUrlPagina);
				
		cuenta_predefinida_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_predefinida_control.strAuxiliarTipo,cuenta_predefinida_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_predefinida_control) {
		cuenta_predefinida_funcion1.resaltarRestaurarDivMensaje(true,cuenta_predefinida_control.strAuxiliarMensajeAlert,cuenta_predefinida_control.strAuxiliarCssMensaje);
			
		if(cuenta_predefinida_funcion1.esPaginaForm()==true) {
			window.opener.cuenta_predefinida_funcion1.resaltarRestaurarDivMensaje(true,cuenta_predefinida_control.strAuxiliarMensajeAlert,cuenta_predefinida_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(cuenta_predefinida_control) {
		eval(cuenta_predefinida_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(cuenta_predefinida_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_predefinida_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_predefinida_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			cuenta_predefinida_funcion1.mostrarDivMensaje(true,cuenta_predefinida_control.strAuxiliarMensaje,cuenta_predefinida_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_predefinida_funcion1.mostrarDivMensaje(false,cuenta_predefinida_control.strAuxiliarMensaje,cuenta_predefinida_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(cuenta_predefinida_control) {
	
		funcionGeneral.printWebPartPage("cuenta_predefinida",cuenta_predefinida_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcuenta_predefinidasAjaxWebPart").html(cuenta_predefinida_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("cuenta_predefinida",jQuery("#divTablaDatosReporteAuxiliarcuenta_predefinidasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(cuenta_predefinida_control) {
		this.cuenta_predefinida_controlInicial=cuenta_predefinida_control;
			
		if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_predefinida_control.strStyleDivArbol,cuenta_predefinida_control.strStyleDivContent
																,cuenta_predefinida_control.strStyleDivOpcionesBanner,cuenta_predefinida_control.strStyleDivExpandirColapsar
																,cuenta_predefinida_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=cuenta_predefinida_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cuenta_predefinida_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(cuenta_predefinida_control) {
		jQuery("#divTablaDatoscuenta_predefinidasAjaxWebPart").html(cuenta_predefinida_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscuenta_predefinidas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscuenta_predefinidas=jQuery("#tblTablaDatoscuenta_predefinidas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cuenta_predefinida",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cuenta_predefinida_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cuenta_predefinida_webcontrol1.registrarControlesTableEdition(cuenta_predefinida_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cuenta_predefinida_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(cuenta_predefinida_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cuenta_predefinida_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(cuenta_predefinida_control) {
		this.actualizarCssBotonesPagina(cuenta_predefinida_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_predefinida_control.tiposReportes,cuenta_predefinida_control.tiposReporte
															 	,cuenta_predefinida_control.tiposPaginacion,cuenta_predefinida_control.tiposAcciones
																,cuenta_predefinida_control.tiposColumnasSelect,cuenta_predefinida_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_predefinida_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_predefinida_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_predefinida_control);			
	}
	
	actualizarPaginaAreaBusquedas(cuenta_predefinida_control) {
		jQuery("#divBusquedacuenta_predefinidaAjaxWebPart").css("display",cuenta_predefinida_control.strPermisoBusqueda);
		jQuery("#trcuenta_predefinidaCabeceraBusquedas").css("display",cuenta_predefinida_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cuenta_predefinida_control.htmlTablaOrderBy!=null
			&& cuenta_predefinida_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycuenta_predefinidaAjaxWebPart").html(cuenta_predefinida_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cuenta_predefinida_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cuenta_predefinida_control.htmlTablaOrderByRel!=null
			&& cuenta_predefinida_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcuenta_predefinidaAjaxWebPart").html(cuenta_predefinida_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacuenta_predefinidaAjaxWebPart").css("display","none");
			jQuery("#trcuenta_predefinidaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacuenta_predefinida").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(cuenta_predefinida_control) {
		jQuery("#tdcuenta_predefinidaNuevo").css("display",cuenta_predefinida_control.strPermisoNuevo);
		jQuery("#trcuenta_predefinidaElementos").css("display",cuenta_predefinida_control.strVisibleTablaElementos);
		jQuery("#trcuenta_predefinidaAcciones").css("display",cuenta_predefinida_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_predefinidaParametrosAcciones").css("display",cuenta_predefinida_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cuenta_predefinida_control) {
	
		this.actualizarCssBotonesMantenimiento(cuenta_predefinida_control);
				
		if(cuenta_predefinida_control.cuenta_predefinidaActual!=null) {//form
			
			this.actualizarCamposFormulario(cuenta_predefinida_control);			
		}
						
		this.actualizarSpanMensajesCampos(cuenta_predefinida_control);
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_predefinida_control) {
	
		var indexPosition=cuenta_predefinida_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_predefinida_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(cuenta_predefinida_control) {
		jQuery("#divResumencuenta_predefinidaActualAjaxWebPart").html(cuenta_predefinida_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_predefinida_control) {
		jQuery("#divAccionesRelacionescuenta_predefinidaAjaxWebPart").html(cuenta_predefinida_control.htmlTablaAccionesRelaciones);
			
		cuenta_predefinida_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cuenta_predefinida_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cuenta_predefinida_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cuenta_predefinida_control) {
		
		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_predefinida_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_predefinida_control.strVisibleFK_Idempresa);
		}

		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta").attr("style",cuenta_predefinida_control.strVisibleFK_Idtipo_cuenta);
			jQuery("#tblstrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta").attr("style",cuenta_predefinida_control.strVisibleFK_Idtipo_cuenta);
		}

		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida").attr("style",cuenta_predefinida_control.strVisibleFK_Idtipo_cuenta_predefinida);
			jQuery("#tblstrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida").attr("style",cuenta_predefinida_control.strVisibleFK_Idtipo_cuenta_predefinida);
		}

		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta").attr("style",cuenta_predefinida_control.strVisibleFK_Idtipo_nivel_cuenta);
			jQuery("#tblstrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta").attr("style",cuenta_predefinida_control.strVisibleFK_Idtipo_nivel_cuenta);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncuenta_predefinida();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cuenta_predefinida",id,"contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cuenta_predefinida_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_predefinida","empresa","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}

	abrirBusquedaParatipo_cuenta_predefinida(strNombreCampoBusqueda){//idActual
		cuenta_predefinida_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_predefinida","tipo_cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}

	abrirBusquedaParatipo_cuenta(strNombreCampoBusqueda){//idActual
		cuenta_predefinida_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_predefinida","tipo_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}

	abrirBusquedaParatipo_nivel_cuenta(strNombreCampoBusqueda){//idActual
		cuenta_predefinida_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_predefinida","tipo_nivel_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cuenta_predefinida_control) {
	
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id").val(cuenta_predefinida_control.cuenta_predefinidaActual.id);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-version_row").val(cuenta_predefinida_control.cuenta_predefinidaActual.versionRow);
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa>-1){
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida>-1){
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").select2("val", null);
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta>-1){
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").select2("val", null);
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta>-1){
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").select2("val", null);
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-codigo_tabla").val(cuenta_predefinida_control.cuenta_predefinidaActual.codigo_tabla);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-codigo_cuenta").val(cuenta_predefinida_control.cuenta_predefinidaActual.codigo_cuenta);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-nombre_cuenta").val(cuenta_predefinida_control.cuenta_predefinidaActual.nombre_cuenta);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-monto_minimo").val(cuenta_predefinida_control.cuenta_predefinidaActual.monto_minimo);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-valor_retencion").val(cuenta_predefinida_control.cuenta_predefinidaActual.valor_retencion);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-balance").val(cuenta_predefinida_control.cuenta_predefinidaActual.balance);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-porcentaje_base").val(cuenta_predefinida_control.cuenta_predefinidaActual.porcentaje_base);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-seleccionar").val(cuenta_predefinida_control.cuenta_predefinidaActual.seleccionar);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-centro_costos").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.centro_costos);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-retencion").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.retencion);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-usa_base").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.usa_base);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-nit").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.nit);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-modifica").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.modifica);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-ultima_transaccion").val(cuenta_predefinida_control.cuenta_predefinidaActual.ultima_transaccion);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-comenta1").val(cuenta_predefinida_control.cuenta_predefinidaActual.comenta1);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-comenta2").val(cuenta_predefinida_control.cuenta_predefinidaActual.comenta2);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cuenta_predefinida_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cuenta_predefinida","contabilidad","","form_cuenta_predefinida",formulario,"","",paraEventoTabla,idFilaTabla,cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}
	
	cargarCombosFK(cuenta_predefinida_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.cargarCombosempresasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta_predefinida",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.cargarCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.cargarCombostipo_cuentasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.cargarCombostipo_nivel_cuentasFK(cuenta_predefinida_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_predefinida_control.strRecargarFkTiposNinguno!=null && cuenta_predefinida_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_predefinida_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_predefinida_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_predefinida_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_predefinida_webcontrol1.cargarCombosempresasFK(cuenta_predefinida_control);
				}

				if(cuenta_predefinida_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_cuenta_predefinida",cuenta_predefinida_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_predefinida_webcontrol1.cargarCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control);
				}

				if(cuenta_predefinida_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_predefinida_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_predefinida_webcontrol1.cargarCombostipo_cuentasFK(cuenta_predefinida_control);
				}

				if(cuenta_predefinida_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_predefinida_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_predefinida_webcontrol1.cargarCombostipo_nivel_cuentasFK(cuenta_predefinida_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(cuenta_predefinida_control) {
		jQuery("#spanstrMensajeid").text(cuenta_predefinida_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cuenta_predefinida_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cuenta_predefinida_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_tipo_cuenta_predefinida").text(cuenta_predefinida_control.strMensajeid_tipo_cuenta_predefinida);		
		jQuery("#spanstrMensajeid_tipo_cuenta").text(cuenta_predefinida_control.strMensajeid_tipo_cuenta);		
		jQuery("#spanstrMensajeid_tipo_nivel_cuenta").text(cuenta_predefinida_control.strMensajeid_tipo_nivel_cuenta);		
		jQuery("#spanstrMensajecodigo_tabla").text(cuenta_predefinida_control.strMensajecodigo_tabla);		
		jQuery("#spanstrMensajecodigo_cuenta").text(cuenta_predefinida_control.strMensajecodigo_cuenta);		
		jQuery("#spanstrMensajenombre_cuenta").text(cuenta_predefinida_control.strMensajenombre_cuenta);		
		jQuery("#spanstrMensajemonto_minimo").text(cuenta_predefinida_control.strMensajemonto_minimo);		
		jQuery("#spanstrMensajevalor_retencion").text(cuenta_predefinida_control.strMensajevalor_retencion);		
		jQuery("#spanstrMensajebalance").text(cuenta_predefinida_control.strMensajebalance);		
		jQuery("#spanstrMensajeporcentaje_base").text(cuenta_predefinida_control.strMensajeporcentaje_base);		
		jQuery("#spanstrMensajeseleccionar").text(cuenta_predefinida_control.strMensajeseleccionar);		
		jQuery("#spanstrMensajecentro_costos").text(cuenta_predefinida_control.strMensajecentro_costos);		
		jQuery("#spanstrMensajeretencion").text(cuenta_predefinida_control.strMensajeretencion);		
		jQuery("#spanstrMensajeusa_base").text(cuenta_predefinida_control.strMensajeusa_base);		
		jQuery("#spanstrMensajenit").text(cuenta_predefinida_control.strMensajenit);		
		jQuery("#spanstrMensajemodifica").text(cuenta_predefinida_control.strMensajemodifica);		
		jQuery("#spanstrMensajeultima_transaccion").text(cuenta_predefinida_control.strMensajeultima_transaccion);		
		jQuery("#spanstrMensajecomenta1").text(cuenta_predefinida_control.strMensajecomenta1);		
		jQuery("#spanstrMensajecomenta2").text(cuenta_predefinida_control.strMensajecomenta2);		
	}
	
	actualizarCssBotonesMantenimiento(cuenta_predefinida_control) {
		jQuery("#tdbtnNuevocuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(cuenta_predefinida_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_predefinida_funcion1,cuenta_predefinida_control.empresasFK);
	}

	cargarComboEditarTablatipo_cuenta_predefinidaFK(cuenta_predefinida_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_predefinida_funcion1,cuenta_predefinida_control.tipo_cuenta_predefinidasFK);
	}

	cargarComboEditarTablatipo_cuentaFK(cuenta_predefinida_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_predefinida_funcion1,cuenta_predefinida_control.tipo_cuentasFK);
	}

	cargarComboEditarTablatipo_nivel_cuentaFK(cuenta_predefinida_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_predefinida_funcion1,cuenta_predefinida_control.tipo_nivel_cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(cuenta_predefinida_control) {
		var i=0;
		
		i=cuenta_predefinida_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cuenta_predefinida_control.cuenta_predefinidaActual.id);
		jQuery("#t-version_row_"+i+"").val(cuenta_predefinida_control.cuenta_predefinidaActual.versionRow);
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida) {
				jQuery("#t-cel_"+i+"_3").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta) {
				jQuery("#t-cel_"+i+"_4").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta) {
				jQuery("#t-cel_"+i+"_5").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(cuenta_predefinida_control.cuenta_predefinidaActual.codigo_tabla);
		jQuery("#t-cel_"+i+"_7").val(cuenta_predefinida_control.cuenta_predefinidaActual.codigo_cuenta);
		jQuery("#t-cel_"+i+"_8").val(cuenta_predefinida_control.cuenta_predefinidaActual.nombre_cuenta);
		jQuery("#t-cel_"+i+"_9").val(cuenta_predefinida_control.cuenta_predefinidaActual.monto_minimo);
		jQuery("#t-cel_"+i+"_10").val(cuenta_predefinida_control.cuenta_predefinidaActual.valor_retencion);
		jQuery("#t-cel_"+i+"_11").val(cuenta_predefinida_control.cuenta_predefinidaActual.balance);
		jQuery("#t-cel_"+i+"_12").val(cuenta_predefinida_control.cuenta_predefinidaActual.porcentaje_base);
		jQuery("#t-cel_"+i+"_13").val(cuenta_predefinida_control.cuenta_predefinidaActual.seleccionar);
		jQuery("#t-cel_"+i+"_14").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.centro_costos);
		jQuery("#t-cel_"+i+"_15").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.retencion);
		jQuery("#t-cel_"+i+"_16").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.usa_base);
		jQuery("#t-cel_"+i+"_17").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.nit);
		jQuery("#t-cel_"+i+"_18").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.modifica);
		jQuery("#t-cel_"+i+"_19").val(cuenta_predefinida_control.cuenta_predefinidaActual.ultima_transaccion);
		jQuery("#t-cel_"+i+"_20").val(cuenta_predefinida_control.cuenta_predefinidaActual.comenta1);
		jQuery("#t-cel_"+i+"_21").val(cuenta_predefinida_control.cuenta_predefinidaActual.comenta2);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cuenta_predefinida_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(cuenta_predefinida_control) {
		cuenta_predefinida_funcion1.registrarControlesTableValidacionEdition(cuenta_predefinida_control,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinidaConstante,strParametros);
		
		//cuenta_predefinida_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(cuenta_predefinida_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa",cuenta_predefinida_control.empresasFK);

		if(cuenta_predefinida_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_predefinida_control.idFilaTablaActual+"_2",cuenta_predefinida_control.empresasFK);
		}
	};

	cargarCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida",cuenta_predefinida_control.tipo_cuenta_predefinidasFK);

		if(cuenta_predefinida_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_predefinida_control.idFilaTablaActual+"_3",cuenta_predefinida_control.tipo_cuenta_predefinidasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida",cuenta_predefinida_control.tipo_cuenta_predefinidasFK);

	};

	cargarCombostipo_cuentasFK(cuenta_predefinida_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta",cuenta_predefinida_control.tipo_cuentasFK);

		if(cuenta_predefinida_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_predefinida_control.idFilaTablaActual+"_4",cuenta_predefinida_control.tipo_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta",cuenta_predefinida_control.tipo_cuentasFK);

	};

	cargarCombostipo_nivel_cuentasFK(cuenta_predefinida_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta",cuenta_predefinida_control.tipo_nivel_cuentasFK);

		if(cuenta_predefinida_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_predefinida_control.idFilaTablaActual+"_5",cuenta_predefinida_control.tipo_nivel_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta",cuenta_predefinida_control.tipo_nivel_cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_predefinida_control) {

	};

	registrarComboActionChangeCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control) {

	};

	registrarComboActionChangeCombostipo_cuentasFK(cuenta_predefinida_control) {

	};

	registrarComboActionChangeCombostipo_nivel_cuentasFK(cuenta_predefinida_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_predefinida_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_predefinida_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_predefinida_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_predefinida_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_predefinida_control.idtipo_cuenta_predefinidaDefaultFK>-1 && jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val() != cuenta_predefinida_control.idtipo_cuenta_predefinidaDefaultFK) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val(cuenta_predefinida_control.idtipo_cuenta_predefinidaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida").val(cuenta_predefinida_control.idtipo_cuenta_predefinidaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_cuentasFK(cuenta_predefinida_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_predefinida_control.idtipo_cuentaDefaultFK>-1 && jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != cuenta_predefinida_control.idtipo_cuentaDefaultFK) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(cuenta_predefinida_control.idtipo_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(cuenta_predefinida_control.idtipo_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_nivel_cuentasFK(cuenta_predefinida_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_predefinida_control.idtipo_nivel_cuentaDefaultFK>-1 && jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != cuenta_predefinida_control.idtipo_nivel_cuentaDefaultFK) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(cuenta_predefinida_control.idtipo_nivel_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val(cuenta_predefinida_control.idtipo_nivel_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_predefinida_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.setDefectoValorCombosempresasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta_predefinida",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.setDefectoValorCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.setDefectoValorCombostipo_cuentasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.setDefectoValorCombostipo_nivel_cuentasFK(cuenta_predefinida_control);
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
	onLoadCombosEventosFK(cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_predefinida_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_predefinida_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_predefinida_control);
			//}

			//if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta_predefinida",cuenta_predefinida_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_predefinida_webcontrol1.registrarComboActionChangeCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control);
			//}

			//if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_predefinida_webcontrol1.registrarComboActionChangeCombostipo_cuentasFK(cuenta_predefinida_control);
			//}

			//if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_predefinida_webcontrol1.registrarComboActionChangeCombostipo_nivel_cuentasFK(cuenta_predefinida_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_predefinida");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_predefinida");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cuenta_predefinida_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);			
			
			if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,"cuenta_predefinida");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_predefinida_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_cuenta_predefinida","id_tipo_cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida_img_busqueda").click(function(){
				cuenta_predefinida_webcontrol1.abrirBusquedaParatipo_cuenta_predefinida("id_tipo_cuenta_predefinida");
				//alert(jQuery('#form-id_tipo_cuenta_predefinida_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_cuenta","id_tipo_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_img_busqueda").click(function(){
				cuenta_predefinida_webcontrol1.abrirBusquedaParatipo_cuenta("id_tipo_cuenta");
				//alert(jQuery('#form-id_tipo_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_nivel_cuenta","id_tipo_nivel_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta_img_busqueda").click(function(){
				cuenta_predefinida_webcontrol1.abrirBusquedaParatipo_nivel_cuenta("id_tipo_nivel_cuenta");
				//alert(jQuery('#form-id_tipo_nivel_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_predefinida","FK_Idempresa","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_predefinida","FK_Idtipo_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_predefinida","FK_Idtipo_cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_predefinida","FK_Idtipo_nivel_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			cuenta_predefinida_funcion1.validarFormularioJQuery(cuenta_predefinida_constante1);
			
			if(cuenta_predefinida_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_predefinida_control) {
		
		jQuery("#divBusquedacuenta_predefinidaAjaxWebPart").css("display",cuenta_predefinida_control.strPermisoBusqueda);
		jQuery("#trcuenta_predefinidaCabeceraBusquedas").css("display",cuenta_predefinida_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscuenta_predefinida").attr("style",cuenta_predefinida_control.strPermisoMostrarTodos);
		
		if(cuenta_predefinida_control.strPermisoNuevo!=null) {
			jQuery("#tdcuenta_predefinidaNuevo").css("display",cuenta_predefinida_control.strPermisoNuevo);
			jQuery("#tdcuenta_predefinidaNuevoToolBar").css("display",cuenta_predefinida_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcuenta_predefinidaDuplicar").css("display",cuenta_predefinida_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_predefinidaDuplicarToolBar").css("display",cuenta_predefinida_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_predefinidaNuevoGuardarCambios").css("display",cuenta_predefinida_control.strPermisoNuevo);
			jQuery("#tdcuenta_predefinidaNuevoGuardarCambiosToolBar").css("display",cuenta_predefinida_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cuenta_predefinida_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_predefinidaActualizarToolBar").css("display",cuenta_predefinida_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_predefinidaCopiar").css("display",cuenta_predefinida_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_predefinidaCopiarToolBar").css("display",cuenta_predefinida_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_predefinidaConEditar").css("display",cuenta_predefinida_control.strPermisoActualizar);
		}
		
		jQuery("#tdcuenta_predefinidaEliminarToolBar").css("display",cuenta_predefinida_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcuenta_predefinidaGuardarCambios").css("display",cuenta_predefinida_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcuenta_predefinidaGuardarCambiosToolBar").css("display",cuenta_predefinida_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcuenta_predefinidaElementos").css("display",cuenta_predefinida_control.strVisibleTablaElementos);
		
		jQuery("#trcuenta_predefinidaAcciones").css("display",cuenta_predefinida_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_predefinidaParametrosAcciones").css("display",cuenta_predefinida_control.strVisibleTablaAcciones);
			
		jQuery("#tdcuenta_predefinidaCerrarPagina").css("display",cuenta_predefinida_control.strPermisoPopup);		
		jQuery("#tdcuenta_predefinidaCerrarPaginaToolBar").css("display",cuenta_predefinida_control.strPermisoPopup);
		//jQuery("#trcuenta_predefinidaAccionesRelaciones").css("display",cuenta_predefinida_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_predefinida_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_predefinida_webcontrol1.registrarEventosControles();
		
		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_predefinida_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_predefinida_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_predefinida_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_predefinida_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_predefinida_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(cuenta_predefinida_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cuenta_predefinida_webcontrol1.onLoad();
				
			} else {
				if(cuenta_predefinida_constante1.BIT_ES_PAGINA_FORM==true) {
					if(cuenta_predefinida_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
						//cuenta_predefinida_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(cuenta_predefinida_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cuenta_predefinida_constante1.BIG_ID_ACTUAL,"cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
						//cuenta_predefinida_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			cuenta_predefinida_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var cuenta_predefinida_webcontrol1=new cuenta_predefinida_webcontrol();

if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_predefinida_webcontrol1.onLoadWindow; 
}

//</script>