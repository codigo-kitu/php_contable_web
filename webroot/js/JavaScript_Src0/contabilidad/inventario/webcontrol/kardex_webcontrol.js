//<script type="text/javascript" language="javascript">



//var kardexJQueryPaginaWebInteraccion= function (kardex_control) {
//this.,this.,this.

class kardex_webcontrol extends kardex_webcontrol_add {
	
	kardex_control=null;
	kardex_controlInicial=null;
	kardex_controlAuxiliar=null;
		
	//if(kardex_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(kardex_control) {
		super();
		
		this.kardex_control=kardex_control;
	}
		
	actualizarVariablesPagina(kardex_control) {
		
		if(kardex_control.action=="index" || kardex_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(kardex_control);
			
		} else if(kardex_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(kardex_control);
		
		} else if(kardex_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(kardex_control);
		
		} else if(kardex_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(kardex_control);
		
		} else if(kardex_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(kardex_control);
			
		} else if(kardex_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(kardex_control);
			
		} else if(kardex_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(kardex_control);
		
		} else if(kardex_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(kardex_control);
		
		} else if(kardex_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(kardex_control);
		
		} else if(kardex_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(kardex_control);
		
		} else if(kardex_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(kardex_control);
		
		} else if(kardex_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(kardex_control);
		
		} else if(kardex_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(kardex_control);
		
		} else if(kardex_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(kardex_control);
		
		} else if(kardex_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(kardex_control);
		
		} else if(kardex_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(kardex_control);
		
		} else if(kardex_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(kardex_control);
		
		} else if(kardex_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(kardex_control);
		
		} else if(kardex_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(kardex_control);
		
		} else if(kardex_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(kardex_control);
		
		} else if(kardex_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(kardex_control);
		
		} else if(kardex_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(kardex_control);
		
		} else if(kardex_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(kardex_control);
		
		} else if(kardex_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(kardex_control);
		
		} else if(kardex_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(kardex_control);
		
		} else if(kardex_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(kardex_control);
		
		} else if(kardex_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(kardex_control);
		
		} else if(kardex_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(kardex_control);		
		
		} else if(kardex_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(kardex_control);		
		
		} else if(kardex_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(kardex_control);		
		
		} else if(kardex_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(kardex_control);		
		}
		else if(kardex_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(kardex_control);		
		}
		else if(kardex_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(kardex_control);		
		}
		else if(kardex_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(kardex_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(kardex_control.action + " Revisar Manejo");
			
			if(kardex_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(kardex_control);
				
				return;
			}
			
			//if(kardex_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(kardex_control);
			//}
			
			if(kardex_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(kardex_control);
			}
			
			if(kardex_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && kardex_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(kardex_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(kardex_control, false);			
			}
			
			if(kardex_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(kardex_control);	
			}
			
			if(kardex_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(kardex_control);
			}
			
			if(kardex_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(kardex_control);
			}
			
			if(kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(kardex_control);
			}
			
			if(kardex_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(kardex_control);	
			}
			
			if(kardex_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(kardex_control);
			}
			
			if(kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(kardex_control);
			}
			
			
			if(kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(kardex_control);			
			}
			
			if(kardex_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(kardex_control);
			}
			
			
			if(kardex_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(kardex_control);
			}
			
			if(kardex_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(kardex_control);
			}				
			
			if(kardex_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(kardex_control);
			}
			
			if(kardex_control.usuarioActual!=null && kardex_control.usuarioActual.field_strUserName!=null &&
			kardex_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(kardex_control);			
			}
		}
		
		
		if(kardex_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(kardex_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(kardex_control) {
		
		this.actualizarPaginaCargaGeneral(kardex_control);
		this.actualizarPaginaTablaDatos(kardex_control);
		this.actualizarPaginaCargaGeneralControles(kardex_control);
		this.actualizarPaginaFormulario(kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(kardex_control);
		this.actualizarPaginaAreaBusquedas(kardex_control);
		this.actualizarPaginaCargaCombosFK(kardex_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(kardex_control) {
		
		this.actualizarPaginaCargaGeneral(kardex_control);
		this.actualizarPaginaTablaDatos(kardex_control);
		this.actualizarPaginaCargaGeneralControles(kardex_control);
		this.actualizarPaginaFormulario(kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(kardex_control);
		this.actualizarPaginaAreaBusquedas(kardex_control);
		this.actualizarPaginaCargaCombosFK(kardex_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kardex_control);		
		this.actualizarPaginaFormulario(kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kardex_control);		
		this.actualizarPaginaFormulario(kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kardex_control);		
		this.actualizarPaginaFormulario(kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);		
		this.actualizarPaginaFormulario(kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);		
		this.actualizarPaginaFormulario(kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);		
		this.actualizarPaginaFormulario(kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(kardex_control) {
		this.actualizarPaginaFormulario(kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(kardex_control) {
		this.actualizarPaginaFormulario(kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(kardex_control) {
		this.actualizarPaginaCargaGeneralControles(kardex_control);
		this.actualizarPaginaCargaCombosFK(kardex_control);
		this.actualizarPaginaFormulario(kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(kardex_control) {
		this.actualizarPaginaAbrirLink(kardex_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);				
		this.actualizarPaginaFormulario(kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);
		this.actualizarPaginaFormulario(kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);
		this.actualizarPaginaFormulario(kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(kardex_control) {
		this.actualizarPaginaFormulario(kardex_control);
		this.onLoadCombosDefectoFK(kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);
		this.actualizarPaginaFormulario(kardex_control);
		this.onLoadCombosDefectoFK(kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(kardex_control) {
		this.actualizarPaginaCargaGeneralControles(kardex_control);
		this.actualizarPaginaCargaCombosFK(kardex_control);
		this.actualizarPaginaFormulario(kardex_control);
		this.onLoadCombosDefectoFK(kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(kardex_control) {
		this.actualizarPaginaAbrirLink(kardex_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(kardex_control) {
		this.actualizarPaginaImprimir(kardex_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(kardex_control) {
		this.actualizarPaginaImprimir(kardex_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(kardex_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(kardex_control) {
		//FORMULARIO
		if(kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kardex_control);
			this.actualizarPaginaFormularioAdd(kardex_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		//COMBOS FK
		if(kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kardex_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(kardex_control) {
		//FORMULARIO
		if(kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kardex_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);	
		//COMBOS FK
		if(kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kardex_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(kardex_control) {
		this.actualizarPaginaTablaDatos(kardex_control);
		this.actualizarPaginaFormulario(kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(kardex_control) {
		//FORMULARIO
		if(kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kardex_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(kardex_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);	
		//COMBOS FK
		if(kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kardex_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(kardex_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(kardex_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(kardex_control) {
		if(kardex_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && kardex_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(kardex_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(kardex_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(kardex_control) {
		if(kardex_funcion1.esPaginaForm()==true) {
			window.opener.kardex_webcontrol1.actualizarPaginaTablaDatos(kardex_control);
		} else {
			this.actualizarPaginaTablaDatos(kardex_control);
		}
	}
	
	actualizarPaginaAbrirLink(kardex_control) {
		kardex_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(kardex_control.strAuxiliarUrlPagina);
				
		kardex_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(kardex_control.strAuxiliarTipo,kardex_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(kardex_control) {
		kardex_funcion1.resaltarRestaurarDivMensaje(true,kardex_control.strAuxiliarMensajeAlert,kardex_control.strAuxiliarCssMensaje);
			
		if(kardex_funcion1.esPaginaForm()==true) {
			window.opener.kardex_funcion1.resaltarRestaurarDivMensaje(true,kardex_control.strAuxiliarMensajeAlert,kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(kardex_control) {
		eval(kardex_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(kardex_control, mostrar) {
		
		if(mostrar==true) {
			kardex_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				kardex_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			kardex_funcion1.mostrarDivMensaje(true,kardex_control.strAuxiliarMensaje,kardex_control.strAuxiliarCssMensaje);
		
		} else {
			kardex_funcion1.mostrarDivMensaje(false,kardex_control.strAuxiliarMensaje,kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(kardex_control) {
	
		funcionGeneral.printWebPartPage("kardex",kardex_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarkardexsAjaxWebPart").html(kardex_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("kardex",jQuery("#divTablaDatosReporteAuxiliarkardexsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(kardex_control) {
		this.kardex_controlInicial=kardex_control;
			
		if(kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(kardex_control.strStyleDivArbol,kardex_control.strStyleDivContent
																,kardex_control.strStyleDivOpcionesBanner,kardex_control.strStyleDivExpandirColapsar
																,kardex_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=kardex_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",kardex_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(kardex_control) {
		jQuery("#divTablaDatoskardexsAjaxWebPart").html(kardex_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoskardexs=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(kardex_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoskardexs=jQuery("#tblTablaDatoskardexs").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("kardex",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',kardex_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			kardex_webcontrol1.registrarControlesTableEdition(kardex_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		kardex_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(kardex_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(kardex_control.kardexActual!=null) {//form
			
			this.actualizarCamposFilaTabla(kardex_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(kardex_control) {
		this.actualizarCssBotonesPagina(kardex_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(kardex_control.tiposReportes,kardex_control.tiposReporte
															 	,kardex_control.tiposPaginacion,kardex_control.tiposAcciones
																,kardex_control.tiposColumnasSelect,kardex_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(kardex_control.tiposRelaciones,kardex_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(kardex_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(kardex_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(kardex_control);			
	}
	
	actualizarPaginaAreaBusquedas(kardex_control) {
		jQuery("#divBusquedakardexAjaxWebPart").css("display",kardex_control.strPermisoBusqueda);
		jQuery("#trkardexCabeceraBusquedas").css("display",kardex_control.strPermisoBusqueda);
		jQuery("#trBusquedakardex").css("display",kardex_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(kardex_control.htmlTablaOrderBy!=null
			&& kardex_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBykardexAjaxWebPart").html(kardex_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//kardex_webcontrol1.registrarOrderByActions();
			
		}
			
		if(kardex_control.htmlTablaOrderByRel!=null
			&& kardex_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelkardexAjaxWebPart").html(kardex_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(kardex_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedakardexAjaxWebPart").css("display","none");
			jQuery("#trkardexCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedakardex").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(kardex_control) {
		jQuery("#tdkardexNuevo").css("display",kardex_control.strPermisoNuevo);
		jQuery("#trkardexElementos").css("display",kardex_control.strVisibleTablaElementos);
		jQuery("#trkardexAcciones").css("display",kardex_control.strVisibleTablaAcciones);
		jQuery("#trkardexParametrosAcciones").css("display",kardex_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(kardex_control) {
	
		this.actualizarCssBotonesMantenimiento(kardex_control);
				
		if(kardex_control.kardexActual!=null) {//form
			
			this.actualizarCamposFormulario(kardex_control);			
		}
						
		this.actualizarSpanMensajesCampos(kardex_control);
	}
	
	actualizarPaginaUsuarioInvitado(kardex_control) {
	
		var indexPosition=kardex_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=kardex_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(kardex_control) {
		jQuery("#divResumenkardexActualAjaxWebPart").html(kardex_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(kardex_control) {
		jQuery("#divAccionesRelacioneskardexAjaxWebPart").html(kardex_control.htmlTablaAccionesRelaciones);
			
		kardex_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(kardex_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(kardex_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(kardex_control) {
		
		if(kardex_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",kardex_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",kardex_control.strVisibleFK_Idcliente);
		}

		if(kardex_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",kardex_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",kardex_control.strVisibleFK_Idejercicio);
		}

		if(kardex_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",kardex_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",kardex_control.strVisibleFK_Idempresa);
		}

		if(kardex_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idestado").attr("style",kardex_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idestado").attr("style",kardex_control.strVisibleFK_Idestado);
		}

		if(kardex_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",kardex_control.strVisibleFK_Idmodulo);
			jQuery("#tblstrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",kardex_control.strVisibleFK_Idmodulo);
		}

		if(kardex_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",kardex_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",kardex_control.strVisibleFK_Idperiodo);
		}

		if(kardex_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",kardex_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",kardex_control.strVisibleFK_Idproveedor);
		}

		if(kardex_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",kardex_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",kardex_control.strVisibleFK_Idsucursal);
		}

		if(kardex_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idtipo_kardex").attr("style",kardex_control.strVisibleFK_Idtipo_kardex);
			jQuery("#tblstrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idtipo_kardex").attr("style",kardex_control.strVisibleFK_Idtipo_kardex);
		}

		if(kardex_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",kardex_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+kardex_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",kardex_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionkardex();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("kardex",id,"inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);		
	}
	
	

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		kardex_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex","proveedor","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		kardex_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex","cliente","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
	}

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		kardex_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex","empresa","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		kardex_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex","sucursal","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		kardex_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex","ejercicio","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		kardex_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex","periodo","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
	}

	abrirBusquedaParatipo_kardex(strNombreCampoBusqueda){//idActual
		kardex_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex","tipo_kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		kardex_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex","estado","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		kardex_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex","usuario","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
	}

	abrirBusquedaParamodulo(strNombreCampoBusqueda){//idActual
		kardex_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex","modulo","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(kardex_control) {
	
		jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id").val(kardex_control.kardexActual.id);
		jQuery("#form"+kardex_constante1.STR_SUFIJO+"-version_row").val(kardex_control.kardexActual.versionRow);
		
		if(kardex_control.kardexActual.id_proveedor!=null && kardex_control.kardexActual.id_proveedor>-1){
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_proveedor").val() != kardex_control.kardexActual.id_proveedor) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_proveedor").val(kardex_control.kardexActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_proveedor").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_control.kardexActual.id_cliente!=null && kardex_control.kardexActual.id_cliente>-1){
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_cliente").val() != kardex_control.kardexActual.id_cliente) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_cliente").val(kardex_control.kardexActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_cliente").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+kardex_constante1.STR_SUFIJO+"-numero").val(kardex_control.kardexActual.numero);
		
		if(kardex_control.kardexActual.id_empresa!=null && kardex_control.kardexActual.id_empresa>-1){
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_empresa").val() != kardex_control.kardexActual.id_empresa) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_empresa").val(kardex_control.kardexActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_control.kardexActual.id_sucursal!=null && kardex_control.kardexActual.id_sucursal>-1){
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_sucursal").val() != kardex_control.kardexActual.id_sucursal) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_sucursal").val(kardex_control.kardexActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_control.kardexActual.id_ejercicio!=null && kardex_control.kardexActual.id_ejercicio>-1){
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_ejercicio").val() != kardex_control.kardexActual.id_ejercicio) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_ejercicio").val(kardex_control.kardexActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_control.kardexActual.id_periodo!=null && kardex_control.kardexActual.id_periodo>-1){
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_periodo").val() != kardex_control.kardexActual.id_periodo) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_periodo").val(kardex_control.kardexActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+kardex_constante1.STR_SUFIJO+"-descripcion").val(kardex_control.kardexActual.descripcion);
		
		if(kardex_control.kardexActual.id_tipo_kardex!=null && kardex_control.kardexActual.id_tipo_kardex>-1){
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_tipo_kardex").val() != kardex_control.kardexActual.id_tipo_kardex) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_tipo_kardex").val(kardex_control.kardexActual.id_tipo_kardex).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_tipo_kardex").select2("val", null);
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_tipo_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_tipo_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+kardex_constante1.STR_SUFIJO+"-fecha_ingreso").val(kardex_control.kardexActual.fecha_ingreso);
		jQuery("#form"+kardex_constante1.STR_SUFIJO+"-nro_documento_soporte").val(kardex_control.kardexActual.nro_documento_soporte);
		jQuery("#form"+kardex_constante1.STR_SUFIJO+"-hora").val(kardex_control.kardexActual.hora);
		
		if(kardex_control.kardexActual.id_estado!=null && kardex_control.kardexActual.id_estado>-1){
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_estado").val() != kardex_control.kardexActual.id_estado) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_estado").val(kardex_control.kardexActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+kardex_constante1.STR_SUFIJO+"-es_ingreso").prop('checked',kardex_control.kardexActual.es_ingreso);
		jQuery("#form"+kardex_constante1.STR_SUFIJO+"-fecha_hora").val(kardex_control.kardexActual.fecha_hora);
		jQuery("#form"+kardex_constante1.STR_SUFIJO+"-es_cliente").prop('checked',kardex_control.kardexActual.es_cliente);
		jQuery("#form"+kardex_constante1.STR_SUFIJO+"-es_modificable").prop('checked',kardex_control.kardexActual.es_modificable);
		
		if(kardex_control.kardexActual.id_usuario!=null && kardex_control.kardexActual.id_usuario>-1){
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_usuario").val() != kardex_control.kardexActual.id_usuario) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_usuario").val(kardex_control.kardexActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_control.kardexActual.id_modulo!=null && kardex_control.kardexActual.id_modulo>-1){
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_modulo").val() != kardex_control.kardexActual.id_modulo) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_modulo").val(kardex_control.kardexActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_modulo").select2("val", null);
			if(jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+kardex_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("kardex","inventario","","form_kardex",formulario,"","",paraEventoTabla,idFilaTabla,kardex_funcion1,kardex_webcontrol1,kardex_constante1);
	}
	
	cargarCombosFK(kardex_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.cargarCombosproveedorsFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.cargarCombosclientesFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.cargarCombosempresasFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.cargarCombossucursalsFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.cargarCombosejerciciosFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.cargarCombosperiodosFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_kardex",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.cargarCombostipo_kardexsFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.cargarCombosestadosFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.cargarCombosusuariosFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.cargarCombosmodulosFK(kardex_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(kardex_control.strRecargarFkTiposNinguno!=null && kardex_control.strRecargarFkTiposNinguno!='NINGUNO' && kardex_control.strRecargarFkTiposNinguno!='') {
			
				if(kardex_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",kardex_control.strRecargarFkTiposNinguno,",")) { 
					kardex_webcontrol1.cargarCombosproveedorsFK(kardex_control);
				}

				if(kardex_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",kardex_control.strRecargarFkTiposNinguno,",")) { 
					kardex_webcontrol1.cargarCombosclientesFK(kardex_control);
				}

				if(kardex_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",kardex_control.strRecargarFkTiposNinguno,",")) { 
					kardex_webcontrol1.cargarCombosempresasFK(kardex_control);
				}

				if(kardex_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",kardex_control.strRecargarFkTiposNinguno,",")) { 
					kardex_webcontrol1.cargarCombossucursalsFK(kardex_control);
				}

				if(kardex_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",kardex_control.strRecargarFkTiposNinguno,",")) { 
					kardex_webcontrol1.cargarCombosejerciciosFK(kardex_control);
				}

				if(kardex_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",kardex_control.strRecargarFkTiposNinguno,",")) { 
					kardex_webcontrol1.cargarCombosperiodosFK(kardex_control);
				}

				if(kardex_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_kardex",kardex_control.strRecargarFkTiposNinguno,",")) { 
					kardex_webcontrol1.cargarCombostipo_kardexsFK(kardex_control);
				}

				if(kardex_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",kardex_control.strRecargarFkTiposNinguno,",")) { 
					kardex_webcontrol1.cargarCombosestadosFK(kardex_control);
				}

				if(kardex_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",kardex_control.strRecargarFkTiposNinguno,",")) { 
					kardex_webcontrol1.cargarCombosusuariosFK(kardex_control);
				}

				if(kardex_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",kardex_control.strRecargarFkTiposNinguno,",")) { 
					kardex_webcontrol1.cargarCombosmodulosFK(kardex_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(kardex_control) {
		jQuery("#spanstrMensajeid").text(kardex_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(kardex_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_proveedor").text(kardex_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajeid_cliente").text(kardex_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajenumero").text(kardex_control.strMensajenumero);		
		jQuery("#spanstrMensajeid_empresa").text(kardex_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(kardex_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(kardex_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(kardex_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajedescripcion").text(kardex_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_tipo_kardex").text(kardex_control.strMensajeid_tipo_kardex);		
		jQuery("#spanstrMensajefecha_ingreso").text(kardex_control.strMensajefecha_ingreso);		
		jQuery("#spanstrMensajenro_documento_soporte").text(kardex_control.strMensajenro_documento_soporte);		
		jQuery("#spanstrMensajehora").text(kardex_control.strMensajehora);		
		jQuery("#spanstrMensajeid_estado").text(kardex_control.strMensajeid_estado);		
		jQuery("#spanstrMensajees_ingreso").text(kardex_control.strMensajees_ingreso);		
		jQuery("#spanstrMensajefecha_hora").text(kardex_control.strMensajefecha_hora);		
		jQuery("#spanstrMensajees_cliente").text(kardex_control.strMensajees_cliente);		
		jQuery("#spanstrMensajees_modificable").text(kardex_control.strMensajees_modificable);		
		jQuery("#spanstrMensajeid_usuario").text(kardex_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_modulo").text(kardex_control.strMensajeid_modulo);		
	}
	
	actualizarCssBotonesMantenimiento(kardex_control) {
		jQuery("#tdbtnNuevokardex").css("visibility",kardex_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevokardex").css("display",kardex_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarkardex").css("visibility",kardex_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarkardex").css("display",kardex_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarkardex").css("visibility",kardex_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarkardex").css("display",kardex_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarkardex").css("visibility",kardex_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioskardex").css("visibility",kardex_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioskardex").css("display",kardex_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarkardex").css("visibility",kardex_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarkardex").css("visibility",kardex_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarkardex").css("visibility",kardex_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionkardex_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualkardex");

			kardex_webcontrol1.registrarSesionParakardex_detalles(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproveedorFK(kardex_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_funcion1,kardex_control.proveedorsFK);
	}

	cargarComboEditarTablaclienteFK(kardex_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_funcion1,kardex_control.clientesFK);
	}

	cargarComboEditarTablaempresaFK(kardex_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_funcion1,kardex_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(kardex_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_funcion1,kardex_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(kardex_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_funcion1,kardex_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(kardex_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_funcion1,kardex_control.periodosFK);
	}

	cargarComboEditarTablatipo_kardexFK(kardex_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_funcion1,kardex_control.tipo_kardexsFK);
	}

	cargarComboEditarTablaestadoFK(kardex_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_funcion1,kardex_control.estadosFK);
	}

	cargarComboEditarTablausuarioFK(kardex_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_funcion1,kardex_control.usuariosFK);
	}

	cargarComboEditarTablamoduloFK(kardex_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_funcion1,kardex_control.modulosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(kardex_control) {
		var i=0;
		
		i=kardex_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(kardex_control.kardexActual.id);
		jQuery("#t-version_row_"+i+"").val(kardex_control.kardexActual.versionRow);
		
		if(kardex_control.kardexActual.id_proveedor!=null && kardex_control.kardexActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != kardex_control.kardexActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_2").val(kardex_control.kardexActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_2").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_control.kardexActual.id_cliente!=null && kardex_control.kardexActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != kardex_control.kardexActual.id_cliente) {
				jQuery("#t-cel_"+i+"_3").val(kardex_control.kardexActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_3").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(kardex_control.kardexActual.numero);
		
		if(kardex_control.kardexActual.id_empresa!=null && kardex_control.kardexActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != kardex_control.kardexActual.id_empresa) {
				jQuery("#t-cel_"+i+"_5").val(kardex_control.kardexActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_control.kardexActual.id_sucursal!=null && kardex_control.kardexActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != kardex_control.kardexActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_6").val(kardex_control.kardexActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_control.kardexActual.id_ejercicio!=null && kardex_control.kardexActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != kardex_control.kardexActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_7").val(kardex_control.kardexActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_control.kardexActual.id_periodo!=null && kardex_control.kardexActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != kardex_control.kardexActual.id_periodo) {
				jQuery("#t-cel_"+i+"_8").val(kardex_control.kardexActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(kardex_control.kardexActual.descripcion);
		
		if(kardex_control.kardexActual.id_tipo_kardex!=null && kardex_control.kardexActual.id_tipo_kardex>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != kardex_control.kardexActual.id_tipo_kardex) {
				jQuery("#t-cel_"+i+"_10").val(kardex_control.kardexActual.id_tipo_kardex).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_10").select2("val", null);
			if(jQuery("#t-cel_"+i+"_10").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_11").val(kardex_control.kardexActual.fecha_ingreso);
		jQuery("#t-cel_"+i+"_12").val(kardex_control.kardexActual.nro_documento_soporte);
		jQuery("#t-cel_"+i+"_13").val(kardex_control.kardexActual.hora);
		
		if(kardex_control.kardexActual.id_estado!=null && kardex_control.kardexActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_14").val() != kardex_control.kardexActual.id_estado) {
				jQuery("#t-cel_"+i+"_14").val(kardex_control.kardexActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_14").select2("val", null);
			if(jQuery("#t-cel_"+i+"_14").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_14").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_15").prop('checked',kardex_control.kardexActual.es_ingreso);
		jQuery("#t-cel_"+i+"_16").val(kardex_control.kardexActual.fecha_hora);
		jQuery("#t-cel_"+i+"_17").prop('checked',kardex_control.kardexActual.es_cliente);
		jQuery("#t-cel_"+i+"_18").prop('checked',kardex_control.kardexActual.es_modificable);
		
		if(kardex_control.kardexActual.id_usuario!=null && kardex_control.kardexActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_19").val() != kardex_control.kardexActual.id_usuario) {
				jQuery("#t-cel_"+i+"_19").val(kardex_control.kardexActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_19").select2("val", null);
			if(jQuery("#t-cel_"+i+"_19").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_19").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_control.kardexActual.id_modulo!=null && kardex_control.kardexActual.id_modulo>-1){
			if(jQuery("#t-cel_"+i+"_20").val() != kardex_control.kardexActual.id_modulo) {
				jQuery("#t-cel_"+i+"_20").val(kardex_control.kardexActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_20").select2("val", null);
			if(jQuery("#t-cel_"+i+"_20").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_20").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(kardex_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionkardex_detalle").click(function(){
		jQuery("#tblTablaDatoskardexs").on("click",".imgrelacionkardex_detalle", function () {

			var idActual=jQuery(this).attr("idactualkardex");

			kardex_webcontrol1.registrarSesionParakardex_detalles(idActual);
		});				
	}
		
	

	registrarSesionParakardex_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"kardex","kardex_detalle","inventario","",kardex_funcion1,kardex_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(kardex_control) {
		kardex_funcion1.registrarControlesTableValidacionEdition(kardex_control,kardex_webcontrol1,kardex_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardexConstante,strParametros);
		
		//kardex_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosproveedorsFK(kardex_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_constante1.STR_SUFIJO+"-id_proveedor",kardex_control.proveedorsFK);

		if(kardex_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_control.idFilaTablaActual+"_2",kardex_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",kardex_control.proveedorsFK);

	};

	cargarCombosclientesFK(kardex_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_constante1.STR_SUFIJO+"-id_cliente",kardex_control.clientesFK);

		if(kardex_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_control.idFilaTablaActual+"_3",kardex_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",kardex_control.clientesFK);

	};

	cargarCombosempresasFK(kardex_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_constante1.STR_SUFIJO+"-id_empresa",kardex_control.empresasFK);

		if(kardex_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_control.idFilaTablaActual+"_5",kardex_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(kardex_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_constante1.STR_SUFIJO+"-id_sucursal",kardex_control.sucursalsFK);

		if(kardex_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_control.idFilaTablaActual+"_6",kardex_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(kardex_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_constante1.STR_SUFIJO+"-id_ejercicio",kardex_control.ejerciciosFK);

		if(kardex_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_control.idFilaTablaActual+"_7",kardex_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(kardex_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_constante1.STR_SUFIJO+"-id_periodo",kardex_control.periodosFK);

		if(kardex_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_control.idFilaTablaActual+"_8",kardex_control.periodosFK);
		}
	};

	cargarCombostipo_kardexsFK(kardex_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_constante1.STR_SUFIJO+"-id_tipo_kardex",kardex_control.tipo_kardexsFK);

		if(kardex_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_control.idFilaTablaActual+"_10",kardex_control.tipo_kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_constante1.STR_SUFIJO+"FK_Idtipo_kardex-cmbid_tipo_kardex",kardex_control.tipo_kardexsFK);

	};

	cargarCombosestadosFK(kardex_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_constante1.STR_SUFIJO+"-id_estado",kardex_control.estadosFK);

		if(kardex_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_control.idFilaTablaActual+"_14",kardex_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",kardex_control.estadosFK);

	};

	cargarCombosusuariosFK(kardex_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_constante1.STR_SUFIJO+"-id_usuario",kardex_control.usuariosFK);

		if(kardex_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_control.idFilaTablaActual+"_19",kardex_control.usuariosFK);
		}
	};

	cargarCombosmodulosFK(kardex_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_constante1.STR_SUFIJO+"-id_modulo",kardex_control.modulosFK);

		if(kardex_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_control.idFilaTablaActual+"_20",kardex_control.modulosFK);
		}
	};

	
	
	registrarComboActionChangeCombosproveedorsFK(kardex_control) {

	};

	registrarComboActionChangeCombosclientesFK(kardex_control) {

	};

	registrarComboActionChangeCombosempresasFK(kardex_control) {

	};

	registrarComboActionChangeCombossucursalsFK(kardex_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(kardex_control) {

	};

	registrarComboActionChangeCombosperiodosFK(kardex_control) {

	};

	registrarComboActionChangeCombostipo_kardexsFK(kardex_control) {

	};

	registrarComboActionChangeCombosestadosFK(kardex_control) {

	};

	registrarComboActionChangeCombosusuariosFK(kardex_control) {

	};

	registrarComboActionChangeCombosmodulosFK(kardex_control) {

	};

	
	
	setDefectoValorCombosproveedorsFK(kardex_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_control.idproveedorDefaultFK>-1 && jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_proveedor").val() != kardex_control.idproveedorDefaultFK) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_proveedor").val(kardex_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(kardex_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(kardex_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_control.idclienteDefaultFK>-1 && jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_cliente").val() != kardex_control.idclienteDefaultFK) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_cliente").val(kardex_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(kardex_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosempresasFK(kardex_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_control.idempresaDefaultFK>-1 && jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_empresa").val() != kardex_control.idempresaDefaultFK) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_empresa").val(kardex_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(kardex_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_control.idsucursalDefaultFK>-1 && jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_sucursal").val() != kardex_control.idsucursalDefaultFK) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_sucursal").val(kardex_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(kardex_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_control.idejercicioDefaultFK>-1 && jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_ejercicio").val() != kardex_control.idejercicioDefaultFK) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_ejercicio").val(kardex_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(kardex_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_control.idperiodoDefaultFK>-1 && jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_periodo").val() != kardex_control.idperiodoDefaultFK) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_periodo").val(kardex_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_kardexsFK(kardex_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_control.idtipo_kardexDefaultFK>-1 && jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_tipo_kardex").val() != kardex_control.idtipo_kardexDefaultFK) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_tipo_kardex").val(kardex_control.idtipo_kardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_constante1.STR_SUFIJO+"FK_Idtipo_kardex-cmbid_tipo_kardex").val(kardex_control.idtipo_kardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_constante1.STR_SUFIJO+"FK_Idtipo_kardex-cmbid_tipo_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_constante1.STR_SUFIJO+"FK_Idtipo_kardex-cmbid_tipo_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(kardex_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_control.idestadoDefaultFK>-1 && jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_estado").val() != kardex_control.idestadoDefaultFK) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_estado").val(kardex_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(kardex_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(kardex_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_control.idusuarioDefaultFK>-1 && jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_usuario").val() != kardex_control.idusuarioDefaultFK) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_usuario").val(kardex_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosmodulosFK(kardex_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_control.idmoduloDefaultFK>-1 && jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_modulo").val() != kardex_control.idmoduloDefaultFK) {
				jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_modulo").val(kardex_control.idmoduloDefaultFK).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	










	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(kardex_constante1.BIT_ES_PAGINA_FORM==true) {
			
							kardex_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(kardex_constante1.BIT_ES_PAGINA_FORM==true) {
			
		kardex_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//kardex_control
		
	
	}
	
	onLoadCombosDefectoFK(kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.setDefectoValorCombosproveedorsFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.setDefectoValorCombosclientesFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.setDefectoValorCombosempresasFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.setDefectoValorCombossucursalsFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.setDefectoValorCombosejerciciosFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.setDefectoValorCombosperiodosFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_kardex",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.setDefectoValorCombostipo_kardexsFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.setDefectoValorCombosestadosFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.setDefectoValorCombosusuariosFK(kardex_control);
			}

			if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",kardex_control.strRecargarFkTipos,",")) { 
				kardex_webcontrol1.setDefectoValorCombosmodulosFK(kardex_control);
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
	onLoadCombosEventosFK(kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",kardex_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_webcontrol1.registrarComboActionChangeCombosproveedorsFK(kardex_control);
			//}

			//if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",kardex_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_webcontrol1.registrarComboActionChangeCombosclientesFK(kardex_control);
			//}

			//if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",kardex_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_webcontrol1.registrarComboActionChangeCombosempresasFK(kardex_control);
			//}

			//if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",kardex_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_webcontrol1.registrarComboActionChangeCombossucursalsFK(kardex_control);
			//}

			//if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",kardex_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_webcontrol1.registrarComboActionChangeCombosejerciciosFK(kardex_control);
			//}

			//if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",kardex_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_webcontrol1.registrarComboActionChangeCombosperiodosFK(kardex_control);
			//}

			//if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_kardex",kardex_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_webcontrol1.registrarComboActionChangeCombostipo_kardexsFK(kardex_control);
			//}

			//if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",kardex_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_webcontrol1.registrarComboActionChangeCombosestadosFK(kardex_control);
			//}

			//if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",kardex_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_webcontrol1.registrarComboActionChangeCombosusuariosFK(kardex_control);
			//}

			//if(kardex_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",kardex_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_webcontrol1.registrarComboActionChangeCombosmodulosFK(kardex_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(kardex_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("kardex");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("kardex");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(kardex_funcion1,kardex_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(kardex_funcion1,kardex_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(kardex_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);			
			
			if(kardex_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,"kardex");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				kardex_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				kardex_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				kardex_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				kardex_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				kardex_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				kardex_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_kardex","id_tipo_kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_tipo_kardex_img_busqueda").click(function(){
				kardex_webcontrol1.abrirBusquedaParatipo_kardex("id_tipo_kardex");
				//alert(jQuery('#form-id_tipo_kardex_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				kardex_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				kardex_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				kardex_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex","FK_Idcliente","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex","FK_Idejercicio","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex","FK_Idempresa","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex","FK_Idestado","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex","FK_Idmodulo","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex","FK_Idperiodo","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex","FK_Idproveedor","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex","FK_Idsucursal","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex","FK_Idtipo_kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex","FK_Idusuario","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("kardex");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			kardex_funcion1.validarFormularioJQuery(kardex_constante1);
			
			if(kardex_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(kardex_control) {
		
		jQuery("#divBusquedakardexAjaxWebPart").css("display",kardex_control.strPermisoBusqueda);
		jQuery("#trkardexCabeceraBusquedas").css("display",kardex_control.strPermisoBusqueda);
		jQuery("#trBusquedakardex").css("display",kardex_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportekardex").css("display",kardex_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoskardex").attr("style",kardex_control.strPermisoMostrarTodos);
		
		if(kardex_control.strPermisoNuevo!=null) {
			jQuery("#tdkardexNuevo").css("display",kardex_control.strPermisoNuevo);
			jQuery("#tdkardexNuevoToolBar").css("display",kardex_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdkardexDuplicar").css("display",kardex_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdkardexDuplicarToolBar").css("display",kardex_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdkardexNuevoGuardarCambios").css("display",kardex_control.strPermisoNuevo);
			jQuery("#tdkardexNuevoGuardarCambiosToolBar").css("display",kardex_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(kardex_control.strPermisoActualizar!=null) {
			jQuery("#tdkardexActualizarToolBar").css("display",kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkardexCopiar").css("display",kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkardexCopiarToolBar").css("display",kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkardexConEditar").css("display",kardex_control.strPermisoActualizar);
		}
		
		jQuery("#tdkardexEliminarToolBar").css("display",kardex_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdkardexGuardarCambios").css("display",kardex_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdkardexGuardarCambiosToolBar").css("display",kardex_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trkardexElementos").css("display",kardex_control.strVisibleTablaElementos);
		
		jQuery("#trkardexAcciones").css("display",kardex_control.strVisibleTablaAcciones);
		jQuery("#trkardexParametrosAcciones").css("display",kardex_control.strVisibleTablaAcciones);
			
		jQuery("#tdkardexCerrarPagina").css("display",kardex_control.strPermisoPopup);		
		jQuery("#tdkardexCerrarPaginaToolBar").css("display",kardex_control.strPermisoPopup);
		//jQuery("#trkardexAccionesRelaciones").css("display",kardex_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("kardex","inventario","",kardex_funcion1,kardex_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		kardex_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		kardex_webcontrol1.registrarEventosControles();
		
		if(kardex_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(kardex_constante1.STR_ES_RELACIONADO=="false") {
			kardex_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(kardex_constante1.STR_ES_RELACIONES=="true") {
			if(kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				kardex_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(kardex_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(kardex_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				kardex_webcontrol1.onLoad();
				
			} else {
				if(kardex_constante1.BIT_ES_PAGINA_FORM==true) {
					if(kardex_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
						//kardex_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(kardex_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(kardex_constante1.BIG_ID_ACTUAL,"kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);
						//kardex_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			kardex_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("kardex","inventario","",kardex_funcion1,kardex_webcontrol1,kardex_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var kardex_webcontrol1=new kardex_webcontrol();

if(kardex_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = kardex_webcontrol1.onLoadWindow; 
}

//</script>