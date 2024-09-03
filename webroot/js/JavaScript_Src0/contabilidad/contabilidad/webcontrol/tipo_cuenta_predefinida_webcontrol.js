//<script type="text/javascript" language="javascript">



//var tipo_cuenta_predefinidaJQueryPaginaWebInteraccion= function (tipo_cuenta_predefinida_control) {
//this.,this.,this.

class tipo_cuenta_predefinida_webcontrol extends tipo_cuenta_predefinida_webcontrol_add {
	
	tipo_cuenta_predefinida_control=null;
	tipo_cuenta_predefinida_controlInicial=null;
	tipo_cuenta_predefinida_controlAuxiliar=null;
		
	//if(tipo_cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_cuenta_predefinida_control) {
		super();
		
		this.tipo_cuenta_predefinida_control=tipo_cuenta_predefinida_control;
	}
		
	actualizarVariablesPagina(tipo_cuenta_predefinida_control) {
		
		if(tipo_cuenta_predefinida_control.action=="index" || tipo_cuenta_predefinida_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_cuenta_predefinida_control);
			
		} else if(tipo_cuenta_predefinida_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(tipo_cuenta_predefinida_control);
			
		} else if(tipo_cuenta_predefinida_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(tipo_cuenta_predefinida_control);
			
		} else if(tipo_cuenta_predefinida_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_cuenta_predefinida_control);		
		
		} else if(tipo_cuenta_predefinida_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tipo_cuenta_predefinida_control);		
		
		} else if(tipo_cuenta_predefinida_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_cuenta_predefinida_control);		
		
		} else if(tipo_cuenta_predefinida_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_cuenta_predefinida_control);		
		}
		else if(tipo_cuenta_predefinida_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_cuenta_predefinida_control);		
		}
		else if(tipo_cuenta_predefinida_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_cuenta_predefinida_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(tipo_cuenta_predefinida_control.action + " Revisar Manejo");
			
			if(tipo_cuenta_predefinida_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(tipo_cuenta_predefinida_control);
				
				return;
			}
			
			//if(tipo_cuenta_predefinida_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(tipo_cuenta_predefinida_control);
			//}
			
			if(tipo_cuenta_predefinida_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(tipo_cuenta_predefinida_control);
			}
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_cuenta_predefinida_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(tipo_cuenta_predefinida_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(tipo_cuenta_predefinida_control, false);			
			}
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(tipo_cuenta_predefinida_control);	
			}
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);
			}
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(tipo_cuenta_predefinida_control);
			}
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control);
			}
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(tipo_cuenta_predefinida_control);	
			}
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
			}
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);
			}
			
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(tipo_cuenta_predefinida_control);			
			}
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(tipo_cuenta_predefinida_control);
			}
			
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(tipo_cuenta_predefinida_control);
			}
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(tipo_cuenta_predefinida_control);
			}				
			
			if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_cuenta_predefinida_control);
			}
			
			if(tipo_cuenta_predefinida_control.usuarioActual!=null && tipo_cuenta_predefinida_control.usuarioActual.field_strUserName!=null &&
			tipo_cuenta_predefinida_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(tipo_cuenta_predefinida_control);			
			}
		}
		
		
		if(tipo_cuenta_predefinida_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_cuenta_predefinida_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(tipo_cuenta_predefinida_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_cuenta_predefinida_control);
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);
		this.actualizarPaginaCargaGeneralControles(tipo_cuenta_predefinida_control);
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_cuenta_predefinida_control);
		this.actualizarPaginaAreaBusquedas(tipo_cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_cuenta_predefinida_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_cuenta_predefinida_control);
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);
		this.actualizarPaginaCargaGeneralControles(tipo_cuenta_predefinida_control);
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_cuenta_predefinida_control);
		this.actualizarPaginaAreaBusquedas(tipo_cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control);
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaAbrirLink(tipo_cuenta_predefinida_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);				
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);
		this.onLoadCombosDefectoFK(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);
		this.onLoadCombosDefectoFK(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control);
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);
		this.onLoadCombosDefectoFK(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaAbrirLink(tipo_cuenta_predefinida_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaImprimir(tipo_cuenta_predefinida_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaImprimir(tipo_cuenta_predefinida_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_cuenta_predefinida_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_cuenta_predefinida_control) {
		//FORMULARIO
		if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);
			this.actualizarPaginaFormularioAdd(tipo_cuenta_predefinida_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		//COMBOS FK
		if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_cuenta_predefinida_control) {
		//FORMULARIO
		if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);	
		//COMBOS FK
		if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_cuenta_predefinida_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control) {
		if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_cuenta_predefinida_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_cuenta_predefinida_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_cuenta_predefinida_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_cuenta_predefinida_control) {
		if(tipo_cuenta_predefinida_funcion1.esPaginaForm()==true) {
			window.opener.tipo_cuenta_predefinida_webcontrol1.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_cuenta_predefinida_control) {
		tipo_cuenta_predefinida_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_cuenta_predefinida_control.strAuxiliarUrlPagina);
				
		tipo_cuenta_predefinida_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_cuenta_predefinida_control.strAuxiliarTipo,tipo_cuenta_predefinida_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_cuenta_predefinida_control) {
		tipo_cuenta_predefinida_funcion1.resaltarRestaurarDivMensaje(true,tipo_cuenta_predefinida_control.strAuxiliarMensajeAlert,tipo_cuenta_predefinida_control.strAuxiliarCssMensaje);
			
		if(tipo_cuenta_predefinida_funcion1.esPaginaForm()==true) {
			window.opener.tipo_cuenta_predefinida_funcion1.resaltarRestaurarDivMensaje(true,tipo_cuenta_predefinida_control.strAuxiliarMensajeAlert,tipo_cuenta_predefinida_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(tipo_cuenta_predefinida_control) {
		eval(tipo_cuenta_predefinida_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(tipo_cuenta_predefinida_control, mostrar) {
		
		if(mostrar==true) {
			tipo_cuenta_predefinida_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_cuenta_predefinida_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			tipo_cuenta_predefinida_funcion1.mostrarDivMensaje(true,tipo_cuenta_predefinida_control.strAuxiliarMensaje,tipo_cuenta_predefinida_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_cuenta_predefinida_funcion1.mostrarDivMensaje(false,tipo_cuenta_predefinida_control.strAuxiliarMensaje,tipo_cuenta_predefinida_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(tipo_cuenta_predefinida_control) {
	
		funcionGeneral.printWebPartPage("tipo_cuenta_predefinida",tipo_cuenta_predefinida_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliartipo_cuenta_predefinidasAjaxWebPart").html(tipo_cuenta_predefinida_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("tipo_cuenta_predefinida",jQuery("#divTablaDatosReporteAuxiliartipo_cuenta_predefinidasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(tipo_cuenta_predefinida_control) {
		this.tipo_cuenta_predefinida_controlInicial=tipo_cuenta_predefinida_control;
			
		if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_cuenta_predefinida_control.strStyleDivArbol,tipo_cuenta_predefinida_control.strStyleDivContent
																,tipo_cuenta_predefinida_control.strStyleDivOpcionesBanner,tipo_cuenta_predefinida_control.strStyleDivExpandirColapsar
																,tipo_cuenta_predefinida_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=tipo_cuenta_predefinida_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tipo_cuenta_predefinida_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control) {
		jQuery("#divTablaDatostipo_cuenta_predefinidasAjaxWebPart").html(tipo_cuenta_predefinida_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostipo_cuenta_predefinidas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostipo_cuenta_predefinidas=jQuery("#tblTablaDatostipo_cuenta_predefinidas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tipo_cuenta_predefinida",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tipo_cuenta_predefinida_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tipo_cuenta_predefinida_webcontrol1.registrarControlesTableEdition(tipo_cuenta_predefinida_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tipo_cuenta_predefinida_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(tipo_cuenta_predefinida_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(tipo_cuenta_predefinida_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(tipo_cuenta_predefinida_control) {
		this.actualizarCssBotonesPagina(tipo_cuenta_predefinida_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_cuenta_predefinida_control.tiposReportes,tipo_cuenta_predefinida_control.tiposReporte
															 	,tipo_cuenta_predefinida_control.tiposPaginacion,tipo_cuenta_predefinida_control.tiposAcciones
																,tipo_cuenta_predefinida_control.tiposColumnasSelect,tipo_cuenta_predefinida_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_cuenta_predefinida_control.tiposRelaciones,tipo_cuenta_predefinida_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_cuenta_predefinida_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_cuenta_predefinida_control);			
	}
	
	actualizarPaginaAreaBusquedas(tipo_cuenta_predefinida_control) {
		jQuery("#divBusquedatipo_cuenta_predefinidaAjaxWebPart").css("display",tipo_cuenta_predefinida_control.strPermisoBusqueda);
		jQuery("#trtipo_cuenta_predefinidaCabeceraBusquedas").css("display",tipo_cuenta_predefinida_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_cuenta_predefinida").css("display",tipo_cuenta_predefinida_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tipo_cuenta_predefinida_control.htmlTablaOrderBy!=null
			&& tipo_cuenta_predefinida_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytipo_cuenta_predefinidaAjaxWebPart").html(tipo_cuenta_predefinida_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tipo_cuenta_predefinida_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tipo_cuenta_predefinida_control.htmlTablaOrderByRel!=null
			&& tipo_cuenta_predefinida_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltipo_cuenta_predefinidaAjaxWebPart").html(tipo_cuenta_predefinida_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatipo_cuenta_predefinidaAjaxWebPart").css("display","none");
			jQuery("#trtipo_cuenta_predefinidaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatipo_cuenta_predefinida").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control) {
		jQuery("#tdtipo_cuenta_predefinidaNuevo").css("display",tipo_cuenta_predefinida_control.strPermisoNuevo);
		jQuery("#trtipo_cuenta_predefinidaElementos").css("display",tipo_cuenta_predefinida_control.strVisibleTablaElementos);
		jQuery("#trtipo_cuenta_predefinidaAcciones").css("display",tipo_cuenta_predefinida_control.strVisibleTablaAcciones);
		jQuery("#trtipo_cuenta_predefinidaParametrosAcciones").css("display",tipo_cuenta_predefinida_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tipo_cuenta_predefinida_control) {
	
		this.actualizarCssBotonesMantenimiento(tipo_cuenta_predefinida_control);
				
		if(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual!=null) {//form
			
			this.actualizarCamposFormulario(tipo_cuenta_predefinida_control);			
		}
						
		this.actualizarSpanMensajesCampos(tipo_cuenta_predefinida_control);
	}
	
	actualizarPaginaUsuarioInvitado(tipo_cuenta_predefinida_control) {
	
		var indexPosition=tipo_cuenta_predefinida_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_cuenta_predefinida_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(tipo_cuenta_predefinida_control) {
		jQuery("#divResumentipo_cuenta_predefinidaActualAjaxWebPart").html(tipo_cuenta_predefinida_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_cuenta_predefinida_control) {
		jQuery("#divAccionesRelacionestipo_cuenta_predefinidaAjaxWebPart").html(tipo_cuenta_predefinida_control.htmlTablaAccionesRelaciones);
			
		tipo_cuenta_predefinida_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tipo_cuenta_predefinida_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(tipo_cuenta_predefinida_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tipo_cuenta_predefinida_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontipo_cuenta_predefinida();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tipo_cuenta_predefinida",id,"contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_cuenta_predefinida_control) {
	
		jQuery("#form"+tipo_cuenta_predefinida_constante1.STR_SUFIJO+"-id").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.id);
		jQuery("#form"+tipo_cuenta_predefinida_constante1.STR_SUFIJO+"-version_row").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.versionRow);
		jQuery("#form"+tipo_cuenta_predefinida_constante1.STR_SUFIJO+"-codigo").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.codigo);
		jQuery("#form"+tipo_cuenta_predefinida_constante1.STR_SUFIJO+"-nombre").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.nombre);
		jQuery("#form"+tipo_cuenta_predefinida_constante1.STR_SUFIJO+"-descripcion").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.descripcion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_cuenta_predefinida_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_cuenta_predefinida","contabilidad","","form_tipo_cuenta_predefinida",formulario,"","",paraEventoTabla,idFilaTabla,tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
	}
	
	cargarCombosFK(tipo_cuenta_predefinida_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_cuenta_predefinida_control.strRecargarFkTiposNinguno!=null && tipo_cuenta_predefinida_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_cuenta_predefinida_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(tipo_cuenta_predefinida_control) {
		jQuery("#spanstrMensajeid").text(tipo_cuenta_predefinida_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tipo_cuenta_predefinida_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(tipo_cuenta_predefinida_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_cuenta_predefinida_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(tipo_cuenta_predefinida_control.strMensajedescripcion);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_cuenta_predefinida_control) {
		jQuery("#tdbtnNuevotipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_cuenta_predefinida").css("display",tipo_cuenta_predefinida_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_cuenta_predefinida").css("display",tipo_cuenta_predefinida_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_cuenta_predefinida").css("display",tipo_cuenta_predefinida_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_cuenta_predefinida").css("display",tipo_cuenta_predefinida_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncuenta_predefinida").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_cuenta_predefinida");

			tipo_cuenta_predefinida_webcontrol1.registrarSesionParacuenta_predefinidaes(idActual);
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

	actualizarCamposFilaTabla(tipo_cuenta_predefinida_control) {
		var i=0;
		
		i=tipo_cuenta_predefinida_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.id);
		jQuery("#t-version_row_"+i+"").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.descripcion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tipo_cuenta_predefinida_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_predefinida").click(function(){
		jQuery("#tblTablaDatostipo_cuenta_predefinidas").on("click",".imgrelacioncuenta_predefinida", function () {

			var idActual=jQuery(this).attr("idactualtipo_cuenta_predefinida");

			tipo_cuenta_predefinida_webcontrol1.registrarSesionParacuenta_predefinidaes(idActual);
		});				
	}
		
	

	registrarSesionParacuenta_predefinidaes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_cuenta_predefinida","cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(tipo_cuenta_predefinida_control) {
		tipo_cuenta_predefinida_funcion1.registrarControlesTableValidacionEdition(tipo_cuenta_predefinida_control,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinidaConstante,strParametros);
		
		//tipo_cuenta_predefinida_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_cuenta_predefinida_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tipo_cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_cuenta_predefinida");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_cuenta_predefinida");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tipo_cuenta_predefinida_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);			
			
			if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,"tipo_cuenta_predefinida");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tipo_cuenta_predefinida");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			tipo_cuenta_predefinida_funcion1.validarFormularioJQuery(tipo_cuenta_predefinida_constante1);
			
			if(tipo_cuenta_predefinida_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_cuenta_predefinida_control) {
		
		jQuery("#divBusquedatipo_cuenta_predefinidaAjaxWebPart").css("display",tipo_cuenta_predefinida_control.strPermisoBusqueda);
		jQuery("#trtipo_cuenta_predefinidaCabeceraBusquedas").css("display",tipo_cuenta_predefinida_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_cuenta_predefinida").css("display",tipo_cuenta_predefinida_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetipo_cuenta_predefinida").css("display",tipo_cuenta_predefinida_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostipo_cuenta_predefinida").attr("style",tipo_cuenta_predefinida_control.strPermisoMostrarTodos);
		
		if(tipo_cuenta_predefinida_control.strPermisoNuevo!=null) {
			jQuery("#tdtipo_cuenta_predefinidaNuevo").css("display",tipo_cuenta_predefinida_control.strPermisoNuevo);
			jQuery("#tdtipo_cuenta_predefinidaNuevoToolBar").css("display",tipo_cuenta_predefinida_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtipo_cuenta_predefinidaDuplicar").css("display",tipo_cuenta_predefinida_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_cuenta_predefinidaDuplicarToolBar").css("display",tipo_cuenta_predefinida_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_cuenta_predefinidaNuevoGuardarCambios").css("display",tipo_cuenta_predefinida_control.strPermisoNuevo);
			jQuery("#tdtipo_cuenta_predefinidaNuevoGuardarCambiosToolBar").css("display",tipo_cuenta_predefinida_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tipo_cuenta_predefinida_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_cuenta_predefinidaActualizarToolBar").css("display",tipo_cuenta_predefinida_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_cuenta_predefinidaCopiar").css("display",tipo_cuenta_predefinida_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_cuenta_predefinidaCopiarToolBar").css("display",tipo_cuenta_predefinida_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_cuenta_predefinidaConEditar").css("display",tipo_cuenta_predefinida_control.strPermisoActualizar);
		}
		
		jQuery("#tdtipo_cuenta_predefinidaEliminarToolBar").css("display",tipo_cuenta_predefinida_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdtipo_cuenta_predefinidaGuardarCambios").css("display",tipo_cuenta_predefinida_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtipo_cuenta_predefinidaGuardarCambiosToolBar").css("display",tipo_cuenta_predefinida_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trtipo_cuenta_predefinidaElementos").css("display",tipo_cuenta_predefinida_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_cuenta_predefinidaAcciones").css("display",tipo_cuenta_predefinida_control.strVisibleTablaAcciones);
		jQuery("#trtipo_cuenta_predefinidaParametrosAcciones").css("display",tipo_cuenta_predefinida_control.strVisibleTablaAcciones);
			
		jQuery("#tdtipo_cuenta_predefinidaCerrarPagina").css("display",tipo_cuenta_predefinida_control.strPermisoPopup);		
		jQuery("#tdtipo_cuenta_predefinidaCerrarPaginaToolBar").css("display",tipo_cuenta_predefinida_control.strPermisoPopup);
		//jQuery("#trtipo_cuenta_predefinidaAccionesRelaciones").css("display",tipo_cuenta_predefinida_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_cuenta_predefinida_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_cuenta_predefinida_webcontrol1.registrarEventosControles();
		
		if(tipo_cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			tipo_cuenta_predefinida_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_cuenta_predefinida_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_cuenta_predefinida_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_cuenta_predefinida_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(tipo_cuenta_predefinida_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				tipo_cuenta_predefinida_webcontrol1.onLoad();
				
			} else {
				if(tipo_cuenta_predefinida_constante1.BIT_ES_PAGINA_FORM==true) {
					if(tipo_cuenta_predefinida_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
						//tipo_cuenta_predefinida_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(tipo_cuenta_predefinida_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_cuenta_predefinida_constante1.BIG_ID_ACTUAL,"tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
						//tipo_cuenta_predefinida_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			tipo_cuenta_predefinida_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var tipo_cuenta_predefinida_webcontrol1=new tipo_cuenta_predefinida_webcontrol();

if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_cuenta_predefinida_webcontrol1.onLoadWindow; 
}

//</script>