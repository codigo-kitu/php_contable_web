//<script type="text/javascript" language="javascript">



//var parametro_inventarioJQueryPaginaWebInteraccion= function (parametro_inventario_control) {
//this.,this.,this.

class parametro_inventario_webcontrol extends parametro_inventario_webcontrol_add {
	
	parametro_inventario_control=null;
	parametro_inventario_controlInicial=null;
	parametro_inventario_controlAuxiliar=null;
		
	//if(parametro_inventario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_inventario_control) {
		super();
		
		this.parametro_inventario_control=parametro_inventario_control;
	}
		
	actualizarVariablesPagina(parametro_inventario_control) {
		
		if(parametro_inventario_control.action=="index" || parametro_inventario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_inventario_control);
			
		} else if(parametro_inventario_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_inventario_control);
			
		} else if(parametro_inventario_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_inventario_control);
			
		} else if(parametro_inventario_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_inventario_control);		
		
		} else if(parametro_inventario_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_inventario_control);		
		
		} else if(parametro_inventario_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_inventario_control);		
		
		} else if(parametro_inventario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_inventario_control);		
		}
		else if(parametro_inventario_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_inventario_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(parametro_inventario_control.action + " Revisar Manejo");
			
			if(parametro_inventario_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(parametro_inventario_control);
				
				return;
			}
			
			//if(parametro_inventario_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(parametro_inventario_control);
			//}
			
			if(parametro_inventario_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(parametro_inventario_control);
			}
			
			if(parametro_inventario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_inventario_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(parametro_inventario_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(parametro_inventario_control, false);			
			}
			
			if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(parametro_inventario_control);	
			}
			
			if(parametro_inventario_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(parametro_inventario_control);
			}
			
			if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(parametro_inventario_control);
			}
			
			if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(parametro_inventario_control);
			}
			
			if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(parametro_inventario_control);	
			}
			
			if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
			}
			
			if(parametro_inventario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(parametro_inventario_control);
			}
			
			
			if(parametro_inventario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(parametro_inventario_control);			
			}
			
			if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(parametro_inventario_control);
			}
			
			
			if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(parametro_inventario_control);
			}
			
			if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(parametro_inventario_control);
			}				
			
			if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_inventario_control);
			}
			
			if(parametro_inventario_control.usuarioActual!=null && parametro_inventario_control.usuarioActual.field_strUserName!=null &&
			parametro_inventario_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(parametro_inventario_control);			
			}
		}
		
		
		if(parametro_inventario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_inventario_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(parametro_inventario_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_inventario_control);
		this.actualizarPaginaTablaDatos(parametro_inventario_control);
		this.actualizarPaginaCargaGeneralControles(parametro_inventario_control);
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_inventario_control);
		this.actualizarPaginaAreaBusquedas(parametro_inventario_control);
		this.actualizarPaginaCargaCombosFK(parametro_inventario_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_inventario_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_inventario_control);
		this.actualizarPaginaTablaDatos(parametro_inventario_control);
		this.actualizarPaginaCargaGeneralControles(parametro_inventario_control);
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_inventario_control);
		this.actualizarPaginaAreaBusquedas(parametro_inventario_control);
		this.actualizarPaginaCargaCombosFK(parametro_inventario_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(parametro_inventario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_inventario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_inventario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);		
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);		
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);		
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_inventario_control) {
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_inventario_control) {
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_inventario_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_inventario_control);
		this.actualizarPaginaCargaCombosFK(parametro_inventario_control);
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_inventario_control) {
		this.actualizarPaginaAbrirLink(parametro_inventario_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);				
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);
		this.actualizarPaginaFormulario(parametro_inventario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);
		this.actualizarPaginaFormulario(parametro_inventario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_inventario_control) {
		this.actualizarPaginaFormulario(parametro_inventario_control);
		this.onLoadCombosDefectoFK(parametro_inventario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);
		this.actualizarPaginaFormulario(parametro_inventario_control);
		this.onLoadCombosDefectoFK(parametro_inventario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_inventario_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_inventario_control);
		this.actualizarPaginaCargaCombosFK(parametro_inventario_control);
		this.actualizarPaginaFormulario(parametro_inventario_control);
		this.onLoadCombosDefectoFK(parametro_inventario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_inventario_control) {
		this.actualizarPaginaAbrirLink(parametro_inventario_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_inventario_control) {
		this.actualizarPaginaTablaDatos(parametro_inventario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_inventario_control) {
		this.actualizarPaginaImprimir(parametro_inventario_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_inventario_control) {
		this.actualizarPaginaImprimir(parametro_inventario_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_inventario_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_inventario_control) {
		//FORMULARIO
		if(parametro_inventario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_inventario_control);
			this.actualizarPaginaFormularioAdd(parametro_inventario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		//COMBOS FK
		if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_inventario_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_inventario_control) {
		//FORMULARIO
		if(parametro_inventario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_inventario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);	
		//COMBOS FK
		if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_inventario_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_inventario_control) {
		//FORMULARIO
		if(parametro_inventario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_inventario_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_inventario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);	
		//COMBOS FK
		if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_inventario_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control) {
		if(parametro_inventario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_inventario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_inventario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_inventario_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_inventario_control) {
		if(parametro_inventario_funcion1.esPaginaForm()==true) {
			window.opener.parametro_inventario_webcontrol1.actualizarPaginaTablaDatos(parametro_inventario_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_inventario_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_inventario_control) {
		parametro_inventario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_inventario_control.strAuxiliarUrlPagina);
				
		parametro_inventario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_inventario_control.strAuxiliarTipo,parametro_inventario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_inventario_control) {
		parametro_inventario_funcion1.resaltarRestaurarDivMensaje(true,parametro_inventario_control.strAuxiliarMensajeAlert,parametro_inventario_control.strAuxiliarCssMensaje);
			
		if(parametro_inventario_funcion1.esPaginaForm()==true) {
			window.opener.parametro_inventario_funcion1.resaltarRestaurarDivMensaje(true,parametro_inventario_control.strAuxiliarMensajeAlert,parametro_inventario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(parametro_inventario_control) {
		eval(parametro_inventario_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(parametro_inventario_control, mostrar) {
		
		if(mostrar==true) {
			parametro_inventario_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_inventario_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			parametro_inventario_funcion1.mostrarDivMensaje(true,parametro_inventario_control.strAuxiliarMensaje,parametro_inventario_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_inventario_funcion1.mostrarDivMensaje(false,parametro_inventario_control.strAuxiliarMensaje,parametro_inventario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(parametro_inventario_control) {
	
		funcionGeneral.printWebPartPage("parametro_inventario",parametro_inventario_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarparametro_inventariosAjaxWebPart").html(parametro_inventario_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("parametro_inventario",jQuery("#divTablaDatosReporteAuxiliarparametro_inventariosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(parametro_inventario_control) {
		this.parametro_inventario_controlInicial=parametro_inventario_control;
			
		if(parametro_inventario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_inventario_control.strStyleDivArbol,parametro_inventario_control.strStyleDivContent
																,parametro_inventario_control.strStyleDivOpcionesBanner,parametro_inventario_control.strStyleDivExpandirColapsar
																,parametro_inventario_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_inventario_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_inventario_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(parametro_inventario_control) {
		jQuery("#divTablaDatosparametro_inventariosAjaxWebPart").html(parametro_inventario_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_inventarios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_inventario_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_inventarios=jQuery("#tblTablaDatosparametro_inventarios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_inventario",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_inventario_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_inventario_webcontrol1.registrarControlesTableEdition(parametro_inventario_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_inventario_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(parametro_inventario_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_inventario_control.parametro_inventarioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_inventario_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(parametro_inventario_control) {
		this.actualizarCssBotonesPagina(parametro_inventario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_inventario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_inventario_control.tiposReportes,parametro_inventario_control.tiposReporte
															 	,parametro_inventario_control.tiposPaginacion,parametro_inventario_control.tiposAcciones
																,parametro_inventario_control.tiposColumnasSelect,parametro_inventario_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_inventario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_inventario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_inventario_control);			
	}
	
	actualizarPaginaAreaBusquedas(parametro_inventario_control) {
		jQuery("#divBusquedaparametro_inventarioAjaxWebPart").css("display",parametro_inventario_control.strPermisoBusqueda);
		jQuery("#trparametro_inventarioCabeceraBusquedas").css("display",parametro_inventario_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_inventario").css("display",parametro_inventario_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_inventario_control.htmlTablaOrderBy!=null
			&& parametro_inventario_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_inventarioAjaxWebPart").html(parametro_inventario_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_inventario_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_inventario_control.htmlTablaOrderByRel!=null
			&& parametro_inventario_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_inventarioAjaxWebPart").html(parametro_inventario_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_inventario_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_inventarioAjaxWebPart").css("display","none");
			jQuery("#trparametro_inventarioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_inventario").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(parametro_inventario_control) {
		jQuery("#tdparametro_inventarioNuevo").css("display",parametro_inventario_control.strPermisoNuevo);
		jQuery("#trparametro_inventarioElementos").css("display",parametro_inventario_control.strVisibleTablaElementos);
		jQuery("#trparametro_inventarioAcciones").css("display",parametro_inventario_control.strVisibleTablaAcciones);
		jQuery("#trparametro_inventarioParametrosAcciones").css("display",parametro_inventario_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_inventario_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_inventario_control);
				
		if(parametro_inventario_control.parametro_inventarioActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_inventario_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_inventario_control);
	}
	
	actualizarPaginaUsuarioInvitado(parametro_inventario_control) {
	
		var indexPosition=parametro_inventario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_inventario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_inventario_control) {
		jQuery("#divResumenparametro_inventarioActualAjaxWebPart").html(parametro_inventario_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_inventario_control) {
		jQuery("#divAccionesRelacionesparametro_inventarioAjaxWebPart").html(parametro_inventario_control.htmlTablaAccionesRelaciones);
			
		parametro_inventario_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_inventario_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_inventario_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_inventario_control) {
		
		if(parametro_inventario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor").attr("style",parametro_inventario_control.strVisibleFK_Idtermino_pago_proveedor);
			jQuery("#tblstrVisible"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor").attr("style",parametro_inventario_control.strVisibleFK_Idtermino_pago_proveedor);
		}

		if(parametro_inventario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_kardex").attr("style",parametro_inventario_control.strVisibleFK_Idtipo_kardex);
			jQuery("#tblstrVisible"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_kardex").attr("style",parametro_inventario_control.strVisibleFK_Idtipo_kardex);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_inventario();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_inventario",id,"inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);		
	}
	
	

	abrirBusquedaParatipo_kardex(strNombreCampoBusqueda){//idActual
		parametro_inventario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_inventario","tipo_kardex","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
	}

	abrirBusquedaParatermino_pago_proveedor(strNombreCampoBusqueda){//idActual
		parametro_inventario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_inventario","termino_pago_proveedor","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_inventario_control) {
	
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id").val(parametro_inventario_control.parametro_inventarioActual.id);
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-version_row").val(parametro_inventario_control.parametro_inventarioActual.versionRow);
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-numero_kardex").val(parametro_inventario_control.parametro_inventarioActual.numero_kardex);
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-numero_orden_compra").val(parametro_inventario_control.parametro_inventarioActual.numero_orden_compra);
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-numero_cotizacion").val(parametro_inventario_control.parametro_inventarioActual.numero_cotizacion);
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-numero_devolucion").val(parametro_inventario_control.parametro_inventarioActual.numero_devolucion);
		
		if(parametro_inventario_control.parametro_inventarioActual.id_tipo_kardex!=null && parametro_inventario_control.parametro_inventarioActual.id_tipo_kardex>-1){
			if(jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").val() != parametro_inventario_control.parametro_inventarioActual.id_tipo_kardex) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").val(parametro_inventario_control.parametro_inventarioActual.id_tipo_kardex).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").select2("val", null);
			if(jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_inventario_control.parametro_inventarioActual.id_termino_pago_proveedor!=null && parametro_inventario_control.parametro_inventarioActual.id_termino_pago_proveedor>-1){
			if(jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != parametro_inventario_control.parametro_inventarioActual.id_termino_pago_proveedor) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(parametro_inventario_control.parametro_inventarioActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").select2("val", null);
			if(jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_inventario_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_inventario","inventario","","form_parametro_inventario",formulario,"","",paraEventoTabla,idFilaTabla,parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
	}
	
	cargarCombosFK(parametro_inventario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_kardex",parametro_inventario_control.strRecargarFkTipos,",")) { 
				parametro_inventario_webcontrol1.cargarCombostipo_kardexsFK(parametro_inventario_control);
			}

			if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",parametro_inventario_control.strRecargarFkTipos,",")) { 
				parametro_inventario_webcontrol1.cargarCombostermino_pago_proveedorsFK(parametro_inventario_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_inventario_control.strRecargarFkTiposNinguno!=null && parametro_inventario_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_inventario_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_inventario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_kardex",parametro_inventario_control.strRecargarFkTiposNinguno,",")) { 
					parametro_inventario_webcontrol1.cargarCombostipo_kardexsFK(parametro_inventario_control);
				}

				if(parametro_inventario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",parametro_inventario_control.strRecargarFkTiposNinguno,",")) { 
					parametro_inventario_webcontrol1.cargarCombostermino_pago_proveedorsFK(parametro_inventario_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(parametro_inventario_control) {
		jQuery("#spanstrMensajeid").text(parametro_inventario_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_inventario_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenumero_kardex").text(parametro_inventario_control.strMensajenumero_kardex);		
		jQuery("#spanstrMensajenumero_orden_compra").text(parametro_inventario_control.strMensajenumero_orden_compra);		
		jQuery("#spanstrMensajenumero_cotizacion").text(parametro_inventario_control.strMensajenumero_cotizacion);		
		jQuery("#spanstrMensajenumero_devolucion").text(parametro_inventario_control.strMensajenumero_devolucion);		
		jQuery("#spanstrMensajeid_tipo_kardex").text(parametro_inventario_control.strMensajeid_tipo_kardex);		
		jQuery("#spanstrMensajeid_termino_pago_proveedor").text(parametro_inventario_control.strMensajeid_termino_pago_proveedor);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_inventario_control) {
		jQuery("#tdbtnNuevoparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_inventario").css("display",parametro_inventario_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_inventario").css("display",parametro_inventario_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_inventario").css("display",parametro_inventario_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_inventario").css("display",parametro_inventario_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablatipo_kardexFK(parametro_inventario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_inventario_funcion1,parametro_inventario_control.tipo_kardexsFK);
	}

	cargarComboEditarTablatermino_pago_proveedorFK(parametro_inventario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_inventario_funcion1,parametro_inventario_control.termino_pago_proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(parametro_inventario_control) {
		var i=0;
		
		i=parametro_inventario_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_inventario_control.parametro_inventarioActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_inventario_control.parametro_inventarioActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(parametro_inventario_control.parametro_inventarioActual.numero_kardex);
		jQuery("#t-cel_"+i+"_3").val(parametro_inventario_control.parametro_inventarioActual.numero_orden_compra);
		jQuery("#t-cel_"+i+"_4").val(parametro_inventario_control.parametro_inventarioActual.numero_cotizacion);
		jQuery("#t-cel_"+i+"_5").val(parametro_inventario_control.parametro_inventarioActual.numero_devolucion);
		
		if(parametro_inventario_control.parametro_inventarioActual.id_tipo_kardex!=null && parametro_inventario_control.parametro_inventarioActual.id_tipo_kardex>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != parametro_inventario_control.parametro_inventarioActual.id_tipo_kardex) {
				jQuery("#t-cel_"+i+"_6").val(parametro_inventario_control.parametro_inventarioActual.id_tipo_kardex).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_inventario_control.parametro_inventarioActual.id_termino_pago_proveedor!=null && parametro_inventario_control.parametro_inventarioActual.id_termino_pago_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != parametro_inventario_control.parametro_inventarioActual.id_termino_pago_proveedor) {
				jQuery("#t-cel_"+i+"_7").val(parametro_inventario_control.parametro_inventarioActual.id_termino_pago_proveedor).trigger("change");
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
			
		if(parametro_inventario_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_inventario_control) {
		parametro_inventario_funcion1.registrarControlesTableValidacionEdition(parametro_inventario_control,parametro_inventario_webcontrol1,parametro_inventario_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventarioConstante,strParametros);
		
		//parametro_inventario_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombostipo_kardexsFK(parametro_inventario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex",parametro_inventario_control.tipo_kardexsFK);

		if(parametro_inventario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_inventario_control.idFilaTablaActual+"_6",parametro_inventario_control.tipo_kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_kardex-cmbid_tipo_kardex",parametro_inventario_control.tipo_kardexsFK);

	};

	cargarCombostermino_pago_proveedorsFK(parametro_inventario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor",parametro_inventario_control.termino_pago_proveedorsFK);

		if(parametro_inventario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_inventario_control.idFilaTablaActual+"_7",parametro_inventario_control.termino_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor",parametro_inventario_control.termino_pago_proveedorsFK);

	};

	
	
	registrarComboActionChangeCombostipo_kardexsFK(parametro_inventario_control) {

	};

	registrarComboActionChangeCombostermino_pago_proveedorsFK(parametro_inventario_control) {

	};

	
	
	setDefectoValorCombostipo_kardexsFK(parametro_inventario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_inventario_control.idtipo_kardexDefaultFK>-1 && jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").val() != parametro_inventario_control.idtipo_kardexDefaultFK) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").val(parametro_inventario_control.idtipo_kardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_kardex-cmbid_tipo_kardex").val(parametro_inventario_control.idtipo_kardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_kardex-cmbid_tipo_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_kardex-cmbid_tipo_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_proveedorsFK(parametro_inventario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_inventario_control.idtermino_pago_proveedorDefaultFK>-1 && jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != parametro_inventario_control.idtermino_pago_proveedorDefaultFK) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(parametro_inventario_control.idtermino_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(parametro_inventario_control.idtermino_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_inventario_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_inventario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_inventario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_kardex",parametro_inventario_control.strRecargarFkTipos,",")) { 
				parametro_inventario_webcontrol1.setDefectoValorCombostipo_kardexsFK(parametro_inventario_control);
			}

			if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",parametro_inventario_control.strRecargarFkTipos,",")) { 
				parametro_inventario_webcontrol1.setDefectoValorCombostermino_pago_proveedorsFK(parametro_inventario_control);
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
	onLoadCombosEventosFK(parametro_inventario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_inventario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_kardex",parametro_inventario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_inventario_webcontrol1.registrarComboActionChangeCombostipo_kardexsFK(parametro_inventario_control);
			//}

			//if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",parametro_inventario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_inventario_webcontrol1.registrarComboActionChangeCombostermino_pago_proveedorsFK(parametro_inventario_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_inventario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_inventario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_inventario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_inventario");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_inventario");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_inventario_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);			
			
			if(parametro_inventario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,"parametro_inventario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_kardex","id_tipo_kardex","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex_img_busqueda").click(function(){
				parametro_inventario_webcontrol1.abrirBusquedaParatipo_kardex("id_tipo_kardex");
				//alert(jQuery('#form-id_tipo_kardex_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_proveedor","id_termino_pago_proveedor","cuentaspagar","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor_img_busqueda").click(function(){
				parametro_inventario_webcontrol1.abrirBusquedaParatermino_pago_proveedor("id_termino_pago_proveedor");
				//alert(jQuery('#form-id_termino_pago_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_inventario","FK_Idtermino_pago_proveedor","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_inventario","FK_Idtipo_kardex","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			parametro_inventario_funcion1.validarFormularioJQuery(parametro_inventario_constante1);
			
			if(parametro_inventario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_inventario_control) {
		
		jQuery("#divBusquedaparametro_inventarioAjaxWebPart").css("display",parametro_inventario_control.strPermisoBusqueda);
		jQuery("#trparametro_inventarioCabeceraBusquedas").css("display",parametro_inventario_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_inventario").css("display",parametro_inventario_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_inventario").css("display",parametro_inventario_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_inventario").attr("style",parametro_inventario_control.strPermisoMostrarTodos);
		
		if(parametro_inventario_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_inventarioNuevo").css("display",parametro_inventario_control.strPermisoNuevo);
			jQuery("#tdparametro_inventarioNuevoToolBar").css("display",parametro_inventario_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_inventarioDuplicar").css("display",parametro_inventario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_inventarioDuplicarToolBar").css("display",parametro_inventario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_inventarioNuevoGuardarCambios").css("display",parametro_inventario_control.strPermisoNuevo);
			jQuery("#tdparametro_inventarioNuevoGuardarCambiosToolBar").css("display",parametro_inventario_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_inventario_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_inventarioActualizarToolBar").css("display",parametro_inventario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_inventarioCopiar").css("display",parametro_inventario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_inventarioCopiarToolBar").css("display",parametro_inventario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_inventarioConEditar").css("display",parametro_inventario_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_inventarioEliminarToolBar").css("display",parametro_inventario_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdparametro_inventarioGuardarCambios").css("display",parametro_inventario_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_inventarioGuardarCambiosToolBar").css("display",parametro_inventario_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trparametro_inventarioElementos").css("display",parametro_inventario_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_inventarioAcciones").css("display",parametro_inventario_control.strVisibleTablaAcciones);
		jQuery("#trparametro_inventarioParametrosAcciones").css("display",parametro_inventario_control.strVisibleTablaAcciones);
			
		jQuery("#tdparametro_inventarioCerrarPagina").css("display",parametro_inventario_control.strPermisoPopup);		
		jQuery("#tdparametro_inventarioCerrarPaginaToolBar").css("display",parametro_inventario_control.strPermisoPopup);
		//jQuery("#trparametro_inventarioAccionesRelaciones").css("display",parametro_inventario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_inventario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_inventario_webcontrol1.registrarEventosControles();
		
		if(parametro_inventario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_inventario_constante1.STR_ES_RELACIONADO=="false") {
			parametro_inventario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_inventario_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_inventario_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_inventario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_inventario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(parametro_inventario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_inventario_webcontrol1.onLoad();
				
			} else {
				if(parametro_inventario_constante1.BIT_ES_PAGINA_FORM==true) {
					if(parametro_inventario_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
						//parametro_inventario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(parametro_inventario_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_inventario_constante1.BIG_ID_ACTUAL,"parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
						//parametro_inventario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			parametro_inventario_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var parametro_inventario_webcontrol1=new parametro_inventario_webcontrol();

if(parametro_inventario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_inventario_webcontrol1.onLoadWindow; 
}

//</script>