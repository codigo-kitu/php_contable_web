//<script type="text/javascript" language="javascript">



//var imagen_consignacionJQueryPaginaWebInteraccion= function (imagen_consignacion_control) {
//this.,this.,this.

class imagen_consignacion_webcontrol extends imagen_consignacion_webcontrol_add {
	
	imagen_consignacion_control=null;
	imagen_consignacion_controlInicial=null;
	imagen_consignacion_controlAuxiliar=null;
		
	//if(imagen_consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_consignacion_control) {
		super();
		
		this.imagen_consignacion_control=imagen_consignacion_control;
	}
		
	actualizarVariablesPagina(imagen_consignacion_control) {
		
		if(imagen_consignacion_control.action=="index" || imagen_consignacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_consignacion_control);
			
		} else if(imagen_consignacion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_consignacion_control);
			
		} else if(imagen_consignacion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_consignacion_control);
			
		} else if(imagen_consignacion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_consignacion_control);		
		
		} else if(imagen_consignacion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_consignacion_control);		
		
		} else if(imagen_consignacion_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_consignacion_control);		
		
		} else if(imagen_consignacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_consignacion_control);		
		}
		else if(imagen_consignacion_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_consignacion_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(imagen_consignacion_control.action + " Revisar Manejo");
			
			if(imagen_consignacion_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(imagen_consignacion_control);
				
				return;
			}
			
			//if(imagen_consignacion_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(imagen_consignacion_control);
			//}
			
			if(imagen_consignacion_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(imagen_consignacion_control);
			}
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_consignacion_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(imagen_consignacion_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(imagen_consignacion_control, false);			
			}
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(imagen_consignacion_control);	
			}
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(imagen_consignacion_control);
			}
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(imagen_consignacion_control);
			}
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);
			}
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(imagen_consignacion_control);	
			}
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
			}
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(imagen_consignacion_control);
			}
			
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(imagen_consignacion_control);			
			}
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(imagen_consignacion_control);
			}
			
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(imagen_consignacion_control);
			}
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(imagen_consignacion_control);
			}				
			
			if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_consignacion_control);
			}
			
			if(imagen_consignacion_control.usuarioActual!=null && imagen_consignacion_control.usuarioActual.field_strUserName!=null &&
			imagen_consignacion_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(imagen_consignacion_control);			
			}
		}
		
		
		if(imagen_consignacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_consignacion_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(imagen_consignacion_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_consignacion_control);
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);
		this.actualizarPaginaCargaGeneralControles(imagen_consignacion_control);
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_consignacion_control);
		this.actualizarPaginaAreaBusquedas(imagen_consignacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_consignacion_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_consignacion_control);
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);
		this.actualizarPaginaCargaGeneralControles(imagen_consignacion_control);
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_consignacion_control);
		this.actualizarPaginaAreaBusquedas(imagen_consignacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);		
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);		
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);		
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_consignacion_control) {
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_consignacion_control) {
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_consignacion_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_consignacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_consignacion_control) {
		this.actualizarPaginaAbrirLink(imagen_consignacion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);				
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);
		this.actualizarPaginaFormulario(imagen_consignacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);
		this.actualizarPaginaFormulario(imagen_consignacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_consignacion_control) {
		this.actualizarPaginaFormulario(imagen_consignacion_control);
		this.onLoadCombosDefectoFK(imagen_consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);
		this.actualizarPaginaFormulario(imagen_consignacion_control);
		this.onLoadCombosDefectoFK(imagen_consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_consignacion_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_consignacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);
		this.actualizarPaginaFormulario(imagen_consignacion_control);
		this.onLoadCombosDefectoFK(imagen_consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_consignacion_control) {
		this.actualizarPaginaAbrirLink(imagen_consignacion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_consignacion_control) {
		this.actualizarPaginaImprimir(imagen_consignacion_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_consignacion_control) {
		this.actualizarPaginaImprimir(imagen_consignacion_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_consignacion_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_consignacion_control) {
		//FORMULARIO
		if(imagen_consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_consignacion_control);
			this.actualizarPaginaFormularioAdd(imagen_consignacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		//COMBOS FK
		if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_consignacion_control) {
		//FORMULARIO
		if(imagen_consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_consignacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);	
		//COMBOS FK
		if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_consignacion_control) {
		//FORMULARIO
		if(imagen_consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_consignacion_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_consignacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);	
		//COMBOS FK
		if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control) {
		if(imagen_consignacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_consignacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_consignacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_consignacion_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_consignacion_control) {
		if(imagen_consignacion_funcion1.esPaginaForm()==true) {
			window.opener.imagen_consignacion_webcontrol1.actualizarPaginaTablaDatos(imagen_consignacion_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_consignacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_consignacion_control) {
		imagen_consignacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_consignacion_control.strAuxiliarUrlPagina);
				
		imagen_consignacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_consignacion_control.strAuxiliarTipo,imagen_consignacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_consignacion_control) {
		imagen_consignacion_funcion1.resaltarRestaurarDivMensaje(true,imagen_consignacion_control.strAuxiliarMensajeAlert,imagen_consignacion_control.strAuxiliarCssMensaje);
			
		if(imagen_consignacion_funcion1.esPaginaForm()==true) {
			window.opener.imagen_consignacion_funcion1.resaltarRestaurarDivMensaje(true,imagen_consignacion_control.strAuxiliarMensajeAlert,imagen_consignacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(imagen_consignacion_control) {
		eval(imagen_consignacion_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(imagen_consignacion_control, mostrar) {
		
		if(mostrar==true) {
			imagen_consignacion_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_consignacion_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			imagen_consignacion_funcion1.mostrarDivMensaje(true,imagen_consignacion_control.strAuxiliarMensaje,imagen_consignacion_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_consignacion_funcion1.mostrarDivMensaje(false,imagen_consignacion_control.strAuxiliarMensaje,imagen_consignacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(imagen_consignacion_control) {
	
		funcionGeneral.printWebPartPage("imagen_consignacion",imagen_consignacion_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarimagen_consignacionsAjaxWebPart").html(imagen_consignacion_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("imagen_consignacion",jQuery("#divTablaDatosReporteAuxiliarimagen_consignacionsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(imagen_consignacion_control) {
		this.imagen_consignacion_controlInicial=imagen_consignacion_control;
			
		if(imagen_consignacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_consignacion_control.strStyleDivArbol,imagen_consignacion_control.strStyleDivContent
																,imagen_consignacion_control.strStyleDivOpcionesBanner,imagen_consignacion_control.strStyleDivExpandirColapsar
																,imagen_consignacion_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_consignacion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_consignacion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(imagen_consignacion_control) {
		jQuery("#divTablaDatosimagen_consignacionsAjaxWebPart").html(imagen_consignacion_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_consignacions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_consignacion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_consignacions=jQuery("#tblTablaDatosimagen_consignacions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_consignacion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_consignacion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_consignacion_webcontrol1.registrarControlesTableEdition(imagen_consignacion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_consignacion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(imagen_consignacion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_consignacion_control.imagen_consignacionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_consignacion_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(imagen_consignacion_control) {
		this.actualizarCssBotonesPagina(imagen_consignacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_consignacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_consignacion_control.tiposReportes,imagen_consignacion_control.tiposReporte
															 	,imagen_consignacion_control.tiposPaginacion,imagen_consignacion_control.tiposAcciones
																,imagen_consignacion_control.tiposColumnasSelect,imagen_consignacion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_consignacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_consignacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_consignacion_control);			
	}
	
	actualizarPaginaAreaBusquedas(imagen_consignacion_control) {
		jQuery("#divBusquedaimagen_consignacionAjaxWebPart").css("display",imagen_consignacion_control.strPermisoBusqueda);
		jQuery("#trimagen_consignacionCabeceraBusquedas").css("display",imagen_consignacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_consignacion").css("display",imagen_consignacion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_consignacion_control.htmlTablaOrderBy!=null
			&& imagen_consignacion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_consignacionAjaxWebPart").html(imagen_consignacion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_consignacion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_consignacion_control.htmlTablaOrderByRel!=null
			&& imagen_consignacion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_consignacionAjaxWebPart").html(imagen_consignacion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_consignacion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_consignacionAjaxWebPart").css("display","none");
			jQuery("#trimagen_consignacionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_consignacion").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(imagen_consignacion_control) {
		jQuery("#tdimagen_consignacionNuevo").css("display",imagen_consignacion_control.strPermisoNuevo);
		jQuery("#trimagen_consignacionElementos").css("display",imagen_consignacion_control.strVisibleTablaElementos);
		jQuery("#trimagen_consignacionAcciones").css("display",imagen_consignacion_control.strVisibleTablaAcciones);
		jQuery("#trimagen_consignacionParametrosAcciones").css("display",imagen_consignacion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_consignacion_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_consignacion_control);
				
		if(imagen_consignacion_control.imagen_consignacionActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_consignacion_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_consignacion_control);
	}
	
	actualizarPaginaUsuarioInvitado(imagen_consignacion_control) {
	
		var indexPosition=imagen_consignacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_consignacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_consignacion_control) {
		jQuery("#divResumenimagen_consignacionActualAjaxWebPart").html(imagen_consignacion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_consignacion_control) {
		jQuery("#divAccionesRelacionesimagen_consignacionAjaxWebPart").html(imagen_consignacion_control.htmlTablaAccionesRelaciones);
			
		imagen_consignacion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_consignacion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_consignacion_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_consignacion_control) {
		
		if(imagen_consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_consignacion_constante1.STR_SUFIJO+"FK_Idconsignacion").attr("style",imagen_consignacion_control.strVisibleFK_Idconsignacion);
			jQuery("#tblstrVisible"+imagen_consignacion_constante1.STR_SUFIJO+"FK_Idconsignacion").attr("style",imagen_consignacion_control.strVisibleFK_Idconsignacion);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_consignacion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_consignacion",id,"estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);		
	}
	
	

	abrirBusquedaParaconsignacion(strNombreCampoBusqueda){//idActual
		imagen_consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_consignacion","consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_consignacion_control) {
	
		jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id").val(imagen_consignacion_control.imagen_consignacionActual.id);
		jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-version_row").val(imagen_consignacion_control.imagen_consignacionActual.versionRow);
		
		if(imagen_consignacion_control.imagen_consignacionActual.id_consignacion!=null && imagen_consignacion_control.imagen_consignacionActual.id_consignacion>-1){
			if(jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").val() != imagen_consignacion_control.imagen_consignacionActual.id_consignacion) {
				jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").val(imagen_consignacion_control.imagen_consignacionActual.id_consignacion).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").select2("val", null);
			if(jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-imagen").val(imagen_consignacion_control.imagen_consignacionActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_consignacion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_consignacion","estimados","","form_imagen_consignacion",formulario,"","",paraEventoTabla,idFilaTabla,imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
	}
	
	cargarCombosFK(imagen_consignacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_consignacion",imagen_consignacion_control.strRecargarFkTipos,",")) { 
				imagen_consignacion_webcontrol1.cargarCombosconsignacionsFK(imagen_consignacion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_consignacion_control.strRecargarFkTiposNinguno!=null && imagen_consignacion_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_consignacion_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_consignacion",imagen_consignacion_control.strRecargarFkTiposNinguno,",")) { 
					imagen_consignacion_webcontrol1.cargarCombosconsignacionsFK(imagen_consignacion_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(imagen_consignacion_control) {
		jQuery("#spanstrMensajeid").text(imagen_consignacion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_consignacion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_consignacion").text(imagen_consignacion_control.strMensajeid_consignacion);		
		jQuery("#spanstrMensajeimagen").text(imagen_consignacion_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_consignacion_control) {
		jQuery("#tdbtnNuevoimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_consignacion").css("display",imagen_consignacion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_consignacion").css("display",imagen_consignacion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_consignacion").css("display",imagen_consignacion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_consignacion").css("display",imagen_consignacion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaconsignacionFK(imagen_consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_consignacion_funcion1,imagen_consignacion_control.consignacionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(imagen_consignacion_control) {
		var i=0;
		
		i=imagen_consignacion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_consignacion_control.imagen_consignacionActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_consignacion_control.imagen_consignacionActual.versionRow);
		
		if(imagen_consignacion_control.imagen_consignacionActual.id_consignacion!=null && imagen_consignacion_control.imagen_consignacionActual.id_consignacion>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != imagen_consignacion_control.imagen_consignacionActual.id_consignacion) {
				jQuery("#t-cel_"+i+"_2").val(imagen_consignacion_control.imagen_consignacionActual.id_consignacion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(imagen_consignacion_control.imagen_consignacionActual.imagen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_consignacion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_consignacion_control) {
		imagen_consignacion_funcion1.registrarControlesTableValidacionEdition(imagen_consignacion_control,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacionConstante,strParametros);
		
		//imagen_consignacion_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosconsignacionsFK(imagen_consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion",imagen_consignacion_control.consignacionsFK);

		if(imagen_consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_consignacion_control.idFilaTablaActual+"_2",imagen_consignacion_control.consignacionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_consignacion_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion",imagen_consignacion_control.consignacionsFK);

	};

	
	
	registrarComboActionChangeCombosconsignacionsFK(imagen_consignacion_control) {

	};

	
	
	setDefectoValorCombosconsignacionsFK(imagen_consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_consignacion_control.idconsignacionDefaultFK>-1 && jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").val() != imagen_consignacion_control.idconsignacionDefaultFK) {
				jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").val(imagen_consignacion_control.idconsignacionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_consignacion_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion").val(imagen_consignacion_control.idconsignacionDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_consignacion_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_consignacion_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_consignacion_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_consignacion",imagen_consignacion_control.strRecargarFkTipos,",")) { 
				imagen_consignacion_webcontrol1.setDefectoValorCombosconsignacionsFK(imagen_consignacion_control);
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
	onLoadCombosEventosFK(imagen_consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_consignacion",imagen_consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_consignacion_webcontrol1.registrarComboActionChangeCombosconsignacionsFK(imagen_consignacion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_consignacion");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_consignacion");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_consignacion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);			
			
			if(imagen_consignacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,"imagen_consignacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("consignacion","id_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion_img_busqueda").click(function(){
				imagen_consignacion_webcontrol1.abrirBusquedaParaconsignacion("id_consignacion");
				//alert(jQuery('#form-id_consignacion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_consignacion","FK_Idconsignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			imagen_consignacion_funcion1.validarFormularioJQuery(imagen_consignacion_constante1);
			
			if(imagen_consignacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_consignacion_control) {
		
		jQuery("#divBusquedaimagen_consignacionAjaxWebPart").css("display",imagen_consignacion_control.strPermisoBusqueda);
		jQuery("#trimagen_consignacionCabeceraBusquedas").css("display",imagen_consignacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_consignacion").css("display",imagen_consignacion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_consignacion").css("display",imagen_consignacion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_consignacion").attr("style",imagen_consignacion_control.strPermisoMostrarTodos);
		
		if(imagen_consignacion_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_consignacionNuevo").css("display",imagen_consignacion_control.strPermisoNuevo);
			jQuery("#tdimagen_consignacionNuevoToolBar").css("display",imagen_consignacion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_consignacionDuplicar").css("display",imagen_consignacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_consignacionDuplicarToolBar").css("display",imagen_consignacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_consignacionNuevoGuardarCambios").css("display",imagen_consignacion_control.strPermisoNuevo);
			jQuery("#tdimagen_consignacionNuevoGuardarCambiosToolBar").css("display",imagen_consignacion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_consignacion_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_consignacionActualizarToolBar").css("display",imagen_consignacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_consignacionCopiar").css("display",imagen_consignacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_consignacionCopiarToolBar").css("display",imagen_consignacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_consignacionConEditar").css("display",imagen_consignacion_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_consignacionEliminarToolBar").css("display",imagen_consignacion_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdimagen_consignacionGuardarCambios").css("display",imagen_consignacion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_consignacionGuardarCambiosToolBar").css("display",imagen_consignacion_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trimagen_consignacionElementos").css("display",imagen_consignacion_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_consignacionAcciones").css("display",imagen_consignacion_control.strVisibleTablaAcciones);
		jQuery("#trimagen_consignacionParametrosAcciones").css("display",imagen_consignacion_control.strVisibleTablaAcciones);
			
		jQuery("#tdimagen_consignacionCerrarPagina").css("display",imagen_consignacion_control.strPermisoPopup);		
		jQuery("#tdimagen_consignacionCerrarPaginaToolBar").css("display",imagen_consignacion_control.strPermisoPopup);
		//jQuery("#trimagen_consignacionAccionesRelaciones").css("display",imagen_consignacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_consignacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_consignacion_webcontrol1.registrarEventosControles();
		
		if(imagen_consignacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_consignacion_constante1.STR_ES_RELACIONADO=="false") {
			imagen_consignacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_consignacion_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_consignacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_consignacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(imagen_consignacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_consignacion_webcontrol1.onLoad();
				
			} else {
				if(imagen_consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
					if(imagen_consignacion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
						//imagen_consignacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(imagen_consignacion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_consignacion_constante1.BIG_ID_ACTUAL,"imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
						//imagen_consignacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			imagen_consignacion_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var imagen_consignacion_webcontrol1=new imagen_consignacion_webcontrol();

if(imagen_consignacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_consignacion_webcontrol1.onLoadWindow; 
}

//</script>