//<script type="text/javascript" language="javascript">



//var parametro_sqlJQueryPaginaWebInteraccion= function (parametro_sql_control) {
//this.,this.,this.

class parametro_sql_webcontrol extends parametro_sql_webcontrol_add {
	
	parametro_sql_control=null;
	parametro_sql_controlInicial=null;
	parametro_sql_controlAuxiliar=null;
		
	//if(parametro_sql_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_sql_control) {
		super();
		
		this.parametro_sql_control=parametro_sql_control;
	}
		
	actualizarVariablesPagina(parametro_sql_control) {
		
		if(parametro_sql_control.action=="index" || parametro_sql_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_sql_control);
			
		} else if(parametro_sql_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_sql_control);
			
		} else if(parametro_sql_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_sql_control);
			
		} else if(parametro_sql_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_sql_control);		
		
		} else if(parametro_sql_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_sql_control);		
		
		} else if(parametro_sql_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_sql_control);		
		
		} else if(parametro_sql_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_sql_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(parametro_sql_control.action + " Revisar Manejo");
			
			if(parametro_sql_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(parametro_sql_control);
				
				return;
			}
			
			//if(parametro_sql_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(parametro_sql_control);
			//}
			
			if(parametro_sql_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(parametro_sql_control);
			}
			
			if(parametro_sql_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_sql_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(parametro_sql_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(parametro_sql_control, false);			
			}
			
			if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(parametro_sql_control);	
			}
			
			if(parametro_sql_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(parametro_sql_control);
			}
			
			if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(parametro_sql_control);
			}
			
			if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(parametro_sql_control);
			}
			
			if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(parametro_sql_control);	
			}
			
			if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
			}
			
			if(parametro_sql_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(parametro_sql_control);
			}
			
			
			if(parametro_sql_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(parametro_sql_control);			
			}
			
			if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(parametro_sql_control);
			}
			
			
			if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(parametro_sql_control);
			}
			
			if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(parametro_sql_control);
			}				
			
			if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_sql_control);
			}
			
			if(parametro_sql_control.usuarioActual!=null && parametro_sql_control.usuarioActual.field_strUserName!=null &&
			parametro_sql_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(parametro_sql_control);			
			}
		}
		
		
		if(parametro_sql_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_sql_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(parametro_sql_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_sql_control);
		this.actualizarPaginaTablaDatos(parametro_sql_control);
		this.actualizarPaginaCargaGeneralControles(parametro_sql_control);
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_sql_control);
		this.actualizarPaginaAreaBusquedas(parametro_sql_control);
		this.actualizarPaginaCargaCombosFK(parametro_sql_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_sql_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_sql_control);
		this.actualizarPaginaTablaDatos(parametro_sql_control);
		this.actualizarPaginaCargaGeneralControles(parametro_sql_control);
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_sql_control);
		this.actualizarPaginaAreaBusquedas(parametro_sql_control);
		this.actualizarPaginaCargaCombosFK(parametro_sql_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(parametro_sql_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_sql_control);		
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_sql_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_sql_control);		
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_sql_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_sql_control);		
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_sql_control) {
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_sql_control) {
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_sql_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_sql_control);
		this.actualizarPaginaCargaCombosFK(parametro_sql_control);
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_sql_control) {
		this.actualizarPaginaAbrirLink(parametro_sql_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);				
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);
		this.actualizarPaginaFormulario(parametro_sql_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);
		this.actualizarPaginaFormulario(parametro_sql_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_sql_control) {
		this.actualizarPaginaFormulario(parametro_sql_control);
		this.onLoadCombosDefectoFK(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);
		this.actualizarPaginaFormulario(parametro_sql_control);
		this.onLoadCombosDefectoFK(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_sql_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_sql_control);
		this.actualizarPaginaCargaCombosFK(parametro_sql_control);
		this.actualizarPaginaFormulario(parametro_sql_control);
		this.onLoadCombosDefectoFK(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_sql_control) {
		this.actualizarPaginaAbrirLink(parametro_sql_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_sql_control) {
		this.actualizarPaginaImprimir(parametro_sql_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_sql_control) {
		this.actualizarPaginaImprimir(parametro_sql_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_sql_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_sql_control) {
		//FORMULARIO
		if(parametro_sql_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_sql_control);
			this.actualizarPaginaFormularioAdd(parametro_sql_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		//COMBOS FK
		if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_sql_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_sql_control) {
		//FORMULARIO
		if(parametro_sql_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_sql_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);	
		//COMBOS FK
		if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_sql_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control) {
		if(parametro_sql_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_sql_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_sql_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_sql_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_sql_control) {
		if(parametro_sql_funcion1.esPaginaForm()==true) {
			window.opener.parametro_sql_webcontrol1.actualizarPaginaTablaDatos(parametro_sql_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_sql_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_sql_control) {
		parametro_sql_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_sql_control.strAuxiliarUrlPagina);
				
		parametro_sql_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_sql_control.strAuxiliarTipo,parametro_sql_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_sql_control) {
		parametro_sql_funcion1.resaltarRestaurarDivMensaje(true,parametro_sql_control.strAuxiliarMensajeAlert,parametro_sql_control.strAuxiliarCssMensaje);
			
		if(parametro_sql_funcion1.esPaginaForm()==true) {
			window.opener.parametro_sql_funcion1.resaltarRestaurarDivMensaje(true,parametro_sql_control.strAuxiliarMensajeAlert,parametro_sql_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(parametro_sql_control) {
		eval(parametro_sql_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(parametro_sql_control, mostrar) {
		
		if(mostrar==true) {
			parametro_sql_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_sql_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			parametro_sql_funcion1.mostrarDivMensaje(true,parametro_sql_control.strAuxiliarMensaje,parametro_sql_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_sql_funcion1.mostrarDivMensaje(false,parametro_sql_control.strAuxiliarMensaje,parametro_sql_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(parametro_sql_control) {
	
		funcionGeneral.printWebPartPage("parametro_sql",parametro_sql_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarparametro_sqlsAjaxWebPart").html(parametro_sql_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("parametro_sql",jQuery("#divTablaDatosReporteAuxiliarparametro_sqlsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(parametro_sql_control) {
		this.parametro_sql_controlInicial=parametro_sql_control;
			
		if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_sql_control.strStyleDivArbol,parametro_sql_control.strStyleDivContent
																,parametro_sql_control.strStyleDivOpcionesBanner,parametro_sql_control.strStyleDivExpandirColapsar
																,parametro_sql_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_sql_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_sql_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(parametro_sql_control) {
		jQuery("#divTablaDatosparametro_sqlsAjaxWebPart").html(parametro_sql_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_sqls=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_sqls=jQuery("#tblTablaDatosparametro_sqls").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_sql",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_sql_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_sql_webcontrol1.registrarControlesTableEdition(parametro_sql_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_sql_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(parametro_sql_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_sql_control.parametro_sqlActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_sql_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(parametro_sql_control) {
		this.actualizarCssBotonesPagina(parametro_sql_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_sql_control.tiposReportes,parametro_sql_control.tiposReporte
															 	,parametro_sql_control.tiposPaginacion,parametro_sql_control.tiposAcciones
																,parametro_sql_control.tiposColumnasSelect,parametro_sql_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_sql_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_sql_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_sql_control);			
	}
	
	actualizarPaginaAreaBusquedas(parametro_sql_control) {
		jQuery("#divBusquedaparametro_sqlAjaxWebPart").css("display",parametro_sql_control.strPermisoBusqueda);
		jQuery("#trparametro_sqlCabeceraBusquedas").css("display",parametro_sql_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_sql").css("display",parametro_sql_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_sql_control.htmlTablaOrderBy!=null
			&& parametro_sql_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_sqlAjaxWebPart").html(parametro_sql_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_sql_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_sql_control.htmlTablaOrderByRel!=null
			&& parametro_sql_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_sqlAjaxWebPart").html(parametro_sql_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_sql_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_sqlAjaxWebPart").css("display","none");
			jQuery("#trparametro_sqlCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_sql").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(parametro_sql_control) {
		jQuery("#tdparametro_sqlNuevo").css("display",parametro_sql_control.strPermisoNuevo);
		jQuery("#trparametro_sqlElementos").css("display",parametro_sql_control.strVisibleTablaElementos);
		jQuery("#trparametro_sqlAcciones").css("display",parametro_sql_control.strVisibleTablaAcciones);
		jQuery("#trparametro_sqlParametrosAcciones").css("display",parametro_sql_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_sql_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_sql_control);
				
		if(parametro_sql_control.parametro_sqlActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_sql_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_sql_control);
	}
	
	actualizarPaginaUsuarioInvitado(parametro_sql_control) {
	
		var indexPosition=parametro_sql_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_sql_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_sql_control) {
		jQuery("#divResumenparametro_sqlActualAjaxWebPart").html(parametro_sql_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_sql_control) {
		jQuery("#divAccionesRelacionesparametro_sqlAjaxWebPart").html(parametro_sql_control.htmlTablaAccionesRelaciones);
			
		parametro_sql_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_sql_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_sql_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_sql_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_sql();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_sql",id,"general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_sql_control) {
	
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-id").val(parametro_sql_control.parametro_sqlActual.id);
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-version_row").val(parametro_sql_control.parametro_sqlActual.versionRow);
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-binario1").val(parametro_sql_control.parametro_sqlActual.binario1);
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-binario2").val(parametro_sql_control.parametro_sqlActual.binario2);
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-binario3").val(parametro_sql_control.parametro_sqlActual.binario3);
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-binario4").val(parametro_sql_control.parametro_sqlActual.binario4);
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-binario5").val(parametro_sql_control.parametro_sqlActual.binario5);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_sql_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_sql","general","","form_parametro_sql",formulario,"","",paraEventoTabla,idFilaTabla,parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
	}
	
	cargarCombosFK(parametro_sql_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_sql_control.strRecargarFkTiposNinguno!=null && parametro_sql_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_sql_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(parametro_sql_control) {
		jQuery("#spanstrMensajeid").text(parametro_sql_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_sql_control.strMensajeversion_row);		
		jQuery("#spanstrMensajebinario1").text(parametro_sql_control.strMensajebinario1);		
		jQuery("#spanstrMensajebinario2").text(parametro_sql_control.strMensajebinario2);		
		jQuery("#spanstrMensajebinario3").text(parametro_sql_control.strMensajebinario3);		
		jQuery("#spanstrMensajebinario4").text(parametro_sql_control.strMensajebinario4);		
		jQuery("#spanstrMensajebinario5").text(parametro_sql_control.strMensajebinario5);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_sql_control) {
		jQuery("#tdbtnNuevoparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_sql").css("display",parametro_sql_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_sql").css("display",parametro_sql_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_sql").css("display",parametro_sql_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_sql").css("display",parametro_sql_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(parametro_sql_control) {
		var i=0;
		
		i=parametro_sql_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_sql_control.parametro_sqlActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_sql_control.parametro_sqlActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(parametro_sql_control.parametro_sqlActual.binario1);
		jQuery("#t-cel_"+i+"_3").val(parametro_sql_control.parametro_sqlActual.binario2);
		jQuery("#t-cel_"+i+"_4").val(parametro_sql_control.parametro_sqlActual.binario3);
		jQuery("#t-cel_"+i+"_5").val(parametro_sql_control.parametro_sqlActual.binario4);
		jQuery("#t-cel_"+i+"_6").val(parametro_sql_control.parametro_sqlActual.binario5);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_sql_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_sql_control) {
		parametro_sql_funcion1.registrarControlesTableValidacionEdition(parametro_sql_control,parametro_sql_webcontrol1,parametro_sql_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sqlConstante,strParametros);
		
		//parametro_sql_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_sql_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_sql_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_sql_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(parametro_sql_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_sql_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_sql_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_sql_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_sql_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_sql");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_sql");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_sql_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);			
			
			if(parametro_sql_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,"parametro_sql");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			parametro_sql_funcion1.validarFormularioJQuery(parametro_sql_constante1);
			
			if(parametro_sql_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_sql_control) {
		
		jQuery("#divBusquedaparametro_sqlAjaxWebPart").css("display",parametro_sql_control.strPermisoBusqueda);
		jQuery("#trparametro_sqlCabeceraBusquedas").css("display",parametro_sql_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_sql").css("display",parametro_sql_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_sql").css("display",parametro_sql_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_sql").attr("style",parametro_sql_control.strPermisoMostrarTodos);
		
		if(parametro_sql_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_sqlNuevo").css("display",parametro_sql_control.strPermisoNuevo);
			jQuery("#tdparametro_sqlNuevoToolBar").css("display",parametro_sql_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_sqlDuplicar").css("display",parametro_sql_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_sqlDuplicarToolBar").css("display",parametro_sql_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_sqlNuevoGuardarCambios").css("display",parametro_sql_control.strPermisoNuevo);
			jQuery("#tdparametro_sqlNuevoGuardarCambiosToolBar").css("display",parametro_sql_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_sql_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_sqlActualizarToolBar").css("display",parametro_sql_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_sqlCopiar").css("display",parametro_sql_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_sqlCopiarToolBar").css("display",parametro_sql_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_sqlConEditar").css("display",parametro_sql_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_sqlEliminarToolBar").css("display",parametro_sql_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdparametro_sqlGuardarCambios").css("display",parametro_sql_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_sqlGuardarCambiosToolBar").css("display",parametro_sql_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trparametro_sqlElementos").css("display",parametro_sql_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_sqlAcciones").css("display",parametro_sql_control.strVisibleTablaAcciones);
		jQuery("#trparametro_sqlParametrosAcciones").css("display",parametro_sql_control.strVisibleTablaAcciones);
			
		jQuery("#tdparametro_sqlCerrarPagina").css("display",parametro_sql_control.strPermisoPopup);		
		jQuery("#tdparametro_sqlCerrarPaginaToolBar").css("display",parametro_sql_control.strPermisoPopup);
		//jQuery("#trparametro_sqlAccionesRelaciones").css("display",parametro_sql_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_sql_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_sql_webcontrol1.registrarEventosControles();
		
		if(parametro_sql_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
			parametro_sql_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_sql_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_sql_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_sql_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_sql_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(parametro_sql_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_sql_webcontrol1.onLoad();
				
			} else {
				if(parametro_sql_constante1.BIT_ES_PAGINA_FORM==true) {
					if(parametro_sql_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
						//parametro_sql_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(parametro_sql_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_sql_constante1.BIG_ID_ACTUAL,"parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
						//parametro_sql_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			parametro_sql_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var parametro_sql_webcontrol1=new parametro_sql_webcontrol();

if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_sql_webcontrol1.onLoadWindow; 
}

//</script>