//<script type="text/javascript" language="javascript">



//var estimadoJQueryPaginaWebInteraccion= function (estimado_control) {
//this.,this.,this.

class estimado_webcontrol extends estimado_webcontrol_add {
	
	estimado_control=null;
	estimado_controlInicial=null;
	estimado_controlAuxiliar=null;
		
	//if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(estimado_control) {
		super();
		
		this.estimado_control=estimado_control;
	}
		
	actualizarVariablesPagina(estimado_control) {
		
		if(estimado_control.action=="index" || estimado_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(estimado_control);
			
		} else if(estimado_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(estimado_control);
		
		} else if(estimado_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(estimado_control);
		
		} else if(estimado_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(estimado_control);
		
		} else if(estimado_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(estimado_control);
			
		} else if(estimado_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(estimado_control);
			
		} else if(estimado_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(estimado_control);
		
		} else if(estimado_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(estimado_control);
		
		} else if(estimado_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(estimado_control);
		
		} else if(estimado_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(estimado_control);
		
		} else if(estimado_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(estimado_control);
		
		} else if(estimado_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(estimado_control);
		
		} else if(estimado_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(estimado_control);
		
		} else if(estimado_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(estimado_control);
		
		} else if(estimado_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(estimado_control);
		
		} else if(estimado_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(estimado_control);
		
		} else if(estimado_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(estimado_control);
		
		} else if(estimado_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(estimado_control);
		
		} else if(estimado_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(estimado_control);
		
		} else if(estimado_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(estimado_control);
		
		} else if(estimado_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(estimado_control);
		
		} else if(estimado_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(estimado_control);
		
		} else if(estimado_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(estimado_control);
		
		} else if(estimado_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(estimado_control);
		
		} else if(estimado_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(estimado_control);
		
		} else if(estimado_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(estimado_control);
		
		} else if(estimado_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(estimado_control);
		
		} else if(estimado_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(estimado_control);		
		
		} else if(estimado_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(estimado_control);		
		
		} else if(estimado_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(estimado_control);		
		
		} else if(estimado_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(estimado_control);		
		}
		else if(estimado_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(estimado_control);		
		}
		else if(estimado_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(estimado_control);		
		}
		else if(estimado_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(estimado_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(estimado_control.action + " Revisar Manejo");
			
			if(estimado_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(estimado_control);
				
				return;
			}
			
			//if(estimado_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(estimado_control);
			//}
			
			if(estimado_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(estimado_control);
			}
			
			if(estimado_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && estimado_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(estimado_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(estimado_control, false);			
			}
			
			if(estimado_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(estimado_control);	
			}
			
			if(estimado_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(estimado_control);
			}
			
			if(estimado_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(estimado_control);
			}
			
			if(estimado_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(estimado_control);
			}
			
			if(estimado_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(estimado_control);	
			}
			
			if(estimado_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(estimado_control);
			}
			
			if(estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(estimado_control);
			}
			
			
			if(estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(estimado_control);			
			}
			
			if(estimado_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(estimado_control);
			}
			
			
			if(estimado_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(estimado_control);
			}
			
			if(estimado_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(estimado_control);
			}				
			
			if(estimado_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(estimado_control);
			}
			
			if(estimado_control.usuarioActual!=null && estimado_control.usuarioActual.field_strUserName!=null &&
			estimado_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(estimado_control);			
			}
		}
		
		
		if(estimado_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(estimado_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(estimado_control) {
		
		this.actualizarPaginaCargaGeneral(estimado_control);
		this.actualizarPaginaTablaDatos(estimado_control);
		this.actualizarPaginaCargaGeneralControles(estimado_control);
		this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estimado_control);
		this.actualizarPaginaAreaBusquedas(estimado_control);
		this.actualizarPaginaCargaCombosFK(estimado_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(estimado_control) {
		
		this.actualizarPaginaCargaGeneral(estimado_control);
		this.actualizarPaginaTablaDatos(estimado_control);
		this.actualizarPaginaCargaGeneralControles(estimado_control);
		this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estimado_control);
		this.actualizarPaginaAreaBusquedas(estimado_control);
		this.actualizarPaginaCargaCombosFK(estimado_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(estimado_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estimado_control);		
		this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(estimado_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estimado_control);		
		this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(estimado_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estimado_control);		
		this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(estimado_control) {
		this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(estimado_control) {
		this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(estimado_control) {
		this.actualizarPaginaCargaGeneralControles(estimado_control);
		this.actualizarPaginaCargaCombosFK(estimado_control);
		this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(estimado_control) {
		this.actualizarPaginaAbrirLink(estimado_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);				
		this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);
		this.actualizarPaginaFormulario(estimado_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);
		this.actualizarPaginaFormulario(estimado_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(estimado_control) {
		this.actualizarPaginaFormulario(estimado_control);
		this.onLoadCombosDefectoFK(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);
		this.actualizarPaginaFormulario(estimado_control);
		this.onLoadCombosDefectoFK(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(estimado_control) {
		this.actualizarPaginaCargaGeneralControles(estimado_control);
		this.actualizarPaginaCargaCombosFK(estimado_control);
		this.actualizarPaginaFormulario(estimado_control);
		this.onLoadCombosDefectoFK(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(estimado_control) {
		this.actualizarPaginaAbrirLink(estimado_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(estimado_control) {
		this.actualizarPaginaImprimir(estimado_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(estimado_control) {
		this.actualizarPaginaImprimir(estimado_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(estimado_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(estimado_control) {
		//FORMULARIO
		if(estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estimado_control);
			this.actualizarPaginaFormularioAdd(estimado_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		//COMBOS FK
		if(estimado_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estimado_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(estimado_control) {
		//FORMULARIO
		if(estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estimado_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);	
		//COMBOS FK
		if(estimado_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estimado_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);
		this.actualizarPaginaFormulario(estimado_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(estimado_control) {
		//FORMULARIO
		if(estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estimado_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(estimado_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);	
		//COMBOS FK
		if(estimado_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estimado_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(estimado_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(estimado_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(estimado_control) {
		if(estimado_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && estimado_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(estimado_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(estimado_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(estimado_control) {
		if(estimado_funcion1.esPaginaForm()==true) {
			window.opener.estimado_webcontrol1.actualizarPaginaTablaDatos(estimado_control);
		} else {
			this.actualizarPaginaTablaDatos(estimado_control);
		}
	}
	
	actualizarPaginaAbrirLink(estimado_control) {
		estimado_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(estimado_control.strAuxiliarUrlPagina);
				
		estimado_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(estimado_control.strAuxiliarTipo,estimado_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(estimado_control) {
		estimado_funcion1.resaltarRestaurarDivMensaje(true,estimado_control.strAuxiliarMensajeAlert,estimado_control.strAuxiliarCssMensaje);
			
		if(estimado_funcion1.esPaginaForm()==true) {
			window.opener.estimado_funcion1.resaltarRestaurarDivMensaje(true,estimado_control.strAuxiliarMensajeAlert,estimado_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(estimado_control) {
		eval(estimado_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(estimado_control, mostrar) {
		
		if(mostrar==true) {
			estimado_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				estimado_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			estimado_funcion1.mostrarDivMensaje(true,estimado_control.strAuxiliarMensaje,estimado_control.strAuxiliarCssMensaje);
		
		} else {
			estimado_funcion1.mostrarDivMensaje(false,estimado_control.strAuxiliarMensaje,estimado_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(estimado_control) {
	
		funcionGeneral.printWebPartPage("estimado",estimado_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarestimadosAjaxWebPart").html(estimado_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("estimado",jQuery("#divTablaDatosReporteAuxiliarestimadosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(estimado_control) {
		this.estimado_controlInicial=estimado_control;
			
		if(estimado_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(estimado_control.strStyleDivArbol,estimado_control.strStyleDivContent
																,estimado_control.strStyleDivOpcionesBanner,estimado_control.strStyleDivExpandirColapsar
																,estimado_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=estimado_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",estimado_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(estimado_control) {
		jQuery("#divTablaDatosestimadosAjaxWebPart").html(estimado_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosestimados=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(estimado_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosestimados=jQuery("#tblTablaDatosestimados").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("estimado",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',estimado_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			estimado_webcontrol1.registrarControlesTableEdition(estimado_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		estimado_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(estimado_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(estimado_control.estimadoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(estimado_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(estimado_control) {
		this.actualizarCssBotonesPagina(estimado_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(estimado_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(estimado_control.tiposReportes,estimado_control.tiposReporte
															 	,estimado_control.tiposPaginacion,estimado_control.tiposAcciones
																,estimado_control.tiposColumnasSelect,estimado_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(estimado_control.tiposRelaciones,estimado_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(estimado_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(estimado_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(estimado_control);			
	}
	
	actualizarPaginaAreaBusquedas(estimado_control) {
		jQuery("#divBusquedaestimadoAjaxWebPart").css("display",estimado_control.strPermisoBusqueda);
		jQuery("#trestimadoCabeceraBusquedas").css("display",estimado_control.strPermisoBusqueda);
		jQuery("#trBusquedaestimado").css("display",estimado_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(estimado_control.htmlTablaOrderBy!=null
			&& estimado_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByestimadoAjaxWebPart").html(estimado_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//estimado_webcontrol1.registrarOrderByActions();
			
		}
			
		if(estimado_control.htmlTablaOrderByRel!=null
			&& estimado_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelestimadoAjaxWebPart").html(estimado_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(estimado_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaestimadoAjaxWebPart").css("display","none");
			jQuery("#trestimadoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaestimado").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(estimado_control) {
		jQuery("#tdestimadoNuevo").css("display",estimado_control.strPermisoNuevo);
		jQuery("#trestimadoElementos").css("display",estimado_control.strVisibleTablaElementos);
		jQuery("#trestimadoAcciones").css("display",estimado_control.strVisibleTablaAcciones);
		jQuery("#trestimadoParametrosAcciones").css("display",estimado_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(estimado_control) {
	
		this.actualizarCssBotonesMantenimiento(estimado_control);
				
		if(estimado_control.estimadoActual!=null) {//form
			
			this.actualizarCamposFormulario(estimado_control);			
		}
						
		this.actualizarSpanMensajesCampos(estimado_control);
	}
	
	actualizarPaginaUsuarioInvitado(estimado_control) {
	
		var indexPosition=estimado_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=estimado_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(estimado_control) {
		jQuery("#divResumenestimadoActualAjaxWebPart").html(estimado_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(estimado_control) {
		jQuery("#divAccionesRelacionesestimadoAjaxWebPart").html(estimado_control.htmlTablaAccionesRelaciones);
			
		estimado_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(estimado_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(estimado_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(estimado_control) {
		
		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",estimado_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",estimado_control.strVisibleFK_Idcliente);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",estimado_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",estimado_control.strVisibleFK_Idejercicio);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",estimado_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",estimado_control.strVisibleFK_Idempresa);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idestado").attr("style",estimado_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idestado").attr("style",estimado_control.strVisibleFK_Idestado);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",estimado_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",estimado_control.strVisibleFK_Idperiodo);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",estimado_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",estimado_control.strVisibleFK_Idproveedor);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",estimado_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",estimado_control.strVisibleFK_Idsucursal);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",estimado_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",estimado_control.strVisibleFK_Idtermino_pago);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",estimado_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",estimado_control.strVisibleFK_Idusuario);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",estimado_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",estimado_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionestimado();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("estimado",id,"estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","empresa","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","sucursal","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","ejercicio","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","periodo","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","usuario","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","cliente","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","proveedor","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","vendedor","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","termino_pago_cliente","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","estado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(estimado_control) {
	
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id").val(estimado_control.estimadoActual.id);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-version_row").val(estimado_control.estimadoActual.versionRow);
		
		if(estimado_control.estimadoActual.id_empresa!=null && estimado_control.estimadoActual.id_empresa>-1){
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa").val() != estimado_control.estimadoActual.id_empresa) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa").val(estimado_control.estimadoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_sucursal!=null && estimado_control.estimadoActual.id_sucursal>-1){
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal").val() != estimado_control.estimadoActual.id_sucursal) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal").val(estimado_control.estimadoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_ejercicio!=null && estimado_control.estimadoActual.id_ejercicio>-1){
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio").val() != estimado_control.estimadoActual.id_ejercicio) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio").val(estimado_control.estimadoActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_periodo!=null && estimado_control.estimadoActual.id_periodo>-1){
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo").val() != estimado_control.estimadoActual.id_periodo) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo").val(estimado_control.estimadoActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_usuario!=null && estimado_control.estimadoActual.id_usuario>-1){
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario").val() != estimado_control.estimadoActual.id_usuario) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario").val(estimado_control.estimadoActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-numero").val(estimado_control.estimadoActual.numero);
		
		if(estimado_control.estimadoActual.id_cliente!=null && estimado_control.estimadoActual.id_cliente>-1){
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_cliente").val() != estimado_control.estimadoActual.id_cliente) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_cliente").val(estimado_control.estimadoActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_cliente").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_proveedor!=null && estimado_control.estimadoActual.id_proveedor>-1){
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_proveedor").val() != estimado_control.estimadoActual.id_proveedor) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_proveedor").val(estimado_control.estimadoActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_proveedor").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-ruc").val(estimado_control.estimadoActual.ruc);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-referencia_cliente").val(estimado_control.estimadoActual.referencia_cliente);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-fecha_emision").val(estimado_control.estimadoActual.fecha_emision);
		
		if(estimado_control.estimadoActual.id_vendedor!=null && estimado_control.estimadoActual.id_vendedor>-1){
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor").val() != estimado_control.estimadoActual.id_vendedor) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor").val(estimado_control.estimadoActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_termino_pago_cliente!=null && estimado_control.estimadoActual.id_termino_pago_cliente>-1){
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != estimado_control.estimadoActual.id_termino_pago_cliente) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(estimado_control.estimadoActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente").select2("val", null);
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-fecha_vence").val(estimado_control.estimadoActual.fecha_vence);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-tipo_cambio").val(estimado_control.estimadoActual.tipo_cambio);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-moneda").val(estimado_control.estimadoActual.moneda);
		
		if(estimado_control.estimadoActual.id_estado!=null && estimado_control.estimadoActual.id_estado>-1){
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_estado").val() != estimado_control.estimadoActual.id_estado) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_estado").val(estimado_control.estimadoActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-direccion").val(estimado_control.estimadoActual.direccion);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-enviar_a").val(estimado_control.estimadoActual.enviar_a);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-observacion").val(estimado_control.estimadoActual.observacion);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-sub_total").val(estimado_control.estimadoActual.sub_total);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-descuento_monto").val(estimado_control.estimadoActual.descuento_monto);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-descuento_porciento").val(estimado_control.estimadoActual.descuento_porciento);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-iva_monto").val(estimado_control.estimadoActual.iva_monto);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-iva_porciento").val(estimado_control.estimadoActual.iva_porciento);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-retencion_fuente_monto").val(estimado_control.estimadoActual.retencion_fuente_monto);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-retencion_fuente_porciento").val(estimado_control.estimadoActual.retencion_fuente_porciento);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-retencion_iva_monto").val(estimado_control.estimadoActual.retencion_iva_monto);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-retencion_iva_porciento").val(estimado_control.estimadoActual.retencion_iva_porciento);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-total").val(estimado_control.estimadoActual.total);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-otro_monto").val(estimado_control.estimadoActual.otro_monto);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-otro_porciento").val(estimado_control.estimadoActual.otro_porciento);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-iva_en_precio").prop('checked',estimado_control.estimadoActual.iva_en_precio);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-nota").val(estimado_control.estimadoActual.nota);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-hora").val(estimado_control.estimadoActual.hora);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-tipo_envio").val(estimado_control.estimadoActual.tipo_envio);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-genero_factura").val(estimado_control.estimadoActual.genero_factura);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-actualizado").val(estimado_control.estimadoActual.actualizado);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-computador").val(estimado_control.estimadoActual.computador);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-monto_base").val(estimado_control.estimadoActual.monto_base);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-descuento_parcial_monto").val(estimado_control.estimadoActual.descuento_parcial_monto);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-impuesto2_monto").val(estimado_control.estimadoActual.impuesto2_monto);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-impuesto2_porciento").val(estimado_control.estimadoActual.impuesto2_porciento);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-retencion_ica_monto").val(estimado_control.estimadoActual.retencion_ica_monto);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-retencion_ica_porciento").val(estimado_control.estimadoActual.retencion_ica_porciento);
		jQuery("#form"+estimado_constante1.STR_SUFIJO+"-comprobante").val(estimado_control.estimadoActual.comprobante);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+estimado_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("estimado","estimados","","form_estimado",formulario,"","",paraEventoTabla,idFilaTabla,estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}
	
	cargarCombosFK(estimado_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosempresasFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombossucursalsFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosejerciciosFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosperiodosFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosusuariosFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosclientesFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosproveedorsFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosvendedorsFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombostermino_pago_clientesFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosestadosFK(estimado_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(estimado_control.strRecargarFkTiposNinguno!=null && estimado_control.strRecargarFkTiposNinguno!='NINGUNO' && estimado_control.strRecargarFkTiposNinguno!='') {
			
				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosempresasFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombossucursalsFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosejerciciosFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosperiodosFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosusuariosFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosclientesFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosproveedorsFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosvendedorsFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombostermino_pago_clientesFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosestadosFK(estimado_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(estimado_control) {
		jQuery("#spanstrMensajeid").text(estimado_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(estimado_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(estimado_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(estimado_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(estimado_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(estimado_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(estimado_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenumero").text(estimado_control.strMensajenumero);		
		jQuery("#spanstrMensajeid_cliente").text(estimado_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajeid_proveedor").text(estimado_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajeruc").text(estimado_control.strMensajeruc);		
		jQuery("#spanstrMensajereferencia_cliente").text(estimado_control.strMensajereferencia_cliente);		
		jQuery("#spanstrMensajefecha_emision").text(estimado_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajeid_vendedor").text(estimado_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajeid_termino_pago_cliente").text(estimado_control.strMensajeid_termino_pago_cliente);		
		jQuery("#spanstrMensajefecha_vence").text(estimado_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajetipo_cambio").text(estimado_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajemoneda").text(estimado_control.strMensajemoneda);		
		jQuery("#spanstrMensajeid_estado").text(estimado_control.strMensajeid_estado);		
		jQuery("#spanstrMensajedireccion").text(estimado_control.strMensajedireccion);		
		jQuery("#spanstrMensajeenviar_a").text(estimado_control.strMensajeenviar_a);		
		jQuery("#spanstrMensajeobservacion").text(estimado_control.strMensajeobservacion);		
		jQuery("#spanstrMensajesub_total").text(estimado_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_monto").text(estimado_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajedescuento_porciento").text(estimado_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(estimado_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(estimado_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeretencion_fuente_monto").text(estimado_control.strMensajeretencion_fuente_monto);		
		jQuery("#spanstrMensajeretencion_fuente_porciento").text(estimado_control.strMensajeretencion_fuente_porciento);		
		jQuery("#spanstrMensajeretencion_iva_monto").text(estimado_control.strMensajeretencion_iva_monto);		
		jQuery("#spanstrMensajeretencion_iva_porciento").text(estimado_control.strMensajeretencion_iva_porciento);		
		jQuery("#spanstrMensajetotal").text(estimado_control.strMensajetotal);		
		jQuery("#spanstrMensajeotro_monto").text(estimado_control.strMensajeotro_monto);		
		jQuery("#spanstrMensajeotro_porciento").text(estimado_control.strMensajeotro_porciento);		
		jQuery("#spanstrMensajeiva_en_precio").text(estimado_control.strMensajeiva_en_precio);		
		jQuery("#spanstrMensajenota").text(estimado_control.strMensajenota);		
		jQuery("#spanstrMensajehora").text(estimado_control.strMensajehora);		
		jQuery("#spanstrMensajetipo_envio").text(estimado_control.strMensajetipo_envio);		
		jQuery("#spanstrMensajegenero_factura").text(estimado_control.strMensajegenero_factura);		
		jQuery("#spanstrMensajeactualizado").text(estimado_control.strMensajeactualizado);		
		jQuery("#spanstrMensajecomputador").text(estimado_control.strMensajecomputador);		
		jQuery("#spanstrMensajemonto_base").text(estimado_control.strMensajemonto_base);		
		jQuery("#spanstrMensajedescuento_parcial_monto").text(estimado_control.strMensajedescuento_parcial_monto);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(estimado_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(estimado_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeretencion_ica_monto").text(estimado_control.strMensajeretencion_ica_monto);		
		jQuery("#spanstrMensajeretencion_ica_porciento").text(estimado_control.strMensajeretencion_ica_porciento);		
		jQuery("#spanstrMensajecomprobante").text(estimado_control.strMensajecomprobante);		
	}
	
	actualizarCssBotonesMantenimiento(estimado_control) {
		jQuery("#tdbtnNuevoestimado").css("visibility",estimado_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoestimado").css("display",estimado_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarestimado").css("visibility",estimado_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarestimado").css("display",estimado_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarestimado").css("visibility",estimado_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarestimado").css("display",estimado_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarestimado").css("visibility",estimado_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosestimado").css("visibility",estimado_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosestimado").css("display",estimado_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarestimado").css("visibility",estimado_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarestimado").css("visibility",estimado_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarestimado").css("visibility",estimado_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionestimado_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualestimado");

			estimado_webcontrol1.registrarSesionParaestimado_detalles(idActual);
		});
		jQuery("#imgdivrelacionimagen_estimado").click(function(){

			var idActual=jQuery(this).attr("idactualestimado");

			estimado_webcontrol1.registrarSesionParaimagen_estimados(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_cliente") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+estimado_constante1.STR_SUFIJO+"-id_cliente" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.estimadoActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.estimadoActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.estimadoActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_proveedor") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+estimado_constante1.STR_SUFIJO+"-id_proveedor" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.estimadoActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.estimadoActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.estimadoActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.clientesFK);
	}

	cargarComboEditarTablaproveedorFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.proveedorsFK);
	}

	cargarComboEditarTablavendedorFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablaestadoFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(estimado_control) {
		var i=0;
		
		i=estimado_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(estimado_control.estimadoActual.id);
		jQuery("#t-version_row_"+i+"").val(estimado_control.estimadoActual.versionRow);
		
		if(estimado_control.estimadoActual.id_empresa!=null && estimado_control.estimadoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != estimado_control.estimadoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(estimado_control.estimadoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_sucursal!=null && estimado_control.estimadoActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != estimado_control.estimadoActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(estimado_control.estimadoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_ejercicio!=null && estimado_control.estimadoActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != estimado_control.estimadoActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(estimado_control.estimadoActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_periodo!=null && estimado_control.estimadoActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != estimado_control.estimadoActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(estimado_control.estimadoActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_usuario!=null && estimado_control.estimadoActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != estimado_control.estimadoActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(estimado_control.estimadoActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(estimado_control.estimadoActual.numero);
		
		if(estimado_control.estimadoActual.id_cliente!=null && estimado_control.estimadoActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != estimado_control.estimadoActual.id_cliente) {
				jQuery("#t-cel_"+i+"_8").val(estimado_control.estimadoActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_8").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_proveedor!=null && estimado_control.estimadoActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != estimado_control.estimadoActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_9").val(estimado_control.estimadoActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(estimado_control.estimadoActual.ruc);
		jQuery("#t-cel_"+i+"_11").val(estimado_control.estimadoActual.referencia_cliente);
		jQuery("#t-cel_"+i+"_12").val(estimado_control.estimadoActual.fecha_emision);
		
		if(estimado_control.estimadoActual.id_vendedor!=null && estimado_control.estimadoActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != estimado_control.estimadoActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_13").val(estimado_control.estimadoActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_termino_pago_cliente!=null && estimado_control.estimadoActual.id_termino_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_14").val() != estimado_control.estimadoActual.id_termino_pago_cliente) {
				jQuery("#t-cel_"+i+"_14").val(estimado_control.estimadoActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_14").select2("val", null);
			if(jQuery("#t-cel_"+i+"_14").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_14").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_15").val(estimado_control.estimadoActual.fecha_vence);
		jQuery("#t-cel_"+i+"_16").val(estimado_control.estimadoActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_17").val(estimado_control.estimadoActual.moneda);
		
		if(estimado_control.estimadoActual.id_estado!=null && estimado_control.estimadoActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_18").val() != estimado_control.estimadoActual.id_estado) {
				jQuery("#t-cel_"+i+"_18").val(estimado_control.estimadoActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_18").select2("val", null);
			if(jQuery("#t-cel_"+i+"_18").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_18").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_19").val(estimado_control.estimadoActual.direccion);
		jQuery("#t-cel_"+i+"_20").val(estimado_control.estimadoActual.enviar_a);
		jQuery("#t-cel_"+i+"_21").val(estimado_control.estimadoActual.observacion);
		jQuery("#t-cel_"+i+"_22").val(estimado_control.estimadoActual.sub_total);
		jQuery("#t-cel_"+i+"_23").val(estimado_control.estimadoActual.descuento_monto);
		jQuery("#t-cel_"+i+"_24").val(estimado_control.estimadoActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_25").val(estimado_control.estimadoActual.iva_monto);
		jQuery("#t-cel_"+i+"_26").val(estimado_control.estimadoActual.iva_porciento);
		jQuery("#t-cel_"+i+"_27").val(estimado_control.estimadoActual.retencion_fuente_monto);
		jQuery("#t-cel_"+i+"_28").val(estimado_control.estimadoActual.retencion_fuente_porciento);
		jQuery("#t-cel_"+i+"_29").val(estimado_control.estimadoActual.retencion_iva_monto);
		jQuery("#t-cel_"+i+"_30").val(estimado_control.estimadoActual.retencion_iva_porciento);
		jQuery("#t-cel_"+i+"_31").val(estimado_control.estimadoActual.total);
		jQuery("#t-cel_"+i+"_32").val(estimado_control.estimadoActual.otro_monto);
		jQuery("#t-cel_"+i+"_33").val(estimado_control.estimadoActual.otro_porciento);
		jQuery("#t-cel_"+i+"_34").prop('checked',estimado_control.estimadoActual.iva_en_precio);
		jQuery("#t-cel_"+i+"_35").val(estimado_control.estimadoActual.nota);
		jQuery("#t-cel_"+i+"_36").val(estimado_control.estimadoActual.hora);
		jQuery("#t-cel_"+i+"_37").val(estimado_control.estimadoActual.tipo_envio);
		jQuery("#t-cel_"+i+"_38").val(estimado_control.estimadoActual.genero_factura);
		jQuery("#t-cel_"+i+"_39").val(estimado_control.estimadoActual.actualizado);
		jQuery("#t-cel_"+i+"_40").val(estimado_control.estimadoActual.computador);
		jQuery("#t-cel_"+i+"_41").val(estimado_control.estimadoActual.monto_base);
		jQuery("#t-cel_"+i+"_42").val(estimado_control.estimadoActual.descuento_parcial_monto);
		jQuery("#t-cel_"+i+"_43").val(estimado_control.estimadoActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_44").val(estimado_control.estimadoActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_45").val(estimado_control.estimadoActual.retencion_ica_monto);
		jQuery("#t-cel_"+i+"_46").val(estimado_control.estimadoActual.retencion_ica_porciento);
		jQuery("#t-cel_"+i+"_47").val(estimado_control.estimadoActual.comprobante);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(estimado_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionestimado_detalle").click(function(){
		jQuery("#tblTablaDatosestimados").on("click",".imgrelacionestimado_detalle", function () {

			var idActual=jQuery(this).attr("idactualestimado");

			estimado_webcontrol1.registrarSesionParaestimado_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimagen_estimado").click(function(){
		jQuery("#tblTablaDatosestimados").on("click",".imgrelacionimagen_estimado", function () {

			var idActual=jQuery(this).attr("idactualestimado");

			estimado_webcontrol1.registrarSesionParaimagen_estimados(idActual);
		});				
	}
		
	

	registrarSesionParaestimado_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"estimado","estimado_detalle","estimados","",estimado_funcion1,estimado_webcontrol1,"s","");
	}

	registrarSesionParaimagen_estimados(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"estimado","imagen_estimado","estimados","",estimado_funcion1,estimado_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(estimado_control) {
		estimado_funcion1.registrarControlesTableValidacionEdition(estimado_control,estimado_webcontrol1,estimado_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimadoConstante,strParametros);
		
		//estimado_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa",estimado_control.empresasFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_2",estimado_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal",estimado_control.sucursalsFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_3",estimado_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio",estimado_control.ejerciciosFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_4",estimado_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo",estimado_control.periodosFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_5",estimado_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario",estimado_control.usuariosFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_6",estimado_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_cliente",estimado_control.clientesFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_8",estimado_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",estimado_control.clientesFK);

	};

	cargarCombosproveedorsFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_proveedor",estimado_control.proveedorsFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_9",estimado_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",estimado_control.proveedorsFK);

	};

	cargarCombosvendedorsFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor",estimado_control.vendedorsFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_13",estimado_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",estimado_control.vendedorsFK);

	};

	cargarCombostermino_pago_clientesFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente",estimado_control.termino_pago_clientesFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_14",estimado_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",estimado_control.termino_pago_clientesFK);

	};

	cargarCombosestadosFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_estado",estimado_control.estadosFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_18",estimado_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",estimado_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(estimado_control) {

	};

	registrarComboActionChangeCombossucursalsFK(estimado_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(estimado_control) {

	};

	registrarComboActionChangeCombosperiodosFK(estimado_control) {

	};

	registrarComboActionChangeCombosusuariosFK(estimado_control) {

	};

	registrarComboActionChangeCombosclientesFK(estimado_control) {
		this.registrarComboActionChangeid_cliente("form"+estimado_constante1.STR_SUFIJO+"-id_cliente",false,0);


		this.registrarComboActionChangeid_cliente(""+estimado_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",false,0);


	};

	registrarComboActionChangeCombosproveedorsFK(estimado_control) {
		this.registrarComboActionChangeid_proveedor("form"+estimado_constante1.STR_SUFIJO+"-id_proveedor",false,0);


		this.registrarComboActionChangeid_proveedor(""+estimado_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(estimado_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(estimado_control) {

	};

	registrarComboActionChangeCombosestadosFK(estimado_control) {

	};

	
	
	setDefectoValorCombosempresasFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idempresaDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa").val() != estimado_control.idempresaDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa").val(estimado_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idsucursalDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal").val() != estimado_control.idsucursalDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal").val(estimado_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idejercicioDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio").val() != estimado_control.idejercicioDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio").val(estimado_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idperiodoDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo").val() != estimado_control.idperiodoDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo").val(estimado_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idusuarioDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario").val() != estimado_control.idusuarioDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario").val(estimado_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idclienteDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_cliente").val() != estimado_control.idclienteDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_cliente").val(estimado_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(estimado_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idproveedorDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_proveedor").val() != estimado_control.idproveedorDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_proveedor").val(estimado_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(estimado_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idvendedorDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor").val() != estimado_control.idvendedorDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor").val(estimado_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(estimado_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != estimado_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(estimado_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(estimado_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idestadoDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_estado").val() != estimado_control.idestadoDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_estado").val(estimado_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(estimado_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_cliente(id_cliente,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("estimado","estimados","","id_cliente",id_cliente,"NINGUNO","",paraEventoTabla,idFilaTabla,estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	registrarComboActionChangeid_proveedor(id_proveedor,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("estimado","estimados","","id_proveedor",id_proveedor,"NINGUNO","",paraEventoTabla,idFilaTabla,estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	










	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(estimado_constante1.BIT_ES_PAGINA_FORM==true) {
			
							estimado_detalle_webcontrol1.onLoadWindow();
							imagen_estimado_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(estimado_constante1.BIT_ES_PAGINA_FORM==true) {
			
		estimado_detalle_webcontrol1.onLoadRecargarRelacionado();
		imagen_estimado_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//estimado_control
		
	
	}
	
	onLoadCombosDefectoFK(estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosempresasFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombossucursalsFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosejerciciosFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosperiodosFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosusuariosFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosclientesFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosproveedorsFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosvendedorsFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosestadosFK(estimado_control);
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
	onLoadCombosEventosFK(estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosempresasFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombossucursalsFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosejerciciosFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosperiodosFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosusuariosFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosclientesFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosproveedorsFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosvendedorsFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosestadosFK(estimado_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("estimado");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("estimado");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(estimado_funcion1,estimado_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(estimado_funcion1,estimado_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(estimado_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);			
			
			if(estimado_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,"estimado");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idcliente","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idejercicio","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idempresa","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idestado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idperiodo","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idproveedor","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idsucursal","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idtermino_pago","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idusuario","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idvendedor","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("estimado");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			estimado_funcion1.validarFormularioJQuery(estimado_constante1);
			
			if(estimado_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(estimado_control) {
		
		jQuery("#divBusquedaestimadoAjaxWebPart").css("display",estimado_control.strPermisoBusqueda);
		jQuery("#trestimadoCabeceraBusquedas").css("display",estimado_control.strPermisoBusqueda);
		jQuery("#trBusquedaestimado").css("display",estimado_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteestimado").css("display",estimado_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosestimado").attr("style",estimado_control.strPermisoMostrarTodos);
		
		if(estimado_control.strPermisoNuevo!=null) {
			jQuery("#tdestimadoNuevo").css("display",estimado_control.strPermisoNuevo);
			jQuery("#tdestimadoNuevoToolBar").css("display",estimado_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdestimadoDuplicar").css("display",estimado_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdestimadoDuplicarToolBar").css("display",estimado_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdestimadoNuevoGuardarCambios").css("display",estimado_control.strPermisoNuevo);
			jQuery("#tdestimadoNuevoGuardarCambiosToolBar").css("display",estimado_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(estimado_control.strPermisoActualizar!=null) {
			jQuery("#tdestimadoActualizarToolBar").css("display",estimado_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestimadoCopiar").css("display",estimado_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestimadoCopiarToolBar").css("display",estimado_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestimadoConEditar").css("display",estimado_control.strPermisoActualizar);
		}
		
		jQuery("#tdestimadoEliminarToolBar").css("display",estimado_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdestimadoGuardarCambios").css("display",estimado_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdestimadoGuardarCambiosToolBar").css("display",estimado_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trestimadoElementos").css("display",estimado_control.strVisibleTablaElementos);
		
		jQuery("#trestimadoAcciones").css("display",estimado_control.strVisibleTablaAcciones);
		jQuery("#trestimadoParametrosAcciones").css("display",estimado_control.strVisibleTablaAcciones);
			
		jQuery("#tdestimadoCerrarPagina").css("display",estimado_control.strPermisoPopup);		
		jQuery("#tdestimadoCerrarPaginaToolBar").css("display",estimado_control.strPermisoPopup);
		//jQuery("#trestimadoAccionesRelaciones").css("display",estimado_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		estimado_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		estimado_webcontrol1.registrarEventosControles();
		
		if(estimado_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(estimado_constante1.STR_ES_RELACIONADO=="false") {
			estimado_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(estimado_constante1.STR_ES_RELACIONES=="true") {
			if(estimado_constante1.BIT_ES_PAGINA_FORM==true) {
				estimado_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(estimado_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(estimado_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				estimado_webcontrol1.onLoad();
				
			} else {
				if(estimado_constante1.BIT_ES_PAGINA_FORM==true) {
					if(estimado_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
						//estimado_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(estimado_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(estimado_constante1.BIG_ID_ACTUAL,"estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
						//estimado_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			estimado_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var estimado_webcontrol1=new estimado_webcontrol();

if(estimado_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = estimado_webcontrol1.onLoadWindow; 
}

//</script>