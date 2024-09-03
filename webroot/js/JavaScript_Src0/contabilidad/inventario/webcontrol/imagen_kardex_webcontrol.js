//<script type="text/javascript" language="javascript">



//var imagen_kardexJQueryPaginaWebInteraccion= function (imagen_kardex_control) {
//this.,this.,this.

class imagen_kardex_webcontrol extends imagen_kardex_webcontrol_add {
	
	imagen_kardex_control=null;
	imagen_kardex_controlInicial=null;
	imagen_kardex_controlAuxiliar=null;
		
	//if(imagen_kardex_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_kardex_control) {
		super();
		
		this.imagen_kardex_control=imagen_kardex_control;
	}
		
	actualizarVariablesPagina(imagen_kardex_control) {
		
		if(imagen_kardex_control.action=="index" || imagen_kardex_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_kardex_control);
			
		} else if(imagen_kardex_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_kardex_control);
			
		} else if(imagen_kardex_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_kardex_control);
			
		} else if(imagen_kardex_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_kardex_control);		
		
		} else if(imagen_kardex_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_kardex_control);		
		
		} else if(imagen_kardex_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_kardex_control);		
		
		} else if(imagen_kardex_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_kardex_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(imagen_kardex_control.action + " Revisar Manejo");
			
			if(imagen_kardex_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(imagen_kardex_control);
				
				return;
			}
			
			//if(imagen_kardex_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(imagen_kardex_control);
			//}
			
			if(imagen_kardex_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(imagen_kardex_control);
			}
			
			if(imagen_kardex_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_kardex_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(imagen_kardex_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(imagen_kardex_control, false);			
			}
			
			if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(imagen_kardex_control);	
			}
			
			if(imagen_kardex_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(imagen_kardex_control);
			}
			
			if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(imagen_kardex_control);
			}
			
			if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(imagen_kardex_control);
			}
			
			if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(imagen_kardex_control);	
			}
			
			if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
			}
			
			if(imagen_kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(imagen_kardex_control);
			}
			
			
			if(imagen_kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(imagen_kardex_control);			
			}
			
			if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(imagen_kardex_control);
			}
			
			
			if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(imagen_kardex_control);
			}
			
			if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(imagen_kardex_control);
			}				
			
			if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_kardex_control);
			}
			
			if(imagen_kardex_control.usuarioActual!=null && imagen_kardex_control.usuarioActual.field_strUserName!=null &&
			imagen_kardex_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(imagen_kardex_control);			
			}
		}
		
		
		if(imagen_kardex_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_kardex_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(imagen_kardex_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_kardex_control);
		this.actualizarPaginaTablaDatos(imagen_kardex_control);
		this.actualizarPaginaCargaGeneralControles(imagen_kardex_control);
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_kardex_control);
		this.actualizarPaginaAreaBusquedas(imagen_kardex_control);
		this.actualizarPaginaCargaCombosFK(imagen_kardex_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_kardex_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_kardex_control);
		this.actualizarPaginaTablaDatos(imagen_kardex_control);
		this.actualizarPaginaCargaGeneralControles(imagen_kardex_control);
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_kardex_control);
		this.actualizarPaginaAreaBusquedas(imagen_kardex_control);
		this.actualizarPaginaCargaCombosFK(imagen_kardex_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(imagen_kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_kardex_control) {
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_kardex_control) {
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_kardex_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_kardex_control);
		this.actualizarPaginaCargaCombosFK(imagen_kardex_control);
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_kardex_control) {
		this.actualizarPaginaAbrirLink(imagen_kardex_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);				
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);
		this.actualizarPaginaFormulario(imagen_kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);
		this.actualizarPaginaFormulario(imagen_kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_kardex_control) {
		this.actualizarPaginaFormulario(imagen_kardex_control);
		this.onLoadCombosDefectoFK(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);
		this.actualizarPaginaFormulario(imagen_kardex_control);
		this.onLoadCombosDefectoFK(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_kardex_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_kardex_control);
		this.actualizarPaginaCargaCombosFK(imagen_kardex_control);
		this.actualizarPaginaFormulario(imagen_kardex_control);
		this.onLoadCombosDefectoFK(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_kardex_control) {
		this.actualizarPaginaAbrirLink(imagen_kardex_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_kardex_control) {
		this.actualizarPaginaImprimir(imagen_kardex_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_kardex_control) {
		this.actualizarPaginaImprimir(imagen_kardex_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_kardex_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_kardex_control) {
		//FORMULARIO
		if(imagen_kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_kardex_control);
			this.actualizarPaginaFormularioAdd(imagen_kardex_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		//COMBOS FK
		if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_kardex_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_kardex_control) {
		//FORMULARIO
		if(imagen_kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_kardex_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);	
		//COMBOS FK
		if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_kardex_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control) {
		if(imagen_kardex_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_kardex_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_kardex_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_kardex_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_kardex_control) {
		if(imagen_kardex_funcion1.esPaginaForm()==true) {
			window.opener.imagen_kardex_webcontrol1.actualizarPaginaTablaDatos(imagen_kardex_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_kardex_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_kardex_control) {
		imagen_kardex_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_kardex_control.strAuxiliarUrlPagina);
				
		imagen_kardex_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_kardex_control.strAuxiliarTipo,imagen_kardex_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_kardex_control) {
		imagen_kardex_funcion1.resaltarRestaurarDivMensaje(true,imagen_kardex_control.strAuxiliarMensajeAlert,imagen_kardex_control.strAuxiliarCssMensaje);
			
		if(imagen_kardex_funcion1.esPaginaForm()==true) {
			window.opener.imagen_kardex_funcion1.resaltarRestaurarDivMensaje(true,imagen_kardex_control.strAuxiliarMensajeAlert,imagen_kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(imagen_kardex_control) {
		eval(imagen_kardex_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(imagen_kardex_control, mostrar) {
		
		if(mostrar==true) {
			imagen_kardex_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_kardex_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			imagen_kardex_funcion1.mostrarDivMensaje(true,imagen_kardex_control.strAuxiliarMensaje,imagen_kardex_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_kardex_funcion1.mostrarDivMensaje(false,imagen_kardex_control.strAuxiliarMensaje,imagen_kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(imagen_kardex_control) {
	
		funcionGeneral.printWebPartPage("imagen_kardex",imagen_kardex_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarimagen_kardexsAjaxWebPart").html(imagen_kardex_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("imagen_kardex",jQuery("#divTablaDatosReporteAuxiliarimagen_kardexsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(imagen_kardex_control) {
		this.imagen_kardex_controlInicial=imagen_kardex_control;
			
		if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_kardex_control.strStyleDivArbol,imagen_kardex_control.strStyleDivContent
																,imagen_kardex_control.strStyleDivOpcionesBanner,imagen_kardex_control.strStyleDivExpandirColapsar
																,imagen_kardex_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_kardex_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_kardex_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(imagen_kardex_control) {
		jQuery("#divTablaDatosimagen_kardexsAjaxWebPart").html(imagen_kardex_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_kardexs=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_kardexs=jQuery("#tblTablaDatosimagen_kardexs").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_kardex",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_kardex_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_kardex_webcontrol1.registrarControlesTableEdition(imagen_kardex_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_kardex_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(imagen_kardex_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_kardex_control.imagen_kardexActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_kardex_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(imagen_kardex_control) {
		this.actualizarCssBotonesPagina(imagen_kardex_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_kardex_control.tiposReportes,imagen_kardex_control.tiposReporte
															 	,imagen_kardex_control.tiposPaginacion,imagen_kardex_control.tiposAcciones
																,imagen_kardex_control.tiposColumnasSelect,imagen_kardex_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_kardex_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_kardex_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_kardex_control);			
	}
	
	actualizarPaginaAreaBusquedas(imagen_kardex_control) {
		jQuery("#divBusquedaimagen_kardexAjaxWebPart").css("display",imagen_kardex_control.strPermisoBusqueda);
		jQuery("#trimagen_kardexCabeceraBusquedas").css("display",imagen_kardex_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_kardex").css("display",imagen_kardex_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_kardex_control.htmlTablaOrderBy!=null
			&& imagen_kardex_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_kardexAjaxWebPart").html(imagen_kardex_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_kardex_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_kardex_control.htmlTablaOrderByRel!=null
			&& imagen_kardex_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_kardexAjaxWebPart").html(imagen_kardex_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_kardex_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_kardexAjaxWebPart").css("display","none");
			jQuery("#trimagen_kardexCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_kardex").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(imagen_kardex_control) {
		jQuery("#tdimagen_kardexNuevo").css("display",imagen_kardex_control.strPermisoNuevo);
		jQuery("#trimagen_kardexElementos").css("display",imagen_kardex_control.strVisibleTablaElementos);
		jQuery("#trimagen_kardexAcciones").css("display",imagen_kardex_control.strVisibleTablaAcciones);
		jQuery("#trimagen_kardexParametrosAcciones").css("display",imagen_kardex_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_kardex_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_kardex_control);
				
		if(imagen_kardex_control.imagen_kardexActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_kardex_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_kardex_control);
	}
	
	actualizarPaginaUsuarioInvitado(imagen_kardex_control) {
	
		var indexPosition=imagen_kardex_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_kardex_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_kardex_control) {
		jQuery("#divResumenimagen_kardexActualAjaxWebPart").html(imagen_kardex_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_kardex_control) {
		jQuery("#divAccionesRelacionesimagen_kardexAjaxWebPart").html(imagen_kardex_control.htmlTablaAccionesRelaciones);
			
		imagen_kardex_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_kardex_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_kardex_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_kardex_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_kardex();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_kardex",id,"inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_kardex_control) {
	
		jQuery("#form"+imagen_kardex_constante1.STR_SUFIJO+"-id").val(imagen_kardex_control.imagen_kardexActual.id);
		jQuery("#form"+imagen_kardex_constante1.STR_SUFIJO+"-version_row").val(imagen_kardex_control.imagen_kardexActual.versionRow);
		jQuery("#form"+imagen_kardex_constante1.STR_SUFIJO+"-nro_documento").val(imagen_kardex_control.imagen_kardexActual.nro_documento);
		jQuery("#form"+imagen_kardex_constante1.STR_SUFIJO+"-imagen").val(imagen_kardex_control.imagen_kardexActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_kardex_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_kardex","inventario","","form_imagen_kardex",formulario,"","",paraEventoTabla,idFilaTabla,imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
	}
	
	cargarCombosFK(imagen_kardex_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_kardex_control.strRecargarFkTiposNinguno!=null && imagen_kardex_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_kardex_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(imagen_kardex_control) {
		jQuery("#spanstrMensajeid").text(imagen_kardex_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_kardex_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenro_documento").text(imagen_kardex_control.strMensajenro_documento);		
		jQuery("#spanstrMensajeimagen").text(imagen_kardex_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_kardex_control) {
		jQuery("#tdbtnNuevoimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_kardex").css("display",imagen_kardex_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_kardex").css("display",imagen_kardex_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_kardex").css("display",imagen_kardex_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_kardex").css("display",imagen_kardex_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(imagen_kardex_control) {
		var i=0;
		
		i=imagen_kardex_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_kardex_control.imagen_kardexActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_kardex_control.imagen_kardexActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(imagen_kardex_control.imagen_kardexActual.nro_documento);
		jQuery("#t-cel_"+i+"_3").val(imagen_kardex_control.imagen_kardexActual.imagen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_kardex_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_kardex_control) {
		imagen_kardex_funcion1.registrarControlesTableValidacionEdition(imagen_kardex_control,imagen_kardex_webcontrol1,imagen_kardex_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardexConstante,strParametros);
		
		//imagen_kardex_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_kardex_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(imagen_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_kardex_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_kardex");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_kardex");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_kardex_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);			
			
			if(imagen_kardex_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,"imagen_kardex");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			imagen_kardex_funcion1.validarFormularioJQuery(imagen_kardex_constante1);
			
			if(imagen_kardex_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_kardex_control) {
		
		jQuery("#divBusquedaimagen_kardexAjaxWebPart").css("display",imagen_kardex_control.strPermisoBusqueda);
		jQuery("#trimagen_kardexCabeceraBusquedas").css("display",imagen_kardex_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_kardex").css("display",imagen_kardex_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_kardex").css("display",imagen_kardex_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_kardex").attr("style",imagen_kardex_control.strPermisoMostrarTodos);
		
		if(imagen_kardex_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_kardexNuevo").css("display",imagen_kardex_control.strPermisoNuevo);
			jQuery("#tdimagen_kardexNuevoToolBar").css("display",imagen_kardex_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_kardexDuplicar").css("display",imagen_kardex_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_kardexDuplicarToolBar").css("display",imagen_kardex_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_kardexNuevoGuardarCambios").css("display",imagen_kardex_control.strPermisoNuevo);
			jQuery("#tdimagen_kardexNuevoGuardarCambiosToolBar").css("display",imagen_kardex_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_kardex_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_kardexActualizarToolBar").css("display",imagen_kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_kardexCopiar").css("display",imagen_kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_kardexCopiarToolBar").css("display",imagen_kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_kardexConEditar").css("display",imagen_kardex_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_kardexEliminarToolBar").css("display",imagen_kardex_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdimagen_kardexGuardarCambios").css("display",imagen_kardex_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_kardexGuardarCambiosToolBar").css("display",imagen_kardex_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trimagen_kardexElementos").css("display",imagen_kardex_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_kardexAcciones").css("display",imagen_kardex_control.strVisibleTablaAcciones);
		jQuery("#trimagen_kardexParametrosAcciones").css("display",imagen_kardex_control.strVisibleTablaAcciones);
			
		jQuery("#tdimagen_kardexCerrarPagina").css("display",imagen_kardex_control.strPermisoPopup);		
		jQuery("#tdimagen_kardexCerrarPaginaToolBar").css("display",imagen_kardex_control.strPermisoPopup);
		//jQuery("#trimagen_kardexAccionesRelaciones").css("display",imagen_kardex_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_kardex_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_kardex_webcontrol1.registrarEventosControles();
		
		if(imagen_kardex_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
			imagen_kardex_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_kardex_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_kardex_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_kardex_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(imagen_kardex_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_kardex_webcontrol1.onLoad();
				
			} else {
				if(imagen_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
					if(imagen_kardex_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
						//imagen_kardex_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(imagen_kardex_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_kardex_constante1.BIG_ID_ACTUAL,"imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
						//imagen_kardex_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			imagen_kardex_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var imagen_kardex_webcontrol1=new imagen_kardex_webcontrol();

if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_kardex_webcontrol1.onLoadWindow; 
}

//</script>