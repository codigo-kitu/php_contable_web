//<script type="text/javascript" language="javascript">



//var cotizacionJQueryPaginaWebInteraccion= function (cotizacion_control) {
//this.,this.,this.

class cotizacion_webcontrol extends cotizacion_webcontrol_add {
	
	cotizacion_control=null;
	cotizacion_controlInicial=null;
	cotizacion_controlAuxiliar=null;
		
	//if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cotizacion_control) {
		super();
		
		this.cotizacion_control=cotizacion_control;
	}
		
	actualizarVariablesPagina(cotizacion_control) {
		
		if(cotizacion_control.action=="index" || cotizacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cotizacion_control);
			
		} else if(cotizacion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cotizacion_control);
		
		} else if(cotizacion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cotizacion_control);
		
		} else if(cotizacion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cotizacion_control);
		
		} else if(cotizacion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cotizacion_control);
			
		} else if(cotizacion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cotizacion_control);
			
		} else if(cotizacion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cotizacion_control);
		
		} else if(cotizacion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cotizacion_control);
		
		} else if(cotizacion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cotizacion_control);
		
		} else if(cotizacion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cotizacion_control);
		
		} else if(cotizacion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cotizacion_control);
		
		} else if(cotizacion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cotizacion_control);
		
		} else if(cotizacion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cotizacion_control);
		
		} else if(cotizacion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cotizacion_control);
		
		} else if(cotizacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cotizacion_control);
		
		} else if(cotizacion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cotizacion_control);
		
		} else if(cotizacion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cotizacion_control);
		
		} else if(cotizacion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cotizacion_control);
		
		} else if(cotizacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cotizacion_control);
		
		} else if(cotizacion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cotizacion_control);
		
		} else if(cotizacion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cotizacion_control);
		
		} else if(cotizacion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cotizacion_control);
		
		} else if(cotizacion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cotizacion_control);
		
		} else if(cotizacion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cotizacion_control);
		
		} else if(cotizacion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cotizacion_control);
		
		} else if(cotizacion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cotizacion_control);
		
		} else if(cotizacion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cotizacion_control);
		
		} else if(cotizacion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cotizacion_control);		
		
		} else if(cotizacion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cotizacion_control);		
		
		} else if(cotizacion_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cotizacion_control);		
		
		} else if(cotizacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cotizacion_control);		
		}
		else if(cotizacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cotizacion_control);		
		}
		else if(cotizacion_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cotizacion_control);		
		}
		else if(cotizacion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cotizacion_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(cotizacion_control.action + " Revisar Manejo");
			
			if(cotizacion_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(cotizacion_control);
				
				return;
			}
			
			//if(cotizacion_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(cotizacion_control);
			//}
			
			if(cotizacion_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(cotizacion_control);
			}
			
			if(cotizacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cotizacion_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(cotizacion_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(cotizacion_control, false);			
			}
			
			if(cotizacion_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(cotizacion_control);	
			}
			
			if(cotizacion_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(cotizacion_control);
			}
			
			if(cotizacion_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(cotizacion_control);
			}
			
			if(cotizacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(cotizacion_control);
			}
			
			if(cotizacion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(cotizacion_control);	
			}
			
			if(cotizacion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(cotizacion_control);
			}
			
			if(cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(cotizacion_control);
			}
			
			
			if(cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(cotizacion_control);			
			}
			
			if(cotizacion_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(cotizacion_control);
			}
			
			
			if(cotizacion_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(cotizacion_control);
			}
			
			if(cotizacion_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(cotizacion_control);
			}				
			
			if(cotizacion_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cotizacion_control);
			}
			
			if(cotizacion_control.usuarioActual!=null && cotizacion_control.usuarioActual.field_strUserName!=null &&
			cotizacion_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(cotizacion_control);			
			}
		}
		
		
		if(cotizacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cotizacion_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(cotizacion_control) {
		
		this.actualizarPaginaCargaGeneral(cotizacion_control);
		this.actualizarPaginaTablaDatos(cotizacion_control);
		this.actualizarPaginaCargaGeneralControles(cotizacion_control);
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cotizacion_control);
		this.actualizarPaginaAreaBusquedas(cotizacion_control);
		this.actualizarPaginaCargaCombosFK(cotizacion_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cotizacion_control) {
		
		this.actualizarPaginaCargaGeneral(cotizacion_control);
		this.actualizarPaginaTablaDatos(cotizacion_control);
		this.actualizarPaginaCargaGeneralControles(cotizacion_control);
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cotizacion_control);
		this.actualizarPaginaAreaBusquedas(cotizacion_control);
		this.actualizarPaginaCargaCombosFK(cotizacion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(cotizacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cotizacion_control);		
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cotizacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cotizacion_control);		
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cotizacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cotizacion_control);		
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);		
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);		
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);		
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(cotizacion_control) {
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cotizacion_control) {
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cotizacion_control) {
		this.actualizarPaginaCargaGeneralControles(cotizacion_control);
		this.actualizarPaginaCargaCombosFK(cotizacion_control);
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cotizacion_control) {
		this.actualizarPaginaAbrirLink(cotizacion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);				
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);
		this.actualizarPaginaFormulario(cotizacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);
		this.actualizarPaginaFormulario(cotizacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cotizacion_control) {
		this.actualizarPaginaFormulario(cotizacion_control);
		this.onLoadCombosDefectoFK(cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);
		this.actualizarPaginaFormulario(cotizacion_control);
		this.onLoadCombosDefectoFK(cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cotizacion_control) {
		this.actualizarPaginaCargaGeneralControles(cotizacion_control);
		this.actualizarPaginaCargaCombosFK(cotizacion_control);
		this.actualizarPaginaFormulario(cotizacion_control);
		this.onLoadCombosDefectoFK(cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cotizacion_control) {
		this.actualizarPaginaAbrirLink(cotizacion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cotizacion_control) {
		this.actualizarPaginaImprimir(cotizacion_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cotizacion_control) {
		this.actualizarPaginaImprimir(cotizacion_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cotizacion_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cotizacion_control) {
		//FORMULARIO
		if(cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cotizacion_control);
			this.actualizarPaginaFormularioAdd(cotizacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		//COMBOS FK
		if(cotizacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cotizacion_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(cotizacion_control) {
		//FORMULARIO
		if(cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cotizacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);	
		//COMBOS FK
		if(cotizacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cotizacion_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(cotizacion_control) {
		this.actualizarPaginaTablaDatos(cotizacion_control);
		this.actualizarPaginaFormulario(cotizacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cotizacion_control) {
		//FORMULARIO
		if(cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cotizacion_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cotizacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);	
		//COMBOS FK
		if(cotizacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cotizacion_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cotizacion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cotizacion_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(cotizacion_control) {
		if(cotizacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cotizacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cotizacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cotizacion_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cotizacion_control) {
		if(cotizacion_funcion1.esPaginaForm()==true) {
			window.opener.cotizacion_webcontrol1.actualizarPaginaTablaDatos(cotizacion_control);
		} else {
			this.actualizarPaginaTablaDatos(cotizacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(cotizacion_control) {
		cotizacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cotizacion_control.strAuxiliarUrlPagina);
				
		cotizacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cotizacion_control.strAuxiliarTipo,cotizacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cotizacion_control) {
		cotizacion_funcion1.resaltarRestaurarDivMensaje(true,cotizacion_control.strAuxiliarMensajeAlert,cotizacion_control.strAuxiliarCssMensaje);
			
		if(cotizacion_funcion1.esPaginaForm()==true) {
			window.opener.cotizacion_funcion1.resaltarRestaurarDivMensaje(true,cotizacion_control.strAuxiliarMensajeAlert,cotizacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(cotizacion_control) {
		eval(cotizacion_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(cotizacion_control, mostrar) {
		
		if(mostrar==true) {
			cotizacion_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cotizacion_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			cotizacion_funcion1.mostrarDivMensaje(true,cotizacion_control.strAuxiliarMensaje,cotizacion_control.strAuxiliarCssMensaje);
		
		} else {
			cotizacion_funcion1.mostrarDivMensaje(false,cotizacion_control.strAuxiliarMensaje,cotizacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(cotizacion_control) {
	
		funcionGeneral.printWebPartPage("cotizacion",cotizacion_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcotizacionsAjaxWebPart").html(cotizacion_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("cotizacion",jQuery("#divTablaDatosReporteAuxiliarcotizacionsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(cotizacion_control) {
		this.cotizacion_controlInicial=cotizacion_control;
			
		if(cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cotizacion_control.strStyleDivArbol,cotizacion_control.strStyleDivContent
																,cotizacion_control.strStyleDivOpcionesBanner,cotizacion_control.strStyleDivExpandirColapsar
																,cotizacion_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=cotizacion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cotizacion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(cotizacion_control) {
		jQuery("#divTablaDatoscotizacionsAjaxWebPart").html(cotizacion_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscotizacions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cotizacion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscotizacions=jQuery("#tblTablaDatoscotizacions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cotizacion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cotizacion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cotizacion_webcontrol1.registrarControlesTableEdition(cotizacion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cotizacion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(cotizacion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cotizacion_control.cotizacionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cotizacion_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(cotizacion_control) {
		this.actualizarCssBotonesPagina(cotizacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cotizacion_control.tiposReportes,cotizacion_control.tiposReporte
															 	,cotizacion_control.tiposPaginacion,cotizacion_control.tiposAcciones
																,cotizacion_control.tiposColumnasSelect,cotizacion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cotizacion_control.tiposRelaciones,cotizacion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cotizacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cotizacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cotizacion_control);			
	}
	
	actualizarPaginaAreaBusquedas(cotizacion_control) {
		jQuery("#divBusquedacotizacionAjaxWebPart").css("display",cotizacion_control.strPermisoBusqueda);
		jQuery("#trcotizacionCabeceraBusquedas").css("display",cotizacion_control.strPermisoBusqueda);
		jQuery("#trBusquedacotizacion").css("display",cotizacion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cotizacion_control.htmlTablaOrderBy!=null
			&& cotizacion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycotizacionAjaxWebPart").html(cotizacion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cotizacion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cotizacion_control.htmlTablaOrderByRel!=null
			&& cotizacion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcotizacionAjaxWebPart").html(cotizacion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cotizacion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacotizacionAjaxWebPart").css("display","none");
			jQuery("#trcotizacionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacotizacion").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(cotizacion_control) {
		jQuery("#tdcotizacionNuevo").css("display",cotizacion_control.strPermisoNuevo);
		jQuery("#trcotizacionElementos").css("display",cotizacion_control.strVisibleTablaElementos);
		jQuery("#trcotizacionAcciones").css("display",cotizacion_control.strVisibleTablaAcciones);
		jQuery("#trcotizacionParametrosAcciones").css("display",cotizacion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cotizacion_control) {
	
		this.actualizarCssBotonesMantenimiento(cotizacion_control);
				
		if(cotizacion_control.cotizacionActual!=null) {//form
			
			this.actualizarCamposFormulario(cotizacion_control);			
		}
						
		this.actualizarSpanMensajesCampos(cotizacion_control);
	}
	
	actualizarPaginaUsuarioInvitado(cotizacion_control) {
	
		var indexPosition=cotizacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cotizacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(cotizacion_control) {
		jQuery("#divResumencotizacionActualAjaxWebPart").html(cotizacion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cotizacion_control) {
		jQuery("#divAccionesRelacionescotizacionAjaxWebPart").html(cotizacion_control.htmlTablaAccionesRelaciones);
			
		cotizacion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cotizacion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cotizacion_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cotizacion_control) {
		
		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cotizacion_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cotizacion_control.strVisibleFK_Idejercicio);
		}

		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cotizacion_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cotizacion_control.strVisibleFK_Idempresa);
		}

		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idestado").attr("style",cotizacion_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idestado").attr("style",cotizacion_control.strVisibleFK_Idestado);
		}

		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cotizacion_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cotizacion_control.strVisibleFK_Idperiodo);
		}

		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",cotizacion_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",cotizacion_control.strVisibleFK_Idproveedor);
		}

		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",cotizacion_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",cotizacion_control.strVisibleFK_Idsucursal);
		}

		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor").attr("style",cotizacion_control.strVisibleFK_Idtermino_pago_proveedor);
			jQuery("#tblstrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor").attr("style",cotizacion_control.strVisibleFK_Idtermino_pago_proveedor);
		}

		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cotizacion_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cotizacion_control.strVisibleFK_Idusuario);
		}

		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",cotizacion_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+cotizacion_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",cotizacion_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncotizacion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cotizacion",id,"inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cotizacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion","empresa","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		cotizacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion","sucursal","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		cotizacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion","ejercicio","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		cotizacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion","periodo","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		cotizacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion","usuario","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		cotizacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion","proveedor","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		cotizacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion","vendedor","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}

	abrirBusquedaParatermino_pago_proveedor(strNombreCampoBusqueda){//idActual
		cotizacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion","termino_pago_proveedor","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		cotizacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion","estado","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cotizacion_control) {
	
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id").val(cotizacion_control.cotizacionActual.id);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-version_row").val(cotizacion_control.cotizacionActual.versionRow);
		
		if(cotizacion_control.cotizacionActual.id_empresa!=null && cotizacion_control.cotizacionActual.id_empresa>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").val() != cotizacion_control.cotizacionActual.id_empresa) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").val(cotizacion_control.cotizacionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_sucursal!=null && cotizacion_control.cotizacionActual.id_sucursal>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").val() != cotizacion_control.cotizacionActual.id_sucursal) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").val(cotizacion_control.cotizacionActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_ejercicio!=null && cotizacion_control.cotizacionActual.id_ejercicio>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != cotizacion_control.cotizacionActual.id_ejercicio) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").val(cotizacion_control.cotizacionActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_periodo!=null && cotizacion_control.cotizacionActual.id_periodo>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").val() != cotizacion_control.cotizacionActual.id_periodo) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").val(cotizacion_control.cotizacionActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_usuario!=null && cotizacion_control.cotizacionActual.id_usuario>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").val() != cotizacion_control.cotizacionActual.id_usuario) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").val(cotizacion_control.cotizacionActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_proveedor!=null && cotizacion_control.cotizacionActual.id_proveedor>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").val() != cotizacion_control.cotizacionActual.id_proveedor) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").val(cotizacion_control.cotizacionActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-ruc").val(cotizacion_control.cotizacionActual.ruc);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-numero").val(cotizacion_control.cotizacionActual.numero);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-fecha_emision").val(cotizacion_control.cotizacionActual.fecha_emision);
		
		if(cotizacion_control.cotizacionActual.id_vendedor!=null && cotizacion_control.cotizacionActual.id_vendedor>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").val() != cotizacion_control.cotizacionActual.id_vendedor) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").val(cotizacion_control.cotizacionActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_termino_pago_proveedor!=null && cotizacion_control.cotizacionActual.id_termino_pago_proveedor>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != cotizacion_control.cotizacionActual.id_termino_pago_proveedor) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(cotizacion_control.cotizacionActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-fecha_vence").val(cotizacion_control.cotizacionActual.fecha_vence);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-tipo_cambio").val(cotizacion_control.cotizacionActual.tipo_cambio);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-moneda").val(cotizacion_control.cotizacionActual.moneda);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-direccion").val(cotizacion_control.cotizacionActual.direccion);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-enviar_a").val(cotizacion_control.cotizacionActual.enviar_a);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-observacion").val(cotizacion_control.cotizacionActual.observacion);
		
		if(cotizacion_control.cotizacionActual.id_estado!=null && cotizacion_control.cotizacionActual.id_estado>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").val() != cotizacion_control.cotizacionActual.id_estado) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").val(cotizacion_control.cotizacionActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-sub_total").val(cotizacion_control.cotizacionActual.sub_total);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-descuento_monto").val(cotizacion_control.cotizacionActual.descuento_monto);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-descuento_porciento").val(cotizacion_control.cotizacionActual.descuento_porciento);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-iva_monto").val(cotizacion_control.cotizacionActual.iva_monto);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-iva_porciento").val(cotizacion_control.cotizacionActual.iva_porciento);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-total").val(cotizacion_control.cotizacionActual.total);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-otro_monto").val(cotizacion_control.cotizacionActual.otro_monto);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-otro_porciento").val(cotizacion_control.cotizacionActual.otro_porciento);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-nota").val(cotizacion_control.cotizacionActual.nota);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-hora").val(cotizacion_control.cotizacionActual.hora);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-tipo_envio").val(cotizacion_control.cotizacionActual.tipo_envio);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-computador").val(cotizacion_control.cotizacionActual.computador);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-descuento_parcial_monto").val(cotizacion_control.cotizacionActual.descuento_parcial_monto);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-impuesto2_porciento").val(cotizacion_control.cotizacionActual.impuesto2_porciento);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-impuesto2_monto").val(cotizacion_control.cotizacionActual.impuesto2_monto);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-nro_compra").val(cotizacion_control.cotizacionActual.nro_compra);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-enviar").val(cotizacion_control.cotizacionActual.enviar);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-vendedor_codigo").val(cotizacion_control.cotizacionActual.vendedor_codigo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cotizacion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cotizacion","inventario","","form_cotizacion",formulario,"","",paraEventoTabla,idFilaTabla,cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}
	
	cargarCombosFK(cotizacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosempresasFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombossucursalsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosejerciciosFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosperiodosFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosusuariosFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosproveedorsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosvendedorsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombostermino_pago_proveedorsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosestadosFK(cotizacion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cotizacion_control.strRecargarFkTiposNinguno!=null && cotizacion_control.strRecargarFkTiposNinguno!='NINGUNO' && cotizacion_control.strRecargarFkTiposNinguno!='') {
			
				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosempresasFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombossucursalsFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosejerciciosFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosperiodosFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosusuariosFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosproveedorsFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosvendedorsFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombostermino_pago_proveedorsFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosestadosFK(cotizacion_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(cotizacion_control) {
		jQuery("#spanstrMensajeid").text(cotizacion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cotizacion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cotizacion_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(cotizacion_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(cotizacion_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cotizacion_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(cotizacion_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_proveedor").text(cotizacion_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajeruc").text(cotizacion_control.strMensajeruc);		
		jQuery("#spanstrMensajenumero").text(cotizacion_control.strMensajenumero);		
		jQuery("#spanstrMensajefecha_emision").text(cotizacion_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajeid_vendedor").text(cotizacion_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajeid_termino_pago_proveedor").text(cotizacion_control.strMensajeid_termino_pago_proveedor);		
		jQuery("#spanstrMensajefecha_vence").text(cotizacion_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajetipo_cambio").text(cotizacion_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajemoneda").text(cotizacion_control.strMensajemoneda);		
		jQuery("#spanstrMensajedireccion").text(cotizacion_control.strMensajedireccion);		
		jQuery("#spanstrMensajeenviar_a").text(cotizacion_control.strMensajeenviar_a);		
		jQuery("#spanstrMensajeobservacion").text(cotizacion_control.strMensajeobservacion);		
		jQuery("#spanstrMensajeid_estado").text(cotizacion_control.strMensajeid_estado);		
		jQuery("#spanstrMensajesub_total").text(cotizacion_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_monto").text(cotizacion_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajedescuento_porciento").text(cotizacion_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(cotizacion_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(cotizacion_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajetotal").text(cotizacion_control.strMensajetotal);		
		jQuery("#spanstrMensajeotro_monto").text(cotizacion_control.strMensajeotro_monto);		
		jQuery("#spanstrMensajeotro_porciento").text(cotizacion_control.strMensajeotro_porciento);		
		jQuery("#spanstrMensajenota").text(cotizacion_control.strMensajenota);		
		jQuery("#spanstrMensajehora").text(cotizacion_control.strMensajehora);		
		jQuery("#spanstrMensajetipo_envio").text(cotizacion_control.strMensajetipo_envio);		
		jQuery("#spanstrMensajecomputador").text(cotizacion_control.strMensajecomputador);		
		jQuery("#spanstrMensajedescuento_parcial_monto").text(cotizacion_control.strMensajedescuento_parcial_monto);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(cotizacion_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(cotizacion_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajenro_compra").text(cotizacion_control.strMensajenro_compra);		
		jQuery("#spanstrMensajeenviar").text(cotizacion_control.strMensajeenviar);		
		jQuery("#spanstrMensajevendedor_codigo").text(cotizacion_control.strMensajevendedor_codigo);		
	}
	
	actualizarCssBotonesMantenimiento(cotizacion_control) {
		jQuery("#tdbtnNuevocotizacion").css("visibility",cotizacion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocotizacion").css("display",cotizacion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcotizacion").css("visibility",cotizacion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcotizacion").css("display",cotizacion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcotizacion").css("visibility",cotizacion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcotizacion").css("display",cotizacion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcotizacion").css("visibility",cotizacion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscotizacion").css("visibility",cotizacion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscotizacion").css("display",cotizacion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcotizacion").css("visibility",cotizacion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcotizacion").css("visibility",cotizacion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcotizacion").css("visibility",cotizacion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncotizacion_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcotizacion");

			cotizacion_webcontrol1.registrarSesionParacotizacion_detalles(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_proveedor") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.cotizacionActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.cotizacionActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.cotizacionActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.usuariosFK);
	}

	cargarComboEditarTablaproveedorFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.proveedorsFK);
	}

	cargarComboEditarTablavendedorFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_proveedorFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.termino_pago_proveedorsFK);
	}

	cargarComboEditarTablaestadoFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(cotizacion_control) {
		var i=0;
		
		i=cotizacion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cotizacion_control.cotizacionActual.id);
		jQuery("#t-version_row_"+i+"").val(cotizacion_control.cotizacionActual.versionRow);
		
		if(cotizacion_control.cotizacionActual.id_empresa!=null && cotizacion_control.cotizacionActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cotizacion_control.cotizacionActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cotizacion_control.cotizacionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_sucursal!=null && cotizacion_control.cotizacionActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cotizacion_control.cotizacionActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(cotizacion_control.cotizacionActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_ejercicio!=null && cotizacion_control.cotizacionActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cotizacion_control.cotizacionActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(cotizacion_control.cotizacionActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_periodo!=null && cotizacion_control.cotizacionActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cotizacion_control.cotizacionActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(cotizacion_control.cotizacionActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_usuario!=null && cotizacion_control.cotizacionActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != cotizacion_control.cotizacionActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(cotizacion_control.cotizacionActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_proveedor!=null && cotizacion_control.cotizacionActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != cotizacion_control.cotizacionActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_7").val(cotizacion_control.cotizacionActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(cotizacion_control.cotizacionActual.ruc);
		jQuery("#t-cel_"+i+"_9").val(cotizacion_control.cotizacionActual.numero);
		jQuery("#t-cel_"+i+"_10").val(cotizacion_control.cotizacionActual.fecha_emision);
		
		if(cotizacion_control.cotizacionActual.id_vendedor!=null && cotizacion_control.cotizacionActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_11").val() != cotizacion_control.cotizacionActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_11").val(cotizacion_control.cotizacionActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_11").select2("val", null);
			if(jQuery("#t-cel_"+i+"_11").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_11").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_termino_pago_proveedor!=null && cotizacion_control.cotizacionActual.id_termino_pago_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != cotizacion_control.cotizacionActual.id_termino_pago_proveedor) {
				jQuery("#t-cel_"+i+"_12").val(cotizacion_control.cotizacionActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_13").val(cotizacion_control.cotizacionActual.fecha_vence);
		jQuery("#t-cel_"+i+"_14").val(cotizacion_control.cotizacionActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_15").val(cotizacion_control.cotizacionActual.moneda);
		jQuery("#t-cel_"+i+"_16").val(cotizacion_control.cotizacionActual.direccion);
		jQuery("#t-cel_"+i+"_17").val(cotizacion_control.cotizacionActual.enviar_a);
		jQuery("#t-cel_"+i+"_18").val(cotizacion_control.cotizacionActual.observacion);
		
		if(cotizacion_control.cotizacionActual.id_estado!=null && cotizacion_control.cotizacionActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_19").val() != cotizacion_control.cotizacionActual.id_estado) {
				jQuery("#t-cel_"+i+"_19").val(cotizacion_control.cotizacionActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_19").select2("val", null);
			if(jQuery("#t-cel_"+i+"_19").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_19").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_20").val(cotizacion_control.cotizacionActual.sub_total);
		jQuery("#t-cel_"+i+"_21").val(cotizacion_control.cotizacionActual.descuento_monto);
		jQuery("#t-cel_"+i+"_22").val(cotizacion_control.cotizacionActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_23").val(cotizacion_control.cotizacionActual.iva_monto);
		jQuery("#t-cel_"+i+"_24").val(cotizacion_control.cotizacionActual.iva_porciento);
		jQuery("#t-cel_"+i+"_25").val(cotizacion_control.cotizacionActual.total);
		jQuery("#t-cel_"+i+"_26").val(cotizacion_control.cotizacionActual.otro_monto);
		jQuery("#t-cel_"+i+"_27").val(cotizacion_control.cotizacionActual.otro_porciento);
		jQuery("#t-cel_"+i+"_28").val(cotizacion_control.cotizacionActual.nota);
		jQuery("#t-cel_"+i+"_29").val(cotizacion_control.cotizacionActual.hora);
		jQuery("#t-cel_"+i+"_30").val(cotizacion_control.cotizacionActual.tipo_envio);
		jQuery("#t-cel_"+i+"_31").val(cotizacion_control.cotizacionActual.computador);
		jQuery("#t-cel_"+i+"_32").val(cotizacion_control.cotizacionActual.descuento_parcial_monto);
		jQuery("#t-cel_"+i+"_33").val(cotizacion_control.cotizacionActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_34").val(cotizacion_control.cotizacionActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_35").val(cotizacion_control.cotizacionActual.nro_compra);
		jQuery("#t-cel_"+i+"_36").val(cotizacion_control.cotizacionActual.enviar);
		jQuery("#t-cel_"+i+"_37").val(cotizacion_control.cotizacionActual.vendedor_codigo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cotizacion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncotizacion_detalle").click(function(){
		jQuery("#tblTablaDatoscotizacions").on("click",".imgrelacioncotizacion_detalle", function () {

			var idActual=jQuery(this).attr("idactualcotizacion");

			cotizacion_webcontrol1.registrarSesionParacotizacion_detalles(idActual);
		});				
	}
		
	

	registrarSesionParacotizacion_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cotizacion","cotizacion_detalle","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(cotizacion_control) {
		cotizacion_funcion1.registrarControlesTableValidacionEdition(cotizacion_control,cotizacion_webcontrol1,cotizacion_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacionConstante,strParametros);
		
		//cotizacion_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa",cotizacion_control.empresasFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_2",cotizacion_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal",cotizacion_control.sucursalsFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_3",cotizacion_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio",cotizacion_control.ejerciciosFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_4",cotizacion_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo",cotizacion_control.periodosFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_5",cotizacion_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario",cotizacion_control.usuariosFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_6",cotizacion_control.usuariosFK);
		}
	};

	cargarCombosproveedorsFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor",cotizacion_control.proveedorsFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_7",cotizacion_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",cotizacion_control.proveedorsFK);

	};

	cargarCombosvendedorsFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor",cotizacion_control.vendedorsFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_11",cotizacion_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",cotizacion_control.vendedorsFK);

	};

	cargarCombostermino_pago_proveedorsFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor",cotizacion_control.termino_pago_proveedorsFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_12",cotizacion_control.termino_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor",cotizacion_control.termino_pago_proveedorsFK);

	};

	cargarCombosestadosFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado",cotizacion_control.estadosFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_19",cotizacion_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",cotizacion_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cotizacion_control) {

	};

	registrarComboActionChangeCombossucursalsFK(cotizacion_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cotizacion_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cotizacion_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cotizacion_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(cotizacion_control) {
		this.registrarComboActionChangeid_proveedor("form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor",false,0);


		this.registrarComboActionChangeid_proveedor(""+cotizacion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(cotizacion_control) {

	};

	registrarComboActionChangeCombostermino_pago_proveedorsFK(cotizacion_control) {

	};

	registrarComboActionChangeCombosestadosFK(cotizacion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idempresaDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").val() != cotizacion_control.idempresaDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").val(cotizacion_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idsucursalDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").val() != cotizacion_control.idsucursalDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").val(cotizacion_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idejercicioDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != cotizacion_control.idejercicioDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").val(cotizacion_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idperiodoDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").val() != cotizacion_control.idperiodoDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").val(cotizacion_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idusuarioDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").val() != cotizacion_control.idusuarioDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").val(cotizacion_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idproveedorDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").val() != cotizacion_control.idproveedorDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").val(cotizacion_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(cotizacion_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idvendedorDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").val() != cotizacion_control.idvendedorDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").val(cotizacion_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(cotizacion_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_proveedorsFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idtermino_pago_proveedorDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != cotizacion_control.idtermino_pago_proveedorDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(cotizacion_control.idtermino_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(cotizacion_control.idtermino_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idestadoDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").val() != cotizacion_control.idestadoDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").val(cotizacion_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(cotizacion_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_proveedor(id_proveedor,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("cotizacion","inventario","","id_proveedor",id_proveedor,"NINGUNO","",paraEventoTabla,idFilaTabla,cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	









	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
			
							cotizacion_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
			
		cotizacion_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cotizacion_control
		
	

		var descuento_porciento="form"+cotizacion_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("cotizacion","inventario","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}
	
	onLoadCombosDefectoFK(cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosempresasFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombossucursalsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosejerciciosFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosperiodosFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosusuariosFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosproveedorsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosvendedorsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombostermino_pago_proveedorsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosestadosFK(cotizacion_control);
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
	onLoadCombosEventosFK(cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosempresasFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombossucursalsFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosperiodosFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosusuariosFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosproveedorsFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosvendedorsFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombostermino_pago_proveedorsFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosestadosFK(cotizacion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cotizacion");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cotizacion");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cotizacion_funcion1,cotizacion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cotizacion_funcion1,cotizacion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cotizacion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);			
			
			if(cotizacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,"cotizacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_proveedor","id_termino_pago_proveedor","cuentaspagar","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParatermino_pago_proveedor("id_termino_pago_proveedor");
				//alert(jQuery('#form-id_termino_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion","FK_Idejercicio","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion","FK_Idempresa","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion","FK_Idestado","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion","FK_Idperiodo","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion","FK_Idproveedor","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion","FK_Idsucursal","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion","FK_Idtermino_pago_proveedor","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion","FK_Idusuario","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion","FK_Idvendedor","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cotizacion");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			cotizacion_funcion1.validarFormularioJQuery(cotizacion_constante1);
			
			if(cotizacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cotizacion_control) {
		
		jQuery("#divBusquedacotizacionAjaxWebPart").css("display",cotizacion_control.strPermisoBusqueda);
		jQuery("#trcotizacionCabeceraBusquedas").css("display",cotizacion_control.strPermisoBusqueda);
		jQuery("#trBusquedacotizacion").css("display",cotizacion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecotizacion").css("display",cotizacion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscotizacion").attr("style",cotizacion_control.strPermisoMostrarTodos);
		
		if(cotizacion_control.strPermisoNuevo!=null) {
			jQuery("#tdcotizacionNuevo").css("display",cotizacion_control.strPermisoNuevo);
			jQuery("#tdcotizacionNuevoToolBar").css("display",cotizacion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcotizacionDuplicar").css("display",cotizacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcotizacionDuplicarToolBar").css("display",cotizacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcotizacionNuevoGuardarCambios").css("display",cotizacion_control.strPermisoNuevo);
			jQuery("#tdcotizacionNuevoGuardarCambiosToolBar").css("display",cotizacion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cotizacion_control.strPermisoActualizar!=null) {
			jQuery("#tdcotizacionActualizarToolBar").css("display",cotizacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcotizacionCopiar").css("display",cotizacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcotizacionCopiarToolBar").css("display",cotizacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcotizacionConEditar").css("display",cotizacion_control.strPermisoActualizar);
		}
		
		jQuery("#tdcotizacionEliminarToolBar").css("display",cotizacion_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcotizacionGuardarCambios").css("display",cotizacion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcotizacionGuardarCambiosToolBar").css("display",cotizacion_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcotizacionElementos").css("display",cotizacion_control.strVisibleTablaElementos);
		
		jQuery("#trcotizacionAcciones").css("display",cotizacion_control.strVisibleTablaAcciones);
		jQuery("#trcotizacionParametrosAcciones").css("display",cotizacion_control.strVisibleTablaAcciones);
			
		jQuery("#tdcotizacionCerrarPagina").css("display",cotizacion_control.strPermisoPopup);		
		jQuery("#tdcotizacionCerrarPaginaToolBar").css("display",cotizacion_control.strPermisoPopup);
		//jQuery("#trcotizacionAccionesRelaciones").css("display",cotizacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cotizacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cotizacion_webcontrol1.registrarEventosControles();
		
		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			cotizacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cotizacion_constante1.STR_ES_RELACIONES=="true") {
			if(cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
				cotizacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cotizacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(cotizacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cotizacion_webcontrol1.onLoad();
				
			} else {
				if(cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
					if(cotizacion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
						//cotizacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(cotizacion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cotizacion_constante1.BIG_ID_ACTUAL,"cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
						//cotizacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			cotizacion_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var cotizacion_webcontrol1=new cotizacion_webcontrol();

if(cotizacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cotizacion_webcontrol1.onLoadWindow; 
}

//</script>