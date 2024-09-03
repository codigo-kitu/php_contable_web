//<script type="text/javascript" language="javascript">



//var facturaJQueryPaginaWebInteraccion= function (factura_control) {
//this.,this.,this.

class factura_webcontrol extends factura_webcontrol_add {
	
	factura_control=null;
	factura_controlInicial=null;
	factura_controlAuxiliar=null;
		
	//if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(factura_control) {
		super();
		
		this.factura_control=factura_control;
	}
		
	actualizarVariablesPagina(factura_control) {
		
		if(factura_control.action=="index" || factura_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(factura_control);
			
		} else if(factura_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_control);
		
		} else if(factura_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(factura_control);
		
		} else if(factura_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_control);
		
		} else if(factura_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(factura_control);
			
		} else if(factura_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(factura_control);
			
		} else if(factura_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_control);
		
		} else if(factura_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_control);
		
		} else if(factura_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(factura_control);
		
		} else if(factura_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(factura_control);
		
		} else if(factura_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(factura_control);
		
		} else if(factura_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(factura_control);
		
		} else if(factura_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(factura_control);
		
		} else if(factura_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(factura_control);
		
		} else if(factura_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(factura_control);
		
		} else if(factura_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(factura_control);
		
		} else if(factura_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_control);
		
		} else if(factura_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_control);
		
		} else if(factura_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_control);
		
		} else if(factura_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(factura_control);
		
		} else if(factura_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(factura_control);
		
		} else if(factura_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(factura_control);
		
		} else if(factura_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_control);
		
		} else if(factura_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_control);
		
		} else if(factura_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_control);
		
		} else if(factura_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(factura_control);
		
		} else if(factura_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_control);
		
		} else if(factura_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_control);		
		
		} else if(factura_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(factura_control);		
		
		} else if(factura_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_control);		
		
		} else if(factura_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(factura_control);		
		}
		else if(factura_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_control);		
		}
		else if(factura_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_control);		
		}
		else if(factura_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(factura_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(factura_control.action + " Revisar Manejo");
			
			if(factura_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(factura_control);
				
				return;
			}
			
			//if(factura_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(factura_control);
			//}
			
			if(factura_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(factura_control);
			}
			
			if(factura_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(factura_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(factura_control, false);			
			}
			
			if(factura_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(factura_control);	
			}
			
			if(factura_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(factura_control);
			}
			
			if(factura_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(factura_control);
			}
			
			if(factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(factura_control);
			}
			
			if(factura_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(factura_control);	
			}
			
			if(factura_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(factura_control);
			}
			
			if(factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(factura_control);
			}
			
			
			if(factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(factura_control);			
			}
			
			if(factura_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(factura_control);
			}
			
			
			if(factura_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(factura_control);
			}
			
			if(factura_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(factura_control);
			}				
			
			if(factura_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_control);
			}
			
			if(factura_control.usuarioActual!=null && factura_control.usuarioActual.field_strUserName!=null &&
			factura_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(factura_control);			
			}
		}
		
		
		if(factura_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(factura_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(factura_control) {
		
		this.actualizarPaginaCargaGeneral(factura_control);
		this.actualizarPaginaTablaDatos(factura_control);
		this.actualizarPaginaCargaGeneralControles(factura_control);
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_control);
		this.actualizarPaginaAreaBusquedas(factura_control);
		this.actualizarPaginaCargaCombosFK(factura_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_control) {
		
		this.actualizarPaginaCargaGeneral(factura_control);
		this.actualizarPaginaTablaDatos(factura_control);
		this.actualizarPaginaCargaGeneralControles(factura_control);
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_control);
		this.actualizarPaginaAreaBusquedas(factura_control);
		this.actualizarPaginaCargaCombosFK(factura_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_control);		
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_control);		
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_control);		
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(factura_control) {
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(factura_control) {
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_control) {
		this.actualizarPaginaCargaGeneralControles(factura_control);
		this.actualizarPaginaCargaCombosFK(factura_control);
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_control) {
		this.actualizarPaginaAbrirLink(factura_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);				
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);
		this.actualizarPaginaFormulario(factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);
		this.actualizarPaginaFormulario(factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(factura_control) {
		this.actualizarPaginaFormulario(factura_control);
		this.onLoadCombosDefectoFK(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);
		this.actualizarPaginaFormulario(factura_control);
		this.onLoadCombosDefectoFK(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_control) {
		this.actualizarPaginaCargaGeneralControles(factura_control);
		this.actualizarPaginaCargaCombosFK(factura_control);
		this.actualizarPaginaFormulario(factura_control);
		this.onLoadCombosDefectoFK(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_control) {
		this.actualizarPaginaAbrirLink(factura_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_control) {
		this.actualizarPaginaImprimir(factura_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_control) {
		this.actualizarPaginaImprimir(factura_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(factura_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_control) {
		//FORMULARIO
		if(factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_control);
			this.actualizarPaginaFormularioAdd(factura_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		//COMBOS FK
		if(factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(factura_control) {
		//FORMULARIO
		if(factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);	
		//COMBOS FK
		if(factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);
		this.actualizarPaginaFormulario(factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_control) {
		//FORMULARIO
		if(factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(factura_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);	
		//COMBOS FK
		if(factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(factura_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(factura_control) {
		if(factura_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(factura_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(factura_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(factura_control) {
		if(factura_funcion1.esPaginaForm()==true) {
			window.opener.factura_webcontrol1.actualizarPaginaTablaDatos(factura_control);
		} else {
			this.actualizarPaginaTablaDatos(factura_control);
		}
	}
	
	actualizarPaginaAbrirLink(factura_control) {
		factura_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(factura_control.strAuxiliarUrlPagina);
				
		factura_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(factura_control.strAuxiliarTipo,factura_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(factura_control) {
		factura_funcion1.resaltarRestaurarDivMensaje(true,factura_control.strAuxiliarMensajeAlert,factura_control.strAuxiliarCssMensaje);
			
		if(factura_funcion1.esPaginaForm()==true) {
			window.opener.factura_funcion1.resaltarRestaurarDivMensaje(true,factura_control.strAuxiliarMensajeAlert,factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(factura_control) {
		eval(factura_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(factura_control, mostrar) {
		
		if(mostrar==true) {
			factura_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				factura_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			factura_funcion1.mostrarDivMensaje(true,factura_control.strAuxiliarMensaje,factura_control.strAuxiliarCssMensaje);
		
		} else {
			factura_funcion1.mostrarDivMensaje(false,factura_control.strAuxiliarMensaje,factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(factura_control) {
	
		funcionGeneral.printWebPartPage("factura",factura_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarfacturasAjaxWebPart").html(factura_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("factura",jQuery("#divTablaDatosReporteAuxiliarfacturasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(factura_control) {
		this.factura_controlInicial=factura_control;
			
		if(factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(factura_control.strStyleDivArbol,factura_control.strStyleDivContent
																,factura_control.strStyleDivOpcionesBanner,factura_control.strStyleDivExpandirColapsar
																,factura_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=factura_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",factura_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(factura_control) {
		jQuery("#divTablaDatosfacturasAjaxWebPart").html(factura_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosfacturas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(factura_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosfacturas=jQuery("#tblTablaDatosfacturas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("factura",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',factura_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			factura_webcontrol1.registrarControlesTableEdition(factura_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		factura_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(factura_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(factura_control.facturaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(factura_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(factura_control) {
		this.actualizarCssBotonesPagina(factura_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(factura_control.tiposReportes,factura_control.tiposReporte
															 	,factura_control.tiposPaginacion,factura_control.tiposAcciones
																,factura_control.tiposColumnasSelect,factura_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(factura_control.tiposRelaciones,factura_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(factura_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(factura_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(factura_control);			
	}
	
	actualizarPaginaAreaBusquedas(factura_control) {
		jQuery("#divBusquedafacturaAjaxWebPart").css("display",factura_control.strPermisoBusqueda);
		jQuery("#trfacturaCabeceraBusquedas").css("display",factura_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura").css("display",factura_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(factura_control.htmlTablaOrderBy!=null
			&& factura_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByfacturaAjaxWebPart").html(factura_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//factura_webcontrol1.registrarOrderByActions();
			
		}
			
		if(factura_control.htmlTablaOrderByRel!=null
			&& factura_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelfacturaAjaxWebPart").html(factura_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(factura_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedafacturaAjaxWebPart").css("display","none");
			jQuery("#trfacturaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedafactura").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(factura_control) {
		jQuery("#tdfacturaNuevo").css("display",factura_control.strPermisoNuevo);
		jQuery("#trfacturaElementos").css("display",factura_control.strVisibleTablaElementos);
		jQuery("#trfacturaAcciones").css("display",factura_control.strVisibleTablaAcciones);
		jQuery("#trfacturaParametrosAcciones").css("display",factura_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(factura_control) {
	
		this.actualizarCssBotonesMantenimiento(factura_control);
				
		if(factura_control.facturaActual!=null) {//form
			
			this.actualizarCamposFormulario(factura_control);			
		}
						
		this.actualizarSpanMensajesCampos(factura_control);
	}
	
	actualizarPaginaUsuarioInvitado(factura_control) {
	
		var indexPosition=factura_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=factura_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(factura_control) {
		jQuery("#divResumenfacturaActualAjaxWebPart").html(factura_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_control) {
		jQuery("#divAccionesRelacionesfacturaAjaxWebPart").html(factura_control.htmlTablaAccionesRelaciones);
			
		factura_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(factura_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(factura_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(factura_control) {
		
		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",factura_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",factura_control.strVisibleFK_Idasiento);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",factura_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",factura_control.strVisibleFK_Idcliente);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",factura_control.strVisibleFK_Iddocumento_cuenta_cobrar);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",factura_control.strVisibleFK_Iddocumento_cuenta_cobrar);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",factura_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",factura_control.strVisibleFK_Idejercicio);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",factura_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",factura_control.strVisibleFK_Idempresa);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idestado").attr("style",factura_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idestado").attr("style",factura_control.strVisibleFK_Idestado);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",factura_control.strVisibleFK_Idkardex);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",factura_control.strVisibleFK_Idkardex);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",factura_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",factura_control.strVisibleFK_Idperiodo);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",factura_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",factura_control.strVisibleFK_Idsucursal);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",factura_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",factura_control.strVisibleFK_Idtermino_pago);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",factura_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",factura_control.strVisibleFK_Idusuario);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",factura_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",factura_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionfactura();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("factura","facturacion","",factura_funcion1,factura_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("factura",id,"facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","empresa","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","sucursal","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","ejercicio","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","periodo","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","usuario","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","cliente","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","vendedor","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","termino_pago_cliente","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","estado","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","asiento","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParadocumento_cuenta_cobrar(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","documento_cuenta_cobrar","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParakardex(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","kardex","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(factura_control) {
	
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-id").val(factura_control.facturaActual.id);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-version_row").val(factura_control.facturaActual.versionRow);
		
		if(factura_control.facturaActual.id_empresa!=null && factura_control.facturaActual.id_empresa>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val() != factura_control.facturaActual.id_empresa) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val(factura_control.facturaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_sucursal!=null && factura_control.facturaActual.id_sucursal>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val() != factura_control.facturaActual.id_sucursal) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val(factura_control.facturaActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_ejercicio!=null && factura_control.facturaActual.id_ejercicio>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val() != factura_control.facturaActual.id_ejercicio) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val(factura_control.facturaActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_periodo!=null && factura_control.facturaActual.id_periodo>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val() != factura_control.facturaActual.id_periodo) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val(factura_control.facturaActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_usuario!=null && factura_control.facturaActual.id_usuario>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val() != factura_control.facturaActual.id_usuario) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val(factura_control.facturaActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-numero").val(factura_control.facturaActual.numero);
		
		if(factura_control.facturaActual.id_cliente!=null && factura_control.facturaActual.id_cliente>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val() != factura_control.facturaActual.id_cliente) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val(factura_control.facturaActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-ruc").val(factura_control.facturaActual.ruc);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-referencia_cliente").val(factura_control.facturaActual.referencia_cliente);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-fecha_emision").val(factura_control.facturaActual.fecha_emision);
		
		if(factura_control.facturaActual.id_vendedor!=null && factura_control.facturaActual.id_vendedor>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val() != factura_control.facturaActual.id_vendedor) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val(factura_control.facturaActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_termino_pago_cliente!=null && factura_control.facturaActual.id_termino_pago_cliente>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != factura_control.facturaActual.id_termino_pago_cliente) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(factura_control.facturaActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-fecha_vence").val(factura_control.facturaActual.fecha_vence);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-tipo_cambio").val(factura_control.facturaActual.tipo_cambio);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-moneda").val(factura_control.facturaActual.moneda);
		
		if(factura_control.facturaActual.id_estado!=null && factura_control.facturaActual.id_estado>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val() != factura_control.facturaActual.id_estado) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val(factura_control.facturaActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-direccion").val(factura_control.facturaActual.direccion);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-enviar_a").val(factura_control.facturaActual.enviar_a);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-observacion").val(factura_control.facturaActual.observacion);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-sub_total").val(factura_control.facturaActual.sub_total);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-descuento_monto").val(factura_control.facturaActual.descuento_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-descuento_porciento").val(factura_control.facturaActual.descuento_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-iva_monto").val(factura_control.facturaActual.iva_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-iva_porciento").val(factura_control.facturaActual.iva_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-retencion_fuente_monto").val(factura_control.facturaActual.retencion_fuente_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-retencion_fuente_porciento").val(factura_control.facturaActual.retencion_fuente_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-retencion_iva_monto").val(factura_control.facturaActual.retencion_iva_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-retencion_iva_porciento").val(factura_control.facturaActual.retencion_iva_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-total").val(factura_control.facturaActual.total);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-otro_monto").val(factura_control.facturaActual.otro_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-otro_porciento").val(factura_control.facturaActual.otro_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-impuesto_en_precio").val(factura_control.facturaActual.impuesto_en_precio);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-nota").val(factura_control.facturaActual.nota);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-hora").val(factura_control.facturaActual.hora);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-tipo_envio").val(factura_control.facturaActual.tipo_envio);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-actualizado").val(factura_control.facturaActual.actualizado);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-computador").val(factura_control.facturaActual.computador);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-monto_base").val(factura_control.facturaActual.monto_base);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-descuento_parcial_monto").val(factura_control.facturaActual.descuento_parcial_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-impuesto2_porciento").val(factura_control.facturaActual.impuesto2_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-impuesto2_monto").val(factura_control.facturaActual.impuesto2_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-retencion_ica_porciento").val(factura_control.facturaActual.retencion_ica_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-retencion_ica_monto").val(factura_control.facturaActual.retencion_ica_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-tipo_factura").val(factura_control.facturaActual.tipo_factura);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-enviar").val(factura_control.facturaActual.enviar);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-nro_estimado").val(factura_control.facturaActual.nro_estimado);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-ncf").val(factura_control.facturaActual.ncf);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-en_anexo").val(factura_control.facturaActual.en_anexo);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-campo1").val(factura_control.facturaActual.campo1);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-campo2").val(factura_control.facturaActual.campo2);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-campo3").val(factura_control.facturaActual.campo3);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-pagos").val(factura_control.facturaActual.pagos);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-anulada").val(factura_control.facturaActual.anulada);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-causa_anulacion").val(factura_control.facturaActual.causa_anulacion);
		
		if(factura_control.facturaActual.id_asiento!=null && factura_control.facturaActual.id_asiento>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val() != factura_control.facturaActual.id_asiento) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val(factura_control.facturaActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_documento_cuenta_cobrar!=null && factura_control.facturaActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != factura_control.facturaActual.id_documento_cuenta_cobrar) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(factura_control.facturaActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_kardex!=null && factura_control.facturaActual.id_kardex>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val() != factura_control.facturaActual.id_kardex) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val(factura_control.facturaActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-comprobante").val(factura_control.facturaActual.comprobante);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+factura_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("factura","facturacion","","form_factura",formulario,"","",paraEventoTabla,idFilaTabla,factura_funcion1,factura_webcontrol1,factura_constante1);
	}
	
	cargarCombosFK(factura_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosempresasFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombossucursalsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosejerciciosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosperiodosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosusuariosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosclientesFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosvendedorsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombostermino_pago_clientesFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosestadosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosasientosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarComboskardexsFK(factura_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(factura_control.strRecargarFkTiposNinguno!=null && factura_control.strRecargarFkTiposNinguno!='NINGUNO' && factura_control.strRecargarFkTiposNinguno!='') {
			
				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosempresasFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombossucursalsFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosejerciciosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosperiodosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosusuariosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosclientesFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosvendedorsFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombostermino_pago_clientesFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosestadosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosasientosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarComboskardexsFK(factura_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(factura_control) {
		jQuery("#spanstrMensajeid").text(factura_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(factura_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(factura_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(factura_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(factura_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(factura_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(factura_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenumero").text(factura_control.strMensajenumero);		
		jQuery("#spanstrMensajeid_cliente").text(factura_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajeruc").text(factura_control.strMensajeruc);		
		jQuery("#spanstrMensajereferencia_cliente").text(factura_control.strMensajereferencia_cliente);		
		jQuery("#spanstrMensajefecha_emision").text(factura_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajeid_vendedor").text(factura_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajeid_termino_pago_cliente").text(factura_control.strMensajeid_termino_pago_cliente);		
		jQuery("#spanstrMensajefecha_vence").text(factura_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajetipo_cambio").text(factura_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajemoneda").text(factura_control.strMensajemoneda);		
		jQuery("#spanstrMensajeid_estado").text(factura_control.strMensajeid_estado);		
		jQuery("#spanstrMensajedireccion").text(factura_control.strMensajedireccion);		
		jQuery("#spanstrMensajeenviar_a").text(factura_control.strMensajeenviar_a);		
		jQuery("#spanstrMensajeobservacion").text(factura_control.strMensajeobservacion);		
		jQuery("#spanstrMensajesub_total").text(factura_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_monto").text(factura_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajedescuento_porciento").text(factura_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(factura_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(factura_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeretencion_fuente_monto").text(factura_control.strMensajeretencion_fuente_monto);		
		jQuery("#spanstrMensajeretencion_fuente_porciento").text(factura_control.strMensajeretencion_fuente_porciento);		
		jQuery("#spanstrMensajeretencion_iva_monto").text(factura_control.strMensajeretencion_iva_monto);		
		jQuery("#spanstrMensajeretencion_iva_porciento").text(factura_control.strMensajeretencion_iva_porciento);		
		jQuery("#spanstrMensajetotal").text(factura_control.strMensajetotal);		
		jQuery("#spanstrMensajeotro_monto").text(factura_control.strMensajeotro_monto);		
		jQuery("#spanstrMensajeotro_porciento").text(factura_control.strMensajeotro_porciento);		
		jQuery("#spanstrMensajeimpuesto_en_precio").text(factura_control.strMensajeimpuesto_en_precio);		
		jQuery("#spanstrMensajenota").text(factura_control.strMensajenota);		
		jQuery("#spanstrMensajehora").text(factura_control.strMensajehora);		
		jQuery("#spanstrMensajetipo_envio").text(factura_control.strMensajetipo_envio);		
		jQuery("#spanstrMensajeactualizado").text(factura_control.strMensajeactualizado);		
		jQuery("#spanstrMensajecomputador").text(factura_control.strMensajecomputador);		
		jQuery("#spanstrMensajemonto_base").text(factura_control.strMensajemonto_base);		
		jQuery("#spanstrMensajedescuento_parcial_monto").text(factura_control.strMensajedescuento_parcial_monto);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(factura_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(factura_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajeretencion_ica_porciento").text(factura_control.strMensajeretencion_ica_porciento);		
		jQuery("#spanstrMensajeretencion_ica_monto").text(factura_control.strMensajeretencion_ica_monto);		
		jQuery("#spanstrMensajetipo_factura").text(factura_control.strMensajetipo_factura);		
		jQuery("#spanstrMensajeenviar").text(factura_control.strMensajeenviar);		
		jQuery("#spanstrMensajenro_estimado").text(factura_control.strMensajenro_estimado);		
		jQuery("#spanstrMensajencf").text(factura_control.strMensajencf);		
		jQuery("#spanstrMensajeen_anexo").text(factura_control.strMensajeen_anexo);		
		jQuery("#spanstrMensajecampo1").text(factura_control.strMensajecampo1);		
		jQuery("#spanstrMensajecampo2").text(factura_control.strMensajecampo2);		
		jQuery("#spanstrMensajecampo3").text(factura_control.strMensajecampo3);		
		jQuery("#spanstrMensajepagos").text(factura_control.strMensajepagos);		
		jQuery("#spanstrMensajeanulada").text(factura_control.strMensajeanulada);		
		jQuery("#spanstrMensajecausa_anulacion").text(factura_control.strMensajecausa_anulacion);		
		jQuery("#spanstrMensajeid_asiento").text(factura_control.strMensajeid_asiento);		
		jQuery("#spanstrMensajeid_documento_cuenta_cobrar").text(factura_control.strMensajeid_documento_cuenta_cobrar);		
		jQuery("#spanstrMensajeid_kardex").text(factura_control.strMensajeid_kardex);		
		jQuery("#spanstrMensajecomprobante").text(factura_control.strMensajecomprobante);		
	}
	
	actualizarCssBotonesMantenimiento(factura_control) {
		jQuery("#tdbtnNuevofactura").css("visibility",factura_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevofactura").css("display",factura_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarfactura").css("visibility",factura_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarfactura").css("display",factura_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarfactura").css("visibility",factura_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarfactura").css("display",factura_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarfactura").css("visibility",factura_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosfactura").css("visibility",factura_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosfactura").css("display",factura_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarfactura").css("visibility",factura_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarfactura").css("visibility",factura_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarfactura").css("visibility",factura_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionfactura_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualfactura");

			factura_webcontrol1.registrarSesionParafactura_detalles(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_cliente") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+factura_constante1.STR_SUFIJO+"-id_cliente" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.facturaActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.facturaActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.facturaActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.clientesFK);
	}

	cargarComboEditarTablavendedorFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablaestadoFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.asientosFK);
	}

	cargarComboEditarTabladocumento_cuenta_cobrarFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.documento_cuenta_cobrarsFK);
	}

	cargarComboEditarTablakardexFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(factura_control) {
		var i=0;
		
		i=factura_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(factura_control.facturaActual.id);
		jQuery("#t-version_row_"+i+"").val(factura_control.facturaActual.versionRow);
		
		if(factura_control.facturaActual.id_empresa!=null && factura_control.facturaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != factura_control.facturaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(factura_control.facturaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_sucursal!=null && factura_control.facturaActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != factura_control.facturaActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(factura_control.facturaActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_ejercicio!=null && factura_control.facturaActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != factura_control.facturaActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(factura_control.facturaActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_periodo!=null && factura_control.facturaActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != factura_control.facturaActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(factura_control.facturaActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_usuario!=null && factura_control.facturaActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != factura_control.facturaActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(factura_control.facturaActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(factura_control.facturaActual.numero);
		
		if(factura_control.facturaActual.id_cliente!=null && factura_control.facturaActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != factura_control.facturaActual.id_cliente) {
				jQuery("#t-cel_"+i+"_8").val(factura_control.facturaActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(factura_control.facturaActual.ruc);
		jQuery("#t-cel_"+i+"_10").val(factura_control.facturaActual.referencia_cliente);
		jQuery("#t-cel_"+i+"_11").val(factura_control.facturaActual.fecha_emision);
		
		if(factura_control.facturaActual.id_vendedor!=null && factura_control.facturaActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != factura_control.facturaActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_12").val(factura_control.facturaActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_termino_pago_cliente!=null && factura_control.facturaActual.id_termino_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != factura_control.facturaActual.id_termino_pago_cliente) {
				jQuery("#t-cel_"+i+"_13").val(factura_control.facturaActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(factura_control.facturaActual.fecha_vence);
		jQuery("#t-cel_"+i+"_15").val(factura_control.facturaActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_16").val(factura_control.facturaActual.moneda);
		
		if(factura_control.facturaActual.id_estado!=null && factura_control.facturaActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_17").val() != factura_control.facturaActual.id_estado) {
				jQuery("#t-cel_"+i+"_17").val(factura_control.facturaActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_17").select2("val", null);
			if(jQuery("#t-cel_"+i+"_17").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_17").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_18").val(factura_control.facturaActual.direccion);
		jQuery("#t-cel_"+i+"_19").val(factura_control.facturaActual.enviar_a);
		jQuery("#t-cel_"+i+"_20").val(factura_control.facturaActual.observacion);
		jQuery("#t-cel_"+i+"_21").val(factura_control.facturaActual.sub_total);
		jQuery("#t-cel_"+i+"_22").val(factura_control.facturaActual.descuento_monto);
		jQuery("#t-cel_"+i+"_23").val(factura_control.facturaActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_24").val(factura_control.facturaActual.iva_monto);
		jQuery("#t-cel_"+i+"_25").val(factura_control.facturaActual.iva_porciento);
		jQuery("#t-cel_"+i+"_26").val(factura_control.facturaActual.retencion_fuente_monto);
		jQuery("#t-cel_"+i+"_27").val(factura_control.facturaActual.retencion_fuente_porciento);
		jQuery("#t-cel_"+i+"_28").val(factura_control.facturaActual.retencion_iva_monto);
		jQuery("#t-cel_"+i+"_29").val(factura_control.facturaActual.retencion_iva_porciento);
		jQuery("#t-cel_"+i+"_30").val(factura_control.facturaActual.total);
		jQuery("#t-cel_"+i+"_31").val(factura_control.facturaActual.otro_monto);
		jQuery("#t-cel_"+i+"_32").val(factura_control.facturaActual.otro_porciento);
		jQuery("#t-cel_"+i+"_33").val(factura_control.facturaActual.impuesto_en_precio);
		jQuery("#t-cel_"+i+"_34").val(factura_control.facturaActual.nota);
		jQuery("#t-cel_"+i+"_35").val(factura_control.facturaActual.hora);
		jQuery("#t-cel_"+i+"_36").val(factura_control.facturaActual.tipo_envio);
		jQuery("#t-cel_"+i+"_37").val(factura_control.facturaActual.actualizado);
		jQuery("#t-cel_"+i+"_38").val(factura_control.facturaActual.computador);
		jQuery("#t-cel_"+i+"_39").val(factura_control.facturaActual.monto_base);
		jQuery("#t-cel_"+i+"_40").val(factura_control.facturaActual.descuento_parcial_monto);
		jQuery("#t-cel_"+i+"_41").val(factura_control.facturaActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_42").val(factura_control.facturaActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_43").val(factura_control.facturaActual.retencion_ica_porciento);
		jQuery("#t-cel_"+i+"_44").val(factura_control.facturaActual.retencion_ica_monto);
		jQuery("#t-cel_"+i+"_45").val(factura_control.facturaActual.tipo_factura);
		jQuery("#t-cel_"+i+"_46").val(factura_control.facturaActual.enviar);
		jQuery("#t-cel_"+i+"_47").val(factura_control.facturaActual.nro_estimado);
		jQuery("#t-cel_"+i+"_48").val(factura_control.facturaActual.ncf);
		jQuery("#t-cel_"+i+"_49").val(factura_control.facturaActual.en_anexo);
		jQuery("#t-cel_"+i+"_50").val(factura_control.facturaActual.campo1);
		jQuery("#t-cel_"+i+"_51").val(factura_control.facturaActual.campo2);
		jQuery("#t-cel_"+i+"_52").val(factura_control.facturaActual.campo3);
		jQuery("#t-cel_"+i+"_53").val(factura_control.facturaActual.pagos);
		jQuery("#t-cel_"+i+"_54").val(factura_control.facturaActual.anulada);
		jQuery("#t-cel_"+i+"_55").val(factura_control.facturaActual.causa_anulacion);
		
		if(factura_control.facturaActual.id_asiento!=null && factura_control.facturaActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_56").val() != factura_control.facturaActual.id_asiento) {
				jQuery("#t-cel_"+i+"_56").val(factura_control.facturaActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_56").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_56").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_documento_cuenta_cobrar!=null && factura_control.facturaActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_57").val() != factura_control.facturaActual.id_documento_cuenta_cobrar) {
				jQuery("#t-cel_"+i+"_57").val(factura_control.facturaActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_57").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_57").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_kardex!=null && factura_control.facturaActual.id_kardex>-1){
			if(jQuery("#t-cel_"+i+"_58").val() != factura_control.facturaActual.id_kardex) {
				jQuery("#t-cel_"+i+"_58").val(factura_control.facturaActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_58").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_58").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_59").val(factura_control.facturaActual.comprobante);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(factura_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura_detalle").click(function(){
		jQuery("#tblTablaDatosfacturas").on("click",".imgrelacionfactura_detalle", function () {

			var idActual=jQuery(this).attr("idactualfactura");

			factura_webcontrol1.registrarSesionParafactura_detalles(idActual);
		});				
	}
		
	

	registrarSesionParafactura_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"factura","factura_detalle","facturacion","",factura_funcion1,factura_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(factura_control) {
		factura_funcion1.registrarControlesTableValidacionEdition(factura_control,factura_webcontrol1,factura_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,facturaConstante,strParametros);
		
		//factura_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_empresa",factura_control.empresasFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_2",factura_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal",factura_control.sucursalsFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_3",factura_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio",factura_control.ejerciciosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_4",factura_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_periodo",factura_control.periodosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_5",factura_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_usuario",factura_control.usuariosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_6",factura_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_cliente",factura_control.clientesFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_8",factura_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",factura_control.clientesFK);

	};

	cargarCombosvendedorsFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor",factura_control.vendedorsFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_12",factura_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",factura_control.vendedorsFK);

	};

	cargarCombostermino_pago_clientesFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente",factura_control.termino_pago_clientesFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_13",factura_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",factura_control.termino_pago_clientesFK);

	};

	cargarCombosestadosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_estado",factura_control.estadosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_17",factura_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",factura_control.estadosFK);

	};

	cargarCombosasientosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_asiento",factura_control.asientosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_56",factura_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",factura_control.asientosFK);

	};

	cargarCombosdocumento_cuenta_cobrarsFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar",factura_control.documento_cuenta_cobrarsFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_57",factura_control.documento_cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar",factura_control.documento_cuenta_cobrarsFK);

	};

	cargarComboskardexsFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_kardex",factura_control.kardexsFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_58",factura_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",factura_control.kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(factura_control) {

	};

	registrarComboActionChangeCombossucursalsFK(factura_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(factura_control) {

	};

	registrarComboActionChangeCombosperiodosFK(factura_control) {

	};

	registrarComboActionChangeCombosusuariosFK(factura_control) {

	};

	registrarComboActionChangeCombosclientesFK(factura_control) {
		this.registrarComboActionChangeid_cliente("form"+factura_constante1.STR_SUFIJO+"-id_cliente",false,0);


		this.registrarComboActionChangeid_cliente(""+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(factura_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(factura_control) {

	};

	registrarComboActionChangeCombosestadosFK(factura_control) {

	};

	registrarComboActionChangeCombosasientosFK(factura_control) {

	};

	registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(factura_control) {

	};

	registrarComboActionChangeComboskardexsFK(factura_control) {

	};

	
	
	setDefectoValorCombosempresasFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idempresaDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val() != factura_control.idempresaDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val(factura_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idsucursalDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val() != factura_control.idsucursalDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val(factura_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idejercicioDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val() != factura_control.idejercicioDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val(factura_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idperiodoDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val() != factura_control.idperiodoDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val(factura_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idusuarioDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val() != factura_control.idusuarioDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val(factura_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idclienteDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val() != factura_control.idclienteDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val(factura_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(factura_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idvendedorDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val() != factura_control.idvendedorDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val(factura_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(factura_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != factura_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(factura_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(factura_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idestadoDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val() != factura_control.idestadoDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val(factura_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(factura_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idasientoDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val() != factura_control.idasientoDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val(factura_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(factura_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_cuenta_cobrarsFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.iddocumento_cuenta_cobrarDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != factura_control.iddocumento_cuenta_cobrarDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(factura_control.iddocumento_cuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(factura_control.iddocumento_cuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idkardexDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val() != factura_control.idkardexDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val(factura_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(factura_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_cliente(id_cliente,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura","facturacion","","id_cliente",id_cliente,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_funcion1,factura_webcontrol1,factura_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	












	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
			
							factura_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
			
		factura_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//factura_control
		
	
	}
	
	onLoadCombosDefectoFK(factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosempresasFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombossucursalsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosejerciciosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosperiodosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosusuariosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosclientesFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosvendedorsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosestadosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosasientosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosdocumento_cuenta_cobrarsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorComboskardexsFK(factura_control);
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
	onLoadCombosEventosFK(factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosempresasFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombossucursalsFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosejerciciosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosperiodosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosusuariosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosclientesFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosvendedorsFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosestadosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosasientosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeComboskardexsFK(factura_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("factura");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("factura");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(factura_funcion1,factura_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(factura_funcion1,factura_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(factura_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("factura","facturacion","",factura_funcion1,factura_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("factura","facturacion","",factura_funcion1,factura_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("factura","facturacion","",factura_funcion1,factura_webcontrol1);			
			
			if(factura_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("factura","facturacion","",factura_funcion1,factura_webcontrol1,"factura");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_cobrar","id_documento_cuenta_cobrar","cuentascobrar","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParadocumento_cuenta_cobrar("id_documento_cuenta_cobrar");
				//alert(jQuery('#form-id_documento_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idasiento","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idcliente","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Iddocumento_cuenta_cobrar","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idejercicio","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idempresa","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idestado","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idkardex","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idperiodo","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idsucursal","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idtermino_pago","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idusuario","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idvendedor","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("factura");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			factura_funcion1.validarFormularioJQuery(factura_constante1);
			
			if(factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("factura","facturacion","",factura_funcion1,factura_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(factura_control) {
		
		jQuery("#divBusquedafacturaAjaxWebPart").css("display",factura_control.strPermisoBusqueda);
		jQuery("#trfacturaCabeceraBusquedas").css("display",factura_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura").css("display",factura_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportefactura").css("display",factura_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosfactura").attr("style",factura_control.strPermisoMostrarTodos);
		
		if(factura_control.strPermisoNuevo!=null) {
			jQuery("#tdfacturaNuevo").css("display",factura_control.strPermisoNuevo);
			jQuery("#tdfacturaNuevoToolBar").css("display",factura_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdfacturaDuplicar").css("display",factura_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfacturaDuplicarToolBar").css("display",factura_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfacturaNuevoGuardarCambios").css("display",factura_control.strPermisoNuevo);
			jQuery("#tdfacturaNuevoGuardarCambiosToolBar").css("display",factura_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(factura_control.strPermisoActualizar!=null) {
			jQuery("#tdfacturaActualizarToolBar").css("display",factura_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfacturaCopiar").css("display",factura_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfacturaCopiarToolBar").css("display",factura_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfacturaConEditar").css("display",factura_control.strPermisoActualizar);
		}
		
		jQuery("#tdfacturaEliminarToolBar").css("display",factura_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdfacturaGuardarCambios").css("display",factura_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdfacturaGuardarCambiosToolBar").css("display",factura_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trfacturaElementos").css("display",factura_control.strVisibleTablaElementos);
		
		jQuery("#trfacturaAcciones").css("display",factura_control.strVisibleTablaAcciones);
		jQuery("#trfacturaParametrosAcciones").css("display",factura_control.strVisibleTablaAcciones);
			
		jQuery("#tdfacturaCerrarPagina").css("display",factura_control.strPermisoPopup);		
		jQuery("#tdfacturaCerrarPaginaToolBar").css("display",factura_control.strPermisoPopup);
		//jQuery("#trfacturaAccionesRelaciones").css("display",factura_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("factura","facturacion","",factura_funcion1,factura_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		factura_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		factura_webcontrol1.registrarEventosControles();
		
		if(factura_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(factura_constante1.STR_ES_RELACIONADO=="false") {
			factura_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(factura_constante1.STR_ES_RELACIONES=="true") {
			if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(factura_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				factura_webcontrol1.onLoad();
				
			} else {
				if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
					if(factura_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
						//factura_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(factura_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(factura_constante1.BIG_ID_ACTUAL,"factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
						//factura_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			factura_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var factura_webcontrol1=new factura_webcontrol();

if(factura_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = factura_webcontrol1.onLoadWindow; 
}

//</script>