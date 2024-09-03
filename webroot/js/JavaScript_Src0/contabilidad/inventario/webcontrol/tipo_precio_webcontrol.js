//<script type="text/javascript" language="javascript">



//var tipo_precioJQueryPaginaWebInteraccion= function (tipo_precio_control) {
//this.,this.,this.

class tipo_precio_webcontrol extends tipo_precio_webcontrol_add {
	
	tipo_precio_control=null;
	tipo_precio_controlInicial=null;
	tipo_precio_controlAuxiliar=null;
		
	//if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_precio_control) {
		super();
		
		this.tipo_precio_control=tipo_precio_control;
	}
		
	actualizarVariablesPagina(tipo_precio_control) {
		
		if(tipo_precio_control.action=="index" || tipo_precio_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_precio_control);
			
		} else if(tipo_precio_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(tipo_precio_control);
			
		} else if(tipo_precio_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(tipo_precio_control);
			
		} else if(tipo_precio_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_precio_control);		
		
		} else if(tipo_precio_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tipo_precio_control);		
		
		} else if(tipo_precio_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_precio_control);		
		
		} else if(tipo_precio_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_precio_control);		
		}
		else if(tipo_precio_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control);		
		}
		else if(tipo_precio_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(tipo_precio_control);		
		}
		else if(tipo_precio_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_precio_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(tipo_precio_control.action + " Revisar Manejo");
			
			if(tipo_precio_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(tipo_precio_control);
				
				return;
			}
			
			//if(tipo_precio_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(tipo_precio_control);
			//}
			
			if(tipo_precio_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(tipo_precio_control);
			}
			
			if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_precio_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(tipo_precio_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(tipo_precio_control, false);			
			}
			
			if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(tipo_precio_control);	
			}
			
			if(tipo_precio_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(tipo_precio_control);
			}
			
			if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(tipo_precio_control);
			}
			
			if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(tipo_precio_control);
			}
			
			if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(tipo_precio_control);	
			}
			
			if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
			}
			
			if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(tipo_precio_control);
			}
			
			
			if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(tipo_precio_control);			
			}
			
			if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(tipo_precio_control);
			}
			
			
			if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(tipo_precio_control);
			}
			
			if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(tipo_precio_control);
			}				
			
			if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_precio_control);
			}
			
			if(tipo_precio_control.usuarioActual!=null && tipo_precio_control.usuarioActual.field_strUserName!=null &&
			tipo_precio_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(tipo_precio_control);			
			}
		}
		
		
		if(tipo_precio_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_precio_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(tipo_precio_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_precio_control);
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		this.actualizarPaginaCargaGeneralControles(tipo_precio_control);
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_precio_control);
		this.actualizarPaginaAreaBusquedas(tipo_precio_control);
		this.actualizarPaginaCargaCombosFK(tipo_precio_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_precio_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_precio_control);
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		this.actualizarPaginaCargaGeneralControles(tipo_precio_control);
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_precio_control);
		this.actualizarPaginaAreaBusquedas(tipo_precio_control);
		this.actualizarPaginaCargaCombosFK(tipo_precio_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(tipo_precio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_precio_control);		
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_precio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_precio_control);		
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_precio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_precio_control);		
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_precio_control) {
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tipo_precio_control) {
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_precio_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_precio_control);
		this.actualizarPaginaCargaCombosFK(tipo_precio_control);
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_precio_control) {
		this.actualizarPaginaAbrirLink(tipo_precio_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);				
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		this.actualizarPaginaFormulario(tipo_precio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		this.actualizarPaginaFormulario(tipo_precio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tipo_precio_control) {
		this.actualizarPaginaFormulario(tipo_precio_control);
		this.onLoadCombosDefectoFK(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		this.actualizarPaginaFormulario(tipo_precio_control);
		this.onLoadCombosDefectoFK(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_precio_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_precio_control);
		this.actualizarPaginaCargaCombosFK(tipo_precio_control);
		this.actualizarPaginaFormulario(tipo_precio_control);
		this.onLoadCombosDefectoFK(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_precio_control) {
		this.actualizarPaginaAbrirLink(tipo_precio_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_precio_control) {
		this.actualizarPaginaImprimir(tipo_precio_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_precio_control) {
		this.actualizarPaginaImprimir(tipo_precio_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_precio_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_precio_control) {
		//FORMULARIO
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_precio_control);
			this.actualizarPaginaFormularioAdd(tipo_precio_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		//COMBOS FK
		if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_precio_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_precio_control) {
		//FORMULARIO
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_precio_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);	
		//COMBOS FK
		if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_precio_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		this.actualizarPaginaFormulario(tipo_precio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(tipo_precio_control) {
		//FORMULARIO
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_precio_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(tipo_precio_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);	
		//COMBOS FK
		if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_precio_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_precio_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_precio_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control) {
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_precio_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_precio_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_precio_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_precio_control) {
		if(tipo_precio_funcion1.esPaginaForm()==true) {
			window.opener.tipo_precio_webcontrol1.actualizarPaginaTablaDatos(tipo_precio_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_precio_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_precio_control) {
		tipo_precio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_precio_control.strAuxiliarUrlPagina);
				
		tipo_precio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_precio_control.strAuxiliarTipo,tipo_precio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_precio_control) {
		tipo_precio_funcion1.resaltarRestaurarDivMensaje(true,tipo_precio_control.strAuxiliarMensajeAlert,tipo_precio_control.strAuxiliarCssMensaje);
			
		if(tipo_precio_funcion1.esPaginaForm()==true) {
			window.opener.tipo_precio_funcion1.resaltarRestaurarDivMensaje(true,tipo_precio_control.strAuxiliarMensajeAlert,tipo_precio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(tipo_precio_control) {
		eval(tipo_precio_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(tipo_precio_control, mostrar) {
		
		if(mostrar==true) {
			tipo_precio_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_precio_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			tipo_precio_funcion1.mostrarDivMensaje(true,tipo_precio_control.strAuxiliarMensaje,tipo_precio_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_precio_funcion1.mostrarDivMensaje(false,tipo_precio_control.strAuxiliarMensaje,tipo_precio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(tipo_precio_control) {
	
		funcionGeneral.printWebPartPage("tipo_precio",tipo_precio_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliartipo_preciosAjaxWebPart").html(tipo_precio_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("tipo_precio",jQuery("#divTablaDatosReporteAuxiliartipo_preciosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(tipo_precio_control) {
		this.tipo_precio_controlInicial=tipo_precio_control;
			
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_precio_control.strStyleDivArbol,tipo_precio_control.strStyleDivContent
																,tipo_precio_control.strStyleDivOpcionesBanner,tipo_precio_control.strStyleDivExpandirColapsar
																,tipo_precio_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=tipo_precio_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tipo_precio_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(tipo_precio_control) {
		jQuery("#divTablaDatostipo_preciosAjaxWebPart").html(tipo_precio_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostipo_precios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostipo_precios=jQuery("#tblTablaDatostipo_precios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tipo_precio",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tipo_precio_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tipo_precio_webcontrol1.registrarControlesTableEdition(tipo_precio_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tipo_precio_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(tipo_precio_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tipo_precio_control.tipo_precioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(tipo_precio_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(tipo_precio_control) {
		this.actualizarCssBotonesPagina(tipo_precio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_precio_control.tiposReportes,tipo_precio_control.tiposReporte
															 	,tipo_precio_control.tiposPaginacion,tipo_precio_control.tiposAcciones
																,tipo_precio_control.tiposColumnasSelect,tipo_precio_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_precio_control.tiposRelaciones,tipo_precio_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_precio_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_precio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_precio_control);			
	}
	
	actualizarPaginaAreaBusquedas(tipo_precio_control) {
		jQuery("#divBusquedatipo_precioAjaxWebPart").css("display",tipo_precio_control.strPermisoBusqueda);
		jQuery("#trtipo_precioCabeceraBusquedas").css("display",tipo_precio_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_precio").css("display",tipo_precio_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tipo_precio_control.htmlTablaOrderBy!=null
			&& tipo_precio_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytipo_precioAjaxWebPart").html(tipo_precio_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tipo_precio_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tipo_precio_control.htmlTablaOrderByRel!=null
			&& tipo_precio_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltipo_precioAjaxWebPart").html(tipo_precio_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatipo_precioAjaxWebPart").css("display","none");
			jQuery("#trtipo_precioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatipo_precio").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(tipo_precio_control) {
		jQuery("#tdtipo_precioNuevo").css("display",tipo_precio_control.strPermisoNuevo);
		jQuery("#trtipo_precioElementos").css("display",tipo_precio_control.strVisibleTablaElementos);
		jQuery("#trtipo_precioAcciones").css("display",tipo_precio_control.strVisibleTablaAcciones);
		jQuery("#trtipo_precioParametrosAcciones").css("display",tipo_precio_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tipo_precio_control) {
	
		this.actualizarCssBotonesMantenimiento(tipo_precio_control);
				
		if(tipo_precio_control.tipo_precioActual!=null) {//form
			
			this.actualizarCamposFormulario(tipo_precio_control);			
		}
						
		this.actualizarSpanMensajesCampos(tipo_precio_control);
	}
	
	actualizarPaginaUsuarioInvitado(tipo_precio_control) {
	
		var indexPosition=tipo_precio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_precio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(tipo_precio_control) {
		jQuery("#divResumentipo_precioActualAjaxWebPart").html(tipo_precio_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_precio_control) {
		jQuery("#divAccionesRelacionestipo_precioAjaxWebPart").html(tipo_precio_control.htmlTablaAccionesRelaciones);
			
		tipo_precio_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tipo_precio_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(tipo_precio_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tipo_precio_control) {
		
		if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+tipo_precio_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",tipo_precio_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+tipo_precio_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",tipo_precio_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontipo_precio();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tipo_precio",id,"inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		tipo_precio_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("tipo_precio","empresa","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_precio_control) {
	
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id").val(tipo_precio_control.tipo_precioActual.id);
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-version_row").val(tipo_precio_control.tipo_precioActual.versionRow);
		
		if(tipo_precio_control.tipo_precioActual.id_empresa!=null && tipo_precio_control.tipo_precioActual.id_empresa>-1){
			if(jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val() != tipo_precio_control.tipo_precioActual.id_empresa) {
				jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val(tipo_precio_control.tipo_precioActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-codigo").val(tipo_precio_control.tipo_precioActual.codigo);
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-nombre").val(tipo_precio_control.tipo_precioActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_precio_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_precio","inventario","","form_tipo_precio",formulario,"","",paraEventoTabla,idFilaTabla,tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
	}
	
	cargarCombosFK(tipo_precio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 
				tipo_precio_webcontrol1.cargarCombosempresasFK(tipo_precio_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_precio_control.strRecargarFkTiposNinguno!=null && tipo_precio_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_precio_control.strRecargarFkTiposNinguno!='') {
			
				if(tipo_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTiposNinguno,",")) { 
					tipo_precio_webcontrol1.cargarCombosempresasFK(tipo_precio_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(tipo_precio_control) {
		jQuery("#spanstrMensajeid").text(tipo_precio_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tipo_precio_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(tipo_precio_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(tipo_precio_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_precio_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_precio_control) {
		jQuery("#tdbtnNuevotipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_precio").css("display",tipo_precio_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_precio").css("display",tipo_precio_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_precio").css("display",tipo_precio_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_precio").css("display",tipo_precio_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_precio");

			tipo_precio_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionprecio_producto").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_precio");

			tipo_precio_webcontrol1.registrarSesionParaprecio_productos(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(tipo_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,tipo_precio_funcion1,tipo_precio_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(tipo_precio_control) {
		var i=0;
		
		i=tipo_precio_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tipo_precio_control.tipo_precioActual.id);
		jQuery("#t-version_row_"+i+"").val(tipo_precio_control.tipo_precioActual.versionRow);
		
		if(tipo_precio_control.tipo_precioActual.id_empresa!=null && tipo_precio_control.tipo_precioActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != tipo_precio_control.tipo_precioActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(tipo_precio_control.tipo_precioActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(tipo_precio_control.tipo_precioActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(tipo_precio_control.tipo_precioActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tipo_precio_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatostipo_precios").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualtipo_precio");

			tipo_precio_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionprecio_producto").click(function(){
		jQuery("#tblTablaDatostipo_precios").on("click",".imgrelacionprecio_producto", function () {

			var idActual=jQuery(this).attr("idactualtipo_precio");

			tipo_precio_webcontrol1.registrarSesionParaprecio_productos(idActual);
		});				
	}
		
	

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_precio","cliente","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,"s","");
	}

	registrarSesionParaprecio_productos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_precio","precio_producto","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(tipo_precio_control) {
		tipo_precio_funcion1.registrarControlesTableValidacionEdition(tipo_precio_control,tipo_precio_webcontrol1,tipo_precio_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precioConstante,strParametros);
		
		//tipo_precio_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(tipo_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa",tipo_precio_control.empresasFK);

		if(tipo_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+tipo_precio_control.idFilaTablaActual+"_2",tipo_precio_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(tipo_precio_control) {

	};

	
	
	setDefectoValorCombosempresasFK(tipo_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(tipo_precio_control.idempresaDefaultFK>-1 && jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val() != tipo_precio_control.idempresaDefaultFK) {
				jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val(tipo_precio_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_precio_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 
				tipo_precio_webcontrol1.setDefectoValorCombosempresasFK(tipo_precio_control);
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
	onLoadCombosEventosFK(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				tipo_precio_webcontrol1.registrarComboActionChangeCombosempresasFK(tipo_precio_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_precio");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_precio");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tipo_precio_funcion1,tipo_precio_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tipo_precio_funcion1,tipo_precio_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tipo_precio_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
			
			if(tipo_precio_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,"tipo_precio");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				tipo_precio_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("tipo_precio","FK_Idempresa","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tipo_precio");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			tipo_precio_funcion1.validarFormularioJQuery(tipo_precio_constante1);
			
			if(tipo_precio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_precio_control) {
		
		jQuery("#divBusquedatipo_precioAjaxWebPart").css("display",tipo_precio_control.strPermisoBusqueda);
		jQuery("#trtipo_precioCabeceraBusquedas").css("display",tipo_precio_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_precio").css("display",tipo_precio_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetipo_precio").css("display",tipo_precio_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostipo_precio").attr("style",tipo_precio_control.strPermisoMostrarTodos);
		
		if(tipo_precio_control.strPermisoNuevo!=null) {
			jQuery("#tdtipo_precioNuevo").css("display",tipo_precio_control.strPermisoNuevo);
			jQuery("#tdtipo_precioNuevoToolBar").css("display",tipo_precio_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtipo_precioDuplicar").css("display",tipo_precio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_precioDuplicarToolBar").css("display",tipo_precio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_precioNuevoGuardarCambios").css("display",tipo_precio_control.strPermisoNuevo);
			jQuery("#tdtipo_precioNuevoGuardarCambiosToolBar").css("display",tipo_precio_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tipo_precio_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_precioActualizarToolBar").css("display",tipo_precio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_precioCopiar").css("display",tipo_precio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_precioCopiarToolBar").css("display",tipo_precio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_precioConEditar").css("display",tipo_precio_control.strPermisoActualizar);
		}
		
		jQuery("#tdtipo_precioEliminarToolBar").css("display",tipo_precio_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdtipo_precioGuardarCambios").css("display",tipo_precio_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtipo_precioGuardarCambiosToolBar").css("display",tipo_precio_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trtipo_precioElementos").css("display",tipo_precio_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_precioAcciones").css("display",tipo_precio_control.strVisibleTablaAcciones);
		jQuery("#trtipo_precioParametrosAcciones").css("display",tipo_precio_control.strVisibleTablaAcciones);
			
		jQuery("#tdtipo_precioCerrarPagina").css("display",tipo_precio_control.strPermisoPopup);		
		jQuery("#tdtipo_precioCerrarPaginaToolBar").css("display",tipo_precio_control.strPermisoPopup);
		//jQuery("#trtipo_precioAccionesRelaciones").css("display",tipo_precio_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_precio_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_precio_webcontrol1.registrarEventosControles();
		
		if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			tipo_precio_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_precio_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_precio_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_precio_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(tipo_precio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				tipo_precio_webcontrol1.onLoad();
				
			} else {
				if(tipo_precio_constante1.BIT_ES_PAGINA_FORM==true) {
					if(tipo_precio_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
						//tipo_precio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(tipo_precio_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_precio_constante1.BIG_ID_ACTUAL,"tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
						//tipo_precio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			tipo_precio_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var tipo_precio_webcontrol1=new tipo_precio_webcontrol();

if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_precio_webcontrol1.onLoadWindow; 
}

//</script>