//<script type="text/javascript" language="javascript">



//var retencion_icaJQueryPaginaWebInteraccion= function (retencion_ica_control) {
//this.,this.,this.

class retencion_ica_webcontrol extends retencion_ica_webcontrol_add {
	
	retencion_ica_control=null;
	retencion_ica_controlInicial=null;
	retencion_ica_controlAuxiliar=null;
		
	//if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(retencion_ica_control) {
		super();
		
		this.retencion_ica_control=retencion_ica_control;
	}
		
	actualizarVariablesPagina(retencion_ica_control) {
		
		if(retencion_ica_control.action=="index" || retencion_ica_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(retencion_ica_control);
			
		} else if(retencion_ica_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(retencion_ica_control);
			
		} else if(retencion_ica_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(retencion_ica_control);
			
		} else if(retencion_ica_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retencion_ica_control);		
		
		} else if(retencion_ica_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(retencion_ica_control);		
		
		} else if(retencion_ica_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(retencion_ica_control);		
		
		} else if(retencion_ica_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_ica_control);		
		}
		else if(retencion_ica_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retencion_ica_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(retencion_ica_control.action + " Revisar Manejo");
			
			if(retencion_ica_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(retencion_ica_control);
				
				return;
			}
			
			//if(retencion_ica_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(retencion_ica_control);
			//}
			
			if(retencion_ica_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(retencion_ica_control);
			}
			
			if(retencion_ica_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retencion_ica_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(retencion_ica_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(retencion_ica_control, false);			
			}
			
			if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(retencion_ica_control);	
			}
			
			if(retencion_ica_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(retencion_ica_control);
			}
			
			if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(retencion_ica_control);
			}
			
			if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(retencion_ica_control);
			}
			
			if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(retencion_ica_control);	
			}
			
			if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
			}
			
			if(retencion_ica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(retencion_ica_control);
			}
			
			
			if(retencion_ica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(retencion_ica_control);			
			}
			
			if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(retencion_ica_control);
			}
			
			
			if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(retencion_ica_control);
			}
			
			if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(retencion_ica_control);
			}				
			
			if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_ica_control);
			}
			
			if(retencion_ica_control.usuarioActual!=null && retencion_ica_control.usuarioActual.field_strUserName!=null &&
			retencion_ica_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(retencion_ica_control);			
			}
		}
		
		
		if(retencion_ica_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(retencion_ica_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(retencion_ica_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_ica_control);
		this.actualizarPaginaTablaDatos(retencion_ica_control);
		this.actualizarPaginaCargaGeneralControles(retencion_ica_control);
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_ica_control);
		this.actualizarPaginaAreaBusquedas(retencion_ica_control);
		this.actualizarPaginaCargaCombosFK(retencion_ica_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(retencion_ica_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_ica_control);
		this.actualizarPaginaTablaDatos(retencion_ica_control);
		this.actualizarPaginaCargaGeneralControles(retencion_ica_control);
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_ica_control);
		this.actualizarPaginaAreaBusquedas(retencion_ica_control);
		this.actualizarPaginaCargaCombosFK(retencion_ica_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(retencion_ica_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_ica_control);		
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(retencion_ica_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_ica_control);		
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(retencion_ica_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_ica_control);		
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(retencion_ica_control) {
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(retencion_ica_control) {
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retencion_ica_control) {
		this.actualizarPaginaCargaGeneralControles(retencion_ica_control);
		this.actualizarPaginaCargaCombosFK(retencion_ica_control);
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retencion_ica_control) {
		this.actualizarPaginaAbrirLink(retencion_ica_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);				
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);
		this.actualizarPaginaFormulario(retencion_ica_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);
		this.actualizarPaginaFormulario(retencion_ica_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(retencion_ica_control) {
		this.actualizarPaginaFormulario(retencion_ica_control);
		this.onLoadCombosDefectoFK(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);
		this.actualizarPaginaFormulario(retencion_ica_control);
		this.onLoadCombosDefectoFK(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retencion_ica_control) {
		this.actualizarPaginaCargaGeneralControles(retencion_ica_control);
		this.actualizarPaginaCargaCombosFK(retencion_ica_control);
		this.actualizarPaginaFormulario(retencion_ica_control);
		this.onLoadCombosDefectoFK(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retencion_ica_control) {
		this.actualizarPaginaAbrirLink(retencion_ica_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(retencion_ica_control) {
		this.actualizarPaginaImprimir(retencion_ica_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retencion_ica_control) {
		this.actualizarPaginaImprimir(retencion_ica_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_ica_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(retencion_ica_control) {
		//FORMULARIO
		if(retencion_ica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_ica_control);
			this.actualizarPaginaFormularioAdd(retencion_ica_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		//COMBOS FK
		if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_ica_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(retencion_ica_control) {
		//FORMULARIO
		if(retencion_ica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_ica_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);	
		//COMBOS FK
		if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_ica_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retencion_ica_control) {
		//FORMULARIO
		if(retencion_ica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_ica_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(retencion_ica_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);	
		//COMBOS FK
		if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_ica_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control) {
		if(retencion_ica_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retencion_ica_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(retencion_ica_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(retencion_ica_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(retencion_ica_control) {
		if(retencion_ica_funcion1.esPaginaForm()==true) {
			window.opener.retencion_ica_webcontrol1.actualizarPaginaTablaDatos(retencion_ica_control);
		} else {
			this.actualizarPaginaTablaDatos(retencion_ica_control);
		}
	}
	
	actualizarPaginaAbrirLink(retencion_ica_control) {
		retencion_ica_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(retencion_ica_control.strAuxiliarUrlPagina);
				
		retencion_ica_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(retencion_ica_control.strAuxiliarTipo,retencion_ica_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(retencion_ica_control) {
		retencion_ica_funcion1.resaltarRestaurarDivMensaje(true,retencion_ica_control.strAuxiliarMensajeAlert,retencion_ica_control.strAuxiliarCssMensaje);
			
		if(retencion_ica_funcion1.esPaginaForm()==true) {
			window.opener.retencion_ica_funcion1.resaltarRestaurarDivMensaje(true,retencion_ica_control.strAuxiliarMensajeAlert,retencion_ica_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(retencion_ica_control) {
		eval(retencion_ica_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(retencion_ica_control, mostrar) {
		
		if(mostrar==true) {
			retencion_ica_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				retencion_ica_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			retencion_ica_funcion1.mostrarDivMensaje(true,retencion_ica_control.strAuxiliarMensaje,retencion_ica_control.strAuxiliarCssMensaje);
		
		} else {
			retencion_ica_funcion1.mostrarDivMensaje(false,retencion_ica_control.strAuxiliarMensaje,retencion_ica_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(retencion_ica_control) {
	
		funcionGeneral.printWebPartPage("retencion_ica",retencion_ica_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarretencion_icasAjaxWebPart").html(retencion_ica_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("retencion_ica",jQuery("#divTablaDatosReporteAuxiliarretencion_icasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(retencion_ica_control) {
		this.retencion_ica_controlInicial=retencion_ica_control;
			
		if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(retencion_ica_control.strStyleDivArbol,retencion_ica_control.strStyleDivContent
																,retencion_ica_control.strStyleDivOpcionesBanner,retencion_ica_control.strStyleDivExpandirColapsar
																,retencion_ica_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=retencion_ica_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",retencion_ica_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(retencion_ica_control) {
		jQuery("#divTablaDatosretencion_icasAjaxWebPart").html(retencion_ica_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosretencion_icas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosretencion_icas=jQuery("#tblTablaDatosretencion_icas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("retencion_ica",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',retencion_ica_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			retencion_ica_webcontrol1.registrarControlesTableEdition(retencion_ica_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		retencion_ica_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(retencion_ica_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(retencion_ica_control.retencion_icaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(retencion_ica_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(retencion_ica_control) {
		this.actualizarCssBotonesPagina(retencion_ica_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(retencion_ica_control.tiposReportes,retencion_ica_control.tiposReporte
															 	,retencion_ica_control.tiposPaginacion,retencion_ica_control.tiposAcciones
																,retencion_ica_control.tiposColumnasSelect,retencion_ica_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(retencion_ica_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(retencion_ica_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(retencion_ica_control);			
	}
	
	actualizarPaginaAreaBusquedas(retencion_ica_control) {
		jQuery("#divBusquedaretencion_icaAjaxWebPart").css("display",retencion_ica_control.strPermisoBusqueda);
		jQuery("#trretencion_icaCabeceraBusquedas").css("display",retencion_ica_control.strPermisoBusqueda);
		jQuery("#trBusquedaretencion_ica").css("display",retencion_ica_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(retencion_ica_control.htmlTablaOrderBy!=null
			&& retencion_ica_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByretencion_icaAjaxWebPart").html(retencion_ica_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//retencion_ica_webcontrol1.registrarOrderByActions();
			
		}
			
		if(retencion_ica_control.htmlTablaOrderByRel!=null
			&& retencion_ica_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelretencion_icaAjaxWebPart").html(retencion_ica_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(retencion_ica_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaretencion_icaAjaxWebPart").css("display","none");
			jQuery("#trretencion_icaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaretencion_ica").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(retencion_ica_control) {
		jQuery("#tdretencion_icaNuevo").css("display",retencion_ica_control.strPermisoNuevo);
		jQuery("#trretencion_icaElementos").css("display",retencion_ica_control.strVisibleTablaElementos);
		jQuery("#trretencion_icaAcciones").css("display",retencion_ica_control.strVisibleTablaAcciones);
		jQuery("#trretencion_icaParametrosAcciones").css("display",retencion_ica_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(retencion_ica_control) {
	
		this.actualizarCssBotonesMantenimiento(retencion_ica_control);
				
		if(retencion_ica_control.retencion_icaActual!=null) {//form
			
			this.actualizarCamposFormulario(retencion_ica_control);			
		}
						
		this.actualizarSpanMensajesCampos(retencion_ica_control);
	}
	
	actualizarPaginaUsuarioInvitado(retencion_ica_control) {
	
		var indexPosition=retencion_ica_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=retencion_ica_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(retencion_ica_control) {
		jQuery("#divResumenretencion_icaActualAjaxWebPart").html(retencion_ica_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_ica_control) {
		jQuery("#divAccionesRelacionesretencion_icaAjaxWebPart").html(retencion_ica_control.htmlTablaAccionesRelaciones);
			
		retencion_ica_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(retencion_ica_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(retencion_ica_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(retencion_ica_control) {
		
		if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",retencion_ica_control.strVisibleFK_Idcuenta_compras);
			jQuery("#tblstrVisible"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",retencion_ica_control.strVisibleFK_Idcuenta_compras);
		}

		if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",retencion_ica_control.strVisibleFK_Idcuenta_ventas);
			jQuery("#tblstrVisible"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",retencion_ica_control.strVisibleFK_Idcuenta_ventas);
		}

		if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_ica_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retencion_ica_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+retencion_ica_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retencion_ica_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionretencion_ica();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("retencion_ica",id,"facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		retencion_ica_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion_ica","empresa","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		retencion_ica_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion_ica","cuenta","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		retencion_ica_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion_ica","cuenta","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(retencion_ica_control) {
	
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id").val(retencion_ica_control.retencion_icaActual.id);
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-version_row").val(retencion_ica_control.retencion_icaActual.versionRow);
		
		if(retencion_ica_control.retencion_icaActual.id_empresa!=null && retencion_ica_control.retencion_icaActual.id_empresa>-1){
			if(jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_ica_control.retencion_icaActual.id_empresa) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val(retencion_ica_control.retencion_icaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-codigo").val(retencion_ica_control.retencion_icaActual.codigo);
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-descripcion").val(retencion_ica_control.retencion_icaActual.descripcion);
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-valor").val(retencion_ica_control.retencion_icaActual.valor);
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-valor_base").val(retencion_ica_control.retencion_icaActual.valor_base);
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-predeterminado").prop('checked',retencion_ica_control.retencion_icaActual.predeterminado);
		
		if(retencion_ica_control.retencion_icaActual.id_cuenta_ventas!=null && retencion_ica_control.retencion_icaActual.id_cuenta_ventas>-1){
			if(jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_ica_control.retencion_icaActual.id_cuenta_ventas) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_ica_control.retencion_icaActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retencion_ica_control.retencion_icaActual.id_cuenta_compras!=null && retencion_ica_control.retencion_icaActual.id_cuenta_compras>-1){
			if(jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_ica_control.retencion_icaActual.id_cuenta_compras) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_ica_control.retencion_icaActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-cuenta_contable_ventas").val(retencion_ica_control.retencion_icaActual.cuenta_contable_ventas);
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-cuenta_contable_compras").val(retencion_ica_control.retencion_icaActual.cuenta_contable_compras);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+retencion_ica_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("retencion_ica","facturacion","","form_retencion_ica",formulario,"","",paraEventoTabla,idFilaTabla,retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
	}
	
	cargarCombosFK(retencion_ica_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.cargarCombosempresasFK(retencion_ica_control);
			}

			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.cargarComboscuenta_ventassFK(retencion_ica_control);
			}

			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.cargarComboscuenta_comprassFK(retencion_ica_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(retencion_ica_control.strRecargarFkTiposNinguno!=null && retencion_ica_control.strRecargarFkTiposNinguno!='NINGUNO' && retencion_ica_control.strRecargarFkTiposNinguno!='') {
			
				if(retencion_ica_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",retencion_ica_control.strRecargarFkTiposNinguno,",")) { 
					retencion_ica_webcontrol1.cargarCombosempresasFK(retencion_ica_control);
				}

				if(retencion_ica_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_ica_control.strRecargarFkTiposNinguno,",")) { 
					retencion_ica_webcontrol1.cargarComboscuenta_ventassFK(retencion_ica_control);
				}

				if(retencion_ica_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_ica_control.strRecargarFkTiposNinguno,",")) { 
					retencion_ica_webcontrol1.cargarComboscuenta_comprassFK(retencion_ica_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(retencion_ica_control) {
		jQuery("#spanstrMensajeid").text(retencion_ica_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(retencion_ica_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(retencion_ica_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(retencion_ica_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(retencion_ica_control.strMensajedescripcion);		
		jQuery("#spanstrMensajevalor").text(retencion_ica_control.strMensajevalor);		
		jQuery("#spanstrMensajevalor_base").text(retencion_ica_control.strMensajevalor_base);		
		jQuery("#spanstrMensajepredeterminado").text(retencion_ica_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta_ventas").text(retencion_ica_control.strMensajeid_cuenta_ventas);		
		jQuery("#spanstrMensajeid_cuenta_compras").text(retencion_ica_control.strMensajeid_cuenta_compras);		
		jQuery("#spanstrMensajecuenta_contable_ventas").text(retencion_ica_control.strMensajecuenta_contable_ventas);		
		jQuery("#spanstrMensajecuenta_contable_compras").text(retencion_ica_control.strMensajecuenta_contable_compras);		
	}
	
	actualizarCssBotonesMantenimiento(retencion_ica_control) {
		jQuery("#tdbtnNuevoretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoretencion_ica").css("display",retencion_ica_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarretencion_ica").css("display",retencion_ica_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarretencion_ica").css("display",retencion_ica_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosretencion_ica").css("display",retencion_ica_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(retencion_ica_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_ica_funcion1,retencion_ica_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(retencion_ica_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_ica_funcion1,retencion_ica_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(retencion_ica_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_ica_funcion1,retencion_ica_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(retencion_ica_control) {
		var i=0;
		
		i=retencion_ica_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(retencion_ica_control.retencion_icaActual.id);
		jQuery("#t-version_row_"+i+"").val(retencion_ica_control.retencion_icaActual.versionRow);
		
		if(retencion_ica_control.retencion_icaActual.id_empresa!=null && retencion_ica_control.retencion_icaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != retencion_ica_control.retencion_icaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(retencion_ica_control.retencion_icaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(retencion_ica_control.retencion_icaActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(retencion_ica_control.retencion_icaActual.descripcion);
		jQuery("#t-cel_"+i+"_5").val(retencion_ica_control.retencion_icaActual.valor);
		jQuery("#t-cel_"+i+"_6").val(retencion_ica_control.retencion_icaActual.valor_base);
		jQuery("#t-cel_"+i+"_7").prop('checked',retencion_ica_control.retencion_icaActual.predeterminado);
		
		if(retencion_ica_control.retencion_icaActual.id_cuenta_ventas!=null && retencion_ica_control.retencion_icaActual.id_cuenta_ventas>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != retencion_ica_control.retencion_icaActual.id_cuenta_ventas) {
				jQuery("#t-cel_"+i+"_8").val(retencion_ica_control.retencion_icaActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_8").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retencion_ica_control.retencion_icaActual.id_cuenta_compras!=null && retencion_ica_control.retencion_icaActual.id_cuenta_compras>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != retencion_ica_control.retencion_icaActual.id_cuenta_compras) {
				jQuery("#t-cel_"+i+"_9").val(retencion_ica_control.retencion_icaActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(retencion_ica_control.retencion_icaActual.cuenta_contable_ventas);
		jQuery("#t-cel_"+i+"_11").val(retencion_ica_control.retencion_icaActual.cuenta_contable_compras);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(retencion_ica_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(retencion_ica_control) {
		retencion_ica_funcion1.registrarControlesTableValidacionEdition(retencion_ica_control,retencion_ica_webcontrol1,retencion_ica_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_icaConstante,strParametros);
		
		//retencion_ica_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(retencion_ica_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa",retencion_ica_control.empresasFK);

		if(retencion_ica_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_ica_control.idFilaTablaActual+"_2",retencion_ica_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(retencion_ica_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas",retencion_ica_control.cuenta_ventassFK);

		if(retencion_ica_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_ica_control.idFilaTablaActual+"_8",retencion_ica_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",retencion_ica_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(retencion_ica_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras",retencion_ica_control.cuenta_comprassFK);

		if(retencion_ica_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_ica_control.idFilaTablaActual+"_9",retencion_ica_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",retencion_ica_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(retencion_ica_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(retencion_ica_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(retencion_ica_control) {

	};

	
	
	setDefectoValorCombosempresasFK(retencion_ica_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_ica_control.idempresaDefaultFK>-1 && jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_ica_control.idempresaDefaultFK) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val(retencion_ica_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(retencion_ica_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_ica_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_ica_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_ica_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(retencion_ica_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(retencion_ica_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_ica_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_ica_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_ica_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(retencion_ica_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//retencion_ica_control
		
	
	}
	
	onLoadCombosDefectoFK(retencion_ica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_ica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.setDefectoValorCombosempresasFK(retencion_ica_control);
			}

			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.setDefectoValorComboscuenta_ventassFK(retencion_ica_control);
			}

			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.setDefectoValorComboscuenta_comprassFK(retencion_ica_control);
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
	onLoadCombosEventosFK(retencion_ica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_ica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_ica_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_ica_webcontrol1.registrarComboActionChangeCombosempresasFK(retencion_ica_control);
			//}

			//if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_ica_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_ica_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(retencion_ica_control);
			//}

			//if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_ica_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_ica_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(retencion_ica_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(retencion_ica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_ica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("retencion_ica");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("retencion_ica");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(retencion_ica_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);			
			
			if(retencion_ica_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,"retencion_ica");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				retencion_ica_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				retencion_ica_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				retencion_ica_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion_ica","FK_Idcuenta_compras","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion_ica","FK_Idcuenta_ventas","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion_ica","FK_Idempresa","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			retencion_ica_funcion1.validarFormularioJQuery(retencion_ica_constante1);
			
			if(retencion_ica_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(retencion_ica_control) {
		
		jQuery("#divBusquedaretencion_icaAjaxWebPart").css("display",retencion_ica_control.strPermisoBusqueda);
		jQuery("#trretencion_icaCabeceraBusquedas").css("display",retencion_ica_control.strPermisoBusqueda);
		jQuery("#trBusquedaretencion_ica").css("display",retencion_ica_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteretencion_ica").css("display",retencion_ica_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosretencion_ica").attr("style",retencion_ica_control.strPermisoMostrarTodos);
		
		if(retencion_ica_control.strPermisoNuevo!=null) {
			jQuery("#tdretencion_icaNuevo").css("display",retencion_ica_control.strPermisoNuevo);
			jQuery("#tdretencion_icaNuevoToolBar").css("display",retencion_ica_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdretencion_icaDuplicar").css("display",retencion_ica_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretencion_icaDuplicarToolBar").css("display",retencion_ica_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretencion_icaNuevoGuardarCambios").css("display",retencion_ica_control.strPermisoNuevo);
			jQuery("#tdretencion_icaNuevoGuardarCambiosToolBar").css("display",retencion_ica_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(retencion_ica_control.strPermisoActualizar!=null) {
			jQuery("#tdretencion_icaActualizarToolBar").css("display",retencion_ica_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencion_icaCopiar").css("display",retencion_ica_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencion_icaCopiarToolBar").css("display",retencion_ica_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencion_icaConEditar").css("display",retencion_ica_control.strPermisoActualizar);
		}
		
		jQuery("#tdretencion_icaEliminarToolBar").css("display",retencion_ica_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdretencion_icaGuardarCambios").css("display",retencion_ica_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdretencion_icaGuardarCambiosToolBar").css("display",retencion_ica_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trretencion_icaElementos").css("display",retencion_ica_control.strVisibleTablaElementos);
		
		jQuery("#trretencion_icaAcciones").css("display",retencion_ica_control.strVisibleTablaAcciones);
		jQuery("#trretencion_icaParametrosAcciones").css("display",retencion_ica_control.strVisibleTablaAcciones);
			
		jQuery("#tdretencion_icaCerrarPagina").css("display",retencion_ica_control.strPermisoPopup);		
		jQuery("#tdretencion_icaCerrarPaginaToolBar").css("display",retencion_ica_control.strPermisoPopup);
		//jQuery("#trretencion_icaAccionesRelaciones").css("display",retencion_ica_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		retencion_ica_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		retencion_ica_webcontrol1.registrarEventosControles();
		
		if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
			retencion_ica_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(retencion_ica_constante1.STR_ES_RELACIONES=="true") {
			if(retencion_ica_constante1.BIT_ES_PAGINA_FORM==true) {
				retencion_ica_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(retencion_ica_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(retencion_ica_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				retencion_ica_webcontrol1.onLoad();
				
			} else {
				if(retencion_ica_constante1.BIT_ES_PAGINA_FORM==true) {
					if(retencion_ica_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
						//retencion_ica_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(retencion_ica_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(retencion_ica_constante1.BIG_ID_ACTUAL,"retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
						//retencion_ica_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			retencion_ica_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var retencion_ica_webcontrol1=new retencion_ica_webcontrol();

if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = retencion_ica_webcontrol1.onLoadWindow; 
}

//</script>