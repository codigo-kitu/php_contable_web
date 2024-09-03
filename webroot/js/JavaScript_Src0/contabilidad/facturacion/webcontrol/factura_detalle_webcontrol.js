//<script type="text/javascript" language="javascript">



//var factura_detalleJQueryPaginaWebInteraccion= function (factura_detalle_control) {
//this.,this.,this.

class factura_detalle_webcontrol extends factura_detalle_webcontrol_add {
	
	factura_detalle_control=null;
	factura_detalle_controlInicial=null;
	factura_detalle_controlAuxiliar=null;
		
	//if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(factura_detalle_control) {
		super();
		
		this.factura_detalle_control=factura_detalle_control;
	}
		
	actualizarVariablesPagina(factura_detalle_control) {
		
		if(factura_detalle_control.action=="index" || factura_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(factura_detalle_control);
			
		} else if(factura_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(factura_detalle_control);
			
		} else if(factura_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(factura_detalle_control);
			
		} else if(factura_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_detalle_control);		
		
		} else if(factura_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(factura_detalle_control);		
		
		} else if(factura_detalle_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_detalle_control);		
		
		} else if(factura_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(factura_detalle_control);		
		}
		else if(factura_detalle_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_detalle_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(factura_detalle_control.action + " Revisar Manejo");
			
			if(factura_detalle_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(factura_detalle_control);
				
				return;
			}
			
			//if(factura_detalle_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(factura_detalle_control);
			//}
			
			if(factura_detalle_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(factura_detalle_control);
			}
			
			if(factura_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_detalle_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(factura_detalle_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(factura_detalle_control, false);			
			}
			
			if(factura_detalle_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(factura_detalle_control);	
			}
			
			if(factura_detalle_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(factura_detalle_control);
			}
			
			if(factura_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(factura_detalle_control);
			}
			
			if(factura_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(factura_detalle_control);
			}
			
			if(factura_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(factura_detalle_control);	
			}
			
			if(factura_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
			}
			
			if(factura_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(factura_detalle_control);
			}
			
			
			if(factura_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(factura_detalle_control);			
			}
			
			if(factura_detalle_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(factura_detalle_control);
			}
			
			
			if(factura_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(factura_detalle_control);
			}
			
			if(factura_detalle_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(factura_detalle_control);
			}				
			
			if(factura_detalle_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_detalle_control);
			}
			
			if(factura_detalle_control.usuarioActual!=null && factura_detalle_control.usuarioActual.field_strUserName!=null &&
			factura_detalle_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(factura_detalle_control);			
			}
		}
		
		
		if(factura_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(factura_detalle_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(factura_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(factura_detalle_control);
		this.actualizarPaginaTablaDatos(factura_detalle_control);
		this.actualizarPaginaCargaGeneralControles(factura_detalle_control);
		this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_detalle_control);
		this.actualizarPaginaAreaBusquedas(factura_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(factura_detalle_control);
		this.actualizarPaginaTablaDatos(factura_detalle_control);
		this.actualizarPaginaCargaGeneralControles(factura_detalle_control);
		this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_detalle_control);
		this.actualizarPaginaAreaBusquedas(factura_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(factura_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_detalle_control);		
		this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(factura_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_detalle_control);		
		this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(factura_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_detalle_control);		
		this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(factura_detalle_control) {
		this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(factura_detalle_control) {
		this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(factura_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_detalle_control);
		this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_detalle_control) {
		this.actualizarPaginaAbrirLink(factura_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);				
		this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);
		this.actualizarPaginaFormulario(factura_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);
		this.actualizarPaginaFormulario(factura_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(factura_detalle_control) {
		this.actualizarPaginaFormulario(factura_detalle_control);
		this.onLoadCombosDefectoFK(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);
		this.actualizarPaginaFormulario(factura_detalle_control);
		this.onLoadCombosDefectoFK(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(factura_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_detalle_control);
		this.actualizarPaginaFormulario(factura_detalle_control);
		this.onLoadCombosDefectoFK(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_detalle_control) {
		this.actualizarPaginaAbrirLink(factura_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_detalle_control) {
		this.actualizarPaginaImprimir(factura_detalle_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_detalle_control) {
		this.actualizarPaginaImprimir(factura_detalle_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(factura_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_detalle_control) {
		//FORMULARIO
		if(factura_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_detalle_control);
			this.actualizarPaginaFormularioAdd(factura_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		//COMBOS FK
		if(factura_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(factura_detalle_control) {
		//FORMULARIO
		if(factura_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);	
		//COMBOS FK
		if(factura_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_detalle_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_detalle_control) {
		//FORMULARIO
		if(factura_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_detalle_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(factura_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);	
		//COMBOS FK
		if(factura_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_detalle_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control) {
		if(factura_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(factura_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(factura_detalle_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(factura_detalle_control) {
		if(factura_detalle_funcion1.esPaginaForm()==true) {
			window.opener.factura_detalle_webcontrol1.actualizarPaginaTablaDatos(factura_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(factura_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(factura_detalle_control) {
		factura_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(factura_detalle_control.strAuxiliarUrlPagina);
				
		factura_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(factura_detalle_control.strAuxiliarTipo,factura_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(factura_detalle_control) {
		factura_detalle_funcion1.resaltarRestaurarDivMensaje(true,factura_detalle_control.strAuxiliarMensajeAlert,factura_detalle_control.strAuxiliarCssMensaje);
			
		if(factura_detalle_funcion1.esPaginaForm()==true) {
			window.opener.factura_detalle_funcion1.resaltarRestaurarDivMensaje(true,factura_detalle_control.strAuxiliarMensajeAlert,factura_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(factura_detalle_control) {
		eval(factura_detalle_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(factura_detalle_control, mostrar) {
		
		if(mostrar==true) {
			factura_detalle_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				factura_detalle_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			factura_detalle_funcion1.mostrarDivMensaje(true,factura_detalle_control.strAuxiliarMensaje,factura_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			factura_detalle_funcion1.mostrarDivMensaje(false,factura_detalle_control.strAuxiliarMensaje,factura_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(factura_detalle_control) {
	
		funcionGeneral.printWebPartPage("factura_detalle",factura_detalle_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarfactura_detallesAjaxWebPart").html(factura_detalle_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("factura_detalle",jQuery("#divTablaDatosReporteAuxiliarfactura_detallesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(factura_detalle_control) {
		this.factura_detalle_controlInicial=factura_detalle_control;
			
		if(factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(factura_detalle_control.strStyleDivArbol,factura_detalle_control.strStyleDivContent
																,factura_detalle_control.strStyleDivOpcionesBanner,factura_detalle_control.strStyleDivExpandirColapsar
																,factura_detalle_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=factura_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",factura_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(factura_detalle_control) {
		jQuery("#divTablaDatosfactura_detallesAjaxWebPart").html(factura_detalle_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosfactura_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosfactura_detalles=jQuery("#tblTablaDatosfactura_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("factura_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',factura_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			factura_detalle_webcontrol1.registrarControlesTableEdition(factura_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		factura_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(factura_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(factura_detalle_control.factura_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(factura_detalle_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(factura_detalle_control) {
		this.actualizarCssBotonesPagina(factura_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(factura_detalle_control.tiposReportes,factura_detalle_control.tiposReporte
															 	,factura_detalle_control.tiposPaginacion,factura_detalle_control.tiposAcciones
																,factura_detalle_control.tiposColumnasSelect,factura_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(factura_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(factura_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(factura_detalle_control);			
	}
	
	actualizarPaginaAreaBusquedas(factura_detalle_control) {
		jQuery("#divBusquedafactura_detalleAjaxWebPart").css("display",factura_detalle_control.strPermisoBusqueda);
		jQuery("#trfactura_detalleCabeceraBusquedas").css("display",factura_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura_detalle").css("display",factura_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(factura_detalle_control.htmlTablaOrderBy!=null
			&& factura_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByfactura_detalleAjaxWebPart").html(factura_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//factura_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(factura_detalle_control.htmlTablaOrderByRel!=null
			&& factura_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelfactura_detalleAjaxWebPart").html(factura_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(factura_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedafactura_detalleAjaxWebPart").css("display","none");
			jQuery("#trfactura_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedafactura_detalle").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(factura_detalle_control) {
		jQuery("#tdfactura_detalleNuevo").css("display",factura_detalle_control.strPermisoNuevo);
		jQuery("#trfactura_detalleElementos").css("display",factura_detalle_control.strVisibleTablaElementos);
		jQuery("#trfactura_detalleAcciones").css("display",factura_detalle_control.strVisibleTablaAcciones);
		jQuery("#trfactura_detalleParametrosAcciones").css("display",factura_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(factura_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(factura_detalle_control);
				
		if(factura_detalle_control.factura_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(factura_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(factura_detalle_control);
	}
	
	actualizarPaginaUsuarioInvitado(factura_detalle_control) {
	
		var indexPosition=factura_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=factura_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(factura_detalle_control) {
		jQuery("#divResumenfactura_detalleActualAjaxWebPart").html(factura_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_detalle_control) {
		jQuery("#divAccionesRelacionesfactura_detalleAjaxWebPart").html(factura_detalle_control.htmlTablaAccionesRelaciones);
			
		factura_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(factura_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(factura_detalle_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(factura_detalle_control) {
		
		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",factura_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",factura_detalle_control.strVisibleFK_Idbodega);
		}

		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",factura_detalle_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",factura_detalle_control.strVisibleFK_Idcliente);
		}

		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idfactura").attr("style",factura_detalle_control.strVisibleFK_Idfactura);
			jQuery("#tblstrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idfactura").attr("style",factura_detalle_control.strVisibleFK_Idfactura);
		}

		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",factura_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",factura_detalle_control.strVisibleFK_Idproducto);
		}

		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",factura_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",factura_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionfactura_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("factura_detalle",id,"facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);		
	}
	
	

	abrirBusquedaParafactura(strNombreCampoBusqueda){//idActual
		factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_detalle","factura","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_detalle","bodega","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_detalle","producto","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_detalle","unidad","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_detalle","cliente","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(factura_detalle_control) {
	
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id").val(factura_detalle_control.factura_detalleActual.id);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-version_row").val(factura_detalle_control.factura_detalleActual.versionRow);
		
		if(factura_detalle_control.factura_detalleActual.id_factura!=null && factura_detalle_control.factura_detalleActual.id_factura>-1){
			if(jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura").val() != factura_detalle_control.factura_detalleActual.id_factura) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura").val(factura_detalle_control.factura_detalleActual.id_factura).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura").select2("val", null);
			if(jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_detalle_control.factura_detalleActual.id_bodega!=null && factura_detalle_control.factura_detalleActual.id_bodega>-1){
			if(jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != factura_detalle_control.factura_detalleActual.id_bodega) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val(factura_detalle_control.factura_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_detalle_control.factura_detalleActual.id_producto!=null && factura_detalle_control.factura_detalleActual.id_producto>-1){
			if(jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto").val() != factura_detalle_control.factura_detalleActual.id_producto) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto").val(factura_detalle_control.factura_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_detalle_control.factura_detalleActual.id_unidad!=null && factura_detalle_control.factura_detalleActual.id_unidad>-1){
			if(jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != factura_detalle_control.factura_detalleActual.id_unidad) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val(factura_detalle_control.factura_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-cantidad").val(factura_detalle_control.factura_detalleActual.cantidad);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-precio").val(factura_detalle_control.factura_detalleActual.precio);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-sub_total").val(factura_detalle_control.factura_detalleActual.sub_total);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-descuento_porciento").val(factura_detalle_control.factura_detalleActual.descuento_porciento);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-descuento_monto").val(factura_detalle_control.factura_detalleActual.descuento_monto);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-iva_porciento").val(factura_detalle_control.factura_detalleActual.iva_porciento);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-iva_monto").val(factura_detalle_control.factura_detalleActual.iva_monto);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-total").val(factura_detalle_control.factura_detalleActual.total);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-recibido").val(factura_detalle_control.factura_detalleActual.recibido);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-costo").val(factura_detalle_control.factura_detalleActual.costo);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-impuesto2_porciento").val(factura_detalle_control.factura_detalleActual.impuesto2_porciento);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-impuesto2_monto").val(factura_detalle_control.factura_detalleActual.impuesto2_monto);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-fecha_emision").val(factura_detalle_control.factura_detalleActual.fecha_emision);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-comentario").val(factura_detalle_control.factura_detalleActual.comentario);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-tipo_factura").val(factura_detalle_control.factura_detalleActual.tipo_factura);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-tipo_cambio").val(factura_detalle_control.factura_detalleActual.tipo_cambio);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-moneda").val(factura_detalle_control.factura_detalleActual.moneda);
		jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-anulada").val(factura_detalle_control.factura_detalleActual.anulada);
		
		if(factura_detalle_control.factura_detalleActual.id_cliente!=null && factura_detalle_control.factura_detalleActual.id_cliente>-1){
			if(jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_cliente").val() != factura_detalle_control.factura_detalleActual.id_cliente) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_cliente").val(factura_detalle_control.factura_detalleActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_cliente").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+factura_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("factura_detalle","facturacion","","form_factura_detalle",formulario,"","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}
	
	cargarCombosFK(factura_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.cargarCombosfacturasFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.cargarCombosbodegasFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.cargarCombosproductosFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.cargarCombosunidadsFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.cargarCombosclientesFK(factura_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(factura_detalle_control.strRecargarFkTiposNinguno!=null && factura_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && factura_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_factura",factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_detalle_webcontrol1.cargarCombosfacturasFK(factura_detalle_control);
				}

				if(factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_detalle_webcontrol1.cargarCombosbodegasFK(factura_detalle_control);
				}

				if(factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_detalle_webcontrol1.cargarCombosproductosFK(factura_detalle_control);
				}

				if(factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_detalle_webcontrol1.cargarCombosunidadsFK(factura_detalle_control);
				}

				if(factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_detalle_webcontrol1.cargarCombosclientesFK(factura_detalle_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(factura_detalle_control) {
		jQuery("#spanstrMensajeid").text(factura_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(factura_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_factura").text(factura_detalle_control.strMensajeid_factura);		
		jQuery("#spanstrMensajeid_bodega").text(factura_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(factura_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(factura_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajecantidad").text(factura_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajeprecio").text(factura_detalle_control.strMensajeprecio);		
		jQuery("#spanstrMensajesub_total").text(factura_detalle_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_porciento").text(factura_detalle_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajedescuento_monto").text(factura_detalle_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(factura_detalle_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(factura_detalle_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajetotal").text(factura_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajerecibido").text(factura_detalle_control.strMensajerecibido);		
		jQuery("#spanstrMensajecosto").text(factura_detalle_control.strMensajecosto);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(factura_detalle_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(factura_detalle_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajefecha_emision").text(factura_detalle_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajecomentario").text(factura_detalle_control.strMensajecomentario);		
		jQuery("#spanstrMensajetipo_factura").text(factura_detalle_control.strMensajetipo_factura);		
		jQuery("#spanstrMensajetipo_cambio").text(factura_detalle_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajemoneda").text(factura_detalle_control.strMensajemoneda);		
		jQuery("#spanstrMensajeanulada").text(factura_detalle_control.strMensajeanulada);		
		jQuery("#spanstrMensajeid_cliente").text(factura_detalle_control.strMensajeid_cliente);		
	}
	
	actualizarCssBotonesMantenimiento(factura_detalle_control) {
		jQuery("#tdbtnNuevofactura_detalle").css("visibility",factura_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevofactura_detalle").css("display",factura_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarfactura_detalle").css("visibility",factura_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarfactura_detalle").css("display",factura_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarfactura_detalle").css("visibility",factura_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarfactura_detalle").css("display",factura_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarfactura_detalle").css("visibility",factura_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosfactura_detalle").css("visibility",factura_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosfactura_detalle").css("display",factura_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarfactura_detalle").css("visibility",factura_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarfactura_detalle").css("visibility",factura_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarfactura_detalle").css("visibility",factura_detalle_control.strVisibleCeldaCancelar);						
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
			if(nombreCombo=="form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.factura_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.factura_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.factura_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.factura_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.factura_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.factura_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablafacturaFK(factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_detalle_funcion1,factura_detalle_control.facturasFK);
	}

	cargarComboEditarTablabodegaFK(factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_detalle_funcion1,factura_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_detalle_funcion1,factura_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_detalle_funcion1,factura_detalle_control.unidadsFK);
	}

	cargarComboEditarTablaclienteFK(factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_detalle_funcion1,factura_detalle_control.clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(factura_detalle_control) {
		var i=0;
		
		i=factura_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(factura_detalle_control.factura_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(factura_detalle_control.factura_detalleActual.versionRow);
		
		if(factura_detalle_control.factura_detalleActual.id_factura!=null && factura_detalle_control.factura_detalleActual.id_factura>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != factura_detalle_control.factura_detalleActual.id_factura) {
				jQuery("#t-cel_"+i+"_2").val(factura_detalle_control.factura_detalleActual.id_factura).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_detalle_control.factura_detalleActual.id_bodega!=null && factura_detalle_control.factura_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != factura_detalle_control.factura_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_3").val(factura_detalle_control.factura_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_detalle_control.factura_detalleActual.id_producto!=null && factura_detalle_control.factura_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != factura_detalle_control.factura_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_4").val(factura_detalle_control.factura_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_detalle_control.factura_detalleActual.id_unidad!=null && factura_detalle_control.factura_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != factura_detalle_control.factura_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_5").val(factura_detalle_control.factura_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(factura_detalle_control.factura_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_7").val(factura_detalle_control.factura_detalleActual.precio);
		jQuery("#t-cel_"+i+"_8").val(factura_detalle_control.factura_detalleActual.sub_total);
		jQuery("#t-cel_"+i+"_9").val(factura_detalle_control.factura_detalleActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_10").val(factura_detalle_control.factura_detalleActual.descuento_monto);
		jQuery("#t-cel_"+i+"_11").val(factura_detalle_control.factura_detalleActual.iva_porciento);
		jQuery("#t-cel_"+i+"_12").val(factura_detalle_control.factura_detalleActual.iva_monto);
		jQuery("#t-cel_"+i+"_13").val(factura_detalle_control.factura_detalleActual.total);
		jQuery("#t-cel_"+i+"_14").val(factura_detalle_control.factura_detalleActual.recibido);
		jQuery("#t-cel_"+i+"_15").val(factura_detalle_control.factura_detalleActual.costo);
		jQuery("#t-cel_"+i+"_16").val(factura_detalle_control.factura_detalleActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_17").val(factura_detalle_control.factura_detalleActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_18").val(factura_detalle_control.factura_detalleActual.fecha_emision);
		jQuery("#t-cel_"+i+"_19").val(factura_detalle_control.factura_detalleActual.comentario);
		jQuery("#t-cel_"+i+"_20").val(factura_detalle_control.factura_detalleActual.tipo_factura);
		jQuery("#t-cel_"+i+"_21").val(factura_detalle_control.factura_detalleActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_22").val(factura_detalle_control.factura_detalleActual.moneda);
		jQuery("#t-cel_"+i+"_23").val(factura_detalle_control.factura_detalleActual.anulada);
		
		if(factura_detalle_control.factura_detalleActual.id_cliente!=null && factura_detalle_control.factura_detalleActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_24").val() != factura_detalle_control.factura_detalleActual.id_cliente) {
				jQuery("#t-cel_"+i+"_24").val(factura_detalle_control.factura_detalleActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_24").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_24").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(factura_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(factura_detalle_control) {
		factura_detalle_funcion1.registrarControlesTableValidacionEdition(factura_detalle_control,factura_detalle_webcontrol1,factura_detalle_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalleConstante,strParametros);
		
		//factura_detalle_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosfacturasFK(factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura",factura_detalle_control.facturasFK);

		if(factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_detalle_control.idFilaTablaActual+"_2",factura_detalle_control.facturasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura",factura_detalle_control.facturasFK);

	};

	cargarCombosbodegasFK(factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega",factura_detalle_control.bodegasFK);

		if(factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_detalle_control.idFilaTablaActual+"_3",factura_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",factura_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto",factura_detalle_control.productosFK);

		if(factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_detalle_control.idFilaTablaActual+"_4",factura_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",factura_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad",factura_detalle_control.unidadsFK);

		if(factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_detalle_control.idFilaTablaActual+"_5",factura_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",factura_detalle_control.unidadsFK);

	};

	cargarCombosclientesFK(factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_cliente",factura_detalle_control.clientesFK);

		if(factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_detalle_control.idFilaTablaActual+"_24",factura_detalle_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",factura_detalle_control.clientesFK);

	};

	
	
	registrarComboActionChangeCombosfacturasFK(factura_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(factura_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(factura_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(factura_detalle_control) {

	};

	registrarComboActionChangeCombosclientesFK(factura_detalle_control) {

	};

	
	
	setDefectoValorCombosfacturasFK(factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_detalle_control.idfacturaDefaultFK>-1 && jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura").val() != factura_detalle_control.idfacturaDefaultFK) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura").val(factura_detalle_control.idfacturaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(factura_detalle_control.idfacturaDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != factura_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val(factura_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(factura_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto").val() != factura_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto").val(factura_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(factura_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != factura_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val(factura_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(factura_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_detalle_control.idclienteDefaultFK>-1 && jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_cliente").val() != factura_detalle_control.idclienteDefaultFK) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_cliente").val(factura_detalle_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(factura_detalle_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura_detalle","facturacion","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura_detalle","facturacion","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//factura_detalle_control
		
	

		var cantidad="form"+factura_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_detalle","facturacion","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

		var precio="form"+factura_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_detalle","facturacion","","precio",precio,"","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

		var descuento_porciento="form"+factura_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_detalle","facturacion","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

		var iva_porciento="form"+factura_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_detalle","facturacion","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(factura_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.setDefectoValorCombosfacturasFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.setDefectoValorCombosbodegasFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.setDefectoValorCombosproductosFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.setDefectoValorCombosunidadsFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.setDefectoValorCombosclientesFK(factura_detalle_control);
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
	onLoadCombosEventosFK(factura_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_detalle_webcontrol1.registrarComboActionChangeCombosfacturasFK(factura_detalle_control);
			//}

			//if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(factura_detalle_control);
			//}

			//if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(factura_detalle_control);
			//}

			//if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(factura_detalle_control);
			//}

			//if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_detalle_webcontrol1.registrarComboActionChangeCombosclientesFK(factura_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(factura_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("factura_detalle");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("factura_detalle");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(factura_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);			
			
			if(factura_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,"factura_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("factura","id_factura","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura_img_busqueda").click(function(){
				factura_detalle_webcontrol1.abrirBusquedaParafactura("id_factura");
				//alert(jQuery('#form-id_factura_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				factura_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				factura_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				factura_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				factura_detalle_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_detalle","FK_Idbodega","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_detalle","FK_Idcliente","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_detalle","FK_Idfactura","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_detalle","FK_Idproducto","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_detalle","FK_Idunidad","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			factura_detalle_funcion1.validarFormularioJQuery(factura_detalle_constante1);
			
			if(factura_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(factura_detalle_control) {
		
		jQuery("#divBusquedafactura_detalleAjaxWebPart").css("display",factura_detalle_control.strPermisoBusqueda);
		jQuery("#trfactura_detalleCabeceraBusquedas").css("display",factura_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura_detalle").css("display",factura_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportefactura_detalle").css("display",factura_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosfactura_detalle").attr("style",factura_detalle_control.strPermisoMostrarTodos);
		
		if(factura_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdfactura_detalleNuevo").css("display",factura_detalle_control.strPermisoNuevo);
			jQuery("#tdfactura_detalleNuevoToolBar").css("display",factura_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdfactura_detalleDuplicar").css("display",factura_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfactura_detalleDuplicarToolBar").css("display",factura_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfactura_detalleNuevoGuardarCambios").css("display",factura_detalle_control.strPermisoNuevo);
			jQuery("#tdfactura_detalleNuevoGuardarCambiosToolBar").css("display",factura_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(factura_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdfactura_detalleActualizarToolBar").css("display",factura_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_detalleCopiar").css("display",factura_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_detalleCopiarToolBar").css("display",factura_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_detalleConEditar").css("display",factura_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdfactura_detalleEliminarToolBar").css("display",factura_detalle_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdfactura_detalleGuardarCambios").css("display",factura_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdfactura_detalleGuardarCambiosToolBar").css("display",factura_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trfactura_detalleElementos").css("display",factura_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trfactura_detalleAcciones").css("display",factura_detalle_control.strVisibleTablaAcciones);
		jQuery("#trfactura_detalleParametrosAcciones").css("display",factura_detalle_control.strVisibleTablaAcciones);
			
		jQuery("#tdfactura_detalleCerrarPagina").css("display",factura_detalle_control.strPermisoPopup);		
		jQuery("#tdfactura_detalleCerrarPaginaToolBar").css("display",factura_detalle_control.strPermisoPopup);
		//jQuery("#trfactura_detalleAccionesRelaciones").css("display",factura_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		factura_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		factura_detalle_webcontrol1.registrarEventosControles();
		
		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
			factura_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(factura_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(factura_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(factura_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(factura_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				factura_detalle_webcontrol1.onLoad();
				
			} else {
				if(factura_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
					if(factura_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
						//factura_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(factura_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(factura_detalle_constante1.BIG_ID_ACTUAL,"factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
						//factura_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			factura_detalle_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var factura_detalle_webcontrol1=new factura_detalle_webcontrol();

if(factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = factura_detalle_webcontrol1.onLoadWindow; 
}

//</script>