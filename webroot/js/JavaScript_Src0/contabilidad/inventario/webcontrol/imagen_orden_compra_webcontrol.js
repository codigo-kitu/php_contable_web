//<script type="text/javascript" language="javascript">



//var imagen_orden_compraJQueryPaginaWebInteraccion= function (imagen_orden_compra_control) {
//this.,this.,this.

class imagen_orden_compra_webcontrol extends imagen_orden_compra_webcontrol_add {
	
	imagen_orden_compra_control=null;
	imagen_orden_compra_controlInicial=null;
	imagen_orden_compra_controlAuxiliar=null;
		
	//if(imagen_orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_orden_compra_control) {
		super();
		
		this.imagen_orden_compra_control=imagen_orden_compra_control;
	}
		
	actualizarVariablesPagina(imagen_orden_compra_control) {
		
		if(imagen_orden_compra_control.action=="index" || imagen_orden_compra_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_orden_compra_control);
			
		} else if(imagen_orden_compra_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_orden_compra_control);
			
		} else if(imagen_orden_compra_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_orden_compra_control);
			
		} else if(imagen_orden_compra_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_orden_compra_control);		
		
		} else if(imagen_orden_compra_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_orden_compra_control);		
		
		} else if(imagen_orden_compra_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_orden_compra_control);		
		
		} else if(imagen_orden_compra_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_orden_compra_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(imagen_orden_compra_control.action + " Revisar Manejo");
			
			if(imagen_orden_compra_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(imagen_orden_compra_control);
				
				return;
			}
			
			//if(imagen_orden_compra_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(imagen_orden_compra_control);
			//}
			
			if(imagen_orden_compra_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(imagen_orden_compra_control);
			}
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_orden_compra_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(imagen_orden_compra_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(imagen_orden_compra_control, false);			
			}
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(imagen_orden_compra_control);	
			}
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
			}
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(imagen_orden_compra_control);
			}
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);
			}
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(imagen_orden_compra_control);	
			}
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
			}
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(imagen_orden_compra_control);
			}
			
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(imagen_orden_compra_control);			
			}
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(imagen_orden_compra_control);
			}
			
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(imagen_orden_compra_control);
			}
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(imagen_orden_compra_control);
			}				
			
			if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_orden_compra_control);
			}
			
			if(imagen_orden_compra_control.usuarioActual!=null && imagen_orden_compra_control.usuarioActual.field_strUserName!=null &&
			imagen_orden_compra_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(imagen_orden_compra_control);			
			}
		}
		
		
		if(imagen_orden_compra_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_orden_compra_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(imagen_orden_compra_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_orden_compra_control);
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		this.actualizarPaginaCargaGeneralControles(imagen_orden_compra_control);
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_orden_compra_control);
		this.actualizarPaginaAreaBusquedas(imagen_orden_compra_control);
		this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_orden_compra_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_orden_compra_control);
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		this.actualizarPaginaCargaGeneralControles(imagen_orden_compra_control);
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_orden_compra_control);
		this.actualizarPaginaAreaBusquedas(imagen_orden_compra_control);
		this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_orden_compra_control) {
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_orden_compra_control) {
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_orden_compra_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_orden_compra_control);
		this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_orden_compra_control) {
		this.actualizarPaginaAbrirLink(imagen_orden_compra_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);				
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		this.actualizarPaginaFormulario(imagen_orden_compra_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		this.actualizarPaginaFormulario(imagen_orden_compra_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_orden_compra_control) {
		this.actualizarPaginaFormulario(imagen_orden_compra_control);
		this.onLoadCombosDefectoFK(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		this.actualizarPaginaFormulario(imagen_orden_compra_control);
		this.onLoadCombosDefectoFK(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_orden_compra_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_orden_compra_control);
		this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);
		this.actualizarPaginaFormulario(imagen_orden_compra_control);
		this.onLoadCombosDefectoFK(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_orden_compra_control) {
		this.actualizarPaginaAbrirLink(imagen_orden_compra_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_orden_compra_control) {
		this.actualizarPaginaImprimir(imagen_orden_compra_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_orden_compra_control) {
		this.actualizarPaginaImprimir(imagen_orden_compra_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_orden_compra_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_orden_compra_control) {
		//FORMULARIO
		if(imagen_orden_compra_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_orden_compra_control);
			this.actualizarPaginaFormularioAdd(imagen_orden_compra_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		//COMBOS FK
		if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_orden_compra_control) {
		//FORMULARIO
		if(imagen_orden_compra_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_orden_compra_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);	
		//COMBOS FK
		if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control) {
		if(imagen_orden_compra_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_orden_compra_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_orden_compra_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_orden_compra_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_orden_compra_control) {
		if(imagen_orden_compra_funcion1.esPaginaForm()==true) {
			window.opener.imagen_orden_compra_webcontrol1.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_orden_compra_control) {
		imagen_orden_compra_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_orden_compra_control.strAuxiliarUrlPagina);
				
		imagen_orden_compra_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_orden_compra_control.strAuxiliarTipo,imagen_orden_compra_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_orden_compra_control) {
		imagen_orden_compra_funcion1.resaltarRestaurarDivMensaje(true,imagen_orden_compra_control.strAuxiliarMensajeAlert,imagen_orden_compra_control.strAuxiliarCssMensaje);
			
		if(imagen_orden_compra_funcion1.esPaginaForm()==true) {
			window.opener.imagen_orden_compra_funcion1.resaltarRestaurarDivMensaje(true,imagen_orden_compra_control.strAuxiliarMensajeAlert,imagen_orden_compra_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(imagen_orden_compra_control) {
		eval(imagen_orden_compra_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(imagen_orden_compra_control, mostrar) {
		
		if(mostrar==true) {
			imagen_orden_compra_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_orden_compra_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			imagen_orden_compra_funcion1.mostrarDivMensaje(true,imagen_orden_compra_control.strAuxiliarMensaje,imagen_orden_compra_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_orden_compra_funcion1.mostrarDivMensaje(false,imagen_orden_compra_control.strAuxiliarMensaje,imagen_orden_compra_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(imagen_orden_compra_control) {
	
		funcionGeneral.printWebPartPage("imagen_orden_compra",imagen_orden_compra_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarimagen_orden_comprasAjaxWebPart").html(imagen_orden_compra_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("imagen_orden_compra",jQuery("#divTablaDatosReporteAuxiliarimagen_orden_comprasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(imagen_orden_compra_control) {
		this.imagen_orden_compra_controlInicial=imagen_orden_compra_control;
			
		if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_orden_compra_control.strStyleDivArbol,imagen_orden_compra_control.strStyleDivContent
																,imagen_orden_compra_control.strStyleDivOpcionesBanner,imagen_orden_compra_control.strStyleDivExpandirColapsar
																,imagen_orden_compra_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_orden_compra_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_orden_compra_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(imagen_orden_compra_control) {
		jQuery("#divTablaDatosimagen_orden_comprasAjaxWebPart").html(imagen_orden_compra_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_orden_compras=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_orden_compras=jQuery("#tblTablaDatosimagen_orden_compras").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_orden_compra",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_orden_compra_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_orden_compra_webcontrol1.registrarControlesTableEdition(imagen_orden_compra_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_orden_compra_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(imagen_orden_compra_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_orden_compra_control.imagen_orden_compraActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_orden_compra_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(imagen_orden_compra_control) {
		this.actualizarCssBotonesPagina(imagen_orden_compra_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_orden_compra_control.tiposReportes,imagen_orden_compra_control.tiposReporte
															 	,imagen_orden_compra_control.tiposPaginacion,imagen_orden_compra_control.tiposAcciones
																,imagen_orden_compra_control.tiposColumnasSelect,imagen_orden_compra_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_orden_compra_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_orden_compra_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_orden_compra_control);			
	}
	
	actualizarPaginaAreaBusquedas(imagen_orden_compra_control) {
		jQuery("#divBusquedaimagen_orden_compraAjaxWebPart").css("display",imagen_orden_compra_control.strPermisoBusqueda);
		jQuery("#trimagen_orden_compraCabeceraBusquedas").css("display",imagen_orden_compra_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_orden_compra_control.htmlTablaOrderBy!=null
			&& imagen_orden_compra_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_orden_compraAjaxWebPart").html(imagen_orden_compra_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_orden_compra_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_orden_compra_control.htmlTablaOrderByRel!=null
			&& imagen_orden_compra_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_orden_compraAjaxWebPart").html(imagen_orden_compra_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_orden_compraAjaxWebPart").css("display","none");
			jQuery("#trimagen_orden_compraCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_orden_compra").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(imagen_orden_compra_control) {
		jQuery("#tdimagen_orden_compraNuevo").css("display",imagen_orden_compra_control.strPermisoNuevo);
		jQuery("#trimagen_orden_compraElementos").css("display",imagen_orden_compra_control.strVisibleTablaElementos);
		jQuery("#trimagen_orden_compraAcciones").css("display",imagen_orden_compra_control.strVisibleTablaAcciones);
		jQuery("#trimagen_orden_compraParametrosAcciones").css("display",imagen_orden_compra_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_orden_compra_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_orden_compra_control);
				
		if(imagen_orden_compra_control.imagen_orden_compraActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_orden_compra_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_orden_compra_control);
	}
	
	actualizarPaginaUsuarioInvitado(imagen_orden_compra_control) {
	
		var indexPosition=imagen_orden_compra_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_orden_compra_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_orden_compra_control) {
		jQuery("#divResumenimagen_orden_compraActualAjaxWebPart").html(imagen_orden_compra_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_orden_compra_control) {
		jQuery("#divAccionesRelacionesimagen_orden_compraAjaxWebPart").html(imagen_orden_compra_control.htmlTablaAccionesRelaciones);
			
		imagen_orden_compra_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_orden_compra_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_orden_compra_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_orden_compra_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_orden_compra();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_orden_compra",id,"inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_orden_compra_control) {
	
		jQuery("#form"+imagen_orden_compra_constante1.STR_SUFIJO+"-id").val(imagen_orden_compra_control.imagen_orden_compraActual.id);
		jQuery("#form"+imagen_orden_compra_constante1.STR_SUFIJO+"-version_row").val(imagen_orden_compra_control.imagen_orden_compraActual.versionRow);
		jQuery("#form"+imagen_orden_compra_constante1.STR_SUFIJO+"-imagen").val(imagen_orden_compra_control.imagen_orden_compraActual.imagen);
		jQuery("#form"+imagen_orden_compra_constante1.STR_SUFIJO+"-nro_compra").val(imagen_orden_compra_control.imagen_orden_compraActual.nro_compra);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_orden_compra_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_orden_compra","inventario","","form_imagen_orden_compra",formulario,"","",paraEventoTabla,idFilaTabla,imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
	}
	
	cargarCombosFK(imagen_orden_compra_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_orden_compra_control.strRecargarFkTiposNinguno!=null && imagen_orden_compra_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_orden_compra_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(imagen_orden_compra_control) {
		jQuery("#spanstrMensajeid").text(imagen_orden_compra_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_orden_compra_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeimagen").text(imagen_orden_compra_control.strMensajeimagen);		
		jQuery("#spanstrMensajenro_compra").text(imagen_orden_compra_control.strMensajenro_compra);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_orden_compra_control) {
		jQuery("#tdbtnNuevoimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaCancelar);						
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
	
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(imagen_orden_compra_control) {
		var i=0;
		
		i=imagen_orden_compra_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_orden_compra_control.imagen_orden_compraActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_orden_compra_control.imagen_orden_compraActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(imagen_orden_compra_control.imagen_orden_compraActual.imagen);
		jQuery("#t-cel_"+i+"_3").val(imagen_orden_compra_control.imagen_orden_compraActual.nro_compra);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_orden_compra_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_orden_compra_control) {
		imagen_orden_compra_funcion1.registrarControlesTableValidacionEdition(imagen_orden_compra_control,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compraConstante,strParametros);
		
		//imagen_orden_compra_funcion1.cancelarOnComplete();
	}	
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_orden_compra_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			
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
	onLoadCombosEventosFK(imagen_orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_orden_compra");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_orden_compra");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_orden_compra_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);			
			
			if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,"imagen_orden_compra");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			imagen_orden_compra_funcion1.validarFormularioJQuery(imagen_orden_compra_constante1);
			
			if(imagen_orden_compra_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_orden_compra_control) {
		
		jQuery("#divBusquedaimagen_orden_compraAjaxWebPart").css("display",imagen_orden_compra_control.strPermisoBusqueda);
		jQuery("#trimagen_orden_compraCabeceraBusquedas").css("display",imagen_orden_compra_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_orden_compra").attr("style",imagen_orden_compra_control.strPermisoMostrarTodos);
		
		if(imagen_orden_compra_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_orden_compraNuevo").css("display",imagen_orden_compra_control.strPermisoNuevo);
			jQuery("#tdimagen_orden_compraNuevoToolBar").css("display",imagen_orden_compra_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_orden_compraDuplicar").css("display",imagen_orden_compra_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_orden_compraDuplicarToolBar").css("display",imagen_orden_compra_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_orden_compraNuevoGuardarCambios").css("display",imagen_orden_compra_control.strPermisoNuevo);
			jQuery("#tdimagen_orden_compraNuevoGuardarCambiosToolBar").css("display",imagen_orden_compra_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_orden_compra_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_orden_compraActualizarToolBar").css("display",imagen_orden_compra_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_orden_compraCopiar").css("display",imagen_orden_compra_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_orden_compraCopiarToolBar").css("display",imagen_orden_compra_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_orden_compraConEditar").css("display",imagen_orden_compra_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_orden_compraEliminarToolBar").css("display",imagen_orden_compra_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdimagen_orden_compraGuardarCambios").css("display",imagen_orden_compra_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_orden_compraGuardarCambiosToolBar").css("display",imagen_orden_compra_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trimagen_orden_compraElementos").css("display",imagen_orden_compra_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_orden_compraAcciones").css("display",imagen_orden_compra_control.strVisibleTablaAcciones);
		jQuery("#trimagen_orden_compraParametrosAcciones").css("display",imagen_orden_compra_control.strVisibleTablaAcciones);
			
		jQuery("#tdimagen_orden_compraCerrarPagina").css("display",imagen_orden_compra_control.strPermisoPopup);		
		jQuery("#tdimagen_orden_compraCerrarPaginaToolBar").css("display",imagen_orden_compra_control.strPermisoPopup);
		//jQuery("#trimagen_orden_compraAccionesRelaciones").css("display",imagen_orden_compra_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_orden_compra_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_orden_compra_webcontrol1.registrarEventosControles();
		
		if(imagen_orden_compra_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			imagen_orden_compra_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_orden_compra_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_orden_compra_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_orden_compra_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(imagen_orden_compra_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_orden_compra_webcontrol1.onLoad();
				
			} else {
				if(imagen_orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
					if(imagen_orden_compra_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
						//imagen_orden_compra_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(imagen_orden_compra_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_orden_compra_constante1.BIG_ID_ACTUAL,"imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
						//imagen_orden_compra_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			imagen_orden_compra_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var imagen_orden_compra_webcontrol1=new imagen_orden_compra_webcontrol();

if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_orden_compra_webcontrol1.onLoadWindow; 
}

//</script>