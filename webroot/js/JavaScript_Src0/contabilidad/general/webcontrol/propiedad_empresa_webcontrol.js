//<script type="text/javascript" language="javascript">



//var propiedad_empresaJQueryPaginaWebInteraccion= function (propiedad_empresa_control) {
//this.,this.,this.

class propiedad_empresa_webcontrol extends propiedad_empresa_webcontrol_add {
	
	propiedad_empresa_control=null;
	propiedad_empresa_controlInicial=null;
	propiedad_empresa_controlAuxiliar=null;
		
	//if(propiedad_empresa_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(propiedad_empresa_control) {
		super();
		
		this.propiedad_empresa_control=propiedad_empresa_control;
	}
		
	actualizarVariablesPagina(propiedad_empresa_control) {
		
		if(propiedad_empresa_control.action=="index" || propiedad_empresa_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(propiedad_empresa_control);
			
		} else if(propiedad_empresa_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(propiedad_empresa_control);
			
		} else if(propiedad_empresa_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(propiedad_empresa_control);
			
		} else if(propiedad_empresa_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(propiedad_empresa_control);		
		
		} else if(propiedad_empresa_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(propiedad_empresa_control);		
		
		} else if(propiedad_empresa_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(propiedad_empresa_control);		
		
		} else if(propiedad_empresa_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(propiedad_empresa_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(propiedad_empresa_control.action + " Revisar Manejo");
			
			if(propiedad_empresa_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(propiedad_empresa_control);
				
				return;
			}
			
			//if(propiedad_empresa_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(propiedad_empresa_control);
			//}
			
			if(propiedad_empresa_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(propiedad_empresa_control);
			}
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && propiedad_empresa_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(propiedad_empresa_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(propiedad_empresa_control, false);			
			}
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(propiedad_empresa_control);	
			}
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(propiedad_empresa_control);
			}
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(propiedad_empresa_control);
			}
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);
			}
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(propiedad_empresa_control);	
			}
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
			}
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(propiedad_empresa_control);
			}
			
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(propiedad_empresa_control);			
			}
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(propiedad_empresa_control);
			}
			
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(propiedad_empresa_control);
			}
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(propiedad_empresa_control);
			}				
			
			if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(propiedad_empresa_control);
			}
			
			if(propiedad_empresa_control.usuarioActual!=null && propiedad_empresa_control.usuarioActual.field_strUserName!=null &&
			propiedad_empresa_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(propiedad_empresa_control);			
			}
		}
		
		
		if(propiedad_empresa_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(propiedad_empresa_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(propiedad_empresa_control) {
		
		this.actualizarPaginaCargaGeneral(propiedad_empresa_control);
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		this.actualizarPaginaCargaGeneralControles(propiedad_empresa_control);
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(propiedad_empresa_control);
		this.actualizarPaginaAreaBusquedas(propiedad_empresa_control);
		this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(propiedad_empresa_control) {
		
		this.actualizarPaginaCargaGeneral(propiedad_empresa_control);
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		this.actualizarPaginaCargaGeneralControles(propiedad_empresa_control);
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(propiedad_empresa_control);
		this.actualizarPaginaAreaBusquedas(propiedad_empresa_control);
		this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatosAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatosAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatosAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(propiedad_empresa_control) {
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(propiedad_empresa_control) {
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(propiedad_empresa_control) {
		this.actualizarPaginaCargaGeneralControles(propiedad_empresa_control);
		this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(propiedad_empresa_control) {
		this.actualizarPaginaAbrirLink(propiedad_empresa_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);				
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		this.actualizarPaginaFormulario(propiedad_empresa_control);
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		this.actualizarPaginaFormulario(propiedad_empresa_control);
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(propiedad_empresa_control) {
		this.actualizarPaginaFormulario(propiedad_empresa_control);
		this.onLoadCombosDefectoFK(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		this.actualizarPaginaFormulario(propiedad_empresa_control);
		this.onLoadCombosDefectoFK(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(propiedad_empresa_control) {
		this.actualizarPaginaCargaGeneralControles(propiedad_empresa_control);
		this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);
		this.actualizarPaginaFormulario(propiedad_empresa_control);
		this.onLoadCombosDefectoFK(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(propiedad_empresa_control) {
		this.actualizarPaginaAbrirLink(propiedad_empresa_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(propiedad_empresa_control) {
		this.actualizarPaginaImprimir(propiedad_empresa_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(propiedad_empresa_control) {
		this.actualizarPaginaImprimir(propiedad_empresa_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(propiedad_empresa_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(propiedad_empresa_control) {
		//FORMULARIO
		if(propiedad_empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(propiedad_empresa_control);
			this.actualizarPaginaFormularioAdd(propiedad_empresa_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		//COMBOS FK
		if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(propiedad_empresa_control) {
		//FORMULARIO
		if(propiedad_empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(propiedad_empresa_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);	
		//COMBOS FK
		if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control) {
		if(propiedad_empresa_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && propiedad_empresa_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(propiedad_empresa_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(propiedad_empresa_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(propiedad_empresa_control) {
		if(propiedad_empresa_funcion1.esPaginaForm()==true) {
			window.opener.propiedad_empresa_webcontrol1.actualizarPaginaTablaDatos(propiedad_empresa_control);
		} else {
			this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		}
	}
	
	actualizarPaginaAbrirLink(propiedad_empresa_control) {
		propiedad_empresa_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(propiedad_empresa_control.strAuxiliarUrlPagina);
				
		propiedad_empresa_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(propiedad_empresa_control.strAuxiliarTipo,propiedad_empresa_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(propiedad_empresa_control) {
		propiedad_empresa_funcion1.resaltarRestaurarDivMensaje(true,propiedad_empresa_control.strAuxiliarMensajeAlert,propiedad_empresa_control.strAuxiliarCssMensaje);
			
		if(propiedad_empresa_funcion1.esPaginaForm()==true) {
			window.opener.propiedad_empresa_funcion1.resaltarRestaurarDivMensaje(true,propiedad_empresa_control.strAuxiliarMensajeAlert,propiedad_empresa_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(propiedad_empresa_control) {
		eval(propiedad_empresa_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(propiedad_empresa_control, mostrar) {
		
		if(mostrar==true) {
			propiedad_empresa_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				propiedad_empresa_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			propiedad_empresa_funcion1.mostrarDivMensaje(true,propiedad_empresa_control.strAuxiliarMensaje,propiedad_empresa_control.strAuxiliarCssMensaje);
		
		} else {
			propiedad_empresa_funcion1.mostrarDivMensaje(false,propiedad_empresa_control.strAuxiliarMensaje,propiedad_empresa_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(propiedad_empresa_control) {
	
		funcionGeneral.printWebPartPage("propiedad_empresa",propiedad_empresa_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarpropiedad_empresasAjaxWebPart").html(propiedad_empresa_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("propiedad_empresa",jQuery("#divTablaDatosReporteAuxiliarpropiedad_empresasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(propiedad_empresa_control) {
		this.propiedad_empresa_controlInicial=propiedad_empresa_control;
			
		if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(propiedad_empresa_control.strStyleDivArbol,propiedad_empresa_control.strStyleDivContent
																,propiedad_empresa_control.strStyleDivOpcionesBanner,propiedad_empresa_control.strStyleDivExpandirColapsar
																,propiedad_empresa_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=propiedad_empresa_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",propiedad_empresa_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(propiedad_empresa_control) {
		jQuery("#divTablaDatospropiedad_empresasAjaxWebPart").html(propiedad_empresa_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatospropiedad_empresas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatospropiedad_empresas=jQuery("#tblTablaDatospropiedad_empresas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("propiedad_empresa",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',propiedad_empresa_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			propiedad_empresa_webcontrol1.registrarControlesTableEdition(propiedad_empresa_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		propiedad_empresa_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(propiedad_empresa_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(propiedad_empresa_control.propiedad_empresaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(propiedad_empresa_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(propiedad_empresa_control) {
		this.actualizarCssBotonesPagina(propiedad_empresa_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(propiedad_empresa_control.tiposReportes,propiedad_empresa_control.tiposReporte
															 	,propiedad_empresa_control.tiposPaginacion,propiedad_empresa_control.tiposAcciones
																,propiedad_empresa_control.tiposColumnasSelect,propiedad_empresa_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(propiedad_empresa_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(propiedad_empresa_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(propiedad_empresa_control);			
	}
	
	actualizarPaginaAreaBusquedas(propiedad_empresa_control) {
		jQuery("#divBusquedapropiedad_empresaAjaxWebPart").css("display",propiedad_empresa_control.strPermisoBusqueda);
		jQuery("#trpropiedad_empresaCabeceraBusquedas").css("display",propiedad_empresa_control.strPermisoBusqueda);
		jQuery("#trBusquedapropiedad_empresa").css("display",propiedad_empresa_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(propiedad_empresa_control.htmlTablaOrderBy!=null
			&& propiedad_empresa_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBypropiedad_empresaAjaxWebPart").html(propiedad_empresa_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//propiedad_empresa_webcontrol1.registrarOrderByActions();
			
		}
			
		if(propiedad_empresa_control.htmlTablaOrderByRel!=null
			&& propiedad_empresa_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelpropiedad_empresaAjaxWebPart").html(propiedad_empresa_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedapropiedad_empresaAjaxWebPart").css("display","none");
			jQuery("#trpropiedad_empresaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedapropiedad_empresa").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(propiedad_empresa_control) {
		jQuery("#tdpropiedad_empresaNuevo").css("display",propiedad_empresa_control.strPermisoNuevo);
		jQuery("#trpropiedad_empresaElementos").css("display",propiedad_empresa_control.strVisibleTablaElementos);
		jQuery("#trpropiedad_empresaAcciones").css("display",propiedad_empresa_control.strVisibleTablaAcciones);
		jQuery("#trpropiedad_empresaParametrosAcciones").css("display",propiedad_empresa_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(propiedad_empresa_control) {
	
		this.actualizarCssBotonesMantenimiento(propiedad_empresa_control);
				
		if(propiedad_empresa_control.propiedad_empresaActual!=null) {//form
			
			this.actualizarCamposFormulario(propiedad_empresa_control);			
		}
						
		this.actualizarSpanMensajesCampos(propiedad_empresa_control);
	}
	
	actualizarPaginaUsuarioInvitado(propiedad_empresa_control) {
	
		var indexPosition=propiedad_empresa_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=propiedad_empresa_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(propiedad_empresa_control) {
		jQuery("#divResumenpropiedad_empresaActualAjaxWebPart").html(propiedad_empresa_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(propiedad_empresa_control) {
		jQuery("#divAccionesRelacionespropiedad_empresaAjaxWebPart").html(propiedad_empresa_control.htmlTablaAccionesRelaciones);
			
		propiedad_empresa_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(propiedad_empresa_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(propiedad_empresa_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(propiedad_empresa_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionpropiedad_empresa();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("propiedad_empresa",id,"general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(propiedad_empresa_control) {
	
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-id").val(propiedad_empresa_control.propiedad_empresaActual.id);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-version_row").val(propiedad_empresa_control.propiedad_empresaActual.versionRow);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-nombre_empresa").val(propiedad_empresa_control.propiedad_empresaActual.nombre_empresa);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-calle_1").val(propiedad_empresa_control.propiedad_empresaActual.calle_1);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-calle_2").val(propiedad_empresa_control.propiedad_empresaActual.calle_2);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-calle_3").val(propiedad_empresa_control.propiedad_empresaActual.calle_3);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-barrio").val(propiedad_empresa_control.propiedad_empresaActual.barrio);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-ciudad").val(propiedad_empresa_control.propiedad_empresaActual.ciudad);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-estado").val(propiedad_empresa_control.propiedad_empresaActual.estado);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-codigo_postal").val(propiedad_empresa_control.propiedad_empresaActual.codigo_postal);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-codigo_pais").val(propiedad_empresa_control.propiedad_empresaActual.codigo_pais);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+propiedad_empresa_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("propiedad_empresa","general","","form_propiedad_empresa",formulario,"","",paraEventoTabla,idFilaTabla,propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
	}
	
	cargarCombosFK(propiedad_empresa_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(propiedad_empresa_control.strRecargarFkTiposNinguno!=null && propiedad_empresa_control.strRecargarFkTiposNinguno!='NINGUNO' && propiedad_empresa_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(propiedad_empresa_control) {
		jQuery("#spanstrMensajeid").text(propiedad_empresa_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(propiedad_empresa_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenombre_empresa").text(propiedad_empresa_control.strMensajenombre_empresa);		
		jQuery("#spanstrMensajecalle_1").text(propiedad_empresa_control.strMensajecalle_1);		
		jQuery("#spanstrMensajecalle_2").text(propiedad_empresa_control.strMensajecalle_2);		
		jQuery("#spanstrMensajecalle_3").text(propiedad_empresa_control.strMensajecalle_3);		
		jQuery("#spanstrMensajebarrio").text(propiedad_empresa_control.strMensajebarrio);		
		jQuery("#spanstrMensajeciudad").text(propiedad_empresa_control.strMensajeciudad);		
		jQuery("#spanstrMensajeestado").text(propiedad_empresa_control.strMensajeestado);		
		jQuery("#spanstrMensajecodigo_postal").text(propiedad_empresa_control.strMensajecodigo_postal);		
		jQuery("#spanstrMensajecodigo_pais").text(propiedad_empresa_control.strMensajecodigo_pais);		
	}
	
	actualizarCssBotonesMantenimiento(propiedad_empresa_control) {
		jQuery("#tdbtnNuevopropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevopropiedad_empresa").css("display",propiedad_empresa_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarpropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarpropiedad_empresa").css("display",propiedad_empresa_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarpropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarpropiedad_empresa").css("display",propiedad_empresa_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarpropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiospropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiospropiedad_empresa").css("display",propiedad_empresa_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarpropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarpropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarpropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(propiedad_empresa_control) {
		var i=0;
		
		i=propiedad_empresa_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(propiedad_empresa_control.propiedad_empresaActual.id);
		jQuery("#t-version_row_"+i+"").val(propiedad_empresa_control.propiedad_empresaActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(propiedad_empresa_control.propiedad_empresaActual.nombre_empresa);
		jQuery("#t-cel_"+i+"_3").val(propiedad_empresa_control.propiedad_empresaActual.calle_1);
		jQuery("#t-cel_"+i+"_4").val(propiedad_empresa_control.propiedad_empresaActual.calle_2);
		jQuery("#t-cel_"+i+"_5").val(propiedad_empresa_control.propiedad_empresaActual.calle_3);
		jQuery("#t-cel_"+i+"_6").val(propiedad_empresa_control.propiedad_empresaActual.barrio);
		jQuery("#t-cel_"+i+"_7").val(propiedad_empresa_control.propiedad_empresaActual.ciudad);
		jQuery("#t-cel_"+i+"_8").val(propiedad_empresa_control.propiedad_empresaActual.estado);
		jQuery("#t-cel_"+i+"_9").val(propiedad_empresa_control.propiedad_empresaActual.codigo_postal);
		jQuery("#t-cel_"+i+"_10").val(propiedad_empresa_control.propiedad_empresaActual.codigo_pais);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(propiedad_empresa_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(propiedad_empresa_control) {
		propiedad_empresa_funcion1.registrarControlesTableValidacionEdition(propiedad_empresa_control,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresaConstante,strParametros);
		
		//propiedad_empresa_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//propiedad_empresa_control
		
	
	}
	
	onLoadCombosDefectoFK(propiedad_empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(propiedad_empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(propiedad_empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(propiedad_empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(propiedad_empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(propiedad_empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(propiedad_empresa_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("propiedad_empresa");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("propiedad_empresa");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(propiedad_empresa_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);			
			
			if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,"propiedad_empresa");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			propiedad_empresa_funcion1.validarFormularioJQuery(propiedad_empresa_constante1);
			
			if(propiedad_empresa_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(propiedad_empresa_control) {
		
		jQuery("#divBusquedapropiedad_empresaAjaxWebPart").css("display",propiedad_empresa_control.strPermisoBusqueda);
		jQuery("#trpropiedad_empresaCabeceraBusquedas").css("display",propiedad_empresa_control.strPermisoBusqueda);
		jQuery("#trBusquedapropiedad_empresa").css("display",propiedad_empresa_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportepropiedad_empresa").css("display",propiedad_empresa_control.strPermisoReporte);			
		jQuery("#tdMostrarTodospropiedad_empresa").attr("style",propiedad_empresa_control.strPermisoMostrarTodos);
		
		if(propiedad_empresa_control.strPermisoNuevo!=null) {
			jQuery("#tdpropiedad_empresaNuevo").css("display",propiedad_empresa_control.strPermisoNuevo);
			jQuery("#tdpropiedad_empresaNuevoToolBar").css("display",propiedad_empresa_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdpropiedad_empresaDuplicar").css("display",propiedad_empresa_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpropiedad_empresaDuplicarToolBar").css("display",propiedad_empresa_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpropiedad_empresaNuevoGuardarCambios").css("display",propiedad_empresa_control.strPermisoNuevo);
			jQuery("#tdpropiedad_empresaNuevoGuardarCambiosToolBar").css("display",propiedad_empresa_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(propiedad_empresa_control.strPermisoActualizar!=null) {
			jQuery("#tdpropiedad_empresaActualizarToolBar").css("display",propiedad_empresa_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpropiedad_empresaCopiar").css("display",propiedad_empresa_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpropiedad_empresaCopiarToolBar").css("display",propiedad_empresa_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpropiedad_empresaConEditar").css("display",propiedad_empresa_control.strPermisoActualizar);
		}
		
		jQuery("#tdpropiedad_empresaEliminarToolBar").css("display",propiedad_empresa_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdpropiedad_empresaGuardarCambios").css("display",propiedad_empresa_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdpropiedad_empresaGuardarCambiosToolBar").css("display",propiedad_empresa_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trpropiedad_empresaElementos").css("display",propiedad_empresa_control.strVisibleTablaElementos);
		
		jQuery("#trpropiedad_empresaAcciones").css("display",propiedad_empresa_control.strVisibleTablaAcciones);
		jQuery("#trpropiedad_empresaParametrosAcciones").css("display",propiedad_empresa_control.strVisibleTablaAcciones);
			
		jQuery("#tdpropiedad_empresaCerrarPagina").css("display",propiedad_empresa_control.strPermisoPopup);		
		jQuery("#tdpropiedad_empresaCerrarPaginaToolBar").css("display",propiedad_empresa_control.strPermisoPopup);
		//jQuery("#trpropiedad_empresaAccionesRelaciones").css("display",propiedad_empresa_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		propiedad_empresa_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		propiedad_empresa_webcontrol1.registrarEventosControles();
		
		if(propiedad_empresa_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
			propiedad_empresa_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(propiedad_empresa_constante1.STR_ES_RELACIONES=="true") {
			if(propiedad_empresa_constante1.BIT_ES_PAGINA_FORM==true) {
				propiedad_empresa_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(propiedad_empresa_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(propiedad_empresa_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				propiedad_empresa_webcontrol1.onLoad();
				
			} else {
				if(propiedad_empresa_constante1.BIT_ES_PAGINA_FORM==true) {
					if(propiedad_empresa_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
						//propiedad_empresa_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(propiedad_empresa_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(propiedad_empresa_constante1.BIG_ID_ACTUAL,"propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
						//propiedad_empresa_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			propiedad_empresa_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var propiedad_empresa_webcontrol1=new propiedad_empresa_webcontrol();

if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = propiedad_empresa_webcontrol1.onLoadWindow; 
}

//</script>