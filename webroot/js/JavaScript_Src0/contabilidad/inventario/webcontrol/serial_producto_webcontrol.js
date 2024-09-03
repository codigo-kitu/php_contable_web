//<script type="text/javascript" language="javascript">



//var serial_productoJQueryPaginaWebInteraccion= function (serial_producto_control) {
//this.,this.,this.

class serial_producto_webcontrol extends serial_producto_webcontrol_add {
	
	serial_producto_control=null;
	serial_producto_controlInicial=null;
	serial_producto_controlAuxiliar=null;
		
	//if(serial_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(serial_producto_control) {
		super();
		
		this.serial_producto_control=serial_producto_control;
	}
		
	actualizarVariablesPagina(serial_producto_control) {
		
		if(serial_producto_control.action=="index" || serial_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(serial_producto_control);
			
		} else if(serial_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(serial_producto_control);
		
		} else if(serial_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(serial_producto_control);
		
		} else if(serial_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(serial_producto_control);
		
		} else if(serial_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(serial_producto_control);
			
		} else if(serial_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(serial_producto_control);
			
		} else if(serial_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(serial_producto_control);
		
		} else if(serial_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(serial_producto_control);
		
		} else if(serial_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(serial_producto_control);
		
		} else if(serial_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(serial_producto_control);
		
		} else if(serial_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(serial_producto_control);
		
		} else if(serial_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(serial_producto_control);
		
		} else if(serial_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(serial_producto_control);
		
		} else if(serial_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(serial_producto_control);
		
		} else if(serial_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(serial_producto_control);
		
		} else if(serial_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(serial_producto_control);
		
		} else if(serial_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(serial_producto_control);
		
		} else if(serial_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(serial_producto_control);
		
		} else if(serial_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(serial_producto_control);
		
		} else if(serial_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(serial_producto_control);
		
		} else if(serial_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(serial_producto_control);
		
		} else if(serial_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(serial_producto_control);
		
		} else if(serial_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(serial_producto_control);
		
		} else if(serial_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(serial_producto_control);
		
		} else if(serial_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(serial_producto_control);
		
		} else if(serial_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(serial_producto_control);
		
		} else if(serial_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(serial_producto_control);
		
		} else if(serial_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(serial_producto_control);		
		
		} else if(serial_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(serial_producto_control);		
		
		} else if(serial_producto_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(serial_producto_control);		
		
		} else if(serial_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(serial_producto_control);		
		}
		else if(serial_producto_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(serial_producto_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(serial_producto_control.action + " Revisar Manejo");
			
			if(serial_producto_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(serial_producto_control);
				
				return;
			}
			
			//if(serial_producto_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(serial_producto_control);
			//}
			
			if(serial_producto_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(serial_producto_control);
			}
			
			if(serial_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && serial_producto_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(serial_producto_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(serial_producto_control, false);			
			}
			
			if(serial_producto_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(serial_producto_control);	
			}
			
			if(serial_producto_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(serial_producto_control);
			}
			
			if(serial_producto_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(serial_producto_control);
			}
			
			if(serial_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(serial_producto_control);
			}
			
			if(serial_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(serial_producto_control);	
			}
			
			if(serial_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(serial_producto_control);
			}
			
			if(serial_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(serial_producto_control);
			}
			
			
			if(serial_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(serial_producto_control);			
			}
			
			if(serial_producto_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(serial_producto_control);
			}
			
			
			if(serial_producto_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(serial_producto_control);
			}
			
			if(serial_producto_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(serial_producto_control);
			}				
			
			if(serial_producto_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(serial_producto_control);
			}
			
			if(serial_producto_control.usuarioActual!=null && serial_producto_control.usuarioActual.field_strUserName!=null &&
			serial_producto_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(serial_producto_control);			
			}
		}
		
		
		if(serial_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(serial_producto_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(serial_producto_control) {
		
		this.actualizarPaginaCargaGeneral(serial_producto_control);
		this.actualizarPaginaTablaDatos(serial_producto_control);
		this.actualizarPaginaCargaGeneralControles(serial_producto_control);
		this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(serial_producto_control);
		this.actualizarPaginaAreaBusquedas(serial_producto_control);
		this.actualizarPaginaCargaCombosFK(serial_producto_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(serial_producto_control) {
		
		this.actualizarPaginaCargaGeneral(serial_producto_control);
		this.actualizarPaginaTablaDatos(serial_producto_control);
		this.actualizarPaginaCargaGeneralControles(serial_producto_control);
		this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(serial_producto_control);
		this.actualizarPaginaAreaBusquedas(serial_producto_control);
		this.actualizarPaginaCargaCombosFK(serial_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(serial_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(serial_producto_control);		
		this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(serial_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(serial_producto_control);		
		this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(serial_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(serial_producto_control);		
		this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(serial_producto_control) {
		this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(serial_producto_control) {
		this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(serial_producto_control) {
		this.actualizarPaginaCargaGeneralControles(serial_producto_control);
		this.actualizarPaginaCargaCombosFK(serial_producto_control);
		this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(serial_producto_control) {
		this.actualizarPaginaAbrirLink(serial_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);				
		this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);
		this.actualizarPaginaFormulario(serial_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);
		this.actualizarPaginaFormulario(serial_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(serial_producto_control) {
		this.actualizarPaginaFormulario(serial_producto_control);
		this.onLoadCombosDefectoFK(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);
		this.actualizarPaginaFormulario(serial_producto_control);
		this.onLoadCombosDefectoFK(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(serial_producto_control) {
		this.actualizarPaginaCargaGeneralControles(serial_producto_control);
		this.actualizarPaginaCargaCombosFK(serial_producto_control);
		this.actualizarPaginaFormulario(serial_producto_control);
		this.onLoadCombosDefectoFK(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(serial_producto_control) {
		this.actualizarPaginaAbrirLink(serial_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(serial_producto_control) {
		this.actualizarPaginaImprimir(serial_producto_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(serial_producto_control) {
		this.actualizarPaginaImprimir(serial_producto_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(serial_producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(serial_producto_control) {
		//FORMULARIO
		if(serial_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(serial_producto_control);
			this.actualizarPaginaFormularioAdd(serial_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		//COMBOS FK
		if(serial_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(serial_producto_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(serial_producto_control) {
		//FORMULARIO
		if(serial_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(serial_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);	
		//COMBOS FK
		if(serial_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(serial_producto_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(serial_producto_control) {
		//FORMULARIO
		if(serial_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(serial_producto_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(serial_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);	
		//COMBOS FK
		if(serial_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(serial_producto_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(serial_producto_control) {
		if(serial_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && serial_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(serial_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(serial_producto_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(serial_producto_control) {
		if(serial_producto_funcion1.esPaginaForm()==true) {
			window.opener.serial_producto_webcontrol1.actualizarPaginaTablaDatos(serial_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(serial_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(serial_producto_control) {
		serial_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(serial_producto_control.strAuxiliarUrlPagina);
				
		serial_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(serial_producto_control.strAuxiliarTipo,serial_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(serial_producto_control) {
		serial_producto_funcion1.resaltarRestaurarDivMensaje(true,serial_producto_control.strAuxiliarMensajeAlert,serial_producto_control.strAuxiliarCssMensaje);
			
		if(serial_producto_funcion1.esPaginaForm()==true) {
			window.opener.serial_producto_funcion1.resaltarRestaurarDivMensaje(true,serial_producto_control.strAuxiliarMensajeAlert,serial_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(serial_producto_control) {
		eval(serial_producto_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(serial_producto_control, mostrar) {
		
		if(mostrar==true) {
			serial_producto_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				serial_producto_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			serial_producto_funcion1.mostrarDivMensaje(true,serial_producto_control.strAuxiliarMensaje,serial_producto_control.strAuxiliarCssMensaje);
		
		} else {
			serial_producto_funcion1.mostrarDivMensaje(false,serial_producto_control.strAuxiliarMensaje,serial_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(serial_producto_control) {
	
		funcionGeneral.printWebPartPage("serial_producto",serial_producto_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarserial_productosAjaxWebPart").html(serial_producto_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("serial_producto",jQuery("#divTablaDatosReporteAuxiliarserial_productosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(serial_producto_control) {
		this.serial_producto_controlInicial=serial_producto_control;
			
		if(serial_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(serial_producto_control.strStyleDivArbol,serial_producto_control.strStyleDivContent
																,serial_producto_control.strStyleDivOpcionesBanner,serial_producto_control.strStyleDivExpandirColapsar
																,serial_producto_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=serial_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",serial_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(serial_producto_control) {
		jQuery("#divTablaDatosserial_productosAjaxWebPart").html(serial_producto_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosserial_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(serial_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosserial_productos=jQuery("#tblTablaDatosserial_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("serial_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',serial_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			serial_producto_webcontrol1.registrarControlesTableEdition(serial_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		serial_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(serial_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(serial_producto_control.serial_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(serial_producto_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(serial_producto_control) {
		this.actualizarCssBotonesPagina(serial_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(serial_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(serial_producto_control.tiposReportes,serial_producto_control.tiposReporte
															 	,serial_producto_control.tiposPaginacion,serial_producto_control.tiposAcciones
																,serial_producto_control.tiposColumnasSelect,serial_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(serial_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(serial_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(serial_producto_control);			
	}
	
	actualizarPaginaAreaBusquedas(serial_producto_control) {
		jQuery("#divBusquedaserial_productoAjaxWebPart").css("display",serial_producto_control.strPermisoBusqueda);
		jQuery("#trserial_productoCabeceraBusquedas").css("display",serial_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaserial_producto").css("display",serial_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(serial_producto_control.htmlTablaOrderBy!=null
			&& serial_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByserial_productoAjaxWebPart").html(serial_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//serial_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(serial_producto_control.htmlTablaOrderByRel!=null
			&& serial_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelserial_productoAjaxWebPart").html(serial_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(serial_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaserial_productoAjaxWebPart").css("display","none");
			jQuery("#trserial_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaserial_producto").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(serial_producto_control) {
		jQuery("#tdserial_productoNuevo").css("display",serial_producto_control.strPermisoNuevo);
		jQuery("#trserial_productoElementos").css("display",serial_producto_control.strVisibleTablaElementos);
		jQuery("#trserial_productoAcciones").css("display",serial_producto_control.strVisibleTablaAcciones);
		jQuery("#trserial_productoParametrosAcciones").css("display",serial_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(serial_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(serial_producto_control);
				
		if(serial_producto_control.serial_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(serial_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(serial_producto_control);
	}
	
	actualizarPaginaUsuarioInvitado(serial_producto_control) {
	
		var indexPosition=serial_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=serial_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(serial_producto_control) {
		jQuery("#divResumenserial_productoActualAjaxWebPart").html(serial_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(serial_producto_control) {
		jQuery("#divAccionesRelacionesserial_productoAjaxWebPart").html(serial_producto_control.htmlTablaAccionesRelaciones);
			
		serial_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(serial_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(serial_producto_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(serial_producto_control) {
		
		if(serial_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+serial_producto_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",serial_producto_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+serial_producto_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",serial_producto_control.strVisibleFK_Idbodega);
		}

		if(serial_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+serial_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",serial_producto_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+serial_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",serial_producto_control.strVisibleFK_Idproducto);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionserial_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("serial_producto",id,"inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);		
	}
	
	

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		serial_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("serial_producto","producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		serial_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("serial_producto","bodega","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(serial_producto_control) {
	
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id").val(serial_producto_control.serial_productoActual.id);
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-version_row").val(serial_producto_control.serial_productoActual.versionRow);
		
		if(serial_producto_control.serial_productoActual.id_producto!=null && serial_producto_control.serial_productoActual.id_producto>-1){
			if(jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto").val() != serial_producto_control.serial_productoActual.id_producto) {
				jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto").val(serial_producto_control.serial_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-nro_serial").val(serial_producto_control.serial_productoActual.nro_serial);
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-ingresado").val(serial_producto_control.serial_productoActual.ingresado);
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-proveedor_mid").val(serial_producto_control.serial_productoActual.proveedor_mid);
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-modulo_ingreso").val(serial_producto_control.serial_productoActual.modulo_ingreso);
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-nro_documento_ingreso").val(serial_producto_control.serial_productoActual.nro_documento_ingreso);
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-salida").val(serial_producto_control.serial_productoActual.salida);
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-cliente_mid").val(serial_producto_control.serial_productoActual.cliente_mid);
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-modulo_salida").val(serial_producto_control.serial_productoActual.modulo_salida);
		
		if(serial_producto_control.serial_productoActual.id_bodega!=null && serial_producto_control.serial_productoActual.id_bodega>-1){
			if(jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega").val() != serial_producto_control.serial_productoActual.id_bodega) {
				jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega").val(serial_producto_control.serial_productoActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-nro_item").val(serial_producto_control.serial_productoActual.nro_item);
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-nro_documento_salida").val(serial_producto_control.serial_productoActual.nro_documento_salida);
		jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-nro_items").val(serial_producto_control.serial_productoActual.nro_items);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+serial_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("serial_producto","inventario","","form_serial_producto",formulario,"","",paraEventoTabla,idFilaTabla,serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
	}
	
	cargarCombosFK(serial_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(serial_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",serial_producto_control.strRecargarFkTipos,",")) { 
				serial_producto_webcontrol1.cargarCombosproductosFK(serial_producto_control);
			}

			if(serial_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",serial_producto_control.strRecargarFkTipos,",")) { 
				serial_producto_webcontrol1.cargarCombosbodegasFK(serial_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(serial_producto_control.strRecargarFkTiposNinguno!=null && serial_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && serial_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(serial_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",serial_producto_control.strRecargarFkTiposNinguno,",")) { 
					serial_producto_webcontrol1.cargarCombosproductosFK(serial_producto_control);
				}

				if(serial_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",serial_producto_control.strRecargarFkTiposNinguno,",")) { 
					serial_producto_webcontrol1.cargarCombosbodegasFK(serial_producto_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(serial_producto_control) {
		jQuery("#spanstrMensajeid").text(serial_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(serial_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_producto").text(serial_producto_control.strMensajeid_producto);		
		jQuery("#spanstrMensajenro_serial").text(serial_producto_control.strMensajenro_serial);		
		jQuery("#spanstrMensajeingresado").text(serial_producto_control.strMensajeingresado);		
		jQuery("#spanstrMensajeproveedor_mid").text(serial_producto_control.strMensajeproveedor_mid);		
		jQuery("#spanstrMensajemodulo_ingreso").text(serial_producto_control.strMensajemodulo_ingreso);		
		jQuery("#spanstrMensajenro_documento_ingreso").text(serial_producto_control.strMensajenro_documento_ingreso);		
		jQuery("#spanstrMensajesalida").text(serial_producto_control.strMensajesalida);		
		jQuery("#spanstrMensajecliente_mid").text(serial_producto_control.strMensajecliente_mid);		
		jQuery("#spanstrMensajemodulo_salida").text(serial_producto_control.strMensajemodulo_salida);		
		jQuery("#spanstrMensajeid_bodega").text(serial_producto_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajenro_item").text(serial_producto_control.strMensajenro_item);		
		jQuery("#spanstrMensajenro_documento_salida").text(serial_producto_control.strMensajenro_documento_salida);		
		jQuery("#spanstrMensajenro_items").text(serial_producto_control.strMensajenro_items);		
	}
	
	actualizarCssBotonesMantenimiento(serial_producto_control) {
		jQuery("#tdbtnNuevoserial_producto").css("visibility",serial_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoserial_producto").css("display",serial_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarserial_producto").css("visibility",serial_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarserial_producto").css("display",serial_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarserial_producto").css("visibility",serial_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarserial_producto").css("display",serial_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarserial_producto").css("visibility",serial_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosserial_producto").css("visibility",serial_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosserial_producto").css("display",serial_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarserial_producto").css("visibility",serial_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarserial_producto").css("visibility",serial_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarserial_producto").css("visibility",serial_producto_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaproductoFK(serial_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,serial_producto_funcion1,serial_producto_control.productosFK);
	}

	cargarComboEditarTablabodegaFK(serial_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,serial_producto_funcion1,serial_producto_control.bodegasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(serial_producto_control) {
		var i=0;
		
		i=serial_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(serial_producto_control.serial_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(serial_producto_control.serial_productoActual.versionRow);
		
		if(serial_producto_control.serial_productoActual.id_producto!=null && serial_producto_control.serial_productoActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != serial_producto_control.serial_productoActual.id_producto) {
				jQuery("#t-cel_"+i+"_2").val(serial_producto_control.serial_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(serial_producto_control.serial_productoActual.nro_serial);
		jQuery("#t-cel_"+i+"_4").val(serial_producto_control.serial_productoActual.ingresado);
		jQuery("#t-cel_"+i+"_5").val(serial_producto_control.serial_productoActual.proveedor_mid);
		jQuery("#t-cel_"+i+"_6").val(serial_producto_control.serial_productoActual.modulo_ingreso);
		jQuery("#t-cel_"+i+"_7").val(serial_producto_control.serial_productoActual.nro_documento_ingreso);
		jQuery("#t-cel_"+i+"_8").val(serial_producto_control.serial_productoActual.salida);
		jQuery("#t-cel_"+i+"_9").val(serial_producto_control.serial_productoActual.cliente_mid);
		jQuery("#t-cel_"+i+"_10").val(serial_producto_control.serial_productoActual.modulo_salida);
		
		if(serial_producto_control.serial_productoActual.id_bodega!=null && serial_producto_control.serial_productoActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_11").val() != serial_producto_control.serial_productoActual.id_bodega) {
				jQuery("#t-cel_"+i+"_11").val(serial_producto_control.serial_productoActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_11").select2("val", null);
			if(jQuery("#t-cel_"+i+"_11").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_11").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_12").val(serial_producto_control.serial_productoActual.nro_item);
		jQuery("#t-cel_"+i+"_13").val(serial_producto_control.serial_productoActual.nro_documento_salida);
		jQuery("#t-cel_"+i+"_14").val(serial_producto_control.serial_productoActual.nro_items);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(serial_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(serial_producto_control) {
		serial_producto_funcion1.registrarControlesTableValidacionEdition(serial_producto_control,serial_producto_webcontrol1,serial_producto_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_productoConstante,strParametros);
		
		//serial_producto_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosproductosFK(serial_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto",serial_producto_control.productosFK);

		if(serial_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+serial_producto_control.idFilaTablaActual+"_2",serial_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",serial_producto_control.productosFK);

	};

	cargarCombosbodegasFK(serial_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega",serial_producto_control.bodegasFK);

		if(serial_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+serial_producto_control.idFilaTablaActual+"_11",serial_producto_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",serial_producto_control.bodegasFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(serial_producto_control) {

	};

	registrarComboActionChangeCombosbodegasFK(serial_producto_control) {

	};

	
	
	setDefectoValorCombosproductosFK(serial_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(serial_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto").val() != serial_producto_control.idproductoDefaultFK) {
				jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto").val(serial_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(serial_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(serial_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(serial_producto_control.idbodegaDefaultFK>-1 && jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega").val() != serial_producto_control.idbodegaDefaultFK) {
				jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega").val(serial_producto_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(serial_producto_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//serial_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(serial_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(serial_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(serial_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",serial_producto_control.strRecargarFkTipos,",")) { 
				serial_producto_webcontrol1.setDefectoValorCombosproductosFK(serial_producto_control);
			}

			if(serial_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",serial_producto_control.strRecargarFkTipos,",")) { 
				serial_producto_webcontrol1.setDefectoValorCombosbodegasFK(serial_producto_control);
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
	onLoadCombosEventosFK(serial_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(serial_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(serial_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",serial_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				serial_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(serial_producto_control);
			//}

			//if(serial_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",serial_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				serial_producto_webcontrol1.registrarComboActionChangeCombosbodegasFK(serial_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(serial_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(serial_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(serial_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("serial_producto");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("serial_producto");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(serial_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);			
			
			if(serial_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,"serial_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				serial_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				serial_producto_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("serial_producto","FK_Idbodega","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("serial_producto","FK_Idproducto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			serial_producto_funcion1.validarFormularioJQuery(serial_producto_constante1);
			
			if(serial_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(serial_producto_control) {
		
		jQuery("#divBusquedaserial_productoAjaxWebPart").css("display",serial_producto_control.strPermisoBusqueda);
		jQuery("#trserial_productoCabeceraBusquedas").css("display",serial_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaserial_producto").css("display",serial_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteserial_producto").css("display",serial_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosserial_producto").attr("style",serial_producto_control.strPermisoMostrarTodos);
		
		if(serial_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdserial_productoNuevo").css("display",serial_producto_control.strPermisoNuevo);
			jQuery("#tdserial_productoNuevoToolBar").css("display",serial_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdserial_productoDuplicar").css("display",serial_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdserial_productoDuplicarToolBar").css("display",serial_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdserial_productoNuevoGuardarCambios").css("display",serial_producto_control.strPermisoNuevo);
			jQuery("#tdserial_productoNuevoGuardarCambiosToolBar").css("display",serial_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(serial_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdserial_productoActualizarToolBar").css("display",serial_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdserial_productoCopiar").css("display",serial_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdserial_productoCopiarToolBar").css("display",serial_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdserial_productoConEditar").css("display",serial_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdserial_productoEliminarToolBar").css("display",serial_producto_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdserial_productoGuardarCambios").css("display",serial_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdserial_productoGuardarCambiosToolBar").css("display",serial_producto_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trserial_productoElementos").css("display",serial_producto_control.strVisibleTablaElementos);
		
		jQuery("#trserial_productoAcciones").css("display",serial_producto_control.strVisibleTablaAcciones);
		jQuery("#trserial_productoParametrosAcciones").css("display",serial_producto_control.strVisibleTablaAcciones);
			
		jQuery("#tdserial_productoCerrarPagina").css("display",serial_producto_control.strPermisoPopup);		
		jQuery("#tdserial_productoCerrarPaginaToolBar").css("display",serial_producto_control.strPermisoPopup);
		//jQuery("#trserial_productoAccionesRelaciones").css("display",serial_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		serial_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		serial_producto_webcontrol1.registrarEventosControles();
		
		if(serial_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(serial_producto_constante1.STR_ES_RELACIONADO=="false") {
			serial_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(serial_producto_constante1.STR_ES_RELACIONES=="true") {
			if(serial_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				serial_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(serial_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(serial_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				serial_producto_webcontrol1.onLoad();
				
			} else {
				if(serial_producto_constante1.BIT_ES_PAGINA_FORM==true) {
					if(serial_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
						//serial_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(serial_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(serial_producto_constante1.BIG_ID_ACTUAL,"serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
						//serial_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			serial_producto_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var serial_producto_webcontrol1=new serial_producto_webcontrol();

if(serial_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = serial_producto_webcontrol1.onLoadWindow; 
}

//</script>