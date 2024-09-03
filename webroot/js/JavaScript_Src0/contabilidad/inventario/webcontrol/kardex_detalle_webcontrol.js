//<script type="text/javascript" language="javascript">



//var kardex_detalleJQueryPaginaWebInteraccion= function (kardex_detalle_control) {
//this.,this.,this.

class kardex_detalle_webcontrol extends kardex_detalle_webcontrol_add {
	
	kardex_detalle_control=null;
	kardex_detalle_controlInicial=null;
	kardex_detalle_controlAuxiliar=null;
		
	//if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(kardex_detalle_control) {
		super();
		
		this.kardex_detalle_control=kardex_detalle_control;
	}
		
	actualizarVariablesPagina(kardex_detalle_control) {
		
		if(kardex_detalle_control.action=="index" || kardex_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(kardex_detalle_control);
			
		} else if(kardex_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(kardex_detalle_control);
			
		} else if(kardex_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(kardex_detalle_control);
			
		} else if(kardex_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(kardex_detalle_control);		
		
		} else if(kardex_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(kardex_detalle_control);		
		
		} else if(kardex_detalle_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(kardex_detalle_control);		
		
		} else if(kardex_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(kardex_detalle_control);		
		}
		else if(kardex_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(kardex_detalle_control);		
		}
		else if(kardex_detalle_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(kardex_detalle_control);		
		}
		else if(kardex_detalle_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(kardex_detalle_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(kardex_detalle_control.action + " Revisar Manejo");
			
			if(kardex_detalle_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(kardex_detalle_control);
				
				return;
			}
			
			//if(kardex_detalle_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(kardex_detalle_control);
			//}
			
			if(kardex_detalle_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(kardex_detalle_control);
			}
			
			if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && kardex_detalle_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(kardex_detalle_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(kardex_detalle_control, false);			
			}
			
			if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(kardex_detalle_control);	
			}
			
			if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(kardex_detalle_control);
			}
			
			if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(kardex_detalle_control);
			}
			
			if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(kardex_detalle_control);
			}
			
			if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(kardex_detalle_control);	
			}
			
			if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
			}
			
			if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(kardex_detalle_control);
			}
			
			
			if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(kardex_detalle_control);			
			}
			
			if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(kardex_detalle_control);
			}
			
			
			if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(kardex_detalle_control);
			}
			
			if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(kardex_detalle_control);
			}				
			
			if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(kardex_detalle_control);
			}
			
			if(kardex_detalle_control.usuarioActual!=null && kardex_detalle_control.usuarioActual.field_strUserName!=null &&
			kardex_detalle_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(kardex_detalle_control);			
			}
		}
		
		
		if(kardex_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(kardex_detalle_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(kardex_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(kardex_detalle_control);
		this.actualizarPaginaTablaDatos(kardex_detalle_control);
		this.actualizarPaginaCargaGeneralControles(kardex_detalle_control);
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(kardex_detalle_control);
		this.actualizarPaginaAreaBusquedas(kardex_detalle_control);
		this.actualizarPaginaCargaCombosFK(kardex_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(kardex_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(kardex_detalle_control);
		this.actualizarPaginaTablaDatos(kardex_detalle_control);
		this.actualizarPaginaCargaGeneralControles(kardex_detalle_control);
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(kardex_detalle_control);
		this.actualizarPaginaAreaBusquedas(kardex_detalle_control);
		this.actualizarPaginaCargaCombosFK(kardex_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(kardex_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(kardex_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(kardex_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(kardex_detalle_control) {
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(kardex_detalle_control) {
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(kardex_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(kardex_detalle_control);
		this.actualizarPaginaCargaCombosFK(kardex_detalle_control);
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(kardex_detalle_control) {
		this.actualizarPaginaAbrirLink(kardex_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);				
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);
		this.actualizarPaginaFormulario(kardex_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);
		this.actualizarPaginaFormulario(kardex_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(kardex_detalle_control) {
		this.actualizarPaginaFormulario(kardex_detalle_control);
		this.onLoadCombosDefectoFK(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);
		this.actualizarPaginaFormulario(kardex_detalle_control);
		this.onLoadCombosDefectoFK(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(kardex_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(kardex_detalle_control);
		this.actualizarPaginaCargaCombosFK(kardex_detalle_control);
		this.actualizarPaginaFormulario(kardex_detalle_control);
		this.onLoadCombosDefectoFK(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(kardex_detalle_control) {
		this.actualizarPaginaAbrirLink(kardex_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(kardex_detalle_control) {
		this.actualizarPaginaImprimir(kardex_detalle_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(kardex_detalle_control) {
		this.actualizarPaginaImprimir(kardex_detalle_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(kardex_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(kardex_detalle_control) {
		//FORMULARIO
		if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kardex_detalle_control);
			this.actualizarPaginaFormularioAdd(kardex_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		//COMBOS FK
		if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kardex_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(kardex_detalle_control) {
		//FORMULARIO
		if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kardex_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);	
		//COMBOS FK
		if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kardex_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);
		this.actualizarPaginaFormulario(kardex_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(kardex_detalle_control) {
		//FORMULARIO
		if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kardex_detalle_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(kardex_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);	
		//COMBOS FK
		if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kardex_detalle_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(kardex_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(kardex_detalle_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control) {
		if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && kardex_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(kardex_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(kardex_detalle_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(kardex_detalle_control) {
		if(kardex_detalle_funcion1.esPaginaForm()==true) {
			window.opener.kardex_detalle_webcontrol1.actualizarPaginaTablaDatos(kardex_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(kardex_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(kardex_detalle_control) {
		kardex_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(kardex_detalle_control.strAuxiliarUrlPagina);
				
		kardex_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(kardex_detalle_control.strAuxiliarTipo,kardex_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(kardex_detalle_control) {
		kardex_detalle_funcion1.resaltarRestaurarDivMensaje(true,kardex_detalle_control.strAuxiliarMensajeAlert,kardex_detalle_control.strAuxiliarCssMensaje);
			
		if(kardex_detalle_funcion1.esPaginaForm()==true) {
			window.opener.kardex_detalle_funcion1.resaltarRestaurarDivMensaje(true,kardex_detalle_control.strAuxiliarMensajeAlert,kardex_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(kardex_detalle_control) {
		eval(kardex_detalle_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(kardex_detalle_control, mostrar) {
		
		if(mostrar==true) {
			kardex_detalle_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				kardex_detalle_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			kardex_detalle_funcion1.mostrarDivMensaje(true,kardex_detalle_control.strAuxiliarMensaje,kardex_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			kardex_detalle_funcion1.mostrarDivMensaje(false,kardex_detalle_control.strAuxiliarMensaje,kardex_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(kardex_detalle_control) {
	
		funcionGeneral.printWebPartPage("kardex_detalle",kardex_detalle_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarkardex_detallesAjaxWebPart").html(kardex_detalle_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("kardex_detalle",jQuery("#divTablaDatosReporteAuxiliarkardex_detallesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(kardex_detalle_control) {
		this.kardex_detalle_controlInicial=kardex_detalle_control;
			
		if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(kardex_detalle_control.strStyleDivArbol,kardex_detalle_control.strStyleDivContent
																,kardex_detalle_control.strStyleDivOpcionesBanner,kardex_detalle_control.strStyleDivExpandirColapsar
																,kardex_detalle_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=kardex_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",kardex_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(kardex_detalle_control) {
		jQuery("#divTablaDatoskardex_detallesAjaxWebPart").html(kardex_detalle_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoskardex_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoskardex_detalles=jQuery("#tblTablaDatoskardex_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("kardex_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',kardex_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			kardex_detalle_webcontrol1.registrarControlesTableEdition(kardex_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		kardex_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(kardex_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(kardex_detalle_control.kardex_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(kardex_detalle_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(kardex_detalle_control) {
		this.actualizarCssBotonesPagina(kardex_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(kardex_detalle_control.tiposReportes,kardex_detalle_control.tiposReporte
															 	,kardex_detalle_control.tiposPaginacion,kardex_detalle_control.tiposAcciones
																,kardex_detalle_control.tiposColumnasSelect,kardex_detalle_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(kardex_detalle_control.tiposRelaciones,kardex_detalle_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(kardex_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(kardex_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(kardex_detalle_control);			
	}
	
	actualizarPaginaAreaBusquedas(kardex_detalle_control) {
		jQuery("#divBusquedakardex_detalleAjaxWebPart").css("display",kardex_detalle_control.strPermisoBusqueda);
		jQuery("#trkardex_detalleCabeceraBusquedas").css("display",kardex_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedakardex_detalle").css("display",kardex_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(kardex_detalle_control.htmlTablaOrderBy!=null
			&& kardex_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBykardex_detalleAjaxWebPart").html(kardex_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//kardex_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(kardex_detalle_control.htmlTablaOrderByRel!=null
			&& kardex_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelkardex_detalleAjaxWebPart").html(kardex_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(kardex_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedakardex_detalleAjaxWebPart").css("display","none");
			jQuery("#trkardex_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedakardex_detalle").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(kardex_detalle_control) {
		jQuery("#tdkardex_detalleNuevo").css("display",kardex_detalle_control.strPermisoNuevo);
		jQuery("#trkardex_detalleElementos").css("display",kardex_detalle_control.strVisibleTablaElementos);
		jQuery("#trkardex_detalleAcciones").css("display",kardex_detalle_control.strVisibleTablaAcciones);
		jQuery("#trkardex_detalleParametrosAcciones").css("display",kardex_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(kardex_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(kardex_detalle_control);
				
		if(kardex_detalle_control.kardex_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(kardex_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(kardex_detalle_control);
	}
	
	actualizarPaginaUsuarioInvitado(kardex_detalle_control) {
	
		var indexPosition=kardex_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=kardex_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(kardex_detalle_control) {
		jQuery("#divResumenkardex_detalleActualAjaxWebPart").html(kardex_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(kardex_detalle_control) {
		jQuery("#divAccionesRelacioneskardex_detalleAjaxWebPart").html(kardex_detalle_control.htmlTablaAccionesRelaciones);
			
		kardex_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(kardex_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(kardex_detalle_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(kardex_detalle_control) {
		
		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",kardex_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",kardex_detalle_control.strVisibleFK_Idbodega);
		}

		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",kardex_detalle_control.strVisibleFK_Idkardex);
			jQuery("#tblstrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",kardex_detalle_control.strVisibleFK_Idkardex);
		}

		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote").attr("style",kardex_detalle_control.strVisibleFK_Idlote);
			jQuery("#tblstrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote").attr("style",kardex_detalle_control.strVisibleFK_Idlote);
		}

		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",kardex_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",kardex_detalle_control.strVisibleFK_Idproducto);
		}

		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",kardex_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",kardex_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionkardex_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("kardex_detalle",id,"inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);		
	}
	
	

	abrirBusquedaParakardex(strNombreCampoBusqueda){//idActual
		kardex_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex_detalle","kardex","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		kardex_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex_detalle","bodega","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		kardex_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex_detalle","producto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		kardex_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex_detalle","unidad","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}

	abrirBusquedaParalote_producto(strNombreCampoBusqueda){//idActual
		kardex_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex_detalle","lote_producto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(kardex_detalle_control) {
	
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id").val(kardex_detalle_control.kardex_detalleActual.id);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-version_row").val(kardex_detalle_control.kardex_detalleActual.versionRow);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-nro_item").val(kardex_detalle_control.kardex_detalleActual.nro_item);
		
		if(kardex_detalle_control.kardex_detalleActual.id_kardex!=null && kardex_detalle_control.kardex_detalleActual.id_kardex>-1){
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val() != kardex_detalle_control.kardex_detalleActual.id_kardex) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val(kardex_detalle_control.kardex_detalleActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_detalle_control.kardex_detalleActual.id_bodega!=null && kardex_detalle_control.kardex_detalleActual.id_bodega>-1){
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != kardex_detalle_control.kardex_detalleActual.id_bodega) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val(kardex_detalle_control.kardex_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_detalle_control.kardex_detalleActual.id_producto!=null && kardex_detalle_control.kardex_detalleActual.id_producto>-1){
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val() != kardex_detalle_control.kardex_detalleActual.id_producto) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val(kardex_detalle_control.kardex_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_detalle_control.kardex_detalleActual.id_unidad!=null && kardex_detalle_control.kardex_detalleActual.id_unidad>-1){
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != kardex_detalle_control.kardex_detalleActual.id_unidad) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val(kardex_detalle_control.kardex_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-cantidad").val(kardex_detalle_control.kardex_detalleActual.cantidad);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-costo").val(kardex_detalle_control.kardex_detalleActual.costo);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-total").val(kardex_detalle_control.kardex_detalleActual.total);
		
		if(kardex_detalle_control.kardex_detalleActual.id_lote_producto!=null && kardex_detalle_control.kardex_detalleActual.id_lote_producto>-1){
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val() != kardex_detalle_control.kardex_detalleActual.id_lote_producto) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val(kardex_detalle_control.kardex_detalleActual.id_lote_producto).trigger("change");
			}
		} else { 
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-descripcion").val(kardex_detalle_control.kardex_detalleActual.descripcion);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-cantidad_disponible").val(kardex_detalle_control.kardex_detalleActual.cantidad_disponible);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-cantidad_dispxbodega").val(kardex_detalle_control.kardex_detalleActual.cantidad_dispxbodega);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-costo_old").val(kardex_detalle_control.kardex_detalleActual.costo_old);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-es_modificable").prop('checked',kardex_detalle_control.kardex_detalleActual.es_modificable);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-es_ingreso").prop('checked',kardex_detalle_control.kardex_detalleActual.es_ingreso);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+kardex_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("kardex_detalle","inventario","","form_kardex_detalle",formulario,"","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	cargarCombosFK(kardex_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarComboskardexsFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarCombosbodegasFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarCombosproductosFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarCombosunidadsFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_lote_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarComboslote_productosFK(kardex_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(kardex_detalle_control.strRecargarFkTiposNinguno!=null && kardex_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && kardex_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarComboskardexsFK(kardex_detalle_control);
				}

				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarCombosbodegasFK(kardex_detalle_control);
				}

				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarCombosproductosFK(kardex_detalle_control);
				}

				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarCombosunidadsFK(kardex_detalle_control);
				}

				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_lote_producto",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarComboslote_productosFK(kardex_detalle_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(kardex_detalle_control) {
		jQuery("#spanstrMensajeid").text(kardex_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(kardex_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenro_item").text(kardex_detalle_control.strMensajenro_item);		
		jQuery("#spanstrMensajeid_kardex").text(kardex_detalle_control.strMensajeid_kardex);		
		jQuery("#spanstrMensajeid_bodega").text(kardex_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(kardex_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(kardex_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajecantidad").text(kardex_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajecosto").text(kardex_detalle_control.strMensajecosto);		
		jQuery("#spanstrMensajetotal").text(kardex_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajeid_lote_producto").text(kardex_detalle_control.strMensajeid_lote_producto);		
		jQuery("#spanstrMensajedescripcion").text(kardex_detalle_control.strMensajedescripcion);		
		jQuery("#spanstrMensajecantidad_disponible").text(kardex_detalle_control.strMensajecantidad_disponible);		
		jQuery("#spanstrMensajecantidad_dispxbodega").text(kardex_detalle_control.strMensajecantidad_dispxbodega);		
		jQuery("#spanstrMensajecosto_old").text(kardex_detalle_control.strMensajecosto_old);		
		jQuery("#spanstrMensajees_modificable").text(kardex_detalle_control.strMensajees_modificable);		
		jQuery("#spanstrMensajees_ingreso").text(kardex_detalle_control.strMensajees_ingreso);		
	}
	
	actualizarCssBotonesMantenimiento(kardex_detalle_control) {
		jQuery("#tdbtnNuevokardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevokardex_detalle").css("display",kardex_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarkardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarkardex_detalle").css("display",kardex_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarkardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarkardex_detalle").css("display",kardex_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarkardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioskardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioskardex_detalle").css("display",kardex_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarkardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarkardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarkardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncosto_producto").click(function(){

			var idActual=jQuery(this).attr("idactualkardex_detalle");

			kardex_detalle_webcontrol1.registrarSesionParacosto_productos(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.kardex_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.kardex_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.kardex_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.kardex_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.kardex_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.kardex_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablakardexFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.kardexsFK);
	}

	cargarComboEditarTablabodegaFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.unidadsFK);
	}

	cargarComboEditarTablalote_productoFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.lote_productosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(kardex_detalle_control) {
		var i=0;
		
		i=kardex_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(kardex_detalle_control.kardex_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(kardex_detalle_control.kardex_detalleActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(kardex_detalle_control.kardex_detalleActual.nro_item);
		
		if(kardex_detalle_control.kardex_detalleActual.id_kardex!=null && kardex_detalle_control.kardex_detalleActual.id_kardex>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != kardex_detalle_control.kardex_detalleActual.id_kardex) {
				jQuery("#t-cel_"+i+"_3").val(kardex_detalle_control.kardex_detalleActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_3").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_detalle_control.kardex_detalleActual.id_bodega!=null && kardex_detalle_control.kardex_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != kardex_detalle_control.kardex_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_4").val(kardex_detalle_control.kardex_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_detalle_control.kardex_detalleActual.id_producto!=null && kardex_detalle_control.kardex_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != kardex_detalle_control.kardex_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_5").val(kardex_detalle_control.kardex_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_detalle_control.kardex_detalleActual.id_unidad!=null && kardex_detalle_control.kardex_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != kardex_detalle_control.kardex_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_6").val(kardex_detalle_control.kardex_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(kardex_detalle_control.kardex_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_8").val(kardex_detalle_control.kardex_detalleActual.costo);
		jQuery("#t-cel_"+i+"_9").val(kardex_detalle_control.kardex_detalleActual.total);
		
		if(kardex_detalle_control.kardex_detalleActual.id_lote_producto!=null && kardex_detalle_control.kardex_detalleActual.id_lote_producto>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != kardex_detalle_control.kardex_detalleActual.id_lote_producto) {
				jQuery("#t-cel_"+i+"_10").val(kardex_detalle_control.kardex_detalleActual.id_lote_producto).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_10").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_11").val(kardex_detalle_control.kardex_detalleActual.descripcion);
		jQuery("#t-cel_"+i+"_12").val(kardex_detalle_control.kardex_detalleActual.cantidad_disponible);
		jQuery("#t-cel_"+i+"_13").val(kardex_detalle_control.kardex_detalleActual.cantidad_dispxbodega);
		jQuery("#t-cel_"+i+"_14").val(kardex_detalle_control.kardex_detalleActual.costo_old);
		jQuery("#t-cel_"+i+"_15").prop('checked',kardex_detalle_control.kardex_detalleActual.es_modificable);
		jQuery("#t-cel_"+i+"_16").prop('checked',kardex_detalle_control.kardex_detalleActual.es_ingreso);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(kardex_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncosto_producto").click(function(){
		jQuery("#tblTablaDatoskardex_detalles").on("click",".imgrelacioncosto_producto", function () {

			var idActual=jQuery(this).attr("idactualkardex_detalle");

			kardex_detalle_webcontrol1.registrarSesionParacosto_productos(idActual);
		});				
	}
		
	

	registrarSesionParacosto_productos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"kardex_detalle","costo_producto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(kardex_detalle_control) {
		kardex_detalle_funcion1.registrarControlesTableValidacionEdition(kardex_detalle_control,kardex_detalle_webcontrol1,kardex_detalle_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalleConstante,strParametros);
		
		//kardex_detalle_funcion1.cancelarOnComplete();
	}	
	
	
	cargarComboskardexsFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex",kardex_detalle_control.kardexsFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_3",kardex_detalle_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",kardex_detalle_control.kardexsFK);

	};

	cargarCombosbodegasFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega",kardex_detalle_control.bodegasFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_4",kardex_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",kardex_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto",kardex_detalle_control.productosFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_5",kardex_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",kardex_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad",kardex_detalle_control.unidadsFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_6",kardex_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",kardex_detalle_control.unidadsFK);

	};

	cargarComboslote_productosFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto",kardex_detalle_control.lote_productosFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_10",kardex_detalle_control.lote_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote-cmbid_lote_producto",kardex_detalle_control.lote_productosFK);

	};

	
	
	registrarComboActionChangeComboskardexsFK(kardex_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(kardex_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(kardex_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(kardex_detalle_control) {

	};

	registrarComboActionChangeComboslote_productosFK(kardex_detalle_control) {

	};

	
	
	setDefectoValorComboskardexsFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idkardexDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val() != kardex_detalle_control.idkardexDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val(kardex_detalle_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(kardex_detalle_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != kardex_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val(kardex_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(kardex_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val() != kardex_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val(kardex_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(kardex_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != kardex_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val(kardex_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(kardex_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboslote_productosFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idlote_productoDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val() != kardex_detalle_control.idlote_productoDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val(kardex_detalle_control.idlote_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote-cmbid_lote_producto").val(kardex_detalle_control.idlote_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote-cmbid_lote_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote-cmbid_lote_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("kardex_detalle","inventario","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("kardex_detalle","inventario","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//kardex_detalle_control
		
	

		var cantidad="form"+kardex_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("kardex_detalle","inventario","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

		var costo="form"+kardex_detalle_constante1.STR_SUFIJO+"-costo";
		funcionGeneralEventoJQuery.setTextoAccionChange("kardex_detalle","inventario","","costo",costo,"","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(kardex_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kardex_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorComboskardexsFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorCombosbodegasFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorCombosproductosFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorCombosunidadsFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_lote_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorComboslote_productosFK(kardex_detalle_control);
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
	onLoadCombosEventosFK(kardex_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kardex_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeComboskardexsFK(kardex_detalle_control);
			//}

			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(kardex_detalle_control);
			//}

			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(kardex_detalle_control);
			//}

			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(kardex_detalle_control);
			//}

			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_lote_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeComboslote_productosFK(kardex_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(kardex_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kardex_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("kardex_detalle");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("kardex_detalle");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(kardex_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);			
			
			if(kardex_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,"kardex_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("lote_producto","id_lote_producto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParalote_producto("id_lote_producto");
				//alert(jQuery('#form-id_lote_producto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex_detalle","FK_Idbodega","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex_detalle","FK_Idkardex","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex_detalle","FK_Idlote","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex_detalle","FK_Idproducto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex_detalle","FK_Idunidad","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("kardex_detalle");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			kardex_detalle_funcion1.validarFormularioJQuery(kardex_detalle_constante1);
			
			if(kardex_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(kardex_detalle_control) {
		
		jQuery("#divBusquedakardex_detalleAjaxWebPart").css("display",kardex_detalle_control.strPermisoBusqueda);
		jQuery("#trkardex_detalleCabeceraBusquedas").css("display",kardex_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedakardex_detalle").css("display",kardex_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportekardex_detalle").css("display",kardex_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoskardex_detalle").attr("style",kardex_detalle_control.strPermisoMostrarTodos);
		
		if(kardex_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdkardex_detalleNuevo").css("display",kardex_detalle_control.strPermisoNuevo);
			jQuery("#tdkardex_detalleNuevoToolBar").css("display",kardex_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdkardex_detalleDuplicar").css("display",kardex_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdkardex_detalleDuplicarToolBar").css("display",kardex_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdkardex_detalleNuevoGuardarCambios").css("display",kardex_detalle_control.strPermisoNuevo);
			jQuery("#tdkardex_detalleNuevoGuardarCambiosToolBar").css("display",kardex_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(kardex_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdkardex_detalleActualizarToolBar").css("display",kardex_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkardex_detalleCopiar").css("display",kardex_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkardex_detalleCopiarToolBar").css("display",kardex_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkardex_detalleConEditar").css("display",kardex_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdkardex_detalleEliminarToolBar").css("display",kardex_detalle_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdkardex_detalleGuardarCambios").css("display",kardex_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdkardex_detalleGuardarCambiosToolBar").css("display",kardex_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trkardex_detalleElementos").css("display",kardex_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trkardex_detalleAcciones").css("display",kardex_detalle_control.strVisibleTablaAcciones);
		jQuery("#trkardex_detalleParametrosAcciones").css("display",kardex_detalle_control.strVisibleTablaAcciones);
			
		jQuery("#tdkardex_detalleCerrarPagina").css("display",kardex_detalle_control.strPermisoPopup);		
		jQuery("#tdkardex_detalleCerrarPaginaToolBar").css("display",kardex_detalle_control.strPermisoPopup);
		//jQuery("#trkardex_detalleAccionesRelaciones").css("display",kardex_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		kardex_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		kardex_detalle_webcontrol1.registrarEventosControles();
		
		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
			kardex_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(kardex_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(kardex_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				kardex_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(kardex_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(kardex_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				kardex_detalle_webcontrol1.onLoad();
				
			} else {
				if(kardex_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
					if(kardex_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
						//kardex_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(kardex_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(kardex_detalle_constante1.BIG_ID_ACTUAL,"kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
						//kardex_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			kardex_detalle_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var kardex_detalle_webcontrol1=new kardex_detalle_webcontrol();

if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = kardex_detalle_webcontrol1.onLoadWindow; 
}

//</script>