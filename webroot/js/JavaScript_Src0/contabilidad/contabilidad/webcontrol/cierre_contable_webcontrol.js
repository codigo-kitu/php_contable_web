//<script type="text/javascript" language="javascript">



//var cierre_contableJQueryPaginaWebInteraccion= function (cierre_contable_control) {
//this.,this.,this.

class cierre_contable_webcontrol extends cierre_contable_webcontrol_add {
	
	cierre_contable_control=null;
	cierre_contable_controlInicial=null;
	cierre_contable_controlAuxiliar=null;
		
	//if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cierre_contable_control) {
		super();
		
		this.cierre_contable_control=cierre_contable_control;
	}
		
	actualizarVariablesPagina(cierre_contable_control) {
		
		if(cierre_contable_control.action=="index" || cierre_contable_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cierre_contable_control);
			
		} else if(cierre_contable_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cierre_contable_control);
			
		} else if(cierre_contable_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cierre_contable_control);
			
		} else if(cierre_contable_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cierre_contable_control);		
		
		} else if(cierre_contable_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cierre_contable_control);		
		
		} else if(cierre_contable_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cierre_contable_control);		
		
		} else if(cierre_contable_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cierre_contable_control);		
		}
		else if(cierre_contable_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_control);		
		}
		else if(cierre_contable_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cierre_contable_control);		
		}
		else if(cierre_contable_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cierre_contable_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(cierre_contable_control.action + " Revisar Manejo");
			
			if(cierre_contable_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(cierre_contable_control);
				
				return;
			}
			
			//if(cierre_contable_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(cierre_contable_control);
			//}
			
			if(cierre_contable_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(cierre_contable_control);
			}
			
			if(cierre_contable_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cierre_contable_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(cierre_contable_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(cierre_contable_control, false);			
			}
			
			if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(cierre_contable_control);	
			}
			
			if(cierre_contable_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(cierre_contable_control);
			}
			
			if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(cierre_contable_control);
			}
			
			if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(cierre_contable_control);
			}
			
			if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(cierre_contable_control);	
			}
			
			if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
			}
			
			if(cierre_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(cierre_contable_control);
			}
			
			
			if(cierre_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(cierre_contable_control);			
			}
			
			if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(cierre_contable_control);
			}
			
			
			if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_control);
			}
			
			if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(cierre_contable_control);
			}				
			
			if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cierre_contable_control);
			}
			
			if(cierre_contable_control.usuarioActual!=null && cierre_contable_control.usuarioActual.field_strUserName!=null &&
			cierre_contable_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(cierre_contable_control);			
			}
		}
		
		
		if(cierre_contable_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cierre_contable_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(cierre_contable_control) {
		
		this.actualizarPaginaCargaGeneral(cierre_contable_control);
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		this.actualizarPaginaCargaGeneralControles(cierre_contable_control);
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_control);
		this.actualizarPaginaAreaBusquedas(cierre_contable_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cierre_contable_control) {
		
		this.actualizarPaginaCargaGeneral(cierre_contable_control);
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		this.actualizarPaginaCargaGeneralControles(cierre_contable_control);
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_control);
		this.actualizarPaginaAreaBusquedas(cierre_contable_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(cierre_contable_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cierre_contable_control);		
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cierre_contable_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cierre_contable_control);		
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cierre_contable_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cierre_contable_control);		
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(cierre_contable_control) {
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cierre_contable_control) {
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cierre_contable_control) {
		this.actualizarPaginaCargaGeneralControles(cierre_contable_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_control);
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cierre_contable_control) {
		this.actualizarPaginaAbrirLink(cierre_contable_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);				
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		this.actualizarPaginaFormulario(cierre_contable_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		this.actualizarPaginaFormulario(cierre_contable_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cierre_contable_control) {
		this.actualizarPaginaFormulario(cierre_contable_control);
		this.onLoadCombosDefectoFK(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		this.actualizarPaginaFormulario(cierre_contable_control);
		this.onLoadCombosDefectoFK(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cierre_contable_control) {
		this.actualizarPaginaCargaGeneralControles(cierre_contable_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_control);
		this.actualizarPaginaFormulario(cierre_contable_control);
		this.onLoadCombosDefectoFK(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cierre_contable_control) {
		this.actualizarPaginaAbrirLink(cierre_contable_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cierre_contable_control) {
		this.actualizarPaginaImprimir(cierre_contable_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cierre_contable_control) {
		this.actualizarPaginaImprimir(cierre_contable_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cierre_contable_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cierre_contable_control) {
		//FORMULARIO
		if(cierre_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cierre_contable_control);
			this.actualizarPaginaFormularioAdd(cierre_contable_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		//COMBOS FK
		if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cierre_contable_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(cierre_contable_control) {
		//FORMULARIO
		if(cierre_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cierre_contable_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);	
		//COMBOS FK
		if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cierre_contable_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		this.actualizarPaginaFormulario(cierre_contable_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cierre_contable_control) {
		//FORMULARIO
		if(cierre_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cierre_contable_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cierre_contable_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);	
		//COMBOS FK
		if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cierre_contable_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cierre_contable_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cierre_contable_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control) {
		if(cierre_contable_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cierre_contable_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cierre_contable_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cierre_contable_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cierre_contable_control) {
		if(cierre_contable_funcion1.esPaginaForm()==true) {
			window.opener.cierre_contable_webcontrol1.actualizarPaginaTablaDatos(cierre_contable_control);
		} else {
			this.actualizarPaginaTablaDatos(cierre_contable_control);
		}
	}
	
	actualizarPaginaAbrirLink(cierre_contable_control) {
		cierre_contable_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cierre_contable_control.strAuxiliarUrlPagina);
				
		cierre_contable_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cierre_contable_control.strAuxiliarTipo,cierre_contable_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cierre_contable_control) {
		cierre_contable_funcion1.resaltarRestaurarDivMensaje(true,cierre_contable_control.strAuxiliarMensajeAlert,cierre_contable_control.strAuxiliarCssMensaje);
			
		if(cierre_contable_funcion1.esPaginaForm()==true) {
			window.opener.cierre_contable_funcion1.resaltarRestaurarDivMensaje(true,cierre_contable_control.strAuxiliarMensajeAlert,cierre_contable_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(cierre_contable_control) {
		eval(cierre_contable_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(cierre_contable_control, mostrar) {
		
		if(mostrar==true) {
			cierre_contable_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cierre_contable_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			cierre_contable_funcion1.mostrarDivMensaje(true,cierre_contable_control.strAuxiliarMensaje,cierre_contable_control.strAuxiliarCssMensaje);
		
		} else {
			cierre_contable_funcion1.mostrarDivMensaje(false,cierre_contable_control.strAuxiliarMensaje,cierre_contable_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(cierre_contable_control) {
	
		funcionGeneral.printWebPartPage("cierre_contable",cierre_contable_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcierre_contablesAjaxWebPart").html(cierre_contable_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("cierre_contable",jQuery("#divTablaDatosReporteAuxiliarcierre_contablesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(cierre_contable_control) {
		this.cierre_contable_controlInicial=cierre_contable_control;
			
		if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cierre_contable_control.strStyleDivArbol,cierre_contable_control.strStyleDivContent
																,cierre_contable_control.strStyleDivOpcionesBanner,cierre_contable_control.strStyleDivExpandirColapsar
																,cierre_contable_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=cierre_contable_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cierre_contable_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(cierre_contable_control) {
		jQuery("#divTablaDatoscierre_contablesAjaxWebPart").html(cierre_contable_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscierre_contables=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscierre_contables=jQuery("#tblTablaDatoscierre_contables").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cierre_contable",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cierre_contable_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cierre_contable_webcontrol1.registrarControlesTableEdition(cierre_contable_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cierre_contable_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(cierre_contable_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cierre_contable_control.cierre_contableActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cierre_contable_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(cierre_contable_control) {
		this.actualizarCssBotonesPagina(cierre_contable_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cierre_contable_control.tiposReportes,cierre_contable_control.tiposReporte
															 	,cierre_contable_control.tiposPaginacion,cierre_contable_control.tiposAcciones
																,cierre_contable_control.tiposColumnasSelect,cierre_contable_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cierre_contable_control.tiposRelaciones,cierre_contable_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cierre_contable_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cierre_contable_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cierre_contable_control);			
	}
	
	actualizarPaginaAreaBusquedas(cierre_contable_control) {
		jQuery("#divBusquedacierre_contableAjaxWebPart").css("display",cierre_contable_control.strPermisoBusqueda);
		jQuery("#trcierre_contableCabeceraBusquedas").css("display",cierre_contable_control.strPermisoBusqueda);
		jQuery("#trBusquedacierre_contable").css("display",cierre_contable_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cierre_contable_control.htmlTablaOrderBy!=null
			&& cierre_contable_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycierre_contableAjaxWebPart").html(cierre_contable_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cierre_contable_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cierre_contable_control.htmlTablaOrderByRel!=null
			&& cierre_contable_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcierre_contableAjaxWebPart").html(cierre_contable_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cierre_contable_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacierre_contableAjaxWebPart").css("display","none");
			jQuery("#trcierre_contableCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacierre_contable").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(cierre_contable_control) {
		jQuery("#tdcierre_contableNuevo").css("display",cierre_contable_control.strPermisoNuevo);
		jQuery("#trcierre_contableElementos").css("display",cierre_contable_control.strVisibleTablaElementos);
		jQuery("#trcierre_contableAcciones").css("display",cierre_contable_control.strVisibleTablaAcciones);
		jQuery("#trcierre_contableParametrosAcciones").css("display",cierre_contable_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cierre_contable_control) {
	
		this.actualizarCssBotonesMantenimiento(cierre_contable_control);
				
		if(cierre_contable_control.cierre_contableActual!=null) {//form
			
			this.actualizarCamposFormulario(cierre_contable_control);			
		}
						
		this.actualizarSpanMensajesCampos(cierre_contable_control);
	}
	
	actualizarPaginaUsuarioInvitado(cierre_contable_control) {
	
		var indexPosition=cierre_contable_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cierre_contable_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(cierre_contable_control) {
		jQuery("#divResumencierre_contableActualAjaxWebPart").html(cierre_contable_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cierre_contable_control) {
		jQuery("#divAccionesRelacionescierre_contableAjaxWebPart").html(cierre_contable_control.htmlTablaAccionesRelaciones);
			
		cierre_contable_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cierre_contable_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cierre_contable_control) {
		
		if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cierre_contable_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cierre_contable_control.strVisibleFK_Idejercicio);
		}

		if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cierre_contable_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cierre_contable_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cierre_contable_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cierre_contable_control.strVisibleFK_Idempresa);
		}

		if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cierre_contable_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cierre_contable_control.strVisibleFK_Idperiodo);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncierre_contable();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cierre_contable",id,"contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cierre_contable_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cierre_contable","empresa","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		cierre_contable_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cierre_contable","ejercicio","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		cierre_contable_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cierre_contable","periodo","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cierre_contable_control) {
	
		jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id").val(cierre_contable_control.cierre_contableActual.id);
		jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-version_row").val(cierre_contable_control.cierre_contableActual.versionRow);
		
		if(cierre_contable_control.cierre_contableActual.id_empresa!=null && cierre_contable_control.cierre_contableActual.id_empresa>-1){
			if(jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val() != cierre_contable_control.cierre_contableActual.id_empresa) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val(cierre_contable_control.cierre_contableActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cierre_contable_control.cierre_contableActual.id_ejercicio!=null && cierre_contable_control.cierre_contableActual.id_ejercicio>-1){
			if(jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val() != cierre_contable_control.cierre_contableActual.id_ejercicio) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val(cierre_contable_control.cierre_contableActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cierre_contable_control.cierre_contableActual.id_periodo!=null && cierre_contable_control.cierre_contableActual.id_periodo>-1){
			if(jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val() != cierre_contable_control.cierre_contableActual.id_periodo) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val(cierre_contable_control.cierre_contableActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-fecha_cierre").val(cierre_contable_control.cierre_contableActual.fecha_cierre);
		jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-gan_per").val(cierre_contable_control.cierre_contableActual.gan_per);
		jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-total_cuentas").val(cierre_contable_control.cierre_contableActual.total_cuentas);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cierre_contable_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cierre_contable","contabilidad","","form_cierre_contable",formulario,"","",paraEventoTabla,idFilaTabla,cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
	}
	
	cargarCombosFK(cierre_contable_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.cargarCombosempresasFK(cierre_contable_control);
			}

			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.cargarCombosejerciciosFK(cierre_contable_control);
			}

			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.cargarCombosperiodosFK(cierre_contable_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cierre_contable_control.strRecargarFkTiposNinguno!=null && cierre_contable_control.strRecargarFkTiposNinguno!='NINGUNO' && cierre_contable_control.strRecargarFkTiposNinguno!='') {
			
				if(cierre_contable_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cierre_contable_control.strRecargarFkTiposNinguno,",")) { 
					cierre_contable_webcontrol1.cargarCombosempresasFK(cierre_contable_control);
				}

				if(cierre_contable_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cierre_contable_control.strRecargarFkTiposNinguno,",")) { 
					cierre_contable_webcontrol1.cargarCombosejerciciosFK(cierre_contable_control);
				}

				if(cierre_contable_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cierre_contable_control.strRecargarFkTiposNinguno,",")) { 
					cierre_contable_webcontrol1.cargarCombosperiodosFK(cierre_contable_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(cierre_contable_control) {
		jQuery("#spanstrMensajeid").text(cierre_contable_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cierre_contable_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cierre_contable_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_ejercicio").text(cierre_contable_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cierre_contable_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajefecha_cierre").text(cierre_contable_control.strMensajefecha_cierre);		
		jQuery("#spanstrMensajegan_per").text(cierre_contable_control.strMensajegan_per);		
		jQuery("#spanstrMensajetotal_cuentas").text(cierre_contable_control.strMensajetotal_cuentas);		
	}
	
	actualizarCssBotonesMantenimiento(cierre_contable_control) {
		jQuery("#tdbtnNuevocierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocierre_contable").css("display",cierre_contable_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcierre_contable").css("display",cierre_contable_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcierre_contable").css("display",cierre_contable_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscierre_contable").css("display",cierre_contable_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncierre_contable_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcierre_contable");

			cierre_contable_webcontrol1.registrarSesionParacierre_contable_detalles(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cierre_contable_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cierre_contable_funcion1,cierre_contable_control.empresasFK);
	}

	cargarComboEditarTablaejercicioFK(cierre_contable_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cierre_contable_funcion1,cierre_contable_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cierre_contable_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cierre_contable_funcion1,cierre_contable_control.periodosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(cierre_contable_control) {
		var i=0;
		
		i=cierre_contable_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cierre_contable_control.cierre_contableActual.id);
		jQuery("#t-version_row_"+i+"").val(cierre_contable_control.cierre_contableActual.versionRow);
		
		if(cierre_contable_control.cierre_contableActual.id_empresa!=null && cierre_contable_control.cierre_contableActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cierre_contable_control.cierre_contableActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cierre_contable_control.cierre_contableActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cierre_contable_control.cierre_contableActual.id_ejercicio!=null && cierre_contable_control.cierre_contableActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cierre_contable_control.cierre_contableActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_3").val(cierre_contable_control.cierre_contableActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cierre_contable_control.cierre_contableActual.id_periodo!=null && cierre_contable_control.cierre_contableActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cierre_contable_control.cierre_contableActual.id_periodo) {
				jQuery("#t-cel_"+i+"_4").val(cierre_contable_control.cierre_contableActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(cierre_contable_control.cierre_contableActual.fecha_cierre);
		jQuery("#t-cel_"+i+"_6").val(cierre_contable_control.cierre_contableActual.gan_per);
		jQuery("#t-cel_"+i+"_7").val(cierre_contable_control.cierre_contableActual.total_cuentas);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cierre_contable_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncierre_contable_detalle").click(function(){
		jQuery("#tblTablaDatoscierre_contables").on("click",".imgrelacioncierre_contable_detalle", function () {

			var idActual=jQuery(this).attr("idactualcierre_contable");

			cierre_contable_webcontrol1.registrarSesionParacierre_contable_detalles(idActual);
		});				
	}
		
	

	registrarSesionParacierre_contable_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cierre_contable","cierre_contable_detalle","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(cierre_contable_control) {
		cierre_contable_funcion1.registrarControlesTableValidacionEdition(cierre_contable_control,cierre_contable_webcontrol1,cierre_contable_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contableConstante,strParametros);
		
		//cierre_contable_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(cierre_contable_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa",cierre_contable_control.empresasFK);

		if(cierre_contable_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cierre_contable_control.idFilaTablaActual+"_2",cierre_contable_control.empresasFK);
		}
	};

	cargarCombosejerciciosFK(cierre_contable_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio",cierre_contable_control.ejerciciosFK);

		if(cierre_contable_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cierre_contable_control.idFilaTablaActual+"_3",cierre_contable_control.ejerciciosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio",cierre_contable_control.ejerciciosFK);

	};

	cargarCombosperiodosFK(cierre_contable_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo",cierre_contable_control.periodosFK);

		if(cierre_contable_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cierre_contable_control.idFilaTablaActual+"_4",cierre_contable_control.periodosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo",cierre_contable_control.periodosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cierre_contable_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cierre_contable_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cierre_contable_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cierre_contable_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cierre_contable_control.idempresaDefaultFK>-1 && jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val() != cierre_contable_control.idempresaDefaultFK) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val(cierre_contable_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cierre_contable_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cierre_contable_control.idejercicioDefaultFK>-1 && jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val() != cierre_contable_control.idejercicioDefaultFK) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val(cierre_contable_control.idejercicioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val(cierre_contable_control.idejercicioDefaultForeignKey).trigger("change");
			if(jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cierre_contable_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cierre_contable_control.idperiodoDefaultFK>-1 && jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val() != cierre_contable_control.idperiodoDefaultFK) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val(cierre_contable_control.idperiodoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val(cierre_contable_control.idperiodoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cierre_contable_control
		
	
	}
	
	onLoadCombosDefectoFK(cierre_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.setDefectoValorCombosempresasFK(cierre_contable_control);
			}

			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.setDefectoValorCombosejerciciosFK(cierre_contable_control);
			}

			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.setDefectoValorCombosperiodosFK(cierre_contable_control);
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
	onLoadCombosEventosFK(cierre_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cierre_contable_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cierre_contable_webcontrol1.registrarComboActionChangeCombosempresasFK(cierre_contable_control);
			//}

			//if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cierre_contable_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cierre_contable_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cierre_contable_control);
			//}

			//if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cierre_contable_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cierre_contable_webcontrol1.registrarComboActionChangeCombosperiodosFK(cierre_contable_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cierre_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cierre_contable");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cierre_contable");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cierre_contable_funcion1,cierre_contable_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cierre_contable_funcion1,cierre_contable_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cierre_contable_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);			
			
			if(cierre_contable_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,"cierre_contable");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cierre_contable_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cierre_contable_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cierre_contable_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("cierre_contable","FK_Idejercicio","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cierre_contable","FK_Idempresa","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cierre_contable","FK_Idperiodo","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cierre_contable");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			cierre_contable_funcion1.validarFormularioJQuery(cierre_contable_constante1);
			
			if(cierre_contable_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cierre_contable_control) {
		
		jQuery("#divBusquedacierre_contableAjaxWebPart").css("display",cierre_contable_control.strPermisoBusqueda);
		jQuery("#trcierre_contableCabeceraBusquedas").css("display",cierre_contable_control.strPermisoBusqueda);
		jQuery("#trBusquedacierre_contable").css("display",cierre_contable_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecierre_contable").css("display",cierre_contable_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscierre_contable").attr("style",cierre_contable_control.strPermisoMostrarTodos);
		
		if(cierre_contable_control.strPermisoNuevo!=null) {
			jQuery("#tdcierre_contableNuevo").css("display",cierre_contable_control.strPermisoNuevo);
			jQuery("#tdcierre_contableNuevoToolBar").css("display",cierre_contable_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcierre_contableDuplicar").css("display",cierre_contable_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcierre_contableDuplicarToolBar").css("display",cierre_contable_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcierre_contableNuevoGuardarCambios").css("display",cierre_contable_control.strPermisoNuevo);
			jQuery("#tdcierre_contableNuevoGuardarCambiosToolBar").css("display",cierre_contable_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cierre_contable_control.strPermisoActualizar!=null) {
			jQuery("#tdcierre_contableActualizarToolBar").css("display",cierre_contable_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcierre_contableCopiar").css("display",cierre_contable_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcierre_contableCopiarToolBar").css("display",cierre_contable_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcierre_contableConEditar").css("display",cierre_contable_control.strPermisoActualizar);
		}
		
		jQuery("#tdcierre_contableEliminarToolBar").css("display",cierre_contable_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcierre_contableGuardarCambios").css("display",cierre_contable_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcierre_contableGuardarCambiosToolBar").css("display",cierre_contable_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcierre_contableElementos").css("display",cierre_contable_control.strVisibleTablaElementos);
		
		jQuery("#trcierre_contableAcciones").css("display",cierre_contable_control.strVisibleTablaAcciones);
		jQuery("#trcierre_contableParametrosAcciones").css("display",cierre_contable_control.strVisibleTablaAcciones);
			
		jQuery("#tdcierre_contableCerrarPagina").css("display",cierre_contable_control.strPermisoPopup);		
		jQuery("#tdcierre_contableCerrarPaginaToolBar").css("display",cierre_contable_control.strPermisoPopup);
		//jQuery("#trcierre_contableAccionesRelaciones").css("display",cierre_contable_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cierre_contable_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cierre_contable_webcontrol1.registrarEventosControles();
		
		if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
			cierre_contable_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cierre_contable_constante1.STR_ES_RELACIONES=="true") {
			if(cierre_contable_constante1.BIT_ES_PAGINA_FORM==true) {
				cierre_contable_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cierre_contable_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(cierre_contable_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cierre_contable_webcontrol1.onLoad();
				
			} else {
				if(cierre_contable_constante1.BIT_ES_PAGINA_FORM==true) {
					if(cierre_contable_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
						//cierre_contable_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(cierre_contable_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cierre_contable_constante1.BIG_ID_ACTUAL,"cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
						//cierre_contable_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			cierre_contable_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var cierre_contable_webcontrol1=new cierre_contable_webcontrol();

if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cierre_contable_webcontrol1.onLoadWindow; 
}

//</script>