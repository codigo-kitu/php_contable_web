//<script type="text/javascript" language="javascript">



//var imagen_documento_cuenta_cobrarJQueryPaginaWebInteraccion= function (imagen_documento_cuenta_cobrar_control) {
//this.,this.,this.

class imagen_documento_cuenta_cobrar_webcontrol extends imagen_documento_cuenta_cobrar_webcontrol_add {
	
	imagen_documento_cuenta_cobrar_control=null;
	imagen_documento_cuenta_cobrar_controlInicial=null;
	imagen_documento_cuenta_cobrar_controlAuxiliar=null;
		
	//if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_documento_cuenta_cobrar_control) {
		super();
		
		this.imagen_documento_cuenta_cobrar_control=imagen_documento_cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(imagen_documento_cuenta_cobrar_control) {
		
		if(imagen_documento_cuenta_cobrar_control.action=="index" || imagen_documento_cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_documento_cuenta_cobrar_control);
			
		} else if(imagen_documento_cuenta_cobrar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_documento_cuenta_cobrar_control);
			
		} else if(imagen_documento_cuenta_cobrar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_documento_cuenta_cobrar_control);
			
		} else if(imagen_documento_cuenta_cobrar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_documento_cuenta_cobrar_control);		
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_documento_cuenta_cobrar_control);		
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_documento_cuenta_cobrar_control);		
		
		} else if(imagen_documento_cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_documento_cuenta_cobrar_control);		
		}
		else if(imagen_documento_cuenta_cobrar_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_documento_cuenta_cobrar_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(imagen_documento_cuenta_cobrar_control.action + " Revisar Manejo");
			
			if(imagen_documento_cuenta_cobrar_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(imagen_documento_cuenta_cobrar_control);
				
				return;
			}
			
			//if(imagen_documento_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(imagen_documento_cuenta_cobrar_control);
			//}
			
			if(imagen_documento_cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(imagen_documento_cuenta_cobrar_control);
			}
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_documento_cuenta_cobrar_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(imagen_documento_cuenta_cobrar_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(imagen_documento_cuenta_cobrar_control, false);			
			}
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(imagen_documento_cuenta_cobrar_control);	
			}
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
			}
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control);
			}
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);
			}
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(imagen_documento_cuenta_cobrar_control);	
			}
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
			}
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
			}
			
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(imagen_documento_cuenta_cobrar_control);			
			}
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(imagen_documento_cuenta_cobrar_control);
			}
			
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(imagen_documento_cuenta_cobrar_control);
			}
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(imagen_documento_cuenta_cobrar_control);
			}				
			
			if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_documento_cuenta_cobrar_control);
			}
			
			if(imagen_documento_cuenta_cobrar_control.usuarioActual!=null && imagen_documento_cuenta_cobrar_control.usuarioActual.field_strUserName!=null &&
			imagen_documento_cuenta_cobrar_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(imagen_documento_cuenta_cobrar_control);			
			}
		}
		
		
		if(imagen_documento_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_documento_cuenta_cobrar_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(imagen_documento_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_documento_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);				
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaImprimir(imagen_documento_cuenta_cobrar_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaImprimir(imagen_documento_cuenta_cobrar_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_documento_cuenta_cobrar_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_documento_cuenta_cobrar_control) {
		//FORMULARIO
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
			this.actualizarPaginaFormularioAdd(imagen_documento_cuenta_cobrar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		//COMBOS FK
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_documento_cuenta_cobrar_control) {
		//FORMULARIO
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);	
		//COMBOS FK
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_documento_cuenta_cobrar_control) {
		//FORMULARIO
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_documento_cuenta_cobrar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);	
		//COMBOS FK
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control) {
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_documento_cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_documento_cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_documento_cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_cobrar_control) {
		if(imagen_documento_cuenta_cobrar_funcion1.esPaginaForm()==true) {
			window.opener.imagen_documento_cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_documento_cuenta_cobrar_control) {
		imagen_documento_cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_documento_cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		imagen_documento_cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_documento_cuenta_cobrar_control.strAuxiliarTipo,imagen_documento_cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_documento_cuenta_cobrar_control) {
		imagen_documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,imagen_documento_cuenta_cobrar_control.strAuxiliarMensajeAlert,imagen_documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(imagen_documento_cuenta_cobrar_funcion1.esPaginaForm()==true) {
			window.opener.imagen_documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,imagen_documento_cuenta_cobrar_control.strAuxiliarMensajeAlert,imagen_documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(imagen_documento_cuenta_cobrar_control) {
		eval(imagen_documento_cuenta_cobrar_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(imagen_documento_cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			imagen_documento_cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			imagen_documento_cuenta_cobrar_funcion1.mostrarDivMensaje(true,imagen_documento_cuenta_cobrar_control.strAuxiliarMensaje,imagen_documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_documento_cuenta_cobrar_funcion1.mostrarDivMensaje(false,imagen_documento_cuenta_cobrar_control.strAuxiliarMensaje,imagen_documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(imagen_documento_cuenta_cobrar_control) {
	
		funcionGeneral.printWebPartPage("imagen_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarimagen_documento_cuenta_cobrarsAjaxWebPart").html(imagen_documento_cuenta_cobrar_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("imagen_documento_cuenta_cobrar",jQuery("#divTablaDatosReporteAuxiliarimagen_documento_cuenta_cobrarsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(imagen_documento_cuenta_cobrar_control) {
		this.imagen_documento_cuenta_cobrar_controlInicial=imagen_documento_cuenta_cobrar_control;
			
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_documento_cuenta_cobrar_control.strStyleDivArbol,imagen_documento_cuenta_cobrar_control.strStyleDivContent
																,imagen_documento_cuenta_cobrar_control.strStyleDivOpcionesBanner,imagen_documento_cuenta_cobrar_control.strStyleDivExpandirColapsar
																,imagen_documento_cuenta_cobrar_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_documento_cuenta_cobrar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_documento_cuenta_cobrar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control) {
		jQuery("#divTablaDatosimagen_documento_cuenta_cobrarsAjaxWebPart").html(imagen_documento_cuenta_cobrar_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_documento_cuenta_cobrars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_documento_cuenta_cobrars=jQuery("#tblTablaDatosimagen_documento_cuenta_cobrars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_documento_cuenta_cobrar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_documento_cuenta_cobrar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_documento_cuenta_cobrar_webcontrol1.registrarControlesTableEdition(imagen_documento_cuenta_cobrar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_documento_cuenta_cobrar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(imagen_documento_cuenta_cobrar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_documento_cuenta_cobrar_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(imagen_documento_cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_documento_cuenta_cobrar_control.tiposReportes,imagen_documento_cuenta_cobrar_control.tiposReporte
															 	,imagen_documento_cuenta_cobrar_control.tiposPaginacion,imagen_documento_cuenta_cobrar_control.tiposAcciones
																,imagen_documento_cuenta_cobrar_control.tiposColumnasSelect,imagen_documento_cuenta_cobrar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_documento_cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_documento_cuenta_cobrar_control);			
	}
	
	actualizarPaginaAreaBusquedas(imagen_documento_cuenta_cobrar_control) {
		jQuery("#divBusquedaimagen_documento_cuenta_cobrarAjaxWebPart").css("display",imagen_documento_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trimagen_documento_cuenta_cobrarCabeceraBusquedas").css("display",imagen_documento_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_documento_cuenta_cobrar_control.htmlTablaOrderBy!=null
			&& imagen_documento_cuenta_cobrar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_documento_cuenta_cobrarAjaxWebPart").html(imagen_documento_cuenta_cobrar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_documento_cuenta_cobrar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_documento_cuenta_cobrar_control.htmlTablaOrderByRel!=null
			&& imagen_documento_cuenta_cobrar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_documento_cuenta_cobrarAjaxWebPart").html(imagen_documento_cuenta_cobrar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_documento_cuenta_cobrarAjaxWebPart").css("display","none");
			jQuery("#trimagen_documento_cuenta_cobrarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_documento_cuenta_cobrar").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control) {
		jQuery("#tdimagen_documento_cuenta_cobrarNuevo").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo);
		jQuery("#trimagen_documento_cuenta_cobrarElementos").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaElementos);
		jQuery("#trimagen_documento_cuenta_cobrarAcciones").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trimagen_documento_cuenta_cobrarParametrosAcciones").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_documento_cuenta_cobrar_control);
				
		if(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_documento_cuenta_cobrar_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarPaginaUsuarioInvitado(imagen_documento_cuenta_cobrar_control) {
	
		var indexPosition=imagen_documento_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_documento_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_documento_cuenta_cobrar_control) {
		jQuery("#divResumenimagen_documento_cuenta_cobrarActualAjaxWebPart").html(imagen_documento_cuenta_cobrar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_documento_cuenta_cobrar_control) {
		jQuery("#divAccionesRelacionesimagen_documento_cuenta_cobrarAjaxWebPart").html(imagen_documento_cuenta_cobrar_control.htmlTablaAccionesRelaciones);
			
		imagen_documento_cuenta_cobrar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_documento_cuenta_cobrar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_documento_cuenta_cobrar_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_documento_cuenta_cobrar_control) {
		
		if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",imagen_documento_cuenta_cobrar_control.strVisibleFK_Iddocumento_cuenta_cobrar);
			jQuery("#tblstrVisible"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",imagen_documento_cuenta_cobrar_control.strVisibleFK_Iddocumento_cuenta_cobrar);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_documento_cuenta_cobrar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_documento_cuenta_cobrar",id,"cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);		
	}
	
	

	abrirBusquedaParadocumento_cuenta_cobrar(strNombreCampoBusqueda){//idActual
		imagen_documento_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_documento_cuenta_cobrar","documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_documento_cuenta_cobrar_control) {
	
		jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id);
		jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-version_row").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.versionRow);
		jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_imagen").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_imagen);
		jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-imagen").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.imagen);
		
		if(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar!=null && imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar) {
				jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").select2("val", null);
			if(jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-nro_documento").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.nro_documento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_documento_cuenta_cobrar","cuentascobrar","","form_imagen_documento_cuenta_cobrar",formulario,"","",paraEventoTabla,idFilaTabla,imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
	}
	
	cargarCombosFK(imagen_documento_cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				imagen_documento_cuenta_cobrar_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					imagen_documento_cuenta_cobrar_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(imagen_documento_cuenta_cobrar_control) {
		jQuery("#spanstrMensajeid").text(imagen_documento_cuenta_cobrar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_documento_cuenta_cobrar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_imagen").text(imagen_documento_cuenta_cobrar_control.strMensajeid_imagen);		
		jQuery("#spanstrMensajeimagen").text(imagen_documento_cuenta_cobrar_control.strMensajeimagen);		
		jQuery("#spanstrMensajeid_documento_cuenta_cobrar").text(imagen_documento_cuenta_cobrar_control.strMensajeid_documento_cuenta_cobrar);		
		jQuery("#spanstrMensajenro_documento").text(imagen_documento_cuenta_cobrar_control.strMensajenro_documento);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_documento_cuenta_cobrar_control) {
		jQuery("#tdbtnNuevoimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTabladocumento_cuenta_cobrarFK(imagen_documento_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_control.documento_cuenta_cobrarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(imagen_documento_cuenta_cobrar_control) {
		var i=0;
		
		i=imagen_documento_cuenta_cobrar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_imagen);
		jQuery("#t-cel_"+i+"_3").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.imagen);
		
		if(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar!=null && imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar) {
				jQuery("#t-cel_"+i+"_4").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.nro_documento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_documento_cuenta_cobrar_control) {
		imagen_documento_cuenta_cobrar_funcion1.registrarControlesTableValidacionEdition(imagen_documento_cuenta_cobrar_control,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrarConstante,strParametros);
		
		//imagen_documento_cuenta_cobrar_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.documento_cuenta_cobrarsFK);

		if(imagen_documento_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_documento_cuenta_cobrar_control.idFilaTablaActual+"_4",imagen_documento_cuenta_cobrar_control.documento_cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.documento_cuenta_cobrarsFK);

	};

	
	
	registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_documento_cuenta_cobrar_control.iddocumento_cuenta_cobrarDefaultFK>-1 && jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != imagen_documento_cuenta_cobrar_control.iddocumento_cuenta_cobrarDefaultFK) {
				jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(imagen_documento_cuenta_cobrar_control.iddocumento_cuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(imagen_documento_cuenta_cobrar_control.iddocumento_cuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_documento_cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_documento_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				imagen_documento_cuenta_cobrar_webcontrol1.setDefectoValorCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control);
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
	onLoadCombosEventosFK(imagen_documento_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_documento_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_documento_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_documento_cuenta_cobrar");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_documento_cuenta_cobrar");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_documento_cuenta_cobrar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);			
			
			if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,"imagen_documento_cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_cobrar","id_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar_img_busqueda").click(function(){
				imagen_documento_cuenta_cobrar_webcontrol1.abrirBusquedaParadocumento_cuenta_cobrar("id_documento_cuenta_cobrar");
				//alert(jQuery('#form-id_documento_cuenta_cobrar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_documento_cuenta_cobrar","FK_Iddocumento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			imagen_documento_cuenta_cobrar_funcion1.validarFormularioJQuery(imagen_documento_cuenta_cobrar_constante1);
			
			if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_documento_cuenta_cobrar_control) {
		
		jQuery("#divBusquedaimagen_documento_cuenta_cobrarAjaxWebPart").css("display",imagen_documento_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trimagen_documento_cuenta_cobrarCabeceraBusquedas").css("display",imagen_documento_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_documento_cuenta_cobrar").attr("style",imagen_documento_cuenta_cobrar_control.strPermisoMostrarTodos);
		
		if(imagen_documento_cuenta_cobrar_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_documento_cuenta_cobrarNuevo").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tdimagen_documento_cuenta_cobrarNuevoToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_documento_cuenta_cobrarDuplicar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_cobrarDuplicarToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_cobrarNuevoGuardarCambios").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tdimagen_documento_cuenta_cobrarNuevoGuardarCambiosToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_documento_cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_documento_cuenta_cobrarActualizarToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_cobrarCopiar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_cobrarCopiarToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_cobrarConEditar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_documento_cuenta_cobrarEliminarToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdimagen_documento_cuenta_cobrarGuardarCambios").css("display",imagen_documento_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_documento_cuenta_cobrarGuardarCambiosToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trimagen_documento_cuenta_cobrarElementos").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_documento_cuenta_cobrarAcciones").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trimagen_documento_cuenta_cobrarParametrosAcciones").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaAcciones);
			
		jQuery("#tdimagen_documento_cuenta_cobrarCerrarPagina").css("display",imagen_documento_cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tdimagen_documento_cuenta_cobrarCerrarPaginaToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trimagen_documento_cuenta_cobrarAccionesRelaciones").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_documento_cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_documento_cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			imagen_documento_cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_documento_cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_documento_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_documento_cuenta_cobrar_webcontrol1.onLoad();
				
			} else {
				if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
					if(imagen_documento_cuenta_cobrar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
						//imagen_documento_cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(imagen_documento_cuenta_cobrar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_documento_cuenta_cobrar_constante1.BIG_ID_ACTUAL,"imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
						//imagen_documento_cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			imagen_documento_cuenta_cobrar_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var imagen_documento_cuenta_cobrar_webcontrol1=new imagen_documento_cuenta_cobrar_webcontrol();

if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_documento_cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>