//<script type="text/javascript" language="javascript">



//var lote_productoJQueryPaginaWebInteraccion= function (lote_producto_control) {
//this.,this.,this.

class lote_producto_webcontrol extends lote_producto_webcontrol_add {
	
	lote_producto_control=null;
	lote_producto_controlInicial=null;
	lote_producto_controlAuxiliar=null;
		
	//if(lote_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(lote_producto_control) {
		super();
		
		this.lote_producto_control=lote_producto_control;
	}
		
	actualizarVariablesPagina(lote_producto_control) {
		
		if(lote_producto_control.action=="index" || lote_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(lote_producto_control);
			
		} else if(lote_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(lote_producto_control);
		
		} else if(lote_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(lote_producto_control);
		
		} else if(lote_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(lote_producto_control);
		
		} else if(lote_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(lote_producto_control);
			
		} else if(lote_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(lote_producto_control);
			
		} else if(lote_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(lote_producto_control);
		
		} else if(lote_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(lote_producto_control);
		
		} else if(lote_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(lote_producto_control);
		
		} else if(lote_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(lote_producto_control);
		
		} else if(lote_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(lote_producto_control);
		
		} else if(lote_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(lote_producto_control);
		
		} else if(lote_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(lote_producto_control);
		
		} else if(lote_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(lote_producto_control);
		
		} else if(lote_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(lote_producto_control);
		
		} else if(lote_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(lote_producto_control);
		
		} else if(lote_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(lote_producto_control);
		
		} else if(lote_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(lote_producto_control);
		
		} else if(lote_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(lote_producto_control);
		
		} else if(lote_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(lote_producto_control);
		
		} else if(lote_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(lote_producto_control);
		
		} else if(lote_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(lote_producto_control);
		
		} else if(lote_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(lote_producto_control);
		
		} else if(lote_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(lote_producto_control);
		
		} else if(lote_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(lote_producto_control);
		
		} else if(lote_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(lote_producto_control);
		
		} else if(lote_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(lote_producto_control);
		
		} else if(lote_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(lote_producto_control);		
		
		} else if(lote_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(lote_producto_control);		
		
		} else if(lote_producto_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(lote_producto_control);		
		
		} else if(lote_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(lote_producto_control);		
		}
		else if(lote_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(lote_producto_control);		
		}
		else if(lote_producto_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(lote_producto_control);		
		}
		else if(lote_producto_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(lote_producto_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(lote_producto_control.action + " Revisar Manejo");
			
			if(lote_producto_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(lote_producto_control);
				
				return;
			}
			
			//if(lote_producto_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(lote_producto_control);
			//}
			
			if(lote_producto_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(lote_producto_control);
			}
			
			if(lote_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && lote_producto_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(lote_producto_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(lote_producto_control, false);			
			}
			
			if(lote_producto_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(lote_producto_control);	
			}
			
			if(lote_producto_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(lote_producto_control);
			}
			
			if(lote_producto_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(lote_producto_control);
			}
			
			if(lote_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(lote_producto_control);
			}
			
			if(lote_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(lote_producto_control);	
			}
			
			if(lote_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(lote_producto_control);
			}
			
			if(lote_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(lote_producto_control);
			}
			
			
			if(lote_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(lote_producto_control);			
			}
			
			if(lote_producto_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(lote_producto_control);
			}
			
			
			if(lote_producto_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(lote_producto_control);
			}
			
			if(lote_producto_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(lote_producto_control);
			}				
			
			if(lote_producto_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(lote_producto_control);
			}
			
			if(lote_producto_control.usuarioActual!=null && lote_producto_control.usuarioActual.field_strUserName!=null &&
			lote_producto_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(lote_producto_control);			
			}
		}
		
		
		if(lote_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(lote_producto_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(lote_producto_control) {
		
		this.actualizarPaginaCargaGeneral(lote_producto_control);
		this.actualizarPaginaTablaDatos(lote_producto_control);
		this.actualizarPaginaCargaGeneralControles(lote_producto_control);
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(lote_producto_control);
		this.actualizarPaginaAreaBusquedas(lote_producto_control);
		this.actualizarPaginaCargaCombosFK(lote_producto_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(lote_producto_control) {
		
		this.actualizarPaginaCargaGeneral(lote_producto_control);
		this.actualizarPaginaTablaDatos(lote_producto_control);
		this.actualizarPaginaCargaGeneralControles(lote_producto_control);
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(lote_producto_control);
		this.actualizarPaginaAreaBusquedas(lote_producto_control);
		this.actualizarPaginaCargaCombosFK(lote_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(lote_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lote_producto_control);		
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(lote_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lote_producto_control);		
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(lote_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lote_producto_control);		
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);		
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);		
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);		
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(lote_producto_control) {
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(lote_producto_control) {
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(lote_producto_control) {
		this.actualizarPaginaCargaGeneralControles(lote_producto_control);
		this.actualizarPaginaCargaCombosFK(lote_producto_control);
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(lote_producto_control) {
		this.actualizarPaginaAbrirLink(lote_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);				
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);
		this.actualizarPaginaFormulario(lote_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);
		this.actualizarPaginaFormulario(lote_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(lote_producto_control) {
		this.actualizarPaginaFormulario(lote_producto_control);
		this.onLoadCombosDefectoFK(lote_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);
		this.actualizarPaginaFormulario(lote_producto_control);
		this.onLoadCombosDefectoFK(lote_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(lote_producto_control) {
		this.actualizarPaginaCargaGeneralControles(lote_producto_control);
		this.actualizarPaginaCargaCombosFK(lote_producto_control);
		this.actualizarPaginaFormulario(lote_producto_control);
		this.onLoadCombosDefectoFK(lote_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(lote_producto_control) {
		this.actualizarPaginaAbrirLink(lote_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(lote_producto_control) {
		this.actualizarPaginaImprimir(lote_producto_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(lote_producto_control) {
		this.actualizarPaginaImprimir(lote_producto_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(lote_producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(lote_producto_control) {
		//FORMULARIO
		if(lote_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lote_producto_control);
			this.actualizarPaginaFormularioAdd(lote_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		//COMBOS FK
		if(lote_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lote_producto_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(lote_producto_control) {
		//FORMULARIO
		if(lote_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lote_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);	
		//COMBOS FK
		if(lote_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lote_producto_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(lote_producto_control) {
		this.actualizarPaginaTablaDatos(lote_producto_control);
		this.actualizarPaginaFormulario(lote_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(lote_producto_control) {
		//FORMULARIO
		if(lote_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lote_producto_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(lote_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);	
		//COMBOS FK
		if(lote_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lote_producto_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(lote_producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(lote_producto_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(lote_producto_control) {
		if(lote_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && lote_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(lote_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(lote_producto_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(lote_producto_control) {
		if(lote_producto_funcion1.esPaginaForm()==true) {
			window.opener.lote_producto_webcontrol1.actualizarPaginaTablaDatos(lote_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(lote_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(lote_producto_control) {
		lote_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(lote_producto_control.strAuxiliarUrlPagina);
				
		lote_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(lote_producto_control.strAuxiliarTipo,lote_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(lote_producto_control) {
		lote_producto_funcion1.resaltarRestaurarDivMensaje(true,lote_producto_control.strAuxiliarMensajeAlert,lote_producto_control.strAuxiliarCssMensaje);
			
		if(lote_producto_funcion1.esPaginaForm()==true) {
			window.opener.lote_producto_funcion1.resaltarRestaurarDivMensaje(true,lote_producto_control.strAuxiliarMensajeAlert,lote_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(lote_producto_control) {
		eval(lote_producto_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(lote_producto_control, mostrar) {
		
		if(mostrar==true) {
			lote_producto_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				lote_producto_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			lote_producto_funcion1.mostrarDivMensaje(true,lote_producto_control.strAuxiliarMensaje,lote_producto_control.strAuxiliarCssMensaje);
		
		} else {
			lote_producto_funcion1.mostrarDivMensaje(false,lote_producto_control.strAuxiliarMensaje,lote_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(lote_producto_control) {
	
		funcionGeneral.printWebPartPage("lote_producto",lote_producto_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarlote_productosAjaxWebPart").html(lote_producto_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("lote_producto",jQuery("#divTablaDatosReporteAuxiliarlote_productosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(lote_producto_control) {
		this.lote_producto_controlInicial=lote_producto_control;
			
		if(lote_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(lote_producto_control.strStyleDivArbol,lote_producto_control.strStyleDivContent
																,lote_producto_control.strStyleDivOpcionesBanner,lote_producto_control.strStyleDivExpandirColapsar
																,lote_producto_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=lote_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",lote_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(lote_producto_control) {
		jQuery("#divTablaDatoslote_productosAjaxWebPart").html(lote_producto_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoslote_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(lote_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoslote_productos=jQuery("#tblTablaDatoslote_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("lote_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',lote_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			lote_producto_webcontrol1.registrarControlesTableEdition(lote_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		lote_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(lote_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(lote_producto_control.lote_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(lote_producto_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(lote_producto_control) {
		this.actualizarCssBotonesPagina(lote_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(lote_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(lote_producto_control.tiposReportes,lote_producto_control.tiposReporte
															 	,lote_producto_control.tiposPaginacion,lote_producto_control.tiposAcciones
																,lote_producto_control.tiposColumnasSelect,lote_producto_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(lote_producto_control.tiposRelaciones,lote_producto_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(lote_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(lote_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(lote_producto_control);			
	}
	
	actualizarPaginaAreaBusquedas(lote_producto_control) {
		jQuery("#divBusquedalote_productoAjaxWebPart").css("display",lote_producto_control.strPermisoBusqueda);
		jQuery("#trlote_productoCabeceraBusquedas").css("display",lote_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedalote_producto").css("display",lote_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(lote_producto_control.htmlTablaOrderBy!=null
			&& lote_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBylote_productoAjaxWebPart").html(lote_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//lote_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(lote_producto_control.htmlTablaOrderByRel!=null
			&& lote_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRellote_productoAjaxWebPart").html(lote_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(lote_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedalote_productoAjaxWebPart").css("display","none");
			jQuery("#trlote_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedalote_producto").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(lote_producto_control) {
		jQuery("#tdlote_productoNuevo").css("display",lote_producto_control.strPermisoNuevo);
		jQuery("#trlote_productoElementos").css("display",lote_producto_control.strVisibleTablaElementos);
		jQuery("#trlote_productoAcciones").css("display",lote_producto_control.strVisibleTablaAcciones);
		jQuery("#trlote_productoParametrosAcciones").css("display",lote_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(lote_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(lote_producto_control);
				
		if(lote_producto_control.lote_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(lote_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(lote_producto_control);
	}
	
	actualizarPaginaUsuarioInvitado(lote_producto_control) {
	
		var indexPosition=lote_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=lote_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(lote_producto_control) {
		jQuery("#divResumenlote_productoActualAjaxWebPart").html(lote_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(lote_producto_control) {
		jQuery("#divAccionesRelacioneslote_productoAjaxWebPart").html(lote_producto_control.htmlTablaAccionesRelaciones);
			
		lote_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(lote_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(lote_producto_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(lote_producto_control) {
		
		if(lote_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lote_producto_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",lote_producto_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+lote_producto_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",lote_producto_control.strVisibleFK_Idbodega);
		}

		if(lote_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lote_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",lote_producto_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+lote_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",lote_producto_control.strVisibleFK_Idproducto);
		}

		if(lote_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lote_producto_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",lote_producto_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+lote_producto_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",lote_producto_control.strVisibleFK_Idproveedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionlote_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("lote_producto",id,"inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);		
	}
	
	

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		lote_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lote_producto","producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		lote_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lote_producto","bodega","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		lote_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lote_producto","proveedor","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(lote_producto_control) {
	
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id").val(lote_producto_control.lote_productoActual.id);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-version_row").val(lote_producto_control.lote_productoActual.versionRow);
		
		if(lote_producto_control.lote_productoActual.id_producto!=null && lote_producto_control.lote_productoActual.id_producto>-1){
			if(jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").val() != lote_producto_control.lote_productoActual.id_producto) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").val(lote_producto_control.lote_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-nro_lote").val(lote_producto_control.lote_productoActual.nro_lote);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-descripcion").val(lote_producto_control.lote_productoActual.descripcion);
		
		if(lote_producto_control.lote_productoActual.id_bodega!=null && lote_producto_control.lote_productoActual.id_bodega>-1){
			if(jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").val() != lote_producto_control.lote_productoActual.id_bodega) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").val(lote_producto_control.lote_productoActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-fecha_ingreso").val(lote_producto_control.lote_productoActual.fecha_ingreso);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-fecha_expiracion").val(lote_producto_control.lote_productoActual.fecha_expiracion);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-ubicacion").val(lote_producto_control.lote_productoActual.ubicacion);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-cantidad").val(lote_producto_control.lote_productoActual.cantidad);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-comentario").val(lote_producto_control.lote_productoActual.comentario);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-nro_documento").val(lote_producto_control.lote_productoActual.nro_documento);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-disponible").val(lote_producto_control.lote_productoActual.disponible);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-agotado_en").val(lote_producto_control.lote_productoActual.agotado_en);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-nro_item").val(lote_producto_control.lote_productoActual.nro_item);
		
		if(lote_producto_control.lote_productoActual.id_proveedor!=null && lote_producto_control.lote_productoActual.id_proveedor>-1){
			if(jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").val() != lote_producto_control.lote_productoActual.id_proveedor) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").val(lote_producto_control.lote_productoActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+lote_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("lote_producto","inventario","","form_lote_producto",formulario,"","",paraEventoTabla,idFilaTabla,lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
	}
	
	cargarCombosFK(lote_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lote_producto_control.strRecargarFkTipos,",")) { 
				lote_producto_webcontrol1.cargarCombosproductosFK(lote_producto_control);
			}

			if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lote_producto_control.strRecargarFkTipos,",")) { 
				lote_producto_webcontrol1.cargarCombosbodegasFK(lote_producto_control);
			}

			if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",lote_producto_control.strRecargarFkTipos,",")) { 
				lote_producto_webcontrol1.cargarCombosproveedorsFK(lote_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(lote_producto_control.strRecargarFkTiposNinguno!=null && lote_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && lote_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(lote_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",lote_producto_control.strRecargarFkTiposNinguno,",")) { 
					lote_producto_webcontrol1.cargarCombosproductosFK(lote_producto_control);
				}

				if(lote_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",lote_producto_control.strRecargarFkTiposNinguno,",")) { 
					lote_producto_webcontrol1.cargarCombosbodegasFK(lote_producto_control);
				}

				if(lote_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",lote_producto_control.strRecargarFkTiposNinguno,",")) { 
					lote_producto_webcontrol1.cargarCombosproveedorsFK(lote_producto_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(lote_producto_control) {
		jQuery("#spanstrMensajeid").text(lote_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(lote_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_producto").text(lote_producto_control.strMensajeid_producto);		
		jQuery("#spanstrMensajenro_lote").text(lote_producto_control.strMensajenro_lote);		
		jQuery("#spanstrMensajedescripcion").text(lote_producto_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_bodega").text(lote_producto_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajefecha_ingreso").text(lote_producto_control.strMensajefecha_ingreso);		
		jQuery("#spanstrMensajefecha_expiracion").text(lote_producto_control.strMensajefecha_expiracion);		
		jQuery("#spanstrMensajeubicacion").text(lote_producto_control.strMensajeubicacion);		
		jQuery("#spanstrMensajecantidad").text(lote_producto_control.strMensajecantidad);		
		jQuery("#spanstrMensajecomentario").text(lote_producto_control.strMensajecomentario);		
		jQuery("#spanstrMensajenro_documento").text(lote_producto_control.strMensajenro_documento);		
		jQuery("#spanstrMensajedisponible").text(lote_producto_control.strMensajedisponible);		
		jQuery("#spanstrMensajeagotado_en").text(lote_producto_control.strMensajeagotado_en);		
		jQuery("#spanstrMensajenro_item").text(lote_producto_control.strMensajenro_item);		
		jQuery("#spanstrMensajeid_proveedor").text(lote_producto_control.strMensajeid_proveedor);		
	}
	
	actualizarCssBotonesMantenimiento(lote_producto_control) {
		jQuery("#tdbtnNuevolote_producto").css("visibility",lote_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevolote_producto").css("display",lote_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarlote_producto").css("visibility",lote_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarlote_producto").css("display",lote_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarlote_producto").css("visibility",lote_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarlote_producto").css("display",lote_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarlote_producto").css("visibility",lote_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioslote_producto").css("visibility",lote_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioslote_producto").css("display",lote_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarlote_producto").css("visibility",lote_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarlote_producto").css("visibility",lote_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarlote_producto").css("visibility",lote_producto_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionkardex_detalle").click(function(){

			var idActual=jQuery(this).attr("idactuallote_producto");

			lote_producto_webcontrol1.registrarSesionParakardex_detalles(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproductoFK(lote_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lote_producto_funcion1,lote_producto_control.productosFK);
	}

	cargarComboEditarTablabodegaFK(lote_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lote_producto_funcion1,lote_producto_control.bodegasFK);
	}

	cargarComboEditarTablaproveedorFK(lote_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lote_producto_funcion1,lote_producto_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(lote_producto_control) {
		var i=0;
		
		i=lote_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(lote_producto_control.lote_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(lote_producto_control.lote_productoActual.versionRow);
		
		if(lote_producto_control.lote_productoActual.id_producto!=null && lote_producto_control.lote_productoActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != lote_producto_control.lote_productoActual.id_producto) {
				jQuery("#t-cel_"+i+"_2").val(lote_producto_control.lote_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(lote_producto_control.lote_productoActual.nro_lote);
		jQuery("#t-cel_"+i+"_4").val(lote_producto_control.lote_productoActual.descripcion);
		
		if(lote_producto_control.lote_productoActual.id_bodega!=null && lote_producto_control.lote_productoActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != lote_producto_control.lote_productoActual.id_bodega) {
				jQuery("#t-cel_"+i+"_5").val(lote_producto_control.lote_productoActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(lote_producto_control.lote_productoActual.fecha_ingreso);
		jQuery("#t-cel_"+i+"_7").val(lote_producto_control.lote_productoActual.fecha_expiracion);
		jQuery("#t-cel_"+i+"_8").val(lote_producto_control.lote_productoActual.ubicacion);
		jQuery("#t-cel_"+i+"_9").val(lote_producto_control.lote_productoActual.cantidad);
		jQuery("#t-cel_"+i+"_10").val(lote_producto_control.lote_productoActual.comentario);
		jQuery("#t-cel_"+i+"_11").val(lote_producto_control.lote_productoActual.nro_documento);
		jQuery("#t-cel_"+i+"_12").val(lote_producto_control.lote_productoActual.disponible);
		jQuery("#t-cel_"+i+"_13").val(lote_producto_control.lote_productoActual.agotado_en);
		jQuery("#t-cel_"+i+"_14").val(lote_producto_control.lote_productoActual.nro_item);
		
		if(lote_producto_control.lote_productoActual.id_proveedor!=null && lote_producto_control.lote_productoActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_15").val() != lote_producto_control.lote_productoActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_15").val(lote_producto_control.lote_productoActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_15").select2("val", null);
			if(jQuery("#t-cel_"+i+"_15").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_15").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(lote_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionkardex_detalle").click(function(){
		jQuery("#tblTablaDatoslote_productos").on("click",".imgrelacionkardex_detalle", function () {

			var idActual=jQuery(this).attr("idactuallote_producto");

			lote_producto_webcontrol1.registrarSesionParakardex_detalles(idActual);
		});				
	}
		
	

	registrarSesionParakardex_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"lote_producto","kardex_detalle","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(lote_producto_control) {
		lote_producto_funcion1.registrarControlesTableValidacionEdition(lote_producto_control,lote_producto_webcontrol1,lote_producto_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_productoConstante,strParametros);
		
		//lote_producto_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosproductosFK(lote_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto",lote_producto_control.productosFK);

		if(lote_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lote_producto_control.idFilaTablaActual+"_2",lote_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",lote_producto_control.productosFK);

	};

	cargarCombosbodegasFK(lote_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega",lote_producto_control.bodegasFK);

		if(lote_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lote_producto_control.idFilaTablaActual+"_5",lote_producto_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",lote_producto_control.bodegasFK);

	};

	cargarCombosproveedorsFK(lote_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor",lote_producto_control.proveedorsFK);

		if(lote_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lote_producto_control.idFilaTablaActual+"_15",lote_producto_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",lote_producto_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(lote_producto_control) {

	};

	registrarComboActionChangeCombosbodegasFK(lote_producto_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(lote_producto_control) {

	};

	
	
	setDefectoValorCombosproductosFK(lote_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lote_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").val() != lote_producto_control.idproductoDefaultFK) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").val(lote_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(lote_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(lote_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lote_producto_control.idbodegaDefaultFK>-1 && jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").val() != lote_producto_control.idbodegaDefaultFK) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").val(lote_producto_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(lote_producto_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(lote_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lote_producto_control.idproveedorDefaultFK>-1 && jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").val() != lote_producto_control.idproveedorDefaultFK) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").val(lote_producto_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(lote_producto_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//lote_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(lote_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lote_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lote_producto_control.strRecargarFkTipos,",")) { 
				lote_producto_webcontrol1.setDefectoValorCombosproductosFK(lote_producto_control);
			}

			if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lote_producto_control.strRecargarFkTipos,",")) { 
				lote_producto_webcontrol1.setDefectoValorCombosbodegasFK(lote_producto_control);
			}

			if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",lote_producto_control.strRecargarFkTipos,",")) { 
				lote_producto_webcontrol1.setDefectoValorCombosproveedorsFK(lote_producto_control);
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
	onLoadCombosEventosFK(lote_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lote_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lote_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lote_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(lote_producto_control);
			//}

			//if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lote_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lote_producto_webcontrol1.registrarComboActionChangeCombosbodegasFK(lote_producto_control);
			//}

			//if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",lote_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lote_producto_webcontrol1.registrarComboActionChangeCombosproveedorsFK(lote_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(lote_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lote_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(lote_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("lote_producto");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("lote_producto");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(lote_producto_funcion1,lote_producto_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(lote_producto_funcion1,lote_producto_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(lote_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);			
			
			if(lote_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,"lote_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				lote_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				lote_producto_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				lote_producto_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("lote_producto","FK_Idbodega","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lote_producto","FK_Idproducto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lote_producto","FK_Idproveedor","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("lote_producto");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			lote_producto_funcion1.validarFormularioJQuery(lote_producto_constante1);
			
			if(lote_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(lote_producto_control) {
		
		jQuery("#divBusquedalote_productoAjaxWebPart").css("display",lote_producto_control.strPermisoBusqueda);
		jQuery("#trlote_productoCabeceraBusquedas").css("display",lote_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedalote_producto").css("display",lote_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportelote_producto").css("display",lote_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoslote_producto").attr("style",lote_producto_control.strPermisoMostrarTodos);
		
		if(lote_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdlote_productoNuevo").css("display",lote_producto_control.strPermisoNuevo);
			jQuery("#tdlote_productoNuevoToolBar").css("display",lote_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdlote_productoDuplicar").css("display",lote_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlote_productoDuplicarToolBar").css("display",lote_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlote_productoNuevoGuardarCambios").css("display",lote_producto_control.strPermisoNuevo);
			jQuery("#tdlote_productoNuevoGuardarCambiosToolBar").css("display",lote_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(lote_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdlote_productoActualizarToolBar").css("display",lote_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlote_productoCopiar").css("display",lote_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlote_productoCopiarToolBar").css("display",lote_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlote_productoConEditar").css("display",lote_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdlote_productoEliminarToolBar").css("display",lote_producto_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdlote_productoGuardarCambios").css("display",lote_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdlote_productoGuardarCambiosToolBar").css("display",lote_producto_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trlote_productoElementos").css("display",lote_producto_control.strVisibleTablaElementos);
		
		jQuery("#trlote_productoAcciones").css("display",lote_producto_control.strVisibleTablaAcciones);
		jQuery("#trlote_productoParametrosAcciones").css("display",lote_producto_control.strVisibleTablaAcciones);
			
		jQuery("#tdlote_productoCerrarPagina").css("display",lote_producto_control.strPermisoPopup);		
		jQuery("#tdlote_productoCerrarPaginaToolBar").css("display",lote_producto_control.strPermisoPopup);
		//jQuery("#trlote_productoAccionesRelaciones").css("display",lote_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		lote_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		lote_producto_webcontrol1.registrarEventosControles();
		
		if(lote_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(lote_producto_constante1.STR_ES_RELACIONADO=="false") {
			lote_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(lote_producto_constante1.STR_ES_RELACIONES=="true") {
			if(lote_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				lote_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(lote_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(lote_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				lote_producto_webcontrol1.onLoad();
				
			} else {
				if(lote_producto_constante1.BIT_ES_PAGINA_FORM==true) {
					if(lote_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
						//lote_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(lote_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(lote_producto_constante1.BIG_ID_ACTUAL,"lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
						//lote_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			lote_producto_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var lote_producto_webcontrol1=new lote_producto_webcontrol();

if(lote_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = lote_producto_webcontrol1.onLoadWindow; 
}

//</script>