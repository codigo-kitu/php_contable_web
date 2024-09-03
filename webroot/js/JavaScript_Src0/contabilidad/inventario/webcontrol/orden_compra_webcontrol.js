//<script type="text/javascript" language="javascript">



//var orden_compraJQueryPaginaWebInteraccion= function (orden_compra_control) {
//this.,this.,this.

class orden_compra_webcontrol extends orden_compra_webcontrol_add {
	
	orden_compra_control=null;
	orden_compra_controlInicial=null;
	orden_compra_controlAuxiliar=null;
		
	//if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(orden_compra_control) {
		super();
		
		this.orden_compra_control=orden_compra_control;
	}
		
	actualizarVariablesPagina(orden_compra_control) {
		
		if(orden_compra_control.action=="index" || orden_compra_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(orden_compra_control);
			
		} else if(orden_compra_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(orden_compra_control);
		
		} else if(orden_compra_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(orden_compra_control);
		
		} else if(orden_compra_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(orden_compra_control);
		
		} else if(orden_compra_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(orden_compra_control);
			
		} else if(orden_compra_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(orden_compra_control);
			
		} else if(orden_compra_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(orden_compra_control);
		
		} else if(orden_compra_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(orden_compra_control);
		
		} else if(orden_compra_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(orden_compra_control);
		
		} else if(orden_compra_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(orden_compra_control);
		
		} else if(orden_compra_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(orden_compra_control);
		
		} else if(orden_compra_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(orden_compra_control);
		
		} else if(orden_compra_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(orden_compra_control);
		
		} else if(orden_compra_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(orden_compra_control);
		
		} else if(orden_compra_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(orden_compra_control);
		
		} else if(orden_compra_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(orden_compra_control);
		
		} else if(orden_compra_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(orden_compra_control);
		
		} else if(orden_compra_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(orden_compra_control);
		
		} else if(orden_compra_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(orden_compra_control);
		
		} else if(orden_compra_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(orden_compra_control);
		
		} else if(orden_compra_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(orden_compra_control);
		
		} else if(orden_compra_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(orden_compra_control);
		
		} else if(orden_compra_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(orden_compra_control);
		
		} else if(orden_compra_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(orden_compra_control);
		
		} else if(orden_compra_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(orden_compra_control);
		
		} else if(orden_compra_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(orden_compra_control);
		
		} else if(orden_compra_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(orden_compra_control);
		
		} else if(orden_compra_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(orden_compra_control);		
		
		} else if(orden_compra_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(orden_compra_control);		
		
		} else if(orden_compra_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(orden_compra_control);		
		
		} else if(orden_compra_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(orden_compra_control);		
		}
		else if(orden_compra_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(orden_compra_control);		
		}
		else if(orden_compra_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(orden_compra_control);		
		}
		else if(orden_compra_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(orden_compra_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(orden_compra_control.action + " Revisar Manejo");
			
			if(orden_compra_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(orden_compra_control);
				
				return;
			}
			
			//if(orden_compra_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(orden_compra_control);
			//}
			
			if(orden_compra_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(orden_compra_control);
			}
			
			if(orden_compra_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && orden_compra_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(orden_compra_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(orden_compra_control, false);			
			}
			
			if(orden_compra_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(orden_compra_control);	
			}
			
			if(orden_compra_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(orden_compra_control);
			}
			
			if(orden_compra_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(orden_compra_control);
			}
			
			if(orden_compra_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(orden_compra_control);
			}
			
			if(orden_compra_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(orden_compra_control);	
			}
			
			if(orden_compra_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(orden_compra_control);
			}
			
			if(orden_compra_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(orden_compra_control);
			}
			
			
			if(orden_compra_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(orden_compra_control);			
			}
			
			if(orden_compra_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(orden_compra_control);
			}
			
			
			if(orden_compra_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(orden_compra_control);
			}
			
			if(orden_compra_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(orden_compra_control);
			}				
			
			if(orden_compra_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(orden_compra_control);
			}
			
			if(orden_compra_control.usuarioActual!=null && orden_compra_control.usuarioActual.field_strUserName!=null &&
			orden_compra_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(orden_compra_control);			
			}
		}
		
		
		if(orden_compra_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(orden_compra_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(orden_compra_control) {
		
		this.actualizarPaginaCargaGeneral(orden_compra_control);
		this.actualizarPaginaTablaDatos(orden_compra_control);
		this.actualizarPaginaCargaGeneralControles(orden_compra_control);
		this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(orden_compra_control);
		this.actualizarPaginaAreaBusquedas(orden_compra_control);
		this.actualizarPaginaCargaCombosFK(orden_compra_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(orden_compra_control) {
		
		this.actualizarPaginaCargaGeneral(orden_compra_control);
		this.actualizarPaginaTablaDatos(orden_compra_control);
		this.actualizarPaginaCargaGeneralControles(orden_compra_control);
		this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(orden_compra_control);
		this.actualizarPaginaAreaBusquedas(orden_compra_control);
		this.actualizarPaginaCargaCombosFK(orden_compra_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(orden_compra_control) {
		this.actualizarPaginaTablaDatosAuxiliar(orden_compra_control);		
		this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(orden_compra_control) {
		this.actualizarPaginaTablaDatosAuxiliar(orden_compra_control);		
		this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(orden_compra_control) {
		this.actualizarPaginaTablaDatosAuxiliar(orden_compra_control);		
		this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(orden_compra_control) {
		this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(orden_compra_control) {
		this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(orden_compra_control) {
		this.actualizarPaginaCargaGeneralControles(orden_compra_control);
		this.actualizarPaginaCargaCombosFK(orden_compra_control);
		this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(orden_compra_control) {
		this.actualizarPaginaAbrirLink(orden_compra_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);				
		this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);
		this.actualizarPaginaFormulario(orden_compra_control);
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);
		this.actualizarPaginaFormulario(orden_compra_control);
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(orden_compra_control) {
		this.actualizarPaginaFormulario(orden_compra_control);
		this.onLoadCombosDefectoFK(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);
		this.actualizarPaginaFormulario(orden_compra_control);
		this.onLoadCombosDefectoFK(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(orden_compra_control) {
		this.actualizarPaginaCargaGeneralControles(orden_compra_control);
		this.actualizarPaginaCargaCombosFK(orden_compra_control);
		this.actualizarPaginaFormulario(orden_compra_control);
		this.onLoadCombosDefectoFK(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(orden_compra_control) {
		this.actualizarPaginaAbrirLink(orden_compra_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(orden_compra_control) {
		this.actualizarPaginaImprimir(orden_compra_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(orden_compra_control) {
		this.actualizarPaginaImprimir(orden_compra_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(orden_compra_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(orden_compra_control) {
		//FORMULARIO
		if(orden_compra_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(orden_compra_control);
			this.actualizarPaginaFormularioAdd(orden_compra_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		//COMBOS FK
		if(orden_compra_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(orden_compra_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(orden_compra_control) {
		//FORMULARIO
		if(orden_compra_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(orden_compra_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);	
		//COMBOS FK
		if(orden_compra_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(orden_compra_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);
		this.actualizarPaginaFormulario(orden_compra_control);
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(orden_compra_control) {
		//FORMULARIO
		if(orden_compra_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(orden_compra_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(orden_compra_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);	
		//COMBOS FK
		if(orden_compra_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(orden_compra_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(orden_compra_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(orden_compra_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(orden_compra_control) {
		if(orden_compra_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && orden_compra_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(orden_compra_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(orden_compra_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(orden_compra_control) {
		if(orden_compra_funcion1.esPaginaForm()==true) {
			window.opener.orden_compra_webcontrol1.actualizarPaginaTablaDatos(orden_compra_control);
		} else {
			this.actualizarPaginaTablaDatos(orden_compra_control);
		}
	}
	
	actualizarPaginaAbrirLink(orden_compra_control) {
		orden_compra_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(orden_compra_control.strAuxiliarUrlPagina);
				
		orden_compra_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(orden_compra_control.strAuxiliarTipo,orden_compra_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(orden_compra_control) {
		orden_compra_funcion1.resaltarRestaurarDivMensaje(true,orden_compra_control.strAuxiliarMensajeAlert,orden_compra_control.strAuxiliarCssMensaje);
			
		if(orden_compra_funcion1.esPaginaForm()==true) {
			window.opener.orden_compra_funcion1.resaltarRestaurarDivMensaje(true,orden_compra_control.strAuxiliarMensajeAlert,orden_compra_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(orden_compra_control) {
		eval(orden_compra_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(orden_compra_control, mostrar) {
		
		if(mostrar==true) {
			orden_compra_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				orden_compra_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			orden_compra_funcion1.mostrarDivMensaje(true,orden_compra_control.strAuxiliarMensaje,orden_compra_control.strAuxiliarCssMensaje);
		
		} else {
			orden_compra_funcion1.mostrarDivMensaje(false,orden_compra_control.strAuxiliarMensaje,orden_compra_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(orden_compra_control) {
	
		funcionGeneral.printWebPartPage("orden_compra",orden_compra_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarorden_comprasAjaxWebPart").html(orden_compra_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("orden_compra",jQuery("#divTablaDatosReporteAuxiliarorden_comprasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(orden_compra_control) {
		this.orden_compra_controlInicial=orden_compra_control;
			
		if(orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(orden_compra_control.strStyleDivArbol,orden_compra_control.strStyleDivContent
																,orden_compra_control.strStyleDivOpcionesBanner,orden_compra_control.strStyleDivExpandirColapsar
																,orden_compra_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=orden_compra_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",orden_compra_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(orden_compra_control) {
		jQuery("#divTablaDatosorden_comprasAjaxWebPart").html(orden_compra_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosorden_compras=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(orden_compra_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosorden_compras=jQuery("#tblTablaDatosorden_compras").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("orden_compra",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',orden_compra_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			orden_compra_webcontrol1.registrarControlesTableEdition(orden_compra_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		orden_compra_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(orden_compra_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(orden_compra_control.orden_compraActual!=null) {//form
			
			this.actualizarCamposFilaTabla(orden_compra_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(orden_compra_control) {
		this.actualizarCssBotonesPagina(orden_compra_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(orden_compra_control.tiposReportes,orden_compra_control.tiposReporte
															 	,orden_compra_control.tiposPaginacion,orden_compra_control.tiposAcciones
																,orden_compra_control.tiposColumnasSelect,orden_compra_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(orden_compra_control.tiposRelaciones,orden_compra_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(orden_compra_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(orden_compra_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(orden_compra_control);			
	}
	
	actualizarPaginaAreaBusquedas(orden_compra_control) {
		jQuery("#divBusquedaorden_compraAjaxWebPart").css("display",orden_compra_control.strPermisoBusqueda);
		jQuery("#trorden_compraCabeceraBusquedas").css("display",orden_compra_control.strPermisoBusqueda);
		jQuery("#trBusquedaorden_compra").css("display",orden_compra_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(orden_compra_control.htmlTablaOrderBy!=null
			&& orden_compra_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByorden_compraAjaxWebPart").html(orden_compra_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//orden_compra_webcontrol1.registrarOrderByActions();
			
		}
			
		if(orden_compra_control.htmlTablaOrderByRel!=null
			&& orden_compra_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelorden_compraAjaxWebPart").html(orden_compra_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(orden_compra_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaorden_compraAjaxWebPart").css("display","none");
			jQuery("#trorden_compraCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaorden_compra").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(orden_compra_control) {
		jQuery("#tdorden_compraNuevo").css("display",orden_compra_control.strPermisoNuevo);
		jQuery("#trorden_compraElementos").css("display",orden_compra_control.strVisibleTablaElementos);
		jQuery("#trorden_compraAcciones").css("display",orden_compra_control.strVisibleTablaAcciones);
		jQuery("#trorden_compraParametrosAcciones").css("display",orden_compra_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(orden_compra_control) {
	
		this.actualizarCssBotonesMantenimiento(orden_compra_control);
				
		if(orden_compra_control.orden_compraActual!=null) {//form
			
			this.actualizarCamposFormulario(orden_compra_control);			
		}
						
		this.actualizarSpanMensajesCampos(orden_compra_control);
	}
	
	actualizarPaginaUsuarioInvitado(orden_compra_control) {
	
		var indexPosition=orden_compra_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=orden_compra_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(orden_compra_control) {
		jQuery("#divResumenorden_compraActualAjaxWebPart").html(orden_compra_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(orden_compra_control) {
		jQuery("#divAccionesRelacionesorden_compraAjaxWebPart").html(orden_compra_control.htmlTablaAccionesRelaciones);
			
		orden_compra_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(orden_compra_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(orden_compra_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(orden_compra_control) {
		
		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",orden_compra_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",orden_compra_control.strVisibleFK_Idasiento);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar").attr("style",orden_compra_control.strVisibleFK_Iddocumento_cuenta_pagar);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar").attr("style",orden_compra_control.strVisibleFK_Iddocumento_cuenta_pagar);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",orden_compra_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",orden_compra_control.strVisibleFK_Idejercicio);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",orden_compra_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",orden_compra_control.strVisibleFK_Idempresa);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idestado").attr("style",orden_compra_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idestado").attr("style",orden_compra_control.strVisibleFK_Idestado);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",orden_compra_control.strVisibleFK_Idkardex);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",orden_compra_control.strVisibleFK_Idkardex);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",orden_compra_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",orden_compra_control.strVisibleFK_Idperiodo);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",orden_compra_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",orden_compra_control.strVisibleFK_Idproveedor);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",orden_compra_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",orden_compra_control.strVisibleFK_Idsucursal);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",orden_compra_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",orden_compra_control.strVisibleFK_Idtermino_pago);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",orden_compra_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",orden_compra_control.strVisibleFK_Idusuario);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",orden_compra_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",orden_compra_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionorden_compra();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("orden_compra",id,"inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","empresa","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","sucursal","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","ejercicio","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","periodo","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","usuario","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","proveedor","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","vendedor","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParatermino_pago_proveedor(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","termino_pago_proveedor","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","estado","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","asiento","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParadocumento_cuenta_pagar(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","documento_cuenta_pagar","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParakardex(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","kardex","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(orden_compra_control) {
	
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id").val(orden_compra_control.orden_compraActual.id);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-version_row").val(orden_compra_control.orden_compraActual.versionRow);
		
		if(orden_compra_control.orden_compraActual.id_empresa!=null && orden_compra_control.orden_compraActual.id_empresa>-1){
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa").val() != orden_compra_control.orden_compraActual.id_empresa) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa").val(orden_compra_control.orden_compraActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_sucursal!=null && orden_compra_control.orden_compraActual.id_sucursal>-1){
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal").val() != orden_compra_control.orden_compraActual.id_sucursal) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal").val(orden_compra_control.orden_compraActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_ejercicio!=null && orden_compra_control.orden_compraActual.id_ejercicio>-1){
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio").val() != orden_compra_control.orden_compraActual.id_ejercicio) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio").val(orden_compra_control.orden_compraActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_periodo!=null && orden_compra_control.orden_compraActual.id_periodo>-1){
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo").val() != orden_compra_control.orden_compraActual.id_periodo) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo").val(orden_compra_control.orden_compraActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_usuario!=null && orden_compra_control.orden_compraActual.id_usuario>-1){
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario").val() != orden_compra_control.orden_compraActual.id_usuario) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario").val(orden_compra_control.orden_compraActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-numero").val(orden_compra_control.orden_compraActual.numero);
		
		if(orden_compra_control.orden_compraActual.id_proveedor!=null && orden_compra_control.orden_compraActual.id_proveedor>-1){
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor").val() != orden_compra_control.orden_compraActual.id_proveedor) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor").val(orden_compra_control.orden_compraActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-ruc").val(orden_compra_control.orden_compraActual.ruc);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-fecha_emision").val(orden_compra_control.orden_compraActual.fecha_emision);
		
		if(orden_compra_control.orden_compraActual.id_vendedor!=null && orden_compra_control.orden_compraActual.id_vendedor>-1){
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor").val() != orden_compra_control.orden_compraActual.id_vendedor) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor").val(orden_compra_control.orden_compraActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_termino_pago_proveedor!=null && orden_compra_control.orden_compraActual.id_termino_pago_proveedor>-1){
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != orden_compra_control.orden_compraActual.id_termino_pago_proveedor) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(orden_compra_control.orden_compraActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").select2("val", null);
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-fecha_vence").val(orden_compra_control.orden_compraActual.fecha_vence);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-tipo_cambio").val(orden_compra_control.orden_compraActual.tipo_cambio);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-moneda").val(orden_compra_control.orden_compraActual.moneda);
		
		if(orden_compra_control.orden_compraActual.id_estado!=null && orden_compra_control.orden_compraActual.id_estado>-1){
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado").val() != orden_compra_control.orden_compraActual.id_estado) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado").val(orden_compra_control.orden_compraActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-direccion").val(orden_compra_control.orden_compraActual.direccion);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-enviar_a").val(orden_compra_control.orden_compraActual.enviar_a);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-observacion").val(orden_compra_control.orden_compraActual.observacion);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-sub_total").val(orden_compra_control.orden_compraActual.sub_total);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-descuento_monto").val(orden_compra_control.orden_compraActual.descuento_monto);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-descuento_porciento").val(orden_compra_control.orden_compraActual.descuento_porciento);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-iva_monto").val(orden_compra_control.orden_compraActual.iva_monto);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-iva_porciento").val(orden_compra_control.orden_compraActual.iva_porciento);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-retencion_fuente_monto").val(orden_compra_control.orden_compraActual.retencion_fuente_monto);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-retencion_fuente_porciento").val(orden_compra_control.orden_compraActual.retencion_fuente_porciento);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-retencion_iva_monto").val(orden_compra_control.orden_compraActual.retencion_iva_monto);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-retencion_iva_porciento").val(orden_compra_control.orden_compraActual.retencion_iva_porciento);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-total").val(orden_compra_control.orden_compraActual.total);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-otro_monto").val(orden_compra_control.orden_compraActual.otro_monto);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-otro_porciento").val(orden_compra_control.orden_compraActual.otro_porciento);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-impuesto_en_precio").prop('checked',orden_compra_control.orden_compraActual.impuesto_en_precio);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-hora").val(orden_compra_control.orden_compraActual.hora);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-actualizado").val(orden_compra_control.orden_compraActual.actualizado);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-tipo_envio").val(orden_compra_control.orden_compraActual.tipo_envio);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-computador").val(orden_compra_control.orden_compraActual.computador);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-monto_base").val(orden_compra_control.orden_compraActual.monto_base);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-descuento_parcial_monto").val(orden_compra_control.orden_compraActual.descuento_parcial_monto);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-impuesto2_monto").val(orden_compra_control.orden_compraActual.impuesto2_monto);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-impuesto2_porciento").val(orden_compra_control.orden_compraActual.impuesto2_porciento);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-retencion_ica_monto").val(orden_compra_control.orden_compraActual.retencion_ica_monto);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-retencion_ica_porciento").val(orden_compra_control.orden_compraActual.retencion_ica_porciento);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-nro_factura_proveedor").val(orden_compra_control.orden_compraActual.nro_factura_proveedor);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-tipo_compra").val(orden_compra_control.orden_compraActual.tipo_compra);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-tipo_registracion").val(orden_compra_control.orden_compraActual.tipo_registracion);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-recibida").prop('checked',orden_compra_control.orden_compraActual.recibida);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-pagos").val(orden_compra_control.orden_compraActual.pagos);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-anulado").prop('checked',orden_compra_control.orden_compraActual.anulado);
		jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-compra_cancelada").val(orden_compra_control.orden_compraActual.compra_cancelada);
		
		if(orden_compra_control.orden_compraActual.id_asiento!=null && orden_compra_control.orden_compraActual.id_asiento>-1){
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_asiento").val() != orden_compra_control.orden_compraActual.id_asiento) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_asiento").val(orden_compra_control.orden_compraActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_asiento").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_documento_cuenta_pagar!=null && orden_compra_control.orden_compraActual.id_documento_cuenta_pagar>-1){
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val() != orden_compra_control.orden_compraActual.id_documento_cuenta_pagar) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val(orden_compra_control.orden_compraActual.id_documento_cuenta_pagar).trigger("change");
			}
		} else { 
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_kardex!=null && orden_compra_control.orden_compraActual.id_kardex>-1){
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_kardex").val() != orden_compra_control.orden_compraActual.id_kardex) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_kardex").val(orden_compra_control.orden_compraActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_kardex").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+orden_compra_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("orden_compra","inventario","","form_orden_compra",formulario,"","",paraEventoTabla,idFilaTabla,orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}
	
	cargarCombosFK(orden_compra_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosempresasFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombossucursalsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosejerciciosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosperiodosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosusuariosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosproveedorsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosvendedorsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombostermino_pago_proveedorsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosestadosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosasientosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosdocumento_cuenta_pagarsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarComboskardexsFK(orden_compra_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(orden_compra_control.strRecargarFkTiposNinguno!=null && orden_compra_control.strRecargarFkTiposNinguno!='NINGUNO' && orden_compra_control.strRecargarFkTiposNinguno!='') {
			
				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosempresasFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombossucursalsFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosejerciciosFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosperiodosFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosusuariosFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosproveedorsFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosvendedorsFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombostermino_pago_proveedorsFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosestadosFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosasientosFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosdocumento_cuenta_pagarsFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarComboskardexsFK(orden_compra_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(orden_compra_control) {
		jQuery("#spanstrMensajeid").text(orden_compra_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(orden_compra_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(orden_compra_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(orden_compra_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(orden_compra_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(orden_compra_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(orden_compra_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenumero").text(orden_compra_control.strMensajenumero);		
		jQuery("#spanstrMensajeid_proveedor").text(orden_compra_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajeruc").text(orden_compra_control.strMensajeruc);		
		jQuery("#spanstrMensajefecha_emision").text(orden_compra_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajeid_vendedor").text(orden_compra_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajeid_termino_pago_proveedor").text(orden_compra_control.strMensajeid_termino_pago_proveedor);		
		jQuery("#spanstrMensajefecha_vence").text(orden_compra_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajetipo_cambio").text(orden_compra_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajemoneda").text(orden_compra_control.strMensajemoneda);		
		jQuery("#spanstrMensajeid_estado").text(orden_compra_control.strMensajeid_estado);		
		jQuery("#spanstrMensajedireccion").text(orden_compra_control.strMensajedireccion);		
		jQuery("#spanstrMensajeenviar_a").text(orden_compra_control.strMensajeenviar_a);		
		jQuery("#spanstrMensajeobservacion").text(orden_compra_control.strMensajeobservacion);		
		jQuery("#spanstrMensajesub_total").text(orden_compra_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_monto").text(orden_compra_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajedescuento_porciento").text(orden_compra_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(orden_compra_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(orden_compra_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeretencion_fuente_monto").text(orden_compra_control.strMensajeretencion_fuente_monto);		
		jQuery("#spanstrMensajeretencion_fuente_porciento").text(orden_compra_control.strMensajeretencion_fuente_porciento);		
		jQuery("#spanstrMensajeretencion_iva_monto").text(orden_compra_control.strMensajeretencion_iva_monto);		
		jQuery("#spanstrMensajeretencion_iva_porciento").text(orden_compra_control.strMensajeretencion_iva_porciento);		
		jQuery("#spanstrMensajetotal").text(orden_compra_control.strMensajetotal);		
		jQuery("#spanstrMensajeotro_monto").text(orden_compra_control.strMensajeotro_monto);		
		jQuery("#spanstrMensajeotro_porciento").text(orden_compra_control.strMensajeotro_porciento);		
		jQuery("#spanstrMensajeimpuesto_en_precio").text(orden_compra_control.strMensajeimpuesto_en_precio);		
		jQuery("#spanstrMensajehora").text(orden_compra_control.strMensajehora);		
		jQuery("#spanstrMensajeactualizado").text(orden_compra_control.strMensajeactualizado);		
		jQuery("#spanstrMensajetipo_envio").text(orden_compra_control.strMensajetipo_envio);		
		jQuery("#spanstrMensajecomputador").text(orden_compra_control.strMensajecomputador);		
		jQuery("#spanstrMensajemonto_base").text(orden_compra_control.strMensajemonto_base);		
		jQuery("#spanstrMensajedescuento_parcial_monto").text(orden_compra_control.strMensajedescuento_parcial_monto);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(orden_compra_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(orden_compra_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeretencion_ica_monto").text(orden_compra_control.strMensajeretencion_ica_monto);		
		jQuery("#spanstrMensajeretencion_ica_porciento").text(orden_compra_control.strMensajeretencion_ica_porciento);		
		jQuery("#spanstrMensajenro_factura_proveedor").text(orden_compra_control.strMensajenro_factura_proveedor);		
		jQuery("#spanstrMensajetipo_compra").text(orden_compra_control.strMensajetipo_compra);		
		jQuery("#spanstrMensajetipo_registracion").text(orden_compra_control.strMensajetipo_registracion);		
		jQuery("#spanstrMensajerecibida").text(orden_compra_control.strMensajerecibida);		
		jQuery("#spanstrMensajepagos").text(orden_compra_control.strMensajepagos);		
		jQuery("#spanstrMensajeanulado").text(orden_compra_control.strMensajeanulado);		
		jQuery("#spanstrMensajecompra_cancelada").text(orden_compra_control.strMensajecompra_cancelada);		
		jQuery("#spanstrMensajeid_asiento").text(orden_compra_control.strMensajeid_asiento);		
		jQuery("#spanstrMensajeid_documento_cuenta_pagar").text(orden_compra_control.strMensajeid_documento_cuenta_pagar);		
		jQuery("#spanstrMensajeid_kardex").text(orden_compra_control.strMensajeid_kardex);		
	}
	
	actualizarCssBotonesMantenimiento(orden_compra_control) {
		jQuery("#tdbtnNuevoorden_compra").css("visibility",orden_compra_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoorden_compra").css("display",orden_compra_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarorden_compra").css("visibility",orden_compra_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarorden_compra").css("display",orden_compra_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarorden_compra").css("visibility",orden_compra_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarorden_compra").css("display",orden_compra_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarorden_compra").css("visibility",orden_compra_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosorden_compra").css("visibility",orden_compra_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosorden_compra").css("display",orden_compra_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarorden_compra").css("visibility",orden_compra_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarorden_compra").css("visibility",orden_compra_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarorden_compra").css("visibility",orden_compra_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionorden_compra_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualorden_compra");

			orden_compra_webcontrol1.registrarSesionParaorden_compra_detalles(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_proveedor") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.orden_compraActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.orden_compraActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.orden_compraActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.usuariosFK);
	}

	cargarComboEditarTablaproveedorFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.proveedorsFK);
	}

	cargarComboEditarTablavendedorFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_proveedorFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.termino_pago_proveedorsFK);
	}

	cargarComboEditarTablaestadoFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.asientosFK);
	}

	cargarComboEditarTabladocumento_cuenta_pagarFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.documento_cuenta_pagarsFK);
	}

	cargarComboEditarTablakardexFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(orden_compra_control) {
		var i=0;
		
		i=orden_compra_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(orden_compra_control.orden_compraActual.id);
		jQuery("#t-version_row_"+i+"").val(orden_compra_control.orden_compraActual.versionRow);
		
		if(orden_compra_control.orden_compraActual.id_empresa!=null && orden_compra_control.orden_compraActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != orden_compra_control.orden_compraActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(orden_compra_control.orden_compraActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_sucursal!=null && orden_compra_control.orden_compraActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != orden_compra_control.orden_compraActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(orden_compra_control.orden_compraActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_ejercicio!=null && orden_compra_control.orden_compraActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != orden_compra_control.orden_compraActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(orden_compra_control.orden_compraActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_periodo!=null && orden_compra_control.orden_compraActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != orden_compra_control.orden_compraActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(orden_compra_control.orden_compraActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_usuario!=null && orden_compra_control.orden_compraActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != orden_compra_control.orden_compraActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(orden_compra_control.orden_compraActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(orden_compra_control.orden_compraActual.numero);
		
		if(orden_compra_control.orden_compraActual.id_proveedor!=null && orden_compra_control.orden_compraActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != orden_compra_control.orden_compraActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_8").val(orden_compra_control.orden_compraActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(orden_compra_control.orden_compraActual.ruc);
		jQuery("#t-cel_"+i+"_10").val(orden_compra_control.orden_compraActual.fecha_emision);
		
		if(orden_compra_control.orden_compraActual.id_vendedor!=null && orden_compra_control.orden_compraActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_11").val() != orden_compra_control.orden_compraActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_11").val(orden_compra_control.orden_compraActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_11").select2("val", null);
			if(jQuery("#t-cel_"+i+"_11").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_11").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_termino_pago_proveedor!=null && orden_compra_control.orden_compraActual.id_termino_pago_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != orden_compra_control.orden_compraActual.id_termino_pago_proveedor) {
				jQuery("#t-cel_"+i+"_12").val(orden_compra_control.orden_compraActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_13").val(orden_compra_control.orden_compraActual.fecha_vence);
		jQuery("#t-cel_"+i+"_14").val(orden_compra_control.orden_compraActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_15").val(orden_compra_control.orden_compraActual.moneda);
		
		if(orden_compra_control.orden_compraActual.id_estado!=null && orden_compra_control.orden_compraActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_16").val() != orden_compra_control.orden_compraActual.id_estado) {
				jQuery("#t-cel_"+i+"_16").val(orden_compra_control.orden_compraActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_16").select2("val", null);
			if(jQuery("#t-cel_"+i+"_16").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_16").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_17").val(orden_compra_control.orden_compraActual.direccion);
		jQuery("#t-cel_"+i+"_18").val(orden_compra_control.orden_compraActual.enviar_a);
		jQuery("#t-cel_"+i+"_19").val(orden_compra_control.orden_compraActual.observacion);
		jQuery("#t-cel_"+i+"_20").val(orden_compra_control.orden_compraActual.sub_total);
		jQuery("#t-cel_"+i+"_21").val(orden_compra_control.orden_compraActual.descuento_monto);
		jQuery("#t-cel_"+i+"_22").val(orden_compra_control.orden_compraActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_23").val(orden_compra_control.orden_compraActual.iva_monto);
		jQuery("#t-cel_"+i+"_24").val(orden_compra_control.orden_compraActual.iva_porciento);
		jQuery("#t-cel_"+i+"_25").val(orden_compra_control.orden_compraActual.retencion_fuente_monto);
		jQuery("#t-cel_"+i+"_26").val(orden_compra_control.orden_compraActual.retencion_fuente_porciento);
		jQuery("#t-cel_"+i+"_27").val(orden_compra_control.orden_compraActual.retencion_iva_monto);
		jQuery("#t-cel_"+i+"_28").val(orden_compra_control.orden_compraActual.retencion_iva_porciento);
		jQuery("#t-cel_"+i+"_29").val(orden_compra_control.orden_compraActual.total);
		jQuery("#t-cel_"+i+"_30").val(orden_compra_control.orden_compraActual.otro_monto);
		jQuery("#t-cel_"+i+"_31").val(orden_compra_control.orden_compraActual.otro_porciento);
		jQuery("#t-cel_"+i+"_32").prop('checked',orden_compra_control.orden_compraActual.impuesto_en_precio);
		jQuery("#t-cel_"+i+"_33").val(orden_compra_control.orden_compraActual.hora);
		jQuery("#t-cel_"+i+"_34").val(orden_compra_control.orden_compraActual.actualizado);
		jQuery("#t-cel_"+i+"_35").val(orden_compra_control.orden_compraActual.tipo_envio);
		jQuery("#t-cel_"+i+"_36").val(orden_compra_control.orden_compraActual.computador);
		jQuery("#t-cel_"+i+"_37").val(orden_compra_control.orden_compraActual.monto_base);
		jQuery("#t-cel_"+i+"_38").val(orden_compra_control.orden_compraActual.descuento_parcial_monto);
		jQuery("#t-cel_"+i+"_39").val(orden_compra_control.orden_compraActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_40").val(orden_compra_control.orden_compraActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_41").val(orden_compra_control.orden_compraActual.retencion_ica_monto);
		jQuery("#t-cel_"+i+"_42").val(orden_compra_control.orden_compraActual.retencion_ica_porciento);
		jQuery("#t-cel_"+i+"_43").val(orden_compra_control.orden_compraActual.nro_factura_proveedor);
		jQuery("#t-cel_"+i+"_44").val(orden_compra_control.orden_compraActual.tipo_compra);
		jQuery("#t-cel_"+i+"_45").val(orden_compra_control.orden_compraActual.tipo_registracion);
		jQuery("#t-cel_"+i+"_46").prop('checked',orden_compra_control.orden_compraActual.recibida);
		jQuery("#t-cel_"+i+"_47").val(orden_compra_control.orden_compraActual.pagos);
		jQuery("#t-cel_"+i+"_48").prop('checked',orden_compra_control.orden_compraActual.anulado);
		jQuery("#t-cel_"+i+"_49").val(orden_compra_control.orden_compraActual.compra_cancelada);
		
		if(orden_compra_control.orden_compraActual.id_asiento!=null && orden_compra_control.orden_compraActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_50").val() != orden_compra_control.orden_compraActual.id_asiento) {
				jQuery("#t-cel_"+i+"_50").val(orden_compra_control.orden_compraActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_50").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_50").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_documento_cuenta_pagar!=null && orden_compra_control.orden_compraActual.id_documento_cuenta_pagar>-1){
			if(jQuery("#t-cel_"+i+"_51").val() != orden_compra_control.orden_compraActual.id_documento_cuenta_pagar) {
				jQuery("#t-cel_"+i+"_51").val(orden_compra_control.orden_compraActual.id_documento_cuenta_pagar).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_51").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_51").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_kardex!=null && orden_compra_control.orden_compraActual.id_kardex>-1){
			if(jQuery("#t-cel_"+i+"_52").val() != orden_compra_control.orden_compraActual.id_kardex) {
				jQuery("#t-cel_"+i+"_52").val(orden_compra_control.orden_compraActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_52").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_52").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(orden_compra_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionorden_compra_detalle").click(function(){
		jQuery("#tblTablaDatosorden_compras").on("click",".imgrelacionorden_compra_detalle", function () {

			var idActual=jQuery(this).attr("idactualorden_compra");

			orden_compra_webcontrol1.registrarSesionParaorden_compra_detalles(idActual);
		});				
	}
		
	

	registrarSesionParaorden_compra_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"orden_compra","orden_compra_detalle","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(orden_compra_control) {
		orden_compra_funcion1.registrarControlesTableValidacionEdition(orden_compra_control,orden_compra_webcontrol1,orden_compra_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compraConstante,strParametros);
		
		//orden_compra_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa",orden_compra_control.empresasFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_2",orden_compra_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal",orden_compra_control.sucursalsFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_3",orden_compra_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio",orden_compra_control.ejerciciosFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_4",orden_compra_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo",orden_compra_control.periodosFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_5",orden_compra_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario",orden_compra_control.usuariosFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_6",orden_compra_control.usuariosFK);
		}
	};

	cargarCombosproveedorsFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor",orden_compra_control.proveedorsFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_8",orden_compra_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",orden_compra_control.proveedorsFK);

	};

	cargarCombosvendedorsFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor",orden_compra_control.vendedorsFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_11",orden_compra_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",orden_compra_control.vendedorsFK);

	};

	cargarCombostermino_pago_proveedorsFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor",orden_compra_control.termino_pago_proveedorsFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_12",orden_compra_control.termino_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor",orden_compra_control.termino_pago_proveedorsFK);

	};

	cargarCombosestadosFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado",orden_compra_control.estadosFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_16",orden_compra_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",orden_compra_control.estadosFK);

	};

	cargarCombosasientosFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_asiento",orden_compra_control.asientosFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_50",orden_compra_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",orden_compra_control.asientosFK);

	};

	cargarCombosdocumento_cuenta_pagarsFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar",orden_compra_control.documento_cuenta_pagarsFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_51",orden_compra_control.documento_cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar",orden_compra_control.documento_cuenta_pagarsFK);

	};

	cargarComboskardexsFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_kardex",orden_compra_control.kardexsFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_52",orden_compra_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",orden_compra_control.kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(orden_compra_control) {

	};

	registrarComboActionChangeCombossucursalsFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosperiodosFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosusuariosFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(orden_compra_control) {
		this.registrarComboActionChangeid_proveedor("form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor",false,0);


		this.registrarComboActionChangeid_proveedor(""+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(orden_compra_control) {

	};

	registrarComboActionChangeCombostermino_pago_proveedorsFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosestadosFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosasientosFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosdocumento_cuenta_pagarsFK(orden_compra_control) {

	};

	registrarComboActionChangeComboskardexsFK(orden_compra_control) {

	};

	
	
	setDefectoValorCombosempresasFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idempresaDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa").val() != orden_compra_control.idempresaDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa").val(orden_compra_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idsucursalDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal").val() != orden_compra_control.idsucursalDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal").val(orden_compra_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idejercicioDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio").val() != orden_compra_control.idejercicioDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio").val(orden_compra_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idperiodoDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo").val() != orden_compra_control.idperiodoDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo").val(orden_compra_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idusuarioDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario").val() != orden_compra_control.idusuarioDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario").val(orden_compra_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idproveedorDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor").val() != orden_compra_control.idproveedorDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor").val(orden_compra_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(orden_compra_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idvendedorDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor").val() != orden_compra_control.idvendedorDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor").val(orden_compra_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(orden_compra_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_proveedorsFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idtermino_pago_proveedorDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != orden_compra_control.idtermino_pago_proveedorDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(orden_compra_control.idtermino_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor").val(orden_compra_control.idtermino_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idestadoDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado").val() != orden_compra_control.idestadoDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado").val(orden_compra_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(orden_compra_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idasientoDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_asiento").val() != orden_compra_control.idasientoDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_asiento").val(orden_compra_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(orden_compra_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_cuenta_pagarsFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.iddocumento_cuenta_pagarDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val() != orden_compra_control.iddocumento_cuenta_pagarDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val(orden_compra_control.iddocumento_cuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val(orden_compra_control.iddocumento_cuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idkardexDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_kardex").val() != orden_compra_control.idkardexDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_kardex").val(orden_compra_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(orden_compra_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_proveedor(id_proveedor,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("orden_compra","inventario","","id_proveedor",id_proveedor,"NINGUNO","",paraEventoTabla,idFilaTabla,orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	












	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
			
							orden_compra_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
			
		orden_compra_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//orden_compra_control
		
	
	}
	
	onLoadCombosDefectoFK(orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosempresasFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombossucursalsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosejerciciosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosperiodosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosusuariosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosproveedorsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosvendedorsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombostermino_pago_proveedorsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosestadosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosasientosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosdocumento_cuenta_pagarsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorComboskardexsFK(orden_compra_control);
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
	onLoadCombosEventosFK(orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosempresasFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombossucursalsFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosejerciciosFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosperiodosFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosusuariosFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosproveedorsFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosvendedorsFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombostermino_pago_proveedorsFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosestadosFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosasientosFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_pagarsFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeComboskardexsFK(orden_compra_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("orden_compra");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("orden_compra");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(orden_compra_funcion1,orden_compra_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(orden_compra_funcion1,orden_compra_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(orden_compra_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);			
			
			if(orden_compra_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,"orden_compra");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_proveedor","id_termino_pago_proveedor","cuentaspagar","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParatermino_pago_proveedor("id_termino_pago_proveedor");
				//alert(jQuery('#form-id_termino_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_pagar","id_documento_cuenta_pagar","cuentaspagar","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParadocumento_cuenta_pagar("id_documento_cuenta_pagar");
				//alert(jQuery('#form-id_documento_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idasiento","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Iddocumento_cuenta_pagar","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idejercicio","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idempresa","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idestado","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idkardex","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idperiodo","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idproveedor","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idsucursal","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idtermino_pago","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idusuario","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idvendedor","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("orden_compra");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			orden_compra_funcion1.validarFormularioJQuery(orden_compra_constante1);
			
			if(orden_compra_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(orden_compra_control) {
		
		jQuery("#divBusquedaorden_compraAjaxWebPart").css("display",orden_compra_control.strPermisoBusqueda);
		jQuery("#trorden_compraCabeceraBusquedas").css("display",orden_compra_control.strPermisoBusqueda);
		jQuery("#trBusquedaorden_compra").css("display",orden_compra_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteorden_compra").css("display",orden_compra_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosorden_compra").attr("style",orden_compra_control.strPermisoMostrarTodos);
		
		if(orden_compra_control.strPermisoNuevo!=null) {
			jQuery("#tdorden_compraNuevo").css("display",orden_compra_control.strPermisoNuevo);
			jQuery("#tdorden_compraNuevoToolBar").css("display",orden_compra_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdorden_compraDuplicar").css("display",orden_compra_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdorden_compraDuplicarToolBar").css("display",orden_compra_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdorden_compraNuevoGuardarCambios").css("display",orden_compra_control.strPermisoNuevo);
			jQuery("#tdorden_compraNuevoGuardarCambiosToolBar").css("display",orden_compra_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(orden_compra_control.strPermisoActualizar!=null) {
			jQuery("#tdorden_compraActualizarToolBar").css("display",orden_compra_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdorden_compraCopiar").css("display",orden_compra_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdorden_compraCopiarToolBar").css("display",orden_compra_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdorden_compraConEditar").css("display",orden_compra_control.strPermisoActualizar);
		}
		
		jQuery("#tdorden_compraEliminarToolBar").css("display",orden_compra_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdorden_compraGuardarCambios").css("display",orden_compra_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdorden_compraGuardarCambiosToolBar").css("display",orden_compra_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trorden_compraElementos").css("display",orden_compra_control.strVisibleTablaElementos);
		
		jQuery("#trorden_compraAcciones").css("display",orden_compra_control.strVisibleTablaAcciones);
		jQuery("#trorden_compraParametrosAcciones").css("display",orden_compra_control.strVisibleTablaAcciones);
			
		jQuery("#tdorden_compraCerrarPagina").css("display",orden_compra_control.strPermisoPopup);		
		jQuery("#tdorden_compraCerrarPaginaToolBar").css("display",orden_compra_control.strPermisoPopup);
		//jQuery("#trorden_compraAccionesRelaciones").css("display",orden_compra_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		orden_compra_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		orden_compra_webcontrol1.registrarEventosControles();
		
		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			orden_compra_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(orden_compra_constante1.STR_ES_RELACIONES=="true") {
			if(orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
				orden_compra_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(orden_compra_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(orden_compra_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				orden_compra_webcontrol1.onLoad();
				
			} else {
				if(orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
					if(orden_compra_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
						//orden_compra_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(orden_compra_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(orden_compra_constante1.BIG_ID_ACTUAL,"orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
						//orden_compra_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			orden_compra_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var orden_compra_webcontrol1=new orden_compra_webcontrol();

if(orden_compra_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = orden_compra_webcontrol1.onLoadWindow; 
}

//</script>