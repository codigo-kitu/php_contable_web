//<script type="text/javascript" language="javascript">



//var debito_cuenta_cobrarJQueryPaginaWebInteraccion= function (debito_cuenta_cobrar_control) {
//this.,this.,this.

class debito_cuenta_cobrar_webcontrol extends debito_cuenta_cobrar_webcontrol_add {
	
	debito_cuenta_cobrar_control=null;
	debito_cuenta_cobrar_controlInicial=null;
	debito_cuenta_cobrar_controlAuxiliar=null;
		
	//if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(debito_cuenta_cobrar_control) {
		super();
		
		this.debito_cuenta_cobrar_control=debito_cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(debito_cuenta_cobrar_control) {
		
		if(debito_cuenta_cobrar_control.action=="index" || debito_cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(debito_cuenta_cobrar_control);
			
		} else if(debito_cuenta_cobrar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(debito_cuenta_cobrar_control);
			
		} else if(debito_cuenta_cobrar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(debito_cuenta_cobrar_control);
			
		} else if(debito_cuenta_cobrar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(debito_cuenta_cobrar_control);		
		
		} else if(debito_cuenta_cobrar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(debito_cuenta_cobrar_control);		
		
		} else if(debito_cuenta_cobrar_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(debito_cuenta_cobrar_control);		
		
		} else if(debito_cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(debito_cuenta_cobrar_control);		
		}
		else if(debito_cuenta_cobrar_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(debito_cuenta_cobrar_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(debito_cuenta_cobrar_control.action + " Revisar Manejo");
			
			if(debito_cuenta_cobrar_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(debito_cuenta_cobrar_control);
				
				return;
			}
			
			//if(debito_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(debito_cuenta_cobrar_control);
			//}
			
			if(debito_cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(debito_cuenta_cobrar_control);
			}
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && debito_cuenta_cobrar_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(debito_cuenta_cobrar_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(debito_cuenta_cobrar_control, false);			
			}
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(debito_cuenta_cobrar_control);	
			}
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
			}
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(debito_cuenta_cobrar_control);
			}
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(debito_cuenta_cobrar_control);
			}
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(debito_cuenta_cobrar_control);	
			}
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
			}
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);
			}
			
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(debito_cuenta_cobrar_control);			
			}
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(debito_cuenta_cobrar_control);
			}
			
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_cobrar_control);
			}
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(debito_cuenta_cobrar_control);
			}				
			
			if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(debito_cuenta_cobrar_control);
			}
			
			if(debito_cuenta_cobrar_control.usuarioActual!=null && debito_cuenta_cobrar_control.usuarioActual.field_strUserName!=null &&
			debito_cuenta_cobrar_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(debito_cuenta_cobrar_control);			
			}
		}
		
		
		if(debito_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(debito_cuenta_cobrar_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(debito_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(debito_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(debito_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(debito_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(debito_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(debito_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(debito_cuenta_cobrar_control) {
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(debito_cuenta_cobrar_control) {
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(debito_cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(debito_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(debito_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);				
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(debito_cuenta_cobrar_control) {
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(debito_cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(debito_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(debito_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(debito_cuenta_cobrar_control) {
		this.actualizarPaginaImprimir(debito_cuenta_cobrar_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(debito_cuenta_cobrar_control) {
		this.actualizarPaginaImprimir(debito_cuenta_cobrar_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(debito_cuenta_cobrar_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(debito_cuenta_cobrar_control) {
		//FORMULARIO
		if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);
			this.actualizarPaginaFormularioAdd(debito_cuenta_cobrar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		//COMBOS FK
		if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(debito_cuenta_cobrar_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(debito_cuenta_cobrar_control) {
		//FORMULARIO
		if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);	
		//COMBOS FK
		if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(debito_cuenta_cobrar_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(debito_cuenta_cobrar_control) {
		//FORMULARIO
		if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(debito_cuenta_cobrar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);	
		//COMBOS FK
		if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(debito_cuenta_cobrar_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control) {
		if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && debito_cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(debito_cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(debito_cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(debito_cuenta_cobrar_control) {
		if(debito_cuenta_cobrar_funcion1.esPaginaForm()==true) {
			window.opener.debito_cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(debito_cuenta_cobrar_control) {
		debito_cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(debito_cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		debito_cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(debito_cuenta_cobrar_control.strAuxiliarTipo,debito_cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(debito_cuenta_cobrar_control) {
		debito_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,debito_cuenta_cobrar_control.strAuxiliarMensajeAlert,debito_cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(debito_cuenta_cobrar_funcion1.esPaginaForm()==true) {
			window.opener.debito_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,debito_cuenta_cobrar_control.strAuxiliarMensajeAlert,debito_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(debito_cuenta_cobrar_control) {
		eval(debito_cuenta_cobrar_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(debito_cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			debito_cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				debito_cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			debito_cuenta_cobrar_funcion1.mostrarDivMensaje(true,debito_cuenta_cobrar_control.strAuxiliarMensaje,debito_cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			debito_cuenta_cobrar_funcion1.mostrarDivMensaje(false,debito_cuenta_cobrar_control.strAuxiliarMensaje,debito_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(debito_cuenta_cobrar_control) {
	
		funcionGeneral.printWebPartPage("debito_cuenta_cobrar",debito_cuenta_cobrar_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliardebito_cuenta_cobrarsAjaxWebPart").html(debito_cuenta_cobrar_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("debito_cuenta_cobrar",jQuery("#divTablaDatosReporteAuxiliardebito_cuenta_cobrarsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(debito_cuenta_cobrar_control) {
		this.debito_cuenta_cobrar_controlInicial=debito_cuenta_cobrar_control;
			
		if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(debito_cuenta_cobrar_control.strStyleDivArbol,debito_cuenta_cobrar_control.strStyleDivContent
																,debito_cuenta_cobrar_control.strStyleDivOpcionesBanner,debito_cuenta_cobrar_control.strStyleDivExpandirColapsar
																,debito_cuenta_cobrar_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=debito_cuenta_cobrar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",debito_cuenta_cobrar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(debito_cuenta_cobrar_control) {
		jQuery("#divTablaDatosdebito_cuenta_cobrarsAjaxWebPart").html(debito_cuenta_cobrar_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdebito_cuenta_cobrars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdebito_cuenta_cobrars=jQuery("#tblTablaDatosdebito_cuenta_cobrars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("debito_cuenta_cobrar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',debito_cuenta_cobrar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			debito_cuenta_cobrar_webcontrol1.registrarControlesTableEdition(debito_cuenta_cobrar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		debito_cuenta_cobrar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(debito_cuenta_cobrar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(debito_cuenta_cobrar_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(debito_cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(debito_cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(debito_cuenta_cobrar_control.tiposReportes,debito_cuenta_cobrar_control.tiposReporte
															 	,debito_cuenta_cobrar_control.tiposPaginacion,debito_cuenta_cobrar_control.tiposAcciones
																,debito_cuenta_cobrar_control.tiposColumnasSelect,debito_cuenta_cobrar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(debito_cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(debito_cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(debito_cuenta_cobrar_control);			
	}
	
	actualizarPaginaAreaBusquedas(debito_cuenta_cobrar_control) {
		jQuery("#divBusquedadebito_cuenta_cobrarAjaxWebPart").css("display",debito_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trdebito_cuenta_cobrarCabeceraBusquedas").css("display",debito_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedadebito_cuenta_cobrar").css("display",debito_cuenta_cobrar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(debito_cuenta_cobrar_control.htmlTablaOrderBy!=null
			&& debito_cuenta_cobrar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydebito_cuenta_cobrarAjaxWebPart").html(debito_cuenta_cobrar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//debito_cuenta_cobrar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(debito_cuenta_cobrar_control.htmlTablaOrderByRel!=null
			&& debito_cuenta_cobrar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldebito_cuenta_cobrarAjaxWebPart").html(debito_cuenta_cobrar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadebito_cuenta_cobrarAjaxWebPart").css("display","none");
			jQuery("#trdebito_cuenta_cobrarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadebito_cuenta_cobrar").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control) {
		jQuery("#tddebito_cuenta_cobrarNuevo").css("display",debito_cuenta_cobrar_control.strPermisoNuevo);
		jQuery("#trdebito_cuenta_cobrarElementos").css("display",debito_cuenta_cobrar_control.strVisibleTablaElementos);
		jQuery("#trdebito_cuenta_cobrarAcciones").css("display",debito_cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trdebito_cuenta_cobrarParametrosAcciones").css("display",debito_cuenta_cobrar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(debito_cuenta_cobrar_control) {
	
		this.actualizarCssBotonesMantenimiento(debito_cuenta_cobrar_control);
				
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFormulario(debito_cuenta_cobrar_control);			
		}
						
		this.actualizarSpanMensajesCampos(debito_cuenta_cobrar_control);
	}
	
	actualizarPaginaUsuarioInvitado(debito_cuenta_cobrar_control) {
	
		var indexPosition=debito_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=debito_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(debito_cuenta_cobrar_control) {
		jQuery("#divResumendebito_cuenta_cobrarActualAjaxWebPart").html(debito_cuenta_cobrar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(debito_cuenta_cobrar_control) {
		jQuery("#divAccionesRelacionesdebito_cuenta_cobrarAjaxWebPart").html(debito_cuenta_cobrar_control.htmlTablaAccionesRelaciones);
			
		debito_cuenta_cobrar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_cobrar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(debito_cuenta_cobrar_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(debito_cuenta_cobrar_control) {
		
		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idcuenta_cobrar);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idcuenta_cobrar);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idejercicio);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idempresa);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idestado);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idperiodo);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idsucursal);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondebito_cuenta_cobrar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("debito_cuenta_cobrar",id,"cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","empresa","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","sucursal","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","ejercicio","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","periodo","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","usuario","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParacuenta_cobrar(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","estado","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(debito_cuenta_cobrar_control) {
	
		jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id);
		jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-version_row").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.versionRow);
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_empresa!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_empresa>-1){
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_empresa) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_sucursal!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_sucursal>-1){
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_sucursal) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_ejercicio!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_ejercicio>-1){
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_ejercicio) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_periodo!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_periodo>-1){
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_periodo) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_usuario!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_usuario>-1){
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_usuario) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_cuenta_cobrar!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_cuenta_cobrar>-1){
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_cuenta_cobrar) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_cuenta_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").select2("val", null);
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-numero").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.numero);
		jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-fecha_emision").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.fecha_emision);
		jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-fecha_vence").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.fecha_vence);
		jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-referencia").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.referencia);
		jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-monto").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.monto);
		jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-saldo").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.saldo);
		jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-descripcion").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.descripcion);
		jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-es_balance_inicial").prop('checked',debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.es_balance_inicial);
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_estado!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_estado>-1){
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_estado) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-debito").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.debito);
		jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-credito").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.credito);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+debito_cuenta_cobrar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("debito_cuenta_cobrar","cuentascobrar","","form_debito_cuenta_cobrar",formulario,"","",paraEventoTabla,idFilaTabla,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}
	
	cargarCombosFK(debito_cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarComboscuenta_cobrarsFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombosestadosFK(debito_cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarComboscuenta_cobrarsFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombosestadosFK(debito_cuenta_cobrar_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(debito_cuenta_cobrar_control) {
		jQuery("#spanstrMensajeid").text(debito_cuenta_cobrar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(debito_cuenta_cobrar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(debito_cuenta_cobrar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(debito_cuenta_cobrar_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(debito_cuenta_cobrar_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(debito_cuenta_cobrar_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(debito_cuenta_cobrar_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_cuenta_cobrar").text(debito_cuenta_cobrar_control.strMensajeid_cuenta_cobrar);		
		jQuery("#spanstrMensajenumero").text(debito_cuenta_cobrar_control.strMensajenumero);		
		jQuery("#spanstrMensajefecha_emision").text(debito_cuenta_cobrar_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajefecha_vence").text(debito_cuenta_cobrar_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajereferencia").text(debito_cuenta_cobrar_control.strMensajereferencia);		
		jQuery("#spanstrMensajemonto").text(debito_cuenta_cobrar_control.strMensajemonto);		
		jQuery("#spanstrMensajesaldo").text(debito_cuenta_cobrar_control.strMensajesaldo);		
		jQuery("#spanstrMensajedescripcion").text(debito_cuenta_cobrar_control.strMensajedescripcion);		
		jQuery("#spanstrMensajees_balance_inicial").text(debito_cuenta_cobrar_control.strMensajees_balance_inicial);		
		jQuery("#spanstrMensajeid_estado").text(debito_cuenta_cobrar_control.strMensajeid_estado);		
		jQuery("#spanstrMensajedebito").text(debito_cuenta_cobrar_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(debito_cuenta_cobrar_control.strMensajecredito);		
	}
	
	actualizarCssBotonesMantenimiento(debito_cuenta_cobrar_control) {
		jQuery("#tdbtnNuevodebito_cuenta_cobrar").css("visibility",debito_cuenta_cobrar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodebito_cuenta_cobrar").css("display",debito_cuenta_cobrar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardebito_cuenta_cobrar").css("visibility",debito_cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardebito_cuenta_cobrar").css("display",debito_cuenta_cobrar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardebito_cuenta_cobrar").css("visibility",debito_cuenta_cobrar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardebito_cuenta_cobrar").css("display",debito_cuenta_cobrar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardebito_cuenta_cobrar").css("visibility",debito_cuenta_cobrar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdebito_cuenta_cobrar").css("visibility",debito_cuenta_cobrar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdebito_cuenta_cobrar").css("display",debito_cuenta_cobrar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardebito_cuenta_cobrar").css("visibility",debito_cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardebito_cuenta_cobrar").css("visibility",debito_cuenta_cobrar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardebito_cuenta_cobrar").css("visibility",debito_cuenta_cobrar_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_cobrarFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.cuenta_cobrarsFK);
	}

	cargarComboEditarTablaestadoFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(debito_cuenta_cobrar_control) {
		var i=0;
		
		i=debito_cuenta_cobrar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id);
		jQuery("#t-version_row_"+i+"").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.versionRow);
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_empresa!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_sucursal!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_ejercicio!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_periodo!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_usuario!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_cuenta_cobrar!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_cuenta_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_cuenta_cobrar) {
				jQuery("#t-cel_"+i+"_7").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_cuenta_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.numero);
		jQuery("#t-cel_"+i+"_9").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_10").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.fecha_vence);
		jQuery("#t-cel_"+i+"_11").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.referencia);
		jQuery("#t-cel_"+i+"_12").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.monto);
		jQuery("#t-cel_"+i+"_13").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.saldo);
		jQuery("#t-cel_"+i+"_14").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.descripcion);
		jQuery("#t-cel_"+i+"_15").prop('checked',debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.es_balance_inicial);
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_estado!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_16").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_estado) {
				jQuery("#t-cel_"+i+"_16").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_16").select2("val", null);
			if(jQuery("#t-cel_"+i+"_16").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_16").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_17").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.debito);
		jQuery("#t-cel_"+i+"_18").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.credito);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(debito_cuenta_cobrar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(debito_cuenta_cobrar_control) {
		debito_cuenta_cobrar_funcion1.registrarControlesTableValidacionEdition(debito_cuenta_cobrar_control,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrarConstante,strParametros);
		
		//debito_cuenta_cobrar_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa",debito_cuenta_cobrar_control.empresasFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_2",debito_cuenta_cobrar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal",debito_cuenta_cobrar_control.sucursalsFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_3",debito_cuenta_cobrar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio",debito_cuenta_cobrar_control.ejerciciosFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_4",debito_cuenta_cobrar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo",debito_cuenta_cobrar_control.periodosFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_5",debito_cuenta_cobrar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario",debito_cuenta_cobrar_control.usuariosFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_6",debito_cuenta_cobrar_control.usuariosFK);
		}
	};

	cargarComboscuenta_cobrarsFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar",debito_cuenta_cobrar_control.cuenta_cobrarsFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_7",debito_cuenta_cobrar_control.cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar",debito_cuenta_cobrar_control.cuenta_cobrarsFK);

	};

	cargarCombosestadosFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado",debito_cuenta_cobrar_control.estadosFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_16",debito_cuenta_cobrar_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",debito_cuenta_cobrar_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeComboscuenta_cobrarsFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosestadosFK(debito_cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idempresaDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != debito_cuenta_cobrar_control.idempresaDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(debito_cuenta_cobrar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idsucursalDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != debito_cuenta_cobrar_control.idsucursalDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(debito_cuenta_cobrar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idejercicioDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != debito_cuenta_cobrar_control.idejercicioDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(debito_cuenta_cobrar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idperiodoDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != debito_cuenta_cobrar_control.idperiodoDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(debito_cuenta_cobrar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idusuarioDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != debito_cuenta_cobrar_control.idusuarioDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(debito_cuenta_cobrar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_cobrarsFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idcuenta_cobrarDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != debito_cuenta_cobrar_control.idcuenta_cobrarDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(debito_cuenta_cobrar_control.idcuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val(debito_cuenta_cobrar_control.idcuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idestadoDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val() != debito_cuenta_cobrar_control.idestadoDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val(debito_cuenta_cobrar_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(debito_cuenta_cobrar_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//debito_cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(debito_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombosempresasFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombossucursalsFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombosejerciciosFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombosperiodosFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombosusuariosFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorComboscuenta_cobrarsFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombosestadosFK(debito_cuenta_cobrar_control);
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
	onLoadCombosEventosFK(debito_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosempresasFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombossucursalsFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosperiodosFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosusuariosFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeComboscuenta_cobrarsFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosestadosFK(debito_cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(debito_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("debito_cuenta_cobrar");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("debito_cuenta_cobrar");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(debito_cuenta_cobrar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);			
			
			if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,"debito_cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_cobrar","id_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParacuenta_cobrar("id_cuenta_cobrar");
				//alert(jQuery('#form-id_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idcuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idejercicio","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idempresa","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idestado","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idperiodo","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idsucursal","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idusuario","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			debito_cuenta_cobrar_funcion1.validarFormularioJQuery(debito_cuenta_cobrar_constante1);
			
			if(debito_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(debito_cuenta_cobrar_control) {
		
		jQuery("#divBusquedadebito_cuenta_cobrarAjaxWebPart").css("display",debito_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trdebito_cuenta_cobrarCabeceraBusquedas").css("display",debito_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedadebito_cuenta_cobrar").css("display",debito_cuenta_cobrar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedebito_cuenta_cobrar").css("display",debito_cuenta_cobrar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdebito_cuenta_cobrar").attr("style",debito_cuenta_cobrar_control.strPermisoMostrarTodos);
		
		if(debito_cuenta_cobrar_control.strPermisoNuevo!=null) {
			jQuery("#tddebito_cuenta_cobrarNuevo").css("display",debito_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tddebito_cuenta_cobrarNuevoToolBar").css("display",debito_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddebito_cuenta_cobrarDuplicar").css("display",debito_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddebito_cuenta_cobrarDuplicarToolBar").css("display",debito_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddebito_cuenta_cobrarNuevoGuardarCambios").css("display",debito_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tddebito_cuenta_cobrarNuevoGuardarCambiosToolBar").css("display",debito_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(debito_cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tddebito_cuenta_cobrarActualizarToolBar").css("display",debito_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddebito_cuenta_cobrarCopiar").css("display",debito_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddebito_cuenta_cobrarCopiarToolBar").css("display",debito_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddebito_cuenta_cobrarConEditar").css("display",debito_cuenta_cobrar_control.strPermisoActualizar);
		}
		
		jQuery("#tddebito_cuenta_cobrarEliminarToolBar").css("display",debito_cuenta_cobrar_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tddebito_cuenta_cobrarGuardarCambios").css("display",debito_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddebito_cuenta_cobrarGuardarCambiosToolBar").css("display",debito_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trdebito_cuenta_cobrarElementos").css("display",debito_cuenta_cobrar_control.strVisibleTablaElementos);
		
		jQuery("#trdebito_cuenta_cobrarAcciones").css("display",debito_cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trdebito_cuenta_cobrarParametrosAcciones").css("display",debito_cuenta_cobrar_control.strVisibleTablaAcciones);
			
		jQuery("#tddebito_cuenta_cobrarCerrarPagina").css("display",debito_cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tddebito_cuenta_cobrarCerrarPaginaToolBar").css("display",debito_cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trdebito_cuenta_cobrarAccionesRelaciones").css("display",debito_cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		debito_cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		debito_cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			debito_cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(debito_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				debito_cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(debito_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(debito_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				debito_cuenta_cobrar_webcontrol1.onLoad();
				
			} else {
				if(debito_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
					if(debito_cuenta_cobrar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
						//debito_cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(debito_cuenta_cobrar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(debito_cuenta_cobrar_constante1.BIG_ID_ACTUAL,"debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
						//debito_cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			debito_cuenta_cobrar_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var debito_cuenta_cobrar_webcontrol1=new debito_cuenta_cobrar_webcontrol();

if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = debito_cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>