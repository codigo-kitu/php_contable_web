//<script type="text/javascript" language="javascript">



//var perfil_campoJQueryPaginaWebInteraccion= function (perfil_campo_control) {
//this.,this.,this.

class perfil_campo_webcontrol extends perfil_campo_webcontrol_add {
	
	perfil_campo_control=null;
	perfil_campo_controlInicial=null;
	perfil_campo_controlAuxiliar=null;
		
	//if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_campo_control) {
		super();
		
		this.perfil_campo_control=perfil_campo_control;
	}
		
	actualizarVariablesPagina(perfil_campo_control) {
		
		if(perfil_campo_control.action=="index" || perfil_campo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_campo_control);
			
		} else if(perfil_campo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(perfil_campo_control);
			
		} else if(perfil_campo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(perfil_campo_control);
			
		} else if(perfil_campo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_campo_control);		
		
		} else if(perfil_campo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(perfil_campo_control);		
		
		} else if(perfil_campo_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_campo_control);		
		
		} else if(perfil_campo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_campo_control);		
		}
		else if(perfil_campo_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_campo_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(perfil_campo_control.action + " Revisar Manejo");
			
			if(perfil_campo_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(perfil_campo_control);
				
				return;
			}
			
			//if(perfil_campo_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(perfil_campo_control);
			//}
			
			if(perfil_campo_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(perfil_campo_control);
			}
			
			if(perfil_campo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_campo_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(perfil_campo_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(perfil_campo_control, false);			
			}
			
			if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(perfil_campo_control);	
			}
			
			if(perfil_campo_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(perfil_campo_control);
			}
			
			if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(perfil_campo_control);
			}
			
			if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(perfil_campo_control);
			}
			
			if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(perfil_campo_control);	
			}
			
			if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
			}
			
			if(perfil_campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(perfil_campo_control);
			}
			
			
			if(perfil_campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(perfil_campo_control);			
			}
			
			if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(perfil_campo_control);
			}
			
			
			if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(perfil_campo_control);
			}
			
			if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(perfil_campo_control);
			}				
			
			if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_campo_control);
			}
			
			if(perfil_campo_control.usuarioActual!=null && perfil_campo_control.usuarioActual.field_strUserName!=null &&
			perfil_campo_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(perfil_campo_control);			
			}
		}
		
		
		if(perfil_campo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_campo_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(perfil_campo_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_campo_control);
		this.actualizarPaginaTablaDatos(perfil_campo_control);
		this.actualizarPaginaCargaGeneralControles(perfil_campo_control);
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_campo_control);
		this.actualizarPaginaAreaBusquedas(perfil_campo_control);
		this.actualizarPaginaCargaCombosFK(perfil_campo_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_campo_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_campo_control);
		this.actualizarPaginaTablaDatos(perfil_campo_control);
		this.actualizarPaginaCargaGeneralControles(perfil_campo_control);
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_campo_control);
		this.actualizarPaginaAreaBusquedas(perfil_campo_control);
		this.actualizarPaginaCargaCombosFK(perfil_campo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(perfil_campo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_campo_control);		
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(perfil_campo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_campo_control);		
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(perfil_campo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_campo_control);		
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_campo_control) {
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(perfil_campo_control) {
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_campo_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_campo_control);
		this.actualizarPaginaCargaCombosFK(perfil_campo_control);
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_campo_control) {
		this.actualizarPaginaAbrirLink(perfil_campo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);				
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);
		this.actualizarPaginaFormulario(perfil_campo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);
		this.actualizarPaginaFormulario(perfil_campo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(perfil_campo_control) {
		this.actualizarPaginaFormulario(perfil_campo_control);
		this.onLoadCombosDefectoFK(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);
		this.actualizarPaginaFormulario(perfil_campo_control);
		this.onLoadCombosDefectoFK(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_campo_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_campo_control);
		this.actualizarPaginaCargaCombosFK(perfil_campo_control);
		this.actualizarPaginaFormulario(perfil_campo_control);
		this.onLoadCombosDefectoFK(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_campo_control) {
		this.actualizarPaginaAbrirLink(perfil_campo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_campo_control) {
		this.actualizarPaginaImprimir(perfil_campo_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_campo_control) {
		this.actualizarPaginaImprimir(perfil_campo_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_campo_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_campo_control) {
		//FORMULARIO
		if(perfil_campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_campo_control);
			this.actualizarPaginaFormularioAdd(perfil_campo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		//COMBOS FK
		if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_campo_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(perfil_campo_control) {
		//FORMULARIO
		if(perfil_campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_campo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);	
		//COMBOS FK
		if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_campo_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_campo_control) {
		//FORMULARIO
		if(perfil_campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_campo_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_campo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);	
		//COMBOS FK
		if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_campo_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control) {
		if(perfil_campo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_campo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_campo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_campo_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_campo_control) {
		if(perfil_campo_funcion1.esPaginaForm()==true) {
			window.opener.perfil_campo_webcontrol1.actualizarPaginaTablaDatos(perfil_campo_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_campo_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_campo_control) {
		perfil_campo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_campo_control.strAuxiliarUrlPagina);
				
		perfil_campo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_campo_control.strAuxiliarTipo,perfil_campo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_campo_control) {
		perfil_campo_funcion1.resaltarRestaurarDivMensaje(true,perfil_campo_control.strAuxiliarMensajeAlert,perfil_campo_control.strAuxiliarCssMensaje);
			
		if(perfil_campo_funcion1.esPaginaForm()==true) {
			window.opener.perfil_campo_funcion1.resaltarRestaurarDivMensaje(true,perfil_campo_control.strAuxiliarMensajeAlert,perfil_campo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(perfil_campo_control) {
		eval(perfil_campo_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(perfil_campo_control, mostrar) {
		
		if(mostrar==true) {
			perfil_campo_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_campo_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			perfil_campo_funcion1.mostrarDivMensaje(true,perfil_campo_control.strAuxiliarMensaje,perfil_campo_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_campo_funcion1.mostrarDivMensaje(false,perfil_campo_control.strAuxiliarMensaje,perfil_campo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(perfil_campo_control) {
	
		funcionGeneral.printWebPartPage("perfil_campo",perfil_campo_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarperfil_camposAjaxWebPart").html(perfil_campo_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("perfil_campo",jQuery("#divTablaDatosReporteAuxiliarperfil_camposAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(perfil_campo_control) {
		this.perfil_campo_controlInicial=perfil_campo_control;
			
		if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_campo_control.strStyleDivArbol,perfil_campo_control.strStyleDivContent
																,perfil_campo_control.strStyleDivOpcionesBanner,perfil_campo_control.strStyleDivExpandirColapsar
																,perfil_campo_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=perfil_campo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",perfil_campo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(perfil_campo_control) {
		jQuery("#divTablaDatosperfil_camposAjaxWebPart").html(perfil_campo_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosperfil_campos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosperfil_campos=jQuery("#tblTablaDatosperfil_campos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("perfil_campo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',perfil_campo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			perfil_campo_webcontrol1.registrarControlesTableEdition(perfil_campo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		perfil_campo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(perfil_campo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(perfil_campo_control.perfil_campoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(perfil_campo_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(perfil_campo_control) {
		this.actualizarCssBotonesPagina(perfil_campo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_campo_control.tiposReportes,perfil_campo_control.tiposReporte
															 	,perfil_campo_control.tiposPaginacion,perfil_campo_control.tiposAcciones
																,perfil_campo_control.tiposColumnasSelect,perfil_campo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_campo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_campo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_campo_control);			
	}
	
	actualizarPaginaAreaBusquedas(perfil_campo_control) {
		jQuery("#divBusquedaperfil_campoAjaxWebPart").css("display",perfil_campo_control.strPermisoBusqueda);
		jQuery("#trperfil_campoCabeceraBusquedas").css("display",perfil_campo_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_campo").css("display",perfil_campo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(perfil_campo_control.htmlTablaOrderBy!=null
			&& perfil_campo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByperfil_campoAjaxWebPart").html(perfil_campo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//perfil_campo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(perfil_campo_control.htmlTablaOrderByRel!=null
			&& perfil_campo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelperfil_campoAjaxWebPart").html(perfil_campo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(perfil_campo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaperfil_campoAjaxWebPart").css("display","none");
			jQuery("#trperfil_campoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaperfil_campo").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(perfil_campo_control) {
		jQuery("#tdperfil_campoNuevo").css("display",perfil_campo_control.strPermisoNuevo);
		jQuery("#trperfil_campoElementos").css("display",perfil_campo_control.strVisibleTablaElementos);
		jQuery("#trperfil_campoAcciones").css("display",perfil_campo_control.strVisibleTablaAcciones);
		jQuery("#trperfil_campoParametrosAcciones").css("display",perfil_campo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(perfil_campo_control) {
	
		this.actualizarCssBotonesMantenimiento(perfil_campo_control);
				
		if(perfil_campo_control.perfil_campoActual!=null) {//form
			
			this.actualizarCamposFormulario(perfil_campo_control);			
		}
						
		this.actualizarSpanMensajesCampos(perfil_campo_control);
	}
	
	actualizarPaginaUsuarioInvitado(perfil_campo_control) {
	
		var indexPosition=perfil_campo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_campo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(perfil_campo_control) {
		jQuery("#divResumenperfil_campoActualAjaxWebPart").html(perfil_campo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_campo_control) {
		jQuery("#divAccionesRelacionesperfil_campoAjaxWebPart").html(perfil_campo_control.htmlTablaAccionesRelaciones);
			
		perfil_campo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(perfil_campo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(perfil_campo_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(perfil_campo_control) {
		
		if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo").attr("style",perfil_campo_control.strVisibleFK_Idcampo);
			jQuery("#tblstrVisible"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo").attr("style",perfil_campo_control.strVisibleFK_Idcampo);
		}

		if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_campo_control.strVisibleFK_Idperfil);
			jQuery("#tblstrVisible"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_campo_control.strVisibleFK_Idperfil);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionperfil_campo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("perfil_campo",id,"seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);		
	}
	
	

	abrirBusquedaParaperfil(strNombreCampoBusqueda){//idActual
		perfil_campo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_campo","perfil","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
	}

	abrirBusquedaParacampo(strNombreCampoBusqueda){//idActual
		perfil_campo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_campo","campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
	}
	
	

	setCombosCodigoDesdeBusquedaid_perfil(id_perfil) {
		if(jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val() != id_perfil) {
			jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val(id_perfil).trigger("change");

		}
		if(jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != id_perfil) {
			jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(id_perfil).trigger("change");
		}

	}
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(perfil_campo_control) {
	
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id").val(perfil_campo_control.perfil_campoActual.id);
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-version_row").val(perfil_campo_control.perfil_campoActual.versionRow);
		
		if(perfil_campo_control.perfil_campoActual.id_perfil!=null && perfil_campo_control.perfil_campoActual.id_perfil>-1){
			if(jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_campo_control.perfil_campoActual.id_perfil) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val(perfil_campo_control.perfil_campoActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").select2("val", null);
			if(jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_campo_control.perfil_campoActual.id_campo!=null && perfil_campo_control.perfil_campoActual.id_campo>-1){
			if(jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val() != perfil_campo_control.perfil_campoActual.id_campo) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val(perfil_campo_control.perfil_campoActual.id_campo).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").select2("val", null);
			if(jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-todo").prop('checked',perfil_campo_control.perfil_campoActual.todo);
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-ingreso").prop('checked',perfil_campo_control.perfil_campoActual.ingreso);
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-modificacion").prop('checked',perfil_campo_control.perfil_campoActual.modificacion);
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-eliminacion").prop('checked',perfil_campo_control.perfil_campoActual.eliminacion);
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-consulta").prop('checked',perfil_campo_control.perfil_campoActual.consulta);
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-estado").prop('checked',perfil_campo_control.perfil_campoActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+perfil_campo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("perfil_campo","seguridad","","form_perfil_campo",formulario,"","",paraEventoTabla,idFilaTabla,perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
	}
	
	cargarCombosFK(perfil_campo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_campo_control.strRecargarFkTipos,",")) { 
				perfil_campo_webcontrol1.cargarCombosperfilsFK(perfil_campo_control);
			}

			if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_campo",perfil_campo_control.strRecargarFkTipos,",")) { 
				perfil_campo_webcontrol1.cargarComboscamposFK(perfil_campo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_campo_control.strRecargarFkTiposNinguno!=null && perfil_campo_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_campo_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_campo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_perfil",perfil_campo_control.strRecargarFkTiposNinguno,",")) { 
					perfil_campo_webcontrol1.cargarCombosperfilsFK(perfil_campo_control);
				}

				if(perfil_campo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_campo",perfil_campo_control.strRecargarFkTiposNinguno,",")) { 
					perfil_campo_webcontrol1.cargarComboscamposFK(perfil_campo_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(perfil_campo_control) {
		jQuery("#spanstrMensajeid").text(perfil_campo_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(perfil_campo_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_perfil").text(perfil_campo_control.strMensajeid_perfil);		
		jQuery("#spanstrMensajeid_campo").text(perfil_campo_control.strMensajeid_campo);		
		jQuery("#spanstrMensajetodo").text(perfil_campo_control.strMensajetodo);		
		jQuery("#spanstrMensajeingreso").text(perfil_campo_control.strMensajeingreso);		
		jQuery("#spanstrMensajemodificacion").text(perfil_campo_control.strMensajemodificacion);		
		jQuery("#spanstrMensajeeliminacion").text(perfil_campo_control.strMensajeeliminacion);		
		jQuery("#spanstrMensajeconsulta").text(perfil_campo_control.strMensajeconsulta);		
		jQuery("#spanstrMensajeestado").text(perfil_campo_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(perfil_campo_control) {
		jQuery("#tdbtnNuevoperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoperfil_campo").css("display",perfil_campo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarperfil_campo").css("display",perfil_campo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarperfil_campo").css("display",perfil_campo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosperfil_campo").css("display",perfil_campo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaperfilFK(perfil_campo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_campo_funcion1,perfil_campo_control.perfilsFK);
	}

	cargarComboEditarTablacampoFK(perfil_campo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_campo_funcion1,perfil_campo_control.camposFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(perfil_campo_control) {
		var i=0;
		
		i=perfil_campo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(perfil_campo_control.perfil_campoActual.id);
		jQuery("#t-version_row_"+i+"").val(perfil_campo_control.perfil_campoActual.versionRow);
		
		if(perfil_campo_control.perfil_campoActual.id_perfil!=null && perfil_campo_control.perfil_campoActual.id_perfil>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != perfil_campo_control.perfil_campoActual.id_perfil) {
				jQuery("#t-cel_"+i+"_2").val(perfil_campo_control.perfil_campoActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_campo_control.perfil_campoActual.id_campo!=null && perfil_campo_control.perfil_campoActual.id_campo>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != perfil_campo_control.perfil_campoActual.id_campo) {
				jQuery("#t-cel_"+i+"_3").val(perfil_campo_control.perfil_campoActual.id_campo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").prop('checked',perfil_campo_control.perfil_campoActual.todo);
		jQuery("#t-cel_"+i+"_5").prop('checked',perfil_campo_control.perfil_campoActual.ingreso);
		jQuery("#t-cel_"+i+"_6").prop('checked',perfil_campo_control.perfil_campoActual.modificacion);
		jQuery("#t-cel_"+i+"_7").prop('checked',perfil_campo_control.perfil_campoActual.eliminacion);
		jQuery("#t-cel_"+i+"_8").prop('checked',perfil_campo_control.perfil_campoActual.consulta);
		jQuery("#t-cel_"+i+"_9").prop('checked',perfil_campo_control.perfil_campoActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(perfil_campo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(perfil_campo_control) {
		perfil_campo_funcion1.registrarControlesTableValidacionEdition(perfil_campo_control,perfil_campo_webcontrol1,perfil_campo_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campoConstante,strParametros);
		
		//perfil_campo_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosperfilsFK(perfil_campo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil",perfil_campo_control.perfilsFK);

		if(perfil_campo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_campo_control.idFilaTablaActual+"_2",perfil_campo_control.perfilsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil",perfil_campo_control.perfilsFK);

	};

	cargarComboscamposFK(perfil_campo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo",perfil_campo_control.camposFK);

		if(perfil_campo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_campo_control.idFilaTablaActual+"_3",perfil_campo_control.camposFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo-cmbid_campo",perfil_campo_control.camposFK);

	};

	
	
	registrarComboActionChangeCombosperfilsFK(perfil_campo_control) {

	};

	registrarComboActionChangeComboscamposFK(perfil_campo_control) {

	};

	
	
	setDefectoValorCombosperfilsFK(perfil_campo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_campo_control.idperfilDefaultFK>-1 && jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_campo_control.idperfilDefaultFK) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val(perfil_campo_control.idperfilDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(perfil_campo_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscamposFK(perfil_campo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_campo_control.idcampoDefaultFK>-1 && jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val() != perfil_campo_control.idcampoDefaultFK) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val(perfil_campo_control.idcampoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo-cmbid_campo").val(perfil_campo_control.idcampoDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo-cmbid_campo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo-cmbid_campo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_campo_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_campo_control.strRecargarFkTipos,",")) { 
				perfil_campo_webcontrol1.setDefectoValorCombosperfilsFK(perfil_campo_control);
			}

			if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_campo",perfil_campo_control.strRecargarFkTipos,",")) { 
				perfil_campo_webcontrol1.setDefectoValorComboscamposFK(perfil_campo_control);
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
	onLoadCombosEventosFK(perfil_campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_campo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_campo_webcontrol1.registrarComboActionChangeCombosperfilsFK(perfil_campo_control);
			//}

			//if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_campo",perfil_campo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_campo_webcontrol1.registrarComboActionChangeComboscamposFK(perfil_campo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil_campo");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil_campo");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(perfil_campo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);			
			
			if(perfil_campo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,"perfil_campo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("perfil","id_perfil","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil_img_busqueda").click(function(){
				perfil_campo_webcontrol1.abrirBusquedaParaperfil("id_perfil");
				//alert(jQuery('#form-id_perfil_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("campo","id_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo_img_busqueda").click(function(){
				perfil_campo_webcontrol1.abrirBusquedaParacampo("id_campo");
				//alert(jQuery('#form-id_campo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_campo","FK_Idcampo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_campo","FK_Idperfil","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			perfil_campo_funcion1.validarFormularioJQuery(perfil_campo_constante1);
			
			if(perfil_campo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_campo_control) {
		
		jQuery("#divBusquedaperfil_campoAjaxWebPart").css("display",perfil_campo_control.strPermisoBusqueda);
		jQuery("#trperfil_campoCabeceraBusquedas").css("display",perfil_campo_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_campo").css("display",perfil_campo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteperfil_campo").css("display",perfil_campo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosperfil_campo").attr("style",perfil_campo_control.strPermisoMostrarTodos);
		
		if(perfil_campo_control.strPermisoNuevo!=null) {
			jQuery("#tdperfil_campoNuevo").css("display",perfil_campo_control.strPermisoNuevo);
			jQuery("#tdperfil_campoNuevoToolBar").css("display",perfil_campo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdperfil_campoDuplicar").css("display",perfil_campo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_campoDuplicarToolBar").css("display",perfil_campo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_campoNuevoGuardarCambios").css("display",perfil_campo_control.strPermisoNuevo);
			jQuery("#tdperfil_campoNuevoGuardarCambiosToolBar").css("display",perfil_campo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(perfil_campo_control.strPermisoActualizar!=null) {
			jQuery("#tdperfil_campoActualizarToolBar").css("display",perfil_campo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_campoCopiar").css("display",perfil_campo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_campoCopiarToolBar").css("display",perfil_campo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_campoConEditar").css("display",perfil_campo_control.strPermisoActualizar);
		}
		
		jQuery("#tdperfil_campoEliminarToolBar").css("display",perfil_campo_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdperfil_campoGuardarCambios").css("display",perfil_campo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdperfil_campoGuardarCambiosToolBar").css("display",perfil_campo_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trperfil_campoElementos").css("display",perfil_campo_control.strVisibleTablaElementos);
		
		jQuery("#trperfil_campoAcciones").css("display",perfil_campo_control.strVisibleTablaAcciones);
		jQuery("#trperfil_campoParametrosAcciones").css("display",perfil_campo_control.strVisibleTablaAcciones);
			
		jQuery("#tdperfil_campoCerrarPagina").css("display",perfil_campo_control.strPermisoPopup);		
		jQuery("#tdperfil_campoCerrarPaginaToolBar").css("display",perfil_campo_control.strPermisoPopup);
		//jQuery("#trperfil_campoAccionesRelaciones").css("display",perfil_campo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_campo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_campo_webcontrol1.registrarEventosControles();
		
		if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
			perfil_campo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_campo_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_campo_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_campo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_campo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(perfil_campo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				perfil_campo_webcontrol1.onLoad();
				
			} else {
				if(perfil_campo_constante1.BIT_ES_PAGINA_FORM==true) {
					if(perfil_campo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
						//perfil_campo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(perfil_campo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(perfil_campo_constante1.BIG_ID_ACTUAL,"perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
						//perfil_campo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			perfil_campo_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var perfil_campo_webcontrol1=new perfil_campo_webcontrol();

if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_campo_webcontrol1.onLoadWindow; 
}

//</script>