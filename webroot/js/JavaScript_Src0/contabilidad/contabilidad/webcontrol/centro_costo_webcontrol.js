//<script type="text/javascript" language="javascript">



//var centro_costoJQueryPaginaWebInteraccion= function (centro_costo_control) {
//this.,this.,this.

class centro_costo_webcontrol extends centro_costo_webcontrol_add {
	
	centro_costo_control=null;
	centro_costo_controlInicial=null;
	centro_costo_controlAuxiliar=null;
		
	//if(centro_costo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(centro_costo_control) {
		super();
		
		this.centro_costo_control=centro_costo_control;
	}
		
	actualizarVariablesPagina(centro_costo_control) {
		
		if(centro_costo_control.action=="index" || centro_costo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(centro_costo_control);
			
		} else if(centro_costo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(centro_costo_control);
		
		} else if(centro_costo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(centro_costo_control);
		
		} else if(centro_costo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(centro_costo_control);
		
		} else if(centro_costo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(centro_costo_control);
			
		} else if(centro_costo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(centro_costo_control);
			
		} else if(centro_costo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(centro_costo_control);
		
		} else if(centro_costo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(centro_costo_control);
		
		} else if(centro_costo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(centro_costo_control);
		
		} else if(centro_costo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(centro_costo_control);
		
		} else if(centro_costo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(centro_costo_control);
		
		} else if(centro_costo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(centro_costo_control);
		
		} else if(centro_costo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(centro_costo_control);
		
		} else if(centro_costo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(centro_costo_control);
		
		} else if(centro_costo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(centro_costo_control);
		
		} else if(centro_costo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(centro_costo_control);
		
		} else if(centro_costo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(centro_costo_control);
		
		} else if(centro_costo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(centro_costo_control);
		
		} else if(centro_costo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(centro_costo_control);
		
		} else if(centro_costo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(centro_costo_control);
		
		} else if(centro_costo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(centro_costo_control);
		
		} else if(centro_costo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(centro_costo_control);
		
		} else if(centro_costo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(centro_costo_control);
		
		} else if(centro_costo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(centro_costo_control);
		
		} else if(centro_costo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(centro_costo_control);
		
		} else if(centro_costo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(centro_costo_control);
		
		} else if(centro_costo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(centro_costo_control);
		
		} else if(centro_costo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(centro_costo_control);		
		
		} else if(centro_costo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(centro_costo_control);		
		
		} else if(centro_costo_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(centro_costo_control);		
		
		} else if(centro_costo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(centro_costo_control);		
		}
		else if(centro_costo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(centro_costo_control);		
		}
		else if(centro_costo_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(centro_costo_control);		
		}
		else if(centro_costo_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(centro_costo_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(centro_costo_control.action + " Revisar Manejo");
			
			if(centro_costo_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(centro_costo_control);
				
				return;
			}
			
			//if(centro_costo_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(centro_costo_control);
			//}
			
			if(centro_costo_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(centro_costo_control);
			}
			
			if(centro_costo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && centro_costo_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(centro_costo_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(centro_costo_control, false);			
			}
			
			if(centro_costo_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(centro_costo_control);	
			}
			
			if(centro_costo_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(centro_costo_control);
			}
			
			if(centro_costo_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(centro_costo_control);
			}
			
			if(centro_costo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(centro_costo_control);
			}
			
			if(centro_costo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(centro_costo_control);	
			}
			
			if(centro_costo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(centro_costo_control);
			}
			
			if(centro_costo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(centro_costo_control);
			}
			
			
			if(centro_costo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(centro_costo_control);			
			}
			
			if(centro_costo_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(centro_costo_control);
			}
			
			
			if(centro_costo_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(centro_costo_control);
			}
			
			if(centro_costo_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(centro_costo_control);
			}				
			
			if(centro_costo_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(centro_costo_control);
			}
			
			if(centro_costo_control.usuarioActual!=null && centro_costo_control.usuarioActual.field_strUserName!=null &&
			centro_costo_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(centro_costo_control);			
			}
		}
		
		
		if(centro_costo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(centro_costo_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(centro_costo_control) {
		
		this.actualizarPaginaCargaGeneral(centro_costo_control);
		this.actualizarPaginaTablaDatos(centro_costo_control);
		this.actualizarPaginaCargaGeneralControles(centro_costo_control);
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(centro_costo_control);
		this.actualizarPaginaAreaBusquedas(centro_costo_control);
		this.actualizarPaginaCargaCombosFK(centro_costo_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(centro_costo_control) {
		
		this.actualizarPaginaCargaGeneral(centro_costo_control);
		this.actualizarPaginaTablaDatos(centro_costo_control);
		this.actualizarPaginaCargaGeneralControles(centro_costo_control);
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(centro_costo_control);
		this.actualizarPaginaAreaBusquedas(centro_costo_control);
		this.actualizarPaginaCargaCombosFK(centro_costo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(centro_costo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(centro_costo_control);		
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(centro_costo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(centro_costo_control);		
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(centro_costo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(centro_costo_control);		
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(centro_costo_control) {
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(centro_costo_control) {
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(centro_costo_control) {
		this.actualizarPaginaCargaGeneralControles(centro_costo_control);
		this.actualizarPaginaCargaCombosFK(centro_costo_control);
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(centro_costo_control) {
		this.actualizarPaginaAbrirLink(centro_costo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);				
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);
		this.actualizarPaginaFormulario(centro_costo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);
		this.actualizarPaginaFormulario(centro_costo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(centro_costo_control) {
		this.actualizarPaginaFormulario(centro_costo_control);
		this.onLoadCombosDefectoFK(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);
		this.actualizarPaginaFormulario(centro_costo_control);
		this.onLoadCombosDefectoFK(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(centro_costo_control) {
		this.actualizarPaginaCargaGeneralControles(centro_costo_control);
		this.actualizarPaginaCargaCombosFK(centro_costo_control);
		this.actualizarPaginaFormulario(centro_costo_control);
		this.onLoadCombosDefectoFK(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(centro_costo_control) {
		this.actualizarPaginaAbrirLink(centro_costo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(centro_costo_control) {
		this.actualizarPaginaImprimir(centro_costo_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(centro_costo_control) {
		this.actualizarPaginaImprimir(centro_costo_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(centro_costo_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(centro_costo_control) {
		//FORMULARIO
		if(centro_costo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(centro_costo_control);
			this.actualizarPaginaFormularioAdd(centro_costo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		//COMBOS FK
		if(centro_costo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(centro_costo_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(centro_costo_control) {
		//FORMULARIO
		if(centro_costo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(centro_costo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);	
		//COMBOS FK
		if(centro_costo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(centro_costo_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);
		this.actualizarPaginaFormulario(centro_costo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(centro_costo_control) {
		//FORMULARIO
		if(centro_costo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(centro_costo_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(centro_costo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);	
		//COMBOS FK
		if(centro_costo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(centro_costo_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(centro_costo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(centro_costo_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(centro_costo_control) {
		if(centro_costo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && centro_costo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(centro_costo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(centro_costo_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(centro_costo_control) {
		if(centro_costo_funcion1.esPaginaForm()==true) {
			window.opener.centro_costo_webcontrol1.actualizarPaginaTablaDatos(centro_costo_control);
		} else {
			this.actualizarPaginaTablaDatos(centro_costo_control);
		}
	}
	
	actualizarPaginaAbrirLink(centro_costo_control) {
		centro_costo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(centro_costo_control.strAuxiliarUrlPagina);
				
		centro_costo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(centro_costo_control.strAuxiliarTipo,centro_costo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(centro_costo_control) {
		centro_costo_funcion1.resaltarRestaurarDivMensaje(true,centro_costo_control.strAuxiliarMensajeAlert,centro_costo_control.strAuxiliarCssMensaje);
			
		if(centro_costo_funcion1.esPaginaForm()==true) {
			window.opener.centro_costo_funcion1.resaltarRestaurarDivMensaje(true,centro_costo_control.strAuxiliarMensajeAlert,centro_costo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(centro_costo_control) {
		eval(centro_costo_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(centro_costo_control, mostrar) {
		
		if(mostrar==true) {
			centro_costo_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				centro_costo_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			centro_costo_funcion1.mostrarDivMensaje(true,centro_costo_control.strAuxiliarMensaje,centro_costo_control.strAuxiliarCssMensaje);
		
		} else {
			centro_costo_funcion1.mostrarDivMensaje(false,centro_costo_control.strAuxiliarMensaje,centro_costo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(centro_costo_control) {
	
		funcionGeneral.printWebPartPage("centro_costo",centro_costo_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcentro_costosAjaxWebPart").html(centro_costo_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("centro_costo",jQuery("#divTablaDatosReporteAuxiliarcentro_costosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(centro_costo_control) {
		this.centro_costo_controlInicial=centro_costo_control;
			
		if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(centro_costo_control.strStyleDivArbol,centro_costo_control.strStyleDivContent
																,centro_costo_control.strStyleDivOpcionesBanner,centro_costo_control.strStyleDivExpandirColapsar
																,centro_costo_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=centro_costo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",centro_costo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(centro_costo_control) {
		jQuery("#divTablaDatoscentro_costosAjaxWebPart").html(centro_costo_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscentro_costos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscentro_costos=jQuery("#tblTablaDatoscentro_costos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("centro_costo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',centro_costo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			centro_costo_webcontrol1.registrarControlesTableEdition(centro_costo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		centro_costo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(centro_costo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(centro_costo_control.centro_costoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(centro_costo_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(centro_costo_control) {
		this.actualizarCssBotonesPagina(centro_costo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(centro_costo_control.tiposReportes,centro_costo_control.tiposReporte
															 	,centro_costo_control.tiposPaginacion,centro_costo_control.tiposAcciones
																,centro_costo_control.tiposColumnasSelect,centro_costo_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(centro_costo_control.tiposRelaciones,centro_costo_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(centro_costo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(centro_costo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(centro_costo_control);			
	}
	
	actualizarPaginaAreaBusquedas(centro_costo_control) {
		jQuery("#divBusquedacentro_costoAjaxWebPart").css("display",centro_costo_control.strPermisoBusqueda);
		jQuery("#trcentro_costoCabeceraBusquedas").css("display",centro_costo_control.strPermisoBusqueda);
		jQuery("#trBusquedacentro_costo").css("display",centro_costo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(centro_costo_control.htmlTablaOrderBy!=null
			&& centro_costo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycentro_costoAjaxWebPart").html(centro_costo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//centro_costo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(centro_costo_control.htmlTablaOrderByRel!=null
			&& centro_costo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcentro_costoAjaxWebPart").html(centro_costo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(centro_costo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacentro_costoAjaxWebPart").css("display","none");
			jQuery("#trcentro_costoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacentro_costo").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(centro_costo_control) {
		jQuery("#tdcentro_costoNuevo").css("display",centro_costo_control.strPermisoNuevo);
		jQuery("#trcentro_costoElementos").css("display",centro_costo_control.strVisibleTablaElementos);
		jQuery("#trcentro_costoAcciones").css("display",centro_costo_control.strVisibleTablaAcciones);
		jQuery("#trcentro_costoParametrosAcciones").css("display",centro_costo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(centro_costo_control) {
	
		this.actualizarCssBotonesMantenimiento(centro_costo_control);
				
		if(centro_costo_control.centro_costoActual!=null) {//form
			
			this.actualizarCamposFormulario(centro_costo_control);			
		}
						
		this.actualizarSpanMensajesCampos(centro_costo_control);
	}
	
	actualizarPaginaUsuarioInvitado(centro_costo_control) {
	
		var indexPosition=centro_costo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=centro_costo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(centro_costo_control) {
		jQuery("#divResumencentro_costoActualAjaxWebPart").html(centro_costo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(centro_costo_control) {
		jQuery("#divAccionesRelacionescentro_costoAjaxWebPart").html(centro_costo_control.htmlTablaAccionesRelaciones);
			
		centro_costo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(centro_costo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(centro_costo_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(centro_costo_control) {
		
		if(centro_costo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+centro_costo_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",centro_costo_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+centro_costo_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",centro_costo_control.strVisibleFK_Idempresa);
		}

		if(centro_costo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+centro_costo_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",centro_costo_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+centro_costo_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",centro_costo_control.strVisibleFK_Idsucursal);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncentro_costo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("centro_costo",id,"contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		centro_costo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("centro_costo","empresa","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		centro_costo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("centro_costo","sucursal","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(centro_costo_control) {
	
		jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id").val(centro_costo_control.centro_costoActual.id);
		jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-version_row").val(centro_costo_control.centro_costoActual.versionRow);
		
		if(centro_costo_control.centro_costoActual.id_empresa!=null && centro_costo_control.centro_costoActual.id_empresa>-1){
			if(jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val() != centro_costo_control.centro_costoActual.id_empresa) {
				jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val(centro_costo_control.centro_costoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(centro_costo_control.centro_costoActual.id_sucursal!=null && centro_costo_control.centro_costoActual.id_sucursal>-1){
			if(jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_sucursal").val() != centro_costo_control.centro_costoActual.id_sucursal) {
				jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_sucursal").val(centro_costo_control.centro_costoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-codigo").val(centro_costo_control.centro_costoActual.codigo);
		jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-nombre").val(centro_costo_control.centro_costoActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+centro_costo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("centro_costo","contabilidad","","form_centro_costo",formulario,"","",paraEventoTabla,idFilaTabla,centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
	}
	
	cargarCombosFK(centro_costo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(centro_costo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",centro_costo_control.strRecargarFkTipos,",")) { 
				centro_costo_webcontrol1.cargarCombosempresasFK(centro_costo_control);
			}

			if(centro_costo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",centro_costo_control.strRecargarFkTipos,",")) { 
				centro_costo_webcontrol1.cargarCombossucursalsFK(centro_costo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(centro_costo_control.strRecargarFkTiposNinguno!=null && centro_costo_control.strRecargarFkTiposNinguno!='NINGUNO' && centro_costo_control.strRecargarFkTiposNinguno!='') {
			
				if(centro_costo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",centro_costo_control.strRecargarFkTiposNinguno,",")) { 
					centro_costo_webcontrol1.cargarCombosempresasFK(centro_costo_control);
				}

				if(centro_costo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",centro_costo_control.strRecargarFkTiposNinguno,",")) { 
					centro_costo_webcontrol1.cargarCombossucursalsFK(centro_costo_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(centro_costo_control) {
		jQuery("#spanstrMensajeid").text(centro_costo_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(centro_costo_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(centro_costo_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(centro_costo_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajecodigo").text(centro_costo_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(centro_costo_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(centro_costo_control) {
		jQuery("#tdbtnNuevocentro_costo").css("visibility",centro_costo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocentro_costo").css("display",centro_costo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcentro_costo").css("visibility",centro_costo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcentro_costo").css("display",centro_costo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcentro_costo").css("visibility",centro_costo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcentro_costo").css("display",centro_costo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcentro_costo").css("visibility",centro_costo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscentro_costo").css("visibility",centro_costo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscentro_costo").css("display",centro_costo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcentro_costo").css("visibility",centro_costo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcentro_costo").css("visibility",centro_costo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcentro_costo").css("visibility",centro_costo_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionasiento_automatico").click(function(){

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		});
		jQuery("#imgdivrelacionasiento_automatico_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		});
		jQuery("#imgdivrelacionasiento").click(function(){

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasientos(idActual);
		});
		jQuery("#imgdivrelacionasiento_predefinido").click(function(){

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(centro_costo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,centro_costo_funcion1,centro_costo_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(centro_costo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,centro_costo_funcion1,centro_costo_control.sucursalsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(centro_costo_control) {
		var i=0;
		
		i=centro_costo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(centro_costo_control.centro_costoActual.id);
		jQuery("#t-version_row_"+i+"").val(centro_costo_control.centro_costoActual.versionRow);
		
		if(centro_costo_control.centro_costoActual.id_empresa!=null && centro_costo_control.centro_costoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != centro_costo_control.centro_costoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(centro_costo_control.centro_costoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(centro_costo_control.centro_costoActual.id_sucursal!=null && centro_costo_control.centro_costoActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != centro_costo_control.centro_costoActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(centro_costo_control.centro_costoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(centro_costo_control.centro_costoActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(centro_costo_control.centro_costoActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(centro_costo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_automatico").click(function(){
		jQuery("#tblTablaDatoscentro_costos").on("click",".imgrelacionasiento_automatico", function () {

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_automatico_detalle").click(function(){
		jQuery("#tblTablaDatoscentro_costos").on("click",".imgrelacionasiento_automatico_detalle", function () {

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento").click(function(){
		jQuery("#tblTablaDatoscentro_costos").on("click",".imgrelacionasiento", function () {

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasientos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_predefinido").click(function(){
		jQuery("#tblTablaDatoscentro_costos").on("click",".imgrelacionasiento_predefinido", function () {

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});				
	}
		
	

	registrarSesionParaasiento_automaticos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"centro_costo","asiento_automatico","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,"s","");
	}

	registrarSesionParaasiento_automatico_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"centro_costo","asiento_automatico_detalle","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,"s","");
	}

	registrarSesionParaasientos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"centro_costo","asiento","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,"s","");
	}

	registrarSesionParaasiento_predefinidos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"centro_costo","asiento_predefinido","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(centro_costo_control) {
		centro_costo_funcion1.registrarControlesTableValidacionEdition(centro_costo_control,centro_costo_webcontrol1,centro_costo_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costoConstante,strParametros);
		
		//centro_costo_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(centro_costo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa",centro_costo_control.empresasFK);

		if(centro_costo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+centro_costo_control.idFilaTablaActual+"_2",centro_costo_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(centro_costo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+centro_costo_constante1.STR_SUFIJO+"-id_sucursal",centro_costo_control.sucursalsFK);

		if(centro_costo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+centro_costo_control.idFilaTablaActual+"_3",centro_costo_control.sucursalsFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(centro_costo_control) {

	};

	registrarComboActionChangeCombossucursalsFK(centro_costo_control) {

	};

	
	
	setDefectoValorCombosempresasFK(centro_costo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(centro_costo_control.idempresaDefaultFK>-1 && jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val() != centro_costo_control.idempresaDefaultFK) {
				jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val(centro_costo_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(centro_costo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(centro_costo_control.idsucursalDefaultFK>-1 && jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_sucursal").val() != centro_costo_control.idsucursalDefaultFK) {
				jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_sucursal").val(centro_costo_control.idsucursalDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//centro_costo_control
		
	
	}
	
	onLoadCombosDefectoFK(centro_costo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(centro_costo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(centro_costo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",centro_costo_control.strRecargarFkTipos,",")) { 
				centro_costo_webcontrol1.setDefectoValorCombosempresasFK(centro_costo_control);
			}

			if(centro_costo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",centro_costo_control.strRecargarFkTipos,",")) { 
				centro_costo_webcontrol1.setDefectoValorCombossucursalsFK(centro_costo_control);
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
	onLoadCombosEventosFK(centro_costo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(centro_costo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(centro_costo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",centro_costo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				centro_costo_webcontrol1.registrarComboActionChangeCombosempresasFK(centro_costo_control);
			//}

			//if(centro_costo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",centro_costo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				centro_costo_webcontrol1.registrarComboActionChangeCombossucursalsFK(centro_costo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(centro_costo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(centro_costo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(centro_costo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("centro_costo");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("centro_costo");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(centro_costo_funcion1,centro_costo_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(centro_costo_funcion1,centro_costo_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(centro_costo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);			
			
			if(centro_costo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,"centro_costo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				centro_costo_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				centro_costo_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("centro_costo","FK_Idempresa","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("centro_costo","FK_Idsucursal","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("centro_costo");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			centro_costo_funcion1.validarFormularioJQuery(centro_costo_constante1);
			
			if(centro_costo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(centro_costo_control) {
		
		jQuery("#divBusquedacentro_costoAjaxWebPart").css("display",centro_costo_control.strPermisoBusqueda);
		jQuery("#trcentro_costoCabeceraBusquedas").css("display",centro_costo_control.strPermisoBusqueda);
		jQuery("#trBusquedacentro_costo").css("display",centro_costo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecentro_costo").css("display",centro_costo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscentro_costo").attr("style",centro_costo_control.strPermisoMostrarTodos);
		
		if(centro_costo_control.strPermisoNuevo!=null) {
			jQuery("#tdcentro_costoNuevo").css("display",centro_costo_control.strPermisoNuevo);
			jQuery("#tdcentro_costoNuevoToolBar").css("display",centro_costo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcentro_costoDuplicar").css("display",centro_costo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcentro_costoDuplicarToolBar").css("display",centro_costo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcentro_costoNuevoGuardarCambios").css("display",centro_costo_control.strPermisoNuevo);
			jQuery("#tdcentro_costoNuevoGuardarCambiosToolBar").css("display",centro_costo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(centro_costo_control.strPermisoActualizar!=null) {
			jQuery("#tdcentro_costoActualizarToolBar").css("display",centro_costo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcentro_costoCopiar").css("display",centro_costo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcentro_costoCopiarToolBar").css("display",centro_costo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcentro_costoConEditar").css("display",centro_costo_control.strPermisoActualizar);
		}
		
		jQuery("#tdcentro_costoEliminarToolBar").css("display",centro_costo_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcentro_costoGuardarCambios").css("display",centro_costo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcentro_costoGuardarCambiosToolBar").css("display",centro_costo_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcentro_costoElementos").css("display",centro_costo_control.strVisibleTablaElementos);
		
		jQuery("#trcentro_costoAcciones").css("display",centro_costo_control.strVisibleTablaAcciones);
		jQuery("#trcentro_costoParametrosAcciones").css("display",centro_costo_control.strVisibleTablaAcciones);
			
		jQuery("#tdcentro_costoCerrarPagina").css("display",centro_costo_control.strPermisoPopup);		
		jQuery("#tdcentro_costoCerrarPaginaToolBar").css("display",centro_costo_control.strPermisoPopup);
		//jQuery("#trcentro_costoAccionesRelaciones").css("display",centro_costo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		centro_costo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		centro_costo_webcontrol1.registrarEventosControles();
		
		if(centro_costo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
			centro_costo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(centro_costo_constante1.STR_ES_RELACIONES=="true") {
			if(centro_costo_constante1.BIT_ES_PAGINA_FORM==true) {
				centro_costo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(centro_costo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(centro_costo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				centro_costo_webcontrol1.onLoad();
				
			} else {
				if(centro_costo_constante1.BIT_ES_PAGINA_FORM==true) {
					if(centro_costo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
						//centro_costo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(centro_costo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(centro_costo_constante1.BIG_ID_ACTUAL,"centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
						//centro_costo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			centro_costo_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var centro_costo_webcontrol1=new centro_costo_webcontrol();

if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = centro_costo_webcontrol1.onLoadWindow; 
}

//</script>