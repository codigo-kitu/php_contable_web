//<script type="text/javascript" language="javascript">



//var instrumento_pagoJQueryPaginaWebInteraccion= function (instrumento_pago_control) {
//this.,this.,this.

class instrumento_pago_webcontrol extends instrumento_pago_webcontrol_add {
	
	instrumento_pago_control=null;
	instrumento_pago_controlInicial=null;
	instrumento_pago_controlAuxiliar=null;
		
	//if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(instrumento_pago_control) {
		super();
		
		this.instrumento_pago_control=instrumento_pago_control;
	}
		
	actualizarVariablesPagina(instrumento_pago_control) {
		
		if(instrumento_pago_control.action=="index" || instrumento_pago_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(instrumento_pago_control);
			
		} else if(instrumento_pago_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(instrumento_pago_control);
			
		} else if(instrumento_pago_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(instrumento_pago_control);
			
		} else if(instrumento_pago_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(instrumento_pago_control);		
		
		} else if(instrumento_pago_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(instrumento_pago_control);		
		
		} else if(instrumento_pago_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(instrumento_pago_control);		
		
		} else if(instrumento_pago_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(instrumento_pago_control);		
		}
		else if(instrumento_pago_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(instrumento_pago_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(instrumento_pago_control.action + " Revisar Manejo");
			
			if(instrumento_pago_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(instrumento_pago_control);
				
				return;
			}
			
			//if(instrumento_pago_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(instrumento_pago_control);
			//}
			
			if(instrumento_pago_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(instrumento_pago_control);
			}
			
			if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && instrumento_pago_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(instrumento_pago_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(instrumento_pago_control, false);			
			}
			
			if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(instrumento_pago_control);	
			}
			
			if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(instrumento_pago_control);
			}
			
			if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(instrumento_pago_control);
			}
			
			if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(instrumento_pago_control);
			}
			
			if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(instrumento_pago_control);	
			}
			
			if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
			}
			
			if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(instrumento_pago_control);
			}
			
			
			if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(instrumento_pago_control);			
			}
			
			if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(instrumento_pago_control);
			}
			
			
			if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(instrumento_pago_control);
			}
			
			if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(instrumento_pago_control);
			}				
			
			if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(instrumento_pago_control);
			}
			
			if(instrumento_pago_control.usuarioActual!=null && instrumento_pago_control.usuarioActual.field_strUserName!=null &&
			instrumento_pago_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(instrumento_pago_control);			
			}
		}
		
		
		if(instrumento_pago_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(instrumento_pago_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(instrumento_pago_control) {
		
		this.actualizarPaginaCargaGeneral(instrumento_pago_control);
		this.actualizarPaginaTablaDatos(instrumento_pago_control);
		this.actualizarPaginaCargaGeneralControles(instrumento_pago_control);
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(instrumento_pago_control);
		this.actualizarPaginaAreaBusquedas(instrumento_pago_control);
		this.actualizarPaginaCargaCombosFK(instrumento_pago_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(instrumento_pago_control) {
		
		this.actualizarPaginaCargaGeneral(instrumento_pago_control);
		this.actualizarPaginaTablaDatos(instrumento_pago_control);
		this.actualizarPaginaCargaGeneralControles(instrumento_pago_control);
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(instrumento_pago_control);
		this.actualizarPaginaAreaBusquedas(instrumento_pago_control);
		this.actualizarPaginaCargaCombosFK(instrumento_pago_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(instrumento_pago_control) {
		this.actualizarPaginaTablaDatosAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(instrumento_pago_control) {
		this.actualizarPaginaTablaDatosAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(instrumento_pago_control) {
		this.actualizarPaginaTablaDatosAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(instrumento_pago_control) {
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(instrumento_pago_control) {
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(instrumento_pago_control) {
		this.actualizarPaginaCargaGeneralControles(instrumento_pago_control);
		this.actualizarPaginaCargaCombosFK(instrumento_pago_control);
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(instrumento_pago_control) {
		this.actualizarPaginaAbrirLink(instrumento_pago_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);				
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);
		this.actualizarPaginaFormulario(instrumento_pago_control);
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);
		this.actualizarPaginaFormulario(instrumento_pago_control);
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(instrumento_pago_control) {
		this.actualizarPaginaFormulario(instrumento_pago_control);
		this.onLoadCombosDefectoFK(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);
		this.actualizarPaginaFormulario(instrumento_pago_control);
		this.onLoadCombosDefectoFK(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(instrumento_pago_control) {
		this.actualizarPaginaCargaGeneralControles(instrumento_pago_control);
		this.actualizarPaginaCargaCombosFK(instrumento_pago_control);
		this.actualizarPaginaFormulario(instrumento_pago_control);
		this.onLoadCombosDefectoFK(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(instrumento_pago_control) {
		this.actualizarPaginaAbrirLink(instrumento_pago_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(instrumento_pago_control) {
		this.actualizarPaginaImprimir(instrumento_pago_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(instrumento_pago_control) {
		this.actualizarPaginaImprimir(instrumento_pago_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(instrumento_pago_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(instrumento_pago_control) {
		//FORMULARIO
		if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(instrumento_pago_control);
			this.actualizarPaginaFormularioAdd(instrumento_pago_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		//COMBOS FK
		if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(instrumento_pago_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(instrumento_pago_control) {
		//FORMULARIO
		if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(instrumento_pago_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);	
		//COMBOS FK
		if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(instrumento_pago_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(instrumento_pago_control) {
		//FORMULARIO
		if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(instrumento_pago_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(instrumento_pago_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);	
		//COMBOS FK
		if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(instrumento_pago_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control) {
		if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && instrumento_pago_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(instrumento_pago_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(instrumento_pago_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(instrumento_pago_control) {
		if(instrumento_pago_funcion1.esPaginaForm()==true) {
			window.opener.instrumento_pago_webcontrol1.actualizarPaginaTablaDatos(instrumento_pago_control);
		} else {
			this.actualizarPaginaTablaDatos(instrumento_pago_control);
		}
	}
	
	actualizarPaginaAbrirLink(instrumento_pago_control) {
		instrumento_pago_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(instrumento_pago_control.strAuxiliarUrlPagina);
				
		instrumento_pago_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(instrumento_pago_control.strAuxiliarTipo,instrumento_pago_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(instrumento_pago_control) {
		instrumento_pago_funcion1.resaltarRestaurarDivMensaje(true,instrumento_pago_control.strAuxiliarMensajeAlert,instrumento_pago_control.strAuxiliarCssMensaje);
			
		if(instrumento_pago_funcion1.esPaginaForm()==true) {
			window.opener.instrumento_pago_funcion1.resaltarRestaurarDivMensaje(true,instrumento_pago_control.strAuxiliarMensajeAlert,instrumento_pago_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(instrumento_pago_control) {
		eval(instrumento_pago_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(instrumento_pago_control, mostrar) {
		
		if(mostrar==true) {
			instrumento_pago_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				instrumento_pago_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			instrumento_pago_funcion1.mostrarDivMensaje(true,instrumento_pago_control.strAuxiliarMensaje,instrumento_pago_control.strAuxiliarCssMensaje);
		
		} else {
			instrumento_pago_funcion1.mostrarDivMensaje(false,instrumento_pago_control.strAuxiliarMensaje,instrumento_pago_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(instrumento_pago_control) {
	
		funcionGeneral.printWebPartPage("instrumento_pago",instrumento_pago_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarinstrumento_pagosAjaxWebPart").html(instrumento_pago_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("instrumento_pago",jQuery("#divTablaDatosReporteAuxiliarinstrumento_pagosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(instrumento_pago_control) {
		this.instrumento_pago_controlInicial=instrumento_pago_control;
			
		if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(instrumento_pago_control.strStyleDivArbol,instrumento_pago_control.strStyleDivContent
																,instrumento_pago_control.strStyleDivOpcionesBanner,instrumento_pago_control.strStyleDivExpandirColapsar
																,instrumento_pago_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=instrumento_pago_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",instrumento_pago_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(instrumento_pago_control) {
		jQuery("#divTablaDatosinstrumento_pagosAjaxWebPart").html(instrumento_pago_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosinstrumento_pagos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosinstrumento_pagos=jQuery("#tblTablaDatosinstrumento_pagos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("instrumento_pago",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',instrumento_pago_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			instrumento_pago_webcontrol1.registrarControlesTableEdition(instrumento_pago_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		instrumento_pago_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(instrumento_pago_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(instrumento_pago_control.instrumento_pagoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(instrumento_pago_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(instrumento_pago_control) {
		this.actualizarCssBotonesPagina(instrumento_pago_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(instrumento_pago_control.tiposReportes,instrumento_pago_control.tiposReporte
															 	,instrumento_pago_control.tiposPaginacion,instrumento_pago_control.tiposAcciones
																,instrumento_pago_control.tiposColumnasSelect,instrumento_pago_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(instrumento_pago_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(instrumento_pago_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(instrumento_pago_control);			
	}
	
	actualizarPaginaAreaBusquedas(instrumento_pago_control) {
		jQuery("#divBusquedainstrumento_pagoAjaxWebPart").css("display",instrumento_pago_control.strPermisoBusqueda);
		jQuery("#trinstrumento_pagoCabeceraBusquedas").css("display",instrumento_pago_control.strPermisoBusqueda);
		jQuery("#trBusquedainstrumento_pago").css("display",instrumento_pago_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(instrumento_pago_control.htmlTablaOrderBy!=null
			&& instrumento_pago_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByinstrumento_pagoAjaxWebPart").html(instrumento_pago_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//instrumento_pago_webcontrol1.registrarOrderByActions();
			
		}
			
		if(instrumento_pago_control.htmlTablaOrderByRel!=null
			&& instrumento_pago_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelinstrumento_pagoAjaxWebPart").html(instrumento_pago_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(instrumento_pago_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedainstrumento_pagoAjaxWebPart").css("display","none");
			jQuery("#trinstrumento_pagoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedainstrumento_pago").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(instrumento_pago_control) {
		jQuery("#tdinstrumento_pagoNuevo").css("display",instrumento_pago_control.strPermisoNuevo);
		jQuery("#trinstrumento_pagoElementos").css("display",instrumento_pago_control.strVisibleTablaElementos);
		jQuery("#trinstrumento_pagoAcciones").css("display",instrumento_pago_control.strVisibleTablaAcciones);
		jQuery("#trinstrumento_pagoParametrosAcciones").css("display",instrumento_pago_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(instrumento_pago_control) {
	
		this.actualizarCssBotonesMantenimiento(instrumento_pago_control);
				
		if(instrumento_pago_control.instrumento_pagoActual!=null) {//form
			
			this.actualizarCamposFormulario(instrumento_pago_control);			
		}
						
		this.actualizarSpanMensajesCampos(instrumento_pago_control);
	}
	
	actualizarPaginaUsuarioInvitado(instrumento_pago_control) {
	
		var indexPosition=instrumento_pago_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=instrumento_pago_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(instrumento_pago_control) {
		jQuery("#divResumeninstrumento_pagoActualAjaxWebPart").html(instrumento_pago_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(instrumento_pago_control) {
		jQuery("#divAccionesRelacionesinstrumento_pagoAjaxWebPart").html(instrumento_pago_control.htmlTablaAccionesRelaciones);
			
		instrumento_pago_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(instrumento_pago_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(instrumento_pago_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(instrumento_pago_control) {
		
		if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",instrumento_pago_control.strVisibleFK_Idcuenta_compras);
			jQuery("#tblstrVisible"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",instrumento_pago_control.strVisibleFK_Idcuenta_compras);
		}

		if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",instrumento_pago_control.strVisibleFK_Idcuenta_corriente);
			jQuery("#tblstrVisible"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",instrumento_pago_control.strVisibleFK_Idcuenta_corriente);
		}

		if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",instrumento_pago_control.strVisibleFK_Idcuenta_ventas);
			jQuery("#tblstrVisible"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",instrumento_pago_control.strVisibleFK_Idcuenta_ventas);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioninstrumento_pago();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("instrumento_pago",id,"cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);		
	}
	
	

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		instrumento_pago_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("instrumento_pago","cuenta","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		instrumento_pago_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("instrumento_pago","cuenta","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
	}

	abrirBusquedaParacuenta_corriente(strNombreCampoBusqueda){//idActual
		instrumento_pago_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("instrumento_pago","cuenta_corriente","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(instrumento_pago_control) {
	
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id").val(instrumento_pago_control.instrumento_pagoActual.id);
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-version_row").val(instrumento_pago_control.instrumento_pagoActual.versionRow);
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-codigo").val(instrumento_pago_control.instrumento_pagoActual.codigo);
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-descripcion").val(instrumento_pago_control.instrumento_pagoActual.descripcion);
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-predeterminado").val(instrumento_pago_control.instrumento_pagoActual.predeterminado);
		
		if(instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras!=null && instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras>-1){
			if(jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val(instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			//jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").select2("val", null);
			if(jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas!=null && instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas>-1){
			if(jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			//jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").select2("val", null);
			if(jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-cuenta_contable_compra").val(instrumento_pago_control.instrumento_pagoActual.cuenta_contable_compra);
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-cuenta_contable_ventas").val(instrumento_pago_control.instrumento_pagoActual.cuenta_contable_ventas);
		
		if(instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente!=null && instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente>-1){
			if(jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").select2("val", null);
			if(jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+instrumento_pago_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("instrumento_pago","cuentascorrientes","","form_instrumento_pago",formulario,"","",paraEventoTabla,idFilaTabla,instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
	}
	
	cargarCombosFK(instrumento_pago_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.cargarComboscuenta_comprassFK(instrumento_pago_control);
			}

			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.cargarComboscuenta_ventassFK(instrumento_pago_control);
			}

			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.cargarComboscuenta_corrientesFK(instrumento_pago_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(instrumento_pago_control.strRecargarFkTiposNinguno!=null && instrumento_pago_control.strRecargarFkTiposNinguno!='NINGUNO' && instrumento_pago_control.strRecargarFkTiposNinguno!='') {
			
				if(instrumento_pago_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",instrumento_pago_control.strRecargarFkTiposNinguno,",")) { 
					instrumento_pago_webcontrol1.cargarComboscuenta_comprassFK(instrumento_pago_control);
				}

				if(instrumento_pago_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",instrumento_pago_control.strRecargarFkTiposNinguno,",")) { 
					instrumento_pago_webcontrol1.cargarComboscuenta_ventassFK(instrumento_pago_control);
				}

				if(instrumento_pago_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",instrumento_pago_control.strRecargarFkTiposNinguno,",")) { 
					instrumento_pago_webcontrol1.cargarComboscuenta_corrientesFK(instrumento_pago_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(instrumento_pago_control) {
		jQuery("#spanstrMensajeid").text(instrumento_pago_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(instrumento_pago_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(instrumento_pago_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(instrumento_pago_control.strMensajedescripcion);		
		jQuery("#spanstrMensajepredeterminado").text(instrumento_pago_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta_compras").text(instrumento_pago_control.strMensajeid_cuenta_compras);		
		jQuery("#spanstrMensajeid_cuenta_ventas").text(instrumento_pago_control.strMensajeid_cuenta_ventas);		
		jQuery("#spanstrMensajecuenta_contable_compra").text(instrumento_pago_control.strMensajecuenta_contable_compra);		
		jQuery("#spanstrMensajecuenta_contable_ventas").text(instrumento_pago_control.strMensajecuenta_contable_ventas);		
		jQuery("#spanstrMensajeid_cuenta_corriente").text(instrumento_pago_control.strMensajeid_cuenta_corriente);		
	}
	
	actualizarCssBotonesMantenimiento(instrumento_pago_control) {
		jQuery("#tdbtnNuevoinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoinstrumento_pago").css("display",instrumento_pago_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarinstrumento_pago").css("display",instrumento_pago_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarinstrumento_pago").css("display",instrumento_pago_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosinstrumento_pago").css("display",instrumento_pago_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablacuenta_comprasFK(instrumento_pago_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,instrumento_pago_funcion1,instrumento_pago_control.cuenta_comprassFK);
	}

	cargarComboEditarTablacuenta_ventasFK(instrumento_pago_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,instrumento_pago_funcion1,instrumento_pago_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(instrumento_pago_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,instrumento_pago_funcion1,instrumento_pago_control.cuenta_corrientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(instrumento_pago_control) {
		var i=0;
		
		i=instrumento_pago_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(instrumento_pago_control.instrumento_pagoActual.id);
		jQuery("#t-version_row_"+i+"").val(instrumento_pago_control.instrumento_pagoActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(instrumento_pago_control.instrumento_pagoActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(instrumento_pago_control.instrumento_pagoActual.descripcion);
		jQuery("#t-cel_"+i+"_4").val(instrumento_pago_control.instrumento_pagoActual.predeterminado);
		
		if(instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras!=null && instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras) {
				jQuery("#t-cel_"+i+"_5").val(instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas!=null && instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas) {
				jQuery("#t-cel_"+i+"_6").val(instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(instrumento_pago_control.instrumento_pagoActual.cuenta_contable_compra);
		jQuery("#t-cel_"+i+"_8").val(instrumento_pago_control.instrumento_pagoActual.cuenta_contable_ventas);
		
		if(instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente!=null && instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente) {
				jQuery("#t-cel_"+i+"_9").val(instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_9").select2("val", null);
			if(jQuery("#t-cel_"+i+"_9").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(instrumento_pago_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(instrumento_pago_control) {
		instrumento_pago_funcion1.registrarControlesTableValidacionEdition(instrumento_pago_control,instrumento_pago_webcontrol1,instrumento_pago_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pagoConstante,strParametros);
		
		//instrumento_pago_funcion1.cancelarOnComplete();
	}	
	
	
	cargarComboscuenta_comprassFK(instrumento_pago_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras",instrumento_pago_control.cuenta_comprassFK);

		if(instrumento_pago_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+instrumento_pago_control.idFilaTablaActual+"_5",instrumento_pago_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",instrumento_pago_control.cuenta_comprassFK);

	};

	cargarComboscuenta_ventassFK(instrumento_pago_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas",instrumento_pago_control.cuenta_ventassFK);

		if(instrumento_pago_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+instrumento_pago_control.idFilaTablaActual+"_6",instrumento_pago_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",instrumento_pago_control.cuenta_ventassFK);

	};

	cargarComboscuenta_corrientesFK(instrumento_pago_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente",instrumento_pago_control.cuenta_corrientesFK);

		if(instrumento_pago_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+instrumento_pago_control.idFilaTablaActual+"_9",instrumento_pago_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",instrumento_pago_control.cuenta_corrientesFK);

	};

	
	
	registrarComboActionChangeComboscuenta_comprassFK(instrumento_pago_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(instrumento_pago_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(instrumento_pago_control) {

	};

	
	
	setDefectoValorComboscuenta_comprassFK(instrumento_pago_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(instrumento_pago_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != instrumento_pago_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val(instrumento_pago_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(instrumento_pago_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(instrumento_pago_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(instrumento_pago_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != instrumento_pago_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(instrumento_pago_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(instrumento_pago_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(instrumento_pago_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(instrumento_pago_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != instrumento_pago_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(instrumento_pago_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(instrumento_pago_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//instrumento_pago_control
		
	
	}
	
	onLoadCombosDefectoFK(instrumento_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(instrumento_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.setDefectoValorComboscuenta_comprassFK(instrumento_pago_control);
			}

			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.setDefectoValorComboscuenta_ventassFK(instrumento_pago_control);
			}

			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.setDefectoValorComboscuenta_corrientesFK(instrumento_pago_control);
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
	onLoadCombosEventosFK(instrumento_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(instrumento_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",instrumento_pago_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				instrumento_pago_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(instrumento_pago_control);
			//}

			//if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",instrumento_pago_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				instrumento_pago_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(instrumento_pago_control);
			//}

			//if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",instrumento_pago_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				instrumento_pago_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(instrumento_pago_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(instrumento_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(instrumento_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("instrumento_pago");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("instrumento_pago");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(instrumento_pago_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);			
			
			if(instrumento_pago_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,"instrumento_pago");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				instrumento_pago_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				instrumento_pago_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				instrumento_pago_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("instrumento_pago","FK_Idcuenta_compras","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("instrumento_pago","FK_Idcuenta_corriente","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("instrumento_pago","FK_Idcuenta_ventas","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			instrumento_pago_funcion1.validarFormularioJQuery(instrumento_pago_constante1);
			
			if(instrumento_pago_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(instrumento_pago_control) {
		
		jQuery("#divBusquedainstrumento_pagoAjaxWebPart").css("display",instrumento_pago_control.strPermisoBusqueda);
		jQuery("#trinstrumento_pagoCabeceraBusquedas").css("display",instrumento_pago_control.strPermisoBusqueda);
		jQuery("#trBusquedainstrumento_pago").css("display",instrumento_pago_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteinstrumento_pago").css("display",instrumento_pago_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosinstrumento_pago").attr("style",instrumento_pago_control.strPermisoMostrarTodos);
		
		if(instrumento_pago_control.strPermisoNuevo!=null) {
			jQuery("#tdinstrumento_pagoNuevo").css("display",instrumento_pago_control.strPermisoNuevo);
			jQuery("#tdinstrumento_pagoNuevoToolBar").css("display",instrumento_pago_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdinstrumento_pagoDuplicar").css("display",instrumento_pago_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdinstrumento_pagoDuplicarToolBar").css("display",instrumento_pago_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdinstrumento_pagoNuevoGuardarCambios").css("display",instrumento_pago_control.strPermisoNuevo);
			jQuery("#tdinstrumento_pagoNuevoGuardarCambiosToolBar").css("display",instrumento_pago_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(instrumento_pago_control.strPermisoActualizar!=null) {
			jQuery("#tdinstrumento_pagoActualizarToolBar").css("display",instrumento_pago_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdinstrumento_pagoCopiar").css("display",instrumento_pago_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdinstrumento_pagoCopiarToolBar").css("display",instrumento_pago_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdinstrumento_pagoConEditar").css("display",instrumento_pago_control.strPermisoActualizar);
		}
		
		jQuery("#tdinstrumento_pagoEliminarToolBar").css("display",instrumento_pago_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdinstrumento_pagoGuardarCambios").css("display",instrumento_pago_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdinstrumento_pagoGuardarCambiosToolBar").css("display",instrumento_pago_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trinstrumento_pagoElementos").css("display",instrumento_pago_control.strVisibleTablaElementos);
		
		jQuery("#trinstrumento_pagoAcciones").css("display",instrumento_pago_control.strVisibleTablaAcciones);
		jQuery("#trinstrumento_pagoParametrosAcciones").css("display",instrumento_pago_control.strVisibleTablaAcciones);
			
		jQuery("#tdinstrumento_pagoCerrarPagina").css("display",instrumento_pago_control.strPermisoPopup);		
		jQuery("#tdinstrumento_pagoCerrarPaginaToolBar").css("display",instrumento_pago_control.strPermisoPopup);
		//jQuery("#trinstrumento_pagoAccionesRelaciones").css("display",instrumento_pago_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		instrumento_pago_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		instrumento_pago_webcontrol1.registrarEventosControles();
		
		if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
			instrumento_pago_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(instrumento_pago_constante1.STR_ES_RELACIONES=="true") {
			if(instrumento_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				instrumento_pago_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(instrumento_pago_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(instrumento_pago_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				instrumento_pago_webcontrol1.onLoad();
				
			} else {
				if(instrumento_pago_constante1.BIT_ES_PAGINA_FORM==true) {
					if(instrumento_pago_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
						//instrumento_pago_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(instrumento_pago_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(instrumento_pago_constante1.BIG_ID_ACTUAL,"instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
						//instrumento_pago_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			instrumento_pago_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var instrumento_pago_webcontrol1=new instrumento_pago_webcontrol();

if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = instrumento_pago_webcontrol1.onLoadWindow; 
}

//</script>