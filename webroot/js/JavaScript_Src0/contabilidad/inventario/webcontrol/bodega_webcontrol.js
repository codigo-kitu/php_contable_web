//<script type="text/javascript" language="javascript">



//var bodegaJQueryPaginaWebInteraccion= function (bodega_control) {
//this.,this.,this.

class bodega_webcontrol extends bodega_webcontrol_add {
	
	bodega_control=null;
	bodega_controlInicial=null;
	bodega_controlAuxiliar=null;
		
	//if(bodega_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(bodega_control) {
		super();
		
		this.bodega_control=bodega_control;
	}
		
	actualizarVariablesPagina(bodega_control) {
		
		if(bodega_control.action=="index" || bodega_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(bodega_control);
			
		} else if(bodega_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(bodega_control);
		
		} else if(bodega_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(bodega_control);
		
		} else if(bodega_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(bodega_control);
		
		} else if(bodega_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(bodega_control);
			
		} else if(bodega_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(bodega_control);
			
		} else if(bodega_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(bodega_control);
		
		} else if(bodega_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(bodega_control);
		
		} else if(bodega_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(bodega_control);
		
		} else if(bodega_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(bodega_control);
		
		} else if(bodega_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(bodega_control);
		
		} else if(bodega_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(bodega_control);
		
		} else if(bodega_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(bodega_control);
		
		} else if(bodega_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(bodega_control);
		
		} else if(bodega_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(bodega_control);
		
		} else if(bodega_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(bodega_control);
		
		} else if(bodega_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(bodega_control);
		
		} else if(bodega_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(bodega_control);
		
		} else if(bodega_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(bodega_control);
		
		} else if(bodega_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(bodega_control);
		
		} else if(bodega_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(bodega_control);
		
		} else if(bodega_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(bodega_control);
		
		} else if(bodega_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(bodega_control);
		
		} else if(bodega_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(bodega_control);
		
		} else if(bodega_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(bodega_control);
		
		} else if(bodega_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(bodega_control);
		
		} else if(bodega_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(bodega_control);
		
		} else if(bodega_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(bodega_control);		
		
		} else if(bodega_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(bodega_control);		
		
		} else if(bodega_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(bodega_control);		
		
		} else if(bodega_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(bodega_control);		
		}
		else if(bodega_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(bodega_control);		
		}
		else if(bodega_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(bodega_control);		
		}
		else if(bodega_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(bodega_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(bodega_control.action + " Revisar Manejo");
			
			if(bodega_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(bodega_control);
				
				return;
			}
			
			//if(bodega_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(bodega_control);
			//}
			
			if(bodega_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(bodega_control);
			}
			
			if(bodega_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && bodega_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(bodega_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(bodega_control, false);			
			}
			
			if(bodega_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(bodega_control);	
			}
			
			if(bodega_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(bodega_control);
			}
			
			if(bodega_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(bodega_control);
			}
			
			if(bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(bodega_control);
			}
			
			if(bodega_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(bodega_control);	
			}
			
			if(bodega_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(bodega_control);
			}
			
			if(bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(bodega_control);
			}
			
			
			if(bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(bodega_control);			
			}
			
			if(bodega_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(bodega_control);
			}
			
			
			if(bodega_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(bodega_control);
			}
			
			if(bodega_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(bodega_control);
			}				
			
			if(bodega_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(bodega_control);
			}
			
			if(bodega_control.usuarioActual!=null && bodega_control.usuarioActual.field_strUserName!=null &&
			bodega_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(bodega_control);			
			}
		}
		
		
		if(bodega_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(bodega_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(bodega_control) {
		
		this.actualizarPaginaCargaGeneral(bodega_control);
		this.actualizarPaginaTablaDatos(bodega_control);
		this.actualizarPaginaCargaGeneralControles(bodega_control);
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(bodega_control);
		this.actualizarPaginaAreaBusquedas(bodega_control);
		this.actualizarPaginaCargaCombosFK(bodega_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(bodega_control) {
		
		this.actualizarPaginaCargaGeneral(bodega_control);
		this.actualizarPaginaTablaDatos(bodega_control);
		this.actualizarPaginaCargaGeneralControles(bodega_control);
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(bodega_control);
		this.actualizarPaginaAreaBusquedas(bodega_control);
		this.actualizarPaginaCargaCombosFK(bodega_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(bodega_control) {
		this.actualizarPaginaTablaDatosAuxiliar(bodega_control);		
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(bodega_control) {
		this.actualizarPaginaTablaDatosAuxiliar(bodega_control);		
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(bodega_control) {
		this.actualizarPaginaTablaDatosAuxiliar(bodega_control);		
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(bodega_control) {
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(bodega_control) {
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(bodega_control) {
		this.actualizarPaginaCargaGeneralControles(bodega_control);
		this.actualizarPaginaCargaCombosFK(bodega_control);
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(bodega_control) {
		this.actualizarPaginaAbrirLink(bodega_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);				
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);
		this.actualizarPaginaFormulario(bodega_control);
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);
		this.actualizarPaginaFormulario(bodega_control);
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(bodega_control) {
		this.actualizarPaginaFormulario(bodega_control);
		this.onLoadCombosDefectoFK(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);
		this.actualizarPaginaFormulario(bodega_control);
		this.onLoadCombosDefectoFK(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(bodega_control) {
		this.actualizarPaginaCargaGeneralControles(bodega_control);
		this.actualizarPaginaCargaCombosFK(bodega_control);
		this.actualizarPaginaFormulario(bodega_control);
		this.onLoadCombosDefectoFK(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(bodega_control) {
		this.actualizarPaginaAbrirLink(bodega_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(bodega_control) {
		this.actualizarPaginaImprimir(bodega_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(bodega_control) {
		this.actualizarPaginaImprimir(bodega_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(bodega_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(bodega_control) {
		//FORMULARIO
		if(bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(bodega_control);
			this.actualizarPaginaFormularioAdd(bodega_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		//COMBOS FK
		if(bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(bodega_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(bodega_control) {
		//FORMULARIO
		if(bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(bodega_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);	
		//COMBOS FK
		if(bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(bodega_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);
		this.actualizarPaginaFormulario(bodega_control);
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(bodega_control) {
		//FORMULARIO
		if(bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(bodega_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(bodega_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);	
		//COMBOS FK
		if(bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(bodega_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(bodega_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(bodega_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(bodega_control) {
		if(bodega_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && bodega_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(bodega_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(bodega_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(bodega_control) {
		if(bodega_funcion1.esPaginaForm()==true) {
			window.opener.bodega_webcontrol1.actualizarPaginaTablaDatos(bodega_control);
		} else {
			this.actualizarPaginaTablaDatos(bodega_control);
		}
	}
	
	actualizarPaginaAbrirLink(bodega_control) {
		bodega_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(bodega_control.strAuxiliarUrlPagina);
				
		bodega_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(bodega_control.strAuxiliarTipo,bodega_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(bodega_control) {
		bodega_funcion1.resaltarRestaurarDivMensaje(true,bodega_control.strAuxiliarMensajeAlert,bodega_control.strAuxiliarCssMensaje);
			
		if(bodega_funcion1.esPaginaForm()==true) {
			window.opener.bodega_funcion1.resaltarRestaurarDivMensaje(true,bodega_control.strAuxiliarMensajeAlert,bodega_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(bodega_control) {
		eval(bodega_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(bodega_control, mostrar) {
		
		if(mostrar==true) {
			bodega_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				bodega_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			bodega_funcion1.mostrarDivMensaje(true,bodega_control.strAuxiliarMensaje,bodega_control.strAuxiliarCssMensaje);
		
		} else {
			bodega_funcion1.mostrarDivMensaje(false,bodega_control.strAuxiliarMensaje,bodega_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(bodega_control) {
	
		funcionGeneral.printWebPartPage("bodega",bodega_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarbodegasAjaxWebPart").html(bodega_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("bodega",jQuery("#divTablaDatosReporteAuxiliarbodegasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(bodega_control) {
		this.bodega_controlInicial=bodega_control;
			
		if(bodega_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(bodega_control.strStyleDivArbol,bodega_control.strStyleDivContent
																,bodega_control.strStyleDivOpcionesBanner,bodega_control.strStyleDivExpandirColapsar
																,bodega_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=bodega_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",bodega_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(bodega_control) {
		jQuery("#divTablaDatosbodegasAjaxWebPart").html(bodega_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosbodegas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(bodega_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosbodegas=jQuery("#tblTablaDatosbodegas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("bodega",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',bodega_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			bodega_webcontrol1.registrarControlesTableEdition(bodega_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		bodega_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(bodega_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(bodega_control.bodegaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(bodega_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(bodega_control) {
		this.actualizarCssBotonesPagina(bodega_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(bodega_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(bodega_control.tiposReportes,bodega_control.tiposReporte
															 	,bodega_control.tiposPaginacion,bodega_control.tiposAcciones
																,bodega_control.tiposColumnasSelect,bodega_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(bodega_control.tiposRelaciones,bodega_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(bodega_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(bodega_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(bodega_control);			
	}
	
	actualizarPaginaAreaBusquedas(bodega_control) {
		jQuery("#divBusquedabodegaAjaxWebPart").css("display",bodega_control.strPermisoBusqueda);
		jQuery("#trbodegaCabeceraBusquedas").css("display",bodega_control.strPermisoBusqueda);
		jQuery("#trBusquedabodega").css("display",bodega_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(bodega_control.htmlTablaOrderBy!=null
			&& bodega_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBybodegaAjaxWebPart").html(bodega_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//bodega_webcontrol1.registrarOrderByActions();
			
		}
			
		if(bodega_control.htmlTablaOrderByRel!=null
			&& bodega_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelbodegaAjaxWebPart").html(bodega_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(bodega_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedabodegaAjaxWebPart").css("display","none");
			jQuery("#trbodegaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedabodega").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(bodega_control) {
		jQuery("#tdbodegaNuevo").css("display",bodega_control.strPermisoNuevo);
		jQuery("#trbodegaElementos").css("display",bodega_control.strVisibleTablaElementos);
		jQuery("#trbodegaAcciones").css("display",bodega_control.strVisibleTablaAcciones);
		jQuery("#trbodegaParametrosAcciones").css("display",bodega_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(bodega_control) {
	
		this.actualizarCssBotonesMantenimiento(bodega_control);
				
		if(bodega_control.bodegaActual!=null) {//form
			
			this.actualizarCamposFormulario(bodega_control);			
		}
						
		this.actualizarSpanMensajesCampos(bodega_control);
	}
	
	actualizarPaginaUsuarioInvitado(bodega_control) {
	
		var indexPosition=bodega_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=bodega_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(bodega_control) {
		jQuery("#divResumenbodegaActualAjaxWebPart").html(bodega_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(bodega_control) {
		jQuery("#divAccionesRelacionesbodegaAjaxWebPart").html(bodega_control.htmlTablaAccionesRelaciones);
			
		bodega_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(bodega_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(bodega_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(bodega_control) {
		
		if(bodega_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+bodega_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",bodega_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+bodega_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",bodega_control.strVisibleFK_Idempresa);
		}

		if(bodega_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+bodega_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",bodega_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+bodega_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",bodega_control.strVisibleFK_Idsucursal);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionbodega();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("bodega",id,"inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		bodega_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("bodega","empresa","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		bodega_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("bodega","sucursal","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(bodega_control) {
	
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id").val(bodega_control.bodegaActual.id);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-version_row").val(bodega_control.bodegaActual.versionRow);
		
		if(bodega_control.bodegaActual.id_empresa!=null && bodega_control.bodegaActual.id_empresa>-1){
			if(jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val() != bodega_control.bodegaActual.id_empresa) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val(bodega_control.bodegaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(bodega_control.bodegaActual.id_sucursal!=null && bodega_control.bodegaActual.id_sucursal>-1){
			if(jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val() != bodega_control.bodegaActual.id_sucursal) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val(bodega_control.bodegaActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-codigo").val(bodega_control.bodegaActual.codigo);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-nombre").val(bodega_control.bodegaActual.nombre);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-direccion1").val(bodega_control.bodegaActual.direccion1);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-direccion2").val(bodega_control.bodegaActual.direccion2);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-direccion3").val(bodega_control.bodegaActual.direccion3);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-telefono").val(bodega_control.bodegaActual.telefono);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-nro_productos").val(bodega_control.bodegaActual.nro_productos);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-predeterminado").prop('checked',bodega_control.bodegaActual.predeterminado);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-activo").prop('checked',bodega_control.bodegaActual.activo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+bodega_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("bodega","inventario","","form_bodega",formulario,"","",paraEventoTabla,idFilaTabla,bodega_funcion1,bodega_webcontrol1,bodega_constante1);
	}
	
	cargarCombosFK(bodega_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",bodega_control.strRecargarFkTipos,",")) { 
				bodega_webcontrol1.cargarCombosempresasFK(bodega_control);
			}

			if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",bodega_control.strRecargarFkTipos,",")) { 
				bodega_webcontrol1.cargarCombossucursalsFK(bodega_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(bodega_control.strRecargarFkTiposNinguno!=null && bodega_control.strRecargarFkTiposNinguno!='NINGUNO' && bodega_control.strRecargarFkTiposNinguno!='') {
			
				if(bodega_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",bodega_control.strRecargarFkTiposNinguno,",")) { 
					bodega_webcontrol1.cargarCombosempresasFK(bodega_control);
				}

				if(bodega_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",bodega_control.strRecargarFkTiposNinguno,",")) { 
					bodega_webcontrol1.cargarCombossucursalsFK(bodega_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(bodega_control) {
		jQuery("#spanstrMensajeid").text(bodega_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(bodega_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(bodega_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(bodega_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajecodigo").text(bodega_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(bodega_control.strMensajenombre);		
		jQuery("#spanstrMensajedireccion1").text(bodega_control.strMensajedireccion1);		
		jQuery("#spanstrMensajedireccion2").text(bodega_control.strMensajedireccion2);		
		jQuery("#spanstrMensajedireccion3").text(bodega_control.strMensajedireccion3);		
		jQuery("#spanstrMensajetelefono").text(bodega_control.strMensajetelefono);		
		jQuery("#spanstrMensajenro_productos").text(bodega_control.strMensajenro_productos);		
		jQuery("#spanstrMensajepredeterminado").text(bodega_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeactivo").text(bodega_control.strMensajeactivo);		
	}
	
	actualizarCssBotonesMantenimiento(bodega_control) {
		jQuery("#tdbtnNuevobodega").css("visibility",bodega_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevobodega").css("display",bodega_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarbodega").css("visibility",bodega_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarbodega").css("display",bodega_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarbodega").css("visibility",bodega_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarbodega").css("display",bodega_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarbodega").css("visibility",bodega_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosbodega").css("visibility",bodega_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosbodega").css("display",bodega_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarbodega").css("visibility",bodega_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarbodega").css("visibility",bodega_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarbodega").css("visibility",bodega_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproducto_bodega").click(function(){

			var idActual=jQuery(this).attr("idactualbodega");

			bodega_webcontrol1.registrarSesionParaproducto_bodegas(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(bodega_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,bodega_funcion1,bodega_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(bodega_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,bodega_funcion1,bodega_control.sucursalsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(bodega_control) {
		var i=0;
		
		i=bodega_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(bodega_control.bodegaActual.id);
		jQuery("#t-version_row_"+i+"").val(bodega_control.bodegaActual.versionRow);
		
		if(bodega_control.bodegaActual.id_empresa!=null && bodega_control.bodegaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != bodega_control.bodegaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(bodega_control.bodegaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(bodega_control.bodegaActual.id_sucursal!=null && bodega_control.bodegaActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != bodega_control.bodegaActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(bodega_control.bodegaActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(bodega_control.bodegaActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(bodega_control.bodegaActual.nombre);
		jQuery("#t-cel_"+i+"_6").val(bodega_control.bodegaActual.direccion1);
		jQuery("#t-cel_"+i+"_7").val(bodega_control.bodegaActual.direccion2);
		jQuery("#t-cel_"+i+"_8").val(bodega_control.bodegaActual.direccion3);
		jQuery("#t-cel_"+i+"_9").val(bodega_control.bodegaActual.telefono);
		jQuery("#t-cel_"+i+"_10").val(bodega_control.bodegaActual.nro_productos);
		jQuery("#t-cel_"+i+"_11").prop('checked',bodega_control.bodegaActual.predeterminado);
		jQuery("#t-cel_"+i+"_12").prop('checked',bodega_control.bodegaActual.activo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(bodega_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto_bodega").click(function(){
		jQuery("#tblTablaDatosbodegas").on("click",".imgrelacionproducto_bodega", function () {

			var idActual=jQuery(this).attr("idactualbodega");

			bodega_webcontrol1.registrarSesionParaproducto_bodegas(idActual);
		});				
	}
		
	

	registrarSesionParaproducto_bodegas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"bodega","producto_bodega","inventario","",bodega_funcion1,bodega_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(bodega_control) {
		bodega_funcion1.registrarControlesTableValidacionEdition(bodega_control,bodega_webcontrol1,bodega_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodegaConstante,strParametros);
		
		//bodega_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(bodega_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa",bodega_control.empresasFK);

		if(bodega_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+bodega_control.idFilaTablaActual+"_2",bodega_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(bodega_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal",bodega_control.sucursalsFK);

		if(bodega_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+bodega_control.idFilaTablaActual+"_3",bodega_control.sucursalsFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(bodega_control) {

	};

	registrarComboActionChangeCombossucursalsFK(bodega_control) {

	};

	
	
	setDefectoValorCombosempresasFK(bodega_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(bodega_control.idempresaDefaultFK>-1 && jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val() != bodega_control.idempresaDefaultFK) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val(bodega_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(bodega_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(bodega_control.idsucursalDefaultFK>-1 && jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val() != bodega_control.idsucursalDefaultFK) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val(bodega_control.idsucursalDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//bodega_control
		
	
	}
	
	onLoadCombosDefectoFK(bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",bodega_control.strRecargarFkTipos,",")) { 
				bodega_webcontrol1.setDefectoValorCombosempresasFK(bodega_control);
			}

			if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",bodega_control.strRecargarFkTipos,",")) { 
				bodega_webcontrol1.setDefectoValorCombossucursalsFK(bodega_control);
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
	onLoadCombosEventosFK(bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",bodega_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				bodega_webcontrol1.registrarComboActionChangeCombosempresasFK(bodega_control);
			//}

			//if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",bodega_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				bodega_webcontrol1.registrarComboActionChangeCombossucursalsFK(bodega_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(bodega_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("bodega");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("bodega");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(bodega_funcion1,bodega_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(bodega_funcion1,bodega_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(bodega_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);			
			
			if(bodega_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,"bodega");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				bodega_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				bodega_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("bodega","FK_Idempresa","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("bodega","FK_Idsucursal","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("bodega");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			bodega_funcion1.validarFormularioJQuery(bodega_constante1);
			
			if(bodega_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(bodega_control) {
		
		jQuery("#divBusquedabodegaAjaxWebPart").css("display",bodega_control.strPermisoBusqueda);
		jQuery("#trbodegaCabeceraBusquedas").css("display",bodega_control.strPermisoBusqueda);
		jQuery("#trBusquedabodega").css("display",bodega_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportebodega").css("display",bodega_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosbodega").attr("style",bodega_control.strPermisoMostrarTodos);
		
		if(bodega_control.strPermisoNuevo!=null) {
			jQuery("#tdbodegaNuevo").css("display",bodega_control.strPermisoNuevo);
			jQuery("#tdbodegaNuevoToolBar").css("display",bodega_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdbodegaDuplicar").css("display",bodega_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdbodegaDuplicarToolBar").css("display",bodega_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdbodegaNuevoGuardarCambios").css("display",bodega_control.strPermisoNuevo);
			jQuery("#tdbodegaNuevoGuardarCambiosToolBar").css("display",bodega_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(bodega_control.strPermisoActualizar!=null) {
			jQuery("#tdbodegaActualizarToolBar").css("display",bodega_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbodegaCopiar").css("display",bodega_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbodegaCopiarToolBar").css("display",bodega_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbodegaConEditar").css("display",bodega_control.strPermisoActualizar);
		}
		
		jQuery("#tdbodegaEliminarToolBar").css("display",bodega_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdbodegaGuardarCambios").css("display",bodega_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdbodegaGuardarCambiosToolBar").css("display",bodega_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trbodegaElementos").css("display",bodega_control.strVisibleTablaElementos);
		
		jQuery("#trbodegaAcciones").css("display",bodega_control.strVisibleTablaAcciones);
		jQuery("#trbodegaParametrosAcciones").css("display",bodega_control.strVisibleTablaAcciones);
			
		jQuery("#tdbodegaCerrarPagina").css("display",bodega_control.strPermisoPopup);		
		jQuery("#tdbodegaCerrarPaginaToolBar").css("display",bodega_control.strPermisoPopup);
		//jQuery("#trbodegaAccionesRelaciones").css("display",bodega_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		bodega_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		bodega_webcontrol1.registrarEventosControles();
		
		if(bodega_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(bodega_constante1.STR_ES_RELACIONADO=="false") {
			bodega_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(bodega_constante1.STR_ES_RELACIONES=="true") {
			if(bodega_constante1.BIT_ES_PAGINA_FORM==true) {
				bodega_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(bodega_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(bodega_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				bodega_webcontrol1.onLoad();
				
			} else {
				if(bodega_constante1.BIT_ES_PAGINA_FORM==true) {
					if(bodega_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
						//bodega_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(bodega_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(bodega_constante1.BIG_ID_ACTUAL,"bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
						//bodega_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			bodega_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var bodega_webcontrol1=new bodega_webcontrol();

if(bodega_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = bodega_webcontrol1.onLoadWindow; 
}

//</script>