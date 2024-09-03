//<script type="text/javascript" language="javascript">



//var debito_cuenta_pagarJQueryPaginaWebInteraccion= function (debito_cuenta_pagar_control) {
//this.,this.,this.

class debito_cuenta_pagar_webcontrol extends debito_cuenta_pagar_webcontrol_add {
	
	debito_cuenta_pagar_control=null;
	debito_cuenta_pagar_controlInicial=null;
	debito_cuenta_pagar_controlAuxiliar=null;
		
	//if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(debito_cuenta_pagar_control) {
		super();
		
		this.debito_cuenta_pagar_control=debito_cuenta_pagar_control;
	}
		
	actualizarVariablesPagina(debito_cuenta_pagar_control) {
		
		if(debito_cuenta_pagar_control.action=="index" || debito_cuenta_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(debito_cuenta_pagar_control);
			
		} else if(debito_cuenta_pagar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(debito_cuenta_pagar_control);
			
		} else if(debito_cuenta_pagar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(debito_cuenta_pagar_control);
			
		} else if(debito_cuenta_pagar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(debito_cuenta_pagar_control);		
		
		} else if(debito_cuenta_pagar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(debito_cuenta_pagar_control);		
		
		} else if(debito_cuenta_pagar_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(debito_cuenta_pagar_control);		
		
		} else if(debito_cuenta_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(debito_cuenta_pagar_control);		
		}
		else if(debito_cuenta_pagar_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(debito_cuenta_pagar_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(debito_cuenta_pagar_control.action + " Revisar Manejo");
			
			if(debito_cuenta_pagar_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(debito_cuenta_pagar_control);
				
				return;
			}
			
			//if(debito_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(debito_cuenta_pagar_control);
			//}
			
			if(debito_cuenta_pagar_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(debito_cuenta_pagar_control);
			}
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && debito_cuenta_pagar_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(debito_cuenta_pagar_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(debito_cuenta_pagar_control, false);			
			}
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(debito_cuenta_pagar_control);	
			}
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
			}
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control);
			}
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);
			}
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(debito_cuenta_pagar_control);	
			}
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
			}
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
			}
			
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(debito_cuenta_pagar_control);			
			}
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(debito_cuenta_pagar_control);
			}
			
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_pagar_control);
			}
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(debito_cuenta_pagar_control);
			}				
			
			if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(debito_cuenta_pagar_control);
			}
			
			if(debito_cuenta_pagar_control.usuarioActual!=null && debito_cuenta_pagar_control.usuarioActual.field_strUserName!=null &&
			debito_cuenta_pagar_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(debito_cuenta_pagar_control);			
			}
		}
		
		
		if(debito_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(debito_cuenta_pagar_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(debito_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(debito_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(debito_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(debito_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(debito_cuenta_pagar_control) {
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(debito_cuenta_pagar_control) {
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(debito_cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(debito_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(debito_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);				
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(debito_cuenta_pagar_control) {
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(debito_cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(debito_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(debito_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(debito_cuenta_pagar_control) {
		this.actualizarPaginaImprimir(debito_cuenta_pagar_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(debito_cuenta_pagar_control) {
		this.actualizarPaginaImprimir(debito_cuenta_pagar_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(debito_cuenta_pagar_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(debito_cuenta_pagar_control) {
		//FORMULARIO
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
			this.actualizarPaginaFormularioAdd(debito_cuenta_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		//COMBOS FK
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(debito_cuenta_pagar_control) {
		//FORMULARIO
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);	
		//COMBOS FK
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(debito_cuenta_pagar_control) {
		//FORMULARIO
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(debito_cuenta_pagar_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(debito_cuenta_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);	
		//COMBOS FK
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control) {
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && debito_cuenta_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(debito_cuenta_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(debito_cuenta_pagar_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(debito_cuenta_pagar_control) {
		if(debito_cuenta_pagar_funcion1.esPaginaForm()==true) {
			window.opener.debito_cuenta_pagar_webcontrol1.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(debito_cuenta_pagar_control) {
		debito_cuenta_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(debito_cuenta_pagar_control.strAuxiliarUrlPagina);
				
		debito_cuenta_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(debito_cuenta_pagar_control.strAuxiliarTipo,debito_cuenta_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(debito_cuenta_pagar_control) {
		debito_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,debito_cuenta_pagar_control.strAuxiliarMensajeAlert,debito_cuenta_pagar_control.strAuxiliarCssMensaje);
			
		if(debito_cuenta_pagar_funcion1.esPaginaForm()==true) {
			window.opener.debito_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,debito_cuenta_pagar_control.strAuxiliarMensajeAlert,debito_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(debito_cuenta_pagar_control) {
		eval(debito_cuenta_pagar_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(debito_cuenta_pagar_control, mostrar) {
		
		if(mostrar==true) {
			debito_cuenta_pagar_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				debito_cuenta_pagar_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			debito_cuenta_pagar_funcion1.mostrarDivMensaje(true,debito_cuenta_pagar_control.strAuxiliarMensaje,debito_cuenta_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			debito_cuenta_pagar_funcion1.mostrarDivMensaje(false,debito_cuenta_pagar_control.strAuxiliarMensaje,debito_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(debito_cuenta_pagar_control) {
	
		funcionGeneral.printWebPartPage("debito_cuenta_pagar",debito_cuenta_pagar_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliardebito_cuenta_pagarsAjaxWebPart").html(debito_cuenta_pagar_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("debito_cuenta_pagar",jQuery("#divTablaDatosReporteAuxiliardebito_cuenta_pagarsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(debito_cuenta_pagar_control) {
		this.debito_cuenta_pagar_controlInicial=debito_cuenta_pagar_control;
			
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(debito_cuenta_pagar_control.strStyleDivArbol,debito_cuenta_pagar_control.strStyleDivContent
																,debito_cuenta_pagar_control.strStyleDivOpcionesBanner,debito_cuenta_pagar_control.strStyleDivExpandirColapsar
																,debito_cuenta_pagar_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=debito_cuenta_pagar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",debito_cuenta_pagar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(debito_cuenta_pagar_control) {
		jQuery("#divTablaDatosdebito_cuenta_pagarsAjaxWebPart").html(debito_cuenta_pagar_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdebito_cuenta_pagars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdebito_cuenta_pagars=jQuery("#tblTablaDatosdebito_cuenta_pagars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("debito_cuenta_pagar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',debito_cuenta_pagar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			debito_cuenta_pagar_webcontrol1.registrarControlesTableEdition(debito_cuenta_pagar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		debito_cuenta_pagar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(debito_cuenta_pagar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(debito_cuenta_pagar_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control) {
		this.actualizarCssBotonesPagina(debito_cuenta_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(debito_cuenta_pagar_control.tiposReportes,debito_cuenta_pagar_control.tiposReporte
															 	,debito_cuenta_pagar_control.tiposPaginacion,debito_cuenta_pagar_control.tiposAcciones
																,debito_cuenta_pagar_control.tiposColumnasSelect,debito_cuenta_pagar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(debito_cuenta_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(debito_cuenta_pagar_control);			
	}
	
	actualizarPaginaAreaBusquedas(debito_cuenta_pagar_control) {
		jQuery("#divBusquedadebito_cuenta_pagarAjaxWebPart").css("display",debito_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trdebito_cuenta_pagarCabeceraBusquedas").css("display",debito_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedadebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(debito_cuenta_pagar_control.htmlTablaOrderBy!=null
			&& debito_cuenta_pagar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydebito_cuenta_pagarAjaxWebPart").html(debito_cuenta_pagar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//debito_cuenta_pagar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(debito_cuenta_pagar_control.htmlTablaOrderByRel!=null
			&& debito_cuenta_pagar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldebito_cuenta_pagarAjaxWebPart").html(debito_cuenta_pagar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadebito_cuenta_pagarAjaxWebPart").css("display","none");
			jQuery("#trdebito_cuenta_pagarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadebito_cuenta_pagar").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control) {
		jQuery("#tddebito_cuenta_pagarNuevo").css("display",debito_cuenta_pagar_control.strPermisoNuevo);
		jQuery("#trdebito_cuenta_pagarElementos").css("display",debito_cuenta_pagar_control.strVisibleTablaElementos);
		jQuery("#trdebito_cuenta_pagarAcciones").css("display",debito_cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trdebito_cuenta_pagarParametrosAcciones").css("display",debito_cuenta_pagar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(debito_cuenta_pagar_control) {
	
		this.actualizarCssBotonesMantenimiento(debito_cuenta_pagar_control);
				
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFormulario(debito_cuenta_pagar_control);			
		}
						
		this.actualizarSpanMensajesCampos(debito_cuenta_pagar_control);
	}
	
	actualizarPaginaUsuarioInvitado(debito_cuenta_pagar_control) {
	
		var indexPosition=debito_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=debito_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(debito_cuenta_pagar_control) {
		jQuery("#divResumendebito_cuenta_pagarActualAjaxWebPart").html(debito_cuenta_pagar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(debito_cuenta_pagar_control) {
		jQuery("#divAccionesRelacionesdebito_cuenta_pagarAjaxWebPart").html(debito_cuenta_pagar_control.htmlTablaAccionesRelaciones);
			
		debito_cuenta_pagar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_pagar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(debito_cuenta_pagar_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(debito_cuenta_pagar_control) {
		
		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idcuenta_pagar);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idcuenta_pagar);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idejercicio);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idempresa);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idestado);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idperiodo);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idsucursal);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondebito_cuenta_pagar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("debito_cuenta_pagar",id,"cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","empresa","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","sucursal","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","ejercicio","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","periodo","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","usuario","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParacuenta_pagar(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","estado","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(debito_cuenta_pagar_control) {
	
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-version_row").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.versionRow);
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-numero").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.numero);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-fecha_emision").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.fecha_emision);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-fecha_vence").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.fecha_vence);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-referencia").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.referencia);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-abono").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.abono);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-saldo").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.saldo);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-descripcion").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.descripcion);
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-debito").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.debito);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-credito").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.credito);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+debito_cuenta_pagar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("debito_cuenta_pagar","cuentaspagar","","form_debito_cuenta_pagar",formulario,"","",paraEventoTabla,idFilaTabla,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}
	
	cargarCombosFK(debito_cuenta_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosempresasFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarComboscuenta_pagarsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosestadosFK(debito_cuenta_pagar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!=null && debito_cuenta_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && debito_cuenta_pagar_control.strRecargarFkTiposNinguno!='') {
			
				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosempresasFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_pagar",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarComboscuenta_pagarsFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosestadosFK(debito_cuenta_pagar_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(debito_cuenta_pagar_control) {
		jQuery("#spanstrMensajeid").text(debito_cuenta_pagar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(debito_cuenta_pagar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(debito_cuenta_pagar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(debito_cuenta_pagar_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(debito_cuenta_pagar_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(debito_cuenta_pagar_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(debito_cuenta_pagar_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_cuenta_pagar").text(debito_cuenta_pagar_control.strMensajeid_cuenta_pagar);		
		jQuery("#spanstrMensajenumero").text(debito_cuenta_pagar_control.strMensajenumero);		
		jQuery("#spanstrMensajefecha_emision").text(debito_cuenta_pagar_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajefecha_vence").text(debito_cuenta_pagar_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajereferencia").text(debito_cuenta_pagar_control.strMensajereferencia);		
		jQuery("#spanstrMensajeabono").text(debito_cuenta_pagar_control.strMensajeabono);		
		jQuery("#spanstrMensajesaldo").text(debito_cuenta_pagar_control.strMensajesaldo);		
		jQuery("#spanstrMensajedescripcion").text(debito_cuenta_pagar_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_estado").text(debito_cuenta_pagar_control.strMensajeid_estado);		
		jQuery("#spanstrMensajedebito").text(debito_cuenta_pagar_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(debito_cuenta_pagar_control.strMensajecredito);		
	}
	
	actualizarCssBotonesMantenimiento(debito_cuenta_pagar_control) {
		jQuery("#tdbtnNuevodebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_pagarFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.cuenta_pagarsFK);
	}

	cargarComboEditarTablaestadoFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(debito_cuenta_pagar_control) {
		var i=0;
		
		i=debito_cuenta_pagar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id);
		jQuery("#t-version_row_"+i+"").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.versionRow);
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar) {
				jQuery("#t-cel_"+i+"_7").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.numero);
		jQuery("#t-cel_"+i+"_9").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_10").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.fecha_vence);
		jQuery("#t-cel_"+i+"_11").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.referencia);
		jQuery("#t-cel_"+i+"_12").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.abono);
		jQuery("#t-cel_"+i+"_13").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.saldo);
		jQuery("#t-cel_"+i+"_14").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.descripcion);
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_15").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado) {
				jQuery("#t-cel_"+i+"_15").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_15").select2("val", null);
			if(jQuery("#t-cel_"+i+"_15").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_15").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_16").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.debito);
		jQuery("#t-cel_"+i+"_17").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.credito);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(debito_cuenta_pagar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(debito_cuenta_pagar_control) {
		debito_cuenta_pagar_funcion1.registrarControlesTableValidacionEdition(debito_cuenta_pagar_control,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagarConstante,strParametros);
		
		//debito_cuenta_pagar_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa",debito_cuenta_pagar_control.empresasFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_2",debito_cuenta_pagar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal",debito_cuenta_pagar_control.sucursalsFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_3",debito_cuenta_pagar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio",debito_cuenta_pagar_control.ejerciciosFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_4",debito_cuenta_pagar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo",debito_cuenta_pagar_control.periodosFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_5",debito_cuenta_pagar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario",debito_cuenta_pagar_control.usuariosFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_6",debito_cuenta_pagar_control.usuariosFK);
		}
	};

	cargarComboscuenta_pagarsFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar",debito_cuenta_pagar_control.cuenta_pagarsFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_7",debito_cuenta_pagar_control.cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar",debito_cuenta_pagar_control.cuenta_pagarsFK);

	};

	cargarCombosestadosFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado",debito_cuenta_pagar_control.estadosFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_15",debito_cuenta_pagar_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",debito_cuenta_pagar_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeComboscuenta_pagarsFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosestadosFK(debito_cuenta_pagar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idempresaDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != debito_cuenta_pagar_control.idempresaDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(debito_cuenta_pagar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idsucursalDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != debito_cuenta_pagar_control.idsucursalDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(debito_cuenta_pagar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idejercicioDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != debito_cuenta_pagar_control.idejercicioDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(debito_cuenta_pagar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idperiodoDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != debito_cuenta_pagar_control.idperiodoDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(debito_cuenta_pagar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idusuarioDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != debito_cuenta_pagar_control.idusuarioDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(debito_cuenta_pagar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_pagarsFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idcuenta_pagarDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != debito_cuenta_pagar_control.idcuenta_pagarDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(debito_cuenta_pagar_control.idcuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(debito_cuenta_pagar_control.idcuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idestadoDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != debito_cuenta_pagar_control.idestadoDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(debito_cuenta_pagar_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(debito_cuenta_pagar_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//debito_cuenta_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(debito_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosempresasFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombossucursalsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosejerciciosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosperiodosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosusuariosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorComboscuenta_pagarsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosestadosFK(debito_cuenta_pagar_control);
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
	onLoadCombosEventosFK(debito_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosempresasFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombossucursalsFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosperiodosFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosusuariosFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeComboscuenta_pagarsFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosestadosFK(debito_cuenta_pagar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(debito_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("debito_cuenta_pagar");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("debito_cuenta_pagar");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(debito_cuenta_pagar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);			
			
			if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,"debito_cuenta_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_pagar","id_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParacuenta_pagar("id_cuenta_pagar");
				//alert(jQuery('#form-id_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idcuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idejercicio","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idempresa","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idestado","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idperiodo","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idsucursal","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idusuario","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			debito_cuenta_pagar_funcion1.validarFormularioJQuery(debito_cuenta_pagar_constante1);
			
			if(debito_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(debito_cuenta_pagar_control) {
		
		jQuery("#divBusquedadebito_cuenta_pagarAjaxWebPart").css("display",debito_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trdebito_cuenta_pagarCabeceraBusquedas").css("display",debito_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedadebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdebito_cuenta_pagar").attr("style",debito_cuenta_pagar_control.strPermisoMostrarTodos);
		
		if(debito_cuenta_pagar_control.strPermisoNuevo!=null) {
			jQuery("#tddebito_cuenta_pagarNuevo").css("display",debito_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tddebito_cuenta_pagarNuevoToolBar").css("display",debito_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddebito_cuenta_pagarDuplicar").css("display",debito_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddebito_cuenta_pagarDuplicarToolBar").css("display",debito_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddebito_cuenta_pagarNuevoGuardarCambios").css("display",debito_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tddebito_cuenta_pagarNuevoGuardarCambiosToolBar").css("display",debito_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(debito_cuenta_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tddebito_cuenta_pagarActualizarToolBar").css("display",debito_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddebito_cuenta_pagarCopiar").css("display",debito_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddebito_cuenta_pagarCopiarToolBar").css("display",debito_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddebito_cuenta_pagarConEditar").css("display",debito_cuenta_pagar_control.strPermisoActualizar);
		}
		
		jQuery("#tddebito_cuenta_pagarEliminarToolBar").css("display",debito_cuenta_pagar_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tddebito_cuenta_pagarGuardarCambios").css("display",debito_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddebito_cuenta_pagarGuardarCambiosToolBar").css("display",debito_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trdebito_cuenta_pagarElementos").css("display",debito_cuenta_pagar_control.strVisibleTablaElementos);
		
		jQuery("#trdebito_cuenta_pagarAcciones").css("display",debito_cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trdebito_cuenta_pagarParametrosAcciones").css("display",debito_cuenta_pagar_control.strVisibleTablaAcciones);
			
		jQuery("#tddebito_cuenta_pagarCerrarPagina").css("display",debito_cuenta_pagar_control.strPermisoPopup);		
		jQuery("#tddebito_cuenta_pagarCerrarPaginaToolBar").css("display",debito_cuenta_pagar_control.strPermisoPopup);
		//jQuery("#trdebito_cuenta_pagarAccionesRelaciones").css("display",debito_cuenta_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		debito_cuenta_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		debito_cuenta_pagar_webcontrol1.registrarEventosControles();
		
		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			debito_cuenta_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(debito_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				debito_cuenta_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(debito_cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(debito_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				debito_cuenta_pagar_webcontrol1.onLoad();
				
			} else {
				if(debito_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
					if(debito_cuenta_pagar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
						//debito_cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(debito_cuenta_pagar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(debito_cuenta_pagar_constante1.BIG_ID_ACTUAL,"debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
						//debito_cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			debito_cuenta_pagar_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var debito_cuenta_pagar_webcontrol1=new debito_cuenta_pagar_webcontrol();

if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = debito_cuenta_pagar_webcontrol1.onLoadWindow; 
}

//</script>