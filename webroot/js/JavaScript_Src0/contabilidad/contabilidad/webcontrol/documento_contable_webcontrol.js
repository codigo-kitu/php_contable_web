//<script type="text/javascript" language="javascript">



//var documento_contableJQueryPaginaWebInteraccion= function (documento_contable_control) {
//this.,this.,this.

class documento_contable_webcontrol extends documento_contable_webcontrol_add {
	
	documento_contable_control=null;
	documento_contable_controlInicial=null;
	documento_contable_controlAuxiliar=null;
		
	//if(documento_contable_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(documento_contable_control) {
		super();
		
		this.documento_contable_control=documento_contable_control;
	}
		
	actualizarVariablesPagina(documento_contable_control) {
		
		if(documento_contable_control.action=="index" || documento_contable_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(documento_contable_control);
			
		} else if(documento_contable_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_contable_control);
		
		} else if(documento_contable_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(documento_contable_control);
		
		} else if(documento_contable_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_contable_control);
		
		} else if(documento_contable_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(documento_contable_control);
			
		} else if(documento_contable_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(documento_contable_control);
			
		} else if(documento_contable_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_contable_control);
		
		} else if(documento_contable_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_contable_control);
		
		} else if(documento_contable_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(documento_contable_control);
		
		} else if(documento_contable_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(documento_contable_control);
		
		} else if(documento_contable_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(documento_contable_control);
		
		} else if(documento_contable_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(documento_contable_control);
		
		} else if(documento_contable_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(documento_contable_control);
		
		} else if(documento_contable_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(documento_contable_control);
		
		} else if(documento_contable_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(documento_contable_control);
		
		} else if(documento_contable_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(documento_contable_control);
		
		} else if(documento_contable_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_contable_control);
		
		} else if(documento_contable_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_contable_control);
		
		} else if(documento_contable_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_contable_control);
		
		} else if(documento_contable_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(documento_contable_control);
		
		} else if(documento_contable_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(documento_contable_control);
		
		} else if(documento_contable_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(documento_contable_control);
		
		} else if(documento_contable_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_contable_control);
		
		} else if(documento_contable_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_contable_control);
		
		} else if(documento_contable_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_contable_control);
		
		} else if(documento_contable_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(documento_contable_control);
		
		} else if(documento_contable_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_contable_control);
		
		} else if(documento_contable_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_contable_control);		
		
		} else if(documento_contable_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(documento_contable_control);		
		
		} else if(documento_contable_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_contable_control);		
		
		} else if(documento_contable_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(documento_contable_control);		
		}
		else if(documento_contable_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_contable_control);		
		}
		else if(documento_contable_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_contable_control);		
		}
		else if(documento_contable_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_contable_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(documento_contable_control.action + " Revisar Manejo");
			
			if(documento_contable_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(documento_contable_control);
				
				return;
			}
			
			//if(documento_contable_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(documento_contable_control);
			//}
			
			if(documento_contable_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(documento_contable_control);
			}
			
			if(documento_contable_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_contable_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(documento_contable_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(documento_contable_control, false);			
			}
			
			if(documento_contable_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(documento_contable_control);	
			}
			
			if(documento_contable_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(documento_contable_control);
			}
			
			if(documento_contable_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(documento_contable_control);
			}
			
			if(documento_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(documento_contable_control);
			}
			
			if(documento_contable_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(documento_contable_control);	
			}
			
			if(documento_contable_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(documento_contable_control);
			}
			
			if(documento_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(documento_contable_control);
			}
			
			
			if(documento_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(documento_contable_control);			
			}
			
			if(documento_contable_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(documento_contable_control);
			}
			
			
			if(documento_contable_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(documento_contable_control);
			}
			
			if(documento_contable_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(documento_contable_control);
			}				
			
			if(documento_contable_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_contable_control);
			}
			
			if(documento_contable_control.usuarioActual!=null && documento_contable_control.usuarioActual.field_strUserName!=null &&
			documento_contable_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(documento_contable_control);			
			}
		}
		
		
		if(documento_contable_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(documento_contable_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(documento_contable_control) {
		
		this.actualizarPaginaCargaGeneral(documento_contable_control);
		this.actualizarPaginaTablaDatos(documento_contable_control);
		this.actualizarPaginaCargaGeneralControles(documento_contable_control);
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_contable_control);
		this.actualizarPaginaAreaBusquedas(documento_contable_control);
		this.actualizarPaginaCargaCombosFK(documento_contable_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_contable_control) {
		
		this.actualizarPaginaCargaGeneral(documento_contable_control);
		this.actualizarPaginaTablaDatos(documento_contable_control);
		this.actualizarPaginaCargaGeneralControles(documento_contable_control);
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_contable_control);
		this.actualizarPaginaAreaBusquedas(documento_contable_control);
		this.actualizarPaginaCargaCombosFK(documento_contable_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(documento_contable_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_contable_control);		
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(documento_contable_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_contable_control);		
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(documento_contable_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_contable_control);		
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(documento_contable_control) {
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(documento_contable_control) {
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_contable_control) {
		this.actualizarPaginaCargaGeneralControles(documento_contable_control);
		this.actualizarPaginaCargaCombosFK(documento_contable_control);
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_contable_control) {
		this.actualizarPaginaAbrirLink(documento_contable_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);				
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);
		this.actualizarPaginaFormulario(documento_contable_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);
		this.actualizarPaginaFormulario(documento_contable_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(documento_contable_control) {
		this.actualizarPaginaFormulario(documento_contable_control);
		this.onLoadCombosDefectoFK(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);
		this.actualizarPaginaFormulario(documento_contable_control);
		this.onLoadCombosDefectoFK(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_contable_control) {
		this.actualizarPaginaCargaGeneralControles(documento_contable_control);
		this.actualizarPaginaCargaCombosFK(documento_contable_control);
		this.actualizarPaginaFormulario(documento_contable_control);
		this.onLoadCombosDefectoFK(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_contable_control) {
		this.actualizarPaginaAbrirLink(documento_contable_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_contable_control) {
		this.actualizarPaginaImprimir(documento_contable_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_contable_control) {
		this.actualizarPaginaImprimir(documento_contable_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(documento_contable_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_contable_control) {
		//FORMULARIO
		if(documento_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_contable_control);
			this.actualizarPaginaFormularioAdd(documento_contable_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		//COMBOS FK
		if(documento_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_contable_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(documento_contable_control) {
		//FORMULARIO
		if(documento_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_contable_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);	
		//COMBOS FK
		if(documento_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_contable_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);
		this.actualizarPaginaFormulario(documento_contable_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_contable_control) {
		//FORMULARIO
		if(documento_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_contable_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(documento_contable_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);	
		//COMBOS FK
		if(documento_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_contable_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_contable_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_contable_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(documento_contable_control) {
		if(documento_contable_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_contable_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(documento_contable_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(documento_contable_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(documento_contable_control) {
		if(documento_contable_funcion1.esPaginaForm()==true) {
			window.opener.documento_contable_webcontrol1.actualizarPaginaTablaDatos(documento_contable_control);
		} else {
			this.actualizarPaginaTablaDatos(documento_contable_control);
		}
	}
	
	actualizarPaginaAbrirLink(documento_contable_control) {
		documento_contable_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(documento_contable_control.strAuxiliarUrlPagina);
				
		documento_contable_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(documento_contable_control.strAuxiliarTipo,documento_contable_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(documento_contable_control) {
		documento_contable_funcion1.resaltarRestaurarDivMensaje(true,documento_contable_control.strAuxiliarMensajeAlert,documento_contable_control.strAuxiliarCssMensaje);
			
		if(documento_contable_funcion1.esPaginaForm()==true) {
			window.opener.documento_contable_funcion1.resaltarRestaurarDivMensaje(true,documento_contable_control.strAuxiliarMensajeAlert,documento_contable_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(documento_contable_control) {
		eval(documento_contable_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(documento_contable_control, mostrar) {
		
		if(mostrar==true) {
			documento_contable_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				documento_contable_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			documento_contable_funcion1.mostrarDivMensaje(true,documento_contable_control.strAuxiliarMensaje,documento_contable_control.strAuxiliarCssMensaje);
		
		} else {
			documento_contable_funcion1.mostrarDivMensaje(false,documento_contable_control.strAuxiliarMensaje,documento_contable_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(documento_contable_control) {
	
		funcionGeneral.printWebPartPage("documento_contable",documento_contable_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliardocumento_contablesAjaxWebPart").html(documento_contable_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("documento_contable",jQuery("#divTablaDatosReporteAuxiliardocumento_contablesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(documento_contable_control) {
		this.documento_contable_controlInicial=documento_contable_control;
			
		if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(documento_contable_control.strStyleDivArbol,documento_contable_control.strStyleDivContent
																,documento_contable_control.strStyleDivOpcionesBanner,documento_contable_control.strStyleDivExpandirColapsar
																,documento_contable_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=documento_contable_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",documento_contable_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(documento_contable_control) {
		jQuery("#divTablaDatosdocumento_contablesAjaxWebPart").html(documento_contable_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdocumento_contables=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdocumento_contables=jQuery("#tblTablaDatosdocumento_contables").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("documento_contable",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',documento_contable_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			documento_contable_webcontrol1.registrarControlesTableEdition(documento_contable_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		documento_contable_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(documento_contable_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(documento_contable_control.documento_contableActual!=null) {//form
			
			this.actualizarCamposFilaTabla(documento_contable_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(documento_contable_control) {
		this.actualizarCssBotonesPagina(documento_contable_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(documento_contable_control.tiposReportes,documento_contable_control.tiposReporte
															 	,documento_contable_control.tiposPaginacion,documento_contable_control.tiposAcciones
																,documento_contable_control.tiposColumnasSelect,documento_contable_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(documento_contable_control.tiposRelaciones,documento_contable_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(documento_contable_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(documento_contable_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(documento_contable_control);			
	}
	
	actualizarPaginaAreaBusquedas(documento_contable_control) {
		jQuery("#divBusquedadocumento_contableAjaxWebPart").css("display",documento_contable_control.strPermisoBusqueda);
		jQuery("#trdocumento_contableCabeceraBusquedas").css("display",documento_contable_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_contable").css("display",documento_contable_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(documento_contable_control.htmlTablaOrderBy!=null
			&& documento_contable_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydocumento_contableAjaxWebPart").html(documento_contable_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//documento_contable_webcontrol1.registrarOrderByActions();
			
		}
			
		if(documento_contable_control.htmlTablaOrderByRel!=null
			&& documento_contable_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldocumento_contableAjaxWebPart").html(documento_contable_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(documento_contable_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadocumento_contableAjaxWebPart").css("display","none");
			jQuery("#trdocumento_contableCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadocumento_contable").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(documento_contable_control) {
		jQuery("#tddocumento_contableNuevo").css("display",documento_contable_control.strPermisoNuevo);
		jQuery("#trdocumento_contableElementos").css("display",documento_contable_control.strVisibleTablaElementos);
		jQuery("#trdocumento_contableAcciones").css("display",documento_contable_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_contableParametrosAcciones").css("display",documento_contable_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(documento_contable_control) {
	
		this.actualizarCssBotonesMantenimiento(documento_contable_control);
				
		if(documento_contable_control.documento_contableActual!=null) {//form
			
			this.actualizarCamposFormulario(documento_contable_control);			
		}
						
		this.actualizarSpanMensajesCampos(documento_contable_control);
	}
	
	actualizarPaginaUsuarioInvitado(documento_contable_control) {
	
		var indexPosition=documento_contable_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=documento_contable_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(documento_contable_control) {
		jQuery("#divResumendocumento_contableActualAjaxWebPart").html(documento_contable_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_contable_control) {
		jQuery("#divAccionesRelacionesdocumento_contableAjaxWebPart").html(documento_contable_control.htmlTablaAccionesRelaciones);
			
		documento_contable_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(documento_contable_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(documento_contable_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(documento_contable_control) {
		
		if(documento_contable_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_contable_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",documento_contable_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+documento_contable_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",documento_contable_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondocumento_contable();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("documento_contable",id,"contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		documento_contable_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_contable","empresa","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(documento_contable_control) {
	
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id").val(documento_contable_control.documento_contableActual.id);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-version_row").val(documento_contable_control.documento_contableActual.versionRow);
		
		if(documento_contable_control.documento_contableActual.id_empresa!=null && documento_contable_control.documento_contableActual.id_empresa>-1){
			if(jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val() != documento_contable_control.documento_contableActual.id_empresa) {
				jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val(documento_contable_control.documento_contableActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-codigo").val(documento_contable_control.documento_contableActual.codigo);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-nombre").val(documento_contable_control.documento_contableActual.nombre);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-contador").val(documento_contable_control.documento_contableActual.contador);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-incremento").val(documento_contable_control.documento_contableActual.incremento);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-usa_contador").prop('checked',documento_contable_control.documento_contableActual.usa_contador);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-generado_por").val(documento_contable_control.documento_contableActual.generado_por);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+documento_contable_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("documento_contable","contabilidad","","form_documento_contable",formulario,"","",paraEventoTabla,idFilaTabla,documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
	}
	
	cargarCombosFK(documento_contable_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(documento_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_contable_control.strRecargarFkTipos,",")) { 
				documento_contable_webcontrol1.cargarCombosempresasFK(documento_contable_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(documento_contable_control.strRecargarFkTiposNinguno!=null && documento_contable_control.strRecargarFkTiposNinguno!='NINGUNO' && documento_contable_control.strRecargarFkTiposNinguno!='') {
			
				if(documento_contable_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",documento_contable_control.strRecargarFkTiposNinguno,",")) { 
					documento_contable_webcontrol1.cargarCombosempresasFK(documento_contable_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(documento_contable_control) {
		jQuery("#spanstrMensajeid").text(documento_contable_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(documento_contable_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(documento_contable_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(documento_contable_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(documento_contable_control.strMensajenombre);		
		jQuery("#spanstrMensajecontador").text(documento_contable_control.strMensajecontador);		
		jQuery("#spanstrMensajeincremento").text(documento_contable_control.strMensajeincremento);		
		jQuery("#spanstrMensajeusa_contador").text(documento_contable_control.strMensajeusa_contador);		
		jQuery("#spanstrMensajegenerado_por").text(documento_contable_control.strMensajegenerado_por);		
	}
	
	actualizarCssBotonesMantenimiento(documento_contable_control) {
		jQuery("#tdbtnNuevodocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodocumento_contable").css("display",documento_contable_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardocumento_contable").css("display",documento_contable_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardocumento_contable").css("display",documento_contable_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdocumento_contable").css("display",documento_contable_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionasiento_predefinido").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_contable");

			documento_contable_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});
		jQuery("#imgdivrelacionasiento").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_contable");

			documento_contable_webcontrol1.registrarSesionParaasientos(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(documento_contable_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_contable_funcion1,documento_contable_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(documento_contable_control) {
		var i=0;
		
		i=documento_contable_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(documento_contable_control.documento_contableActual.id);
		jQuery("#t-version_row_"+i+"").val(documento_contable_control.documento_contableActual.versionRow);
		
		if(documento_contable_control.documento_contableActual.id_empresa!=null && documento_contable_control.documento_contableActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != documento_contable_control.documento_contableActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(documento_contable_control.documento_contableActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(documento_contable_control.documento_contableActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(documento_contable_control.documento_contableActual.nombre);
		jQuery("#t-cel_"+i+"_5").val(documento_contable_control.documento_contableActual.contador);
		jQuery("#t-cel_"+i+"_6").val(documento_contable_control.documento_contableActual.incremento);
		jQuery("#t-cel_"+i+"_7").prop('checked',documento_contable_control.documento_contableActual.usa_contador);
		jQuery("#t-cel_"+i+"_8").val(documento_contable_control.documento_contableActual.generado_por);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(documento_contable_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_predefinido").click(function(){
		jQuery("#tblTablaDatosdocumento_contables").on("click",".imgrelacionasiento_predefinido", function () {

			var idActual=jQuery(this).attr("idactualdocumento_contable");

			documento_contable_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_origen").click(function(){
		jQuery("#tblTablaDatosdocumento_contables").on("click",".imgrelacionasiento_origen", function () {

			var idActual=jQuery(this).attr("idactualdocumento_contable");

			documento_contable_webcontrol1.registrarSesion_origenParaasientos(idActual);
		});				
	}
		
	

	registrarSesionParaasiento_predefinidos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_contable","asiento_predefinido","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,"s","");
	}

	registrarSesion_origenParaasientos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_contable","asiento","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,"s","_origen");
	}
	
	registrarControlesTableEdition(documento_contable_control) {
		documento_contable_funcion1.registrarControlesTableValidacionEdition(documento_contable_control,documento_contable_webcontrol1,documento_contable_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contableConstante,strParametros);
		
		//documento_contable_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(documento_contable_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa",documento_contable_control.empresasFK);

		if(documento_contable_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_contable_control.idFilaTablaActual+"_2",documento_contable_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(documento_contable_control) {

	};

	
	
	setDefectoValorCombosempresasFK(documento_contable_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_contable_control.idempresaDefaultFK>-1 && jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val() != documento_contable_control.idempresaDefaultFK) {
				jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val(documento_contable_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//documento_contable_control
		
	
	}
	
	onLoadCombosDefectoFK(documento_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(documento_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_contable_control.strRecargarFkTipos,",")) { 
				documento_contable_webcontrol1.setDefectoValorCombosempresasFK(documento_contable_control);
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
	onLoadCombosEventosFK(documento_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(documento_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_contable_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_contable_webcontrol1.registrarComboActionChangeCombosempresasFK(documento_contable_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(documento_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(documento_contable_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("documento_contable");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("documento_contable");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(documento_contable_funcion1,documento_contable_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(documento_contable_funcion1,documento_contable_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(documento_contable_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);			
			
			if(documento_contable_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,"documento_contable");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				documento_contable_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_contable","FK_Idempresa","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("documento_contable");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			documento_contable_funcion1.validarFormularioJQuery(documento_contable_constante1);
			
			if(documento_contable_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(documento_contable_control) {
		
		jQuery("#divBusquedadocumento_contableAjaxWebPart").css("display",documento_contable_control.strPermisoBusqueda);
		jQuery("#trdocumento_contableCabeceraBusquedas").css("display",documento_contable_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_contable").css("display",documento_contable_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedocumento_contable").css("display",documento_contable_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdocumento_contable").attr("style",documento_contable_control.strPermisoMostrarTodos);
		
		if(documento_contable_control.strPermisoNuevo!=null) {
			jQuery("#tddocumento_contableNuevo").css("display",documento_contable_control.strPermisoNuevo);
			jQuery("#tddocumento_contableNuevoToolBar").css("display",documento_contable_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddocumento_contableDuplicar").css("display",documento_contable_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_contableDuplicarToolBar").css("display",documento_contable_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_contableNuevoGuardarCambios").css("display",documento_contable_control.strPermisoNuevo);
			jQuery("#tddocumento_contableNuevoGuardarCambiosToolBar").css("display",documento_contable_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(documento_contable_control.strPermisoActualizar!=null) {
			jQuery("#tddocumento_contableActualizarToolBar").css("display",documento_contable_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_contableCopiar").css("display",documento_contable_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_contableCopiarToolBar").css("display",documento_contable_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_contableConEditar").css("display",documento_contable_control.strPermisoActualizar);
		}
		
		jQuery("#tddocumento_contableEliminarToolBar").css("display",documento_contable_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tddocumento_contableGuardarCambios").css("display",documento_contable_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddocumento_contableGuardarCambiosToolBar").css("display",documento_contable_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trdocumento_contableElementos").css("display",documento_contable_control.strVisibleTablaElementos);
		
		jQuery("#trdocumento_contableAcciones").css("display",documento_contable_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_contableParametrosAcciones").css("display",documento_contable_control.strVisibleTablaAcciones);
			
		jQuery("#tddocumento_contableCerrarPagina").css("display",documento_contable_control.strPermisoPopup);		
		jQuery("#tddocumento_contableCerrarPaginaToolBar").css("display",documento_contable_control.strPermisoPopup);
		//jQuery("#trdocumento_contableAccionesRelaciones").css("display",documento_contable_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		documento_contable_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		documento_contable_webcontrol1.registrarEventosControles();
		
		if(documento_contable_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
			documento_contable_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(documento_contable_constante1.STR_ES_RELACIONES=="true") {
			if(documento_contable_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_contable_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(documento_contable_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(documento_contable_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				documento_contable_webcontrol1.onLoad();
				
			} else {
				if(documento_contable_constante1.BIT_ES_PAGINA_FORM==true) {
					if(documento_contable_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
						//documento_contable_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(documento_contable_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(documento_contable_constante1.BIG_ID_ACTUAL,"documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
						//documento_contable_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			documento_contable_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var documento_contable_webcontrol1=new documento_contable_webcontrol();

if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = documento_contable_webcontrol1.onLoadWindow; 
}

//</script>