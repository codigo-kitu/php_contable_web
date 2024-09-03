//<script type="text/javascript" language="javascript">



//var estimado_detalleJQueryPaginaWebInteraccion= function (estimado_detalle_control) {
//this.,this.,this.

class estimado_detalle_webcontrol extends estimado_detalle_webcontrol_add {
	
	estimado_detalle_control=null;
	estimado_detalle_controlInicial=null;
	estimado_detalle_controlAuxiliar=null;
		
	//if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(estimado_detalle_control) {
		super();
		
		this.estimado_detalle_control=estimado_detalle_control;
	}
		
	actualizarVariablesPagina(estimado_detalle_control) {
		
		if(estimado_detalle_control.action=="index" || estimado_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(estimado_detalle_control);
			
		} else if(estimado_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(estimado_detalle_control);
			
		} else if(estimado_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(estimado_detalle_control);
			
		} else if(estimado_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(estimado_detalle_control);		
		
		} else if(estimado_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(estimado_detalle_control);		
		
		} else if(estimado_detalle_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(estimado_detalle_control);		
		
		} else if(estimado_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(estimado_detalle_control);		
		}
		else if(estimado_detalle_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(estimado_detalle_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(estimado_detalle_control.action + " Revisar Manejo");
			
			if(estimado_detalle_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(estimado_detalle_control);
				
				return;
			}
			
			//if(estimado_detalle_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(estimado_detalle_control);
			//}
			
			if(estimado_detalle_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(estimado_detalle_control);
			}
			
			if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && estimado_detalle_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(estimado_detalle_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(estimado_detalle_control, false);			
			}
			
			if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(estimado_detalle_control);	
			}
			
			if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(estimado_detalle_control);
			}
			
			if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(estimado_detalle_control);
			}
			
			if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(estimado_detalle_control);
			}
			
			if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(estimado_detalle_control);	
			}
			
			if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
			}
			
			if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(estimado_detalle_control);
			}
			
			
			if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(estimado_detalle_control);			
			}
			
			if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(estimado_detalle_control);
			}
			
			
			if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(estimado_detalle_control);
			}
			
			if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(estimado_detalle_control);
			}				
			
			if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(estimado_detalle_control);
			}
			
			if(estimado_detalle_control.usuarioActual!=null && estimado_detalle_control.usuarioActual.field_strUserName!=null &&
			estimado_detalle_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(estimado_detalle_control);			
			}
		}
		
		
		if(estimado_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(estimado_detalle_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(estimado_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(estimado_detalle_control);
		this.actualizarPaginaTablaDatos(estimado_detalle_control);
		this.actualizarPaginaCargaGeneralControles(estimado_detalle_control);
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estimado_detalle_control);
		this.actualizarPaginaAreaBusquedas(estimado_detalle_control);
		this.actualizarPaginaCargaCombosFK(estimado_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(estimado_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(estimado_detalle_control);
		this.actualizarPaginaTablaDatos(estimado_detalle_control);
		this.actualizarPaginaCargaGeneralControles(estimado_detalle_control);
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estimado_detalle_control);
		this.actualizarPaginaAreaBusquedas(estimado_detalle_control);
		this.actualizarPaginaCargaCombosFK(estimado_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(estimado_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(estimado_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(estimado_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(estimado_detalle_control) {
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(estimado_detalle_control) {
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(estimado_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(estimado_detalle_control);
		this.actualizarPaginaCargaCombosFK(estimado_detalle_control);
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(estimado_detalle_control) {
		this.actualizarPaginaAbrirLink(estimado_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);				
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);
		this.actualizarPaginaFormulario(estimado_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);
		this.actualizarPaginaFormulario(estimado_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(estimado_detalle_control) {
		this.actualizarPaginaFormulario(estimado_detalle_control);
		this.onLoadCombosDefectoFK(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);
		this.actualizarPaginaFormulario(estimado_detalle_control);
		this.onLoadCombosDefectoFK(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(estimado_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(estimado_detalle_control);
		this.actualizarPaginaCargaCombosFK(estimado_detalle_control);
		this.actualizarPaginaFormulario(estimado_detalle_control);
		this.onLoadCombosDefectoFK(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(estimado_detalle_control) {
		this.actualizarPaginaAbrirLink(estimado_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(estimado_detalle_control) {
		this.actualizarPaginaImprimir(estimado_detalle_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(estimado_detalle_control) {
		this.actualizarPaginaImprimir(estimado_detalle_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(estimado_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(estimado_detalle_control) {
		//FORMULARIO
		if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estimado_detalle_control);
			this.actualizarPaginaFormularioAdd(estimado_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		//COMBOS FK
		if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estimado_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(estimado_detalle_control) {
		//FORMULARIO
		if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estimado_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);	
		//COMBOS FK
		if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estimado_detalle_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(estimado_detalle_control) {
		//FORMULARIO
		if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estimado_detalle_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(estimado_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);	
		//COMBOS FK
		if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estimado_detalle_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control) {
		if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && estimado_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(estimado_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(estimado_detalle_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(estimado_detalle_control) {
		if(estimado_detalle_funcion1.esPaginaForm()==true) {
			window.opener.estimado_detalle_webcontrol1.actualizarPaginaTablaDatos(estimado_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(estimado_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(estimado_detalle_control) {
		estimado_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(estimado_detalle_control.strAuxiliarUrlPagina);
				
		estimado_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(estimado_detalle_control.strAuxiliarTipo,estimado_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(estimado_detalle_control) {
		estimado_detalle_funcion1.resaltarRestaurarDivMensaje(true,estimado_detalle_control.strAuxiliarMensajeAlert,estimado_detalle_control.strAuxiliarCssMensaje);
			
		if(estimado_detalle_funcion1.esPaginaForm()==true) {
			window.opener.estimado_detalle_funcion1.resaltarRestaurarDivMensaje(true,estimado_detalle_control.strAuxiliarMensajeAlert,estimado_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(estimado_detalle_control) {
		eval(estimado_detalle_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(estimado_detalle_control, mostrar) {
		
		if(mostrar==true) {
			estimado_detalle_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				estimado_detalle_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			estimado_detalle_funcion1.mostrarDivMensaje(true,estimado_detalle_control.strAuxiliarMensaje,estimado_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			estimado_detalle_funcion1.mostrarDivMensaje(false,estimado_detalle_control.strAuxiliarMensaje,estimado_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(estimado_detalle_control) {
	
		funcionGeneral.printWebPartPage("estimado_detalle",estimado_detalle_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarestimado_detallesAjaxWebPart").html(estimado_detalle_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("estimado_detalle",jQuery("#divTablaDatosReporteAuxiliarestimado_detallesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(estimado_detalle_control) {
		this.estimado_detalle_controlInicial=estimado_detalle_control;
			
		if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(estimado_detalle_control.strStyleDivArbol,estimado_detalle_control.strStyleDivContent
																,estimado_detalle_control.strStyleDivOpcionesBanner,estimado_detalle_control.strStyleDivExpandirColapsar
																,estimado_detalle_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=estimado_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",estimado_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(estimado_detalle_control) {
		jQuery("#divTablaDatosestimado_detallesAjaxWebPart").html(estimado_detalle_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosestimado_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosestimado_detalles=jQuery("#tblTablaDatosestimado_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("estimado_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',estimado_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			estimado_detalle_webcontrol1.registrarControlesTableEdition(estimado_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		estimado_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(estimado_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(estimado_detalle_control.estimado_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(estimado_detalle_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(estimado_detalle_control) {
		this.actualizarCssBotonesPagina(estimado_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(estimado_detalle_control.tiposReportes,estimado_detalle_control.tiposReporte
															 	,estimado_detalle_control.tiposPaginacion,estimado_detalle_control.tiposAcciones
																,estimado_detalle_control.tiposColumnasSelect,estimado_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(estimado_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(estimado_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(estimado_detalle_control);			
	}
	
	actualizarPaginaAreaBusquedas(estimado_detalle_control) {
		jQuery("#divBusquedaestimado_detalleAjaxWebPart").css("display",estimado_detalle_control.strPermisoBusqueda);
		jQuery("#trestimado_detalleCabeceraBusquedas").css("display",estimado_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaestimado_detalle").css("display",estimado_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(estimado_detalle_control.htmlTablaOrderBy!=null
			&& estimado_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByestimado_detalleAjaxWebPart").html(estimado_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//estimado_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(estimado_detalle_control.htmlTablaOrderByRel!=null
			&& estimado_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelestimado_detalleAjaxWebPart").html(estimado_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(estimado_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaestimado_detalleAjaxWebPart").css("display","none");
			jQuery("#trestimado_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaestimado_detalle").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(estimado_detalle_control) {
		jQuery("#tdestimado_detalleNuevo").css("display",estimado_detalle_control.strPermisoNuevo);
		jQuery("#trestimado_detalleElementos").css("display",estimado_detalle_control.strVisibleTablaElementos);
		jQuery("#trestimado_detalleAcciones").css("display",estimado_detalle_control.strVisibleTablaAcciones);
		jQuery("#trestimado_detalleParametrosAcciones").css("display",estimado_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(estimado_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(estimado_detalle_control);
				
		if(estimado_detalle_control.estimado_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(estimado_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(estimado_detalle_control);
	}
	
	actualizarPaginaUsuarioInvitado(estimado_detalle_control) {
	
		var indexPosition=estimado_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=estimado_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(estimado_detalle_control) {
		jQuery("#divResumenestimado_detalleActualAjaxWebPart").html(estimado_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(estimado_detalle_control) {
		jQuery("#divAccionesRelacionesestimado_detalleAjaxWebPart").html(estimado_detalle_control.htmlTablaAccionesRelaciones);
			
		estimado_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(estimado_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(estimado_detalle_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(estimado_detalle_control) {
		
		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",estimado_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",estimado_detalle_control.strVisibleFK_Idbodega);
		}

		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",estimado_detalle_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",estimado_detalle_control.strVisibleFK_Idcliente);
		}

		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado").attr("style",estimado_detalle_control.strVisibleFK_Idestimado);
			jQuery("#tblstrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado").attr("style",estimado_detalle_control.strVisibleFK_Idestimado);
		}

		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",estimado_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",estimado_detalle_control.strVisibleFK_Idproducto);
		}

		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",estimado_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",estimado_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionestimado_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("estimado_detalle",id,"estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);		
	}
	
	

	abrirBusquedaParaestimado(strNombreCampoBusqueda){//idActual
		estimado_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado_detalle","estimado","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		estimado_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado_detalle","bodega","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		estimado_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado_detalle","producto","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		estimado_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado_detalle","unidad","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		estimado_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado_detalle","cliente","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(estimado_detalle_control) {
	
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id").val(estimado_detalle_control.estimado_detalleActual.id);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-version_row").val(estimado_detalle_control.estimado_detalleActual.versionRow);
		
		if(estimado_detalle_control.estimado_detalleActual.id_estimado!=null && estimado_detalle_control.estimado_detalleActual.id_estimado>-1){
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val() != estimado_detalle_control.estimado_detalleActual.id_estimado) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val(estimado_detalle_control.estimado_detalleActual.id_estimado).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").select2("val", null);
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_detalle_control.estimado_detalleActual.id_bodega!=null && estimado_detalle_control.estimado_detalleActual.id_bodega>-1){
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != estimado_detalle_control.estimado_detalleActual.id_bodega) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val(estimado_detalle_control.estimado_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_detalle_control.estimado_detalleActual.id_producto!=null && estimado_detalle_control.estimado_detalleActual.id_producto>-1){
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val() != estimado_detalle_control.estimado_detalleActual.id_producto) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val(estimado_detalle_control.estimado_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_detalle_control.estimado_detalleActual.id_unidad!=null && estimado_detalle_control.estimado_detalleActual.id_unidad>-1){
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != estimado_detalle_control.estimado_detalleActual.id_unidad) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val(estimado_detalle_control.estimado_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-cantidad").val(estimado_detalle_control.estimado_detalleActual.cantidad);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-precio").val(estimado_detalle_control.estimado_detalleActual.precio);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-sub_total").val(estimado_detalle_control.estimado_detalleActual.sub_total);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-descuento_porciento").val(estimado_detalle_control.estimado_detalleActual.descuento_porciento);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-descuento_monto").val(estimado_detalle_control.estimado_detalleActual.descuento_monto);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-iva_porciento").val(estimado_detalle_control.estimado_detalleActual.iva_porciento);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-iva_monto").val(estimado_detalle_control.estimado_detalleActual.iva_monto);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-total").val(estimado_detalle_control.estimado_detalleActual.total);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-recibido").val(estimado_detalle_control.estimado_detalleActual.recibido);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-impuesto2_porciento").val(estimado_detalle_control.estimado_detalleActual.impuesto2_porciento);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-impuesto2_monto").val(estimado_detalle_control.estimado_detalleActual.impuesto2_monto);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-fecha_emision").val(estimado_detalle_control.estimado_detalleActual.fecha_emision);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-comentario").val(estimado_detalle_control.estimado_detalleActual.comentario);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-tipo_cambio").val(estimado_detalle_control.estimado_detalleActual.tipo_cambio);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-moneda").val(estimado_detalle_control.estimado_detalleActual.moneda);
		
		if(estimado_detalle_control.estimado_detalleActual.id_cliente!=null && estimado_detalle_control.estimado_detalleActual.id_cliente>-1){
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_cliente").val() != estimado_detalle_control.estimado_detalleActual.id_cliente) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_cliente").val(estimado_detalle_control.estimado_detalleActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_cliente").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+estimado_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("estimado_detalle","estimados","","form_estimado_detalle",formulario,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	cargarCombosFK(estimado_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosestimadosFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosbodegasFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosproductosFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosunidadsFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosclientesFK(estimado_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(estimado_detalle_control.strRecargarFkTiposNinguno!=null && estimado_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && estimado_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estimado",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosestimadosFK(estimado_detalle_control);
				}

				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosbodegasFK(estimado_detalle_control);
				}

				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosproductosFK(estimado_detalle_control);
				}

				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosunidadsFK(estimado_detalle_control);
				}

				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosclientesFK(estimado_detalle_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(estimado_detalle_control) {
		jQuery("#spanstrMensajeid").text(estimado_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(estimado_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_estimado").text(estimado_detalle_control.strMensajeid_estimado);		
		jQuery("#spanstrMensajeid_bodega").text(estimado_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(estimado_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(estimado_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajecantidad").text(estimado_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajeprecio").text(estimado_detalle_control.strMensajeprecio);		
		jQuery("#spanstrMensajesub_total").text(estimado_detalle_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_porciento").text(estimado_detalle_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajedescuento_monto").text(estimado_detalle_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(estimado_detalle_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(estimado_detalle_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajetotal").text(estimado_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajerecibido").text(estimado_detalle_control.strMensajerecibido);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(estimado_detalle_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(estimado_detalle_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajefecha_emision").text(estimado_detalle_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajecomentario").text(estimado_detalle_control.strMensajecomentario);		
		jQuery("#spanstrMensajetipo_cambio").text(estimado_detalle_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajemoneda").text(estimado_detalle_control.strMensajemoneda);		
		jQuery("#spanstrMensajeid_cliente").text(estimado_detalle_control.strMensajeid_cliente);		
	}
	
	actualizarCssBotonesMantenimiento(estimado_detalle_control) {
		jQuery("#tdbtnNuevoestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoestimado_detalle").css("display",estimado_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarestimado_detalle").css("display",estimado_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarestimado_detalle").css("display",estimado_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosestimado_detalle").css("display",estimado_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaCancelar);						
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
			if(nombreCombo=="form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.estimado_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.estimado_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.estimado_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.estimado_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.estimado_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.estimado_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaestimadoFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.estimadosFK);
	}

	cargarComboEditarTablabodegaFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.unidadsFK);
	}

	cargarComboEditarTablaclienteFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(estimado_detalle_control) {
		var i=0;
		
		i=estimado_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(estimado_detalle_control.estimado_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(estimado_detalle_control.estimado_detalleActual.versionRow);
		
		if(estimado_detalle_control.estimado_detalleActual.id_estimado!=null && estimado_detalle_control.estimado_detalleActual.id_estimado>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != estimado_detalle_control.estimado_detalleActual.id_estimado) {
				jQuery("#t-cel_"+i+"_2").val(estimado_detalle_control.estimado_detalleActual.id_estimado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_detalle_control.estimado_detalleActual.id_bodega!=null && estimado_detalle_control.estimado_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != estimado_detalle_control.estimado_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_3").val(estimado_detalle_control.estimado_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_detalle_control.estimado_detalleActual.id_producto!=null && estimado_detalle_control.estimado_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != estimado_detalle_control.estimado_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_4").val(estimado_detalle_control.estimado_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_detalle_control.estimado_detalleActual.id_unidad!=null && estimado_detalle_control.estimado_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != estimado_detalle_control.estimado_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_5").val(estimado_detalle_control.estimado_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(estimado_detalle_control.estimado_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_7").val(estimado_detalle_control.estimado_detalleActual.precio);
		jQuery("#t-cel_"+i+"_8").val(estimado_detalle_control.estimado_detalleActual.sub_total);
		jQuery("#t-cel_"+i+"_9").val(estimado_detalle_control.estimado_detalleActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_10").val(estimado_detalle_control.estimado_detalleActual.descuento_monto);
		jQuery("#t-cel_"+i+"_11").val(estimado_detalle_control.estimado_detalleActual.iva_porciento);
		jQuery("#t-cel_"+i+"_12").val(estimado_detalle_control.estimado_detalleActual.iva_monto);
		jQuery("#t-cel_"+i+"_13").val(estimado_detalle_control.estimado_detalleActual.total);
		jQuery("#t-cel_"+i+"_14").val(estimado_detalle_control.estimado_detalleActual.recibido);
		jQuery("#t-cel_"+i+"_15").val(estimado_detalle_control.estimado_detalleActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_16").val(estimado_detalle_control.estimado_detalleActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_17").val(estimado_detalle_control.estimado_detalleActual.fecha_emision);
		jQuery("#t-cel_"+i+"_18").val(estimado_detalle_control.estimado_detalleActual.comentario);
		jQuery("#t-cel_"+i+"_19").val(estimado_detalle_control.estimado_detalleActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_20").val(estimado_detalle_control.estimado_detalleActual.moneda);
		
		if(estimado_detalle_control.estimado_detalleActual.id_cliente!=null && estimado_detalle_control.estimado_detalleActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_21").val() != estimado_detalle_control.estimado_detalleActual.id_cliente) {
				jQuery("#t-cel_"+i+"_21").val(estimado_detalle_control.estimado_detalleActual.id_cliente).trigger("change");
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
			
		if(estimado_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(estimado_detalle_control) {
		estimado_detalle_funcion1.registrarControlesTableValidacionEdition(estimado_detalle_control,estimado_detalle_webcontrol1,estimado_detalle_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalleConstante,strParametros);
		
		//estimado_detalle_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosestimadosFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado",estimado_detalle_control.estimadosFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_2",estimado_detalle_control.estimadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado",estimado_detalle_control.estimadosFK);

	};

	cargarCombosbodegasFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega",estimado_detalle_control.bodegasFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_3",estimado_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",estimado_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto",estimado_detalle_control.productosFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_4",estimado_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",estimado_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad",estimado_detalle_control.unidadsFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_5",estimado_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",estimado_detalle_control.unidadsFK);

	};

	cargarCombosclientesFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_cliente",estimado_detalle_control.clientesFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_21",estimado_detalle_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",estimado_detalle_control.clientesFK);

	};

	
	
	registrarComboActionChangeCombosestimadosFK(estimado_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(estimado_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(estimado_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(estimado_detalle_control) {

	};

	registrarComboActionChangeCombosclientesFK(estimado_detalle_control) {

	};

	
	
	setDefectoValorCombosestimadosFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idestimadoDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val() != estimado_detalle_control.idestimadoDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val(estimado_detalle_control.idestimadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val(estimado_detalle_control.idestimadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != estimado_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val(estimado_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(estimado_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val() != estimado_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val(estimado_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(estimado_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != estimado_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val(estimado_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(estimado_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idclienteDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_cliente").val() != estimado_detalle_control.idclienteDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_cliente").val(estimado_detalle_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(estimado_detalle_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("estimado_detalle","estimados","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("estimado_detalle","estimados","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//estimado_detalle_control
		
	

		var cantidad="form"+estimado_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("estimado_detalle","estimados","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

		var precio="form"+estimado_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("estimado_detalle","estimados","","precio",precio,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

		var descuento_porciento="form"+estimado_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("estimado_detalle","estimados","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

		var iva_porciento="form"+estimado_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("estimado_detalle","estimados","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(estimado_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosestimadosFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosbodegasFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosproductosFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosunidadsFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosclientesFK(estimado_detalle_control);
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
	onLoadCombosEventosFK(estimado_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosestimadosFK(estimado_detalle_control);
			//}

			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(estimado_detalle_control);
			//}

			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(estimado_detalle_control);
			//}

			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(estimado_detalle_control);
			//}

			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosclientesFK(estimado_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(estimado_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("estimado_detalle");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("estimado_detalle");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(estimado_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);			
			
			if(estimado_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,"estimado_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estimado","id_estimado","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParaestimado("id_estimado");
				//alert(jQuery('#form-id_estimado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado_detalle","FK_Idbodega","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado_detalle","FK_Idcliente","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado_detalle","FK_Idestimado","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado_detalle","FK_Idproducto","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado_detalle","FK_Idunidad","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			estimado_detalle_funcion1.validarFormularioJQuery(estimado_detalle_constante1);
			
			if(estimado_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(estimado_detalle_control) {
		
		jQuery("#divBusquedaestimado_detalleAjaxWebPart").css("display",estimado_detalle_control.strPermisoBusqueda);
		jQuery("#trestimado_detalleCabeceraBusquedas").css("display",estimado_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaestimado_detalle").css("display",estimado_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteestimado_detalle").css("display",estimado_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosestimado_detalle").attr("style",estimado_detalle_control.strPermisoMostrarTodos);
		
		if(estimado_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdestimado_detalleNuevo").css("display",estimado_detalle_control.strPermisoNuevo);
			jQuery("#tdestimado_detalleNuevoToolBar").css("display",estimado_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdestimado_detalleDuplicar").css("display",estimado_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdestimado_detalleDuplicarToolBar").css("display",estimado_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdestimado_detalleNuevoGuardarCambios").css("display",estimado_detalle_control.strPermisoNuevo);
			jQuery("#tdestimado_detalleNuevoGuardarCambiosToolBar").css("display",estimado_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(estimado_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdestimado_detalleActualizarToolBar").css("display",estimado_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestimado_detalleCopiar").css("display",estimado_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestimado_detalleCopiarToolBar").css("display",estimado_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestimado_detalleConEditar").css("display",estimado_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdestimado_detalleEliminarToolBar").css("display",estimado_detalle_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdestimado_detalleGuardarCambios").css("display",estimado_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdestimado_detalleGuardarCambiosToolBar").css("display",estimado_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trestimado_detalleElementos").css("display",estimado_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trestimado_detalleAcciones").css("display",estimado_detalle_control.strVisibleTablaAcciones);
		jQuery("#trestimado_detalleParametrosAcciones").css("display",estimado_detalle_control.strVisibleTablaAcciones);
			
		jQuery("#tdestimado_detalleCerrarPagina").css("display",estimado_detalle_control.strPermisoPopup);		
		jQuery("#tdestimado_detalleCerrarPaginaToolBar").css("display",estimado_detalle_control.strPermisoPopup);
		//jQuery("#trestimado_detalleAccionesRelaciones").css("display",estimado_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		estimado_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		estimado_detalle_webcontrol1.registrarEventosControles();
		
		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
			estimado_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(estimado_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(estimado_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				estimado_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(estimado_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(estimado_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				estimado_detalle_webcontrol1.onLoad();
				
			} else {
				if(estimado_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
					if(estimado_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
						//estimado_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(estimado_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(estimado_detalle_constante1.BIG_ID_ACTUAL,"estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
						//estimado_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			estimado_detalle_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var estimado_detalle_webcontrol1=new estimado_detalle_webcontrol();

if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = estimado_detalle_webcontrol1.onLoadWindow; 
}

//</script>