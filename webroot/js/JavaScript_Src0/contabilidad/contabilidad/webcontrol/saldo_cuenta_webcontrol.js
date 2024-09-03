//<script type="text/javascript" language="javascript">



//var saldo_cuentaJQueryPaginaWebInteraccion= function (saldo_cuenta_control) {
//this.,this.,this.

class saldo_cuenta_webcontrol extends saldo_cuenta_webcontrol_add {
	
	saldo_cuenta_control=null;
	saldo_cuenta_controlInicial=null;
	saldo_cuenta_controlAuxiliar=null;
		
	//if(saldo_cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(saldo_cuenta_control) {
		super();
		
		this.saldo_cuenta_control=saldo_cuenta_control;
	}
		
	actualizarVariablesPagina(saldo_cuenta_control) {
		
		if(saldo_cuenta_control.action=="index" || saldo_cuenta_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(saldo_cuenta_control);
			
		} else if(saldo_cuenta_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(saldo_cuenta_control);
			
		} else if(saldo_cuenta_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(saldo_cuenta_control);
			
		} else if(saldo_cuenta_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(saldo_cuenta_control);
		
		} else if(saldo_cuenta_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(saldo_cuenta_control);		
		
		} else if(saldo_cuenta_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(saldo_cuenta_control);		
		
		} else if(saldo_cuenta_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(saldo_cuenta_control);		
		
		} else if(saldo_cuenta_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(saldo_cuenta_control);		
		}
		else if(saldo_cuenta_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(saldo_cuenta_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(saldo_cuenta_control.action + " Revisar Manejo");
			
			if(saldo_cuenta_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(saldo_cuenta_control);
				
				return;
			}
			
			//if(saldo_cuenta_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(saldo_cuenta_control);
			//}
			
			if(saldo_cuenta_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(saldo_cuenta_control);
			}
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && saldo_cuenta_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(saldo_cuenta_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(saldo_cuenta_control, false);			
			}
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(saldo_cuenta_control);	
			}
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(saldo_cuenta_control);
			}
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(saldo_cuenta_control);
			}
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(saldo_cuenta_control);
			}
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(saldo_cuenta_control);	
			}
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
			}
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(saldo_cuenta_control);
			}
			
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(saldo_cuenta_control);			
			}
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(saldo_cuenta_control);
			}
			
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(saldo_cuenta_control);
			}
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(saldo_cuenta_control);
			}				
			
			if(saldo_cuenta_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(saldo_cuenta_control);
			}
			
			if(saldo_cuenta_control.usuarioActual!=null && saldo_cuenta_control.usuarioActual.field_strUserName!=null &&
			saldo_cuenta_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(saldo_cuenta_control);			
			}
		}
		
		
		if(saldo_cuenta_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(saldo_cuenta_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(saldo_cuenta_control) {
		
		this.actualizarPaginaCargaGeneral(saldo_cuenta_control);
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);
		this.actualizarPaginaCargaGeneralControles(saldo_cuenta_control);
		this.actualizarPaginaFormulario(saldo_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(saldo_cuenta_control);
		this.actualizarPaginaAreaBusquedas(saldo_cuenta_control);
		this.actualizarPaginaCargaCombosFK(saldo_cuenta_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(saldo_cuenta_control) {
		
		this.actualizarPaginaCargaGeneral(saldo_cuenta_control);
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);
		this.actualizarPaginaCargaGeneralControles(saldo_cuenta_control);
		this.actualizarPaginaFormulario(saldo_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(saldo_cuenta_control);
		this.actualizarPaginaAreaBusquedas(saldo_cuenta_control);
		this.actualizarPaginaCargaCombosFK(saldo_cuenta_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatosAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaFormulario(saldo_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatosAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaFormulario(saldo_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatosAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaFormulario(saldo_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);		
		this.actualizarPaginaFormulario(saldo_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);		
		this.actualizarPaginaFormulario(saldo_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);		
		this.actualizarPaginaFormulario(saldo_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(saldo_cuenta_control) {
		this.actualizarPaginaFormulario(saldo_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(saldo_cuenta_control) {
		this.actualizarPaginaFormulario(saldo_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(saldo_cuenta_control) {
		this.actualizarPaginaCargaGeneralControles(saldo_cuenta_control);
		this.actualizarPaginaCargaCombosFK(saldo_cuenta_control);
		this.actualizarPaginaFormulario(saldo_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(saldo_cuenta_control) {
		this.actualizarPaginaAbrirLink(saldo_cuenta_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);				
		this.actualizarPaginaFormulario(saldo_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);
		this.actualizarPaginaFormulario(saldo_cuenta_control);
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);
		this.actualizarPaginaFormulario(saldo_cuenta_control);
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(saldo_cuenta_control) {
		this.actualizarPaginaFormulario(saldo_cuenta_control);
		this.onLoadCombosDefectoFK(saldo_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);
		this.actualizarPaginaFormulario(saldo_cuenta_control);
		this.onLoadCombosDefectoFK(saldo_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(saldo_cuenta_control) {
		this.actualizarPaginaCargaGeneralControles(saldo_cuenta_control);
		this.actualizarPaginaCargaCombosFK(saldo_cuenta_control);
		this.actualizarPaginaFormulario(saldo_cuenta_control);
		this.onLoadCombosDefectoFK(saldo_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(saldo_cuenta_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(saldo_cuenta_control) {
		this.actualizarPaginaAbrirLink(saldo_cuenta_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(saldo_cuenta_control) {
		this.actualizarPaginaTablaDatos(saldo_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(saldo_cuenta_control) {
		this.actualizarPaginaImprimir(saldo_cuenta_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(saldo_cuenta_control) {
		this.actualizarPaginaImprimir(saldo_cuenta_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(saldo_cuenta_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(saldo_cuenta_control) {
		//FORMULARIO
		if(saldo_cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(saldo_cuenta_control);
			this.actualizarPaginaFormularioAdd(saldo_cuenta_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);		
		//COMBOS FK
		if(saldo_cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(saldo_cuenta_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(saldo_cuenta_control) {
		//FORMULARIO
		if(saldo_cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(saldo_cuenta_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);	
		//COMBOS FK
		if(saldo_cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(saldo_cuenta_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(saldo_cuenta_control) {
		//FORMULARIO
		if(saldo_cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(saldo_cuenta_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(saldo_cuenta_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control);	
		//COMBOS FK
		if(saldo_cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(saldo_cuenta_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(saldo_cuenta_control) {
		if(saldo_cuenta_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && saldo_cuenta_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(saldo_cuenta_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(saldo_cuenta_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(saldo_cuenta_control) {
		if(saldo_cuenta_funcion1.esPaginaForm()==true) {
			window.opener.saldo_cuenta_webcontrol1.actualizarPaginaTablaDatos(saldo_cuenta_control);
		} else {
			this.actualizarPaginaTablaDatos(saldo_cuenta_control);
		}
	}
	
	actualizarPaginaAbrirLink(saldo_cuenta_control) {
		saldo_cuenta_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(saldo_cuenta_control.strAuxiliarUrlPagina);
				
		saldo_cuenta_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(saldo_cuenta_control.strAuxiliarTipo,saldo_cuenta_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(saldo_cuenta_control) {
		saldo_cuenta_funcion1.resaltarRestaurarDivMensaje(true,saldo_cuenta_control.strAuxiliarMensajeAlert,saldo_cuenta_control.strAuxiliarCssMensaje);
			
		if(saldo_cuenta_funcion1.esPaginaForm()==true) {
			window.opener.saldo_cuenta_funcion1.resaltarRestaurarDivMensaje(true,saldo_cuenta_control.strAuxiliarMensajeAlert,saldo_cuenta_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(saldo_cuenta_control) {
		eval(saldo_cuenta_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(saldo_cuenta_control, mostrar) {
		
		if(mostrar==true) {
			saldo_cuenta_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				saldo_cuenta_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			saldo_cuenta_funcion1.mostrarDivMensaje(true,saldo_cuenta_control.strAuxiliarMensaje,saldo_cuenta_control.strAuxiliarCssMensaje);
		
		} else {
			saldo_cuenta_funcion1.mostrarDivMensaje(false,saldo_cuenta_control.strAuxiliarMensaje,saldo_cuenta_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(saldo_cuenta_control) {
	
		funcionGeneral.printWebPartPage("saldo_cuenta",saldo_cuenta_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarsaldo_cuentasAjaxWebPart").html(saldo_cuenta_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("saldo_cuenta",jQuery("#divTablaDatosReporteAuxiliarsaldo_cuentasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(saldo_cuenta_control) {
		this.saldo_cuenta_controlInicial=saldo_cuenta_control;
			
		if(saldo_cuenta_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(saldo_cuenta_control.strStyleDivArbol,saldo_cuenta_control.strStyleDivContent
																,saldo_cuenta_control.strStyleDivOpcionesBanner,saldo_cuenta_control.strStyleDivExpandirColapsar
																,saldo_cuenta_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=saldo_cuenta_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",saldo_cuenta_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(saldo_cuenta_control) {
		jQuery("#divTablaDatossaldo_cuentasAjaxWebPart").html(saldo_cuenta_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatossaldo_cuentas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(saldo_cuenta_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatossaldo_cuentas=jQuery("#tblTablaDatossaldo_cuentas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("saldo_cuenta",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',saldo_cuenta_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			saldo_cuenta_webcontrol1.registrarControlesTableEdition(saldo_cuenta_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		saldo_cuenta_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(saldo_cuenta_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(saldo_cuenta_control.saldo_cuentaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(saldo_cuenta_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(saldo_cuenta_control) {
		this.actualizarCssBotonesPagina(saldo_cuenta_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(saldo_cuenta_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(saldo_cuenta_control.tiposReportes,saldo_cuenta_control.tiposReporte
															 	,saldo_cuenta_control.tiposPaginacion,saldo_cuenta_control.tiposAcciones
																,saldo_cuenta_control.tiposColumnasSelect,saldo_cuenta_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(saldo_cuenta_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(saldo_cuenta_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(saldo_cuenta_control);			
	}
	
	actualizarPaginaAreaBusquedas(saldo_cuenta_control) {
		jQuery("#divBusquedasaldo_cuentaAjaxWebPart").css("display",saldo_cuenta_control.strPermisoBusqueda);
		jQuery("#trsaldo_cuentaCabeceraBusquedas").css("display",saldo_cuenta_control.strPermisoBusqueda);
		jQuery("#trBusquedasaldo_cuenta").css("display",saldo_cuenta_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(saldo_cuenta_control.htmlTablaOrderBy!=null
			&& saldo_cuenta_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBysaldo_cuentaAjaxWebPart").html(saldo_cuenta_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//saldo_cuenta_webcontrol1.registrarOrderByActions();
			
		}
			
		if(saldo_cuenta_control.htmlTablaOrderByRel!=null
			&& saldo_cuenta_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelsaldo_cuentaAjaxWebPart").html(saldo_cuenta_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(saldo_cuenta_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedasaldo_cuentaAjaxWebPart").css("display","none");
			jQuery("#trsaldo_cuentaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedasaldo_cuenta").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(saldo_cuenta_control) {
		jQuery("#tdsaldo_cuentaNuevo").css("display",saldo_cuenta_control.strPermisoNuevo);
		jQuery("#trsaldo_cuentaElementos").css("display",saldo_cuenta_control.strVisibleTablaElementos);
		jQuery("#trsaldo_cuentaAcciones").css("display",saldo_cuenta_control.strVisibleTablaAcciones);
		jQuery("#trsaldo_cuentaParametrosAcciones").css("display",saldo_cuenta_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(saldo_cuenta_control) {
	
		this.actualizarCssBotonesMantenimiento(saldo_cuenta_control);
				
		if(saldo_cuenta_control.saldo_cuentaActual!=null) {//form
			
			this.actualizarCamposFormulario(saldo_cuenta_control);			
		}
						
		this.actualizarSpanMensajesCampos(saldo_cuenta_control);
	}
	
	actualizarPaginaUsuarioInvitado(saldo_cuenta_control) {
	
		var indexPosition=saldo_cuenta_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=saldo_cuenta_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(saldo_cuenta_control) {
		jQuery("#divResumensaldo_cuentaActualAjaxWebPart").html(saldo_cuenta_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(saldo_cuenta_control) {
		jQuery("#divAccionesRelacionessaldo_cuentaAjaxWebPart").html(saldo_cuenta_control.htmlTablaAccionesRelaciones);
			
		saldo_cuenta_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(saldo_cuenta_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(saldo_cuenta_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(saldo_cuenta_control) {
		
		if(saldo_cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",saldo_cuenta_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",saldo_cuenta_control.strVisibleFK_Idcuenta);
		}

		if(saldo_cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",saldo_cuenta_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",saldo_cuenta_control.strVisibleFK_Idejercicio);
		}

		if(saldo_cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",saldo_cuenta_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",saldo_cuenta_control.strVisibleFK_Idempresa);
		}

		if(saldo_cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",saldo_cuenta_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",saldo_cuenta_control.strVisibleFK_Idperiodo);
		}

		if(saldo_cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta").attr("style",saldo_cuenta_control.strVisibleFK_Idtipo_cuenta);
			jQuery("#tblstrVisible"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta").attr("style",saldo_cuenta_control.strVisibleFK_Idtipo_cuenta);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionsaldo_cuenta();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("saldo_cuenta",id,"contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		saldo_cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("saldo_cuenta","empresa","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		saldo_cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("saldo_cuenta","ejercicio","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		saldo_cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("saldo_cuenta","periodo","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
	}

	abrirBusquedaParatipo_cuenta(strNombreCampoBusqueda){//idActual
		saldo_cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("saldo_cuenta","tipo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		saldo_cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("saldo_cuenta","cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(saldo_cuenta_control) {
	
		jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id").val(saldo_cuenta_control.saldo_cuentaActual.id);
		jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-version_row").val(saldo_cuenta_control.saldo_cuentaActual.versionRow);
		
		if(saldo_cuenta_control.saldo_cuentaActual.id_empresa!=null && saldo_cuenta_control.saldo_cuentaActual.id_empresa>-1){
			if(jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != saldo_cuenta_control.saldo_cuentaActual.id_empresa) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_empresa").val(saldo_cuenta_control.saldo_cuentaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(saldo_cuenta_control.saldo_cuentaActual.id_ejercicio!=null && saldo_cuenta_control.saldo_cuentaActual.id_ejercicio>-1){
			if(jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_ejercicio").val() != saldo_cuenta_control.saldo_cuentaActual.id_ejercicio) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_ejercicio").val(saldo_cuenta_control.saldo_cuentaActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(saldo_cuenta_control.saldo_cuentaActual.id_periodo!=null && saldo_cuenta_control.saldo_cuentaActual.id_periodo>-1){
			if(jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_periodo").val() != saldo_cuenta_control.saldo_cuentaActual.id_periodo) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_periodo").val(saldo_cuenta_control.saldo_cuentaActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(saldo_cuenta_control.saldo_cuentaActual.id_tipo_cuenta!=null && saldo_cuenta_control.saldo_cuentaActual.id_tipo_cuenta>-1){
			if(jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != saldo_cuenta_control.saldo_cuentaActual.id_tipo_cuenta) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(saldo_cuenta_control.saldo_cuentaActual.id_tipo_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").select2("val", null);
			if(jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(saldo_cuenta_control.saldo_cuentaActual.id_cuenta!=null && saldo_cuenta_control.saldo_cuentaActual.id_cuenta>-1){
			if(jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_cuenta").val() != saldo_cuenta_control.saldo_cuentaActual.id_cuenta) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_cuenta").val(saldo_cuenta_control.saldo_cuentaActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_cuenta").select2("val", null);
			if(jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-suma_debe").val(saldo_cuenta_control.saldo_cuentaActual.suma_debe);
		jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-suma_haber").val(saldo_cuenta_control.saldo_cuentaActual.suma_haber);
		jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-saldo").val(saldo_cuenta_control.saldo_cuentaActual.saldo);
		jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-fecha_proceso").val(saldo_cuenta_control.saldo_cuentaActual.fecha_proceso);
		jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-deudor").val(saldo_cuenta_control.saldo_cuentaActual.deudor);
		jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-acreedor").val(saldo_cuenta_control.saldo_cuentaActual.acreedor);
		jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-fecha_fin_mes").val(saldo_cuenta_control.saldo_cuentaActual.fecha_fin_mes);
		jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-tipo_cuenta_codigo").val(saldo_cuenta_control.saldo_cuentaActual.tipo_cuenta_codigo);
		jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-cuenta_contable").val(saldo_cuenta_control.saldo_cuentaActual.cuenta_contable);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+saldo_cuenta_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("saldo_cuenta","contabilidad","","form_saldo_cuenta",formulario,"","",paraEventoTabla,idFilaTabla,saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
	}
	
	cargarCombosFK(saldo_cuenta_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",saldo_cuenta_control.strRecargarFkTipos,",")) { 
				saldo_cuenta_webcontrol1.cargarCombosempresasFK(saldo_cuenta_control);
			}

			if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",saldo_cuenta_control.strRecargarFkTipos,",")) { 
				saldo_cuenta_webcontrol1.cargarCombosejerciciosFK(saldo_cuenta_control);
			}

			if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",saldo_cuenta_control.strRecargarFkTipos,",")) { 
				saldo_cuenta_webcontrol1.cargarCombosperiodosFK(saldo_cuenta_control);
			}

			if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",saldo_cuenta_control.strRecargarFkTipos,",")) { 
				saldo_cuenta_webcontrol1.cargarCombostipo_cuentasFK(saldo_cuenta_control);
			}

			if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",saldo_cuenta_control.strRecargarFkTipos,",")) { 
				saldo_cuenta_webcontrol1.cargarComboscuentasFK(saldo_cuenta_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(saldo_cuenta_control.strRecargarFkTiposNinguno!=null && saldo_cuenta_control.strRecargarFkTiposNinguno!='NINGUNO' && saldo_cuenta_control.strRecargarFkTiposNinguno!='') {
			
				if(saldo_cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",saldo_cuenta_control.strRecargarFkTiposNinguno,",")) { 
					saldo_cuenta_webcontrol1.cargarCombosempresasFK(saldo_cuenta_control);
				}

				if(saldo_cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",saldo_cuenta_control.strRecargarFkTiposNinguno,",")) { 
					saldo_cuenta_webcontrol1.cargarCombosejerciciosFK(saldo_cuenta_control);
				}

				if(saldo_cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",saldo_cuenta_control.strRecargarFkTiposNinguno,",")) { 
					saldo_cuenta_webcontrol1.cargarCombosperiodosFK(saldo_cuenta_control);
				}

				if(saldo_cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_cuenta",saldo_cuenta_control.strRecargarFkTiposNinguno,",")) { 
					saldo_cuenta_webcontrol1.cargarCombostipo_cuentasFK(saldo_cuenta_control);
				}

				if(saldo_cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",saldo_cuenta_control.strRecargarFkTiposNinguno,",")) { 
					saldo_cuenta_webcontrol1.cargarComboscuentasFK(saldo_cuenta_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(saldo_cuenta_control) {
		jQuery("#spanstrMensajeid").text(saldo_cuenta_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(saldo_cuenta_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(saldo_cuenta_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_ejercicio").text(saldo_cuenta_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(saldo_cuenta_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_tipo_cuenta").text(saldo_cuenta_control.strMensajeid_tipo_cuenta);		
		jQuery("#spanstrMensajeid_cuenta").text(saldo_cuenta_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajesuma_debe").text(saldo_cuenta_control.strMensajesuma_debe);		
		jQuery("#spanstrMensajesuma_haber").text(saldo_cuenta_control.strMensajesuma_haber);		
		jQuery("#spanstrMensajesaldo").text(saldo_cuenta_control.strMensajesaldo);		
		jQuery("#spanstrMensajefecha_proceso").text(saldo_cuenta_control.strMensajefecha_proceso);		
		jQuery("#spanstrMensajedeudor").text(saldo_cuenta_control.strMensajedeudor);		
		jQuery("#spanstrMensajeacreedor").text(saldo_cuenta_control.strMensajeacreedor);		
		jQuery("#spanstrMensajefecha_fin_mes").text(saldo_cuenta_control.strMensajefecha_fin_mes);		
		jQuery("#spanstrMensajetipo_cuenta_codigo").text(saldo_cuenta_control.strMensajetipo_cuenta_codigo);		
		jQuery("#spanstrMensajecuenta_contable").text(saldo_cuenta_control.strMensajecuenta_contable);		
	}
	
	actualizarCssBotonesMantenimiento(saldo_cuenta_control) {
		jQuery("#tdbtnNuevosaldo_cuenta").css("visibility",saldo_cuenta_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevosaldo_cuenta").css("display",saldo_cuenta_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarsaldo_cuenta").css("visibility",saldo_cuenta_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarsaldo_cuenta").css("display",saldo_cuenta_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarsaldo_cuenta").css("visibility",saldo_cuenta_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarsaldo_cuenta").css("display",saldo_cuenta_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarsaldo_cuenta").css("visibility",saldo_cuenta_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiossaldo_cuenta").css("visibility",saldo_cuenta_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiossaldo_cuenta").css("display",saldo_cuenta_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarsaldo_cuenta").css("visibility",saldo_cuenta_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarsaldo_cuenta").css("visibility",saldo_cuenta_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarsaldo_cuenta").css("visibility",saldo_cuenta_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(saldo_cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,saldo_cuenta_funcion1,saldo_cuenta_control.empresasFK);
	}

	cargarComboEditarTablaejercicioFK(saldo_cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,saldo_cuenta_funcion1,saldo_cuenta_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(saldo_cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,saldo_cuenta_funcion1,saldo_cuenta_control.periodosFK);
	}

	cargarComboEditarTablatipo_cuentaFK(saldo_cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,saldo_cuenta_funcion1,saldo_cuenta_control.tipo_cuentasFK);
	}

	cargarComboEditarTablacuentaFK(saldo_cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,saldo_cuenta_funcion1,saldo_cuenta_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(saldo_cuenta_control) {
		var i=0;
		
		i=saldo_cuenta_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(saldo_cuenta_control.saldo_cuentaActual.id);
		jQuery("#t-version_row_"+i+"").val(saldo_cuenta_control.saldo_cuentaActual.versionRow);
		
		if(saldo_cuenta_control.saldo_cuentaActual.id_empresa!=null && saldo_cuenta_control.saldo_cuentaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != saldo_cuenta_control.saldo_cuentaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(saldo_cuenta_control.saldo_cuentaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(saldo_cuenta_control.saldo_cuentaActual.id_ejercicio!=null && saldo_cuenta_control.saldo_cuentaActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != saldo_cuenta_control.saldo_cuentaActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_3").val(saldo_cuenta_control.saldo_cuentaActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(saldo_cuenta_control.saldo_cuentaActual.id_periodo!=null && saldo_cuenta_control.saldo_cuentaActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != saldo_cuenta_control.saldo_cuentaActual.id_periodo) {
				jQuery("#t-cel_"+i+"_4").val(saldo_cuenta_control.saldo_cuentaActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(saldo_cuenta_control.saldo_cuentaActual.id_tipo_cuenta!=null && saldo_cuenta_control.saldo_cuentaActual.id_tipo_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != saldo_cuenta_control.saldo_cuentaActual.id_tipo_cuenta) {
				jQuery("#t-cel_"+i+"_5").val(saldo_cuenta_control.saldo_cuentaActual.id_tipo_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(saldo_cuenta_control.saldo_cuentaActual.id_cuenta!=null && saldo_cuenta_control.saldo_cuentaActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != saldo_cuenta_control.saldo_cuentaActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_6").val(saldo_cuenta_control.saldo_cuentaActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(saldo_cuenta_control.saldo_cuentaActual.suma_debe);
		jQuery("#t-cel_"+i+"_8").val(saldo_cuenta_control.saldo_cuentaActual.suma_haber);
		jQuery("#t-cel_"+i+"_9").val(saldo_cuenta_control.saldo_cuentaActual.saldo);
		jQuery("#t-cel_"+i+"_10").val(saldo_cuenta_control.saldo_cuentaActual.fecha_proceso);
		jQuery("#t-cel_"+i+"_11").val(saldo_cuenta_control.saldo_cuentaActual.deudor);
		jQuery("#t-cel_"+i+"_12").val(saldo_cuenta_control.saldo_cuentaActual.acreedor);
		jQuery("#t-cel_"+i+"_13").val(saldo_cuenta_control.saldo_cuentaActual.fecha_fin_mes);
		jQuery("#t-cel_"+i+"_14").val(saldo_cuenta_control.saldo_cuentaActual.tipo_cuenta_codigo);
		jQuery("#t-cel_"+i+"_15").val(saldo_cuenta_control.saldo_cuentaActual.cuenta_contable);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(saldo_cuenta_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(saldo_cuenta_control) {
		saldo_cuenta_funcion1.registrarControlesTableValidacionEdition(saldo_cuenta_control,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuentaConstante,strParametros);
		
		//saldo_cuenta_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(saldo_cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_empresa",saldo_cuenta_control.empresasFK);

		if(saldo_cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+saldo_cuenta_control.idFilaTablaActual+"_2",saldo_cuenta_control.empresasFK);
		}
	};

	cargarCombosejerciciosFK(saldo_cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_ejercicio",saldo_cuenta_control.ejerciciosFK);

		if(saldo_cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+saldo_cuenta_control.idFilaTablaActual+"_3",saldo_cuenta_control.ejerciciosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio",saldo_cuenta_control.ejerciciosFK);

	};

	cargarCombosperiodosFK(saldo_cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_periodo",saldo_cuenta_control.periodosFK);

		if(saldo_cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+saldo_cuenta_control.idFilaTablaActual+"_4",saldo_cuenta_control.periodosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo",saldo_cuenta_control.periodosFK);

	};

	cargarCombostipo_cuentasFK(saldo_cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta",saldo_cuenta_control.tipo_cuentasFK);

		if(saldo_cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+saldo_cuenta_control.idFilaTablaActual+"_5",saldo_cuenta_control.tipo_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta",saldo_cuenta_control.tipo_cuentasFK);

	};

	cargarComboscuentasFK(saldo_cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_cuenta",saldo_cuenta_control.cuentasFK);

		if(saldo_cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+saldo_cuenta_control.idFilaTablaActual+"_6",saldo_cuenta_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",saldo_cuenta_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(saldo_cuenta_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(saldo_cuenta_control) {

	};

	registrarComboActionChangeCombosperiodosFK(saldo_cuenta_control) {

	};

	registrarComboActionChangeCombostipo_cuentasFK(saldo_cuenta_control) {

	};

	registrarComboActionChangeComboscuentasFK(saldo_cuenta_control) {

	};

	
	
	setDefectoValorCombosempresasFK(saldo_cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(saldo_cuenta_control.idempresaDefaultFK>-1 && jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != saldo_cuenta_control.idempresaDefaultFK) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_empresa").val(saldo_cuenta_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(saldo_cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(saldo_cuenta_control.idejercicioDefaultFK>-1 && jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_ejercicio").val() != saldo_cuenta_control.idejercicioDefaultFK) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_ejercicio").val(saldo_cuenta_control.idejercicioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val(saldo_cuenta_control.idejercicioDefaultForeignKey).trigger("change");
			if(jQuery("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(saldo_cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(saldo_cuenta_control.idperiodoDefaultFK>-1 && jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_periodo").val() != saldo_cuenta_control.idperiodoDefaultFK) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_periodo").val(saldo_cuenta_control.idperiodoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val(saldo_cuenta_control.idperiodoDefaultForeignKey).trigger("change");
			if(jQuery("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_cuentasFK(saldo_cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(saldo_cuenta_control.idtipo_cuentaDefaultFK>-1 && jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != saldo_cuenta_control.idtipo_cuentaDefaultFK) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(saldo_cuenta_control.idtipo_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(saldo_cuenta_control.idtipo_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(saldo_cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(saldo_cuenta_control.idcuentaDefaultFK>-1 && jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_cuenta").val() != saldo_cuenta_control.idcuentaDefaultFK) {
				jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_cuenta").val(saldo_cuenta_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(saldo_cuenta_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+saldo_cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//saldo_cuenta_control
		
	
	}
	
	onLoadCombosDefectoFK(saldo_cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(saldo_cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",saldo_cuenta_control.strRecargarFkTipos,",")) { 
				saldo_cuenta_webcontrol1.setDefectoValorCombosempresasFK(saldo_cuenta_control);
			}

			if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",saldo_cuenta_control.strRecargarFkTipos,",")) { 
				saldo_cuenta_webcontrol1.setDefectoValorCombosejerciciosFK(saldo_cuenta_control);
			}

			if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",saldo_cuenta_control.strRecargarFkTipos,",")) { 
				saldo_cuenta_webcontrol1.setDefectoValorCombosperiodosFK(saldo_cuenta_control);
			}

			if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",saldo_cuenta_control.strRecargarFkTipos,",")) { 
				saldo_cuenta_webcontrol1.setDefectoValorCombostipo_cuentasFK(saldo_cuenta_control);
			}

			if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",saldo_cuenta_control.strRecargarFkTipos,",")) { 
				saldo_cuenta_webcontrol1.setDefectoValorComboscuentasFK(saldo_cuenta_control);
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
	onLoadCombosEventosFK(saldo_cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(saldo_cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",saldo_cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				saldo_cuenta_webcontrol1.registrarComboActionChangeCombosempresasFK(saldo_cuenta_control);
			//}

			//if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",saldo_cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				saldo_cuenta_webcontrol1.registrarComboActionChangeCombosejerciciosFK(saldo_cuenta_control);
			//}

			//if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",saldo_cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				saldo_cuenta_webcontrol1.registrarComboActionChangeCombosperiodosFK(saldo_cuenta_control);
			//}

			//if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",saldo_cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				saldo_cuenta_webcontrol1.registrarComboActionChangeCombostipo_cuentasFK(saldo_cuenta_control);
			//}

			//if(saldo_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",saldo_cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				saldo_cuenta_webcontrol1.registrarComboActionChangeComboscuentasFK(saldo_cuenta_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(saldo_cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(saldo_cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(saldo_cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("saldo_cuenta");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("saldo_cuenta");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(saldo_cuenta_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);			
			
			if(saldo_cuenta_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,"saldo_cuenta");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				saldo_cuenta_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				saldo_cuenta_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				saldo_cuenta_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_cuenta","id_tipo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta_img_busqueda").click(function(){
				saldo_cuenta_webcontrol1.abrirBusquedaParatipo_cuenta("id_tipo_cuenta");
				//alert(jQuery('#form-id_tipo_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+saldo_cuenta_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				saldo_cuenta_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("saldo_cuenta","FK_Idcuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("saldo_cuenta","FK_Idejercicio","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("saldo_cuenta","FK_Idempresa","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("saldo_cuenta","FK_Idperiodo","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("saldo_cuenta","FK_Idtipo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			saldo_cuenta_funcion1.validarFormularioJQuery(saldo_cuenta_constante1);
			
			if(saldo_cuenta_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(saldo_cuenta_control) {
		
		jQuery("#divBusquedasaldo_cuentaAjaxWebPart").css("display",saldo_cuenta_control.strPermisoBusqueda);
		jQuery("#trsaldo_cuentaCabeceraBusquedas").css("display",saldo_cuenta_control.strPermisoBusqueda);
		jQuery("#trBusquedasaldo_cuenta").css("display",saldo_cuenta_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportesaldo_cuenta").css("display",saldo_cuenta_control.strPermisoReporte);			
		jQuery("#tdMostrarTodossaldo_cuenta").attr("style",saldo_cuenta_control.strPermisoMostrarTodos);
		
		if(saldo_cuenta_control.strPermisoNuevo!=null) {
			jQuery("#tdsaldo_cuentaNuevo").css("display",saldo_cuenta_control.strPermisoNuevo);
			jQuery("#tdsaldo_cuentaNuevoToolBar").css("display",saldo_cuenta_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdsaldo_cuentaDuplicar").css("display",saldo_cuenta_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdsaldo_cuentaDuplicarToolBar").css("display",saldo_cuenta_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdsaldo_cuentaNuevoGuardarCambios").css("display",saldo_cuenta_control.strPermisoNuevo);
			jQuery("#tdsaldo_cuentaNuevoGuardarCambiosToolBar").css("display",saldo_cuenta_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(saldo_cuenta_control.strPermisoActualizar!=null) {
			jQuery("#tdsaldo_cuentaActualizarToolBar").css("display",saldo_cuenta_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdsaldo_cuentaCopiar").css("display",saldo_cuenta_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdsaldo_cuentaCopiarToolBar").css("display",saldo_cuenta_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdsaldo_cuentaConEditar").css("display",saldo_cuenta_control.strPermisoActualizar);
		}
		
		jQuery("#tdsaldo_cuentaEliminarToolBar").css("display",saldo_cuenta_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdsaldo_cuentaGuardarCambios").css("display",saldo_cuenta_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdsaldo_cuentaGuardarCambiosToolBar").css("display",saldo_cuenta_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trsaldo_cuentaElementos").css("display",saldo_cuenta_control.strVisibleTablaElementos);
		
		jQuery("#trsaldo_cuentaAcciones").css("display",saldo_cuenta_control.strVisibleTablaAcciones);
		jQuery("#trsaldo_cuentaParametrosAcciones").css("display",saldo_cuenta_control.strVisibleTablaAcciones);
			
		jQuery("#tdsaldo_cuentaCerrarPagina").css("display",saldo_cuenta_control.strPermisoPopup);		
		jQuery("#tdsaldo_cuentaCerrarPaginaToolBar").css("display",saldo_cuenta_control.strPermisoPopup);
		//jQuery("#trsaldo_cuentaAccionesRelaciones").css("display",saldo_cuenta_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		saldo_cuenta_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		saldo_cuenta_webcontrol1.registrarEventosControles();
		
		if(saldo_cuenta_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(saldo_cuenta_constante1.STR_ES_RELACIONADO=="false") {
			saldo_cuenta_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(saldo_cuenta_constante1.STR_ES_RELACIONES=="true") {
			if(saldo_cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
				saldo_cuenta_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(saldo_cuenta_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(saldo_cuenta_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				saldo_cuenta_webcontrol1.onLoad();
				
			} else {
				if(saldo_cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
					if(saldo_cuenta_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
						//saldo_cuenta_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(saldo_cuenta_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(saldo_cuenta_constante1.BIG_ID_ACTUAL,"saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);
						//saldo_cuenta_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			saldo_cuenta_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("saldo_cuenta","contabilidad","",saldo_cuenta_funcion1,saldo_cuenta_webcontrol1,saldo_cuenta_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var saldo_cuenta_webcontrol1=new saldo_cuenta_webcontrol();

if(saldo_cuenta_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = saldo_cuenta_webcontrol1.onLoadWindow; 
}

//</script>