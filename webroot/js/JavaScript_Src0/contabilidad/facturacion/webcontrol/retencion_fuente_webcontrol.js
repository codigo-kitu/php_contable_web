//<script type="text/javascript" language="javascript">



//var retencion_fuenteJQueryPaginaWebInteraccion= function (retencion_fuente_control) {
//this.,this.,this.

class retencion_fuente_webcontrol extends retencion_fuente_webcontrol_add {
	
	retencion_fuente_control=null;
	retencion_fuente_controlInicial=null;
	retencion_fuente_controlAuxiliar=null;
		
	//if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(retencion_fuente_control) {
		super();
		
		this.retencion_fuente_control=retencion_fuente_control;
	}
		
	actualizarVariablesPagina(retencion_fuente_control) {
		
		if(retencion_fuente_control.action=="index" || retencion_fuente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(retencion_fuente_control);
			
		} else if(retencion_fuente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(retencion_fuente_control);
			
		} else if(retencion_fuente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(retencion_fuente_control);
			
		} else if(retencion_fuente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retencion_fuente_control);		
		
		} else if(retencion_fuente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(retencion_fuente_control);		
		
		} else if(retencion_fuente_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(retencion_fuente_control);		
		
		} else if(retencion_fuente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_fuente_control);		
		}
		else if(retencion_fuente_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retencion_fuente_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(retencion_fuente_control.action + " Revisar Manejo");
			
			if(retencion_fuente_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(retencion_fuente_control);
				
				return;
			}
			
			//if(retencion_fuente_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(retencion_fuente_control);
			//}
			
			if(retencion_fuente_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(retencion_fuente_control);
			}
			
			if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retencion_fuente_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(retencion_fuente_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(retencion_fuente_control, false);			
			}
			
			if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(retencion_fuente_control);	
			}
			
			if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(retencion_fuente_control);
			}
			
			if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(retencion_fuente_control);
			}
			
			if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(retencion_fuente_control);
			}
			
			if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(retencion_fuente_control);	
			}
			
			if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
			}
			
			if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(retencion_fuente_control);
			}
			
			
			if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(retencion_fuente_control);			
			}
			
			if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(retencion_fuente_control);
			}
			
			
			if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(retencion_fuente_control);
			}
			
			if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(retencion_fuente_control);
			}				
			
			if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_fuente_control);
			}
			
			if(retencion_fuente_control.usuarioActual!=null && retencion_fuente_control.usuarioActual.field_strUserName!=null &&
			retencion_fuente_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(retencion_fuente_control);			
			}
		}
		
		
		if(retencion_fuente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(retencion_fuente_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(retencion_fuente_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_fuente_control);
		this.actualizarPaginaTablaDatos(retencion_fuente_control);
		this.actualizarPaginaCargaGeneralControles(retencion_fuente_control);
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_fuente_control);
		this.actualizarPaginaAreaBusquedas(retencion_fuente_control);
		this.actualizarPaginaCargaCombosFK(retencion_fuente_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(retencion_fuente_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_fuente_control);
		this.actualizarPaginaTablaDatos(retencion_fuente_control);
		this.actualizarPaginaCargaGeneralControles(retencion_fuente_control);
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_fuente_control);
		this.actualizarPaginaAreaBusquedas(retencion_fuente_control);
		this.actualizarPaginaCargaCombosFK(retencion_fuente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(retencion_fuente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(retencion_fuente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(retencion_fuente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(retencion_fuente_control) {
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(retencion_fuente_control) {
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retencion_fuente_control) {
		this.actualizarPaginaCargaGeneralControles(retencion_fuente_control);
		this.actualizarPaginaCargaCombosFK(retencion_fuente_control);
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retencion_fuente_control) {
		this.actualizarPaginaAbrirLink(retencion_fuente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);				
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);
		this.actualizarPaginaFormulario(retencion_fuente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);
		this.actualizarPaginaFormulario(retencion_fuente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(retencion_fuente_control) {
		this.actualizarPaginaFormulario(retencion_fuente_control);
		this.onLoadCombosDefectoFK(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);
		this.actualizarPaginaFormulario(retencion_fuente_control);
		this.onLoadCombosDefectoFK(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retencion_fuente_control) {
		this.actualizarPaginaCargaGeneralControles(retencion_fuente_control);
		this.actualizarPaginaCargaCombosFK(retencion_fuente_control);
		this.actualizarPaginaFormulario(retencion_fuente_control);
		this.onLoadCombosDefectoFK(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retencion_fuente_control) {
		this.actualizarPaginaAbrirLink(retencion_fuente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(retencion_fuente_control) {
		this.actualizarPaginaImprimir(retencion_fuente_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retencion_fuente_control) {
		this.actualizarPaginaImprimir(retencion_fuente_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_fuente_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(retencion_fuente_control) {
		//FORMULARIO
		if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_fuente_control);
			this.actualizarPaginaFormularioAdd(retencion_fuente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		//COMBOS FK
		if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_fuente_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(retencion_fuente_control) {
		//FORMULARIO
		if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_fuente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);	
		//COMBOS FK
		if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_fuente_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retencion_fuente_control) {
		//FORMULARIO
		if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_fuente_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(retencion_fuente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);	
		//COMBOS FK
		if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_fuente_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control) {
		if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retencion_fuente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(retencion_fuente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(retencion_fuente_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(retencion_fuente_control) {
		if(retencion_fuente_funcion1.esPaginaForm()==true) {
			window.opener.retencion_fuente_webcontrol1.actualizarPaginaTablaDatos(retencion_fuente_control);
		} else {
			this.actualizarPaginaTablaDatos(retencion_fuente_control);
		}
	}
	
	actualizarPaginaAbrirLink(retencion_fuente_control) {
		retencion_fuente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(retencion_fuente_control.strAuxiliarUrlPagina);
				
		retencion_fuente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(retencion_fuente_control.strAuxiliarTipo,retencion_fuente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(retencion_fuente_control) {
		retencion_fuente_funcion1.resaltarRestaurarDivMensaje(true,retencion_fuente_control.strAuxiliarMensajeAlert,retencion_fuente_control.strAuxiliarCssMensaje);
			
		if(retencion_fuente_funcion1.esPaginaForm()==true) {
			window.opener.retencion_fuente_funcion1.resaltarRestaurarDivMensaje(true,retencion_fuente_control.strAuxiliarMensajeAlert,retencion_fuente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(retencion_fuente_control) {
		eval(retencion_fuente_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(retencion_fuente_control, mostrar) {
		
		if(mostrar==true) {
			retencion_fuente_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				retencion_fuente_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			retencion_fuente_funcion1.mostrarDivMensaje(true,retencion_fuente_control.strAuxiliarMensaje,retencion_fuente_control.strAuxiliarCssMensaje);
		
		} else {
			retencion_fuente_funcion1.mostrarDivMensaje(false,retencion_fuente_control.strAuxiliarMensaje,retencion_fuente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(retencion_fuente_control) {
	
		funcionGeneral.printWebPartPage("retencion_fuente",retencion_fuente_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarretencion_fuentesAjaxWebPart").html(retencion_fuente_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("retencion_fuente",jQuery("#divTablaDatosReporteAuxiliarretencion_fuentesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(retencion_fuente_control) {
		this.retencion_fuente_controlInicial=retencion_fuente_control;
			
		if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(retencion_fuente_control.strStyleDivArbol,retencion_fuente_control.strStyleDivContent
																,retencion_fuente_control.strStyleDivOpcionesBanner,retencion_fuente_control.strStyleDivExpandirColapsar
																,retencion_fuente_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=retencion_fuente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",retencion_fuente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(retencion_fuente_control) {
		jQuery("#divTablaDatosretencion_fuentesAjaxWebPart").html(retencion_fuente_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosretencion_fuentes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosretencion_fuentes=jQuery("#tblTablaDatosretencion_fuentes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("retencion_fuente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',retencion_fuente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			retencion_fuente_webcontrol1.registrarControlesTableEdition(retencion_fuente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		retencion_fuente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(retencion_fuente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(retencion_fuente_control.retencion_fuenteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(retencion_fuente_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(retencion_fuente_control) {
		this.actualizarCssBotonesPagina(retencion_fuente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(retencion_fuente_control.tiposReportes,retencion_fuente_control.tiposReporte
															 	,retencion_fuente_control.tiposPaginacion,retencion_fuente_control.tiposAcciones
																,retencion_fuente_control.tiposColumnasSelect,retencion_fuente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(retencion_fuente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(retencion_fuente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(retencion_fuente_control);			
	}
	
	actualizarPaginaAreaBusquedas(retencion_fuente_control) {
		jQuery("#divBusquedaretencion_fuenteAjaxWebPart").css("display",retencion_fuente_control.strPermisoBusqueda);
		jQuery("#trretencion_fuenteCabeceraBusquedas").css("display",retencion_fuente_control.strPermisoBusqueda);
		jQuery("#trBusquedaretencion_fuente").css("display",retencion_fuente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(retencion_fuente_control.htmlTablaOrderBy!=null
			&& retencion_fuente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByretencion_fuenteAjaxWebPart").html(retencion_fuente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//retencion_fuente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(retencion_fuente_control.htmlTablaOrderByRel!=null
			&& retencion_fuente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelretencion_fuenteAjaxWebPart").html(retencion_fuente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(retencion_fuente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaretencion_fuenteAjaxWebPart").css("display","none");
			jQuery("#trretencion_fuenteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaretencion_fuente").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(retencion_fuente_control) {
		jQuery("#tdretencion_fuenteNuevo").css("display",retencion_fuente_control.strPermisoNuevo);
		jQuery("#trretencion_fuenteElementos").css("display",retencion_fuente_control.strVisibleTablaElementos);
		jQuery("#trretencion_fuenteAcciones").css("display",retencion_fuente_control.strVisibleTablaAcciones);
		jQuery("#trretencion_fuenteParametrosAcciones").css("display",retencion_fuente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(retencion_fuente_control) {
	
		this.actualizarCssBotonesMantenimiento(retencion_fuente_control);
				
		if(retencion_fuente_control.retencion_fuenteActual!=null) {//form
			
			this.actualizarCamposFormulario(retencion_fuente_control);			
		}
						
		this.actualizarSpanMensajesCampos(retencion_fuente_control);
	}
	
	actualizarPaginaUsuarioInvitado(retencion_fuente_control) {
	
		var indexPosition=retencion_fuente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=retencion_fuente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(retencion_fuente_control) {
		jQuery("#divResumenretencion_fuenteActualAjaxWebPart").html(retencion_fuente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_fuente_control) {
		jQuery("#divAccionesRelacionesretencion_fuenteAjaxWebPart").html(retencion_fuente_control.htmlTablaAccionesRelaciones);
			
		retencion_fuente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(retencion_fuente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(retencion_fuente_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(retencion_fuente_control) {
		
		if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",retencion_fuente_control.strVisibleFK_Idcuenta_compras);
			jQuery("#tblstrVisible"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",retencion_fuente_control.strVisibleFK_Idcuenta_compras);
		}

		if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",retencion_fuente_control.strVisibleFK_Idcuenta_ventas);
			jQuery("#tblstrVisible"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",retencion_fuente_control.strVisibleFK_Idcuenta_ventas);
		}

		if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retencion_fuente_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retencion_fuente_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionretencion_fuente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("retencion_fuente",id,"facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		retencion_fuente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion_fuente","empresa","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		retencion_fuente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion_fuente","cuenta","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		retencion_fuente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion_fuente","cuenta","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(retencion_fuente_control) {
	
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id").val(retencion_fuente_control.retencion_fuenteActual.id);
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-version_row").val(retencion_fuente_control.retencion_fuenteActual.versionRow);
		
		if(retencion_fuente_control.retencion_fuenteActual.id_empresa!=null && retencion_fuente_control.retencion_fuenteActual.id_empresa>-1){
			if(jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_fuente_control.retencion_fuenteActual.id_empresa) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val(retencion_fuente_control.retencion_fuenteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-codigo").val(retencion_fuente_control.retencion_fuenteActual.codigo);
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-descripcion").val(retencion_fuente_control.retencion_fuenteActual.descripcion);
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-valor").val(retencion_fuente_control.retencion_fuenteActual.valor);
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-valor_base").val(retencion_fuente_control.retencion_fuenteActual.valor_base);
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-predeterminado").prop('checked',retencion_fuente_control.retencion_fuenteActual.predeterminado);
		
		if(retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas!=null && retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas>-1){
			if(jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras!=null && retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras>-1){
			if(jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-cuenta_contable_ventas").val(retencion_fuente_control.retencion_fuenteActual.cuenta_contable_ventas);
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-cuenta_contable_compras").val(retencion_fuente_control.retencion_fuenteActual.cuenta_contable_compras);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+retencion_fuente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("retencion_fuente","facturacion","","form_retencion_fuente",formulario,"","",paraEventoTabla,idFilaTabla,retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
	}
	
	cargarCombosFK(retencion_fuente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.cargarCombosempresasFK(retencion_fuente_control);
			}

			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.cargarComboscuenta_ventassFK(retencion_fuente_control);
			}

			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.cargarComboscuenta_comprassFK(retencion_fuente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(retencion_fuente_control.strRecargarFkTiposNinguno!=null && retencion_fuente_control.strRecargarFkTiposNinguno!='NINGUNO' && retencion_fuente_control.strRecargarFkTiposNinguno!='') {
			
				if(retencion_fuente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",retencion_fuente_control.strRecargarFkTiposNinguno,",")) { 
					retencion_fuente_webcontrol1.cargarCombosempresasFK(retencion_fuente_control);
				}

				if(retencion_fuente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_fuente_control.strRecargarFkTiposNinguno,",")) { 
					retencion_fuente_webcontrol1.cargarComboscuenta_ventassFK(retencion_fuente_control);
				}

				if(retencion_fuente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_fuente_control.strRecargarFkTiposNinguno,",")) { 
					retencion_fuente_webcontrol1.cargarComboscuenta_comprassFK(retencion_fuente_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(retencion_fuente_control) {
		jQuery("#spanstrMensajeid").text(retencion_fuente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(retencion_fuente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(retencion_fuente_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(retencion_fuente_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(retencion_fuente_control.strMensajedescripcion);		
		jQuery("#spanstrMensajevalor").text(retencion_fuente_control.strMensajevalor);		
		jQuery("#spanstrMensajevalor_base").text(retencion_fuente_control.strMensajevalor_base);		
		jQuery("#spanstrMensajepredeterminado").text(retencion_fuente_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta_ventas").text(retencion_fuente_control.strMensajeid_cuenta_ventas);		
		jQuery("#spanstrMensajeid_cuenta_compras").text(retencion_fuente_control.strMensajeid_cuenta_compras);		
		jQuery("#spanstrMensajecuenta_contable_ventas").text(retencion_fuente_control.strMensajecuenta_contable_ventas);		
		jQuery("#spanstrMensajecuenta_contable_compras").text(retencion_fuente_control.strMensajecuenta_contable_compras);		
	}
	
	actualizarCssBotonesMantenimiento(retencion_fuente_control) {
		jQuery("#tdbtnNuevoretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoretencion_fuente").css("display",retencion_fuente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarretencion_fuente").css("display",retencion_fuente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarretencion_fuente").css("display",retencion_fuente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosretencion_fuente").css("display",retencion_fuente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(retencion_fuente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_fuente_funcion1,retencion_fuente_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(retencion_fuente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_fuente_funcion1,retencion_fuente_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(retencion_fuente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_fuente_funcion1,retencion_fuente_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(retencion_fuente_control) {
		var i=0;
		
		i=retencion_fuente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(retencion_fuente_control.retencion_fuenteActual.id);
		jQuery("#t-version_row_"+i+"").val(retencion_fuente_control.retencion_fuenteActual.versionRow);
		
		if(retencion_fuente_control.retencion_fuenteActual.id_empresa!=null && retencion_fuente_control.retencion_fuenteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != retencion_fuente_control.retencion_fuenteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(retencion_fuente_control.retencion_fuenteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(retencion_fuente_control.retencion_fuenteActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(retencion_fuente_control.retencion_fuenteActual.descripcion);
		jQuery("#t-cel_"+i+"_5").val(retencion_fuente_control.retencion_fuenteActual.valor);
		jQuery("#t-cel_"+i+"_6").val(retencion_fuente_control.retencion_fuenteActual.valor_base);
		jQuery("#t-cel_"+i+"_7").prop('checked',retencion_fuente_control.retencion_fuenteActual.predeterminado);
		
		if(retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas!=null && retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas) {
				jQuery("#t-cel_"+i+"_8").val(retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_8").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras!=null && retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras) {
				jQuery("#t-cel_"+i+"_9").val(retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(retencion_fuente_control.retencion_fuenteActual.cuenta_contable_ventas);
		jQuery("#t-cel_"+i+"_11").val(retencion_fuente_control.retencion_fuenteActual.cuenta_contable_compras);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(retencion_fuente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(retencion_fuente_control) {
		retencion_fuente_funcion1.registrarControlesTableValidacionEdition(retencion_fuente_control,retencion_fuente_webcontrol1,retencion_fuente_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuenteConstante,strParametros);
		
		//retencion_fuente_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(retencion_fuente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa",retencion_fuente_control.empresasFK);

		if(retencion_fuente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_fuente_control.idFilaTablaActual+"_2",retencion_fuente_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(retencion_fuente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas",retencion_fuente_control.cuenta_ventassFK);

		if(retencion_fuente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_fuente_control.idFilaTablaActual+"_8",retencion_fuente_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",retencion_fuente_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(retencion_fuente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras",retencion_fuente_control.cuenta_comprassFK);

		if(retencion_fuente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_fuente_control.idFilaTablaActual+"_9",retencion_fuente_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",retencion_fuente_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(retencion_fuente_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(retencion_fuente_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(retencion_fuente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(retencion_fuente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_fuente_control.idempresaDefaultFK>-1 && jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_fuente_control.idempresaDefaultFK) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val(retencion_fuente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(retencion_fuente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_fuente_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_fuente_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_fuente_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(retencion_fuente_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(retencion_fuente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_fuente_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_fuente_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_fuente_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(retencion_fuente_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//retencion_fuente_control
		
	
	}
	
	onLoadCombosDefectoFK(retencion_fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.setDefectoValorCombosempresasFK(retencion_fuente_control);
			}

			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.setDefectoValorComboscuenta_ventassFK(retencion_fuente_control);
			}

			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.setDefectoValorComboscuenta_comprassFK(retencion_fuente_control);
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
	onLoadCombosEventosFK(retencion_fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_fuente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_fuente_webcontrol1.registrarComboActionChangeCombosempresasFK(retencion_fuente_control);
			//}

			//if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_fuente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_fuente_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(retencion_fuente_control);
			//}

			//if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_fuente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_fuente_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(retencion_fuente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(retencion_fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("retencion_fuente");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("retencion_fuente");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(retencion_fuente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);			
			
			if(retencion_fuente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,"retencion_fuente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				retencion_fuente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				retencion_fuente_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				retencion_fuente_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion_fuente","FK_Idcuenta_compras","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion_fuente","FK_Idcuenta_ventas","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion_fuente","FK_Idempresa","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			retencion_fuente_funcion1.validarFormularioJQuery(retencion_fuente_constante1);
			
			if(retencion_fuente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(retencion_fuente_control) {
		
		jQuery("#divBusquedaretencion_fuenteAjaxWebPart").css("display",retencion_fuente_control.strPermisoBusqueda);
		jQuery("#trretencion_fuenteCabeceraBusquedas").css("display",retencion_fuente_control.strPermisoBusqueda);
		jQuery("#trBusquedaretencion_fuente").css("display",retencion_fuente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteretencion_fuente").css("display",retencion_fuente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosretencion_fuente").attr("style",retencion_fuente_control.strPermisoMostrarTodos);
		
		if(retencion_fuente_control.strPermisoNuevo!=null) {
			jQuery("#tdretencion_fuenteNuevo").css("display",retencion_fuente_control.strPermisoNuevo);
			jQuery("#tdretencion_fuenteNuevoToolBar").css("display",retencion_fuente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdretencion_fuenteDuplicar").css("display",retencion_fuente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretencion_fuenteDuplicarToolBar").css("display",retencion_fuente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretencion_fuenteNuevoGuardarCambios").css("display",retencion_fuente_control.strPermisoNuevo);
			jQuery("#tdretencion_fuenteNuevoGuardarCambiosToolBar").css("display",retencion_fuente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(retencion_fuente_control.strPermisoActualizar!=null) {
			jQuery("#tdretencion_fuenteActualizarToolBar").css("display",retencion_fuente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencion_fuenteCopiar").css("display",retencion_fuente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencion_fuenteCopiarToolBar").css("display",retencion_fuente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencion_fuenteConEditar").css("display",retencion_fuente_control.strPermisoActualizar);
		}
		
		jQuery("#tdretencion_fuenteEliminarToolBar").css("display",retencion_fuente_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdretencion_fuenteGuardarCambios").css("display",retencion_fuente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdretencion_fuenteGuardarCambiosToolBar").css("display",retencion_fuente_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trretencion_fuenteElementos").css("display",retencion_fuente_control.strVisibleTablaElementos);
		
		jQuery("#trretencion_fuenteAcciones").css("display",retencion_fuente_control.strVisibleTablaAcciones);
		jQuery("#trretencion_fuenteParametrosAcciones").css("display",retencion_fuente_control.strVisibleTablaAcciones);
			
		jQuery("#tdretencion_fuenteCerrarPagina").css("display",retencion_fuente_control.strPermisoPopup);		
		jQuery("#tdretencion_fuenteCerrarPaginaToolBar").css("display",retencion_fuente_control.strPermisoPopup);
		//jQuery("#trretencion_fuenteAccionesRelaciones").css("display",retencion_fuente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		retencion_fuente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		retencion_fuente_webcontrol1.registrarEventosControles();
		
		if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
			retencion_fuente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(retencion_fuente_constante1.STR_ES_RELACIONES=="true") {
			if(retencion_fuente_constante1.BIT_ES_PAGINA_FORM==true) {
				retencion_fuente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(retencion_fuente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(retencion_fuente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				retencion_fuente_webcontrol1.onLoad();
				
			} else {
				if(retencion_fuente_constante1.BIT_ES_PAGINA_FORM==true) {
					if(retencion_fuente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
						//retencion_fuente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(retencion_fuente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(retencion_fuente_constante1.BIG_ID_ACTUAL,"retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
						//retencion_fuente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			retencion_fuente_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var retencion_fuente_webcontrol1=new retencion_fuente_webcontrol();

if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = retencion_fuente_webcontrol1.onLoadWindow; 
}

//</script>