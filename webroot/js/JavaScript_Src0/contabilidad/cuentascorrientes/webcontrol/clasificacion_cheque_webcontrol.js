//<script type="text/javascript" language="javascript">



//var clasificacion_chequeJQueryPaginaWebInteraccion= function (clasificacion_cheque_control) {
//this.,this.,this.

class clasificacion_cheque_webcontrol extends clasificacion_cheque_webcontrol_add {
	
	clasificacion_cheque_control=null;
	clasificacion_cheque_controlInicial=null;
	clasificacion_cheque_controlAuxiliar=null;
		
	//if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(clasificacion_cheque_control) {
		super();
		
		this.clasificacion_cheque_control=clasificacion_cheque_control;
	}
		
	actualizarVariablesPagina(clasificacion_cheque_control) {
		
		if(clasificacion_cheque_control.action=="index" || clasificacion_cheque_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(clasificacion_cheque_control);
			
		} else if(clasificacion_cheque_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(clasificacion_cheque_control);
			
		} else if(clasificacion_cheque_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(clasificacion_cheque_control);
			
		} else if(clasificacion_cheque_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(clasificacion_cheque_control);		
		
		} else if(clasificacion_cheque_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(clasificacion_cheque_control);		
		
		} else if(clasificacion_cheque_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(clasificacion_cheque_control);		
		
		} else if(clasificacion_cheque_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(clasificacion_cheque_control);		
		}
		else if(clasificacion_cheque_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(clasificacion_cheque_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(clasificacion_cheque_control.action + " Revisar Manejo");
			
			if(clasificacion_cheque_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(clasificacion_cheque_control);
				
				return;
			}
			
			//if(clasificacion_cheque_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(clasificacion_cheque_control);
			//}
			
			if(clasificacion_cheque_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(clasificacion_cheque_control);
			}
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && clasificacion_cheque_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(clasificacion_cheque_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(clasificacion_cheque_control, false);			
			}
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(clasificacion_cheque_control);	
			}
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
			}
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(clasificacion_cheque_control);
			}
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);
			}
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(clasificacion_cheque_control);	
			}
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
			}
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(clasificacion_cheque_control);
			}
			
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(clasificacion_cheque_control);			
			}
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(clasificacion_cheque_control);
			}
			
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(clasificacion_cheque_control);
			}
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(clasificacion_cheque_control);
			}				
			
			if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(clasificacion_cheque_control);
			}
			
			if(clasificacion_cheque_control.usuarioActual!=null && clasificacion_cheque_control.usuarioActual.field_strUserName!=null &&
			clasificacion_cheque_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(clasificacion_cheque_control);			
			}
		}
		
		
		if(clasificacion_cheque_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(clasificacion_cheque_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(clasificacion_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(clasificacion_cheque_control);
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		this.actualizarPaginaCargaGeneralControles(clasificacion_cheque_control);
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(clasificacion_cheque_control);
		this.actualizarPaginaAreaBusquedas(clasificacion_cheque_control);
		this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(clasificacion_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(clasificacion_cheque_control);
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		this.actualizarPaginaCargaGeneralControles(clasificacion_cheque_control);
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(clasificacion_cheque_control);
		this.actualizarPaginaAreaBusquedas(clasificacion_cheque_control);
		this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(clasificacion_cheque_control) {
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(clasificacion_cheque_control) {
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(clasificacion_cheque_control) {
		this.actualizarPaginaCargaGeneralControles(clasificacion_cheque_control);
		this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(clasificacion_cheque_control) {
		this.actualizarPaginaAbrirLink(clasificacion_cheque_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);				
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		this.actualizarPaginaFormulario(clasificacion_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		this.actualizarPaginaFormulario(clasificacion_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(clasificacion_cheque_control) {
		this.actualizarPaginaFormulario(clasificacion_cheque_control);
		this.onLoadCombosDefectoFK(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		this.actualizarPaginaFormulario(clasificacion_cheque_control);
		this.onLoadCombosDefectoFK(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(clasificacion_cheque_control) {
		this.actualizarPaginaCargaGeneralControles(clasificacion_cheque_control);
		this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);
		this.actualizarPaginaFormulario(clasificacion_cheque_control);
		this.onLoadCombosDefectoFK(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(clasificacion_cheque_control) {
		this.actualizarPaginaAbrirLink(clasificacion_cheque_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(clasificacion_cheque_control) {
		this.actualizarPaginaImprimir(clasificacion_cheque_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(clasificacion_cheque_control) {
		this.actualizarPaginaImprimir(clasificacion_cheque_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(clasificacion_cheque_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(clasificacion_cheque_control) {
		//FORMULARIO
		if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(clasificacion_cheque_control);
			this.actualizarPaginaFormularioAdd(clasificacion_cheque_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		//COMBOS FK
		if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(clasificacion_cheque_control) {
		//FORMULARIO
		if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(clasificacion_cheque_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);	
		//COMBOS FK
		if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(clasificacion_cheque_control) {
		//FORMULARIO
		if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(clasificacion_cheque_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(clasificacion_cheque_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);	
		//COMBOS FK
		if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control) {
		if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && clasificacion_cheque_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(clasificacion_cheque_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(clasificacion_cheque_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(clasificacion_cheque_control) {
		if(clasificacion_cheque_funcion1.esPaginaForm()==true) {
			window.opener.clasificacion_cheque_webcontrol1.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		} else {
			this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		}
	}
	
	actualizarPaginaAbrirLink(clasificacion_cheque_control) {
		clasificacion_cheque_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(clasificacion_cheque_control.strAuxiliarUrlPagina);
				
		clasificacion_cheque_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(clasificacion_cheque_control.strAuxiliarTipo,clasificacion_cheque_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(clasificacion_cheque_control) {
		clasificacion_cheque_funcion1.resaltarRestaurarDivMensaje(true,clasificacion_cheque_control.strAuxiliarMensajeAlert,clasificacion_cheque_control.strAuxiliarCssMensaje);
			
		if(clasificacion_cheque_funcion1.esPaginaForm()==true) {
			window.opener.clasificacion_cheque_funcion1.resaltarRestaurarDivMensaje(true,clasificacion_cheque_control.strAuxiliarMensajeAlert,clasificacion_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(clasificacion_cheque_control) {
		eval(clasificacion_cheque_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(clasificacion_cheque_control, mostrar) {
		
		if(mostrar==true) {
			clasificacion_cheque_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				clasificacion_cheque_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			clasificacion_cheque_funcion1.mostrarDivMensaje(true,clasificacion_cheque_control.strAuxiliarMensaje,clasificacion_cheque_control.strAuxiliarCssMensaje);
		
		} else {
			clasificacion_cheque_funcion1.mostrarDivMensaje(false,clasificacion_cheque_control.strAuxiliarMensaje,clasificacion_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(clasificacion_cheque_control) {
	
		funcionGeneral.printWebPartPage("clasificacion_cheque",clasificacion_cheque_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarclasificacion_chequesAjaxWebPart").html(clasificacion_cheque_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("clasificacion_cheque",jQuery("#divTablaDatosReporteAuxiliarclasificacion_chequesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(clasificacion_cheque_control) {
		this.clasificacion_cheque_controlInicial=clasificacion_cheque_control;
			
		if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(clasificacion_cheque_control.strStyleDivArbol,clasificacion_cheque_control.strStyleDivContent
																,clasificacion_cheque_control.strStyleDivOpcionesBanner,clasificacion_cheque_control.strStyleDivExpandirColapsar
																,clasificacion_cheque_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=clasificacion_cheque_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",clasificacion_cheque_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(clasificacion_cheque_control) {
		jQuery("#divTablaDatosclasificacion_chequesAjaxWebPart").html(clasificacion_cheque_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosclasificacion_cheques=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosclasificacion_cheques=jQuery("#tblTablaDatosclasificacion_cheques").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("clasificacion_cheque",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',clasificacion_cheque_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			clasificacion_cheque_webcontrol1.registrarControlesTableEdition(clasificacion_cheque_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		clasificacion_cheque_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(clasificacion_cheque_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(clasificacion_cheque_control.clasificacion_chequeActual!=null) {//form
			
			this.actualizarCamposFilaTabla(clasificacion_cheque_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(clasificacion_cheque_control) {
		this.actualizarCssBotonesPagina(clasificacion_cheque_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(clasificacion_cheque_control.tiposReportes,clasificacion_cheque_control.tiposReporte
															 	,clasificacion_cheque_control.tiposPaginacion,clasificacion_cheque_control.tiposAcciones
																,clasificacion_cheque_control.tiposColumnasSelect,clasificacion_cheque_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(clasificacion_cheque_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(clasificacion_cheque_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(clasificacion_cheque_control);			
	}
	
	actualizarPaginaAreaBusquedas(clasificacion_cheque_control) {
		jQuery("#divBusquedaclasificacion_chequeAjaxWebPart").css("display",clasificacion_cheque_control.strPermisoBusqueda);
		jQuery("#trclasificacion_chequeCabeceraBusquedas").css("display",clasificacion_cheque_control.strPermisoBusqueda);
		jQuery("#trBusquedaclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(clasificacion_cheque_control.htmlTablaOrderBy!=null
			&& clasificacion_cheque_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByclasificacion_chequeAjaxWebPart").html(clasificacion_cheque_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//clasificacion_cheque_webcontrol1.registrarOrderByActions();
			
		}
			
		if(clasificacion_cheque_control.htmlTablaOrderByRel!=null
			&& clasificacion_cheque_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelclasificacion_chequeAjaxWebPart").html(clasificacion_cheque_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaclasificacion_chequeAjaxWebPart").css("display","none");
			jQuery("#trclasificacion_chequeCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaclasificacion_cheque").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(clasificacion_cheque_control) {
		jQuery("#tdclasificacion_chequeNuevo").css("display",clasificacion_cheque_control.strPermisoNuevo);
		jQuery("#trclasificacion_chequeElementos").css("display",clasificacion_cheque_control.strVisibleTablaElementos);
		jQuery("#trclasificacion_chequeAcciones").css("display",clasificacion_cheque_control.strVisibleTablaAcciones);
		jQuery("#trclasificacion_chequeParametrosAcciones").css("display",clasificacion_cheque_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(clasificacion_cheque_control) {
	
		this.actualizarCssBotonesMantenimiento(clasificacion_cheque_control);
				
		if(clasificacion_cheque_control.clasificacion_chequeActual!=null) {//form
			
			this.actualizarCamposFormulario(clasificacion_cheque_control);			
		}
						
		this.actualizarSpanMensajesCampos(clasificacion_cheque_control);
	}
	
	actualizarPaginaUsuarioInvitado(clasificacion_cheque_control) {
	
		var indexPosition=clasificacion_cheque_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=clasificacion_cheque_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(clasificacion_cheque_control) {
		jQuery("#divResumenclasificacion_chequeActualAjaxWebPart").html(clasificacion_cheque_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(clasificacion_cheque_control) {
		jQuery("#divAccionesRelacionesclasificacion_chequeAjaxWebPart").html(clasificacion_cheque_control.htmlTablaAccionesRelaciones);
			
		clasificacion_cheque_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(clasificacion_cheque_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(clasificacion_cheque_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(clasificacion_cheque_control) {
		
		if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque").attr("style",clasificacion_cheque_control.strVisibleFK_Idcategoria_cheque);
			jQuery("#tblstrVisible"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque").attr("style",clasificacion_cheque_control.strVisibleFK_Idcategoria_cheque);
		}

		if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle").attr("style",clasificacion_cheque_control.strVisibleFK_Idcuenta_corriente_detalle);
			jQuery("#tblstrVisible"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle").attr("style",clasificacion_cheque_control.strVisibleFK_Idcuenta_corriente_detalle);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionclasificacion_cheque();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("clasificacion_cheque",id,"cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);		
	}
	
	

	abrirBusquedaParacuenta_corriente_detalle(strNombreCampoBusqueda){//idActual
		clasificacion_cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("clasificacion_cheque","cuenta_corriente_detalle","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
	}

	abrirBusquedaParacategoria_cheque(strNombreCampoBusqueda){//idActual
		clasificacion_cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("clasificacion_cheque","categoria_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(clasificacion_cheque_control) {
	
		jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id").val(clasificacion_cheque_control.clasificacion_chequeActual.id);
		jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-version_row").val(clasificacion_cheque_control.clasificacion_chequeActual.versionRow);
		
		if(clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle!=null && clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle>-1){
			if(jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val() != clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val(clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle).trigger("change");
			}
		} else { 
			//jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").select2("val", null);
			if(jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque!=null && clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque>-1){
			if(jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val(clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque).trigger("change");
			}
		} else { 
			//jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").select2("val", null);
			if(jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-monto").val(clasificacion_cheque_control.clasificacion_chequeActual.monto);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+clasificacion_cheque_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("clasificacion_cheque","cuentascorrientes","","form_clasificacion_cheque",formulario,"","",paraEventoTabla,idFilaTabla,clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
	}
	
	cargarCombosFK(clasificacion_cheque_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente_detalle",clasificacion_cheque_control.strRecargarFkTipos,",")) { 
				clasificacion_cheque_webcontrol1.cargarComboscuenta_corriente_detallesFK(clasificacion_cheque_control);
			}

			if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",clasificacion_cheque_control.strRecargarFkTipos,",")) { 
				clasificacion_cheque_webcontrol1.cargarComboscategoria_chequesFK(clasificacion_cheque_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(clasificacion_cheque_control.strRecargarFkTiposNinguno!=null && clasificacion_cheque_control.strRecargarFkTiposNinguno!='NINGUNO' && clasificacion_cheque_control.strRecargarFkTiposNinguno!='') {
			
				if(clasificacion_cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente_detalle",clasificacion_cheque_control.strRecargarFkTiposNinguno,",")) { 
					clasificacion_cheque_webcontrol1.cargarComboscuenta_corriente_detallesFK(clasificacion_cheque_control);
				}

				if(clasificacion_cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_cheque",clasificacion_cheque_control.strRecargarFkTiposNinguno,",")) { 
					clasificacion_cheque_webcontrol1.cargarComboscategoria_chequesFK(clasificacion_cheque_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(clasificacion_cheque_control) {
		jQuery("#spanstrMensajeid").text(clasificacion_cheque_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(clasificacion_cheque_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_cuenta_corriente_detalle").text(clasificacion_cheque_control.strMensajeid_cuenta_corriente_detalle);		
		jQuery("#spanstrMensajeid_categoria_cheque").text(clasificacion_cheque_control.strMensajeid_categoria_cheque);		
		jQuery("#spanstrMensajemonto").text(clasificacion_cheque_control.strMensajemonto);		
	}
	
	actualizarCssBotonesMantenimiento(clasificacion_cheque_control) {
		jQuery("#tdbtnNuevoclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablacuenta_corriente_detalleFK(clasificacion_cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,clasificacion_cheque_funcion1,clasificacion_cheque_control.cuenta_corriente_detallesFK);
	}

	cargarComboEditarTablacategoria_chequeFK(clasificacion_cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,clasificacion_cheque_funcion1,clasificacion_cheque_control.categoria_chequesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(clasificacion_cheque_control) {
		var i=0;
		
		i=clasificacion_cheque_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(clasificacion_cheque_control.clasificacion_chequeActual.id);
		jQuery("#t-version_row_"+i+"").val(clasificacion_cheque_control.clasificacion_chequeActual.versionRow);
		
		if(clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle!=null && clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle) {
				jQuery("#t-cel_"+i+"_2").val(clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque!=null && clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque) {
				jQuery("#t-cel_"+i+"_3").val(clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(clasificacion_cheque_control.clasificacion_chequeActual.monto);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(clasificacion_cheque_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(clasificacion_cheque_control) {
		clasificacion_cheque_funcion1.registrarControlesTableValidacionEdition(clasificacion_cheque_control,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_chequeConstante,strParametros);
		
		//clasificacion_cheque_funcion1.cancelarOnComplete();
	}	
	
	
	cargarComboscuenta_corriente_detallesFK(clasificacion_cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle",clasificacion_cheque_control.cuenta_corriente_detallesFK);

		if(clasificacion_cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+clasificacion_cheque_control.idFilaTablaActual+"_2",clasificacion_cheque_control.cuenta_corriente_detallesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle",clasificacion_cheque_control.cuenta_corriente_detallesFK);

	};

	cargarComboscategoria_chequesFK(clasificacion_cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque",clasificacion_cheque_control.categoria_chequesFK);

		if(clasificacion_cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+clasificacion_cheque_control.idFilaTablaActual+"_3",clasificacion_cheque_control.categoria_chequesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque",clasificacion_cheque_control.categoria_chequesFK);

	};

	
	
	registrarComboActionChangeComboscuenta_corriente_detallesFK(clasificacion_cheque_control) {

	};

	registrarComboActionChangeComboscategoria_chequesFK(clasificacion_cheque_control) {

	};

	
	
	setDefectoValorComboscuenta_corriente_detallesFK(clasificacion_cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(clasificacion_cheque_control.idcuenta_corriente_detalleDefaultFK>-1 && jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val() != clasificacion_cheque_control.idcuenta_corriente_detalleDefaultFK) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val(clasificacion_cheque_control.idcuenta_corriente_detalleDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle").val(clasificacion_cheque_control.idcuenta_corriente_detalleDefaultForeignKey).trigger("change");
			if(jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_chequesFK(clasificacion_cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(clasificacion_cheque_control.idcategoria_chequeDefaultFK>-1 && jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != clasificacion_cheque_control.idcategoria_chequeDefaultFK) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val(clasificacion_cheque_control.idcategoria_chequeDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val(clasificacion_cheque_control.idcategoria_chequeDefaultForeignKey).trigger("change");
			if(jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//clasificacion_cheque_control
		
	
	}
	
	onLoadCombosDefectoFK(clasificacion_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(clasificacion_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente_detalle",clasificacion_cheque_control.strRecargarFkTipos,",")) { 
				clasificacion_cheque_webcontrol1.setDefectoValorComboscuenta_corriente_detallesFK(clasificacion_cheque_control);
			}

			if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",clasificacion_cheque_control.strRecargarFkTipos,",")) { 
				clasificacion_cheque_webcontrol1.setDefectoValorComboscategoria_chequesFK(clasificacion_cheque_control);
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
	onLoadCombosEventosFK(clasificacion_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(clasificacion_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente_detalle",clasificacion_cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				clasificacion_cheque_webcontrol1.registrarComboActionChangeComboscuenta_corriente_detallesFK(clasificacion_cheque_control);
			//}

			//if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",clasificacion_cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				clasificacion_cheque_webcontrol1.registrarComboActionChangeComboscategoria_chequesFK(clasificacion_cheque_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(clasificacion_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(clasificacion_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("clasificacion_cheque");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("clasificacion_cheque");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(clasificacion_cheque_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);			
			
			if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,"clasificacion_cheque");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente_detalle","id_cuenta_corriente_detalle","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle_img_busqueda").click(function(){
				clasificacion_cheque_webcontrol1.abrirBusquedaParacuenta_corriente_detalle("id_cuenta_corriente_detalle");
				//alert(jQuery('#form-id_cuenta_corriente_detalle_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_cheque","id_categoria_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque_img_busqueda").click(function(){
				clasificacion_cheque_webcontrol1.abrirBusquedaParacategoria_cheque("id_categoria_cheque");
				//alert(jQuery('#form-id_categoria_cheque_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("clasificacion_cheque","FK_Idcategoria_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("clasificacion_cheque","FK_Idcuenta_corriente_detalle","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			clasificacion_cheque_funcion1.validarFormularioJQuery(clasificacion_cheque_constante1);
			
			if(clasificacion_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(clasificacion_cheque_control) {
		
		jQuery("#divBusquedaclasificacion_chequeAjaxWebPart").css("display",clasificacion_cheque_control.strPermisoBusqueda);
		jQuery("#trclasificacion_chequeCabeceraBusquedas").css("display",clasificacion_cheque_control.strPermisoBusqueda);
		jQuery("#trBusquedaclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosclasificacion_cheque").attr("style",clasificacion_cheque_control.strPermisoMostrarTodos);
		
		if(clasificacion_cheque_control.strPermisoNuevo!=null) {
			jQuery("#tdclasificacion_chequeNuevo").css("display",clasificacion_cheque_control.strPermisoNuevo);
			jQuery("#tdclasificacion_chequeNuevoToolBar").css("display",clasificacion_cheque_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdclasificacion_chequeDuplicar").css("display",clasificacion_cheque_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdclasificacion_chequeDuplicarToolBar").css("display",clasificacion_cheque_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdclasificacion_chequeNuevoGuardarCambios").css("display",clasificacion_cheque_control.strPermisoNuevo);
			jQuery("#tdclasificacion_chequeNuevoGuardarCambiosToolBar").css("display",clasificacion_cheque_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(clasificacion_cheque_control.strPermisoActualizar!=null) {
			jQuery("#tdclasificacion_chequeActualizarToolBar").css("display",clasificacion_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdclasificacion_chequeCopiar").css("display",clasificacion_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdclasificacion_chequeCopiarToolBar").css("display",clasificacion_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdclasificacion_chequeConEditar").css("display",clasificacion_cheque_control.strPermisoActualizar);
		}
		
		jQuery("#tdclasificacion_chequeEliminarToolBar").css("display",clasificacion_cheque_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdclasificacion_chequeGuardarCambios").css("display",clasificacion_cheque_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdclasificacion_chequeGuardarCambiosToolBar").css("display",clasificacion_cheque_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trclasificacion_chequeElementos").css("display",clasificacion_cheque_control.strVisibleTablaElementos);
		
		jQuery("#trclasificacion_chequeAcciones").css("display",clasificacion_cheque_control.strVisibleTablaAcciones);
		jQuery("#trclasificacion_chequeParametrosAcciones").css("display",clasificacion_cheque_control.strVisibleTablaAcciones);
			
		jQuery("#tdclasificacion_chequeCerrarPagina").css("display",clasificacion_cheque_control.strPermisoPopup);		
		jQuery("#tdclasificacion_chequeCerrarPaginaToolBar").css("display",clasificacion_cheque_control.strPermisoPopup);
		//jQuery("#trclasificacion_chequeAccionesRelaciones").css("display",clasificacion_cheque_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		clasificacion_cheque_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		clasificacion_cheque_webcontrol1.registrarEventosControles();
		
		if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
			clasificacion_cheque_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(clasificacion_cheque_constante1.STR_ES_RELACIONES=="true") {
			if(clasificacion_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				clasificacion_cheque_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(clasificacion_cheque_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(clasificacion_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				clasificacion_cheque_webcontrol1.onLoad();
				
			} else {
				if(clasificacion_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
					if(clasificacion_cheque_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
						//clasificacion_cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(clasificacion_cheque_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(clasificacion_cheque_constante1.BIG_ID_ACTUAL,"clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
						//clasificacion_cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			clasificacion_cheque_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var clasificacion_cheque_webcontrol1=new clasificacion_cheque_webcontrol();

if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = clasificacion_cheque_webcontrol1.onLoadWindow; 
}

//</script>