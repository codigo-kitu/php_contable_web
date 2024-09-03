//<script type="text/javascript" language="javascript">



//var producto_bodegaJQueryPaginaWebInteraccion= function (producto_bodega_control) {
//this.,this.,this.

class producto_bodega_webcontrol extends producto_bodega_webcontrol_add {
	
	producto_bodega_control=null;
	producto_bodega_controlInicial=null;
	producto_bodega_controlAuxiliar=null;
		
	//if(producto_bodega_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(producto_bodega_control) {
		super();
		
		this.producto_bodega_control=producto_bodega_control;
	}
		
	actualizarVariablesPagina(producto_bodega_control) {
		
		if(producto_bodega_control.action=="index" || producto_bodega_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(producto_bodega_control);
			
		} else if(producto_bodega_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(producto_bodega_control);
			
		} else if(producto_bodega_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(producto_bodega_control);
			
		} else if(producto_bodega_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(producto_bodega_control);		
		
		} else if(producto_bodega_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(producto_bodega_control);		
		
		} else if(producto_bodega_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(producto_bodega_control);		
		
		} else if(producto_bodega_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(producto_bodega_control);		
		}
		else if(producto_bodega_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(producto_bodega_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(producto_bodega_control.action + " Revisar Manejo");
			
			if(producto_bodega_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(producto_bodega_control);
				
				return;
			}
			
			//if(producto_bodega_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(producto_bodega_control);
			//}
			
			if(producto_bodega_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(producto_bodega_control);
			}
			
			if(producto_bodega_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && producto_bodega_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(producto_bodega_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(producto_bodega_control, false);			
			}
			
			if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(producto_bodega_control);	
			}
			
			if(producto_bodega_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(producto_bodega_control);
			}
			
			if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(producto_bodega_control);
			}
			
			if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(producto_bodega_control);
			}
			
			if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(producto_bodega_control);	
			}
			
			if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
			}
			
			if(producto_bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(producto_bodega_control);
			}
			
			
			if(producto_bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(producto_bodega_control);			
			}
			
			if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(producto_bodega_control);
			}
			
			
			if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(producto_bodega_control);
			}
			
			if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(producto_bodega_control);
			}				
			
			if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(producto_bodega_control);
			}
			
			if(producto_bodega_control.usuarioActual!=null && producto_bodega_control.usuarioActual.field_strUserName!=null &&
			producto_bodega_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(producto_bodega_control);			
			}
		}
		
		
		if(producto_bodega_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(producto_bodega_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(producto_bodega_control) {
		
		this.actualizarPaginaCargaGeneral(producto_bodega_control);
		this.actualizarPaginaTablaDatos(producto_bodega_control);
		this.actualizarPaginaCargaGeneralControles(producto_bodega_control);
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(producto_bodega_control);
		this.actualizarPaginaAreaBusquedas(producto_bodega_control);
		this.actualizarPaginaCargaCombosFK(producto_bodega_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(producto_bodega_control) {
		
		this.actualizarPaginaCargaGeneral(producto_bodega_control);
		this.actualizarPaginaTablaDatos(producto_bodega_control);
		this.actualizarPaginaCargaGeneralControles(producto_bodega_control);
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(producto_bodega_control);
		this.actualizarPaginaAreaBusquedas(producto_bodega_control);
		this.actualizarPaginaCargaCombosFK(producto_bodega_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(producto_bodega_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_bodega_control);		
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(producto_bodega_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_bodega_control);		
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(producto_bodega_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_bodega_control);		
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);		
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);		
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);		
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(producto_bodega_control) {
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(producto_bodega_control) {
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(producto_bodega_control) {
		this.actualizarPaginaCargaGeneralControles(producto_bodega_control);
		this.actualizarPaginaCargaCombosFK(producto_bodega_control);
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(producto_bodega_control) {
		this.actualizarPaginaAbrirLink(producto_bodega_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);				
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);
		this.actualizarPaginaFormulario(producto_bodega_control);
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);
		this.actualizarPaginaFormulario(producto_bodega_control);
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(producto_bodega_control) {
		this.actualizarPaginaFormulario(producto_bodega_control);
		this.onLoadCombosDefectoFK(producto_bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);
		this.actualizarPaginaFormulario(producto_bodega_control);
		this.onLoadCombosDefectoFK(producto_bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(producto_bodega_control) {
		this.actualizarPaginaCargaGeneralControles(producto_bodega_control);
		this.actualizarPaginaCargaCombosFK(producto_bodega_control);
		this.actualizarPaginaFormulario(producto_bodega_control);
		this.onLoadCombosDefectoFK(producto_bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(producto_bodega_control) {
		this.actualizarPaginaAbrirLink(producto_bodega_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(producto_bodega_control) {
		this.actualizarPaginaTablaDatos(producto_bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(producto_bodega_control) {
		this.actualizarPaginaImprimir(producto_bodega_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(producto_bodega_control) {
		this.actualizarPaginaImprimir(producto_bodega_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(producto_bodega_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(producto_bodega_control) {
		//FORMULARIO
		if(producto_bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_bodega_control);
			this.actualizarPaginaFormularioAdd(producto_bodega_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		//COMBOS FK
		if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_bodega_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(producto_bodega_control) {
		//FORMULARIO
		if(producto_bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_bodega_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);	
		//COMBOS FK
		if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_bodega_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(producto_bodega_control) {
		//FORMULARIO
		if(producto_bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_bodega_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(producto_bodega_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);	
		//COMBOS FK
		if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_bodega_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control) {
		if(producto_bodega_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && producto_bodega_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(producto_bodega_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(producto_bodega_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(producto_bodega_control) {
		if(producto_bodega_funcion1.esPaginaForm()==true) {
			window.opener.producto_bodega_webcontrol1.actualizarPaginaTablaDatos(producto_bodega_control);
		} else {
			this.actualizarPaginaTablaDatos(producto_bodega_control);
		}
	}
	
	actualizarPaginaAbrirLink(producto_bodega_control) {
		producto_bodega_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(producto_bodega_control.strAuxiliarUrlPagina);
				
		producto_bodega_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(producto_bodega_control.strAuxiliarTipo,producto_bodega_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(producto_bodega_control) {
		producto_bodega_funcion1.resaltarRestaurarDivMensaje(true,producto_bodega_control.strAuxiliarMensajeAlert,producto_bodega_control.strAuxiliarCssMensaje);
			
		if(producto_bodega_funcion1.esPaginaForm()==true) {
			window.opener.producto_bodega_funcion1.resaltarRestaurarDivMensaje(true,producto_bodega_control.strAuxiliarMensajeAlert,producto_bodega_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(producto_bodega_control) {
		eval(producto_bodega_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(producto_bodega_control, mostrar) {
		
		if(mostrar==true) {
			producto_bodega_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				producto_bodega_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			producto_bodega_funcion1.mostrarDivMensaje(true,producto_bodega_control.strAuxiliarMensaje,producto_bodega_control.strAuxiliarCssMensaje);
		
		} else {
			producto_bodega_funcion1.mostrarDivMensaje(false,producto_bodega_control.strAuxiliarMensaje,producto_bodega_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(producto_bodega_control) {
	
		funcionGeneral.printWebPartPage("producto_bodega",producto_bodega_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarproducto_bodegasAjaxWebPart").html(producto_bodega_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("producto_bodega",jQuery("#divTablaDatosReporteAuxiliarproducto_bodegasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(producto_bodega_control) {
		this.producto_bodega_controlInicial=producto_bodega_control;
			
		if(producto_bodega_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(producto_bodega_control.strStyleDivArbol,producto_bodega_control.strStyleDivContent
																,producto_bodega_control.strStyleDivOpcionesBanner,producto_bodega_control.strStyleDivExpandirColapsar
																,producto_bodega_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=producto_bodega_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",producto_bodega_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(producto_bodega_control) {
		jQuery("#divTablaDatosproducto_bodegasAjaxWebPart").html(producto_bodega_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosproducto_bodegas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(producto_bodega_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosproducto_bodegas=jQuery("#tblTablaDatosproducto_bodegas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("producto_bodega",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',producto_bodega_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			producto_bodega_webcontrol1.registrarControlesTableEdition(producto_bodega_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		producto_bodega_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(producto_bodega_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(producto_bodega_control.producto_bodegaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(producto_bodega_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(producto_bodega_control) {
		this.actualizarCssBotonesPagina(producto_bodega_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(producto_bodega_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(producto_bodega_control.tiposReportes,producto_bodega_control.tiposReporte
															 	,producto_bodega_control.tiposPaginacion,producto_bodega_control.tiposAcciones
																,producto_bodega_control.tiposColumnasSelect,producto_bodega_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(producto_bodega_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(producto_bodega_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(producto_bodega_control);			
	}
	
	actualizarPaginaAreaBusquedas(producto_bodega_control) {
		jQuery("#divBusquedaproducto_bodegaAjaxWebPart").css("display",producto_bodega_control.strPermisoBusqueda);
		jQuery("#trproducto_bodegaCabeceraBusquedas").css("display",producto_bodega_control.strPermisoBusqueda);
		jQuery("#trBusquedaproducto_bodega").css("display",producto_bodega_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(producto_bodega_control.htmlTablaOrderBy!=null
			&& producto_bodega_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByproducto_bodegaAjaxWebPart").html(producto_bodega_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//producto_bodega_webcontrol1.registrarOrderByActions();
			
		}
			
		if(producto_bodega_control.htmlTablaOrderByRel!=null
			&& producto_bodega_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelproducto_bodegaAjaxWebPart").html(producto_bodega_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(producto_bodega_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaproducto_bodegaAjaxWebPart").css("display","none");
			jQuery("#trproducto_bodegaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaproducto_bodega").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(producto_bodega_control) {
		jQuery("#tdproducto_bodegaNuevo").css("display",producto_bodega_control.strPermisoNuevo);
		jQuery("#trproducto_bodegaElementos").css("display",producto_bodega_control.strVisibleTablaElementos);
		jQuery("#trproducto_bodegaAcciones").css("display",producto_bodega_control.strVisibleTablaAcciones);
		jQuery("#trproducto_bodegaParametrosAcciones").css("display",producto_bodega_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(producto_bodega_control) {
	
		this.actualizarCssBotonesMantenimiento(producto_bodega_control);
				
		if(producto_bodega_control.producto_bodegaActual!=null) {//form
			
			this.actualizarCamposFormulario(producto_bodega_control);			
		}
						
		this.actualizarSpanMensajesCampos(producto_bodega_control);
	}
	
	actualizarPaginaUsuarioInvitado(producto_bodega_control) {
	
		var indexPosition=producto_bodega_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=producto_bodega_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(producto_bodega_control) {
		jQuery("#divResumenproducto_bodegaActualAjaxWebPart").html(producto_bodega_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(producto_bodega_control) {
		jQuery("#divAccionesRelacionesproducto_bodegaAjaxWebPart").html(producto_bodega_control.htmlTablaAccionesRelaciones);
			
		producto_bodega_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(producto_bodega_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(producto_bodega_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(producto_bodega_control) {
		
		if(producto_bodega_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_bodega_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",producto_bodega_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+producto_bodega_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",producto_bodega_control.strVisibleFK_Idbodega);
		}

		if(producto_bodega_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_bodega_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",producto_bodega_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+producto_bodega_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",producto_bodega_control.strVisibleFK_Idproducto);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionproducto_bodega();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("producto_bodega",id,"inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);		
	}
	
	

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		producto_bodega_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto_bodega","bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		producto_bodega_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto_bodega","producto","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(producto_bodega_control) {
	
		jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id").val(producto_bodega_control.producto_bodegaActual.id);
		jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-version_row").val(producto_bodega_control.producto_bodegaActual.versionRow);
		
		if(producto_bodega_control.producto_bodegaActual.id_bodega!=null && producto_bodega_control.producto_bodegaActual.id_bodega>-1){
			if(jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").val() != producto_bodega_control.producto_bodegaActual.id_bodega) {
				jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").val(producto_bodega_control.producto_bodegaActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_bodega_control.producto_bodegaActual.id_producto!=null && producto_bodega_control.producto_bodegaActual.id_producto>-1){
			if(jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").val() != producto_bodega_control.producto_bodegaActual.id_producto) {
				jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").val(producto_bodega_control.producto_bodegaActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-cantidad").val(producto_bodega_control.producto_bodegaActual.cantidad);
		jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-ubicacion").val(producto_bodega_control.producto_bodegaActual.ubicacion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+producto_bodega_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("producto_bodega","inventario","","form_producto_bodega",formulario,"","",paraEventoTabla,idFilaTabla,producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
	}
	
	cargarCombosFK(producto_bodega_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(producto_bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",producto_bodega_control.strRecargarFkTipos,",")) { 
				producto_bodega_webcontrol1.cargarCombosbodegasFK(producto_bodega_control);
			}

			if(producto_bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",producto_bodega_control.strRecargarFkTipos,",")) { 
				producto_bodega_webcontrol1.cargarCombosproductosFK(producto_bodega_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(producto_bodega_control.strRecargarFkTiposNinguno!=null && producto_bodega_control.strRecargarFkTiposNinguno!='NINGUNO' && producto_bodega_control.strRecargarFkTiposNinguno!='') {
			
				if(producto_bodega_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",producto_bodega_control.strRecargarFkTiposNinguno,",")) { 
					producto_bodega_webcontrol1.cargarCombosbodegasFK(producto_bodega_control);
				}

				if(producto_bodega_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",producto_bodega_control.strRecargarFkTiposNinguno,",")) { 
					producto_bodega_webcontrol1.cargarCombosproductosFK(producto_bodega_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(producto_bodega_control) {
		jQuery("#spanstrMensajeid").text(producto_bodega_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(producto_bodega_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_bodega").text(producto_bodega_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(producto_bodega_control.strMensajeid_producto);		
		jQuery("#spanstrMensajecantidad").text(producto_bodega_control.strMensajecantidad);		
		jQuery("#spanstrMensajeubicacion").text(producto_bodega_control.strMensajeubicacion);		
	}
	
	actualizarCssBotonesMantenimiento(producto_bodega_control) {
		jQuery("#tdbtnNuevoproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoproducto_bodega").css("display",producto_bodega_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarproducto_bodega").css("display",producto_bodega_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarproducto_bodega").css("display",producto_bodega_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosproducto_bodega").css("display",producto_bodega_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablabodegaFK(producto_bodega_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_bodega_funcion1,producto_bodega_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(producto_bodega_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_bodega_funcion1,producto_bodega_control.productosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(producto_bodega_control) {
		var i=0;
		
		i=producto_bodega_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(producto_bodega_control.producto_bodegaActual.id);
		jQuery("#t-version_row_"+i+"").val(producto_bodega_control.producto_bodegaActual.versionRow);
		
		if(producto_bodega_control.producto_bodegaActual.id_bodega!=null && producto_bodega_control.producto_bodegaActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != producto_bodega_control.producto_bodegaActual.id_bodega) {
				jQuery("#t-cel_"+i+"_2").val(producto_bodega_control.producto_bodegaActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_bodega_control.producto_bodegaActual.id_producto!=null && producto_bodega_control.producto_bodegaActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != producto_bodega_control.producto_bodegaActual.id_producto) {
				jQuery("#t-cel_"+i+"_3").val(producto_bodega_control.producto_bodegaActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(producto_bodega_control.producto_bodegaActual.cantidad);
		jQuery("#t-cel_"+i+"_5").val(producto_bodega_control.producto_bodegaActual.ubicacion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(producto_bodega_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(producto_bodega_control) {
		producto_bodega_funcion1.registrarControlesTableValidacionEdition(producto_bodega_control,producto_bodega_webcontrol1,producto_bodega_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodegaConstante,strParametros);
		
		//producto_bodega_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosbodegasFK(producto_bodega_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega",producto_bodega_control.bodegasFK);

		if(producto_bodega_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_bodega_control.idFilaTablaActual+"_2",producto_bodega_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",producto_bodega_control.bodegasFK);

	};

	cargarCombosproductosFK(producto_bodega_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto",producto_bodega_control.productosFK);

		if(producto_bodega_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_bodega_control.idFilaTablaActual+"_3",producto_bodega_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",producto_bodega_control.productosFK);

	};

	
	
	registrarComboActionChangeCombosbodegasFK(producto_bodega_control) {

	};

	registrarComboActionChangeCombosproductosFK(producto_bodega_control) {

	};

	
	
	setDefectoValorCombosbodegasFK(producto_bodega_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_bodega_control.idbodegaDefaultFK>-1 && jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").val() != producto_bodega_control.idbodegaDefaultFK) {
				jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").val(producto_bodega_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(producto_bodega_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(producto_bodega_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_bodega_control.idproductoDefaultFK>-1 && jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").val() != producto_bodega_control.idproductoDefaultFK) {
				jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").val(producto_bodega_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(producto_bodega_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//producto_bodega_control
		
	
	}
	
	onLoadCombosDefectoFK(producto_bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(producto_bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",producto_bodega_control.strRecargarFkTipos,",")) { 
				producto_bodega_webcontrol1.setDefectoValorCombosbodegasFK(producto_bodega_control);
			}

			if(producto_bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",producto_bodega_control.strRecargarFkTipos,",")) { 
				producto_bodega_webcontrol1.setDefectoValorCombosproductosFK(producto_bodega_control);
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
	onLoadCombosEventosFK(producto_bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(producto_bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",producto_bodega_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_bodega_webcontrol1.registrarComboActionChangeCombosbodegasFK(producto_bodega_control);
			//}

			//if(producto_bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",producto_bodega_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_bodega_webcontrol1.registrarComboActionChangeCombosproductosFK(producto_bodega_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(producto_bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(producto_bodega_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("producto_bodega");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("producto_bodega");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(producto_bodega_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);			
			
			if(producto_bodega_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,"producto_bodega");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				producto_bodega_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				producto_bodega_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto_bodega","FK_Idbodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto_bodega","FK_Idproducto","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			producto_bodega_funcion1.validarFormularioJQuery(producto_bodega_constante1);
			
			if(producto_bodega_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(producto_bodega_control) {
		
		jQuery("#divBusquedaproducto_bodegaAjaxWebPart").css("display",producto_bodega_control.strPermisoBusqueda);
		jQuery("#trproducto_bodegaCabeceraBusquedas").css("display",producto_bodega_control.strPermisoBusqueda);
		jQuery("#trBusquedaproducto_bodega").css("display",producto_bodega_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteproducto_bodega").css("display",producto_bodega_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosproducto_bodega").attr("style",producto_bodega_control.strPermisoMostrarTodos);
		
		if(producto_bodega_control.strPermisoNuevo!=null) {
			jQuery("#tdproducto_bodegaNuevo").css("display",producto_bodega_control.strPermisoNuevo);
			jQuery("#tdproducto_bodegaNuevoToolBar").css("display",producto_bodega_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdproducto_bodegaDuplicar").css("display",producto_bodega_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdproducto_bodegaDuplicarToolBar").css("display",producto_bodega_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdproducto_bodegaNuevoGuardarCambios").css("display",producto_bodega_control.strPermisoNuevo);
			jQuery("#tdproducto_bodegaNuevoGuardarCambiosToolBar").css("display",producto_bodega_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(producto_bodega_control.strPermisoActualizar!=null) {
			jQuery("#tdproducto_bodegaActualizarToolBar").css("display",producto_bodega_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproducto_bodegaCopiar").css("display",producto_bodega_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproducto_bodegaCopiarToolBar").css("display",producto_bodega_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproducto_bodegaConEditar").css("display",producto_bodega_control.strPermisoActualizar);
		}
		
		jQuery("#tdproducto_bodegaEliminarToolBar").css("display",producto_bodega_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdproducto_bodegaGuardarCambios").css("display",producto_bodega_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdproducto_bodegaGuardarCambiosToolBar").css("display",producto_bodega_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trproducto_bodegaElementos").css("display",producto_bodega_control.strVisibleTablaElementos);
		
		jQuery("#trproducto_bodegaAcciones").css("display",producto_bodega_control.strVisibleTablaAcciones);
		jQuery("#trproducto_bodegaParametrosAcciones").css("display",producto_bodega_control.strVisibleTablaAcciones);
			
		jQuery("#tdproducto_bodegaCerrarPagina").css("display",producto_bodega_control.strPermisoPopup);		
		jQuery("#tdproducto_bodegaCerrarPaginaToolBar").css("display",producto_bodega_control.strPermisoPopup);
		//jQuery("#trproducto_bodegaAccionesRelaciones").css("display",producto_bodega_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		producto_bodega_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		producto_bodega_webcontrol1.registrarEventosControles();
		
		if(producto_bodega_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(producto_bodega_constante1.STR_ES_RELACIONADO=="false") {
			producto_bodega_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(producto_bodega_constante1.STR_ES_RELACIONES=="true") {
			if(producto_bodega_constante1.BIT_ES_PAGINA_FORM==true) {
				producto_bodega_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(producto_bodega_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(producto_bodega_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				producto_bodega_webcontrol1.onLoad();
				
			} else {
				if(producto_bodega_constante1.BIT_ES_PAGINA_FORM==true) {
					if(producto_bodega_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
						//producto_bodega_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(producto_bodega_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(producto_bodega_constante1.BIG_ID_ACTUAL,"producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
						//producto_bodega_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			producto_bodega_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var producto_bodega_webcontrol1=new producto_bodega_webcontrol();

if(producto_bodega_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = producto_bodega_webcontrol1.onLoadWindow; 
}

//</script>