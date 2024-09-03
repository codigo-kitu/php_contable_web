//<script type="text/javascript" language="javascript">



//var otro_parametroJQueryPaginaWebInteraccion= function (otro_parametro_control) {
//this.,this.,this.

class otro_parametro_webcontrol extends otro_parametro_webcontrol_add {
	
	otro_parametro_control=null;
	otro_parametro_controlInicial=null;
	otro_parametro_controlAuxiliar=null;
		
	//if(otro_parametro_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(otro_parametro_control) {
		super();
		
		this.otro_parametro_control=otro_parametro_control;
	}
		
	actualizarVariablesPagina(otro_parametro_control) {
		
		if(otro_parametro_control.action=="index" || otro_parametro_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(otro_parametro_control);
			
		} else if(otro_parametro_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(otro_parametro_control);
			
		} else if(otro_parametro_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(otro_parametro_control);
			
		} else if(otro_parametro_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_parametro_control);		
		
		} else if(otro_parametro_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(otro_parametro_control);		
		
		} else if(otro_parametro_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_parametro_control);		
		
		} else if(otro_parametro_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(otro_parametro_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(otro_parametro_control.action + " Revisar Manejo");
			
			if(otro_parametro_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(otro_parametro_control);
				
				return;
			}
			
			//if(otro_parametro_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(otro_parametro_control);
			//}
			
			if(otro_parametro_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(otro_parametro_control);
			}
			
			if(otro_parametro_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_parametro_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(otro_parametro_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(otro_parametro_control, false);			
			}
			
			if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(otro_parametro_control);	
			}
			
			if(otro_parametro_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(otro_parametro_control);
			}
			
			if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(otro_parametro_control);
			}
			
			if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(otro_parametro_control);
			}
			
			if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(otro_parametro_control);	
			}
			
			if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
			}
			
			if(otro_parametro_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(otro_parametro_control);
			}
			
			
			if(otro_parametro_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(otro_parametro_control);			
			}
			
			if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(otro_parametro_control);
			}
			
			
			if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(otro_parametro_control);
			}
			
			if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(otro_parametro_control);
			}				
			
			if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_parametro_control);
			}
			
			if(otro_parametro_control.usuarioActual!=null && otro_parametro_control.usuarioActual.field_strUserName!=null &&
			otro_parametro_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(otro_parametro_control);			
			}
		}
		
		
		if(otro_parametro_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(otro_parametro_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(otro_parametro_control) {
		
		this.actualizarPaginaCargaGeneral(otro_parametro_control);
		this.actualizarPaginaTablaDatos(otro_parametro_control);
		this.actualizarPaginaCargaGeneralControles(otro_parametro_control);
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_parametro_control);
		this.actualizarPaginaAreaBusquedas(otro_parametro_control);
		this.actualizarPaginaCargaCombosFK(otro_parametro_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_parametro_control) {
		
		this.actualizarPaginaCargaGeneral(otro_parametro_control);
		this.actualizarPaginaTablaDatos(otro_parametro_control);
		this.actualizarPaginaCargaGeneralControles(otro_parametro_control);
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_parametro_control);
		this.actualizarPaginaAreaBusquedas(otro_parametro_control);
		this.actualizarPaginaCargaCombosFK(otro_parametro_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(otro_parametro_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_parametro_control);		
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(otro_parametro_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_parametro_control);		
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(otro_parametro_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_parametro_control);		
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(otro_parametro_control) {
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(otro_parametro_control) {
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_parametro_control) {
		this.actualizarPaginaCargaGeneralControles(otro_parametro_control);
		this.actualizarPaginaCargaCombosFK(otro_parametro_control);
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_parametro_control) {
		this.actualizarPaginaAbrirLink(otro_parametro_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);				
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);
		this.actualizarPaginaFormulario(otro_parametro_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);
		this.actualizarPaginaFormulario(otro_parametro_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(otro_parametro_control) {
		this.actualizarPaginaFormulario(otro_parametro_control);
		this.onLoadCombosDefectoFK(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);
		this.actualizarPaginaFormulario(otro_parametro_control);
		this.onLoadCombosDefectoFK(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_parametro_control) {
		this.actualizarPaginaCargaGeneralControles(otro_parametro_control);
		this.actualizarPaginaCargaCombosFK(otro_parametro_control);
		this.actualizarPaginaFormulario(otro_parametro_control);
		this.onLoadCombosDefectoFK(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_parametro_control) {
		this.actualizarPaginaAbrirLink(otro_parametro_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_parametro_control) {
		this.actualizarPaginaImprimir(otro_parametro_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_parametro_control) {
		this.actualizarPaginaImprimir(otro_parametro_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(otro_parametro_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_parametro_control) {
		//FORMULARIO
		if(otro_parametro_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_parametro_control);
			this.actualizarPaginaFormularioAdd(otro_parametro_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		//COMBOS FK
		if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_parametro_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(otro_parametro_control) {
		//FORMULARIO
		if(otro_parametro_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_parametro_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);	
		//COMBOS FK
		if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_parametro_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control) {
		if(otro_parametro_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_parametro_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(otro_parametro_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(otro_parametro_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(otro_parametro_control) {
		if(otro_parametro_funcion1.esPaginaForm()==true) {
			window.opener.otro_parametro_webcontrol1.actualizarPaginaTablaDatos(otro_parametro_control);
		} else {
			this.actualizarPaginaTablaDatos(otro_parametro_control);
		}
	}
	
	actualizarPaginaAbrirLink(otro_parametro_control) {
		otro_parametro_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(otro_parametro_control.strAuxiliarUrlPagina);
				
		otro_parametro_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(otro_parametro_control.strAuxiliarTipo,otro_parametro_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(otro_parametro_control) {
		otro_parametro_funcion1.resaltarRestaurarDivMensaje(true,otro_parametro_control.strAuxiliarMensajeAlert,otro_parametro_control.strAuxiliarCssMensaje);
			
		if(otro_parametro_funcion1.esPaginaForm()==true) {
			window.opener.otro_parametro_funcion1.resaltarRestaurarDivMensaje(true,otro_parametro_control.strAuxiliarMensajeAlert,otro_parametro_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(otro_parametro_control) {
		eval(otro_parametro_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(otro_parametro_control, mostrar) {
		
		if(mostrar==true) {
			otro_parametro_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				otro_parametro_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			otro_parametro_funcion1.mostrarDivMensaje(true,otro_parametro_control.strAuxiliarMensaje,otro_parametro_control.strAuxiliarCssMensaje);
		
		} else {
			otro_parametro_funcion1.mostrarDivMensaje(false,otro_parametro_control.strAuxiliarMensaje,otro_parametro_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(otro_parametro_control) {
	
		funcionGeneral.printWebPartPage("otro_parametro",otro_parametro_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarotro_parametrosAjaxWebPart").html(otro_parametro_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("otro_parametro",jQuery("#divTablaDatosReporteAuxiliarotro_parametrosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(otro_parametro_control) {
		this.otro_parametro_controlInicial=otro_parametro_control;
			
		if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(otro_parametro_control.strStyleDivArbol,otro_parametro_control.strStyleDivContent
																,otro_parametro_control.strStyleDivOpcionesBanner,otro_parametro_control.strStyleDivExpandirColapsar
																,otro_parametro_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=otro_parametro_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",otro_parametro_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(otro_parametro_control) {
		jQuery("#divTablaDatosotro_parametrosAjaxWebPart").html(otro_parametro_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosotro_parametros=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosotro_parametros=jQuery("#tblTablaDatosotro_parametros").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("otro_parametro",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',otro_parametro_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			otro_parametro_webcontrol1.registrarControlesTableEdition(otro_parametro_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		otro_parametro_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(otro_parametro_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(otro_parametro_control.otro_parametroActual!=null) {//form
			
			this.actualizarCamposFilaTabla(otro_parametro_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(otro_parametro_control) {
		this.actualizarCssBotonesPagina(otro_parametro_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(otro_parametro_control.tiposReportes,otro_parametro_control.tiposReporte
															 	,otro_parametro_control.tiposPaginacion,otro_parametro_control.tiposAcciones
																,otro_parametro_control.tiposColumnasSelect,otro_parametro_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(otro_parametro_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(otro_parametro_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(otro_parametro_control);			
	}
	
	actualizarPaginaAreaBusquedas(otro_parametro_control) {
		jQuery("#divBusquedaotro_parametroAjaxWebPart").css("display",otro_parametro_control.strPermisoBusqueda);
		jQuery("#trotro_parametroCabeceraBusquedas").css("display",otro_parametro_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_parametro").css("display",otro_parametro_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(otro_parametro_control.htmlTablaOrderBy!=null
			&& otro_parametro_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByotro_parametroAjaxWebPart").html(otro_parametro_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//otro_parametro_webcontrol1.registrarOrderByActions();
			
		}
			
		if(otro_parametro_control.htmlTablaOrderByRel!=null
			&& otro_parametro_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelotro_parametroAjaxWebPart").html(otro_parametro_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(otro_parametro_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaotro_parametroAjaxWebPart").css("display","none");
			jQuery("#trotro_parametroCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaotro_parametro").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(otro_parametro_control) {
		jQuery("#tdotro_parametroNuevo").css("display",otro_parametro_control.strPermisoNuevo);
		jQuery("#trotro_parametroElementos").css("display",otro_parametro_control.strVisibleTablaElementos);
		jQuery("#trotro_parametroAcciones").css("display",otro_parametro_control.strVisibleTablaAcciones);
		jQuery("#trotro_parametroParametrosAcciones").css("display",otro_parametro_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(otro_parametro_control) {
	
		this.actualizarCssBotonesMantenimiento(otro_parametro_control);
				
		if(otro_parametro_control.otro_parametroActual!=null) {//form
			
			this.actualizarCamposFormulario(otro_parametro_control);			
		}
						
		this.actualizarSpanMensajesCampos(otro_parametro_control);
	}
	
	actualizarPaginaUsuarioInvitado(otro_parametro_control) {
	
		var indexPosition=otro_parametro_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=otro_parametro_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(otro_parametro_control) {
		jQuery("#divResumenotro_parametroActualAjaxWebPart").html(otro_parametro_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_parametro_control) {
		jQuery("#divAccionesRelacionesotro_parametroAjaxWebPart").html(otro_parametro_control.htmlTablaAccionesRelaciones);
			
		otro_parametro_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(otro_parametro_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(otro_parametro_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(otro_parametro_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionotro_parametro();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("otro_parametro",id,"general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(otro_parametro_control) {
	
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-id").val(otro_parametro_control.otro_parametroActual.id);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-version_row").val(otro_parametro_control.otro_parametroActual.versionRow);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-codigo").val(otro_parametro_control.otro_parametroActual.codigo);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-codigo2").val(otro_parametro_control.otro_parametroActual.codigo2);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-grupo").val(otro_parametro_control.otro_parametroActual.grupo);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-descripcion").val(otro_parametro_control.otro_parametroActual.descripcion);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-texto1").val(otro_parametro_control.otro_parametroActual.texto1);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-orden").val(otro_parametro_control.otro_parametroActual.orden);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-monto1").val(otro_parametro_control.otro_parametroActual.monto1);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-activo").prop('checked',otro_parametro_control.otro_parametroActual.activo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+otro_parametro_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("otro_parametro","general","","form_otro_parametro",formulario,"","",paraEventoTabla,idFilaTabla,otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
	}
	
	cargarCombosFK(otro_parametro_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(otro_parametro_control.strRecargarFkTiposNinguno!=null && otro_parametro_control.strRecargarFkTiposNinguno!='NINGUNO' && otro_parametro_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(otro_parametro_control) {
		jQuery("#spanstrMensajeid").text(otro_parametro_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(otro_parametro_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(otro_parametro_control.strMensajecodigo);		
		jQuery("#spanstrMensajecodigo2").text(otro_parametro_control.strMensajecodigo2);		
		jQuery("#spanstrMensajegrupo").text(otro_parametro_control.strMensajegrupo);		
		jQuery("#spanstrMensajedescripcion").text(otro_parametro_control.strMensajedescripcion);		
		jQuery("#spanstrMensajetexto1").text(otro_parametro_control.strMensajetexto1);		
		jQuery("#spanstrMensajeorden").text(otro_parametro_control.strMensajeorden);		
		jQuery("#spanstrMensajemonto1").text(otro_parametro_control.strMensajemonto1);		
		jQuery("#spanstrMensajeactivo").text(otro_parametro_control.strMensajeactivo);		
	}
	
	actualizarCssBotonesMantenimiento(otro_parametro_control) {
		jQuery("#tdbtnNuevootro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevootro_parametro").css("display",otro_parametro_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarotro_parametro").css("display",otro_parametro_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarotro_parametro").css("display",otro_parametro_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosotro_parametro").css("display",otro_parametro_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(otro_parametro_control) {
		var i=0;
		
		i=otro_parametro_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(otro_parametro_control.otro_parametroActual.id);
		jQuery("#t-version_row_"+i+"").val(otro_parametro_control.otro_parametroActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(otro_parametro_control.otro_parametroActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(otro_parametro_control.otro_parametroActual.codigo2);
		jQuery("#t-cel_"+i+"_4").val(otro_parametro_control.otro_parametroActual.grupo);
		jQuery("#t-cel_"+i+"_5").val(otro_parametro_control.otro_parametroActual.descripcion);
		jQuery("#t-cel_"+i+"_6").val(otro_parametro_control.otro_parametroActual.texto1);
		jQuery("#t-cel_"+i+"_7").val(otro_parametro_control.otro_parametroActual.orden);
		jQuery("#t-cel_"+i+"_8").val(otro_parametro_control.otro_parametroActual.monto1);
		jQuery("#t-cel_"+i+"_9").prop('checked',otro_parametro_control.otro_parametroActual.activo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(otro_parametro_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(otro_parametro_control) {
		otro_parametro_funcion1.registrarControlesTableValidacionEdition(otro_parametro_control,otro_parametro_webcontrol1,otro_parametro_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametroConstante,strParametros);
		
		//otro_parametro_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//otro_parametro_control
		
	
	}
	
	onLoadCombosDefectoFK(otro_parametro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_parametro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(otro_parametro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_parametro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(otro_parametro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_parametro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(otro_parametro_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("otro_parametro");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("otro_parametro");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(otro_parametro_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);			
			
			if(otro_parametro_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,"otro_parametro");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			otro_parametro_funcion1.validarFormularioJQuery(otro_parametro_constante1);
			
			if(otro_parametro_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(otro_parametro_control) {
		
		jQuery("#divBusquedaotro_parametroAjaxWebPart").css("display",otro_parametro_control.strPermisoBusqueda);
		jQuery("#trotro_parametroCabeceraBusquedas").css("display",otro_parametro_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_parametro").css("display",otro_parametro_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteotro_parametro").css("display",otro_parametro_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosotro_parametro").attr("style",otro_parametro_control.strPermisoMostrarTodos);
		
		if(otro_parametro_control.strPermisoNuevo!=null) {
			jQuery("#tdotro_parametroNuevo").css("display",otro_parametro_control.strPermisoNuevo);
			jQuery("#tdotro_parametroNuevoToolBar").css("display",otro_parametro_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdotro_parametroDuplicar").css("display",otro_parametro_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_parametroDuplicarToolBar").css("display",otro_parametro_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_parametroNuevoGuardarCambios").css("display",otro_parametro_control.strPermisoNuevo);
			jQuery("#tdotro_parametroNuevoGuardarCambiosToolBar").css("display",otro_parametro_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(otro_parametro_control.strPermisoActualizar!=null) {
			jQuery("#tdotro_parametroActualizarToolBar").css("display",otro_parametro_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_parametroCopiar").css("display",otro_parametro_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_parametroCopiarToolBar").css("display",otro_parametro_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_parametroConEditar").css("display",otro_parametro_control.strPermisoActualizar);
		}
		
		jQuery("#tdotro_parametroEliminarToolBar").css("display",otro_parametro_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdotro_parametroGuardarCambios").css("display",otro_parametro_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdotro_parametroGuardarCambiosToolBar").css("display",otro_parametro_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trotro_parametroElementos").css("display",otro_parametro_control.strVisibleTablaElementos);
		
		jQuery("#trotro_parametroAcciones").css("display",otro_parametro_control.strVisibleTablaAcciones);
		jQuery("#trotro_parametroParametrosAcciones").css("display",otro_parametro_control.strVisibleTablaAcciones);
			
		jQuery("#tdotro_parametroCerrarPagina").css("display",otro_parametro_control.strPermisoPopup);		
		jQuery("#tdotro_parametroCerrarPaginaToolBar").css("display",otro_parametro_control.strPermisoPopup);
		//jQuery("#trotro_parametroAccionesRelaciones").css("display",otro_parametro_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		otro_parametro_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		otro_parametro_webcontrol1.registrarEventosControles();
		
		if(otro_parametro_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
			otro_parametro_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(otro_parametro_constante1.STR_ES_RELACIONES=="true") {
			if(otro_parametro_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_parametro_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(otro_parametro_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(otro_parametro_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				otro_parametro_webcontrol1.onLoad();
				
			} else {
				if(otro_parametro_constante1.BIT_ES_PAGINA_FORM==true) {
					if(otro_parametro_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
						//otro_parametro_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(otro_parametro_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(otro_parametro_constante1.BIG_ID_ACTUAL,"otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
						//otro_parametro_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			otro_parametro_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var otro_parametro_webcontrol1=new otro_parametro_webcontrol();

if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = otro_parametro_webcontrol1.onLoadWindow; 
}

//</script>