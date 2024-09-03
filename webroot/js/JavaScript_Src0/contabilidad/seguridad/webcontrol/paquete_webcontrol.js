//<script type="text/javascript" language="javascript">



//var paqueteJQueryPaginaWebInteraccion= function (paquete_control) {
//this.,this.,this.

class paquete_webcontrol extends paquete_webcontrol_add {
	
	paquete_control=null;
	paquete_controlInicial=null;
	paquete_controlAuxiliar=null;
		
	//if(paquete_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(paquete_control) {
		super();
		
		this.paquete_control=paquete_control;
	}
		
	actualizarVariablesPagina(paquete_control) {
		
		if(paquete_control.action=="index" || paquete_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(paquete_control);
			
		} else if(paquete_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(paquete_control);
		
		} else if(paquete_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(paquete_control);
		
		} else if(paquete_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(paquete_control);
		
		} else if(paquete_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(paquete_control);
			
		} else if(paquete_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(paquete_control);
			
		} else if(paquete_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(paquete_control);
		
		} else if(paquete_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(paquete_control);
		
		} else if(paquete_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(paquete_control);
		
		} else if(paquete_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(paquete_control);
		
		} else if(paquete_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(paquete_control);
		
		} else if(paquete_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(paquete_control);
		
		} else if(paquete_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(paquete_control);
		
		} else if(paquete_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(paquete_control);
		
		} else if(paquete_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(paquete_control);
		
		} else if(paquete_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(paquete_control);
		
		} else if(paquete_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(paquete_control);
		
		} else if(paquete_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(paquete_control);
		
		} else if(paquete_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(paquete_control);
		
		} else if(paquete_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(paquete_control);
		
		} else if(paquete_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(paquete_control);
		
		} else if(paquete_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(paquete_control);
		
		} else if(paquete_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(paquete_control);
		
		} else if(paquete_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(paquete_control);
		
		} else if(paquete_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(paquete_control);
		
		} else if(paquete_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(paquete_control);
		
		} else if(paquete_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(paquete_control);
		
		} else if(paquete_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(paquete_control);		
		
		} else if(paquete_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(paquete_control);		
		
		} else if(paquete_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(paquete_control);		
		
		} else if(paquete_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(paquete_control);		
		}
		else if(paquete_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(paquete_control);		
		}
		else if(paquete_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(paquete_control);		
		}
		else if(paquete_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(paquete_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(paquete_control.action + " Revisar Manejo");
			
			if(paquete_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(paquete_control);
				
				return;
			}
			
			//if(paquete_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(paquete_control);
			//}
			
			if(paquete_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(paquete_control);
			}
			
			if(paquete_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && paquete_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(paquete_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(paquete_control, false);			
			}
			
			if(paquete_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(paquete_control);	
			}
			
			if(paquete_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(paquete_control);
			}
			
			if(paquete_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(paquete_control);
			}
			
			if(paquete_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(paquete_control);
			}
			
			if(paquete_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(paquete_control);	
			}
			
			if(paquete_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(paquete_control);
			}
			
			if(paquete_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(paquete_control);
			}
			
			
			if(paquete_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(paquete_control);			
			}
			
			if(paquete_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(paquete_control);
			}
			
			
			if(paquete_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(paquete_control);
			}
			
			if(paquete_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(paquete_control);
			}				
			
			if(paquete_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(paquete_control);
			}
			
			if(paquete_control.usuarioActual!=null && paquete_control.usuarioActual.field_strUserName!=null &&
			paquete_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(paquete_control);			
			}
		}
		
		
		if(paquete_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(paquete_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(paquete_control) {
		
		this.actualizarPaginaCargaGeneral(paquete_control);
		this.actualizarPaginaTablaDatos(paquete_control);
		this.actualizarPaginaCargaGeneralControles(paquete_control);
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(paquete_control);
		this.actualizarPaginaAreaBusquedas(paquete_control);
		this.actualizarPaginaCargaCombosFK(paquete_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(paquete_control) {
		
		this.actualizarPaginaCargaGeneral(paquete_control);
		this.actualizarPaginaTablaDatos(paquete_control);
		this.actualizarPaginaCargaGeneralControles(paquete_control);
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(paquete_control);
		this.actualizarPaginaAreaBusquedas(paquete_control);
		this.actualizarPaginaCargaCombosFK(paquete_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(paquete_control) {
		this.actualizarPaginaTablaDatosAuxiliar(paquete_control);		
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(paquete_control) {
		this.actualizarPaginaTablaDatosAuxiliar(paquete_control);		
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(paquete_control) {
		this.actualizarPaginaTablaDatosAuxiliar(paquete_control);		
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(paquete_control) {
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(paquete_control) {
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(paquete_control) {
		this.actualizarPaginaCargaGeneralControles(paquete_control);
		this.actualizarPaginaCargaCombosFK(paquete_control);
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(paquete_control) {
		this.actualizarPaginaAbrirLink(paquete_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);				
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);
		this.actualizarPaginaFormulario(paquete_control);
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);
		this.actualizarPaginaFormulario(paquete_control);
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(paquete_control) {
		this.actualizarPaginaFormulario(paquete_control);
		this.onLoadCombosDefectoFK(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);
		this.actualizarPaginaFormulario(paquete_control);
		this.onLoadCombosDefectoFK(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(paquete_control) {
		this.actualizarPaginaCargaGeneralControles(paquete_control);
		this.actualizarPaginaCargaCombosFK(paquete_control);
		this.actualizarPaginaFormulario(paquete_control);
		this.onLoadCombosDefectoFK(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(paquete_control) {
		this.actualizarPaginaAbrirLink(paquete_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(paquete_control) {
		this.actualizarPaginaImprimir(paquete_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(paquete_control) {
		this.actualizarPaginaImprimir(paquete_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(paquete_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(paquete_control) {
		//FORMULARIO
		if(paquete_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(paquete_control);
			this.actualizarPaginaFormularioAdd(paquete_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		//COMBOS FK
		if(paquete_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(paquete_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(paquete_control) {
		//FORMULARIO
		if(paquete_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(paquete_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);	
		//COMBOS FK
		if(paquete_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(paquete_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);
		this.actualizarPaginaFormulario(paquete_control);
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(paquete_control) {
		//FORMULARIO
		if(paquete_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(paquete_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(paquete_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);	
		//COMBOS FK
		if(paquete_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(paquete_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(paquete_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(paquete_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(paquete_control) {
		if(paquete_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && paquete_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(paquete_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(paquete_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(paquete_control) {
		if(paquete_funcion1.esPaginaForm()==true) {
			window.opener.paquete_webcontrol1.actualizarPaginaTablaDatos(paquete_control);
		} else {
			this.actualizarPaginaTablaDatos(paquete_control);
		}
	}
	
	actualizarPaginaAbrirLink(paquete_control) {
		paquete_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(paquete_control.strAuxiliarUrlPagina);
				
		paquete_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(paquete_control.strAuxiliarTipo,paquete_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(paquete_control) {
		paquete_funcion1.resaltarRestaurarDivMensaje(true,paquete_control.strAuxiliarMensajeAlert,paquete_control.strAuxiliarCssMensaje);
			
		if(paquete_funcion1.esPaginaForm()==true) {
			window.opener.paquete_funcion1.resaltarRestaurarDivMensaje(true,paquete_control.strAuxiliarMensajeAlert,paquete_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(paquete_control) {
		eval(paquete_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(paquete_control, mostrar) {
		
		if(mostrar==true) {
			paquete_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				paquete_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			paquete_funcion1.mostrarDivMensaje(true,paquete_control.strAuxiliarMensaje,paquete_control.strAuxiliarCssMensaje);
		
		} else {
			paquete_funcion1.mostrarDivMensaje(false,paquete_control.strAuxiliarMensaje,paquete_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(paquete_control) {
	
		funcionGeneral.printWebPartPage("paquete",paquete_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarpaquetesAjaxWebPart").html(paquete_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("paquete",jQuery("#divTablaDatosReporteAuxiliarpaquetesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(paquete_control) {
		this.paquete_controlInicial=paquete_control;
			
		if(paquete_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(paquete_control.strStyleDivArbol,paquete_control.strStyleDivContent
																,paquete_control.strStyleDivOpcionesBanner,paquete_control.strStyleDivExpandirColapsar
																,paquete_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=paquete_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",paquete_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(paquete_control) {
		jQuery("#divTablaDatospaquetesAjaxWebPart").html(paquete_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatospaquetes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(paquete_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatospaquetes=jQuery("#tblTablaDatospaquetes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("paquete",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',paquete_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			paquete_webcontrol1.registrarControlesTableEdition(paquete_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		paquete_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(paquete_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(paquete_control.paqueteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(paquete_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(paquete_control) {
		this.actualizarCssBotonesPagina(paquete_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(paquete_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(paquete_control.tiposReportes,paquete_control.tiposReporte
															 	,paquete_control.tiposPaginacion,paquete_control.tiposAcciones
																,paquete_control.tiposColumnasSelect,paquete_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(paquete_control.tiposRelaciones,paquete_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(paquete_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(paquete_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(paquete_control);			
	}
	
	actualizarPaginaAreaBusquedas(paquete_control) {
		jQuery("#divBusquedapaqueteAjaxWebPart").css("display",paquete_control.strPermisoBusqueda);
		jQuery("#trpaqueteCabeceraBusquedas").css("display",paquete_control.strPermisoBusqueda);
		jQuery("#trBusquedapaquete").css("display",paquete_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(paquete_control.htmlTablaOrderBy!=null
			&& paquete_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBypaqueteAjaxWebPart").html(paquete_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//paquete_webcontrol1.registrarOrderByActions();
			
		}
			
		if(paquete_control.htmlTablaOrderByRel!=null
			&& paquete_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelpaqueteAjaxWebPart").html(paquete_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(paquete_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedapaqueteAjaxWebPart").css("display","none");
			jQuery("#trpaqueteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedapaquete").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(paquete_control) {
		jQuery("#tdpaqueteNuevo").css("display",paquete_control.strPermisoNuevo);
		jQuery("#trpaqueteElementos").css("display",paquete_control.strVisibleTablaElementos);
		jQuery("#trpaqueteAcciones").css("display",paquete_control.strVisibleTablaAcciones);
		jQuery("#trpaqueteParametrosAcciones").css("display",paquete_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(paquete_control) {
	
		this.actualizarCssBotonesMantenimiento(paquete_control);
				
		if(paquete_control.paqueteActual!=null) {//form
			
			this.actualizarCamposFormulario(paquete_control);			
		}
						
		this.actualizarSpanMensajesCampos(paquete_control);
	}
	
	actualizarPaginaUsuarioInvitado(paquete_control) {
	
		var indexPosition=paquete_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=paquete_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(paquete_control) {
		jQuery("#divResumenpaqueteActualAjaxWebPart").html(paquete_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(paquete_control) {
		jQuery("#divAccionesRelacionespaqueteAjaxWebPart").html(paquete_control.htmlTablaAccionesRelaciones);
			
		paquete_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(paquete_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(paquete_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(paquete_control) {
		
		if(paquete_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+paquete_constante1.STR_SUFIJO+"FK_Idsistema").attr("style",paquete_control.strVisibleFK_Idsistema);
			jQuery("#tblstrVisible"+paquete_constante1.STR_SUFIJO+"FK_Idsistema").attr("style",paquete_control.strVisibleFK_Idsistema);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionpaquete();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("paquete",id,"seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);		
	}
	
	

	abrirBusquedaParasistema(strNombreCampoBusqueda){//idActual
		paquete_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("paquete","sistema","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(paquete_control) {
	
		jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id").val(paquete_control.paqueteActual.id);
		jQuery("#form"+paquete_constante1.STR_SUFIJO+"-version_row").val(paquete_control.paqueteActual.versionRow);
		
		if(paquete_control.paqueteActual.id_sistema!=null && paquete_control.paqueteActual.id_sistema>-1){
			if(jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val() != paquete_control.paqueteActual.id_sistema) {
				jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val(paquete_control.paqueteActual.id_sistema).trigger("change");
			}
		} else { 
			//jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").select2("val", null);
			if(jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+paquete_constante1.STR_SUFIJO+"-nombre").val(paquete_control.paqueteActual.nombre);
		jQuery("#form"+paquete_constante1.STR_SUFIJO+"-descripcion").val(paquete_control.paqueteActual.descripcion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+paquete_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("paquete","seguridad","","form_paquete",formulario,"","",paraEventoTabla,idFilaTabla,paquete_funcion1,paquete_webcontrol1,paquete_constante1);
	}
	
	cargarCombosFK(paquete_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(paquete_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",paquete_control.strRecargarFkTipos,",")) { 
				paquete_webcontrol1.cargarCombossistemasFK(paquete_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(paquete_control.strRecargarFkTiposNinguno!=null && paquete_control.strRecargarFkTiposNinguno!='NINGUNO' && paquete_control.strRecargarFkTiposNinguno!='') {
			
				if(paquete_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sistema",paquete_control.strRecargarFkTiposNinguno,",")) { 
					paquete_webcontrol1.cargarCombossistemasFK(paquete_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(paquete_control) {
		jQuery("#spanstrMensajeid").text(paquete_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(paquete_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_sistema").text(paquete_control.strMensajeid_sistema);		
		jQuery("#spanstrMensajenombre").text(paquete_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(paquete_control.strMensajedescripcion);		
	}
	
	actualizarCssBotonesMantenimiento(paquete_control) {
		jQuery("#tdbtnNuevopaquete").css("visibility",paquete_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevopaquete").css("display",paquete_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarpaquete").css("visibility",paquete_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarpaquete").css("display",paquete_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarpaquete").css("visibility",paquete_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarpaquete").css("display",paquete_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarpaquete").css("visibility",paquete_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiospaquete").css("visibility",paquete_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiospaquete").css("display",paquete_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarpaquete").css("visibility",paquete_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarpaquete").css("visibility",paquete_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarpaquete").css("visibility",paquete_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionmodulo").click(function(){

			var idActual=jQuery(this).attr("idactualpaquete");

			paquete_webcontrol1.registrarSesionParamodulos(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablasistemaFK(paquete_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,paquete_funcion1,paquete_control.sistemasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(paquete_control) {
		var i=0;
		
		i=paquete_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(paquete_control.paqueteActual.id);
		jQuery("#t-version_row_"+i+"").val(paquete_control.paqueteActual.versionRow);
		
		if(paquete_control.paqueteActual.id_sistema!=null && paquete_control.paqueteActual.id_sistema>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != paquete_control.paqueteActual.id_sistema) {
				jQuery("#t-cel_"+i+"_2").val(paquete_control.paqueteActual.id_sistema).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(paquete_control.paqueteActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(paquete_control.paqueteActual.descripcion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(paquete_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionmodulo").click(function(){
		jQuery("#tblTablaDatospaquetes").on("click",".imgrelacionmodulo", function () {

			var idActual=jQuery(this).attr("idactualpaquete");

			paquete_webcontrol1.registrarSesionParamodulos(idActual);
		});				
	}
		
	

	registrarSesionParamodulos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"paquete","modulo","seguridad","",paquete_funcion1,paquete_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(paquete_control) {
		paquete_funcion1.registrarControlesTableValidacionEdition(paquete_control,paquete_webcontrol1,paquete_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paqueteConstante,strParametros);
		
		//paquete_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombossistemasFK(paquete_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema",paquete_control.sistemasFK);

		if(paquete_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+paquete_control.idFilaTablaActual+"_2",paquete_control.sistemasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+paquete_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema",paquete_control.sistemasFK);

	};

	
	
	registrarComboActionChangeCombossistemasFK(paquete_control) {

	};

	
	
	setDefectoValorCombossistemasFK(paquete_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(paquete_control.idsistemaDefaultFK>-1 && jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val() != paquete_control.idsistemaDefaultFK) {
				jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val(paquete_control.idsistemaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+paquete_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(paquete_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+paquete_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+paquete_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//paquete_control
		
	
	}
	
	onLoadCombosDefectoFK(paquete_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(paquete_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(paquete_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",paquete_control.strRecargarFkTipos,",")) { 
				paquete_webcontrol1.setDefectoValorCombossistemasFK(paquete_control);
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
	onLoadCombosEventosFK(paquete_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(paquete_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(paquete_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",paquete_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				paquete_webcontrol1.registrarComboActionChangeCombossistemasFK(paquete_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(paquete_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(paquete_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(paquete_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("paquete");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("paquete");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(paquete_funcion1,paquete_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(paquete_funcion1,paquete_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(paquete_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);			
			
			if(paquete_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,"paquete");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sistema","id_sistema","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema_img_busqueda").click(function(){
				paquete_webcontrol1.abrirBusquedaParasistema("id_sistema");
				//alert(jQuery('#form-id_sistema_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("paquete","FK_Idsistema","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("paquete");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			paquete_funcion1.validarFormularioJQuery(paquete_constante1);
			
			if(paquete_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(paquete_control) {
		
		jQuery("#divBusquedapaqueteAjaxWebPart").css("display",paquete_control.strPermisoBusqueda);
		jQuery("#trpaqueteCabeceraBusquedas").css("display",paquete_control.strPermisoBusqueda);
		jQuery("#trBusquedapaquete").css("display",paquete_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportepaquete").css("display",paquete_control.strPermisoReporte);			
		jQuery("#tdMostrarTodospaquete").attr("style",paquete_control.strPermisoMostrarTodos);
		
		if(paquete_control.strPermisoNuevo!=null) {
			jQuery("#tdpaqueteNuevo").css("display",paquete_control.strPermisoNuevo);
			jQuery("#tdpaqueteNuevoToolBar").css("display",paquete_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdpaqueteDuplicar").css("display",paquete_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpaqueteDuplicarToolBar").css("display",paquete_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpaqueteNuevoGuardarCambios").css("display",paquete_control.strPermisoNuevo);
			jQuery("#tdpaqueteNuevoGuardarCambiosToolBar").css("display",paquete_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(paquete_control.strPermisoActualizar!=null) {
			jQuery("#tdpaqueteActualizarToolBar").css("display",paquete_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpaqueteCopiar").css("display",paquete_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpaqueteCopiarToolBar").css("display",paquete_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpaqueteConEditar").css("display",paquete_control.strPermisoActualizar);
		}
		
		jQuery("#tdpaqueteEliminarToolBar").css("display",paquete_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdpaqueteGuardarCambios").css("display",paquete_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdpaqueteGuardarCambiosToolBar").css("display",paquete_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trpaqueteElementos").css("display",paquete_control.strVisibleTablaElementos);
		
		jQuery("#trpaqueteAcciones").css("display",paquete_control.strVisibleTablaAcciones);
		jQuery("#trpaqueteParametrosAcciones").css("display",paquete_control.strVisibleTablaAcciones);
			
		jQuery("#tdpaqueteCerrarPagina").css("display",paquete_control.strPermisoPopup);		
		jQuery("#tdpaqueteCerrarPaginaToolBar").css("display",paquete_control.strPermisoPopup);
		//jQuery("#trpaqueteAccionesRelaciones").css("display",paquete_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		paquete_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		paquete_webcontrol1.registrarEventosControles();
		
		if(paquete_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(paquete_constante1.STR_ES_RELACIONADO=="false") {
			paquete_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(paquete_constante1.STR_ES_RELACIONES=="true") {
			if(paquete_constante1.BIT_ES_PAGINA_FORM==true) {
				paquete_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(paquete_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(paquete_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				paquete_webcontrol1.onLoad();
				
			} else {
				if(paquete_constante1.BIT_ES_PAGINA_FORM==true) {
					if(paquete_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
						//paquete_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(paquete_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(paquete_constante1.BIG_ID_ACTUAL,"paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
						//paquete_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			paquete_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var paquete_webcontrol1=new paquete_webcontrol();

if(paquete_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = paquete_webcontrol1.onLoadWindow; 
}

//</script>