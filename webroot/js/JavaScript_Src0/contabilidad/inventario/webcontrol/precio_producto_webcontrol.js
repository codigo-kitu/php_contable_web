//<script type="text/javascript" language="javascript">



//var precio_productoJQueryPaginaWebInteraccion= function (precio_producto_control) {
//this.,this.,this.

class precio_producto_webcontrol extends precio_producto_webcontrol_add {
	
	precio_producto_control=null;
	precio_producto_controlInicial=null;
	precio_producto_controlAuxiliar=null;
		
	//if(precio_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(precio_producto_control) {
		super();
		
		this.precio_producto_control=precio_producto_control;
	}
		
	actualizarVariablesPagina(precio_producto_control) {
		
		if(precio_producto_control.action=="index" || precio_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(precio_producto_control);
			
		} else if(precio_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(precio_producto_control);
		
		} else if(precio_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(precio_producto_control);
		
		} else if(precio_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(precio_producto_control);
		
		} else if(precio_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(precio_producto_control);
			
		} else if(precio_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(precio_producto_control);
			
		} else if(precio_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(precio_producto_control);
		
		} else if(precio_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(precio_producto_control);
		
		} else if(precio_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(precio_producto_control);
		
		} else if(precio_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(precio_producto_control);
		
		} else if(precio_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(precio_producto_control);
		
		} else if(precio_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(precio_producto_control);
		
		} else if(precio_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(precio_producto_control);
		
		} else if(precio_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(precio_producto_control);
		
		} else if(precio_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(precio_producto_control);
		
		} else if(precio_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(precio_producto_control);
		
		} else if(precio_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(precio_producto_control);
		
		} else if(precio_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(precio_producto_control);
		
		} else if(precio_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(precio_producto_control);
		
		} else if(precio_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(precio_producto_control);
		
		} else if(precio_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(precio_producto_control);
		
		} else if(precio_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(precio_producto_control);
		
		} else if(precio_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(precio_producto_control);
		
		} else if(precio_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(precio_producto_control);
		
		} else if(precio_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(precio_producto_control);
		
		} else if(precio_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(precio_producto_control);
		
		} else if(precio_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(precio_producto_control);
		
		} else if(precio_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(precio_producto_control);		
		
		} else if(precio_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(precio_producto_control);		
		
		} else if(precio_producto_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(precio_producto_control);		
		
		} else if(precio_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(precio_producto_control);		
		}
		else if(precio_producto_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(precio_producto_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(precio_producto_control.action + " Revisar Manejo");
			
			if(precio_producto_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(precio_producto_control);
				
				return;
			}
			
			//if(precio_producto_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(precio_producto_control);
			//}
			
			if(precio_producto_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(precio_producto_control);
			}
			
			if(precio_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && precio_producto_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(precio_producto_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(precio_producto_control, false);			
			}
			
			if(precio_producto_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(precio_producto_control);	
			}
			
			if(precio_producto_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(precio_producto_control);
			}
			
			if(precio_producto_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(precio_producto_control);
			}
			
			if(precio_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(precio_producto_control);
			}
			
			if(precio_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(precio_producto_control);	
			}
			
			if(precio_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(precio_producto_control);
			}
			
			if(precio_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(precio_producto_control);
			}
			
			
			if(precio_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(precio_producto_control);			
			}
			
			if(precio_producto_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(precio_producto_control);
			}
			
			
			if(precio_producto_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(precio_producto_control);
			}
			
			if(precio_producto_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(precio_producto_control);
			}				
			
			if(precio_producto_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(precio_producto_control);
			}
			
			if(precio_producto_control.usuarioActual!=null && precio_producto_control.usuarioActual.field_strUserName!=null &&
			precio_producto_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(precio_producto_control);			
			}
		}
		
		
		if(precio_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(precio_producto_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(precio_producto_control) {
		
		this.actualizarPaginaCargaGeneral(precio_producto_control);
		this.actualizarPaginaTablaDatos(precio_producto_control);
		this.actualizarPaginaCargaGeneralControles(precio_producto_control);
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(precio_producto_control);
		this.actualizarPaginaAreaBusquedas(precio_producto_control);
		this.actualizarPaginaCargaCombosFK(precio_producto_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(precio_producto_control) {
		
		this.actualizarPaginaCargaGeneral(precio_producto_control);
		this.actualizarPaginaTablaDatos(precio_producto_control);
		this.actualizarPaginaCargaGeneralControles(precio_producto_control);
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(precio_producto_control);
		this.actualizarPaginaAreaBusquedas(precio_producto_control);
		this.actualizarPaginaCargaCombosFK(precio_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(precio_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(precio_producto_control);		
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(precio_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(precio_producto_control);		
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(precio_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(precio_producto_control);		
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(precio_producto_control) {
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(precio_producto_control) {
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(precio_producto_control) {
		this.actualizarPaginaCargaGeneralControles(precio_producto_control);
		this.actualizarPaginaCargaCombosFK(precio_producto_control);
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(precio_producto_control) {
		this.actualizarPaginaAbrirLink(precio_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);				
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);
		this.actualizarPaginaFormulario(precio_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);
		this.actualizarPaginaFormulario(precio_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(precio_producto_control) {
		this.actualizarPaginaFormulario(precio_producto_control);
		this.onLoadCombosDefectoFK(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);
		this.actualizarPaginaFormulario(precio_producto_control);
		this.onLoadCombosDefectoFK(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(precio_producto_control) {
		this.actualizarPaginaCargaGeneralControles(precio_producto_control);
		this.actualizarPaginaCargaCombosFK(precio_producto_control);
		this.actualizarPaginaFormulario(precio_producto_control);
		this.onLoadCombosDefectoFK(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(precio_producto_control) {
		this.actualizarPaginaAbrirLink(precio_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(precio_producto_control) {
		this.actualizarPaginaImprimir(precio_producto_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(precio_producto_control) {
		this.actualizarPaginaImprimir(precio_producto_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(precio_producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(precio_producto_control) {
		//FORMULARIO
		if(precio_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(precio_producto_control);
			this.actualizarPaginaFormularioAdd(precio_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		//COMBOS FK
		if(precio_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(precio_producto_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(precio_producto_control) {
		//FORMULARIO
		if(precio_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(precio_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);	
		//COMBOS FK
		if(precio_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(precio_producto_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(precio_producto_control) {
		//FORMULARIO
		if(precio_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(precio_producto_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(precio_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);	
		//COMBOS FK
		if(precio_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(precio_producto_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(precio_producto_control) {
		if(precio_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && precio_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(precio_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(precio_producto_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(precio_producto_control) {
		if(precio_producto_funcion1.esPaginaForm()==true) {
			window.opener.precio_producto_webcontrol1.actualizarPaginaTablaDatos(precio_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(precio_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(precio_producto_control) {
		precio_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(precio_producto_control.strAuxiliarUrlPagina);
				
		precio_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(precio_producto_control.strAuxiliarTipo,precio_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(precio_producto_control) {
		precio_producto_funcion1.resaltarRestaurarDivMensaje(true,precio_producto_control.strAuxiliarMensajeAlert,precio_producto_control.strAuxiliarCssMensaje);
			
		if(precio_producto_funcion1.esPaginaForm()==true) {
			window.opener.precio_producto_funcion1.resaltarRestaurarDivMensaje(true,precio_producto_control.strAuxiliarMensajeAlert,precio_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(precio_producto_control) {
		eval(precio_producto_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(precio_producto_control, mostrar) {
		
		if(mostrar==true) {
			precio_producto_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				precio_producto_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			precio_producto_funcion1.mostrarDivMensaje(true,precio_producto_control.strAuxiliarMensaje,precio_producto_control.strAuxiliarCssMensaje);
		
		} else {
			precio_producto_funcion1.mostrarDivMensaje(false,precio_producto_control.strAuxiliarMensaje,precio_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(precio_producto_control) {
	
		funcionGeneral.printWebPartPage("precio_producto",precio_producto_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarprecio_productosAjaxWebPart").html(precio_producto_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("precio_producto",jQuery("#divTablaDatosReporteAuxiliarprecio_productosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(precio_producto_control) {
		this.precio_producto_controlInicial=precio_producto_control;
			
		if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(precio_producto_control.strStyleDivArbol,precio_producto_control.strStyleDivContent
																,precio_producto_control.strStyleDivOpcionesBanner,precio_producto_control.strStyleDivExpandirColapsar
																,precio_producto_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=precio_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",precio_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(precio_producto_control) {
		jQuery("#divTablaDatosprecio_productosAjaxWebPart").html(precio_producto_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosprecio_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosprecio_productos=jQuery("#tblTablaDatosprecio_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("precio_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',precio_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			precio_producto_webcontrol1.registrarControlesTableEdition(precio_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		precio_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(precio_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(precio_producto_control.precio_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(precio_producto_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(precio_producto_control) {
		this.actualizarCssBotonesPagina(precio_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(precio_producto_control.tiposReportes,precio_producto_control.tiposReporte
															 	,precio_producto_control.tiposPaginacion,precio_producto_control.tiposAcciones
																,precio_producto_control.tiposColumnasSelect,precio_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(precio_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(precio_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(precio_producto_control);			
	}
	
	actualizarPaginaAreaBusquedas(precio_producto_control) {
		jQuery("#divBusquedaprecio_productoAjaxWebPart").css("display",precio_producto_control.strPermisoBusqueda);
		jQuery("#trprecio_productoCabeceraBusquedas").css("display",precio_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaprecio_producto").css("display",precio_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(precio_producto_control.htmlTablaOrderBy!=null
			&& precio_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByprecio_productoAjaxWebPart").html(precio_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//precio_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(precio_producto_control.htmlTablaOrderByRel!=null
			&& precio_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelprecio_productoAjaxWebPart").html(precio_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(precio_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaprecio_productoAjaxWebPart").css("display","none");
			jQuery("#trprecio_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaprecio_producto").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(precio_producto_control) {
		jQuery("#tdprecio_productoNuevo").css("display",precio_producto_control.strPermisoNuevo);
		jQuery("#trprecio_productoElementos").css("display",precio_producto_control.strVisibleTablaElementos);
		jQuery("#trprecio_productoAcciones").css("display",precio_producto_control.strVisibleTablaAcciones);
		jQuery("#trprecio_productoParametrosAcciones").css("display",precio_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(precio_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(precio_producto_control);
				
		if(precio_producto_control.precio_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(precio_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(precio_producto_control);
	}
	
	actualizarPaginaUsuarioInvitado(precio_producto_control) {
	
		var indexPosition=precio_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=precio_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(precio_producto_control) {
		jQuery("#divResumenprecio_productoActualAjaxWebPart").html(precio_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(precio_producto_control) {
		jQuery("#divAccionesRelacionesprecio_productoAjaxWebPart").html(precio_producto_control.htmlTablaAccionesRelaciones);
			
		precio_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(precio_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(precio_producto_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(precio_producto_control) {
		
		if(precio_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",precio_producto_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",precio_producto_control.strVisibleFK_Idproducto);
		}

		if(precio_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio").attr("style",precio_producto_control.strVisibleFK_Idtipo_precio);
			jQuery("#tblstrVisible"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio").attr("style",precio_producto_control.strVisibleFK_Idtipo_precio);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionprecio_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("precio_producto",id,"inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);		
	}
	
	

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		precio_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("precio_producto","producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
	}

	abrirBusquedaParatipo_precio(strNombreCampoBusqueda){//idActual
		precio_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("precio_producto","tipo_precio","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(precio_producto_control) {
	
		jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id").val(precio_producto_control.precio_productoActual.id);
		jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-version_row").val(precio_producto_control.precio_productoActual.versionRow);
		
		if(precio_producto_control.precio_productoActual.id_producto!=null && precio_producto_control.precio_productoActual.id_producto>-1){
			if(jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val() != precio_producto_control.precio_productoActual.id_producto) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val(precio_producto_control.precio_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(precio_producto_control.precio_productoActual.id_tipo_precio!=null && precio_producto_control.precio_productoActual.id_tipo_precio>-1){
			if(jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val() != precio_producto_control.precio_productoActual.id_tipo_precio) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val(precio_producto_control.precio_productoActual.id_tipo_precio).trigger("change");
			}
		} else { 
			//jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").select2("val", null);
			if(jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-precio").val(precio_producto_control.precio_productoActual.precio);
		jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-descuento_porciento").val(precio_producto_control.precio_productoActual.descuento_porciento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+precio_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("precio_producto","inventario","","form_precio_producto",formulario,"","",paraEventoTabla,idFilaTabla,precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
	}
	
	cargarCombosFK(precio_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.cargarCombosproductosFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.cargarCombostipo_preciosFK(precio_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(precio_producto_control.strRecargarFkTiposNinguno!=null && precio_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && precio_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(precio_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",precio_producto_control.strRecargarFkTiposNinguno,",")) { 
					precio_producto_webcontrol1.cargarCombosproductosFK(precio_producto_control);
				}

				if(precio_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_precio",precio_producto_control.strRecargarFkTiposNinguno,",")) { 
					precio_producto_webcontrol1.cargarCombostipo_preciosFK(precio_producto_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(precio_producto_control) {
		jQuery("#spanstrMensajeid").text(precio_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(precio_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_producto").text(precio_producto_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_tipo_precio").text(precio_producto_control.strMensajeid_tipo_precio);		
		jQuery("#spanstrMensajeprecio").text(precio_producto_control.strMensajeprecio);		
		jQuery("#spanstrMensajedescuento_porciento").text(precio_producto_control.strMensajedescuento_porciento);		
	}
	
	actualizarCssBotonesMantenimiento(precio_producto_control) {
		jQuery("#tdbtnNuevoprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoprecio_producto").css("display",precio_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarprecio_producto").css("display",precio_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarprecio_producto").css("display",precio_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosprecio_producto").css("display",precio_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaproductoFK(precio_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,precio_producto_funcion1,precio_producto_control.productosFK);
	}

	cargarComboEditarTablatipo_precioFK(precio_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,precio_producto_funcion1,precio_producto_control.tipo_preciosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(precio_producto_control) {
		var i=0;
		
		i=precio_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(precio_producto_control.precio_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(precio_producto_control.precio_productoActual.versionRow);
		
		if(precio_producto_control.precio_productoActual.id_producto!=null && precio_producto_control.precio_productoActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != precio_producto_control.precio_productoActual.id_producto) {
				jQuery("#t-cel_"+i+"_2").val(precio_producto_control.precio_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(precio_producto_control.precio_productoActual.id_tipo_precio!=null && precio_producto_control.precio_productoActual.id_tipo_precio>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != precio_producto_control.precio_productoActual.id_tipo_precio) {
				jQuery("#t-cel_"+i+"_3").val(precio_producto_control.precio_productoActual.id_tipo_precio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(precio_producto_control.precio_productoActual.precio);
		jQuery("#t-cel_"+i+"_5").val(precio_producto_control.precio_productoActual.descuento_porciento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(precio_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(precio_producto_control) {
		precio_producto_funcion1.registrarControlesTableValidacionEdition(precio_producto_control,precio_producto_webcontrol1,precio_producto_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_productoConstante,strParametros);
		
		//precio_producto_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosproductosFK(precio_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto",precio_producto_control.productosFK);

		if(precio_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+precio_producto_control.idFilaTablaActual+"_2",precio_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",precio_producto_control.productosFK);

	};

	cargarCombostipo_preciosFK(precio_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio",precio_producto_control.tipo_preciosFK);

		if(precio_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+precio_producto_control.idFilaTablaActual+"_3",precio_producto_control.tipo_preciosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio",precio_producto_control.tipo_preciosFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(precio_producto_control) {

	};

	registrarComboActionChangeCombostipo_preciosFK(precio_producto_control) {

	};

	
	
	setDefectoValorCombosproductosFK(precio_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(precio_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val() != precio_producto_control.idproductoDefaultFK) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val(precio_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(precio_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_preciosFK(precio_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(precio_producto_control.idtipo_precioDefaultFK>-1 && jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val() != precio_producto_control.idtipo_precioDefaultFK) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val(precio_producto_control.idtipo_precioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val(precio_producto_control.idtipo_precioDefaultForeignKey).trigger("change");
			if(jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//precio_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(precio_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(precio_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.setDefectoValorCombosproductosFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.setDefectoValorCombostipo_preciosFK(precio_producto_control);
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
	onLoadCombosEventosFK(precio_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(precio_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",precio_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				precio_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(precio_producto_control);
			//}

			//if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",precio_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				precio_producto_webcontrol1.registrarComboActionChangeCombostipo_preciosFK(precio_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(precio_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(precio_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(precio_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("precio_producto");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("precio_producto");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(precio_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);			
			
			if(precio_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,"precio_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				precio_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_precio","id_tipo_precio","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio_img_busqueda").click(function(){
				precio_producto_webcontrol1.abrirBusquedaParatipo_precio("id_tipo_precio");
				//alert(jQuery('#form-id_tipo_precio_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("precio_producto","FK_Idproducto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("precio_producto","FK_Idtipo_precio","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			precio_producto_funcion1.validarFormularioJQuery(precio_producto_constante1);
			
			if(precio_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(precio_producto_control) {
		
		jQuery("#divBusquedaprecio_productoAjaxWebPart").css("display",precio_producto_control.strPermisoBusqueda);
		jQuery("#trprecio_productoCabeceraBusquedas").css("display",precio_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaprecio_producto").css("display",precio_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteprecio_producto").css("display",precio_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosprecio_producto").attr("style",precio_producto_control.strPermisoMostrarTodos);
		
		if(precio_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdprecio_productoNuevo").css("display",precio_producto_control.strPermisoNuevo);
			jQuery("#tdprecio_productoNuevoToolBar").css("display",precio_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdprecio_productoDuplicar").css("display",precio_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdprecio_productoDuplicarToolBar").css("display",precio_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdprecio_productoNuevoGuardarCambios").css("display",precio_producto_control.strPermisoNuevo);
			jQuery("#tdprecio_productoNuevoGuardarCambiosToolBar").css("display",precio_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(precio_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdprecio_productoActualizarToolBar").css("display",precio_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdprecio_productoCopiar").css("display",precio_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdprecio_productoCopiarToolBar").css("display",precio_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdprecio_productoConEditar").css("display",precio_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdprecio_productoEliminarToolBar").css("display",precio_producto_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdprecio_productoGuardarCambios").css("display",precio_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdprecio_productoGuardarCambiosToolBar").css("display",precio_producto_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trprecio_productoElementos").css("display",precio_producto_control.strVisibleTablaElementos);
		
		jQuery("#trprecio_productoAcciones").css("display",precio_producto_control.strVisibleTablaAcciones);
		jQuery("#trprecio_productoParametrosAcciones").css("display",precio_producto_control.strVisibleTablaAcciones);
			
		jQuery("#tdprecio_productoCerrarPagina").css("display",precio_producto_control.strPermisoPopup);		
		jQuery("#tdprecio_productoCerrarPaginaToolBar").css("display",precio_producto_control.strPermisoPopup);
		//jQuery("#trprecio_productoAccionesRelaciones").css("display",precio_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		precio_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		precio_producto_webcontrol1.registrarEventosControles();
		
		if(precio_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
			precio_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(precio_producto_constante1.STR_ES_RELACIONES=="true") {
			if(precio_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				precio_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(precio_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(precio_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				precio_producto_webcontrol1.onLoad();
				
			} else {
				if(precio_producto_constante1.BIT_ES_PAGINA_FORM==true) {
					if(precio_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
						//precio_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(precio_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(precio_producto_constante1.BIG_ID_ACTUAL,"precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
						//precio_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			precio_producto_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var precio_producto_webcontrol1=new precio_producto_webcontrol();

if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = precio_producto_webcontrol1.onLoadWindow; 
}

//</script>