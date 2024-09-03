//<script type="text/javascript" language="javascript">



//var cambio_dolarJQueryPaginaWebInteraccion= function (cambio_dolar_control) {
//this.,this.,this.

class cambio_dolar_webcontrol extends cambio_dolar_webcontrol_add {
	
	cambio_dolar_control=null;
	cambio_dolar_controlInicial=null;
	cambio_dolar_controlAuxiliar=null;
		
	//if(cambio_dolar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cambio_dolar_control) {
		super();
		
		this.cambio_dolar_control=cambio_dolar_control;
	}
		
	actualizarVariablesPagina(cambio_dolar_control) {
		
		if(cambio_dolar_control.action=="index" || cambio_dolar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cambio_dolar_control);
			
		} else if(cambio_dolar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cambio_dolar_control);
			
		} else if(cambio_dolar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cambio_dolar_control);
			
		} else if(cambio_dolar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cambio_dolar_control);		
		
		} else if(cambio_dolar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cambio_dolar_control);		
		
		} else if(cambio_dolar_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cambio_dolar_control);		
		
		} else if(cambio_dolar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cambio_dolar_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(cambio_dolar_control.action + " Revisar Manejo");
			
			if(cambio_dolar_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(cambio_dolar_control);
				
				return;
			}
			
			//if(cambio_dolar_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(cambio_dolar_control);
			//}
			
			if(cambio_dolar_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(cambio_dolar_control);
			}
			
			if(cambio_dolar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cambio_dolar_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(cambio_dolar_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(cambio_dolar_control, false);			
			}
			
			if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(cambio_dolar_control);	
			}
			
			if(cambio_dolar_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(cambio_dolar_control);
			}
			
			if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(cambio_dolar_control);
			}
			
			if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(cambio_dolar_control);
			}
			
			if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(cambio_dolar_control);	
			}
			
			if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
			}
			
			if(cambio_dolar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(cambio_dolar_control);
			}
			
			
			if(cambio_dolar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(cambio_dolar_control);			
			}
			
			if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(cambio_dolar_control);
			}
			
			
			if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(cambio_dolar_control);
			}
			
			if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(cambio_dolar_control);
			}				
			
			if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cambio_dolar_control);
			}
			
			if(cambio_dolar_control.usuarioActual!=null && cambio_dolar_control.usuarioActual.field_strUserName!=null &&
			cambio_dolar_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(cambio_dolar_control);			
			}
		}
		
		
		if(cambio_dolar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cambio_dolar_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(cambio_dolar_control) {
		
		this.actualizarPaginaCargaGeneral(cambio_dolar_control);
		this.actualizarPaginaTablaDatos(cambio_dolar_control);
		this.actualizarPaginaCargaGeneralControles(cambio_dolar_control);
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cambio_dolar_control);
		this.actualizarPaginaAreaBusquedas(cambio_dolar_control);
		this.actualizarPaginaCargaCombosFK(cambio_dolar_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cambio_dolar_control) {
		
		this.actualizarPaginaCargaGeneral(cambio_dolar_control);
		this.actualizarPaginaTablaDatos(cambio_dolar_control);
		this.actualizarPaginaCargaGeneralControles(cambio_dolar_control);
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cambio_dolar_control);
		this.actualizarPaginaAreaBusquedas(cambio_dolar_control);
		this.actualizarPaginaCargaCombosFK(cambio_dolar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(cambio_dolar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cambio_dolar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cambio_dolar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(cambio_dolar_control) {
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cambio_dolar_control) {
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cambio_dolar_control) {
		this.actualizarPaginaCargaGeneralControles(cambio_dolar_control);
		this.actualizarPaginaCargaCombosFK(cambio_dolar_control);
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cambio_dolar_control) {
		this.actualizarPaginaAbrirLink(cambio_dolar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);				
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);
		this.actualizarPaginaFormulario(cambio_dolar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);
		this.actualizarPaginaFormulario(cambio_dolar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cambio_dolar_control) {
		this.actualizarPaginaFormulario(cambio_dolar_control);
		this.onLoadCombosDefectoFK(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);
		this.actualizarPaginaFormulario(cambio_dolar_control);
		this.onLoadCombosDefectoFK(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cambio_dolar_control) {
		this.actualizarPaginaCargaGeneralControles(cambio_dolar_control);
		this.actualizarPaginaCargaCombosFK(cambio_dolar_control);
		this.actualizarPaginaFormulario(cambio_dolar_control);
		this.onLoadCombosDefectoFK(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cambio_dolar_control) {
		this.actualizarPaginaAbrirLink(cambio_dolar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cambio_dolar_control) {
		this.actualizarPaginaImprimir(cambio_dolar_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cambio_dolar_control) {
		this.actualizarPaginaImprimir(cambio_dolar_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cambio_dolar_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cambio_dolar_control) {
		//FORMULARIO
		if(cambio_dolar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cambio_dolar_control);
			this.actualizarPaginaFormularioAdd(cambio_dolar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		//COMBOS FK
		if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cambio_dolar_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(cambio_dolar_control) {
		//FORMULARIO
		if(cambio_dolar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cambio_dolar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);	
		//COMBOS FK
		if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cambio_dolar_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control) {
		if(cambio_dolar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cambio_dolar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cambio_dolar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cambio_dolar_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cambio_dolar_control) {
		if(cambio_dolar_funcion1.esPaginaForm()==true) {
			window.opener.cambio_dolar_webcontrol1.actualizarPaginaTablaDatos(cambio_dolar_control);
		} else {
			this.actualizarPaginaTablaDatos(cambio_dolar_control);
		}
	}
	
	actualizarPaginaAbrirLink(cambio_dolar_control) {
		cambio_dolar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cambio_dolar_control.strAuxiliarUrlPagina);
				
		cambio_dolar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cambio_dolar_control.strAuxiliarTipo,cambio_dolar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cambio_dolar_control) {
		cambio_dolar_funcion1.resaltarRestaurarDivMensaje(true,cambio_dolar_control.strAuxiliarMensajeAlert,cambio_dolar_control.strAuxiliarCssMensaje);
			
		if(cambio_dolar_funcion1.esPaginaForm()==true) {
			window.opener.cambio_dolar_funcion1.resaltarRestaurarDivMensaje(true,cambio_dolar_control.strAuxiliarMensajeAlert,cambio_dolar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(cambio_dolar_control) {
		eval(cambio_dolar_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(cambio_dolar_control, mostrar) {
		
		if(mostrar==true) {
			cambio_dolar_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cambio_dolar_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			cambio_dolar_funcion1.mostrarDivMensaje(true,cambio_dolar_control.strAuxiliarMensaje,cambio_dolar_control.strAuxiliarCssMensaje);
		
		} else {
			cambio_dolar_funcion1.mostrarDivMensaje(false,cambio_dolar_control.strAuxiliarMensaje,cambio_dolar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(cambio_dolar_control) {
	
		funcionGeneral.printWebPartPage("cambio_dolar",cambio_dolar_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcambio_dolarsAjaxWebPart").html(cambio_dolar_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("cambio_dolar",jQuery("#divTablaDatosReporteAuxiliarcambio_dolarsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(cambio_dolar_control) {
		this.cambio_dolar_controlInicial=cambio_dolar_control;
			
		if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cambio_dolar_control.strStyleDivArbol,cambio_dolar_control.strStyleDivContent
																,cambio_dolar_control.strStyleDivOpcionesBanner,cambio_dolar_control.strStyleDivExpandirColapsar
																,cambio_dolar_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=cambio_dolar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cambio_dolar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(cambio_dolar_control) {
		jQuery("#divTablaDatoscambio_dolarsAjaxWebPart").html(cambio_dolar_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscambio_dolars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscambio_dolars=jQuery("#tblTablaDatoscambio_dolars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cambio_dolar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cambio_dolar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cambio_dolar_webcontrol1.registrarControlesTableEdition(cambio_dolar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cambio_dolar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(cambio_dolar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cambio_dolar_control.cambio_dolarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cambio_dolar_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(cambio_dolar_control) {
		this.actualizarCssBotonesPagina(cambio_dolar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cambio_dolar_control.tiposReportes,cambio_dolar_control.tiposReporte
															 	,cambio_dolar_control.tiposPaginacion,cambio_dolar_control.tiposAcciones
																,cambio_dolar_control.tiposColumnasSelect,cambio_dolar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cambio_dolar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cambio_dolar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cambio_dolar_control);			
	}
	
	actualizarPaginaAreaBusquedas(cambio_dolar_control) {
		jQuery("#divBusquedacambio_dolarAjaxWebPart").css("display",cambio_dolar_control.strPermisoBusqueda);
		jQuery("#trcambio_dolarCabeceraBusquedas").css("display",cambio_dolar_control.strPermisoBusqueda);
		jQuery("#trBusquedacambio_dolar").css("display",cambio_dolar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cambio_dolar_control.htmlTablaOrderBy!=null
			&& cambio_dolar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycambio_dolarAjaxWebPart").html(cambio_dolar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cambio_dolar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cambio_dolar_control.htmlTablaOrderByRel!=null
			&& cambio_dolar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcambio_dolarAjaxWebPart").html(cambio_dolar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cambio_dolar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacambio_dolarAjaxWebPart").css("display","none");
			jQuery("#trcambio_dolarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacambio_dolar").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(cambio_dolar_control) {
		jQuery("#tdcambio_dolarNuevo").css("display",cambio_dolar_control.strPermisoNuevo);
		jQuery("#trcambio_dolarElementos").css("display",cambio_dolar_control.strVisibleTablaElementos);
		jQuery("#trcambio_dolarAcciones").css("display",cambio_dolar_control.strVisibleTablaAcciones);
		jQuery("#trcambio_dolarParametrosAcciones").css("display",cambio_dolar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cambio_dolar_control) {
	
		this.actualizarCssBotonesMantenimiento(cambio_dolar_control);
				
		if(cambio_dolar_control.cambio_dolarActual!=null) {//form
			
			this.actualizarCamposFormulario(cambio_dolar_control);			
		}
						
		this.actualizarSpanMensajesCampos(cambio_dolar_control);
	}
	
	actualizarPaginaUsuarioInvitado(cambio_dolar_control) {
	
		var indexPosition=cambio_dolar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cambio_dolar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(cambio_dolar_control) {
		jQuery("#divResumencambio_dolarActualAjaxWebPart").html(cambio_dolar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cambio_dolar_control) {
		jQuery("#divAccionesRelacionescambio_dolarAjaxWebPart").html(cambio_dolar_control.htmlTablaAccionesRelaciones);
			
		cambio_dolar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cambio_dolar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cambio_dolar_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cambio_dolar_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncambio_dolar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cambio_dolar",id,"contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cambio_dolar_control) {
	
		jQuery("#form"+cambio_dolar_constante1.STR_SUFIJO+"-id").val(cambio_dolar_control.cambio_dolarActual.id);
		jQuery("#form"+cambio_dolar_constante1.STR_SUFIJO+"-version_row").val(cambio_dolar_control.cambio_dolarActual.versionRow);
		jQuery("#form"+cambio_dolar_constante1.STR_SUFIJO+"-fecha_cambio").val(cambio_dolar_control.cambio_dolarActual.fecha_cambio);
		jQuery("#form"+cambio_dolar_constante1.STR_SUFIJO+"-dolar_compra").val(cambio_dolar_control.cambio_dolarActual.dolar_compra);
		jQuery("#form"+cambio_dolar_constante1.STR_SUFIJO+"-dolar_venta").val(cambio_dolar_control.cambio_dolarActual.dolar_venta);
		jQuery("#form"+cambio_dolar_constante1.STR_SUFIJO+"-origen").val(cambio_dolar_control.cambio_dolarActual.origen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cambio_dolar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cambio_dolar","contabilidad","","form_cambio_dolar",formulario,"","",paraEventoTabla,idFilaTabla,cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
	}
	
	cargarCombosFK(cambio_dolar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cambio_dolar_control.strRecargarFkTiposNinguno!=null && cambio_dolar_control.strRecargarFkTiposNinguno!='NINGUNO' && cambio_dolar_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(cambio_dolar_control) {
		jQuery("#spanstrMensajeid").text(cambio_dolar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cambio_dolar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajefecha_cambio").text(cambio_dolar_control.strMensajefecha_cambio);		
		jQuery("#spanstrMensajedolar_compra").text(cambio_dolar_control.strMensajedolar_compra);		
		jQuery("#spanstrMensajedolar_venta").text(cambio_dolar_control.strMensajedolar_venta);		
		jQuery("#spanstrMensajeorigen").text(cambio_dolar_control.strMensajeorigen);		
	}
	
	actualizarCssBotonesMantenimiento(cambio_dolar_control) {
		jQuery("#tdbtnNuevocambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocambio_dolar").css("display",cambio_dolar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcambio_dolar").css("display",cambio_dolar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcambio_dolar").css("display",cambio_dolar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscambio_dolar").css("display",cambio_dolar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(cambio_dolar_control) {
		var i=0;
		
		i=cambio_dolar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cambio_dolar_control.cambio_dolarActual.id);
		jQuery("#t-version_row_"+i+"").val(cambio_dolar_control.cambio_dolarActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(cambio_dolar_control.cambio_dolarActual.fecha_cambio);
		jQuery("#t-cel_"+i+"_3").val(cambio_dolar_control.cambio_dolarActual.dolar_compra);
		jQuery("#t-cel_"+i+"_4").val(cambio_dolar_control.cambio_dolarActual.dolar_venta);
		jQuery("#t-cel_"+i+"_5").val(cambio_dolar_control.cambio_dolarActual.origen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cambio_dolar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(cambio_dolar_control) {
		cambio_dolar_funcion1.registrarControlesTableValidacionEdition(cambio_dolar_control,cambio_dolar_webcontrol1,cambio_dolar_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolarConstante,strParametros);
		
		//cambio_dolar_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cambio_dolar_control
		
	
	}
	
	onLoadCombosDefectoFK(cambio_dolar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cambio_dolar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(cambio_dolar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cambio_dolar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cambio_dolar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cambio_dolar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cambio_dolar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cambio_dolar");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cambio_dolar");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cambio_dolar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);			
			
			if(cambio_dolar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,"cambio_dolar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			cambio_dolar_funcion1.validarFormularioJQuery(cambio_dolar_constante1);
			
			if(cambio_dolar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cambio_dolar_control) {
		
		jQuery("#divBusquedacambio_dolarAjaxWebPart").css("display",cambio_dolar_control.strPermisoBusqueda);
		jQuery("#trcambio_dolarCabeceraBusquedas").css("display",cambio_dolar_control.strPermisoBusqueda);
		jQuery("#trBusquedacambio_dolar").css("display",cambio_dolar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecambio_dolar").css("display",cambio_dolar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscambio_dolar").attr("style",cambio_dolar_control.strPermisoMostrarTodos);
		
		if(cambio_dolar_control.strPermisoNuevo!=null) {
			jQuery("#tdcambio_dolarNuevo").css("display",cambio_dolar_control.strPermisoNuevo);
			jQuery("#tdcambio_dolarNuevoToolBar").css("display",cambio_dolar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcambio_dolarDuplicar").css("display",cambio_dolar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcambio_dolarDuplicarToolBar").css("display",cambio_dolar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcambio_dolarNuevoGuardarCambios").css("display",cambio_dolar_control.strPermisoNuevo);
			jQuery("#tdcambio_dolarNuevoGuardarCambiosToolBar").css("display",cambio_dolar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cambio_dolar_control.strPermisoActualizar!=null) {
			jQuery("#tdcambio_dolarActualizarToolBar").css("display",cambio_dolar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcambio_dolarCopiar").css("display",cambio_dolar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcambio_dolarCopiarToolBar").css("display",cambio_dolar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcambio_dolarConEditar").css("display",cambio_dolar_control.strPermisoActualizar);
		}
		
		jQuery("#tdcambio_dolarEliminarToolBar").css("display",cambio_dolar_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcambio_dolarGuardarCambios").css("display",cambio_dolar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcambio_dolarGuardarCambiosToolBar").css("display",cambio_dolar_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcambio_dolarElementos").css("display",cambio_dolar_control.strVisibleTablaElementos);
		
		jQuery("#trcambio_dolarAcciones").css("display",cambio_dolar_control.strVisibleTablaAcciones);
		jQuery("#trcambio_dolarParametrosAcciones").css("display",cambio_dolar_control.strVisibleTablaAcciones);
			
		jQuery("#tdcambio_dolarCerrarPagina").css("display",cambio_dolar_control.strPermisoPopup);		
		jQuery("#tdcambio_dolarCerrarPaginaToolBar").css("display",cambio_dolar_control.strPermisoPopup);
		//jQuery("#trcambio_dolarAccionesRelaciones").css("display",cambio_dolar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cambio_dolar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cambio_dolar_webcontrol1.registrarEventosControles();
		
		if(cambio_dolar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
			cambio_dolar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cambio_dolar_constante1.STR_ES_RELACIONES=="true") {
			if(cambio_dolar_constante1.BIT_ES_PAGINA_FORM==true) {
				cambio_dolar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cambio_dolar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(cambio_dolar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cambio_dolar_webcontrol1.onLoad();
				
			} else {
				if(cambio_dolar_constante1.BIT_ES_PAGINA_FORM==true) {
					if(cambio_dolar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
						//cambio_dolar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(cambio_dolar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cambio_dolar_constante1.BIG_ID_ACTUAL,"cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
						//cambio_dolar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			cambio_dolar_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var cambio_dolar_webcontrol1=new cambio_dolar_webcontrol();

if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cambio_dolar_webcontrol1.onLoadWindow; 
}

//</script>