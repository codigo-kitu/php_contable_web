//<script type="text/javascript" language="javascript">



//var perfil_usuarioJQueryPaginaWebInteraccion= function (perfil_usuario_control) {
//this.,this.,this.

class perfil_usuario_webcontrol extends perfil_usuario_webcontrol_add {
	
	perfil_usuario_control=null;
	perfil_usuario_controlInicial=null;
	perfil_usuario_controlAuxiliar=null;
		
	//if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_usuario_control) {
		super();
		
		this.perfil_usuario_control=perfil_usuario_control;
	}
		
	actualizarVariablesPagina(perfil_usuario_control) {
		
		if(perfil_usuario_control.action=="index" || perfil_usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_usuario_control);
			
		} else if(perfil_usuario_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(perfil_usuario_control);
			
		} else if(perfil_usuario_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(perfil_usuario_control);
			
		} else if(perfil_usuario_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_usuario_control);		
		
		} else if(perfil_usuario_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(perfil_usuario_control);		
		
		} else if(perfil_usuario_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_usuario_control);		
		
		} else if(perfil_usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_usuario_control);		
		}
		else if(perfil_usuario_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_usuario_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(perfil_usuario_control.action + " Revisar Manejo");
			
			if(perfil_usuario_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(perfil_usuario_control);
				
				return;
			}
			
			//if(perfil_usuario_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(perfil_usuario_control);
			//}
			
			if(perfil_usuario_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(perfil_usuario_control);
			}
			
			if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_usuario_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(perfil_usuario_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(perfil_usuario_control, false);			
			}
			
			if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(perfil_usuario_control);	
			}
			
			if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(perfil_usuario_control);
			}
			
			if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(perfil_usuario_control);
			}
			
			if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(perfil_usuario_control);
			}
			
			if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(perfil_usuario_control);	
			}
			
			if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
			}
			
			if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(perfil_usuario_control);
			}
			
			
			if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(perfil_usuario_control);			
			}
			
			if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(perfil_usuario_control);
			}
			
			
			if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(perfil_usuario_control);
			}
			
			if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(perfil_usuario_control);
			}				
			
			if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_usuario_control);
			}
			
			if(perfil_usuario_control.usuarioActual!=null && perfil_usuario_control.usuarioActual.field_strUserName!=null &&
			perfil_usuario_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(perfil_usuario_control);			
			}
		}
		
		
		if(perfil_usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_usuario_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(perfil_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_usuario_control);
		this.actualizarPaginaTablaDatos(perfil_usuario_control);
		this.actualizarPaginaCargaGeneralControles(perfil_usuario_control);
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_usuario_control);
		this.actualizarPaginaAreaBusquedas(perfil_usuario_control);
		this.actualizarPaginaCargaCombosFK(perfil_usuario_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_usuario_control);
		this.actualizarPaginaTablaDatos(perfil_usuario_control);
		this.actualizarPaginaCargaGeneralControles(perfil_usuario_control);
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_usuario_control);
		this.actualizarPaginaAreaBusquedas(perfil_usuario_control);
		this.actualizarPaginaCargaCombosFK(perfil_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(perfil_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(perfil_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(perfil_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_usuario_control) {
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(perfil_usuario_control) {
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_usuario_control);
		this.actualizarPaginaCargaCombosFK(perfil_usuario_control);
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_usuario_control) {
		this.actualizarPaginaAbrirLink(perfil_usuario_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);				
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);
		this.actualizarPaginaFormulario(perfil_usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);
		this.actualizarPaginaFormulario(perfil_usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(perfil_usuario_control) {
		this.actualizarPaginaFormulario(perfil_usuario_control);
		this.onLoadCombosDefectoFK(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);
		this.actualizarPaginaFormulario(perfil_usuario_control);
		this.onLoadCombosDefectoFK(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_usuario_control);
		this.actualizarPaginaCargaCombosFK(perfil_usuario_control);
		this.actualizarPaginaFormulario(perfil_usuario_control);
		this.onLoadCombosDefectoFK(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_usuario_control) {
		this.actualizarPaginaAbrirLink(perfil_usuario_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_usuario_control) {
		this.actualizarPaginaImprimir(perfil_usuario_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_usuario_control) {
		this.actualizarPaginaImprimir(perfil_usuario_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_usuario_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_usuario_control) {
		//FORMULARIO
		if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_usuario_control);
			this.actualizarPaginaFormularioAdd(perfil_usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		//COMBOS FK
		if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_usuario_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(perfil_usuario_control) {
		//FORMULARIO
		if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);	
		//COMBOS FK
		if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_usuario_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_usuario_control) {
		//FORMULARIO
		if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_usuario_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_usuario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);	
		//COMBOS FK
		if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_usuario_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control) {
		if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_usuario_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_usuario_control) {
		if(perfil_usuario_funcion1.esPaginaForm()==true) {
			window.opener.perfil_usuario_webcontrol1.actualizarPaginaTablaDatos(perfil_usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_usuario_control) {
		perfil_usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_usuario_control.strAuxiliarUrlPagina);
				
		perfil_usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_usuario_control.strAuxiliarTipo,perfil_usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_usuario_control) {
		perfil_usuario_funcion1.resaltarRestaurarDivMensaje(true,perfil_usuario_control.strAuxiliarMensajeAlert,perfil_usuario_control.strAuxiliarCssMensaje);
			
		if(perfil_usuario_funcion1.esPaginaForm()==true) {
			window.opener.perfil_usuario_funcion1.resaltarRestaurarDivMensaje(true,perfil_usuario_control.strAuxiliarMensajeAlert,perfil_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(perfil_usuario_control) {
		eval(perfil_usuario_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(perfil_usuario_control, mostrar) {
		
		if(mostrar==true) {
			perfil_usuario_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_usuario_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			perfil_usuario_funcion1.mostrarDivMensaje(true,perfil_usuario_control.strAuxiliarMensaje,perfil_usuario_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_usuario_funcion1.mostrarDivMensaje(false,perfil_usuario_control.strAuxiliarMensaje,perfil_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(perfil_usuario_control) {
	
		funcionGeneral.printWebPartPage("perfil_usuario",perfil_usuario_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarperfil_usuariosAjaxWebPart").html(perfil_usuario_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("perfil_usuario",jQuery("#divTablaDatosReporteAuxiliarperfil_usuariosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(perfil_usuario_control) {
		this.perfil_usuario_controlInicial=perfil_usuario_control;
			
		if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_usuario_control.strStyleDivArbol,perfil_usuario_control.strStyleDivContent
																,perfil_usuario_control.strStyleDivOpcionesBanner,perfil_usuario_control.strStyleDivExpandirColapsar
																,perfil_usuario_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=perfil_usuario_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",perfil_usuario_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(perfil_usuario_control) {
		jQuery("#divTablaDatosperfil_usuariosAjaxWebPart").html(perfil_usuario_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosperfil_usuarios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosperfil_usuarios=jQuery("#tblTablaDatosperfil_usuarios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("perfil_usuario",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',perfil_usuario_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			perfil_usuario_webcontrol1.registrarControlesTableEdition(perfil_usuario_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		perfil_usuario_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(perfil_usuario_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(perfil_usuario_control.perfil_usuarioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(perfil_usuario_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(perfil_usuario_control) {
		this.actualizarCssBotonesPagina(perfil_usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_usuario_control.tiposReportes,perfil_usuario_control.tiposReporte
															 	,perfil_usuario_control.tiposPaginacion,perfil_usuario_control.tiposAcciones
																,perfil_usuario_control.tiposColumnasSelect,perfil_usuario_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_usuario_control);			
	}
	
	actualizarPaginaAreaBusquedas(perfil_usuario_control) {
		jQuery("#divBusquedaperfil_usuarioAjaxWebPart").css("display",perfil_usuario_control.strPermisoBusqueda);
		jQuery("#trperfil_usuarioCabeceraBusquedas").css("display",perfil_usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_usuario").css("display",perfil_usuario_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(perfil_usuario_control.htmlTablaOrderBy!=null
			&& perfil_usuario_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByperfil_usuarioAjaxWebPart").html(perfil_usuario_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//perfil_usuario_webcontrol1.registrarOrderByActions();
			
		}
			
		if(perfil_usuario_control.htmlTablaOrderByRel!=null
			&& perfil_usuario_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelperfil_usuarioAjaxWebPart").html(perfil_usuario_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(perfil_usuario_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaperfil_usuarioAjaxWebPart").css("display","none");
			jQuery("#trperfil_usuarioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaperfil_usuario").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(perfil_usuario_control) {
		jQuery("#tdperfil_usuarioNuevo").css("display",perfil_usuario_control.strPermisoNuevo);
		jQuery("#trperfil_usuarioElementos").css("display",perfil_usuario_control.strVisibleTablaElementos);
		jQuery("#trperfil_usuarioAcciones").css("display",perfil_usuario_control.strVisibleTablaAcciones);
		jQuery("#trperfil_usuarioParametrosAcciones").css("display",perfil_usuario_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(perfil_usuario_control) {
	
		this.actualizarCssBotonesMantenimiento(perfil_usuario_control);
				
		if(perfil_usuario_control.perfil_usuarioActual!=null) {//form
			
			this.actualizarCamposFormulario(perfil_usuario_control);			
		}
						
		this.actualizarSpanMensajesCampos(perfil_usuario_control);
	}
	
	actualizarPaginaUsuarioInvitado(perfil_usuario_control) {
	
		var indexPosition=perfil_usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(perfil_usuario_control) {
		jQuery("#divResumenperfil_usuarioActualAjaxWebPart").html(perfil_usuario_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_usuario_control) {
		jQuery("#divAccionesRelacionesperfil_usuarioAjaxWebPart").html(perfil_usuario_control.htmlTablaAccionesRelaciones);
			
		perfil_usuario_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(perfil_usuario_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(perfil_usuario_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(perfil_usuario_control) {
		
		if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_usuario_control.strVisibleFK_Idperfil);
			jQuery("#tblstrVisible"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_usuario_control.strVisibleFK_Idperfil);
		}

		if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",perfil_usuario_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",perfil_usuario_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionperfil_usuario();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("perfil_usuario",id,"seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);		
	}
	
	

	abrirBusquedaParaperfil(strNombreCampoBusqueda){//idActual
		perfil_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_usuario","perfil","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		perfil_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_usuario","usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
	}
	
	

	setCombosCodigoDesdeBusquedaid_usuario(id_usuario) {
		if(jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != id_usuario) {
			jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val(id_usuario).trigger("change");

		}
		if(jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idusuario-cmbid_usuario").val() != id_usuario) {
			jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idusuario-cmbid_usuario").val(id_usuario).trigger("change");
		}

	}
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(perfil_usuario_control) {
	
		jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id").val(perfil_usuario_control.perfil_usuarioActual.id);
		jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-version_row").val(perfil_usuario_control.perfil_usuarioActual.versionRow);
		
		if(perfil_usuario_control.perfil_usuarioActual.id_perfil!=null && perfil_usuario_control.perfil_usuarioActual.id_perfil>-1){
			if(jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_usuario_control.perfil_usuarioActual.id_perfil) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val(perfil_usuario_control.perfil_usuarioActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").select2("val", null);
			if(jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_usuario_control.perfil_usuarioActual.id_usuario!=null && perfil_usuario_control.perfil_usuarioActual.id_usuario>-1){
			if(jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != perfil_usuario_control.perfil_usuarioActual.id_usuario) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val(perfil_usuario_control.perfil_usuarioActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-estado").prop('checked',perfil_usuario_control.perfil_usuarioActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+perfil_usuario_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("perfil_usuario","seguridad","","form_perfil_usuario",formulario,"","",paraEventoTabla,idFilaTabla,perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
	}
	
	cargarCombosFK(perfil_usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_usuario_control.strRecargarFkTipos,",")) { 
				perfil_usuario_webcontrol1.cargarCombosperfilsFK(perfil_usuario_control);
			}

			if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",perfil_usuario_control.strRecargarFkTipos,",")) { 
				perfil_usuario_webcontrol1.cargarCombosusuariosFK(perfil_usuario_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_usuario_control.strRecargarFkTiposNinguno!=null && perfil_usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_usuario_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_perfil",perfil_usuario_control.strRecargarFkTiposNinguno,",")) { 
					perfil_usuario_webcontrol1.cargarCombosperfilsFK(perfil_usuario_control);
				}

				if(perfil_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",perfil_usuario_control.strRecargarFkTiposNinguno,",")) { 
					perfil_usuario_webcontrol1.cargarCombosusuariosFK(perfil_usuario_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(perfil_usuario_control) {
		jQuery("#spanstrMensajeid").text(perfil_usuario_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(perfil_usuario_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_perfil").text(perfil_usuario_control.strMensajeid_perfil);		
		jQuery("#spanstrMensajeid_usuario").text(perfil_usuario_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeestado").text(perfil_usuario_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(perfil_usuario_control) {
		jQuery("#tdbtnNuevoperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoperfil_usuario").css("display",perfil_usuario_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarperfil_usuario").css("display",perfil_usuario_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarperfil_usuario").css("display",perfil_usuario_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosperfil_usuario").css("display",perfil_usuario_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaperfilFK(perfil_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_usuario_funcion1,perfil_usuario_control.perfilsFK);
	}

	cargarComboEditarTablausuarioFK(perfil_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_usuario_funcion1,perfil_usuario_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(perfil_usuario_control) {
		var i=0;
		
		i=perfil_usuario_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(perfil_usuario_control.perfil_usuarioActual.id);
		jQuery("#t-version_row_"+i+"").val(perfil_usuario_control.perfil_usuarioActual.versionRow);
		
		if(perfil_usuario_control.perfil_usuarioActual.id_perfil!=null && perfil_usuario_control.perfil_usuarioActual.id_perfil>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != perfil_usuario_control.perfil_usuarioActual.id_perfil) {
				jQuery("#t-cel_"+i+"_2").val(perfil_usuario_control.perfil_usuarioActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_usuario_control.perfil_usuarioActual.id_usuario!=null && perfil_usuario_control.perfil_usuarioActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != perfil_usuario_control.perfil_usuarioActual.id_usuario) {
				jQuery("#t-cel_"+i+"_3").val(perfil_usuario_control.perfil_usuarioActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").prop('checked',perfil_usuario_control.perfil_usuarioActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(perfil_usuario_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(perfil_usuario_control) {
		perfil_usuario_funcion1.registrarControlesTableValidacionEdition(perfil_usuario_control,perfil_usuario_webcontrol1,perfil_usuario_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuarioConstante,strParametros);
		
		//perfil_usuario_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosperfilsFK(perfil_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil",perfil_usuario_control.perfilsFK);

		if(perfil_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_usuario_control.idFilaTablaActual+"_2",perfil_usuario_control.perfilsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil",perfil_usuario_control.perfilsFK);

	};

	cargarCombosusuariosFK(perfil_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario",perfil_usuario_control.usuariosFK);

		if(perfil_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_usuario_control.idFilaTablaActual+"_3",perfil_usuario_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosperfilsFK(perfil_usuario_control) {

	};

	registrarComboActionChangeCombosusuariosFK(perfil_usuario_control) {

	};

	
	
	setDefectoValorCombosperfilsFK(perfil_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_usuario_control.idperfilDefaultFK>-1 && jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_usuario_control.idperfilDefaultFK) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val(perfil_usuario_control.idperfilDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(perfil_usuario_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(perfil_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_usuario_control.idusuarioDefaultFK>-1 && jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != perfil_usuario_control.idusuarioDefaultFK) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val(perfil_usuario_control.idusuarioDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_usuario_control.strRecargarFkTipos,",")) { 
				perfil_usuario_webcontrol1.setDefectoValorCombosperfilsFK(perfil_usuario_control);
			}

			if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",perfil_usuario_control.strRecargarFkTipos,",")) { 
				perfil_usuario_webcontrol1.setDefectoValorCombosusuariosFK(perfil_usuario_control);
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
	onLoadCombosEventosFK(perfil_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_usuario_webcontrol1.registrarComboActionChangeCombosperfilsFK(perfil_usuario_control);
			//}

			//if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",perfil_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_usuario_webcontrol1.registrarComboActionChangeCombosusuariosFK(perfil_usuario_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil_usuario");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil_usuario");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(perfil_usuario_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);			
			
			if(perfil_usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,"perfil_usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("perfil","id_perfil","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil_img_busqueda").click(function(){
				perfil_usuario_webcontrol1.abrirBusquedaParaperfil("id_perfil");
				//alert(jQuery('#form-id_perfil_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				perfil_usuario_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_usuario","FK_Idperfil","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_usuario","FK_Idusuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			perfil_usuario_funcion1.validarFormularioJQuery(perfil_usuario_constante1);
			
			if(perfil_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_usuario_control) {
		
		jQuery("#divBusquedaperfil_usuarioAjaxWebPart").css("display",perfil_usuario_control.strPermisoBusqueda);
		jQuery("#trperfil_usuarioCabeceraBusquedas").css("display",perfil_usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_usuario").css("display",perfil_usuario_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteperfil_usuario").css("display",perfil_usuario_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosperfil_usuario").attr("style",perfil_usuario_control.strPermisoMostrarTodos);
		
		if(perfil_usuario_control.strPermisoNuevo!=null) {
			jQuery("#tdperfil_usuarioNuevo").css("display",perfil_usuario_control.strPermisoNuevo);
			jQuery("#tdperfil_usuarioNuevoToolBar").css("display",perfil_usuario_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdperfil_usuarioDuplicar").css("display",perfil_usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_usuarioDuplicarToolBar").css("display",perfil_usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_usuarioNuevoGuardarCambios").css("display",perfil_usuario_control.strPermisoNuevo);
			jQuery("#tdperfil_usuarioNuevoGuardarCambiosToolBar").css("display",perfil_usuario_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(perfil_usuario_control.strPermisoActualizar!=null) {
			jQuery("#tdperfil_usuarioActualizarToolBar").css("display",perfil_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_usuarioCopiar").css("display",perfil_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_usuarioCopiarToolBar").css("display",perfil_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_usuarioConEditar").css("display",perfil_usuario_control.strPermisoActualizar);
		}
		
		jQuery("#tdperfil_usuarioEliminarToolBar").css("display",perfil_usuario_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdperfil_usuarioGuardarCambios").css("display",perfil_usuario_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdperfil_usuarioGuardarCambiosToolBar").css("display",perfil_usuario_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trperfil_usuarioElementos").css("display",perfil_usuario_control.strVisibleTablaElementos);
		
		jQuery("#trperfil_usuarioAcciones").css("display",perfil_usuario_control.strVisibleTablaAcciones);
		jQuery("#trperfil_usuarioParametrosAcciones").css("display",perfil_usuario_control.strVisibleTablaAcciones);
			
		jQuery("#tdperfil_usuarioCerrarPagina").css("display",perfil_usuario_control.strPermisoPopup);		
		jQuery("#tdperfil_usuarioCerrarPaginaToolBar").css("display",perfil_usuario_control.strPermisoPopup);
		//jQuery("#trperfil_usuarioAccionesRelaciones").css("display",perfil_usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_usuario_webcontrol1.registrarEventosControles();
		
		if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
			perfil_usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_usuario_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(perfil_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				perfil_usuario_webcontrol1.onLoad();
				
			} else {
				if(perfil_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
					if(perfil_usuario_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
						//perfil_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(perfil_usuario_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(perfil_usuario_constante1.BIG_ID_ACTUAL,"perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
						//perfil_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			perfil_usuario_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var perfil_usuario_webcontrol1=new perfil_usuario_webcontrol();

if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_usuario_webcontrol1.onLoadWindow; 
}

//</script>