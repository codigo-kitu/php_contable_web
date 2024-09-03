//<script type="text/javascript" language="javascript">



//var parametro_generalJQueryPaginaWebInteraccion= function (parametro_general_control) {
//this.,this.,this.

class parametro_general_webcontrol extends parametro_general_webcontrol_add {
	
	parametro_general_control=null;
	parametro_general_controlInicial=null;
	parametro_general_controlAuxiliar=null;
		
	//if(parametro_general_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_general_control) {
		super();
		
		this.parametro_general_control=parametro_general_control;
	}
		
	actualizarVariablesPagina(parametro_general_control) {
		
		if(parametro_general_control.action=="index" || parametro_general_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_general_control);
			
		} else if(parametro_general_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_general_control);
		
		} else if(parametro_general_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_general_control);
		
		} else if(parametro_general_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_general_control);
		
		} else if(parametro_general_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_general_control);
			
		} else if(parametro_general_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_general_control);
			
		} else if(parametro_general_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_general_control);
		
		} else if(parametro_general_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_general_control);
		
		} else if(parametro_general_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_general_control);
		
		} else if(parametro_general_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_general_control);
		
		} else if(parametro_general_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_general_control);
		
		} else if(parametro_general_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_general_control);
		
		} else if(parametro_general_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_general_control);
		
		} else if(parametro_general_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_general_control);
		
		} else if(parametro_general_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_general_control);
		
		} else if(parametro_general_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_general_control);
		
		} else if(parametro_general_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_general_control);
		
		} else if(parametro_general_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_general_control);
		
		} else if(parametro_general_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_general_control);
		
		} else if(parametro_general_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_general_control);
		
		} else if(parametro_general_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_general_control);
		
		} else if(parametro_general_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_general_control);
		
		} else if(parametro_general_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_general_control);
		
		} else if(parametro_general_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_general_control);
		
		} else if(parametro_general_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_general_control);
		
		} else if(parametro_general_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_general_control);
		
		} else if(parametro_general_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_general_control);
		
		} else if(parametro_general_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_general_control);		
		
		} else if(parametro_general_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_general_control);		
		
		} else if(parametro_general_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_general_control);		
		
		} else if(parametro_general_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_general_control);		
		}
		else if(parametro_general_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_general_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(parametro_general_control.action + " Revisar Manejo");
			
			if(parametro_general_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(parametro_general_control);
				
				return;
			}
			
			//if(parametro_general_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(parametro_general_control);
			//}
			
			if(parametro_general_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(parametro_general_control);
			}
			
			if(parametro_general_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_general_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(parametro_general_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(parametro_general_control, false);			
			}
			
			if(parametro_general_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(parametro_general_control);	
			}
			
			if(parametro_general_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(parametro_general_control);
			}
			
			if(parametro_general_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(parametro_general_control);
			}
			
			if(parametro_general_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(parametro_general_control);
			}
			
			if(parametro_general_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(parametro_general_control);	
			}
			
			if(parametro_general_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(parametro_general_control);
			}
			
			if(parametro_general_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(parametro_general_control);
			}
			
			
			if(parametro_general_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(parametro_general_control);			
			}
			
			if(parametro_general_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(parametro_general_control);
			}
			
			
			if(parametro_general_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(parametro_general_control);
			}
			
			if(parametro_general_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(parametro_general_control);
			}				
			
			if(parametro_general_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_general_control);
			}
			
			if(parametro_general_control.usuarioActual!=null && parametro_general_control.usuarioActual.field_strUserName!=null &&
			parametro_general_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(parametro_general_control);			
			}
		}
		
		
		if(parametro_general_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_general_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(parametro_general_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_general_control);
		this.actualizarPaginaTablaDatos(parametro_general_control);
		this.actualizarPaginaCargaGeneralControles(parametro_general_control);
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_general_control);
		this.actualizarPaginaAreaBusquedas(parametro_general_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_general_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_general_control);
		this.actualizarPaginaTablaDatos(parametro_general_control);
		this.actualizarPaginaCargaGeneralControles(parametro_general_control);
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_general_control);
		this.actualizarPaginaAreaBusquedas(parametro_general_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(parametro_general_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_control);		
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_general_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_control);		
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_general_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_control);		
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_general_control) {
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_general_control) {
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_general_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_general_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_control);
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_general_control) {
		this.actualizarPaginaAbrirLink(parametro_general_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);				
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);
		this.actualizarPaginaFormulario(parametro_general_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);
		this.actualizarPaginaFormulario(parametro_general_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_general_control) {
		this.actualizarPaginaFormulario(parametro_general_control);
		this.onLoadCombosDefectoFK(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);
		this.actualizarPaginaFormulario(parametro_general_control);
		this.onLoadCombosDefectoFK(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_general_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_general_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_control);
		this.actualizarPaginaFormulario(parametro_general_control);
		this.onLoadCombosDefectoFK(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_general_control) {
		this.actualizarPaginaAbrirLink(parametro_general_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_general_control) {
		this.actualizarPaginaImprimir(parametro_general_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_general_control) {
		this.actualizarPaginaImprimir(parametro_general_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_general_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_general_control) {
		//FORMULARIO
		if(parametro_general_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_control);
			this.actualizarPaginaFormularioAdd(parametro_general_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		//COMBOS FK
		if(parametro_general_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_general_control) {
		//FORMULARIO
		if(parametro_general_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);	
		//COMBOS FK
		if(parametro_general_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_general_control) {
		//FORMULARIO
		if(parametro_general_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_general_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);	
		//COMBOS FK
		if(parametro_general_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(parametro_general_control) {
		if(parametro_general_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_general_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_general_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_general_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_general_control) {
		if(parametro_general_funcion1.esPaginaForm()==true) {
			window.opener.parametro_general_webcontrol1.actualizarPaginaTablaDatos(parametro_general_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_general_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_general_control) {
		parametro_general_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_general_control.strAuxiliarUrlPagina);
				
		parametro_general_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_general_control.strAuxiliarTipo,parametro_general_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_general_control) {
		parametro_general_funcion1.resaltarRestaurarDivMensaje(true,parametro_general_control.strAuxiliarMensajeAlert,parametro_general_control.strAuxiliarCssMensaje);
			
		if(parametro_general_funcion1.esPaginaForm()==true) {
			window.opener.parametro_general_funcion1.resaltarRestaurarDivMensaje(true,parametro_general_control.strAuxiliarMensajeAlert,parametro_general_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(parametro_general_control) {
		eval(parametro_general_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(parametro_general_control, mostrar) {
		
		if(mostrar==true) {
			parametro_general_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_general_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			parametro_general_funcion1.mostrarDivMensaje(true,parametro_general_control.strAuxiliarMensaje,parametro_general_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_general_funcion1.mostrarDivMensaje(false,parametro_general_control.strAuxiliarMensaje,parametro_general_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(parametro_general_control) {
	
		funcionGeneral.printWebPartPage("parametro_general",parametro_general_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarparametro_generalsAjaxWebPart").html(parametro_general_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("parametro_general",jQuery("#divTablaDatosReporteAuxiliarparametro_generalsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(parametro_general_control) {
		this.parametro_general_controlInicial=parametro_general_control;
			
		if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_general_control.strStyleDivArbol,parametro_general_control.strStyleDivContent
																,parametro_general_control.strStyleDivOpcionesBanner,parametro_general_control.strStyleDivExpandirColapsar
																,parametro_general_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_general_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_general_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(parametro_general_control) {
		jQuery("#divTablaDatosparametro_generalsAjaxWebPart").html(parametro_general_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_generals=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_generals=jQuery("#tblTablaDatosparametro_generals").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_general",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_general_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_general_webcontrol1.registrarControlesTableEdition(parametro_general_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_general_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(parametro_general_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_general_control.parametro_generalActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_general_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(parametro_general_control) {
		this.actualizarCssBotonesPagina(parametro_general_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_general_control.tiposReportes,parametro_general_control.tiposReporte
															 	,parametro_general_control.tiposPaginacion,parametro_general_control.tiposAcciones
																,parametro_general_control.tiposColumnasSelect,parametro_general_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_general_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_general_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_general_control);			
	}
	
	actualizarPaginaAreaBusquedas(parametro_general_control) {
		jQuery("#divBusquedaparametro_generalAjaxWebPart").css("display",parametro_general_control.strPermisoBusqueda);
		jQuery("#trparametro_generalCabeceraBusquedas").css("display",parametro_general_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_general").css("display",parametro_general_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_general_control.htmlTablaOrderBy!=null
			&& parametro_general_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_generalAjaxWebPart").html(parametro_general_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_general_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_general_control.htmlTablaOrderByRel!=null
			&& parametro_general_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_generalAjaxWebPart").html(parametro_general_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_general_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_generalAjaxWebPart").css("display","none");
			jQuery("#trparametro_generalCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_general").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(parametro_general_control) {
		jQuery("#tdparametro_generalNuevo").css("display",parametro_general_control.strPermisoNuevo);
		jQuery("#trparametro_generalElementos").css("display",parametro_general_control.strVisibleTablaElementos);
		jQuery("#trparametro_generalAcciones").css("display",parametro_general_control.strVisibleTablaAcciones);
		jQuery("#trparametro_generalParametrosAcciones").css("display",parametro_general_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_general_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_general_control);
				
		if(parametro_general_control.parametro_generalActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_general_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_general_control);
	}
	
	actualizarPaginaUsuarioInvitado(parametro_general_control) {
	
		var indexPosition=parametro_general_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_general_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_general_control) {
		jQuery("#divResumenparametro_generalActualAjaxWebPart").html(parametro_general_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_general_control) {
		jQuery("#divAccionesRelacionesparametro_generalAjaxWebPart").html(parametro_general_control.htmlTablaAccionesRelaciones);
			
		parametro_general_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_general_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_general_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_general_control) {
		
		if(parametro_general_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_general_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_general_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+parametro_general_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_general_control.strVisibleFK_Idempresa);
		}

		if(parametro_general_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais").attr("style",parametro_general_control.strVisibleFK_Idpais);
			jQuery("#tblstrVisible"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais").attr("style",parametro_general_control.strVisibleFK_Idpais);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_general();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_general",id,"general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		parametro_general_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_general","empresa","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
	}

	abrirBusquedaParapais(strNombreCampoBusqueda){//idActual
		parametro_general_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_general","pais","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_general_control) {
	
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id").val(parametro_general_control.parametro_generalActual.id);
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-version_row").val(parametro_general_control.parametro_generalActual.versionRow);
		
		if(parametro_general_control.parametro_generalActual.id_empresa!=null && parametro_general_control.parametro_generalActual.id_empresa>-1){
			if(jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_general_control.parametro_generalActual.id_empresa) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val(parametro_general_control.parametro_generalActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_general_control.parametro_generalActual.id_pais!=null && parametro_general_control.parametro_generalActual.id_pais>-1){
			if(jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val() != parametro_general_control.parametro_generalActual.id_pais) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val(parametro_general_control.parametro_generalActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-simbolo_moneda").val(parametro_general_control.parametro_generalActual.simbolo_moneda);
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-numero_decimales").val(parametro_general_control.parametro_generalActual.numero_decimales);
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-con_formato_fecha_mda").prop('checked',parametro_general_control.parametro_generalActual.con_formato_fecha_mda);
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-con_formato_cantidad_coma").prop('checked',parametro_general_control.parametro_generalActual.con_formato_cantidad_coma);
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-iva_porciento").val(parametro_general_control.parametro_generalActual.iva_porciento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_general_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_general","general","","form_parametro_general",formulario,"","",paraEventoTabla,idFilaTabla,parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
	}
	
	cargarCombosFK(parametro_general_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.cargarCombosempresasFK(parametro_general_control);
			}

			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.cargarCombospaissFK(parametro_general_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_general_control.strRecargarFkTiposNinguno!=null && parametro_general_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_general_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_general_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_webcontrol1.cargarCombosempresasFK(parametro_general_control);
				}

				if(parametro_general_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",parametro_general_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_webcontrol1.cargarCombospaissFK(parametro_general_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(parametro_general_control) {
		jQuery("#spanstrMensajeid").text(parametro_general_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_general_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(parametro_general_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_pais").text(parametro_general_control.strMensajeid_pais);		
		jQuery("#spanstrMensajesimbolo_moneda").text(parametro_general_control.strMensajesimbolo_moneda);		
		jQuery("#spanstrMensajenumero_decimales").text(parametro_general_control.strMensajenumero_decimales);		
		jQuery("#spanstrMensajecon_formato_fecha_mda").text(parametro_general_control.strMensajecon_formato_fecha_mda);		
		jQuery("#spanstrMensajecon_formato_cantidad_coma").text(parametro_general_control.strMensajecon_formato_cantidad_coma);		
		jQuery("#spanstrMensajeiva_porciento").text(parametro_general_control.strMensajeiva_porciento);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_general_control) {
		jQuery("#tdbtnNuevoparametro_general").css("visibility",parametro_general_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_general").css("display",parametro_general_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_general").css("visibility",parametro_general_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_general").css("display",parametro_general_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_general").css("visibility",parametro_general_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_general").css("display",parametro_general_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_general").css("visibility",parametro_general_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_general").css("visibility",parametro_general_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_general").css("display",parametro_general_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_general").css("visibility",parametro_general_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_general").css("visibility",parametro_general_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_general").css("visibility",parametro_general_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(parametro_general_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_funcion1,parametro_general_control.empresasFK);
	}

	cargarComboEditarTablapaisFK(parametro_general_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_funcion1,parametro_general_control.paissFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(parametro_general_control) {
		var i=0;
		
		i=parametro_general_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_general_control.parametro_generalActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_general_control.parametro_generalActual.versionRow);
		
		if(parametro_general_control.parametro_generalActual.id_empresa!=null && parametro_general_control.parametro_generalActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != parametro_general_control.parametro_generalActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(parametro_general_control.parametro_generalActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_general_control.parametro_generalActual.id_pais!=null && parametro_general_control.parametro_generalActual.id_pais>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != parametro_general_control.parametro_generalActual.id_pais) {
				jQuery("#t-cel_"+i+"_3").val(parametro_general_control.parametro_generalActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(parametro_general_control.parametro_generalActual.simbolo_moneda);
		jQuery("#t-cel_"+i+"_5").val(parametro_general_control.parametro_generalActual.numero_decimales);
		jQuery("#t-cel_"+i+"_6").prop('checked',parametro_general_control.parametro_generalActual.con_formato_fecha_mda);
		jQuery("#t-cel_"+i+"_7").prop('checked',parametro_general_control.parametro_generalActual.con_formato_cantidad_coma);
		jQuery("#t-cel_"+i+"_8").val(parametro_general_control.parametro_generalActual.iva_porciento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_general_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_general_control) {
		parametro_general_funcion1.registrarControlesTableValidacionEdition(parametro_general_control,parametro_general_webcontrol1,parametro_general_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_generalConstante,strParametros);
		
		//parametro_general_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(parametro_general_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa",parametro_general_control.empresasFK);

		if(parametro_general_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_control.idFilaTablaActual+"_2",parametro_general_control.empresasFK);
		}
	};

	cargarCombospaissFK(parametro_general_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais",parametro_general_control.paissFK);

		if(parametro_general_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_control.idFilaTablaActual+"_3",parametro_general_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",parametro_general_control.paissFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_general_control) {

	};

	registrarComboActionChangeCombospaissFK(parametro_general_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_general_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_general_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val(parametro_general_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(parametro_general_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_control.idpaisDefaultFK>-1 && jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val() != parametro_general_control.idpaisDefaultFK) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val(parametro_general_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(parametro_general_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_general_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_general_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.setDefectoValorCombosempresasFK(parametro_general_control);
			}

			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.setDefectoValorCombospaissFK(parametro_general_control);
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
	onLoadCombosEventosFK(parametro_general_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_general_control);
			//}

			//if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",parametro_general_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_webcontrol1.registrarComboActionChangeCombospaissFK(parametro_general_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_general_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_general_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_general");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_general");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_general_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);			
			
			if(parametro_general_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,"parametro_general");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_general_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				parametro_general_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_general","FK_Idempresa","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_general","FK_Idpais","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			parametro_general_funcion1.validarFormularioJQuery(parametro_general_constante1);
			
			if(parametro_general_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_general_control) {
		
		jQuery("#divBusquedaparametro_generalAjaxWebPart").css("display",parametro_general_control.strPermisoBusqueda);
		jQuery("#trparametro_generalCabeceraBusquedas").css("display",parametro_general_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_general").css("display",parametro_general_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_general").css("display",parametro_general_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_general").attr("style",parametro_general_control.strPermisoMostrarTodos);
		
		if(parametro_general_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_generalNuevo").css("display",parametro_general_control.strPermisoNuevo);
			jQuery("#tdparametro_generalNuevoToolBar").css("display",parametro_general_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_generalDuplicar").css("display",parametro_general_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_generalDuplicarToolBar").css("display",parametro_general_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_generalNuevoGuardarCambios").css("display",parametro_general_control.strPermisoNuevo);
			jQuery("#tdparametro_generalNuevoGuardarCambiosToolBar").css("display",parametro_general_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_general_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_generalActualizarToolBar").css("display",parametro_general_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_generalCopiar").css("display",parametro_general_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_generalCopiarToolBar").css("display",parametro_general_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_generalConEditar").css("display",parametro_general_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_generalEliminarToolBar").css("display",parametro_general_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdparametro_generalGuardarCambios").css("display",parametro_general_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_generalGuardarCambiosToolBar").css("display",parametro_general_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trparametro_generalElementos").css("display",parametro_general_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_generalAcciones").css("display",parametro_general_control.strVisibleTablaAcciones);
		jQuery("#trparametro_generalParametrosAcciones").css("display",parametro_general_control.strVisibleTablaAcciones);
			
		jQuery("#tdparametro_generalCerrarPagina").css("display",parametro_general_control.strPermisoPopup);		
		jQuery("#tdparametro_generalCerrarPaginaToolBar").css("display",parametro_general_control.strPermisoPopup);
		//jQuery("#trparametro_generalAccionesRelaciones").css("display",parametro_general_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_general_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_general_webcontrol1.registrarEventosControles();
		
		if(parametro_general_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
			parametro_general_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_general_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_general_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_general_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_general_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(parametro_general_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_general_webcontrol1.onLoad();
				
			} else {
				if(parametro_general_constante1.BIT_ES_PAGINA_FORM==true) {
					if(parametro_general_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
						//parametro_general_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(parametro_general_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_general_constante1.BIG_ID_ACTUAL,"parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
						//parametro_general_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			parametro_general_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var parametro_general_webcontrol1=new parametro_general_webcontrol();

if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_general_webcontrol1.onLoadWindow; 
}

//</script>