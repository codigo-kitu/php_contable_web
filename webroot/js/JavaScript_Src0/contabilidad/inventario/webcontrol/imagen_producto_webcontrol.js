//<script type="text/javascript" language="javascript">



//var imagen_productoJQueryPaginaWebInteraccion= function (imagen_producto_control) {
//this.,this.,this.

class imagen_producto_webcontrol extends imagen_producto_webcontrol_add {
	
	imagen_producto_control=null;
	imagen_producto_controlInicial=null;
	imagen_producto_controlAuxiliar=null;
		
	//if(imagen_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_producto_control) {
		super();
		
		this.imagen_producto_control=imagen_producto_control;
	}
		
	actualizarVariablesPagina(imagen_producto_control) {
		
		if(imagen_producto_control.action=="index" || imagen_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_producto_control);
			
		} else if(imagen_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_producto_control);
			
		} else if(imagen_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_producto_control);
			
		} else if(imagen_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_producto_control);		
		
		} else if(imagen_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_producto_control);		
		
		} else if(imagen_producto_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_producto_control);		
		
		} else if(imagen_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_producto_control);		
		}
		else if(imagen_producto_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_producto_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(imagen_producto_control.action + " Revisar Manejo");
			
			if(imagen_producto_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(imagen_producto_control);
				
				return;
			}
			
			//if(imagen_producto_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(imagen_producto_control);
			//}
			
			if(imagen_producto_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(imagen_producto_control);
			}
			
			if(imagen_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_producto_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(imagen_producto_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(imagen_producto_control, false);			
			}
			
			if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(imagen_producto_control);	
			}
			
			if(imagen_producto_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(imagen_producto_control);
			}
			
			if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(imagen_producto_control);
			}
			
			if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(imagen_producto_control);
			}
			
			if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(imagen_producto_control);	
			}
			
			if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
			}
			
			if(imagen_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(imagen_producto_control);
			}
			
			
			if(imagen_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(imagen_producto_control);			
			}
			
			if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(imagen_producto_control);
			}
			
			
			if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(imagen_producto_control);
			}
			
			if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(imagen_producto_control);
			}				
			
			if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_producto_control);
			}
			
			if(imagen_producto_control.usuarioActual!=null && imagen_producto_control.usuarioActual.field_strUserName!=null &&
			imagen_producto_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(imagen_producto_control);			
			}
		}
		
		
		if(imagen_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_producto_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(imagen_producto_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_producto_control);
		this.actualizarPaginaTablaDatos(imagen_producto_control);
		this.actualizarPaginaCargaGeneralControles(imagen_producto_control);
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_producto_control);
		this.actualizarPaginaAreaBusquedas(imagen_producto_control);
		this.actualizarPaginaCargaCombosFK(imagen_producto_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_producto_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_producto_control);
		this.actualizarPaginaTablaDatos(imagen_producto_control);
		this.actualizarPaginaCargaGeneralControles(imagen_producto_control);
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_producto_control);
		this.actualizarPaginaAreaBusquedas(imagen_producto_control);
		this.actualizarPaginaCargaCombosFK(imagen_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(imagen_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_producto_control);		
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_producto_control);		
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_producto_control);		
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_producto_control) {
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_producto_control) {
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_producto_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_producto_control);
		this.actualizarPaginaCargaCombosFK(imagen_producto_control);
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_producto_control) {
		this.actualizarPaginaAbrirLink(imagen_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);				
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);
		this.actualizarPaginaFormulario(imagen_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);
		this.actualizarPaginaFormulario(imagen_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_producto_control) {
		this.actualizarPaginaFormulario(imagen_producto_control);
		this.onLoadCombosDefectoFK(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);
		this.actualizarPaginaFormulario(imagen_producto_control);
		this.onLoadCombosDefectoFK(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_producto_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_producto_control);
		this.actualizarPaginaCargaCombosFK(imagen_producto_control);
		this.actualizarPaginaFormulario(imagen_producto_control);
		this.onLoadCombosDefectoFK(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_producto_control) {
		this.actualizarPaginaAbrirLink(imagen_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_producto_control) {
		this.actualizarPaginaImprimir(imagen_producto_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_producto_control) {
		this.actualizarPaginaImprimir(imagen_producto_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_producto_control) {
		//FORMULARIO
		if(imagen_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_producto_control);
			this.actualizarPaginaFormularioAdd(imagen_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		//COMBOS FK
		if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_producto_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_producto_control) {
		//FORMULARIO
		if(imagen_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);	
		//COMBOS FK
		if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_producto_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_producto_control) {
		//FORMULARIO
		if(imagen_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_producto_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);	
		//COMBOS FK
		if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_producto_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control) {
		if(imagen_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_producto_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_producto_control) {
		if(imagen_producto_funcion1.esPaginaForm()==true) {
			window.opener.imagen_producto_webcontrol1.actualizarPaginaTablaDatos(imagen_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_producto_control) {
		imagen_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_producto_control.strAuxiliarUrlPagina);
				
		imagen_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_producto_control.strAuxiliarTipo,imagen_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_producto_control) {
		imagen_producto_funcion1.resaltarRestaurarDivMensaje(true,imagen_producto_control.strAuxiliarMensajeAlert,imagen_producto_control.strAuxiliarCssMensaje);
			
		if(imagen_producto_funcion1.esPaginaForm()==true) {
			window.opener.imagen_producto_funcion1.resaltarRestaurarDivMensaje(true,imagen_producto_control.strAuxiliarMensajeAlert,imagen_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(imagen_producto_control) {
		eval(imagen_producto_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(imagen_producto_control, mostrar) {
		
		if(mostrar==true) {
			imagen_producto_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_producto_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			imagen_producto_funcion1.mostrarDivMensaje(true,imagen_producto_control.strAuxiliarMensaje,imagen_producto_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_producto_funcion1.mostrarDivMensaje(false,imagen_producto_control.strAuxiliarMensaje,imagen_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(imagen_producto_control) {
	
		funcionGeneral.printWebPartPage("imagen_producto",imagen_producto_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarimagen_productosAjaxWebPart").html(imagen_producto_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("imagen_producto",jQuery("#divTablaDatosReporteAuxiliarimagen_productosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(imagen_producto_control) {
		this.imagen_producto_controlInicial=imagen_producto_control;
			
		if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_producto_control.strStyleDivArbol,imagen_producto_control.strStyleDivContent
																,imagen_producto_control.strStyleDivOpcionesBanner,imagen_producto_control.strStyleDivExpandirColapsar
																,imagen_producto_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(imagen_producto_control) {
		jQuery("#divTablaDatosimagen_productosAjaxWebPart").html(imagen_producto_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_productos=jQuery("#tblTablaDatosimagen_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_producto_webcontrol1.registrarControlesTableEdition(imagen_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(imagen_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_producto_control.imagen_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_producto_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(imagen_producto_control) {
		this.actualizarCssBotonesPagina(imagen_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_producto_control.tiposReportes,imagen_producto_control.tiposReporte
															 	,imagen_producto_control.tiposPaginacion,imagen_producto_control.tiposAcciones
																,imagen_producto_control.tiposColumnasSelect,imagen_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_producto_control);			
	}
	
	actualizarPaginaAreaBusquedas(imagen_producto_control) {
		jQuery("#divBusquedaimagen_productoAjaxWebPart").css("display",imagen_producto_control.strPermisoBusqueda);
		jQuery("#trimagen_productoCabeceraBusquedas").css("display",imagen_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_producto").css("display",imagen_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_producto_control.htmlTablaOrderBy!=null
			&& imagen_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_productoAjaxWebPart").html(imagen_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_producto_control.htmlTablaOrderByRel!=null
			&& imagen_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_productoAjaxWebPart").html(imagen_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_productoAjaxWebPart").css("display","none");
			jQuery("#trimagen_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_producto").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(imagen_producto_control) {
		jQuery("#tdimagen_productoNuevo").css("display",imagen_producto_control.strPermisoNuevo);
		jQuery("#trimagen_productoElementos").css("display",imagen_producto_control.strVisibleTablaElementos);
		jQuery("#trimagen_productoAcciones").css("display",imagen_producto_control.strVisibleTablaAcciones);
		jQuery("#trimagen_productoParametrosAcciones").css("display",imagen_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_producto_control);
				
		if(imagen_producto_control.imagen_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_producto_control);
	}
	
	actualizarPaginaUsuarioInvitado(imagen_producto_control) {
	
		var indexPosition=imagen_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_producto_control) {
		jQuery("#divResumenimagen_productoActualAjaxWebPart").html(imagen_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_producto_control) {
		jQuery("#divAccionesRelacionesimagen_productoAjaxWebPart").html(imagen_producto_control.htmlTablaAccionesRelaciones);
			
		imagen_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_producto_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_producto_control) {
		
		if(imagen_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",imagen_producto_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",imagen_producto_control.strVisibleFK_Idproducto);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_producto",id,"inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);		
	}
	
	

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		imagen_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_producto","producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_producto_control) {
	
		jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id").val(imagen_producto_control.imagen_productoActual.id);
		jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-version_row").val(imagen_producto_control.imagen_productoActual.versionRow);
		
		if(imagen_producto_control.imagen_productoActual.id_producto!=null && imagen_producto_control.imagen_productoActual.id_producto>-1){
			if(jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val() != imagen_producto_control.imagen_productoActual.id_producto) {
				jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val(imagen_producto_control.imagen_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-imagen").val(imagen_producto_control.imagen_productoActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_producto","inventario","","form_imagen_producto",formulario,"","",paraEventoTabla,idFilaTabla,imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
	}
	
	cargarCombosFK(imagen_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",imagen_producto_control.strRecargarFkTipos,",")) { 
				imagen_producto_webcontrol1.cargarCombosproductosFK(imagen_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_producto_control.strRecargarFkTiposNinguno!=null && imagen_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",imagen_producto_control.strRecargarFkTiposNinguno,",")) { 
					imagen_producto_webcontrol1.cargarCombosproductosFK(imagen_producto_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(imagen_producto_control) {
		jQuery("#spanstrMensajeid").text(imagen_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_producto").text(imagen_producto_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeimagen").text(imagen_producto_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_producto_control) {
		jQuery("#tdbtnNuevoimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_producto").css("display",imagen_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_producto").css("display",imagen_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_producto").css("display",imagen_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_producto").css("display",imagen_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaproductoFK(imagen_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_producto_funcion1,imagen_producto_control.productosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(imagen_producto_control) {
		var i=0;
		
		i=imagen_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_producto_control.imagen_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_producto_control.imagen_productoActual.versionRow);
		
		if(imagen_producto_control.imagen_productoActual.id_producto!=null && imagen_producto_control.imagen_productoActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != imagen_producto_control.imagen_productoActual.id_producto) {
				jQuery("#t-cel_"+i+"_2").val(imagen_producto_control.imagen_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(imagen_producto_control.imagen_productoActual.imagen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_producto_control) {
		imagen_producto_funcion1.registrarControlesTableValidacionEdition(imagen_producto_control,imagen_producto_webcontrol1,imagen_producto_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_productoConstante,strParametros);
		
		//imagen_producto_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosproductosFK(imagen_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto",imagen_producto_control.productosFK);

		if(imagen_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_producto_control.idFilaTablaActual+"_2",imagen_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",imagen_producto_control.productosFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(imagen_producto_control) {

	};

	
	
	setDefectoValorCombosproductosFK(imagen_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val() != imagen_producto_control.idproductoDefaultFK) {
				jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val(imagen_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(imagen_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",imagen_producto_control.strRecargarFkTipos,",")) { 
				imagen_producto_webcontrol1.setDefectoValorCombosproductosFK(imagen_producto_control);
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
	onLoadCombosEventosFK(imagen_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",imagen_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(imagen_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_producto");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_producto");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);			
			
			if(imagen_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,"imagen_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				imagen_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_producto","FK_Idproducto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			imagen_producto_funcion1.validarFormularioJQuery(imagen_producto_constante1);
			
			if(imagen_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_producto_control) {
		
		jQuery("#divBusquedaimagen_productoAjaxWebPart").css("display",imagen_producto_control.strPermisoBusqueda);
		jQuery("#trimagen_productoCabeceraBusquedas").css("display",imagen_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_producto").css("display",imagen_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_producto").css("display",imagen_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_producto").attr("style",imagen_producto_control.strPermisoMostrarTodos);
		
		if(imagen_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_productoNuevo").css("display",imagen_producto_control.strPermisoNuevo);
			jQuery("#tdimagen_productoNuevoToolBar").css("display",imagen_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_productoDuplicar").css("display",imagen_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_productoDuplicarToolBar").css("display",imagen_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_productoNuevoGuardarCambios").css("display",imagen_producto_control.strPermisoNuevo);
			jQuery("#tdimagen_productoNuevoGuardarCambiosToolBar").css("display",imagen_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_productoActualizarToolBar").css("display",imagen_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_productoCopiar").css("display",imagen_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_productoCopiarToolBar").css("display",imagen_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_productoConEditar").css("display",imagen_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_productoEliminarToolBar").css("display",imagen_producto_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdimagen_productoGuardarCambios").css("display",imagen_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_productoGuardarCambiosToolBar").css("display",imagen_producto_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trimagen_productoElementos").css("display",imagen_producto_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_productoAcciones").css("display",imagen_producto_control.strVisibleTablaAcciones);
		jQuery("#trimagen_productoParametrosAcciones").css("display",imagen_producto_control.strVisibleTablaAcciones);
			
		jQuery("#tdimagen_productoCerrarPagina").css("display",imagen_producto_control.strPermisoPopup);		
		jQuery("#tdimagen_productoCerrarPaginaToolBar").css("display",imagen_producto_control.strPermisoPopup);
		//jQuery("#trimagen_productoAccionesRelaciones").css("display",imagen_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_producto_webcontrol1.registrarEventosControles();
		
		if(imagen_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
			imagen_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_producto_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(imagen_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_producto_webcontrol1.onLoad();
				
			} else {
				if(imagen_producto_constante1.BIT_ES_PAGINA_FORM==true) {
					if(imagen_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
						//imagen_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(imagen_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_producto_constante1.BIG_ID_ACTUAL,"imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
						//imagen_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			imagen_producto_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var imagen_producto_webcontrol1=new imagen_producto_webcontrol();

if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_producto_webcontrol1.onLoadWindow; 
}

//</script>