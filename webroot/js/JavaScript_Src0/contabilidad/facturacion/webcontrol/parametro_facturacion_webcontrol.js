//<script type="text/javascript" language="javascript">



//var parametro_facturacionJQueryPaginaWebInteraccion= function (parametro_facturacion_control) {
//this.,this.,this.

class parametro_facturacion_webcontrol extends parametro_facturacion_webcontrol_add {
	
	parametro_facturacion_control=null;
	parametro_facturacion_controlInicial=null;
	parametro_facturacion_controlAuxiliar=null;
		
	//if(parametro_facturacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_facturacion_control) {
		super();
		
		this.parametro_facturacion_control=parametro_facturacion_control;
	}
		
	actualizarVariablesPagina(parametro_facturacion_control) {
		
		if(parametro_facturacion_control.action=="index" || parametro_facturacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_facturacion_control);
			
		} else if(parametro_facturacion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_facturacion_control);
			
		} else if(parametro_facturacion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_facturacion_control);
			
		} else if(parametro_facturacion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_facturacion_control);		
		
		} else if(parametro_facturacion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_facturacion_control);		
		
		} else if(parametro_facturacion_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_facturacion_control);		
		
		} else if(parametro_facturacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_facturacion_control);		
		}
		else if(parametro_facturacion_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_facturacion_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(parametro_facturacion_control.action + " Revisar Manejo");
			
			if(parametro_facturacion_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(parametro_facturacion_control);
				
				return;
			}
			
			//if(parametro_facturacion_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(parametro_facturacion_control);
			//}
			
			if(parametro_facturacion_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(parametro_facturacion_control);
			}
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_facturacion_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(parametro_facturacion_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(parametro_facturacion_control, false);			
			}
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(parametro_facturacion_control);	
			}
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(parametro_facturacion_control);
			}
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(parametro_facturacion_control);
			}
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);
			}
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(parametro_facturacion_control);	
			}
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
			}
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(parametro_facturacion_control);
			}
			
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(parametro_facturacion_control);			
			}
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(parametro_facturacion_control);
			}
			
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(parametro_facturacion_control);
			}
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(parametro_facturacion_control);
			}				
			
			if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_facturacion_control);
			}
			
			if(parametro_facturacion_control.usuarioActual!=null && parametro_facturacion_control.usuarioActual.field_strUserName!=null &&
			parametro_facturacion_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(parametro_facturacion_control);			
			}
		}
		
		
		if(parametro_facturacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_facturacion_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(parametro_facturacion_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_facturacion_control);
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		this.actualizarPaginaCargaGeneralControles(parametro_facturacion_control);
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_facturacion_control);
		this.actualizarPaginaAreaBusquedas(parametro_facturacion_control);
		this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_facturacion_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_facturacion_control);
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		this.actualizarPaginaCargaGeneralControles(parametro_facturacion_control);
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_facturacion_control);
		this.actualizarPaginaAreaBusquedas(parametro_facturacion_control);
		this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_facturacion_control) {
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_facturacion_control) {
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_facturacion_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_facturacion_control);
		this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_facturacion_control) {
		this.actualizarPaginaAbrirLink(parametro_facturacion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);				
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		this.actualizarPaginaFormulario(parametro_facturacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		this.actualizarPaginaFormulario(parametro_facturacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_facturacion_control) {
		this.actualizarPaginaFormulario(parametro_facturacion_control);
		this.onLoadCombosDefectoFK(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		this.actualizarPaginaFormulario(parametro_facturacion_control);
		this.onLoadCombosDefectoFK(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_facturacion_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_facturacion_control);
		this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);
		this.actualizarPaginaFormulario(parametro_facturacion_control);
		this.onLoadCombosDefectoFK(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_facturacion_control) {
		this.actualizarPaginaAbrirLink(parametro_facturacion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_facturacion_control) {
		this.actualizarPaginaImprimir(parametro_facturacion_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_facturacion_control) {
		this.actualizarPaginaImprimir(parametro_facturacion_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_facturacion_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_facturacion_control) {
		//FORMULARIO
		if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_facturacion_control);
			this.actualizarPaginaFormularioAdd(parametro_facturacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		//COMBOS FK
		if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_facturacion_control) {
		//FORMULARIO
		if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_facturacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);	
		//COMBOS FK
		if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_facturacion_control) {
		//FORMULARIO
		if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_facturacion_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_facturacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);	
		//COMBOS FK
		if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control) {
		if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_facturacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_facturacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_facturacion_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_facturacion_control) {
		if(parametro_facturacion_funcion1.esPaginaForm()==true) {
			window.opener.parametro_facturacion_webcontrol1.actualizarPaginaTablaDatos(parametro_facturacion_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_facturacion_control) {
		parametro_facturacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_facturacion_control.strAuxiliarUrlPagina);
				
		parametro_facturacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_facturacion_control.strAuxiliarTipo,parametro_facturacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_facturacion_control) {
		parametro_facturacion_funcion1.resaltarRestaurarDivMensaje(true,parametro_facturacion_control.strAuxiliarMensajeAlert,parametro_facturacion_control.strAuxiliarCssMensaje);
			
		if(parametro_facturacion_funcion1.esPaginaForm()==true) {
			window.opener.parametro_facturacion_funcion1.resaltarRestaurarDivMensaje(true,parametro_facturacion_control.strAuxiliarMensajeAlert,parametro_facturacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(parametro_facturacion_control) {
		eval(parametro_facturacion_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(parametro_facturacion_control, mostrar) {
		
		if(mostrar==true) {
			parametro_facturacion_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_facturacion_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			parametro_facturacion_funcion1.mostrarDivMensaje(true,parametro_facturacion_control.strAuxiliarMensaje,parametro_facturacion_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_facturacion_funcion1.mostrarDivMensaje(false,parametro_facturacion_control.strAuxiliarMensaje,parametro_facturacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(parametro_facturacion_control) {
	
		funcionGeneral.printWebPartPage("parametro_facturacion",parametro_facturacion_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarparametro_facturacionsAjaxWebPart").html(parametro_facturacion_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("parametro_facturacion",jQuery("#divTablaDatosReporteAuxiliarparametro_facturacionsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(parametro_facturacion_control) {
		this.parametro_facturacion_controlInicial=parametro_facturacion_control;
			
		if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_facturacion_control.strStyleDivArbol,parametro_facturacion_control.strStyleDivContent
																,parametro_facturacion_control.strStyleDivOpcionesBanner,parametro_facturacion_control.strStyleDivExpandirColapsar
																,parametro_facturacion_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_facturacion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_facturacion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(parametro_facturacion_control) {
		jQuery("#divTablaDatosparametro_facturacionsAjaxWebPart").html(parametro_facturacion_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_facturacions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_facturacions=jQuery("#tblTablaDatosparametro_facturacions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_facturacion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_facturacion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_facturacion_webcontrol1.registrarControlesTableEdition(parametro_facturacion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_facturacion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(parametro_facturacion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_facturacion_control.parametro_facturacionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_facturacion_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(parametro_facturacion_control) {
		this.actualizarCssBotonesPagina(parametro_facturacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_facturacion_control.tiposReportes,parametro_facturacion_control.tiposReporte
															 	,parametro_facturacion_control.tiposPaginacion,parametro_facturacion_control.tiposAcciones
																,parametro_facturacion_control.tiposColumnasSelect,parametro_facturacion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_facturacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_facturacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_facturacion_control);			
	}
	
	actualizarPaginaAreaBusquedas(parametro_facturacion_control) {
		jQuery("#divBusquedaparametro_facturacionAjaxWebPart").css("display",parametro_facturacion_control.strPermisoBusqueda);
		jQuery("#trparametro_facturacionCabeceraBusquedas").css("display",parametro_facturacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_facturacion").css("display",parametro_facturacion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_facturacion_control.htmlTablaOrderBy!=null
			&& parametro_facturacion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_facturacionAjaxWebPart").html(parametro_facturacion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_facturacion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_facturacion_control.htmlTablaOrderByRel!=null
			&& parametro_facturacion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_facturacionAjaxWebPart").html(parametro_facturacion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_facturacionAjaxWebPart").css("display","none");
			jQuery("#trparametro_facturacionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_facturacion").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(parametro_facturacion_control) {
		jQuery("#tdparametro_facturacionNuevo").css("display",parametro_facturacion_control.strPermisoNuevo);
		jQuery("#trparametro_facturacionElementos").css("display",parametro_facturacion_control.strVisibleTablaElementos);
		jQuery("#trparametro_facturacionAcciones").css("display",parametro_facturacion_control.strVisibleTablaAcciones);
		jQuery("#trparametro_facturacionParametrosAcciones").css("display",parametro_facturacion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_facturacion_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_facturacion_control);
				
		if(parametro_facturacion_control.parametro_facturacionActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_facturacion_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_facturacion_control);
	}
	
	actualizarPaginaUsuarioInvitado(parametro_facturacion_control) {
	
		var indexPosition=parametro_facturacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_facturacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_facturacion_control) {
		jQuery("#divResumenparametro_facturacionActualAjaxWebPart").html(parametro_facturacion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_facturacion_control) {
		jQuery("#divAccionesRelacionesparametro_facturacionAjaxWebPart").html(parametro_facturacion_control.htmlTablaAccionesRelaciones);
			
		parametro_facturacion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_facturacion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_facturacion_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_facturacion_control) {
		
		if(parametro_facturacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",parametro_facturacion_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",parametro_facturacion_control.strVisibleFK_Idtermino_pago);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_facturacion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_facturacion",id,"facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);		
	}
	
	

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		parametro_facturacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_facturacion","termino_pago_cliente","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_facturacion_control) {
	
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id").val(parametro_facturacion_control.parametro_facturacionActual.id);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-version_row").val(parametro_facturacion_control.parametro_facturacionActual.versionRow);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-numero_factura").val(parametro_facturacion_control.parametro_facturacionActual.numero_factura);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-numero_factura_lote").val(parametro_facturacion_control.parametro_facturacionActual.numero_factura_lote);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-numero_devolucion").val(parametro_facturacion_control.parametro_facturacionActual.numero_devolucion);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-numero_estimado").val(parametro_facturacion_control.parametro_facturacionActual.numero_estimado);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-numero_consignacion").val(parametro_facturacion_control.parametro_facturacionActual.numero_consignacion);
		
		if(parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente!=null && parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente>-1){
			if(jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente) {
				jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").select2("val", null);
			if(jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_facturacion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_facturacion","facturacion","","form_parametro_facturacion",formulario,"","",paraEventoTabla,idFilaTabla,parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
	}
	
	cargarCombosFK(parametro_facturacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",parametro_facturacion_control.strRecargarFkTipos,",")) { 
				parametro_facturacion_webcontrol1.cargarCombostermino_pago_clientesFK(parametro_facturacion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_facturacion_control.strRecargarFkTiposNinguno!=null && parametro_facturacion_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_facturacion_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_facturacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",parametro_facturacion_control.strRecargarFkTiposNinguno,",")) { 
					parametro_facturacion_webcontrol1.cargarCombostermino_pago_clientesFK(parametro_facturacion_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(parametro_facturacion_control) {
		jQuery("#spanstrMensajeid").text(parametro_facturacion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_facturacion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenumero_factura").text(parametro_facturacion_control.strMensajenumero_factura);		
		jQuery("#spanstrMensajenumero_factura_lote").text(parametro_facturacion_control.strMensajenumero_factura_lote);		
		jQuery("#spanstrMensajenumero_devolucion").text(parametro_facturacion_control.strMensajenumero_devolucion);		
		jQuery("#spanstrMensajenumero_estimado").text(parametro_facturacion_control.strMensajenumero_estimado);		
		jQuery("#spanstrMensajenumero_consignacion").text(parametro_facturacion_control.strMensajenumero_consignacion);		
		jQuery("#spanstrMensajeid_termino_pago_cliente").text(parametro_facturacion_control.strMensajeid_termino_pago_cliente);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_facturacion_control) {
		jQuery("#tdbtnNuevoparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_facturacion").css("display",parametro_facturacion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_facturacion").css("display",parametro_facturacion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_facturacion").css("display",parametro_facturacion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_facturacion").css("display",parametro_facturacion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablatermino_pago_clienteFK(parametro_facturacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_facturacion_funcion1,parametro_facturacion_control.termino_pago_clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(parametro_facturacion_control) {
		var i=0;
		
		i=parametro_facturacion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_facturacion_control.parametro_facturacionActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_facturacion_control.parametro_facturacionActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(parametro_facturacion_control.parametro_facturacionActual.numero_factura);
		jQuery("#t-cel_"+i+"_3").val(parametro_facturacion_control.parametro_facturacionActual.numero_factura_lote);
		jQuery("#t-cel_"+i+"_4").val(parametro_facturacion_control.parametro_facturacionActual.numero_devolucion);
		jQuery("#t-cel_"+i+"_5").val(parametro_facturacion_control.parametro_facturacionActual.numero_estimado);
		jQuery("#t-cel_"+i+"_6").val(parametro_facturacion_control.parametro_facturacionActual.numero_consignacion);
		
		if(parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente!=null && parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente) {
				jQuery("#t-cel_"+i+"_7").val(parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_facturacion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_facturacion_control) {
		parametro_facturacion_funcion1.registrarControlesTableValidacionEdition(parametro_facturacion_control,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacionConstante,strParametros);
		
		//parametro_facturacion_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombostermino_pago_clientesFK(parametro_facturacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente",parametro_facturacion_control.termino_pago_clientesFK);

		if(parametro_facturacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_facturacion_control.idFilaTablaActual+"_7",parametro_facturacion_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",parametro_facturacion_control.termino_pago_clientesFK);

	};

	
	
	registrarComboActionChangeCombostermino_pago_clientesFK(parametro_facturacion_control) {

	};

	
	
	setDefectoValorCombostermino_pago_clientesFK(parametro_facturacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_facturacion_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != parametro_facturacion_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(parametro_facturacion_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(parametro_facturacion_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_facturacion_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_facturacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_facturacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",parametro_facturacion_control.strRecargarFkTipos,",")) { 
				parametro_facturacion_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(parametro_facturacion_control);
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
	onLoadCombosEventosFK(parametro_facturacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_facturacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",parametro_facturacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_facturacion_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(parametro_facturacion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_facturacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_facturacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_facturacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_facturacion");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_facturacion");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_facturacion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);			
			
			if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,"parametro_facturacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				parametro_facturacion_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_facturacion","FK_Idtermino_pago","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			parametro_facturacion_funcion1.validarFormularioJQuery(parametro_facturacion_constante1);
			
			if(parametro_facturacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_facturacion_control) {
		
		jQuery("#divBusquedaparametro_facturacionAjaxWebPart").css("display",parametro_facturacion_control.strPermisoBusqueda);
		jQuery("#trparametro_facturacionCabeceraBusquedas").css("display",parametro_facturacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_facturacion").css("display",parametro_facturacion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_facturacion").css("display",parametro_facturacion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_facturacion").attr("style",parametro_facturacion_control.strPermisoMostrarTodos);
		
		if(parametro_facturacion_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_facturacionNuevo").css("display",parametro_facturacion_control.strPermisoNuevo);
			jQuery("#tdparametro_facturacionNuevoToolBar").css("display",parametro_facturacion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_facturacionDuplicar").css("display",parametro_facturacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_facturacionDuplicarToolBar").css("display",parametro_facturacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_facturacionNuevoGuardarCambios").css("display",parametro_facturacion_control.strPermisoNuevo);
			jQuery("#tdparametro_facturacionNuevoGuardarCambiosToolBar").css("display",parametro_facturacion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_facturacion_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_facturacionActualizarToolBar").css("display",parametro_facturacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_facturacionCopiar").css("display",parametro_facturacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_facturacionCopiarToolBar").css("display",parametro_facturacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_facturacionConEditar").css("display",parametro_facturacion_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_facturacionEliminarToolBar").css("display",parametro_facturacion_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdparametro_facturacionGuardarCambios").css("display",parametro_facturacion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_facturacionGuardarCambiosToolBar").css("display",parametro_facturacion_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trparametro_facturacionElementos").css("display",parametro_facturacion_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_facturacionAcciones").css("display",parametro_facturacion_control.strVisibleTablaAcciones);
		jQuery("#trparametro_facturacionParametrosAcciones").css("display",parametro_facturacion_control.strVisibleTablaAcciones);
			
		jQuery("#tdparametro_facturacionCerrarPagina").css("display",parametro_facturacion_control.strPermisoPopup);		
		jQuery("#tdparametro_facturacionCerrarPaginaToolBar").css("display",parametro_facturacion_control.strPermisoPopup);
		//jQuery("#trparametro_facturacionAccionesRelaciones").css("display",parametro_facturacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_facturacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_facturacion_webcontrol1.registrarEventosControles();
		
		if(parametro_facturacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
			parametro_facturacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_facturacion_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_facturacion_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_facturacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_facturacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(parametro_facturacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_facturacion_webcontrol1.onLoad();
				
			} else {
				if(parametro_facturacion_constante1.BIT_ES_PAGINA_FORM==true) {
					if(parametro_facturacion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
						//parametro_facturacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(parametro_facturacion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_facturacion_constante1.BIG_ID_ACTUAL,"parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
						//parametro_facturacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			parametro_facturacion_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var parametro_facturacion_webcontrol1=new parametro_facturacion_webcontrol();

if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_facturacion_webcontrol1.onLoadWindow; 
}

//</script>