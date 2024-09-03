//<script type="text/javascript" language="javascript">



//var categoria_productoJQueryPaginaWebInteraccion= function (categoria_producto_control) {
//this.,this.,this.

class categoria_producto_webcontrol extends categoria_producto_webcontrol_add {
	
	categoria_producto_control=null;
	categoria_producto_controlInicial=null;
	categoria_producto_controlAuxiliar=null;
		
	//if(categoria_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(categoria_producto_control) {
		super();
		
		this.categoria_producto_control=categoria_producto_control;
	}
		
	actualizarVariablesPagina(categoria_producto_control) {
		
		if(categoria_producto_control.action=="index" || categoria_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(categoria_producto_control);
			
		} else if(categoria_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(categoria_producto_control);
			
		} else if(categoria_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(categoria_producto_control);
			
		} else if(categoria_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(categoria_producto_control);		
		
		} else if(categoria_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(categoria_producto_control);		
		
		} else if(categoria_producto_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_producto_control);		
		
		} else if(categoria_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_producto_control);		
		}
		else if(categoria_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_producto_control);		
		}
		else if(categoria_producto_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(categoria_producto_control);		
		}
		else if(categoria_producto_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_producto_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(categoria_producto_control.action + " Revisar Manejo");
			
			if(categoria_producto_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(categoria_producto_control);
				
				return;
			}
			
			//if(categoria_producto_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(categoria_producto_control);
			//}
			
			if(categoria_producto_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(categoria_producto_control);
			}
			
			if(categoria_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_producto_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(categoria_producto_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(categoria_producto_control, false);			
			}
			
			if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(categoria_producto_control);	
			}
			
			if(categoria_producto_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(categoria_producto_control);
			}
			
			if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(categoria_producto_control);
			}
			
			if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(categoria_producto_control);
			}
			
			if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(categoria_producto_control);	
			}
			
			if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
			}
			
			if(categoria_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(categoria_producto_control);
			}
			
			
			if(categoria_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(categoria_producto_control);			
			}
			
			if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(categoria_producto_control);
			}
			
			
			if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(categoria_producto_control);
			}
			
			if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(categoria_producto_control);
			}				
			
			if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_producto_control);
			}
			
			if(categoria_producto_control.usuarioActual!=null && categoria_producto_control.usuarioActual.field_strUserName!=null &&
			categoria_producto_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(categoria_producto_control);			
			}
		}
		
		
		if(categoria_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(categoria_producto_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(categoria_producto_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_producto_control);
		this.actualizarPaginaTablaDatos(categoria_producto_control);
		this.actualizarPaginaCargaGeneralControles(categoria_producto_control);
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_producto_control);
		this.actualizarPaginaAreaBusquedas(categoria_producto_control);
		this.actualizarPaginaCargaCombosFK(categoria_producto_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(categoria_producto_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_producto_control);
		this.actualizarPaginaTablaDatos(categoria_producto_control);
		this.actualizarPaginaCargaGeneralControles(categoria_producto_control);
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_producto_control);
		this.actualizarPaginaAreaBusquedas(categoria_producto_control);
		this.actualizarPaginaCargaCombosFK(categoria_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(categoria_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_producto_control);		
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(categoria_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_producto_control);		
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(categoria_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_producto_control);		
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);		
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);		
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);		
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(categoria_producto_control) {
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(categoria_producto_control) {
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_producto_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_producto_control);
		this.actualizarPaginaCargaCombosFK(categoria_producto_control);
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(categoria_producto_control) {
		this.actualizarPaginaAbrirLink(categoria_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);				
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);
		this.actualizarPaginaFormulario(categoria_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);
		this.actualizarPaginaFormulario(categoria_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(categoria_producto_control) {
		this.actualizarPaginaFormulario(categoria_producto_control);
		this.onLoadCombosDefectoFK(categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);
		this.actualizarPaginaFormulario(categoria_producto_control);
		this.onLoadCombosDefectoFK(categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_producto_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_producto_control);
		this.actualizarPaginaCargaCombosFK(categoria_producto_control);
		this.actualizarPaginaFormulario(categoria_producto_control);
		this.onLoadCombosDefectoFK(categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(categoria_producto_control) {
		this.actualizarPaginaAbrirLink(categoria_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(categoria_producto_control) {
		this.actualizarPaginaImprimir(categoria_producto_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(categoria_producto_control) {
		this.actualizarPaginaImprimir(categoria_producto_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_producto_control) {
		//FORMULARIO
		if(categoria_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_producto_control);
			this.actualizarPaginaFormularioAdd(categoria_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		//COMBOS FK
		if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_producto_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(categoria_producto_control) {
		//FORMULARIO
		if(categoria_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);	
		//COMBOS FK
		if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_producto_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(categoria_producto_control) {
		this.actualizarPaginaTablaDatos(categoria_producto_control);
		this.actualizarPaginaFormulario(categoria_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(categoria_producto_control) {
		//FORMULARIO
		if(categoria_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_producto_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(categoria_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);	
		//COMBOS FK
		if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_producto_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_producto_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control) {
		if(categoria_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(categoria_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(categoria_producto_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(categoria_producto_control) {
		if(categoria_producto_funcion1.esPaginaForm()==true) {
			window.opener.categoria_producto_webcontrol1.actualizarPaginaTablaDatos(categoria_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(categoria_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(categoria_producto_control) {
		categoria_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(categoria_producto_control.strAuxiliarUrlPagina);
				
		categoria_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(categoria_producto_control.strAuxiliarTipo,categoria_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(categoria_producto_control) {
		categoria_producto_funcion1.resaltarRestaurarDivMensaje(true,categoria_producto_control.strAuxiliarMensajeAlert,categoria_producto_control.strAuxiliarCssMensaje);
			
		if(categoria_producto_funcion1.esPaginaForm()==true) {
			window.opener.categoria_producto_funcion1.resaltarRestaurarDivMensaje(true,categoria_producto_control.strAuxiliarMensajeAlert,categoria_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(categoria_producto_control) {
		eval(categoria_producto_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(categoria_producto_control, mostrar) {
		
		if(mostrar==true) {
			categoria_producto_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				categoria_producto_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			categoria_producto_funcion1.mostrarDivMensaje(true,categoria_producto_control.strAuxiliarMensaje,categoria_producto_control.strAuxiliarCssMensaje);
		
		} else {
			categoria_producto_funcion1.mostrarDivMensaje(false,categoria_producto_control.strAuxiliarMensaje,categoria_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(categoria_producto_control) {
	
		funcionGeneral.printWebPartPage("categoria_producto",categoria_producto_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcategoria_productosAjaxWebPart").html(categoria_producto_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("categoria_producto",jQuery("#divTablaDatosReporteAuxiliarcategoria_productosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(categoria_producto_control) {
		this.categoria_producto_controlInicial=categoria_producto_control;
			
		if(categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(categoria_producto_control.strStyleDivArbol,categoria_producto_control.strStyleDivContent
																,categoria_producto_control.strStyleDivOpcionesBanner,categoria_producto_control.strStyleDivExpandirColapsar
																,categoria_producto_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=categoria_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",categoria_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(categoria_producto_control) {
		jQuery("#divTablaDatoscategoria_productosAjaxWebPart").html(categoria_producto_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscategoria_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscategoria_productos=jQuery("#tblTablaDatoscategoria_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("categoria_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',categoria_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			categoria_producto_webcontrol1.registrarControlesTableEdition(categoria_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		categoria_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(categoria_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(categoria_producto_control.categoria_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(categoria_producto_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(categoria_producto_control) {
		this.actualizarCssBotonesPagina(categoria_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(categoria_producto_control.tiposReportes,categoria_producto_control.tiposReporte
															 	,categoria_producto_control.tiposPaginacion,categoria_producto_control.tiposAcciones
																,categoria_producto_control.tiposColumnasSelect,categoria_producto_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(categoria_producto_control.tiposRelaciones,categoria_producto_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(categoria_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(categoria_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(categoria_producto_control);			
	}
	
	actualizarPaginaAreaBusquedas(categoria_producto_control) {
		jQuery("#divBusquedacategoria_productoAjaxWebPart").css("display",categoria_producto_control.strPermisoBusqueda);
		jQuery("#trcategoria_productoCabeceraBusquedas").css("display",categoria_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedacategoria_producto").css("display",categoria_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(categoria_producto_control.htmlTablaOrderBy!=null
			&& categoria_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycategoria_productoAjaxWebPart").html(categoria_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//categoria_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(categoria_producto_control.htmlTablaOrderByRel!=null
			&& categoria_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcategoria_productoAjaxWebPart").html(categoria_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(categoria_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacategoria_productoAjaxWebPart").css("display","none");
			jQuery("#trcategoria_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacategoria_producto").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(categoria_producto_control) {
		jQuery("#tdcategoria_productoNuevo").css("display",categoria_producto_control.strPermisoNuevo);
		jQuery("#trcategoria_productoElementos").css("display",categoria_producto_control.strVisibleTablaElementos);
		jQuery("#trcategoria_productoAcciones").css("display",categoria_producto_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_productoParametrosAcciones").css("display",categoria_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(categoria_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(categoria_producto_control);
				
		if(categoria_producto_control.categoria_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(categoria_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(categoria_producto_control);
	}
	
	actualizarPaginaUsuarioInvitado(categoria_producto_control) {
	
		var indexPosition=categoria_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=categoria_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(categoria_producto_control) {
		jQuery("#divResumencategoria_productoActualAjaxWebPart").html(categoria_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_producto_control) {
		jQuery("#divAccionesRelacionescategoria_productoAjaxWebPart").html(categoria_producto_control.htmlTablaAccionesRelaciones);
			
		categoria_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(categoria_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(categoria_producto_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(categoria_producto_control) {
		
		if(categoria_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+categoria_producto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",categoria_producto_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+categoria_producto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",categoria_producto_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncategoria_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("categoria_producto",id,"inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		categoria_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("categoria_producto","empresa","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(categoria_producto_control) {
	
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id").val(categoria_producto_control.categoria_productoActual.id);
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-version_row").val(categoria_producto_control.categoria_productoActual.versionRow);
		
		if(categoria_producto_control.categoria_productoActual.id_empresa!=null && categoria_producto_control.categoria_productoActual.id_empresa>-1){
			if(jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val() != categoria_producto_control.categoria_productoActual.id_empresa) {
				jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val(categoria_producto_control.categoria_productoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-codigo").val(categoria_producto_control.categoria_productoActual.codigo);
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-nombre").val(categoria_producto_control.categoria_productoActual.nombre);
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-predeterminado").prop('checked',categoria_producto_control.categoria_productoActual.predeterminado);
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-nro_productos").val(categoria_producto_control.categoria_productoActual.nro_productos);
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-imagen").val(categoria_producto_control.categoria_productoActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+categoria_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("categoria_producto","inventario","","form_categoria_producto",formulario,"","",paraEventoTabla,idFilaTabla,categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
	}
	
	cargarCombosFK(categoria_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",categoria_producto_control.strRecargarFkTipos,",")) { 
				categoria_producto_webcontrol1.cargarCombosempresasFK(categoria_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(categoria_producto_control.strRecargarFkTiposNinguno!=null && categoria_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && categoria_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(categoria_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",categoria_producto_control.strRecargarFkTiposNinguno,",")) { 
					categoria_producto_webcontrol1.cargarCombosempresasFK(categoria_producto_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(categoria_producto_control) {
		jQuery("#spanstrMensajeid").text(categoria_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(categoria_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(categoria_producto_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(categoria_producto_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(categoria_producto_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(categoria_producto_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajenro_productos").text(categoria_producto_control.strMensajenro_productos);		
		jQuery("#spanstrMensajeimagen").text(categoria_producto_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(categoria_producto_control) {
		jQuery("#tdbtnNuevocategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocategoria_producto").css("display",categoria_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcategoria_producto").css("display",categoria_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcategoria_producto").css("display",categoria_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscategoria_producto").css("display",categoria_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionsub_categoria_producto").click(function(){

			var idActual=jQuery(this).attr("idactualcategoria_producto");

			categoria_producto_webcontrol1.registrarSesionParasub_categoria_productos(idActual);
		});
		jQuery("#imgdivrelacionproducto").click(function(){

			var idActual=jQuery(this).attr("idactualcategoria_producto");

			categoria_producto_webcontrol1.registrarSesionParaproductos(idActual);
		});
		jQuery("#imgdivrelacionlista_producto").click(function(){

			var idActual=jQuery(this).attr("idactualcategoria_producto");

			categoria_producto_webcontrol1.registrarSesionParalista_productoes(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(categoria_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,categoria_producto_funcion1,categoria_producto_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(categoria_producto_control) {
		var i=0;
		
		i=categoria_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(categoria_producto_control.categoria_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(categoria_producto_control.categoria_productoActual.versionRow);
		
		if(categoria_producto_control.categoria_productoActual.id_empresa!=null && categoria_producto_control.categoria_productoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != categoria_producto_control.categoria_productoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(categoria_producto_control.categoria_productoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(categoria_producto_control.categoria_productoActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(categoria_producto_control.categoria_productoActual.nombre);
		jQuery("#t-cel_"+i+"_5").prop('checked',categoria_producto_control.categoria_productoActual.predeterminado);
		jQuery("#t-cel_"+i+"_6").val(categoria_producto_control.categoria_productoActual.nro_productos);
		jQuery("#t-cel_"+i+"_7").val(categoria_producto_control.categoria_productoActual.imagen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(categoria_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionsub_categoria_producto").click(function(){
		jQuery("#tblTablaDatoscategoria_productos").on("click",".imgrelacionsub_categoria_producto", function () {

			var idActual=jQuery(this).attr("idactualcategoria_producto");

			categoria_producto_webcontrol1.registrarSesionParasub_categoria_productos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto").click(function(){
		jQuery("#tblTablaDatoscategoria_productos").on("click",".imgrelacionproducto", function () {

			var idActual=jQuery(this).attr("idactualcategoria_producto");

			categoria_producto_webcontrol1.registrarSesionParaproductos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_producto").click(function(){
		jQuery("#tblTablaDatoscategoria_productos").on("click",".imgrelacionlista_producto", function () {

			var idActual=jQuery(this).attr("idactualcategoria_producto");

			categoria_producto_webcontrol1.registrarSesionParalista_productoes(idActual);
		});				
	}
		
	

	registrarSesionParasub_categoria_productos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"categoria_producto","sub_categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,"s","");
	}

	registrarSesionParaproductos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"categoria_producto","producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,"s","");
	}

	registrarSesionParalista_productoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"categoria_producto","lista_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(categoria_producto_control) {
		categoria_producto_funcion1.registrarControlesTableValidacionEdition(categoria_producto_control,categoria_producto_webcontrol1,categoria_producto_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_productoConstante,strParametros);
		
		//categoria_producto_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(categoria_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa",categoria_producto_control.empresasFK);

		if(categoria_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+categoria_producto_control.idFilaTablaActual+"_2",categoria_producto_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(categoria_producto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(categoria_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(categoria_producto_control.idempresaDefaultFK>-1 && jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val() != categoria_producto_control.idempresaDefaultFK) {
				jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val(categoria_producto_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//categoria_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(categoria_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",categoria_producto_control.strRecargarFkTipos,",")) { 
				categoria_producto_webcontrol1.setDefectoValorCombosempresasFK(categoria_producto_control);
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
	onLoadCombosEventosFK(categoria_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",categoria_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				categoria_producto_webcontrol1.registrarComboActionChangeCombosempresasFK(categoria_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(categoria_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(categoria_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("categoria_producto");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("categoria_producto");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(categoria_producto_funcion1,categoria_producto_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(categoria_producto_funcion1,categoria_producto_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(categoria_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);			
			
			if(categoria_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,"categoria_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				categoria_producto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("categoria_producto","FK_Idempresa","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("categoria_producto");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			categoria_producto_funcion1.validarFormularioJQuery(categoria_producto_constante1);
			
			if(categoria_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(categoria_producto_control) {
		
		jQuery("#divBusquedacategoria_productoAjaxWebPart").css("display",categoria_producto_control.strPermisoBusqueda);
		jQuery("#trcategoria_productoCabeceraBusquedas").css("display",categoria_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedacategoria_producto").css("display",categoria_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecategoria_producto").css("display",categoria_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscategoria_producto").attr("style",categoria_producto_control.strPermisoMostrarTodos);
		
		if(categoria_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdcategoria_productoNuevo").css("display",categoria_producto_control.strPermisoNuevo);
			jQuery("#tdcategoria_productoNuevoToolBar").css("display",categoria_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcategoria_productoDuplicar").css("display",categoria_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcategoria_productoDuplicarToolBar").css("display",categoria_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcategoria_productoNuevoGuardarCambios").css("display",categoria_producto_control.strPermisoNuevo);
			jQuery("#tdcategoria_productoNuevoGuardarCambiosToolBar").css("display",categoria_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(categoria_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdcategoria_productoActualizarToolBar").css("display",categoria_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_productoCopiar").css("display",categoria_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_productoCopiarToolBar").css("display",categoria_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_productoConEditar").css("display",categoria_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdcategoria_productoEliminarToolBar").css("display",categoria_producto_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcategoria_productoGuardarCambios").css("display",categoria_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcategoria_productoGuardarCambiosToolBar").css("display",categoria_producto_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcategoria_productoElementos").css("display",categoria_producto_control.strVisibleTablaElementos);
		
		jQuery("#trcategoria_productoAcciones").css("display",categoria_producto_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_productoParametrosAcciones").css("display",categoria_producto_control.strVisibleTablaAcciones);
			
		jQuery("#tdcategoria_productoCerrarPagina").css("display",categoria_producto_control.strPermisoPopup);		
		jQuery("#tdcategoria_productoCerrarPaginaToolBar").css("display",categoria_producto_control.strPermisoPopup);
		//jQuery("#trcategoria_productoAccionesRelaciones").css("display",categoria_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		categoria_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		categoria_producto_webcontrol1.registrarEventosControles();
		
		if(categoria_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
			categoria_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(categoria_producto_constante1.STR_ES_RELACIONES=="true") {
			if(categoria_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(categoria_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(categoria_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				categoria_producto_webcontrol1.onLoad();
				
			} else {
				if(categoria_producto_constante1.BIT_ES_PAGINA_FORM==true) {
					if(categoria_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
						//categoria_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(categoria_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(categoria_producto_constante1.BIG_ID_ACTUAL,"categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
						//categoria_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			categoria_producto_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var categoria_producto_webcontrol1=new categoria_producto_webcontrol();

if(categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = categoria_producto_webcontrol1.onLoadWindow; 
}

//</script>