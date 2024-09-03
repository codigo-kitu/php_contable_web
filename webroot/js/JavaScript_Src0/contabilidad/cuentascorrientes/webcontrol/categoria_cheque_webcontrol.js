//<script type="text/javascript" language="javascript">



//var categoria_chequeJQueryPaginaWebInteraccion= function (categoria_cheque_control) {
//this.,this.,this.

class categoria_cheque_webcontrol extends categoria_cheque_webcontrol_add {
	
	categoria_cheque_control=null;
	categoria_cheque_controlInicial=null;
	categoria_cheque_controlAuxiliar=null;
		
	//if(categoria_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(categoria_cheque_control) {
		super();
		
		this.categoria_cheque_control=categoria_cheque_control;
	}
		
	actualizarVariablesPagina(categoria_cheque_control) {
		
		if(categoria_cheque_control.action=="index" || categoria_cheque_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(categoria_cheque_control);
			
		} else if(categoria_cheque_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(categoria_cheque_control);
			
		} else if(categoria_cheque_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(categoria_cheque_control);
			
		} else if(categoria_cheque_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(categoria_cheque_control);		
		
		} else if(categoria_cheque_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(categoria_cheque_control);		
		
		} else if(categoria_cheque_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_cheque_control);		
		
		} else if(categoria_cheque_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_cheque_control);		
		}
		else if(categoria_cheque_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_cheque_control);		
		}
		else if(categoria_cheque_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(categoria_cheque_control);		
		}
		else if(categoria_cheque_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_cheque_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(categoria_cheque_control.action + " Revisar Manejo");
			
			if(categoria_cheque_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(categoria_cheque_control);
				
				return;
			}
			
			//if(categoria_cheque_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(categoria_cheque_control);
			//}
			
			if(categoria_cheque_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(categoria_cheque_control);
			}
			
			if(categoria_cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_cheque_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(categoria_cheque_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(categoria_cheque_control, false);			
			}
			
			if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(categoria_cheque_control);	
			}
			
			if(categoria_cheque_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(categoria_cheque_control);
			}
			
			if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(categoria_cheque_control);
			}
			
			if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(categoria_cheque_control);
			}
			
			if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(categoria_cheque_control);	
			}
			
			if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
			}
			
			if(categoria_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(categoria_cheque_control);
			}
			
			
			if(categoria_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(categoria_cheque_control);			
			}
			
			if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(categoria_cheque_control);
			}
			
			
			if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(categoria_cheque_control);
			}
			
			if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(categoria_cheque_control);
			}				
			
			if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_cheque_control);
			}
			
			if(categoria_cheque_control.usuarioActual!=null && categoria_cheque_control.usuarioActual.field_strUserName!=null &&
			categoria_cheque_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(categoria_cheque_control);			
			}
		}
		
		
		if(categoria_cheque_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(categoria_cheque_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(categoria_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_cheque_control);
		this.actualizarPaginaTablaDatos(categoria_cheque_control);
		this.actualizarPaginaCargaGeneralControles(categoria_cheque_control);
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_cheque_control);
		this.actualizarPaginaAreaBusquedas(categoria_cheque_control);
		this.actualizarPaginaCargaCombosFK(categoria_cheque_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(categoria_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_cheque_control);
		this.actualizarPaginaTablaDatos(categoria_cheque_control);
		this.actualizarPaginaCargaGeneralControles(categoria_cheque_control);
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_cheque_control);
		this.actualizarPaginaAreaBusquedas(categoria_cheque_control);
		this.actualizarPaginaCargaCombosFK(categoria_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(categoria_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(categoria_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(categoria_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);		
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);		
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);		
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(categoria_cheque_control) {
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(categoria_cheque_control) {
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_cheque_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_cheque_control);
		this.actualizarPaginaCargaCombosFK(categoria_cheque_control);
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(categoria_cheque_control) {
		this.actualizarPaginaAbrirLink(categoria_cheque_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);				
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);
		this.actualizarPaginaFormulario(categoria_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);
		this.actualizarPaginaFormulario(categoria_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(categoria_cheque_control) {
		this.actualizarPaginaFormulario(categoria_cheque_control);
		this.onLoadCombosDefectoFK(categoria_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);
		this.actualizarPaginaFormulario(categoria_cheque_control);
		this.onLoadCombosDefectoFK(categoria_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_cheque_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_cheque_control);
		this.actualizarPaginaCargaCombosFK(categoria_cheque_control);
		this.actualizarPaginaFormulario(categoria_cheque_control);
		this.onLoadCombosDefectoFK(categoria_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(categoria_cheque_control) {
		this.actualizarPaginaAbrirLink(categoria_cheque_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(categoria_cheque_control) {
		this.actualizarPaginaImprimir(categoria_cheque_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(categoria_cheque_control) {
		this.actualizarPaginaImprimir(categoria_cheque_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_cheque_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_cheque_control) {
		//FORMULARIO
		if(categoria_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_cheque_control);
			this.actualizarPaginaFormularioAdd(categoria_cheque_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		//COMBOS FK
		if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_cheque_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(categoria_cheque_control) {
		//FORMULARIO
		if(categoria_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_cheque_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);	
		//COMBOS FK
		if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_cheque_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(categoria_cheque_control) {
		this.actualizarPaginaTablaDatos(categoria_cheque_control);
		this.actualizarPaginaFormulario(categoria_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(categoria_cheque_control) {
		//FORMULARIO
		if(categoria_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_cheque_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(categoria_cheque_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);	
		//COMBOS FK
		if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_cheque_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_cheque_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_cheque_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control) {
		if(categoria_cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_cheque_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(categoria_cheque_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(categoria_cheque_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(categoria_cheque_control) {
		if(categoria_cheque_funcion1.esPaginaForm()==true) {
			window.opener.categoria_cheque_webcontrol1.actualizarPaginaTablaDatos(categoria_cheque_control);
		} else {
			this.actualizarPaginaTablaDatos(categoria_cheque_control);
		}
	}
	
	actualizarPaginaAbrirLink(categoria_cheque_control) {
		categoria_cheque_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(categoria_cheque_control.strAuxiliarUrlPagina);
				
		categoria_cheque_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(categoria_cheque_control.strAuxiliarTipo,categoria_cheque_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(categoria_cheque_control) {
		categoria_cheque_funcion1.resaltarRestaurarDivMensaje(true,categoria_cheque_control.strAuxiliarMensajeAlert,categoria_cheque_control.strAuxiliarCssMensaje);
			
		if(categoria_cheque_funcion1.esPaginaForm()==true) {
			window.opener.categoria_cheque_funcion1.resaltarRestaurarDivMensaje(true,categoria_cheque_control.strAuxiliarMensajeAlert,categoria_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(categoria_cheque_control) {
		eval(categoria_cheque_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(categoria_cheque_control, mostrar) {
		
		if(mostrar==true) {
			categoria_cheque_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				categoria_cheque_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			categoria_cheque_funcion1.mostrarDivMensaje(true,categoria_cheque_control.strAuxiliarMensaje,categoria_cheque_control.strAuxiliarCssMensaje);
		
		} else {
			categoria_cheque_funcion1.mostrarDivMensaje(false,categoria_cheque_control.strAuxiliarMensaje,categoria_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(categoria_cheque_control) {
	
		funcionGeneral.printWebPartPage("categoria_cheque",categoria_cheque_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcategoria_chequesAjaxWebPart").html(categoria_cheque_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("categoria_cheque",jQuery("#divTablaDatosReporteAuxiliarcategoria_chequesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(categoria_cheque_control) {
		this.categoria_cheque_controlInicial=categoria_cheque_control;
			
		if(categoria_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(categoria_cheque_control.strStyleDivArbol,categoria_cheque_control.strStyleDivContent
																,categoria_cheque_control.strStyleDivOpcionesBanner,categoria_cheque_control.strStyleDivExpandirColapsar
																,categoria_cheque_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=categoria_cheque_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",categoria_cheque_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(categoria_cheque_control) {
		jQuery("#divTablaDatoscategoria_chequesAjaxWebPart").html(categoria_cheque_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscategoria_cheques=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(categoria_cheque_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscategoria_cheques=jQuery("#tblTablaDatoscategoria_cheques").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("categoria_cheque",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',categoria_cheque_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			categoria_cheque_webcontrol1.registrarControlesTableEdition(categoria_cheque_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		categoria_cheque_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(categoria_cheque_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(categoria_cheque_control.categoria_chequeActual!=null) {//form
			
			this.actualizarCamposFilaTabla(categoria_cheque_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(categoria_cheque_control) {
		this.actualizarCssBotonesPagina(categoria_cheque_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(categoria_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(categoria_cheque_control.tiposReportes,categoria_cheque_control.tiposReporte
															 	,categoria_cheque_control.tiposPaginacion,categoria_cheque_control.tiposAcciones
																,categoria_cheque_control.tiposColumnasSelect,categoria_cheque_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(categoria_cheque_control.tiposRelaciones,categoria_cheque_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(categoria_cheque_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(categoria_cheque_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(categoria_cheque_control);			
	}
	
	actualizarPaginaAreaBusquedas(categoria_cheque_control) {
		jQuery("#divBusquedacategoria_chequeAjaxWebPart").css("display",categoria_cheque_control.strPermisoBusqueda);
		jQuery("#trcategoria_chequeCabeceraBusquedas").css("display",categoria_cheque_control.strPermisoBusqueda);
		jQuery("#trBusquedacategoria_cheque").css("display",categoria_cheque_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(categoria_cheque_control.htmlTablaOrderBy!=null
			&& categoria_cheque_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycategoria_chequeAjaxWebPart").html(categoria_cheque_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//categoria_cheque_webcontrol1.registrarOrderByActions();
			
		}
			
		if(categoria_cheque_control.htmlTablaOrderByRel!=null
			&& categoria_cheque_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcategoria_chequeAjaxWebPart").html(categoria_cheque_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(categoria_cheque_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacategoria_chequeAjaxWebPart").css("display","none");
			jQuery("#trcategoria_chequeCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacategoria_cheque").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(categoria_cheque_control) {
		jQuery("#tdcategoria_chequeNuevo").css("display",categoria_cheque_control.strPermisoNuevo);
		jQuery("#trcategoria_chequeElementos").css("display",categoria_cheque_control.strVisibleTablaElementos);
		jQuery("#trcategoria_chequeAcciones").css("display",categoria_cheque_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_chequeParametrosAcciones").css("display",categoria_cheque_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(categoria_cheque_control) {
	
		this.actualizarCssBotonesMantenimiento(categoria_cheque_control);
				
		if(categoria_cheque_control.categoria_chequeActual!=null) {//form
			
			this.actualizarCamposFormulario(categoria_cheque_control);			
		}
						
		this.actualizarSpanMensajesCampos(categoria_cheque_control);
	}
	
	actualizarPaginaUsuarioInvitado(categoria_cheque_control) {
	
		var indexPosition=categoria_cheque_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=categoria_cheque_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(categoria_cheque_control) {
		jQuery("#divResumencategoria_chequeActualAjaxWebPart").html(categoria_cheque_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_cheque_control) {
		jQuery("#divAccionesRelacionescategoria_chequeAjaxWebPart").html(categoria_cheque_control.htmlTablaAccionesRelaciones);
			
		categoria_cheque_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(categoria_cheque_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(categoria_cheque_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(categoria_cheque_control) {
		
		if(categoria_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+categoria_cheque_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",categoria_cheque_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+categoria_cheque_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",categoria_cheque_control.strVisibleFK_Idcuenta);
		}

		if(categoria_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+categoria_cheque_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",categoria_cheque_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+categoria_cheque_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",categoria_cheque_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncategoria_cheque();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("categoria_cheque",id,"cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		categoria_cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("categoria_cheque","empresa","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		categoria_cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("categoria_cheque","cuenta","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(categoria_cheque_control) {
	
		jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id").val(categoria_cheque_control.categoria_chequeActual.id);
		jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-version_row").val(categoria_cheque_control.categoria_chequeActual.versionRow);
		
		if(categoria_cheque_control.categoria_chequeActual.id_empresa!=null && categoria_cheque_control.categoria_chequeActual.id_empresa>-1){
			if(jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").val() != categoria_cheque_control.categoria_chequeActual.id_empresa) {
				jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").val(categoria_cheque_control.categoria_chequeActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(categoria_cheque_control.categoria_chequeActual.id_cuenta!=null && categoria_cheque_control.categoria_chequeActual.id_cuenta>-1){
			if(jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta").val() != categoria_cheque_control.categoria_chequeActual.id_cuenta) {
				jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta").val(categoria_cheque_control.categoria_chequeActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-nombre").val(categoria_cheque_control.categoria_chequeActual.nombre);
		jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-cuenta_contable").val(categoria_cheque_control.categoria_chequeActual.cuenta_contable);
		jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-predeterminado").prop('checked',categoria_cheque_control.categoria_chequeActual.predeterminado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+categoria_cheque_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("categoria_cheque","cuentascorrientes","","form_categoria_cheque",formulario,"","",paraEventoTabla,idFilaTabla,categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
	}
	
	cargarCombosFK(categoria_cheque_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(categoria_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",categoria_cheque_control.strRecargarFkTipos,",")) { 
				categoria_cheque_webcontrol1.cargarCombosempresasFK(categoria_cheque_control);
			}

			if(categoria_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",categoria_cheque_control.strRecargarFkTipos,",")) { 
				categoria_cheque_webcontrol1.cargarComboscuentasFK(categoria_cheque_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(categoria_cheque_control.strRecargarFkTiposNinguno!=null && categoria_cheque_control.strRecargarFkTiposNinguno!='NINGUNO' && categoria_cheque_control.strRecargarFkTiposNinguno!='') {
			
				if(categoria_cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",categoria_cheque_control.strRecargarFkTiposNinguno,",")) { 
					categoria_cheque_webcontrol1.cargarCombosempresasFK(categoria_cheque_control);
				}

				if(categoria_cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",categoria_cheque_control.strRecargarFkTiposNinguno,",")) { 
					categoria_cheque_webcontrol1.cargarComboscuentasFK(categoria_cheque_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(categoria_cheque_control) {
		jQuery("#spanstrMensajeid").text(categoria_cheque_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(categoria_cheque_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(categoria_cheque_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_cuenta").text(categoria_cheque_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajenombre").text(categoria_cheque_control.strMensajenombre);		
		jQuery("#spanstrMensajecuenta_contable").text(categoria_cheque_control.strMensajecuenta_contable);		
		jQuery("#spanstrMensajepredeterminado").text(categoria_cheque_control.strMensajepredeterminado);		
	}
	
	actualizarCssBotonesMantenimiento(categoria_cheque_control) {
		jQuery("#tdbtnNuevocategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocategoria_cheque").css("display",categoria_cheque_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcategoria_cheque").css("display",categoria_cheque_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcategoria_cheque").css("display",categoria_cheque_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscategoria_cheque").css("display",categoria_cheque_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionclasificacion_cheque").click(function(){

			var idActual=jQuery(this).attr("idactualcategoria_cheque");

			categoria_cheque_webcontrol1.registrarSesionParaclasificacion_cheques(idActual);
		});
		jQuery("#imgdivrelacioncheque").click(function(){

			var idActual=jQuery(this).attr("idactualcategoria_cheque");

			categoria_cheque_webcontrol1.registrarSesionParacheques(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(categoria_cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,categoria_cheque_funcion1,categoria_cheque_control.empresasFK);
	}

	cargarComboEditarTablacuentaFK(categoria_cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,categoria_cheque_funcion1,categoria_cheque_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(categoria_cheque_control) {
		var i=0;
		
		i=categoria_cheque_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(categoria_cheque_control.categoria_chequeActual.id);
		jQuery("#t-version_row_"+i+"").val(categoria_cheque_control.categoria_chequeActual.versionRow);
		
		if(categoria_cheque_control.categoria_chequeActual.id_empresa!=null && categoria_cheque_control.categoria_chequeActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != categoria_cheque_control.categoria_chequeActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(categoria_cheque_control.categoria_chequeActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(categoria_cheque_control.categoria_chequeActual.id_cuenta!=null && categoria_cheque_control.categoria_chequeActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != categoria_cheque_control.categoria_chequeActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_3").val(categoria_cheque_control.categoria_chequeActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_3").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(categoria_cheque_control.categoria_chequeActual.nombre);
		jQuery("#t-cel_"+i+"_5").val(categoria_cheque_control.categoria_chequeActual.cuenta_contable);
		jQuery("#t-cel_"+i+"_6").prop('checked',categoria_cheque_control.categoria_chequeActual.predeterminado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(categoria_cheque_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionclasificacion_cheque").click(function(){
		jQuery("#tblTablaDatoscategoria_cheques").on("click",".imgrelacionclasificacion_cheque", function () {

			var idActual=jQuery(this).attr("idactualcategoria_cheque");

			categoria_cheque_webcontrol1.registrarSesionParaclasificacion_cheques(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncheque").click(function(){
		jQuery("#tblTablaDatoscategoria_cheques").on("click",".imgrelacioncheque", function () {

			var idActual=jQuery(this).attr("idactualcategoria_cheque");

			categoria_cheque_webcontrol1.registrarSesionParacheques(idActual);
		});				
	}
		
	

	registrarSesionParaclasificacion_cheques(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"categoria_cheque","clasificacion_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,"s","");
	}

	registrarSesionParacheques(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"categoria_cheque","cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(categoria_cheque_control) {
		categoria_cheque_funcion1.registrarControlesTableValidacionEdition(categoria_cheque_control,categoria_cheque_webcontrol1,categoria_cheque_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_chequeConstante,strParametros);
		
		//categoria_cheque_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(categoria_cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa",categoria_cheque_control.empresasFK);

		if(categoria_cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+categoria_cheque_control.idFilaTablaActual+"_2",categoria_cheque_control.empresasFK);
		}
	};

	cargarComboscuentasFK(categoria_cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta",categoria_cheque_control.cuentasFK);

		if(categoria_cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+categoria_cheque_control.idFilaTablaActual+"_3",categoria_cheque_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+categoria_cheque_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",categoria_cheque_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(categoria_cheque_control) {

	};

	registrarComboActionChangeComboscuentasFK(categoria_cheque_control) {

	};

	
	
	setDefectoValorCombosempresasFK(categoria_cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(categoria_cheque_control.idempresaDefaultFK>-1 && jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").val() != categoria_cheque_control.idempresaDefaultFK) {
				jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").val(categoria_cheque_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(categoria_cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(categoria_cheque_control.idcuentaDefaultFK>-1 && jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta").val() != categoria_cheque_control.idcuentaDefaultFK) {
				jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta").val(categoria_cheque_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+categoria_cheque_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(categoria_cheque_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+categoria_cheque_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+categoria_cheque_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//categoria_cheque_control
		
	
	}
	
	onLoadCombosDefectoFK(categoria_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(categoria_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",categoria_cheque_control.strRecargarFkTipos,",")) { 
				categoria_cheque_webcontrol1.setDefectoValorCombosempresasFK(categoria_cheque_control);
			}

			if(categoria_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",categoria_cheque_control.strRecargarFkTipos,",")) { 
				categoria_cheque_webcontrol1.setDefectoValorComboscuentasFK(categoria_cheque_control);
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
	onLoadCombosEventosFK(categoria_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(categoria_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",categoria_cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				categoria_cheque_webcontrol1.registrarComboActionChangeCombosempresasFK(categoria_cheque_control);
			//}

			//if(categoria_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",categoria_cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				categoria_cheque_webcontrol1.registrarComboActionChangeComboscuentasFK(categoria_cheque_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(categoria_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(categoria_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("categoria_cheque");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("categoria_cheque");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(categoria_cheque_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);			
			
			if(categoria_cheque_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,"categoria_cheque");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				categoria_cheque_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				categoria_cheque_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("categoria_cheque","FK_Idcuenta","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("categoria_cheque","FK_Idempresa","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("categoria_cheque");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			categoria_cheque_funcion1.validarFormularioJQuery(categoria_cheque_constante1);
			
			if(categoria_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(categoria_cheque_control) {
		
		jQuery("#divBusquedacategoria_chequeAjaxWebPart").css("display",categoria_cheque_control.strPermisoBusqueda);
		jQuery("#trcategoria_chequeCabeceraBusquedas").css("display",categoria_cheque_control.strPermisoBusqueda);
		jQuery("#trBusquedacategoria_cheque").css("display",categoria_cheque_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecategoria_cheque").css("display",categoria_cheque_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscategoria_cheque").attr("style",categoria_cheque_control.strPermisoMostrarTodos);
		
		if(categoria_cheque_control.strPermisoNuevo!=null) {
			jQuery("#tdcategoria_chequeNuevo").css("display",categoria_cheque_control.strPermisoNuevo);
			jQuery("#tdcategoria_chequeNuevoToolBar").css("display",categoria_cheque_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcategoria_chequeDuplicar").css("display",categoria_cheque_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcategoria_chequeDuplicarToolBar").css("display",categoria_cheque_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcategoria_chequeNuevoGuardarCambios").css("display",categoria_cheque_control.strPermisoNuevo);
			jQuery("#tdcategoria_chequeNuevoGuardarCambiosToolBar").css("display",categoria_cheque_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(categoria_cheque_control.strPermisoActualizar!=null) {
			jQuery("#tdcategoria_chequeActualizarToolBar").css("display",categoria_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_chequeCopiar").css("display",categoria_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_chequeCopiarToolBar").css("display",categoria_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_chequeConEditar").css("display",categoria_cheque_control.strPermisoActualizar);
		}
		
		jQuery("#tdcategoria_chequeEliminarToolBar").css("display",categoria_cheque_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcategoria_chequeGuardarCambios").css("display",categoria_cheque_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcategoria_chequeGuardarCambiosToolBar").css("display",categoria_cheque_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcategoria_chequeElementos").css("display",categoria_cheque_control.strVisibleTablaElementos);
		
		jQuery("#trcategoria_chequeAcciones").css("display",categoria_cheque_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_chequeParametrosAcciones").css("display",categoria_cheque_control.strVisibleTablaAcciones);
			
		jQuery("#tdcategoria_chequeCerrarPagina").css("display",categoria_cheque_control.strPermisoPopup);		
		jQuery("#tdcategoria_chequeCerrarPaginaToolBar").css("display",categoria_cheque_control.strPermisoPopup);
		//jQuery("#trcategoria_chequeAccionesRelaciones").css("display",categoria_cheque_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		categoria_cheque_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		categoria_cheque_webcontrol1.registrarEventosControles();
		
		if(categoria_cheque_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(categoria_cheque_constante1.STR_ES_RELACIONADO=="false") {
			categoria_cheque_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(categoria_cheque_constante1.STR_ES_RELACIONES=="true") {
			if(categoria_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_cheque_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(categoria_cheque_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(categoria_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				categoria_cheque_webcontrol1.onLoad();
				
			} else {
				if(categoria_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
					if(categoria_cheque_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
						//categoria_cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(categoria_cheque_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(categoria_cheque_constante1.BIG_ID_ACTUAL,"categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
						//categoria_cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			categoria_cheque_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var categoria_cheque_webcontrol1=new categoria_cheque_webcontrol();

if(categoria_cheque_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = categoria_cheque_webcontrol1.onLoadWindow; 
}

//</script>