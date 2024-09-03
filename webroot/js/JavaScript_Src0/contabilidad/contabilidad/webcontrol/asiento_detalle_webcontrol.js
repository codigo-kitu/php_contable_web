//<script type="text/javascript" language="javascript">



//var asiento_detalleJQueryPaginaWebInteraccion= function (asiento_detalle_control) {
//this.,this.,this.

class asiento_detalle_webcontrol extends asiento_detalle_webcontrol_add {
	
	asiento_detalle_control=null;
	asiento_detalle_controlInicial=null;
	asiento_detalle_controlAuxiliar=null;
		
	//if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_detalle_control) {
		super();
		
		this.asiento_detalle_control=asiento_detalle_control;
	}
		
	actualizarVariablesPagina(asiento_detalle_control) {
		
		if(asiento_detalle_control.action=="index" || asiento_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_detalle_control);
			
		} else if(asiento_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(asiento_detalle_control);
			
		} else if(asiento_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(asiento_detalle_control);
			
		} else if(asiento_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_detalle_control);		
		
		} else if(asiento_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(asiento_detalle_control);		
		
		} else if(asiento_detalle_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_detalle_control);		
		
		} else if(asiento_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_detalle_control);		
		}
		else if(asiento_detalle_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_detalle_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(asiento_detalle_control.action + " Revisar Manejo");
			
			if(asiento_detalle_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(asiento_detalle_control);
				
				return;
			}
			
			//if(asiento_detalle_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(asiento_detalle_control);
			//}
			
			if(asiento_detalle_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(asiento_detalle_control);
			}
			
			if(asiento_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_detalle_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(asiento_detalle_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(asiento_detalle_control, false);			
			}
			
			if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(asiento_detalle_control);	
			}
			
			if(asiento_detalle_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(asiento_detalle_control);
			}
			
			if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(asiento_detalle_control);
			}
			
			if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(asiento_detalle_control);
			}
			
			if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(asiento_detalle_control);	
			}
			
			if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
			}
			
			if(asiento_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(asiento_detalle_control);
			}
			
			
			if(asiento_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(asiento_detalle_control);			
			}
			
			if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(asiento_detalle_control);
			}
			
			
			if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(asiento_detalle_control);
			}
			
			if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(asiento_detalle_control);
			}				
			
			if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_detalle_control);
			}
			
			if(asiento_detalle_control.usuarioActual!=null && asiento_detalle_control.usuarioActual.field_strUserName!=null &&
			asiento_detalle_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(asiento_detalle_control);			
			}
		}
		
		
		if(asiento_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_detalle_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(asiento_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_detalle_control);
		this.actualizarPaginaTablaDatos(asiento_detalle_control);
		this.actualizarPaginaCargaGeneralControles(asiento_detalle_control);
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_detalle_control);
		this.actualizarPaginaAreaBusquedas(asiento_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_detalle_control);
		this.actualizarPaginaTablaDatos(asiento_detalle_control);
		this.actualizarPaginaCargaGeneralControles(asiento_detalle_control);
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_detalle_control);
		this.actualizarPaginaAreaBusquedas(asiento_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(asiento_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(asiento_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(asiento_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);		
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);		
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);		
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_detalle_control) {
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(asiento_detalle_control) {
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_detalle_control);
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_detalle_control) {
		this.actualizarPaginaAbrirLink(asiento_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);				
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);
		this.actualizarPaginaFormulario(asiento_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);
		this.actualizarPaginaFormulario(asiento_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(asiento_detalle_control) {
		this.actualizarPaginaFormulario(asiento_detalle_control);
		this.onLoadCombosDefectoFK(asiento_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);
		this.actualizarPaginaFormulario(asiento_detalle_control);
		this.onLoadCombosDefectoFK(asiento_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_detalle_control);
		this.actualizarPaginaFormulario(asiento_detalle_control);
		this.onLoadCombosDefectoFK(asiento_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_detalle_control) {
		this.actualizarPaginaAbrirLink(asiento_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(asiento_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_detalle_control) {
		this.actualizarPaginaImprimir(asiento_detalle_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_detalle_control) {
		this.actualizarPaginaImprimir(asiento_detalle_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_detalle_control) {
		//FORMULARIO
		if(asiento_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_detalle_control);
			this.actualizarPaginaFormularioAdd(asiento_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		//COMBOS FK
		if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(asiento_detalle_control) {
		//FORMULARIO
		if(asiento_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);	
		//COMBOS FK
		if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_detalle_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_detalle_control) {
		//FORMULARIO
		if(asiento_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_detalle_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);	
		//COMBOS FK
		if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_detalle_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control) {
		if(asiento_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_detalle_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_detalle_control) {
		if(asiento_detalle_funcion1.esPaginaForm()==true) {
			window.opener.asiento_detalle_webcontrol1.actualizarPaginaTablaDatos(asiento_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_detalle_control) {
		asiento_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_detalle_control.strAuxiliarUrlPagina);
				
		asiento_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_detalle_control.strAuxiliarTipo,asiento_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_detalle_control) {
		asiento_detalle_funcion1.resaltarRestaurarDivMensaje(true,asiento_detalle_control.strAuxiliarMensajeAlert,asiento_detalle_control.strAuxiliarCssMensaje);
			
		if(asiento_detalle_funcion1.esPaginaForm()==true) {
			window.opener.asiento_detalle_funcion1.resaltarRestaurarDivMensaje(true,asiento_detalle_control.strAuxiliarMensajeAlert,asiento_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(asiento_detalle_control) {
		eval(asiento_detalle_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(asiento_detalle_control, mostrar) {
		
		if(mostrar==true) {
			asiento_detalle_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_detalle_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			asiento_detalle_funcion1.mostrarDivMensaje(true,asiento_detalle_control.strAuxiliarMensaje,asiento_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_detalle_funcion1.mostrarDivMensaje(false,asiento_detalle_control.strAuxiliarMensaje,asiento_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(asiento_detalle_control) {
	
		funcionGeneral.printWebPartPage("asiento_detalle",asiento_detalle_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarasiento_detallesAjaxWebPart").html(asiento_detalle_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("asiento_detalle",jQuery("#divTablaDatosReporteAuxiliarasiento_detallesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(asiento_detalle_control) {
		this.asiento_detalle_controlInicial=asiento_detalle_control;
			
		if(asiento_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_detalle_control.strStyleDivArbol,asiento_detalle_control.strStyleDivContent
																,asiento_detalle_control.strStyleDivOpcionesBanner,asiento_detalle_control.strStyleDivExpandirColapsar
																,asiento_detalle_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=asiento_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",asiento_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(asiento_detalle_control) {
		jQuery("#divTablaDatosasiento_detallesAjaxWebPart").html(asiento_detalle_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosasiento_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(asiento_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosasiento_detalles=jQuery("#tblTablaDatosasiento_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("asiento_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',asiento_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			asiento_detalle_webcontrol1.registrarControlesTableEdition(asiento_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		asiento_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(asiento_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(asiento_detalle_control.asiento_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(asiento_detalle_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(asiento_detalle_control) {
		this.actualizarCssBotonesPagina(asiento_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_detalle_control.tiposReportes,asiento_detalle_control.tiposReporte
															 	,asiento_detalle_control.tiposPaginacion,asiento_detalle_control.tiposAcciones
																,asiento_detalle_control.tiposColumnasSelect,asiento_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_detalle_control);			
	}
	
	actualizarPaginaAreaBusquedas(asiento_detalle_control) {
		jQuery("#divBusquedaasiento_detalleAjaxWebPart").css("display",asiento_detalle_control.strPermisoBusqueda);
		jQuery("#trasiento_detalleCabeceraBusquedas").css("display",asiento_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_detalle").css("display",asiento_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(asiento_detalle_control.htmlTablaOrderBy!=null
			&& asiento_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByasiento_detalleAjaxWebPart").html(asiento_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//asiento_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(asiento_detalle_control.htmlTablaOrderByRel!=null
			&& asiento_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelasiento_detalleAjaxWebPart").html(asiento_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(asiento_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaasiento_detalleAjaxWebPart").css("display","none");
			jQuery("#trasiento_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaasiento_detalle").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(asiento_detalle_control) {
		jQuery("#tdasiento_detalleNuevo").css("display",asiento_detalle_control.strPermisoNuevo);
		jQuery("#trasiento_detalleElementos").css("display",asiento_detalle_control.strVisibleTablaElementos);
		jQuery("#trasiento_detalleAcciones").css("display",asiento_detalle_control.strVisibleTablaAcciones);
		jQuery("#trasiento_detalleParametrosAcciones").css("display",asiento_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(asiento_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(asiento_detalle_control);
				
		if(asiento_detalle_control.asiento_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(asiento_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(asiento_detalle_control);
	}
	
	actualizarPaginaUsuarioInvitado(asiento_detalle_control) {
	
		var indexPosition=asiento_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(asiento_detalle_control) {
		jQuery("#divResumenasiento_detalleActualAjaxWebPart").html(asiento_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_detalle_control) {
		jQuery("#divAccionesRelacionesasiento_detalleAjaxWebPart").html(asiento_detalle_control.htmlTablaAccionesRelaciones);
			
		asiento_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(asiento_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(asiento_detalle_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(asiento_detalle_control) {
		
		if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",asiento_detalle_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",asiento_detalle_control.strVisibleFK_Idasiento);
		}

		if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_detalle_control.strVisibleFK_Idcentro_costo);
			jQuery("#tblstrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_detalle_control.strVisibleFK_Idcentro_costo);
		}

		if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",asiento_detalle_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",asiento_detalle_control.strVisibleFK_Idcuenta);
		}

		if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",asiento_detalle_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",asiento_detalle_control.strVisibleFK_Idejercicio);
		}

		if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_detalle_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_detalle_control.strVisibleFK_Idempresa);
		}

		if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",asiento_detalle_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",asiento_detalle_control.strVisibleFK_Idperiodo);
		}

		if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",asiento_detalle_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",asiento_detalle_control.strVisibleFK_Idsucursal);
		}

		if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",asiento_detalle_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",asiento_detalle_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionasiento_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("asiento_detalle",id,"contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		asiento_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_detalle","empresa","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		asiento_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_detalle","sucursal","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		asiento_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_detalle","ejercicio","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		asiento_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_detalle","periodo","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		asiento_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_detalle","usuario","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
	}

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		asiento_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_detalle","asiento","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		asiento_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_detalle","cuenta","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
	}

	abrirBusquedaParacentro_costo(strNombreCampoBusqueda){//idActual
		asiento_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_detalle","centro_costo","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(asiento_detalle_control) {
	
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id").val(asiento_detalle_control.asiento_detalleActual.id);
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-version_row").val(asiento_detalle_control.asiento_detalleActual.versionRow);
		
		if(asiento_detalle_control.asiento_detalleActual.id_empresa!=null && asiento_detalle_control.asiento_detalleActual.id_empresa>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_detalle_control.asiento_detalleActual.id_empresa) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").val(asiento_detalle_control.asiento_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_sucursal!=null && asiento_detalle_control.asiento_detalleActual.id_sucursal>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != asiento_detalle_control.asiento_detalleActual.id_sucursal) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(asiento_detalle_control.asiento_detalleActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_ejercicio!=null && asiento_detalle_control.asiento_detalleActual.id_ejercicio>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != asiento_detalle_control.asiento_detalleActual.id_ejercicio) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(asiento_detalle_control.asiento_detalleActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_periodo!=null && asiento_detalle_control.asiento_detalleActual.id_periodo>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != asiento_detalle_control.asiento_detalleActual.id_periodo) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").val(asiento_detalle_control.asiento_detalleActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_usuario!=null && asiento_detalle_control.asiento_detalleActual.id_usuario>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != asiento_detalle_control.asiento_detalleActual.id_usuario) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").val(asiento_detalle_control.asiento_detalleActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_asiento!=null && asiento_detalle_control.asiento_detalleActual.id_asiento>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").val() != asiento_detalle_control.asiento_detalleActual.id_asiento) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").val(asiento_detalle_control.asiento_detalleActual.id_asiento).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_cuenta!=null && asiento_detalle_control.asiento_detalleActual.id_cuenta>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != asiento_detalle_control.asiento_detalleActual.id_cuenta) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(asiento_detalle_control.asiento_detalleActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_centro_costo!=null && asiento_detalle_control.asiento_detalleActual.id_centro_costo>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_detalle_control.asiento_detalleActual.id_centro_costo) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_detalle_control.asiento_detalleActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-debito").val(asiento_detalle_control.asiento_detalleActual.debito);
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-credito").val(asiento_detalle_control.asiento_detalleActual.credito);
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-orden").val(asiento_detalle_control.asiento_detalleActual.orden);
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-valor_base").val(asiento_detalle_control.asiento_detalleActual.valor_base);
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-cuenta_contable").val(asiento_detalle_control.asiento_detalleActual.cuenta_contable);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+asiento_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("asiento_detalle","contabilidad","","form_asiento_detalle",formulario,"","",paraEventoTabla,idFilaTabla,asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
	}
	
	cargarCombosFK(asiento_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarCombosempresasFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarCombossucursalsFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarCombosejerciciosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarCombosperiodosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarCombosusuariosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarCombosasientosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarComboscuentasFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarComboscentro_costosFK(asiento_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_detalle_control.strRecargarFkTiposNinguno!=null && asiento_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarCombosempresasFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarCombossucursalsFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarCombosejerciciosFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarCombosperiodosFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarCombosusuariosFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarCombosasientosFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarComboscuentasFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarComboscentro_costosFK(asiento_detalle_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(asiento_detalle_control) {
		jQuery("#spanstrMensajeid").text(asiento_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(asiento_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(asiento_detalle_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(asiento_detalle_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(asiento_detalle_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(asiento_detalle_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(asiento_detalle_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_asiento").text(asiento_detalle_control.strMensajeid_asiento);		
		jQuery("#spanstrMensajeid_cuenta").text(asiento_detalle_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajeid_centro_costo").text(asiento_detalle_control.strMensajeid_centro_costo);		
		jQuery("#spanstrMensajedebito").text(asiento_detalle_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(asiento_detalle_control.strMensajecredito);		
		jQuery("#spanstrMensajeorden").text(asiento_detalle_control.strMensajeorden);		
		jQuery("#spanstrMensajevalor_base").text(asiento_detalle_control.strMensajevalor_base);		
		jQuery("#spanstrMensajecuenta_contable").text(asiento_detalle_control.strMensajecuenta_contable);		
	}
	
	actualizarCssBotonesMantenimiento(asiento_detalle_control) {
		jQuery("#tdbtnNuevoasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoasiento_detalle").css("display",asiento_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarasiento_detalle").css("display",asiento_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarasiento_detalle").css("display",asiento_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosasiento_detalle").css("display",asiento_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.usuariosFK);
	}

	cargarComboEditarTablaasientoFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.asientosFK);
	}

	cargarComboEditarTablacuentaFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.cuentasFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.centro_costosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(asiento_detalle_control) {
		var i=0;
		
		i=asiento_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(asiento_detalle_control.asiento_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(asiento_detalle_control.asiento_detalleActual.versionRow);
		
		if(asiento_detalle_control.asiento_detalleActual.id_empresa!=null && asiento_detalle_control.asiento_detalleActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != asiento_detalle_control.asiento_detalleActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(asiento_detalle_control.asiento_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_sucursal!=null && asiento_detalle_control.asiento_detalleActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != asiento_detalle_control.asiento_detalleActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(asiento_detalle_control.asiento_detalleActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_ejercicio!=null && asiento_detalle_control.asiento_detalleActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != asiento_detalle_control.asiento_detalleActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(asiento_detalle_control.asiento_detalleActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_periodo!=null && asiento_detalle_control.asiento_detalleActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != asiento_detalle_control.asiento_detalleActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(asiento_detalle_control.asiento_detalleActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_usuario!=null && asiento_detalle_control.asiento_detalleActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != asiento_detalle_control.asiento_detalleActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(asiento_detalle_control.asiento_detalleActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_asiento!=null && asiento_detalle_control.asiento_detalleActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != asiento_detalle_control.asiento_detalleActual.id_asiento) {
				jQuery("#t-cel_"+i+"_7").val(asiento_detalle_control.asiento_detalleActual.id_asiento).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_cuenta!=null && asiento_detalle_control.asiento_detalleActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != asiento_detalle_control.asiento_detalleActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_8").val(asiento_detalle_control.asiento_detalleActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_centro_costo!=null && asiento_detalle_control.asiento_detalleActual.id_centro_costo>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != asiento_detalle_control.asiento_detalleActual.id_centro_costo) {
				jQuery("#t-cel_"+i+"_9").val(asiento_detalle_control.asiento_detalleActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_9").select2("val", null);
			if(jQuery("#t-cel_"+i+"_9").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(asiento_detalle_control.asiento_detalleActual.debito);
		jQuery("#t-cel_"+i+"_11").val(asiento_detalle_control.asiento_detalleActual.credito);
		jQuery("#t-cel_"+i+"_12").val(asiento_detalle_control.asiento_detalleActual.orden);
		jQuery("#t-cel_"+i+"_13").val(asiento_detalle_control.asiento_detalleActual.valor_base);
		jQuery("#t-cel_"+i+"_14").val(asiento_detalle_control.asiento_detalleActual.cuenta_contable);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(asiento_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(asiento_detalle_control) {
		asiento_detalle_funcion1.registrarControlesTableValidacionEdition(asiento_detalle_control,asiento_detalle_webcontrol1,asiento_detalle_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalleConstante,strParametros);
		
		//asiento_detalle_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa",asiento_detalle_control.empresasFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_2",asiento_detalle_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal",asiento_detalle_control.sucursalsFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_3",asiento_detalle_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio",asiento_detalle_control.ejerciciosFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_4",asiento_detalle_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo",asiento_detalle_control.periodosFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_5",asiento_detalle_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario",asiento_detalle_control.usuariosFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_6",asiento_detalle_control.usuariosFK);
		}
	};

	cargarCombosasientosFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento",asiento_detalle_control.asientosFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_7",asiento_detalle_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",asiento_detalle_control.asientosFK);

	};

	cargarComboscuentasFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta",asiento_detalle_control.cuentasFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_8",asiento_detalle_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",asiento_detalle_control.cuentasFK);

	};

	cargarComboscentro_costosFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo",asiento_detalle_control.centro_costosFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_9",asiento_detalle_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_detalle_control.centro_costosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(asiento_detalle_control) {

	};

	registrarComboActionChangeCombossucursalsFK(asiento_detalle_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(asiento_detalle_control) {

	};

	registrarComboActionChangeCombosperiodosFK(asiento_detalle_control) {

	};

	registrarComboActionChangeCombosusuariosFK(asiento_detalle_control) {

	};

	registrarComboActionChangeCombosasientosFK(asiento_detalle_control) {

	};

	registrarComboActionChangeComboscuentasFK(asiento_detalle_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_detalle_control) {

	};

	
	
	setDefectoValorCombosempresasFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idempresaDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_detalle_control.idempresaDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").val(asiento_detalle_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idsucursalDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != asiento_detalle_control.idsucursalDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(asiento_detalle_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idejercicioDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != asiento_detalle_control.idejercicioDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(asiento_detalle_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idperiodoDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != asiento_detalle_control.idperiodoDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").val(asiento_detalle_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idusuarioDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != asiento_detalle_control.idusuarioDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").val(asiento_detalle_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idasientoDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").val() != asiento_detalle_control.idasientoDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").val(asiento_detalle_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(asiento_detalle_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idcuentaDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != asiento_detalle_control.idcuentaDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(asiento_detalle_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(asiento_detalle_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_detalle_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_detalle_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_detalle_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorCombosempresasFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorCombossucursalsFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorCombosejerciciosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorCombosperiodosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorCombosusuariosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorCombosasientosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorComboscuentasFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_detalle_control);
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
	onLoadCombosEventosFK(asiento_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeCombosempresasFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeCombossucursalsFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeCombosejerciciosFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeCombosperiodosFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeCombosusuariosFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeCombosasientosFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeComboscuentasFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento_detalle");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento_detalle");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(asiento_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);			
			
			if(asiento_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,"asiento_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_detalle","FK_Idasiento","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_detalle","FK_Idcentro_costo","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_detalle","FK_Idcuenta","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_detalle","FK_Idejercicio","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_detalle","FK_Idempresa","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_detalle","FK_Idperiodo","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_detalle","FK_Idsucursal","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_detalle","FK_Idusuario","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			asiento_detalle_funcion1.validarFormularioJQuery(asiento_detalle_constante1);
			
			if(asiento_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_detalle_control) {
		
		jQuery("#divBusquedaasiento_detalleAjaxWebPart").css("display",asiento_detalle_control.strPermisoBusqueda);
		jQuery("#trasiento_detalleCabeceraBusquedas").css("display",asiento_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_detalle").css("display",asiento_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteasiento_detalle").css("display",asiento_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosasiento_detalle").attr("style",asiento_detalle_control.strPermisoMostrarTodos);
		
		if(asiento_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdasiento_detalleNuevo").css("display",asiento_detalle_control.strPermisoNuevo);
			jQuery("#tdasiento_detalleNuevoToolBar").css("display",asiento_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdasiento_detalleDuplicar").css("display",asiento_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_detalleDuplicarToolBar").css("display",asiento_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_detalleNuevoGuardarCambios").css("display",asiento_detalle_control.strPermisoNuevo);
			jQuery("#tdasiento_detalleNuevoGuardarCambiosToolBar").css("display",asiento_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(asiento_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdasiento_detalleActualizarToolBar").css("display",asiento_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_detalleCopiar").css("display",asiento_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_detalleCopiarToolBar").css("display",asiento_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_detalleConEditar").css("display",asiento_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdasiento_detalleEliminarToolBar").css("display",asiento_detalle_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdasiento_detalleGuardarCambios").css("display",asiento_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdasiento_detalleGuardarCambiosToolBar").css("display",asiento_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trasiento_detalleElementos").css("display",asiento_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trasiento_detalleAcciones").css("display",asiento_detalle_control.strVisibleTablaAcciones);
		jQuery("#trasiento_detalleParametrosAcciones").css("display",asiento_detalle_control.strVisibleTablaAcciones);
			
		jQuery("#tdasiento_detalleCerrarPagina").css("display",asiento_detalle_control.strPermisoPopup);		
		jQuery("#tdasiento_detalleCerrarPaginaToolBar").css("display",asiento_detalle_control.strPermisoPopup);
		//jQuery("#trasiento_detalleAccionesRelaciones").css("display",asiento_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_detalle_webcontrol1.registrarEventosControles();
		
		if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_detalle_constante1.STR_ES_RELACIONADO=="false") {
			asiento_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(asiento_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				asiento_detalle_webcontrol1.onLoad();
				
			} else {
				if(asiento_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
					if(asiento_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
						//asiento_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(asiento_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(asiento_detalle_constante1.BIG_ID_ACTUAL,"asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
						//asiento_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			asiento_detalle_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var asiento_detalle_webcontrol1=new asiento_detalle_webcontrol();

if(asiento_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_detalle_webcontrol1.onLoadWindow; 
}

//</script>