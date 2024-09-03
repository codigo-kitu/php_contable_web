//<script type="text/javascript" language="javascript">



//var cierre_contable_detalleJQueryPaginaWebInteraccion= function (cierre_contable_detalle_control) {
//this.,this.,this.

class cierre_contable_detalle_webcontrol extends cierre_contable_detalle_webcontrol_add {
	
	cierre_contable_detalle_control=null;
	cierre_contable_detalle_controlInicial=null;
	cierre_contable_detalle_controlAuxiliar=null;
		
	//if(cierre_contable_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cierre_contable_detalle_control) {
		super();
		
		this.cierre_contable_detalle_control=cierre_contable_detalle_control;
	}
		
	actualizarVariablesPagina(cierre_contable_detalle_control) {
		
		if(cierre_contable_detalle_control.action=="index" || cierre_contable_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cierre_contable_detalle_control);
			
		} else if(cierre_contable_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cierre_contable_detalle_control);
			
		} else if(cierre_contable_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cierre_contable_detalle_control);
			
		} else if(cierre_contable_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cierre_contable_detalle_control);		
		
		} else if(cierre_contable_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cierre_contable_detalle_control);		
		
		} else if(cierre_contable_detalle_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cierre_contable_detalle_control);		
		
		} else if(cierre_contable_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cierre_contable_detalle_control);		
		}
		else if(cierre_contable_detalle_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cierre_contable_detalle_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(cierre_contable_detalle_control.action + " Revisar Manejo");
			
			if(cierre_contable_detalle_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(cierre_contable_detalle_control);
				
				return;
			}
			
			//if(cierre_contable_detalle_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(cierre_contable_detalle_control);
			//}
			
			if(cierre_contable_detalle_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(cierre_contable_detalle_control);
			}
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cierre_contable_detalle_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(cierre_contable_detalle_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(cierre_contable_detalle_control, false);			
			}
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(cierre_contable_detalle_control);	
			}
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
			}
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control);
			}
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);
			}
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(cierre_contable_detalle_control);	
			}
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
			}
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(cierre_contable_detalle_control);
			}
			
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(cierre_contable_detalle_control);			
			}
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(cierre_contable_detalle_control);
			}
			
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_detalle_control);
			}
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(cierre_contable_detalle_control);
			}				
			
			if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cierre_contable_detalle_control);
			}
			
			if(cierre_contable_detalle_control.usuarioActual!=null && cierre_contable_detalle_control.usuarioActual.field_strUserName!=null &&
			cierre_contable_detalle_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(cierre_contable_detalle_control);			
			}
		}
		
		
		if(cierre_contable_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cierre_contable_detalle_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(cierre_contable_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cierre_contable_detalle_control);
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control);
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_detalle_control);
		this.actualizarPaginaAreaBusquedas(cierre_contable_detalle_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cierre_contable_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cierre_contable_detalle_control);
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control);
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_detalle_control);
		this.actualizarPaginaAreaBusquedas(cierre_contable_detalle_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(cierre_contable_detalle_control) {
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cierre_contable_detalle_control) {
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cierre_contable_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cierre_contable_detalle_control) {
		this.actualizarPaginaAbrirLink(cierre_contable_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);				
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cierre_contable_detalle_control) {
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);
		this.onLoadCombosDefectoFK(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);
		this.onLoadCombosDefectoFK(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cierre_contable_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);
		this.onLoadCombosDefectoFK(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cierre_contable_detalle_control) {
		this.actualizarPaginaAbrirLink(cierre_contable_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cierre_contable_detalle_control) {
		this.actualizarPaginaImprimir(cierre_contable_detalle_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cierre_contable_detalle_control) {
		this.actualizarPaginaImprimir(cierre_contable_detalle_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cierre_contable_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cierre_contable_detalle_control) {
		//FORMULARIO
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cierre_contable_detalle_control);
			this.actualizarPaginaFormularioAdd(cierre_contable_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		//COMBOS FK
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(cierre_contable_detalle_control) {
		//FORMULARIO
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cierre_contable_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);	
		//COMBOS FK
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cierre_contable_detalle_control) {
		//FORMULARIO
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cierre_contable_detalle_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cierre_contable_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);	
		//COMBOS FK
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control) {
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cierre_contable_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cierre_contable_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cierre_contable_detalle_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cierre_contable_detalle_control) {
		if(cierre_contable_detalle_funcion1.esPaginaForm()==true) {
			window.opener.cierre_contable_detalle_webcontrol1.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(cierre_contable_detalle_control) {
		cierre_contable_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cierre_contable_detalle_control.strAuxiliarUrlPagina);
				
		cierre_contable_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cierre_contable_detalle_control.strAuxiliarTipo,cierre_contable_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cierre_contable_detalle_control) {
		cierre_contable_detalle_funcion1.resaltarRestaurarDivMensaje(true,cierre_contable_detalle_control.strAuxiliarMensajeAlert,cierre_contable_detalle_control.strAuxiliarCssMensaje);
			
		if(cierre_contable_detalle_funcion1.esPaginaForm()==true) {
			window.opener.cierre_contable_detalle_funcion1.resaltarRestaurarDivMensaje(true,cierre_contable_detalle_control.strAuxiliarMensajeAlert,cierre_contable_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(cierre_contable_detalle_control) {
		eval(cierre_contable_detalle_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(cierre_contable_detalle_control, mostrar) {
		
		if(mostrar==true) {
			cierre_contable_detalle_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cierre_contable_detalle_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			cierre_contable_detalle_funcion1.mostrarDivMensaje(true,cierre_contable_detalle_control.strAuxiliarMensaje,cierre_contable_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			cierre_contable_detalle_funcion1.mostrarDivMensaje(false,cierre_contable_detalle_control.strAuxiliarMensaje,cierre_contable_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(cierre_contable_detalle_control) {
	
		funcionGeneral.printWebPartPage("cierre_contable_detalle",cierre_contable_detalle_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcierre_contable_detallesAjaxWebPart").html(cierre_contable_detalle_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("cierre_contable_detalle",jQuery("#divTablaDatosReporteAuxiliarcierre_contable_detallesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(cierre_contable_detalle_control) {
		this.cierre_contable_detalle_controlInicial=cierre_contable_detalle_control;
			
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cierre_contable_detalle_control.strStyleDivArbol,cierre_contable_detalle_control.strStyleDivContent
																,cierre_contable_detalle_control.strStyleDivOpcionesBanner,cierre_contable_detalle_control.strStyleDivExpandirColapsar
																,cierre_contable_detalle_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=cierre_contable_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cierre_contable_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(cierre_contable_detalle_control) {
		jQuery("#divTablaDatoscierre_contable_detallesAjaxWebPart").html(cierre_contable_detalle_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscierre_contable_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscierre_contable_detalles=jQuery("#tblTablaDatoscierre_contable_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cierre_contable_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cierre_contable_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cierre_contable_detalle_webcontrol1.registrarControlesTableEdition(cierre_contable_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cierre_contable_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(cierre_contable_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cierre_contable_detalle_control.cierre_contable_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cierre_contable_detalle_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control) {
		this.actualizarCssBotonesPagina(cierre_contable_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cierre_contable_detalle_control.tiposReportes,cierre_contable_detalle_control.tiposReporte
															 	,cierre_contable_detalle_control.tiposPaginacion,cierre_contable_detalle_control.tiposAcciones
																,cierre_contable_detalle_control.tiposColumnasSelect,cierre_contable_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cierre_contable_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cierre_contable_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cierre_contable_detalle_control);			
	}
	
	actualizarPaginaAreaBusquedas(cierre_contable_detalle_control) {
		jQuery("#divBusquedacierre_contable_detalleAjaxWebPart").css("display",cierre_contable_detalle_control.strPermisoBusqueda);
		jQuery("#trcierre_contable_detalleCabeceraBusquedas").css("display",cierre_contable_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedacierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cierre_contable_detalle_control.htmlTablaOrderBy!=null
			&& cierre_contable_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycierre_contable_detalleAjaxWebPart").html(cierre_contable_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cierre_contable_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cierre_contable_detalle_control.htmlTablaOrderByRel!=null
			&& cierre_contable_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcierre_contable_detalleAjaxWebPart").html(cierre_contable_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacierre_contable_detalleAjaxWebPart").css("display","none");
			jQuery("#trcierre_contable_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacierre_contable_detalle").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control) {
		jQuery("#tdcierre_contable_detalleNuevo").css("display",cierre_contable_detalle_control.strPermisoNuevo);
		jQuery("#trcierre_contable_detalleElementos").css("display",cierre_contable_detalle_control.strVisibleTablaElementos);
		jQuery("#trcierre_contable_detalleAcciones").css("display",cierre_contable_detalle_control.strVisibleTablaAcciones);
		jQuery("#trcierre_contable_detalleParametrosAcciones").css("display",cierre_contable_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cierre_contable_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(cierre_contable_detalle_control);
				
		if(cierre_contable_detalle_control.cierre_contable_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(cierre_contable_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(cierre_contable_detalle_control);
	}
	
	actualizarPaginaUsuarioInvitado(cierre_contable_detalle_control) {
	
		var indexPosition=cierre_contable_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cierre_contable_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(cierre_contable_detalle_control) {
		jQuery("#divResumencierre_contable_detalleActualAjaxWebPart").html(cierre_contable_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cierre_contable_detalle_control) {
		jQuery("#divAccionesRelacionescierre_contable_detalleAjaxWebPart").html(cierre_contable_detalle_control.htmlTablaAccionesRelaciones);
			
		cierre_contable_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cierre_contable_detalle_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cierre_contable_detalle_control) {
		
		if(cierre_contable_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable").attr("style",cierre_contable_detalle_control.strVisibleFK_Idcierre_contable);
			jQuery("#tblstrVisible"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable").attr("style",cierre_contable_detalle_control.strVisibleFK_Idcierre_contable);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncierre_contable_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cierre_contable_detalle",id,"contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);		
	}
	
	

	abrirBusquedaParacierre_contable(strNombreCampoBusqueda){//idActual
		cierre_contable_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cierre_contable_detalle","cierre_contable","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cierre_contable_detalle_control) {
	
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id").val(cierre_contable_detalle_control.cierre_contable_detalleActual.id);
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-version_row").val(cierre_contable_detalle_control.cierre_contable_detalleActual.versionRow);
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_detalle").val(cierre_contable_detalle_control.cierre_contable_detalleActual.id_detalle);
		
		if(cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable!=null && cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable>-1){
			if(jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val() != cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable) {
				jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val(cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable).trigger("change");
			}
		} else { 
			//jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").select2("val", null);
			if(jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-nro_documento").val(cierre_contable_detalle_control.cierre_contable_detalleActual.nro_documento);
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-tipo_factura").val(cierre_contable_detalle_control.cierre_contable_detalleActual.tipo_factura);
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-monto").val(cierre_contable_detalle_control.cierre_contable_detalleActual.monto);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cierre_contable_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cierre_contable_detalle","contabilidad","","form_cierre_contable_detalle",formulario,"","",paraEventoTabla,idFilaTabla,cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
	}
	
	cargarCombosFK(cierre_contable_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cierre_contable_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cierre_contable",cierre_contable_detalle_control.strRecargarFkTipos,",")) { 
				cierre_contable_detalle_webcontrol1.cargarComboscierre_contablesFK(cierre_contable_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cierre_contable_detalle_control.strRecargarFkTiposNinguno!=null && cierre_contable_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && cierre_contable_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(cierre_contable_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cierre_contable",cierre_contable_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cierre_contable_detalle_webcontrol1.cargarComboscierre_contablesFK(cierre_contable_detalle_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(cierre_contable_detalle_control) {
		jQuery("#spanstrMensajeid").text(cierre_contable_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cierre_contable_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_detalle").text(cierre_contable_detalle_control.strMensajeid_detalle);		
		jQuery("#spanstrMensajeid_cierre_contable").text(cierre_contable_detalle_control.strMensajeid_cierre_contable);		
		jQuery("#spanstrMensajenro_documento").text(cierre_contable_detalle_control.strMensajenro_documento);		
		jQuery("#spanstrMensajetipo_factura").text(cierre_contable_detalle_control.strMensajetipo_factura);		
		jQuery("#spanstrMensajemonto").text(cierre_contable_detalle_control.strMensajemonto);		
	}
	
	actualizarCssBotonesMantenimiento(cierre_contable_detalle_control) {
		jQuery("#tdbtnNuevocierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablacierre_contableFK(cierre_contable_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cierre_contable_detalle_funcion1,cierre_contable_detalle_control.cierre_contablesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(cierre_contable_detalle_control) {
		var i=0;
		
		i=cierre_contable_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cierre_contable_detalle_control.cierre_contable_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(cierre_contable_detalle_control.cierre_contable_detalleActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(cierre_contable_detalle_control.cierre_contable_detalleActual.id_detalle);
		
		if(cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable!=null && cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable) {
				jQuery("#t-cel_"+i+"_3").val(cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(cierre_contable_detalle_control.cierre_contable_detalleActual.nro_documento);
		jQuery("#t-cel_"+i+"_5").val(cierre_contable_detalle_control.cierre_contable_detalleActual.tipo_factura);
		jQuery("#t-cel_"+i+"_6").val(cierre_contable_detalle_control.cierre_contable_detalleActual.monto);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cierre_contable_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(cierre_contable_detalle_control) {
		cierre_contable_detalle_funcion1.registrarControlesTableValidacionEdition(cierre_contable_detalle_control,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalleConstante,strParametros);
		
		//cierre_contable_detalle_funcion1.cancelarOnComplete();
	}	
	
	
	cargarComboscierre_contablesFK(cierre_contable_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable",cierre_contable_detalle_control.cierre_contablesFK);

		if(cierre_contable_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cierre_contable_detalle_control.idFilaTablaActual+"_3",cierre_contable_detalle_control.cierre_contablesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable-cmbid_cierre_contable",cierre_contable_detalle_control.cierre_contablesFK);

	};

	
	
	registrarComboActionChangeComboscierre_contablesFK(cierre_contable_detalle_control) {

	};

	
	
	setDefectoValorComboscierre_contablesFK(cierre_contable_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cierre_contable_detalle_control.idcierre_contableDefaultFK>-1 && jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val() != cierre_contable_detalle_control.idcierre_contableDefaultFK) {
				jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val(cierre_contable_detalle_control.idcierre_contableDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable-cmbid_cierre_contable").val(cierre_contable_detalle_control.idcierre_contableDefaultForeignKey).trigger("change");
			if(jQuery("#"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable-cmbid_cierre_contable").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable-cmbid_cierre_contable").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cierre_contable_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(cierre_contable_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cierre_contable_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cierre_contable",cierre_contable_detalle_control.strRecargarFkTipos,",")) { 
				cierre_contable_detalle_webcontrol1.setDefectoValorComboscierre_contablesFK(cierre_contable_detalle_control);
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
	onLoadCombosEventosFK(cierre_contable_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cierre_contable_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cierre_contable",cierre_contable_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cierre_contable_detalle_webcontrol1.registrarComboActionChangeComboscierre_contablesFK(cierre_contable_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cierre_contable_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cierre_contable_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cierre_contable_detalle");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cierre_contable_detalle");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cierre_contable_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);			
			
			if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,"cierre_contable_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cierre_contable","id_cierre_contable","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable_img_busqueda").click(function(){
				cierre_contable_detalle_webcontrol1.abrirBusquedaParacierre_contable("id_cierre_contable");
				//alert(jQuery('#form-id_cierre_contable_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("cierre_contable_detalle","FK_Idcierre_contable","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			cierre_contable_detalle_funcion1.validarFormularioJQuery(cierre_contable_detalle_constante1);
			
			if(cierre_contable_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cierre_contable_detalle_control) {
		
		jQuery("#divBusquedacierre_contable_detalleAjaxWebPart").css("display",cierre_contable_detalle_control.strPermisoBusqueda);
		jQuery("#trcierre_contable_detalleCabeceraBusquedas").css("display",cierre_contable_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedacierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscierre_contable_detalle").attr("style",cierre_contable_detalle_control.strPermisoMostrarTodos);
		
		if(cierre_contable_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdcierre_contable_detalleNuevo").css("display",cierre_contable_detalle_control.strPermisoNuevo);
			jQuery("#tdcierre_contable_detalleNuevoToolBar").css("display",cierre_contable_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcierre_contable_detalleDuplicar").css("display",cierre_contable_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcierre_contable_detalleDuplicarToolBar").css("display",cierre_contable_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcierre_contable_detalleNuevoGuardarCambios").css("display",cierre_contable_detalle_control.strPermisoNuevo);
			jQuery("#tdcierre_contable_detalleNuevoGuardarCambiosToolBar").css("display",cierre_contable_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cierre_contable_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdcierre_contable_detalleActualizarToolBar").css("display",cierre_contable_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcierre_contable_detalleCopiar").css("display",cierre_contable_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcierre_contable_detalleCopiarToolBar").css("display",cierre_contable_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcierre_contable_detalleConEditar").css("display",cierre_contable_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdcierre_contable_detalleEliminarToolBar").css("display",cierre_contable_detalle_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcierre_contable_detalleGuardarCambios").css("display",cierre_contable_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcierre_contable_detalleGuardarCambiosToolBar").css("display",cierre_contable_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcierre_contable_detalleElementos").css("display",cierre_contable_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trcierre_contable_detalleAcciones").css("display",cierre_contable_detalle_control.strVisibleTablaAcciones);
		jQuery("#trcierre_contable_detalleParametrosAcciones").css("display",cierre_contable_detalle_control.strVisibleTablaAcciones);
			
		jQuery("#tdcierre_contable_detalleCerrarPagina").css("display",cierre_contable_detalle_control.strPermisoPopup);		
		jQuery("#tdcierre_contable_detalleCerrarPaginaToolBar").css("display",cierre_contable_detalle_control.strPermisoPopup);
		//jQuery("#trcierre_contable_detalleAccionesRelaciones").css("display",cierre_contable_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cierre_contable_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cierre_contable_detalle_webcontrol1.registrarEventosControles();
		
		if(cierre_contable_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
			cierre_contable_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(cierre_contable_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cierre_contable_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cierre_contable_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(cierre_contable_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cierre_contable_detalle_webcontrol1.onLoad();
				
			} else {
				if(cierre_contable_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
					if(cierre_contable_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
						//cierre_contable_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(cierre_contable_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cierre_contable_detalle_constante1.BIG_ID_ACTUAL,"cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
						//cierre_contable_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			cierre_contable_detalle_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var cierre_contable_detalle_webcontrol1=new cierre_contable_detalle_webcontrol();

if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cierre_contable_detalle_webcontrol1.onLoadWindow; 
}

//</script>