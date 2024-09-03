//<script type="text/javascript" language="javascript">



//var parametro_cuentas_cobrarJQueryPaginaWebInteraccion= function (parametro_cuentas_cobrar_control) {
//this.,this.,this.

class parametro_cuentas_cobrar_webcontrol extends parametro_cuentas_cobrar_webcontrol_add {
	
	parametro_cuentas_cobrar_control=null;
	parametro_cuentas_cobrar_controlInicial=null;
	parametro_cuentas_cobrar_controlAuxiliar=null;
		
	//if(parametro_cuentas_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_cuentas_cobrar_control) {
		super();
		
		this.parametro_cuentas_cobrar_control=parametro_cuentas_cobrar_control;
	}
		
	actualizarVariablesPagina(parametro_cuentas_cobrar_control) {
		
		if(parametro_cuentas_cobrar_control.action=="index" || parametro_cuentas_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_cuentas_cobrar_control);
			
		} else if(parametro_cuentas_cobrar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_cuentas_cobrar_control);
			
		} else if(parametro_cuentas_cobrar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_cuentas_cobrar_control);
			
		} else if(parametro_cuentas_cobrar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_cuentas_cobrar_control);
		
		} else if(parametro_cuentas_cobrar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_cuentas_cobrar_control);		
		
		} else if(parametro_cuentas_cobrar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_cuentas_cobrar_control);		
		
		} else if(parametro_cuentas_cobrar_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_cuentas_cobrar_control);		
		
		} else if(parametro_cuentas_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_cuentas_cobrar_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(parametro_cuentas_cobrar_control.action + " Revisar Manejo");
			
			if(parametro_cuentas_cobrar_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(parametro_cuentas_cobrar_control);
				
				return;
			}
			
			//if(parametro_cuentas_cobrar_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(parametro_cuentas_cobrar_control);
			//}
			
			if(parametro_cuentas_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(parametro_cuentas_cobrar_control);
			}
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_cuentas_cobrar_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(parametro_cuentas_cobrar_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(parametro_cuentas_cobrar_control, false);			
			}
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(parametro_cuentas_cobrar_control);	
			}
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);
			}
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(parametro_cuentas_cobrar_control);
			}
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(parametro_cuentas_cobrar_control);
			}
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(parametro_cuentas_cobrar_control);	
			}
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
			}
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);
			}
			
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(parametro_cuentas_cobrar_control);			
			}
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(parametro_cuentas_cobrar_control);
			}
			
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(parametro_cuentas_cobrar_control);
			}
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(parametro_cuentas_cobrar_control);
			}				
			
			if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_cuentas_cobrar_control);
			}
			
			if(parametro_cuentas_cobrar_control.usuarioActual!=null && parametro_cuentas_cobrar_control.usuarioActual.field_strUserName!=null &&
			parametro_cuentas_cobrar_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(parametro_cuentas_cobrar_control);			
			}
		}
		
		
		if(parametro_cuentas_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_cuentas_cobrar_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(parametro_cuentas_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_cuentas_cobrar_control);
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(parametro_cuentas_cobrar_control);
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_cuentas_cobrar_control);
		this.actualizarPaginaAreaBusquedas(parametro_cuentas_cobrar_control);
		this.actualizarPaginaCargaCombosFK(parametro_cuentas_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_cuentas_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_cuentas_cobrar_control);
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(parametro_cuentas_cobrar_control);
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_cuentas_cobrar_control);
		this.actualizarPaginaAreaBusquedas(parametro_cuentas_cobrar_control);
		this.actualizarPaginaCargaCombosFK(parametro_cuentas_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_cuentas_cobrar_control);
		this.actualizarPaginaCargaCombosFK(parametro_cuentas_cobrar_control);
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaAbrirLink(parametro_cuentas_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);				
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);
		this.onLoadCombosDefectoFK(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);
		this.onLoadCombosDefectoFK(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_cuentas_cobrar_control);
		this.actualizarPaginaCargaCombosFK(parametro_cuentas_cobrar_control);
		this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);
		this.onLoadCombosDefectoFK(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaAbrirLink(parametro_cuentas_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaImprimir(parametro_cuentas_cobrar_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_cuentas_cobrar_control) {
		this.actualizarPaginaImprimir(parametro_cuentas_cobrar_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_cuentas_cobrar_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_cuentas_cobrar_control) {
		//FORMULARIO
		if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);
			this.actualizarPaginaFormularioAdd(parametro_cuentas_cobrar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);		
		//COMBOS FK
		if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_cuentas_cobrar_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_cuentas_cobrar_control) {
		//FORMULARIO
		if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_cuentas_cobrar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control);	
		//COMBOS FK
		if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_cuentas_cobrar_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_cobrar_control) {
		if(parametro_cuentas_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_cuentas_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_cuentas_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_cuentas_cobrar_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_cuentas_cobrar_control) {
		if(parametro_cuentas_cobrar_funcion1.esPaginaForm()==true) {
			window.opener.parametro_cuentas_cobrar_webcontrol1.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_cuentas_cobrar_control) {
		parametro_cuentas_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_cuentas_cobrar_control.strAuxiliarUrlPagina);
				
		parametro_cuentas_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_cuentas_cobrar_control.strAuxiliarTipo,parametro_cuentas_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_cuentas_cobrar_control) {
		parametro_cuentas_cobrar_funcion1.resaltarRestaurarDivMensaje(true,parametro_cuentas_cobrar_control.strAuxiliarMensajeAlert,parametro_cuentas_cobrar_control.strAuxiliarCssMensaje);
			
		if(parametro_cuentas_cobrar_funcion1.esPaginaForm()==true) {
			window.opener.parametro_cuentas_cobrar_funcion1.resaltarRestaurarDivMensaje(true,parametro_cuentas_cobrar_control.strAuxiliarMensajeAlert,parametro_cuentas_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(parametro_cuentas_cobrar_control) {
		eval(parametro_cuentas_cobrar_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(parametro_cuentas_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			parametro_cuentas_cobrar_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_cuentas_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			parametro_cuentas_cobrar_funcion1.mostrarDivMensaje(true,parametro_cuentas_cobrar_control.strAuxiliarMensaje,parametro_cuentas_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_cuentas_cobrar_funcion1.mostrarDivMensaje(false,parametro_cuentas_cobrar_control.strAuxiliarMensaje,parametro_cuentas_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(parametro_cuentas_cobrar_control) {
	
		funcionGeneral.printWebPartPage("parametro_cuentas_cobrar",parametro_cuentas_cobrar_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarparametro_cuentas_cobrarsAjaxWebPart").html(parametro_cuentas_cobrar_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("parametro_cuentas_cobrar",jQuery("#divTablaDatosReporteAuxiliarparametro_cuentas_cobrarsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(parametro_cuentas_cobrar_control) {
		this.parametro_cuentas_cobrar_controlInicial=parametro_cuentas_cobrar_control;
			
		if(parametro_cuentas_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_cuentas_cobrar_control.strStyleDivArbol,parametro_cuentas_cobrar_control.strStyleDivContent
																,parametro_cuentas_cobrar_control.strStyleDivOpcionesBanner,parametro_cuentas_cobrar_control.strStyleDivExpandirColapsar
																,parametro_cuentas_cobrar_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_cuentas_cobrar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_cuentas_cobrar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(parametro_cuentas_cobrar_control) {
		jQuery("#divTablaDatosparametro_cuentas_cobrarsAjaxWebPart").html(parametro_cuentas_cobrar_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_cuentas_cobrars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_cuentas_cobrar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_cuentas_cobrars=jQuery("#tblTablaDatosparametro_cuentas_cobrars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_cuentas_cobrar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_cuentas_cobrar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_cuentas_cobrar_webcontrol1.registrarControlesTableEdition(parametro_cuentas_cobrar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_cuentas_cobrar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(parametro_cuentas_cobrar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_cuentas_cobrar_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(parametro_cuentas_cobrar_control) {
		this.actualizarCssBotonesPagina(parametro_cuentas_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_cuentas_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_cuentas_cobrar_control.tiposReportes,parametro_cuentas_cobrar_control.tiposReporte
															 	,parametro_cuentas_cobrar_control.tiposPaginacion,parametro_cuentas_cobrar_control.tiposAcciones
																,parametro_cuentas_cobrar_control.tiposColumnasSelect,parametro_cuentas_cobrar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_cuentas_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_cuentas_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_cuentas_cobrar_control);			
	}
	
	actualizarPaginaAreaBusquedas(parametro_cuentas_cobrar_control) {
		jQuery("#divBusquedaparametro_cuentas_cobrarAjaxWebPart").css("display",parametro_cuentas_cobrar_control.strPermisoBusqueda);
		jQuery("#trparametro_cuentas_cobrarCabeceraBusquedas").css("display",parametro_cuentas_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_cuentas_cobrar").css("display",parametro_cuentas_cobrar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_cuentas_cobrar_control.htmlTablaOrderBy!=null
			&& parametro_cuentas_cobrar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_cuentas_cobrarAjaxWebPart").html(parametro_cuentas_cobrar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_cuentas_cobrar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_cuentas_cobrar_control.htmlTablaOrderByRel!=null
			&& parametro_cuentas_cobrar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_cuentas_cobrarAjaxWebPart").html(parametro_cuentas_cobrar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_cuentas_cobrar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_cuentas_cobrarAjaxWebPart").css("display","none");
			jQuery("#trparametro_cuentas_cobrarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_cuentas_cobrar").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(parametro_cuentas_cobrar_control) {
		jQuery("#tdparametro_cuentas_cobrarNuevo").css("display",parametro_cuentas_cobrar_control.strPermisoNuevo);
		jQuery("#trparametro_cuentas_cobrarElementos").css("display",parametro_cuentas_cobrar_control.strVisibleTablaElementos);
		jQuery("#trparametro_cuentas_cobrarAcciones").css("display",parametro_cuentas_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trparametro_cuentas_cobrarParametrosAcciones").css("display",parametro_cuentas_cobrar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_cuentas_cobrar_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_cuentas_cobrar_control);
				
		if(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_cuentas_cobrar_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_cuentas_cobrar_control);
	}
	
	actualizarPaginaUsuarioInvitado(parametro_cuentas_cobrar_control) {
	
		var indexPosition=parametro_cuentas_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_cuentas_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_cuentas_cobrar_control) {
		jQuery("#divResumenparametro_cuentas_cobrarActualAjaxWebPart").html(parametro_cuentas_cobrar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_cuentas_cobrar_control) {
		jQuery("#divAccionesRelacionesparametro_cuentas_cobrarAjaxWebPart").html(parametro_cuentas_cobrar_control.htmlTablaAccionesRelaciones);
			
		parametro_cuentas_cobrar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_cuentas_cobrar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_cuentas_cobrar_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_cuentas_cobrar_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_cuentas_cobrar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_cuentas_cobrar",id,"cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_cuentas_cobrar_control) {
	
		jQuery("#form"+parametro_cuentas_cobrar_constante1.STR_SUFIJO+"-id").val(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual.id);
		jQuery("#form"+parametro_cuentas_cobrar_constante1.STR_SUFIJO+"-version_row").val(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual.versionRow);
		jQuery("#form"+parametro_cuentas_cobrar_constante1.STR_SUFIJO+"-numero_cuenta_cobrar").val(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual.numero_cuenta_cobrar);
		jQuery("#form"+parametro_cuentas_cobrar_constante1.STR_SUFIJO+"-numero_detalle").val(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual.numero_detalle);
		jQuery("#form"+parametro_cuentas_cobrar_constante1.STR_SUFIJO+"-numero_pago").val(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual.numero_pago);
		jQuery("#form"+parametro_cuentas_cobrar_constante1.STR_SUFIJO+"-numero_debito").val(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual.numero_debito);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_cuentas_cobrar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_cuentas_cobrar","cuentascobrar","","form_parametro_cuentas_cobrar",formulario,"","",paraEventoTabla,idFilaTabla,parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
	}
	
	cargarCombosFK(parametro_cuentas_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_cuentas_cobrar_control.strRecargarFkTiposNinguno!=null && parametro_cuentas_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_cuentas_cobrar_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(parametro_cuentas_cobrar_control) {
		jQuery("#spanstrMensajeid").text(parametro_cuentas_cobrar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_cuentas_cobrar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenumero_cuenta_cobrar").text(parametro_cuentas_cobrar_control.strMensajenumero_cuenta_cobrar);		
		jQuery("#spanstrMensajenumero_detalle").text(parametro_cuentas_cobrar_control.strMensajenumero_detalle);		
		jQuery("#spanstrMensajenumero_pago").text(parametro_cuentas_cobrar_control.strMensajenumero_pago);		
		jQuery("#spanstrMensajenumero_debito").text(parametro_cuentas_cobrar_control.strMensajenumero_debito);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_cuentas_cobrar_control) {
		jQuery("#tdbtnNuevoparametro_cuentas_cobrar").css("visibility",parametro_cuentas_cobrar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_cuentas_cobrar").css("display",parametro_cuentas_cobrar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_cuentas_cobrar").css("visibility",parametro_cuentas_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_cuentas_cobrar").css("display",parametro_cuentas_cobrar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_cuentas_cobrar").css("visibility",parametro_cuentas_cobrar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_cuentas_cobrar").css("display",parametro_cuentas_cobrar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_cuentas_cobrar").css("visibility",parametro_cuentas_cobrar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_cuentas_cobrar").css("visibility",parametro_cuentas_cobrar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_cuentas_cobrar").css("display",parametro_cuentas_cobrar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_cuentas_cobrar").css("visibility",parametro_cuentas_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_cuentas_cobrar").css("visibility",parametro_cuentas_cobrar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_cuentas_cobrar").css("visibility",parametro_cuentas_cobrar_control.strVisibleCeldaCancelar);						
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
	
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(parametro_cuentas_cobrar_control) {
		var i=0;
		
		i=parametro_cuentas_cobrar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual.numero_cuenta_cobrar);
		jQuery("#t-cel_"+i+"_3").val(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual.numero_detalle);
		jQuery("#t-cel_"+i+"_4").val(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual.numero_pago);
		jQuery("#t-cel_"+i+"_5").val(parametro_cuentas_cobrar_control.parametro_cuentas_cobrarActual.numero_debito);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_cuentas_cobrar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_cuentas_cobrar_control) {
		parametro_cuentas_cobrar_funcion1.registrarControlesTableValidacionEdition(parametro_cuentas_cobrar_control,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrarConstante,strParametros);
		
		//parametro_cuentas_cobrar_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_cuentas_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_cuentas_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_cuentas_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(parametro_cuentas_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_cuentas_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_cuentas_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_cuentas_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_cuentas_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_cuentas_cobrar");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_cuentas_cobrar");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_cuentas_cobrar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);			
			
			if(parametro_cuentas_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,"parametro_cuentas_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			parametro_cuentas_cobrar_funcion1.validarFormularioJQuery(parametro_cuentas_cobrar_constante1);
			
			if(parametro_cuentas_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_cuentas_cobrar_control) {
		
		jQuery("#divBusquedaparametro_cuentas_cobrarAjaxWebPart").css("display",parametro_cuentas_cobrar_control.strPermisoBusqueda);
		jQuery("#trparametro_cuentas_cobrarCabeceraBusquedas").css("display",parametro_cuentas_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_cuentas_cobrar").css("display",parametro_cuentas_cobrar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_cuentas_cobrar").css("display",parametro_cuentas_cobrar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_cuentas_cobrar").attr("style",parametro_cuentas_cobrar_control.strPermisoMostrarTodos);
		
		if(parametro_cuentas_cobrar_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_cuentas_cobrarNuevo").css("display",parametro_cuentas_cobrar_control.strPermisoNuevo);
			jQuery("#tdparametro_cuentas_cobrarNuevoToolBar").css("display",parametro_cuentas_cobrar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_cuentas_cobrarDuplicar").css("display",parametro_cuentas_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_cuentas_cobrarDuplicarToolBar").css("display",parametro_cuentas_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_cuentas_cobrarNuevoGuardarCambios").css("display",parametro_cuentas_cobrar_control.strPermisoNuevo);
			jQuery("#tdparametro_cuentas_cobrarNuevoGuardarCambiosToolBar").css("display",parametro_cuentas_cobrar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_cuentas_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_cuentas_cobrarActualizarToolBar").css("display",parametro_cuentas_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_cuentas_cobrarCopiar").css("display",parametro_cuentas_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_cuentas_cobrarCopiarToolBar").css("display",parametro_cuentas_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_cuentas_cobrarConEditar").css("display",parametro_cuentas_cobrar_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_cuentas_cobrarEliminarToolBar").css("display",parametro_cuentas_cobrar_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdparametro_cuentas_cobrarGuardarCambios").css("display",parametro_cuentas_cobrar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_cuentas_cobrarGuardarCambiosToolBar").css("display",parametro_cuentas_cobrar_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trparametro_cuentas_cobrarElementos").css("display",parametro_cuentas_cobrar_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_cuentas_cobrarAcciones").css("display",parametro_cuentas_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trparametro_cuentas_cobrarParametrosAcciones").css("display",parametro_cuentas_cobrar_control.strVisibleTablaAcciones);
			
		jQuery("#tdparametro_cuentas_cobrarCerrarPagina").css("display",parametro_cuentas_cobrar_control.strPermisoPopup);		
		jQuery("#tdparametro_cuentas_cobrarCerrarPaginaToolBar").css("display",parametro_cuentas_cobrar_control.strPermisoPopup);
		//jQuery("#trparametro_cuentas_cobrarAccionesRelaciones").css("display",parametro_cuentas_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_cuentas_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_cuentas_cobrar_webcontrol1.registrarEventosControles();
		
		if(parametro_cuentas_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_cuentas_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			parametro_cuentas_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_cuentas_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_cuentas_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_cuentas_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_cuentas_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(parametro_cuentas_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_cuentas_cobrar_webcontrol1.onLoad();
				
			} else {
				if(parametro_cuentas_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
					if(parametro_cuentas_cobrar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
						//parametro_cuentas_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(parametro_cuentas_cobrar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_cuentas_cobrar_constante1.BIG_ID_ACTUAL,"parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);
						//parametro_cuentas_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			parametro_cuentas_cobrar_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_cuentas_cobrar","cuentascobrar","",parametro_cuentas_cobrar_funcion1,parametro_cuentas_cobrar_webcontrol1,parametro_cuentas_cobrar_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var parametro_cuentas_cobrar_webcontrol1=new parametro_cuentas_cobrar_webcontrol();

if(parametro_cuentas_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_cuentas_cobrar_webcontrol1.onLoadWindow; 
}

//</script>