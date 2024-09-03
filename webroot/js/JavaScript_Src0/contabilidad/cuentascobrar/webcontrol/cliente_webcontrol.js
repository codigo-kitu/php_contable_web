//<script type="text/javascript" language="javascript">



//var clienteJQueryPaginaWebInteraccion= function (cliente_control) {
//this.,this.,this.

class cliente_webcontrol extends cliente_webcontrol_add {
	
	cliente_control=null;
	cliente_controlInicial=null;
	cliente_controlAuxiliar=null;
		
	//if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cliente_control) {
		super();
		
		this.cliente_control=cliente_control;
	}
		
	actualizarVariablesPagina(cliente_control) {
		
		if(cliente_control.action=="index" || cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cliente_control);
			
		} else if(cliente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cliente_control);
		
		} else if(cliente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cliente_control);
		
		} else if(cliente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cliente_control);
		
		} else if(cliente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cliente_control);
			
		} else if(cliente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cliente_control);
			
		} else if(cliente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cliente_control);
		
		} else if(cliente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cliente_control);
		
		} else if(cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cliente_control);
		
		} else if(cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cliente_control);
		
		} else if(cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cliente_control);
		
		} else if(cliente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cliente_control);
		
		} else if(cliente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cliente_control);
		
		} else if(cliente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cliente_control);
		
		} else if(cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cliente_control);
		
		} else if(cliente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cliente_control);
		
		} else if(cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cliente_control);
		
		} else if(cliente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cliente_control);
		
		} else if(cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cliente_control);
		
		} else if(cliente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cliente_control);
		
		} else if(cliente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cliente_control);
		
		} else if(cliente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cliente_control);
		
		} else if(cliente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cliente_control);
		
		} else if(cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cliente_control);
		
		} else if(cliente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cliente_control);
		
		} else if(cliente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cliente_control);
		
		} else if(cliente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cliente_control);
		
		} else if(cliente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cliente_control);		
		
		} else if(cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cliente_control);		
		
		} else if(cliente_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cliente_control);		
		
		} else if(cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cliente_control);		
		}
		else if(cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cliente_control);		
		}
		else if(cliente_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cliente_control);		
		}
		else if(cliente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cliente_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(cliente_control.action + " Revisar Manejo");
			
			if(cliente_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(cliente_control);
				
				return;
			}
			
			//if(cliente_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(cliente_control);
			//}
			
			if(cliente_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(cliente_control);
			}
			
			if(cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cliente_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(cliente_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(cliente_control, false);			
			}
			
			if(cliente_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(cliente_control);	
			}
			
			if(cliente_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(cliente_control);
			}
			
			if(cliente_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(cliente_control);
			}
			
			if(cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(cliente_control);
			}
			
			if(cliente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(cliente_control);	
			}
			
			if(cliente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(cliente_control);
			}
			
			if(cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(cliente_control);
			}
			
			
			if(cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(cliente_control);			
			}
			
			if(cliente_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(cliente_control);
			}
			
			
			if(cliente_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(cliente_control);
			}
			
			if(cliente_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(cliente_control);
			}				
			
			if(cliente_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cliente_control);
			}
			
			if(cliente_control.usuarioActual!=null && cliente_control.usuarioActual.field_strUserName!=null &&
			cliente_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(cliente_control);			
			}
		}
		
		
		if(cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cliente_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(cliente_control) {
		
		this.actualizarPaginaCargaGeneral(cliente_control);
		this.actualizarPaginaTablaDatos(cliente_control);
		this.actualizarPaginaCargaGeneralControles(cliente_control);
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cliente_control);
		this.actualizarPaginaAreaBusquedas(cliente_control);
		this.actualizarPaginaCargaCombosFK(cliente_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cliente_control) {
		
		this.actualizarPaginaCargaGeneral(cliente_control);
		this.actualizarPaginaTablaDatos(cliente_control);
		this.actualizarPaginaCargaGeneralControles(cliente_control);
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cliente_control);
		this.actualizarPaginaAreaBusquedas(cliente_control);
		this.actualizarPaginaCargaCombosFK(cliente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cliente_control);		
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cliente_control);		
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cliente_control);		
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(cliente_control) {
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cliente_control) {
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cliente_control) {
		this.actualizarPaginaCargaGeneralControles(cliente_control);
		this.actualizarPaginaCargaCombosFK(cliente_control);
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cliente_control) {
		this.actualizarPaginaAbrirLink(cliente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);				
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);
		this.actualizarPaginaFormulario(cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);
		this.actualizarPaginaFormulario(cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cliente_control) {
		this.actualizarPaginaFormulario(cliente_control);
		this.onLoadCombosDefectoFK(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);
		this.actualizarPaginaFormulario(cliente_control);
		this.onLoadCombosDefectoFK(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cliente_control) {
		this.actualizarPaginaCargaGeneralControles(cliente_control);
		this.actualizarPaginaCargaCombosFK(cliente_control);
		this.actualizarPaginaFormulario(cliente_control);
		this.onLoadCombosDefectoFK(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cliente_control) {
		this.actualizarPaginaAbrirLink(cliente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cliente_control) {
		this.actualizarPaginaImprimir(cliente_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cliente_control) {
		this.actualizarPaginaImprimir(cliente_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cliente_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cliente_control) {
		//FORMULARIO
		if(cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cliente_control);
			this.actualizarPaginaFormularioAdd(cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		//COMBOS FK
		if(cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cliente_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(cliente_control) {
		//FORMULARIO
		if(cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);	
		//COMBOS FK
		if(cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cliente_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);
		this.actualizarPaginaFormulario(cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cliente_control) {
		//FORMULARIO
		if(cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cliente_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);	
		//COMBOS FK
		if(cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cliente_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cliente_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(cliente_control) {
		if(cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cliente_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cliente_control) {
		if(cliente_funcion1.esPaginaForm()==true) {
			window.opener.cliente_webcontrol1.actualizarPaginaTablaDatos(cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(cliente_control) {
		cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cliente_control.strAuxiliarUrlPagina);
				
		cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cliente_control.strAuxiliarTipo,cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cliente_control) {
		cliente_funcion1.resaltarRestaurarDivMensaje(true,cliente_control.strAuxiliarMensajeAlert,cliente_control.strAuxiliarCssMensaje);
			
		if(cliente_funcion1.esPaginaForm()==true) {
			window.opener.cliente_funcion1.resaltarRestaurarDivMensaje(true,cliente_control.strAuxiliarMensajeAlert,cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(cliente_control) {
		eval(cliente_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(cliente_control, mostrar) {
		
		if(mostrar==true) {
			cliente_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cliente_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			cliente_funcion1.mostrarDivMensaje(true,cliente_control.strAuxiliarMensaje,cliente_control.strAuxiliarCssMensaje);
		
		} else {
			cliente_funcion1.mostrarDivMensaje(false,cliente_control.strAuxiliarMensaje,cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(cliente_control) {
	
		funcionGeneral.printWebPartPage("cliente",cliente_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarclientesAjaxWebPart").html(cliente_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("cliente",jQuery("#divTablaDatosReporteAuxiliarclientesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(cliente_control) {
		this.cliente_controlInicial=cliente_control;
			
		if(cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cliente_control.strStyleDivArbol,cliente_control.strStyleDivContent
																,cliente_control.strStyleDivOpcionesBanner,cliente_control.strStyleDivExpandirColapsar
																,cliente_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=cliente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cliente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(cliente_control) {
		jQuery("#divTablaDatosclientesAjaxWebPart").html(cliente_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosclientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cliente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosclientes=jQuery("#tblTablaDatosclientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cliente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cliente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cliente_webcontrol1.registrarControlesTableEdition(cliente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cliente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(cliente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cliente_control.clienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cliente_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(cliente_control) {
		this.actualizarCssBotonesPagina(cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cliente_control.tiposReportes,cliente_control.tiposReporte
															 	,cliente_control.tiposPaginacion,cliente_control.tiposAcciones
																,cliente_control.tiposColumnasSelect,cliente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cliente_control.tiposRelaciones,cliente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cliente_control);			
	}
	
	actualizarPaginaAreaBusquedas(cliente_control) {
		jQuery("#divBusquedaclienteAjaxWebPart").css("display",cliente_control.strPermisoBusqueda);
		jQuery("#trclienteCabeceraBusquedas").css("display",cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedacliente").css("display",cliente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cliente_control.htmlTablaOrderBy!=null
			&& cliente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByclienteAjaxWebPart").html(cliente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cliente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cliente_control.htmlTablaOrderByRel!=null
			&& cliente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelclienteAjaxWebPart").html(cliente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cliente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaclienteAjaxWebPart").css("display","none");
			jQuery("#trclienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacliente").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(cliente_control) {
		jQuery("#tdclienteNuevo").css("display",cliente_control.strPermisoNuevo);
		jQuery("#trclienteElementos").css("display",cliente_control.strVisibleTablaElementos);
		jQuery("#trclienteAcciones").css("display",cliente_control.strVisibleTablaAcciones);
		jQuery("#trclienteParametrosAcciones").css("display",cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(cliente_control);
				
		if(cliente_control.clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(cliente_control);
	}
	
	actualizarPaginaUsuarioInvitado(cliente_control) {
	
		var indexPosition=cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(cliente_control) {
		jQuery("#divResumenclienteActualAjaxWebPart").html(cliente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cliente_control) {
		jQuery("#divAccionesRelacionesclienteAjaxWebPart").html(cliente_control.htmlTablaAccionesRelaciones);
			
		cliente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cliente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cliente_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cliente_control) {
		
		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente").attr("style",cliente_control.strVisibleFK_Idcategoria_cliente);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente").attr("style",cliente_control.strVisibleFK_Idcategoria_cliente);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",cliente_control.strVisibleFK_Idciudad);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",cliente_control.strVisibleFK_Idciudad);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",cliente_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",cliente_control.strVisibleFK_Idcuenta);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cliente_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cliente_control.strVisibleFK_Idempresa);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio").attr("style",cliente_control.strVisibleFK_Idgiro_negocio);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio").attr("style",cliente_control.strVisibleFK_Idgiro_negocio);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto").attr("style",cliente_control.strVisibleFK_Idimpuesto);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto").attr("style",cliente_control.strVisibleFK_Idimpuesto);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idpais").attr("style",cliente_control.strVisibleFK_Idpais);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idpais").attr("style",cliente_control.strVisibleFK_Idpais);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",cliente_control.strVisibleFK_Idprovincia);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",cliente_control.strVisibleFK_Idprovincia);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",cliente_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",cliente_control.strVisibleFK_Idtermino_pago);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio").attr("style",cliente_control.strVisibleFK_Idtipo_precio);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio").attr("style",cliente_control.strVisibleFK_Idtipo_precio);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",cliente_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",cliente_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncliente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cliente",id,"cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","empresa","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParacategoria_cliente(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","categoria_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParatipo_precio(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","tipo_precio","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParagiro_negocio_cliente(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","giro_negocio_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParapais(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","pais","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParaprovincia(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","provincia","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParaciudad(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","ciudad","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","vendedor","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","termino_pago_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","cuenta","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParaimpuesto(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","impuesto","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cliente_control) {
	
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id").val(cliente_control.clienteActual.id);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-version_row").val(cliente_control.clienteActual.versionRow);
		
		if(cliente_control.clienteActual.id_empresa!=null && cliente_control.clienteActual.id_empresa>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val() != cliente_control.clienteActual.id_empresa) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val(cliente_control.clienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_categoria_cliente!=null && cliente_control.clienteActual.id_categoria_cliente>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val() != cliente_control.clienteActual.id_categoria_cliente) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val(cliente_control.clienteActual.id_categoria_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_tipo_precio!=null && cliente_control.clienteActual.id_tipo_precio>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val() != cliente_control.clienteActual.id_tipo_precio) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val(cliente_control.clienteActual.id_tipo_precio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_giro_negocio_cliente!=null && cliente_control.clienteActual.id_giro_negocio_cliente>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val() != cliente_control.clienteActual.id_giro_negocio_cliente) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val(cliente_control.clienteActual.id_giro_negocio_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-codigo").val(cliente_control.clienteActual.codigo);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-ruc").val(cliente_control.clienteActual.ruc);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-registro_empresarial").val(cliente_control.clienteActual.registro_empresarial);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-primer_apellido").val(cliente_control.clienteActual.primer_apellido);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-segundo_apellido").val(cliente_control.clienteActual.segundo_apellido);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-primer_nombre").val(cliente_control.clienteActual.primer_nombre);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-segundo_nombre").val(cliente_control.clienteActual.segundo_nombre);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-nombre_completo").val(cliente_control.clienteActual.nombre_completo);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-direccion").val(cliente_control.clienteActual.direccion);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-telefono").val(cliente_control.clienteActual.telefono);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-telefono_movil").val(cliente_control.clienteActual.telefono_movil);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-e_mail").val(cliente_control.clienteActual.e_mail);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-e_mail2").val(cliente_control.clienteActual.e_mail2);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-comentario").val(cliente_control.clienteActual.comentario);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-imagen").val(cliente_control.clienteActual.imagen);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-activo").prop('checked',cliente_control.clienteActual.activo);
		
		if(cliente_control.clienteActual.id_pais!=null && cliente_control.clienteActual.id_pais>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val() != cliente_control.clienteActual.id_pais) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val(cliente_control.clienteActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_provincia!=null && cliente_control.clienteActual.id_provincia>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val() != cliente_control.clienteActual.id_provincia) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val(cliente_control.clienteActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_ciudad!=null && cliente_control.clienteActual.id_ciudad>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val() != cliente_control.clienteActual.id_ciudad) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val(cliente_control.clienteActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-codigo_postal").val(cliente_control.clienteActual.codigo_postal);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-fax").val(cliente_control.clienteActual.fax);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-contacto").val(cliente_control.clienteActual.contacto);
		
		if(cliente_control.clienteActual.id_vendedor!=null && cliente_control.clienteActual.id_vendedor>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val() != cliente_control.clienteActual.id_vendedor) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val(cliente_control.clienteActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-maximo_credito").val(cliente_control.clienteActual.maximo_credito);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-maximo_descuento").val(cliente_control.clienteActual.maximo_descuento);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-interes_anual").val(cliente_control.clienteActual.interes_anual);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-balance").val(cliente_control.clienteActual.balance);
		
		if(cliente_control.clienteActual.id_termino_pago_cliente!=null && cliente_control.clienteActual.id_termino_pago_cliente>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != cliente_control.clienteActual.id_termino_pago_cliente) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(cliente_control.clienteActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_cuenta!=null && cliente_control.clienteActual.id_cuenta>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val() != cliente_control.clienteActual.id_cuenta) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val(cliente_control.clienteActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_impuesto!=null && cliente_control.clienteActual.id_impuesto>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val() != cliente_control.clienteActual.id_impuesto) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val(cliente_control.clienteActual.id_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-facturar_con").val(cliente_control.clienteActual.facturar_con);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-aplica_impuesto_ventas").prop('checked',cliente_control.clienteActual.aplica_impuesto_ventas);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-aplica_retencion_impuesto").prop('checked',cliente_control.clienteActual.aplica_retencion_impuesto);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-aplica_retencion_fuente").prop('checked',cliente_control.clienteActual.aplica_retencion_fuente);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-aplica_retencion_ica").prop('checked',cliente_control.clienteActual.aplica_retencion_ica);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-aplica_2do_impuesto").prop('checked',cliente_control.clienteActual.aplica_2do_impuesto);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-creado").val(cliente_control.clienteActual.creado);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-cuenta_contable_ventas").val(cliente_control.clienteActual.cuenta_contable_ventas);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-retencion_impuesto").val(cliente_control.clienteActual.retencion_impuesto);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-retencion_ica").val(cliente_control.clienteActual.retencion_ica);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-retencion_fuente").val(cliente_control.clienteActual.retencion_fuente);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-segundo_impuesto").val(cliente_control.clienteActual.segundo_impuesto);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-impuesto_codigo").val(cliente_control.clienteActual.impuesto_codigo);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-impuesto_incluido").val(cliente_control.clienteActual.impuesto_incluido);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-campo1").val(cliente_control.clienteActual.campo1);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-campo2").val(cliente_control.clienteActual.campo2);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-campo3").val(cliente_control.clienteActual.campo3);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-tipo_empresa").val(cliente_control.clienteActual.tipo_empresa);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-monto_ultima_transaccion").val(cliente_control.clienteActual.monto_ultima_transaccion);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-fecha_ultima_transaccion").val(cliente_control.clienteActual.fecha_ultima_transaccion);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-descripcion_ultima_transaccion").val(cliente_control.clienteActual.descripcion_ultima_transaccion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cliente","cuentascobrar","","form_cliente",formulario,"","",paraEventoTabla,idFilaTabla,cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}
	
	cargarCombosFK(cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosempresasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarComboscategoria_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombostipo_preciosFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosgiro_negocio_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombospaissFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosprovinciasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosciudadsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosvendedorsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombostermino_pago_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarComboscuentasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosimpuestosFK(cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cliente_control.strRecargarFkTiposNinguno!=null && cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosempresasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_cliente",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarComboscategoria_clientesFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_precio",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombostipo_preciosFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_giro_negocio_cliente",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosgiro_negocio_clientesFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombospaissFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_provincia",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosprovinciasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosciudadsFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosvendedorsFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombostermino_pago_clientesFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarComboscuentasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosimpuestosFK(cliente_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(cliente_control) {
		jQuery("#spanstrMensajeid").text(cliente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cliente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cliente_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_categoria_cliente").text(cliente_control.strMensajeid_categoria_cliente);		
		jQuery("#spanstrMensajeid_tipo_precio").text(cliente_control.strMensajeid_tipo_precio);		
		jQuery("#spanstrMensajeid_giro_negocio_cliente").text(cliente_control.strMensajeid_giro_negocio_cliente);		
		jQuery("#spanstrMensajecodigo").text(cliente_control.strMensajecodigo);		
		jQuery("#spanstrMensajeruc").text(cliente_control.strMensajeruc);		
		jQuery("#spanstrMensajeregistro_empresarial").text(cliente_control.strMensajeregistro_empresarial);		
		jQuery("#spanstrMensajeprimer_apellido").text(cliente_control.strMensajeprimer_apellido);		
		jQuery("#spanstrMensajesegundo_apellido").text(cliente_control.strMensajesegundo_apellido);		
		jQuery("#spanstrMensajeprimer_nombre").text(cliente_control.strMensajeprimer_nombre);		
		jQuery("#spanstrMensajesegundo_nombre").text(cliente_control.strMensajesegundo_nombre);		
		jQuery("#spanstrMensajenombre_completo").text(cliente_control.strMensajenombre_completo);		
		jQuery("#spanstrMensajedireccion").text(cliente_control.strMensajedireccion);		
		jQuery("#spanstrMensajetelefono").text(cliente_control.strMensajetelefono);		
		jQuery("#spanstrMensajetelefono_movil").text(cliente_control.strMensajetelefono_movil);		
		jQuery("#spanstrMensajee_mail").text(cliente_control.strMensajee_mail);		
		jQuery("#spanstrMensajee_mail2").text(cliente_control.strMensajee_mail2);		
		jQuery("#spanstrMensajecomentario").text(cliente_control.strMensajecomentario);		
		jQuery("#spanstrMensajeimagen").text(cliente_control.strMensajeimagen);		
		jQuery("#spanstrMensajeactivo").text(cliente_control.strMensajeactivo);		
		jQuery("#spanstrMensajeid_pais").text(cliente_control.strMensajeid_pais);		
		jQuery("#spanstrMensajeid_provincia").text(cliente_control.strMensajeid_provincia);		
		jQuery("#spanstrMensajeid_ciudad").text(cliente_control.strMensajeid_ciudad);		
		jQuery("#spanstrMensajecodigo_postal").text(cliente_control.strMensajecodigo_postal);		
		jQuery("#spanstrMensajefax").text(cliente_control.strMensajefax);		
		jQuery("#spanstrMensajecontacto").text(cliente_control.strMensajecontacto);		
		jQuery("#spanstrMensajeid_vendedor").text(cliente_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajemaximo_credito").text(cliente_control.strMensajemaximo_credito);		
		jQuery("#spanstrMensajemaximo_descuento").text(cliente_control.strMensajemaximo_descuento);		
		jQuery("#spanstrMensajeinteres_anual").text(cliente_control.strMensajeinteres_anual);		
		jQuery("#spanstrMensajebalance").text(cliente_control.strMensajebalance);		
		jQuery("#spanstrMensajeid_termino_pago_cliente").text(cliente_control.strMensajeid_termino_pago_cliente);		
		jQuery("#spanstrMensajeid_cuenta").text(cliente_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajeid_impuesto").text(cliente_control.strMensajeid_impuesto);		
		jQuery("#spanstrMensajefacturar_con").text(cliente_control.strMensajefacturar_con);		
		jQuery("#spanstrMensajeaplica_impuesto_ventas").text(cliente_control.strMensajeaplica_impuesto_ventas);		
		jQuery("#spanstrMensajeaplica_retencion_impuesto").text(cliente_control.strMensajeaplica_retencion_impuesto);		
		jQuery("#spanstrMensajeaplica_retencion_fuente").text(cliente_control.strMensajeaplica_retencion_fuente);		
		jQuery("#spanstrMensajeaplica_retencion_ica").text(cliente_control.strMensajeaplica_retencion_ica);		
		jQuery("#spanstrMensajeaplica_2do_impuesto").text(cliente_control.strMensajeaplica_2do_impuesto);		
		jQuery("#spanstrMensajecreado").text(cliente_control.strMensajecreado);		
		jQuery("#spanstrMensajecuenta_contable_ventas").text(cliente_control.strMensajecuenta_contable_ventas);		
		jQuery("#spanstrMensajeretencion_impuesto").text(cliente_control.strMensajeretencion_impuesto);		
		jQuery("#spanstrMensajeretencion_ica").text(cliente_control.strMensajeretencion_ica);		
		jQuery("#spanstrMensajeretencion_fuente").text(cliente_control.strMensajeretencion_fuente);		
		jQuery("#spanstrMensajesegundo_impuesto").text(cliente_control.strMensajesegundo_impuesto);		
		jQuery("#spanstrMensajeimpuesto_codigo").text(cliente_control.strMensajeimpuesto_codigo);		
		jQuery("#spanstrMensajeimpuesto_incluido").text(cliente_control.strMensajeimpuesto_incluido);		
		jQuery("#spanstrMensajecampo1").text(cliente_control.strMensajecampo1);		
		jQuery("#spanstrMensajecampo2").text(cliente_control.strMensajecampo2);		
		jQuery("#spanstrMensajecampo3").text(cliente_control.strMensajecampo3);		
		jQuery("#spanstrMensajetipo_empresa").text(cliente_control.strMensajetipo_empresa);		
		jQuery("#spanstrMensajemonto_ultima_transaccion").text(cliente_control.strMensajemonto_ultima_transaccion);		
		jQuery("#spanstrMensajefecha_ultima_transaccion").text(cliente_control.strMensajefecha_ultima_transaccion);		
		jQuery("#spanstrMensajedescripcion_ultima_transaccion").text(cliente_control.strMensajedescripcion_ultima_transaccion);		
	}
	
	actualizarCssBotonesMantenimiento(cliente_control) {
		jQuery("#tdbtnNuevocliente").css("visibility",cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocliente").css("display",cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcliente").css("visibility",cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcliente").css("display",cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcliente").css("visibility",cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcliente").css("display",cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcliente").css("visibility",cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscliente").css("visibility",cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscliente").css("display",cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcliente").css("visibility",cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcliente").css("visibility",cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcliente").css("visibility",cliente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncuenta_cobrar").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParacuenta_cobrars(idActual);
		});
		jQuery("#imgdivrelacionimagen_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParaimagen_clientes(idActual);
		});
		jQuery("#imgdivrelaciondocumento_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParadocumento_clientees(idActual);
		});
		jQuery("#imgdivrelaciondevolucion_factura").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});
		jQuery("#imgdivrelacionestimado").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParaestimados(idActual);
		});
		jQuery("#imgdivrelacionlista_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParalista_clientes(idActual);
		});
		jQuery("#imgdivrelacionfactura").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParafacturas(idActual);
		});
		jQuery("#imgdivrelacionconsignacion").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParaconsignaciones(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.empresasFK);
	}

	cargarComboEditarTablacategoria_clienteFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.categoria_clientesFK);
	}

	cargarComboEditarTablatipo_precioFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.tipo_preciosFK);
	}

	cargarComboEditarTablagiro_negocio_clienteFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.giro_negocio_clientesFK);
	}

	cargarComboEditarTablapaisFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.paissFK);
	}

	cargarComboEditarTablaprovinciaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.provinciasFK);
	}

	cargarComboEditarTablaciudadFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.ciudadsFK);
	}

	cargarComboEditarTablavendedorFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablacuentaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.cuentasFK);
	}

	cargarComboEditarTablaimpuestoFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.impuestosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(cliente_control) {
		var i=0;
		
		i=cliente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cliente_control.clienteActual.id);
		jQuery("#t-version_row_"+i+"").val(cliente_control.clienteActual.versionRow);
		
		if(cliente_control.clienteActual.id_empresa!=null && cliente_control.clienteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cliente_control.clienteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cliente_control.clienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_categoria_cliente!=null && cliente_control.clienteActual.id_categoria_cliente>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cliente_control.clienteActual.id_categoria_cliente) {
				jQuery("#t-cel_"+i+"_3").val(cliente_control.clienteActual.id_categoria_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_tipo_precio!=null && cliente_control.clienteActual.id_tipo_precio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cliente_control.clienteActual.id_tipo_precio) {
				jQuery("#t-cel_"+i+"_4").val(cliente_control.clienteActual.id_tipo_precio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_giro_negocio_cliente!=null && cliente_control.clienteActual.id_giro_negocio_cliente>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cliente_control.clienteActual.id_giro_negocio_cliente) {
				jQuery("#t-cel_"+i+"_5").val(cliente_control.clienteActual.id_giro_negocio_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(cliente_control.clienteActual.codigo);
		jQuery("#t-cel_"+i+"_7").val(cliente_control.clienteActual.ruc);
		jQuery("#t-cel_"+i+"_8").val(cliente_control.clienteActual.registro_empresarial);
		jQuery("#t-cel_"+i+"_9").val(cliente_control.clienteActual.primer_apellido);
		jQuery("#t-cel_"+i+"_10").val(cliente_control.clienteActual.segundo_apellido);
		jQuery("#t-cel_"+i+"_11").val(cliente_control.clienteActual.primer_nombre);
		jQuery("#t-cel_"+i+"_12").val(cliente_control.clienteActual.segundo_nombre);
		jQuery("#t-cel_"+i+"_13").val(cliente_control.clienteActual.nombre_completo);
		jQuery("#t-cel_"+i+"_14").val(cliente_control.clienteActual.direccion);
		jQuery("#t-cel_"+i+"_15").val(cliente_control.clienteActual.telefono);
		jQuery("#t-cel_"+i+"_16").val(cliente_control.clienteActual.telefono_movil);
		jQuery("#t-cel_"+i+"_17").val(cliente_control.clienteActual.e_mail);
		jQuery("#t-cel_"+i+"_18").val(cliente_control.clienteActual.e_mail2);
		jQuery("#t-cel_"+i+"_19").val(cliente_control.clienteActual.comentario);
		jQuery("#t-cel_"+i+"_20").val(cliente_control.clienteActual.imagen);
		jQuery("#t-cel_"+i+"_21").prop('checked',cliente_control.clienteActual.activo);
		
		if(cliente_control.clienteActual.id_pais!=null && cliente_control.clienteActual.id_pais>-1){
			if(jQuery("#t-cel_"+i+"_22").val() != cliente_control.clienteActual.id_pais) {
				jQuery("#t-cel_"+i+"_22").val(cliente_control.clienteActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_22").select2("val", null);
			if(jQuery("#t-cel_"+i+"_22").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_22").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_provincia!=null && cliente_control.clienteActual.id_provincia>-1){
			if(jQuery("#t-cel_"+i+"_23").val() != cliente_control.clienteActual.id_provincia) {
				jQuery("#t-cel_"+i+"_23").val(cliente_control.clienteActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_23").select2("val", null);
			if(jQuery("#t-cel_"+i+"_23").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_23").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_ciudad!=null && cliente_control.clienteActual.id_ciudad>-1){
			if(jQuery("#t-cel_"+i+"_24").val() != cliente_control.clienteActual.id_ciudad) {
				jQuery("#t-cel_"+i+"_24").val(cliente_control.clienteActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_24").select2("val", null);
			if(jQuery("#t-cel_"+i+"_24").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_24").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_25").val(cliente_control.clienteActual.codigo_postal);
		jQuery("#t-cel_"+i+"_26").val(cliente_control.clienteActual.fax);
		jQuery("#t-cel_"+i+"_27").val(cliente_control.clienteActual.contacto);
		
		if(cliente_control.clienteActual.id_vendedor!=null && cliente_control.clienteActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_28").val() != cliente_control.clienteActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_28").val(cliente_control.clienteActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_28").select2("val", null);
			if(jQuery("#t-cel_"+i+"_28").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_28").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_29").val(cliente_control.clienteActual.maximo_credito);
		jQuery("#t-cel_"+i+"_30").val(cliente_control.clienteActual.maximo_descuento);
		jQuery("#t-cel_"+i+"_31").val(cliente_control.clienteActual.interes_anual);
		jQuery("#t-cel_"+i+"_32").val(cliente_control.clienteActual.balance);
		
		if(cliente_control.clienteActual.id_termino_pago_cliente!=null && cliente_control.clienteActual.id_termino_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_33").val() != cliente_control.clienteActual.id_termino_pago_cliente) {
				jQuery("#t-cel_"+i+"_33").val(cliente_control.clienteActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_33").select2("val", null);
			if(jQuery("#t-cel_"+i+"_33").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_33").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_cuenta!=null && cliente_control.clienteActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_34").val() != cliente_control.clienteActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_34").val(cliente_control.clienteActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_34").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_34").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_impuesto!=null && cliente_control.clienteActual.id_impuesto>-1){
			if(jQuery("#t-cel_"+i+"_35").val() != cliente_control.clienteActual.id_impuesto) {
				jQuery("#t-cel_"+i+"_35").val(cliente_control.clienteActual.id_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_35").select2("val", null);
			if(jQuery("#t-cel_"+i+"_35").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_35").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_36").val(cliente_control.clienteActual.facturar_con);
		jQuery("#t-cel_"+i+"_37").prop('checked',cliente_control.clienteActual.aplica_impuesto_ventas);
		jQuery("#t-cel_"+i+"_38").prop('checked',cliente_control.clienteActual.aplica_retencion_impuesto);
		jQuery("#t-cel_"+i+"_39").prop('checked',cliente_control.clienteActual.aplica_retencion_fuente);
		jQuery("#t-cel_"+i+"_40").prop('checked',cliente_control.clienteActual.aplica_retencion_ica);
		jQuery("#t-cel_"+i+"_41").prop('checked',cliente_control.clienteActual.aplica_2do_impuesto);
		jQuery("#t-cel_"+i+"_42").val(cliente_control.clienteActual.creado);
		jQuery("#t-cel_"+i+"_43").val(cliente_control.clienteActual.cuenta_contable_ventas);
		jQuery("#t-cel_"+i+"_44").val(cliente_control.clienteActual.retencion_impuesto);
		jQuery("#t-cel_"+i+"_45").val(cliente_control.clienteActual.retencion_ica);
		jQuery("#t-cel_"+i+"_46").val(cliente_control.clienteActual.retencion_fuente);
		jQuery("#t-cel_"+i+"_47").val(cliente_control.clienteActual.segundo_impuesto);
		jQuery("#t-cel_"+i+"_48").val(cliente_control.clienteActual.impuesto_codigo);
		jQuery("#t-cel_"+i+"_49").val(cliente_control.clienteActual.impuesto_incluido);
		jQuery("#t-cel_"+i+"_50").val(cliente_control.clienteActual.campo1);
		jQuery("#t-cel_"+i+"_51").val(cliente_control.clienteActual.campo2);
		jQuery("#t-cel_"+i+"_52").val(cliente_control.clienteActual.campo3);
		jQuery("#t-cel_"+i+"_53").val(cliente_control.clienteActual.tipo_empresa);
		jQuery("#t-cel_"+i+"_54").val(cliente_control.clienteActual.monto_ultima_transaccion);
		jQuery("#t-cel_"+i+"_55").val(cliente_control.clienteActual.fecha_ultima_transaccion);
		jQuery("#t-cel_"+i+"_56").val(cliente_control.clienteActual.descripcion_ultima_transaccion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cliente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_cobrar").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelacioncuenta_cobrar", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParacuenta_cobrars(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimagen_cliente").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelacionimagen_cliente", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParaimagen_clientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondocumento_cliente").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelaciondocumento_cliente", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParadocumento_clientees(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion_factura").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelaciondevolucion_factura", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionestimado").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelacionestimado", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParaestimados(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_cliente").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelacionlista_cliente", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParalista_clientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelacionfactura", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParafacturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionconsignacion").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelacionconsignacion", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParaconsignaciones(idActual);
		});				
	}
		
	

	registrarSesionParacuenta_cobrars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","cuenta_cobrar","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,"s","");
	}

	registrarSesionParaimagen_clientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","imagen_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,"s","");
	}

	registrarSesionParadocumento_clientees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","documento_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,"es","");
	}

	registrarSesionParadevolucion_facturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","devolucion_factura","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,"s","");
	}

	registrarSesionParaestimados(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","estimado","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,"s","");
	}

	registrarSesionParalista_clientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","lista_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,"s","");
	}

	registrarSesionParafacturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","factura","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,"s","");
	}

	registrarSesionParaconsignaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","consignacion","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(cliente_control) {
		cliente_funcion1.registrarControlesTableValidacionEdition(cliente_control,cliente_webcontrol1,cliente_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,clienteConstante,strParametros);
		
		//cliente_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa",cliente_control.empresasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_2",cliente_control.empresasFK);
		}
	};

	cargarComboscategoria_clientesFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente",cliente_control.categoria_clientesFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_3",cliente_control.categoria_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente-cmbid_categoria_cliente",cliente_control.categoria_clientesFK);

	};

	cargarCombostipo_preciosFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio",cliente_control.tipo_preciosFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_4",cliente_control.tipo_preciosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio",cliente_control.tipo_preciosFK);

	};

	cargarCombosgiro_negocio_clientesFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente",cliente_control.giro_negocio_clientesFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_5",cliente_control.giro_negocio_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio-cmbid_giro_negocio_cliente",cliente_control.giro_negocio_clientesFK);

	};

	cargarCombospaissFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_pais",cliente_control.paissFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_22",cliente_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",cliente_control.paissFK);

	};

	cargarCombosprovinciasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia",cliente_control.provinciasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_23",cliente_control.provinciasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia",cliente_control.provinciasFK);

	};

	cargarCombosciudadsFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad",cliente_control.ciudadsFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_24",cliente_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",cliente_control.ciudadsFK);

	};

	cargarCombosvendedorsFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor",cliente_control.vendedorsFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_28",cliente_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",cliente_control.vendedorsFK);

	};

	cargarCombostermino_pago_clientesFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente",cliente_control.termino_pago_clientesFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_33",cliente_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",cliente_control.termino_pago_clientesFK);

	};

	cargarComboscuentasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta",cliente_control.cuentasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_34",cliente_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",cliente_control.cuentasFK);

	};

	cargarCombosimpuestosFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto",cliente_control.impuestosFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_35",cliente_control.impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto",cliente_control.impuestosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cliente_control) {

	};

	registrarComboActionChangeComboscategoria_clientesFK(cliente_control) {

	};

	registrarComboActionChangeCombostipo_preciosFK(cliente_control) {

	};

	registrarComboActionChangeCombosgiro_negocio_clientesFK(cliente_control) {

	};

	registrarComboActionChangeCombospaissFK(cliente_control) {

	};

	registrarComboActionChangeCombosprovinciasFK(cliente_control) {

	};

	registrarComboActionChangeCombosciudadsFK(cliente_control) {

	};

	registrarComboActionChangeCombosvendedorsFK(cliente_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(cliente_control) {

	};

	registrarComboActionChangeComboscuentasFK(cliente_control) {

	};

	registrarComboActionChangeCombosimpuestosFK(cliente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idempresaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val() != cliente_control.idempresaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val(cliente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_clientesFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idcategoria_clienteDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val() != cliente_control.idcategoria_clienteDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val(cliente_control.idcategoria_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente-cmbid_categoria_cliente").val(cliente_control.idcategoria_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente-cmbid_categoria_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente-cmbid_categoria_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_preciosFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idtipo_precioDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val() != cliente_control.idtipo_precioDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val(cliente_control.idtipo_precioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val(cliente_control.idtipo_precioDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosgiro_negocio_clientesFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idgiro_negocio_clienteDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val() != cliente_control.idgiro_negocio_clienteDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val(cliente_control.idgiro_negocio_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio-cmbid_giro_negocio_cliente").val(cliente_control.idgiro_negocio_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio-cmbid_giro_negocio_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio-cmbid_giro_negocio_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idpaisDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val() != cliente_control.idpaisDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val(cliente_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(cliente_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosprovinciasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idprovinciaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val() != cliente_control.idprovinciaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val(cliente_control.idprovinciaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(cliente_control.idprovinciaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idciudadDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val() != cliente_control.idciudadDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val(cliente_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(cliente_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idvendedorDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val() != cliente_control.idvendedorDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val(cliente_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(cliente_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != cliente_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(cliente_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(cliente_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idcuentaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val() != cliente_control.idcuentaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val(cliente_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(cliente_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuestosFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idimpuestoDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val() != cliente_control.idimpuestoDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val(cliente_control.idimpuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(cliente_control.idimpuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosempresasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorComboscategoria_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombostipo_preciosFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosgiro_negocio_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombospaissFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosprovinciasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosciudadsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosvendedorsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorComboscuentasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosimpuestosFK(cliente_control);
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
	onLoadCombosEventosFK(cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosempresasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cliente",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeComboscategoria_clientesFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombostipo_preciosFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_cliente",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosgiro_negocio_clientesFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombospaissFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosprovinciasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosciudadsFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosvendedorsFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeComboscuentasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosimpuestosFK(cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cliente");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cliente");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cliente_funcion1,cliente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cliente_funcion1,cliente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cliente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);			
			
			if(cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,"cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_cliente","id_categoria_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParacategoria_cliente("id_categoria_cliente");
				//alert(jQuery('#form-id_categoria_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_precio","id_tipo_precio","inventario","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParatipo_precio("id_tipo_precio");
				//alert(jQuery('#form-id_tipo_precio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("giro_negocio_cliente","id_giro_negocio_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParagiro_negocio_cliente("id_giro_negocio_cliente");
				//alert(jQuery('#form-id_giro_negocio_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("provincia","id_provincia","seguridad","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaprovincia("id_provincia");
				//alert(jQuery('#form-id_provincia_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto");
				//alert(jQuery('#form-id_impuesto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idcategoria_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idciudad","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idcuenta","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idempresa","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idgiro_negocio","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idimpuesto","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idpais","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idprovincia","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idtermino_pago","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idtipo_precio","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idvendedor","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cliente");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			cliente_funcion1.validarFormularioJQuery(cliente_constante1);
			
			if(cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cliente_control) {
		
		jQuery("#divBusquedaclienteAjaxWebPart").css("display",cliente_control.strPermisoBusqueda);
		jQuery("#trclienteCabeceraBusquedas").css("display",cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedacliente").css("display",cliente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecliente").css("display",cliente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscliente").attr("style",cliente_control.strPermisoMostrarTodos);
		
		if(cliente_control.strPermisoNuevo!=null) {
			jQuery("#tdclienteNuevo").css("display",cliente_control.strPermisoNuevo);
			jQuery("#tdclienteNuevoToolBar").css("display",cliente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdclienteDuplicar").css("display",cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdclienteDuplicarToolBar").css("display",cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdclienteNuevoGuardarCambios").css("display",cliente_control.strPermisoNuevo);
			jQuery("#tdclienteNuevoGuardarCambiosToolBar").css("display",cliente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdclienteActualizarToolBar").css("display",cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdclienteCopiar").css("display",cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdclienteCopiarToolBar").css("display",cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdclienteConEditar").css("display",cliente_control.strPermisoActualizar);
		}
		
		jQuery("#tdclienteEliminarToolBar").css("display",cliente_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdclienteGuardarCambios").css("display",cliente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdclienteGuardarCambiosToolBar").css("display",cliente_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trclienteElementos").css("display",cliente_control.strVisibleTablaElementos);
		
		jQuery("#trclienteAcciones").css("display",cliente_control.strVisibleTablaAcciones);
		jQuery("#trclienteParametrosAcciones").css("display",cliente_control.strVisibleTablaAcciones);
			
		jQuery("#tdclienteCerrarPagina").css("display",cliente_control.strPermisoPopup);		
		jQuery("#tdclienteCerrarPaginaToolBar").css("display",cliente_control.strPermisoPopup);
		//jQuery("#trclienteAccionesRelaciones").css("display",cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cliente_webcontrol1.registrarEventosControles();
		
		if(cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cliente_constante1.STR_ES_RELACIONADO=="false") {
			cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cliente_constante1.STR_ES_RELACIONES=="true") {
			if(cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cliente_webcontrol1.onLoad();
				
			} else {
				if(cliente_constante1.BIT_ES_PAGINA_FORM==true) {
					if(cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
						//cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cliente_constante1.BIG_ID_ACTUAL,"cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
						//cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			cliente_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var cliente_webcontrol1=new cliente_webcontrol();

if(cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cliente_webcontrol1.onLoadWindow; 
}

//</script>