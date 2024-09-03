//<script type="text/javascript" language="javascript">



//var accionJQueryPaginaWebInteraccion= function (accion_control) {
//this.,this.,this.

class accion_webcontrol extends accion_webcontrol_add {
	
	accion_control=null;
	accion_controlInicial=null;
	accion_controlAuxiliar=null;
		
	//if(accion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(accion_control) {
		super();
		
		this.accion_control=accion_control;
	}
		
	actualizarVariablesPagina(accion_control) {
		
		if(accion_control.action=="index" || accion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(accion_control);
			
		} else if(accion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(accion_control);
		
		} else if(accion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(accion_control);
		
		} else if(accion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(accion_control);
		
		} else if(accion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(accion_control);
			
		} else if(accion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(accion_control);
			
		} else if(accion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(accion_control);
		
		} else if(accion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(accion_control);
		
		} else if(accion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(accion_control);
		
		} else if(accion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(accion_control);
		
		} else if(accion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(accion_control);
		
		} else if(accion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(accion_control);
		
		} else if(accion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(accion_control);
		
		} else if(accion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(accion_control);
		
		} else if(accion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(accion_control);
		
		} else if(accion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(accion_control);
		
		} else if(accion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(accion_control);
		
		} else if(accion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(accion_control);
		
		} else if(accion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(accion_control);
		
		} else if(accion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(accion_control);
		
		} else if(accion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(accion_control);
		
		} else if(accion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(accion_control);
		
		} else if(accion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(accion_control);
		
		} else if(accion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(accion_control);
		
		} else if(accion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(accion_control);
		
		} else if(accion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(accion_control);
		
		} else if(accion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(accion_control);
		
		} else if(accion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(accion_control);		
		
		} else if(accion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(accion_control);		
		
		} else if(accion_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(accion_control);		
		
		} else if(accion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(accion_control);		
		}
		else if(accion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(accion_control);		
		}
		else if(accion_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(accion_control);		
		}
		else if(accion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(accion_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(accion_control.action + " Revisar Manejo");
			
			if(accion_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(accion_control);
				
				return;
			}
			
			//if(accion_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(accion_control);
			//}
			
			if(accion_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(accion_control);
			}
			
			if(accion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && accion_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(accion_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(accion_control, false);			
			}
			
			if(accion_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(accion_control);	
			}
			
			if(accion_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(accion_control);
			}
			
			if(accion_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(accion_control);
			}
			
			if(accion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(accion_control);
			}
			
			if(accion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(accion_control);	
			}
			
			if(accion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(accion_control);
			}
			
			if(accion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(accion_control);
			}
			
			
			if(accion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(accion_control);			
			}
			
			if(accion_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(accion_control);
			}
			
			
			if(accion_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(accion_control);
			}
			
			if(accion_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(accion_control);
			}				
			
			if(accion_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(accion_control);
			}
			
			if(accion_control.usuarioActual!=null && accion_control.usuarioActual.field_strUserName!=null &&
			accion_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(accion_control);			
			}
		}
		
		
		if(accion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(accion_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(accion_control) {
		
		this.actualizarPaginaCargaGeneral(accion_control);
		this.actualizarPaginaTablaDatos(accion_control);
		this.actualizarPaginaCargaGeneralControles(accion_control);
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(accion_control);
		this.actualizarPaginaAreaBusquedas(accion_control);
		this.actualizarPaginaCargaCombosFK(accion_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(accion_control) {
		
		this.actualizarPaginaCargaGeneral(accion_control);
		this.actualizarPaginaTablaDatos(accion_control);
		this.actualizarPaginaCargaGeneralControles(accion_control);
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(accion_control);
		this.actualizarPaginaAreaBusquedas(accion_control);
		this.actualizarPaginaCargaCombosFK(accion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(accion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(accion_control);		
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(accion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(accion_control);		
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(accion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(accion_control);		
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(accion_control) {
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(accion_control) {
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(accion_control) {
		this.actualizarPaginaCargaGeneralControles(accion_control);
		this.actualizarPaginaCargaCombosFK(accion_control);
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(accion_control) {
		this.actualizarPaginaAbrirLink(accion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);				
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);
		this.actualizarPaginaFormulario(accion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);
		this.actualizarPaginaFormulario(accion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(accion_control) {
		this.actualizarPaginaFormulario(accion_control);
		this.onLoadCombosDefectoFK(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);
		this.actualizarPaginaFormulario(accion_control);
		this.onLoadCombosDefectoFK(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(accion_control) {
		this.actualizarPaginaCargaGeneralControles(accion_control);
		this.actualizarPaginaCargaCombosFK(accion_control);
		this.actualizarPaginaFormulario(accion_control);
		this.onLoadCombosDefectoFK(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(accion_control) {
		this.actualizarPaginaAbrirLink(accion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(accion_control) {
		this.actualizarPaginaImprimir(accion_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(accion_control) {
		this.actualizarPaginaImprimir(accion_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(accion_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(accion_control) {
		//FORMULARIO
		if(accion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(accion_control);
			this.actualizarPaginaFormularioAdd(accion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		//COMBOS FK
		if(accion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(accion_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(accion_control) {
		//FORMULARIO
		if(accion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(accion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);	
		//COMBOS FK
		if(accion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(accion_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);
		this.actualizarPaginaFormulario(accion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(accion_control) {
		//FORMULARIO
		if(accion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(accion_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(accion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);	
		//COMBOS FK
		if(accion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(accion_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(accion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(accion_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(accion_control) {
		if(accion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && accion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(accion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(accion_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(accion_control) {
		if(accion_funcion1.esPaginaForm()==true) {
			window.opener.accion_webcontrol1.actualizarPaginaTablaDatos(accion_control);
		} else {
			this.actualizarPaginaTablaDatos(accion_control);
		}
	}
	
	actualizarPaginaAbrirLink(accion_control) {
		accion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(accion_control.strAuxiliarUrlPagina);
				
		accion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(accion_control.strAuxiliarTipo,accion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(accion_control) {
		accion_funcion1.resaltarRestaurarDivMensaje(true,accion_control.strAuxiliarMensajeAlert,accion_control.strAuxiliarCssMensaje);
			
		if(accion_funcion1.esPaginaForm()==true) {
			window.opener.accion_funcion1.resaltarRestaurarDivMensaje(true,accion_control.strAuxiliarMensajeAlert,accion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(accion_control) {
		eval(accion_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(accion_control, mostrar) {
		
		if(mostrar==true) {
			accion_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				accion_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			accion_funcion1.mostrarDivMensaje(true,accion_control.strAuxiliarMensaje,accion_control.strAuxiliarCssMensaje);
		
		} else {
			accion_funcion1.mostrarDivMensaje(false,accion_control.strAuxiliarMensaje,accion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(accion_control) {
	
		funcionGeneral.printWebPartPage("accion",accion_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliaraccionsAjaxWebPart").html(accion_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("accion",jQuery("#divTablaDatosReporteAuxiliaraccionsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(accion_control) {
		this.accion_controlInicial=accion_control;
			
		if(accion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(accion_control.strStyleDivArbol,accion_control.strStyleDivContent
																,accion_control.strStyleDivOpcionesBanner,accion_control.strStyleDivExpandirColapsar
																,accion_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=accion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",accion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(accion_control) {
		jQuery("#divTablaDatosaccionsAjaxWebPart").html(accion_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosaccions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(accion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosaccions=jQuery("#tblTablaDatosaccions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("accion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',accion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			accion_webcontrol1.registrarControlesTableEdition(accion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		accion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(accion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(accion_control.accionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(accion_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(accion_control) {
		this.actualizarCssBotonesPagina(accion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(accion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(accion_control.tiposReportes,accion_control.tiposReporte
															 	,accion_control.tiposPaginacion,accion_control.tiposAcciones
																,accion_control.tiposColumnasSelect,accion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(accion_control.tiposRelaciones,accion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(accion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(accion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(accion_control);			
	}
	
	actualizarPaginaAreaBusquedas(accion_control) {
		jQuery("#divBusquedaaccionAjaxWebPart").css("display",accion_control.strPermisoBusqueda);
		jQuery("#traccionCabeceraBusquedas").css("display",accion_control.strPermisoBusqueda);
		jQuery("#trBusquedaaccion").css("display",accion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(accion_control.htmlTablaOrderBy!=null
			&& accion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByaccionAjaxWebPart").html(accion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//accion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(accion_control.htmlTablaOrderByRel!=null
			&& accion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelaccionAjaxWebPart").html(accion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(accion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaaccionAjaxWebPart").css("display","none");
			jQuery("#traccionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaaccion").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(accion_control) {
		jQuery("#tdaccionNuevo").css("display",accion_control.strPermisoNuevo);
		jQuery("#traccionElementos").css("display",accion_control.strVisibleTablaElementos);
		jQuery("#traccionAcciones").css("display",accion_control.strVisibleTablaAcciones);
		jQuery("#traccionParametrosAcciones").css("display",accion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(accion_control) {
	
		this.actualizarCssBotonesMantenimiento(accion_control);
				
		if(accion_control.accionActual!=null) {//form
			
			this.actualizarCamposFormulario(accion_control);			
		}
						
		this.actualizarSpanMensajesCampos(accion_control);
	}
	
	actualizarPaginaUsuarioInvitado(accion_control) {
	
		var indexPosition=accion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=accion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(accion_control) {
		jQuery("#divResumenaccionActualAjaxWebPart").html(accion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(accion_control) {
		jQuery("#divAccionesRelacionesaccionAjaxWebPart").html(accion_control.htmlTablaAccionesRelaciones);
			
		accion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(accion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(accion_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(accion_control) {
		
		if(accion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+accion_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",accion_control.strVisibleFK_Idopcion);
			jQuery("#tblstrVisible"+accion_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",accion_control.strVisibleFK_Idopcion);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionaccion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("accion","seguridad","",accion_funcion1,accion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("accion",id,"seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);		
	}
	
	

	abrirBusquedaParaopcion(strNombreCampoBusqueda){//idActual
		accion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("accion","opcion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(accion_control) {
	
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-id").val(accion_control.accionActual.id);
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-version_row").val(accion_control.accionActual.versionRow);
		
		if(accion_control.accionActual.id_opcion!=null && accion_control.accionActual.id_opcion>-1){
			if(jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val() != accion_control.accionActual.id_opcion) {
				jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val(accion_control.accionActual.id_opcion).trigger("change");
			}
		} else { 
			//jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").select2("val", null);
			if(jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-codigo").val(accion_control.accionActual.codigo);
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-nombre").val(accion_control.accionActual.nombre);
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-descripcion").val(accion_control.accionActual.descripcion);
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-estado").prop('checked',accion_control.accionActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+accion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("accion","seguridad","","form_accion",formulario,"","",paraEventoTabla,idFilaTabla,accion_funcion1,accion_webcontrol1,accion_constante1);
	}
	
	cargarCombosFK(accion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",accion_control.strRecargarFkTipos,",")) { 
				accion_webcontrol1.cargarCombosopcionsFK(accion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(accion_control.strRecargarFkTiposNinguno!=null && accion_control.strRecargarFkTiposNinguno!='NINGUNO' && accion_control.strRecargarFkTiposNinguno!='') {
			
				if(accion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_opcion",accion_control.strRecargarFkTiposNinguno,",")) { 
					accion_webcontrol1.cargarCombosopcionsFK(accion_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(accion_control) {
		jQuery("#spanstrMensajeid").text(accion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(accion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_opcion").text(accion_control.strMensajeid_opcion);		
		jQuery("#spanstrMensajecodigo").text(accion_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(accion_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(accion_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeestado").text(accion_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(accion_control) {
		jQuery("#tdbtnNuevoaccion").css("visibility",accion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoaccion").css("display",accion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizaraccion").css("visibility",accion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizaraccion").css("display",accion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminaraccion").css("visibility",accion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminaraccion").css("display",accion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelaraccion").css("visibility",accion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosaccion").css("visibility",accion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosaccion").css("display",accion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBaraccion").css("visibility",accion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBaraccion").css("visibility",accion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBaraccion").css("visibility",accion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionperfil_accion").click(function(){

			var idActual=jQuery(this).attr("idactualaccion");

			accion_webcontrol1.registrarSesionParaperfil_acciones(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaopcionFK(accion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,accion_funcion1,accion_control.opcionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(accion_control) {
		var i=0;
		
		i=accion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(accion_control.accionActual.id);
		jQuery("#t-version_row_"+i+"").val(accion_control.accionActual.versionRow);
		
		if(accion_control.accionActual.id_opcion!=null && accion_control.accionActual.id_opcion>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != accion_control.accionActual.id_opcion) {
				jQuery("#t-cel_"+i+"_2").val(accion_control.accionActual.id_opcion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(accion_control.accionActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(accion_control.accionActual.nombre);
		jQuery("#t-cel_"+i+"_5").val(accion_control.accionActual.descripcion);
		jQuery("#t-cel_"+i+"_6").prop('checked',accion_control.accionActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(accion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_accion").click(function(){
		jQuery("#tblTablaDatosaccions").on("click",".imgrelacionperfil_accion", function () {

			var idActual=jQuery(this).attr("idactualaccion");

			accion_webcontrol1.registrarSesionParaperfil_acciones(idActual);
		});				
	}
		
	

	registrarSesionParaperfil_acciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"accion","perfil_accion","seguridad","",accion_funcion1,accion_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(accion_control) {
		accion_funcion1.registrarControlesTableValidacionEdition(accion_control,accion_webcontrol1,accion_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accionConstante,strParametros);
		
		//accion_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosopcionsFK(accion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+accion_constante1.STR_SUFIJO+"-id_opcion",accion_control.opcionsFK);

		if(accion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+accion_control.idFilaTablaActual+"_2",accion_control.opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+accion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion",accion_control.opcionsFK);

	};

	
	
	registrarComboActionChangeCombosopcionsFK(accion_control) {

	};

	
	
	setDefectoValorCombosopcionsFK(accion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(accion_control.idopcionDefaultFK>-1 && jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val() != accion_control.idopcionDefaultFK) {
				jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val(accion_control.idopcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+accion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(accion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+accion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+accion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//accion_control
		
	
	}
	
	onLoadCombosDefectoFK(accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",accion_control.strRecargarFkTipos,",")) { 
				accion_webcontrol1.setDefectoValorCombosopcionsFK(accion_control);
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
	onLoadCombosEventosFK(accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",accion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				accion_webcontrol1.registrarComboActionChangeCombosopcionsFK(accion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(accion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("accion");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("accion");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(accion_funcion1,accion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(accion_funcion1,accion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(accion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("accion","seguridad","",accion_funcion1,accion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("accion","seguridad","",accion_funcion1,accion_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("accion","seguridad","",accion_funcion1,accion_webcontrol1);			
			
			if(accion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("accion","seguridad","",accion_funcion1,accion_webcontrol1,"accion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("opcion","id_opcion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion_img_busqueda").click(function(){
				accion_webcontrol1.abrirBusquedaParaopcion("id_opcion");
				//alert(jQuery('#form-id_opcion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("accion","FK_Idopcion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("accion");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			accion_funcion1.validarFormularioJQuery(accion_constante1);
			
			if(accion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("accion","seguridad","",accion_funcion1,accion_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(accion_control) {
		
		jQuery("#divBusquedaaccionAjaxWebPart").css("display",accion_control.strPermisoBusqueda);
		jQuery("#traccionCabeceraBusquedas").css("display",accion_control.strPermisoBusqueda);
		jQuery("#trBusquedaaccion").css("display",accion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteaccion").css("display",accion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosaccion").attr("style",accion_control.strPermisoMostrarTodos);
		
		if(accion_control.strPermisoNuevo!=null) {
			jQuery("#tdaccionNuevo").css("display",accion_control.strPermisoNuevo);
			jQuery("#tdaccionNuevoToolBar").css("display",accion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdaccionDuplicar").css("display",accion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdaccionDuplicarToolBar").css("display",accion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdaccionNuevoGuardarCambios").css("display",accion_control.strPermisoNuevo);
			jQuery("#tdaccionNuevoGuardarCambiosToolBar").css("display",accion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(accion_control.strPermisoActualizar!=null) {
			jQuery("#tdaccionActualizarToolBar").css("display",accion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdaccionCopiar").css("display",accion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdaccionCopiarToolBar").css("display",accion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdaccionConEditar").css("display",accion_control.strPermisoActualizar);
		}
		
		jQuery("#tdaccionEliminarToolBar").css("display",accion_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdaccionGuardarCambios").css("display",accion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdaccionGuardarCambiosToolBar").css("display",accion_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#traccionElementos").css("display",accion_control.strVisibleTablaElementos);
		
		jQuery("#traccionAcciones").css("display",accion_control.strVisibleTablaAcciones);
		jQuery("#traccionParametrosAcciones").css("display",accion_control.strVisibleTablaAcciones);
			
		jQuery("#tdaccionCerrarPagina").css("display",accion_control.strPermisoPopup);		
		jQuery("#tdaccionCerrarPaginaToolBar").css("display",accion_control.strPermisoPopup);
		//jQuery("#traccionAccionesRelaciones").css("display",accion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("accion","seguridad","",accion_funcion1,accion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		accion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		accion_webcontrol1.registrarEventosControles();
		
		if(accion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(accion_constante1.STR_ES_RELACIONADO=="false") {
			accion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(accion_constante1.STR_ES_RELACIONES=="true") {
			if(accion_constante1.BIT_ES_PAGINA_FORM==true) {
				accion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(accion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(accion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				accion_webcontrol1.onLoad();
				
			} else {
				if(accion_constante1.BIT_ES_PAGINA_FORM==true) {
					if(accion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
						//accion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(accion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(accion_constante1.BIG_ID_ACTUAL,"accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
						//accion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			accion_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var accion_webcontrol1=new accion_webcontrol();

if(accion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = accion_webcontrol1.onLoadWindow; 
}

//</script>