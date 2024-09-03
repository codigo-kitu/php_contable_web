//<script type="text/javascript" language="javascript">



//var credito_cuenta_pagarJQueryPaginaWebInteraccion= function (credito_cuenta_pagar_control) {
//this.,this.,this.

class credito_cuenta_pagar_webcontrol extends credito_cuenta_pagar_webcontrol_add {
	
	credito_cuenta_pagar_control=null;
	credito_cuenta_pagar_controlInicial=null;
	credito_cuenta_pagar_controlAuxiliar=null;
		
	//if(credito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(credito_cuenta_pagar_control) {
		super();
		
		this.credito_cuenta_pagar_control=credito_cuenta_pagar_control;
	}
		
	actualizarVariablesPagina(credito_cuenta_pagar_control) {
		
		if(credito_cuenta_pagar_control.action=="index" || credito_cuenta_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(credito_cuenta_pagar_control);
			
		} else if(credito_cuenta_pagar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(credito_cuenta_pagar_control);
			
		} else if(credito_cuenta_pagar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(credito_cuenta_pagar_control);
			
		} else if(credito_cuenta_pagar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(credito_cuenta_pagar_control);
		
		} else if(credito_cuenta_pagar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(credito_cuenta_pagar_control);		
		
		} else if(credito_cuenta_pagar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(credito_cuenta_pagar_control);		
		
		} else if(credito_cuenta_pagar_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(credito_cuenta_pagar_control);		
		
		} else if(credito_cuenta_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(credito_cuenta_pagar_control);		
		}
		else if(credito_cuenta_pagar_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(credito_cuenta_pagar_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(credito_cuenta_pagar_control.action + " Revisar Manejo");
			
			if(credito_cuenta_pagar_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(credito_cuenta_pagar_control);
				
				return;
			}
			
			//if(credito_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(credito_cuenta_pagar_control);
			//}
			
			if(credito_cuenta_pagar_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(credito_cuenta_pagar_control);
			}
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && credito_cuenta_pagar_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(credito_cuenta_pagar_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(credito_cuenta_pagar_control, false);			
			}
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(credito_cuenta_pagar_control);	
			}
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);
			}
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(credito_cuenta_pagar_control);
			}
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(credito_cuenta_pagar_control);
			}
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(credito_cuenta_pagar_control);	
			}
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
			}
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(credito_cuenta_pagar_control);
			}
			
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(credito_cuenta_pagar_control);			
			}
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(credito_cuenta_pagar_control);
			}
			
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(credito_cuenta_pagar_control);
			}
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(credito_cuenta_pagar_control);
			}				
			
			if(credito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(credito_cuenta_pagar_control);
			}
			
			if(credito_cuenta_pagar_control.usuarioActual!=null && credito_cuenta_pagar_control.usuarioActual.field_strUserName!=null &&
			credito_cuenta_pagar_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(credito_cuenta_pagar_control);			
			}
		}
		
		
		if(credito_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(credito_cuenta_pagar_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(credito_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(credito_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(credito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(credito_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(credito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(credito_cuenta_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(credito_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(credito_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(credito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(credito_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(credito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(credito_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(credito_cuenta_pagar_control) {
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(credito_cuenta_pagar_control) {
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(credito_cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(credito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(credito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(credito_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(credito_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);				
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(credito_cuenta_pagar_control) {
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(credito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(credito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(credito_cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(credito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(credito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(credito_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(credito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(credito_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(credito_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(credito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(credito_cuenta_pagar_control) {
		this.actualizarPaginaImprimir(credito_cuenta_pagar_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(credito_cuenta_pagar_control) {
		this.actualizarPaginaImprimir(credito_cuenta_pagar_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(credito_cuenta_pagar_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(credito_cuenta_pagar_control) {
		//FORMULARIO
		if(credito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(credito_cuenta_pagar_control);
			this.actualizarPaginaFormularioAdd(credito_cuenta_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);		
		//COMBOS FK
		if(credito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(credito_cuenta_pagar_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(credito_cuenta_pagar_control) {
		//FORMULARIO
		if(credito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(credito_cuenta_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);	
		//COMBOS FK
		if(credito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(credito_cuenta_pagar_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(credito_cuenta_pagar_control) {
		//FORMULARIO
		if(credito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(credito_cuenta_pagar_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(credito_cuenta_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control);	
		//COMBOS FK
		if(credito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(credito_cuenta_pagar_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_pagar_control) {
		if(credito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && credito_cuenta_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(credito_cuenta_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(credito_cuenta_pagar_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(credito_cuenta_pagar_control) {
		if(credito_cuenta_pagar_funcion1.esPaginaForm()==true) {
			window.opener.credito_cuenta_pagar_webcontrol1.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(credito_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(credito_cuenta_pagar_control) {
		credito_cuenta_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(credito_cuenta_pagar_control.strAuxiliarUrlPagina);
				
		credito_cuenta_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(credito_cuenta_pagar_control.strAuxiliarTipo,credito_cuenta_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(credito_cuenta_pagar_control) {
		credito_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,credito_cuenta_pagar_control.strAuxiliarMensajeAlert,credito_cuenta_pagar_control.strAuxiliarCssMensaje);
			
		if(credito_cuenta_pagar_funcion1.esPaginaForm()==true) {
			window.opener.credito_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,credito_cuenta_pagar_control.strAuxiliarMensajeAlert,credito_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(credito_cuenta_pagar_control) {
		eval(credito_cuenta_pagar_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(credito_cuenta_pagar_control, mostrar) {
		
		if(mostrar==true) {
			credito_cuenta_pagar_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				credito_cuenta_pagar_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			credito_cuenta_pagar_funcion1.mostrarDivMensaje(true,credito_cuenta_pagar_control.strAuxiliarMensaje,credito_cuenta_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			credito_cuenta_pagar_funcion1.mostrarDivMensaje(false,credito_cuenta_pagar_control.strAuxiliarMensaje,credito_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(credito_cuenta_pagar_control) {
	
		funcionGeneral.printWebPartPage("credito_cuenta_pagar",credito_cuenta_pagar_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcredito_cuenta_pagarsAjaxWebPart").html(credito_cuenta_pagar_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("credito_cuenta_pagar",jQuery("#divTablaDatosReporteAuxiliarcredito_cuenta_pagarsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(credito_cuenta_pagar_control) {
		this.credito_cuenta_pagar_controlInicial=credito_cuenta_pagar_control;
			
		if(credito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(credito_cuenta_pagar_control.strStyleDivArbol,credito_cuenta_pagar_control.strStyleDivContent
																,credito_cuenta_pagar_control.strStyleDivOpcionesBanner,credito_cuenta_pagar_control.strStyleDivExpandirColapsar
																,credito_cuenta_pagar_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=credito_cuenta_pagar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",credito_cuenta_pagar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(credito_cuenta_pagar_control) {
		jQuery("#divTablaDatoscredito_cuenta_pagarsAjaxWebPart").html(credito_cuenta_pagar_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscredito_cuenta_pagars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(credito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscredito_cuenta_pagars=jQuery("#tblTablaDatoscredito_cuenta_pagars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("credito_cuenta_pagar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',credito_cuenta_pagar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			credito_cuenta_pagar_webcontrol1.registrarControlesTableEdition(credito_cuenta_pagar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		credito_cuenta_pagar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(credito_cuenta_pagar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(credito_cuenta_pagar_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(credito_cuenta_pagar_control) {
		this.actualizarCssBotonesPagina(credito_cuenta_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(credito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(credito_cuenta_pagar_control.tiposReportes,credito_cuenta_pagar_control.tiposReporte
															 	,credito_cuenta_pagar_control.tiposPaginacion,credito_cuenta_pagar_control.tiposAcciones
																,credito_cuenta_pagar_control.tiposColumnasSelect,credito_cuenta_pagar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(credito_cuenta_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(credito_cuenta_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(credito_cuenta_pagar_control);			
	}
	
	actualizarPaginaAreaBusquedas(credito_cuenta_pagar_control) {
		jQuery("#divBusquedacredito_cuenta_pagarAjaxWebPart").css("display",credito_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trcredito_cuenta_pagarCabeceraBusquedas").css("display",credito_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedacredito_cuenta_pagar").css("display",credito_cuenta_pagar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(credito_cuenta_pagar_control.htmlTablaOrderBy!=null
			&& credito_cuenta_pagar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycredito_cuenta_pagarAjaxWebPart").html(credito_cuenta_pagar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//credito_cuenta_pagar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(credito_cuenta_pagar_control.htmlTablaOrderByRel!=null
			&& credito_cuenta_pagar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcredito_cuenta_pagarAjaxWebPart").html(credito_cuenta_pagar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(credito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacredito_cuenta_pagarAjaxWebPart").css("display","none");
			jQuery("#trcredito_cuenta_pagarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacredito_cuenta_pagar").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(credito_cuenta_pagar_control) {
		jQuery("#tdcredito_cuenta_pagarNuevo").css("display",credito_cuenta_pagar_control.strPermisoNuevo);
		jQuery("#trcredito_cuenta_pagarElementos").css("display",credito_cuenta_pagar_control.strVisibleTablaElementos);
		jQuery("#trcredito_cuenta_pagarAcciones").css("display",credito_cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trcredito_cuenta_pagarParametrosAcciones").css("display",credito_cuenta_pagar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(credito_cuenta_pagar_control) {
	
		this.actualizarCssBotonesMantenimiento(credito_cuenta_pagar_control);
				
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFormulario(credito_cuenta_pagar_control);			
		}
						
		this.actualizarSpanMensajesCampos(credito_cuenta_pagar_control);
	}
	
	actualizarPaginaUsuarioInvitado(credito_cuenta_pagar_control) {
	
		var indexPosition=credito_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=credito_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(credito_cuenta_pagar_control) {
		jQuery("#divResumencredito_cuenta_pagarActualAjaxWebPart").html(credito_cuenta_pagar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(credito_cuenta_pagar_control) {
		jQuery("#divAccionesRelacionescredito_cuenta_pagarAjaxWebPart").html(credito_cuenta_pagar_control.htmlTablaAccionesRelaciones);
			
		credito_cuenta_pagar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(credito_cuenta_pagar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(credito_cuenta_pagar_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(credito_cuenta_pagar_control) {
		
		if(credito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idcuenta_pagar);
			jQuery("#tblstrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idcuenta_pagar);
		}

		if(credito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idejercicio);
		}

		if(credito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idempresa);
		}

		if(credito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idestado);
		}

		if(credito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idperiodo);
		}

		if(credito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idsucursal);
		}

		if(credito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",credito_cuenta_pagar_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncredito_cuenta_pagar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("credito_cuenta_pagar",id,"cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		credito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_pagar","empresa","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		credito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_pagar","sucursal","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		credito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_pagar","ejercicio","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		credito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_pagar","periodo","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		credito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_pagar","usuario","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
	}

	abrirBusquedaParacuenta_pagar(strNombreCampoBusqueda){//idActual
		credito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_pagar","cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		credito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_pagar","estado","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(credito_cuenta_pagar_control) {
	
		jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id);
		jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-version_row").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.versionRow);
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_empresa!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_empresa) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_sucursal!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_sucursal) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_ejercicio!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_ejercicio) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_periodo!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_periodo) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_usuario!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_usuario) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_cuenta_pagar!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_cuenta_pagar>-1){
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_cuenta_pagar) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_cuenta_pagar).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").select2("val", null);
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-numero").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.numero);
		jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-fecha_emision").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.fecha_emision);
		jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-fecha_vence").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.fecha_vence);
		jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-referencia").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.referencia);
		jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-monto").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.monto);
		jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-saldo").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.saldo);
		jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-descripcion").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.descripcion);
		jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-es_balance_inicial").prop('checked',credito_cuenta_pagar_control.credito_cuenta_pagarActual.es_balance_inicial);
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_estado!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_estado>-1){
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_estado) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-debito").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.debito);
		jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-credito").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.credito);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+credito_cuenta_pagar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("credito_cuenta_pagar","cuentaspagar","","form_credito_cuenta_pagar",formulario,"","",paraEventoTabla,idFilaTabla,credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
	}
	
	cargarCombosFK(credito_cuenta_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.cargarCombosempresasFK(credito_cuenta_pagar_control);
			}

			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(credito_cuenta_pagar_control);
			}

			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(credito_cuenta_pagar_control);
			}

			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(credito_cuenta_pagar_control);
			}

			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(credito_cuenta_pagar_control);
			}

			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.cargarComboscuenta_pagarsFK(credito_cuenta_pagar_control);
			}

			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.cargarCombosestadosFK(credito_cuenta_pagar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(credito_cuenta_pagar_control.strRecargarFkTiposNinguno!=null && credito_cuenta_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && credito_cuenta_pagar_control.strRecargarFkTiposNinguno!='') {
			
				if(credito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",credito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_pagar_webcontrol1.cargarCombosempresasFK(credito_cuenta_pagar_control);
				}

				if(credito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",credito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(credito_cuenta_pagar_control);
				}

				if(credito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",credito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(credito_cuenta_pagar_control);
				}

				if(credito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",credito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(credito_cuenta_pagar_control);
				}

				if(credito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",credito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(credito_cuenta_pagar_control);
				}

				if(credito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_pagar",credito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_pagar_webcontrol1.cargarComboscuenta_pagarsFK(credito_cuenta_pagar_control);
				}

				if(credito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",credito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_pagar_webcontrol1.cargarCombosestadosFK(credito_cuenta_pagar_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(credito_cuenta_pagar_control) {
		jQuery("#spanstrMensajeid").text(credito_cuenta_pagar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(credito_cuenta_pagar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(credito_cuenta_pagar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(credito_cuenta_pagar_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(credito_cuenta_pagar_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(credito_cuenta_pagar_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(credito_cuenta_pagar_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_cuenta_pagar").text(credito_cuenta_pagar_control.strMensajeid_cuenta_pagar);		
		jQuery("#spanstrMensajenumero").text(credito_cuenta_pagar_control.strMensajenumero);		
		jQuery("#spanstrMensajefecha_emision").text(credito_cuenta_pagar_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajefecha_vence").text(credito_cuenta_pagar_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajereferencia").text(credito_cuenta_pagar_control.strMensajereferencia);		
		jQuery("#spanstrMensajemonto").text(credito_cuenta_pagar_control.strMensajemonto);		
		jQuery("#spanstrMensajesaldo").text(credito_cuenta_pagar_control.strMensajesaldo);		
		jQuery("#spanstrMensajedescripcion").text(credito_cuenta_pagar_control.strMensajedescripcion);		
		jQuery("#spanstrMensajees_balance_inicial").text(credito_cuenta_pagar_control.strMensajees_balance_inicial);		
		jQuery("#spanstrMensajeid_estado").text(credito_cuenta_pagar_control.strMensajeid_estado);		
		jQuery("#spanstrMensajedebito").text(credito_cuenta_pagar_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(credito_cuenta_pagar_control.strMensajecredito);		
	}
	
	actualizarCssBotonesMantenimiento(credito_cuenta_pagar_control) {
		jQuery("#tdbtnNuevocredito_cuenta_pagar").css("visibility",credito_cuenta_pagar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocredito_cuenta_pagar").css("display",credito_cuenta_pagar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcredito_cuenta_pagar").css("visibility",credito_cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcredito_cuenta_pagar").css("display",credito_cuenta_pagar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcredito_cuenta_pagar").css("visibility",credito_cuenta_pagar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcredito_cuenta_pagar").css("display",credito_cuenta_pagar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcredito_cuenta_pagar").css("visibility",credito_cuenta_pagar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscredito_cuenta_pagar").css("visibility",credito_cuenta_pagar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscredito_cuenta_pagar").css("display",credito_cuenta_pagar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcredito_cuenta_pagar").css("visibility",credito_cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcredito_cuenta_pagar").css("visibility",credito_cuenta_pagar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcredito_cuenta_pagar").css("visibility",credito_cuenta_pagar_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(credito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_pagar_funcion1,credito_cuenta_pagar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(credito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_pagar_funcion1,credito_cuenta_pagar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(credito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_pagar_funcion1,credito_cuenta_pagar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(credito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_pagar_funcion1,credito_cuenta_pagar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(credito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_pagar_funcion1,credito_cuenta_pagar_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_pagarFK(credito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_pagar_funcion1,credito_cuenta_pagar_control.cuenta_pagarsFK);
	}

	cargarComboEditarTablaestadoFK(credito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_pagar_funcion1,credito_cuenta_pagar_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(credito_cuenta_pagar_control) {
		var i=0;
		
		i=credito_cuenta_pagar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id);
		jQuery("#t-version_row_"+i+"").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.versionRow);
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_empresa!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_sucursal!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_ejercicio!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_periodo!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_usuario!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_cuenta_pagar!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_cuenta_pagar>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_cuenta_pagar) {
				jQuery("#t-cel_"+i+"_7").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_cuenta_pagar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.numero);
		jQuery("#t-cel_"+i+"_9").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_10").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.fecha_vence);
		jQuery("#t-cel_"+i+"_11").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.referencia);
		jQuery("#t-cel_"+i+"_12").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.monto);
		jQuery("#t-cel_"+i+"_13").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.saldo);
		jQuery("#t-cel_"+i+"_14").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.descripcion);
		jQuery("#t-cel_"+i+"_15").prop('checked',credito_cuenta_pagar_control.credito_cuenta_pagarActual.es_balance_inicial);
		
		if(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_estado!=null && credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_16").val() != credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_estado) {
				jQuery("#t-cel_"+i+"_16").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_16").select2("val", null);
			if(jQuery("#t-cel_"+i+"_16").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_16").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_17").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.debito);
		jQuery("#t-cel_"+i+"_18").val(credito_cuenta_pagar_control.credito_cuenta_pagarActual.credito);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(credito_cuenta_pagar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(credito_cuenta_pagar_control) {
		credito_cuenta_pagar_funcion1.registrarControlesTableValidacionEdition(credito_cuenta_pagar_control,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagarConstante,strParametros);
		
		//credito_cuenta_pagar_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(credito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa",credito_cuenta_pagar_control.empresasFK);

		if(credito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_pagar_control.idFilaTablaActual+"_2",credito_cuenta_pagar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(credito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal",credito_cuenta_pagar_control.sucursalsFK);

		if(credito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_pagar_control.idFilaTablaActual+"_3",credito_cuenta_pagar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(credito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio",credito_cuenta_pagar_control.ejerciciosFK);

		if(credito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_pagar_control.idFilaTablaActual+"_4",credito_cuenta_pagar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(credito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo",credito_cuenta_pagar_control.periodosFK);

		if(credito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_pagar_control.idFilaTablaActual+"_5",credito_cuenta_pagar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(credito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario",credito_cuenta_pagar_control.usuariosFK);

		if(credito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_pagar_control.idFilaTablaActual+"_6",credito_cuenta_pagar_control.usuariosFK);
		}
	};

	cargarComboscuenta_pagarsFK(credito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar",credito_cuenta_pagar_control.cuenta_pagarsFK);

		if(credito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_pagar_control.idFilaTablaActual+"_7",credito_cuenta_pagar_control.cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar",credito_cuenta_pagar_control.cuenta_pagarsFK);

	};

	cargarCombosestadosFK(credito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado",credito_cuenta_pagar_control.estadosFK);

		if(credito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_pagar_control.idFilaTablaActual+"_16",credito_cuenta_pagar_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",credito_cuenta_pagar_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(credito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(credito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(credito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(credito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(credito_cuenta_pagar_control) {

	};

	registrarComboActionChangeComboscuenta_pagarsFK(credito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosestadosFK(credito_cuenta_pagar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(credito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_pagar_control.idempresaDefaultFK>-1 && jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != credito_cuenta_pagar_control.idempresaDefaultFK) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(credito_cuenta_pagar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(credito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_pagar_control.idsucursalDefaultFK>-1 && jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != credito_cuenta_pagar_control.idsucursalDefaultFK) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(credito_cuenta_pagar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(credito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_pagar_control.idejercicioDefaultFK>-1 && jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != credito_cuenta_pagar_control.idejercicioDefaultFK) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(credito_cuenta_pagar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(credito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_pagar_control.idperiodoDefaultFK>-1 && jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != credito_cuenta_pagar_control.idperiodoDefaultFK) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(credito_cuenta_pagar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(credito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_pagar_control.idusuarioDefaultFK>-1 && jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != credito_cuenta_pagar_control.idusuarioDefaultFK) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(credito_cuenta_pagar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_pagarsFK(credito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_pagar_control.idcuenta_pagarDefaultFK>-1 && jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != credito_cuenta_pagar_control.idcuenta_pagarDefaultFK) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(credito_cuenta_pagar_control.idcuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(credito_cuenta_pagar_control.idcuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(credito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_pagar_control.idestadoDefaultFK>-1 && jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != credito_cuenta_pagar_control.idestadoDefaultFK) {
				jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(credito_cuenta_pagar_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(credito_cuenta_pagar_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+credito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//credito_cuenta_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(credito_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(credito_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.setDefectoValorCombosempresasFK(credito_cuenta_pagar_control);
			}

			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.setDefectoValorCombossucursalsFK(credito_cuenta_pagar_control);
			}

			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.setDefectoValorCombosejerciciosFK(credito_cuenta_pagar_control);
			}

			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.setDefectoValorCombosperiodosFK(credito_cuenta_pagar_control);
			}

			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.setDefectoValorCombosusuariosFK(credito_cuenta_pagar_control);
			}

			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.setDefectoValorComboscuenta_pagarsFK(credito_cuenta_pagar_control);
			}

			if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_pagar_webcontrol1.setDefectoValorCombosestadosFK(credito_cuenta_pagar_control);
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
	onLoadCombosEventosFK(credito_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(credito_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosempresasFK(credito_cuenta_pagar_control);
			//}

			//if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombossucursalsFK(credito_cuenta_pagar_control);
			//}

			//if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(credito_cuenta_pagar_control);
			//}

			//if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosperiodosFK(credito_cuenta_pagar_control);
			//}

			//if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosusuariosFK(credito_cuenta_pagar_control);
			//}

			//if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_pagar_webcontrol1.registrarComboActionChangeComboscuenta_pagarsFK(credito_cuenta_pagar_control);
			//}

			//if(credito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",credito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosestadosFK(credito_cuenta_pagar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(credito_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(credito_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(credito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("credito_cuenta_pagar");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("credito_cuenta_pagar");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(credito_cuenta_pagar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);			
			
			if(credito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,"credito_cuenta_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				credito_cuenta_pagar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				credito_cuenta_pagar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				credito_cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				credito_cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				credito_cuenta_pagar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_pagar","id_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar_img_busqueda").click(function(){
				credito_cuenta_pagar_webcontrol1.abrirBusquedaParacuenta_pagar("id_cuenta_pagar");
				//alert(jQuery('#form-id_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				credito_cuenta_pagar_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_pagar","FK_Idcuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_pagar","FK_Idejercicio","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_pagar","FK_Idempresa","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_pagar","FK_Idestado","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_pagar","FK_Idperiodo","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_pagar","FK_Idsucursal","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_pagar","FK_Idusuario","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			credito_cuenta_pagar_funcion1.validarFormularioJQuery(credito_cuenta_pagar_constante1);
			
			if(credito_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(credito_cuenta_pagar_control) {
		
		jQuery("#divBusquedacredito_cuenta_pagarAjaxWebPart").css("display",credito_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trcredito_cuenta_pagarCabeceraBusquedas").css("display",credito_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedacredito_cuenta_pagar").css("display",credito_cuenta_pagar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecredito_cuenta_pagar").css("display",credito_cuenta_pagar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscredito_cuenta_pagar").attr("style",credito_cuenta_pagar_control.strPermisoMostrarTodos);
		
		if(credito_cuenta_pagar_control.strPermisoNuevo!=null) {
			jQuery("#tdcredito_cuenta_pagarNuevo").css("display",credito_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tdcredito_cuenta_pagarNuevoToolBar").css("display",credito_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcredito_cuenta_pagarDuplicar").css("display",credito_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcredito_cuenta_pagarDuplicarToolBar").css("display",credito_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcredito_cuenta_pagarNuevoGuardarCambios").css("display",credito_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tdcredito_cuenta_pagarNuevoGuardarCambiosToolBar").css("display",credito_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(credito_cuenta_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tdcredito_cuenta_pagarActualizarToolBar").css("display",credito_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcredito_cuenta_pagarCopiar").css("display",credito_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcredito_cuenta_pagarCopiarToolBar").css("display",credito_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcredito_cuenta_pagarConEditar").css("display",credito_cuenta_pagar_control.strPermisoActualizar);
		}
		
		jQuery("#tdcredito_cuenta_pagarEliminarToolBar").css("display",credito_cuenta_pagar_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcredito_cuenta_pagarGuardarCambios").css("display",credito_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcredito_cuenta_pagarGuardarCambiosToolBar").css("display",credito_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcredito_cuenta_pagarElementos").css("display",credito_cuenta_pagar_control.strVisibleTablaElementos);
		
		jQuery("#trcredito_cuenta_pagarAcciones").css("display",credito_cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trcredito_cuenta_pagarParametrosAcciones").css("display",credito_cuenta_pagar_control.strVisibleTablaAcciones);
			
		jQuery("#tdcredito_cuenta_pagarCerrarPagina").css("display",credito_cuenta_pagar_control.strPermisoPopup);		
		jQuery("#tdcredito_cuenta_pagarCerrarPaginaToolBar").css("display",credito_cuenta_pagar_control.strPermisoPopup);
		//jQuery("#trcredito_cuenta_pagarAccionesRelaciones").css("display",credito_cuenta_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		credito_cuenta_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		credito_cuenta_pagar_webcontrol1.registrarEventosControles();
		
		if(credito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(credito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			credito_cuenta_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(credito_cuenta_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(credito_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				credito_cuenta_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(credito_cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(credito_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				credito_cuenta_pagar_webcontrol1.onLoad();
				
			} else {
				if(credito_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
					if(credito_cuenta_pagar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
						//credito_cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(credito_cuenta_pagar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(credito_cuenta_pagar_constante1.BIG_ID_ACTUAL,"credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);
						//credito_cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			credito_cuenta_pagar_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("credito_cuenta_pagar","cuentaspagar","",credito_cuenta_pagar_funcion1,credito_cuenta_pagar_webcontrol1,credito_cuenta_pagar_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var credito_cuenta_pagar_webcontrol1=new credito_cuenta_pagar_webcontrol();

if(credito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = credito_cuenta_pagar_webcontrol1.onLoadWindow; 
}

//</script>