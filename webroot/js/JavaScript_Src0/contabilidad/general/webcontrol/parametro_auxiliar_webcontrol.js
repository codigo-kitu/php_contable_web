//<script type="text/javascript" language="javascript">



//var parametro_auxiliarJQueryPaginaWebInteraccion= function (parametro_auxiliar_control) {
//this.,this.,this.

class parametro_auxiliar_webcontrol extends parametro_auxiliar_webcontrol_add {
	
	parametro_auxiliar_control=null;
	parametro_auxiliar_controlInicial=null;
	parametro_auxiliar_controlAuxiliar=null;
		
	//if(parametro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_auxiliar_control) {
		super();
		
		this.parametro_auxiliar_control=parametro_auxiliar_control;
	}
		
	actualizarVariablesPagina(parametro_auxiliar_control) {
		
		if(parametro_auxiliar_control.action=="index" || parametro_auxiliar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_auxiliar_control);
			
		} else if(parametro_auxiliar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_auxiliar_control);
			
		} else if(parametro_auxiliar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_auxiliar_control);
			
		} else if(parametro_auxiliar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_auxiliar_control);		
		
		} else if(parametro_auxiliar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_auxiliar_control);		
		
		} else if(parametro_auxiliar_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_auxiliar_control);		
		
		} else if(parametro_auxiliar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_auxiliar_control);		
		}
		else if(parametro_auxiliar_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_auxiliar_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(parametro_auxiliar_control.action + " Revisar Manejo");
			
			if(parametro_auxiliar_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(parametro_auxiliar_control);
				
				return;
			}
			
			//if(parametro_auxiliar_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(parametro_auxiliar_control);
			//}
			
			if(parametro_auxiliar_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(parametro_auxiliar_control);
			}
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_auxiliar_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(parametro_auxiliar_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(parametro_auxiliar_control, false);			
			}
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(parametro_auxiliar_control);	
			}
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(parametro_auxiliar_control);
			}
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(parametro_auxiliar_control);
			}
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);
			}
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(parametro_auxiliar_control);	
			}
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
			}
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(parametro_auxiliar_control);
			}
			
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(parametro_auxiliar_control);			
			}
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(parametro_auxiliar_control);
			}
			
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(parametro_auxiliar_control);
			}
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(parametro_auxiliar_control);
			}				
			
			if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_auxiliar_control);
			}
			
			if(parametro_auxiliar_control.usuarioActual!=null && parametro_auxiliar_control.usuarioActual.field_strUserName!=null &&
			parametro_auxiliar_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(parametro_auxiliar_control);			
			}
		}
		
		
		if(parametro_auxiliar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_auxiliar_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(parametro_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_auxiliar_control);
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(parametro_auxiliar_control);
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(parametro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_auxiliar_control);
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(parametro_auxiliar_control);
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(parametro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);		
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);		
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);		
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_auxiliar_control) {
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_auxiliar_control) {
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_auxiliar_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_auxiliar_control) {
		this.actualizarPaginaAbrirLink(parametro_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);				
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);
		this.actualizarPaginaFormulario(parametro_auxiliar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);
		this.actualizarPaginaFormulario(parametro_auxiliar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_auxiliar_control) {
		this.actualizarPaginaFormulario(parametro_auxiliar_control);
		this.onLoadCombosDefectoFK(parametro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);
		this.actualizarPaginaFormulario(parametro_auxiliar_control);
		this.onLoadCombosDefectoFK(parametro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_auxiliar_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);
		this.actualizarPaginaFormulario(parametro_auxiliar_control);
		this.onLoadCombosDefectoFK(parametro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_auxiliar_control) {
		this.actualizarPaginaAbrirLink(parametro_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_auxiliar_control) {
		this.actualizarPaginaImprimir(parametro_auxiliar_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_auxiliar_control) {
		this.actualizarPaginaImprimir(parametro_auxiliar_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_auxiliar_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_auxiliar_control) {
		//FORMULARIO
		if(parametro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_auxiliar_control);
			this.actualizarPaginaFormularioAdd(parametro_auxiliar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		//COMBOS FK
		if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_auxiliar_control) {
		//FORMULARIO
		if(parametro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_auxiliar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);	
		//COMBOS FK
		if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_auxiliar_control) {
		//FORMULARIO
		if(parametro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_auxiliar_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_auxiliar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);	
		//COMBOS FK
		if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control) {
		if(parametro_auxiliar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_auxiliar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_auxiliar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_auxiliar_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_auxiliar_control) {
		if(parametro_auxiliar_funcion1.esPaginaForm()==true) {
			window.opener.parametro_auxiliar_webcontrol1.actualizarPaginaTablaDatos(parametro_auxiliar_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_auxiliar_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_auxiliar_control) {
		parametro_auxiliar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_auxiliar_control.strAuxiliarUrlPagina);
				
		parametro_auxiliar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_auxiliar_control.strAuxiliarTipo,parametro_auxiliar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_auxiliar_control) {
		parametro_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,parametro_auxiliar_control.strAuxiliarMensajeAlert,parametro_auxiliar_control.strAuxiliarCssMensaje);
			
		if(parametro_auxiliar_funcion1.esPaginaForm()==true) {
			window.opener.parametro_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,parametro_auxiliar_control.strAuxiliarMensajeAlert,parametro_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(parametro_auxiliar_control) {
		eval(parametro_auxiliar_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(parametro_auxiliar_control, mostrar) {
		
		if(mostrar==true) {
			parametro_auxiliar_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_auxiliar_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			parametro_auxiliar_funcion1.mostrarDivMensaje(true,parametro_auxiliar_control.strAuxiliarMensaje,parametro_auxiliar_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_auxiliar_funcion1.mostrarDivMensaje(false,parametro_auxiliar_control.strAuxiliarMensaje,parametro_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(parametro_auxiliar_control) {
	
		funcionGeneral.printWebPartPage("parametro_auxiliar",parametro_auxiliar_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarparametro_auxiliarsAjaxWebPart").html(parametro_auxiliar_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("parametro_auxiliar",jQuery("#divTablaDatosReporteAuxiliarparametro_auxiliarsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(parametro_auxiliar_control) {
		this.parametro_auxiliar_controlInicial=parametro_auxiliar_control;
			
		if(parametro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_auxiliar_control.strStyleDivArbol,parametro_auxiliar_control.strStyleDivContent
																,parametro_auxiliar_control.strStyleDivOpcionesBanner,parametro_auxiliar_control.strStyleDivExpandirColapsar
																,parametro_auxiliar_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_auxiliar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_auxiliar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(parametro_auxiliar_control) {
		jQuery("#divTablaDatosparametro_auxiliarsAjaxWebPart").html(parametro_auxiliar_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_auxiliars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_auxiliars=jQuery("#tblTablaDatosparametro_auxiliars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_auxiliar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_auxiliar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_auxiliar_webcontrol1.registrarControlesTableEdition(parametro_auxiliar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_auxiliar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(parametro_auxiliar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_auxiliar_control.parametro_auxiliarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_auxiliar_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(parametro_auxiliar_control) {
		this.actualizarCssBotonesPagina(parametro_auxiliar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_auxiliar_control.tiposReportes,parametro_auxiliar_control.tiposReporte
															 	,parametro_auxiliar_control.tiposPaginacion,parametro_auxiliar_control.tiposAcciones
																,parametro_auxiliar_control.tiposColumnasSelect,parametro_auxiliar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_auxiliar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_auxiliar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_auxiliar_control);			
	}
	
	actualizarPaginaAreaBusquedas(parametro_auxiliar_control) {
		jQuery("#divBusquedaparametro_auxiliarAjaxWebPart").css("display",parametro_auxiliar_control.strPermisoBusqueda);
		jQuery("#trparametro_auxiliarCabeceraBusquedas").css("display",parametro_auxiliar_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_auxiliar").css("display",parametro_auxiliar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_auxiliar_control.htmlTablaOrderBy!=null
			&& parametro_auxiliar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_auxiliarAjaxWebPart").html(parametro_auxiliar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_auxiliar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_auxiliar_control.htmlTablaOrderByRel!=null
			&& parametro_auxiliar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_auxiliarAjaxWebPart").html(parametro_auxiliar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_auxiliar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_auxiliarAjaxWebPart").css("display","none");
			jQuery("#trparametro_auxiliarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_auxiliar").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(parametro_auxiliar_control) {
		jQuery("#tdparametro_auxiliarNuevo").css("display",parametro_auxiliar_control.strPermisoNuevo);
		jQuery("#trparametro_auxiliarElementos").css("display",parametro_auxiliar_control.strVisibleTablaElementos);
		jQuery("#trparametro_auxiliarAcciones").css("display",parametro_auxiliar_control.strVisibleTablaAcciones);
		jQuery("#trparametro_auxiliarParametrosAcciones").css("display",parametro_auxiliar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_auxiliar_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_auxiliar_control);
				
		if(parametro_auxiliar_control.parametro_auxiliarActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_auxiliar_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_auxiliar_control);
	}
	
	actualizarPaginaUsuarioInvitado(parametro_auxiliar_control) {
	
		var indexPosition=parametro_auxiliar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_auxiliar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_auxiliar_control) {
		jQuery("#divResumenparametro_auxiliarActualAjaxWebPart").html(parametro_auxiliar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_auxiliar_control) {
		jQuery("#divAccionesRelacionesparametro_auxiliarAjaxWebPart").html(parametro_auxiliar_control.htmlTablaAccionesRelaciones);
			
		parametro_auxiliar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_auxiliar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_auxiliar_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_auxiliar_control) {
		
		if(parametro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_auxiliar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_auxiliar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+parametro_auxiliar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_auxiliar_control.strVisibleFK_Idempresa);
		}

		if(parametro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_auxiliar_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex").attr("style",parametro_auxiliar_control.strVisibleFK_Idtipo_costeo_kardex);
			jQuery("#tblstrVisible"+parametro_auxiliar_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex").attr("style",parametro_auxiliar_control.strVisibleFK_Idtipo_costeo_kardex);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_auxiliar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_auxiliar",id,"general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		parametro_auxiliar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_auxiliar","empresa","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
	}

	abrirBusquedaParatipo_costeo_kardex(strNombreCampoBusqueda){//idActual
		parametro_auxiliar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_auxiliar","tipo_costeo_kardex","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_auxiliar_control) {
	
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id").val(parametro_auxiliar_control.parametro_auxiliarActual.id);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-version_row").val(parametro_auxiliar_control.parametro_auxiliarActual.versionRow);
		
		if(parametro_auxiliar_control.parametro_auxiliarActual.id_empresa!=null && parametro_auxiliar_control.parametro_auxiliarActual.id_empresa>-1){
			if(jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_auxiliar_control.parametro_auxiliarActual.id_empresa) {
				jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(parametro_auxiliar_control.parametro_auxiliarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-nombre_asignado").val(parametro_auxiliar_control.parametro_auxiliarActual.nombre_asignado);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-siguiente_numero_correlativo").val(parametro_auxiliar_control.parametro_auxiliarActual.siguiente_numero_correlativo);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-incremento").val(parametro_auxiliar_control.parametro_auxiliarActual.incremento);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-mostrar_solo_costo_producto").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.mostrar_solo_costo_producto);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_codigo_secuencial_producto").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_codigo_secuencial_producto);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-contador_producto").val(parametro_auxiliar_control.parametro_auxiliarActual.contador_producto);
		
		if(parametro_auxiliar_control.parametro_auxiliarActual.id_tipo_costeo_kardex!=null && parametro_auxiliar_control.parametro_auxiliarActual.id_tipo_costeo_kardex>-1){
			if(jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val() != parametro_auxiliar_control.parametro_auxiliarActual.id_tipo_costeo_kardex) {
				jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val(parametro_auxiliar_control.parametro_auxiliarActual.id_tipo_costeo_kardex).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").select2("val", null);
			if(jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_producto_inactivo").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_producto_inactivo);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_busqueda_incremental").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_busqueda_incremental);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-permitir_revisar_asiento").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.permitir_revisar_asiento);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-numero_decimales_unidades").val(parametro_auxiliar_control.parametro_auxiliarActual.numero_decimales_unidades);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-mostrar_documento_anulado").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.mostrar_documento_anulado);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-siguiente_numero_correlativo_cc").val(parametro_auxiliar_control.parametro_auxiliarActual.siguiente_numero_correlativo_cc);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_eliminacion_fisica_asiento").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_eliminacion_fisica_asiento);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-siguiente_numero_correlativo_asiento").val(parametro_auxiliar_control.parametro_auxiliarActual.siguiente_numero_correlativo_asiento);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_asiento_simple_factura").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_asiento_simple_factura);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_codigo_secuencial_cliente").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_codigo_secuencial_cliente);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-contador_cliente").val(parametro_auxiliar_control.parametro_auxiliarActual.contador_cliente);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_cliente_inactivo").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_cliente_inactivo);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_codigo_secuencial_proveedor").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_codigo_secuencial_proveedor);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-contador_proveedor").val(parametro_auxiliar_control.parametro_auxiliarActual.contador_proveedor);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_proveedor_inactivo").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_proveedor_inactivo);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-abreviatura_registro_tributario").val(parametro_auxiliar_control.parametro_auxiliarActual.abreviatura_registro_tributario);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_asiento_cheque").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_asiento_cheque);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_auxiliar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_auxiliar","general","","form_parametro_auxiliar",formulario,"","",paraEventoTabla,idFilaTabla,parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
	}
	
	cargarCombosFK(parametro_auxiliar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_auxiliar_control.strRecargarFkTipos,",")) { 
				parametro_auxiliar_webcontrol1.cargarCombosempresasFK(parametro_auxiliar_control);
			}

			if(parametro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_costeo_kardex",parametro_auxiliar_control.strRecargarFkTipos,",")) { 
				parametro_auxiliar_webcontrol1.cargarCombostipo_costeo_kardexsFK(parametro_auxiliar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_auxiliar_control.strRecargarFkTiposNinguno!=null && parametro_auxiliar_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_auxiliar_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_auxiliar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_auxiliar_control.strRecargarFkTiposNinguno,",")) { 
					parametro_auxiliar_webcontrol1.cargarCombosempresasFK(parametro_auxiliar_control);
				}

				if(parametro_auxiliar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_costeo_kardex",parametro_auxiliar_control.strRecargarFkTiposNinguno,",")) { 
					parametro_auxiliar_webcontrol1.cargarCombostipo_costeo_kardexsFK(parametro_auxiliar_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(parametro_auxiliar_control) {
		jQuery("#spanstrMensajeid").text(parametro_auxiliar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_auxiliar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(parametro_auxiliar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajenombre_asignado").text(parametro_auxiliar_control.strMensajenombre_asignado);		
		jQuery("#spanstrMensajesiguiente_numero_correlativo").text(parametro_auxiliar_control.strMensajesiguiente_numero_correlativo);		
		jQuery("#spanstrMensajeincremento").text(parametro_auxiliar_control.strMensajeincremento);		
		jQuery("#spanstrMensajemostrar_solo_costo_producto").text(parametro_auxiliar_control.strMensajemostrar_solo_costo_producto);		
		jQuery("#spanstrMensajecon_codigo_secuencial_producto").text(parametro_auxiliar_control.strMensajecon_codigo_secuencial_producto);		
		jQuery("#spanstrMensajecontador_producto").text(parametro_auxiliar_control.strMensajecontador_producto);		
		jQuery("#spanstrMensajeid_tipo_costeo_kardex").text(parametro_auxiliar_control.strMensajeid_tipo_costeo_kardex);		
		jQuery("#spanstrMensajecon_producto_inactivo").text(parametro_auxiliar_control.strMensajecon_producto_inactivo);		
		jQuery("#spanstrMensajecon_busqueda_incremental").text(parametro_auxiliar_control.strMensajecon_busqueda_incremental);		
		jQuery("#spanstrMensajepermitir_revisar_asiento").text(parametro_auxiliar_control.strMensajepermitir_revisar_asiento);		
		jQuery("#spanstrMensajenumero_decimales_unidades").text(parametro_auxiliar_control.strMensajenumero_decimales_unidades);		
		jQuery("#spanstrMensajemostrar_documento_anulado").text(parametro_auxiliar_control.strMensajemostrar_documento_anulado);		
		jQuery("#spanstrMensajesiguiente_numero_correlativo_cc").text(parametro_auxiliar_control.strMensajesiguiente_numero_correlativo_cc);		
		jQuery("#spanstrMensajecon_eliminacion_fisica_asiento").text(parametro_auxiliar_control.strMensajecon_eliminacion_fisica_asiento);		
		jQuery("#spanstrMensajesiguiente_numero_correlativo_asiento").text(parametro_auxiliar_control.strMensajesiguiente_numero_correlativo_asiento);		
		jQuery("#spanstrMensajecon_asiento_simple_factura").text(parametro_auxiliar_control.strMensajecon_asiento_simple_factura);		
		jQuery("#spanstrMensajecon_codigo_secuencial_cliente").text(parametro_auxiliar_control.strMensajecon_codigo_secuencial_cliente);		
		jQuery("#spanstrMensajecontador_cliente").text(parametro_auxiliar_control.strMensajecontador_cliente);		
		jQuery("#spanstrMensajecon_cliente_inactivo").text(parametro_auxiliar_control.strMensajecon_cliente_inactivo);		
		jQuery("#spanstrMensajecon_codigo_secuencial_proveedor").text(parametro_auxiliar_control.strMensajecon_codigo_secuencial_proveedor);		
		jQuery("#spanstrMensajecontador_proveedor").text(parametro_auxiliar_control.strMensajecontador_proveedor);		
		jQuery("#spanstrMensajecon_proveedor_inactivo").text(parametro_auxiliar_control.strMensajecon_proveedor_inactivo);		
		jQuery("#spanstrMensajeabreviatura_registro_tributario").text(parametro_auxiliar_control.strMensajeabreviatura_registro_tributario);		
		jQuery("#spanstrMensajecon_asiento_cheque").text(parametro_auxiliar_control.strMensajecon_asiento_cheque);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_auxiliar_control) {
		jQuery("#tdbtnNuevoparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_auxiliar").css("display",parametro_auxiliar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_auxiliar").css("display",parametro_auxiliar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_auxiliar").css("display",parametro_auxiliar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_auxiliar").css("display",parametro_auxiliar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(parametro_auxiliar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_auxiliar_funcion1,parametro_auxiliar_control.empresasFK);
	}

	cargarComboEditarTablatipo_costeo_kardexFK(parametro_auxiliar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_auxiliar_funcion1,parametro_auxiliar_control.tipo_costeo_kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(parametro_auxiliar_control) {
		var i=0;
		
		i=parametro_auxiliar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_auxiliar_control.parametro_auxiliarActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_auxiliar_control.parametro_auxiliarActual.versionRow);
		
		if(parametro_auxiliar_control.parametro_auxiliarActual.id_empresa!=null && parametro_auxiliar_control.parametro_auxiliarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != parametro_auxiliar_control.parametro_auxiliarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(parametro_auxiliar_control.parametro_auxiliarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(parametro_auxiliar_control.parametro_auxiliarActual.nombre_asignado);
		jQuery("#t-cel_"+i+"_4").val(parametro_auxiliar_control.parametro_auxiliarActual.siguiente_numero_correlativo);
		jQuery("#t-cel_"+i+"_5").val(parametro_auxiliar_control.parametro_auxiliarActual.incremento);
		jQuery("#t-cel_"+i+"_6").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.mostrar_solo_costo_producto);
		jQuery("#t-cel_"+i+"_7").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_codigo_secuencial_producto);
		jQuery("#t-cel_"+i+"_8").val(parametro_auxiliar_control.parametro_auxiliarActual.contador_producto);
		
		if(parametro_auxiliar_control.parametro_auxiliarActual.id_tipo_costeo_kardex!=null && parametro_auxiliar_control.parametro_auxiliarActual.id_tipo_costeo_kardex>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != parametro_auxiliar_control.parametro_auxiliarActual.id_tipo_costeo_kardex) {
				jQuery("#t-cel_"+i+"_9").val(parametro_auxiliar_control.parametro_auxiliarActual.id_tipo_costeo_kardex).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_9").select2("val", null);
			if(jQuery("#t-cel_"+i+"_9").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_producto_inactivo);
		jQuery("#t-cel_"+i+"_11").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_busqueda_incremental);
		jQuery("#t-cel_"+i+"_12").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.permitir_revisar_asiento);
		jQuery("#t-cel_"+i+"_13").val(parametro_auxiliar_control.parametro_auxiliarActual.numero_decimales_unidades);
		jQuery("#t-cel_"+i+"_14").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.mostrar_documento_anulado);
		jQuery("#t-cel_"+i+"_15").val(parametro_auxiliar_control.parametro_auxiliarActual.siguiente_numero_correlativo_cc);
		jQuery("#t-cel_"+i+"_16").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_eliminacion_fisica_asiento);
		jQuery("#t-cel_"+i+"_17").val(parametro_auxiliar_control.parametro_auxiliarActual.siguiente_numero_correlativo_asiento);
		jQuery("#t-cel_"+i+"_18").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_asiento_simple_factura);
		jQuery("#t-cel_"+i+"_19").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_codigo_secuencial_cliente);
		jQuery("#t-cel_"+i+"_20").val(parametro_auxiliar_control.parametro_auxiliarActual.contador_cliente);
		jQuery("#t-cel_"+i+"_21").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_cliente_inactivo);
		jQuery("#t-cel_"+i+"_22").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_codigo_secuencial_proveedor);
		jQuery("#t-cel_"+i+"_23").val(parametro_auxiliar_control.parametro_auxiliarActual.contador_proveedor);
		jQuery("#t-cel_"+i+"_24").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_proveedor_inactivo);
		jQuery("#t-cel_"+i+"_25").val(parametro_auxiliar_control.parametro_auxiliarActual.abreviatura_registro_tributario);
		jQuery("#t-cel_"+i+"_26").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_asiento_cheque);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_auxiliar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_auxiliar_control) {
		parametro_auxiliar_funcion1.registrarControlesTableValidacionEdition(parametro_auxiliar_control,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliarConstante,strParametros);
		
		//parametro_auxiliar_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(parametro_auxiliar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa",parametro_auxiliar_control.empresasFK);

		if(parametro_auxiliar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_auxiliar_control.idFilaTablaActual+"_2",parametro_auxiliar_control.empresasFK);
		}
	};

	cargarCombostipo_costeo_kardexsFK(parametro_auxiliar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex",parametro_auxiliar_control.tipo_costeo_kardexsFK);

		if(parametro_auxiliar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_auxiliar_control.idFilaTablaActual+"_9",parametro_auxiliar_control.tipo_costeo_kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_auxiliar_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex",parametro_auxiliar_control.tipo_costeo_kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_auxiliar_control) {

	};

	registrarComboActionChangeCombostipo_costeo_kardexsFK(parametro_auxiliar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_auxiliar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_auxiliar_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_auxiliar_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(parametro_auxiliar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_costeo_kardexsFK(parametro_auxiliar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_auxiliar_control.idtipo_costeo_kardexDefaultFK>-1 && jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val() != parametro_auxiliar_control.idtipo_costeo_kardexDefaultFK) {
				jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val(parametro_auxiliar_control.idtipo_costeo_kardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_auxiliar_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex").val(parametro_auxiliar_control.idtipo_costeo_kardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_auxiliar_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_auxiliar_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_auxiliar_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_auxiliar_control.strRecargarFkTipos,",")) { 
				parametro_auxiliar_webcontrol1.setDefectoValorCombosempresasFK(parametro_auxiliar_control);
			}

			if(parametro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_costeo_kardex",parametro_auxiliar_control.strRecargarFkTipos,",")) { 
				parametro_auxiliar_webcontrol1.setDefectoValorCombostipo_costeo_kardexsFK(parametro_auxiliar_control);
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
	onLoadCombosEventosFK(parametro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_auxiliar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_auxiliar_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_auxiliar_control);
			//}

			//if(parametro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_costeo_kardex",parametro_auxiliar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_auxiliar_webcontrol1.registrarComboActionChangeCombostipo_costeo_kardexsFK(parametro_auxiliar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_auxiliar");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_auxiliar");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_auxiliar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);			
			
			if(parametro_auxiliar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,"parametro_auxiliar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_auxiliar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_costeo_kardex","id_tipo_costeo_kardex","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex_img_busqueda").click(function(){
				parametro_auxiliar_webcontrol1.abrirBusquedaParatipo_costeo_kardex("id_tipo_costeo_kardex");
				//alert(jQuery('#form-id_tipo_costeo_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_auxiliar","FK_Idempresa","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_auxiliar","FK_Idtipo_costeo_kardex","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			parametro_auxiliar_funcion1.validarFormularioJQuery(parametro_auxiliar_constante1);
			
			if(parametro_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_auxiliar_control) {
		
		jQuery("#divBusquedaparametro_auxiliarAjaxWebPart").css("display",parametro_auxiliar_control.strPermisoBusqueda);
		jQuery("#trparametro_auxiliarCabeceraBusquedas").css("display",parametro_auxiliar_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_auxiliar").css("display",parametro_auxiliar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_auxiliar").css("display",parametro_auxiliar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_auxiliar").attr("style",parametro_auxiliar_control.strPermisoMostrarTodos);
		
		if(parametro_auxiliar_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_auxiliarNuevo").css("display",parametro_auxiliar_control.strPermisoNuevo);
			jQuery("#tdparametro_auxiliarNuevoToolBar").css("display",parametro_auxiliar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_auxiliarDuplicar").css("display",parametro_auxiliar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_auxiliarDuplicarToolBar").css("display",parametro_auxiliar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_auxiliarNuevoGuardarCambios").css("display",parametro_auxiliar_control.strPermisoNuevo);
			jQuery("#tdparametro_auxiliarNuevoGuardarCambiosToolBar").css("display",parametro_auxiliar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_auxiliar_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_auxiliarActualizarToolBar").css("display",parametro_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_auxiliarCopiar").css("display",parametro_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_auxiliarCopiarToolBar").css("display",parametro_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_auxiliarConEditar").css("display",parametro_auxiliar_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_auxiliarEliminarToolBar").css("display",parametro_auxiliar_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdparametro_auxiliarGuardarCambios").css("display",parametro_auxiliar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_auxiliarGuardarCambiosToolBar").css("display",parametro_auxiliar_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trparametro_auxiliarElementos").css("display",parametro_auxiliar_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_auxiliarAcciones").css("display",parametro_auxiliar_control.strVisibleTablaAcciones);
		jQuery("#trparametro_auxiliarParametrosAcciones").css("display",parametro_auxiliar_control.strVisibleTablaAcciones);
			
		jQuery("#tdparametro_auxiliarCerrarPagina").css("display",parametro_auxiliar_control.strPermisoPopup);		
		jQuery("#tdparametro_auxiliarCerrarPaginaToolBar").css("display",parametro_auxiliar_control.strPermisoPopup);
		//jQuery("#trparametro_auxiliarAccionesRelaciones").css("display",parametro_auxiliar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_auxiliar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_auxiliar_webcontrol1.registrarEventosControles();
		
		if(parametro_auxiliar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			parametro_auxiliar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_auxiliar_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_auxiliar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_auxiliar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(parametro_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_auxiliar_webcontrol1.onLoad();
				
			} else {
				if(parametro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
					if(parametro_auxiliar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
						//parametro_auxiliar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(parametro_auxiliar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_auxiliar_constante1.BIG_ID_ACTUAL,"parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
						//parametro_auxiliar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			parametro_auxiliar_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var parametro_auxiliar_webcontrol1=new parametro_auxiliar_webcontrol();

if(parametro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_auxiliar_webcontrol1.onLoadWindow; 
}

//</script>