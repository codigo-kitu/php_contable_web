//<script type="text/javascript" language="javascript">



//var auditoriaJQueryPaginaWebInteraccion= function (auditoria_control) {
//this.,this.,this.

class auditoria_webcontrol extends auditoria_webcontrol_add {
	
	auditoria_control=null;
	auditoria_controlInicial=null;
	auditoria_controlAuxiliar=null;
		
	//if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(auditoria_control) {
		super();
		
		this.auditoria_control=auditoria_control;
	}
		
	actualizarVariablesPagina(auditoria_control) {
		
		if(auditoria_control.action=="index" || auditoria_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(auditoria_control);
			
		} else if(auditoria_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(auditoria_control);
		
		} else if(auditoria_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(auditoria_control);
		
		} else if(auditoria_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(auditoria_control);
		
		} else if(auditoria_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(auditoria_control);
			
		} else if(auditoria_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(auditoria_control);
			
		} else if(auditoria_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(auditoria_control);
		
		} else if(auditoria_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(auditoria_control);
		
		} else if(auditoria_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(auditoria_control);
		
		} else if(auditoria_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(auditoria_control);
		
		} else if(auditoria_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(auditoria_control);
		
		} else if(auditoria_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(auditoria_control);
		
		} else if(auditoria_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(auditoria_control);
		
		} else if(auditoria_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(auditoria_control);
		
		} else if(auditoria_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(auditoria_control);
		
		} else if(auditoria_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(auditoria_control);
		
		} else if(auditoria_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(auditoria_control);
		
		} else if(auditoria_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(auditoria_control);
		
		} else if(auditoria_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(auditoria_control);
		
		} else if(auditoria_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(auditoria_control);
		
		} else if(auditoria_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(auditoria_control);
		
		} else if(auditoria_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(auditoria_control);
		
		} else if(auditoria_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(auditoria_control);
		
		} else if(auditoria_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(auditoria_control);
		
		} else if(auditoria_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(auditoria_control);
		
		} else if(auditoria_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(auditoria_control);
		
		} else if(auditoria_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(auditoria_control);
		
		} else if(auditoria_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(auditoria_control);		
		
		} else if(auditoria_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(auditoria_control);		
		
		} else if(auditoria_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(auditoria_control);		
		
		} else if(auditoria_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(auditoria_control);		
		}
		else if(auditoria_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(auditoria_control);		
		}
		else if(auditoria_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(auditoria_control);		
		}
		else if(auditoria_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(auditoria_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(auditoria_control.action + " Revisar Manejo");
			
			if(auditoria_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(auditoria_control);
				
				return;
			}
			
			//if(auditoria_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(auditoria_control);
			//}
			
			if(auditoria_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(auditoria_control);
			}
			
			if(auditoria_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && auditoria_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(auditoria_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(auditoria_control, false);			
			}
			
			if(auditoria_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(auditoria_control);	
			}
			
			if(auditoria_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(auditoria_control);
			}
			
			if(auditoria_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(auditoria_control);
			}
			
			if(auditoria_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(auditoria_control);
			}
			
			if(auditoria_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(auditoria_control);	
			}
			
			if(auditoria_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(auditoria_control);
			}
			
			if(auditoria_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(auditoria_control);
			}
			
			
			if(auditoria_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(auditoria_control);			
			}
			
			if(auditoria_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(auditoria_control);
			}
			
			
			if(auditoria_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(auditoria_control);
			}
			
			if(auditoria_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(auditoria_control);
			}				
			
			if(auditoria_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(auditoria_control);
			}
			
			if(auditoria_control.usuarioActual!=null && auditoria_control.usuarioActual.field_strUserName!=null &&
			auditoria_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(auditoria_control);			
			}
		}
		
		
		if(auditoria_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(auditoria_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(auditoria_control) {
		
		this.actualizarPaginaCargaGeneral(auditoria_control);
		this.actualizarPaginaTablaDatos(auditoria_control);
		this.actualizarPaginaCargaGeneralControles(auditoria_control);
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(auditoria_control);
		this.actualizarPaginaAreaBusquedas(auditoria_control);
		this.actualizarPaginaCargaCombosFK(auditoria_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(auditoria_control) {
		
		this.actualizarPaginaCargaGeneral(auditoria_control);
		this.actualizarPaginaTablaDatos(auditoria_control);
		this.actualizarPaginaCargaGeneralControles(auditoria_control);
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(auditoria_control);
		this.actualizarPaginaAreaBusquedas(auditoria_control);
		this.actualizarPaginaCargaCombosFK(auditoria_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(auditoria_control) {
		this.actualizarPaginaTablaDatosAuxiliar(auditoria_control);		
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(auditoria_control) {
		this.actualizarPaginaTablaDatosAuxiliar(auditoria_control);		
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(auditoria_control) {
		this.actualizarPaginaTablaDatosAuxiliar(auditoria_control);		
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(auditoria_control) {
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(auditoria_control) {
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(auditoria_control) {
		this.actualizarPaginaCargaGeneralControles(auditoria_control);
		this.actualizarPaginaCargaCombosFK(auditoria_control);
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(auditoria_control) {
		this.actualizarPaginaAbrirLink(auditoria_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);				
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);
		this.actualizarPaginaFormulario(auditoria_control);
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);
		this.actualizarPaginaFormulario(auditoria_control);
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(auditoria_control) {
		this.actualizarPaginaFormulario(auditoria_control);
		this.onLoadCombosDefectoFK(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);
		this.actualizarPaginaFormulario(auditoria_control);
		this.onLoadCombosDefectoFK(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(auditoria_control) {
		this.actualizarPaginaCargaGeneralControles(auditoria_control);
		this.actualizarPaginaCargaCombosFK(auditoria_control);
		this.actualizarPaginaFormulario(auditoria_control);
		this.onLoadCombosDefectoFK(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(auditoria_control) {
		this.actualizarPaginaAbrirLink(auditoria_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(auditoria_control) {
		this.actualizarPaginaImprimir(auditoria_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(auditoria_control) {
		this.actualizarPaginaImprimir(auditoria_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(auditoria_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(auditoria_control) {
		//FORMULARIO
		if(auditoria_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(auditoria_control);
			this.actualizarPaginaFormularioAdd(auditoria_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		//COMBOS FK
		if(auditoria_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(auditoria_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(auditoria_control) {
		//FORMULARIO
		if(auditoria_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(auditoria_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);	
		//COMBOS FK
		if(auditoria_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(auditoria_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);
		this.actualizarPaginaFormulario(auditoria_control);
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(auditoria_control) {
		//FORMULARIO
		if(auditoria_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(auditoria_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(auditoria_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);	
		//COMBOS FK
		if(auditoria_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(auditoria_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(auditoria_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(auditoria_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(auditoria_control) {
		if(auditoria_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && auditoria_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(auditoria_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(auditoria_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(auditoria_control) {
		if(auditoria_funcion1.esPaginaForm()==true) {
			window.opener.auditoria_webcontrol1.actualizarPaginaTablaDatos(auditoria_control);
		} else {
			this.actualizarPaginaTablaDatos(auditoria_control);
		}
	}
	
	actualizarPaginaAbrirLink(auditoria_control) {
		auditoria_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(auditoria_control.strAuxiliarUrlPagina);
				
		auditoria_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(auditoria_control.strAuxiliarTipo,auditoria_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(auditoria_control) {
		auditoria_funcion1.resaltarRestaurarDivMensaje(true,auditoria_control.strAuxiliarMensajeAlert,auditoria_control.strAuxiliarCssMensaje);
			
		if(auditoria_funcion1.esPaginaForm()==true) {
			window.opener.auditoria_funcion1.resaltarRestaurarDivMensaje(true,auditoria_control.strAuxiliarMensajeAlert,auditoria_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(auditoria_control) {
		eval(auditoria_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(auditoria_control, mostrar) {
		
		if(mostrar==true) {
			auditoria_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				auditoria_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			auditoria_funcion1.mostrarDivMensaje(true,auditoria_control.strAuxiliarMensaje,auditoria_control.strAuxiliarCssMensaje);
		
		} else {
			auditoria_funcion1.mostrarDivMensaje(false,auditoria_control.strAuxiliarMensaje,auditoria_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(auditoria_control) {
	
		funcionGeneral.printWebPartPage("auditoria",auditoria_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarauditoriasAjaxWebPart").html(auditoria_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("auditoria",jQuery("#divTablaDatosReporteAuxiliarauditoriasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(auditoria_control) {
		this.auditoria_controlInicial=auditoria_control;
			
		if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(auditoria_control.strStyleDivArbol,auditoria_control.strStyleDivContent
																,auditoria_control.strStyleDivOpcionesBanner,auditoria_control.strStyleDivExpandirColapsar
																,auditoria_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=auditoria_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",auditoria_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(auditoria_control) {
		jQuery("#divTablaDatosauditoriasAjaxWebPart").html(auditoria_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosauditorias=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosauditorias=jQuery("#tblTablaDatosauditorias").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("auditoria",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',auditoria_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			auditoria_webcontrol1.registrarControlesTableEdition(auditoria_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		auditoria_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(auditoria_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(auditoria_control.auditoriaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(auditoria_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(auditoria_control) {
		this.actualizarCssBotonesPagina(auditoria_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(auditoria_control.tiposReportes,auditoria_control.tiposReporte
															 	,auditoria_control.tiposPaginacion,auditoria_control.tiposAcciones
																,auditoria_control.tiposColumnasSelect,auditoria_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(auditoria_control.tiposRelaciones,auditoria_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(auditoria_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(auditoria_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(auditoria_control);			
	}
	
	actualizarPaginaAreaBusquedas(auditoria_control) {
		jQuery("#divBusquedaauditoriaAjaxWebPart").css("display",auditoria_control.strPermisoBusqueda);
		jQuery("#trauditoriaCabeceraBusquedas").css("display",auditoria_control.strPermisoBusqueda);
		jQuery("#trBusquedaauditoria").css("display",auditoria_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(auditoria_control.htmlTablaOrderBy!=null
			&& auditoria_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByauditoriaAjaxWebPart").html(auditoria_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//auditoria_webcontrol1.registrarOrderByActions();
			
		}
			
		if(auditoria_control.htmlTablaOrderByRel!=null
			&& auditoria_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelauditoriaAjaxWebPart").html(auditoria_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(auditoria_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaauditoriaAjaxWebPart").css("display","none");
			jQuery("#trauditoriaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaauditoria").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(auditoria_control) {
		jQuery("#tdauditoriaNuevo").css("display",auditoria_control.strPermisoNuevo);
		jQuery("#trauditoriaElementos").css("display",auditoria_control.strVisibleTablaElementos);
		jQuery("#trauditoriaAcciones").css("display",auditoria_control.strVisibleTablaAcciones);
		jQuery("#trauditoriaParametrosAcciones").css("display",auditoria_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(auditoria_control) {
	
		this.actualizarCssBotonesMantenimiento(auditoria_control);
				
		if(auditoria_control.auditoriaActual!=null) {//form
			
			this.actualizarCamposFormulario(auditoria_control);			
		}
						
		this.actualizarSpanMensajesCampos(auditoria_control);
	}
	
	actualizarPaginaUsuarioInvitado(auditoria_control) {
	
		var indexPosition=auditoria_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=auditoria_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(auditoria_control) {
		jQuery("#divResumenauditoriaActualAjaxWebPart").html(auditoria_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(auditoria_control) {
		jQuery("#divAccionesRelacionesauditoriaAjaxWebPart").html(auditoria_control.htmlTablaAccionesRelaciones);
			
		auditoria_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(auditoria_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(auditoria_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(auditoria_control) {
		
		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorIdUsuarioPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorIdUsuarioPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorIdUsuarioPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorIdUsuarioPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorIPPCPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorIPPCPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorIPPCPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorIPPCPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorNombrePCPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorNombrePCPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorNombrePCPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorNombrePCPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorNombreTablaPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorNombreTablaPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorNombreTablaPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorNombreTablaPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorObservacionesPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorObservacionesPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorObservacionesPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorObservacionesPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorProcesoPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorProcesoPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorProcesoPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorProcesoPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorUsuarioPCPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorUsuarioPCPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorUsuarioPCPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorUsuarioPCPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",auditoria_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",auditoria_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionauditoria();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("auditoria",id,"seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);		
	}
	
	

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		auditoria_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("auditoria","usuario","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(auditoria_control) {
	
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id").val(auditoria_control.auditoriaActual.id);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-version_row").val(auditoria_control.auditoriaActual.versionRow);
		
		if(auditoria_control.auditoriaActual.id_usuario!=null && auditoria_control.auditoriaActual.id_usuario>-1){
			if(jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val() != auditoria_control.auditoriaActual.id_usuario) {
				jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val(auditoria_control.auditoriaActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-nombre_tabla").val(auditoria_control.auditoriaActual.nombre_tabla);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_fila").val(auditoria_control.auditoriaActual.id_fila);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-accion").val(auditoria_control.auditoriaActual.accion);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-proceso").val(auditoria_control.auditoriaActual.proceso);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-nombre_pc").val(auditoria_control.auditoriaActual.nombre_pc);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-ip_pc").val(auditoria_control.auditoriaActual.ip_pc);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-usuario_pc").val(auditoria_control.auditoriaActual.usuario_pc);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-fecha_hora").val(auditoria_control.auditoriaActual.fecha_hora);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-observacion").val(auditoria_control.auditoriaActual.observacion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+auditoria_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("auditoria","seguridad","","form_auditoria",formulario,"","",paraEventoTabla,idFilaTabla,auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
	}
	
	cargarCombosFK(auditoria_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(auditoria_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",auditoria_control.strRecargarFkTipos,",")) { 
				auditoria_webcontrol1.cargarCombosusuariosFK(auditoria_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(auditoria_control.strRecargarFkTiposNinguno!=null && auditoria_control.strRecargarFkTiposNinguno!='NINGUNO' && auditoria_control.strRecargarFkTiposNinguno!='') {
			
				if(auditoria_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",auditoria_control.strRecargarFkTiposNinguno,",")) { 
					auditoria_webcontrol1.cargarCombosusuariosFK(auditoria_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(auditoria_control) {
		jQuery("#spanstrMensajeid").text(auditoria_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(auditoria_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_usuario").text(auditoria_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenombre_tabla").text(auditoria_control.strMensajenombre_tabla);		
		jQuery("#spanstrMensajeid_fila").text(auditoria_control.strMensajeid_fila);		
		jQuery("#spanstrMensajeaccion").text(auditoria_control.strMensajeaccion);		
		jQuery("#spanstrMensajeproceso").text(auditoria_control.strMensajeproceso);		
		jQuery("#spanstrMensajenombre_pc").text(auditoria_control.strMensajenombre_pc);		
		jQuery("#spanstrMensajeip_pc").text(auditoria_control.strMensajeip_pc);		
		jQuery("#spanstrMensajeusuario_pc").text(auditoria_control.strMensajeusuario_pc);		
		jQuery("#spanstrMensajefecha_hora").text(auditoria_control.strMensajefecha_hora);		
		jQuery("#spanstrMensajeobservacion").text(auditoria_control.strMensajeobservacion);		
	}
	
	actualizarCssBotonesMantenimiento(auditoria_control) {
		jQuery("#tdbtnNuevoauditoria").css("visibility",auditoria_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoauditoria").css("display",auditoria_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarauditoria").css("visibility",auditoria_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarauditoria").css("display",auditoria_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarauditoria").css("visibility",auditoria_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarauditoria").css("display",auditoria_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarauditoria").css("visibility",auditoria_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosauditoria").css("visibility",auditoria_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosauditoria").css("display",auditoria_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarauditoria").css("visibility",auditoria_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarauditoria").css("visibility",auditoria_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarauditoria").css("visibility",auditoria_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionauditoria_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualauditoria");

			auditoria_webcontrol1.registrarSesionParaauditoria_detalles(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablausuarioFK(auditoria_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,auditoria_funcion1,auditoria_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(auditoria_control) {
		var i=0;
		
		i=auditoria_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(auditoria_control.auditoriaActual.id);
		jQuery("#t-version_row_"+i+"").val(auditoria_control.auditoriaActual.versionRow);
		
		if(auditoria_control.auditoriaActual.id_usuario!=null && auditoria_control.auditoriaActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != auditoria_control.auditoriaActual.id_usuario) {
				jQuery("#t-cel_"+i+"_2").val(auditoria_control.auditoriaActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(auditoria_control.auditoriaActual.nombre_tabla);
		jQuery("#t-cel_"+i+"_4").val(auditoria_control.auditoriaActual.id_fila);
		jQuery("#t-cel_"+i+"_5").val(auditoria_control.auditoriaActual.accion);
		jQuery("#t-cel_"+i+"_6").val(auditoria_control.auditoriaActual.proceso);
		jQuery("#t-cel_"+i+"_7").val(auditoria_control.auditoriaActual.nombre_pc);
		jQuery("#t-cel_"+i+"_8").val(auditoria_control.auditoriaActual.ip_pc);
		jQuery("#t-cel_"+i+"_9").val(auditoria_control.auditoriaActual.usuario_pc);
		jQuery("#t-cel_"+i+"_10").val(auditoria_control.auditoriaActual.fecha_hora);
		jQuery("#t-cel_"+i+"_11").val(auditoria_control.auditoriaActual.observacion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(auditoria_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionauditoria_detalle").click(function(){
		jQuery("#tblTablaDatosauditorias").on("click",".imgrelacionauditoria_detalle", function () {

			var idActual=jQuery(this).attr("idactualauditoria");

			auditoria_webcontrol1.registrarSesionParaauditoria_detalles(idActual);
		});				
	}
		
	

	registrarSesionParaauditoria_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"auditoria","auditoria_detalle","seguridad","",auditoria_funcion1,auditoria_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(auditoria_control) {
		auditoria_funcion1.registrarControlesTableValidacionEdition(auditoria_control,auditoria_webcontrol1,auditoria_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoriaConstante,strParametros);
		
		//auditoria_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosusuariosFK(auditoria_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario",auditoria_control.usuariosFK);

		if(auditoria_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+auditoria_control.idFilaTablaActual+"_2",auditoria_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosusuariosFK(auditoria_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(auditoria_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(auditoria_control.idusuarioDefaultFK>-1 && jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val() != auditoria_control.idusuarioDefaultFK) {
				jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val(auditoria_control.idusuarioDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//auditoria_control
		
	
	}
	
	onLoadCombosDefectoFK(auditoria_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(auditoria_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",auditoria_control.strRecargarFkTipos,",")) { 
				auditoria_webcontrol1.setDefectoValorCombosusuariosFK(auditoria_control);
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
	onLoadCombosEventosFK(auditoria_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(auditoria_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",auditoria_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				auditoria_webcontrol1.registrarComboActionChangeCombosusuariosFK(auditoria_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(auditoria_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("auditoria");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("auditoria");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(auditoria_funcion1,auditoria_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(auditoria_funcion1,auditoria_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(auditoria_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);			
			
			if(auditoria_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,"auditoria");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				auditoria_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorIdUsuarioPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorIPPCPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorNombrePCPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorNombreTablaPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorObservacionesPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorProcesoPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorUsuarioPCPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","FK_Idusuario","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("auditoria");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			auditoria_funcion1.validarFormularioJQuery(auditoria_constante1);
			
			if(auditoria_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(auditoria_control) {
		
		jQuery("#divBusquedaauditoriaAjaxWebPart").css("display",auditoria_control.strPermisoBusqueda);
		jQuery("#trauditoriaCabeceraBusquedas").css("display",auditoria_control.strPermisoBusqueda);
		jQuery("#trBusquedaauditoria").css("display",auditoria_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteauditoria").css("display",auditoria_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosauditoria").attr("style",auditoria_control.strPermisoMostrarTodos);
		
		if(auditoria_control.strPermisoNuevo!=null) {
			jQuery("#tdauditoriaNuevo").css("display",auditoria_control.strPermisoNuevo);
			jQuery("#tdauditoriaNuevoToolBar").css("display",auditoria_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdauditoriaDuplicar").css("display",auditoria_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdauditoriaDuplicarToolBar").css("display",auditoria_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdauditoriaNuevoGuardarCambios").css("display",auditoria_control.strPermisoNuevo);
			jQuery("#tdauditoriaNuevoGuardarCambiosToolBar").css("display",auditoria_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(auditoria_control.strPermisoActualizar!=null) {
			jQuery("#tdauditoriaActualizarToolBar").css("display",auditoria_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdauditoriaCopiar").css("display",auditoria_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdauditoriaCopiarToolBar").css("display",auditoria_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdauditoriaConEditar").css("display",auditoria_control.strPermisoActualizar);
		}
		
		jQuery("#tdauditoriaEliminarToolBar").css("display",auditoria_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdauditoriaGuardarCambios").css("display",auditoria_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdauditoriaGuardarCambiosToolBar").css("display",auditoria_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trauditoriaElementos").css("display",auditoria_control.strVisibleTablaElementos);
		
		jQuery("#trauditoriaAcciones").css("display",auditoria_control.strVisibleTablaAcciones);
		jQuery("#trauditoriaParametrosAcciones").css("display",auditoria_control.strVisibleTablaAcciones);
			
		jQuery("#tdauditoriaCerrarPagina").css("display",auditoria_control.strPermisoPopup);		
		jQuery("#tdauditoriaCerrarPaginaToolBar").css("display",auditoria_control.strPermisoPopup);
		//jQuery("#trauditoriaAccionesRelaciones").css("display",auditoria_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		auditoria_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		auditoria_webcontrol1.registrarEventosControles();
		
		if(auditoria_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
			auditoria_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(auditoria_constante1.STR_ES_RELACIONES=="true") {
			if(auditoria_constante1.BIT_ES_PAGINA_FORM==true) {
				auditoria_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(auditoria_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(auditoria_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				auditoria_webcontrol1.onLoad();
				
			} else {
				if(auditoria_constante1.BIT_ES_PAGINA_FORM==true) {
					if(auditoria_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
						//auditoria_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(auditoria_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(auditoria_constante1.BIG_ID_ACTUAL,"auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
						//auditoria_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			auditoria_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var auditoria_webcontrol1=new auditoria_webcontrol();

if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = auditoria_webcontrol1.onLoadWindow; 
}

//</script>