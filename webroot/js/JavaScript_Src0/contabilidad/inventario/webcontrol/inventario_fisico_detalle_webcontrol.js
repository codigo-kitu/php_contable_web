//<script type="text/javascript" language="javascript">



//var inventario_fisico_detalleJQueryPaginaWebInteraccion= function (inventario_fisico_detalle_control) {
//this.,this.,this.

class inventario_fisico_detalle_webcontrol extends inventario_fisico_detalle_webcontrol_add {
	
	inventario_fisico_detalle_control=null;
	inventario_fisico_detalle_controlInicial=null;
	inventario_fisico_detalle_controlAuxiliar=null;
		
	//if(inventario_fisico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(inventario_fisico_detalle_control) {
		super();
		
		this.inventario_fisico_detalle_control=inventario_fisico_detalle_control;
	}
		
	actualizarVariablesPagina(inventario_fisico_detalle_control) {
		
		if(inventario_fisico_detalle_control.action=="index" || inventario_fisico_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(inventario_fisico_detalle_control);
			
		} else if(inventario_fisico_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(inventario_fisico_detalle_control);
			
		} else if(inventario_fisico_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(inventario_fisico_detalle_control);
			
		} else if(inventario_fisico_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(inventario_fisico_detalle_control);
		
		} else if(inventario_fisico_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(inventario_fisico_detalle_control);		
		
		} else if(inventario_fisico_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(inventario_fisico_detalle_control);		
		
		} else if(inventario_fisico_detalle_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(inventario_fisico_detalle_control);		
		
		} else if(inventario_fisico_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(inventario_fisico_detalle_control);		
		}
		else if(inventario_fisico_detalle_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(inventario_fisico_detalle_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(inventario_fisico_detalle_control.action + " Revisar Manejo");
			
			if(inventario_fisico_detalle_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(inventario_fisico_detalle_control);
				
				return;
			}
			
			//if(inventario_fisico_detalle_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(inventario_fisico_detalle_control);
			//}
			
			if(inventario_fisico_detalle_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(inventario_fisico_detalle_control);
			}
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && inventario_fisico_detalle_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(inventario_fisico_detalle_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(inventario_fisico_detalle_control, false);			
			}
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(inventario_fisico_detalle_control);	
			}
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);
			}
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(inventario_fisico_detalle_control);
			}
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(inventario_fisico_detalle_control);
			}
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(inventario_fisico_detalle_control);	
			}
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
			}
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(inventario_fisico_detalle_control);
			}
			
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(inventario_fisico_detalle_control);			
			}
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(inventario_fisico_detalle_control);
			}
			
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(inventario_fisico_detalle_control);
			}
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(inventario_fisico_detalle_control);
			}				
			
			if(inventario_fisico_detalle_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(inventario_fisico_detalle_control);
			}
			
			if(inventario_fisico_detalle_control.usuarioActual!=null && inventario_fisico_detalle_control.usuarioActual.field_strUserName!=null &&
			inventario_fisico_detalle_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(inventario_fisico_detalle_control);			
			}
		}
		
		
		if(inventario_fisico_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(inventario_fisico_detalle_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(inventario_fisico_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(inventario_fisico_detalle_control);
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);
		this.actualizarPaginaCargaGeneralControles(inventario_fisico_detalle_control);
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(inventario_fisico_detalle_control);
		this.actualizarPaginaAreaBusquedas(inventario_fisico_detalle_control);
		this.actualizarPaginaCargaCombosFK(inventario_fisico_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(inventario_fisico_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(inventario_fisico_detalle_control);
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);
		this.actualizarPaginaCargaGeneralControles(inventario_fisico_detalle_control);
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(inventario_fisico_detalle_control);
		this.actualizarPaginaAreaBusquedas(inventario_fisico_detalle_control);
		this.actualizarPaginaCargaCombosFK(inventario_fisico_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);		
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);		
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);		
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(inventario_fisico_detalle_control) {
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(inventario_fisico_detalle_control) {
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(inventario_fisico_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(inventario_fisico_detalle_control);
		this.actualizarPaginaCargaCombosFK(inventario_fisico_detalle_control);
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(inventario_fisico_detalle_control) {
		this.actualizarPaginaAbrirLink(inventario_fisico_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);				
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(inventario_fisico_detalle_control) {
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);
		this.onLoadCombosDefectoFK(inventario_fisico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);
		this.onLoadCombosDefectoFK(inventario_fisico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(inventario_fisico_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(inventario_fisico_detalle_control);
		this.actualizarPaginaCargaCombosFK(inventario_fisico_detalle_control);
		this.actualizarPaginaFormulario(inventario_fisico_detalle_control);
		this.onLoadCombosDefectoFK(inventario_fisico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(inventario_fisico_detalle_control) {
		this.actualizarPaginaAbrirLink(inventario_fisico_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(inventario_fisico_detalle_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(inventario_fisico_detalle_control) {
		this.actualizarPaginaImprimir(inventario_fisico_detalle_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(inventario_fisico_detalle_control) {
		this.actualizarPaginaImprimir(inventario_fisico_detalle_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(inventario_fisico_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(inventario_fisico_detalle_control) {
		//FORMULARIO
		if(inventario_fisico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(inventario_fisico_detalle_control);
			this.actualizarPaginaFormularioAdd(inventario_fisico_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);		
		//COMBOS FK
		if(inventario_fisico_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(inventario_fisico_detalle_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(inventario_fisico_detalle_control) {
		//FORMULARIO
		if(inventario_fisico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(inventario_fisico_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);	
		//COMBOS FK
		if(inventario_fisico_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(inventario_fisico_detalle_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(inventario_fisico_detalle_control) {
		//FORMULARIO
		if(inventario_fisico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(inventario_fisico_detalle_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(inventario_fisico_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control);	
		//COMBOS FK
		if(inventario_fisico_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(inventario_fisico_detalle_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_detalle_control) {
		if(inventario_fisico_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && inventario_fisico_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(inventario_fisico_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(inventario_fisico_detalle_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(inventario_fisico_detalle_control) {
		if(inventario_fisico_detalle_funcion1.esPaginaForm()==true) {
			window.opener.inventario_fisico_detalle_webcontrol1.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(inventario_fisico_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(inventario_fisico_detalle_control) {
		inventario_fisico_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(inventario_fisico_detalle_control.strAuxiliarUrlPagina);
				
		inventario_fisico_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(inventario_fisico_detalle_control.strAuxiliarTipo,inventario_fisico_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(inventario_fisico_detalle_control) {
		inventario_fisico_detalle_funcion1.resaltarRestaurarDivMensaje(true,inventario_fisico_detalle_control.strAuxiliarMensajeAlert,inventario_fisico_detalle_control.strAuxiliarCssMensaje);
			
		if(inventario_fisico_detalle_funcion1.esPaginaForm()==true) {
			window.opener.inventario_fisico_detalle_funcion1.resaltarRestaurarDivMensaje(true,inventario_fisico_detalle_control.strAuxiliarMensajeAlert,inventario_fisico_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(inventario_fisico_detalle_control) {
		eval(inventario_fisico_detalle_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(inventario_fisico_detalle_control, mostrar) {
		
		if(mostrar==true) {
			inventario_fisico_detalle_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				inventario_fisico_detalle_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			inventario_fisico_detalle_funcion1.mostrarDivMensaje(true,inventario_fisico_detalle_control.strAuxiliarMensaje,inventario_fisico_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			inventario_fisico_detalle_funcion1.mostrarDivMensaje(false,inventario_fisico_detalle_control.strAuxiliarMensaje,inventario_fisico_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(inventario_fisico_detalle_control) {
	
		funcionGeneral.printWebPartPage("inventario_fisico_detalle",inventario_fisico_detalle_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarinventario_fisico_detallesAjaxWebPart").html(inventario_fisico_detalle_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("inventario_fisico_detalle",jQuery("#divTablaDatosReporteAuxiliarinventario_fisico_detallesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(inventario_fisico_detalle_control) {
		this.inventario_fisico_detalle_controlInicial=inventario_fisico_detalle_control;
			
		if(inventario_fisico_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(inventario_fisico_detalle_control.strStyleDivArbol,inventario_fisico_detalle_control.strStyleDivContent
																,inventario_fisico_detalle_control.strStyleDivOpcionesBanner,inventario_fisico_detalle_control.strStyleDivExpandirColapsar
																,inventario_fisico_detalle_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=inventario_fisico_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",inventario_fisico_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(inventario_fisico_detalle_control) {
		jQuery("#divTablaDatosinventario_fisico_detallesAjaxWebPart").html(inventario_fisico_detalle_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosinventario_fisico_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(inventario_fisico_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosinventario_fisico_detalles=jQuery("#tblTablaDatosinventario_fisico_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("inventario_fisico_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',inventario_fisico_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			inventario_fisico_detalle_webcontrol1.registrarControlesTableEdition(inventario_fisico_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		inventario_fisico_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(inventario_fisico_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(inventario_fisico_detalle_control.inventario_fisico_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(inventario_fisico_detalle_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(inventario_fisico_detalle_control) {
		this.actualizarCssBotonesPagina(inventario_fisico_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(inventario_fisico_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(inventario_fisico_detalle_control.tiposReportes,inventario_fisico_detalle_control.tiposReporte
															 	,inventario_fisico_detalle_control.tiposPaginacion,inventario_fisico_detalle_control.tiposAcciones
																,inventario_fisico_detalle_control.tiposColumnasSelect,inventario_fisico_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(inventario_fisico_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(inventario_fisico_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(inventario_fisico_detalle_control);			
	}
	
	actualizarPaginaAreaBusquedas(inventario_fisico_detalle_control) {
		jQuery("#divBusquedainventario_fisico_detalleAjaxWebPart").css("display",inventario_fisico_detalle_control.strPermisoBusqueda);
		jQuery("#trinventario_fisico_detalleCabeceraBusquedas").css("display",inventario_fisico_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedainventario_fisico_detalle").css("display",inventario_fisico_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(inventario_fisico_detalle_control.htmlTablaOrderBy!=null
			&& inventario_fisico_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByinventario_fisico_detalleAjaxWebPart").html(inventario_fisico_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//inventario_fisico_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(inventario_fisico_detalle_control.htmlTablaOrderByRel!=null
			&& inventario_fisico_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelinventario_fisico_detalleAjaxWebPart").html(inventario_fisico_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(inventario_fisico_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedainventario_fisico_detalleAjaxWebPart").css("display","none");
			jQuery("#trinventario_fisico_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedainventario_fisico_detalle").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(inventario_fisico_detalle_control) {
		jQuery("#tdinventario_fisico_detalleNuevo").css("display",inventario_fisico_detalle_control.strPermisoNuevo);
		jQuery("#trinventario_fisico_detalleElementos").css("display",inventario_fisico_detalle_control.strVisibleTablaElementos);
		jQuery("#trinventario_fisico_detalleAcciones").css("display",inventario_fisico_detalle_control.strVisibleTablaAcciones);
		jQuery("#trinventario_fisico_detalleParametrosAcciones").css("display",inventario_fisico_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(inventario_fisico_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(inventario_fisico_detalle_control);
				
		if(inventario_fisico_detalle_control.inventario_fisico_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(inventario_fisico_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(inventario_fisico_detalle_control);
	}
	
	actualizarPaginaUsuarioInvitado(inventario_fisico_detalle_control) {
	
		var indexPosition=inventario_fisico_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=inventario_fisico_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(inventario_fisico_detalle_control) {
		jQuery("#divResumeninventario_fisico_detalleActualAjaxWebPart").html(inventario_fisico_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(inventario_fisico_detalle_control) {
		jQuery("#divAccionesRelacionesinventario_fisico_detalleAjaxWebPart").html(inventario_fisico_detalle_control.htmlTablaAccionesRelaciones);
			
		inventario_fisico_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(inventario_fisico_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(inventario_fisico_detalle_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(inventario_fisico_detalle_control) {
		
		if(inventario_fisico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",inventario_fisico_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",inventario_fisico_detalle_control.strVisibleFK_Idbodega);
		}

		if(inventario_fisico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idinventario_fisico").attr("style",inventario_fisico_detalle_control.strVisibleFK_Idinventario_fisico);
			jQuery("#tblstrVisible"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idinventario_fisico").attr("style",inventario_fisico_detalle_control.strVisibleFK_Idinventario_fisico);
		}

		if(inventario_fisico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",inventario_fisico_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",inventario_fisico_detalle_control.strVisibleFK_Idproducto);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioninventario_fisico_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("inventario_fisico_detalle",id,"inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);		
	}
	
	

	abrirBusquedaParainventario_fisico(strNombreCampoBusqueda){//idActual
		inventario_fisico_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("inventario_fisico_detalle","inventario_fisico","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		inventario_fisico_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("inventario_fisico_detalle","producto","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		inventario_fisico_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("inventario_fisico_detalle","bodega","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(inventario_fisico_detalle_control) {
	
		jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id);
		jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-version_row").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.versionRow);
		
		if(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_inventario_fisico!=null && inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_inventario_fisico>-1){
			if(jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_inventario_fisico").val() != inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_inventario_fisico) {
				jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_inventario_fisico").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_inventario_fisico).trigger("change");
			}
		} else { 
			//jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_inventario_fisico").select2("val", null);
			if(jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_inventario_fisico").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_inventario_fisico").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_producto!=null && inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_producto>-1){
			if(jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_producto").val() != inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_producto) {
				jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_producto").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_bodega!=null && inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_bodega>-1){
			if(jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_bodega) {
				jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_bodega").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-unidades_contadas").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.unidades_contadas);
		jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-campo1").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.campo1);
		jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-campo2").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.campo2);
		jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-campo3").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.campo3);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+inventario_fisico_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("inventario_fisico_detalle","inventario","","form_inventario_fisico_detalle",formulario,"","",paraEventoTabla,idFilaTabla,inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
	}
	
	cargarCombosFK(inventario_fisico_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(inventario_fisico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_inventario_fisico",inventario_fisico_detalle_control.strRecargarFkTipos,",")) { 
				inventario_fisico_detalle_webcontrol1.cargarCombosinventario_fisicosFK(inventario_fisico_detalle_control);
			}

			if(inventario_fisico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",inventario_fisico_detalle_control.strRecargarFkTipos,",")) { 
				inventario_fisico_detalle_webcontrol1.cargarCombosproductosFK(inventario_fisico_detalle_control);
			}

			if(inventario_fisico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",inventario_fisico_detalle_control.strRecargarFkTipos,",")) { 
				inventario_fisico_detalle_webcontrol1.cargarCombosbodegasFK(inventario_fisico_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(inventario_fisico_detalle_control.strRecargarFkTiposNinguno!=null && inventario_fisico_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && inventario_fisico_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(inventario_fisico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_inventario_fisico",inventario_fisico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					inventario_fisico_detalle_webcontrol1.cargarCombosinventario_fisicosFK(inventario_fisico_detalle_control);
				}

				if(inventario_fisico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",inventario_fisico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					inventario_fisico_detalle_webcontrol1.cargarCombosproductosFK(inventario_fisico_detalle_control);
				}

				if(inventario_fisico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",inventario_fisico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					inventario_fisico_detalle_webcontrol1.cargarCombosbodegasFK(inventario_fisico_detalle_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(inventario_fisico_detalle_control) {
		jQuery("#spanstrMensajeid").text(inventario_fisico_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(inventario_fisico_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_inventario_fisico").text(inventario_fisico_detalle_control.strMensajeid_inventario_fisico);		
		jQuery("#spanstrMensajeid_producto").text(inventario_fisico_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_bodega").text(inventario_fisico_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeunidades_contadas").text(inventario_fisico_detalle_control.strMensajeunidades_contadas);		
		jQuery("#spanstrMensajecampo1").text(inventario_fisico_detalle_control.strMensajecampo1);		
		jQuery("#spanstrMensajecampo2").text(inventario_fisico_detalle_control.strMensajecampo2);		
		jQuery("#spanstrMensajecampo3").text(inventario_fisico_detalle_control.strMensajecampo3);		
	}
	
	actualizarCssBotonesMantenimiento(inventario_fisico_detalle_control) {
		jQuery("#tdbtnNuevoinventario_fisico_detalle").css("visibility",inventario_fisico_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoinventario_fisico_detalle").css("display",inventario_fisico_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarinventario_fisico_detalle").css("visibility",inventario_fisico_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarinventario_fisico_detalle").css("display",inventario_fisico_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarinventario_fisico_detalle").css("visibility",inventario_fisico_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarinventario_fisico_detalle").css("display",inventario_fisico_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarinventario_fisico_detalle").css("visibility",inventario_fisico_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosinventario_fisico_detalle").css("visibility",inventario_fisico_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosinventario_fisico_detalle").css("display",inventario_fisico_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarinventario_fisico_detalle").css("visibility",inventario_fisico_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarinventario_fisico_detalle").css("visibility",inventario_fisico_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarinventario_fisico_detalle").css("visibility",inventario_fisico_detalle_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablainventario_fisicoFK(inventario_fisico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,inventario_fisico_detalle_funcion1,inventario_fisico_detalle_control.inventario_fisicosFK);
	}

	cargarComboEditarTablaproductoFK(inventario_fisico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,inventario_fisico_detalle_funcion1,inventario_fisico_detalle_control.productosFK);
	}

	cargarComboEditarTablabodegaFK(inventario_fisico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,inventario_fisico_detalle_funcion1,inventario_fisico_detalle_control.bodegasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(inventario_fisico_detalle_control) {
		var i=0;
		
		i=inventario_fisico_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.versionRow);
		
		if(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_inventario_fisico!=null && inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_inventario_fisico>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_inventario_fisico) {
				jQuery("#t-cel_"+i+"_2").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_inventario_fisico).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_producto!=null && inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_3").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_bodega!=null && inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_4").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.unidades_contadas);
		jQuery("#t-cel_"+i+"_6").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.campo1);
		jQuery("#t-cel_"+i+"_7").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.campo2);
		jQuery("#t-cel_"+i+"_8").val(inventario_fisico_detalle_control.inventario_fisico_detalleActual.campo3);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(inventario_fisico_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(inventario_fisico_detalle_control) {
		inventario_fisico_detalle_funcion1.registrarControlesTableValidacionEdition(inventario_fisico_detalle_control,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalleConstante,strParametros);
		
		//inventario_fisico_detalle_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosinventario_fisicosFK(inventario_fisico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_inventario_fisico",inventario_fisico_detalle_control.inventario_fisicosFK);

		if(inventario_fisico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+inventario_fisico_detalle_control.idFilaTablaActual+"_2",inventario_fisico_detalle_control.inventario_fisicosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idinventario_fisico-cmbid_inventario_fisico",inventario_fisico_detalle_control.inventario_fisicosFK);

	};

	cargarCombosproductosFK(inventario_fisico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_producto",inventario_fisico_detalle_control.productosFK);

		if(inventario_fisico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+inventario_fisico_detalle_control.idFilaTablaActual+"_3",inventario_fisico_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",inventario_fisico_detalle_control.productosFK);

	};

	cargarCombosbodegasFK(inventario_fisico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_bodega",inventario_fisico_detalle_control.bodegasFK);

		if(inventario_fisico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+inventario_fisico_detalle_control.idFilaTablaActual+"_4",inventario_fisico_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",inventario_fisico_detalle_control.bodegasFK);

	};

	
	
	registrarComboActionChangeCombosinventario_fisicosFK(inventario_fisico_detalle_control) {

	};

	registrarComboActionChangeCombosproductosFK(inventario_fisico_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(inventario_fisico_detalle_control) {

	};

	
	
	setDefectoValorCombosinventario_fisicosFK(inventario_fisico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(inventario_fisico_detalle_control.idinventario_fisicoDefaultFK>-1 && jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_inventario_fisico").val() != inventario_fisico_detalle_control.idinventario_fisicoDefaultFK) {
				jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_inventario_fisico").val(inventario_fisico_detalle_control.idinventario_fisicoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idinventario_fisico-cmbid_inventario_fisico").val(inventario_fisico_detalle_control.idinventario_fisicoDefaultForeignKey).trigger("change");
			if(jQuery("#"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idinventario_fisico-cmbid_inventario_fisico").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idinventario_fisico-cmbid_inventario_fisico").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(inventario_fisico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(inventario_fisico_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_producto").val() != inventario_fisico_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_producto").val(inventario_fisico_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(inventario_fisico_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(inventario_fisico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(inventario_fisico_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != inventario_fisico_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_bodega").val(inventario_fisico_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(inventario_fisico_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+inventario_fisico_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//inventario_fisico_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(inventario_fisico_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(inventario_fisico_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(inventario_fisico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_inventario_fisico",inventario_fisico_detalle_control.strRecargarFkTipos,",")) { 
				inventario_fisico_detalle_webcontrol1.setDefectoValorCombosinventario_fisicosFK(inventario_fisico_detalle_control);
			}

			if(inventario_fisico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",inventario_fisico_detalle_control.strRecargarFkTipos,",")) { 
				inventario_fisico_detalle_webcontrol1.setDefectoValorCombosproductosFK(inventario_fisico_detalle_control);
			}

			if(inventario_fisico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",inventario_fisico_detalle_control.strRecargarFkTipos,",")) { 
				inventario_fisico_detalle_webcontrol1.setDefectoValorCombosbodegasFK(inventario_fisico_detalle_control);
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
	onLoadCombosEventosFK(inventario_fisico_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(inventario_fisico_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(inventario_fisico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_inventario_fisico",inventario_fisico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				inventario_fisico_detalle_webcontrol1.registrarComboActionChangeCombosinventario_fisicosFK(inventario_fisico_detalle_control);
			//}

			//if(inventario_fisico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",inventario_fisico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				inventario_fisico_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(inventario_fisico_detalle_control);
			//}

			//if(inventario_fisico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",inventario_fisico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				inventario_fisico_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(inventario_fisico_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(inventario_fisico_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(inventario_fisico_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(inventario_fisico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("inventario_fisico_detalle");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("inventario_fisico_detalle");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(inventario_fisico_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);			
			
			if(inventario_fisico_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,"inventario_fisico_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("inventario_fisico","id_inventario_fisico","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_inventario_fisico_img_busqueda").click(function(){
				inventario_fisico_detalle_webcontrol1.abrirBusquedaParainventario_fisico("id_inventario_fisico");
				//alert(jQuery('#form-id_inventario_fisico_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				inventario_fisico_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+inventario_fisico_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				inventario_fisico_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("inventario_fisico_detalle","FK_Idbodega","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("inventario_fisico_detalle","FK_Idinventario_fisico","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("inventario_fisico_detalle","FK_Idproducto","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			inventario_fisico_detalle_funcion1.validarFormularioJQuery(inventario_fisico_detalle_constante1);
			
			if(inventario_fisico_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(inventario_fisico_detalle_control) {
		
		jQuery("#divBusquedainventario_fisico_detalleAjaxWebPart").css("display",inventario_fisico_detalle_control.strPermisoBusqueda);
		jQuery("#trinventario_fisico_detalleCabeceraBusquedas").css("display",inventario_fisico_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedainventario_fisico_detalle").css("display",inventario_fisico_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteinventario_fisico_detalle").css("display",inventario_fisico_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosinventario_fisico_detalle").attr("style",inventario_fisico_detalle_control.strPermisoMostrarTodos);
		
		if(inventario_fisico_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdinventario_fisico_detalleNuevo").css("display",inventario_fisico_detalle_control.strPermisoNuevo);
			jQuery("#tdinventario_fisico_detalleNuevoToolBar").css("display",inventario_fisico_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdinventario_fisico_detalleDuplicar").css("display",inventario_fisico_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdinventario_fisico_detalleDuplicarToolBar").css("display",inventario_fisico_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdinventario_fisico_detalleNuevoGuardarCambios").css("display",inventario_fisico_detalle_control.strPermisoNuevo);
			jQuery("#tdinventario_fisico_detalleNuevoGuardarCambiosToolBar").css("display",inventario_fisico_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(inventario_fisico_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdinventario_fisico_detalleActualizarToolBar").css("display",inventario_fisico_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdinventario_fisico_detalleCopiar").css("display",inventario_fisico_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdinventario_fisico_detalleCopiarToolBar").css("display",inventario_fisico_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdinventario_fisico_detalleConEditar").css("display",inventario_fisico_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdinventario_fisico_detalleEliminarToolBar").css("display",inventario_fisico_detalle_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdinventario_fisico_detalleGuardarCambios").css("display",inventario_fisico_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdinventario_fisico_detalleGuardarCambiosToolBar").css("display",inventario_fisico_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trinventario_fisico_detalleElementos").css("display",inventario_fisico_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trinventario_fisico_detalleAcciones").css("display",inventario_fisico_detalle_control.strVisibleTablaAcciones);
		jQuery("#trinventario_fisico_detalleParametrosAcciones").css("display",inventario_fisico_detalle_control.strVisibleTablaAcciones);
			
		jQuery("#tdinventario_fisico_detalleCerrarPagina").css("display",inventario_fisico_detalle_control.strPermisoPopup);		
		jQuery("#tdinventario_fisico_detalleCerrarPaginaToolBar").css("display",inventario_fisico_detalle_control.strPermisoPopup);
		//jQuery("#trinventario_fisico_detalleAccionesRelaciones").css("display",inventario_fisico_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		inventario_fisico_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		inventario_fisico_detalle_webcontrol1.registrarEventosControles();
		
		if(inventario_fisico_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(inventario_fisico_detalle_constante1.STR_ES_RELACIONADO=="false") {
			inventario_fisico_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(inventario_fisico_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(inventario_fisico_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				inventario_fisico_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(inventario_fisico_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(inventario_fisico_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				inventario_fisico_detalle_webcontrol1.onLoad();
				
			} else {
				if(inventario_fisico_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
					if(inventario_fisico_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
						//inventario_fisico_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(inventario_fisico_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(inventario_fisico_detalle_constante1.BIG_ID_ACTUAL,"inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);
						//inventario_fisico_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			inventario_fisico_detalle_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("inventario_fisico_detalle","inventario","",inventario_fisico_detalle_funcion1,inventario_fisico_detalle_webcontrol1,inventario_fisico_detalle_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var inventario_fisico_detalle_webcontrol1=new inventario_fisico_detalle_webcontrol();

if(inventario_fisico_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = inventario_fisico_detalle_webcontrol1.onLoadWindow; 
}

//</script>