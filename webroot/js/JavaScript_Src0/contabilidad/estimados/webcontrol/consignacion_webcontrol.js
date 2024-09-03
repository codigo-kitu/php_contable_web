//<script type="text/javascript" language="javascript">



//var consignacionJQueryPaginaWebInteraccion= function (consignacion_control) {
//this.,this.,this.

class consignacion_webcontrol extends consignacion_webcontrol_add {
	
	consignacion_control=null;
	consignacion_controlInicial=null;
	consignacion_controlAuxiliar=null;
		
	//if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(consignacion_control) {
		super();
		
		this.consignacion_control=consignacion_control;
	}
		
	actualizarVariablesPagina(consignacion_control) {
		
		if(consignacion_control.action=="index" || consignacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(consignacion_control);
			
		} else if(consignacion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(consignacion_control);
		
		} else if(consignacion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(consignacion_control);
		
		} else if(consignacion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(consignacion_control);
		
		} else if(consignacion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(consignacion_control);
			
		} else if(consignacion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(consignacion_control);
			
		} else if(consignacion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(consignacion_control);
		
		} else if(consignacion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(consignacion_control);
		
		} else if(consignacion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(consignacion_control);
		
		} else if(consignacion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(consignacion_control);
		
		} else if(consignacion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(consignacion_control);
		
		} else if(consignacion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(consignacion_control);
		
		} else if(consignacion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(consignacion_control);
		
		} else if(consignacion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(consignacion_control);
		
		} else if(consignacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(consignacion_control);
		
		} else if(consignacion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(consignacion_control);
		
		} else if(consignacion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(consignacion_control);
		
		} else if(consignacion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(consignacion_control);
		
		} else if(consignacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(consignacion_control);
		
		} else if(consignacion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(consignacion_control);
		
		} else if(consignacion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(consignacion_control);
		
		} else if(consignacion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(consignacion_control);
		
		} else if(consignacion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(consignacion_control);
		
		} else if(consignacion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(consignacion_control);
		
		} else if(consignacion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(consignacion_control);
		
		} else if(consignacion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(consignacion_control);
		
		} else if(consignacion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(consignacion_control);
		
		} else if(consignacion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(consignacion_control);		
		
		} else if(consignacion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(consignacion_control);		
		
		} else if(consignacion_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(consignacion_control);		
		
		} else if(consignacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(consignacion_control);		
		}
		else if(consignacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(consignacion_control);		
		}
		else if(consignacion_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(consignacion_control);		
		}
		else if(consignacion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(consignacion_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(consignacion_control.action + " Revisar Manejo");
			
			if(consignacion_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(consignacion_control);
				
				return;
			}
			
			//if(consignacion_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(consignacion_control);
			//}
			
			if(consignacion_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(consignacion_control);
			}
			
			if(consignacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && consignacion_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(consignacion_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(consignacion_control, false);			
			}
			
			if(consignacion_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(consignacion_control);	
			}
			
			if(consignacion_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(consignacion_control);
			}
			
			if(consignacion_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(consignacion_control);
			}
			
			if(consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(consignacion_control);
			}
			
			if(consignacion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(consignacion_control);	
			}
			
			if(consignacion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(consignacion_control);
			}
			
			if(consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(consignacion_control);
			}
			
			
			if(consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(consignacion_control);			
			}
			
			if(consignacion_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(consignacion_control);
			}
			
			
			if(consignacion_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(consignacion_control);
			}
			
			if(consignacion_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(consignacion_control);
			}				
			
			if(consignacion_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(consignacion_control);
			}
			
			if(consignacion_control.usuarioActual!=null && consignacion_control.usuarioActual.field_strUserName!=null &&
			consignacion_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(consignacion_control);			
			}
		}
		
		
		if(consignacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(consignacion_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(consignacion_control) {
		
		this.actualizarPaginaCargaGeneral(consignacion_control);
		this.actualizarPaginaTablaDatos(consignacion_control);
		this.actualizarPaginaCargaGeneralControles(consignacion_control);
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(consignacion_control);
		this.actualizarPaginaAreaBusquedas(consignacion_control);
		this.actualizarPaginaCargaCombosFK(consignacion_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(consignacion_control) {
		
		this.actualizarPaginaCargaGeneral(consignacion_control);
		this.actualizarPaginaTablaDatos(consignacion_control);
		this.actualizarPaginaCargaGeneralControles(consignacion_control);
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(consignacion_control);
		this.actualizarPaginaAreaBusquedas(consignacion_control);
		this.actualizarPaginaCargaCombosFK(consignacion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(consignacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(consignacion_control);		
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(consignacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(consignacion_control);		
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(consignacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(consignacion_control);		
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(consignacion_control) {
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(consignacion_control) {
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(consignacion_control) {
		this.actualizarPaginaCargaGeneralControles(consignacion_control);
		this.actualizarPaginaCargaCombosFK(consignacion_control);
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(consignacion_control) {
		this.actualizarPaginaAbrirLink(consignacion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);				
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);
		this.actualizarPaginaFormulario(consignacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);
		this.actualizarPaginaFormulario(consignacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(consignacion_control) {
		this.actualizarPaginaFormulario(consignacion_control);
		this.onLoadCombosDefectoFK(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);
		this.actualizarPaginaFormulario(consignacion_control);
		this.onLoadCombosDefectoFK(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(consignacion_control) {
		this.actualizarPaginaCargaGeneralControles(consignacion_control);
		this.actualizarPaginaCargaCombosFK(consignacion_control);
		this.actualizarPaginaFormulario(consignacion_control);
		this.onLoadCombosDefectoFK(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(consignacion_control) {
		this.actualizarPaginaAbrirLink(consignacion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(consignacion_control) {
		this.actualizarPaginaImprimir(consignacion_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(consignacion_control) {
		this.actualizarPaginaImprimir(consignacion_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(consignacion_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(consignacion_control) {
		//FORMULARIO
		if(consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(consignacion_control);
			this.actualizarPaginaFormularioAdd(consignacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		//COMBOS FK
		if(consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(consignacion_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(consignacion_control) {
		//FORMULARIO
		if(consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(consignacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);	
		//COMBOS FK
		if(consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(consignacion_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);
		this.actualizarPaginaFormulario(consignacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(consignacion_control) {
		//FORMULARIO
		if(consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(consignacion_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(consignacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);	
		//COMBOS FK
		if(consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(consignacion_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(consignacion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(consignacion_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(consignacion_control) {
		if(consignacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && consignacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(consignacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(consignacion_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(consignacion_control) {
		if(consignacion_funcion1.esPaginaForm()==true) {
			window.opener.consignacion_webcontrol1.actualizarPaginaTablaDatos(consignacion_control);
		} else {
			this.actualizarPaginaTablaDatos(consignacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(consignacion_control) {
		consignacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(consignacion_control.strAuxiliarUrlPagina);
				
		consignacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(consignacion_control.strAuxiliarTipo,consignacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(consignacion_control) {
		consignacion_funcion1.resaltarRestaurarDivMensaje(true,consignacion_control.strAuxiliarMensajeAlert,consignacion_control.strAuxiliarCssMensaje);
			
		if(consignacion_funcion1.esPaginaForm()==true) {
			window.opener.consignacion_funcion1.resaltarRestaurarDivMensaje(true,consignacion_control.strAuxiliarMensajeAlert,consignacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(consignacion_control) {
		eval(consignacion_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(consignacion_control, mostrar) {
		
		if(mostrar==true) {
			consignacion_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				consignacion_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			consignacion_funcion1.mostrarDivMensaje(true,consignacion_control.strAuxiliarMensaje,consignacion_control.strAuxiliarCssMensaje);
		
		} else {
			consignacion_funcion1.mostrarDivMensaje(false,consignacion_control.strAuxiliarMensaje,consignacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(consignacion_control) {
	
		funcionGeneral.printWebPartPage("consignacion",consignacion_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarconsignacionsAjaxWebPart").html(consignacion_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("consignacion",jQuery("#divTablaDatosReporteAuxiliarconsignacionsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(consignacion_control) {
		this.consignacion_controlInicial=consignacion_control;
			
		if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(consignacion_control.strStyleDivArbol,consignacion_control.strStyleDivContent
																,consignacion_control.strStyleDivOpcionesBanner,consignacion_control.strStyleDivExpandirColapsar
																,consignacion_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=consignacion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",consignacion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(consignacion_control) {
		jQuery("#divTablaDatosconsignacionsAjaxWebPart").html(consignacion_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosconsignacions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosconsignacions=jQuery("#tblTablaDatosconsignacions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("consignacion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',consignacion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			consignacion_webcontrol1.registrarControlesTableEdition(consignacion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		consignacion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(consignacion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(consignacion_control.consignacionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(consignacion_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(consignacion_control) {
		this.actualizarCssBotonesPagina(consignacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(consignacion_control.tiposReportes,consignacion_control.tiposReporte
															 	,consignacion_control.tiposPaginacion,consignacion_control.tiposAcciones
																,consignacion_control.tiposColumnasSelect,consignacion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(consignacion_control.tiposRelaciones,consignacion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(consignacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(consignacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(consignacion_control);			
	}
	
	actualizarPaginaAreaBusquedas(consignacion_control) {
		jQuery("#divBusquedaconsignacionAjaxWebPart").css("display",consignacion_control.strPermisoBusqueda);
		jQuery("#trconsignacionCabeceraBusquedas").css("display",consignacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaconsignacion").css("display",consignacion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(consignacion_control.htmlTablaOrderBy!=null
			&& consignacion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByconsignacionAjaxWebPart").html(consignacion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//consignacion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(consignacion_control.htmlTablaOrderByRel!=null
			&& consignacion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelconsignacionAjaxWebPart").html(consignacion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(consignacion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaconsignacionAjaxWebPart").css("display","none");
			jQuery("#trconsignacionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaconsignacion").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(consignacion_control) {
		jQuery("#tdconsignacionNuevo").css("display",consignacion_control.strPermisoNuevo);
		jQuery("#trconsignacionElementos").css("display",consignacion_control.strVisibleTablaElementos);
		jQuery("#trconsignacionAcciones").css("display",consignacion_control.strVisibleTablaAcciones);
		jQuery("#trconsignacionParametrosAcciones").css("display",consignacion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(consignacion_control) {
	
		this.actualizarCssBotonesMantenimiento(consignacion_control);
				
		if(consignacion_control.consignacionActual!=null) {//form
			
			this.actualizarCamposFormulario(consignacion_control);			
		}
						
		this.actualizarSpanMensajesCampos(consignacion_control);
	}
	
	actualizarPaginaUsuarioInvitado(consignacion_control) {
	
		var indexPosition=consignacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=consignacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(consignacion_control) {
		jQuery("#divResumenconsignacionActualAjaxWebPart").html(consignacion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(consignacion_control) {
		jQuery("#divAccionesRelacionesconsignacionAjaxWebPart").html(consignacion_control.htmlTablaAccionesRelaciones);
			
		consignacion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(consignacion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(consignacion_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(consignacion_control) {
		
		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",consignacion_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",consignacion_control.strVisibleFK_Idasiento);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",consignacion_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",consignacion_control.strVisibleFK_Idcliente);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",consignacion_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",consignacion_control.strVisibleFK_Idejercicio);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",consignacion_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",consignacion_control.strVisibleFK_Idempresa);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idestado").attr("style",consignacion_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idestado").attr("style",consignacion_control.strVisibleFK_Idestado);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",consignacion_control.strVisibleFK_Idkardex);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",consignacion_control.strVisibleFK_Idkardex);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",consignacion_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",consignacion_control.strVisibleFK_Idperiodo);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",consignacion_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",consignacion_control.strVisibleFK_Idsucursal);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",consignacion_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",consignacion_control.strVisibleFK_Idtermino_pago);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",consignacion_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",consignacion_control.strVisibleFK_Idusuario);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",consignacion_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",consignacion_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionconsignacion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("consignacion",id,"estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","empresa","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","sucursal","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","ejercicio","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","periodo","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","usuario","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","cliente","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","vendedor","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","termino_pago_cliente","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","estado","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParakardex(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","kardex","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","asiento","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(consignacion_control) {
	
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id").val(consignacion_control.consignacionActual.id);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-version_row").val(consignacion_control.consignacionActual.versionRow);
		
		if(consignacion_control.consignacionActual.id_empresa!=null && consignacion_control.consignacionActual.id_empresa>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val() != consignacion_control.consignacionActual.id_empresa) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val(consignacion_control.consignacionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_sucursal!=null && consignacion_control.consignacionActual.id_sucursal>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val() != consignacion_control.consignacionActual.id_sucursal) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val(consignacion_control.consignacionActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_ejercicio!=null && consignacion_control.consignacionActual.id_ejercicio>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != consignacion_control.consignacionActual.id_ejercicio) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val(consignacion_control.consignacionActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_periodo!=null && consignacion_control.consignacionActual.id_periodo>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val() != consignacion_control.consignacionActual.id_periodo) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val(consignacion_control.consignacionActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_usuario!=null && consignacion_control.consignacionActual.id_usuario>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val() != consignacion_control.consignacionActual.id_usuario) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val(consignacion_control.consignacionActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-numero").val(consignacion_control.consignacionActual.numero);
		
		if(consignacion_control.consignacionActual.id_cliente!=null && consignacion_control.consignacionActual.id_cliente>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val() != consignacion_control.consignacionActual.id_cliente) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val(consignacion_control.consignacionActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-ruc").val(consignacion_control.consignacionActual.ruc);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-referencia_cliente").val(consignacion_control.consignacionActual.referencia_cliente);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-fecha_emision").val(consignacion_control.consignacionActual.fecha_emision);
		
		if(consignacion_control.consignacionActual.id_vendedor!=null && consignacion_control.consignacionActual.id_vendedor>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val() != consignacion_control.consignacionActual.id_vendedor) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val(consignacion_control.consignacionActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_termino_pago!=null && consignacion_control.consignacionActual.id_termino_pago>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago").val() != consignacion_control.consignacionActual.id_termino_pago) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago").val(consignacion_control.consignacionActual.id_termino_pago).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-fecha_vence").val(consignacion_control.consignacionActual.fecha_vence);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-tipo_cambio").val(consignacion_control.consignacionActual.tipo_cambio);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-moneda").val(consignacion_control.consignacionActual.moneda);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-direccion").val(consignacion_control.consignacionActual.direccion);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-enviar_a").val(consignacion_control.consignacionActual.enviar_a);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-observacion").val(consignacion_control.consignacionActual.observacion);
		
		if(consignacion_control.consignacionActual.id_estado!=null && consignacion_control.consignacionActual.id_estado>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val() != consignacion_control.consignacionActual.id_estado) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val(consignacion_control.consignacionActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-sub_total").val(consignacion_control.consignacionActual.sub_total);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-descuento_monto").val(consignacion_control.consignacionActual.descuento_monto);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-descuento_porciento").val(consignacion_control.consignacionActual.descuento_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-iva_monto").val(consignacion_control.consignacionActual.iva_monto);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-iva_porciento").val(consignacion_control.consignacionActual.iva_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-retencion_fuente_monto").val(consignacion_control.consignacionActual.retencion_fuente_monto);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-retencion_fuente_porciento").val(consignacion_control.consignacionActual.retencion_fuente_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-retencion_iva_monto").val(consignacion_control.consignacionActual.retencion_iva_monto);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-retencion_iva_porciento").val(consignacion_control.consignacionActual.retencion_iva_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-total").val(consignacion_control.consignacionActual.total);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-otro_monto").val(consignacion_control.consignacionActual.otro_monto);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-otro_porciento").val(consignacion_control.consignacionActual.otro_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-impuesto_en_precio").val(consignacion_control.consignacionActual.impuesto_en_precio);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-nota").val(consignacion_control.consignacionActual.nota);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-hora").val(consignacion_control.consignacionActual.hora);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-tipo_envio").val(consignacion_control.consignacionActual.tipo_envio);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-genero_factura").val(consignacion_control.consignacionActual.genero_factura);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-genero_factura1").val(consignacion_control.consignacionActual.genero_factura1);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-genero_factura2").val(consignacion_control.consignacionActual.genero_factura2);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-genero_factura3").val(consignacion_control.consignacionActual.genero_factura3);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-actualizado").val(consignacion_control.consignacionActual.actualizado);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-computador").val(consignacion_control.consignacionActual.computador);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-monto_base").val(consignacion_control.consignacionActual.monto_base);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-descuento_parcial_monto").val(consignacion_control.consignacionActual.descuento_parcial_monto);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-impuesto2_porciento").val(consignacion_control.consignacionActual.impuesto2_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-impuesto2_monto").val(consignacion_control.consignacionActual.impuesto2_monto);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-retencion_ica_porciento").val(consignacion_control.consignacionActual.retencion_ica_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-retencion_ica_monto").val(consignacion_control.consignacionActual.retencion_ica_monto);
		
		if(consignacion_control.consignacionActual.id_kardex!=null && consignacion_control.consignacionActual.id_kardex>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val() != consignacion_control.consignacionActual.id_kardex) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val(consignacion_control.consignacionActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_asiento!=null && consignacion_control.consignacionActual.id_asiento>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val() != consignacion_control.consignacionActual.id_asiento) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val(consignacion_control.consignacionActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-comprobante").val(consignacion_control.consignacionActual.comprobante);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+consignacion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("consignacion","estimados","","form_consignacion",formulario,"","",paraEventoTabla,idFilaTabla,consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}
	
	cargarCombosFK(consignacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosempresasFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombossucursalsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosejerciciosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosperiodosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosusuariosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosclientesFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosvendedorsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombostermino_pagosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosestadosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarComboskardexsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosasientosFK(consignacion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(consignacion_control.strRecargarFkTiposNinguno!=null && consignacion_control.strRecargarFkTiposNinguno!='NINGUNO' && consignacion_control.strRecargarFkTiposNinguno!='') {
			
				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosempresasFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombossucursalsFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosejerciciosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosperiodosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosusuariosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosclientesFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosvendedorsFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombostermino_pagosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosestadosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarComboskardexsFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosasientosFK(consignacion_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(consignacion_control) {
		jQuery("#spanstrMensajeid").text(consignacion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(consignacion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(consignacion_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(consignacion_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(consignacion_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(consignacion_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(consignacion_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenumero").text(consignacion_control.strMensajenumero);		
		jQuery("#spanstrMensajeid_cliente").text(consignacion_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajeruc").text(consignacion_control.strMensajeruc);		
		jQuery("#spanstrMensajereferencia_cliente").text(consignacion_control.strMensajereferencia_cliente);		
		jQuery("#spanstrMensajefecha_emision").text(consignacion_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajeid_vendedor").text(consignacion_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajeid_termino_pago").text(consignacion_control.strMensajeid_termino_pago);		
		jQuery("#spanstrMensajefecha_vence").text(consignacion_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajetipo_cambio").text(consignacion_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajemoneda").text(consignacion_control.strMensajemoneda);		
		jQuery("#spanstrMensajedireccion").text(consignacion_control.strMensajedireccion);		
		jQuery("#spanstrMensajeenviar_a").text(consignacion_control.strMensajeenviar_a);		
		jQuery("#spanstrMensajeobservacion").text(consignacion_control.strMensajeobservacion);		
		jQuery("#spanstrMensajeid_estado").text(consignacion_control.strMensajeid_estado);		
		jQuery("#spanstrMensajesub_total").text(consignacion_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_monto").text(consignacion_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajedescuento_porciento").text(consignacion_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(consignacion_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(consignacion_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeretencion_fuente_monto").text(consignacion_control.strMensajeretencion_fuente_monto);		
		jQuery("#spanstrMensajeretencion_fuente_porciento").text(consignacion_control.strMensajeretencion_fuente_porciento);		
		jQuery("#spanstrMensajeretencion_iva_monto").text(consignacion_control.strMensajeretencion_iva_monto);		
		jQuery("#spanstrMensajeretencion_iva_porciento").text(consignacion_control.strMensajeretencion_iva_porciento);		
		jQuery("#spanstrMensajetotal").text(consignacion_control.strMensajetotal);		
		jQuery("#spanstrMensajeotro_monto").text(consignacion_control.strMensajeotro_monto);		
		jQuery("#spanstrMensajeotro_porciento").text(consignacion_control.strMensajeotro_porciento);		
		jQuery("#spanstrMensajeimpuesto_en_precio").text(consignacion_control.strMensajeimpuesto_en_precio);		
		jQuery("#spanstrMensajenota").text(consignacion_control.strMensajenota);		
		jQuery("#spanstrMensajehora").text(consignacion_control.strMensajehora);		
		jQuery("#spanstrMensajetipo_envio").text(consignacion_control.strMensajetipo_envio);		
		jQuery("#spanstrMensajegenero_factura").text(consignacion_control.strMensajegenero_factura);		
		jQuery("#spanstrMensajegenero_factura1").text(consignacion_control.strMensajegenero_factura1);		
		jQuery("#spanstrMensajegenero_factura2").text(consignacion_control.strMensajegenero_factura2);		
		jQuery("#spanstrMensajegenero_factura3").text(consignacion_control.strMensajegenero_factura3);		
		jQuery("#spanstrMensajeactualizado").text(consignacion_control.strMensajeactualizado);		
		jQuery("#spanstrMensajecomputador").text(consignacion_control.strMensajecomputador);		
		jQuery("#spanstrMensajemonto_base").text(consignacion_control.strMensajemonto_base);		
		jQuery("#spanstrMensajedescuento_parcial_monto").text(consignacion_control.strMensajedescuento_parcial_monto);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(consignacion_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(consignacion_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajeretencion_ica_porciento").text(consignacion_control.strMensajeretencion_ica_porciento);		
		jQuery("#spanstrMensajeretencion_ica_monto").text(consignacion_control.strMensajeretencion_ica_monto);		
		jQuery("#spanstrMensajeid_kardex").text(consignacion_control.strMensajeid_kardex);		
		jQuery("#spanstrMensajeid_asiento").text(consignacion_control.strMensajeid_asiento);		
		jQuery("#spanstrMensajecomprobante").text(consignacion_control.strMensajecomprobante);		
	}
	
	actualizarCssBotonesMantenimiento(consignacion_control) {
		jQuery("#tdbtnNuevoconsignacion").css("visibility",consignacion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoconsignacion").css("display",consignacion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarconsignacion").css("visibility",consignacion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarconsignacion").css("display",consignacion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarconsignacion").css("visibility",consignacion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarconsignacion").css("display",consignacion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarconsignacion").css("visibility",consignacion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosconsignacion").css("visibility",consignacion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosconsignacion").css("display",consignacion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarconsignacion").css("visibility",consignacion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarconsignacion").css("visibility",consignacion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarconsignacion").css("visibility",consignacion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionimagen_consignacion").click(function(){

			var idActual=jQuery(this).attr("idactualconsignacion");

			consignacion_webcontrol1.registrarSesionParaimagen_consignaciones(idActual);
		});
		jQuery("#imgdivrelacionconsignacion_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualconsignacion");

			consignacion_webcontrol1.registrarSesionParaconsignacion_detalles(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_cliente") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+consignacion_constante1.STR_SUFIJO+"-id_cliente" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.consignacionActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.consignacionActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.consignacionActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.clientesFK);
	}

	cargarComboEditarTablavendedorFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pagoFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.termino_pagosFK);
	}

	cargarComboEditarTablaestadoFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.estadosFK);
	}

	cargarComboEditarTablakardexFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.kardexsFK);
	}

	cargarComboEditarTablaasientoFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.asientosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(consignacion_control) {
		var i=0;
		
		i=consignacion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(consignacion_control.consignacionActual.id);
		jQuery("#t-version_row_"+i+"").val(consignacion_control.consignacionActual.versionRow);
		
		if(consignacion_control.consignacionActual.id_empresa!=null && consignacion_control.consignacionActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != consignacion_control.consignacionActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(consignacion_control.consignacionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_sucursal!=null && consignacion_control.consignacionActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != consignacion_control.consignacionActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(consignacion_control.consignacionActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_ejercicio!=null && consignacion_control.consignacionActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != consignacion_control.consignacionActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(consignacion_control.consignacionActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_periodo!=null && consignacion_control.consignacionActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != consignacion_control.consignacionActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(consignacion_control.consignacionActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_usuario!=null && consignacion_control.consignacionActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != consignacion_control.consignacionActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(consignacion_control.consignacionActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(consignacion_control.consignacionActual.numero);
		
		if(consignacion_control.consignacionActual.id_cliente!=null && consignacion_control.consignacionActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != consignacion_control.consignacionActual.id_cliente) {
				jQuery("#t-cel_"+i+"_8").val(consignacion_control.consignacionActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(consignacion_control.consignacionActual.ruc);
		jQuery("#t-cel_"+i+"_10").val(consignacion_control.consignacionActual.referencia_cliente);
		jQuery("#t-cel_"+i+"_11").val(consignacion_control.consignacionActual.fecha_emision);
		
		if(consignacion_control.consignacionActual.id_vendedor!=null && consignacion_control.consignacionActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != consignacion_control.consignacionActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_12").val(consignacion_control.consignacionActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_termino_pago!=null && consignacion_control.consignacionActual.id_termino_pago>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != consignacion_control.consignacionActual.id_termino_pago) {
				jQuery("#t-cel_"+i+"_13").val(consignacion_control.consignacionActual.id_termino_pago).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(consignacion_control.consignacionActual.fecha_vence);
		jQuery("#t-cel_"+i+"_15").val(consignacion_control.consignacionActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_16").val(consignacion_control.consignacionActual.moneda);
		jQuery("#t-cel_"+i+"_17").val(consignacion_control.consignacionActual.direccion);
		jQuery("#t-cel_"+i+"_18").val(consignacion_control.consignacionActual.enviar_a);
		jQuery("#t-cel_"+i+"_19").val(consignacion_control.consignacionActual.observacion);
		
		if(consignacion_control.consignacionActual.id_estado!=null && consignacion_control.consignacionActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_20").val() != consignacion_control.consignacionActual.id_estado) {
				jQuery("#t-cel_"+i+"_20").val(consignacion_control.consignacionActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_20").select2("val", null);
			if(jQuery("#t-cel_"+i+"_20").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_20").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_21").val(consignacion_control.consignacionActual.sub_total);
		jQuery("#t-cel_"+i+"_22").val(consignacion_control.consignacionActual.descuento_monto);
		jQuery("#t-cel_"+i+"_23").val(consignacion_control.consignacionActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_24").val(consignacion_control.consignacionActual.iva_monto);
		jQuery("#t-cel_"+i+"_25").val(consignacion_control.consignacionActual.iva_porciento);
		jQuery("#t-cel_"+i+"_26").val(consignacion_control.consignacionActual.retencion_fuente_monto);
		jQuery("#t-cel_"+i+"_27").val(consignacion_control.consignacionActual.retencion_fuente_porciento);
		jQuery("#t-cel_"+i+"_28").val(consignacion_control.consignacionActual.retencion_iva_monto);
		jQuery("#t-cel_"+i+"_29").val(consignacion_control.consignacionActual.retencion_iva_porciento);
		jQuery("#t-cel_"+i+"_30").val(consignacion_control.consignacionActual.total);
		jQuery("#t-cel_"+i+"_31").val(consignacion_control.consignacionActual.otro_monto);
		jQuery("#t-cel_"+i+"_32").val(consignacion_control.consignacionActual.otro_porciento);
		jQuery("#t-cel_"+i+"_33").val(consignacion_control.consignacionActual.impuesto_en_precio);
		jQuery("#t-cel_"+i+"_34").val(consignacion_control.consignacionActual.nota);
		jQuery("#t-cel_"+i+"_35").val(consignacion_control.consignacionActual.hora);
		jQuery("#t-cel_"+i+"_36").val(consignacion_control.consignacionActual.tipo_envio);
		jQuery("#t-cel_"+i+"_37").val(consignacion_control.consignacionActual.genero_factura);
		jQuery("#t-cel_"+i+"_38").val(consignacion_control.consignacionActual.genero_factura1);
		jQuery("#t-cel_"+i+"_39").val(consignacion_control.consignacionActual.genero_factura2);
		jQuery("#t-cel_"+i+"_40").val(consignacion_control.consignacionActual.genero_factura3);
		jQuery("#t-cel_"+i+"_41").val(consignacion_control.consignacionActual.actualizado);
		jQuery("#t-cel_"+i+"_42").val(consignacion_control.consignacionActual.computador);
		jQuery("#t-cel_"+i+"_43").val(consignacion_control.consignacionActual.monto_base);
		jQuery("#t-cel_"+i+"_44").val(consignacion_control.consignacionActual.descuento_parcial_monto);
		jQuery("#t-cel_"+i+"_45").val(consignacion_control.consignacionActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_46").val(consignacion_control.consignacionActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_47").val(consignacion_control.consignacionActual.retencion_ica_porciento);
		jQuery("#t-cel_"+i+"_48").val(consignacion_control.consignacionActual.retencion_ica_monto);
		
		if(consignacion_control.consignacionActual.id_kardex!=null && consignacion_control.consignacionActual.id_kardex>-1){
			if(jQuery("#t-cel_"+i+"_49").val() != consignacion_control.consignacionActual.id_kardex) {
				jQuery("#t-cel_"+i+"_49").val(consignacion_control.consignacionActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_49").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_49").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_asiento!=null && consignacion_control.consignacionActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_50").val() != consignacion_control.consignacionActual.id_asiento) {
				jQuery("#t-cel_"+i+"_50").val(consignacion_control.consignacionActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_50").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_50").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_51").val(consignacion_control.consignacionActual.comprobante);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(consignacion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimagen_consignacion").click(function(){
		jQuery("#tblTablaDatosconsignacions").on("click",".imgrelacionimagen_consignacion", function () {

			var idActual=jQuery(this).attr("idactualconsignacion");

			consignacion_webcontrol1.registrarSesionParaimagen_consignaciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionconsignacion_detalle").click(function(){
		jQuery("#tblTablaDatosconsignacions").on("click",".imgrelacionconsignacion_detalle", function () {

			var idActual=jQuery(this).attr("idactualconsignacion");

			consignacion_webcontrol1.registrarSesionParaconsignacion_detalles(idActual);
		});				
	}
		
	

	registrarSesionParaimagen_consignaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"consignacion","imagen_consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,"es","");
	}

	registrarSesionParaconsignacion_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"consignacion","consignacion_detalle","estimados","",consignacion_funcion1,consignacion_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(consignacion_control) {
		consignacion_funcion1.registrarControlesTableValidacionEdition(consignacion_control,consignacion_webcontrol1,consignacion_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacionConstante,strParametros);
		
		//consignacion_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa",consignacion_control.empresasFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_2",consignacion_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal",consignacion_control.sucursalsFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_3",consignacion_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio",consignacion_control.ejerciciosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_4",consignacion_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo",consignacion_control.periodosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_5",consignacion_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario",consignacion_control.usuariosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_6",consignacion_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente",consignacion_control.clientesFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_8",consignacion_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",consignacion_control.clientesFK);

	};

	cargarCombosvendedorsFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor",consignacion_control.vendedorsFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_12",consignacion_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",consignacion_control.vendedorsFK);

	};

	cargarCombostermino_pagosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago",consignacion_control.termino_pagosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_13",consignacion_control.termino_pagosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago",consignacion_control.termino_pagosFK);

	};

	cargarCombosestadosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado",consignacion_control.estadosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_20",consignacion_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",consignacion_control.estadosFK);

	};

	cargarComboskardexsFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex",consignacion_control.kardexsFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_49",consignacion_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",consignacion_control.kardexsFK);

	};

	cargarCombosasientosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento",consignacion_control.asientosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_50",consignacion_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",consignacion_control.asientosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(consignacion_control) {

	};

	registrarComboActionChangeCombossucursalsFK(consignacion_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(consignacion_control) {

	};

	registrarComboActionChangeCombosperiodosFK(consignacion_control) {

	};

	registrarComboActionChangeCombosusuariosFK(consignacion_control) {

	};

	registrarComboActionChangeCombosclientesFK(consignacion_control) {
		this.registrarComboActionChangeid_cliente("form"+consignacion_constante1.STR_SUFIJO+"-id_cliente",false,0);


		this.registrarComboActionChangeid_cliente(""+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(consignacion_control) {

	};

	registrarComboActionChangeCombostermino_pagosFK(consignacion_control) {

	};

	registrarComboActionChangeCombosestadosFK(consignacion_control) {

	};

	registrarComboActionChangeComboskardexsFK(consignacion_control) {

	};

	registrarComboActionChangeCombosasientosFK(consignacion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idempresaDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val() != consignacion_control.idempresaDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val(consignacion_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idsucursalDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val() != consignacion_control.idsucursalDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val(consignacion_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idejercicioDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != consignacion_control.idejercicioDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val(consignacion_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idperiodoDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val() != consignacion_control.idperiodoDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val(consignacion_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idusuarioDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val() != consignacion_control.idusuarioDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val(consignacion_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idclienteDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val() != consignacion_control.idclienteDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val(consignacion_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(consignacion_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idvendedorDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val() != consignacion_control.idvendedorDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val(consignacion_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(consignacion_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pagosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idtermino_pagoDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago").val() != consignacion_control.idtermino_pagoDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago").val(consignacion_control.idtermino_pagoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago").val(consignacion_control.idtermino_pagoDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idestadoDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val() != consignacion_control.idestadoDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val(consignacion_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(consignacion_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idkardexDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val() != consignacion_control.idkardexDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val(consignacion_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(consignacion_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idasientoDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val() != consignacion_control.idasientoDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val(consignacion_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(consignacion_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_cliente(id_cliente,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("consignacion","estimados","","id_cliente",id_cliente,"NINGUNO","",paraEventoTabla,idFilaTabla,consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	











	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
			
							imagen_consignacion_webcontrol1.onLoadWindow();
							consignacion_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
			
		imagen_consignacion_webcontrol1.onLoadRecargarRelacionado();
		consignacion_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//consignacion_control
		
	
	}
	
	onLoadCombosDefectoFK(consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosempresasFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombossucursalsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosejerciciosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosperiodosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosusuariosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosclientesFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosvendedorsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombostermino_pagosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosestadosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorComboskardexsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosasientosFK(consignacion_control);
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
	onLoadCombosEventosFK(consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosempresasFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombossucursalsFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosejerciciosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosperiodosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosusuariosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosclientesFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosvendedorsFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombostermino_pagosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosestadosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeComboskardexsFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosasientosFK(consignacion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("consignacion");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("consignacion");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(consignacion_funcion1,consignacion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(consignacion_funcion1,consignacion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(consignacion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);			
			
			if(consignacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,"consignacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago","cuentascobrar","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago");
				//alert(jQuery('#form-id_termino_pago_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idasiento","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idcliente","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idejercicio","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idempresa","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idestado","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idkardex","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idperiodo","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idsucursal","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idtermino_pago","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idusuario","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idvendedor","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("consignacion");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			consignacion_funcion1.validarFormularioJQuery(consignacion_constante1);
			
			if(consignacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(consignacion_control) {
		
		jQuery("#divBusquedaconsignacionAjaxWebPart").css("display",consignacion_control.strPermisoBusqueda);
		jQuery("#trconsignacionCabeceraBusquedas").css("display",consignacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaconsignacion").css("display",consignacion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteconsignacion").css("display",consignacion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosconsignacion").attr("style",consignacion_control.strPermisoMostrarTodos);
		
		if(consignacion_control.strPermisoNuevo!=null) {
			jQuery("#tdconsignacionNuevo").css("display",consignacion_control.strPermisoNuevo);
			jQuery("#tdconsignacionNuevoToolBar").css("display",consignacion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdconsignacionDuplicar").css("display",consignacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdconsignacionDuplicarToolBar").css("display",consignacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdconsignacionNuevoGuardarCambios").css("display",consignacion_control.strPermisoNuevo);
			jQuery("#tdconsignacionNuevoGuardarCambiosToolBar").css("display",consignacion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(consignacion_control.strPermisoActualizar!=null) {
			jQuery("#tdconsignacionActualizarToolBar").css("display",consignacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdconsignacionCopiar").css("display",consignacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdconsignacionCopiarToolBar").css("display",consignacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdconsignacionConEditar").css("display",consignacion_control.strPermisoActualizar);
		}
		
		jQuery("#tdconsignacionEliminarToolBar").css("display",consignacion_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdconsignacionGuardarCambios").css("display",consignacion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdconsignacionGuardarCambiosToolBar").css("display",consignacion_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trconsignacionElementos").css("display",consignacion_control.strVisibleTablaElementos);
		
		jQuery("#trconsignacionAcciones").css("display",consignacion_control.strVisibleTablaAcciones);
		jQuery("#trconsignacionParametrosAcciones").css("display",consignacion_control.strVisibleTablaAcciones);
			
		jQuery("#tdconsignacionCerrarPagina").css("display",consignacion_control.strPermisoPopup);		
		jQuery("#tdconsignacionCerrarPaginaToolBar").css("display",consignacion_control.strPermisoPopup);
		//jQuery("#trconsignacionAccionesRelaciones").css("display",consignacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		consignacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		consignacion_webcontrol1.registrarEventosControles();
		
		if(consignacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
			consignacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(consignacion_constante1.STR_ES_RELACIONES=="true") {
			if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
				consignacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(consignacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(consignacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				consignacion_webcontrol1.onLoad();
				
			} else {
				if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
					if(consignacion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
						//consignacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(consignacion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(consignacion_constante1.BIG_ID_ACTUAL,"consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
						//consignacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			consignacion_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var consignacion_webcontrol1=new consignacion_webcontrol();

if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = consignacion_webcontrol1.onLoadWindow; 
}

//</script>