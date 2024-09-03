//<script type="text/javascript" language="javascript">



//var perfilJQueryPaginaWebInteraccion= function (perfil_control) {
//this.,this.,this.

class perfil_webcontrol extends perfil_webcontrol_add {
	
	perfil_control=null;
	perfil_controlInicial=null;
	perfil_controlAuxiliar=null;
		
	//if(perfil_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_control) {
		super();
		
		this.perfil_control=perfil_control;
	}
		
	actualizarVariablesPagina(perfil_control) {
		
		if(perfil_control.action=="index" || perfil_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_control);
			
		} else if(perfil_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_control);
		
		} else if(perfil_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(perfil_control);
		
		} else if(perfil_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_control);
		
		} else if(perfil_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(perfil_control);
			
		} else if(perfil_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(perfil_control);
			
		} else if(perfil_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_control);
		
		} else if(perfil_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_control);
		
		} else if(perfil_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(perfil_control);
		
		} else if(perfil_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(perfil_control);
		
		} else if(perfil_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(perfil_control);
		
		} else if(perfil_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(perfil_control);
		
		} else if(perfil_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(perfil_control);
		
		} else if(perfil_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(perfil_control);
		
		} else if(perfil_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_control);
		
		} else if(perfil_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(perfil_control);
		
		} else if(perfil_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_control);
		
		} else if(perfil_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_control);
		
		} else if(perfil_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(perfil_control);
		
		} else if(perfil_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(perfil_control);
		
		} else if(perfil_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_control);
		
		} else if(perfil_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(perfil_control);
		
		} else if(perfil_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_control);
		
		} else if(perfil_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_control);
		
		} else if(perfil_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_control);
		
		} else if(perfil_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(perfil_control);
		
		} else if(perfil_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_control);
		
		} else if(perfil_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_control);		
		
		} else if(perfil_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(perfil_control);		
		
		} else if(perfil_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_control);		
		
		} else if(perfil_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_control);		
		}
		else if(perfil_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(perfil_control);		
		}
		else if(perfil_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_control);		
		}
		else if(perfil_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(perfil_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(perfil_control.action + " Revisar Manejo");
			
			if(perfil_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(perfil_control);
				
				return;
			}
			
			//if(perfil_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(perfil_control);
			//}
			
			if(perfil_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(perfil_control);
			}
			
			if(perfil_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(perfil_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(perfil_control, false);			
			}
			
			if(perfil_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(perfil_control);	
			}
			
			if(perfil_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(perfil_control);
			}
			
			if(perfil_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(perfil_control);
			}
			
			if(perfil_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(perfil_control);
			}
			
			if(perfil_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(perfil_control);	
			}
			
			if(perfil_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(perfil_control);
			}
			
			if(perfil_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(perfil_control);
			}
			
			
			if(perfil_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(perfil_control);			
			}
			
			if(perfil_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(perfil_control);
			}
			
			
			if(perfil_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(perfil_control);
			}
			
			if(perfil_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(perfil_control);
			}				
			
			if(perfil_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_control);
			}
			
			if(perfil_control.usuarioActual!=null && perfil_control.usuarioActual.field_strUserName!=null &&
			perfil_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(perfil_control);			
			}
		}
		
		
		if(perfil_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(perfil_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_control);
		this.actualizarPaginaTablaDatos(perfil_control);
		this.actualizarPaginaCargaGeneralControles(perfil_control);
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_control);
		this.actualizarPaginaAreaBusquedas(perfil_control);
		this.actualizarPaginaCargaCombosFK(perfil_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_control);
		this.actualizarPaginaTablaDatos(perfil_control);
		this.actualizarPaginaCargaGeneralControles(perfil_control);
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_control);
		this.actualizarPaginaAreaBusquedas(perfil_control);
		this.actualizarPaginaCargaCombosFK(perfil_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(perfil_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_control);		
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(perfil_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_control);		
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(perfil_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_control);		
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_control) {
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(perfil_control) {
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_control);
		this.actualizarPaginaCargaCombosFK(perfil_control);
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_control) {
		this.actualizarPaginaAbrirLink(perfil_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);				
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);
		this.actualizarPaginaFormulario(perfil_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);
		this.actualizarPaginaFormulario(perfil_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(perfil_control) {
		this.actualizarPaginaFormulario(perfil_control);
		this.onLoadCombosDefectoFK(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);
		this.actualizarPaginaFormulario(perfil_control);
		this.onLoadCombosDefectoFK(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_control);
		this.actualizarPaginaCargaCombosFK(perfil_control);
		this.actualizarPaginaFormulario(perfil_control);
		this.onLoadCombosDefectoFK(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_control) {
		this.actualizarPaginaAbrirLink(perfil_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_control) {
		this.actualizarPaginaImprimir(perfil_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_control) {
		this.actualizarPaginaImprimir(perfil_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_control) {
		//FORMULARIO
		if(perfil_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_control);
			this.actualizarPaginaFormularioAdd(perfil_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		//COMBOS FK
		if(perfil_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(perfil_control) {
		//FORMULARIO
		if(perfil_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);	
		//COMBOS FK
		if(perfil_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);
		this.actualizarPaginaFormulario(perfil_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_control) {
		//FORMULARIO
		if(perfil_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);	
		//COMBOS FK
		if(perfil_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(perfil_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(perfil_control) {
		if(perfil_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_control) {
		if(perfil_funcion1.esPaginaForm()==true) {
			window.opener.perfil_webcontrol1.actualizarPaginaTablaDatos(perfil_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_control) {
		perfil_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_control.strAuxiliarUrlPagina);
				
		perfil_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_control.strAuxiliarTipo,perfil_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_control) {
		perfil_funcion1.resaltarRestaurarDivMensaje(true,perfil_control.strAuxiliarMensajeAlert,perfil_control.strAuxiliarCssMensaje);
			
		if(perfil_funcion1.esPaginaForm()==true) {
			window.opener.perfil_funcion1.resaltarRestaurarDivMensaje(true,perfil_control.strAuxiliarMensajeAlert,perfil_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(perfil_control) {
		eval(perfil_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(perfil_control, mostrar) {
		
		if(mostrar==true) {
			perfil_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			perfil_funcion1.mostrarDivMensaje(true,perfil_control.strAuxiliarMensaje,perfil_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_funcion1.mostrarDivMensaje(false,perfil_control.strAuxiliarMensaje,perfil_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(perfil_control) {
	
		funcionGeneral.printWebPartPage("perfil",perfil_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarperfilsAjaxWebPart").html(perfil_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("perfil",jQuery("#divTablaDatosReporteAuxiliarperfilsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(perfil_control) {
		this.perfil_controlInicial=perfil_control;
			
		if(perfil_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_control.strStyleDivArbol,perfil_control.strStyleDivContent
																,perfil_control.strStyleDivOpcionesBanner,perfil_control.strStyleDivExpandirColapsar
																,perfil_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=perfil_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",perfil_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(perfil_control) {
		jQuery("#divTablaDatosperfilsAjaxWebPart").html(perfil_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosperfils=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(perfil_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosperfils=jQuery("#tblTablaDatosperfils").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("perfil",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',perfil_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			perfil_webcontrol1.registrarControlesTableEdition(perfil_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		perfil_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(perfil_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(perfil_control.perfilActual!=null) {//form
			
			this.actualizarCamposFilaTabla(perfil_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(perfil_control) {
		this.actualizarCssBotonesPagina(perfil_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_control.tiposReportes,perfil_control.tiposReporte
															 	,perfil_control.tiposPaginacion,perfil_control.tiposAcciones
																,perfil_control.tiposColumnasSelect,perfil_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(perfil_control.tiposRelaciones,perfil_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_control);			
	}
	
	actualizarPaginaAreaBusquedas(perfil_control) {
		jQuery("#divBusquedaperfilAjaxWebPart").css("display",perfil_control.strPermisoBusqueda);
		jQuery("#trperfilCabeceraBusquedas").css("display",perfil_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil").css("display",perfil_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(perfil_control.htmlTablaOrderBy!=null
			&& perfil_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByperfilAjaxWebPart").html(perfil_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//perfil_webcontrol1.registrarOrderByActions();
			
		}
			
		if(perfil_control.htmlTablaOrderByRel!=null
			&& perfil_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelperfilAjaxWebPart").html(perfil_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(perfil_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaperfilAjaxWebPart").css("display","none");
			jQuery("#trperfilCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaperfil").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(perfil_control) {
		jQuery("#tdperfilNuevo").css("display",perfil_control.strPermisoNuevo);
		jQuery("#trperfilElementos").css("display",perfil_control.strVisibleTablaElementos);
		jQuery("#trperfilAcciones").css("display",perfil_control.strVisibleTablaAcciones);
		jQuery("#trperfilParametrosAcciones").css("display",perfil_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(perfil_control) {
	
		this.actualizarCssBotonesMantenimiento(perfil_control);
				
		if(perfil_control.perfilActual!=null) {//form
			
			this.actualizarCamposFormulario(perfil_control);			
		}
						
		this.actualizarSpanMensajesCampos(perfil_control);
	}
	
	actualizarPaginaUsuarioInvitado(perfil_control) {
	
		var indexPosition=perfil_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(perfil_control) {
		jQuery("#divResumenperfilActualAjaxWebPart").html(perfil_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_control) {
		jQuery("#divAccionesRelacionesperfilAjaxWebPart").html(perfil_control.htmlTablaAccionesRelaciones);
			
		perfil_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(perfil_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(perfil_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(perfil_control) {
		
		if(perfil_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",perfil_control.strVisibleBusquedaPorNombre);
			jQuery("#tblstrVisible"+perfil_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",perfil_control.strVisibleBusquedaPorNombre);
		}

		if(perfil_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_constante1.STR_SUFIJO+"BusquedaPorNombre2").attr("style",perfil_control.strVisibleBusquedaPorNombre2);
			jQuery("#tblstrVisible"+perfil_constante1.STR_SUFIJO+"BusquedaPorNombre2").attr("style",perfil_control.strVisibleBusquedaPorNombre2);
		}

		if(perfil_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_constante1.STR_SUFIJO+"FK_Idsistema").attr("style",perfil_control.strVisibleFK_Idsistema);
			jQuery("#tblstrVisible"+perfil_constante1.STR_SUFIJO+"FK_Idsistema").attr("style",perfil_control.strVisibleFK_Idsistema);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionperfil();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("perfil",id,"seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);		
	}
	
	

	abrirBusquedaParasistema(strNombreCampoBusqueda){//idActual
		perfil_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil","sistema","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(perfil_control) {
	
		jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id").val(perfil_control.perfilActual.id);
		jQuery("#form"+perfil_constante1.STR_SUFIJO+"-version_row").val(perfil_control.perfilActual.versionRow);
		
		if(perfil_control.perfilActual.id_sistema!=null && perfil_control.perfilActual.id_sistema>-1){
			if(jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val() != perfil_control.perfilActual.id_sistema) {
				jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val(perfil_control.perfilActual.id_sistema).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").select2("val", null);
			if(jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+perfil_constante1.STR_SUFIJO+"-codigo").val(perfil_control.perfilActual.codigo);
		jQuery("#form"+perfil_constante1.STR_SUFIJO+"-nombre").val(perfil_control.perfilActual.nombre);
		jQuery("#form"+perfil_constante1.STR_SUFIJO+"-nombre2").val(perfil_control.perfilActual.nombre2);
		jQuery("#form"+perfil_constante1.STR_SUFIJO+"-estado").prop('checked',perfil_control.perfilActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+perfil_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("perfil","seguridad","","form_perfil",formulario,"","",paraEventoTabla,idFilaTabla,perfil_funcion1,perfil_webcontrol1,perfil_constante1);
	}
	
	cargarCombosFK(perfil_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",perfil_control.strRecargarFkTipos,",")) { 
				perfil_webcontrol1.cargarCombossistemasFK(perfil_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_control.strRecargarFkTiposNinguno!=null && perfil_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sistema",perfil_control.strRecargarFkTiposNinguno,",")) { 
					perfil_webcontrol1.cargarCombossistemasFK(perfil_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(perfil_control) {
		jQuery("#spanstrMensajeid").text(perfil_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(perfil_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_sistema").text(perfil_control.strMensajeid_sistema);		
		jQuery("#spanstrMensajecodigo").text(perfil_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(perfil_control.strMensajenombre);		
		jQuery("#spanstrMensajenombre2").text(perfil_control.strMensajenombre2);		
		jQuery("#spanstrMensajeestado").text(perfil_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(perfil_control) {
		jQuery("#tdbtnNuevoperfil").css("visibility",perfil_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoperfil").css("display",perfil_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarperfil").css("visibility",perfil_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarperfil").css("display",perfil_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarperfil").css("visibility",perfil_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarperfil").css("display",perfil_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarperfil").css("visibility",perfil_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosperfil").css("visibility",perfil_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosperfil").css("display",perfil_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarperfil").css("visibility",perfil_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarperfil").css("visibility",perfil_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarperfil").css("visibility",perfil_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionperfil_campo").click(function(){

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_campos(idActual);
		});
		jQuery("#imgdivrelacionperfil_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_usuarios(idActual);
		});
		jQuery("#imgdivrelacionperfil_opcion").click(function(){

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_opciones(idActual);
		});
		jQuery("#imgdivrelacionperfil_accion").click(function(){

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_acciones(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablasistemaFK(perfil_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_funcion1,perfil_control.sistemasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(perfil_control) {
		var i=0;
		
		i=perfil_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(perfil_control.perfilActual.id);
		jQuery("#t-version_row_"+i+"").val(perfil_control.perfilActual.versionRow);
		
		if(perfil_control.perfilActual.id_sistema!=null && perfil_control.perfilActual.id_sistema>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != perfil_control.perfilActual.id_sistema) {
				jQuery("#t-cel_"+i+"_2").val(perfil_control.perfilActual.id_sistema).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(perfil_control.perfilActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(perfil_control.perfilActual.nombre);
		jQuery("#t-cel_"+i+"_5").val(perfil_control.perfilActual.nombre2);
		jQuery("#t-cel_"+i+"_6").prop('checked',perfil_control.perfilActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(perfil_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_campo").click(function(){
		jQuery("#tblTablaDatosperfils").on("click",".imgrelacionperfil_campo", function () {

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_campos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_usuario").click(function(){
		jQuery("#tblTablaDatosperfils").on("click",".imgrelacionperfil_usuario", function () {

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_usuarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_opcion").click(function(){
		jQuery("#tblTablaDatosperfils").on("click",".imgrelacionperfil_opcion", function () {

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_opciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_accion").click(function(){
		jQuery("#tblTablaDatosperfils").on("click",".imgrelacionperfil_accion", function () {

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_acciones(idActual);
		});				
	}
		
	

	registrarSesionParaperfil_campos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"perfil","perfil_campo","seguridad","",perfil_funcion1,perfil_webcontrol1,"s","");
	}

	registrarSesionParaperfil_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"perfil","perfil_usuario","seguridad","",perfil_funcion1,perfil_webcontrol1,"s","");
	}

	registrarSesionParaperfil_opciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"perfil","perfil_opcion","seguridad","",perfil_funcion1,perfil_webcontrol1,"es","");
	}

	registrarSesionParaperfil_acciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"perfil","perfil_accion","seguridad","",perfil_funcion1,perfil_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(perfil_control) {
		perfil_funcion1.registrarControlesTableValidacionEdition(perfil_control,perfil_webcontrol1,perfil_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfilConstante,strParametros);
		
		//perfil_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombossistemasFK(perfil_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema",perfil_control.sistemasFK);

		if(perfil_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_control.idFilaTablaActual+"_2",perfil_control.sistemasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema",perfil_control.sistemasFK);

	};

	
	
	registrarComboActionChangeCombossistemasFK(perfil_control) {

	};

	
	
	setDefectoValorCombossistemasFK(perfil_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_control.idsistemaDefaultFK>-1 && jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val() != perfil_control.idsistemaDefaultFK) {
				jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val(perfil_control.idsistemaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(perfil_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",perfil_control.strRecargarFkTipos,",")) { 
				perfil_webcontrol1.setDefectoValorCombossistemasFK(perfil_control);
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
	onLoadCombosEventosFK(perfil_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",perfil_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_webcontrol1.registrarComboActionChangeCombossistemasFK(perfil_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(perfil_funcion1,perfil_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(perfil_funcion1,perfil_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(perfil_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);			
			
			if(perfil_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,"perfil");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sistema","id_sistema","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema_img_busqueda").click(function(){
				perfil_webcontrol1.abrirBusquedaParasistema("id_sistema");
				//alert(jQuery('#form-id_sistema_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil","BusquedaPorNombre","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil","BusquedaPorNombre2","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil","FK_Idsistema","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("perfil");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			perfil_funcion1.validarFormularioJQuery(perfil_constante1);
			
			if(perfil_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_control) {
		
		jQuery("#divBusquedaperfilAjaxWebPart").css("display",perfil_control.strPermisoBusqueda);
		jQuery("#trperfilCabeceraBusquedas").css("display",perfil_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil").css("display",perfil_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteperfil").css("display",perfil_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosperfil").attr("style",perfil_control.strPermisoMostrarTodos);
		
		if(perfil_control.strPermisoNuevo!=null) {
			jQuery("#tdperfilNuevo").css("display",perfil_control.strPermisoNuevo);
			jQuery("#tdperfilNuevoToolBar").css("display",perfil_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdperfilDuplicar").css("display",perfil_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfilDuplicarToolBar").css("display",perfil_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfilNuevoGuardarCambios").css("display",perfil_control.strPermisoNuevo);
			jQuery("#tdperfilNuevoGuardarCambiosToolBar").css("display",perfil_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(perfil_control.strPermisoActualizar!=null) {
			jQuery("#tdperfilActualizarToolBar").css("display",perfil_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfilCopiar").css("display",perfil_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfilCopiarToolBar").css("display",perfil_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfilConEditar").css("display",perfil_control.strPermisoActualizar);
		}
		
		jQuery("#tdperfilEliminarToolBar").css("display",perfil_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdperfilGuardarCambios").css("display",perfil_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdperfilGuardarCambiosToolBar").css("display",perfil_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trperfilElementos").css("display",perfil_control.strVisibleTablaElementos);
		
		jQuery("#trperfilAcciones").css("display",perfil_control.strVisibleTablaAcciones);
		jQuery("#trperfilParametrosAcciones").css("display",perfil_control.strVisibleTablaAcciones);
			
		jQuery("#tdperfilCerrarPagina").css("display",perfil_control.strPermisoPopup);		
		jQuery("#tdperfilCerrarPaginaToolBar").css("display",perfil_control.strPermisoPopup);
		//jQuery("#trperfilAccionesRelaciones").css("display",perfil_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_webcontrol1.registrarEventosControles();
		
		if(perfil_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_constante1.STR_ES_RELACIONADO=="false") {
			perfil_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(perfil_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				perfil_webcontrol1.onLoad();
				
			} else {
				if(perfil_constante1.BIT_ES_PAGINA_FORM==true) {
					if(perfil_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
						//perfil_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(perfil_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(perfil_constante1.BIG_ID_ACTUAL,"perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
						//perfil_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			perfil_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var perfil_webcontrol1=new perfil_webcontrol();

if(perfil_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_webcontrol1.onLoadWindow; 
}

//</script>