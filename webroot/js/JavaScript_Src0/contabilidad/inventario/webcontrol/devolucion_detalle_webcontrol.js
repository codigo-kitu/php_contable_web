//<script type="text/javascript" language="javascript">



//var devolucion_detalleJQueryPaginaWebInteraccion= function (devolucion_detalle_control) {
//this.,this.,this.

class devolucion_detalle_webcontrol extends devolucion_detalle_webcontrol_add {
	
	devolucion_detalle_control=null;
	devolucion_detalle_controlInicial=null;
	devolucion_detalle_controlAuxiliar=null;
		
	//if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(devolucion_detalle_control) {
		super();
		
		this.devolucion_detalle_control=devolucion_detalle_control;
	}
		
	actualizarVariablesPagina(devolucion_detalle_control) {
		
		if(devolucion_detalle_control.action=="index" || devolucion_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(devolucion_detalle_control);
			
		} else if(devolucion_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(devolucion_detalle_control);
			
		} else if(devolucion_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(devolucion_detalle_control);
			
		} else if(devolucion_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(devolucion_detalle_control);		
		
		} else if(devolucion_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(devolucion_detalle_control);		
		
		} else if(devolucion_detalle_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(devolucion_detalle_control);		
		
		} else if(devolucion_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_detalle_control);		
		}
		else if(devolucion_detalle_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(devolucion_detalle_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(devolucion_detalle_control.action + " Revisar Manejo");
			
			if(devolucion_detalle_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(devolucion_detalle_control);
				
				return;
			}
			
			//if(devolucion_detalle_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(devolucion_detalle_control);
			//}
			
			if(devolucion_detalle_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(devolucion_detalle_control);
			}
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && devolucion_detalle_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(devolucion_detalle_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(devolucion_detalle_control, false);			
			}
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(devolucion_detalle_control);	
			}
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(devolucion_detalle_control);
			}
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(devolucion_detalle_control);
			}
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);
			}
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(devolucion_detalle_control);	
			}
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
			}
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(devolucion_detalle_control);
			}
			
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(devolucion_detalle_control);			
			}
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(devolucion_detalle_control);
			}
			
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_detalle_control);
			}
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(devolucion_detalle_control);
			}				
			
			if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(devolucion_detalle_control);
			}
			
			if(devolucion_detalle_control.usuarioActual!=null && devolucion_detalle_control.usuarioActual.field_strUserName!=null &&
			devolucion_detalle_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(devolucion_detalle_control);			
			}
		}
		
		
		if(devolucion_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(devolucion_detalle_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(devolucion_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_detalle_control);
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_detalle_control);
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_detalle_control);
		this.actualizarPaginaAreaBusquedas(devolucion_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(devolucion_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_detalle_control);
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_detalle_control);
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_detalle_control);
		this.actualizarPaginaAreaBusquedas(devolucion_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(devolucion_detalle_control) {
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(devolucion_detalle_control) {
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(devolucion_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(devolucion_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(devolucion_detalle_control) {
		this.actualizarPaginaAbrirLink(devolucion_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);				
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		this.actualizarPaginaFormulario(devolucion_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		this.actualizarPaginaFormulario(devolucion_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(devolucion_detalle_control) {
		this.actualizarPaginaFormulario(devolucion_detalle_control);
		this.onLoadCombosDefectoFK(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		this.actualizarPaginaFormulario(devolucion_detalle_control);
		this.onLoadCombosDefectoFK(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(devolucion_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(devolucion_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);
		this.actualizarPaginaFormulario(devolucion_detalle_control);
		this.onLoadCombosDefectoFK(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(devolucion_detalle_control) {
		this.actualizarPaginaAbrirLink(devolucion_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(devolucion_detalle_control) {
		this.actualizarPaginaImprimir(devolucion_detalle_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(devolucion_detalle_control) {
		this.actualizarPaginaImprimir(devolucion_detalle_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(devolucion_detalle_control) {
		//FORMULARIO
		if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_detalle_control);
			this.actualizarPaginaFormularioAdd(devolucion_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		//COMBOS FK
		if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(devolucion_detalle_control) {
		//FORMULARIO
		if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);	
		//COMBOS FK
		if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(devolucion_detalle_control) {
		//FORMULARIO
		if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_detalle_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(devolucion_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);	
		//COMBOS FK
		if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control) {
		if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && devolucion_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(devolucion_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(devolucion_detalle_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(devolucion_detalle_control) {
		if(devolucion_detalle_funcion1.esPaginaForm()==true) {
			window.opener.devolucion_detalle_webcontrol1.actualizarPaginaTablaDatos(devolucion_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(devolucion_detalle_control) {
		devolucion_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(devolucion_detalle_control.strAuxiliarUrlPagina);
				
		devolucion_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(devolucion_detalle_control.strAuxiliarTipo,devolucion_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(devolucion_detalle_control) {
		devolucion_detalle_funcion1.resaltarRestaurarDivMensaje(true,devolucion_detalle_control.strAuxiliarMensajeAlert,devolucion_detalle_control.strAuxiliarCssMensaje);
			
		if(devolucion_detalle_funcion1.esPaginaForm()==true) {
			window.opener.devolucion_detalle_funcion1.resaltarRestaurarDivMensaje(true,devolucion_detalle_control.strAuxiliarMensajeAlert,devolucion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(devolucion_detalle_control) {
		eval(devolucion_detalle_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(devolucion_detalle_control, mostrar) {
		
		if(mostrar==true) {
			devolucion_detalle_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				devolucion_detalle_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			devolucion_detalle_funcion1.mostrarDivMensaje(true,devolucion_detalle_control.strAuxiliarMensaje,devolucion_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			devolucion_detalle_funcion1.mostrarDivMensaje(false,devolucion_detalle_control.strAuxiliarMensaje,devolucion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(devolucion_detalle_control) {
	
		funcionGeneral.printWebPartPage("devolucion_detalle",devolucion_detalle_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliardevolucion_detallesAjaxWebPart").html(devolucion_detalle_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("devolucion_detalle",jQuery("#divTablaDatosReporteAuxiliardevolucion_detallesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(devolucion_detalle_control) {
		this.devolucion_detalle_controlInicial=devolucion_detalle_control;
			
		if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(devolucion_detalle_control.strStyleDivArbol,devolucion_detalle_control.strStyleDivContent
																,devolucion_detalle_control.strStyleDivOpcionesBanner,devolucion_detalle_control.strStyleDivExpandirColapsar
																,devolucion_detalle_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=devolucion_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",devolucion_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(devolucion_detalle_control) {
		jQuery("#divTablaDatosdevolucion_detallesAjaxWebPart").html(devolucion_detalle_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdevolucion_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdevolucion_detalles=jQuery("#tblTablaDatosdevolucion_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("devolucion_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',devolucion_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			devolucion_detalle_webcontrol1.registrarControlesTableEdition(devolucion_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		devolucion_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(devolucion_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(devolucion_detalle_control.devolucion_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(devolucion_detalle_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(devolucion_detalle_control) {
		this.actualizarCssBotonesPagina(devolucion_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(devolucion_detalle_control.tiposReportes,devolucion_detalle_control.tiposReporte
															 	,devolucion_detalle_control.tiposPaginacion,devolucion_detalle_control.tiposAcciones
																,devolucion_detalle_control.tiposColumnasSelect,devolucion_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(devolucion_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(devolucion_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(devolucion_detalle_control);			
	}
	
	actualizarPaginaAreaBusquedas(devolucion_detalle_control) {
		jQuery("#divBusquedadevolucion_detalleAjaxWebPart").css("display",devolucion_detalle_control.strPermisoBusqueda);
		jQuery("#trdevolucion_detalleCabeceraBusquedas").css("display",devolucion_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedadevolucion_detalle").css("display",devolucion_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(devolucion_detalle_control.htmlTablaOrderBy!=null
			&& devolucion_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydevolucion_detalleAjaxWebPart").html(devolucion_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//devolucion_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(devolucion_detalle_control.htmlTablaOrderByRel!=null
			&& devolucion_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldevolucion_detalleAjaxWebPart").html(devolucion_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadevolucion_detalleAjaxWebPart").css("display","none");
			jQuery("#trdevolucion_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadevolucion_detalle").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(devolucion_detalle_control) {
		jQuery("#tddevolucion_detalleNuevo").css("display",devolucion_detalle_control.strPermisoNuevo);
		jQuery("#trdevolucion_detalleElementos").css("display",devolucion_detalle_control.strVisibleTablaElementos);
		jQuery("#trdevolucion_detalleAcciones").css("display",devolucion_detalle_control.strVisibleTablaAcciones);
		jQuery("#trdevolucion_detalleParametrosAcciones").css("display",devolucion_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(devolucion_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(devolucion_detalle_control);
				
		if(devolucion_detalle_control.devolucion_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(devolucion_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(devolucion_detalle_control);
	}
	
	actualizarPaginaUsuarioInvitado(devolucion_detalle_control) {
	
		var indexPosition=devolucion_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=devolucion_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(devolucion_detalle_control) {
		jQuery("#divResumendevolucion_detalleActualAjaxWebPart").html(devolucion_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(devolucion_detalle_control) {
		jQuery("#divAccionesRelacionesdevolucion_detalleAjaxWebPart").html(devolucion_detalle_control.htmlTablaAccionesRelaciones);
			
		devolucion_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(devolucion_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(devolucion_detalle_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(devolucion_detalle_control) {
		
		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",devolucion_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",devolucion_detalle_control.strVisibleFK_Idbodega);
		}

		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion").attr("style",devolucion_detalle_control.strVisibleFK_Iddevolucion);
			jQuery("#tblstrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion").attr("style",devolucion_detalle_control.strVisibleFK_Iddevolucion);
		}

		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",devolucion_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",devolucion_detalle_control.strVisibleFK_Idproducto);
		}

		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",devolucion_detalle_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",devolucion_detalle_control.strVisibleFK_Idproveedor);
		}

		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",devolucion_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",devolucion_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondevolucion_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("devolucion_detalle",id,"inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);		
	}
	
	

	abrirBusquedaParadevolucion(strNombreCampoBusqueda){//idActual
		devolucion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_detalle","devolucion","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		devolucion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_detalle","bodega","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		devolucion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_detalle","producto","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		devolucion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_detalle","unidad","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		devolucion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_detalle","proveedor","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(devolucion_detalle_control) {
	
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id").val(devolucion_detalle_control.devolucion_detalleActual.id);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-version_row").val(devolucion_detalle_control.devolucion_detalleActual.versionRow);
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_devolucion!=null && devolucion_detalle_control.devolucion_detalleActual.id_devolucion>-1){
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val() != devolucion_detalle_control.devolucion_detalleActual.id_devolucion) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val(devolucion_detalle_control.devolucion_detalleActual.id_devolucion).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").select2("val", null);
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_bodega!=null && devolucion_detalle_control.devolucion_detalleActual.id_bodega>-1){
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != devolucion_detalle_control.devolucion_detalleActual.id_bodega) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(devolucion_detalle_control.devolucion_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_producto!=null && devolucion_detalle_control.devolucion_detalleActual.id_producto>-1){
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != devolucion_detalle_control.devolucion_detalleActual.id_producto) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val(devolucion_detalle_control.devolucion_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_unidad!=null && devolucion_detalle_control.devolucion_detalleActual.id_unidad>-1){
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != devolucion_detalle_control.devolucion_detalleActual.id_unidad) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(devolucion_detalle_control.devolucion_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-nro_item").val(devolucion_detalle_control.devolucion_detalleActual.nro_item);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-cantidad").val(devolucion_detalle_control.devolucion_detalleActual.cantidad);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-precio").val(devolucion_detalle_control.devolucion_detalleActual.precio);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-sub_total").val(devolucion_detalle_control.devolucion_detalleActual.sub_total);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-descuento_porciento").val(devolucion_detalle_control.devolucion_detalleActual.descuento_porciento);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-descuento_monto").val(devolucion_detalle_control.devolucion_detalleActual.descuento_monto);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-iva_porciento").val(devolucion_detalle_control.devolucion_detalleActual.iva_porciento);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-iva_monto").val(devolucion_detalle_control.devolucion_detalleActual.iva_monto);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-total").val(devolucion_detalle_control.devolucion_detalleActual.total);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-impuesto2_porciento").val(devolucion_detalle_control.devolucion_detalleActual.impuesto2_porciento);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-impuesto2_monto").val(devolucion_detalle_control.devolucion_detalleActual.impuesto2_monto);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-fecha_emision").val(devolucion_detalle_control.devolucion_detalleActual.fecha_emision);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-comentario").val(devolucion_detalle_control.devolucion_detalleActual.comentario);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-tipo_cambio").val(devolucion_detalle_control.devolucion_detalleActual.tipo_cambio);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-moneda").val(devolucion_detalle_control.devolucion_detalleActual.moneda);
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_proveedor!=null && devolucion_detalle_control.devolucion_detalleActual.id_proveedor>-1){
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_proveedor").val() != devolucion_detalle_control.devolucion_detalleActual.id_proveedor) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_proveedor").val(devolucion_detalle_control.devolucion_detalleActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_proveedor").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+devolucion_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("devolucion_detalle","inventario","","form_devolucion_detalle",formulario,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	cargarCombosFK(devolucion_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_devolucion",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosdevolucionsFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosbodegasFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosproductosFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosunidadsFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosproveedorsFK(devolucion_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(devolucion_detalle_control.strRecargarFkTiposNinguno!=null && devolucion_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && devolucion_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_devolucion",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosdevolucionsFK(devolucion_detalle_control);
				}

				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosbodegasFK(devolucion_detalle_control);
				}

				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosproductosFK(devolucion_detalle_control);
				}

				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosunidadsFK(devolucion_detalle_control);
				}

				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosproveedorsFK(devolucion_detalle_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(devolucion_detalle_control) {
		jQuery("#spanstrMensajeid").text(devolucion_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(devolucion_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_devolucion").text(devolucion_detalle_control.strMensajeid_devolucion);		
		jQuery("#spanstrMensajeid_bodega").text(devolucion_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(devolucion_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(devolucion_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajenro_item").text(devolucion_detalle_control.strMensajenro_item);		
		jQuery("#spanstrMensajecantidad").text(devolucion_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajeprecio").text(devolucion_detalle_control.strMensajeprecio);		
		jQuery("#spanstrMensajesub_total").text(devolucion_detalle_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_porciento").text(devolucion_detalle_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajedescuento_monto").text(devolucion_detalle_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(devolucion_detalle_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(devolucion_detalle_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajetotal").text(devolucion_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(devolucion_detalle_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(devolucion_detalle_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajefecha_emision").text(devolucion_detalle_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajecomentario").text(devolucion_detalle_control.strMensajecomentario);		
		jQuery("#spanstrMensajetipo_cambio").text(devolucion_detalle_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajemoneda").text(devolucion_detalle_control.strMensajemoneda);		
		jQuery("#spanstrMensajeid_proveedor").text(devolucion_detalle_control.strMensajeid_proveedor);		
	}
	
	actualizarCssBotonesMantenimiento(devolucion_detalle_control) {
		jQuery("#tdbtnNuevodevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodevolucion_detalle").css("display",devolucion_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardevolucion_detalle").css("display",devolucion_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardevolucion_detalle").css("display",devolucion_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdevolucion_detalle").css("display",devolucion_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.devolucion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.devolucion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.devolucion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.devolucion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.devolucion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.devolucion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTabladevolucionFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.devolucionsFK);
	}

	cargarComboEditarTablabodegaFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.unidadsFK);
	}

	cargarComboEditarTablaproveedorFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(devolucion_detalle_control) {
		var i=0;
		
		i=devolucion_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(devolucion_detalle_control.devolucion_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(devolucion_detalle_control.devolucion_detalleActual.versionRow);
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_devolucion!=null && devolucion_detalle_control.devolucion_detalleActual.id_devolucion>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != devolucion_detalle_control.devolucion_detalleActual.id_devolucion) {
				jQuery("#t-cel_"+i+"_2").val(devolucion_detalle_control.devolucion_detalleActual.id_devolucion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_bodega!=null && devolucion_detalle_control.devolucion_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != devolucion_detalle_control.devolucion_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_3").val(devolucion_detalle_control.devolucion_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_producto!=null && devolucion_detalle_control.devolucion_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != devolucion_detalle_control.devolucion_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_4").val(devolucion_detalle_control.devolucion_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_unidad!=null && devolucion_detalle_control.devolucion_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != devolucion_detalle_control.devolucion_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_5").val(devolucion_detalle_control.devolucion_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(devolucion_detalle_control.devolucion_detalleActual.nro_item);
		jQuery("#t-cel_"+i+"_7").val(devolucion_detalle_control.devolucion_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_8").val(devolucion_detalle_control.devolucion_detalleActual.precio);
		jQuery("#t-cel_"+i+"_9").val(devolucion_detalle_control.devolucion_detalleActual.sub_total);
		jQuery("#t-cel_"+i+"_10").val(devolucion_detalle_control.devolucion_detalleActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_11").val(devolucion_detalle_control.devolucion_detalleActual.descuento_monto);
		jQuery("#t-cel_"+i+"_12").val(devolucion_detalle_control.devolucion_detalleActual.iva_porciento);
		jQuery("#t-cel_"+i+"_13").val(devolucion_detalle_control.devolucion_detalleActual.iva_monto);
		jQuery("#t-cel_"+i+"_14").val(devolucion_detalle_control.devolucion_detalleActual.total);
		jQuery("#t-cel_"+i+"_15").val(devolucion_detalle_control.devolucion_detalleActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_16").val(devolucion_detalle_control.devolucion_detalleActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_17").val(devolucion_detalle_control.devolucion_detalleActual.fecha_emision);
		jQuery("#t-cel_"+i+"_18").val(devolucion_detalle_control.devolucion_detalleActual.comentario);
		jQuery("#t-cel_"+i+"_19").val(devolucion_detalle_control.devolucion_detalleActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_20").val(devolucion_detalle_control.devolucion_detalleActual.moneda);
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_proveedor!=null && devolucion_detalle_control.devolucion_detalleActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_21").val() != devolucion_detalle_control.devolucion_detalleActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_21").val(devolucion_detalle_control.devolucion_detalleActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_21").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_21").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(devolucion_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(devolucion_detalle_control) {
		devolucion_detalle_funcion1.registrarControlesTableValidacionEdition(devolucion_detalle_control,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalleConstante,strParametros);
		
		//devolucion_detalle_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosdevolucionsFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion",devolucion_detalle_control.devolucionsFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_2",devolucion_detalle_control.devolucionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion-cmbid_devolucion",devolucion_detalle_control.devolucionsFK);

	};

	cargarCombosbodegasFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega",devolucion_detalle_control.bodegasFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_3",devolucion_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",devolucion_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto",devolucion_detalle_control.productosFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_4",devolucion_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",devolucion_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad",devolucion_detalle_control.unidadsFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_5",devolucion_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",devolucion_detalle_control.unidadsFK);

	};

	cargarCombosproveedorsFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_proveedor",devolucion_detalle_control.proveedorsFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_21",devolucion_detalle_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",devolucion_detalle_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosdevolucionsFK(devolucion_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(devolucion_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(devolucion_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(devolucion_detalle_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(devolucion_detalle_control) {

	};

	
	
	setDefectoValorCombosdevolucionsFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.iddevolucionDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val() != devolucion_detalle_control.iddevolucionDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val(devolucion_detalle_control.iddevolucionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion-cmbid_devolucion").val(devolucion_detalle_control.iddevolucionDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion-cmbid_devolucion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion-cmbid_devolucion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != devolucion_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(devolucion_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(devolucion_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != devolucion_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val(devolucion_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(devolucion_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != devolucion_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(devolucion_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(devolucion_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.idproveedorDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_proveedor").val() != devolucion_detalle_control.idproveedorDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_proveedor").val(devolucion_detalle_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(devolucion_detalle_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("devolucion_detalle","inventario","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("devolucion_detalle","inventario","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//devolucion_detalle_control
		
	

		var cantidad="form"+devolucion_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_detalle","inventario","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

		var precio="form"+devolucion_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_detalle","inventario","","precio",precio,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

		var descuento_porciento="form"+devolucion_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_detalle","inventario","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

		var iva_porciento="form"+devolucion_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_detalle","inventario","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(devolucion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_devolucion",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosdevolucionsFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosbodegasFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosproductosFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosunidadsFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosproveedorsFK(devolucion_detalle_control);
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
	onLoadCombosEventosFK(devolucion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_devolucion",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosdevolucionsFK(devolucion_detalle_control);
			//}

			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(devolucion_detalle_control);
			//}

			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(devolucion_detalle_control);
			//}

			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(devolucion_detalle_control);
			//}

			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosproveedorsFK(devolucion_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(devolucion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("devolucion_detalle");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("devolucion_detalle");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(devolucion_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);			
			
			if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,"devolucion_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("devolucion","id_devolucion","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParadevolucion("id_devolucion");
				//alert(jQuery('#form-id_devolucion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_detalle","FK_Idbodega","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_detalle","FK_Iddevolucion","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_detalle","FK_Idproducto","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_detalle","FK_Idproveedor","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_detalle","FK_Idunidad","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			devolucion_detalle_funcion1.validarFormularioJQuery(devolucion_detalle_constante1);
			
			if(devolucion_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(devolucion_detalle_control) {
		
		jQuery("#divBusquedadevolucion_detalleAjaxWebPart").css("display",devolucion_detalle_control.strPermisoBusqueda);
		jQuery("#trdevolucion_detalleCabeceraBusquedas").css("display",devolucion_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedadevolucion_detalle").css("display",devolucion_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedevolucion_detalle").css("display",devolucion_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdevolucion_detalle").attr("style",devolucion_detalle_control.strPermisoMostrarTodos);
		
		if(devolucion_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tddevolucion_detalleNuevo").css("display",devolucion_detalle_control.strPermisoNuevo);
			jQuery("#tddevolucion_detalleNuevoToolBar").css("display",devolucion_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddevolucion_detalleDuplicar").css("display",devolucion_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddevolucion_detalleDuplicarToolBar").css("display",devolucion_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddevolucion_detalleNuevoGuardarCambios").css("display",devolucion_detalle_control.strPermisoNuevo);
			jQuery("#tddevolucion_detalleNuevoGuardarCambiosToolBar").css("display",devolucion_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(devolucion_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tddevolucion_detalleActualizarToolBar").css("display",devolucion_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddevolucion_detalleCopiar").css("display",devolucion_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddevolucion_detalleCopiarToolBar").css("display",devolucion_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddevolucion_detalleConEditar").css("display",devolucion_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tddevolucion_detalleEliminarToolBar").css("display",devolucion_detalle_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tddevolucion_detalleGuardarCambios").css("display",devolucion_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddevolucion_detalleGuardarCambiosToolBar").css("display",devolucion_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trdevolucion_detalleElementos").css("display",devolucion_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trdevolucion_detalleAcciones").css("display",devolucion_detalle_control.strVisibleTablaAcciones);
		jQuery("#trdevolucion_detalleParametrosAcciones").css("display",devolucion_detalle_control.strVisibleTablaAcciones);
			
		jQuery("#tddevolucion_detalleCerrarPagina").css("display",devolucion_detalle_control.strPermisoPopup);		
		jQuery("#tddevolucion_detalleCerrarPaginaToolBar").css("display",devolucion_detalle_control.strPermisoPopup);
		//jQuery("#trdevolucion_detalleAccionesRelaciones").css("display",devolucion_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		devolucion_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		devolucion_detalle_webcontrol1.registrarEventosControles();
		
		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			devolucion_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(devolucion_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(devolucion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				devolucion_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(devolucion_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(devolucion_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				devolucion_detalle_webcontrol1.onLoad();
				
			} else {
				if(devolucion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
					if(devolucion_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
						//devolucion_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(devolucion_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(devolucion_detalle_constante1.BIG_ID_ACTUAL,"devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
						//devolucion_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			devolucion_detalle_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var devolucion_detalle_webcontrol1=new devolucion_detalle_webcontrol();

if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = devolucion_detalle_webcontrol1.onLoadWindow; 
}

//</script>