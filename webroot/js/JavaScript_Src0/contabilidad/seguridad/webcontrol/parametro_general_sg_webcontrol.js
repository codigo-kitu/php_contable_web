//<script type="text/javascript" language="javascript">



//var parametro_general_sgJQueryPaginaWebInteraccion= function (parametro_general_sg_control) {
//this.,this.,this.

class parametro_general_sg_webcontrol extends parametro_general_sg_webcontrol_add {
	
	parametro_general_sg_control=null;
	parametro_general_sg_controlInicial=null;
	parametro_general_sg_controlAuxiliar=null;
		
	//if(parametro_general_sg_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_general_sg_control) {
		super();
		
		this.parametro_general_sg_control=parametro_general_sg_control;
	}
		
	actualizarVariablesPagina(parametro_general_sg_control) {
		
		if(parametro_general_sg_control.action=="index" || parametro_general_sg_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_general_sg_control);
			
		} else if(parametro_general_sg_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_general_sg_control);
			
		} else if(parametro_general_sg_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_general_sg_control);
			
		} else if(parametro_general_sg_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_general_sg_control);		
		
		} else if(parametro_general_sg_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_general_sg_control);		
		
		} else if(parametro_general_sg_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_general_sg_control);		
		
		} else if(parametro_general_sg_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_general_sg_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(parametro_general_sg_control.action + " Revisar Manejo");
			
			if(parametro_general_sg_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(parametro_general_sg_control);
				
				return;
			}
			
			//if(parametro_general_sg_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(parametro_general_sg_control);
			//}
			
			if(parametro_general_sg_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(parametro_general_sg_control);
			}
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_general_sg_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(parametro_general_sg_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(parametro_general_sg_control, false);			
			}
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(parametro_general_sg_control);	
			}
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(parametro_general_sg_control);
			}
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(parametro_general_sg_control);
			}
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(parametro_general_sg_control);
			}
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(parametro_general_sg_control);	
			}
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
			}
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(parametro_general_sg_control);
			}
			
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(parametro_general_sg_control);			
			}
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(parametro_general_sg_control);
			}
			
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(parametro_general_sg_control);
			}
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(parametro_general_sg_control);
			}				
			
			if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_general_sg_control);
			}
			
			if(parametro_general_sg_control.usuarioActual!=null && parametro_general_sg_control.usuarioActual.field_strUserName!=null &&
			parametro_general_sg_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(parametro_general_sg_control);			
			}
		}
		
		
		if(parametro_general_sg_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_general_sg_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(parametro_general_sg_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_general_sg_control);
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);
		this.actualizarPaginaCargaGeneralControles(parametro_general_sg_control);
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_general_sg_control);
		this.actualizarPaginaAreaBusquedas(parametro_general_sg_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_sg_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_general_sg_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_general_sg_control);
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);
		this.actualizarPaginaCargaGeneralControles(parametro_general_sg_control);
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_general_sg_control);
		this.actualizarPaginaAreaBusquedas(parametro_general_sg_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_sg_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);		
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);		
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);		
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_general_sg_control) {
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_general_sg_control) {
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_general_sg_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_general_sg_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_sg_control);
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_general_sg_control) {
		this.actualizarPaginaAbrirLink(parametro_general_sg_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);				
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);
		this.actualizarPaginaFormulario(parametro_general_sg_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);
		this.actualizarPaginaFormulario(parametro_general_sg_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_general_sg_control) {
		this.actualizarPaginaFormulario(parametro_general_sg_control);
		this.onLoadCombosDefectoFK(parametro_general_sg_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);
		this.actualizarPaginaFormulario(parametro_general_sg_control);
		this.onLoadCombosDefectoFK(parametro_general_sg_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_general_sg_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_general_sg_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_sg_control);
		this.actualizarPaginaFormulario(parametro_general_sg_control);
		this.onLoadCombosDefectoFK(parametro_general_sg_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_general_sg_control) {
		this.actualizarPaginaAbrirLink(parametro_general_sg_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_general_sg_control) {
		this.actualizarPaginaImprimir(parametro_general_sg_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_general_sg_control) {
		this.actualizarPaginaImprimir(parametro_general_sg_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_general_sg_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_general_sg_control) {
		//FORMULARIO
		if(parametro_general_sg_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_sg_control);
			this.actualizarPaginaFormularioAdd(parametro_general_sg_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		//COMBOS FK
		if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_sg_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_general_sg_control) {
		//FORMULARIO
		if(parametro_general_sg_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_sg_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);	
		//COMBOS FK
		if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_sg_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control) {
		if(parametro_general_sg_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_general_sg_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_general_sg_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_general_sg_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_general_sg_control) {
		if(parametro_general_sg_funcion1.esPaginaForm()==true) {
			window.opener.parametro_general_sg_webcontrol1.actualizarPaginaTablaDatos(parametro_general_sg_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_general_sg_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_general_sg_control) {
		parametro_general_sg_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_general_sg_control.strAuxiliarUrlPagina);
				
		parametro_general_sg_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_general_sg_control.strAuxiliarTipo,parametro_general_sg_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_general_sg_control) {
		parametro_general_sg_funcion1.resaltarRestaurarDivMensaje(true,parametro_general_sg_control.strAuxiliarMensajeAlert,parametro_general_sg_control.strAuxiliarCssMensaje);
			
		if(parametro_general_sg_funcion1.esPaginaForm()==true) {
			window.opener.parametro_general_sg_funcion1.resaltarRestaurarDivMensaje(true,parametro_general_sg_control.strAuxiliarMensajeAlert,parametro_general_sg_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(parametro_general_sg_control) {
		eval(parametro_general_sg_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(parametro_general_sg_control, mostrar) {
		
		if(mostrar==true) {
			parametro_general_sg_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_general_sg_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			parametro_general_sg_funcion1.mostrarDivMensaje(true,parametro_general_sg_control.strAuxiliarMensaje,parametro_general_sg_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_general_sg_funcion1.mostrarDivMensaje(false,parametro_general_sg_control.strAuxiliarMensaje,parametro_general_sg_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(parametro_general_sg_control) {
	
		funcionGeneral.printWebPartPage("parametro_general_sg",parametro_general_sg_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarparametro_general_sgsAjaxWebPart").html(parametro_general_sg_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("parametro_general_sg",jQuery("#divTablaDatosReporteAuxiliarparametro_general_sgsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(parametro_general_sg_control) {
		this.parametro_general_sg_controlInicial=parametro_general_sg_control;
			
		if(parametro_general_sg_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_general_sg_control.strStyleDivArbol,parametro_general_sg_control.strStyleDivContent
																,parametro_general_sg_control.strStyleDivOpcionesBanner,parametro_general_sg_control.strStyleDivExpandirColapsar
																,parametro_general_sg_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_general_sg_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_general_sg_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(parametro_general_sg_control) {
		jQuery("#divTablaDatosparametro_general_sgsAjaxWebPart").html(parametro_general_sg_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_general_sgs=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_general_sg_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_general_sgs=jQuery("#tblTablaDatosparametro_general_sgs").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_general_sg",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_general_sg_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_general_sg_webcontrol1.registrarControlesTableEdition(parametro_general_sg_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_general_sg_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(parametro_general_sg_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_general_sg_control.parametro_general_sgActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_general_sg_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(parametro_general_sg_control) {
		this.actualizarCssBotonesPagina(parametro_general_sg_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_general_sg_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_general_sg_control.tiposReportes,parametro_general_sg_control.tiposReporte
															 	,parametro_general_sg_control.tiposPaginacion,parametro_general_sg_control.tiposAcciones
																,parametro_general_sg_control.tiposColumnasSelect,parametro_general_sg_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_general_sg_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_general_sg_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_general_sg_control);			
	}
	
	actualizarPaginaAreaBusquedas(parametro_general_sg_control) {
		jQuery("#divBusquedaparametro_general_sgAjaxWebPart").css("display",parametro_general_sg_control.strPermisoBusqueda);
		jQuery("#trparametro_general_sgCabeceraBusquedas").css("display",parametro_general_sg_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_general_sg").css("display",parametro_general_sg_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_general_sg_control.htmlTablaOrderBy!=null
			&& parametro_general_sg_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_general_sgAjaxWebPart").html(parametro_general_sg_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_general_sg_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_general_sg_control.htmlTablaOrderByRel!=null
			&& parametro_general_sg_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_general_sgAjaxWebPart").html(parametro_general_sg_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_general_sg_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_general_sgAjaxWebPart").css("display","none");
			jQuery("#trparametro_general_sgCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_general_sg").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(parametro_general_sg_control) {
		jQuery("#tdparametro_general_sgNuevo").css("display",parametro_general_sg_control.strPermisoNuevo);
		jQuery("#trparametro_general_sgElementos").css("display",parametro_general_sg_control.strVisibleTablaElementos);
		jQuery("#trparametro_general_sgAcciones").css("display",parametro_general_sg_control.strVisibleTablaAcciones);
		jQuery("#trparametro_general_sgParametrosAcciones").css("display",parametro_general_sg_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_general_sg_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_general_sg_control);
				
		if(parametro_general_sg_control.parametro_general_sgActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_general_sg_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_general_sg_control);
	}
	
	actualizarPaginaUsuarioInvitado(parametro_general_sg_control) {
	
		var indexPosition=parametro_general_sg_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_general_sg_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_general_sg_control) {
		jQuery("#divResumenparametro_general_sgActualAjaxWebPart").html(parametro_general_sg_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_general_sg_control) {
		jQuery("#divAccionesRelacionesparametro_general_sgAjaxWebPart").html(parametro_general_sg_control.htmlTablaAccionesRelaciones);
			
		parametro_general_sg_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_general_sg_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_general_sg_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_general_sg_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_general_sg();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_general_sg",id,"seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_general_sg_control) {
	
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-id").val(parametro_general_sg_control.parametro_general_sgActual.id);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-version_row").val(parametro_general_sg_control.parametro_general_sgActual.versionRow);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-nombre_sistema").val(parametro_general_sg_control.parametro_general_sgActual.nombre_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-nombre_simple_sistema").val(parametro_general_sg_control.parametro_general_sgActual.nombre_simple_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-nombre_empresa").val(parametro_general_sg_control.parametro_general_sgActual.nombre_empresa);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-version_sistema").val(parametro_general_sg_control.parametro_general_sgActual.version_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-siglas_sistema").val(parametro_general_sg_control.parametro_general_sgActual.siglas_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-mail_sistema").val(parametro_general_sg_control.parametro_general_sgActual.mail_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-telefono_sistema").val(parametro_general_sg_control.parametro_general_sgActual.telefono_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-fax_sistema").val(parametro_general_sg_control.parametro_general_sgActual.fax_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-representante_nombre").val(parametro_general_sg_control.parametro_general_sgActual.representante_nombre);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-codigo_proceso_actualizacion").val(parametro_general_sg_control.parametro_general_sgActual.codigo_proceso_actualizacion);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-esta_activo").prop('checked',parametro_general_sg_control.parametro_general_sgActual.esta_activo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_general_sg_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_general_sg","seguridad","","form_parametro_general_sg",formulario,"","",paraEventoTabla,idFilaTabla,parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
	}
	
	cargarCombosFK(parametro_general_sg_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_general_sg_control.strRecargarFkTiposNinguno!=null && parametro_general_sg_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_general_sg_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(parametro_general_sg_control) {
		jQuery("#spanstrMensajeid").text(parametro_general_sg_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_general_sg_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenombre_sistema").text(parametro_general_sg_control.strMensajenombre_sistema);		
		jQuery("#spanstrMensajenombre_simple_sistema").text(parametro_general_sg_control.strMensajenombre_simple_sistema);		
		jQuery("#spanstrMensajenombre_empresa").text(parametro_general_sg_control.strMensajenombre_empresa);		
		jQuery("#spanstrMensajeversion_sistema").text(parametro_general_sg_control.strMensajeversion_sistema);		
		jQuery("#spanstrMensajesiglas_sistema").text(parametro_general_sg_control.strMensajesiglas_sistema);		
		jQuery("#spanstrMensajemail_sistema").text(parametro_general_sg_control.strMensajemail_sistema);		
		jQuery("#spanstrMensajetelefono_sistema").text(parametro_general_sg_control.strMensajetelefono_sistema);		
		jQuery("#spanstrMensajefax_sistema").text(parametro_general_sg_control.strMensajefax_sistema);		
		jQuery("#spanstrMensajerepresentante_nombre").text(parametro_general_sg_control.strMensajerepresentante_nombre);		
		jQuery("#spanstrMensajecodigo_proceso_actualizacion").text(parametro_general_sg_control.strMensajecodigo_proceso_actualizacion);		
		jQuery("#spanstrMensajeesta_activo").text(parametro_general_sg_control.strMensajeesta_activo);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_general_sg_control) {
		jQuery("#tdbtnNuevoparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_general_sg").css("display",parametro_general_sg_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_general_sg").css("display",parametro_general_sg_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_general_sg").css("display",parametro_general_sg_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_general_sg").css("display",parametro_general_sg_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(parametro_general_sg_control) {
		var i=0;
		
		i=parametro_general_sg_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_general_sg_control.parametro_general_sgActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_general_sg_control.parametro_general_sgActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(parametro_general_sg_control.parametro_general_sgActual.nombre_sistema);
		jQuery("#t-cel_"+i+"_3").val(parametro_general_sg_control.parametro_general_sgActual.nombre_simple_sistema);
		jQuery("#t-cel_"+i+"_4").val(parametro_general_sg_control.parametro_general_sgActual.nombre_empresa);
		jQuery("#t-cel_"+i+"_5").val(parametro_general_sg_control.parametro_general_sgActual.version_sistema);
		jQuery("#t-cel_"+i+"_6").val(parametro_general_sg_control.parametro_general_sgActual.siglas_sistema);
		jQuery("#t-cel_"+i+"_7").val(parametro_general_sg_control.parametro_general_sgActual.mail_sistema);
		jQuery("#t-cel_"+i+"_8").val(parametro_general_sg_control.parametro_general_sgActual.telefono_sistema);
		jQuery("#t-cel_"+i+"_9").val(parametro_general_sg_control.parametro_general_sgActual.fax_sistema);
		jQuery("#t-cel_"+i+"_10").val(parametro_general_sg_control.parametro_general_sgActual.representante_nombre);
		jQuery("#t-cel_"+i+"_11").val(parametro_general_sg_control.parametro_general_sgActual.codigo_proceso_actualizacion);
		jQuery("#t-cel_"+i+"_12").prop('checked',parametro_general_sg_control.parametro_general_sgActual.esta_activo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_general_sg_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_general_sg_control) {
		parametro_general_sg_funcion1.registrarControlesTableValidacionEdition(parametro_general_sg_control,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sgConstante,strParametros);
		
		//parametro_general_sg_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_general_sg_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_general_sg_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_sg_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(parametro_general_sg_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_sg_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_general_sg_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_sg_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_general_sg_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_general_sg");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_general_sg");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_general_sg_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);			
			
			if(parametro_general_sg_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,"parametro_general_sg");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			parametro_general_sg_funcion1.validarFormularioJQuery(parametro_general_sg_constante1);
			
			if(parametro_general_sg_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_general_sg_control) {
		
		jQuery("#divBusquedaparametro_general_sgAjaxWebPart").css("display",parametro_general_sg_control.strPermisoBusqueda);
		jQuery("#trparametro_general_sgCabeceraBusquedas").css("display",parametro_general_sg_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_general_sg").css("display",parametro_general_sg_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_general_sg").css("display",parametro_general_sg_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_general_sg").attr("style",parametro_general_sg_control.strPermisoMostrarTodos);
		
		if(parametro_general_sg_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_general_sgNuevo").css("display",parametro_general_sg_control.strPermisoNuevo);
			jQuery("#tdparametro_general_sgNuevoToolBar").css("display",parametro_general_sg_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_general_sgDuplicar").css("display",parametro_general_sg_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_general_sgDuplicarToolBar").css("display",parametro_general_sg_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_general_sgNuevoGuardarCambios").css("display",parametro_general_sg_control.strPermisoNuevo);
			jQuery("#tdparametro_general_sgNuevoGuardarCambiosToolBar").css("display",parametro_general_sg_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_general_sg_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_general_sgActualizarToolBar").css("display",parametro_general_sg_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_general_sgCopiar").css("display",parametro_general_sg_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_general_sgCopiarToolBar").css("display",parametro_general_sg_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_general_sgConEditar").css("display",parametro_general_sg_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_general_sgEliminarToolBar").css("display",parametro_general_sg_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdparametro_general_sgGuardarCambios").css("display",parametro_general_sg_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_general_sgGuardarCambiosToolBar").css("display",parametro_general_sg_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trparametro_general_sgElementos").css("display",parametro_general_sg_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_general_sgAcciones").css("display",parametro_general_sg_control.strVisibleTablaAcciones);
		jQuery("#trparametro_general_sgParametrosAcciones").css("display",parametro_general_sg_control.strVisibleTablaAcciones);
			
		jQuery("#tdparametro_general_sgCerrarPagina").css("display",parametro_general_sg_control.strPermisoPopup);		
		jQuery("#tdparametro_general_sgCerrarPaginaToolBar").css("display",parametro_general_sg_control.strPermisoPopup);
		//jQuery("#trparametro_general_sgAccionesRelaciones").css("display",parametro_general_sg_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_general_sg_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_general_sg_webcontrol1.registrarEventosControles();
		
		if(parametro_general_sg_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_general_sg_constante1.STR_ES_RELACIONADO=="false") {
			parametro_general_sg_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_general_sg_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_general_sg_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_general_sg_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_general_sg_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(parametro_general_sg_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_general_sg_webcontrol1.onLoad();
				
			} else {
				if(parametro_general_sg_constante1.BIT_ES_PAGINA_FORM==true) {
					if(parametro_general_sg_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
						//parametro_general_sg_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(parametro_general_sg_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_general_sg_constante1.BIG_ID_ACTUAL,"parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
						//parametro_general_sg_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			parametro_general_sg_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var parametro_general_sg_webcontrol1=new parametro_general_sg_webcontrol();

if(parametro_general_sg_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_general_sg_webcontrol1.onLoadWindow; 
}

//</script>