//<script type="text/javascript" language="javascript">



//var costo_productoJQueryPaginaWebInteraccion= function (costo_producto_control) {
//this.,this.,this.

class costo_producto_webcontrol extends costo_producto_webcontrol_add {
	
	costo_producto_control=null;
	costo_producto_controlInicial=null;
	costo_producto_controlAuxiliar=null;
		
	//if(costo_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(costo_producto_control) {
		super();
		
		this.costo_producto_control=costo_producto_control;
	}
		
	actualizarVariablesPagina(costo_producto_control) {
		
		if(costo_producto_control.action=="index" || costo_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(costo_producto_control);
			
		} else if(costo_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(costo_producto_control);
		
		} else if(costo_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(costo_producto_control);
		
		} else if(costo_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(costo_producto_control);
		
		} else if(costo_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(costo_producto_control);
			
		} else if(costo_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(costo_producto_control);
			
		} else if(costo_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(costo_producto_control);
		
		} else if(costo_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(costo_producto_control);
		
		} else if(costo_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(costo_producto_control);
		
		} else if(costo_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(costo_producto_control);
		
		} else if(costo_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(costo_producto_control);
		
		} else if(costo_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(costo_producto_control);
		
		} else if(costo_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(costo_producto_control);
		
		} else if(costo_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(costo_producto_control);
		
		} else if(costo_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(costo_producto_control);
		
		} else if(costo_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(costo_producto_control);
		
		} else if(costo_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(costo_producto_control);
		
		} else if(costo_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(costo_producto_control);
		
		} else if(costo_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(costo_producto_control);
		
		} else if(costo_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(costo_producto_control);
		
		} else if(costo_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(costo_producto_control);
		
		} else if(costo_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(costo_producto_control);
		
		} else if(costo_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(costo_producto_control);
		
		} else if(costo_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(costo_producto_control);
		
		} else if(costo_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(costo_producto_control);
		
		} else if(costo_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(costo_producto_control);
		
		} else if(costo_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(costo_producto_control);
		
		} else if(costo_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(costo_producto_control);		
		
		} else if(costo_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(costo_producto_control);		
		
		} else if(costo_producto_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(costo_producto_control);		
		
		} else if(costo_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(costo_producto_control);		
		}
		else if(costo_producto_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(costo_producto_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(costo_producto_control.action + " Revisar Manejo");
			
			if(costo_producto_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(costo_producto_control);
				
				return;
			}
			
			//if(costo_producto_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(costo_producto_control);
			//}
			
			if(costo_producto_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(costo_producto_control);
			}
			
			if(costo_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && costo_producto_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(costo_producto_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(costo_producto_control, false);			
			}
			
			if(costo_producto_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(costo_producto_control);	
			}
			
			if(costo_producto_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(costo_producto_control);
			}
			
			if(costo_producto_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(costo_producto_control);
			}
			
			if(costo_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(costo_producto_control);
			}
			
			if(costo_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(costo_producto_control);	
			}
			
			if(costo_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(costo_producto_control);
			}
			
			if(costo_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(costo_producto_control);
			}
			
			
			if(costo_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(costo_producto_control);			
			}
			
			if(costo_producto_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(costo_producto_control);
			}
			
			
			if(costo_producto_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(costo_producto_control);
			}
			
			if(costo_producto_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(costo_producto_control);
			}				
			
			if(costo_producto_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(costo_producto_control);
			}
			
			if(costo_producto_control.usuarioActual!=null && costo_producto_control.usuarioActual.field_strUserName!=null &&
			costo_producto_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(costo_producto_control);			
			}
		}
		
		
		if(costo_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(costo_producto_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(costo_producto_control) {
		
		this.actualizarPaginaCargaGeneral(costo_producto_control);
		this.actualizarPaginaTablaDatos(costo_producto_control);
		this.actualizarPaginaCargaGeneralControles(costo_producto_control);
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(costo_producto_control);
		this.actualizarPaginaAreaBusquedas(costo_producto_control);
		this.actualizarPaginaCargaCombosFK(costo_producto_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(costo_producto_control) {
		
		this.actualizarPaginaCargaGeneral(costo_producto_control);
		this.actualizarPaginaTablaDatos(costo_producto_control);
		this.actualizarPaginaCargaGeneralControles(costo_producto_control);
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(costo_producto_control);
		this.actualizarPaginaAreaBusquedas(costo_producto_control);
		this.actualizarPaginaCargaCombosFK(costo_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(costo_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(costo_producto_control);		
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(costo_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(costo_producto_control);		
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(costo_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(costo_producto_control);		
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);		
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);		
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);		
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(costo_producto_control) {
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(costo_producto_control) {
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(costo_producto_control) {
		this.actualizarPaginaCargaGeneralControles(costo_producto_control);
		this.actualizarPaginaCargaCombosFK(costo_producto_control);
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(costo_producto_control) {
		this.actualizarPaginaAbrirLink(costo_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);				
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);
		this.actualizarPaginaFormulario(costo_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);
		this.actualizarPaginaFormulario(costo_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(costo_producto_control) {
		this.actualizarPaginaFormulario(costo_producto_control);
		this.onLoadCombosDefectoFK(costo_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);
		this.actualizarPaginaFormulario(costo_producto_control);
		this.onLoadCombosDefectoFK(costo_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(costo_producto_control) {
		this.actualizarPaginaCargaGeneralControles(costo_producto_control);
		this.actualizarPaginaCargaCombosFK(costo_producto_control);
		this.actualizarPaginaFormulario(costo_producto_control);
		this.onLoadCombosDefectoFK(costo_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(costo_producto_control) {
		this.actualizarPaginaAbrirLink(costo_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(costo_producto_control) {
		this.actualizarPaginaTablaDatos(costo_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(costo_producto_control) {
		this.actualizarPaginaImprimir(costo_producto_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(costo_producto_control) {
		this.actualizarPaginaImprimir(costo_producto_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(costo_producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(costo_producto_control) {
		//FORMULARIO
		if(costo_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(costo_producto_control);
			this.actualizarPaginaFormularioAdd(costo_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		//COMBOS FK
		if(costo_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(costo_producto_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(costo_producto_control) {
		//FORMULARIO
		if(costo_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(costo_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);	
		//COMBOS FK
		if(costo_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(costo_producto_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(costo_producto_control) {
		//FORMULARIO
		if(costo_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(costo_producto_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(costo_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);	
		//COMBOS FK
		if(costo_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(costo_producto_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(costo_producto_control) {
		if(costo_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && costo_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(costo_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(costo_producto_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(costo_producto_control) {
		if(costo_producto_funcion1.esPaginaForm()==true) {
			window.opener.costo_producto_webcontrol1.actualizarPaginaTablaDatos(costo_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(costo_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(costo_producto_control) {
		costo_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(costo_producto_control.strAuxiliarUrlPagina);
				
		costo_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(costo_producto_control.strAuxiliarTipo,costo_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(costo_producto_control) {
		costo_producto_funcion1.resaltarRestaurarDivMensaje(true,costo_producto_control.strAuxiliarMensajeAlert,costo_producto_control.strAuxiliarCssMensaje);
			
		if(costo_producto_funcion1.esPaginaForm()==true) {
			window.opener.costo_producto_funcion1.resaltarRestaurarDivMensaje(true,costo_producto_control.strAuxiliarMensajeAlert,costo_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(costo_producto_control) {
		eval(costo_producto_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(costo_producto_control, mostrar) {
		
		if(mostrar==true) {
			costo_producto_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				costo_producto_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			costo_producto_funcion1.mostrarDivMensaje(true,costo_producto_control.strAuxiliarMensaje,costo_producto_control.strAuxiliarCssMensaje);
		
		} else {
			costo_producto_funcion1.mostrarDivMensaje(false,costo_producto_control.strAuxiliarMensaje,costo_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(costo_producto_control) {
	
		funcionGeneral.printWebPartPage("costo_producto",costo_producto_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcosto_productosAjaxWebPart").html(costo_producto_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("costo_producto",jQuery("#divTablaDatosReporteAuxiliarcosto_productosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(costo_producto_control) {
		this.costo_producto_controlInicial=costo_producto_control;
			
		if(costo_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(costo_producto_control.strStyleDivArbol,costo_producto_control.strStyleDivContent
																,costo_producto_control.strStyleDivOpcionesBanner,costo_producto_control.strStyleDivExpandirColapsar
																,costo_producto_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=costo_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",costo_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(costo_producto_control) {
		jQuery("#divTablaDatoscosto_productosAjaxWebPart").html(costo_producto_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscosto_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(costo_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscosto_productos=jQuery("#tblTablaDatoscosto_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("costo_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',costo_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			costo_producto_webcontrol1.registrarControlesTableEdition(costo_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		costo_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(costo_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(costo_producto_control.costo_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(costo_producto_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(costo_producto_control) {
		this.actualizarCssBotonesPagina(costo_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(costo_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(costo_producto_control.tiposReportes,costo_producto_control.tiposReporte
															 	,costo_producto_control.tiposPaginacion,costo_producto_control.tiposAcciones
																,costo_producto_control.tiposColumnasSelect,costo_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(costo_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(costo_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(costo_producto_control);			
	}
	
	actualizarPaginaAreaBusquedas(costo_producto_control) {
		jQuery("#divBusquedacosto_productoAjaxWebPart").css("display",costo_producto_control.strPermisoBusqueda);
		jQuery("#trcosto_productoCabeceraBusquedas").css("display",costo_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedacosto_producto").css("display",costo_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(costo_producto_control.htmlTablaOrderBy!=null
			&& costo_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycosto_productoAjaxWebPart").html(costo_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//costo_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(costo_producto_control.htmlTablaOrderByRel!=null
			&& costo_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcosto_productoAjaxWebPart").html(costo_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(costo_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacosto_productoAjaxWebPart").css("display","none");
			jQuery("#trcosto_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacosto_producto").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(costo_producto_control) {
		jQuery("#tdcosto_productoNuevo").css("display",costo_producto_control.strPermisoNuevo);
		jQuery("#trcosto_productoElementos").css("display",costo_producto_control.strVisibleTablaElementos);
		jQuery("#trcosto_productoAcciones").css("display",costo_producto_control.strVisibleTablaAcciones);
		jQuery("#trcosto_productoParametrosAcciones").css("display",costo_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(costo_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(costo_producto_control);
				
		if(costo_producto_control.costo_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(costo_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(costo_producto_control);
	}
	
	actualizarPaginaUsuarioInvitado(costo_producto_control) {
	
		var indexPosition=costo_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=costo_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(costo_producto_control) {
		jQuery("#divResumencosto_productoActualAjaxWebPart").html(costo_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(costo_producto_control) {
		jQuery("#divAccionesRelacionescosto_productoAjaxWebPart").html(costo_producto_control.htmlTablaAccionesRelaciones);
			
		costo_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(costo_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(costo_producto_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(costo_producto_control) {
		
		if(costo_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",costo_producto_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",costo_producto_control.strVisibleFK_Idejercicio);
		}

		if(costo_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",costo_producto_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",costo_producto_control.strVisibleFK_Idempresa);
		}

		if(costo_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idkardex_detalle").attr("style",costo_producto_control.strVisibleFK_Idkardex_detalle);
			jQuery("#tblstrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idkardex_detalle").attr("style",costo_producto_control.strVisibleFK_Idkardex_detalle);
		}

		if(costo_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",costo_producto_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",costo_producto_control.strVisibleFK_Idperiodo);
		}

		if(costo_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",costo_producto_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",costo_producto_control.strVisibleFK_Idproducto);
		}

		if(costo_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",costo_producto_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",costo_producto_control.strVisibleFK_Idsucursal);
		}

		if(costo_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",costo_producto_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+costo_producto_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",costo_producto_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncosto_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("costo_producto",id,"inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		costo_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("costo_producto","empresa","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		costo_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("costo_producto","sucursal","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		costo_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("costo_producto","ejercicio","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		costo_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("costo_producto","periodo","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		costo_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("costo_producto","producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
	}

	abrirBusquedaParakardex_detalle(strNombreCampoBusqueda){//idActual
		costo_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("costo_producto","kardex_detalle","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		costo_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("costo_producto","usuario","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(costo_producto_control) {
	
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id").val(costo_producto_control.costo_productoActual.id);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-version_row").val(costo_producto_control.costo_productoActual.versionRow);
		
		if(costo_producto_control.costo_productoActual.id_empresa!=null && costo_producto_control.costo_productoActual.id_empresa>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").val() != costo_producto_control.costo_productoActual.id_empresa) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").val(costo_producto_control.costo_productoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_sucursal!=null && costo_producto_control.costo_productoActual.id_sucursal>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").val() != costo_producto_control.costo_productoActual.id_sucursal) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").val(costo_producto_control.costo_productoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_ejercicio!=null && costo_producto_control.costo_productoActual.id_ejercicio>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").val() != costo_producto_control.costo_productoActual.id_ejercicio) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").val(costo_producto_control.costo_productoActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_periodo!=null && costo_producto_control.costo_productoActual.id_periodo>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").val() != costo_producto_control.costo_productoActual.id_periodo) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").val(costo_producto_control.costo_productoActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_producto!=null && costo_producto_control.costo_productoActual.id_producto>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").val() != costo_producto_control.costo_productoActual.id_producto) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").val(costo_producto_control.costo_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_kardex_detalle!=null && costo_producto_control.costo_productoActual.id_kardex_detalle>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_kardex_detalle").val() != costo_producto_control.costo_productoActual.id_kardex_detalle) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_kardex_detalle").val(costo_producto_control.costo_productoActual.id_kardex_detalle).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_kardex_detalle").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_kardex_detalle").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_kardex_detalle").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-nro_documento").val(costo_producto_control.costo_productoActual.nro_documento);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-fecha").val(costo_producto_control.costo_productoActual.fecha);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-cantidad").val(costo_producto_control.costo_productoActual.cantidad);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-costo_unitario").val(costo_producto_control.costo_productoActual.costo_unitario);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-costo_total").val(costo_producto_control.costo_productoActual.costo_total);
		
		if(costo_producto_control.costo_productoActual.id_usuario!=null && costo_producto_control.costo_productoActual.id_usuario>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").val() != costo_producto_control.costo_productoActual.id_usuario) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").val(costo_producto_control.costo_productoActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+costo_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("costo_producto","inventario","","form_costo_producto",formulario,"","",paraEventoTabla,idFilaTabla,costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
	}
	
	cargarCombosFK(costo_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombosempresasFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombossucursalsFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombosejerciciosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombosperiodosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombosproductosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex_detalle",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarComboskardex_detallesFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombosusuariosFK(costo_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(costo_producto_control.strRecargarFkTiposNinguno!=null && costo_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && costo_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombosempresasFK(costo_producto_control);
				}

				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombossucursalsFK(costo_producto_control);
				}

				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombosejerciciosFK(costo_producto_control);
				}

				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombosperiodosFK(costo_producto_control);
				}

				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombosproductosFK(costo_producto_control);
				}

				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex_detalle",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarComboskardex_detallesFK(costo_producto_control);
				}

				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombosusuariosFK(costo_producto_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(costo_producto_control) {
		jQuery("#spanstrMensajeid").text(costo_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(costo_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(costo_producto_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(costo_producto_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(costo_producto_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(costo_producto_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_producto").text(costo_producto_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_kardex_detalle").text(costo_producto_control.strMensajeid_kardex_detalle);		
		jQuery("#spanstrMensajenro_documento").text(costo_producto_control.strMensajenro_documento);		
		jQuery("#spanstrMensajefecha").text(costo_producto_control.strMensajefecha);		
		jQuery("#spanstrMensajecantidad").text(costo_producto_control.strMensajecantidad);		
		jQuery("#spanstrMensajecosto_unitario").text(costo_producto_control.strMensajecosto_unitario);		
		jQuery("#spanstrMensajecosto_total").text(costo_producto_control.strMensajecosto_total);		
		jQuery("#spanstrMensajeid_usuario").text(costo_producto_control.strMensajeid_usuario);		
	}
	
	actualizarCssBotonesMantenimiento(costo_producto_control) {
		jQuery("#tdbtnNuevocosto_producto").css("visibility",costo_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocosto_producto").css("display",costo_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcosto_producto").css("visibility",costo_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcosto_producto").css("display",costo_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcosto_producto").css("visibility",costo_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcosto_producto").css("display",costo_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcosto_producto").css("visibility",costo_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscosto_producto").css("visibility",costo_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscosto_producto").css("display",costo_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcosto_producto").css("visibility",costo_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcosto_producto").css("visibility",costo_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcosto_producto").css("visibility",costo_producto_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.periodosFK);
	}

	cargarComboEditarTablaproductoFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.productosFK);
	}

	cargarComboEditarTablakardex_detalleFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.kardex_detallesFK);
	}

	cargarComboEditarTablausuarioFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(costo_producto_control) {
		var i=0;
		
		i=costo_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(costo_producto_control.costo_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(costo_producto_control.costo_productoActual.versionRow);
		
		if(costo_producto_control.costo_productoActual.id_empresa!=null && costo_producto_control.costo_productoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != costo_producto_control.costo_productoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(costo_producto_control.costo_productoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_sucursal!=null && costo_producto_control.costo_productoActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != costo_producto_control.costo_productoActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(costo_producto_control.costo_productoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_ejercicio!=null && costo_producto_control.costo_productoActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != costo_producto_control.costo_productoActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(costo_producto_control.costo_productoActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_periodo!=null && costo_producto_control.costo_productoActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != costo_producto_control.costo_productoActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(costo_producto_control.costo_productoActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_producto!=null && costo_producto_control.costo_productoActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != costo_producto_control.costo_productoActual.id_producto) {
				jQuery("#t-cel_"+i+"_6").val(costo_producto_control.costo_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_kardex_detalle!=null && costo_producto_control.costo_productoActual.id_kardex_detalle>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != costo_producto_control.costo_productoActual.id_kardex_detalle) {
				jQuery("#t-cel_"+i+"_7").val(costo_producto_control.costo_productoActual.id_kardex_detalle).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(costo_producto_control.costo_productoActual.nro_documento);
		jQuery("#t-cel_"+i+"_9").val(costo_producto_control.costo_productoActual.fecha);
		jQuery("#t-cel_"+i+"_10").val(costo_producto_control.costo_productoActual.cantidad);
		jQuery("#t-cel_"+i+"_11").val(costo_producto_control.costo_productoActual.costo_unitario);
		jQuery("#t-cel_"+i+"_12").val(costo_producto_control.costo_productoActual.costo_total);
		
		if(costo_producto_control.costo_productoActual.id_usuario!=null && costo_producto_control.costo_productoActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != costo_producto_control.costo_productoActual.id_usuario) {
				jQuery("#t-cel_"+i+"_13").val(costo_producto_control.costo_productoActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(costo_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(costo_producto_control) {
		costo_producto_funcion1.registrarControlesTableValidacionEdition(costo_producto_control,costo_producto_webcontrol1,costo_producto_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_productoConstante,strParametros);
		
		//costo_producto_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa",costo_producto_control.empresasFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_2",costo_producto_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal",costo_producto_control.sucursalsFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_3",costo_producto_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio",costo_producto_control.ejerciciosFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_4",costo_producto_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo",costo_producto_control.periodosFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_5",costo_producto_control.periodosFK);
		}
	};

	cargarCombosproductosFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto",costo_producto_control.productosFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_6",costo_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",costo_producto_control.productosFK);

	};

	cargarComboskardex_detallesFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_kardex_detalle",costo_producto_control.kardex_detallesFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_7",costo_producto_control.kardex_detallesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idkardex_detalle-cmbid_kardex_detalle",costo_producto_control.kardex_detallesFK);

	};

	cargarCombosusuariosFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario",costo_producto_control.usuariosFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_13",costo_producto_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(costo_producto_control) {

	};

	registrarComboActionChangeCombossucursalsFK(costo_producto_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(costo_producto_control) {

	};

	registrarComboActionChangeCombosperiodosFK(costo_producto_control) {

	};

	registrarComboActionChangeCombosproductosFK(costo_producto_control) {

	};

	registrarComboActionChangeComboskardex_detallesFK(costo_producto_control) {

	};

	registrarComboActionChangeCombosusuariosFK(costo_producto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idempresaDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").val() != costo_producto_control.idempresaDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").val(costo_producto_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idsucursalDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").val() != costo_producto_control.idsucursalDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").val(costo_producto_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idejercicioDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").val() != costo_producto_control.idejercicioDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").val(costo_producto_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idperiodoDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").val() != costo_producto_control.idperiodoDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").val(costo_producto_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").val() != costo_producto_control.idproductoDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").val(costo_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(costo_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardex_detallesFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idkardex_detalleDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_kardex_detalle").val() != costo_producto_control.idkardex_detalleDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_kardex_detalle").val(costo_producto_control.idkardex_detalleDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idkardex_detalle-cmbid_kardex_detalle").val(costo_producto_control.idkardex_detalleDefaultForeignKey).trigger("change");
			if(jQuery("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idkardex_detalle-cmbid_kardex_detalle").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idkardex_detalle-cmbid_kardex_detalle").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idusuarioDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").val() != costo_producto_control.idusuarioDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").val(costo_producto_control.idusuarioDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//costo_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(costo_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(costo_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombosempresasFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombossucursalsFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombosejerciciosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombosperiodosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombosproductosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex_detalle",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorComboskardex_detallesFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombosusuariosFK(costo_producto_control);
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
	onLoadCombosEventosFK(costo_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(costo_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombosempresasFK(costo_producto_control);
			//}

			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombossucursalsFK(costo_producto_control);
			//}

			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombosejerciciosFK(costo_producto_control);
			//}

			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombosperiodosFK(costo_producto_control);
			//}

			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(costo_producto_control);
			//}

			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex_detalle",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeComboskardex_detallesFK(costo_producto_control);
			//}

			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombosusuariosFK(costo_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(costo_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(costo_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(costo_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("costo_producto");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("costo_producto");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(costo_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);			
			
			if(costo_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,"costo_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex_detalle","id_kardex_detalle","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_kardex_detalle_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParakardex_detalle("id_kardex_detalle");
				//alert(jQuery('#form-id_kardex_detalle_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("costo_producto","FK_Idejercicio","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("costo_producto","FK_Idempresa","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("costo_producto","FK_Idkardex_detalle","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("costo_producto","FK_Idperiodo","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("costo_producto","FK_Idproducto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("costo_producto","FK_Idsucursal","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("costo_producto","FK_Idusuario","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			costo_producto_funcion1.validarFormularioJQuery(costo_producto_constante1);
			
			if(costo_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(costo_producto_control) {
		
		jQuery("#divBusquedacosto_productoAjaxWebPart").css("display",costo_producto_control.strPermisoBusqueda);
		jQuery("#trcosto_productoCabeceraBusquedas").css("display",costo_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedacosto_producto").css("display",costo_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecosto_producto").css("display",costo_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscosto_producto").attr("style",costo_producto_control.strPermisoMostrarTodos);
		
		if(costo_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdcosto_productoNuevo").css("display",costo_producto_control.strPermisoNuevo);
			jQuery("#tdcosto_productoNuevoToolBar").css("display",costo_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcosto_productoDuplicar").css("display",costo_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcosto_productoDuplicarToolBar").css("display",costo_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcosto_productoNuevoGuardarCambios").css("display",costo_producto_control.strPermisoNuevo);
			jQuery("#tdcosto_productoNuevoGuardarCambiosToolBar").css("display",costo_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(costo_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdcosto_productoActualizarToolBar").css("display",costo_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcosto_productoCopiar").css("display",costo_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcosto_productoCopiarToolBar").css("display",costo_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcosto_productoConEditar").css("display",costo_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdcosto_productoEliminarToolBar").css("display",costo_producto_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcosto_productoGuardarCambios").css("display",costo_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcosto_productoGuardarCambiosToolBar").css("display",costo_producto_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcosto_productoElementos").css("display",costo_producto_control.strVisibleTablaElementos);
		
		jQuery("#trcosto_productoAcciones").css("display",costo_producto_control.strVisibleTablaAcciones);
		jQuery("#trcosto_productoParametrosAcciones").css("display",costo_producto_control.strVisibleTablaAcciones);
			
		jQuery("#tdcosto_productoCerrarPagina").css("display",costo_producto_control.strPermisoPopup);		
		jQuery("#tdcosto_productoCerrarPaginaToolBar").css("display",costo_producto_control.strPermisoPopup);
		//jQuery("#trcosto_productoAccionesRelaciones").css("display",costo_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		costo_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		costo_producto_webcontrol1.registrarEventosControles();
		
		if(costo_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(costo_producto_constante1.STR_ES_RELACIONADO=="false") {
			costo_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(costo_producto_constante1.STR_ES_RELACIONES=="true") {
			if(costo_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				costo_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(costo_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(costo_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				costo_producto_webcontrol1.onLoad();
				
			} else {
				if(costo_producto_constante1.BIT_ES_PAGINA_FORM==true) {
					if(costo_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
						//costo_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(costo_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(costo_producto_constante1.BIG_ID_ACTUAL,"costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
						//costo_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			costo_producto_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var costo_producto_webcontrol1=new costo_producto_webcontrol();

if(costo_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = costo_producto_webcontrol1.onLoadWindow; 
}

//</script>