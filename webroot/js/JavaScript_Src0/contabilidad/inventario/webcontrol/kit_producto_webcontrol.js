//<script type="text/javascript" language="javascript">



//var kit_productoJQueryPaginaWebInteraccion= function (kit_producto_control) {
//this.,this.,this.

class kit_producto_webcontrol extends kit_producto_webcontrol_add {
	
	kit_producto_control=null;
	kit_producto_controlInicial=null;
	kit_producto_controlAuxiliar=null;
		
	//if(kit_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(kit_producto_control) {
		super();
		
		this.kit_producto_control=kit_producto_control;
	}
		
	actualizarVariablesPagina(kit_producto_control) {
		
		if(kit_producto_control.action=="index" || kit_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(kit_producto_control);
			
		} else if(kit_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(kit_producto_control);
		
		} else if(kit_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(kit_producto_control);
		
		} else if(kit_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(kit_producto_control);
		
		} else if(kit_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(kit_producto_control);
			
		} else if(kit_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(kit_producto_control);
			
		} else if(kit_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(kit_producto_control);
		
		} else if(kit_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(kit_producto_control);
		
		} else if(kit_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(kit_producto_control);
		
		} else if(kit_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(kit_producto_control);
		
		} else if(kit_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(kit_producto_control);
		
		} else if(kit_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(kit_producto_control);
		
		} else if(kit_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(kit_producto_control);
		
		} else if(kit_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(kit_producto_control);
		
		} else if(kit_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(kit_producto_control);
		
		} else if(kit_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(kit_producto_control);
		
		} else if(kit_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(kit_producto_control);
		
		} else if(kit_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(kit_producto_control);
		
		} else if(kit_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(kit_producto_control);
		
		} else if(kit_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(kit_producto_control);
		
		} else if(kit_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(kit_producto_control);
		
		} else if(kit_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(kit_producto_control);
		
		} else if(kit_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(kit_producto_control);
		
		} else if(kit_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(kit_producto_control);
		
		} else if(kit_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(kit_producto_control);
		
		} else if(kit_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(kit_producto_control);
		
		} else if(kit_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(kit_producto_control);
		
		} else if(kit_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(kit_producto_control);		
		
		} else if(kit_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(kit_producto_control);		
		
		} else if(kit_producto_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(kit_producto_control);		
		
		} else if(kit_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(kit_producto_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(kit_producto_control.action + " Revisar Manejo");
			
			if(kit_producto_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(kit_producto_control);
				
				return;
			}
			
			//if(kit_producto_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(kit_producto_control);
			//}
			
			if(kit_producto_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(kit_producto_control);
			}
			
			if(kit_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && kit_producto_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(kit_producto_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(kit_producto_control, false);			
			}
			
			if(kit_producto_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(kit_producto_control);	
			}
			
			if(kit_producto_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(kit_producto_control);
			}
			
			if(kit_producto_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(kit_producto_control);
			}
			
			if(kit_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(kit_producto_control);
			}
			
			if(kit_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(kit_producto_control);	
			}
			
			if(kit_producto_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(kit_producto_control);
			}
			
			if(kit_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(kit_producto_control);
			}
			
			
			if(kit_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(kit_producto_control);			
			}
			
			if(kit_producto_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(kit_producto_control);
			}
			
			
			if(kit_producto_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(kit_producto_control);
			}
			
			if(kit_producto_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(kit_producto_control);
			}				
			
			if(kit_producto_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(kit_producto_control);
			}
			
			if(kit_producto_control.usuarioActual!=null && kit_producto_control.usuarioActual.field_strUserName!=null &&
			kit_producto_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(kit_producto_control);			
			}
		}
		
		
		if(kit_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(kit_producto_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(kit_producto_control) {
		
		this.actualizarPaginaCargaGeneral(kit_producto_control);
		this.actualizarPaginaTablaDatos(kit_producto_control);
		this.actualizarPaginaCargaGeneralControles(kit_producto_control);
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(kit_producto_control);
		this.actualizarPaginaAreaBusquedas(kit_producto_control);
		this.actualizarPaginaCargaCombosFK(kit_producto_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(kit_producto_control) {
		
		this.actualizarPaginaCargaGeneral(kit_producto_control);
		this.actualizarPaginaTablaDatos(kit_producto_control);
		this.actualizarPaginaCargaGeneralControles(kit_producto_control);
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(kit_producto_control);
		this.actualizarPaginaAreaBusquedas(kit_producto_control);
		this.actualizarPaginaCargaCombosFK(kit_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(kit_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kit_producto_control);		
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(kit_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kit_producto_control);		
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(kit_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kit_producto_control);		
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(kit_producto_control) {
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(kit_producto_control) {
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(kit_producto_control) {
		this.actualizarPaginaCargaGeneralControles(kit_producto_control);
		this.actualizarPaginaCargaCombosFK(kit_producto_control);
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(kit_producto_control) {
		this.actualizarPaginaAbrirLink(kit_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);				
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);
		this.actualizarPaginaFormulario(kit_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);
		this.actualizarPaginaFormulario(kit_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(kit_producto_control) {
		this.actualizarPaginaFormulario(kit_producto_control);
		this.onLoadCombosDefectoFK(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);
		this.actualizarPaginaFormulario(kit_producto_control);
		this.onLoadCombosDefectoFK(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(kit_producto_control) {
		this.actualizarPaginaCargaGeneralControles(kit_producto_control);
		this.actualizarPaginaCargaCombosFK(kit_producto_control);
		this.actualizarPaginaFormulario(kit_producto_control);
		this.onLoadCombosDefectoFK(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(kit_producto_control) {
		this.actualizarPaginaAbrirLink(kit_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(kit_producto_control) {
		this.actualizarPaginaImprimir(kit_producto_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(kit_producto_control) {
		this.actualizarPaginaImprimir(kit_producto_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(kit_producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(kit_producto_control) {
		//FORMULARIO
		if(kit_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kit_producto_control);
			this.actualizarPaginaFormularioAdd(kit_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		//COMBOS FK
		if(kit_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kit_producto_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(kit_producto_control) {
		//FORMULARIO
		if(kit_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kit_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);	
		//COMBOS FK
		if(kit_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kit_producto_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(kit_producto_control) {
		if(kit_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && kit_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(kit_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(kit_producto_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(kit_producto_control) {
		if(kit_producto_funcion1.esPaginaForm()==true) {
			window.opener.kit_producto_webcontrol1.actualizarPaginaTablaDatos(kit_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(kit_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(kit_producto_control) {
		kit_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(kit_producto_control.strAuxiliarUrlPagina);
				
		kit_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(kit_producto_control.strAuxiliarTipo,kit_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(kit_producto_control) {
		kit_producto_funcion1.resaltarRestaurarDivMensaje(true,kit_producto_control.strAuxiliarMensajeAlert,kit_producto_control.strAuxiliarCssMensaje);
			
		if(kit_producto_funcion1.esPaginaForm()==true) {
			window.opener.kit_producto_funcion1.resaltarRestaurarDivMensaje(true,kit_producto_control.strAuxiliarMensajeAlert,kit_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(kit_producto_control) {
		eval(kit_producto_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(kit_producto_control, mostrar) {
		
		if(mostrar==true) {
			kit_producto_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				kit_producto_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			kit_producto_funcion1.mostrarDivMensaje(true,kit_producto_control.strAuxiliarMensaje,kit_producto_control.strAuxiliarCssMensaje);
		
		} else {
			kit_producto_funcion1.mostrarDivMensaje(false,kit_producto_control.strAuxiliarMensaje,kit_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(kit_producto_control) {
	
		funcionGeneral.printWebPartPage("kit_producto",kit_producto_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarkit_productosAjaxWebPart").html(kit_producto_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("kit_producto",jQuery("#divTablaDatosReporteAuxiliarkit_productosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(kit_producto_control) {
		this.kit_producto_controlInicial=kit_producto_control;
			
		if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(kit_producto_control.strStyleDivArbol,kit_producto_control.strStyleDivContent
																,kit_producto_control.strStyleDivOpcionesBanner,kit_producto_control.strStyleDivExpandirColapsar
																,kit_producto_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=kit_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",kit_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(kit_producto_control) {
		jQuery("#divTablaDatoskit_productosAjaxWebPart").html(kit_producto_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoskit_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoskit_productos=jQuery("#tblTablaDatoskit_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("kit_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',kit_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			kit_producto_webcontrol1.registrarControlesTableEdition(kit_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		kit_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(kit_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(kit_producto_control.kit_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(kit_producto_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(kit_producto_control) {
		this.actualizarCssBotonesPagina(kit_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(kit_producto_control.tiposReportes,kit_producto_control.tiposReporte
															 	,kit_producto_control.tiposPaginacion,kit_producto_control.tiposAcciones
																,kit_producto_control.tiposColumnasSelect,kit_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(kit_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(kit_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(kit_producto_control);			
	}
	
	actualizarPaginaAreaBusquedas(kit_producto_control) {
		jQuery("#divBusquedakit_productoAjaxWebPart").css("display",kit_producto_control.strPermisoBusqueda);
		jQuery("#trkit_productoCabeceraBusquedas").css("display",kit_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedakit_producto").css("display",kit_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(kit_producto_control.htmlTablaOrderBy!=null
			&& kit_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBykit_productoAjaxWebPart").html(kit_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//kit_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(kit_producto_control.htmlTablaOrderByRel!=null
			&& kit_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelkit_productoAjaxWebPart").html(kit_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(kit_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedakit_productoAjaxWebPart").css("display","none");
			jQuery("#trkit_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedakit_producto").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(kit_producto_control) {
		jQuery("#tdkit_productoNuevo").css("display",kit_producto_control.strPermisoNuevo);
		jQuery("#trkit_productoElementos").css("display",kit_producto_control.strVisibleTablaElementos);
		jQuery("#trkit_productoAcciones").css("display",kit_producto_control.strVisibleTablaAcciones);
		jQuery("#trkit_productoParametrosAcciones").css("display",kit_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(kit_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(kit_producto_control);
				
		if(kit_producto_control.kit_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(kit_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(kit_producto_control);
	}
	
	actualizarPaginaUsuarioInvitado(kit_producto_control) {
	
		var indexPosition=kit_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=kit_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(kit_producto_control) {
		jQuery("#divResumenkit_productoActualAjaxWebPart").html(kit_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(kit_producto_control) {
		jQuery("#divAccionesRelacioneskit_productoAjaxWebPart").html(kit_producto_control.htmlTablaAccionesRelaciones);
			
		kit_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(kit_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(kit_producto_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(kit_producto_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionkit_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("kit_producto",id,"inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(kit_producto_control) {
	
		jQuery("#form"+kit_producto_constante1.STR_SUFIJO+"-id").val(kit_producto_control.kit_productoActual.id);
		jQuery("#form"+kit_producto_constante1.STR_SUFIJO+"-version_row").val(kit_producto_control.kit_productoActual.versionRow);
		jQuery("#form"+kit_producto_constante1.STR_SUFIJO+"-id_padre").val(kit_producto_control.kit_productoActual.id_padre);
		jQuery("#form"+kit_producto_constante1.STR_SUFIJO+"-id_hijo").val(kit_producto_control.kit_productoActual.id_hijo);
		jQuery("#form"+kit_producto_constante1.STR_SUFIJO+"-cantidad").val(kit_producto_control.kit_productoActual.cantidad);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+kit_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("kit_producto","inventario","","form_kit_producto",formulario,"","",paraEventoTabla,idFilaTabla,kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
	}
	
	cargarCombosFK(kit_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(kit_producto_control.strRecargarFkTiposNinguno!=null && kit_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && kit_producto_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(kit_producto_control) {
		jQuery("#spanstrMensajeid").text(kit_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(kit_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_padre").text(kit_producto_control.strMensajeid_padre);		
		jQuery("#spanstrMensajeid_hijo").text(kit_producto_control.strMensajeid_hijo);		
		jQuery("#spanstrMensajecantidad").text(kit_producto_control.strMensajecantidad);		
	}
	
	actualizarCssBotonesMantenimiento(kit_producto_control) {
		jQuery("#tdbtnNuevokit_producto").css("visibility",kit_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevokit_producto").css("display",kit_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarkit_producto").css("visibility",kit_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarkit_producto").css("display",kit_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarkit_producto").css("visibility",kit_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarkit_producto").css("display",kit_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarkit_producto").css("visibility",kit_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioskit_producto").css("visibility",kit_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioskit_producto").css("display",kit_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarkit_producto").css("visibility",kit_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarkit_producto").css("visibility",kit_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarkit_producto").css("visibility",kit_producto_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(kit_producto_control) {
		var i=0;
		
		i=kit_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(kit_producto_control.kit_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(kit_producto_control.kit_productoActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(kit_producto_control.kit_productoActual.id_padre);
		jQuery("#t-cel_"+i+"_3").val(kit_producto_control.kit_productoActual.id_hijo);
		jQuery("#t-cel_"+i+"_4").val(kit_producto_control.kit_productoActual.cantidad);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(kit_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(kit_producto_control) {
		kit_producto_funcion1.registrarControlesTableValidacionEdition(kit_producto_control,kit_producto_webcontrol1,kit_producto_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_productoConstante,strParametros);
		
		//kit_producto_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//kit_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(kit_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kit_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(kit_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kit_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(kit_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kit_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(kit_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("kit_producto");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("kit_producto");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(kit_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);			
			
			if(kit_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,"kit_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			kit_producto_funcion1.validarFormularioJQuery(kit_producto_constante1);
			
			if(kit_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(kit_producto_control) {
		
		jQuery("#divBusquedakit_productoAjaxWebPart").css("display",kit_producto_control.strPermisoBusqueda);
		jQuery("#trkit_productoCabeceraBusquedas").css("display",kit_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedakit_producto").css("display",kit_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportekit_producto").css("display",kit_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoskit_producto").attr("style",kit_producto_control.strPermisoMostrarTodos);
		
		if(kit_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdkit_productoNuevo").css("display",kit_producto_control.strPermisoNuevo);
			jQuery("#tdkit_productoNuevoToolBar").css("display",kit_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdkit_productoDuplicar").css("display",kit_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdkit_productoDuplicarToolBar").css("display",kit_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdkit_productoNuevoGuardarCambios").css("display",kit_producto_control.strPermisoNuevo);
			jQuery("#tdkit_productoNuevoGuardarCambiosToolBar").css("display",kit_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(kit_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdkit_productoActualizarToolBar").css("display",kit_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkit_productoCopiar").css("display",kit_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkit_productoCopiarToolBar").css("display",kit_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkit_productoConEditar").css("display",kit_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdkit_productoEliminarToolBar").css("display",kit_producto_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdkit_productoGuardarCambios").css("display",kit_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdkit_productoGuardarCambiosToolBar").css("display",kit_producto_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trkit_productoElementos").css("display",kit_producto_control.strVisibleTablaElementos);
		
		jQuery("#trkit_productoAcciones").css("display",kit_producto_control.strVisibleTablaAcciones);
		jQuery("#trkit_productoParametrosAcciones").css("display",kit_producto_control.strVisibleTablaAcciones);
			
		jQuery("#tdkit_productoCerrarPagina").css("display",kit_producto_control.strPermisoPopup);		
		jQuery("#tdkit_productoCerrarPaginaToolBar").css("display",kit_producto_control.strPermisoPopup);
		//jQuery("#trkit_productoAccionesRelaciones").css("display",kit_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		kit_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		kit_producto_webcontrol1.registrarEventosControles();
		
		if(kit_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
			kit_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(kit_producto_constante1.STR_ES_RELACIONES=="true") {
			if(kit_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				kit_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(kit_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(kit_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				kit_producto_webcontrol1.onLoad();
				
			} else {
				if(kit_producto_constante1.BIT_ES_PAGINA_FORM==true) {
					if(kit_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
						//kit_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(kit_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(kit_producto_constante1.BIG_ID_ACTUAL,"kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
						//kit_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			kit_producto_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var kit_producto_webcontrol1=new kit_producto_webcontrol();

if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = kit_producto_webcontrol1.onLoadWindow; 
}

//</script>