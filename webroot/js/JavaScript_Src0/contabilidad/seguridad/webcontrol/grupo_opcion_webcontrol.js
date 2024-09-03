//<script type="text/javascript" language="javascript">



//var grupo_opcionJQueryPaginaWebInteraccion= function (grupo_opcion_control) {
//this.,this.,this.

class grupo_opcion_webcontrol extends grupo_opcion_webcontrol_add {
	
	grupo_opcion_control=null;
	grupo_opcion_controlInicial=null;
	grupo_opcion_controlAuxiliar=null;
		
	//if(grupo_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(grupo_opcion_control) {
		super();
		
		this.grupo_opcion_control=grupo_opcion_control;
	}
		
	actualizarVariablesPagina(grupo_opcion_control) {
		
		if(grupo_opcion_control.action=="index" || grupo_opcion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(grupo_opcion_control);
			
		} else if(grupo_opcion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(grupo_opcion_control);
			
		} else if(grupo_opcion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(grupo_opcion_control);
			
		} else if(grupo_opcion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(grupo_opcion_control);		
		
		} else if(grupo_opcion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(grupo_opcion_control);		
		
		} else if(grupo_opcion_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(grupo_opcion_control);		
		
		} else if(grupo_opcion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(grupo_opcion_control);		
		}
		else if(grupo_opcion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(grupo_opcion_control);		
		}
		else if(grupo_opcion_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(grupo_opcion_control);		
		}
		else if(grupo_opcion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(grupo_opcion_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(grupo_opcion_control.action + " Revisar Manejo");
			
			if(grupo_opcion_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(grupo_opcion_control);
				
				return;
			}
			
			//if(grupo_opcion_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(grupo_opcion_control);
			//}
			
			if(grupo_opcion_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(grupo_opcion_control);
			}
			
			if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && grupo_opcion_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(grupo_opcion_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(grupo_opcion_control, false);			
			}
			
			if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(grupo_opcion_control);	
			}
			
			if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(grupo_opcion_control);
			}
			
			if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(grupo_opcion_control);
			}
			
			if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(grupo_opcion_control);
			}
			
			if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(grupo_opcion_control);	
			}
			
			if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
			}
			
			if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(grupo_opcion_control);
			}
			
			
			if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(grupo_opcion_control);			
			}
			
			if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(grupo_opcion_control);
			}
			
			
			if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(grupo_opcion_control);
			}
			
			if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(grupo_opcion_control);
			}				
			
			if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(grupo_opcion_control);
			}
			
			if(grupo_opcion_control.usuarioActual!=null && grupo_opcion_control.usuarioActual.field_strUserName!=null &&
			grupo_opcion_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(grupo_opcion_control);			
			}
		}
		
		
		if(grupo_opcion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(grupo_opcion_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(grupo_opcion_control) {
		
		this.actualizarPaginaCargaGeneral(grupo_opcion_control);
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		this.actualizarPaginaCargaGeneralControles(grupo_opcion_control);
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(grupo_opcion_control);
		this.actualizarPaginaAreaBusquedas(grupo_opcion_control);
		this.actualizarPaginaCargaCombosFK(grupo_opcion_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(grupo_opcion_control) {
		
		this.actualizarPaginaCargaGeneral(grupo_opcion_control);
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		this.actualizarPaginaCargaGeneralControles(grupo_opcion_control);
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(grupo_opcion_control);
		this.actualizarPaginaAreaBusquedas(grupo_opcion_control);
		this.actualizarPaginaCargaCombosFK(grupo_opcion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(grupo_opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(grupo_opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(grupo_opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(grupo_opcion_control) {
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(grupo_opcion_control) {
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(grupo_opcion_control) {
		this.actualizarPaginaCargaGeneralControles(grupo_opcion_control);
		this.actualizarPaginaCargaCombosFK(grupo_opcion_control);
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(grupo_opcion_control) {
		this.actualizarPaginaAbrirLink(grupo_opcion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);				
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		this.actualizarPaginaFormulario(grupo_opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		this.actualizarPaginaFormulario(grupo_opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(grupo_opcion_control) {
		this.actualizarPaginaFormulario(grupo_opcion_control);
		this.onLoadCombosDefectoFK(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		this.actualizarPaginaFormulario(grupo_opcion_control);
		this.onLoadCombosDefectoFK(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(grupo_opcion_control) {
		this.actualizarPaginaCargaGeneralControles(grupo_opcion_control);
		this.actualizarPaginaCargaCombosFK(grupo_opcion_control);
		this.actualizarPaginaFormulario(grupo_opcion_control);
		this.onLoadCombosDefectoFK(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(grupo_opcion_control) {
		this.actualizarPaginaAbrirLink(grupo_opcion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(grupo_opcion_control) {
		this.actualizarPaginaImprimir(grupo_opcion_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(grupo_opcion_control) {
		this.actualizarPaginaImprimir(grupo_opcion_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(grupo_opcion_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(grupo_opcion_control) {
		//FORMULARIO
		if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(grupo_opcion_control);
			this.actualizarPaginaFormularioAdd(grupo_opcion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		//COMBOS FK
		if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(grupo_opcion_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(grupo_opcion_control) {
		//FORMULARIO
		if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(grupo_opcion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);	
		//COMBOS FK
		if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(grupo_opcion_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		this.actualizarPaginaFormulario(grupo_opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(grupo_opcion_control) {
		//FORMULARIO
		if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(grupo_opcion_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(grupo_opcion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);	
		//COMBOS FK
		if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(grupo_opcion_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(grupo_opcion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(grupo_opcion_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control) {
		if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && grupo_opcion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(grupo_opcion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(grupo_opcion_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(grupo_opcion_control) {
		if(grupo_opcion_funcion1.esPaginaForm()==true) {
			window.opener.grupo_opcion_webcontrol1.actualizarPaginaTablaDatos(grupo_opcion_control);
		} else {
			this.actualizarPaginaTablaDatos(grupo_opcion_control);
		}
	}
	
	actualizarPaginaAbrirLink(grupo_opcion_control) {
		grupo_opcion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(grupo_opcion_control.strAuxiliarUrlPagina);
				
		grupo_opcion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(grupo_opcion_control.strAuxiliarTipo,grupo_opcion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(grupo_opcion_control) {
		grupo_opcion_funcion1.resaltarRestaurarDivMensaje(true,grupo_opcion_control.strAuxiliarMensajeAlert,grupo_opcion_control.strAuxiliarCssMensaje);
			
		if(grupo_opcion_funcion1.esPaginaForm()==true) {
			window.opener.grupo_opcion_funcion1.resaltarRestaurarDivMensaje(true,grupo_opcion_control.strAuxiliarMensajeAlert,grupo_opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(grupo_opcion_control) {
		eval(grupo_opcion_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(grupo_opcion_control, mostrar) {
		
		if(mostrar==true) {
			grupo_opcion_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				grupo_opcion_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			grupo_opcion_funcion1.mostrarDivMensaje(true,grupo_opcion_control.strAuxiliarMensaje,grupo_opcion_control.strAuxiliarCssMensaje);
		
		} else {
			grupo_opcion_funcion1.mostrarDivMensaje(false,grupo_opcion_control.strAuxiliarMensaje,grupo_opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(grupo_opcion_control) {
	
		funcionGeneral.printWebPartPage("grupo_opcion",grupo_opcion_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliargrupo_opcionsAjaxWebPart").html(grupo_opcion_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("grupo_opcion",jQuery("#divTablaDatosReporteAuxiliargrupo_opcionsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(grupo_opcion_control) {
		this.grupo_opcion_controlInicial=grupo_opcion_control;
			
		if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(grupo_opcion_control.strStyleDivArbol,grupo_opcion_control.strStyleDivContent
																,grupo_opcion_control.strStyleDivOpcionesBanner,grupo_opcion_control.strStyleDivExpandirColapsar
																,grupo_opcion_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=grupo_opcion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",grupo_opcion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(grupo_opcion_control) {
		jQuery("#divTablaDatosgrupo_opcionsAjaxWebPart").html(grupo_opcion_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosgrupo_opcions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosgrupo_opcions=jQuery("#tblTablaDatosgrupo_opcions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("grupo_opcion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',grupo_opcion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			grupo_opcion_webcontrol1.registrarControlesTableEdition(grupo_opcion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		grupo_opcion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(grupo_opcion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(grupo_opcion_control.grupo_opcionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(grupo_opcion_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(grupo_opcion_control) {
		this.actualizarCssBotonesPagina(grupo_opcion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(grupo_opcion_control.tiposReportes,grupo_opcion_control.tiposReporte
															 	,grupo_opcion_control.tiposPaginacion,grupo_opcion_control.tiposAcciones
																,grupo_opcion_control.tiposColumnasSelect,grupo_opcion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(grupo_opcion_control.tiposRelaciones,grupo_opcion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(grupo_opcion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(grupo_opcion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(grupo_opcion_control);			
	}
	
	actualizarPaginaAreaBusquedas(grupo_opcion_control) {
		jQuery("#divBusquedagrupo_opcionAjaxWebPart").css("display",grupo_opcion_control.strPermisoBusqueda);
		jQuery("#trgrupo_opcionCabeceraBusquedas").css("display",grupo_opcion_control.strPermisoBusqueda);
		jQuery("#trBusquedagrupo_opcion").css("display",grupo_opcion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(grupo_opcion_control.htmlTablaOrderBy!=null
			&& grupo_opcion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBygrupo_opcionAjaxWebPart").html(grupo_opcion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//grupo_opcion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(grupo_opcion_control.htmlTablaOrderByRel!=null
			&& grupo_opcion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelgrupo_opcionAjaxWebPart").html(grupo_opcion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(grupo_opcion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedagrupo_opcionAjaxWebPart").css("display","none");
			jQuery("#trgrupo_opcionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedagrupo_opcion").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(grupo_opcion_control) {
		jQuery("#tdgrupo_opcionNuevo").css("display",grupo_opcion_control.strPermisoNuevo);
		jQuery("#trgrupo_opcionElementos").css("display",grupo_opcion_control.strVisibleTablaElementos);
		jQuery("#trgrupo_opcionAcciones").css("display",grupo_opcion_control.strVisibleTablaAcciones);
		jQuery("#trgrupo_opcionParametrosAcciones").css("display",grupo_opcion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(grupo_opcion_control) {
	
		this.actualizarCssBotonesMantenimiento(grupo_opcion_control);
				
		if(grupo_opcion_control.grupo_opcionActual!=null) {//form
			
			this.actualizarCamposFormulario(grupo_opcion_control);			
		}
						
		this.actualizarSpanMensajesCampos(grupo_opcion_control);
	}
	
	actualizarPaginaUsuarioInvitado(grupo_opcion_control) {
	
		var indexPosition=grupo_opcion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=grupo_opcion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(grupo_opcion_control) {
		jQuery("#divResumengrupo_opcionActualAjaxWebPart").html(grupo_opcion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(grupo_opcion_control) {
		jQuery("#divAccionesRelacionesgrupo_opcionAjaxWebPart").html(grupo_opcion_control.htmlTablaAccionesRelaciones);
			
		grupo_opcion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(grupo_opcion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(grupo_opcion_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(grupo_opcion_control) {
		
		if(grupo_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+grupo_opcion_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",grupo_opcion_control.strVisibleFK_Idmodulo);
			jQuery("#tblstrVisible"+grupo_opcion_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",grupo_opcion_control.strVisibleFK_Idmodulo);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciongrupo_opcion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("grupo_opcion",id,"seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);		
	}
	
	

	abrirBusquedaParamodulo(strNombreCampoBusqueda){//idActual
		grupo_opcion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("grupo_opcion","modulo","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(grupo_opcion_control) {
	
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id").val(grupo_opcion_control.grupo_opcionActual.id);
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-version_row").val(grupo_opcion_control.grupo_opcionActual.versionRow);
		
		if(grupo_opcion_control.grupo_opcionActual.id_modulo!=null && grupo_opcion_control.grupo_opcionActual.id_modulo>-1){
			if(jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val() != grupo_opcion_control.grupo_opcionActual.id_modulo) {
				jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val(grupo_opcion_control.grupo_opcionActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").select2("val", null);
			if(jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-codigo").val(grupo_opcion_control.grupo_opcionActual.codigo);
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-nombre_principal").val(grupo_opcion_control.grupo_opcionActual.nombre_principal);
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-orden").val(grupo_opcion_control.grupo_opcionActual.orden);
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-estado").prop('checked',grupo_opcion_control.grupo_opcionActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+grupo_opcion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("grupo_opcion","seguridad","","form_grupo_opcion",formulario,"","",paraEventoTabla,idFilaTabla,grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
	}
	
	cargarCombosFK(grupo_opcion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(grupo_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",grupo_opcion_control.strRecargarFkTipos,",")) { 
				grupo_opcion_webcontrol1.cargarCombosmodulosFK(grupo_opcion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(grupo_opcion_control.strRecargarFkTiposNinguno!=null && grupo_opcion_control.strRecargarFkTiposNinguno!='NINGUNO' && grupo_opcion_control.strRecargarFkTiposNinguno!='') {
			
				if(grupo_opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",grupo_opcion_control.strRecargarFkTiposNinguno,",")) { 
					grupo_opcion_webcontrol1.cargarCombosmodulosFK(grupo_opcion_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(grupo_opcion_control) {
		jQuery("#spanstrMensajeid").text(grupo_opcion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(grupo_opcion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_modulo").text(grupo_opcion_control.strMensajeid_modulo);		
		jQuery("#spanstrMensajecodigo").text(grupo_opcion_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre_principal").text(grupo_opcion_control.strMensajenombre_principal);		
		jQuery("#spanstrMensajeorden").text(grupo_opcion_control.strMensajeorden);		
		jQuery("#spanstrMensajeestado").text(grupo_opcion_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(grupo_opcion_control) {
		jQuery("#tdbtnNuevogrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevogrupo_opcion").css("display",grupo_opcion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizargrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizargrupo_opcion").css("display",grupo_opcion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminargrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminargrupo_opcion").css("display",grupo_opcion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelargrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosgrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosgrupo_opcion").css("display",grupo_opcion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBargrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBargrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBargrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionopcion").click(function(){

			var idActual=jQuery(this).attr("idactualgrupo_opcion");

			grupo_opcion_webcontrol1.registrarSesionParaopciones(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablamoduloFK(grupo_opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,grupo_opcion_funcion1,grupo_opcion_control.modulosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(grupo_opcion_control) {
		var i=0;
		
		i=grupo_opcion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(grupo_opcion_control.grupo_opcionActual.id);
		jQuery("#t-version_row_"+i+"").val(grupo_opcion_control.grupo_opcionActual.versionRow);
		
		if(grupo_opcion_control.grupo_opcionActual.id_modulo!=null && grupo_opcion_control.grupo_opcionActual.id_modulo>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != grupo_opcion_control.grupo_opcionActual.id_modulo) {
				jQuery("#t-cel_"+i+"_2").val(grupo_opcion_control.grupo_opcionActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(grupo_opcion_control.grupo_opcionActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(grupo_opcion_control.grupo_opcionActual.nombre_principal);
		jQuery("#t-cel_"+i+"_5").val(grupo_opcion_control.grupo_opcionActual.orden);
		jQuery("#t-cel_"+i+"_6").prop('checked',grupo_opcion_control.grupo_opcionActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(grupo_opcion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionopcion").click(function(){
		jQuery("#tblTablaDatosgrupo_opcions").on("click",".imgrelacionopcion", function () {

			var idActual=jQuery(this).attr("idactualgrupo_opcion");

			grupo_opcion_webcontrol1.registrarSesionParaopciones(idActual);
		});				
	}
		
	

	registrarSesionParaopciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"grupo_opcion","opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(grupo_opcion_control) {
		grupo_opcion_funcion1.registrarControlesTableValidacionEdition(grupo_opcion_control,grupo_opcion_webcontrol1,grupo_opcion_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcionConstante,strParametros);
		
		//grupo_opcion_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosmodulosFK(grupo_opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo",grupo_opcion_control.modulosFK);

		if(grupo_opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+grupo_opcion_control.idFilaTablaActual+"_2",grupo_opcion_control.modulosFK);
		}
	};

	
	
	registrarComboActionChangeCombosmodulosFK(grupo_opcion_control) {

	};

	
	
	setDefectoValorCombosmodulosFK(grupo_opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(grupo_opcion_control.idmoduloDefaultFK>-1 && jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val() != grupo_opcion_control.idmoduloDefaultFK) {
				jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val(grupo_opcion_control.idmoduloDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//grupo_opcion_control
		
	
	}
	
	onLoadCombosDefectoFK(grupo_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(grupo_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(grupo_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",grupo_opcion_control.strRecargarFkTipos,",")) { 
				grupo_opcion_webcontrol1.setDefectoValorCombosmodulosFK(grupo_opcion_control);
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
	onLoadCombosEventosFK(grupo_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(grupo_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(grupo_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",grupo_opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				grupo_opcion_webcontrol1.registrarComboActionChangeCombosmodulosFK(grupo_opcion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(grupo_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(grupo_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(grupo_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("grupo_opcion");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("grupo_opcion");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(grupo_opcion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);			
			
			if(grupo_opcion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,"grupo_opcion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				grupo_opcion_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("grupo_opcion","FK_Idmodulo","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("grupo_opcion");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			grupo_opcion_funcion1.validarFormularioJQuery(grupo_opcion_constante1);
			
			if(grupo_opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(grupo_opcion_control) {
		
		jQuery("#divBusquedagrupo_opcionAjaxWebPart").css("display",grupo_opcion_control.strPermisoBusqueda);
		jQuery("#trgrupo_opcionCabeceraBusquedas").css("display",grupo_opcion_control.strPermisoBusqueda);
		jQuery("#trBusquedagrupo_opcion").css("display",grupo_opcion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportegrupo_opcion").css("display",grupo_opcion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosgrupo_opcion").attr("style",grupo_opcion_control.strPermisoMostrarTodos);
		
		if(grupo_opcion_control.strPermisoNuevo!=null) {
			jQuery("#tdgrupo_opcionNuevo").css("display",grupo_opcion_control.strPermisoNuevo);
			jQuery("#tdgrupo_opcionNuevoToolBar").css("display",grupo_opcion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdgrupo_opcionDuplicar").css("display",grupo_opcion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdgrupo_opcionDuplicarToolBar").css("display",grupo_opcion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdgrupo_opcionNuevoGuardarCambios").css("display",grupo_opcion_control.strPermisoNuevo);
			jQuery("#tdgrupo_opcionNuevoGuardarCambiosToolBar").css("display",grupo_opcion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(grupo_opcion_control.strPermisoActualizar!=null) {
			jQuery("#tdgrupo_opcionActualizarToolBar").css("display",grupo_opcion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdgrupo_opcionCopiar").css("display",grupo_opcion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdgrupo_opcionCopiarToolBar").css("display",grupo_opcion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdgrupo_opcionConEditar").css("display",grupo_opcion_control.strPermisoActualizar);
		}
		
		jQuery("#tdgrupo_opcionEliminarToolBar").css("display",grupo_opcion_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdgrupo_opcionGuardarCambios").css("display",grupo_opcion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdgrupo_opcionGuardarCambiosToolBar").css("display",grupo_opcion_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trgrupo_opcionElementos").css("display",grupo_opcion_control.strVisibleTablaElementos);
		
		jQuery("#trgrupo_opcionAcciones").css("display",grupo_opcion_control.strVisibleTablaAcciones);
		jQuery("#trgrupo_opcionParametrosAcciones").css("display",grupo_opcion_control.strVisibleTablaAcciones);
			
		jQuery("#tdgrupo_opcionCerrarPagina").css("display",grupo_opcion_control.strPermisoPopup);		
		jQuery("#tdgrupo_opcionCerrarPaginaToolBar").css("display",grupo_opcion_control.strPermisoPopup);
		//jQuery("#trgrupo_opcionAccionesRelaciones").css("display",grupo_opcion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		grupo_opcion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		grupo_opcion_webcontrol1.registrarEventosControles();
		
		if(grupo_opcion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
			grupo_opcion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(grupo_opcion_constante1.STR_ES_RELACIONES=="true") {
			if(grupo_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				grupo_opcion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(grupo_opcion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(grupo_opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				grupo_opcion_webcontrol1.onLoad();
				
			} else {
				if(grupo_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
					if(grupo_opcion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
						//grupo_opcion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(grupo_opcion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(grupo_opcion_constante1.BIG_ID_ACTUAL,"grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
						//grupo_opcion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			grupo_opcion_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var grupo_opcion_webcontrol1=new grupo_opcion_webcontrol();

if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = grupo_opcion_webcontrol1.onLoadWindow; 
}

//</script>