//<script type="text/javascript" language="javascript">



//var beneficiario_ocacional_chequeJQueryPaginaWebInteraccion= function (beneficiario_ocacional_cheque_control) {
//this.,this.,this.

class beneficiario_ocacional_cheque_webcontrol extends beneficiario_ocacional_cheque_webcontrol_add {
	
	beneficiario_ocacional_cheque_control=null;
	beneficiario_ocacional_cheque_controlInicial=null;
	beneficiario_ocacional_cheque_controlAuxiliar=null;
		
	//if(beneficiario_ocacional_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(beneficiario_ocacional_cheque_control) {
		super();
		
		this.beneficiario_ocacional_cheque_control=beneficiario_ocacional_cheque_control;
	}
		
	actualizarVariablesPagina(beneficiario_ocacional_cheque_control) {
		
		if(beneficiario_ocacional_cheque_control.action=="index" || beneficiario_ocacional_cheque_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(beneficiario_ocacional_cheque_control);
			
		} else if(beneficiario_ocacional_cheque_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(beneficiario_ocacional_cheque_control);
			
		} else if(beneficiario_ocacional_cheque_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(beneficiario_ocacional_cheque_control);
			
		} else if(beneficiario_ocacional_cheque_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(beneficiario_ocacional_cheque_control);		
		
		} else if(beneficiario_ocacional_cheque_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(beneficiario_ocacional_cheque_control);		
		
		} else if(beneficiario_ocacional_cheque_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(beneficiario_ocacional_cheque_control);		
		
		} else if(beneficiario_ocacional_cheque_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(beneficiario_ocacional_cheque_control);		
		}
		else if(beneficiario_ocacional_cheque_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(beneficiario_ocacional_cheque_control);		
		}
		else if(beneficiario_ocacional_cheque_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(beneficiario_ocacional_cheque_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(beneficiario_ocacional_cheque_control.action + " Revisar Manejo");
			
			if(beneficiario_ocacional_cheque_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(beneficiario_ocacional_cheque_control);
				
				return;
			}
			
			//if(beneficiario_ocacional_cheque_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(beneficiario_ocacional_cheque_control);
			//}
			
			if(beneficiario_ocacional_cheque_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(beneficiario_ocacional_cheque_control);
			}
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && beneficiario_ocacional_cheque_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(beneficiario_ocacional_cheque_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(beneficiario_ocacional_cheque_control, false);			
			}
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(beneficiario_ocacional_cheque_control);	
			}
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
			}
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control);
			}
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);
			}
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(beneficiario_ocacional_cheque_control);	
			}
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
			}
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
			}
			
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(beneficiario_ocacional_cheque_control);			
			}
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(beneficiario_ocacional_cheque_control);
			}
			
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(beneficiario_ocacional_cheque_control);
			}
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(beneficiario_ocacional_cheque_control);
			}				
			
			if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(beneficiario_ocacional_cheque_control);
			}
			
			if(beneficiario_ocacional_cheque_control.usuarioActual!=null && beneficiario_ocacional_cheque_control.usuarioActual.field_strUserName!=null &&
			beneficiario_ocacional_cheque_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(beneficiario_ocacional_cheque_control);			
			}
		}
		
		
		if(beneficiario_ocacional_cheque_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(beneficiario_ocacional_cheque_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(beneficiario_ocacional_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaAreaBusquedas(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(beneficiario_ocacional_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaAreaBusquedas(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaAbrirLink(beneficiario_ocacional_cheque_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);				
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		this.onLoadCombosDefectoFK(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		this.onLoadCombosDefectoFK(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		this.onLoadCombosDefectoFK(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaAbrirLink(beneficiario_ocacional_cheque_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaImprimir(beneficiario_ocacional_cheque_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaImprimir(beneficiario_ocacional_cheque_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(beneficiario_ocacional_cheque_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(beneficiario_ocacional_cheque_control) {
		//FORMULARIO
		if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
			this.actualizarPaginaFormularioAdd(beneficiario_ocacional_cheque_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		//COMBOS FK
		if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(beneficiario_ocacional_cheque_control) {
		//FORMULARIO
		if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);	
		//COMBOS FK
		if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(beneficiario_ocacional_cheque_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control) {
		if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && beneficiario_ocacional_cheque_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(beneficiario_ocacional_cheque_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(beneficiario_ocacional_cheque_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(beneficiario_ocacional_cheque_control) {
		if(beneficiario_ocacional_cheque_funcion1.esPaginaForm()==true) {
			window.opener.beneficiario_ocacional_cheque_webcontrol1.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		} else {
			this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		}
	}
	
	actualizarPaginaAbrirLink(beneficiario_ocacional_cheque_control) {
		beneficiario_ocacional_cheque_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(beneficiario_ocacional_cheque_control.strAuxiliarUrlPagina);
				
		beneficiario_ocacional_cheque_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(beneficiario_ocacional_cheque_control.strAuxiliarTipo,beneficiario_ocacional_cheque_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(beneficiario_ocacional_cheque_control) {
		beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivMensaje(true,beneficiario_ocacional_cheque_control.strAuxiliarMensajeAlert,beneficiario_ocacional_cheque_control.strAuxiliarCssMensaje);
			
		if(beneficiario_ocacional_cheque_funcion1.esPaginaForm()==true) {
			window.opener.beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivMensaje(true,beneficiario_ocacional_cheque_control.strAuxiliarMensajeAlert,beneficiario_ocacional_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(beneficiario_ocacional_cheque_control) {
		eval(beneficiario_ocacional_cheque_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(beneficiario_ocacional_cheque_control, mostrar) {
		
		if(mostrar==true) {
			beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			beneficiario_ocacional_cheque_funcion1.mostrarDivMensaje(true,beneficiario_ocacional_cheque_control.strAuxiliarMensaje,beneficiario_ocacional_cheque_control.strAuxiliarCssMensaje);
		
		} else {
			beneficiario_ocacional_cheque_funcion1.mostrarDivMensaje(false,beneficiario_ocacional_cheque_control.strAuxiliarMensaje,beneficiario_ocacional_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(beneficiario_ocacional_cheque_control) {
	
		funcionGeneral.printWebPartPage("beneficiario_ocacional_cheque",beneficiario_ocacional_cheque_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarbeneficiario_ocacional_chequesAjaxWebPart").html(beneficiario_ocacional_cheque_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("beneficiario_ocacional_cheque",jQuery("#divTablaDatosReporteAuxiliarbeneficiario_ocacional_chequesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(beneficiario_ocacional_cheque_control) {
		this.beneficiario_ocacional_cheque_controlInicial=beneficiario_ocacional_cheque_control;
			
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(beneficiario_ocacional_cheque_control.strStyleDivArbol,beneficiario_ocacional_cheque_control.strStyleDivContent
																,beneficiario_ocacional_cheque_control.strStyleDivOpcionesBanner,beneficiario_ocacional_cheque_control.strStyleDivExpandirColapsar
																,beneficiario_ocacional_cheque_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=beneficiario_ocacional_cheque_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",beneficiario_ocacional_cheque_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control) {
		jQuery("#divTablaDatosbeneficiario_ocacional_chequesAjaxWebPart").html(beneficiario_ocacional_cheque_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosbeneficiario_ocacional_cheques=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosbeneficiario_ocacional_cheques=jQuery("#tblTablaDatosbeneficiario_ocacional_cheques").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("beneficiario_ocacional_cheque",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',beneficiario_ocacional_cheque_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			beneficiario_ocacional_cheque_webcontrol1.registrarControlesTableEdition(beneficiario_ocacional_cheque_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		beneficiario_ocacional_cheque_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(beneficiario_ocacional_cheque_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual!=null) {//form
			
			this.actualizarCamposFilaTabla(beneficiario_ocacional_cheque_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control) {
		this.actualizarCssBotonesPagina(beneficiario_ocacional_cheque_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(beneficiario_ocacional_cheque_control.tiposReportes,beneficiario_ocacional_cheque_control.tiposReporte
															 	,beneficiario_ocacional_cheque_control.tiposPaginacion,beneficiario_ocacional_cheque_control.tiposAcciones
																,beneficiario_ocacional_cheque_control.tiposColumnasSelect,beneficiario_ocacional_cheque_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(beneficiario_ocacional_cheque_control.tiposRelaciones,beneficiario_ocacional_cheque_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(beneficiario_ocacional_cheque_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(beneficiario_ocacional_cheque_control);			
	}
	
	actualizarPaginaAreaBusquedas(beneficiario_ocacional_cheque_control) {
		jQuery("#divBusquedabeneficiario_ocacional_chequeAjaxWebPart").css("display",beneficiario_ocacional_cheque_control.strPermisoBusqueda);
		jQuery("#trbeneficiario_ocacional_chequeCabeceraBusquedas").css("display",beneficiario_ocacional_cheque_control.strPermisoBusqueda);
		jQuery("#trBusquedabeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(beneficiario_ocacional_cheque_control.htmlTablaOrderBy!=null
			&& beneficiario_ocacional_cheque_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBybeneficiario_ocacional_chequeAjaxWebPart").html(beneficiario_ocacional_cheque_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//beneficiario_ocacional_cheque_webcontrol1.registrarOrderByActions();
			
		}
			
		if(beneficiario_ocacional_cheque_control.htmlTablaOrderByRel!=null
			&& beneficiario_ocacional_cheque_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelbeneficiario_ocacional_chequeAjaxWebPart").html(beneficiario_ocacional_cheque_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedabeneficiario_ocacional_chequeAjaxWebPart").css("display","none");
			jQuery("#trbeneficiario_ocacional_chequeCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedabeneficiario_ocacional_cheque").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control) {
		jQuery("#tdbeneficiario_ocacional_chequeNuevo").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo);
		jQuery("#trbeneficiario_ocacional_chequeElementos").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaElementos);
		jQuery("#trbeneficiario_ocacional_chequeAcciones").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaAcciones);
		jQuery("#trbeneficiario_ocacional_chequeParametrosAcciones").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(beneficiario_ocacional_cheque_control) {
	
		this.actualizarCssBotonesMantenimiento(beneficiario_ocacional_cheque_control);
				
		if(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual!=null) {//form
			
			this.actualizarCamposFormulario(beneficiario_ocacional_cheque_control);			
		}
						
		this.actualizarSpanMensajesCampos(beneficiario_ocacional_cheque_control);
	}
	
	actualizarPaginaUsuarioInvitado(beneficiario_ocacional_cheque_control) {
	
		var indexPosition=beneficiario_ocacional_cheque_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=beneficiario_ocacional_cheque_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(beneficiario_ocacional_cheque_control) {
		jQuery("#divResumenbeneficiario_ocacional_chequeActualAjaxWebPart").html(beneficiario_ocacional_cheque_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(beneficiario_ocacional_cheque_control) {
		jQuery("#divAccionesRelacionesbeneficiario_ocacional_chequeAjaxWebPart").html(beneficiario_ocacional_cheque_control.htmlTablaAccionesRelaciones);
			
		beneficiario_ocacional_cheque_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(beneficiario_ocacional_cheque_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(beneficiario_ocacional_cheque_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(beneficiario_ocacional_cheque_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionbeneficiario_ocacional_cheque();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("beneficiario_ocacional_cheque",id,"cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(beneficiario_ocacional_cheque_control) {
	
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-id").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.id);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-version_row").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.versionRow);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-codigo").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.codigo);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-nombre").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.nombre);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-direccion_1").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.direccion_1);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-direccion_2").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.direccion_2);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-direccion_3").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.direccion_3);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-telefono").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.telefono);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-telefono_movil").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.telefono_movil);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-email").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.email);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-notas").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.notas);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-registro_ocacional").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.registro_ocacional);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-registro_tributario").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.registro_tributario);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("beneficiario_ocacional_cheque","cuentascorrientes","","form_beneficiario_ocacional_cheque",formulario,"","",paraEventoTabla,idFilaTabla,beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
	}
	
	cargarCombosFK(beneficiario_ocacional_cheque_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(beneficiario_ocacional_cheque_control.strRecargarFkTiposNinguno!=null && beneficiario_ocacional_cheque_control.strRecargarFkTiposNinguno!='NINGUNO' && beneficiario_ocacional_cheque_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(beneficiario_ocacional_cheque_control) {
		jQuery("#spanstrMensajeid").text(beneficiario_ocacional_cheque_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(beneficiario_ocacional_cheque_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(beneficiario_ocacional_cheque_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(beneficiario_ocacional_cheque_control.strMensajenombre);		
		jQuery("#spanstrMensajedireccion_1").text(beneficiario_ocacional_cheque_control.strMensajedireccion_1);		
		jQuery("#spanstrMensajedireccion_2").text(beneficiario_ocacional_cheque_control.strMensajedireccion_2);		
		jQuery("#spanstrMensajedireccion_3").text(beneficiario_ocacional_cheque_control.strMensajedireccion_3);		
		jQuery("#spanstrMensajetelefono").text(beneficiario_ocacional_cheque_control.strMensajetelefono);		
		jQuery("#spanstrMensajetelefono_movil").text(beneficiario_ocacional_cheque_control.strMensajetelefono_movil);		
		jQuery("#spanstrMensajeemail").text(beneficiario_ocacional_cheque_control.strMensajeemail);		
		jQuery("#spanstrMensajenotas").text(beneficiario_ocacional_cheque_control.strMensajenotas);		
		jQuery("#spanstrMensajeregistro_ocacional").text(beneficiario_ocacional_cheque_control.strMensajeregistro_ocacional);		
		jQuery("#spanstrMensajeregistro_tributario").text(beneficiario_ocacional_cheque_control.strMensajeregistro_tributario);		
	}
	
	actualizarCssBotonesMantenimiento(beneficiario_ocacional_cheque_control) {
		jQuery("#tdbtnNuevobeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevobeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarbeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarbeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosbeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncheque").click(function(){

			var idActual=jQuery(this).attr("idactualbeneficiario_ocacional_cheque");

			beneficiario_ocacional_cheque_webcontrol1.registrarSesionParacheques(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(beneficiario_ocacional_cheque_control) {
		var i=0;
		
		i=beneficiario_ocacional_cheque_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.id);
		jQuery("#t-version_row_"+i+"").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.direccion_1);
		jQuery("#t-cel_"+i+"_5").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.direccion_2);
		jQuery("#t-cel_"+i+"_6").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.direccion_3);
		jQuery("#t-cel_"+i+"_7").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.telefono);
		jQuery("#t-cel_"+i+"_8").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.telefono_movil);
		jQuery("#t-cel_"+i+"_9").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.email);
		jQuery("#t-cel_"+i+"_10").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.notas);
		jQuery("#t-cel_"+i+"_11").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.registro_ocacional);
		jQuery("#t-cel_"+i+"_12").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.registro_tributario);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(beneficiario_ocacional_cheque_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncheque").click(function(){
		jQuery("#tblTablaDatosbeneficiario_ocacional_cheques").on("click",".imgrelacioncheque", function () {

			var idActual=jQuery(this).attr("idactualbeneficiario_ocacional_cheque");

			beneficiario_ocacional_cheque_webcontrol1.registrarSesionParacheques(idActual);
		});				
	}
		
	

	registrarSesionParacheques(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"beneficiario_ocacional_cheque","cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(beneficiario_ocacional_cheque_control) {
		beneficiario_ocacional_cheque_funcion1.registrarControlesTableValidacionEdition(beneficiario_ocacional_cheque_control,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_chequeConstante,strParametros);
		
		//beneficiario_ocacional_cheque_funcion1.cancelarOnComplete();
	}	
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//beneficiario_ocacional_cheque_control
		
	
	}
	
	onLoadCombosDefectoFK(beneficiario_ocacional_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(beneficiario_ocacional_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			
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
	onLoadCombosEventosFK(beneficiario_ocacional_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(beneficiario_ocacional_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(beneficiario_ocacional_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(beneficiario_ocacional_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(beneficiario_ocacional_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("beneficiario_ocacional_cheque");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("beneficiario_ocacional_cheque");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(beneficiario_ocacional_cheque_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);			
			
			if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,"beneficiario_ocacional_cheque");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("beneficiario_ocacional_cheque");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			beneficiario_ocacional_cheque_funcion1.validarFormularioJQuery(beneficiario_ocacional_cheque_constante1);
			
			if(beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(beneficiario_ocacional_cheque_control) {
		
		jQuery("#divBusquedabeneficiario_ocacional_chequeAjaxWebPart").css("display",beneficiario_ocacional_cheque_control.strPermisoBusqueda);
		jQuery("#trbeneficiario_ocacional_chequeCabeceraBusquedas").css("display",beneficiario_ocacional_cheque_control.strPermisoBusqueda);
		jQuery("#trBusquedabeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportebeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosbeneficiario_ocacional_cheque").attr("style",beneficiario_ocacional_cheque_control.strPermisoMostrarTodos);
		
		if(beneficiario_ocacional_cheque_control.strPermisoNuevo!=null) {
			jQuery("#tdbeneficiario_ocacional_chequeNuevo").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo);
			jQuery("#tdbeneficiario_ocacional_chequeNuevoToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdbeneficiario_ocacional_chequeDuplicar").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdbeneficiario_ocacional_chequeDuplicarToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdbeneficiario_ocacional_chequeNuevoGuardarCambios").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo);
			jQuery("#tdbeneficiario_ocacional_chequeNuevoGuardarCambiosToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(beneficiario_ocacional_cheque_control.strPermisoActualizar!=null) {
			jQuery("#tdbeneficiario_ocacional_chequeActualizarToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbeneficiario_ocacional_chequeCopiar").css("display",beneficiario_ocacional_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbeneficiario_ocacional_chequeCopiarToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbeneficiario_ocacional_chequeConEditar").css("display",beneficiario_ocacional_cheque_control.strPermisoActualizar);
		}
		
		jQuery("#tdbeneficiario_ocacional_chequeEliminarToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdbeneficiario_ocacional_chequeGuardarCambios").css("display",beneficiario_ocacional_cheque_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdbeneficiario_ocacional_chequeGuardarCambiosToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trbeneficiario_ocacional_chequeElementos").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaElementos);
		
		jQuery("#trbeneficiario_ocacional_chequeAcciones").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaAcciones);
		jQuery("#trbeneficiario_ocacional_chequeParametrosAcciones").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaAcciones);
			
		jQuery("#tdbeneficiario_ocacional_chequeCerrarPagina").css("display",beneficiario_ocacional_cheque_control.strPermisoPopup);		
		jQuery("#tdbeneficiario_ocacional_chequeCerrarPaginaToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoPopup);
		//jQuery("#trbeneficiario_ocacional_chequeAccionesRelaciones").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		beneficiario_ocacional_cheque_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		beneficiario_ocacional_cheque_webcontrol1.registrarEventosControles();
		
		if(beneficiario_ocacional_cheque_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
			beneficiario_ocacional_cheque_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONES=="true") {
			if(beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				beneficiario_ocacional_cheque_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(beneficiario_ocacional_cheque_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				beneficiario_ocacional_cheque_webcontrol1.onLoad();
				
			} else {
				if(beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
					if(beneficiario_ocacional_cheque_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
						//beneficiario_ocacional_cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(beneficiario_ocacional_cheque_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(beneficiario_ocacional_cheque_constante1.BIG_ID_ACTUAL,"beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
						//beneficiario_ocacional_cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			beneficiario_ocacional_cheque_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var beneficiario_ocacional_cheque_webcontrol1=new beneficiario_ocacional_cheque_webcontrol();

if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = beneficiario_ocacional_cheque_webcontrol1.onLoadWindow; 
}

//</script>