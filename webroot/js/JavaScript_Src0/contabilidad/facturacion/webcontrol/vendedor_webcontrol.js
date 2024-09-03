//<script type="text/javascript" language="javascript">



//var vendedorJQueryPaginaWebInteraccion= function (vendedor_control) {
//this.,this.,this.

class vendedor_webcontrol extends vendedor_webcontrol_add {
	
	vendedor_control=null;
	vendedor_controlInicial=null;
	vendedor_controlAuxiliar=null;
		
	//if(vendedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(vendedor_control) {
		super();
		
		this.vendedor_control=vendedor_control;
	}
		
	actualizarVariablesPagina(vendedor_control) {
		
		if(vendedor_control.action=="index" || vendedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(vendedor_control);
			
		} else if(vendedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(vendedor_control);
		
		} else if(vendedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(vendedor_control);
		
		} else if(vendedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(vendedor_control);
		
		} else if(vendedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(vendedor_control);
			
		} else if(vendedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(vendedor_control);
			
		} else if(vendedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(vendedor_control);
		
		} else if(vendedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(vendedor_control);
		
		} else if(vendedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(vendedor_control);
		
		} else if(vendedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(vendedor_control);
		
		} else if(vendedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(vendedor_control);
		
		} else if(vendedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(vendedor_control);
		
		} else if(vendedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(vendedor_control);
		
		} else if(vendedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(vendedor_control);
		
		} else if(vendedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(vendedor_control);
		
		} else if(vendedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(vendedor_control);
		
		} else if(vendedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(vendedor_control);
		
		} else if(vendedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(vendedor_control);
		
		} else if(vendedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(vendedor_control);
		
		} else if(vendedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(vendedor_control);
		
		} else if(vendedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(vendedor_control);
		
		} else if(vendedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(vendedor_control);
		
		} else if(vendedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(vendedor_control);
		
		} else if(vendedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(vendedor_control);
		
		} else if(vendedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(vendedor_control);
		
		} else if(vendedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(vendedor_control);
		
		} else if(vendedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(vendedor_control);
		
		} else if(vendedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(vendedor_control);		
		
		} else if(vendedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(vendedor_control);		
		
		} else if(vendedor_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(vendedor_control);		
		
		} else if(vendedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(vendedor_control);		
		}
		else if(vendedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(vendedor_control);		
		}
		else if(vendedor_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(vendedor_control);		
		}
		else if(vendedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(vendedor_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(vendedor_control.action + " Revisar Manejo");
			
			if(vendedor_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(vendedor_control);
				
				return;
			}
			
			//if(vendedor_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(vendedor_control);
			//}
			
			if(vendedor_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(vendedor_control);
			}
			
			if(vendedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && vendedor_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(vendedor_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(vendedor_control, false);			
			}
			
			if(vendedor_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(vendedor_control);	
			}
			
			if(vendedor_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(vendedor_control);
			}
			
			if(vendedor_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(vendedor_control);
			}
			
			if(vendedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(vendedor_control);
			}
			
			if(vendedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(vendedor_control);	
			}
			
			if(vendedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(vendedor_control);
			}
			
			if(vendedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(vendedor_control);
			}
			
			
			if(vendedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(vendedor_control);			
			}
			
			if(vendedor_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(vendedor_control);
			}
			
			
			if(vendedor_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(vendedor_control);
			}
			
			if(vendedor_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(vendedor_control);
			}				
			
			if(vendedor_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(vendedor_control);
			}
			
			if(vendedor_control.usuarioActual!=null && vendedor_control.usuarioActual.field_strUserName!=null &&
			vendedor_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(vendedor_control);			
			}
		}
		
		
		if(vendedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(vendedor_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(vendedor_control) {
		
		this.actualizarPaginaCargaGeneral(vendedor_control);
		this.actualizarPaginaTablaDatos(vendedor_control);
		this.actualizarPaginaCargaGeneralControles(vendedor_control);
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(vendedor_control);
		this.actualizarPaginaAreaBusquedas(vendedor_control);
		this.actualizarPaginaCargaCombosFK(vendedor_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(vendedor_control) {
		
		this.actualizarPaginaCargaGeneral(vendedor_control);
		this.actualizarPaginaTablaDatos(vendedor_control);
		this.actualizarPaginaCargaGeneralControles(vendedor_control);
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(vendedor_control);
		this.actualizarPaginaAreaBusquedas(vendedor_control);
		this.actualizarPaginaCargaCombosFK(vendedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(vendedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(vendedor_control);		
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(vendedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(vendedor_control);		
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(vendedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(vendedor_control);		
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(vendedor_control) {
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(vendedor_control) {
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(vendedor_control) {
		this.actualizarPaginaCargaGeneralControles(vendedor_control);
		this.actualizarPaginaCargaCombosFK(vendedor_control);
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(vendedor_control) {
		this.actualizarPaginaAbrirLink(vendedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);				
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);
		this.actualizarPaginaFormulario(vendedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);
		this.actualizarPaginaFormulario(vendedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(vendedor_control) {
		this.actualizarPaginaFormulario(vendedor_control);
		this.onLoadCombosDefectoFK(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);
		this.actualizarPaginaFormulario(vendedor_control);
		this.onLoadCombosDefectoFK(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(vendedor_control) {
		this.actualizarPaginaCargaGeneralControles(vendedor_control);
		this.actualizarPaginaCargaCombosFK(vendedor_control);
		this.actualizarPaginaFormulario(vendedor_control);
		this.onLoadCombosDefectoFK(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(vendedor_control) {
		this.actualizarPaginaAbrirLink(vendedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(vendedor_control) {
		this.actualizarPaginaImprimir(vendedor_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(vendedor_control) {
		this.actualizarPaginaImprimir(vendedor_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(vendedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(vendedor_control) {
		//FORMULARIO
		if(vendedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(vendedor_control);
			this.actualizarPaginaFormularioAdd(vendedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		//COMBOS FK
		if(vendedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(vendedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(vendedor_control) {
		//FORMULARIO
		if(vendedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(vendedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);	
		//COMBOS FK
		if(vendedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(vendedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);
		this.actualizarPaginaFormulario(vendedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(vendedor_control) {
		//FORMULARIO
		if(vendedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(vendedor_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(vendedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);	
		//COMBOS FK
		if(vendedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(vendedor_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(vendedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(vendedor_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(vendedor_control) {
		if(vendedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && vendedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(vendedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(vendedor_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(vendedor_control) {
		if(vendedor_funcion1.esPaginaForm()==true) {
			window.opener.vendedor_webcontrol1.actualizarPaginaTablaDatos(vendedor_control);
		} else {
			this.actualizarPaginaTablaDatos(vendedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(vendedor_control) {
		vendedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(vendedor_control.strAuxiliarUrlPagina);
				
		vendedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(vendedor_control.strAuxiliarTipo,vendedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(vendedor_control) {
		vendedor_funcion1.resaltarRestaurarDivMensaje(true,vendedor_control.strAuxiliarMensajeAlert,vendedor_control.strAuxiliarCssMensaje);
			
		if(vendedor_funcion1.esPaginaForm()==true) {
			window.opener.vendedor_funcion1.resaltarRestaurarDivMensaje(true,vendedor_control.strAuxiliarMensajeAlert,vendedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(vendedor_control) {
		eval(vendedor_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(vendedor_control, mostrar) {
		
		if(mostrar==true) {
			vendedor_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				vendedor_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			vendedor_funcion1.mostrarDivMensaje(true,vendedor_control.strAuxiliarMensaje,vendedor_control.strAuxiliarCssMensaje);
		
		} else {
			vendedor_funcion1.mostrarDivMensaje(false,vendedor_control.strAuxiliarMensaje,vendedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(vendedor_control) {
	
		funcionGeneral.printWebPartPage("vendedor",vendedor_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarvendedorsAjaxWebPart").html(vendedor_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("vendedor",jQuery("#divTablaDatosReporteAuxiliarvendedorsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(vendedor_control) {
		this.vendedor_controlInicial=vendedor_control;
			
		if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(vendedor_control.strStyleDivArbol,vendedor_control.strStyleDivContent
																,vendedor_control.strStyleDivOpcionesBanner,vendedor_control.strStyleDivExpandirColapsar
																,vendedor_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=vendedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",vendedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(vendedor_control) {
		jQuery("#divTablaDatosvendedorsAjaxWebPart").html(vendedor_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosvendedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosvendedors=jQuery("#tblTablaDatosvendedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("vendedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',vendedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			vendedor_webcontrol1.registrarControlesTableEdition(vendedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		vendedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(vendedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(vendedor_control.vendedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(vendedor_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(vendedor_control) {
		this.actualizarCssBotonesPagina(vendedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(vendedor_control.tiposReportes,vendedor_control.tiposReporte
															 	,vendedor_control.tiposPaginacion,vendedor_control.tiposAcciones
																,vendedor_control.tiposColumnasSelect,vendedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(vendedor_control.tiposRelaciones,vendedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(vendedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(vendedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(vendedor_control);			
	}
	
	actualizarPaginaAreaBusquedas(vendedor_control) {
		jQuery("#divBusquedavendedorAjaxWebPart").css("display",vendedor_control.strPermisoBusqueda);
		jQuery("#trvendedorCabeceraBusquedas").css("display",vendedor_control.strPermisoBusqueda);
		jQuery("#trBusquedavendedor").css("display",vendedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(vendedor_control.htmlTablaOrderBy!=null
			&& vendedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByvendedorAjaxWebPart").html(vendedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//vendedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(vendedor_control.htmlTablaOrderByRel!=null
			&& vendedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelvendedorAjaxWebPart").html(vendedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(vendedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedavendedorAjaxWebPart").css("display","none");
			jQuery("#trvendedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedavendedor").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(vendedor_control) {
		jQuery("#tdvendedorNuevo").css("display",vendedor_control.strPermisoNuevo);
		jQuery("#trvendedorElementos").css("display",vendedor_control.strVisibleTablaElementos);
		jQuery("#trvendedorAcciones").css("display",vendedor_control.strVisibleTablaAcciones);
		jQuery("#trvendedorParametrosAcciones").css("display",vendedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(vendedor_control) {
	
		this.actualizarCssBotonesMantenimiento(vendedor_control);
				
		if(vendedor_control.vendedorActual!=null) {//form
			
			this.actualizarCamposFormulario(vendedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(vendedor_control);
	}
	
	actualizarPaginaUsuarioInvitado(vendedor_control) {
	
		var indexPosition=vendedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=vendedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(vendedor_control) {
		jQuery("#divResumenvendedorActualAjaxWebPart").html(vendedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(vendedor_control) {
		jQuery("#divAccionesRelacionesvendedorAjaxWebPart").html(vendedor_control.htmlTablaAccionesRelaciones);
			
		vendedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(vendedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(vendedor_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(vendedor_control) {
		
		if(vendedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+vendedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",vendedor_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+vendedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",vendedor_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionvendedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("vendedor",id,"facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		vendedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("vendedor","empresa","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(vendedor_control) {
	
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id").val(vendedor_control.vendedorActual.id);
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-version_row").val(vendedor_control.vendedorActual.versionRow);
		
		if(vendedor_control.vendedorActual.id_empresa!=null && vendedor_control.vendedorActual.id_empresa>-1){
			if(jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val() != vendedor_control.vendedorActual.id_empresa) {
				jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val(vendedor_control.vendedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-codigo").val(vendedor_control.vendedorActual.codigo);
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-nombre").val(vendedor_control.vendedorActual.nombre);
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-direccion1").val(vendedor_control.vendedorActual.direccion1);
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-direccion2").val(vendedor_control.vendedorActual.direccion2);
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-direccion3").val(vendedor_control.vendedorActual.direccion3);
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-comision").val(vendedor_control.vendedorActual.comision);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+vendedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("vendedor","facturacion","","form_vendedor",formulario,"","",paraEventoTabla,idFilaTabla,vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
	}
	
	cargarCombosFK(vendedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(vendedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",vendedor_control.strRecargarFkTipos,",")) { 
				vendedor_webcontrol1.cargarCombosempresasFK(vendedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(vendedor_control.strRecargarFkTiposNinguno!=null && vendedor_control.strRecargarFkTiposNinguno!='NINGUNO' && vendedor_control.strRecargarFkTiposNinguno!='') {
			
				if(vendedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",vendedor_control.strRecargarFkTiposNinguno,",")) { 
					vendedor_webcontrol1.cargarCombosempresasFK(vendedor_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(vendedor_control) {
		jQuery("#spanstrMensajeid").text(vendedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(vendedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(vendedor_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(vendedor_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(vendedor_control.strMensajenombre);		
		jQuery("#spanstrMensajedireccion1").text(vendedor_control.strMensajedireccion1);		
		jQuery("#spanstrMensajedireccion2").text(vendedor_control.strMensajedireccion2);		
		jQuery("#spanstrMensajedireccion3").text(vendedor_control.strMensajedireccion3);		
		jQuery("#spanstrMensajecomision").text(vendedor_control.strMensajecomision);		
	}
	
	actualizarCssBotonesMantenimiento(vendedor_control) {
		jQuery("#tdbtnNuevovendedor").css("visibility",vendedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevovendedor").css("display",vendedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarvendedor").css("visibility",vendedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarvendedor").css("display",vendedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarvendedor").css("visibility",vendedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarvendedor").css("display",vendedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarvendedor").css("visibility",vendedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosvendedor").css("visibility",vendedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosvendedor").css("display",vendedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarvendedor").css("visibility",vendedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarvendedor").css("visibility",vendedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarvendedor").css("visibility",vendedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelaciondevolucion_factura").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});
		jQuery("#imgdivrelacionfactura_lote").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParafactura_lotees(idActual);
		});
		jQuery("#imgdivrelaciondevolucion").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParadevoluciones(idActual);
		});
		jQuery("#imgdivrelacionorden_compra").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		});
		jQuery("#imgdivrelacionestimado").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaestimados(idActual);
		});
		jQuery("#imgdivrelacionfactura").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParafacturas(idActual);
		});
		jQuery("#imgdivrelacioncotizacion").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParacotizaciones(idActual);
		});
		jQuery("#imgdivrelacionconsignacion").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaconsignaciones(idActual);
		});
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(vendedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,vendedor_funcion1,vendedor_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(vendedor_control) {
		var i=0;
		
		i=vendedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(vendedor_control.vendedorActual.id);
		jQuery("#t-version_row_"+i+"").val(vendedor_control.vendedorActual.versionRow);
		
		if(vendedor_control.vendedorActual.id_empresa!=null && vendedor_control.vendedorActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != vendedor_control.vendedorActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(vendedor_control.vendedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(vendedor_control.vendedorActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(vendedor_control.vendedorActual.nombre);
		jQuery("#t-cel_"+i+"_5").val(vendedor_control.vendedorActual.direccion1);
		jQuery("#t-cel_"+i+"_6").val(vendedor_control.vendedorActual.direccion2);
		jQuery("#t-cel_"+i+"_7").val(vendedor_control.vendedorActual.direccion3);
		jQuery("#t-cel_"+i+"_8").val(vendedor_control.vendedorActual.comision);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(vendedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion_factura").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelaciondevolucion_factura", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura_lote").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacionfactura_lote", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParafactura_lotees(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelaciondevolucion", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParadevoluciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionorden_compra").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacionorden_compra", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionestimado").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacionestimado", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaestimados(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacionfactura", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParafacturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncotizacion").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacioncotizacion", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParacotizaciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionconsignacion").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacionconsignacion", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaconsignaciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaproveedores(idActual);
		});				
	}
		
	

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","cliente","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"s","");
	}

	registrarSesionParadevolucion_facturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","devolucion_factura","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"s","");
	}

	registrarSesionParafactura_lotees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","factura_lote","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"es","");
	}

	registrarSesionParadevoluciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","devolucion","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"es","");
	}

	registrarSesionParaorden_compras(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","orden_compra","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"s","");
	}

	registrarSesionParaestimados(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","estimado","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"s","");
	}

	registrarSesionParafacturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","factura","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"s","");
	}

	registrarSesionParacotizaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","cotizacion","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"es","");
	}

	registrarSesionParaconsignaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","consignacion","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"es","");
	}

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","proveedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(vendedor_control) {
		vendedor_funcion1.registrarControlesTableValidacionEdition(vendedor_control,vendedor_webcontrol1,vendedor_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedorConstante,strParametros);
		
		//vendedor_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(vendedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa",vendedor_control.empresasFK);

		if(vendedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+vendedor_control.idFilaTablaActual+"_2",vendedor_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(vendedor_control) {

	};

	
	
	setDefectoValorCombosempresasFK(vendedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(vendedor_control.idempresaDefaultFK>-1 && jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val() != vendedor_control.idempresaDefaultFK) {
				jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val(vendedor_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//vendedor_control
		
	
	}
	
	onLoadCombosDefectoFK(vendedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(vendedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(vendedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",vendedor_control.strRecargarFkTipos,",")) { 
				vendedor_webcontrol1.setDefectoValorCombosempresasFK(vendedor_control);
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
	onLoadCombosEventosFK(vendedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(vendedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(vendedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",vendedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				vendedor_webcontrol1.registrarComboActionChangeCombosempresasFK(vendedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(vendedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(vendedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(vendedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("vendedor");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("vendedor");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(vendedor_funcion1,vendedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(vendedor_funcion1,vendedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(vendedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);			
			
			if(vendedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"vendedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				vendedor_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("vendedor","FK_Idempresa","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("vendedor");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			vendedor_funcion1.validarFormularioJQuery(vendedor_constante1);
			
			if(vendedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(vendedor_control) {
		
		jQuery("#divBusquedavendedorAjaxWebPart").css("display",vendedor_control.strPermisoBusqueda);
		jQuery("#trvendedorCabeceraBusquedas").css("display",vendedor_control.strPermisoBusqueda);
		jQuery("#trBusquedavendedor").css("display",vendedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportevendedor").css("display",vendedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosvendedor").attr("style",vendedor_control.strPermisoMostrarTodos);
		
		if(vendedor_control.strPermisoNuevo!=null) {
			jQuery("#tdvendedorNuevo").css("display",vendedor_control.strPermisoNuevo);
			jQuery("#tdvendedorNuevoToolBar").css("display",vendedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdvendedorDuplicar").css("display",vendedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdvendedorDuplicarToolBar").css("display",vendedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdvendedorNuevoGuardarCambios").css("display",vendedor_control.strPermisoNuevo);
			jQuery("#tdvendedorNuevoGuardarCambiosToolBar").css("display",vendedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(vendedor_control.strPermisoActualizar!=null) {
			jQuery("#tdvendedorActualizarToolBar").css("display",vendedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdvendedorCopiar").css("display",vendedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdvendedorCopiarToolBar").css("display",vendedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdvendedorConEditar").css("display",vendedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdvendedorEliminarToolBar").css("display",vendedor_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdvendedorGuardarCambios").css("display",vendedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdvendedorGuardarCambiosToolBar").css("display",vendedor_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trvendedorElementos").css("display",vendedor_control.strVisibleTablaElementos);
		
		jQuery("#trvendedorAcciones").css("display",vendedor_control.strVisibleTablaAcciones);
		jQuery("#trvendedorParametrosAcciones").css("display",vendedor_control.strVisibleTablaAcciones);
			
		jQuery("#tdvendedorCerrarPagina").css("display",vendedor_control.strPermisoPopup);		
		jQuery("#tdvendedorCerrarPaginaToolBar").css("display",vendedor_control.strPermisoPopup);
		//jQuery("#trvendedorAccionesRelaciones").css("display",vendedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		vendedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		vendedor_webcontrol1.registrarEventosControles();
		
		if(vendedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
			vendedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(vendedor_constante1.STR_ES_RELACIONES=="true") {
			if(vendedor_constante1.BIT_ES_PAGINA_FORM==true) {
				vendedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(vendedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(vendedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				vendedor_webcontrol1.onLoad();
				
			} else {
				if(vendedor_constante1.BIT_ES_PAGINA_FORM==true) {
					if(vendedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
						//vendedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(vendedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(vendedor_constante1.BIG_ID_ACTUAL,"vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
						//vendedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			vendedor_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var vendedor_webcontrol1=new vendedor_webcontrol();

if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = vendedor_webcontrol1.onLoadWindow; 
}

//</script>