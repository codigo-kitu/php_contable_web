//<script type="text/javascript" language="javascript">



//var documento_clienteJQueryPaginaWebInteraccion= function (documento_cliente_control) {
//this.,this.,this.

class documento_cliente_webcontrol extends documento_cliente_webcontrol_add {
	
	documento_cliente_control=null;
	documento_cliente_controlInicial=null;
	documento_cliente_controlAuxiliar=null;
		
	//if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(documento_cliente_control) {
		super();
		
		this.documento_cliente_control=documento_cliente_control;
	}
		
	actualizarVariablesPagina(documento_cliente_control) {
		
		if(documento_cliente_control.action=="index" || documento_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(documento_cliente_control);
			
		} else if(documento_cliente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(documento_cliente_control);
			
		} else if(documento_cliente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(documento_cliente_control);
			
		} else if(documento_cliente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_cliente_control);		
		
		} else if(documento_cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(documento_cliente_control);		
		
		} else if(documento_cliente_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_cliente_control);		
		
		} else if(documento_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(documento_cliente_control);		
		}
		else if(documento_cliente_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_cliente_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(documento_cliente_control.action + " Revisar Manejo");
			
			if(documento_cliente_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(documento_cliente_control);
				
				return;
			}
			
			//if(documento_cliente_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(documento_cliente_control);
			//}
			
			if(documento_cliente_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(documento_cliente_control);
			}
			
			if(documento_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_cliente_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(documento_cliente_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(documento_cliente_control, false);			
			}
			
			if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(documento_cliente_control);	
			}
			
			if(documento_cliente_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(documento_cliente_control);
			}
			
			if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(documento_cliente_control);
			}
			
			if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(documento_cliente_control);
			}
			
			if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(documento_cliente_control);	
			}
			
			if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
			}
			
			if(documento_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(documento_cliente_control);
			}
			
			
			if(documento_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(documento_cliente_control);			
			}
			
			if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(documento_cliente_control);
			}
			
			
			if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(documento_cliente_control);
			}
			
			if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(documento_cliente_control);
			}				
			
			if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_cliente_control);
			}
			
			if(documento_cliente_control.usuarioActual!=null && documento_cliente_control.usuarioActual.field_strUserName!=null &&
			documento_cliente_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(documento_cliente_control);			
			}
		}
		
		
		if(documento_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(documento_cliente_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(documento_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(documento_cliente_control);
		this.actualizarPaginaTablaDatos(documento_cliente_control);
		this.actualizarPaginaCargaGeneralControles(documento_cliente_control);
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_cliente_control);
		this.actualizarPaginaAreaBusquedas(documento_cliente_control);
		this.actualizarPaginaCargaCombosFK(documento_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(documento_cliente_control);
		this.actualizarPaginaTablaDatos(documento_cliente_control);
		this.actualizarPaginaCargaGeneralControles(documento_cliente_control);
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_cliente_control);
		this.actualizarPaginaAreaBusquedas(documento_cliente_control);
		this.actualizarPaginaCargaCombosFK(documento_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(documento_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_cliente_control);		
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(documento_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_cliente_control);		
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(documento_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_cliente_control);		
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(documento_cliente_control) {
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(documento_cliente_control) {
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(documento_cliente_control);
		this.actualizarPaginaCargaCombosFK(documento_cliente_control);
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_cliente_control) {
		this.actualizarPaginaAbrirLink(documento_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);				
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);
		this.actualizarPaginaFormulario(documento_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);
		this.actualizarPaginaFormulario(documento_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(documento_cliente_control) {
		this.actualizarPaginaFormulario(documento_cliente_control);
		this.onLoadCombosDefectoFK(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);
		this.actualizarPaginaFormulario(documento_cliente_control);
		this.onLoadCombosDefectoFK(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(documento_cliente_control);
		this.actualizarPaginaCargaCombosFK(documento_cliente_control);
		this.actualizarPaginaFormulario(documento_cliente_control);
		this.onLoadCombosDefectoFK(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_cliente_control) {
		this.actualizarPaginaAbrirLink(documento_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_cliente_control) {
		this.actualizarPaginaImprimir(documento_cliente_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_cliente_control) {
		this.actualizarPaginaImprimir(documento_cliente_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(documento_cliente_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_cliente_control) {
		//FORMULARIO
		if(documento_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_cliente_control);
			this.actualizarPaginaFormularioAdd(documento_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		//COMBOS FK
		if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_cliente_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(documento_cliente_control) {
		//FORMULARIO
		if(documento_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);	
		//COMBOS FK
		if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_cliente_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_cliente_control) {
		//FORMULARIO
		if(documento_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_cliente_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(documento_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);	
		//COMBOS FK
		if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_cliente_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control) {
		if(documento_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(documento_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(documento_cliente_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(documento_cliente_control) {
		if(documento_cliente_funcion1.esPaginaForm()==true) {
			window.opener.documento_cliente_webcontrol1.actualizarPaginaTablaDatos(documento_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(documento_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(documento_cliente_control) {
		documento_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(documento_cliente_control.strAuxiliarUrlPagina);
				
		documento_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(documento_cliente_control.strAuxiliarTipo,documento_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(documento_cliente_control) {
		documento_cliente_funcion1.resaltarRestaurarDivMensaje(true,documento_cliente_control.strAuxiliarMensajeAlert,documento_cliente_control.strAuxiliarCssMensaje);
			
		if(documento_cliente_funcion1.esPaginaForm()==true) {
			window.opener.documento_cliente_funcion1.resaltarRestaurarDivMensaje(true,documento_cliente_control.strAuxiliarMensajeAlert,documento_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(documento_cliente_control) {
		eval(documento_cliente_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(documento_cliente_control, mostrar) {
		
		if(mostrar==true) {
			documento_cliente_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				documento_cliente_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			documento_cliente_funcion1.mostrarDivMensaje(true,documento_cliente_control.strAuxiliarMensaje,documento_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			documento_cliente_funcion1.mostrarDivMensaje(false,documento_cliente_control.strAuxiliarMensaje,documento_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(documento_cliente_control) {
	
		funcionGeneral.printWebPartPage("documento_cliente",documento_cliente_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliardocumento_clientesAjaxWebPart").html(documento_cliente_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("documento_cliente",jQuery("#divTablaDatosReporteAuxiliardocumento_clientesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(documento_cliente_control) {
		this.documento_cliente_controlInicial=documento_cliente_control;
			
		if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(documento_cliente_control.strStyleDivArbol,documento_cliente_control.strStyleDivContent
																,documento_cliente_control.strStyleDivOpcionesBanner,documento_cliente_control.strStyleDivExpandirColapsar
																,documento_cliente_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=documento_cliente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",documento_cliente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(documento_cliente_control) {
		jQuery("#divTablaDatosdocumento_clientesAjaxWebPart").html(documento_cliente_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdocumento_clientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdocumento_clientes=jQuery("#tblTablaDatosdocumento_clientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("documento_cliente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',documento_cliente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			documento_cliente_webcontrol1.registrarControlesTableEdition(documento_cliente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		documento_cliente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(documento_cliente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(documento_cliente_control.documento_clienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(documento_cliente_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(documento_cliente_control) {
		this.actualizarCssBotonesPagina(documento_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(documento_cliente_control.tiposReportes,documento_cliente_control.tiposReporte
															 	,documento_cliente_control.tiposPaginacion,documento_cliente_control.tiposAcciones
																,documento_cliente_control.tiposColumnasSelect,documento_cliente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(documento_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(documento_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(documento_cliente_control);			
	}
	
	actualizarPaginaAreaBusquedas(documento_cliente_control) {
		jQuery("#divBusquedadocumento_clienteAjaxWebPart").css("display",documento_cliente_control.strPermisoBusqueda);
		jQuery("#trdocumento_clienteCabeceraBusquedas").css("display",documento_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_cliente").css("display",documento_cliente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(documento_cliente_control.htmlTablaOrderBy!=null
			&& documento_cliente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydocumento_clienteAjaxWebPart").html(documento_cliente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//documento_cliente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(documento_cliente_control.htmlTablaOrderByRel!=null
			&& documento_cliente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldocumento_clienteAjaxWebPart").html(documento_cliente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(documento_cliente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadocumento_clienteAjaxWebPart").css("display","none");
			jQuery("#trdocumento_clienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadocumento_cliente").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(documento_cliente_control) {
		jQuery("#tddocumento_clienteNuevo").css("display",documento_cliente_control.strPermisoNuevo);
		jQuery("#trdocumento_clienteElementos").css("display",documento_cliente_control.strVisibleTablaElementos);
		jQuery("#trdocumento_clienteAcciones").css("display",documento_cliente_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_clienteParametrosAcciones").css("display",documento_cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(documento_cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(documento_cliente_control);
				
		if(documento_cliente_control.documento_clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(documento_cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(documento_cliente_control);
	}
	
	actualizarPaginaUsuarioInvitado(documento_cliente_control) {
	
		var indexPosition=documento_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=documento_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(documento_cliente_control) {
		jQuery("#divResumendocumento_clienteActualAjaxWebPart").html(documento_cliente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_cliente_control) {
		jQuery("#divAccionesRelacionesdocumento_clienteAjaxWebPart").html(documento_cliente_control.htmlTablaAccionesRelaciones);
			
		documento_cliente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(documento_cliente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(documento_cliente_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(documento_cliente_control) {
		
		if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",documento_cliente_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",documento_cliente_control.strVisibleFK_Idcliente);
		}

		if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor").attr("style",documento_cliente_control.strVisibleFK_Iddocumento_proveedor);
			jQuery("#tblstrVisible"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor").attr("style",documento_cliente_control.strVisibleFK_Iddocumento_proveedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondocumento_cliente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("documento_cliente",id,"cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);		
	}
	
	

	abrirBusquedaParadocumento_proveedor(strNombreCampoBusqueda){//idActual
		documento_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cliente","documento_proveedor","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		documento_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cliente","cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(documento_cliente_control) {
	
		jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id").val(documento_cliente_control.documento_clienteActual.id);
		jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-version_row").val(documento_cliente_control.documento_clienteActual.versionRow);
		
		if(documento_cliente_control.documento_clienteActual.id_documento_proveedor!=null && documento_cliente_control.documento_clienteActual.id_documento_proveedor>-1){
			if(jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val() != documento_cliente_control.documento_clienteActual.id_documento_proveedor) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val(documento_cliente_control.documento_clienteActual.id_documento_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").select2("val", null);
			if(jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cliente_control.documento_clienteActual.id_cliente!=null && documento_cliente_control.documento_clienteActual.id_cliente>-1){
			if(jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != documento_cliente_control.documento_clienteActual.id_cliente) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val(documento_cliente_control.documento_clienteActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-documento").val(documento_cliente_control.documento_clienteActual.documento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+documento_cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("documento_cliente","cuentascobrar","","form_documento_cliente",formulario,"","",paraEventoTabla,idFilaTabla,documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
	}
	
	cargarCombosFK(documento_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_proveedor",documento_cliente_control.strRecargarFkTipos,",")) { 
				documento_cliente_webcontrol1.cargarCombosdocumento_proveedorsFK(documento_cliente_control);
			}

			if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",documento_cliente_control.strRecargarFkTipos,",")) { 
				documento_cliente_webcontrol1.cargarCombosclientesFK(documento_cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(documento_cliente_control.strRecargarFkTiposNinguno!=null && documento_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && documento_cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(documento_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_proveedor",documento_cliente_control.strRecargarFkTiposNinguno,",")) { 
					documento_cliente_webcontrol1.cargarCombosdocumento_proveedorsFK(documento_cliente_control);
				}

				if(documento_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",documento_cliente_control.strRecargarFkTiposNinguno,",")) { 
					documento_cliente_webcontrol1.cargarCombosclientesFK(documento_cliente_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(documento_cliente_control) {
		jQuery("#spanstrMensajeid").text(documento_cliente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(documento_cliente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_documento_proveedor").text(documento_cliente_control.strMensajeid_documento_proveedor);		
		jQuery("#spanstrMensajeid_cliente").text(documento_cliente_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajedocumento").text(documento_cliente_control.strMensajedocumento);		
	}
	
	actualizarCssBotonesMantenimiento(documento_cliente_control) {
		jQuery("#tdbtnNuevodocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodocumento_cliente").css("display",documento_cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardocumento_cliente").css("display",documento_cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardocumento_cliente").css("display",documento_cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdocumento_cliente").css("display",documento_cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTabladocumento_proveedorFK(documento_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cliente_funcion1,documento_cliente_control.documento_proveedorsFK);
	}

	cargarComboEditarTablaclienteFK(documento_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cliente_funcion1,documento_cliente_control.clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(documento_cliente_control) {
		var i=0;
		
		i=documento_cliente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(documento_cliente_control.documento_clienteActual.id);
		jQuery("#t-version_row_"+i+"").val(documento_cliente_control.documento_clienteActual.versionRow);
		
		if(documento_cliente_control.documento_clienteActual.id_documento_proveedor!=null && documento_cliente_control.documento_clienteActual.id_documento_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != documento_cliente_control.documento_clienteActual.id_documento_proveedor) {
				jQuery("#t-cel_"+i+"_2").val(documento_cliente_control.documento_clienteActual.id_documento_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cliente_control.documento_clienteActual.id_cliente!=null && documento_cliente_control.documento_clienteActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != documento_cliente_control.documento_clienteActual.id_cliente) {
				jQuery("#t-cel_"+i+"_3").val(documento_cliente_control.documento_clienteActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(documento_cliente_control.documento_clienteActual.documento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(documento_cliente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(documento_cliente_control) {
		documento_cliente_funcion1.registrarControlesTableValidacionEdition(documento_cliente_control,documento_cliente_webcontrol1,documento_cliente_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_clienteConstante,strParametros);
		
		//documento_cliente_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosdocumento_proveedorsFK(documento_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor",documento_cliente_control.documento_proveedorsFK);

		if(documento_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cliente_control.idFilaTablaActual+"_2",documento_cliente_control.documento_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor-cmbid_documento_proveedor",documento_cliente_control.documento_proveedorsFK);

	};

	cargarCombosclientesFK(documento_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente",documento_cliente_control.clientesFK);

		if(documento_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cliente_control.idFilaTablaActual+"_3",documento_cliente_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",documento_cliente_control.clientesFK);

	};

	
	
	registrarComboActionChangeCombosdocumento_proveedorsFK(documento_cliente_control) {

	};

	registrarComboActionChangeCombosclientesFK(documento_cliente_control) {

	};

	
	
	setDefectoValorCombosdocumento_proveedorsFK(documento_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cliente_control.iddocumento_proveedorDefaultFK>-1 && jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val() != documento_cliente_control.iddocumento_proveedorDefaultFK) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val(documento_cliente_control.iddocumento_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor-cmbid_documento_proveedor").val(documento_cliente_control.iddocumento_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor-cmbid_documento_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor-cmbid_documento_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(documento_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cliente_control.idclienteDefaultFK>-1 && jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != documento_cliente_control.idclienteDefaultFK) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val(documento_cliente_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(documento_cliente_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//documento_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(documento_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_proveedor",documento_cliente_control.strRecargarFkTipos,",")) { 
				documento_cliente_webcontrol1.setDefectoValorCombosdocumento_proveedorsFK(documento_cliente_control);
			}

			if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",documento_cliente_control.strRecargarFkTipos,",")) { 
				documento_cliente_webcontrol1.setDefectoValorCombosclientesFK(documento_cliente_control);
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
	onLoadCombosEventosFK(documento_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_proveedor",documento_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cliente_webcontrol1.registrarComboActionChangeCombosdocumento_proveedorsFK(documento_cliente_control);
			//}

			//if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",documento_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cliente_webcontrol1.registrarComboActionChangeCombosclientesFK(documento_cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(documento_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("documento_cliente");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("documento_cliente");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(documento_cliente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);			
			
			if(documento_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,"documento_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_proveedor","id_documento_proveedor","cuentaspagar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor_img_busqueda").click(function(){
				documento_cliente_webcontrol1.abrirBusquedaParadocumento_proveedor("id_documento_proveedor");
				//alert(jQuery('#form-id_documento_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				documento_cliente_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cliente","FK_Idcliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cliente","FK_Iddocumento_proveedor","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			documento_cliente_funcion1.validarFormularioJQuery(documento_cliente_constante1);
			
			if(documento_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(documento_cliente_control) {
		
		jQuery("#divBusquedadocumento_clienteAjaxWebPart").css("display",documento_cliente_control.strPermisoBusqueda);
		jQuery("#trdocumento_clienteCabeceraBusquedas").css("display",documento_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_cliente").css("display",documento_cliente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedocumento_cliente").css("display",documento_cliente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdocumento_cliente").attr("style",documento_cliente_control.strPermisoMostrarTodos);
		
		if(documento_cliente_control.strPermisoNuevo!=null) {
			jQuery("#tddocumento_clienteNuevo").css("display",documento_cliente_control.strPermisoNuevo);
			jQuery("#tddocumento_clienteNuevoToolBar").css("display",documento_cliente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddocumento_clienteDuplicar").css("display",documento_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_clienteDuplicarToolBar").css("display",documento_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_clienteNuevoGuardarCambios").css("display",documento_cliente_control.strPermisoNuevo);
			jQuery("#tddocumento_clienteNuevoGuardarCambiosToolBar").css("display",documento_cliente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(documento_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tddocumento_clienteActualizarToolBar").css("display",documento_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_clienteCopiar").css("display",documento_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_clienteCopiarToolBar").css("display",documento_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_clienteConEditar").css("display",documento_cliente_control.strPermisoActualizar);
		}
		
		jQuery("#tddocumento_clienteEliminarToolBar").css("display",documento_cliente_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tddocumento_clienteGuardarCambios").css("display",documento_cliente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddocumento_clienteGuardarCambiosToolBar").css("display",documento_cliente_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trdocumento_clienteElementos").css("display",documento_cliente_control.strVisibleTablaElementos);
		
		jQuery("#trdocumento_clienteAcciones").css("display",documento_cliente_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_clienteParametrosAcciones").css("display",documento_cliente_control.strVisibleTablaAcciones);
			
		jQuery("#tddocumento_clienteCerrarPagina").css("display",documento_cliente_control.strPermisoPopup);		
		jQuery("#tddocumento_clienteCerrarPaginaToolBar").css("display",documento_cliente_control.strPermisoPopup);
		//jQuery("#trdocumento_clienteAccionesRelaciones").css("display",documento_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		documento_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		documento_cliente_webcontrol1.registrarEventosControles();
		
		if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
			documento_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(documento_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(documento_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(documento_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(documento_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				documento_cliente_webcontrol1.onLoad();
				
			} else {
				if(documento_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
					if(documento_cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
						//documento_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(documento_cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(documento_cliente_constante1.BIG_ID_ACTUAL,"documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
						//documento_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			documento_cliente_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var documento_cliente_webcontrol1=new documento_cliente_webcontrol();

if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = documento_cliente_webcontrol1.onLoadWindow; 
}

//</script>