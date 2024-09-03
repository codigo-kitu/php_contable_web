//<script type="text/javascript" language="javascript">



//var imagen_facturaJQueryPaginaWebInteraccion= function (imagen_factura_control) {
//this.,this.,this.

class imagen_factura_webcontrol extends imagen_factura_webcontrol_add {
	
	imagen_factura_control=null;
	imagen_factura_controlInicial=null;
	imagen_factura_controlAuxiliar=null;
		
	//if(imagen_factura_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_factura_control) {
		super();
		
		this.imagen_factura_control=imagen_factura_control;
	}
		
	actualizarVariablesPagina(imagen_factura_control) {
		
		if(imagen_factura_control.action=="index" || imagen_factura_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_factura_control);
			
		} else if(imagen_factura_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_factura_control);
			
		} else if(imagen_factura_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_factura_control);
			
		} else if(imagen_factura_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_factura_control);		
		
		} else if(imagen_factura_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_factura_control);		
		
		} else if(imagen_factura_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_factura_control);		
		
		} else if(imagen_factura_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_factura_control);		
		}
		else if(imagen_factura_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_factura_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(imagen_factura_control.action + " Revisar Manejo");
			
			if(imagen_factura_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(imagen_factura_control);
				
				return;
			}
			
			//if(imagen_factura_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(imagen_factura_control);
			//}
			
			if(imagen_factura_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(imagen_factura_control);
			}
			
			if(imagen_factura_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_factura_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(imagen_factura_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(imagen_factura_control, false);			
			}
			
			if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(imagen_factura_control);	
			}
			
			if(imagen_factura_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(imagen_factura_control);
			}
			
			if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(imagen_factura_control);
			}
			
			if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(imagen_factura_control);
			}
			
			if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(imagen_factura_control);	
			}
			
			if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
			}
			
			if(imagen_factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(imagen_factura_control);
			}
			
			
			if(imagen_factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(imagen_factura_control);			
			}
			
			if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(imagen_factura_control);
			}
			
			
			if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(imagen_factura_control);
			}
			
			if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(imagen_factura_control);
			}				
			
			if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_factura_control);
			}
			
			if(imagen_factura_control.usuarioActual!=null && imagen_factura_control.usuarioActual.field_strUserName!=null &&
			imagen_factura_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(imagen_factura_control);			
			}
		}
		
		
		if(imagen_factura_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_factura_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(imagen_factura_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_factura_control);
		this.actualizarPaginaTablaDatos(imagen_factura_control);
		this.actualizarPaginaCargaGeneralControles(imagen_factura_control);
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_factura_control);
		this.actualizarPaginaAreaBusquedas(imagen_factura_control);
		this.actualizarPaginaCargaCombosFK(imagen_factura_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_factura_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_factura_control);
		this.actualizarPaginaTablaDatos(imagen_factura_control);
		this.actualizarPaginaCargaGeneralControles(imagen_factura_control);
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_factura_control);
		this.actualizarPaginaAreaBusquedas(imagen_factura_control);
		this.actualizarPaginaCargaCombosFK(imagen_factura_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(imagen_factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_factura_control);		
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_factura_control);		
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_factura_control);		
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_factura_control) {
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_factura_control) {
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_factura_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_factura_control);
		this.actualizarPaginaCargaCombosFK(imagen_factura_control);
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_factura_control) {
		this.actualizarPaginaAbrirLink(imagen_factura_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);				
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);
		this.actualizarPaginaFormulario(imagen_factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);
		this.actualizarPaginaFormulario(imagen_factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_factura_control) {
		this.actualizarPaginaFormulario(imagen_factura_control);
		this.onLoadCombosDefectoFK(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);
		this.actualizarPaginaFormulario(imagen_factura_control);
		this.onLoadCombosDefectoFK(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_factura_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_factura_control);
		this.actualizarPaginaCargaCombosFK(imagen_factura_control);
		this.actualizarPaginaFormulario(imagen_factura_control);
		this.onLoadCombosDefectoFK(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_factura_control) {
		this.actualizarPaginaAbrirLink(imagen_factura_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_factura_control) {
		this.actualizarPaginaImprimir(imagen_factura_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_factura_control) {
		this.actualizarPaginaImprimir(imagen_factura_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_factura_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_factura_control) {
		//FORMULARIO
		if(imagen_factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_factura_control);
			this.actualizarPaginaFormularioAdd(imagen_factura_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		//COMBOS FK
		if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_factura_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_factura_control) {
		//FORMULARIO
		if(imagen_factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_factura_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);	
		//COMBOS FK
		if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_factura_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_factura_control) {
		//FORMULARIO
		if(imagen_factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_factura_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_factura_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);	
		//COMBOS FK
		if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_factura_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control) {
		if(imagen_factura_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_factura_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_factura_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_factura_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_factura_control) {
		if(imagen_factura_funcion1.esPaginaForm()==true) {
			window.opener.imagen_factura_webcontrol1.actualizarPaginaTablaDatos(imagen_factura_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_factura_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_factura_control) {
		imagen_factura_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_factura_control.strAuxiliarUrlPagina);
				
		imagen_factura_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_factura_control.strAuxiliarTipo,imagen_factura_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_factura_control) {
		imagen_factura_funcion1.resaltarRestaurarDivMensaje(true,imagen_factura_control.strAuxiliarMensajeAlert,imagen_factura_control.strAuxiliarCssMensaje);
			
		if(imagen_factura_funcion1.esPaginaForm()==true) {
			window.opener.imagen_factura_funcion1.resaltarRestaurarDivMensaje(true,imagen_factura_control.strAuxiliarMensajeAlert,imagen_factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(imagen_factura_control) {
		eval(imagen_factura_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(imagen_factura_control, mostrar) {
		
		if(mostrar==true) {
			imagen_factura_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_factura_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			imagen_factura_funcion1.mostrarDivMensaje(true,imagen_factura_control.strAuxiliarMensaje,imagen_factura_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_factura_funcion1.mostrarDivMensaje(false,imagen_factura_control.strAuxiliarMensaje,imagen_factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(imagen_factura_control) {
	
		funcionGeneral.printWebPartPage("imagen_factura",imagen_factura_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarimagen_facturasAjaxWebPart").html(imagen_factura_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("imagen_factura",jQuery("#divTablaDatosReporteAuxiliarimagen_facturasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(imagen_factura_control) {
		this.imagen_factura_controlInicial=imagen_factura_control;
			
		if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_factura_control.strStyleDivArbol,imagen_factura_control.strStyleDivContent
																,imagen_factura_control.strStyleDivOpcionesBanner,imagen_factura_control.strStyleDivExpandirColapsar
																,imagen_factura_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_factura_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_factura_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(imagen_factura_control) {
		jQuery("#divTablaDatosimagen_facturasAjaxWebPart").html(imagen_factura_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_facturas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_facturas=jQuery("#tblTablaDatosimagen_facturas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_factura",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_factura_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_factura_webcontrol1.registrarControlesTableEdition(imagen_factura_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_factura_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(imagen_factura_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_factura_control.imagen_facturaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_factura_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(imagen_factura_control) {
		this.actualizarCssBotonesPagina(imagen_factura_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_factura_control.tiposReportes,imagen_factura_control.tiposReporte
															 	,imagen_factura_control.tiposPaginacion,imagen_factura_control.tiposAcciones
																,imagen_factura_control.tiposColumnasSelect,imagen_factura_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_factura_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_factura_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_factura_control);			
	}
	
	actualizarPaginaAreaBusquedas(imagen_factura_control) {
		jQuery("#divBusquedaimagen_facturaAjaxWebPart").css("display",imagen_factura_control.strPermisoBusqueda);
		jQuery("#trimagen_facturaCabeceraBusquedas").css("display",imagen_factura_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_factura").css("display",imagen_factura_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_factura_control.htmlTablaOrderBy!=null
			&& imagen_factura_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_facturaAjaxWebPart").html(imagen_factura_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_factura_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_factura_control.htmlTablaOrderByRel!=null
			&& imagen_factura_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_facturaAjaxWebPart").html(imagen_factura_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_factura_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_facturaAjaxWebPart").css("display","none");
			jQuery("#trimagen_facturaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_factura").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(imagen_factura_control) {
		jQuery("#tdimagen_facturaNuevo").css("display",imagen_factura_control.strPermisoNuevo);
		jQuery("#trimagen_facturaElementos").css("display",imagen_factura_control.strVisibleTablaElementos);
		jQuery("#trimagen_facturaAcciones").css("display",imagen_factura_control.strVisibleTablaAcciones);
		jQuery("#trimagen_facturaParametrosAcciones").css("display",imagen_factura_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_factura_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_factura_control);
				
		if(imagen_factura_control.imagen_facturaActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_factura_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_factura_control);
	}
	
	actualizarPaginaUsuarioInvitado(imagen_factura_control) {
	
		var indexPosition=imagen_factura_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_factura_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_factura_control) {
		jQuery("#divResumenimagen_facturaActualAjaxWebPart").html(imagen_factura_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_factura_control) {
		jQuery("#divAccionesRelacionesimagen_facturaAjaxWebPart").html(imagen_factura_control.htmlTablaAccionesRelaciones);
			
		imagen_factura_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_factura_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_factura_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_factura_control) {
		
		if(imagen_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura").attr("style",imagen_factura_control.strVisibleFK_Idfactura);
			jQuery("#tblstrVisible"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura").attr("style",imagen_factura_control.strVisibleFK_Idfactura);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_factura();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_factura",id,"facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);		
	}
	
	

	abrirBusquedaParafactura(strNombreCampoBusqueda){//idActual
		imagen_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_factura","factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_factura_control) {
	
		jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id").val(imagen_factura_control.imagen_facturaActual.id);
		jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-version_row").val(imagen_factura_control.imagen_facturaActual.versionRow);
		
		if(imagen_factura_control.imagen_facturaActual.id_factura!=null && imagen_factura_control.imagen_facturaActual.id_factura>-1){
			if(jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val() != imagen_factura_control.imagen_facturaActual.id_factura) {
				jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val(imagen_factura_control.imagen_facturaActual.id_factura).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").select2("val", null);
			if(jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_imagen").val(imagen_factura_control.imagen_facturaActual.id_imagen);
		jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-imagen").val(imagen_factura_control.imagen_facturaActual.imagen);
		jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-nro_factura").val(imagen_factura_control.imagen_facturaActual.nro_factura);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_factura_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_factura","facturacion","","form_imagen_factura",formulario,"","",paraEventoTabla,idFilaTabla,imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
	}
	
	cargarCombosFK(imagen_factura_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",imagen_factura_control.strRecargarFkTipos,",")) { 
				imagen_factura_webcontrol1.cargarCombosfacturasFK(imagen_factura_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_factura_control.strRecargarFkTiposNinguno!=null && imagen_factura_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_factura_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_factura",imagen_factura_control.strRecargarFkTiposNinguno,",")) { 
					imagen_factura_webcontrol1.cargarCombosfacturasFK(imagen_factura_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(imagen_factura_control) {
		jQuery("#spanstrMensajeid").text(imagen_factura_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_factura_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_factura").text(imagen_factura_control.strMensajeid_factura);		
		jQuery("#spanstrMensajeid_imagen").text(imagen_factura_control.strMensajeid_imagen);		
		jQuery("#spanstrMensajeimagen").text(imagen_factura_control.strMensajeimagen);		
		jQuery("#spanstrMensajenro_factura").text(imagen_factura_control.strMensajenro_factura);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_factura_control) {
		jQuery("#tdbtnNuevoimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_factura").css("display",imagen_factura_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_factura").css("display",imagen_factura_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_factura").css("display",imagen_factura_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_factura").css("display",imagen_factura_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablafacturaFK(imagen_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_factura_funcion1,imagen_factura_control.facturasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(imagen_factura_control) {
		var i=0;
		
		i=imagen_factura_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_factura_control.imagen_facturaActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_factura_control.imagen_facturaActual.versionRow);
		
		if(imagen_factura_control.imagen_facturaActual.id_factura!=null && imagen_factura_control.imagen_facturaActual.id_factura>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != imagen_factura_control.imagen_facturaActual.id_factura) {
				jQuery("#t-cel_"+i+"_2").val(imagen_factura_control.imagen_facturaActual.id_factura).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(imagen_factura_control.imagen_facturaActual.id_imagen);
		jQuery("#t-cel_"+i+"_4").val(imagen_factura_control.imagen_facturaActual.imagen);
		jQuery("#t-cel_"+i+"_5").val(imagen_factura_control.imagen_facturaActual.nro_factura);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_factura_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_factura_control) {
		imagen_factura_funcion1.registrarControlesTableValidacionEdition(imagen_factura_control,imagen_factura_webcontrol1,imagen_factura_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_facturaConstante,strParametros);
		
		//imagen_factura_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosfacturasFK(imagen_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura",imagen_factura_control.facturasFK);

		if(imagen_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_factura_control.idFilaTablaActual+"_2",imagen_factura_control.facturasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura",imagen_factura_control.facturasFK);

	};

	
	
	registrarComboActionChangeCombosfacturasFK(imagen_factura_control) {

	};

	
	
	setDefectoValorCombosfacturasFK(imagen_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_factura_control.idfacturaDefaultFK>-1 && jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val() != imagen_factura_control.idfacturaDefaultFK) {
				jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val(imagen_factura_control.idfacturaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(imagen_factura_control.idfacturaDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_factura_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",imagen_factura_control.strRecargarFkTipos,",")) { 
				imagen_factura_webcontrol1.setDefectoValorCombosfacturasFK(imagen_factura_control);
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
	onLoadCombosEventosFK(imagen_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",imagen_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_factura_webcontrol1.registrarComboActionChangeCombosfacturasFK(imagen_factura_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_factura_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_factura");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_factura");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_factura_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);			
			
			if(imagen_factura_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,"imagen_factura");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("factura","id_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura_img_busqueda").click(function(){
				imagen_factura_webcontrol1.abrirBusquedaParafactura("id_factura");
				//alert(jQuery('#form-id_factura_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_factura","FK_Idfactura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			imagen_factura_funcion1.validarFormularioJQuery(imagen_factura_constante1);
			
			if(imagen_factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_factura_control) {
		
		jQuery("#divBusquedaimagen_facturaAjaxWebPart").css("display",imagen_factura_control.strPermisoBusqueda);
		jQuery("#trimagen_facturaCabeceraBusquedas").css("display",imagen_factura_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_factura").css("display",imagen_factura_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_factura").css("display",imagen_factura_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_factura").attr("style",imagen_factura_control.strPermisoMostrarTodos);
		
		if(imagen_factura_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_facturaNuevo").css("display",imagen_factura_control.strPermisoNuevo);
			jQuery("#tdimagen_facturaNuevoToolBar").css("display",imagen_factura_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_facturaDuplicar").css("display",imagen_factura_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_facturaDuplicarToolBar").css("display",imagen_factura_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_facturaNuevoGuardarCambios").css("display",imagen_factura_control.strPermisoNuevo);
			jQuery("#tdimagen_facturaNuevoGuardarCambiosToolBar").css("display",imagen_factura_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_factura_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_facturaActualizarToolBar").css("display",imagen_factura_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_facturaCopiar").css("display",imagen_factura_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_facturaCopiarToolBar").css("display",imagen_factura_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_facturaConEditar").css("display",imagen_factura_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_facturaEliminarToolBar").css("display",imagen_factura_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdimagen_facturaGuardarCambios").css("display",imagen_factura_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_facturaGuardarCambiosToolBar").css("display",imagen_factura_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trimagen_facturaElementos").css("display",imagen_factura_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_facturaAcciones").css("display",imagen_factura_control.strVisibleTablaAcciones);
		jQuery("#trimagen_facturaParametrosAcciones").css("display",imagen_factura_control.strVisibleTablaAcciones);
			
		jQuery("#tdimagen_facturaCerrarPagina").css("display",imagen_factura_control.strPermisoPopup);		
		jQuery("#tdimagen_facturaCerrarPaginaToolBar").css("display",imagen_factura_control.strPermisoPopup);
		//jQuery("#trimagen_facturaAccionesRelaciones").css("display",imagen_factura_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_factura_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_factura_webcontrol1.registrarEventosControles();
		
		if(imagen_factura_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
			imagen_factura_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_factura_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_factura_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_factura_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_factura_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(imagen_factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_factura_webcontrol1.onLoad();
				
			} else {
				if(imagen_factura_constante1.BIT_ES_PAGINA_FORM==true) {
					if(imagen_factura_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
						//imagen_factura_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(imagen_factura_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_factura_constante1.BIG_ID_ACTUAL,"imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
						//imagen_factura_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			imagen_factura_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var imagen_factura_webcontrol1=new imagen_factura_webcontrol();

if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_factura_webcontrol1.onLoadWindow; 
}

//</script>