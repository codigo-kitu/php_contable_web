//<script type="text/javascript" language="javascript">



//var factura_modeloJQueryPaginaWebInteraccion= function (factura_modelo_control) {
//this.,this.,this.

class factura_modelo_webcontrol extends factura_modelo_webcontrol_add {
	
	factura_modelo_control=null;
	factura_modelo_controlInicial=null;
	factura_modelo_controlAuxiliar=null;
		
	//if(factura_modelo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(factura_modelo_control) {
		super();
		
		this.factura_modelo_control=factura_modelo_control;
	}
		
	actualizarVariablesPagina(factura_modelo_control) {
		
		if(factura_modelo_control.action=="index" || factura_modelo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(factura_modelo_control);
			
		} else if(factura_modelo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(factura_modelo_control);
			
		} else if(factura_modelo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(factura_modelo_control);
			
		} else if(factura_modelo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_modelo_control);		
		
		} else if(factura_modelo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(factura_modelo_control);		
		
		} else if(factura_modelo_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_modelo_control);		
		
		} else if(factura_modelo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(factura_modelo_control);		
		}
		else if(factura_modelo_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_modelo_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(factura_modelo_control.action + " Revisar Manejo");
			
			if(factura_modelo_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(factura_modelo_control);
				
				return;
			}
			
			//if(factura_modelo_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(factura_modelo_control);
			//}
			
			if(factura_modelo_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(factura_modelo_control);
			}
			
			if(factura_modelo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_modelo_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(factura_modelo_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(factura_modelo_control, false);			
			}
			
			if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(factura_modelo_control);	
			}
			
			if(factura_modelo_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(factura_modelo_control);
			}
			
			if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(factura_modelo_control);
			}
			
			if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(factura_modelo_control);
			}
			
			if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(factura_modelo_control);	
			}
			
			if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
			}
			
			if(factura_modelo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(factura_modelo_control);
			}
			
			
			if(factura_modelo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(factura_modelo_control);			
			}
			
			if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(factura_modelo_control);
			}
			
			
			if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(factura_modelo_control);
			}
			
			if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(factura_modelo_control);
			}				
			
			if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_modelo_control);
			}
			
			if(factura_modelo_control.usuarioActual!=null && factura_modelo_control.usuarioActual.field_strUserName!=null &&
			factura_modelo_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(factura_modelo_control);			
			}
		}
		
		
		if(factura_modelo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(factura_modelo_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(factura_modelo_control) {
		
		this.actualizarPaginaCargaGeneral(factura_modelo_control);
		this.actualizarPaginaTablaDatos(factura_modelo_control);
		this.actualizarPaginaCargaGeneralControles(factura_modelo_control);
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_modelo_control);
		this.actualizarPaginaAreaBusquedas(factura_modelo_control);
		this.actualizarPaginaCargaCombosFK(factura_modelo_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_modelo_control) {
		
		this.actualizarPaginaCargaGeneral(factura_modelo_control);
		this.actualizarPaginaTablaDatos(factura_modelo_control);
		this.actualizarPaginaCargaGeneralControles(factura_modelo_control);
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_modelo_control);
		this.actualizarPaginaAreaBusquedas(factura_modelo_control);
		this.actualizarPaginaCargaCombosFK(factura_modelo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(factura_modelo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_modelo_control);		
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(factura_modelo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_modelo_control);		
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(factura_modelo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_modelo_control);		
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);		
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);		
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);		
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(factura_modelo_control) {
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(factura_modelo_control) {
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_modelo_control) {
		this.actualizarPaginaCargaGeneralControles(factura_modelo_control);
		this.actualizarPaginaCargaCombosFK(factura_modelo_control);
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_modelo_control) {
		this.actualizarPaginaAbrirLink(factura_modelo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);				
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);
		this.actualizarPaginaFormulario(factura_modelo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);
		this.actualizarPaginaFormulario(factura_modelo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(factura_modelo_control) {
		this.actualizarPaginaFormulario(factura_modelo_control);
		this.onLoadCombosDefectoFK(factura_modelo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);
		this.actualizarPaginaFormulario(factura_modelo_control);
		this.onLoadCombosDefectoFK(factura_modelo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_modelo_control) {
		this.actualizarPaginaCargaGeneralControles(factura_modelo_control);
		this.actualizarPaginaCargaCombosFK(factura_modelo_control);
		this.actualizarPaginaFormulario(factura_modelo_control);
		this.onLoadCombosDefectoFK(factura_modelo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_modelo_control) {
		this.actualizarPaginaAbrirLink(factura_modelo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(factura_modelo_control) {
		this.actualizarPaginaTablaDatos(factura_modelo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_modelo_control) {
		this.actualizarPaginaImprimir(factura_modelo_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_modelo_control) {
		this.actualizarPaginaImprimir(factura_modelo_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(factura_modelo_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_modelo_control) {
		//FORMULARIO
		if(factura_modelo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_modelo_control);
			this.actualizarPaginaFormularioAdd(factura_modelo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		//COMBOS FK
		if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_modelo_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(factura_modelo_control) {
		//FORMULARIO
		if(factura_modelo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_modelo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);	
		//COMBOS FK
		if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_modelo_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_modelo_control) {
		//FORMULARIO
		if(factura_modelo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_modelo_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(factura_modelo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);	
		//COMBOS FK
		if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_modelo_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control) {
		if(factura_modelo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_modelo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(factura_modelo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(factura_modelo_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(factura_modelo_control) {
		if(factura_modelo_funcion1.esPaginaForm()==true) {
			window.opener.factura_modelo_webcontrol1.actualizarPaginaTablaDatos(factura_modelo_control);
		} else {
			this.actualizarPaginaTablaDatos(factura_modelo_control);
		}
	}
	
	actualizarPaginaAbrirLink(factura_modelo_control) {
		factura_modelo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(factura_modelo_control.strAuxiliarUrlPagina);
				
		factura_modelo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(factura_modelo_control.strAuxiliarTipo,factura_modelo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(factura_modelo_control) {
		factura_modelo_funcion1.resaltarRestaurarDivMensaje(true,factura_modelo_control.strAuxiliarMensajeAlert,factura_modelo_control.strAuxiliarCssMensaje);
			
		if(factura_modelo_funcion1.esPaginaForm()==true) {
			window.opener.factura_modelo_funcion1.resaltarRestaurarDivMensaje(true,factura_modelo_control.strAuxiliarMensajeAlert,factura_modelo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(factura_modelo_control) {
		eval(factura_modelo_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(factura_modelo_control, mostrar) {
		
		if(mostrar==true) {
			factura_modelo_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				factura_modelo_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			factura_modelo_funcion1.mostrarDivMensaje(true,factura_modelo_control.strAuxiliarMensaje,factura_modelo_control.strAuxiliarCssMensaje);
		
		} else {
			factura_modelo_funcion1.mostrarDivMensaje(false,factura_modelo_control.strAuxiliarMensaje,factura_modelo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(factura_modelo_control) {
	
		funcionGeneral.printWebPartPage("factura_modelo",factura_modelo_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarfactura_modelosAjaxWebPart").html(factura_modelo_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("factura_modelo",jQuery("#divTablaDatosReporteAuxiliarfactura_modelosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(factura_modelo_control) {
		this.factura_modelo_controlInicial=factura_modelo_control;
			
		if(factura_modelo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(factura_modelo_control.strStyleDivArbol,factura_modelo_control.strStyleDivContent
																,factura_modelo_control.strStyleDivOpcionesBanner,factura_modelo_control.strStyleDivExpandirColapsar
																,factura_modelo_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=factura_modelo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",factura_modelo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(factura_modelo_control) {
		jQuery("#divTablaDatosfactura_modelosAjaxWebPart").html(factura_modelo_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosfactura_modelos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(factura_modelo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosfactura_modelos=jQuery("#tblTablaDatosfactura_modelos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("factura_modelo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',factura_modelo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			factura_modelo_webcontrol1.registrarControlesTableEdition(factura_modelo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		factura_modelo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(factura_modelo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(factura_modelo_control.factura_modeloActual!=null) {//form
			
			this.actualizarCamposFilaTabla(factura_modelo_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(factura_modelo_control) {
		this.actualizarCssBotonesPagina(factura_modelo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(factura_modelo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(factura_modelo_control.tiposReportes,factura_modelo_control.tiposReporte
															 	,factura_modelo_control.tiposPaginacion,factura_modelo_control.tiposAcciones
																,factura_modelo_control.tiposColumnasSelect,factura_modelo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(factura_modelo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(factura_modelo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(factura_modelo_control);			
	}
	
	actualizarPaginaAreaBusquedas(factura_modelo_control) {
		jQuery("#divBusquedafactura_modeloAjaxWebPart").css("display",factura_modelo_control.strPermisoBusqueda);
		jQuery("#trfactura_modeloCabeceraBusquedas").css("display",factura_modelo_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura_modelo").css("display",factura_modelo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(factura_modelo_control.htmlTablaOrderBy!=null
			&& factura_modelo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByfactura_modeloAjaxWebPart").html(factura_modelo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//factura_modelo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(factura_modelo_control.htmlTablaOrderByRel!=null
			&& factura_modelo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelfactura_modeloAjaxWebPart").html(factura_modelo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(factura_modelo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedafactura_modeloAjaxWebPart").css("display","none");
			jQuery("#trfactura_modeloCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedafactura_modelo").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(factura_modelo_control) {
		jQuery("#tdfactura_modeloNuevo").css("display",factura_modelo_control.strPermisoNuevo);
		jQuery("#trfactura_modeloElementos").css("display",factura_modelo_control.strVisibleTablaElementos);
		jQuery("#trfactura_modeloAcciones").css("display",factura_modelo_control.strVisibleTablaAcciones);
		jQuery("#trfactura_modeloParametrosAcciones").css("display",factura_modelo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(factura_modelo_control) {
	
		this.actualizarCssBotonesMantenimiento(factura_modelo_control);
				
		if(factura_modelo_control.factura_modeloActual!=null) {//form
			
			this.actualizarCamposFormulario(factura_modelo_control);			
		}
						
		this.actualizarSpanMensajesCampos(factura_modelo_control);
	}
	
	actualizarPaginaUsuarioInvitado(factura_modelo_control) {
	
		var indexPosition=factura_modelo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=factura_modelo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(factura_modelo_control) {
		jQuery("#divResumenfactura_modeloActualAjaxWebPart").html(factura_modelo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_modelo_control) {
		jQuery("#divAccionesRelacionesfactura_modeloAjaxWebPart").html(factura_modelo_control.htmlTablaAccionesRelaciones);
			
		factura_modelo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(factura_modelo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(factura_modelo_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(factura_modelo_control) {
		
		if(factura_modelo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_modelo_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",factura_modelo_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+factura_modelo_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",factura_modelo_control.strVisibleFK_Idcliente);
		}

		if(factura_modelo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_modelo_constante1.STR_SUFIJO+"FK_Idfactura_lote").attr("style",factura_modelo_control.strVisibleFK_Idfactura_lote);
			jQuery("#tblstrVisible"+factura_modelo_constante1.STR_SUFIJO+"FK_Idfactura_lote").attr("style",factura_modelo_control.strVisibleFK_Idfactura_lote);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionfactura_modelo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("factura_modelo",id,"facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);		
	}
	
	

	abrirBusquedaParafactura_lote(strNombreCampoBusqueda){//idActual
		factura_modelo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_modelo","factura_lote","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		factura_modelo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_modelo","cliente","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(factura_modelo_control) {
	
		jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id").val(factura_modelo_control.factura_modeloActual.id);
		jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-version_row").val(factura_modelo_control.factura_modeloActual.versionRow);
		
		if(factura_modelo_control.factura_modeloActual.id_factura_lote!=null && factura_modelo_control.factura_modeloActual.id_factura_lote>-1){
			if(jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").val() != factura_modelo_control.factura_modeloActual.id_factura_lote) {
				jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").val(factura_modelo_control.factura_modeloActual.id_factura_lote).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").select2("val", null);
			if(jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_modelo_control.factura_modeloActual.id_cliente!=null && factura_modelo_control.factura_modeloActual.id_cliente>-1){
			if(jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").val() != factura_modelo_control.factura_modeloActual.id_cliente) {
				jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").val(factura_modelo_control.factura_modeloActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-marcado").prop('checked',factura_modelo_control.factura_modeloActual.marcado);
		jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-ultimo").val(factura_modelo_control.factura_modeloActual.ultimo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+factura_modelo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("factura_modelo","facturacion","","form_factura_modelo",formulario,"","",paraEventoTabla,idFilaTabla,factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
	}
	
	cargarCombosFK(factura_modelo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(factura_modelo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura_lote",factura_modelo_control.strRecargarFkTipos,",")) { 
				factura_modelo_webcontrol1.cargarCombosfactura_lotesFK(factura_modelo_control);
			}

			if(factura_modelo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_modelo_control.strRecargarFkTipos,",")) { 
				factura_modelo_webcontrol1.cargarCombosclientesFK(factura_modelo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(factura_modelo_control.strRecargarFkTiposNinguno!=null && factura_modelo_control.strRecargarFkTiposNinguno!='NINGUNO' && factura_modelo_control.strRecargarFkTiposNinguno!='') {
			
				if(factura_modelo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_factura_lote",factura_modelo_control.strRecargarFkTiposNinguno,",")) { 
					factura_modelo_webcontrol1.cargarCombosfactura_lotesFK(factura_modelo_control);
				}

				if(factura_modelo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",factura_modelo_control.strRecargarFkTiposNinguno,",")) { 
					factura_modelo_webcontrol1.cargarCombosclientesFK(factura_modelo_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(factura_modelo_control) {
		jQuery("#spanstrMensajeid").text(factura_modelo_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(factura_modelo_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_factura_lote").text(factura_modelo_control.strMensajeid_factura_lote);		
		jQuery("#spanstrMensajeid_cliente").text(factura_modelo_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajemarcado").text(factura_modelo_control.strMensajemarcado);		
		jQuery("#spanstrMensajeultimo").text(factura_modelo_control.strMensajeultimo);		
	}
	
	actualizarCssBotonesMantenimiento(factura_modelo_control) {
		jQuery("#tdbtnNuevofactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevofactura_modelo").css("display",factura_modelo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarfactura_modelo").css("display",factura_modelo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarfactura_modelo").css("display",factura_modelo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosfactura_modelo").css("display",factura_modelo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablafactura_loteFK(factura_modelo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_modelo_funcion1,factura_modelo_control.factura_lotesFK);
	}

	cargarComboEditarTablaclienteFK(factura_modelo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_modelo_funcion1,factura_modelo_control.clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(factura_modelo_control) {
		var i=0;
		
		i=factura_modelo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(factura_modelo_control.factura_modeloActual.id);
		jQuery("#t-version_row_"+i+"").val(factura_modelo_control.factura_modeloActual.versionRow);
		
		if(factura_modelo_control.factura_modeloActual.id_factura_lote!=null && factura_modelo_control.factura_modeloActual.id_factura_lote>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != factura_modelo_control.factura_modeloActual.id_factura_lote) {
				jQuery("#t-cel_"+i+"_2").val(factura_modelo_control.factura_modeloActual.id_factura_lote).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_modelo_control.factura_modeloActual.id_cliente!=null && factura_modelo_control.factura_modeloActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != factura_modelo_control.factura_modeloActual.id_cliente) {
				jQuery("#t-cel_"+i+"_3").val(factura_modelo_control.factura_modeloActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").prop('checked',factura_modelo_control.factura_modeloActual.marcado);
		jQuery("#t-cel_"+i+"_5").val(factura_modelo_control.factura_modeloActual.ultimo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(factura_modelo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(factura_modelo_control) {
		factura_modelo_funcion1.registrarControlesTableValidacionEdition(factura_modelo_control,factura_modelo_webcontrol1,factura_modelo_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modeloConstante,strParametros);
		
		//factura_modelo_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosfactura_lotesFK(factura_modelo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote",factura_modelo_control.factura_lotesFK);

		if(factura_modelo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_modelo_control.idFilaTablaActual+"_2",factura_modelo_control.factura_lotesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote",factura_modelo_control.factura_lotesFK);

	};

	cargarCombosclientesFK(factura_modelo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente",factura_modelo_control.clientesFK);

		if(factura_modelo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_modelo_control.idFilaTablaActual+"_3",factura_modelo_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",factura_modelo_control.clientesFK);

	};

	
	
	registrarComboActionChangeCombosfactura_lotesFK(factura_modelo_control) {

	};

	registrarComboActionChangeCombosclientesFK(factura_modelo_control) {

	};

	
	
	setDefectoValorCombosfactura_lotesFK(factura_modelo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_modelo_control.idfactura_loteDefaultFK>-1 && jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").val() != factura_modelo_control.idfactura_loteDefaultFK) {
				jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").val(factura_modelo_control.idfactura_loteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote").val(factura_modelo_control.idfactura_loteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(factura_modelo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_modelo_control.idclienteDefaultFK>-1 && jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").val() != factura_modelo_control.idclienteDefaultFK) {
				jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").val(factura_modelo_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(factura_modelo_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//factura_modelo_control
		
	
	}
	
	onLoadCombosDefectoFK(factura_modelo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_modelo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(factura_modelo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura_lote",factura_modelo_control.strRecargarFkTipos,",")) { 
				factura_modelo_webcontrol1.setDefectoValorCombosfactura_lotesFK(factura_modelo_control);
			}

			if(factura_modelo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_modelo_control.strRecargarFkTipos,",")) { 
				factura_modelo_webcontrol1.setDefectoValorCombosclientesFK(factura_modelo_control);
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
	onLoadCombosEventosFK(factura_modelo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_modelo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(factura_modelo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura_lote",factura_modelo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_modelo_webcontrol1.registrarComboActionChangeCombosfactura_lotesFK(factura_modelo_control);
			//}

			//if(factura_modelo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_modelo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_modelo_webcontrol1.registrarComboActionChangeCombosclientesFK(factura_modelo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(factura_modelo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_modelo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(factura_modelo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("factura_modelo");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("factura_modelo");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(factura_modelo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);			
			
			if(factura_modelo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,"factura_modelo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("factura_lote","id_factura_lote","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote_img_busqueda").click(function(){
				factura_modelo_webcontrol1.abrirBusquedaParafactura_lote("id_factura_lote");
				//alert(jQuery('#form-id_factura_lote_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				factura_modelo_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_modelo","FK_Idcliente","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_modelo","FK_Idfactura_lote","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			factura_modelo_funcion1.validarFormularioJQuery(factura_modelo_constante1);
			
			if(factura_modelo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(factura_modelo_control) {
		
		jQuery("#divBusquedafactura_modeloAjaxWebPart").css("display",factura_modelo_control.strPermisoBusqueda);
		jQuery("#trfactura_modeloCabeceraBusquedas").css("display",factura_modelo_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura_modelo").css("display",factura_modelo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportefactura_modelo").css("display",factura_modelo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosfactura_modelo").attr("style",factura_modelo_control.strPermisoMostrarTodos);
		
		if(factura_modelo_control.strPermisoNuevo!=null) {
			jQuery("#tdfactura_modeloNuevo").css("display",factura_modelo_control.strPermisoNuevo);
			jQuery("#tdfactura_modeloNuevoToolBar").css("display",factura_modelo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdfactura_modeloDuplicar").css("display",factura_modelo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfactura_modeloDuplicarToolBar").css("display",factura_modelo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfactura_modeloNuevoGuardarCambios").css("display",factura_modelo_control.strPermisoNuevo);
			jQuery("#tdfactura_modeloNuevoGuardarCambiosToolBar").css("display",factura_modelo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(factura_modelo_control.strPermisoActualizar!=null) {
			jQuery("#tdfactura_modeloActualizarToolBar").css("display",factura_modelo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_modeloCopiar").css("display",factura_modelo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_modeloCopiarToolBar").css("display",factura_modelo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_modeloConEditar").css("display",factura_modelo_control.strPermisoActualizar);
		}
		
		jQuery("#tdfactura_modeloEliminarToolBar").css("display",factura_modelo_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdfactura_modeloGuardarCambios").css("display",factura_modelo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdfactura_modeloGuardarCambiosToolBar").css("display",factura_modelo_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trfactura_modeloElementos").css("display",factura_modelo_control.strVisibleTablaElementos);
		
		jQuery("#trfactura_modeloAcciones").css("display",factura_modelo_control.strVisibleTablaAcciones);
		jQuery("#trfactura_modeloParametrosAcciones").css("display",factura_modelo_control.strVisibleTablaAcciones);
			
		jQuery("#tdfactura_modeloCerrarPagina").css("display",factura_modelo_control.strPermisoPopup);		
		jQuery("#tdfactura_modeloCerrarPaginaToolBar").css("display",factura_modelo_control.strPermisoPopup);
		//jQuery("#trfactura_modeloAccionesRelaciones").css("display",factura_modelo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		factura_modelo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		factura_modelo_webcontrol1.registrarEventosControles();
		
		if(factura_modelo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(factura_modelo_constante1.STR_ES_RELACIONADO=="false") {
			factura_modelo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(factura_modelo_constante1.STR_ES_RELACIONES=="true") {
			if(factura_modelo_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_modelo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(factura_modelo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(factura_modelo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				factura_modelo_webcontrol1.onLoad();
				
			} else {
				if(factura_modelo_constante1.BIT_ES_PAGINA_FORM==true) {
					if(factura_modelo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
						//factura_modelo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(factura_modelo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(factura_modelo_constante1.BIG_ID_ACTUAL,"factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
						//factura_modelo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			factura_modelo_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var factura_modelo_webcontrol1=new factura_modelo_webcontrol();

if(factura_modelo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = factura_modelo_webcontrol1.onLoadWindow; 
}

//</script>