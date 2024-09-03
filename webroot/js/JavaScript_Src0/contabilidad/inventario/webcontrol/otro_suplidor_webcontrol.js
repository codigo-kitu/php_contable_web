//<script type="text/javascript" language="javascript">



//var otro_suplidorJQueryPaginaWebInteraccion= function (otro_suplidor_control) {
//this.,this.,this.

class otro_suplidor_webcontrol extends otro_suplidor_webcontrol_add {
	
	otro_suplidor_control=null;
	otro_suplidor_controlInicial=null;
	otro_suplidor_controlAuxiliar=null;
		
	//if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(otro_suplidor_control) {
		super();
		
		this.otro_suplidor_control=otro_suplidor_control;
	}
		
	actualizarVariablesPagina(otro_suplidor_control) {
		
		if(otro_suplidor_control.action=="index" || otro_suplidor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(otro_suplidor_control);
			
		} else if(otro_suplidor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(otro_suplidor_control);
			
		} else if(otro_suplidor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(otro_suplidor_control);
			
		} else if(otro_suplidor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_suplidor_control);		
		
		} else if(otro_suplidor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(otro_suplidor_control);		
		
		} else if(otro_suplidor_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_suplidor_control);		
		
		} else if(otro_suplidor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(otro_suplidor_control);		
		}
		else if(otro_suplidor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(otro_suplidor_control);		
		}
		else if(otro_suplidor_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(otro_suplidor_control);		
		}
		else if(otro_suplidor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(otro_suplidor_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(otro_suplidor_control.action + " Revisar Manejo");
			
			if(otro_suplidor_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(otro_suplidor_control);
				
				return;
			}
			
			//if(otro_suplidor_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(otro_suplidor_control);
			//}
			
			if(otro_suplidor_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(otro_suplidor_control);
			}
			
			if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_suplidor_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(otro_suplidor_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(otro_suplidor_control, false);			
			}
			
			if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(otro_suplidor_control);	
			}
			
			if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(otro_suplidor_control);
			}
			
			if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(otro_suplidor_control);
			}
			
			if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(otro_suplidor_control);
			}
			
			if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(otro_suplidor_control);	
			}
			
			if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
			}
			
			if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(otro_suplidor_control);
			}
			
			
			if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(otro_suplidor_control);			
			}
			
			if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(otro_suplidor_control);
			}
			
			
			if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(otro_suplidor_control);
			}
			
			if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(otro_suplidor_control);
			}				
			
			if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_suplidor_control);
			}
			
			if(otro_suplidor_control.usuarioActual!=null && otro_suplidor_control.usuarioActual.field_strUserName!=null &&
			otro_suplidor_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(otro_suplidor_control);			
			}
		}
		
		
		if(otro_suplidor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(otro_suplidor_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(otro_suplidor_control) {
		
		this.actualizarPaginaCargaGeneral(otro_suplidor_control);
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		this.actualizarPaginaCargaGeneralControles(otro_suplidor_control);
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_suplidor_control);
		this.actualizarPaginaAreaBusquedas(otro_suplidor_control);
		this.actualizarPaginaCargaCombosFK(otro_suplidor_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_suplidor_control) {
		
		this.actualizarPaginaCargaGeneral(otro_suplidor_control);
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		this.actualizarPaginaCargaGeneralControles(otro_suplidor_control);
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_suplidor_control);
		this.actualizarPaginaAreaBusquedas(otro_suplidor_control);
		this.actualizarPaginaCargaCombosFK(otro_suplidor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(otro_suplidor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(otro_suplidor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(otro_suplidor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(otro_suplidor_control) {
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(otro_suplidor_control) {
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_suplidor_control) {
		this.actualizarPaginaCargaGeneralControles(otro_suplidor_control);
		this.actualizarPaginaCargaCombosFK(otro_suplidor_control);
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_suplidor_control) {
		this.actualizarPaginaAbrirLink(otro_suplidor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);				
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		this.actualizarPaginaFormulario(otro_suplidor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		this.actualizarPaginaFormulario(otro_suplidor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(otro_suplidor_control) {
		this.actualizarPaginaFormulario(otro_suplidor_control);
		this.onLoadCombosDefectoFK(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		this.actualizarPaginaFormulario(otro_suplidor_control);
		this.onLoadCombosDefectoFK(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_suplidor_control) {
		this.actualizarPaginaCargaGeneralControles(otro_suplidor_control);
		this.actualizarPaginaCargaCombosFK(otro_suplidor_control);
		this.actualizarPaginaFormulario(otro_suplidor_control);
		this.onLoadCombosDefectoFK(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_suplidor_control) {
		this.actualizarPaginaAbrirLink(otro_suplidor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_suplidor_control) {
		this.actualizarPaginaImprimir(otro_suplidor_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_suplidor_control) {
		this.actualizarPaginaImprimir(otro_suplidor_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(otro_suplidor_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_suplidor_control) {
		//FORMULARIO
		if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_suplidor_control);
			this.actualizarPaginaFormularioAdd(otro_suplidor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		//COMBOS FK
		if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_suplidor_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(otro_suplidor_control) {
		//FORMULARIO
		if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_suplidor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);	
		//COMBOS FK
		if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_suplidor_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		this.actualizarPaginaFormulario(otro_suplidor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(otro_suplidor_control) {
		//FORMULARIO
		if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_suplidor_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(otro_suplidor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);	
		//COMBOS FK
		if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_suplidor_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(otro_suplidor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_suplidor_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control) {
		if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_suplidor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(otro_suplidor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(otro_suplidor_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(otro_suplidor_control) {
		if(otro_suplidor_funcion1.esPaginaForm()==true) {
			window.opener.otro_suplidor_webcontrol1.actualizarPaginaTablaDatos(otro_suplidor_control);
		} else {
			this.actualizarPaginaTablaDatos(otro_suplidor_control);
		}
	}
	
	actualizarPaginaAbrirLink(otro_suplidor_control) {
		otro_suplidor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(otro_suplidor_control.strAuxiliarUrlPagina);
				
		otro_suplidor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(otro_suplidor_control.strAuxiliarTipo,otro_suplidor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(otro_suplidor_control) {
		otro_suplidor_funcion1.resaltarRestaurarDivMensaje(true,otro_suplidor_control.strAuxiliarMensajeAlert,otro_suplidor_control.strAuxiliarCssMensaje);
			
		if(otro_suplidor_funcion1.esPaginaForm()==true) {
			window.opener.otro_suplidor_funcion1.resaltarRestaurarDivMensaje(true,otro_suplidor_control.strAuxiliarMensajeAlert,otro_suplidor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(otro_suplidor_control) {
		eval(otro_suplidor_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(otro_suplidor_control, mostrar) {
		
		if(mostrar==true) {
			otro_suplidor_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				otro_suplidor_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			otro_suplidor_funcion1.mostrarDivMensaje(true,otro_suplidor_control.strAuxiliarMensaje,otro_suplidor_control.strAuxiliarCssMensaje);
		
		} else {
			otro_suplidor_funcion1.mostrarDivMensaje(false,otro_suplidor_control.strAuxiliarMensaje,otro_suplidor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(otro_suplidor_control) {
	
		funcionGeneral.printWebPartPage("otro_suplidor",otro_suplidor_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarotro_suplidorsAjaxWebPart").html(otro_suplidor_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("otro_suplidor",jQuery("#divTablaDatosReporteAuxiliarotro_suplidorsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(otro_suplidor_control) {
		this.otro_suplidor_controlInicial=otro_suplidor_control;
			
		if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(otro_suplidor_control.strStyleDivArbol,otro_suplidor_control.strStyleDivContent
																,otro_suplidor_control.strStyleDivOpcionesBanner,otro_suplidor_control.strStyleDivExpandirColapsar
																,otro_suplidor_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=otro_suplidor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",otro_suplidor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(otro_suplidor_control) {
		jQuery("#divTablaDatosotro_suplidorsAjaxWebPart").html(otro_suplidor_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosotro_suplidors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosotro_suplidors=jQuery("#tblTablaDatosotro_suplidors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("otro_suplidor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',otro_suplidor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			otro_suplidor_webcontrol1.registrarControlesTableEdition(otro_suplidor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		otro_suplidor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(otro_suplidor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(otro_suplidor_control.otro_suplidorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(otro_suplidor_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(otro_suplidor_control) {
		this.actualizarCssBotonesPagina(otro_suplidor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(otro_suplidor_control.tiposReportes,otro_suplidor_control.tiposReporte
															 	,otro_suplidor_control.tiposPaginacion,otro_suplidor_control.tiposAcciones
																,otro_suplidor_control.tiposColumnasSelect,otro_suplidor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(otro_suplidor_control.tiposRelaciones,otro_suplidor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(otro_suplidor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(otro_suplidor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(otro_suplidor_control);			
	}
	
	actualizarPaginaAreaBusquedas(otro_suplidor_control) {
		jQuery("#divBusquedaotro_suplidorAjaxWebPart").css("display",otro_suplidor_control.strPermisoBusqueda);
		jQuery("#trotro_suplidorCabeceraBusquedas").css("display",otro_suplidor_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_suplidor").css("display",otro_suplidor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(otro_suplidor_control.htmlTablaOrderBy!=null
			&& otro_suplidor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByotro_suplidorAjaxWebPart").html(otro_suplidor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//otro_suplidor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(otro_suplidor_control.htmlTablaOrderByRel!=null
			&& otro_suplidor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelotro_suplidorAjaxWebPart").html(otro_suplidor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(otro_suplidor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaotro_suplidorAjaxWebPart").css("display","none");
			jQuery("#trotro_suplidorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaotro_suplidor").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(otro_suplidor_control) {
		jQuery("#tdotro_suplidorNuevo").css("display",otro_suplidor_control.strPermisoNuevo);
		jQuery("#trotro_suplidorElementos").css("display",otro_suplidor_control.strVisibleTablaElementos);
		jQuery("#trotro_suplidorAcciones").css("display",otro_suplidor_control.strVisibleTablaAcciones);
		jQuery("#trotro_suplidorParametrosAcciones").css("display",otro_suplidor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(otro_suplidor_control) {
	
		this.actualizarCssBotonesMantenimiento(otro_suplidor_control);
				
		if(otro_suplidor_control.otro_suplidorActual!=null) {//form
			
			this.actualizarCamposFormulario(otro_suplidor_control);			
		}
						
		this.actualizarSpanMensajesCampos(otro_suplidor_control);
	}
	
	actualizarPaginaUsuarioInvitado(otro_suplidor_control) {
	
		var indexPosition=otro_suplidor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=otro_suplidor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(otro_suplidor_control) {
		jQuery("#divResumenotro_suplidorActualAjaxWebPart").html(otro_suplidor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_suplidor_control) {
		jQuery("#divAccionesRelacionesotro_suplidorAjaxWebPart").html(otro_suplidor_control.htmlTablaAccionesRelaciones);
			
		otro_suplidor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(otro_suplidor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(otro_suplidor_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(otro_suplidor_control) {
		
		if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",otro_suplidor_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",otro_suplidor_control.strVisibleFK_Idproducto);
		}

		if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",otro_suplidor_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",otro_suplidor_control.strVisibleFK_Idproveedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionotro_suplidor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("otro_suplidor",id,"inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);		
	}
	
	

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		otro_suplidor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("otro_suplidor","producto","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		otro_suplidor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("otro_suplidor","proveedor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(otro_suplidor_control) {
	
		jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id").val(otro_suplidor_control.otro_suplidorActual.id);
		jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-version_row").val(otro_suplidor_control.otro_suplidorActual.versionRow);
		
		if(otro_suplidor_control.otro_suplidorActual.id_producto!=null && otro_suplidor_control.otro_suplidorActual.id_producto>-1){
			if(jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val() != otro_suplidor_control.otro_suplidorActual.id_producto) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val(otro_suplidor_control.otro_suplidorActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(otro_suplidor_control.otro_suplidorActual.id_proveedor!=null && otro_suplidor_control.otro_suplidorActual.id_proveedor>-1){
			if(jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val() != otro_suplidor_control.otro_suplidorActual.id_proveedor) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val(otro_suplidor_control.otro_suplidorActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+otro_suplidor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("otro_suplidor","inventario","","form_otro_suplidor",formulario,"","",paraEventoTabla,idFilaTabla,otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
	}
	
	cargarCombosFK(otro_suplidor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",otro_suplidor_control.strRecargarFkTipos,",")) { 
				otro_suplidor_webcontrol1.cargarCombosproductosFK(otro_suplidor_control);
			}

			if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",otro_suplidor_control.strRecargarFkTipos,",")) { 
				otro_suplidor_webcontrol1.cargarCombosproveedorsFK(otro_suplidor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(otro_suplidor_control.strRecargarFkTiposNinguno!=null && otro_suplidor_control.strRecargarFkTiposNinguno!='NINGUNO' && otro_suplidor_control.strRecargarFkTiposNinguno!='') {
			
				if(otro_suplidor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",otro_suplidor_control.strRecargarFkTiposNinguno,",")) { 
					otro_suplidor_webcontrol1.cargarCombosproductosFK(otro_suplidor_control);
				}

				if(otro_suplidor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",otro_suplidor_control.strRecargarFkTiposNinguno,",")) { 
					otro_suplidor_webcontrol1.cargarCombosproveedorsFK(otro_suplidor_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(otro_suplidor_control) {
		jQuery("#spanstrMensajeid").text(otro_suplidor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(otro_suplidor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_producto").text(otro_suplidor_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_proveedor").text(otro_suplidor_control.strMensajeid_proveedor);		
	}
	
	actualizarCssBotonesMantenimiento(otro_suplidor_control) {
		jQuery("#tdbtnNuevootro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevootro_suplidor").css("display",otro_suplidor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarotro_suplidor").css("display",otro_suplidor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarotro_suplidor").css("display",otro_suplidor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosotro_suplidor").css("display",otro_suplidor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncotizacion_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualotro_suplidor");

			otro_suplidor_webcontrol1.registrarSesionParacotizacion_detalles(idActual);
		});
		jQuery("#imgdivrelacionlista_producto").click(function(){

			var idActual=jQuery(this).attr("idactualotro_suplidor");

			otro_suplidor_webcontrol1.registrarSesionParalista_productoes(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproductoFK(otro_suplidor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_suplidor_funcion1,otro_suplidor_control.productosFK);
	}

	cargarComboEditarTablaproveedorFK(otro_suplidor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_suplidor_funcion1,otro_suplidor_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(otro_suplidor_control) {
		var i=0;
		
		i=otro_suplidor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(otro_suplidor_control.otro_suplidorActual.id);
		jQuery("#t-version_row_"+i+"").val(otro_suplidor_control.otro_suplidorActual.versionRow);
		
		if(otro_suplidor_control.otro_suplidorActual.id_producto!=null && otro_suplidor_control.otro_suplidorActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != otro_suplidor_control.otro_suplidorActual.id_producto) {
				jQuery("#t-cel_"+i+"_2").val(otro_suplidor_control.otro_suplidorActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(otro_suplidor_control.otro_suplidorActual.id_proveedor!=null && otro_suplidor_control.otro_suplidorActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != otro_suplidor_control.otro_suplidorActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_3").val(otro_suplidor_control.otro_suplidorActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(otro_suplidor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncotizacion_detalle").click(function(){
		jQuery("#tblTablaDatosotro_suplidors").on("click",".imgrelacioncotizacion_detalle", function () {

			var idActual=jQuery(this).attr("idactualotro_suplidor");

			otro_suplidor_webcontrol1.registrarSesionParacotizacion_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_producto").click(function(){
		jQuery("#tblTablaDatosotro_suplidors").on("click",".imgrelacionlista_producto", function () {

			var idActual=jQuery(this).attr("idactualotro_suplidor");

			otro_suplidor_webcontrol1.registrarSesionParalista_productoes(idActual);
		});				
	}
		
	

	registrarSesionParacotizacion_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"otro_suplidor","cotizacion_detalle","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,"s","");
	}

	registrarSesionParalista_productoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"otro_suplidor","lista_producto","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(otro_suplidor_control) {
		otro_suplidor_funcion1.registrarControlesTableValidacionEdition(otro_suplidor_control,otro_suplidor_webcontrol1,otro_suplidor_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidorConstante,strParametros);
		
		//otro_suplidor_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosproductosFK(otro_suplidor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto",otro_suplidor_control.productosFK);

		if(otro_suplidor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_suplidor_control.idFilaTablaActual+"_2",otro_suplidor_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",otro_suplidor_control.productosFK);

	};

	cargarCombosproveedorsFK(otro_suplidor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor",otro_suplidor_control.proveedorsFK);

		if(otro_suplidor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_suplidor_control.idFilaTablaActual+"_3",otro_suplidor_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",otro_suplidor_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(otro_suplidor_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(otro_suplidor_control) {

	};

	
	
	setDefectoValorCombosproductosFK(otro_suplidor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_suplidor_control.idproductoDefaultFK>-1 && jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val() != otro_suplidor_control.idproductoDefaultFK) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val(otro_suplidor_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(otro_suplidor_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(otro_suplidor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_suplidor_control.idproveedorDefaultFK>-1 && jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val() != otro_suplidor_control.idproveedorDefaultFK) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val(otro_suplidor_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(otro_suplidor_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//otro_suplidor_control
		
	
	}
	
	onLoadCombosDefectoFK(otro_suplidor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_suplidor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",otro_suplidor_control.strRecargarFkTipos,",")) { 
				otro_suplidor_webcontrol1.setDefectoValorCombosproductosFK(otro_suplidor_control);
			}

			if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",otro_suplidor_control.strRecargarFkTipos,",")) { 
				otro_suplidor_webcontrol1.setDefectoValorCombosproveedorsFK(otro_suplidor_control);
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
	onLoadCombosEventosFK(otro_suplidor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_suplidor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",otro_suplidor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_suplidor_webcontrol1.registrarComboActionChangeCombosproductosFK(otro_suplidor_control);
			//}

			//if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",otro_suplidor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_suplidor_webcontrol1.registrarComboActionChangeCombosproveedorsFK(otro_suplidor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(otro_suplidor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_suplidor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("otro_suplidor");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("otro_suplidor");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(otro_suplidor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);			
			
			if(otro_suplidor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,"otro_suplidor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				otro_suplidor_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				otro_suplidor_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("otro_suplidor","FK_Idproducto","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("otro_suplidor","FK_Idproveedor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("otro_suplidor");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			otro_suplidor_funcion1.validarFormularioJQuery(otro_suplidor_constante1);
			
			if(otro_suplidor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(otro_suplidor_control) {
		
		jQuery("#divBusquedaotro_suplidorAjaxWebPart").css("display",otro_suplidor_control.strPermisoBusqueda);
		jQuery("#trotro_suplidorCabeceraBusquedas").css("display",otro_suplidor_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_suplidor").css("display",otro_suplidor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteotro_suplidor").css("display",otro_suplidor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosotro_suplidor").attr("style",otro_suplidor_control.strPermisoMostrarTodos);
		
		if(otro_suplidor_control.strPermisoNuevo!=null) {
			jQuery("#tdotro_suplidorNuevo").css("display",otro_suplidor_control.strPermisoNuevo);
			jQuery("#tdotro_suplidorNuevoToolBar").css("display",otro_suplidor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdotro_suplidorDuplicar").css("display",otro_suplidor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_suplidorDuplicarToolBar").css("display",otro_suplidor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_suplidorNuevoGuardarCambios").css("display",otro_suplidor_control.strPermisoNuevo);
			jQuery("#tdotro_suplidorNuevoGuardarCambiosToolBar").css("display",otro_suplidor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(otro_suplidor_control.strPermisoActualizar!=null) {
			jQuery("#tdotro_suplidorActualizarToolBar").css("display",otro_suplidor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_suplidorCopiar").css("display",otro_suplidor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_suplidorCopiarToolBar").css("display",otro_suplidor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_suplidorConEditar").css("display",otro_suplidor_control.strPermisoActualizar);
		}
		
		jQuery("#tdotro_suplidorEliminarToolBar").css("display",otro_suplidor_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdotro_suplidorGuardarCambios").css("display",otro_suplidor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdotro_suplidorGuardarCambiosToolBar").css("display",otro_suplidor_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trotro_suplidorElementos").css("display",otro_suplidor_control.strVisibleTablaElementos);
		
		jQuery("#trotro_suplidorAcciones").css("display",otro_suplidor_control.strVisibleTablaAcciones);
		jQuery("#trotro_suplidorParametrosAcciones").css("display",otro_suplidor_control.strVisibleTablaAcciones);
			
		jQuery("#tdotro_suplidorCerrarPagina").css("display",otro_suplidor_control.strPermisoPopup);		
		jQuery("#tdotro_suplidorCerrarPaginaToolBar").css("display",otro_suplidor_control.strPermisoPopup);
		//jQuery("#trotro_suplidorAccionesRelaciones").css("display",otro_suplidor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		otro_suplidor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		otro_suplidor_webcontrol1.registrarEventosControles();
		
		if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
			otro_suplidor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(otro_suplidor_constante1.STR_ES_RELACIONES=="true") {
			if(otro_suplidor_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_suplidor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(otro_suplidor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(otro_suplidor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				otro_suplidor_webcontrol1.onLoad();
				
			} else {
				if(otro_suplidor_constante1.BIT_ES_PAGINA_FORM==true) {
					if(otro_suplidor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
						//otro_suplidor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(otro_suplidor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(otro_suplidor_constante1.BIG_ID_ACTUAL,"otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
						//otro_suplidor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			otro_suplidor_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var otro_suplidor_webcontrol1=new otro_suplidor_webcontrol();

if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = otro_suplidor_webcontrol1.onLoadWindow; 
}

//</script>