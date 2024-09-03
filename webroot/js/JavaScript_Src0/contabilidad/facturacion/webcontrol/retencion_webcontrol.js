//<script type="text/javascript" language="javascript">



//var retencionJQueryPaginaWebInteraccion= function (retencion_control) {
//this.,this.,this.

class retencion_webcontrol extends retencion_webcontrol_add {
	
	retencion_control=null;
	retencion_controlInicial=null;
	retencion_controlAuxiliar=null;
		
	//if(retencion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(retencion_control) {
		super();
		
		this.retencion_control=retencion_control;
	}
		
	actualizarVariablesPagina(retencion_control) {
		
		if(retencion_control.action=="index" || retencion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(retencion_control);
			
		} else if(retencion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(retencion_control);
		
		} else if(retencion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(retencion_control);
		
		} else if(retencion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(retencion_control);
		
		} else if(retencion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(retencion_control);
			
		} else if(retencion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(retencion_control);
			
		} else if(retencion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(retencion_control);
		
		} else if(retencion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(retencion_control);
		
		} else if(retencion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(retencion_control);
		
		} else if(retencion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(retencion_control);
		
		} else if(retencion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(retencion_control);
		
		} else if(retencion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(retencion_control);
		
		} else if(retencion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(retencion_control);
		
		} else if(retencion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(retencion_control);
		
		} else if(retencion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(retencion_control);
		
		} else if(retencion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(retencion_control);
		
		} else if(retencion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retencion_control);
		
		} else if(retencion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retencion_control);
		
		} else if(retencion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_control);
		
		} else if(retencion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(retencion_control);
		
		} else if(retencion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(retencion_control);
		
		} else if(retencion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(retencion_control);
		
		} else if(retencion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(retencion_control);
		
		} else if(retencion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retencion_control);
		
		} else if(retencion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retencion_control);
		
		} else if(retencion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(retencion_control);
		
		} else if(retencion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(retencion_control);
		
		} else if(retencion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retencion_control);		
		
		} else if(retencion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(retencion_control);		
		
		} else if(retencion_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(retencion_control);		
		
		} else if(retencion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_control);		
		}
		else if(retencion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_control);		
		}
		else if(retencion_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retencion_control);		
		}
		else if(retencion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(retencion_control.action + " Revisar Manejo");
			
			if(retencion_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(retencion_control);
				
				return;
			}
			
			//if(retencion_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(retencion_control);
			//}
			
			if(retencion_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(retencion_control);
			}
			
			if(retencion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retencion_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(retencion_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(retencion_control, false);			
			}
			
			if(retencion_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(retencion_control);	
			}
			
			if(retencion_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(retencion_control);
			}
			
			if(retencion_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(retencion_control);
			}
			
			if(retencion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(retencion_control);
			}
			
			if(retencion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(retencion_control);	
			}
			
			if(retencion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(retencion_control);
			}
			
			if(retencion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(retencion_control);
			}
			
			
			if(retencion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(retencion_control);			
			}
			
			if(retencion_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(retencion_control);
			}
			
			
			if(retencion_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(retencion_control);
			}
			
			if(retencion_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(retencion_control);
			}				
			
			if(retencion_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_control);
			}
			
			if(retencion_control.usuarioActual!=null && retencion_control.usuarioActual.field_strUserName!=null &&
			retencion_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(retencion_control);			
			}
		}
		
		
		if(retencion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(retencion_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(retencion_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_control);
		this.actualizarPaginaTablaDatos(retencion_control);
		this.actualizarPaginaCargaGeneralControles(retencion_control);
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_control);
		this.actualizarPaginaAreaBusquedas(retencion_control);
		this.actualizarPaginaCargaCombosFK(retencion_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(retencion_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_control);
		this.actualizarPaginaTablaDatos(retencion_control);
		this.actualizarPaginaCargaGeneralControles(retencion_control);
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_control);
		this.actualizarPaginaAreaBusquedas(retencion_control);
		this.actualizarPaginaCargaCombosFK(retencion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(retencion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_control);		
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(retencion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_control);		
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(retencion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_control);		
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(retencion_control) {
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(retencion_control) {
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retencion_control) {
		this.actualizarPaginaCargaGeneralControles(retencion_control);
		this.actualizarPaginaCargaCombosFK(retencion_control);
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retencion_control) {
		this.actualizarPaginaAbrirLink(retencion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);				
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);
		this.actualizarPaginaFormulario(retencion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);
		this.actualizarPaginaFormulario(retencion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(retencion_control) {
		this.actualizarPaginaFormulario(retencion_control);
		this.onLoadCombosDefectoFK(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);
		this.actualizarPaginaFormulario(retencion_control);
		this.onLoadCombosDefectoFK(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retencion_control) {
		this.actualizarPaginaCargaGeneralControles(retencion_control);
		this.actualizarPaginaCargaCombosFK(retencion_control);
		this.actualizarPaginaFormulario(retencion_control);
		this.onLoadCombosDefectoFK(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retencion_control) {
		this.actualizarPaginaAbrirLink(retencion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(retencion_control) {
		this.actualizarPaginaImprimir(retencion_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retencion_control) {
		this.actualizarPaginaImprimir(retencion_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(retencion_control) {
		//FORMULARIO
		if(retencion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_control);
			this.actualizarPaginaFormularioAdd(retencion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		//COMBOS FK
		if(retencion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(retencion_control) {
		//FORMULARIO
		if(retencion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);	
		//COMBOS FK
		if(retencion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);
		this.actualizarPaginaFormulario(retencion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retencion_control) {
		//FORMULARIO
		if(retencion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(retencion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);	
		//COMBOS FK
		if(retencion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(retencion_control) {
		if(retencion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retencion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(retencion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(retencion_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(retencion_control) {
		if(retencion_funcion1.esPaginaForm()==true) {
			window.opener.retencion_webcontrol1.actualizarPaginaTablaDatos(retencion_control);
		} else {
			this.actualizarPaginaTablaDatos(retencion_control);
		}
	}
	
	actualizarPaginaAbrirLink(retencion_control) {
		retencion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(retencion_control.strAuxiliarUrlPagina);
				
		retencion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(retencion_control.strAuxiliarTipo,retencion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(retencion_control) {
		retencion_funcion1.resaltarRestaurarDivMensaje(true,retencion_control.strAuxiliarMensajeAlert,retencion_control.strAuxiliarCssMensaje);
			
		if(retencion_funcion1.esPaginaForm()==true) {
			window.opener.retencion_funcion1.resaltarRestaurarDivMensaje(true,retencion_control.strAuxiliarMensajeAlert,retencion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(retencion_control) {
		eval(retencion_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(retencion_control, mostrar) {
		
		if(mostrar==true) {
			retencion_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				retencion_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			retencion_funcion1.mostrarDivMensaje(true,retencion_control.strAuxiliarMensaje,retencion_control.strAuxiliarCssMensaje);
		
		} else {
			retencion_funcion1.mostrarDivMensaje(false,retencion_control.strAuxiliarMensaje,retencion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(retencion_control) {
	
		funcionGeneral.printWebPartPage("retencion",retencion_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarretencionsAjaxWebPart").html(retencion_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("retencion",jQuery("#divTablaDatosReporteAuxiliarretencionsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(retencion_control) {
		this.retencion_controlInicial=retencion_control;
			
		if(retencion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(retencion_control.strStyleDivArbol,retencion_control.strStyleDivContent
																,retencion_control.strStyleDivOpcionesBanner,retencion_control.strStyleDivExpandirColapsar
																,retencion_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=retencion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",retencion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(retencion_control) {
		jQuery("#divTablaDatosretencionsAjaxWebPart").html(retencion_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosretencions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(retencion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosretencions=jQuery("#tblTablaDatosretencions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("retencion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',retencion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			retencion_webcontrol1.registrarControlesTableEdition(retencion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		retencion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(retencion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(retencion_control.retencionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(retencion_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(retencion_control) {
		this.actualizarCssBotonesPagina(retencion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(retencion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(retencion_control.tiposReportes,retencion_control.tiposReporte
															 	,retencion_control.tiposPaginacion,retencion_control.tiposAcciones
																,retencion_control.tiposColumnasSelect,retencion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(retencion_control.tiposRelaciones,retencion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(retencion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(retencion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(retencion_control);			
	}
	
	actualizarPaginaAreaBusquedas(retencion_control) {
		jQuery("#divBusquedaretencionAjaxWebPart").css("display",retencion_control.strPermisoBusqueda);
		jQuery("#trretencionCabeceraBusquedas").css("display",retencion_control.strPermisoBusqueda);
		jQuery("#trBusquedaretencion").css("display",retencion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(retencion_control.htmlTablaOrderBy!=null
			&& retencion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByretencionAjaxWebPart").html(retencion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//retencion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(retencion_control.htmlTablaOrderByRel!=null
			&& retencion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelretencionAjaxWebPart").html(retencion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(retencion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaretencionAjaxWebPart").css("display","none");
			jQuery("#trretencionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaretencion").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(retencion_control) {
		jQuery("#tdretencionNuevo").css("display",retencion_control.strPermisoNuevo);
		jQuery("#trretencionElementos").css("display",retencion_control.strVisibleTablaElementos);
		jQuery("#trretencionAcciones").css("display",retencion_control.strVisibleTablaAcciones);
		jQuery("#trretencionParametrosAcciones").css("display",retencion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(retencion_control) {
	
		this.actualizarCssBotonesMantenimiento(retencion_control);
				
		if(retencion_control.retencionActual!=null) {//form
			
			this.actualizarCamposFormulario(retencion_control);			
		}
						
		this.actualizarSpanMensajesCampos(retencion_control);
	}
	
	actualizarPaginaUsuarioInvitado(retencion_control) {
	
		var indexPosition=retencion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=retencion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(retencion_control) {
		jQuery("#divResumenretencionActualAjaxWebPart").html(retencion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_control) {
		jQuery("#divAccionesRelacionesretencionAjaxWebPart").html(retencion_control.htmlTablaAccionesRelaciones);
			
		retencion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(retencion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(retencion_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(retencion_control) {
		
		if(retencion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",retencion_control.strVisibleFK_Idcuenta_compras);
			jQuery("#tblstrVisible"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",retencion_control.strVisibleFK_Idcuenta_compras);
		}

		if(retencion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",retencion_control.strVisibleFK_Idcuenta_ventas);
			jQuery("#tblstrVisible"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",retencion_control.strVisibleFK_Idcuenta_ventas);
		}

		if(retencion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retencion_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+retencion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retencion_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionretencion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("retencion",id,"facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		retencion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion","empresa","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		retencion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion","cuenta","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		retencion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion","cuenta","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(retencion_control) {
	
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id").val(retencion_control.retencionActual.id);
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-version_row").val(retencion_control.retencionActual.versionRow);
		
		if(retencion_control.retencionActual.id_empresa!=null && retencion_control.retencionActual.id_empresa>-1){
			if(jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_control.retencionActual.id_empresa) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val(retencion_control.retencionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-codigo").val(retencion_control.retencionActual.codigo);
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-descripcion").val(retencion_control.retencionActual.descripcion);
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-valor").val(retencion_control.retencionActual.valor);
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-valor_base").val(retencion_control.retencionActual.valor_base);
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-predeterminado").prop('checked',retencion_control.retencionActual.predeterminado);
		
		if(retencion_control.retencionActual.id_cuenta_ventas!=null && retencion_control.retencionActual.id_cuenta_ventas>-1){
			if(jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_control.retencionActual.id_cuenta_ventas) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_control.retencionActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retencion_control.retencionActual.id_cuenta_compras!=null && retencion_control.retencionActual.id_cuenta_compras>-1){
			if(jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_control.retencionActual.id_cuenta_compras) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_control.retencionActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-cuenta_contable_ventas").val(retencion_control.retencionActual.cuenta_contable_ventas);
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-cuenta_contable_compras").val(retencion_control.retencionActual.cuenta_contable_compras);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+retencion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("retencion","facturacion","","form_retencion",formulario,"","",paraEventoTabla,idFilaTabla,retencion_funcion1,retencion_webcontrol1,retencion_constante1);
	}
	
	cargarCombosFK(retencion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.cargarCombosempresasFK(retencion_control);
			}

			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.cargarComboscuenta_ventassFK(retencion_control);
			}

			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.cargarComboscuenta_comprassFK(retencion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(retencion_control.strRecargarFkTiposNinguno!=null && retencion_control.strRecargarFkTiposNinguno!='NINGUNO' && retencion_control.strRecargarFkTiposNinguno!='') {
			
				if(retencion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",retencion_control.strRecargarFkTiposNinguno,",")) { 
					retencion_webcontrol1.cargarCombosempresasFK(retencion_control);
				}

				if(retencion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_control.strRecargarFkTiposNinguno,",")) { 
					retencion_webcontrol1.cargarComboscuenta_ventassFK(retencion_control);
				}

				if(retencion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_control.strRecargarFkTiposNinguno,",")) { 
					retencion_webcontrol1.cargarComboscuenta_comprassFK(retencion_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(retencion_control) {
		jQuery("#spanstrMensajeid").text(retencion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(retencion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(retencion_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(retencion_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(retencion_control.strMensajedescripcion);		
		jQuery("#spanstrMensajevalor").text(retencion_control.strMensajevalor);		
		jQuery("#spanstrMensajevalor_base").text(retencion_control.strMensajevalor_base);		
		jQuery("#spanstrMensajepredeterminado").text(retencion_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta_ventas").text(retencion_control.strMensajeid_cuenta_ventas);		
		jQuery("#spanstrMensajeid_cuenta_compras").text(retencion_control.strMensajeid_cuenta_compras);		
		jQuery("#spanstrMensajecuenta_contable_ventas").text(retencion_control.strMensajecuenta_contable_ventas);		
		jQuery("#spanstrMensajecuenta_contable_compras").text(retencion_control.strMensajecuenta_contable_compras);		
	}
	
	actualizarCssBotonesMantenimiento(retencion_control) {
		jQuery("#tdbtnNuevoretencion").css("visibility",retencion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoretencion").css("display",retencion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarretencion").css("visibility",retencion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarretencion").css("display",retencion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarretencion").css("visibility",retencion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarretencion").css("display",retencion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarretencion").css("visibility",retencion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosretencion").css("visibility",retencion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosretencion").css("display",retencion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarretencion").css("visibility",retencion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarretencion").css("visibility",retencion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarretencion").css("visibility",retencion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionlista_producto").click(function(){

			var idActual=jQuery(this).attr("idactualretencion");

			retencion_webcontrol1.registrarSesionParalista_productoes(idActual);
		});
		jQuery("#imgdivrelacionproducto").click(function(){

			var idActual=jQuery(this).attr("idactualretencion");

			retencion_webcontrol1.registrarSesionParaproductos(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(retencion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_funcion1,retencion_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(retencion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_funcion1,retencion_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(retencion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_funcion1,retencion_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(retencion_control) {
		var i=0;
		
		i=retencion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(retencion_control.retencionActual.id);
		jQuery("#t-version_row_"+i+"").val(retencion_control.retencionActual.versionRow);
		
		if(retencion_control.retencionActual.id_empresa!=null && retencion_control.retencionActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != retencion_control.retencionActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(retencion_control.retencionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(retencion_control.retencionActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(retencion_control.retencionActual.descripcion);
		jQuery("#t-cel_"+i+"_5").val(retencion_control.retencionActual.valor);
		jQuery("#t-cel_"+i+"_6").val(retencion_control.retencionActual.valor_base);
		jQuery("#t-cel_"+i+"_7").prop('checked',retencion_control.retencionActual.predeterminado);
		
		if(retencion_control.retencionActual.id_cuenta_ventas!=null && retencion_control.retencionActual.id_cuenta_ventas>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != retencion_control.retencionActual.id_cuenta_ventas) {
				jQuery("#t-cel_"+i+"_8").val(retencion_control.retencionActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_8").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retencion_control.retencionActual.id_cuenta_compras!=null && retencion_control.retencionActual.id_cuenta_compras>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != retencion_control.retencionActual.id_cuenta_compras) {
				jQuery("#t-cel_"+i+"_9").val(retencion_control.retencionActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(retencion_control.retencionActual.cuenta_contable_ventas);
		jQuery("#t-cel_"+i+"_11").val(retencion_control.retencionActual.cuenta_contable_compras);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(retencion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_producto_ventas").click(function(){
		jQuery("#tblTablaDatosretencions").on("click",".imgrelacionlista_producto_ventas", function () {

			var idActual=jQuery(this).attr("idactualretencion");

			retencion_webcontrol1.registrarSesion_ventasParalista_productoes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto").click(function(){
		jQuery("#tblTablaDatosretencions").on("click",".imgrelacionproducto", function () {

			var idActual=jQuery(this).attr("idactualretencion");

			retencion_webcontrol1.registrarSesionParaproductos(idActual);
		});				
	}
		
	

	registrarSesion_ventasParalista_productoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"retencion","lista_producto","facturacion","",retencion_funcion1,retencion_webcontrol1,"es","_ventas");
	}

	registrarSesionParaproductos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"retencion","producto","facturacion","",retencion_funcion1,retencion_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(retencion_control) {
		retencion_funcion1.registrarControlesTableValidacionEdition(retencion_control,retencion_webcontrol1,retencion_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencionConstante,strParametros);
		
		//retencion_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(retencion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa",retencion_control.empresasFK);

		if(retencion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_control.idFilaTablaActual+"_2",retencion_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(retencion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas",retencion_control.cuenta_ventassFK);

		if(retencion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_control.idFilaTablaActual+"_8",retencion_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",retencion_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(retencion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras",retencion_control.cuenta_comprassFK);

		if(retencion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_control.idFilaTablaActual+"_9",retencion_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",retencion_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(retencion_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(retencion_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(retencion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(retencion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_control.idempresaDefaultFK>-1 && jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_control.idempresaDefaultFK) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val(retencion_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(retencion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(retencion_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(retencion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(retencion_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//retencion_control
		
	
	}
	
	onLoadCombosDefectoFK(retencion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.setDefectoValorCombosempresasFK(retencion_control);
			}

			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.setDefectoValorComboscuenta_ventassFK(retencion_control);
			}

			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.setDefectoValorComboscuenta_comprassFK(retencion_control);
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
	onLoadCombosEventosFK(retencion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_webcontrol1.registrarComboActionChangeCombosempresasFK(retencion_control);
			//}

			//if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(retencion_control);
			//}

			//if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(retencion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(retencion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(retencion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("retencion");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("retencion");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(retencion_funcion1,retencion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(retencion_funcion1,retencion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(retencion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);			
			
			if(retencion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,"retencion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				retencion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				retencion_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				retencion_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion","FK_Idcuenta_compras","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion","FK_Idcuenta_ventas","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion","FK_Idempresa","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("retencion");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			retencion_funcion1.validarFormularioJQuery(retencion_constante1);
			
			if(retencion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(retencion_control) {
		
		jQuery("#divBusquedaretencionAjaxWebPart").css("display",retencion_control.strPermisoBusqueda);
		jQuery("#trretencionCabeceraBusquedas").css("display",retencion_control.strPermisoBusqueda);
		jQuery("#trBusquedaretencion").css("display",retencion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteretencion").css("display",retencion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosretencion").attr("style",retencion_control.strPermisoMostrarTodos);
		
		if(retencion_control.strPermisoNuevo!=null) {
			jQuery("#tdretencionNuevo").css("display",retencion_control.strPermisoNuevo);
			jQuery("#tdretencionNuevoToolBar").css("display",retencion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdretencionDuplicar").css("display",retencion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretencionDuplicarToolBar").css("display",retencion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretencionNuevoGuardarCambios").css("display",retencion_control.strPermisoNuevo);
			jQuery("#tdretencionNuevoGuardarCambiosToolBar").css("display",retencion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(retencion_control.strPermisoActualizar!=null) {
			jQuery("#tdretencionActualizarToolBar").css("display",retencion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencionCopiar").css("display",retencion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencionCopiarToolBar").css("display",retencion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencionConEditar").css("display",retencion_control.strPermisoActualizar);
		}
		
		jQuery("#tdretencionEliminarToolBar").css("display",retencion_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdretencionGuardarCambios").css("display",retencion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdretencionGuardarCambiosToolBar").css("display",retencion_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trretencionElementos").css("display",retencion_control.strVisibleTablaElementos);
		
		jQuery("#trretencionAcciones").css("display",retencion_control.strVisibleTablaAcciones);
		jQuery("#trretencionParametrosAcciones").css("display",retencion_control.strVisibleTablaAcciones);
			
		jQuery("#tdretencionCerrarPagina").css("display",retencion_control.strPermisoPopup);		
		jQuery("#tdretencionCerrarPaginaToolBar").css("display",retencion_control.strPermisoPopup);
		//jQuery("#trretencionAccionesRelaciones").css("display",retencion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		retencion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		retencion_webcontrol1.registrarEventosControles();
		
		if(retencion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(retencion_constante1.STR_ES_RELACIONADO=="false") {
			retencion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(retencion_constante1.STR_ES_RELACIONES=="true") {
			if(retencion_constante1.BIT_ES_PAGINA_FORM==true) {
				retencion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(retencion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(retencion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				retencion_webcontrol1.onLoad();
				
			} else {
				if(retencion_constante1.BIT_ES_PAGINA_FORM==true) {
					if(retencion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
						//retencion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(retencion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(retencion_constante1.BIG_ID_ACTUAL,"retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
						//retencion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			retencion_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var retencion_webcontrol1=new retencion_webcontrol();

if(retencion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = retencion_webcontrol1.onLoadWindow; 
}

//</script>