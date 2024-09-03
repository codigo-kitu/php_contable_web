//<script type="text/javascript" language="javascript">



//var resumen_usuarioJQueryPaginaWebInteraccion= function (resumen_usuario_control) {
//this.,this.,this.

class resumen_usuario_webcontrol extends resumen_usuario_webcontrol_add {
	
	resumen_usuario_control=null;
	resumen_usuario_controlInicial=null;
	resumen_usuario_controlAuxiliar=null;
		
	//if(resumen_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(resumen_usuario_control) {
		super();
		
		this.resumen_usuario_control=resumen_usuario_control;
	}
		
	actualizarVariablesPagina(resumen_usuario_control) {
		
		if(resumen_usuario_control.action=="index" || resumen_usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(resumen_usuario_control);
			
		} else if(resumen_usuario_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(resumen_usuario_control);
			
		} else if(resumen_usuario_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(resumen_usuario_control);
			
		} else if(resumen_usuario_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(resumen_usuario_control);		
		
		} else if(resumen_usuario_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(resumen_usuario_control);		
		
		} else if(resumen_usuario_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(resumen_usuario_control);		
		
		} else if(resumen_usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(resumen_usuario_control);		
		}
		else if(resumen_usuario_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(resumen_usuario_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(resumen_usuario_control.action + " Revisar Manejo");
			
			if(resumen_usuario_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(resumen_usuario_control);
				
				return;
			}
			
			//if(resumen_usuario_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(resumen_usuario_control);
			//}
			
			if(resumen_usuario_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(resumen_usuario_control);
			}
			
			if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && resumen_usuario_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(resumen_usuario_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(resumen_usuario_control, false);			
			}
			
			if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(resumen_usuario_control);	
			}
			
			if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(resumen_usuario_control);
			}
			
			if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(resumen_usuario_control);
			}
			
			if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(resumen_usuario_control);
			}
			
			if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(resumen_usuario_control);	
			}
			
			if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
			}
			
			if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(resumen_usuario_control);
			}
			
			
			if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(resumen_usuario_control);			
			}
			
			if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(resumen_usuario_control);
			}
			
			
			if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(resumen_usuario_control);
			}
			
			if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(resumen_usuario_control);
			}				
			
			if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(resumen_usuario_control);
			}
			
			if(resumen_usuario_control.usuarioActual!=null && resumen_usuario_control.usuarioActual.field_strUserName!=null &&
			resumen_usuario_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(resumen_usuario_control);			
			}
		}
		
		
		if(resumen_usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(resumen_usuario_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(resumen_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(resumen_usuario_control);
		this.actualizarPaginaTablaDatos(resumen_usuario_control);
		this.actualizarPaginaCargaGeneralControles(resumen_usuario_control);
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(resumen_usuario_control);
		this.actualizarPaginaAreaBusquedas(resumen_usuario_control);
		this.actualizarPaginaCargaCombosFK(resumen_usuario_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(resumen_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(resumen_usuario_control);
		this.actualizarPaginaTablaDatos(resumen_usuario_control);
		this.actualizarPaginaCargaGeneralControles(resumen_usuario_control);
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(resumen_usuario_control);
		this.actualizarPaginaAreaBusquedas(resumen_usuario_control);
		this.actualizarPaginaCargaCombosFK(resumen_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(resumen_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(resumen_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(resumen_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(resumen_usuario_control) {
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(resumen_usuario_control) {
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(resumen_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(resumen_usuario_control);
		this.actualizarPaginaCargaCombosFK(resumen_usuario_control);
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(resumen_usuario_control) {
		this.actualizarPaginaAbrirLink(resumen_usuario_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);				
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);
		this.actualizarPaginaFormulario(resumen_usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);
		this.actualizarPaginaFormulario(resumen_usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(resumen_usuario_control) {
		this.actualizarPaginaFormulario(resumen_usuario_control);
		this.onLoadCombosDefectoFK(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);
		this.actualizarPaginaFormulario(resumen_usuario_control);
		this.onLoadCombosDefectoFK(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(resumen_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(resumen_usuario_control);
		this.actualizarPaginaCargaCombosFK(resumen_usuario_control);
		this.actualizarPaginaFormulario(resumen_usuario_control);
		this.onLoadCombosDefectoFK(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(resumen_usuario_control) {
		this.actualizarPaginaAbrirLink(resumen_usuario_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(resumen_usuario_control) {
		this.actualizarPaginaImprimir(resumen_usuario_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(resumen_usuario_control) {
		this.actualizarPaginaImprimir(resumen_usuario_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(resumen_usuario_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(resumen_usuario_control) {
		//FORMULARIO
		if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(resumen_usuario_control);
			this.actualizarPaginaFormularioAdd(resumen_usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		//COMBOS FK
		if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(resumen_usuario_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(resumen_usuario_control) {
		//FORMULARIO
		if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(resumen_usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);	
		//COMBOS FK
		if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(resumen_usuario_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(resumen_usuario_control) {
		//FORMULARIO
		if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(resumen_usuario_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(resumen_usuario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);	
		//COMBOS FK
		if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(resumen_usuario_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control) {
		if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && resumen_usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(resumen_usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(resumen_usuario_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(resumen_usuario_control) {
		if(resumen_usuario_funcion1.esPaginaForm()==true) {
			window.opener.resumen_usuario_webcontrol1.actualizarPaginaTablaDatos(resumen_usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(resumen_usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(resumen_usuario_control) {
		resumen_usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(resumen_usuario_control.strAuxiliarUrlPagina);
				
		resumen_usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(resumen_usuario_control.strAuxiliarTipo,resumen_usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(resumen_usuario_control) {
		resumen_usuario_funcion1.resaltarRestaurarDivMensaje(true,resumen_usuario_control.strAuxiliarMensajeAlert,resumen_usuario_control.strAuxiliarCssMensaje);
			
		if(resumen_usuario_funcion1.esPaginaForm()==true) {
			window.opener.resumen_usuario_funcion1.resaltarRestaurarDivMensaje(true,resumen_usuario_control.strAuxiliarMensajeAlert,resumen_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(resumen_usuario_control) {
		eval(resumen_usuario_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(resumen_usuario_control, mostrar) {
		
		if(mostrar==true) {
			resumen_usuario_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				resumen_usuario_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			resumen_usuario_funcion1.mostrarDivMensaje(true,resumen_usuario_control.strAuxiliarMensaje,resumen_usuario_control.strAuxiliarCssMensaje);
		
		} else {
			resumen_usuario_funcion1.mostrarDivMensaje(false,resumen_usuario_control.strAuxiliarMensaje,resumen_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(resumen_usuario_control) {
	
		funcionGeneral.printWebPartPage("resumen_usuario",resumen_usuario_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarresumen_usuariosAjaxWebPart").html(resumen_usuario_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("resumen_usuario",jQuery("#divTablaDatosReporteAuxiliarresumen_usuariosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(resumen_usuario_control) {
		this.resumen_usuario_controlInicial=resumen_usuario_control;
			
		if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(resumen_usuario_control.strStyleDivArbol,resumen_usuario_control.strStyleDivContent
																,resumen_usuario_control.strStyleDivOpcionesBanner,resumen_usuario_control.strStyleDivExpandirColapsar
																,resumen_usuario_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=resumen_usuario_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",resumen_usuario_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(resumen_usuario_control) {
		jQuery("#divTablaDatosresumen_usuariosAjaxWebPart").html(resumen_usuario_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosresumen_usuarios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosresumen_usuarios=jQuery("#tblTablaDatosresumen_usuarios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("resumen_usuario",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',resumen_usuario_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			resumen_usuario_webcontrol1.registrarControlesTableEdition(resumen_usuario_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		resumen_usuario_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(resumen_usuario_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(resumen_usuario_control.resumen_usuarioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(resumen_usuario_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(resumen_usuario_control) {
		this.actualizarCssBotonesPagina(resumen_usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(resumen_usuario_control.tiposReportes,resumen_usuario_control.tiposReporte
															 	,resumen_usuario_control.tiposPaginacion,resumen_usuario_control.tiposAcciones
																,resumen_usuario_control.tiposColumnasSelect,resumen_usuario_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(resumen_usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(resumen_usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(resumen_usuario_control);			
	}
	
	actualizarPaginaAreaBusquedas(resumen_usuario_control) {
		jQuery("#divBusquedaresumen_usuarioAjaxWebPart").css("display",resumen_usuario_control.strPermisoBusqueda);
		jQuery("#trresumen_usuarioCabeceraBusquedas").css("display",resumen_usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedaresumen_usuario").css("display",resumen_usuario_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(resumen_usuario_control.htmlTablaOrderBy!=null
			&& resumen_usuario_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByresumen_usuarioAjaxWebPart").html(resumen_usuario_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//resumen_usuario_webcontrol1.registrarOrderByActions();
			
		}
			
		if(resumen_usuario_control.htmlTablaOrderByRel!=null
			&& resumen_usuario_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelresumen_usuarioAjaxWebPart").html(resumen_usuario_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(resumen_usuario_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaresumen_usuarioAjaxWebPart").css("display","none");
			jQuery("#trresumen_usuarioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaresumen_usuario").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(resumen_usuario_control) {
		jQuery("#tdresumen_usuarioNuevo").css("display",resumen_usuario_control.strPermisoNuevo);
		jQuery("#trresumen_usuarioElementos").css("display",resumen_usuario_control.strVisibleTablaElementos);
		jQuery("#trresumen_usuarioAcciones").css("display",resumen_usuario_control.strVisibleTablaAcciones);
		jQuery("#trresumen_usuarioParametrosAcciones").css("display",resumen_usuario_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(resumen_usuario_control) {
	
		this.actualizarCssBotonesMantenimiento(resumen_usuario_control);
				
		if(resumen_usuario_control.resumen_usuarioActual!=null) {//form
			
			this.actualizarCamposFormulario(resumen_usuario_control);			
		}
						
		this.actualizarSpanMensajesCampos(resumen_usuario_control);
	}
	
	actualizarPaginaUsuarioInvitado(resumen_usuario_control) {
	
		var indexPosition=resumen_usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=resumen_usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(resumen_usuario_control) {
		jQuery("#divResumenresumen_usuarioActualAjaxWebPart").html(resumen_usuario_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(resumen_usuario_control) {
		jQuery("#divAccionesRelacionesresumen_usuarioAjaxWebPart").html(resumen_usuario_control.htmlTablaAccionesRelaciones);
			
		resumen_usuario_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(resumen_usuario_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(resumen_usuario_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(resumen_usuario_control) {
		
		if(resumen_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+resumen_usuario_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",resumen_usuario_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+resumen_usuario_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",resumen_usuario_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionresumen_usuario();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("resumen_usuario",id,"seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);		
	}
	
	

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		resumen_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("resumen_usuario","usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(resumen_usuario_control) {
	
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id").val(resumen_usuario_control.resumen_usuarioActual.id);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-version_row").val(resumen_usuario_control.resumen_usuarioActual.versionRow);
		
		if(resumen_usuario_control.resumen_usuarioActual.id_usuario!=null && resumen_usuario_control.resumen_usuarioActual.id_usuario>-1){
			if(jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != resumen_usuario_control.resumen_usuarioActual.id_usuario) {
				jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val(resumen_usuario_control.resumen_usuarioActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-numero_ingresos").val(resumen_usuario_control.resumen_usuarioActual.numero_ingresos);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-numero_error_ingreso").val(resumen_usuario_control.resumen_usuarioActual.numero_error_ingreso);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-numero_intentos").val(resumen_usuario_control.resumen_usuarioActual.numero_intentos);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-numero_cierres").val(resumen_usuario_control.resumen_usuarioActual.numero_cierres);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-numero_reinicios").val(resumen_usuario_control.resumen_usuarioActual.numero_reinicios);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-numero_ingreso_actual").val(resumen_usuario_control.resumen_usuarioActual.numero_ingreso_actual);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-fecha_ultimo_ingreso").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_ingreso);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-fecha_ultimo_error_ingreso").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_error_ingreso);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-fecha_ultimo_intento").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_intento);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-fecha_ultimo_cierre").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_cierre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+resumen_usuario_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("resumen_usuario","seguridad","","form_resumen_usuario",formulario,"","",paraEventoTabla,idFilaTabla,resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
	}
	
	cargarCombosFK(resumen_usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(resumen_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",resumen_usuario_control.strRecargarFkTipos,",")) { 
				resumen_usuario_webcontrol1.cargarCombosusuariosFK(resumen_usuario_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(resumen_usuario_control.strRecargarFkTiposNinguno!=null && resumen_usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && resumen_usuario_control.strRecargarFkTiposNinguno!='') {
			
				if(resumen_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",resumen_usuario_control.strRecargarFkTiposNinguno,",")) { 
					resumen_usuario_webcontrol1.cargarCombosusuariosFK(resumen_usuario_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(resumen_usuario_control) {
		jQuery("#spanstrMensajeid").text(resumen_usuario_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(resumen_usuario_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_usuario").text(resumen_usuario_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenumero_ingresos").text(resumen_usuario_control.strMensajenumero_ingresos);		
		jQuery("#spanstrMensajenumero_error_ingreso").text(resumen_usuario_control.strMensajenumero_error_ingreso);		
		jQuery("#spanstrMensajenumero_intentos").text(resumen_usuario_control.strMensajenumero_intentos);		
		jQuery("#spanstrMensajenumero_cierres").text(resumen_usuario_control.strMensajenumero_cierres);		
		jQuery("#spanstrMensajenumero_reinicios").text(resumen_usuario_control.strMensajenumero_reinicios);		
		jQuery("#spanstrMensajenumero_ingreso_actual").text(resumen_usuario_control.strMensajenumero_ingreso_actual);		
		jQuery("#spanstrMensajefecha_ultimo_ingreso").text(resumen_usuario_control.strMensajefecha_ultimo_ingreso);		
		jQuery("#spanstrMensajefecha_ultimo_error_ingreso").text(resumen_usuario_control.strMensajefecha_ultimo_error_ingreso);		
		jQuery("#spanstrMensajefecha_ultimo_intento").text(resumen_usuario_control.strMensajefecha_ultimo_intento);		
		jQuery("#spanstrMensajefecha_ultimo_cierre").text(resumen_usuario_control.strMensajefecha_ultimo_cierre);		
	}
	
	actualizarCssBotonesMantenimiento(resumen_usuario_control) {
		jQuery("#tdbtnNuevoresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoresumen_usuario").css("display",resumen_usuario_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarresumen_usuario").css("display",resumen_usuario_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarresumen_usuario").css("display",resumen_usuario_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosresumen_usuario").css("display",resumen_usuario_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablausuarioFK(resumen_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,resumen_usuario_funcion1,resumen_usuario_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(resumen_usuario_control) {
		var i=0;
		
		i=resumen_usuario_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(resumen_usuario_control.resumen_usuarioActual.id);
		jQuery("#t-version_row_"+i+"").val(resumen_usuario_control.resumen_usuarioActual.versionRow);
		
		if(resumen_usuario_control.resumen_usuarioActual.id_usuario!=null && resumen_usuario_control.resumen_usuarioActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != resumen_usuario_control.resumen_usuarioActual.id_usuario) {
				jQuery("#t-cel_"+i+"_2").val(resumen_usuario_control.resumen_usuarioActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(resumen_usuario_control.resumen_usuarioActual.numero_ingresos);
		jQuery("#t-cel_"+i+"_4").val(resumen_usuario_control.resumen_usuarioActual.numero_error_ingreso);
		jQuery("#t-cel_"+i+"_5").val(resumen_usuario_control.resumen_usuarioActual.numero_intentos);
		jQuery("#t-cel_"+i+"_6").val(resumen_usuario_control.resumen_usuarioActual.numero_cierres);
		jQuery("#t-cel_"+i+"_7").val(resumen_usuario_control.resumen_usuarioActual.numero_reinicios);
		jQuery("#t-cel_"+i+"_8").val(resumen_usuario_control.resumen_usuarioActual.numero_ingreso_actual);
		jQuery("#t-cel_"+i+"_9").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_ingreso);
		jQuery("#t-cel_"+i+"_10").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_error_ingreso);
		jQuery("#t-cel_"+i+"_11").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_intento);
		jQuery("#t-cel_"+i+"_12").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_cierre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(resumen_usuario_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(resumen_usuario_control) {
		resumen_usuario_funcion1.registrarControlesTableValidacionEdition(resumen_usuario_control,resumen_usuario_webcontrol1,resumen_usuario_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuarioConstante,strParametros);
		
		//resumen_usuario_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosusuariosFK(resumen_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario",resumen_usuario_control.usuariosFK);

		if(resumen_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+resumen_usuario_control.idFilaTablaActual+"_2",resumen_usuario_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosusuariosFK(resumen_usuario_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(resumen_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(resumen_usuario_control.idusuarioDefaultFK>-1 && jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != resumen_usuario_control.idusuarioDefaultFK) {
				jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val(resumen_usuario_control.idusuarioDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//resumen_usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(resumen_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(resumen_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(resumen_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",resumen_usuario_control.strRecargarFkTipos,",")) { 
				resumen_usuario_webcontrol1.setDefectoValorCombosusuariosFK(resumen_usuario_control);
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
	onLoadCombosEventosFK(resumen_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(resumen_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(resumen_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",resumen_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				resumen_usuario_webcontrol1.registrarComboActionChangeCombosusuariosFK(resumen_usuario_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(resumen_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(resumen_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(resumen_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("resumen_usuario");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("resumen_usuario");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(resumen_usuario_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);			
			
			if(resumen_usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,"resumen_usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				resumen_usuario_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("resumen_usuario","FK_Idusuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			resumen_usuario_funcion1.validarFormularioJQuery(resumen_usuario_constante1);
			
			if(resumen_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(resumen_usuario_control) {
		
		jQuery("#divBusquedaresumen_usuarioAjaxWebPart").css("display",resumen_usuario_control.strPermisoBusqueda);
		jQuery("#trresumen_usuarioCabeceraBusquedas").css("display",resumen_usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedaresumen_usuario").css("display",resumen_usuario_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteresumen_usuario").css("display",resumen_usuario_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosresumen_usuario").attr("style",resumen_usuario_control.strPermisoMostrarTodos);
		
		if(resumen_usuario_control.strPermisoNuevo!=null) {
			jQuery("#tdresumen_usuarioNuevo").css("display",resumen_usuario_control.strPermisoNuevo);
			jQuery("#tdresumen_usuarioNuevoToolBar").css("display",resumen_usuario_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdresumen_usuarioDuplicar").css("display",resumen_usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdresumen_usuarioDuplicarToolBar").css("display",resumen_usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdresumen_usuarioNuevoGuardarCambios").css("display",resumen_usuario_control.strPermisoNuevo);
			jQuery("#tdresumen_usuarioNuevoGuardarCambiosToolBar").css("display",resumen_usuario_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(resumen_usuario_control.strPermisoActualizar!=null) {
			jQuery("#tdresumen_usuarioActualizarToolBar").css("display",resumen_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdresumen_usuarioCopiar").css("display",resumen_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdresumen_usuarioCopiarToolBar").css("display",resumen_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdresumen_usuarioConEditar").css("display",resumen_usuario_control.strPermisoActualizar);
		}
		
		jQuery("#tdresumen_usuarioEliminarToolBar").css("display",resumen_usuario_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdresumen_usuarioGuardarCambios").css("display",resumen_usuario_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdresumen_usuarioGuardarCambiosToolBar").css("display",resumen_usuario_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trresumen_usuarioElementos").css("display",resumen_usuario_control.strVisibleTablaElementos);
		
		jQuery("#trresumen_usuarioAcciones").css("display",resumen_usuario_control.strVisibleTablaAcciones);
		jQuery("#trresumen_usuarioParametrosAcciones").css("display",resumen_usuario_control.strVisibleTablaAcciones);
			
		jQuery("#tdresumen_usuarioCerrarPagina").css("display",resumen_usuario_control.strPermisoPopup);		
		jQuery("#tdresumen_usuarioCerrarPaginaToolBar").css("display",resumen_usuario_control.strPermisoPopup);
		//jQuery("#trresumen_usuarioAccionesRelaciones").css("display",resumen_usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		resumen_usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		resumen_usuario_webcontrol1.registrarEventosControles();
		
		if(resumen_usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
			resumen_usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(resumen_usuario_constante1.STR_ES_RELACIONES=="true") {
			if(resumen_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				resumen_usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(resumen_usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(resumen_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				resumen_usuario_webcontrol1.onLoad();
				
			} else {
				if(resumen_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
					if(resumen_usuario_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
						//resumen_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(resumen_usuario_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(resumen_usuario_constante1.BIG_ID_ACTUAL,"resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
						//resumen_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			resumen_usuario_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var resumen_usuario_webcontrol1=new resumen_usuario_webcontrol();

if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = resumen_usuario_webcontrol1.onLoadWindow; 
}

//</script>