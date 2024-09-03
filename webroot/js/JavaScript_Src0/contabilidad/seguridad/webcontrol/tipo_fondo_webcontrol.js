//<script type="text/javascript" language="javascript">



//var tipo_fondoJQueryPaginaWebInteraccion= function (tipo_fondo_control) {
//this.,this.,this.

class tipo_fondo_webcontrol extends tipo_fondo_webcontrol_add {
	
	tipo_fondo_control=null;
	tipo_fondo_controlInicial=null;
	tipo_fondo_controlAuxiliar=null;
		
	//if(tipo_fondo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_fondo_control) {
		super();
		
		this.tipo_fondo_control=tipo_fondo_control;
	}
		
	actualizarVariablesPagina(tipo_fondo_control) {
		
		if(tipo_fondo_control.action=="index" || tipo_fondo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_fondo_control);
			
		} else if(tipo_fondo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(tipo_fondo_control);
			
		} else if(tipo_fondo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(tipo_fondo_control);
			
		} else if(tipo_fondo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_fondo_control);		
		
		} else if(tipo_fondo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tipo_fondo_control);		
		
		} else if(tipo_fondo_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_fondo_control);		
		
		} else if(tipo_fondo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_fondo_control);		
		}
		else if(tipo_fondo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_fondo_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(tipo_fondo_control.action + " Revisar Manejo");
			
			if(tipo_fondo_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(tipo_fondo_control);
				
				return;
			}
			
			//if(tipo_fondo_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(tipo_fondo_control);
			//}
			
			if(tipo_fondo_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(tipo_fondo_control);
			}
			
			if(tipo_fondo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_fondo_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(tipo_fondo_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(tipo_fondo_control, false);			
			}
			
			if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(tipo_fondo_control);	
			}
			
			if(tipo_fondo_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(tipo_fondo_control);
			}
			
			if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(tipo_fondo_control);
			}
			
			if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(tipo_fondo_control);
			}
			
			if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(tipo_fondo_control);	
			}
			
			if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
			}
			
			if(tipo_fondo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(tipo_fondo_control);
			}
			
			
			if(tipo_fondo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(tipo_fondo_control);			
			}
			
			if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(tipo_fondo_control);
			}
			
			
			if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(tipo_fondo_control);
			}
			
			if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(tipo_fondo_control);
			}				
			
			if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_fondo_control);
			}
			
			if(tipo_fondo_control.usuarioActual!=null && tipo_fondo_control.usuarioActual.field_strUserName!=null &&
			tipo_fondo_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(tipo_fondo_control);			
			}
		}
		
		
		if(tipo_fondo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_fondo_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(tipo_fondo_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_fondo_control);
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		this.actualizarPaginaCargaGeneralControles(tipo_fondo_control);
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_fondo_control);
		this.actualizarPaginaAreaBusquedas(tipo_fondo_control);
		this.actualizarPaginaCargaCombosFK(tipo_fondo_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_fondo_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_fondo_control);
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		this.actualizarPaginaCargaGeneralControles(tipo_fondo_control);
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_fondo_control);
		this.actualizarPaginaAreaBusquedas(tipo_fondo_control);
		this.actualizarPaginaCargaCombosFK(tipo_fondo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(tipo_fondo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_fondo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_fondo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_fondo_control) {
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tipo_fondo_control) {
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_fondo_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_fondo_control);
		this.actualizarPaginaCargaCombosFK(tipo_fondo_control);
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_fondo_control) {
		this.actualizarPaginaAbrirLink(tipo_fondo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);				
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		this.actualizarPaginaFormulario(tipo_fondo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		this.actualizarPaginaFormulario(tipo_fondo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tipo_fondo_control) {
		this.actualizarPaginaFormulario(tipo_fondo_control);
		this.onLoadCombosDefectoFK(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		this.actualizarPaginaFormulario(tipo_fondo_control);
		this.onLoadCombosDefectoFK(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_fondo_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_fondo_control);
		this.actualizarPaginaCargaCombosFK(tipo_fondo_control);
		this.actualizarPaginaFormulario(tipo_fondo_control);
		this.onLoadCombosDefectoFK(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_fondo_control) {
		this.actualizarPaginaAbrirLink(tipo_fondo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_fondo_control) {
		this.actualizarPaginaImprimir(tipo_fondo_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_fondo_control) {
		this.actualizarPaginaImprimir(tipo_fondo_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_fondo_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_fondo_control) {
		//FORMULARIO
		if(tipo_fondo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_fondo_control);
			this.actualizarPaginaFormularioAdd(tipo_fondo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		//COMBOS FK
		if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_fondo_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_fondo_control) {
		//FORMULARIO
		if(tipo_fondo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_fondo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);	
		//COMBOS FK
		if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_fondo_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		this.actualizarPaginaFormulario(tipo_fondo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control) {
		if(tipo_fondo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_fondo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_fondo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_fondo_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_fondo_control) {
		if(tipo_fondo_funcion1.esPaginaForm()==true) {
			window.opener.tipo_fondo_webcontrol1.actualizarPaginaTablaDatos(tipo_fondo_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_fondo_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_fondo_control) {
		tipo_fondo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_fondo_control.strAuxiliarUrlPagina);
				
		tipo_fondo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_fondo_control.strAuxiliarTipo,tipo_fondo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_fondo_control) {
		tipo_fondo_funcion1.resaltarRestaurarDivMensaje(true,tipo_fondo_control.strAuxiliarMensajeAlert,tipo_fondo_control.strAuxiliarCssMensaje);
			
		if(tipo_fondo_funcion1.esPaginaForm()==true) {
			window.opener.tipo_fondo_funcion1.resaltarRestaurarDivMensaje(true,tipo_fondo_control.strAuxiliarMensajeAlert,tipo_fondo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(tipo_fondo_control) {
		eval(tipo_fondo_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(tipo_fondo_control, mostrar) {
		
		if(mostrar==true) {
			tipo_fondo_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_fondo_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			tipo_fondo_funcion1.mostrarDivMensaje(true,tipo_fondo_control.strAuxiliarMensaje,tipo_fondo_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_fondo_funcion1.mostrarDivMensaje(false,tipo_fondo_control.strAuxiliarMensaje,tipo_fondo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(tipo_fondo_control) {
	
		funcionGeneral.printWebPartPage("tipo_fondo",tipo_fondo_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliartipo_fondosAjaxWebPart").html(tipo_fondo_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("tipo_fondo",jQuery("#divTablaDatosReporteAuxiliartipo_fondosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(tipo_fondo_control) {
		this.tipo_fondo_controlInicial=tipo_fondo_control;
			
		if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_fondo_control.strStyleDivArbol,tipo_fondo_control.strStyleDivContent
																,tipo_fondo_control.strStyleDivOpcionesBanner,tipo_fondo_control.strStyleDivExpandirColapsar
																,tipo_fondo_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=tipo_fondo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tipo_fondo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(tipo_fondo_control) {
		jQuery("#divTablaDatostipo_fondosAjaxWebPart").html(tipo_fondo_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostipo_fondos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostipo_fondos=jQuery("#tblTablaDatostipo_fondos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tipo_fondo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tipo_fondo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tipo_fondo_webcontrol1.registrarControlesTableEdition(tipo_fondo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tipo_fondo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(tipo_fondo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tipo_fondo_control.tipo_fondoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(tipo_fondo_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(tipo_fondo_control) {
		this.actualizarCssBotonesPagina(tipo_fondo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_fondo_control.tiposReportes,tipo_fondo_control.tiposReporte
															 	,tipo_fondo_control.tiposPaginacion,tipo_fondo_control.tiposAcciones
																,tipo_fondo_control.tiposColumnasSelect,tipo_fondo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_fondo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_fondo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_fondo_control);			
	}
	
	actualizarPaginaAreaBusquedas(tipo_fondo_control) {
		jQuery("#divBusquedatipo_fondoAjaxWebPart").css("display",tipo_fondo_control.strPermisoBusqueda);
		jQuery("#trtipo_fondoCabeceraBusquedas").css("display",tipo_fondo_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_fondo").css("display",tipo_fondo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tipo_fondo_control.htmlTablaOrderBy!=null
			&& tipo_fondo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytipo_fondoAjaxWebPart").html(tipo_fondo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tipo_fondo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tipo_fondo_control.htmlTablaOrderByRel!=null
			&& tipo_fondo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltipo_fondoAjaxWebPart").html(tipo_fondo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tipo_fondo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatipo_fondoAjaxWebPart").css("display","none");
			jQuery("#trtipo_fondoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatipo_fondo").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(tipo_fondo_control) {
		jQuery("#tdtipo_fondoNuevo").css("display",tipo_fondo_control.strPermisoNuevo);
		jQuery("#trtipo_fondoElementos").css("display",tipo_fondo_control.strVisibleTablaElementos);
		jQuery("#trtipo_fondoAcciones").css("display",tipo_fondo_control.strVisibleTablaAcciones);
		jQuery("#trtipo_fondoParametrosAcciones").css("display",tipo_fondo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tipo_fondo_control) {
	
		this.actualizarCssBotonesMantenimiento(tipo_fondo_control);
				
		if(tipo_fondo_control.tipo_fondoActual!=null) {//form
			
			this.actualizarCamposFormulario(tipo_fondo_control);			
		}
						
		this.actualizarSpanMensajesCampos(tipo_fondo_control);
	}
	
	actualizarPaginaUsuarioInvitado(tipo_fondo_control) {
	
		var indexPosition=tipo_fondo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_fondo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(tipo_fondo_control) {
		jQuery("#divResumentipo_fondoActualAjaxWebPart").html(tipo_fondo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_fondo_control) {
		jQuery("#divAccionesRelacionestipo_fondoAjaxWebPart").html(tipo_fondo_control.htmlTablaAccionesRelaciones);
			
		tipo_fondo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tipo_fondo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(tipo_fondo_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tipo_fondo_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontipo_fondo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tipo_fondo",id,"seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_fondo_control) {
	
		jQuery("#form"+tipo_fondo_constante1.STR_SUFIJO+"-id").val(tipo_fondo_control.tipo_fondoActual.id);
		jQuery("#form"+tipo_fondo_constante1.STR_SUFIJO+"-version_row").val(tipo_fondo_control.tipo_fondoActual.versionRow);
		jQuery("#form"+tipo_fondo_constante1.STR_SUFIJO+"-codigo").val(tipo_fondo_control.tipo_fondoActual.codigo);
		jQuery("#form"+tipo_fondo_constante1.STR_SUFIJO+"-nombre").val(tipo_fondo_control.tipo_fondoActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_fondo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_fondo","seguridad","","form_tipo_fondo",formulario,"","",paraEventoTabla,idFilaTabla,tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
	}
	
	cargarCombosFK(tipo_fondo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_fondo_control.strRecargarFkTiposNinguno!=null && tipo_fondo_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_fondo_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(tipo_fondo_control) {
		jQuery("#spanstrMensajeid").text(tipo_fondo_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tipo_fondo_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(tipo_fondo_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_fondo_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_fondo_control) {
		jQuery("#tdbtnNuevotipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_fondo").css("display",tipo_fondo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_fondo").css("display",tipo_fondo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_fondo").css("display",tipo_fondo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_fondo").css("display",tipo_fondo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(tipo_fondo_control) {
		var i=0;
		
		i=tipo_fondo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tipo_fondo_control.tipo_fondoActual.id);
		jQuery("#t-version_row_"+i+"").val(tipo_fondo_control.tipo_fondoActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(tipo_fondo_control.tipo_fondoActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(tipo_fondo_control.tipo_fondoActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tipo_fondo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(tipo_fondo_control) {
		tipo_fondo_funcion1.registrarControlesTableValidacionEdition(tipo_fondo_control,tipo_fondo_webcontrol1,tipo_fondo_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondoConstante,strParametros);
		
		//tipo_fondo_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_fondo_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_fondo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_fondo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tipo_fondo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_fondo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_fondo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_fondo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_fondo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_fondo");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_fondo");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tipo_fondo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);			
			
			if(tipo_fondo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,"tipo_fondo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			tipo_fondo_funcion1.validarFormularioJQuery(tipo_fondo_constante1);
			
			if(tipo_fondo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_fondo_control) {
		
		jQuery("#divBusquedatipo_fondoAjaxWebPart").css("display",tipo_fondo_control.strPermisoBusqueda);
		jQuery("#trtipo_fondoCabeceraBusquedas").css("display",tipo_fondo_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_fondo").css("display",tipo_fondo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetipo_fondo").css("display",tipo_fondo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostipo_fondo").attr("style",tipo_fondo_control.strPermisoMostrarTodos);
		
		if(tipo_fondo_control.strPermisoNuevo!=null) {
			jQuery("#tdtipo_fondoNuevo").css("display",tipo_fondo_control.strPermisoNuevo);
			jQuery("#tdtipo_fondoNuevoToolBar").css("display",tipo_fondo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtipo_fondoDuplicar").css("display",tipo_fondo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_fondoDuplicarToolBar").css("display",tipo_fondo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_fondoNuevoGuardarCambios").css("display",tipo_fondo_control.strPermisoNuevo);
			jQuery("#tdtipo_fondoNuevoGuardarCambiosToolBar").css("display",tipo_fondo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tipo_fondo_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_fondoActualizarToolBar").css("display",tipo_fondo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_fondoCopiar").css("display",tipo_fondo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_fondoCopiarToolBar").css("display",tipo_fondo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_fondoConEditar").css("display",tipo_fondo_control.strPermisoActualizar);
		}
		
		jQuery("#tdtipo_fondoEliminarToolBar").css("display",tipo_fondo_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdtipo_fondoGuardarCambios").css("display",tipo_fondo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtipo_fondoGuardarCambiosToolBar").css("display",tipo_fondo_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trtipo_fondoElementos").css("display",tipo_fondo_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_fondoAcciones").css("display",tipo_fondo_control.strVisibleTablaAcciones);
		jQuery("#trtipo_fondoParametrosAcciones").css("display",tipo_fondo_control.strVisibleTablaAcciones);
			
		jQuery("#tdtipo_fondoCerrarPagina").css("display",tipo_fondo_control.strPermisoPopup);		
		jQuery("#tdtipo_fondoCerrarPaginaToolBar").css("display",tipo_fondo_control.strPermisoPopup);
		//jQuery("#trtipo_fondoAccionesRelaciones").css("display",tipo_fondo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_fondo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_fondo_webcontrol1.registrarEventosControles();
		
		if(tipo_fondo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
			tipo_fondo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_fondo_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_fondo_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_fondo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_fondo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(tipo_fondo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				tipo_fondo_webcontrol1.onLoad();
				
			} else {
				if(tipo_fondo_constante1.BIT_ES_PAGINA_FORM==true) {
					if(tipo_fondo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
						//tipo_fondo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(tipo_fondo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_fondo_constante1.BIG_ID_ACTUAL,"tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
						//tipo_fondo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			tipo_fondo_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var tipo_fondo_webcontrol1=new tipo_fondo_webcontrol();

if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_fondo_webcontrol1.onLoadWindow; 
}

//</script>