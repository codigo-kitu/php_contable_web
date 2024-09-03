//<script type="text/javascript" language="javascript">



//var perfil_opcionJQueryPaginaWebInteraccion= function (perfil_opcion_control) {
//this.,this.,this.

class perfil_opcion_webcontrol extends perfil_opcion_webcontrol_add {
	
	perfil_opcion_control=null;
	perfil_opcion_controlInicial=null;
	perfil_opcion_controlAuxiliar=null;
		
	//if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_opcion_control) {
		super();
		
		this.perfil_opcion_control=perfil_opcion_control;
	}
		
	actualizarVariablesPagina(perfil_opcion_control) {
		
		if(perfil_opcion_control.action=="index" || perfil_opcion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_opcion_control);
			
		} else if(perfil_opcion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(perfil_opcion_control);
			
		} else if(perfil_opcion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(perfil_opcion_control);
			
		} else if(perfil_opcion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_opcion_control);		
		
		} else if(perfil_opcion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(perfil_opcion_control);		
		
		} else if(perfil_opcion_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_opcion_control);		
		
		} else if(perfil_opcion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_opcion_control);		
		}
		else if(perfil_opcion_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_opcion_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(perfil_opcion_control.action + " Revisar Manejo");
			
			if(perfil_opcion_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(perfil_opcion_control);
				
				return;
			}
			
			//if(perfil_opcion_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(perfil_opcion_control);
			//}
			
			if(perfil_opcion_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(perfil_opcion_control);
			}
			
			if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_opcion_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(perfil_opcion_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(perfil_opcion_control, false);			
			}
			
			if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(perfil_opcion_control);	
			}
			
			if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(perfil_opcion_control);
			}
			
			if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(perfil_opcion_control);
			}
			
			if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(perfil_opcion_control);
			}
			
			if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(perfil_opcion_control);	
			}
			
			if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
			}
			
			if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(perfil_opcion_control);
			}
			
			
			if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(perfil_opcion_control);			
			}
			
			if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(perfil_opcion_control);
			}
			
			
			if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(perfil_opcion_control);
			}
			
			if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(perfil_opcion_control);
			}				
			
			if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_opcion_control);
			}
			
			if(perfil_opcion_control.usuarioActual!=null && perfil_opcion_control.usuarioActual.field_strUserName!=null &&
			perfil_opcion_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(perfil_opcion_control);			
			}
		}
		
		
		if(perfil_opcion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_opcion_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(perfil_opcion_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_opcion_control);
		this.actualizarPaginaTablaDatos(perfil_opcion_control);
		this.actualizarPaginaCargaGeneralControles(perfil_opcion_control);
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_opcion_control);
		this.actualizarPaginaAreaBusquedas(perfil_opcion_control);
		this.actualizarPaginaCargaCombosFK(perfil_opcion_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_opcion_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_opcion_control);
		this.actualizarPaginaTablaDatos(perfil_opcion_control);
		this.actualizarPaginaCargaGeneralControles(perfil_opcion_control);
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_opcion_control);
		this.actualizarPaginaAreaBusquedas(perfil_opcion_control);
		this.actualizarPaginaCargaCombosFK(perfil_opcion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(perfil_opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(perfil_opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(perfil_opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_opcion_control) {
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(perfil_opcion_control) {
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_opcion_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_opcion_control);
		this.actualizarPaginaCargaCombosFK(perfil_opcion_control);
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_opcion_control) {
		this.actualizarPaginaAbrirLink(perfil_opcion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);				
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);
		this.actualizarPaginaFormulario(perfil_opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);
		this.actualizarPaginaFormulario(perfil_opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(perfil_opcion_control) {
		this.actualizarPaginaFormulario(perfil_opcion_control);
		this.onLoadCombosDefectoFK(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);
		this.actualizarPaginaFormulario(perfil_opcion_control);
		this.onLoadCombosDefectoFK(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_opcion_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_opcion_control);
		this.actualizarPaginaCargaCombosFK(perfil_opcion_control);
		this.actualizarPaginaFormulario(perfil_opcion_control);
		this.onLoadCombosDefectoFK(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_opcion_control) {
		this.actualizarPaginaAbrirLink(perfil_opcion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_opcion_control) {
		this.actualizarPaginaImprimir(perfil_opcion_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_opcion_control) {
		this.actualizarPaginaImprimir(perfil_opcion_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_opcion_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_opcion_control) {
		//FORMULARIO
		if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_opcion_control);
			this.actualizarPaginaFormularioAdd(perfil_opcion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		//COMBOS FK
		if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_opcion_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(perfil_opcion_control) {
		//FORMULARIO
		if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_opcion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);	
		//COMBOS FK
		if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_opcion_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_opcion_control) {
		//FORMULARIO
		if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_opcion_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_opcion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);	
		//COMBOS FK
		if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_opcion_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control) {
		if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_opcion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_opcion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_opcion_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_opcion_control) {
		if(perfil_opcion_funcion1.esPaginaForm()==true) {
			window.opener.perfil_opcion_webcontrol1.actualizarPaginaTablaDatos(perfil_opcion_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_opcion_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_opcion_control) {
		perfil_opcion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_opcion_control.strAuxiliarUrlPagina);
				
		perfil_opcion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_opcion_control.strAuxiliarTipo,perfil_opcion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_opcion_control) {
		perfil_opcion_funcion1.resaltarRestaurarDivMensaje(true,perfil_opcion_control.strAuxiliarMensajeAlert,perfil_opcion_control.strAuxiliarCssMensaje);
			
		if(perfil_opcion_funcion1.esPaginaForm()==true) {
			window.opener.perfil_opcion_funcion1.resaltarRestaurarDivMensaje(true,perfil_opcion_control.strAuxiliarMensajeAlert,perfil_opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(perfil_opcion_control) {
		eval(perfil_opcion_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(perfil_opcion_control, mostrar) {
		
		if(mostrar==true) {
			perfil_opcion_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_opcion_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			perfil_opcion_funcion1.mostrarDivMensaje(true,perfil_opcion_control.strAuxiliarMensaje,perfil_opcion_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_opcion_funcion1.mostrarDivMensaje(false,perfil_opcion_control.strAuxiliarMensaje,perfil_opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(perfil_opcion_control) {
	
		funcionGeneral.printWebPartPage("perfil_opcion",perfil_opcion_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarperfil_opcionsAjaxWebPart").html(perfil_opcion_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("perfil_opcion",jQuery("#divTablaDatosReporteAuxiliarperfil_opcionsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(perfil_opcion_control) {
		this.perfil_opcion_controlInicial=perfil_opcion_control;
			
		if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_opcion_control.strStyleDivArbol,perfil_opcion_control.strStyleDivContent
																,perfil_opcion_control.strStyleDivOpcionesBanner,perfil_opcion_control.strStyleDivExpandirColapsar
																,perfil_opcion_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=perfil_opcion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",perfil_opcion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(perfil_opcion_control) {
		jQuery("#divTablaDatosperfil_opcionsAjaxWebPart").html(perfil_opcion_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosperfil_opcions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosperfil_opcions=jQuery("#tblTablaDatosperfil_opcions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("perfil_opcion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',perfil_opcion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			perfil_opcion_webcontrol1.registrarControlesTableEdition(perfil_opcion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		perfil_opcion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(perfil_opcion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(perfil_opcion_control.perfil_opcionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(perfil_opcion_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(perfil_opcion_control) {
		this.actualizarCssBotonesPagina(perfil_opcion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_opcion_control.tiposReportes,perfil_opcion_control.tiposReporte
															 	,perfil_opcion_control.tiposPaginacion,perfil_opcion_control.tiposAcciones
																,perfil_opcion_control.tiposColumnasSelect,perfil_opcion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_opcion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_opcion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_opcion_control);			
	}
	
	actualizarPaginaAreaBusquedas(perfil_opcion_control) {
		jQuery("#divBusquedaperfil_opcionAjaxWebPart").css("display",perfil_opcion_control.strPermisoBusqueda);
		jQuery("#trperfil_opcionCabeceraBusquedas").css("display",perfil_opcion_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_opcion").css("display",perfil_opcion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(perfil_opcion_control.htmlTablaOrderBy!=null
			&& perfil_opcion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByperfil_opcionAjaxWebPart").html(perfil_opcion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//perfil_opcion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(perfil_opcion_control.htmlTablaOrderByRel!=null
			&& perfil_opcion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelperfil_opcionAjaxWebPart").html(perfil_opcion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(perfil_opcion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaperfil_opcionAjaxWebPart").css("display","none");
			jQuery("#trperfil_opcionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaperfil_opcion").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(perfil_opcion_control) {
		jQuery("#tdperfil_opcionNuevo").css("display",perfil_opcion_control.strPermisoNuevo);
		jQuery("#trperfil_opcionElementos").css("display",perfil_opcion_control.strVisibleTablaElementos);
		jQuery("#trperfil_opcionAcciones").css("display",perfil_opcion_control.strVisibleTablaAcciones);
		jQuery("#trperfil_opcionParametrosAcciones").css("display",perfil_opcion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(perfil_opcion_control) {
	
		this.actualizarCssBotonesMantenimiento(perfil_opcion_control);
				
		if(perfil_opcion_control.perfil_opcionActual!=null) {//form
			
			this.actualizarCamposFormulario(perfil_opcion_control);			
		}
						
		this.actualizarSpanMensajesCampos(perfil_opcion_control);
	}
	
	actualizarPaginaUsuarioInvitado(perfil_opcion_control) {
	
		var indexPosition=perfil_opcion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_opcion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(perfil_opcion_control) {
		jQuery("#divResumenperfil_opcionActualAjaxWebPart").html(perfil_opcion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_opcion_control) {
		jQuery("#divAccionesRelacionesperfil_opcionAjaxWebPart").html(perfil_opcion_control.htmlTablaAccionesRelaciones);
			
		perfil_opcion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(perfil_opcion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(perfil_opcion_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(perfil_opcion_control) {
		
		if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion").attr("style",perfil_opcion_control.strVisibleBusquedaPorIdPerfilPorIdOpcion);
			jQuery("#tblstrVisible"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion").attr("style",perfil_opcion_control.strVisibleBusquedaPorIdPerfilPorIdOpcion);
		}

		if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",perfil_opcion_control.strVisibleFK_Idopcion);
			jQuery("#tblstrVisible"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",perfil_opcion_control.strVisibleFK_Idopcion);
		}

		if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_opcion_control.strVisibleFK_Idperfil);
			jQuery("#tblstrVisible"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_opcion_control.strVisibleFK_Idperfil);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionperfil_opcion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("perfil_opcion",id,"seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);		
	}
	
	

	abrirBusquedaParaperfil(strNombreCampoBusqueda){//idActual
		perfil_opcion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_opcion","perfil","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
	}

	abrirBusquedaParaopcion(strNombreCampoBusqueda){//idActual
		perfil_opcion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_opcion","opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
	}
	
	

	setCombosCodigoDesdeBusquedaid_opcion(id_opcion) {
		if(jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val() != id_opcion) {
			jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val(id_opcion).trigger("change");

		}
		if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val() != id_opcion) {
			jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val(id_opcion).trigger("change");
		}
		if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != id_opcion) {
			jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(id_opcion).trigger("change");
		}

	}
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(perfil_opcion_control) {
	
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id").val(perfil_opcion_control.perfil_opcionActual.id);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-version_row").val(perfil_opcion_control.perfil_opcionActual.versionRow);
		
		if(perfil_opcion_control.perfil_opcionActual.id_perfil!=null && perfil_opcion_control.perfil_opcionActual.id_perfil>-1){
			if(jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_opcion_control.perfil_opcionActual.id_perfil) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val(perfil_opcion_control.perfil_opcionActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").select2("val", null);
			if(jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_opcion_control.perfil_opcionActual.id_opcion!=null && perfil_opcion_control.perfil_opcionActual.id_opcion>-1){
			if(jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val() != perfil_opcion_control.perfil_opcionActual.id_opcion) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val(perfil_opcion_control.perfil_opcionActual.id_opcion).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").select2("val", null);
			if(jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-todo").prop('checked',perfil_opcion_control.perfil_opcionActual.todo);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-ingreso").prop('checked',perfil_opcion_control.perfil_opcionActual.ingreso);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-modificacion").prop('checked',perfil_opcion_control.perfil_opcionActual.modificacion);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-eliminacion").prop('checked',perfil_opcion_control.perfil_opcionActual.eliminacion);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-consulta").prop('checked',perfil_opcion_control.perfil_opcionActual.consulta);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-busqueda").prop('checked',perfil_opcion_control.perfil_opcionActual.busqueda);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-reporte").prop('checked',perfil_opcion_control.perfil_opcionActual.reporte);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-estado").prop('checked',perfil_opcion_control.perfil_opcionActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+perfil_opcion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("perfil_opcion","seguridad","","form_perfil_opcion",formulario,"","",paraEventoTabla,idFilaTabla,perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
	}
	
	cargarCombosFK(perfil_opcion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_opcion_control.strRecargarFkTipos,",")) { 
				perfil_opcion_webcontrol1.cargarCombosperfilsFK(perfil_opcion_control);
			}

			if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",perfil_opcion_control.strRecargarFkTipos,",")) { 
				perfil_opcion_webcontrol1.cargarCombosopcionsFK(perfil_opcion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_opcion_control.strRecargarFkTiposNinguno!=null && perfil_opcion_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_opcion_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_perfil",perfil_opcion_control.strRecargarFkTiposNinguno,",")) { 
					perfil_opcion_webcontrol1.cargarCombosperfilsFK(perfil_opcion_control);
				}

				if(perfil_opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_opcion",perfil_opcion_control.strRecargarFkTiposNinguno,",")) { 
					perfil_opcion_webcontrol1.cargarCombosopcionsFK(perfil_opcion_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(perfil_opcion_control) {
		jQuery("#spanstrMensajeid").text(perfil_opcion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(perfil_opcion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_perfil").text(perfil_opcion_control.strMensajeid_perfil);		
		jQuery("#spanstrMensajeid_opcion").text(perfil_opcion_control.strMensajeid_opcion);		
		jQuery("#spanstrMensajetodo").text(perfil_opcion_control.strMensajetodo);		
		jQuery("#spanstrMensajeingreso").text(perfil_opcion_control.strMensajeingreso);		
		jQuery("#spanstrMensajemodificacion").text(perfil_opcion_control.strMensajemodificacion);		
		jQuery("#spanstrMensajeeliminacion").text(perfil_opcion_control.strMensajeeliminacion);		
		jQuery("#spanstrMensajeconsulta").text(perfil_opcion_control.strMensajeconsulta);		
		jQuery("#spanstrMensajebusqueda").text(perfil_opcion_control.strMensajebusqueda);		
		jQuery("#spanstrMensajereporte").text(perfil_opcion_control.strMensajereporte);		
		jQuery("#spanstrMensajeestado").text(perfil_opcion_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(perfil_opcion_control) {
		jQuery("#tdbtnNuevoperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoperfil_opcion").css("display",perfil_opcion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarperfil_opcion").css("display",perfil_opcion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarperfil_opcion").css("display",perfil_opcion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosperfil_opcion").css("display",perfil_opcion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaperfilFK(perfil_opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_opcion_funcion1,perfil_opcion_control.perfilsFK);
	}

	cargarComboEditarTablaopcionFK(perfil_opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_opcion_funcion1,perfil_opcion_control.opcionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(perfil_opcion_control) {
		var i=0;
		
		i=perfil_opcion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(perfil_opcion_control.perfil_opcionActual.id);
		jQuery("#t-version_row_"+i+"").val(perfil_opcion_control.perfil_opcionActual.versionRow);
		
		if(perfil_opcion_control.perfil_opcionActual.id_perfil!=null && perfil_opcion_control.perfil_opcionActual.id_perfil>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != perfil_opcion_control.perfil_opcionActual.id_perfil) {
				jQuery("#t-cel_"+i+"_2").val(perfil_opcion_control.perfil_opcionActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_opcion_control.perfil_opcionActual.id_opcion!=null && perfil_opcion_control.perfil_opcionActual.id_opcion>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != perfil_opcion_control.perfil_opcionActual.id_opcion) {
				jQuery("#t-cel_"+i+"_3").val(perfil_opcion_control.perfil_opcionActual.id_opcion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").prop('checked',perfil_opcion_control.perfil_opcionActual.todo);
		jQuery("#t-cel_"+i+"_5").prop('checked',perfil_opcion_control.perfil_opcionActual.ingreso);
		jQuery("#t-cel_"+i+"_6").prop('checked',perfil_opcion_control.perfil_opcionActual.modificacion);
		jQuery("#t-cel_"+i+"_7").prop('checked',perfil_opcion_control.perfil_opcionActual.eliminacion);
		jQuery("#t-cel_"+i+"_8").prop('checked',perfil_opcion_control.perfil_opcionActual.consulta);
		jQuery("#t-cel_"+i+"_9").prop('checked',perfil_opcion_control.perfil_opcionActual.busqueda);
		jQuery("#t-cel_"+i+"_10").prop('checked',perfil_opcion_control.perfil_opcionActual.reporte);
		jQuery("#t-cel_"+i+"_11").prop('checked',perfil_opcion_control.perfil_opcionActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(perfil_opcion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(perfil_opcion_control) {
		perfil_opcion_funcion1.registrarControlesTableValidacionEdition(perfil_opcion_control,perfil_opcion_webcontrol1,perfil_opcion_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcionConstante,strParametros);
		
		//perfil_opcion_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosperfilsFK(perfil_opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil",perfil_opcion_control.perfilsFK);

		if(perfil_opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_opcion_control.idFilaTablaActual+"_2",perfil_opcion_control.perfilsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_perfil",perfil_opcion_control.perfilsFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil",perfil_opcion_control.perfilsFK);

	};

	cargarCombosopcionsFK(perfil_opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion",perfil_opcion_control.opcionsFK);

		if(perfil_opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_opcion_control.idFilaTablaActual+"_3",perfil_opcion_control.opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion",perfil_opcion_control.opcionsFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion",perfil_opcion_control.opcionsFK);

	};

	
	
	registrarComboActionChangeCombosperfilsFK(perfil_opcion_control) {

	};

	registrarComboActionChangeCombosopcionsFK(perfil_opcion_control) {

	};

	
	
	setDefectoValorCombosperfilsFK(perfil_opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_opcion_control.idperfilDefaultFK>-1 && jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_opcion_control.idperfilDefaultFK) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val(perfil_opcion_control.idperfilDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_perfil").val(perfil_opcion_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(perfil_opcion_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosopcionsFK(perfil_opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_opcion_control.idopcionDefaultFK>-1 && jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val() != perfil_opcion_control.idopcionDefaultFK) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val(perfil_opcion_control.idopcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val(perfil_opcion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(perfil_opcion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_opcion_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_opcion_control.strRecargarFkTipos,",")) { 
				perfil_opcion_webcontrol1.setDefectoValorCombosperfilsFK(perfil_opcion_control);
			}

			if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",perfil_opcion_control.strRecargarFkTipos,",")) { 
				perfil_opcion_webcontrol1.setDefectoValorCombosopcionsFK(perfil_opcion_control);
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
	onLoadCombosEventosFK(perfil_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_opcion_webcontrol1.registrarComboActionChangeCombosperfilsFK(perfil_opcion_control);
			//}

			//if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",perfil_opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_opcion_webcontrol1.registrarComboActionChangeCombosopcionsFK(perfil_opcion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil_opcion");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil_opcion");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(perfil_opcion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);			
			
			if(perfil_opcion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,"perfil_opcion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("perfil","id_perfil","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil_img_busqueda").click(function(){
				perfil_opcion_webcontrol1.abrirBusquedaParaperfil("id_perfil");
				//alert(jQuery('#form-id_perfil_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("opcion","id_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion_img_busqueda").click(function(){
				perfil_opcion_webcontrol1.abrirBusquedaParaopcion("id_opcion");
				//alert(jQuery('#form-id_opcion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_opcion","BusquedaPorIdPerfilPorIdOpcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_opcion","FK_Idopcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_opcion","FK_Idperfil","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			perfil_opcion_funcion1.validarFormularioJQuery(perfil_opcion_constante1);
			
			if(perfil_opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_opcion_control) {
		
		jQuery("#divBusquedaperfil_opcionAjaxWebPart").css("display",perfil_opcion_control.strPermisoBusqueda);
		jQuery("#trperfil_opcionCabeceraBusquedas").css("display",perfil_opcion_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_opcion").css("display",perfil_opcion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteperfil_opcion").css("display",perfil_opcion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosperfil_opcion").attr("style",perfil_opcion_control.strPermisoMostrarTodos);
		
		if(perfil_opcion_control.strPermisoNuevo!=null) {
			jQuery("#tdperfil_opcionNuevo").css("display",perfil_opcion_control.strPermisoNuevo);
			jQuery("#tdperfil_opcionNuevoToolBar").css("display",perfil_opcion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdperfil_opcionDuplicar").css("display",perfil_opcion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_opcionDuplicarToolBar").css("display",perfil_opcion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_opcionNuevoGuardarCambios").css("display",perfil_opcion_control.strPermisoNuevo);
			jQuery("#tdperfil_opcionNuevoGuardarCambiosToolBar").css("display",perfil_opcion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(perfil_opcion_control.strPermisoActualizar!=null) {
			jQuery("#tdperfil_opcionActualizarToolBar").css("display",perfil_opcion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_opcionCopiar").css("display",perfil_opcion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_opcionCopiarToolBar").css("display",perfil_opcion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_opcionConEditar").css("display",perfil_opcion_control.strPermisoActualizar);
		}
		
		jQuery("#tdperfil_opcionEliminarToolBar").css("display",perfil_opcion_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdperfil_opcionGuardarCambios").css("display",perfil_opcion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdperfil_opcionGuardarCambiosToolBar").css("display",perfil_opcion_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trperfil_opcionElementos").css("display",perfil_opcion_control.strVisibleTablaElementos);
		
		jQuery("#trperfil_opcionAcciones").css("display",perfil_opcion_control.strVisibleTablaAcciones);
		jQuery("#trperfil_opcionParametrosAcciones").css("display",perfil_opcion_control.strVisibleTablaAcciones);
			
		jQuery("#tdperfil_opcionCerrarPagina").css("display",perfil_opcion_control.strPermisoPopup);		
		jQuery("#tdperfil_opcionCerrarPaginaToolBar").css("display",perfil_opcion_control.strPermisoPopup);
		//jQuery("#trperfil_opcionAccionesRelaciones").css("display",perfil_opcion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_opcion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_opcion_webcontrol1.registrarEventosControles();
		
		if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
			perfil_opcion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_opcion_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_opcion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_opcion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(perfil_opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				perfil_opcion_webcontrol1.onLoad();
				
			} else {
				if(perfil_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
					if(perfil_opcion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
						//perfil_opcion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(perfil_opcion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(perfil_opcion_constante1.BIG_ID_ACTUAL,"perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
						//perfil_opcion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			perfil_opcion_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var perfil_opcion_webcontrol1=new perfil_opcion_webcontrol();

if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_opcion_webcontrol1.onLoadWindow; 
}

//</script>