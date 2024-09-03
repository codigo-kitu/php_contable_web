//<script type="text/javascript" language="javascript">



//var tipo_kardexJQueryPaginaWebInteraccion= function (tipo_kardex_control) {
//this.,this.,this.

class tipo_kardex_webcontrol extends tipo_kardex_webcontrol_add {
	
	tipo_kardex_control=null;
	tipo_kardex_controlInicial=null;
	tipo_kardex_controlAuxiliar=null;
		
	//if(tipo_kardex_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_kardex_control) {
		super();
		
		this.tipo_kardex_control=tipo_kardex_control;
	}
		
	actualizarVariablesPagina(tipo_kardex_control) {
		
		if(tipo_kardex_control.action=="index" || tipo_kardex_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_kardex_control);
			
		} else if(tipo_kardex_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(tipo_kardex_control);
			
		} else if(tipo_kardex_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(tipo_kardex_control);
			
		} else if(tipo_kardex_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_kardex_control);		
		
		} else if(tipo_kardex_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tipo_kardex_control);		
		
		} else if(tipo_kardex_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_kardex_control);		
		
		} else if(tipo_kardex_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_kardex_control);		
		}
		else if(tipo_kardex_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_kardex_control);		
		}
		else if(tipo_kardex_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_kardex_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(tipo_kardex_control.action + " Revisar Manejo");
			
			if(tipo_kardex_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(tipo_kardex_control);
				
				return;
			}
			
			//if(tipo_kardex_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(tipo_kardex_control);
			//}
			
			if(tipo_kardex_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(tipo_kardex_control);
			}
			
			if(tipo_kardex_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_kardex_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(tipo_kardex_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(tipo_kardex_control, false);			
			}
			
			if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(tipo_kardex_control);	
			}
			
			if(tipo_kardex_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(tipo_kardex_control);
			}
			
			if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(tipo_kardex_control);
			}
			
			if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(tipo_kardex_control);
			}
			
			if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(tipo_kardex_control);	
			}
			
			if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
			}
			
			if(tipo_kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(tipo_kardex_control);
			}
			
			
			if(tipo_kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(tipo_kardex_control);			
			}
			
			if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(tipo_kardex_control);
			}
			
			
			if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(tipo_kardex_control);
			}
			
			if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(tipo_kardex_control);
			}				
			
			if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_kardex_control);
			}
			
			if(tipo_kardex_control.usuarioActual!=null && tipo_kardex_control.usuarioActual.field_strUserName!=null &&
			tipo_kardex_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(tipo_kardex_control);			
			}
		}
		
		
		if(tipo_kardex_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_kardex_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(tipo_kardex_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_kardex_control);
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		this.actualizarPaginaCargaGeneralControles(tipo_kardex_control);
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_kardex_control);
		this.actualizarPaginaAreaBusquedas(tipo_kardex_control);
		this.actualizarPaginaCargaCombosFK(tipo_kardex_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_kardex_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_kardex_control);
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		this.actualizarPaginaCargaGeneralControles(tipo_kardex_control);
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_kardex_control);
		this.actualizarPaginaAreaBusquedas(tipo_kardex_control);
		this.actualizarPaginaCargaCombosFK(tipo_kardex_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(tipo_kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_kardex_control) {
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tipo_kardex_control) {
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_kardex_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_kardex_control);
		this.actualizarPaginaCargaCombosFK(tipo_kardex_control);
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_kardex_control) {
		this.actualizarPaginaAbrirLink(tipo_kardex_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);				
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		this.actualizarPaginaFormulario(tipo_kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		this.actualizarPaginaFormulario(tipo_kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tipo_kardex_control) {
		this.actualizarPaginaFormulario(tipo_kardex_control);
		this.onLoadCombosDefectoFK(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		this.actualizarPaginaFormulario(tipo_kardex_control);
		this.onLoadCombosDefectoFK(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_kardex_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_kardex_control);
		this.actualizarPaginaCargaCombosFK(tipo_kardex_control);
		this.actualizarPaginaFormulario(tipo_kardex_control);
		this.onLoadCombosDefectoFK(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_kardex_control) {
		this.actualizarPaginaAbrirLink(tipo_kardex_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_kardex_control) {
		this.actualizarPaginaImprimir(tipo_kardex_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_kardex_control) {
		this.actualizarPaginaImprimir(tipo_kardex_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_kardex_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_kardex_control) {
		//FORMULARIO
		if(tipo_kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_kardex_control);
			this.actualizarPaginaFormularioAdd(tipo_kardex_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		//COMBOS FK
		if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_kardex_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_kardex_control) {
		//FORMULARIO
		if(tipo_kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_kardex_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);	
		//COMBOS FK
		if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_kardex_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		this.actualizarPaginaFormulario(tipo_kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_kardex_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_kardex_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control) {
		if(tipo_kardex_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_kardex_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_kardex_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_kardex_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_kardex_control) {
		if(tipo_kardex_funcion1.esPaginaForm()==true) {
			window.opener.tipo_kardex_webcontrol1.actualizarPaginaTablaDatos(tipo_kardex_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_kardex_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_kardex_control) {
		tipo_kardex_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_kardex_control.strAuxiliarUrlPagina);
				
		tipo_kardex_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_kardex_control.strAuxiliarTipo,tipo_kardex_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_kardex_control) {
		tipo_kardex_funcion1.resaltarRestaurarDivMensaje(true,tipo_kardex_control.strAuxiliarMensajeAlert,tipo_kardex_control.strAuxiliarCssMensaje);
			
		if(tipo_kardex_funcion1.esPaginaForm()==true) {
			window.opener.tipo_kardex_funcion1.resaltarRestaurarDivMensaje(true,tipo_kardex_control.strAuxiliarMensajeAlert,tipo_kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(tipo_kardex_control) {
		eval(tipo_kardex_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(tipo_kardex_control, mostrar) {
		
		if(mostrar==true) {
			tipo_kardex_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_kardex_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			tipo_kardex_funcion1.mostrarDivMensaje(true,tipo_kardex_control.strAuxiliarMensaje,tipo_kardex_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_kardex_funcion1.mostrarDivMensaje(false,tipo_kardex_control.strAuxiliarMensaje,tipo_kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(tipo_kardex_control) {
	
		funcionGeneral.printWebPartPage("tipo_kardex",tipo_kardex_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliartipo_kardexsAjaxWebPart").html(tipo_kardex_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("tipo_kardex",jQuery("#divTablaDatosReporteAuxiliartipo_kardexsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(tipo_kardex_control) {
		this.tipo_kardex_controlInicial=tipo_kardex_control;
			
		if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_kardex_control.strStyleDivArbol,tipo_kardex_control.strStyleDivContent
																,tipo_kardex_control.strStyleDivOpcionesBanner,tipo_kardex_control.strStyleDivExpandirColapsar
																,tipo_kardex_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=tipo_kardex_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tipo_kardex_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(tipo_kardex_control) {
		jQuery("#divTablaDatostipo_kardexsAjaxWebPart").html(tipo_kardex_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostipo_kardexs=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostipo_kardexs=jQuery("#tblTablaDatostipo_kardexs").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tipo_kardex",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tipo_kardex_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tipo_kardex_webcontrol1.registrarControlesTableEdition(tipo_kardex_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tipo_kardex_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(tipo_kardex_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tipo_kardex_control.tipo_kardexActual!=null) {//form
			
			this.actualizarCamposFilaTabla(tipo_kardex_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(tipo_kardex_control) {
		this.actualizarCssBotonesPagina(tipo_kardex_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_kardex_control.tiposReportes,tipo_kardex_control.tiposReporte
															 	,tipo_kardex_control.tiposPaginacion,tipo_kardex_control.tiposAcciones
																,tipo_kardex_control.tiposColumnasSelect,tipo_kardex_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_kardex_control.tiposRelaciones,tipo_kardex_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_kardex_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_kardex_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_kardex_control);			
	}
	
	actualizarPaginaAreaBusquedas(tipo_kardex_control) {
		jQuery("#divBusquedatipo_kardexAjaxWebPart").css("display",tipo_kardex_control.strPermisoBusqueda);
		jQuery("#trtipo_kardexCabeceraBusquedas").css("display",tipo_kardex_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_kardex").css("display",tipo_kardex_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tipo_kardex_control.htmlTablaOrderBy!=null
			&& tipo_kardex_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytipo_kardexAjaxWebPart").html(tipo_kardex_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tipo_kardex_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tipo_kardex_control.htmlTablaOrderByRel!=null
			&& tipo_kardex_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltipo_kardexAjaxWebPart").html(tipo_kardex_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tipo_kardex_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatipo_kardexAjaxWebPart").css("display","none");
			jQuery("#trtipo_kardexCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatipo_kardex").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(tipo_kardex_control) {
		jQuery("#tdtipo_kardexNuevo").css("display",tipo_kardex_control.strPermisoNuevo);
		jQuery("#trtipo_kardexElementos").css("display",tipo_kardex_control.strVisibleTablaElementos);
		jQuery("#trtipo_kardexAcciones").css("display",tipo_kardex_control.strVisibleTablaAcciones);
		jQuery("#trtipo_kardexParametrosAcciones").css("display",tipo_kardex_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tipo_kardex_control) {
	
		this.actualizarCssBotonesMantenimiento(tipo_kardex_control);
				
		if(tipo_kardex_control.tipo_kardexActual!=null) {//form
			
			this.actualizarCamposFormulario(tipo_kardex_control);			
		}
						
		this.actualizarSpanMensajesCampos(tipo_kardex_control);
	}
	
	actualizarPaginaUsuarioInvitado(tipo_kardex_control) {
	
		var indexPosition=tipo_kardex_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_kardex_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(tipo_kardex_control) {
		jQuery("#divResumentipo_kardexActualAjaxWebPart").html(tipo_kardex_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_kardex_control) {
		jQuery("#divAccionesRelacionestipo_kardexAjaxWebPart").html(tipo_kardex_control.htmlTablaAccionesRelaciones);
			
		tipo_kardex_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tipo_kardex_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(tipo_kardex_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tipo_kardex_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontipo_kardex();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tipo_kardex",id,"inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_kardex_control) {
	
		jQuery("#form"+tipo_kardex_constante1.STR_SUFIJO+"-id").val(tipo_kardex_control.tipo_kardexActual.id);
		jQuery("#form"+tipo_kardex_constante1.STR_SUFIJO+"-version_row").val(tipo_kardex_control.tipo_kardexActual.versionRow);
		jQuery("#form"+tipo_kardex_constante1.STR_SUFIJO+"-codigo").val(tipo_kardex_control.tipo_kardexActual.codigo);
		jQuery("#form"+tipo_kardex_constante1.STR_SUFIJO+"-nombre").val(tipo_kardex_control.tipo_kardexActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_kardex_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_kardex","inventario","","form_tipo_kardex",formulario,"","",paraEventoTabla,idFilaTabla,tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
	}
	
	cargarCombosFK(tipo_kardex_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_kardex_control.strRecargarFkTiposNinguno!=null && tipo_kardex_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_kardex_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(tipo_kardex_control) {
		jQuery("#spanstrMensajeid").text(tipo_kardex_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tipo_kardex_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(tipo_kardex_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_kardex_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_kardex_control) {
		jQuery("#tdbtnNuevotipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_kardex").css("display",tipo_kardex_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_kardex").css("display",tipo_kardex_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_kardex").css("display",tipo_kardex_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_kardex").css("display",tipo_kardex_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionparametro_inventario").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_kardex");

			tipo_kardex_webcontrol1.registrarSesionParaparametro_inventarios(idActual);
		});
		jQuery("#imgdivrelacionkardex").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_kardex");

			tipo_kardex_webcontrol1.registrarSesionParakardexes(idActual);
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

	actualizarCamposFilaTabla(tipo_kardex_control) {
		var i=0;
		
		i=tipo_kardex_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tipo_kardex_control.tipo_kardexActual.id);
		jQuery("#t-version_row_"+i+"").val(tipo_kardex_control.tipo_kardexActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(tipo_kardex_control.tipo_kardexActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(tipo_kardex_control.tipo_kardexActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tipo_kardex_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionparametro_inventario").click(function(){
		jQuery("#tblTablaDatostipo_kardexs").on("click",".imgrelacionparametro_inventario", function () {

			var idActual=jQuery(this).attr("idactualtipo_kardex");

			tipo_kardex_webcontrol1.registrarSesionParaparametro_inventarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionkardex").click(function(){
		jQuery("#tblTablaDatostipo_kardexs").on("click",".imgrelacionkardex", function () {

			var idActual=jQuery(this).attr("idactualtipo_kardex");

			tipo_kardex_webcontrol1.registrarSesionParakardexes(idActual);
		});				
	}
		
	

	registrarSesionParaparametro_inventarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_kardex","parametro_inventario","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,"s","");
	}

	registrarSesionParakardexes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_kardex","kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(tipo_kardex_control) {
		tipo_kardex_funcion1.registrarControlesTableValidacionEdition(tipo_kardex_control,tipo_kardex_webcontrol1,tipo_kardex_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardexConstante,strParametros);
		
		//tipo_kardex_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_kardex_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tipo_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_kardex_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_kardex");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_kardex");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tipo_kardex_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);			
			
			if(tipo_kardex_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,"tipo_kardex");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tipo_kardex");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			tipo_kardex_funcion1.validarFormularioJQuery(tipo_kardex_constante1);
			
			if(tipo_kardex_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_kardex_control) {
		
		jQuery("#divBusquedatipo_kardexAjaxWebPart").css("display",tipo_kardex_control.strPermisoBusqueda);
		jQuery("#trtipo_kardexCabeceraBusquedas").css("display",tipo_kardex_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_kardex").css("display",tipo_kardex_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetipo_kardex").css("display",tipo_kardex_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostipo_kardex").attr("style",tipo_kardex_control.strPermisoMostrarTodos);
		
		if(tipo_kardex_control.strPermisoNuevo!=null) {
			jQuery("#tdtipo_kardexNuevo").css("display",tipo_kardex_control.strPermisoNuevo);
			jQuery("#tdtipo_kardexNuevoToolBar").css("display",tipo_kardex_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtipo_kardexDuplicar").css("display",tipo_kardex_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_kardexDuplicarToolBar").css("display",tipo_kardex_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_kardexNuevoGuardarCambios").css("display",tipo_kardex_control.strPermisoNuevo);
			jQuery("#tdtipo_kardexNuevoGuardarCambiosToolBar").css("display",tipo_kardex_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tipo_kardex_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_kardexActualizarToolBar").css("display",tipo_kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_kardexCopiar").css("display",tipo_kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_kardexCopiarToolBar").css("display",tipo_kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_kardexConEditar").css("display",tipo_kardex_control.strPermisoActualizar);
		}
		
		jQuery("#tdtipo_kardexEliminarToolBar").css("display",tipo_kardex_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdtipo_kardexGuardarCambios").css("display",tipo_kardex_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtipo_kardexGuardarCambiosToolBar").css("display",tipo_kardex_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trtipo_kardexElementos").css("display",tipo_kardex_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_kardexAcciones").css("display",tipo_kardex_control.strVisibleTablaAcciones);
		jQuery("#trtipo_kardexParametrosAcciones").css("display",tipo_kardex_control.strVisibleTablaAcciones);
			
		jQuery("#tdtipo_kardexCerrarPagina").css("display",tipo_kardex_control.strPermisoPopup);		
		jQuery("#tdtipo_kardexCerrarPaginaToolBar").css("display",tipo_kardex_control.strPermisoPopup);
		//jQuery("#trtipo_kardexAccionesRelaciones").css("display",tipo_kardex_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_kardex_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_kardex_webcontrol1.registrarEventosControles();
		
		if(tipo_kardex_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
			tipo_kardex_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_kardex_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_kardex_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_kardex_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(tipo_kardex_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				tipo_kardex_webcontrol1.onLoad();
				
			} else {
				if(tipo_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
					if(tipo_kardex_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
						//tipo_kardex_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(tipo_kardex_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_kardex_constante1.BIG_ID_ACTUAL,"tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
						//tipo_kardex_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			tipo_kardex_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var tipo_kardex_webcontrol1=new tipo_kardex_webcontrol();

if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_kardex_webcontrol1.onLoadWindow; 
}

//</script>